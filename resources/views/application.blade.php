<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application</title>
    <link rel="shortcut icon" href="{{ asset('backend/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    @if (App::getLocale() == 'ar')
        <link href="{{ asset('backend/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/plugins/global/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .header {
                direction: rtl
            }
        </style>
    @else
        <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/plugins/global/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .header {
                direction: ltr
            }
        </style>
    @endif
    <link href="{{ asset('backend/datatables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/summernote-lite.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-bs4.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])

</head>

<body>
    <div id="app">
    </div>

    <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('backend/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('backend/js/custom/modals/upgrade-plan.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/summernote-lite.min.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/datatables/export-tables/dataTables.buttons.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/datatables/export-tables/buttons.flash.min.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('backend/datatables/export-tables/jszip.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/datatables/export-tables/pdfmake.min.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('backend/datatables/export-tables/vfs_fonts.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('backend/datatables/export-tables/buttons.print.min.js') }}" defer></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150,

            });
        });

        $(document).on('click', '#button-toggle', function(e) {
            $(".dropdown.open > .dropdown-toggle").dropdown("toggle");
            return false;
        });
    </script>

</body>

</html>
