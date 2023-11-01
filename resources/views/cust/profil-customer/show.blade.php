@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil Customer</h1>
        @if($profilCustomer)
            <p>Nama: {{ $user->name }}</p>
            <p>Foto: {{ $profilCustomer->photo }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Alamat: {{ $profilCustomer->address }}</p>

            <a href="{{ route('profil-customer.edit') }}" class="btn btn-primary">Edit Profil</a>

         
            <a href="{{ route('edit-password') }}" class="btn btn-primary">Update Password</a>

           
            <form method="POST" action="{{ route('delete-account') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
            </form>
        @else
            <p>Profil customer belum ada. <a href="{{ route('profil-customer.create') }}">Buat Profil</a></p>
        @endif
    </div>


@endsection

