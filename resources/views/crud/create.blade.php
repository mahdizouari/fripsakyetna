@extends('crud.admin')

@section('content')
<title>Ajout de produit</title>

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
                    <h4>Ajouter un produit
                        <a href="{{ url('dashboard') }}" class="btn btn-primary float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" style="height: 38px;">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3" >
                            <label for="taille" class="form-label">Taille</label>
                            <select id="taille" name="taille" class="form-control" style="height: 38px;">
                                <option value="S" {{ old('taille') == 'S' ? 'selected' : '' }}>S</option>
                                <option value="M" {{ old('taille') == 'M' ? 'selected' : '' }}>M</option>
                                <option value="L" {{ old('taille') == 'L' ? 'selected' : '' }}>L</option>
                                <option value="XL" {{ old('taille') == 'XL' ? 'selected' : '' }}>XL</option>
                                <option value="XXL" {{ old('taille') == 'XXL' ? 'selected' : '' }}>XXL</option>
                            </select>
                            @error('taille') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix (DT)</label>
                            <input type="text" name="prix" id="prix" class="form-control" value="{{ old('prix') }}" style="height: 38px !important;;">
                            @error('prix') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catégorie</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="homme" name="Catégorie" class="form-check-input" value="homme" {{ old('Catégorie') == 'homme' ? 'checked' : '' }}>
                                <label for="homme" class="form-check-label">Homme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="femme" name="Catégorie" class="form-check-input" value="femme" {{ old('Catégorie') == 'femme' ? 'checked' : '' }}>
                                <label for="femme" class="form-check-label">Femme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="enfant" name="Catégorie" class="form-check-input" value="enfant" {{ old('Catégorie') == 'enfant' ? 'checked' : '' }}>
                                <label for="enfant" class="form-check-label">Enfant</label>
                            </div>
                            @error('Catégorie') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Référence" class="form-label">Référence</label>
                            <input type="text" id="Référence" name="Référence" class="form-control" value="{{ old('Référence') }}" style="height: 38px;">
                            @error('Référence') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ old('is_active') ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">Is Active</label>
                            </div>
                            @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control" style="height: 38px;"/>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
