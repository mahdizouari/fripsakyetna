<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'lg') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        .custom-background {
            background-image: url('hexagon.svg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .custom-logo {
            width: 80px;
            height: 80px;
            animation: spin 5s linear infinite, bounce 2s infinite;
        }

        /* Spin animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Bounce animation */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        .form-container {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            height: 100%;
            max-height:1300px ;
            margin: auto;
            margin-bottom: 3rem;

        }

        .header-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 3rem;
        }

        .header-logo img {
            width: 100px;
            height: 100px;
        }

        .form-container {
            background-color: #f0f4f8; /* Light grey background */
            padding: 3rem;
            border-radius: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .mspace-button {
            display: flex;
            justify-content: flex-end;
            margin-top:1rem;
        }

        .mspace-button a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            background-color: #3490dc; /* Blue color */
            color: #ffffff;
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
        margin-bottom: 1rem; /* Space between buttons */
    }

    .mspace-button a {
        display: block;
        text-align: left; /* Center text in button on small screens */
        margin-top: 1rem; /* Margin above button */
    }
}


    </style>
</head>
<body class=" custom-background">
    <div class="">
        <div class="header-logo">
            <a href="/">
                <img src="yessin.png" alt="Logo" class="custom-logo"> <!-- Path to your logo image -->
            </a>
        </div>

        <div >
            <div class="form-container">
                {{ $slot }}
                
            </div>
            
        </div>
    </div>
</body>
</html>
