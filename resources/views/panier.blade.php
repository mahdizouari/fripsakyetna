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
                <div class="col" style="padding-left:0;"> {{ count(Session::get('productItems', [])) }} articles</div>
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
                <div class="row border-top border-bottom py-3">
    <div class="col">PRIX TOTAL</div>
    <div class="col text-end">
        {{ number_format(collect(Session::get('productItems'))->sum('prix') + 8, 2) }} DT
    </div>
</div>

{{-- =======================  CHECKOUT / AJAX  ======================= --}}
@php
    $items = session('productItems', []);
    $contentIds = array_keys($items);
    $contentIdsJson = json_encode($contentIds);
    $totalValue = number_format(collect($items)->sum('prix') + 8, 2, '.', '');
@endphp

@if(count($items) > 0)
    <button type="button"
        class="flex-c-m stext-104 cl0 size-105 bg3 bor2 hov-btn2 p-lr-19 trans-04 js-initiate-checkout"
        data-content-ids='@json($contentIds)'
        data-value="{{ $totalValue }}"
        data-currency="TND"
        data-checkout-url="{{ route('checkout') }}">
        <!-- data-checkout-url is used to redirect after successful checkout -->
        
        Valider la commande
    </button>
@else
    <button type="button"
        class="flex-c-m stext-104 cl0 size-105 bg-secondary bor2 p-lr-19 trans-04"
        disabled>
        Valider la commande
    </button>
    <p class="text-danger mt-2">Votre panier est vide. Ajoutez des produits pour passer une commande.</p>
@endif


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const checkoutBtn = document.querySelector('.js-initiate-checkout');
    if (!checkoutBtn) return;

    checkoutBtn.addEventListener('click', () => {
        try {
            const contentIds = JSON.parse(checkoutBtn.dataset.contentIds);
            const value = parseFloat(checkoutBtn.dataset.value);
            const currency = checkoutBtn.dataset.currency;
            const redirectTo = checkoutBtn.dataset.checkoutUrl; // read from button

            // 🔹 Fire Facebook Pixel Event
            if (typeof fbq !== 'undefined') {
                fbq('track', 'InitiateCheckout', {
                    content_ids: contentIds,
                    value: value,
                    currency: currency,
                    content_type: 'product'
                });
            } else {
                console.warn('fbq is not defined');
            }

            // 🔹 Send AJAX POST to Laravel
            fetch("{{ route('checkout') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    content_ids: contentIds,
                    value: value
                })
            })
            
            .then(data => {
                // ✅ Success — redirect to checkout page
                window.location.href = redirectTo;
            })
            .catch(error => {
                console.error('Erreur lors de la commande :', error);
            });
        } catch (e) {
            console.error('Checkout error:', e);
        }
    });
});
</script>


@endsection





    </div>
</div>

@endsection
