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

            @if(!empty(Session::get('productItems')))
                @foreach(Session::get('productItems') as $item)
                    <!-- Cart Item -->
                    <div class="row border-top border-bottom cart-item">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{ asset($item['image1']) }}" alt="{{ $item['name'] }}"></div>
                            <div class="col">
                                <div class="row text-muted">{{ $item['categorie'] ?? 'No category' }}</div>
                                <div class="row">{{ $item['name'] }}</div>
                            </div>
                            <div class="col text-center">
                                <a href="#" class="quantity-control">-</a>
                                <a href="#" class="border quantity-display">1</a>
                                <a href="#" class="quantity-control">+</a>
                            </div>
                            <div class="col text-right">
                                &euro; {{ number_format($item['prix'], 2) }} 
                                <span class="close">&#10005;</span>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    &euro; {{ number_format(Session::get('productItems', collect())->sum('prix'), 2) }}
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
                    &euro; {{ number_format(Session::get('productItems', collect())->sum('prix') + 5, 2) }}
                </div>
            </div>
            <button class="flex-c-m stext-104 cl0 size-105 bg3 bor2 hov-btn2 p-lr-19 trans-04">CHECKOUT</button>
        </div>
    </div>
</div>

@endsection
