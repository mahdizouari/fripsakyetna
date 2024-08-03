@extends('crud.admin')

@section('content')
<style>
    .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem; /* Increased padding for more space */
    border-radius: 12px; /* Slightly increased border radius for a softer look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
    width: 100%; /* Changed to 100% for responsiveness */
    max-width: 1000px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Added border for a subtle edge */
}
@media (max-width: 768px) {
    .container {
        padding: 0.5rem; /* Less padding on smaller screens */
    }

    .form-control {
        font-size: 14px; /* Smaller font size for better fit */
    }

    .btn {
        width: 100%; /* Full width buttons for better usability */
        margin-bottom: 0.5rem; /* Space between buttons */
    }

    .dashboard-button a {
        display: block;
        text-align: center; /* Center text in button on small screens */
        margin-top: 1rem; /* Margin above button */
    }
    /* General form control styles */
.form-control {
    width: 100%; /* Full width input fields */
    box-sizing: border-box; /* Ensure padding and border are included in width */
    margin-bottom: 1rem; /* Space between form fields */
}

/* Button styles */
.btn {
    display: inline-block;
    width: auto; /* Default width for larger screens */
    padding: 0.75rem 1.5rem; /* Adjust padding for better touch targets */
    font-size: 16px; /* Legible font size */
}

/* Adjust button on small screens */
@media (max-width: 768px) {
    .btn {
        font-size: 14px; /* Smaller font size for small screens */
        padding: 0.5rem 1rem; /* Less padding on smaller screens */
    }
}
/* Ensure that elements stack vertically on smaller screens */
@media (max-width: 768px) {
    .form-check-inline {
        display: block; /* Stack radio buttons vertically */
        margin-bottom: 0.5rem; /* Space between options */
    }
}


}
</style>
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
                            <th>Nom</th>
                            <th>Réf</th>
                            <th>Taille</th>
                            <th>Catégorie</th>
                            <th>prix</th>
                            <th>Act</th>
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
                                <!-- Display Image -->
                                <img src="{{ asset('/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                            </td>
                            <td>
                                <!-- Actions -->
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
