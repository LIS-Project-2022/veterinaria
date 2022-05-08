<?php
    require_once('../../app/models/recetas.class.php');
    try {
        //code...
        $receta = new Receta;

        if(!isset($_GET['id'])){
            Page::showMessage(2, 'Selecciona una receta', 'index.php');
        }
        else if(!$receta->setIdReceta($_GET['id'])){
            Page::showMessage(2, 'El id de la receta no es valido', 'index.php');
        }
        else if(!$receta->readRecetaForId()){
            Page::showMessage(2, 'La receta no existe', 'index.php');
        }
        else {
            require_once('../../app/views/recetas/delete.php');
            if(isset($_POST['eliminar']))
            {
                if($receta->delete())
                {
                    Page::showMessage(1, 'El registro del animal se ha eliminado', 'index.php');
                }
                else
                {
                    Page::showMessage(2, Database::getException(), '');
                }
            }
        }

    } catch (Exception $error) {
        //throw $th;
        Page::showMessage(3, $error->getMessage(), '');
    }
?>