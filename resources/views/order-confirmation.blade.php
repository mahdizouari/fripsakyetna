@extends('layouts.order-detail')

@section('title', 'Order Confirmation')

@section('content')

<div class="container mt-5">
    <div class="card order-details">
        <div class="">
            <h3 class="card-title mb-1">Détails de la commande</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $subtotal = 0;
                    $shipping_cost = 8; // Fixed shipping cost
                @endphp

                <!-- Loop through all products in the order -->
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{ $commande->nom_de_produit }}</td>
                        <td>{{ number_format($commande->prix , 3) }} TND</td> <!-- Total per product -->
                    </tr>
                    @php
                        $subtotal += $commande->prix;  // Add product price to subtotal
                    @endphp
                @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Sous-total :</strong></td>
                        <td>{{ number_format($subtotal, 3) }} TND</td>
                    </tr>
                    <tr>
                        <td><strong>Expédition :</strong></td>
                        <td>{{ number_format($shipping_cost, 3) }} TND via Livraison dans (48h-72h)</td>
                    </tr>

                    <!-- Display address, assuming all products share the same delivery address -->
                    @if($commandes->isNotEmpty())
                        <tr>
                            <td><strong>Adresse :</strong></td>
                            <td>{{ $commandes->first()->adresse }}</td> <!-- Use the address of the first product in the list -->
                        </tr>
                    @endif

                    <tr>
                        <td><strong>Total :</strong></td>
                        <td>{{ number_format($subtotal + $shipping_cost, 3) }} TND</td>
                    </tr>
                    <tr>
                        <td><strong>Moyen de paiement :</strong></td>
                        <td>Paiement à la livraison</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="#" class="btn btn-primary">Imprimer la facture</a>
        </div>
    </div>
</div>


<!-- Add some basic styling for mobile responsiveness -->
<style>
    .order-details {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .order-details .table th, .order-details .table td {
        padding: 12px;
        vertical-align: middle;
    }

    .order-details .card-header {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .order-details .card-footer {
        background-color: #f8f9fa;
        padding: 15px;
    }

    .order-details .btn {
        padding: 10px 20px;
    }

    @media (max-width: 768px) {
        .order-details .table th, .order-details .table td {
            font-size: 14px;
            padding: 8px;
        }

        .order-details .card-header {
            font-size: 1.25rem;
        }

        .order-details .btn {
            padding: 8px 16px;
            font-size: 14px;
        }
    }
</style>

@endsection
