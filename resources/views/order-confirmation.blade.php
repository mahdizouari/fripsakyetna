@extends('layouts.order-detail')

@section('title', 'Order Confirmation')

@section('content')

<div class="container mt-5 d-flex justify-content-center">
    <!-- Card with success message -->
    <div class="card text-center p-4" style="max-width: 600px;">
        <div id="confirmation-message">
            <!-- Green checkmark -->
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08-.02L11.03 8.2a.75.75 0 1 0-1.06-1.06l-2.39 2.34-1.1-1.07a.75.75 0 1 0-1.06 1.06l1.55 1.55z"/>
                </svg>
            </div>
            <!-- Success message -->
            <h2 class="mt-3">Votre commande a été enregistrée avec succès !</h2>
            <p>Merci pour votre achat.</p>
            <!-- Button to go back home -->
            <a href="{{ url('/') }}" class="btn btn-yellow mt-4">Retour à l'accueil</a>
        </div>
    </div>
</div>

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
        background-color: #e0a800; /* Yellow */
        color: #fff;
        border: none;
        border-radius: 5px;
    }

    .btn-yellow:hover {
        background-color: #e0a800; /* Darker yellow on hover */
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

@endsection
