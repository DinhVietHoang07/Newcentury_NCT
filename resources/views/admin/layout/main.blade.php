<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{ asset('admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin/plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet"> --}}
    @stack('css')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @include('admin.layout.header')
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.layout.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('admin/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/gleek.js') }}"></script>
    <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    {{-- <script src="{{ asset('admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('admin/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('admin/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('admin/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script> --}}

    <script src="{{ asset('admin/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/plugins/sweetalert/js/sweetalert.init.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>
    <script>
        function deleteAjax(url, id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "get",
                        url: url,
                        dataType: "JSON",
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.success,
                                icon: "success"
                            });
                            $('#tr' + id).remove();
                        },
                        error: function(response) {
                            console.log(response);
                            Swal.fire({
                                title: "Deleted!",
                                text: response.responseJSON.error,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

    </script>
    {{-- [contact] , [information] , [blog], bảo trì, [service ( cung ứng, cho thuê) sửa status thành service loại], [thêm service*] , bannner show 3 house xịn đắt nhất, --}}

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: '{{ session('success') }}',
                icon: "success"
            });
        </script>
    @endif

    @if (session('Error'))
        <script>
            Swal.fire({
                title: "Error!",
                text: '{{ session('error') }}',
                icon: "Error"
            });
        </script>
    @endif
    @stack('js')

</body>

</html>
