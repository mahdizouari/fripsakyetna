<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} " >
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}"rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


    <style>
    .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem; /* Increased padding for more space */
    border-radius: 12px; /* Slightly increased border radius for a softer look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
    width: 100%; /* Changed to 100% for responsiveness */
    max-width: 900px;
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

    <style>
        .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1rem; /* Adjusted padding */
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%; /* Full width for responsiveness */
    max-width: 100%; /* Ensure container fits on small screens */
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
}

/* Media query for mobile devices */
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
    }

    .mspace-button a {
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
/* Style for table */
.table {
    width: 100%;
    border-collapse: collapse;
}

/* Ensures table cells handle overflow */
.table td {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Style for text wrapping in name column */
.text-wrap {
    white-space: normal; /* Allows text to wrap */
    overflow: hidden; /* Ensures text doesn't overflow */
    text-overflow: ellipsis; /* Adds ellipsis if text overflows */
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
    .table {
        font-size: 14px; /* Adjust font size for better fit */
    }

    .table td, .table th {
        padding: 0.5rem; /* Reduced padding for smaller screens */
    }
}


    </style> 
   <style>
    .container {
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 1000px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.form-control {
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 1rem;
    padding: 0.75rem; /* Added padding for better touch targets */
    font-size: 16px; /* Default font size for larger screens */
    border: 1px solid #ccc; /* Border for input fields for visual clarity */
    border-radius: 4px; /* Rounded corners for input fields */
}

/* Button styles */
.btn {
    display: inline-block;
    width: auto;
    padding: 0.75rem 1.5rem;
    font-size: 16px;
    text-align: center; /* Center text inside button */
    border-radius: 4px; /* Rounded corners for buttons */
    border: 1px solid transparent; /* Transparent border for visual consistency */
    background-color: #007bff; /* Default button color */
    color: #fff; /* Text color */
    transition: background-color 0.3s, border-color 0.3s; /* Smooth transition for background and border color */
}

/* Button hover effect */
.btn:hover {
    background-color: #0056b3; /* Darker color on hover */
    border-color: #0056b3; /* Darker border color on hover */
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .container {
        padding: 1rem; /* Further reduced padding for smaller screens */
        margin: 0.5rem; /* Margin adjustment for mobile */
        max-width: 100%; /* Ensure container takes full width */
        border-radius: 8px; /* Slightly smaller border radius on mobile */
    }

    .form-control {
        font-size: 14px; /* Smaller font size for better fit */
        padding: 0.5rem; /* Adjust padding for smaller input fields */
    }

    .btn {
        width: 100%; /* Full width buttons for better usability */
        margin-bottom: 0.5rem; /* Space between buttons */
        font-size: 14px; /* Smaller font size for mobile */
        padding: 0.5rem 1rem; /* Less padding on smaller screens */
    }

    .mspace-button a {
        display: block;
        text-align: center; /* Center text in button */
        margin-top: 1rem; /* Margin above button */
        font-size: 14px; /* Font size adjustment for mobile */
    }

    .form-check-inline {
        display: block; /* Stack radio buttons vertically */
        margin-bottom: 0.5rem; /* Space between options */
    }
    
    /* Optional: Improve table layout on small screens */
    table {
        width: 100%;
        border-collapse: collapse; /* Collapse table borders for a cleaner look */
    }

    th, td {
        padding: 0.75rem; /* Padding for table cells */
        text-align: left; /* Align text to the left */
    }

    th {
        background-color: #f8f9fa; /* Light background for table headers */
    }

    td img {
        max-width: 100px; /* Limit image size in table cells */
        height: auto; /* Maintain aspect ratio */
    }
}

   </style>
<style>
  /* General button styles */
.edit {
    background: none; /* Remove background */
    border: none; /* Remove border */
    color: inherit; /* Inherit text color */
    cursor: pointer; /* Change cursor to pointer */
    font-size: 1.2em; /* Adjust size of the icon */
    padding: 0; /* Remove padding */
}

/* Specific styles for delete button */
.btn-danger {
    color: #dc3545; /* Red color for delete icon */
}

.btn-danger:hover {
    color: #c82333; /* Darker red for hover effect */
}

/* Specific styles for edit button */
.btn-warning {
    color: #ffc107; /* Yellow color for edit icon */
}

.btn-warning:hover {
    color: #e0a800; /* Darker yellow for hover effect */
}

</style>

    
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
    <a href="/mspace" class="btn btn-primary btn-sm">My space</a>
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
                <a href="/slider"> Slider </a>
              </li>
              <li>
                <a href="/prod"> Produits </a>
              </li>
              <li>
                <a href="/panier"> Panier </a>
              </li>
              <li>
                <a href="/commande"> Commande </a>
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
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
                <div class="header-search d-none d-md-flex">
                  
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                            @auth
                                    @if(auth()->user()->email === 'yessin.zouari100@gmail.com')
                                        <div class="image">
                                            <img src="{{asset('assets/images/profile/yessin.png')}}" alt="image">
                                        </div>
                                    @elseif(auth()->user()->email === 'akrambahloul2@gmail.com')
                                        <div class="image">
                                            <img src="{{asset('assets/images/profile/akram.png')}}" alt="image">
                                        </div>
                                
                                    @endif
                            @endauth
                        <div>
                             @auth
                                <h6 class="fw-500">{{ auth()->user()->name }}</h6>
                            @endauth

                          <p>Admin</p>
                        </div>
                      </div>
                    </div>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <div class="author-info flex items-center !p-1">
                      @auth
                            @if(auth()->user()->email === 'yessin.zouari100@gmail.com')
                                <div class="image">
                                    <img src="{{asset('assets/images/profile/yessin.png')}}" alt="image">
                                </div>
                            @elseif(auth()->user()->email === 'akrambahloul2@gmail.com')
                                <div class="image">
                                    <img src="a{{asset('assets/images/profile/akram.png')}}" alt="image">
                                </div>
                        
                            @endif
                       @endauth

                        <div class="content">
                        @auth
                            <h6 class="fw-500">{{ auth()->user()->name }}</h6>
                        @endauth

                              @auth
                                <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#">{{ auth()->user()->email }}</a>
                            @endauth
                        </div>
                      </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="/profile">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>
                    <li>
                      <a href="#0">
                        <i class="lni lni-alarm"></i> Notifications
                      </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
									@csrf
								</form>                    
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>

      @yield('content')



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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
      // ======== jvectormap activation
      var markers = [
        { name: "Egypt", coords: [26.8206, 30.8025] },
        { name: "Russia", coords: [61.524, 105.3188] },
        { name: "Canada", coords: [56.1304, -106.3468] },
        { name: "Greenland", coords: [71.7069, -42.6043] },
        { name: "Brazil", coords: [-14.235, -51.9253] },
      ];

      var jvm = new jsVectorMap({
        map: "world_merc",
        selector: "#map",
        zoomButtons: true,

        regionStyle: {
          initial: {
            fill: "#d1d5db",
          },
        },

        labels: {
          markers: {
            render: (marker) => marker.name,
          },
        },

        markersSelectable: true,
        selectedMarkers: markers.map((marker, index) => {
          var name = marker.name;

          if (name === "Russia" || name === "Brazil") {
            return index;
          }
        }),
        markers: markers,
        markerStyle: {
          initial: { fill: "#4A6CF7" },
          selected: { fill: "#ff5050" },
        },
        markerLabelStyle: {
          initial: {
            fontWeight: 400,
            fontSize: 14,
          },
        },
      });
      // ====== calendar activation
      document.addEventListener("DOMContentLoaded", function () {
        var calendarMiniEl = document.getElementById("calendar-mini");
        var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
          initialView: "dayGridMonth",
          headerToolbar: {
            end: "today prev,next",
          },
        });
        calendarMini.render();
      });

      // =========== chart one start
      const ctx1 = document.getElementById("Chart1").getContext("2d");
      const chart1 = new Chart(ctx1, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "#365CF5",
              data: [
                600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#365CF5",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              borderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
              cubicInterpolationMode: "monotone", // Add this line for curved line
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              callbacks: {
                labelColor: function (context) {
                  return {
                    backgroundColor: "#ffffff",
                    color: "#171717"
                  };
                },
              },
              intersect: false,
              backgroundColor: "#f9f9f9",
              title: {
                fontFamily: "Plus Jakarta Sans",
                color: "#8F92A1",
                fontSize: 12,
              },
              body: {
                fontFamily: "Plus Jakarta Sans",
                color: "#171717",
                fontStyle: "bold",
                fontSize: 16,
              },
              multiKeyBackground: "transparent",
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
              bodyAlign: "center",
              titleAlign: "center",
              titleColor: "#8F92A1",
              bodyColor: "#171717",
              bodyFont: {
                family: "Plus Jakarta Sans",
                size: "16",
                weight: "bold",
              },
            },
            legend: {
              display: false,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
          },
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 500,
              },
            },
            x: {
              grid: {
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
        },
      });
      // =========== chart one end

      // =========== chart two start
      const ctx2 = document.getElementById("Chart2").getContext("2d");
      const chart2 = new Chart(ctx2, {
        type: "bar",
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "",
              backgroundColor: "#365CF5",
              borderRadius: 30,
              barThickness: 6,
              maxBarThickness: 8,
              data: [
                600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
              ],
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              callbacks: {
                titleColor: function (context) {
                  return "#8F92A1";
                },
                label: function (context) {
                  let label = context.dataset.label || "";

                  if (label) {
                    label += ": ";
                  }
                  label += context.parsed.y;
                  return label;
                },
              },
              backgroundColor: "#F3F6F8",
              titleAlign: "center",
              bodyAlign: "center",
              titleFont: {
                size: 12,
                weight: "bold",
                color: "#8F92A1",
              },
              bodyFont: {
                size: 16,
                weight: "bold",
                color: "#171717",
              },
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
          },
          },
          legend: {
            display: false,
            },
          legend: {
            display: false,
          },
          layout: {
            padding: {
              top: 15,
              right: 15,
              bottom: 15,
              left: 15,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 0,
              },
            },
            x: {
              grid: {
                display: false,
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                drawTicks: false,
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
          plugins: {
            legend: {
              display: false,
            },
            title: {
              display: false,
            },
          },
        },
      });
      // =========== chart two end

      // =========== chart three start
      const ctx3 = document.getElementById("Chart3").getContext("2d");
      const chart3 = new Chart(ctx3, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "Revenue",
              backgroundColor: "transparent",
              borderColor: "#365CF5",
              data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#365CF5",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#365CF5",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
              fill: false,
              tension: 0.4,
            },
            {
              label: "Profit",
              backgroundColor: "transparent",
              borderColor: "#9b51e0",
              data: [
                120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#9b51e0",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#9b51e0",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
              fill: false,
              tension: 0.4,
            },
            {
              label: "Order",
              backgroundColor: "transparent",
              borderColor: "#f2994a",
              data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#f2994a",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#f2994a",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
              fill: false,
              tension: 0.4,
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              intersect: false,
              backgroundColor: "#fbfbfb",
              titleColor: "#8F92A1",
              bodyColor: "#272727",
              titleFont: {
                size: 16,
                family: "Plus Jakarta Sans",
                weight: "400",
              },
              bodyFont: {
                family: "Plus Jakarta Sans",
                size: 16,
              },
              multiKeyBackground: "transparent",
              displayColors: false,
              padding: {
                x: 30,
                y: 15,
              },
              borderColor: "rgba(143, 146, 161, .1)",
              borderWidth: 1,
              enabled: true,
            },
            title: {
              display: false,
            },
            legend: {
              display: false,
            },
          },
          layout: {
            padding: {
              top: 0,
            },
          },
          responsive: true,
          // maintainAspectRatio: false,
          legend: {
            display: false,
          },
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
              },
              max: 350,
              min: 50,
            },
            x: {
              grid: {
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                drawTicks: false,
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
        },
      });
      // =========== chart three end

      // ================== chart four start
      const ctx4 = document.getElementById("Chart4").getContext("2d");
      const chart4 = new Chart(ctx4, {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
          datasets: [
            {
              label: "",
              backgroundColor: "#365CF5",
              borderColor: "transparent",
              borderRadius: 20,
              borderWidth: 5,
              barThickness: 20,
              maxBarThickness: 20,
              data: [600, 700, 1000, 700, 650, 800],
            },
            {
              label: "",
              backgroundColor: "#d50100",
              borderColor: "transparent",
              borderRadius: 20,
              borderWidth: 5,
              barThickness: 20,
              maxBarThickness: 20,
              data: [690, 740, 720, 1120, 876, 900],
            },
          ],
        },
        options: {
          plugins: {
            tooltip: {
              backgroundColor: "#F3F6F8",
              titleColor: "#8F92A1",
              titleFontSize: 12,
              bodyColor: "#171717",
              bodyFont: {
                weight: "bold",
                size: 16,
              },
              multiKeyBackground: "transparent",
              displayColors: false,
              padding: {
                x: 30,
                y: 10,
              },
              bodyAlign: "center",
              titleAlign: "center",
              enabled: true,
            },
            legend: {
              display: false,
            },
          },
          layout: {
            padding: {
              top: 0,
            },
          },
          responsive: true,
          // maintainAspectRatio: false,
          title: {
            display: false,
          },
          scales: {
            y: {
              grid: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 1200,
                min: 0,
              },
            },
            x: {
              grid: {
                display: false,
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          },
        },
      });
        // =========== chart four end
    </script>
      <!-- Include Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // Calendar options here
        });
        calendar.render();
    }
});

      </script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
    var mapContainer = document.getElementById('mapContainer');
    if (mapContainer) {
        // Initialize jVectorMap here
    }
});

      </script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
      <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
      <script src="{{ asset('assets/js/moment.min.js') }}"></script>
      <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
      <script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
      <script src="{{ asset('assets/js/world-merc.js') }}"></script>
      <script src="{{ asset('assets/js/polyfill.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
      

</body>
</html>