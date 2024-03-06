<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Kiosk;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function invoices_list(Request $request)
    {
        $invoices = Invoice::all();
        return view('order.order-invoice-list', compact('invoices'));
    }

    public function checkout(Request $request)
    {

        $total_paid = $request->get('totalPaid');
        $balance = $request->get('totalBalance');
        $scan_debit_reference = $request->get('scan_debit_reference');
        $paymentMethod = $request->get('paymentMethod');
        $total_price = $request->get('total_price');


        //get user id dari table users
        $user_id = Auth::id();
        //assign user id into column in table menus

        $kiosk = Kiosk::where('owner', $user_id)->first();

        $invoice = new Invoice([
            'user_id' => $user_id,
            'invoice_date' => now(),
            'total_amount' => $total_price,
            'total_paid' => $total_paid,
            'total_balance' => $balance,
            'reference_number' => $scan_debit_reference ,
            'payment_method' => $paymentMethod,
            'kiosk_id' => $kiosk->id,
        ]);

        $invoice->save(); // save dalam table invoices

        // Get back the invoices yg baru create
        $invoiceId = $invoice->id;

        // Retrieve the input arrays dari blade
        $itemNames = $request->input('item_name');
        $itemQuantities = $request->input('item_quantity');
        $itemPrices = $request->input('item_price');
        $itemTotalPrices = $request->input('item_total_price');

        // Save the items to the database
        foreach ($itemNames as $index => $itemName) {
            $itemQuantity = $itemQuantities[$index];
            $itemPrice = $itemPrices[$index];
            $itemTotalPrice = $itemTotalPrices[$index];

            // Create a new Item instance
            $item = new InvoiceItem;
            $item->item_name = $itemName;
            $item->quantity = $itemQuantity;
            $item->item_price = $itemPrice;
            $item->invoice_id = $invoiceId; // Assign the invoice ID
            $item->total_price = $itemTotalPrice;

            // Save the item
            $item->save();

            // Update the quantity in the menu table
            $menu = Menu::where('name', $itemName)->first();
            if ($menu) {
                $menu->quantity -= $itemQuantity;
                $menu->save();
            }
        }

        $user_id = Auth::id();
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        $invoices = Invoice::whereIn('kiosk_id', $kiosk_ids)->get();
        return view('order.order-my-invoice-list', compact('invoices'));
    }

    public function my_invoices_list(Request $request)
    {
        $user_id = Auth::id();
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        $invoices = Invoice::whereIn('kiosk_id', $kiosk_ids)->get();
        return view('order.order-my-invoice-list', compact('invoices'));
    }
}
