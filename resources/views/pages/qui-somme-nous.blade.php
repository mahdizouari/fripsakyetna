@extends('layouts.base')

@section('title', 'Qui sommes-nous')

@section('content')

<div class="container">
    <div class="content-container">
        <h1>Qui sommes-nous ?</h1>

        <h3>Frip Sakyetna : Une Boutique 100% Tunisienne</h3>
        <p>
            FripSakyetna.tn est une boutique 100% tunisienne, fondée par une équipe jeune et passionnée, toujours à la recherche d'innovations et de nouvelles tendances. À travers notre plateforme, nous mettons en relation de nombreux acheteurs et vendeurs à travers tout le territoire tunisien. Nous proposons la plus grande diversité d'offres e-commerce au meilleur prix.
        </p>

        <h3>Nos divers services</h3>
        <p>
            Nous sommes spécialisés dans la vente de vêtements et accessoires de mode, avec une large gamme de produits pour hommes, femmes et enfants. Nos articles incluent des vêtements de seconde main soigneusement sélectionnés, des accessoires de mode tendance, ainsi que des chaussures et articles de maroquinerie. Nous garantissons des produits de qualité à des prix abordables, tout en offrant aux particuliers et aux entrepreneurs la possibilité de devenir revendeurs sur notre plateforme.
        </p>

        <h3>Notre service de livraison</h3>
        <p>
            Grâce à notre équipe de professionnels, nous assurons une livraison rapide et fiable sur l’ensemble du territoire tunisien, avec des délais variant entre 24H et 72H. Nous proposons des frais de livraison compétitifs de seulement 6 DT, avec l’option de paiement à la livraison. Afin de fidéliser notre clientèle, nous avons simplifié notre politique d'échange tout en respectant les normes internationales de qualité pour la livraison à domicile et les services après-vente.
        </p>

        <h3>Coopérer avec nous !</h3>
        <p>
            Frip Sakyetna est à la recherche de partenaires logistiques fiables. Si vous respectez vos engagements en termes de délais et que vous êtes intéressé par un partenariat à long terme, nous serions ravis d’étudier votre candidature. N’hésitez pas à nous contacter pour en savoir plus !
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

    p {
        font-size: 1rem;
        line-height: 1.6;
        color: #34495e;
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
