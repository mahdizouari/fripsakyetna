@extends('layouts.base')

@section('title', 'Fripsakyetna')

@section('content')

<div class="card">
    <div class="row">
        <!-- Cart Items Section -->
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col text-right text-muted align-self-center">3 items</div>
                </div>
            </div>    
            <!-- Cart Item -->
            <div class="row border-top border-bottom cart-item">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="" alt="Product Image"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col text-center">
                        <a href="#" class="quantity-control">-</a>
                        <a href="#" class="border quantity-display">1</a>
                        <a href="#" class="quantity-control">+</a>
                    </div>
                    <div class="col text-right">
                        &euro; 44.00 
                        <span class="close">&#10005;</span>
                    </div>
                </div>
            </div>
            <!-- Repeat Cart Item as needed -->
            <!-- ... -->
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
                <div class="col" style="padding-left:0;">ITEMS 3</div>
                <div class="col text-right">&euro; 132.00</div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row border-top border-bottom" style="padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; 137.00</div>
            </div>
            <button class="flex-c-m stext-104 cl0 size-105 bg3 bor2 hov-btn2 p-lr-19 trans-04">CHECKOUT</button>
        </div>
    </div>
</div>


@endsection
