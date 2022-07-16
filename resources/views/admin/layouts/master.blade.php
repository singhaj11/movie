<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Movie App</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        .content-wrapper {
            /* background-color: #f7f7f7!important; */
            /* background-color: #ffffff !important; */
        }

        ol.breadcrumb {
            border-bottom: 1px solid #e5e5e5 !important;
        }

        .page-head {
            margin-bottom: 10px;
        }
    </style>
    @yield('styles')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('admin.partials.header')

        @include('admin.partials.sidebar')

        <div class="content-wrapper">
            @yield('content')

            @include('admin.partials.footer')
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
    @yield('scripts')
    <script>
        $('.daterange').daterangepicker({
            autoUpdateInput: false,
            locale: {
            cancelLabel: 'Clear'
            }
        });

        $('.daterange').on('apply.daterangepicker', function(ev, picker) {
            $('#from-date').val(picker.startDate.format('YYYY-MM-DD'));
            $('#to-date').val(picker.endDate.format('YYYY-MM-DD'));
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $(".date-picker").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            weekStart: 1,
            todayHighlight: true,
            startDate: '0',
    });
    </script>
</body>

</html>