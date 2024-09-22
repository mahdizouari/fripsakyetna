@extends('crud.admin')

@section('content')

<title>Modification du produit</title>


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
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $produit->name) }}" style="height: 50px;">
                            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="taille" class="form-label">Taille</label>
                            <input type="text" id="taille" name="taille" class="form-control" value="{{ old('taille', $produit->taille ) }}" placeholder="" style="height: 50px; text-transform: uppercase;" oninput="this.value = this.value.toUpperCase();">
                            @error('taille') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $produit->prix) }}" style="height: 50px;">
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
                            <div class="form-check form-check-inline">
                                <input type="radio" id="accessoire" name="Catégorie" class="form-check-input" value="accessoire" {{ old('Catégorie') == 'accessoire' ? 'checked' : '' }}>
                                <label for="accessoire" class="form-check-label">Accessoires</label>
                            </div>
                            @error('Catégorie') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Référence" class="form-label">Référence</label>
                            <input type="text" id="Référence" name="Référence" class="form-control @error('Référence') is-invalid @enderror" value="{{ old('Référence', $produit->Référence) }}" style="height: 50px;">
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
                            <label for="image1" class="form-label">Upload Image1</label>
                            <input type="file" name="image1" id="image1" class="form-control @error('image1') is-invalid @enderror" >
                            @if ($produit->image1)
                                <img src="{{ asset('/' . $produit->image1) }}" alt="Current Image" width="100" >
                            @endif
                            @error('image1') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image2" class="form-label">Upload Image2</label>
                            <input type="file" name="image2" id="image2" class="form-control @error('image2') is-invalid @enderror">
                            @if ($produit->image2)
                                <img src="{{ asset('/' . $produit->image2) }}" alt="Current Image" width="100">
                            @endif
                            @error('image2') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image3" class="form-label">Upload Image3</label>
                            <input type="file" name="image3" id="image3" class="form-control @error('image3') is-invalid @enderror">
                            @if ($produit->image3)
                                <img src="{{ asset('/' . $produit->image3) }}" alt="Current Image" width="100">
                            @endif
                            @error('image3') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
