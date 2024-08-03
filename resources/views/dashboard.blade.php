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
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            width: auto;
            padding: 0.75rem 1.5rem;
            font-size: 16px;
        }

        @media (max-width: 1068px) {
            .container {
                padding: 0.5rem;
                width: 100%; /* Ensure container takes full width on smaller screens */
            }

            .form-control {
                font-size: 19px; /* Adjust font size for smaller screens */
            }

            .btn {
                width: 100%; /* Full width buttons for better usability */
                margin-bottom: 0.5rem;
                font-size: 14px; /* Slightly smaller font size for buttons on mobile */
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
                                    <th>Name</th>
                                    <th>Taille</th>
                                    <th>Image</th>
                                    <th>Prix</th>
                                    <th>Catégorie</th>
                                    <th>Référence</th>
                                    <th>Is Active</th>
                                    <th>Action</th>
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
                                            <a href="{{ url('edit/'.$item->id) }}" class="btn btn-success btn-sm mx-1">Edit</a>
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
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
