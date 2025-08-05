@extends('crud.admin')

@section('content')

<div class="container mt-4  " style="width: 1200px;">
    <!-- Search Form -->
    <div class="mb-4">
        <form action="{{ route('products.search') }}" method="GET" class="d-flex flex-column flex-md-row align-items-center">
            <input type="text" name="query" class="form-control me-md-2 mb-2 mb-md-0" placeholder="Recherche en référence, nom ou taille" value="{{ request()->get('query') }}">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Rechercher</button>
            
        </form>
        <div class="mt-3 text-center ">
            <a href="/mspace" class=" bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-16 rounded transition">Mon Espace</a>

        </div>

    </div>

    <!-- Display Search Results -->
    @if(isset($products) && $products->isNotEmpty())
        <div class="flex justify-center items-center w-full ">
    <div class="card w-full max-w-5xl shadow-lg">
        <div class="card-body text-center">
            <table class="table table-striped table-bordered w-full">
                    <thead class="thead-dark">
                        <tr>
                            <th class="w-[300px] max-w-[300px] truncate">Nom</th>
                            <th>Réf</th>
                            <th>T</th>
                            <th>Catég</th>
                            <th>prix</th>
                            <th>Img</th>                
                                       
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                           <td  class="w-[300px] max-w-[300px] truncate" title="{{ $product->name }}"
                                        style="
                                           
                                            overflow: hidden;
                                            white-space: normal;
                                            text-overflow: ellipsis;
                                            word-break: break-word;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 2;
                                            -webkit-box-orient: vertical;">
                                        
                                        {{ \Illuminate\Support\Str::limit($product->name, 50, '...') }}
                                    </td>




                            </div>
                            <td>{{ $product->Référence }}</td>
                            <td>{{ $product->taille }}</td>
                            <td>{{ $product->Catégorie }}</td>
                            <td>{{ $product->prix }}</td>
                            <td>
                                <!-- Display Image -->
                                <img src="{{ asset('/' . $product->image1) }}" alt="{{ $product->name }}" width="100" height="100" class="img-thumbnail">
                            </td>
                            <td>
                                <!-- Actions -->
                                <a href="{{ route('edit', $product->id) }}" class="edit btn-warning btn-sm mr-5" style="background: none; border: none;" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
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
    @else
        <div class="alert alert-info mt-3" role="alert">
            No products found
        </div>
    @endif
</div>
@endsection
