<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    {{-- ICON --}}
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/icon.png') }}"/>

    <!-- Font Awesome UI KIT-->
    <script src="https://kit.fontawesome.com/f75ab26951.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">


    <style>
        :root{
            --rouge: #ff1908;
            --violet: #7f2082;
            --blue: #123274;
            --bciel: #00aff4;
            --primary: #123274;
        }

        .bg-gradient-primary {
            background-color: #123274;
            background-image: linear-gradient(180deg,#123274 10%,#224abe 100%);
            background-size: cover;
        }
     
    </style>

    <style>
        
        .table-bordered td, .table-bordered th {
            font-size: 0.8rem;
        }
        .table-bordered td, .table-bordered th .badge {
            font-size:1rem;
        }
        table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
            font-size: 0.9rem;
        }

        div.dataTables_wrapper div.dataTables_processing {
        
            background-color: red;
            color: white;
        }

        /* subtle zoom to attention and then back */
        .pop-outin {
        animation: 2s anim-popoutin ease infinite;
        }

        @keyframes anim-popoutin {
        0% {
            color: white;
            transform: scale(0);
            opacity: 0;
            text-shadow: 0 0 0 rgba(0, 0, 0, 0);
        }
        25% {
            color: white;
            transform: scale(2);
            opacity: 1;
            text-shadow: 3px 10px 5px rgba(0, 0, 0, 0.5);
        }
        50% {
            color: white;
            transform: scale(1);
            opacity: 1;
            text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
        }
        100% {
            /* animate nothing to add pause at the end of animation */
            transform: scale(1);
            opacity: 1;
            text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
        }
        }



        label{
            font-weight: 800;
            color: black ;
        }

        .table {
            color: black;
        }

        .table-hover tbody tr:hover {
            color: black;
            background-color: rgba(0,0,0,.075);
        }

        
    </style>
</head>