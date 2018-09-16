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
        <title>Shops Management Project</title>
        <!--favicon-->
        <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
        <!--Data Tables -->
        <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <!--Lightbox Css-->
        <link href="assets/plugins/fancybox/css/jquery.fancybox.min.css" rel="stylesheet" type="text/css"/>
        <!-- simplebar CSS-->
        <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
        <!-- Bootstrap core CSS-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- animate CSS-->
        <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <!-- Sidebar CSS-->
        <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
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
        <!-- simplebar js -->
        <script src="assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- waves effect js -->
        <script src="assets/js/waves.js"></script>
        <!-- sidebar-menu js -->
        <script src="assets/js/sidebar-menu.js"></script>
        <!-- Custom scripts -->
        <script src="assets/js/app-script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <!--Sweet Alerts -->
        <script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
        <!--Data Tables js-->
        <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
        <!--Lightbox-->
        <script src="assets/plugins/fancybox/js/jquery.fancybox.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
