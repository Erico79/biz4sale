@extends('layouts.back')

@section('head')
    @stack('css')
@endsection

@section('layout')
    <div class="wrapper">
        @include('layouts.partials.back.sidebar')
        <div class="main-panel">
            @include('layouts.partials.back.nav')
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.partials.back.footer')
        </div>
    </div>
@endsection

@section('js')
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('assets2/js/moment.min.js') }}"></script>
    <!--  Charts Plugin -->
    <script src="{{ asset('assets2/js/chartist.min.js') }}"></script>
    <!--  Plugin for the Wizard -->
    <script src="{{ asset('assets2/js/jquery.bootstrap-wizard.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets2/js/bootstrap-notify.js') }}"></script>
    <!-- DateTimePicker Plugin -->
    <script src="{{ asset('assets2/js/bootstrap-datetimepicker.js') }}"></script>
    <!-- Vector Map plugin -->
    <script src="{{ asset('assets2/js/jquery-jvectormap.js') }}"></script>
    <!-- Sliders Plugin -->
    <script src="{{ asset('assets2/js/nouislider.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Select Plugin -->
    <script src="{{ asset('assets2/js/jquery.select-bootstrap.js') }}"></script>
    <!--  DataTables.net Plugin    -->
    <script src="{{ asset('assets2/js/jquery.datatables.js') }}"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets2/js/sweetalert2.js') }}"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('assets2/js/jasny-bootstrap.min.js') }}"></script>
    <!--  Full Calendar Plugin    -->
    <script src="{{ asset('assets2/js/fullcalendar.min.js') }}"></script>
    <!-- TagsInput Plugin -->
    <script src="{{ asset('assets2/js/jquery.tagsinput.js') }}"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('assets2/js/material-dashboard.js') }}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets2/js/demo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });


            var table = $('#datatables').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });

            $('.card .material-datatables label').addClass('form-group');
        });
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @stack('js')
@endsection