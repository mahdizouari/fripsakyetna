@extends('layouts.base')

@section('title', 'Panier')

@section('content')

<div class="card p-3 flex-grow">
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
                <div class="table-responsive  w-full  ">
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>Nom </th>
                                <th>Image</th>
                                <th>Taille</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get('productItems') as $item)
                                <tr>
                                    <td class="text-break">{{ $item['name'] }}
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
           

            <div style="margin-top: 10px;">
                <form id="delete-all-form" action="{{ route('deleteItems') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btnc-delete-all" >
                        <i class="fas fa-trash-alt"></i> Supprimer tout
                    </button>
                </form>
            </div>
           





            <div class="flex-c-m flex-w w-full p-t-45 p-3">
                <a href="/" class="flex-c-m stext-100 cl5 size-104 bg2 bor1 hov-btn1 p-lr-19 trans-04">
                    Retourner à la page principale
                </a>
            </div>
            
        </div>

        <!-- Summary Section -->
        <div class="col-md-4 summary border-left p-5 mb-3 mt-2 m-auto">
            <div><h5><b>Résumé</b></h5></div>
            <hr>
            <div class="row">
                <div class="col p-3 mt-1" style="padding-left:0;"> {{ count(Session::get('productItems', [])) }} Article (s) : </div>
                <div class="col text-right ">
                    {{ number_format(collect(Session::get('productItems'))->sum('prix'), 2) }} DT
                </div>
            </div>
            <form class="mt-2">
               <p class="flex justify-between">
                    <span>FRAIS DE LIVRAISON :</span>
                    <span>8.00 DT</span>
                </p>

               
                
            </form>
            <div class="row border-top border-bottom " >
                <div class="col mt-4">PRIX TOTAL</div>
                <div class="col text-right mt-4 ">
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
        class="btn btn-black-white px-4 py-2 js-initiate-checkout mt-3"
        data-content-ids='@json($contentIds)'
        data-value="{{ $totalValue }}"
        data-currency="TND"
       >
        
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

            // 🔹 Directly redirect to the checkout page
            window.location.href = "{{ url('checkout') }}";

        } catch (e) {
            console.error('Checkout error:', e);
        }
    });
});
</script>
@endsection


<style>
    .btn-black-white {
    background-color: #000;
    color: #fff;
    border: 1px solid #000;
    transition: all 0.3s;
}

.btn-black-white:hover {
    background-color: #fff;
    color: #000;
}

 
                .btnc-delete-all {
                    background-color: white;
                    color: red;
                    border: 2px solid red;
                    padding: 10px 18px;
                    border-radius: 8px;
                    font-weight: bold;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                }

                .btnc-delete-all:hover {
                    background-color: red;
                    color: white;
                }

                .btnc-delete-all i {
                    font-size: 16px;
                }
            </style>


    </div>
</div>

@endsection
