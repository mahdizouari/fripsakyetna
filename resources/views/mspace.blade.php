@extends('crud.admin')

@section('content')


  
    <title>Welcome, {{ auth()->user()->name }}</title>
    
<body>
    
    <div class="container mt-4">
      <!-- Search Form -->
       
      <div class="mb-3">
        <div class="mb-3">
            <div class="mb-4">
                <form action="{{ route('products.search') }}" method="GET" class="d-flex flex-column flex-md-row align-items-center">
                    <input type="text" name="query" class="form-control me-md-2 mb-2 mb-md-0" placeholder="Search by reference, name, or size" value="{{ request()->get('query') }}">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Search</button>
                </form>
            </div>
        </div>

</div>

        <div class="row">
            <div class="col-md-9 mx-auto text-center ">
                <div class="card">          
                    <div class="card-header flex justify-between items-center">
                        <h4>Produits</h4>
                        <a href="{{ url('create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Ajouter un produit</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped ">
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
                                        <td class="whitespace-normal break-words max-w-xs">
                                            {{ $item->name }}
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
                                            <a href="{{ url('edit/'.$item->id) }}" class="edit btn-warning btn-sm mr-5 ml-3 " title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Icon -->
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="edit btn-danger btn-sm mr-3 " style="background: none; border: none;" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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
