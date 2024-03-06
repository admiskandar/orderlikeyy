<?php

namespace App\Http\Controllers;

use App\Models\Kiosk;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //order-pos
    public function order_pos()
    {
        $user_id = Auth::id();

        // Retrieve the kiosk ID(s) owned by the user
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        // Fetch the menus associated with the kiosk IDs
        $menus = Menu::whereIn('kiosk', $kiosk_ids)->get();

        return view('order.order-pos', compact('menus'));
    }

    // //order-sales-list
    // public function order_sales_list()
    // {
    //     return view('order.order-sales-list');
    // }

    // //order-sales-details
    // public function order_sales_details()
    // {
    //     return view('order.order-sales-details');
    // }

    // //order-sales-edit
    // public function order_sales_edit()
    // {
    //     return view('order.order-sales-edit');
    // }

    // //order-invoice
    // public function order_invoice_list()
    // {
    //     return view('order.order-invoice-list');
    // }
}
