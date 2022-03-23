<?php
    require_once('../../app/models/database.class.php');
    require_once('../../app/helpers/validator.class.php');
    require_once('../../app/helpers/component.class.php');
    class Page extends Component{
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
                <link rel='stylesheet' href='https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css'>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'>
                <script src='../../web/js/sweetalert.min.js'></script>
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
                    <h1 class='text-center mt-3'>$title</h1>
            ");
        }

        public static function templateFooter()
        {
            print("
                </div>
            <script src='../../web/js/bootstrap.bundle.min.js'></script>
            <script src='../../web/js/jquery-3.5.1.min.js'></script>
            <script src='../../web/js/jquery.dataTables.min.js'></script>
            <script src='https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js'></script>
            <script src='../../web/js/app.js'></script>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable({
                        language: {
                            'info': 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                            'emptyTable': 'No se encontraron datos',
                            'zeroRecords': 'No se encontraron datos en la busqueda',
                            'lengthMenu': 'Mostrar _MENU_ registros',
                            'search': 'Buscar',
                            'paginate': {
                                'next': 'sig.',
                                'previous': 'prev.' 
                            }
                        },
                        'lengthMenu': [[5, 10, 20, 25, -1], [5, 10, 20, 25, 'All']]

                    });
                } );
            </script>
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