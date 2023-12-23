@extends('layouts.app')

@section('content')
<div class ="containerpenyedia">
<div class="container mt-5">
        <h1 style="margin-top: 100px;">Detail Pesanan</h1>
        <div class="order-details">
        <table>
        <tr>
            <td>Nama penyedia</td>
            <td> : {{ $order->nama_penyedia }}</td>
            </tr>
            <tr>
            <td>Harga</td>
            <td> : {{ $order->total_bayar }}</td>
            </tr>
            <tr>
            <td>Nama</td>
            <td> : {{ $order->nama_customer }}</td>
            </tr>
            <tr>
            <td>No telpon</td>
            <td> : {{ $order->phone }}</td>
            </tr>
            <tr>
            <td>Alamat</td>
            <td> : {{ $order->Alamat }}</td>
            </tr>
            <tr>
            <td>Status Pembayaran</td>
            <td> : {{ $order->status }}</td>
            </tr>
            <tr>
        </table>
    </div>
</div>
@endsection
