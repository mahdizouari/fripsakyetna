<!-- resources/views/cart.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 30px;
        }
        .table img {
            max-width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 1rem 0.5rem;
                font-size: 1rem;
            }
            h2 {
                font-size: 2rem;
            }
            .btn {
                font-size: 1rem;
            }
        }
        @media (max-width: 576px) {
            .table-responsive {
                border: 0;
            }
            .table {
                margin-bottom: 0;
            }
            .table th, .table td {
                padding: 1rem 0.5rem;
                font-size: 1rem;
            }
            h2 {
                font-size: 1.75rem;
            }
            .btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Shopping Cart</h2>
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="bg-primary text-white">
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
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Votre panier est vide.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        <a href="/" class="btn btn-primary btn-lg">Retourner à la page principale</a>
    </div>
</div>
</body>
</html>
