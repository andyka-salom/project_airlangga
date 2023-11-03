<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrderForm($providerId)
    {
        $provider = ProfilPenyediaJasa::find($providerId);
    
        return view('order', compact('provider'));
    }
    
    public function placeOrder(Request $request, $providerId)
    {
        // Validate and store the order data
        $order = new Order;
        $order->customer_id = auth()->user()->id;
        $order->provider_id = $providerId;
        $order->order_date = $request->input('order_date');
        $order->status_pembayaran = 'Pending'; // You can set an initial status here
        $order->save();
    
        // You can add additional validation and error handling as needed
    
        return redirect()->route('provider.profile')->with('success', 'Order placed successfully.');
    }
    
}
