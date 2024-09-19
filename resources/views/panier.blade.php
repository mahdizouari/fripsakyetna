@extends('layouts.base')

@section('title', 'Panier')

@section('content')

<div class="card">
    <div class="row">
        <!-- Panier Items Section -->
        <div class="col-md-8 panier">
            <div class="title">
                <div class="row">
                <div class="col">
                    <h4><b><i class="fa fa-shopping-cart"></i> Panier</b></h4>
                </div>
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
                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom </th>
                                <th>Image</th>
                                <th>Catg</th>
                                <th>Taille</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get('productItems') as $item)
                                <tr>
                                    <td>{{ $item['name'] }}
                                        <div>
                                        <a href="{{ route('deleteItem', $item['id']) }}" class="btnc">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        </div>
                                    </td>
                                    <td><img src="{{ asset('/' . $item['image1']) }}" alt="{{ $item['name'] }}" class="img-fluid" width="50"></td>
                                    <td>{{ $item['taille'] }}</td>
                                    <td>{{ $item['Catégorie'] }}</td>
                                    <td>{{ $item['prix'] }} DT</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Aucun article dans le panier.</p>
            @endif

            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="/" class="flex-c-m stext-100 cl5 size-104 bg2 bor1 hov-btn1 p-lr-19 trans-04">
                    Retourner à la page principale
                </a>
            </div>
        </div>

        <!-- Summary Section -->
        <div class="col-md-4 summary">
            <div><h5><b>Résumé</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;"> {{ count(Session::get('productItems', [])) }} ARTICLES</div>
                <div class="col text-right">
                    {{ number_format(collect(Session::get('productItems'))->sum('prix'), 2) }} DT
                </div>
            </div>
            <form>
                <p>FRAIS DE LIVRAISON</p>
                <select>
                    <option class="text-muted">Livraison standard- 8.00 DT</option>
                </select>
                <p>CODE PROMO</p>
                <input id="code" placeholder="Entrez votre code">
            </form>
            <div class="row border-top border-bottom" style="padding: 2vh 0;">
                <div class="col">PRIX TOTAL</div>
                <div class="col text-right">
                     {{ number_format(collect(Session::get('productItems'))->sum('prix') + 8, 2) }} DT
                </div>
            </div>
            <a href="{{ route('checkout') }}" class="flex-c-m stext-104 cl0 size-105 bg3 bor2 hov-btn2 p-lr-19 trans-04">VALIDER LA COMMANDE</a>
            </div>
    </div>
</div>

@endsection
