@extends('layouts.order-detail')

@section('title', 'Order Confirmation')

@section('content')

@php
    $firstOrder = $commandes->first();
@endphp

<div class="container my-5" style="max-width: 600px;">
    <div class="text-center p-4 border rounded shadow-sm bg-white">
        <!-- Checkmark Icon -->
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="green" class="bi bi-check-circle-fill mb-3" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08-.02L11.03 8.2a.75.75 0 1 0-1.06-1.06l-2.39 2.34-1.1-1.07a.75.75 0 1 0-1.06 1.06l1.55 1.55z"/>
            </svg>
        </div>

        <!-- Success Message -->
        <h2 class="mb-2">Merci pour votre commande, <strong>{{ $firstOrder->nom_de_client ?? 'cher client' }}</strong>!</h2>
        <p class="text-muted mb-4">Votre commande <strong>#{{ $firstOrder->id }}</strong> a été enregistrée avec succès.</p>

        <!-- Order Summary -->
        <div class="text-start mb-4">
            <h5>Détails de la commande :</h5>
            <ul class="list-group mb-3">
                @foreach($commandes as $commande)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $commande->nom_de_produit }}
                        <span>{{ number_format($commande->prix, 2) }} TND</span>
                    </li>
                @endforeach
            </ul>

            <p>
                <strong>Total à payer: </strong>
                {{ number_format($commandes->sum('prix'), 2) }} TND
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-center gap-3 flex-wrap ">
            <a href="{{ url('/') }}" class="btn btn-warning px-4 py-2">Retour à l'accueil</a>
        </div>

        <!-- Support info -->
        <p class="mt-4 text-muted small ">
            Des questions ? Contactez-nous à <a href="yessin.zouari100@gmail.com">yessin.zouari100@gmail.com</a>.
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

