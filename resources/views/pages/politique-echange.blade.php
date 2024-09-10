@extends('layouts.base')

@section('title', 'Politique d\'échange')

@section('content')

<div class="container">
    <div class="content-container">
        <h1>Politique d'échange et de retour</h1>
        <p>
            Lors de la passation de votre commande, vous avez accepté les termes et conditions de la politique d’échange.
        </p>

        <h3>Conditions de retour et d'échange :</h3>
        <ul>
            <li>
                <strong>Gratuit :</strong> Le retour d’un colis est gratuit si le produit est erroné, cassé ou endommagé dans les 24H suivant la réception.
            </li>
            <li>
                <strong>Délai :</strong> Les produits peuvent être échangés ou retournés dans les 24H suivant la réception.
            </li>
        </ul>

        <h3>Livraison rapide et fiable :</h3>
        <p>
            Nous avons signé une convention avec une société de livraison pour assurer une réception de votre commande sous 24h à 72h maximum. La livraison couvre tout le territoire tunisien, pour une commission estimée à 8DT.
        </p>

        <h3>Conditions d'échange :</h3>
        <ul>
            <li>
                <strong>Retour gratuit :</strong> L’échange d’un produit endommagé est gratuit s’il est signalé dans les 24H après réception.
            </li>
            <li>
                <strong>Frais au-delà de 24H :</strong> Si la panne est signalée après 24H, l’article sera récupéré, réparé et retourné pour des frais de 16DT (aller/retour).
            </li>
            <li>
                <strong>Utilisation :</strong> L’article perdra sa garantie s’il présente des signes d’utilisation.
            </li>
        </ul>

        <h3>Remboursements :</h3>
        <p>
            Nous n’avons pas de procédure de remboursement si le client change d’avis ou n’aime pas le produit après l’achat.
        </p>

        <h3>Preuves requises :</h3>
        <p>
            Pour échanger un produit endommagé ou erroné, des preuves (photos/vidéos) doivent être soumises via notre plateforme de réclamations. Les réclamations via Messenger ou e-mail ne sont pas acceptées.
        </p>

        <h3>Couleurs et frais :</h3>
        <p>
            Si un article reçu n’est pas de la couleur souhaitée, et que la couleur n’a pas été confirmée lors de la commande, des frais de 16DT seront appliqués pour l’échange selon la disponibilité des couleurs.
        </p>

        <h3>Critères d'éligibilité pour retour :</h3>
        <ul>
            <li>Les articles ne doivent présenter aucun signe d’usure ou d’utilisation.</li>
            <li>L'article doit être renvoyé avec son emballage d'origine et ses accessoires.</li>
            <li>L'article doit conserver son étiquette et l'emballage original.</li>
        </ul>
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

    p, li {
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

        p, li {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
