@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 style="margin-top: 100px;">Your Order History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Total Payment</th>
                    <th>Status Pembayaran</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->total_bayar }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->status_selesai }}</td>
                        <td>
                            @if ($order->status_selesai == 'selesai')
                                <a href="{{ route('review', ['order_id' => $order->id]) }}" class="btn btn-primary">Write a Review</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
