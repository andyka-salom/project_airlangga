@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 style="text-align: center">Detail Pesanan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4>{{ $profilPenyediaJasa->nama_toko }}</h4>
                        <img src="{{ asset('penyediaImages/' . $profilPenyediaJasa->photo) }}" class="img-fluid mb-3" width="200px" height="200px" alt="Provider Photo">
                        <p>Deskripsi: {{ $profilPenyediaJasa->description }}</p>
                        <p>Harga: {{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>
                    </div>
                    <div class="col-md-8">
                        <form method="post" action="{{ route('submit_order') }}">
                            @csrf
                            <input type="hidden" name="provider_id" value="{{ $profilPenyediaJasa->id_provider }}">
                            <input type="hidden" name="nama_penyedia" value="{{ $profilPenyediaJasa->nama_toko }}">
                            <input type="hidden" name="total_bayar" value="{{ $profilPenyediaJasa->Harga }}">
                            <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <label for="order_date">Tanggal Pesanan:</label>
                                <input type="date" class="form-control" name="order_date" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Nomor Telepon:</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" name="alamat" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-block" style="margin-top: 10px">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
