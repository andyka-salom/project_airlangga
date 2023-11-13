@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Write a Review</h2>
        <form method="post" action="{{ route('submit.review', ['order_id' => $order->id]) }}">
            @csrf
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating" class="form-control" required>
                    <option value="Kurang Memuaskan">Kurang Memuaskan</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Bagus">Bagus</option>
                    <option value="Sangat Bagus">Sangat Bagus</option>
                    <option value="Luar Biasa">Luar Biasa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
@endsection
