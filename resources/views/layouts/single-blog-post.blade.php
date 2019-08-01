<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}
        /* Set gray background color and 100% height */
        body{
            text-align: justify;
        }
        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 10px;
            margin-top: 10px;
        }
        .center-img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>

<body>

<div class="container-fluid">
        <div class="col sm-12">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">
            @yield('navbar')
            @yield('content')
        </div>
            <div class="col-sm-1">
            </div>
        </div>

</div>

@yield('scripts')
<footer class="container-fluid">
    @yield('footer')
</footer>

</body>
</html>
