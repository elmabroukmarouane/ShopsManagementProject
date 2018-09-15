<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Rocker - Bootstrap4  Admin Dashboard Template</title>
        <!--favicon-->
        <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
        <!-- Bootstrap core CSS-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- animate CSS-->
        <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <!-- Custom Style-->
        <link href="assets/css/app-style.css" rel="stylesheet"/>

    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!--Form Validatin Script-->
        <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
