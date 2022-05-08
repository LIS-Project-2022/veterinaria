<?php
    require_once('../../app/models/recetas.class.php');
    $receta = new Receta;
    $registros = $receta->readRegistro();
    
    try {

        if(!isset($_GET['id'])){
            Page::showMessage(2, 'Selecciona una receta', 'index.php');
        }
        if(!$receta->setIdReceta($_GET['id'])){
            Page::showMessage(2, 'El id de la receta no es valido', 'index.php');
        }
        if(!$receta->readRecetaForId()){
            Page::showMessage(2, 'La receta no existe', 'index.php');
        }

        //code...
        if(isset($_POST['modificar'])){
            if(!$receta->setIdRegistro($_POST['nombre'])){
                throw new Exception('Seleccione un animal para la receta');
            }
            else if(!$receta->setEdad($_POST['edad'])){
                throw new Exception('Ingrese la edad del animal');    
            }
            else if(!$receta->setPeso($_POST['peso'])){
                throw new Exception('Ingrese el pero del animal');
            }
            else if(!$receta->setFecha($_POST['fecha'])){
                throw new Exception('Ingrese una fecha para la receta');
            }
            else if(!$receta->setMedicamentos($_POST['medicamentos'])){
                throw new Exception('Ingrese la descripción de los medicamentos');
            }
            else if(!$receta->setEstado(1)){
                throw new Exception('Ocurrio un problema con el estado');
            }
            else if(!$receta->setIdReceta($_GET['id'])){
                throw new Exception('Debe seleccionar una receta');
            }
            else if($receta->update()){
                Page::showMessage(1, 'La receta fue modificada con exito', 'index.php');
            }else{
                Page::showMessage(2, Database::getException(), '');
            }
        }
    } catch (Exception $error) {
        // print in error 
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/recetas/update.php');
?>