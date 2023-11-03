@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Place an Order</h1>

        <div class="provider-profile">
            <h2>{{ $provider->nama_provider }}</h2>
            <img src="{{ asset('path/to/provider/photos/' . $provider->photo) }}" alt="Provider Photo">
            <p>Alamat: {{ $provider->address }}</p>
            <p>Deskripsi: {{ $provider->description }}</p>
            <form method="post" action="{{ route('placeOrder', $provider->id_provider) }}">
                @csrf
                <div class="form-group">
                    <label for="order_date">Order Date</label>
                    <input type="date" name="order_date" id="order_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </div>
@endsection
