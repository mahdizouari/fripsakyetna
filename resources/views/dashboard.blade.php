@extends('crud.admin')

@section('content')


  
    <title>Welcome, {{ auth()->user()->name }}</title>
    <style>
    .container {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.8);
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: auto;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: border-box; /* Ensure padding and border are included in width */
        width: 100%;
        max-width: 1000px; /* Adjust max-width for larger screens */
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 1rem;
        padding: 0.75rem; /* Added padding for better touch targets */
        font-size: 16px; /* Default font size */
    }

    .btn {
        display: inline-block;
        width: auto;
        padding: 0.75rem 1.5rem;
        font-size: 16px; /* Default font size */
        text-align: center; /* Center text in button */
        border: none; /* Remove border */
        border-radius: 4px; /* Slightly rounded corners */
        background-color: #007bff; /* Default button color */
        color: #fff; /* Default text color */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s; /* Smooth background color transition */
    }

    .btn:hover {
        background-color: #0056b3; /* Darker background on hover */
    }

    @media (max-width: 1068px) {
        .container {
            padding: 0.5rem;
        }

        .form-control {
            font-size: 14px; /* Adjust font size for smaller screens */
            padding: 0.5rem; /* Less padding on smaller screens */
        }

        .btn {
            width: 100%; /* Full width buttons for better usability */
            margin-bottom: 0.5rem;
            font-size: 14px; /* Smaller font size for mobile */
            padding: 0.5rem; /* Less padding on smaller screens */
        }

        .card-header {
            flex-direction: column; /* Stack header content vertically on small screens */
            align-items: flex-start; /* Align items to the start for better readability */
        }

        .card-header .btn {
            margin-top: 1rem; /* Add margin above the button in header */
            width: 100%; /* Full width button in header */
        }
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
                                        <td>{{ $item->name }}</td>
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
                                            <a href="{{ url('edit/'.$item->id) }}" class="btn btn-success btn-sm mx-1" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Icon -->
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fas fa-trash-alt" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    
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
