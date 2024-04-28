<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include CSS stylesheets or other meta tags -->
    <!-- Favicon -->
    <link href={{ asset('home/img/favicon.ico') }} rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{ asset('home/lib/animate/animate.min.css" rel="stylesheet') }}>
    <link href={{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{ asset('home/css/bootstrap.min.css') }} rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href={{ asset('home/css/style.css') }} rel="stylesheet">

    <!-- Starability CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/starability/starability-all.min.css">

    @stack('styles')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    {{-- Navbar --}}
    @include('shared.navbar.navbar')

    <main>
        <!-- Main content goes here -->
        @yield('content')
    </main>

    @include('shared.footer.footer')

    <!-- Include JavaScript files or other scripts -->
    <!-- JavaScript Libraries -->
    <script src={{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}></script>
    <script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('home/lib/wow/wow.min.js') }}></script>
    <script src={{ asset('home/lib/easing/easing.min.js') }}></script>
    <script src={{ asset('home/lib/waypoints/waypoints.min.js') }}></script>
    <script src={{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}></script>

    <!-- Template Javascript -->
    <script src={{ asset('home/js/main.js') }}></script>
    <!-- Starability JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/starability/starability-all.min.js"></script>
    {{-- SSLCommerze --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the success message element exists
            var successMessage = document.getElementById("success");
            if (successMessage) {
                // Remove the success message after 3 seconds
                setTimeout(function() {
                    successMessage.remove();
                }, 3000);
            }

            // Check if the failure message element exists
            var failureMessage = document.getElementById("failure");
            if (failureMessage) {
                // Remove the failure message after 3 seconds
                setTimeout(function() {
                    failureMessage.remove();
                }, 3000);
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
