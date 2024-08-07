@extends('crud.admin')

@section('content')


  
    <title>Welcome, {{ auth()->user()->name }}</title>
    <style>
    .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem; /* Increased padding for more space */
    border-radius: 12px; /* Slightly increased border radius for a softer look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
    width: 100%; /* Changed to 100% for responsiveness */
    max-width: 900px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Added border for a subtle edge */
}

/* General form control styles */
.form-control {
    width: 100%; /* Full width input fields */
    box-sizing: border-box; /* Ensure padding and border are included in width */
    margin-bottom: 1rem; /* Space between form fields */
    padding: 0.75rem; /* Padding for input fields */
    border-radius: 8px; /* Rounded corners for input fields */
    border: 1px solid #ccc; /* Light border for input fields */
}

/* Button styles */
.btn {
    display: inline-block;
    width: auto; /* Default width for larger screens */
    padding: 0.75rem 1.5rem; /* Adjust padding for better touch targets */
    font-size: 16px; /* Legible font size */
    border-radius: 8px; /* Rounded corners for buttons */
    border: none; /* Remove default border */
    background-color: #007bff; /* Primary button color */
    color: #fff; /* Text color */
    text-align: center; /* Center text in button */
    transition: background-color 0.3s ease; /* Smooth transition on hover */
}

.btn:hover {
    background-color: #0056b3; /* Darker button color on hover */
}

/* Adjust button on small screens */
@media (max-width: 768px) {
    .btn {
        font-size: 14px; /* Smaller font size for small screens */
        padding: 0.5rem 1rem; /* Less padding on smaller screens */
        width: 100%; /* Full width buttons for better usability */
        margin-bottom: 0.5rem; /* Space between buttons */
    }
}

/* Ensure that elements stack vertically on smaller screens */
@media (max-width: 768px) {
    .form-check-inline {
        display: block; /* Stack radio buttons vertically */
        margin-bottom: 0.5rem; /* Space between options */
    }
}

/* Additional adjustments for form and container */
@media (max-width: 768px) {
    .container {
        padding: 1rem; /* Adjust padding for small screens */
        border-radius: 8px; /* Smaller border radius on small screens */
    }
    
    .form-control {
        font-size: 14px; /* Adjust font size for better readability on small screens */
    }
}

/* Enhance form labels */
.form-label {
    display: block; /* Ensure labels are on their own line */
    margin-bottom: 0.5rem; /* Space between label and input */
    font-weight: bold; /* Emphasize labels */
}

</style>

<body>
    
    <div class="container mt-4">
      <!-- Search Form -->
       
    <div class="mb-3">
        <form action="{{ route('products.search') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2" placeholder="Search by reference, name, or size" value="{{ request()->get('query') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Produits</h4>
                        <a href="{{ url('create') }}" class="btn btn-primary">Ajouter un produit</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>N</th>
                                    <th>T</th>
                                    <th>Img</th>
                                    <th>Prx</th>
                                    <th>Cat</th>
                                    <th>Réf</th>
                                    <th>IA</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td class="text-wrap">
                                            {{ \Str::limit($item->name, 10) }}
                                        </td>
                                        <td>{{ $item->taille }}</td>
                                        <td>
                                            <img src="{{ route('image.show', ['filename' => $item->image1]) }}" style="width: 70px; height: 70px; object-fit: cover;" alt="Product Image">
                                        </td>
                                        <td>{{ $item->prix }} DT</td>
                                        <td>{{ $item->Catégorie }}</td>
                                        <td>{{ $item->Référence }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="text-success">Active <i class="fas fa-circle" style="font-size: 10px;"></i></span>
                                            @else
                                                <span class="text-danger">In-Active <i class="fas fa-circle" style="font-size: 10px;"></i></span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit Icon -->
                                            <a href="{{ url('edit/'.$item->id) }}" class="edit btn-warning btn-sm" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Icon -->
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="edit btn-danger btn-sm" style="background: none; border: none;" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  


     

@endsection
