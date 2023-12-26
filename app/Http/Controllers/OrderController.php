<?php

namespace App\Http\Controllers;
use App\Models\profilpenyedia_jasa;
use App\Models\order;
use App\Models\review;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrderForm($providerId)
    {
        // Ambil data profil penyedia jasa berdasarkan $providerId
        $profilPenyediaJasa = profilpenyedia_jasa::find($providerId);

        if (!$profilPenyediaJasa) {
            return redirect()->route('halaman_lain'); 
        }

        return view('cust.pemesanan.order', compact('profilPenyediaJasa'));
    }

    public function submitOrder(Request $request)
    {
            $request->request->add(['status_selesai' =>'belum', 'status' =>'Unpaid','nama_customer' => Auth::user()->name]);
            $order = order::create($request->all());
    
    
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
    
            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_bayar,
                ),
                'customer_details' => array(
                    'first_name' => $request->name,
                    'last_name' =>'',
                    'phone' => $request->phone,
                ),
            );
    
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('cust.pemesanan.checkout', compact('snapToken', 'order'));
        }
                
        public function callback(Request $request){
            $serverKey = config('midtrans.server_key');
            $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
            if ($hashed == $request->signature_key){
                if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                    $order = Order::find($request->order_id);
                    $order->update(['status' => 'Paid']);
                }
            }
        }
        public function invoice($id){
            $order = Order::find($id);
            return view('cust.pemesanan.invoice', compact('order'));
        }

        public function orderHistory()
        {
            $userOrders = auth()->user()->orders;
    
            return view('cust.pemesanan.history', ['orders' => $userOrders]);
        }
        public function review($order_id)
        {
            $order = Order::findOrFail($order_id);
    
            return view('cust.pemesanan.review', ['order' => $order]);
        }

        public function index()
        {
            $user = Auth::user();
            $orders = Order::where('provider_id', $user->id)->get();
            return view('orderhistory', compact('orders'));
        }
    
        public function updateStatus($id)
        {
            $order = Order::findOrFail($id);
            $order->status_selesai = 'selesai';
            $order->save();
            return redirect()->route('orders.index')->with('success', 'Status selesai berhasil diperbarui');
        }
    }

