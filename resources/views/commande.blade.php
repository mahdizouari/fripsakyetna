@extends('crud.admin')

@section('content')
<div class="commande-container">
    <h3>Liste des Commandes</h3>

    @if($commandes->isEmpty())
        <p>Aucune commande n'a été trouvée.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom du Produit</th>
                    <th>Nom du Client</th>
                    <th>Numéro de Téléphone</th>
                    <th>Adresse</th>
                    <th>Prix</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->nom_de_produit }}</td>
                    <td>{{ $commande->nom_de_client }}</td>
                    <td>{{ $commande->numero_de_client }}</td>
                    <td>{{ $commande->adresse }}</td>
                    <td>{{ $commande->prix }}</td>
                    <td>{{ $commande->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
