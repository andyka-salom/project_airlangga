@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-4">Your Order History</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
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
                                            <a href="{{ route('review', ['order_id' => $order->id]) }}" class="btn btn-primary btn-sm">Write a Review</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
