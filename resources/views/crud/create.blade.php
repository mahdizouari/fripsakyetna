@extends('crud.admin')

@section('content')
<title>Ajout de produit</title>
<style>
    .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem; /* Increased padding for more space */
    border-radius: 12px; /* Slightly increased border radius for a softer look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
    width: 100%; /* Changed to 100% for responsiveness */
    max-width: 500px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Added border for a subtle edge */
    
}
@media (max-width: 768px) {
    .container {
        padding: 0.5rem; /* Less padding on smaller screens */
    }

    .form-control {
        font-size: 15px; /* Smaller font size for better fit */
    }

    .btn {
        width: 100%; /* Full width buttons for better usability */
        margin-bottom: 0.5rem; /* Space between buttons */
    }

    .dashboard-button a {
        display: block;
        text-align: center; /* Center text in button on small screens */
        margin-top: 1rem; /* Margin above button */
    }
    /* General form control styles */
.form-control {
    width: 100%; /* Full width input fields */
    box-sizing: border-box; /* Ensure padding and border are included in width */
    margin-bottom: 1rem; /* Space between form fields */
}

/* Button styles */
.btn {
    display: inline-block;
    width: auto; /* Default width for larger screens */
    padding: 0.75rem 1.5rem; /* Adjust padding for better touch targets */
    font-size: 16px; /* Legible font size */
}

/* Adjust button on small screens */
@media (max-width: 768px) {
    .btn {
        font-size: 14px; /* Smaller font size for small screens */
        padding: 0.5rem 1rem; /* Less padding on smaller screens */
    }
}
/* Ensure that elements stack vertically on smaller screens */
@media (max-width: 768px) {
    .form-check-inline {
        display: block; /* Stack radio buttons vertically */
        margin-bottom: 0.5rem; /* Space between options */
    }
}


}
</style>

<div class="container mt-3">
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
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" style="height: 20px;">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2" >
                            <label for="taille" class="form-label">Taille</label>
                            <select id="taille" name="taille" class="form-control" style="height: 30px;">
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
                            <label for="image1" class="form-label">Upload Image1</label>
                            <input type="file" name="image1" id="image1" class="form-control @error('image1') is-invalid @enderror">
                            @if (isset($produit->image1))
                                <img src="{{ asset('storage/images/' . $produit->image1) }}" alt="Current Image1" width="100">
                            @endif
                            @error('image1') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image2" class="form-label">Upload Image2</label>
                            <input type="file" name="image2" id="image2" class="form-control @error('image2') is-invalid @enderror">
                            @if (isset($produit->image2))
                                <img src="{{ asset('storage/images/' . $produit->image2) }}" alt="Current Image2" width="100">
                            @endif
                            @error('image2') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image3" class="form-label">Upload Image3</label>
                            <input type="file" name="image3" id="image3" class="form-control @error('image3') is-invalid @enderror">
                            @if (isset($produit->image3))
                                <img src="{{ asset('storage/images/' . $produit->image3) }}" alt="Current Image3" width="100">
                            @endif
                            @error('image3') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
