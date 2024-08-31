@extends('layouts.base')

@section('content')
<div class="cart-wrap bg0 m-t-23 p-b-140">
    <div class="container">
        @if (empty($wishlistItems))
            <p class="text-center stext-101 cl2 p-t-20">
                Aucun produit dans la liste de souhaits.
            </p>
        @else
            <div class="main-heading mb-10">Ma liste de souhaits</div>
            <div class="table-wishlist">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <thead>
                        <tr>
                            <th width="45%">Nom du produit</th>
                            <th width="15%">Prix</th>
                            <th width="15%"></th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlistItems as $product)
                        <tr>
                            <td width="45%">
                                <div class="display-flex align-center">
                                    <div class="img-product">
                                        <img src="{{ asset('/' . $product->image1) }}" alt="{{ $product->name }}" class="mCS_img_loaded">
                                    </div>
                                    <div class="name-product">
                                        <a href="{{ route('detail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td width="15%" class="price">{{ number_format($product->prix, 2) }}DT</td>
                            <td width="15%">
                                <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="round-black-btn small-btn">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </td>

                            <td width="10%" class="text-center">
                                <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="trash-icon" style="background:none; border:none;">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
