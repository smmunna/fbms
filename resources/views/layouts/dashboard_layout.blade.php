<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include CSS stylesheets or other meta tags -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href={{ asset('dashboardplugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
    <!-- JQVMap -->
    <link rel="stylesheet" href={{ asset('dashboard/plugins/jqvmap/jqvmap.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dashboard/dist/css/adminlte.min.css') }}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset('dashboard/plugins/daterangepicker/daterangepicker.css') }}>
    <!-- Add Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('shared.dashboard.navbar')
        @include('shared.dashboard.main_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main content goes here -->
                    @yield('dash_content')
                </div>
            </section>

        </div>

    </div>
    @include('shared.dashboard.dash_footer')

    <!-- Include JavaScript files or other scripts -->
    <!-- jQuery -->
    <script src={{ asset('dashboard/plugins/jquery/jquery.min.js') }}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.js') }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- ChartJS -->
    <script src={{ asset('dashboard/plugins/chart.js/Chart.min.js') }}></script>
    <!-- Sparkline -->
    <script src={{ asset('dashboard/plugins/sparklines/sparkline.js') }}></script>
    <!-- JQVMap -->
    <script src={{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}></script>
    <script src={{ asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
    <!-- jQuery Knob Chart -->
    <script src={{ asset('dashboard/plugins/jquery-knob/jquery.knob.min.js') }}></script>
    <!-- daterangepicker -->
    <script src={{ asset('dashboard/plugins/moment/moment.min.js') }}></script>
    <script src={{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src={{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
    <!-- overlayScrollbars -->
    <script src={{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('dashboard/dist/js/adminlte.js') }}></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src={{ asset('dashboard/dist/js/demo.js') }}></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset('dashboard/dist/js/pages/dashboard.js') }}></script>
    <!-- Add Summernote JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <!-- Initialize Summernote -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('download-pdf').addEventListener('click', function() {
            const doc = new jsPDF();
            doc.autoTable({
                html: '#report-table'
            });
            doc.save('report.pdf');
        });
    </script>



    @stack('scripts')
</body>

</html>
