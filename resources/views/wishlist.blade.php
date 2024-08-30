@extends('layouts.base')

@section('content')
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        @if (empty($wishlistItems))
            <p class="text-center stext-101 cl2 p-t-20">
                Aucun produit dans la liste de souhaits.
            </p>
        @else
            <div class="row">
                @foreach ($wishlistItems as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('/' . $product->image1) }}" alt="IMG-PRODUCT">
                                <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                        Retirer
                                    </button>
                                </form>
                                
                            </div>
                            
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>
                                    <span class="stext-105 cl3">
                                        {{ number_format($product->prix, 2) }}DT
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
