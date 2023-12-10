@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Become a Service Provider</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('submit.provider') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id_jasa">Select Service:</label>
                        <select name="id_jasa" id="id_jasa" class="form-control" required>
                            {{-- Populate this dropdown with your categories --}}
                            @foreach ($jasas as $jasa)
                                <option value="{{ $jasa->id_jasa }}">{{ $jasa->nama_jasa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_toko">Store Name:</label>
                        <input type="text" name="nama_toko" id="nama_toko" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="no_rek">Bank Account Number:</label>
                        <input type="text" name="no_rek" id="no_rek" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Harga">Service Price:</label>
                        <input type="number" name="Harga" id="Harga" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
