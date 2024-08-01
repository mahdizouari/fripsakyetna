@extends('layouts.base')

@section('title', 'Panier')

@section('content')

<div class="card">
    <div class="row">
        <!-- Cart Items Section -->
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col text-right text-muted align-self-center">{{ count(Session::get('productItems', [])) }} items</div>
                </div>
            </div> 

            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
                
            @if(Session::has('productItems') && !empty(Session::get('productItems')))
            @foreach(Session::get('productItems') as $key => $item)
                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom de produit</th>
                                <th>Image</th>
                                <th>Prix</th>
                                <th>Taille</th>
                                <th>Catégorie</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td><img src="{{ asset('/' . $item['image1']) }}" alt="{{ $item['name'] }}" class="img-fluid" width="50"></td>
                                    <td>{{ $item['prix'] }} DT</td>
                                    <td>{{ $item['taille'] }}</td>
                                    <td>{{ $item['Catégorie'] }}</td>
                                    <td><a href="{{ route('deleteItem', $item['id']) }}" class="btn btn-danger btn-sm">Supprimer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No items in the cart.</p>
            @endif

            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="/" class="flex-c-m stext-100 cl5 size-104 bg2 bor1 hov-btn1 p-lr-19 trans-04">
                    Retourner à la page principale
                </a>
            </div>
        </div>
        
        <!-- Summary Section -->
        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS {{ count(Session::get('productItems', [])) }}</div>
                <div class="col text-right">
                    &euro; {{ number_format(collect(Session::get('productItems'))->sum('prix'), 2) }}
                </div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row border-top border-bottom" style="padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">
                    &euro; {{ number_format(collect(Session::get('productItems'))->sum('prix') + 5, 2) }}
                </div>
            </div>
            <button class="flex-c-m stext-104 cl0 size-105 bg3 bor2 hov-btn2 p-lr-19 trans-04">CHECKOUT</button>
        </div>
    </div>
</div>

@endsection
