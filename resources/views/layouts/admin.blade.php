<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.6.3-web/css/all.min.css') }}">
    <!-- Nano Scroller -->
    <link rel="stylesheet" href="{{ asset('plugins/nanoScroller/nanoscroller.css') }}">

@yield('plugin-css')

<!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?ver:1.2') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

    <!-- Bootstrap 4.6.0 -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.6.0-dist/css/bootstrap.min.css') }}">

    <!-- fullCalendar 5.7.0 -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-5.7.0/lib/main.min.css') }}">


    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Time Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/switch/switch.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon/') }}/{{ sysConfig('favicon') }}">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        @include('admin.includes.header')
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('admin.includes.left-sidebar')
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        @include('admin.includes.right-aside')
    </aside>
    <!-- /.control-sidebar -->

    <footer class="main-footer">
        @include('admin.includes.footer')
    </footer>

    <!-- Bootstrap Alert -->
    <div class="modal fade" id="bootstrap-alert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body bg-danger">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-white">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Bootstrap Alert -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery-3.6.0.min.js') }}"></script>

<!-- Bootstrap 4.6.0 -->
<script src="{{ asset('plugins/bootstrap-4.6.0-dist/js/bootstrap.min.js') }}"></script>

<!-- jQuery UI 1.12.1 -->
<script src="{{ asset('plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<!-- fullCalendar 5.7.0 -->
<script src="{{ asset('plugins/fullcalendar-5.7.0/lib/main.min.js') }}"></script>
<!-- Date Picker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Time Picker -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@yield('plugin')

@yield('script')

<!-- Pop up validation error modal -->
@if($errors->any())
    <script>
        $("#bootstrap-alert").modal('show');
    </script>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        //Datepicker
        $('.datePicker').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true
        })

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            showMeridian: false,
            showSeconds: true
        })
    });

</script>

</body>
</html>
