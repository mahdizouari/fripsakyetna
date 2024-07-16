@extends('crud.admin')

@section('content')
<div class="container mt-4">
    <!-- Search Form -->
    <div class="mb-4">
        <form action="{{ route('products.search') }}" method="GET" class="d-flex flex-column flex-md-row align-items-center">
            <input type="text" name="query" class="form-control me-md-2 mb-2 mb-md-0" placeholder="Search by reference, name, or size" value="{{ request()->get('query') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Display Search Results -->
    @if(isset($products) && $products->isNotEmpty())
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Reference</th>
                            <th>Size</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->Référence }}</td>
                                <td>{{ $product->taille }}</td>
                                <td>{{ $product->Catégorie }}</td>
                                <td>{{ $product->prix }}</td>
                                <td>
                                    <a href="{{ route('edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-3" role="alert">
            No products found
        </div>
    @endif
</div>
@endsection
