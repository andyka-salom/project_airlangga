@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pesanan</h1>
        <div class="order-details">
            <h2>{{ $profilPenyediaJasa->nama_provider }}</h2>
            <img src="{{ asset('path/to/provider/photos/' . $profilPenyediaJasa->photo) }}" alt="Provider Photo">
            <p>Deskripsi: {{ $profilPenyediaJasa->description }}</p>
            <p>Harga: {{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>
            <form method="post" action="{{ route('submit_order') }}">
                @csrf
                <input type="hidden" name="provider_id" value="{{ $profilPenyediaJasa->id_provider }}">
                <input type="hidden" name="nama_penyedia" value="{{ $profilPenyediaJasa->nama_toko }}">
                <input type="hidden" name="total_bayar" value="{{ $profilPenyediaJasa->Harga }}">
                <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                <label for="order_date">Tanggal Pesanan:</label>
                <input type="date" name="order_date" required>
                
                <label for="phone">Nomor Telepon:</label>
                <input type="text" name="phone" required>

                <label for="alamat">Alamat:</label>
                <textarea name="alamat" required></textarea>

                <button type="submit" class="btn btn-success">Submit Order</button>
            </form>
        </div>
    </div>
@endsection
