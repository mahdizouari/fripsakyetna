@extends('layouts.base')

@section('title', 'Order Confirmation')

@section('content')

<div class="container">
    <div class="confirmation-page">
        <h2 class="text-center">Détails de la commande</h2>

        <!-- Payment Method Section -->
        <div class="payment-method mb-4">
            <h4>Méthode de paiement</h4>
            <p>Payer en argent comptant à la livraison.</p>
        </div>

        <!-- Order Details Section -->
        <div class="order-details">
            <h3>Détails de la commande</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->product_name }} x {{ $order->quantity }}</td>
                        <td>{{ number_format($order->total_price, 3) }} TND</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Expédition :</td>
                        <td>{{ number_format($order->shipping_cost, 3) }} TND via {{ $order->shipping_method }}</td>
                    </tr>
                    <tr>
                        <td>Sous-total :</td>
                        <td>{{ number_format($order->subtotal, 3) }} TND</td>
                    </tr>
                    <tr>
                        <td>Total :</td>
                        <td>{{ number_format($order->total, 3) }} TND</td>
                    </tr>
                    <tr>
                        <td>Moyen de paiement :</td>
                        <td>Paiement à la livraison</td>
                    </tr>
                </tfoot>
            </table>

            <!-- Option to Print Invoice -->
            <div class="print-invoice text-center mt-4">
                <a href="#" class="btn btn-primary">Imprimer la facture</a>
            </div>
        </div>
    </div>
</div>

<!-- Add some basic styling for mobile responsiveness -->
<style>
    .confirmation-page {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .payment-method, .order-details {
        margin-bottom: 20px;
    }

    .order-details table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-details th, .order-details td {
        padding: 12px;
        text-align: left;
    }

    .order-details thead th {
        background-color: #e9ecef;
        color: #495057;
    }

    .order-details tfoot td {
        font-weight: bold;
    }

    .print-invoice .btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
    }

    .print-invoice .btn:hover {
        background-color: #0056b3;
    }

    @media (max-width: 767px) {
        .order-details table th, .order-details table td {
            font-size: 14px;
            padding: 8px;
        }
    }
</style>
@endsection
