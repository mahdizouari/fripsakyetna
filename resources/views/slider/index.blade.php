@extends('crud.admin')

@section('content')


  
    <title>Welcome, {{ auth()->user()->name }}</title>
    <style>
        .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem; /* Increased padding for more space */
    border-radius: 12px; /* Slightly increased border radius for a softer look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
    width: 150%; /* Changed to 100% for responsiveness */
    max-width: 1000px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Added border for a subtle edge */
}
@media (max-width: 768px) {
    .container {
        padding: 0.5rem; /* Less padding on smaller screens */
    }

    .form-control {
        font-size: 20px; /* Smaller font size for better fit */
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
    width: 1000%; /* Full width input fields */
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




}


    </style>

<body>
    <div class="container mt-5">
        <h1>Image Slider</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slider1.jpg') }}" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slider2.jpg') }}" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slider3.jpg') }}" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
    
   

  


     

@endsection
