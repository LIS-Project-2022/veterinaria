<?php
    class Auth{

        public static function checkAdmin()
        {
            if($_SESSION['auth']['id_tipo_usuario'] != 1)
            {
                header('Location: ../home');
            }
        }

        public static function checkDoctor()
        {
            if($_SESSION['auth']['id_tipo_usuario'] != 2)
            {
                header('Location: ../home');
            }
        }
    }
?>