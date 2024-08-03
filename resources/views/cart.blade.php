@extends('layouts.base')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Shopping Cart</h2>
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="bg-primary text-white">
                    <th>ID</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Category</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cartItems as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-thumbnail" width="50"></td>
                        <td>{{ $item['prix'] }}</td>
                        <td>{{ $item['taille'] }}</td>
                        <td>{{ $item['Catégorie'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Your cart is empty.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="/" class="btn btn-primary btn-lg">Back to Home</a>
    </div>
</div>
@endsection
<style>
    /* General Styles */
.table-responsive {
    margin-top: 20px;
}

/* Mobile Styles */
@media (max-width: 768px) {
    .table th, .table td {
        font-size: 14px;
        padding: 8px;
    }

    .table img {
        width: 40px;
        height: auto;
    }

    .btn {
        width: 100%;
        padding: 10px;
        font-size: 14px;
    }

    .container {
        padding: 0.5rem;
    }

    h2 {
        font-size: 18px;
    }
}

</style>