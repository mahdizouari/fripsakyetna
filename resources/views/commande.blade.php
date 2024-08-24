@extends('crud.admin')
<style>

    .commande-container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 2rem;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.commande-title {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.no-commandes {
    font-size: 1.2rem;
    color: #777;
}

.commande-table {
    width: 100%;
    border-collapse: collapse;
}

.commande-table th, .commande-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
    color: #333;
}

.commande-table th {
    background-color: #27ae60;
    color: #fff;
}

.commande-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.btn-edit, .btn-delete {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
}

.btn-edit {
    background-color: #2980b9;
}

.btn-edit:hover {
    background-color: #3498db;
}

.btn-delete {
    background-color: #e74c3c;
}

.btn-delete:hover {
    background-color: #c0392b;
}

.inline-form {
    display: inline;
}

</style>

@section('content')
<div class="commande-container">
    <h3 class="commande-title">Liste des Commandes</h3>

    @if($commandes->isEmpty())
        <p class="no-commandes">Aucune commande n'a été trouvée.</p>
    @else
        <table class="commande-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom du Produit</th>
                    <th>Nom du Client</th>
                    <th>Numéro de Téléphone</th>
                    <th>Adresse</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->nom_de_produit }}</td>
                    <td>{{ $commande->nom_de_client }}</td>
                    <td>{{ $commande->numero_de_client }}</td>
                    <td>{{ $commande->adresse }}</td>
                    <td>{{ $commande->prix }} DT</td>
                    <td>{{ $commande->date }}</td>
                    <td class="action-buttons">
                        <form action="{{ route('commande.destroy', $commande->id) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
