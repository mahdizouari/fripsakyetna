<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Modification de produit</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
    <a href="/dashboard" class="btn btn-primary btn-sm">Dashboard</a>
</div>
<div class="navbar-logo">
    <a href="/" class="btn btn-primary btn-sm">Home</a>
</div>

      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children">
           
          
          </li>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z" />
                  <path
                    d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z" />
                </svg>
              </span>
              <span class="text">Pages</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                <a href="settings.html"> Paramètres </a>
              </li>
              <li>
                <a href="/product"> Produits </a>
              </li>
              <li>
                <a href="/cart"> Panier </a>
              </li>
              <li>
                <a href="/about"> About </a>
              </li>
            </ul>
          </li>
         
        </ul>
      </nav>
      
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn me-3">
                            <button id="menu-toggle" class="btn btn-primary">
                                <i class="lni lni-chevron-left me-2"></i> Menu
                            </button>
                        </div>
                        <div class="header-search d-none d-md-flex">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search..." />
                                <button class="btn btn-outline-secondary" type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <!-- Profile Start -->
                        <div class="profile-box ms-3">
                            <button class="btn dropdown-toggle bg-transparent border-0 d-flex align-items-center" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="profile-info d-flex align-items-center">
                                    @auth
                                        <div class="image">
                                            @if(auth()->user()->email === 'yessin.zouari100@gmail.com')
                                                <img src="{{ asset('assets/images/profile/yessin.png') }}" alt="image">
                                            @elseif(auth()->user()->email === 'akrambahloul2@gmail.com')
                                                <img src="{{ asset('assets/images/profile/akram.png') }}" alt="image">
                                            @endif
                                        </div>
                                    @endauth
                                    <div class="ms-2">
                                        @auth
                                            <h6 class="fw-500 mb-0">{{ auth()->user()->name }}</h6>
                                        @endauth
                                        <p class="text-muted mb-0">Admin</p>
                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li>
                                    <div class="d-flex align-items-center p-2">
                                        @auth
                                            <div class="image">
                                                @if(auth()->user()->email === 'yessin.zouari100@gmail.com')
                                                    <img src="{{ asset('assets/images/profile/yessin.png') }}" alt="image">
                                                @elseif(auth()->user()->email === 'akrambahloul2@gmail.com')
                                                    <img src="{{ asset('assets/images/profile/akram.png') }}" alt="image">
                                                @endif
                                            </div>
                                        @endauth
                                        <div class="ms-2">
                                            @auth
                                                <h6 class="fw-500 mb-0">{{ auth()->user()->name }}</h6>
                                                <a class="text-muted text-xs" href="#">{{ auth()->user()->email }}</a>
                                            @endauth
                                        </div>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="/profile" class="dropdown-item"><i class="lni lni-user me-2"></i> View Profile</a></li>
                                <li><a href="#0" class="dropdown-item"><i class="lni lni-alarm me-2"></i> Notifications</a></li>
                                <li><a href="#0" class="dropdown-item"><i class="lni lni-inbox me-2"></i> Messages</a></li>
                                <li><a href="#0" class="dropdown-item"><i class="lni lni-cog me-2"></i> Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="lni lni-exit me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- Profile End -->
                    </div>
                </div>
            </div>
        </div>
    </header>
      <!-- ========== header end ========== -->
      

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
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $produit->name }}">
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ $produit->description }}</textarea>
                                @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="text" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $produit->prix ?? '') }}">
                                @error('prix') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catégorie</label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="homme" name="Catégorie" class="form-check-input @error('Catégorie') is-invalid @enderror" value="homme" {{ $produit->Catégorie == 'homme' ? 'checked' : '' }}>
                                    <label for="homme" class="form-check-label">Homme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="femme" name="Catégorie" class="form-check-input @error('Catégorie') is-invalid @enderror" value="femme" {{ $produit->Catégorie == 'femme' ? 'checked' : '' }}>
                                    <label for="femme" class="form-check-label">Femme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="enfant" name="Catégorie" class="form-check-input @error('Catégorie') is-invalid @enderror" value="enfant" {{ $produit->Catégorie == 'enfant' ? 'checked' : '' }}>
                                    <label for="enfant" class="form-check-label">Enfant</label>
                                </div>
                                @error('Catégorie') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Référence" class="form-label">Référence</label>
                                <input type="text" id="Référence" name="Référence" class="form-control @error('Référence') is-invalid @enderror" value="{{ $produit->Référence }}">
                                @error('Référence') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ $produit->is_active ? 'checked' : '' }}>
                                    <label for="is_active" class="form-check-label">Is Active</label>
                                </div>
                                @error('is_active') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                             <label >Upload  Image</label>
                                <input type="file" name="image" id="image" class="form-control"/>
                                @if ($produit->image)
                                     <img src="{{ asset('storage/app/privates' . $produit->image) }}" alt="Current Image" width="100">
                                @endif
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

    <!-- Correctly referencing JS files -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



     

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a href="https://www.facebook.com/profile.php?id=100009832151933" rel="nofollow" target="_blank">
                    MehdiZouari
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div class="terms d-flex justify-content-center justify-content-md-end">
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    
    
    
    
</body>
</html>
