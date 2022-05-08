<?php
    class Component{
        //FUNCION PARA CREAR SELECT DINAMICOS
        public static function showSelect($label, $name, $value, $data){
            print("
                <div class='col-6 mb-3'>
                    <label for='$name' class='form-label'>$label</label>
                    <select name='$name' id='$name' class='form-select'>
            ");
            if($data){
                if(!$value){
                    print("<option value='' disabled selected>Seleccione una opción</option>");
                }
                foreach($data as $row){
                    if($value == $row[0]){
                        print("<option value='$row[0]' selected>$row[1]</option>");
                    }else{
                        print("<option value='$row[0]'>$row[1]</option>");
                    }
                }
            }else{
                print("<option value='' disabled selected>No hay opciones disponibles</option>");
            }
            print("
                    </select>
                </div>
            ");
        }

        //FUNCION PARA CREAR TABLA DINAMICAS
        public static function dataTable($headers, $data)
        {
            print("
            <div class='table-responsive'>
                <table id='dataTable' class='table table-hover' style='width:100%'>
                <thead>
                    <tr>
            ");
            foreach($headers as $header)
            {
                print("
                        <th>$header</th>
                ");
            }
            print("      
                    </tr>
                </thead>
                <tbody>
            ");

            foreach($data as $info)
            {
                print("<tr>");
                for($i = 0; $i < count($headers) - 1; $i++)
                {

                    print("
                        <td>$info[$i]</td>
                    ");
                }
                
                print("
                        <td id='actions'>
                            <a class='btn edit' href='update.php?id=$info[0]' role='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar'>
                                <i class='bi bi-pencil-fill'></i>
                            </a>
                            <a class='btn delete' href='delete.php?id=$info[0]' role='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar'>
                                <i class='bi bi-trash3-fill'></i>
                            </a>
                        </td>
                    </tr>
                ");
            }

            print("  
                </tbody>
                </table>
            </div>
            ");
        }

        //FUNCION PARA BOTON DE CREAR
        public static function buttonRound($method)
        {
            print("
                <div class='container-btn-round-sav'>
                    <a href='create.php' data-bs-toggle='tooltip' data-bs-placement='top' title='Agregar'>
                        <div class='btn-round-sav'>
                            <i class='bi bi-plus'></i>
                        </div>
                    </a>
                </div>
            ");
        }

        //FUNCION PARA CREAR INPUTS
        public static function textInput($label, $name, $value, $placeholder, $type)
        {
            print("
                <div class='col-6 mb-3'>
                    <label for='$name' class='form-label'>$label</label>
                    <input type='$type' class='form-control' id='$name' name='$name' value='$value' placeholder='$placeholder'>
                </div>
            ");
        }

        // FUNCTION FOR CREATE TEXTAREA
        public static function textArea($cols, $label, $name, $value){
            print("
                <div class='$cols mb-3'>
                    <div class='form-floating'>
                        <textarea id='$name' name='$name' class='form-control' style='height: 100px'>$value</textarea>
                        <label for='$name'>$label</label>
                    </div>
                </div>
            ");
        }

        //FUNCION PARA GENERAR LA CARD DE LA PANTALLA DELETE.PHP
        public static function cardDelete($title, $message)
        {
            print("
            <div class='container-delete-sav'>
                <div class='col-sm-12'>
                    <div class='card card-sav'>
                        <div class='card-body'>
                            <h2 class='card-title text-center mt-3'>$title</h2>
                            <h4 class='card-text text-center mt-4'>$message</h4>
                            <div class='d-flex justify-content-center mt-4'>
                                <form method='POST'>
                                    <button type='submit' name='eliminar' class='btn btn-eliminar me-3'>Eliminar</button>
                                </form>
                                <a class='btn btn-cancelar' href='index.php' role='button'>Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ");
        }

        //FUNCION PARA LAS ALERTAS CON SWEETALERT
        public static function showMessage($type, $message, $url)
        {
            if(is_numeric($message))
            {
                switch($message)
                {
                    case 1045:
                        $text = "Autenticación desconocida";
                        break;
                    case 1049:
                        $text = "Base de datos desconocida";
                        break;
                    case 1054:
                        $text = "Nombre de campo desconocido";
                        break;
                    case 1062:
                        $text = "Dato duplicado, no se puede guardar";
                        break;
                    case 1146:
                        $text = "Nombre de tabla desconocido";
                        break;
                    case 1451:
                        $text = "Registro ocupado, no se puede eliminar";
                        break;
                    case 2002:
                        $text = "Servidor desconocido";
                        break;
                    default:
                        $text = "Ocurrió un problema, contacte al administrador :(";
                }
            }
            else
            {
                $text = $message;
            }
    
            switch($type)
            {
                case 1:
                    $title = "Éxito";
                    $icon = "success";
                    break;
                case 2:
                    $title = "Error";
                    $icon = "error";
                    break;
                case 3:
                    $title = "Advertencia";
                    $icon = "warning";
                    break;
                case 4:
                    $title = "Aviso";
                    $icon = "info";
            }
    
            if($url)
            {
                print("<script> swal({title: `$title`, text: `$text`, icon: `$icon`, button: 'Aceptar', closeOnClickOutside: false, closeOnEsc: false}).then(value=>{location.href = '$url'}) </script>");
            }
            else
            {
                print("<script> swal({title: `$title`, text: `$text`, icon: `$icon`, button: 'Aceptar', closeOnClickOutside: false, closeOnEsc: false}) </script>");
            }
        }
    }
?>