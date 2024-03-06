<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kiosk;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected kiosk ID and time period from the request
        $selectedKioskId = $request->input('kiosk_id');
        $selectedTimePeriod = $request->input('time_period', 'month');
        $startDate = null;
        $endDate = null;

        // If custom range is selected, get the start and end dates
        if ($selectedTimePeriod === 'custom') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
        }

        // Get the authenticated user ID
        $user_id = Auth::id();

        // Get the kiosk owned by the authenticated user
        $kiosk = Kiosk::where('owner', $user_id)->first();

        // Get the kiosk ID or set it to null if the authenticated user does not own a kiosk
        $kiosk_id = $kiosk ? $kiosk->id : null;

        // Get all kiosks
        $kiosks = Kiosk::all();

        // Get the most and least popular items
        $popularItems = $this->getMostAndLeastPopularItems($selectedTimePeriod, $selectedKioskId, $startDate, $endDate);

        // Prepare data for visualization
        $itemNames = $popularItems['item_names'];
        $quantities = $popularItems['quantities'];

        // Get the hourly invoices count based on the filter
        $hourlyInvoices = $this->getHourlyInvoices($selectedKioskId, $selectedTimePeriod, $startDate, $endDate);

        // Prepare data for visualization
        $hours = $hourlyInvoices->pluck('hour')->toArray();
        $invoiceCounts = $hourlyInvoices->pluck('invoice_count')->toArray();

        // Get the total sales for the selected kiosk
        $totalSales = $this->getTotalSales($selectedKioskId, $selectedTimePeriod, $startDate, $endDate);

        // Prepare data for visualization
        $salesLabels = $totalSales->pluck('kiosk_name')->toArray();
        $salesData = $totalSales->pluck('total_sales')->toArray();

        // Pass data to the dashboard view
        return view('dashboard', compact(
            'itemNames',
            'quantities',
            'kiosks',
            'selectedKioskId',
            'selectedTimePeriod',
            'startDate',
            'endDate',
            'hours',
            'invoiceCounts',
            'salesLabels',
            'salesData',
            'kiosk_id'
        ));
    }

    private function getMostAndLeastPopularItems($timePeriod = 'month', $kioskId = null, $startDate = null, $endDate = null)
    {
        $query = DB::table('invoice_items')
            ->select('item_name', DB::raw('SUM(quantity) as total_quantity'))
            ->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')
            ->join('kiosks', 'invoices.kiosk_id', '=', 'kiosks.id')
            ->when($kioskId, function ($query) use ($kioskId) {
                $query->where('kiosks.id', $kioskId);
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('invoices.invoice_date', [$startDate, $endDate]);
            })
            ->where('invoices.invoice_date', '>=', $this->getTimePeriodInterval($timePeriod))
            ->groupBy('item_name')
            ->orderByDesc('total_quantity')
            ->get();

        $itemNames = $query->pluck('item_name')->toArray();
        $quantities = $query->pluck('total_quantity')->toArray();

        return [
            'item_names' => $itemNames,
            'quantities' => $quantities,
        ];
    }

    private function getHourlyInvoices($kioskId, $timePeriod, $startDate, $endDate)
    {
        $query = DB::table('invoices')
            ->selectRaw('DATE_FORMAT(created_at, "%H:00") AS hour, COUNT(*) AS invoice_count')
            ->when($kioskId, function ($query) use ($kioskId) {
                if ($kioskId === 'all') {
                    $query->groupBy('hour');
                } else {
                    $query->where('kiosk_id', $kioskId);
                }
            })
            ->when($timePeriod === 'custom' && $startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->when($timePeriod !== 'custom' && empty($startDate) && empty($endDate), function ($query) use ($timePeriod) {
                $query->where('created_at', '>=', $this->getTimePeriodInterval($timePeriod));
            })
            ->groupBy('hour')
            ->orderBy('hour', 'asc')
            ->get();

        return $query;
    }

    private function getTotalSales($kioskId, $timePeriod, $startDate, $endDate)
    {
        $query = DB::table('invoices')
            ->select('kiosks.name AS kiosk_name', DB::raw('SUM(total_amount) AS total_sales'))
            ->join('kiosks', 'invoices.kiosk_id', '=', 'kiosks.id')
            ->when($kioskId, function ($query) use ($kioskId) {
                $query->where('invoices.kiosk_id', $kioskId);
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('invoices.invoice_date', [$startDate, $endDate]);
            })
            ->where('invoices.invoice_date', '>=', $this->getTimePeriodInterval($timePeriod))
            ->groupBy('kiosk_name')
            ->get();

        return $query;
    }

    private function getTimePeriodInterval($timePeriod)
    {
        switch ($timePeriod) {
            case 'day':
                return now()->subDay();
            case 'week':
                return now()->subWeek();
            case 'month':
            default:
                return now()->subMonth();
        }
    }
}
