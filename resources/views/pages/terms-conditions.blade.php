@extends('layouts.base')

@section('title', 'Termes et Conditions')

@section('content')

<div class="container">
    <div class="content-container">
        <h1>Termes et Conditions</h1>

        <h3>ARTICLE 1 : APPLICATION DES CONDITIONS GÉNÉRALES DE VENTE</h3>
        <p>
            Les conditions générales de vente détaillées ci-dessous s’appliquent à toutes les commandes de produits et services passées via le site (les “Produits”) auprès de « Frip Sakyetna » par toute personne (le “Client”).
        </p>
        <p>
            Frip Sakyetna recommande de prendre connaissance régulièrement des CGV avant toute commande, pour être informé des modifications ou mises à jour. En passant commande, le Client accepte sans réserve ces CGV en cochant la case “J’ai lu et j’accepte les conditions générales de vente”.
        </p>

        <h3>ARTICLE 2 : RÈGLES DE CONFIDENTIALITÉ GÉNÉRAL</h3>
        <p>
            www.fripsakyetna.tn est un site de commerce électronique appartenant et géré par Frip Sakyetna. Le site est accessible à tous les utilisateurs 24/24h, 7/7j, sauf interruption pour maintenance programmée ou non.
        </p>

        <h3>ARTICLE 3 : INTERDICTION D’EXPLOITATION DU CONTENU</h3>
        <p>
            Toute reproduction, représentation, intégrale ou partielle, des pages, des données ou de tout élément constitutif du site www.fripsakyetna.tn sans autorisation constitue une contrefaçon. L’utilisation à des fins commerciales ou professionnelles est interdite sans autorisation.
        </p>

        <h3>ARTICLE 4 : COMPTE CLIENT</h3>
        <p>
            Pour passer une commande, le Client doit créer un compte en remplissant un formulaire avec des informations exactes. Après création, un e-mail de confirmation est envoyé. Le Client est responsable de la mise à jour des informations. La création du compte entraîne l’acceptation des présentes CGV.
        </p>

        <h3>ARTICLE 5 : RÈGLES DE CONFIDENTIALITÉ POUR LE CLIENT</h3>
        <p>
            Frip Sakyetna s’engage à protéger la vie privée de ses clients. Les données recueillies sont nécessaires pour le traitement et la livraison des commandes, et peuvent être partagées avec des partenaires pour ces tâches.
        </p>

        <h3>ARTICLE 6 : PRODUITS</h3>
        <p>
            Les produits disponibles à la vente sont ceux décrits sur le site, sous réserve de disponibilité. En cas d’indisponibilité d’un produit, le service client informera le Client dans les 48 heures suivant la commande.
        </p>

        <h3>ARTICLE 7 : COMMANDES</h3>
        <p>
            Le Client sélectionne les produits qu’il souhaite commander sur www.fripsakyetna.tn. Le Panier récapitule les produits, leurs prix et les frais de livraison. Le Client peut modifier son panier avant validation. Après validation, un e-mail de confirmation est envoyé.
        </p>

        <h3>ARTICLE 8 : PRIX ET CONDITIONS DE PAIEMENT</h3>
        <p>
            Les prix sont indiqués en dinars tunisiens (TND) et incluent la TVA. Les frais de livraison sont ajoutés au prix des produits. Le paiement est à la réception de la commande en espèces. Une facture est remise au moment de la livraison.
        </p>

        <h3>ARTICLE 9 : LIVRAISON</h3>
        <p>
            Frip Sakyetna livre sur tout le territoire tunisien. La livraison est gratuite à partir de 200 TND. Le Client peut choisir la livraison à domicile ou en point relais. Les délais de livraison sont de 2 à 5 jours ouvrés.
        </p>

        <h3>ARTICLE 12 : DONNÉES PERSONNELLES ET COOKIES</h3>
        <p>
            Frip Sakyetna s’engage à ne pas partager ou revendre les informations personnelles de ses clients. Le site utilise des cookies pour améliorer l’expérience utilisateur. L’utilisation des cookies est soumise à l’acceptation de l’utilisateur.
        </p>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .content-container {
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h1, h3 {
        color: #2c3e50;
        margin-bottom: 15px;
    }

    p, ul {
        font-size: 1rem;
        line-height: 1.6;
        color: #34495e;
        margin-bottom: 10px;
    }

    ul {
        list-style-type: disc;
        margin-left: 20px;
    }

    li {
        margin-bottom: 10px;
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

        p {
            font-size: 0.9rem;
        }
    }
</style>

@endsection
