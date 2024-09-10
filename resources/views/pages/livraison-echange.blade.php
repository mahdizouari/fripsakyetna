@extends('layouts.base')

@section('title', 'Qui sommes-nous')

@section('content')
    <div class="content-container">
        <h1>Bienvenue chez Frip Sakyetna</h1>
        <p>
            Chez Frip Sakyetna, nous nous engageons à offrir des produits de qualité et un service client irréprochable. Nous croyons que chaque client mérite d'être satisfait, que ce soit par nos vêtements soigneusement sélectionnés ou par notre service de livraison rapide et efficace.
        </p>

        <h4>Livraison Rapide et Fiable</h4>
        <p>
            Nous nous assurons que vos commandes arrivent dans les plus brefs délais. La livraison à domicile se fait en seulement <strong>48 à 72 heures</strong> partout en Tunisie. Commandez aujourd'hui, et nos livreurs seront à votre porte dans les temps pour vous remettre vos colis, où que vous soyez.
        </p>

        <h4>Horaires de Livraison</h4>
        <p>
            Les délais de livraison débutent à compter de la confirmation de votre commande. Nos jours ouvrables s'étendent du <strong>lundi au samedi</strong>, à l'exclusion des dimanches et jours fériés. Nous mettons tout en œuvre pour que vos commandes vous parviennent rapidement et sans encombre.
        </p>

        <h4>Votre Satisfaction, Notre Priorité</h4>
        <p>
            Que vous cherchiez des pièces uniques ou des classiques intemporels, Frip Sakyetna est là pour répondre à vos besoins. Merci de faire confiance à Frip Sakyetna pour vos achats, nous sommes ravis de vous compter parmi nos clients.
        </p>
    </div>

    <style>
    .container {
        max-width: 1200px;  /* Ensures the container has a maximum width */
        margin: 0 auto;  /* Centers the container */
        padding: 20px;  /* Adds padding inside the container */
    }

    .content-container {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h1, h3, h4 {
        color: #2c3e50;
    }

    p {
        font-size: 1rem;
        line-height: 1.6;
        color: #34495e;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    h3 {
        font-size: 1.75rem;
        margin-bottom: 15px;
    }

    h4 {
        font-size: 1.25rem;
        margin-bottom: 10px;
        color: #27ae60;
    }

    strong {
        color: #e74c3c;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        h3 {
            font-size: 1.5rem;
        }

        h4 {
            font-size: 1.1rem;
        }

        p {
            font-size: 0.9rem;
        }

        .container {
            padding: 10px;  /* Reduces padding on smaller screens */
        }
    }
</style>

@endsection
