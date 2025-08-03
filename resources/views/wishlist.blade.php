@extends('layouts.base')

@section('content')
<div class="cart-wrap m-t-23 p-b-140 flex-grow">
    <div class="container p-t-50 p-b-225 card">
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
                                    
                               <div class="name-product">
                                    <a href="{{ route('detail', $product->id) }}" 
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 block break-words line-clamp-2 w-[100px]">
                                        {{ $product->name }}
                                    </a>
                                </div>



                                    <div class="img-product">
                                        <img src="{{ asset('/' . $product->image1) }}" alt="{{ $product->name }}" class="mCS_img_loaded">
                                    </div>
                                </div>
                            </td>
                            <td width="15%" class="price">{{ number_format($product->prix, 2) }}DT</td>
                            <td width="15%">
                                
                                <button class="cart-btn js-add-to-cart round-black-btn small-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                    data-price="{{ $product->prix }}">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </td>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    document.querySelectorAll('.js-add-to-cart').forEach(button => {
                                        button.addEventListener('click', function () {
                                            const productId = this.dataset.id;
                                            const productName = this.dataset.name;
                                            const productPrice = this.dataset.price;

                                            // Send AJAX POST request to Laravel
                                            fetch(`/panier/add/${productId}`, {
                                                method: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                    'Content-Type': 'application/json'
                                                },
                                                body: JSON.stringify({})
                                            })
                                                .then(response => {
                                                    if (!response.ok) throw new Error('Request failed');
                                                    return response.json();
                                                })
                                                .then(data => {
                                                    // Facebook Pixel: AddToCart
                                                    fbq('track', 'AddToCart', {
                                                        content_ids: [productId],
                                                        content_name: productName,
                                                        value: productPrice,
                                                        currency: 'TND',
                                                        content_type: 'product'
                                                    });

                                                    // Refresh the page
                                                    window.location.reload();
                                                })
                                                .catch(err => {
                                                    console.error(err);
                                                    // Optional: You can log or handle the error differently if needed
                                                });
                                        });
                                    });
                                });
                            </script>

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
<style>
/* Black pill button */
.round-black-btn{
    background:#000;        /* solid black */
    color:#fff;             /* white text & icon */
    border:none;
    border-radius:50px;
    padding:6px 14px;
    transition:filter .25s ease;
}

/* keep icon same colour as text */
.round-black-btn i{color:inherit;}

/* Hover / focus—stay black, just dim slightly */
.round-black-btn:hover,
.round-black-btn:focus{
    background:#000;        /* still black */
    color:#fff;
    filter:brightness(85%); /* subtle effect, no yellow */
}
</style>

