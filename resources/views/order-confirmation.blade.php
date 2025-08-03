@extends('layouts.order-detail')

@section('title', 'Order Confirmation')

@section('content')

@php
    $firstOrder = $commandes->first();
@endphp

<div class="container my-5 flex-grow" style="max-width: 600px;">
    <div class="text-center mt-20 p-4 border rounded shadow-sm bg-white">
        <!-- Checkmark Icon -->
        <div class="mb-4 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green" class="bi bi-check-circle-fill mb-3" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08-.02L11.03 8.2a.75.75 0 1 0-1.06-1.06l-2.39 2.34-1.1-1.07a.75.75 0 1 0-1.06 1.06l1.55 1.55z"/>
            </svg>
        </div>



        <!-- Success Message -->
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
            Merci pour votre commande, 
            <span class="text-yellow-500">
                <br>
                {{ $firstOrder->nom_de_client ?? 'cher client' }}
            </span> 
        </h2>
        <p class="text-gray-600 text-base md:text-lg">
            Nous vous remercions pour votre confiance. Votre commande est en cours de traitement.
        </p>

        <!-- Order Summary -->
           <div class="text-left mb-6 bg-white shadow-md rounded-lg p-6">
                <h5 class="text-lg font-semibold text-gray-800 mb-4">🧾 Détails de la commande :</h5>

                <ul class="mb-4 divide-y divide-gray-200">
                    @foreach($commandes as $commande)
                        <li class="flex justify-between py-3">
                            <span class="text-gray-700">{{ $commande->nom_de_produit }}</span>
                            <span class="font-medium text-gray-900">{{ number_format($commande->prix, 2) }} TND</span>
                        </li>
                    @endforeach
                </ul>

                <div class="border-t border-gray-300 pt-4">
                    <p class="text-lg font-semibold text-gray-800">
                        Total à payer : 
                        <span class="text-green-600">{{ number_format($commandes->sum('prix') + 8, 2) }} TND</span>
                    </p>
                    <small class="text-gray-500">Frais de livraison standard inclus (8.00 TND)</small>
                </div>
            </div>


        <!-- Action Buttons -->
        <div class="d-flex justify-content-center gap-3 flex-wrap ">
            <a href="{{ url('/') }}" class="btn btn-warning px-4 py-2">Retour à l'accueil</a>
        </div>

        <!-- Support info -->
        <p class="mt-4 text-muted small ">
            Des questions ? Contactez notre support à <a href="yessin.zouari100@gmail.com">Fripsakyetna@gmail.com</a>.
        </p>
    </div>
</div>



@endsection

<!-- Add some basic styling -->
<style>
    .card {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        }

    #confirmation-message svg {
        width: 80px;
        height: 80px;
        color: green;
    }

    #confirmation-message h2 {
        color: #28a745;
    }

    .btn-yellow {
        padding: 10px 20px;
        font-size: 16px;
        background-color:rgb(67, 189, 30); /* Yellow */
        color:#28a745;
        border: none;
        border-radius: 5px;
    }

    .btn-yellow:hover {
        background-color:rgb(97, 163, 47); /* Darker yellow on hover */
    }

    @media (max-width: 768px) {
        .card {
            padding: 20px;
        }

        .btn-yellow {
            font-size: 14px;
            padding: 8px 16px;
        }
    }
</style>

