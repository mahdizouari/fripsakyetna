@extends('crud.admin')

@section('content')

<title>Modification du produit</title>
<style>
    .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem; /* Increased padding for more space */
    border-radius: 12px; /* Slightly increased border radius for a softer look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
    width: 100%; /* Changed to 100% for responsiveness */
    max-width: 1000px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Added border for a subtle edge */
}
@media (max-width: 768px) {
    .container {
        padding: 0.5rem; /* Less padding on smaller screens */
    }

    .form-control {
        font-size: 14px; /* Smaller font size for better fit */
    }

    .btn {
        width: 100%; /* Full width buttons for better usability */
        margin-bottom: 0.5rem; /* Space between buttons */
        font-size: 14px; /* Smaller font size for small screens */
        padding: 0.5rem 1rem; /* Less padding on smaller screens */
    }

    .dashboard-button a {
        display: block;
        text-align: center; /* Center text in button on small screens */
        margin-top: 1rem; /* Margin above button */
    }

    .form-check-inline {
        display: block; /* Stack radio buttons vertically */
        margin-bottom: 0.5rem; /* Space between options */
    }
}
</style>

<div class="container mt-4">
    

    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Modifier un produit
                        <a href="{{ url('dashboard') }}" class="btn btn-primary float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('edit/' . $produit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $produit->name) }}">
                            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="taille" class="form-label">Taille</label>
                            <select id="taille" name="taille" class="form-control @error('taille') is-invalid @enderror">
                                <option value="S" {{ old('taille', $produit->taille) == 'S' ? 'selected' : '' }}>S</option>
                                <option value="M" {{ old('taille', $produit->taille) == 'M' ? 'selected' : '' }}>M</option>
                                <option value="L" {{ old('taille', $produit->taille) == 'L' ? 'selected' : '' }}>L</option>
                                <option value="XL" {{ old('taille', $produit->taille) == 'XL' ? 'selected' : '' }}>XL</option>
                                <option value="XXL" {{ old('taille', $produit->taille) == 'XXL' ? 'selected' : '' }}>XXL</option>
                            </select>
                            @error('taille') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $produit->prix) }}">
                            @error('prix') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catégorie</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="homme" name="Catégorie" class="form-check-input @error('Catégorie') is-invalid @enderror" value="homme" {{ old('Catégorie', $produit->Catégorie) == 'homme' ? 'checked' : '' }}>
                                <label for="homme" class="form-check-label">Homme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="femme" name="Catégorie" class="form-check-input @error('Catégorie') is-invalid @enderror" value="femme" {{ old('Catégorie', $produit->Catégorie) == 'femme' ? 'checked' : '' }}>
                                <label for="femme" class="form-check-label">Femme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="enfant" name="Catégorie" class="form-check-input @error('Catégorie') is-invalid @enderror" value="enfant" {{ old('Catégorie', $produit->Catégorie) == 'enfant' ? 'checked' : '' }}>
                                <label for="enfant" class="form-check-label">Enfant</label>
                            </div>
                            @error('Catégorie') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Référence" class="form-label">Référence</label>
                            <input type="text" id="Référence" name="Référence" class="form-control @error('Référence') is-invalid @enderror" value="{{ old('Référence', $produit->Référence) }}">
                            @error('Référence') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ old('is_active', $produit->is_active) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">Is Active</label>
                            </div>
                            @error('is_active') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @if ($produit->image)
                                <img src="{{ asset('storage/privates/' . $produit->image) }}" alt="Current Image" width="100">
                            @endif
                            @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
