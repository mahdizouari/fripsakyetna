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

/* General form control styles */
.form-control {
    width: 100%; /* Full width input fields */
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

/* Adjust button on small screens */
@media (max-width: 768px) {
    .btn {
        font-size: 14px; /* Smaller font size for small screens */
        padding: 0.5rem 1rem; /* Less padding on smaller screens */
        width: 100%; /* Full width buttons for better usability */
        margin-bottom: 0.5rem; /* Space between buttons */
    }
}

/* Ensure that elements stack vertically on smaller screens */
@media (max-width: 768px) {
    .form-check-inline {
        display: block; /* Stack radio buttons vertically */
        margin-bottom: 0.5rem; /* Space between options */
    }
}

/* Additional adjustments for form and container */
@media (max-width: 768px) {
    .container {
        padding: 1rem; /* Adjust padding for small screens */
        border-radius: 8px; /* Smaller border radius on small screens */
    }
    
    .form-control {
        font-size: 14px; /* Adjust font size for better readability on small screens */
    }
}

/* Enhance form labels */
.form-label {
    display: block; /* Ensure labels are on their own line */
    margin-bottom: 0.5rem; /* Space between label and input */
    font-weight: bold; /* Emphasize labels */
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
                <div class="card-header flex justify-between items-center">
                    <h4 class="text-lg font-semibold">Ajouter un produit</h4>
                    <a href="{{ url('mspace') }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">
                        Retour
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ url('create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="name" name="name" class="form-control text-capitalize " value="{{ old('name') }}" style="height: 50px;">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <label for="taille" class="form-label">Taille</label>
                            <input type="text" id="taille" name="taille" class="form-control" value="{{ old('taille') }}" placeholder="" style="height: 50px; text-transform: uppercase;">
                            @error('taille') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix (DT)</label>
                            <input type="text" name="prix" id="prix" class="form-control" value="{{ old('prix') }}" style="height: 50px !important;;">
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
                            <div class="form-check form-check-inline">
                                <input type="radio" id="accessoire" name="Catégorie" class="form-check-input" value="accessoire" {{ old('Catégorie') == 'accessoire' ? 'checked' : '' }}>
                                <label for="accessoire" class="form-check-label">Accessoires</label>
                            </div>
                            @error('Catégorie') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Référence" class="form-label">Référence</label>
                            <input type="text" id="Référence" name="Référence" class="form-control" value="{{ old('Référence') }}" style="height: 50px;">
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
                                <img src="{{ asset('/' . $produit->image1) }}" alt="Current Image1" width="100">
                            @endif
                            @error('image1') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image2" class="form-label">Upload Image2</label>
                            <input type="file" name="image2" id="image2" class="form-control @error('image2') is-invalid @enderror">
                            @if (isset($produit->image2))
                                <img src="{{ asset('/' . $produit->image2) }}" alt="Current Image2" width="100">
                            @endif
                            @error('image2') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image3" class="form-label">Upload Image3</label>
                            <input type="file" name="image3" id="image3" class="form-control @error('image3') is-invalid @enderror">
                            @if (isset($produit->image3))
                                <img src="{{ asset('/' . $produit->image3) }}" alt="Current Image3" width="100">
                            @endif
                            @error('image3') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 flex justify-center mt-5 ">
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
