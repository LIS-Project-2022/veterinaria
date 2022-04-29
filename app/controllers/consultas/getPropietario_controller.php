<?php
    require_once('../../models/database.class.php');
    require_once('../../helpers/validator.class.php');
    require_once('../../models/consulta.class.php');
    try
    {
        $consulta = new Consulta;
        $consulta->setIdRegistroAnimal($_GET['id']);
        $propietario = $consulta->getPropietario();

        echo json_encode($propietario);
    }
    catch(Exception $error)
    {
        $error = $error->getMessage();
        echo json_encode($error);    
    }

?>