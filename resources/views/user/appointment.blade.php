<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DentCare - Dental Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    {{-- <link href="lib/animate/animate.min.css" rel="stylesheet"> --}}
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <!-- <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed </small>
                </div> -->
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>DentSan@Gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentSan</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                {{-- <a href="{{ route('dentline') }}" class="nav-item nav-link">DentLine</a> --}}
                {{-- <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a> --}}
                <a href="{{ route('vote') }}" class="nav-item nav-link">Doctors vote</a>
            </div>
            {{-- <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button> --}}
            {{-- <a href="{{ route('appointment') }}" class="btn btn-primary py-2 px-4 ms-3">Appointment</a> --}}
            @if(Route::has('login'))
            @auth

            <a href="{{ route('myappointment') }}"class="btn btn-primary py-2 px-4 ms-3">My Appointment</a>

            <x-app-layout>
            </x-app-layout>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 ms-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4 ms-3">Register</a>
            @endauth
            @endif
        </div>
    </nav>
    <!-- Navbar End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->


<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">Appointment</h1>
            <a href="" class="h4 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white">Appointment</a>
        </div>
    </div>
</div>
<!-- Hero End -->
{{--  --}}

@if (session()->has('message'))
    <div class="alert alert-success d-flex justify-content-between align-items-center">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp"></h1>

        <form class="main-form" action="{{ url('appointmentt') }}" method="POST" onsubmit="return validateForm()">
            @csrf

            <div class="row mt-5">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="name" class="form-label">Your Name *</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name">
                    <div class="error-message" id="name-error"></div>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <label for="email" class="form-label">Email address *</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email address..">
                    <div class="error-message" id="email-error"></div>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <label for="date" class="form-label">Select Date *</label>
                    <input id="date" type="date" name="date" class="form-control">
                    <div class="error-message" id="date-error"></div>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <label for="departement" class="form-label">Doctor Name *</label>
                    <select name="doctor" id="departement" class="form-select">
                        <option>Select Doctor</option>
                        @foreach ($doctor as $doctors)
                        @if ($doctors->admin_approval == 1)
                            <option value="{{ $doctors->name }}">{{ $doctors->name }} - {{ $doctors->specialization }}</option>
                        @endif
                        @endforeach
                    </select>
                    <div class="error-message" id="doctor-error"></div>
                </div>

                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <label for="time" class="form-label">Time *</label>
                    <input type="time" id="time" name="time" class="form-control" placeholder="">
                    <div class="error-message" id="time-error"></div>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <label for="number" class="form-label">Your Number *</label>
                    <input type="text" id="number" name="number" class="form-control" placeholder="Number..">
                    <div class="error-message" id="number-error"></div>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div>

  {{--  --}}

   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 30px;">
    <div class="container pt-5">
        <div class="row g-5 pt-4">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="{{ route('home') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                    <a class="text-light mb-2" href="{{ route('home') }}"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                    <a class="text-light mb-2" href="{{ route('home') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                    {{-- <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a> --}}
                    {{-- <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Popular Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="{{ route('home') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                    <a class="text-light mb-2" href="{{ route('home') }}"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                    <a class="text-light mb-2" href="{{ route('home') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                    {{-- <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a> --}}
                    {{-- <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Salt, Balqa, Jordan</p>
                <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>TaqwaAlkhlefat@gmail.com</p>
                <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+962 772 945510</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Follow Us</h3>
                <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-light py-4" style="background: #051225;">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">DentSan</a>. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">Taqwa Alkhlefat</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    {{-- <script>
        function validateForm() {
            // Get the form inputs
            var name = document.forms["main-form"]["name"].value;
            var email = document.forms["main-form"]["email"].value;
            var date = document.forms["main-form"]["date"].value;
            var doctor = document.forms["main-form"]["doctor"].value;
            var number = document.forms["main-form"]["number"].value;

            // Check if the required fields are empty
            if (name == "" || email == "" || date == "" || doctor == "Select Doctor" || number == "") {
                alert("Please fill in all the required fields.");
                return false; // Prevent form submission
            }
        }
    </script> --}}

    <script>
        function validateForm() {
            // Reset error messages
            document.getElementById('name-error').innerText = '';
            document.getElementById('email-error').innerText = '';
            document.getElementById('date-error').innerText = '';
            document.getElementById('doctor-error').innerText = '';
            document.getElementById('time-error').innerText = '';
            document.getElementById('number-error').innerText = '';

            // Get field values
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var date = document.getElementById('date').value;
            var doctor = document.getElementById('departement').value; // Updated to 'departement'
            var time = document.getElementById('time').value;
            var number = document.getElementById('number').value;

            if (name.trim() === '') {
                document.getElementById('name-error').innerText = 'Name is required';
                document.getElementById('name-error').style.color = 'red';
                return false; // Prevent form submission
            }

            if (email.trim() === '') {
                document.getElementById('email-error').innerText = 'Email is required';
                document.getElementById('email-error').style.color = 'red';
                return false; // Prevent form submission
            }

            if (date.trim() === '') {
                document.getElementById('date-error').innerText = 'Date is required';
                document.getElementById('date-error').style.color = 'red';
                return false; // Prevent form submission
            }

            if (doctor === 'Select Doctor') {
                document.getElementById('doctor-error').innerText = 'Doctor Name is required';
                document.getElementById('doctor-error').style.color = 'red';
                return false; // Prevent form submission
            }

            if (time.trim() === '') {
                document.getElementById('time-error').innerText = 'Time is required';
                document.getElementById('time-error').style.color = 'red';
                return false; // Prevent form submission
            }

            if (number.trim() === '') {
                document.getElementById('number-error').innerText = 'Number is required';
                document.getElementById('number-error').style.color = 'red';
                return false; // Prevent form submission
            }

            // If all validations pass, the form will submit
            return true;
        }
    </script>


<script language="javascript">
    $(document).ready(function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;

        $('#date').attr('min', today);


        // Disable previously selected dates

        $('#date').datepicker({
            beforeShowDay: function(date) {
                var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                return [!bookedDates.includes(dateString)]; // Disable booked dates
            }
        });
    });

    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
