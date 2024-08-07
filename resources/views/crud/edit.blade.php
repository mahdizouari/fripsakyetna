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
    width: 80%; /* Changed to 100% for responsiveness */
    max-width: 1000px; /* Increased max-width for larger screens */
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Added border for a subtle edge */
}

/* General form control styles */
.form-control {
    width: 60%; /* Full width input fields */
    box-sizing: border-box; /* Ensure padding and border are included in width */
    margin-bottom: 1rem; /* Space between form fields */
    padding: 0.75rem; /* Padding for input fields */
    border-radius: 8px; /* Rounded corners for input fields */
    border: 1px solid #ccc; /* Light border for input fields */
}

/* Button styles */
.btn {
    display: inline-block;
    width: auto; /* Default width for larger screens */
    padding: 0.75rem 1.5rem; /* Adjust padding for better touch targets */
    font-size: 16px; /* Legible font size */
    border-radius: 8px; /* Rounded corners for buttons */
    border: none; /* Remove default border */
    background-color: #007bff; /* Primary button color */
    color: #fff; /* Text color */
    text-align: center; /* Center text in button */
    transition: background-color 0.3s ease; /* Smooth transition on hover */
}

.btn:hover {
    background-color: #0056b3; /* Darker button color on hover */
}

/* Adjustments for small screens */
@media (max-width: 768px) {
    .container {
        padding: 0.5rem; /* Less padding on smaller screens */
        border-radius: 8px; /* Smaller border radius on small screens */
    }

    .form-control {
        font-size: 14px; /* Smaller font size for better fit on small screens */
        padding: 0.5rem; /* Adjust padding for smaller input fields */
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
                            <label for="image1" class="form-label">Upload Image1</label>
                            <input type="file" name="image1" id="image1" class="form-control @error('image1') is-invalid @enderror" >
                            @if ($produit->image1)
                                <img src="{{ asset('/' . $produit->image1) }}" alt="Current Image" width="100">
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
