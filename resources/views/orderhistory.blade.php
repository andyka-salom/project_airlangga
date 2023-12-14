
@extends('layouts.app')

@section('content')
<div class ="containerutamaorder">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-4">Order Masuk</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">Total Bayar</th>
                                <th scope="col">Status Bayar</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status Selesai</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->nama_customer }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total_bayar }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->Alamat }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->status_selesai }}</td>
                    <td>
                        @if ($order->status_selesai == 'belum')
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Ubah Status Selesai</button>
                            </form>
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
</div>
@endsection
