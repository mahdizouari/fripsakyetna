<!-- resources/views/cart.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Shopping Cart</h2>
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom de produit</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Taille</th>
                <th>Catégorie</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cartItems as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50"></td>
                    <td>{{ $item['prix'] }}</td>
                    <td>{{ $item['taille'] }}</td>
                    <td>{{ $item['Catégorie'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Votre panier est vide.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
