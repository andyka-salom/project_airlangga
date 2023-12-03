@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Profil Customer</h1>

        @if($profilCustomer)
            <div class="card mb-4 mt-5">
                <div class="card-body">
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Alamat: {{ $profilCustomer->address }}</p>
                    <p class="card-text">Foto: {{ $profilCustomer->photo }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('profil-customer.edit') }}" class="btn btn-primary">Edit Profil</a>
                            <a href="{{ route('edit-password') }}" class="btn btn-primary">Update Password</a>
                        </div>
                        
                        <form method="POST" action="{{ route('delete-account') }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                <p class="mb-0">Profil customer belum ada. <a href="{{ route('profil-customer.create') }}">Buat Profil</a></p>
            </div>
        @endif
    </div>
@endsection
