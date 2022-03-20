<?php
    require_once('../../app/models/database.class.php');
    require_once('../../app/helpers/validator.class.php');
    class Page{
        public static function templateHeader($title)
        {
            print("
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='../../web/css/bootstrap.min.css'>
                <link rel='stylesheet' href='../../web/css/style.css'>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'>
                <title>$title</title>
            </head>
            <body>
                <header>
            ");
            Page::navbar();
            Page::sidenav();
            print("
                </header>
                <div class='container container-sav' id='contenedor'>
                    <h1 class='text-center mt-3'>$title<h1>
            ");
        }

        public static function templateFooter()
        {
            print("
                </div>
            <script src='../../web/js/bootstrap.bundle.min.js'></script>
            <script src='../../web/js/app.js'></script>
            </body>
            </html>
            ");
        }

        public static function navbar()
        {
            require_once '../../app/views/template/navbar.php';
        }

        public static function sidenav()
        {
            require_once '../../app/views/template/sidenav.php';
        }
    }
?>