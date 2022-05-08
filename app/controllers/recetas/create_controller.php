<?php
    require_once('../../app/models/recetas.class.php');
    $receta = new Receta;
    $registros = $receta->readRegistro();
    
    try {
        //code...
        if(isset($_POST['agregar'])){
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
            else if($receta->create()){
                Page::showMessage(1, 'La receta fue creada con exito', 'index.php');
            }else{
                Page::showMessage(2, Database::getException(), '');
            }
        }
    } catch (Exception $error) {
        // print in error 
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/recetas/create.php');
?>