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
                    <input type="text" name="query" class="form-control me-md-2 mb-2 mb-md-0" placeholder="Recherche en référence, nom ou taille" value="{{ request()->get('query') }}">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Rechercher</button>
                </form>
            </div>
        </div>

</div>

        <div class="row">
            <div class="  col-md-9 w-full mx-auto text-center ">
                <div class="card">          
                    <div class="card-header flex justify-between items-center">
                        <h4>Produits</h4>
                        <a href="{{ url('create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Ajouter un produit</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped min-w-full "> 
                            <thead>
                                <tr>
                                    <th  >ID</th>
                                    <th class="w-[200px] max-w-[300px] truncate">Nom</th>
                                    <th>Taille</th>
                                    <th>Img</th>
                                    <th>Prix</th>
                                    <th>Catég</th>
                                    <th>Référence</th>
                                    <th>Activité</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                   <td  class=" w-[200px] max-w-[400px] " title="{{ $item->name }}"
                                        style="
                                                overflow: hidden;
                                            white-space: normal;
                                            text-overflow: ellipsis;
                                            word-break: break-word;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            -webkit-box-orient: vertical;">
                                        
                                        {{ \Illuminate\Support\Str::limit($item->name, 50, '...') }}
                                    </td>







                                        <td>{{ $item->taille }}</td>
                                        <td class="text-center">
                                            <img src="{{ route('image.show', ['filename' => $item->image1]) }}" class="center" style="width: 70px; height: 70px; object-fit: cover; " alt="Product Image">
                                        </td>
                                        <td>{{ $item->prix }} DT</td>
                                        <td>{{ $item->Catégorie }}</td>
                                        <td>{{ $item->Référence }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="text-success"> <i class="fas fa-circle" style="font-size: 20px;"></i></span>
                                            @else
                                                <span class="text-danger"> <i class="fas fa-circle" style="font-size: 20px;"></i></span>
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
