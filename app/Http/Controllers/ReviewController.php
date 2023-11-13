<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Order; 
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function submitReview(Request $request, $order_id)
    {
  
        $request->validate([
            'rating' => 'required|in:Kurang Memuaskan,Cukup,Bagus,Sangat Bagus,Luar Biasa',
            'comment' => 'required',
        ]);

      
        $order = Order::findOrFail($order_id);

        // Save the review to the database
        Review::create([
            'user_id' => auth()->user()->id,
            'provider_id' => $order->provider_id,
            'id_order' => $order->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        // Redirect back with a success message
        return redirect()->route('order.history')->with('success', 'Review submitted successfully!');
    }
    
}
