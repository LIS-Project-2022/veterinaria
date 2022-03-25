<form method="POST">
    <div class="row">
        <h5>Información del propietario</h5>
        <?php
            Page::textInput('Nombres', 'nombres_p', isset($_POST['nombres_p']) ? $_POST['nombres_p'] : $propietario->getNombres(), 'Ingrese los nombres', 'text');
            Page::textInput('Apellidos', 'apellidos_p', isset($_POST['apellidos_p']) ? $_POST['apellidos_p'] : $propietario->getApellidos(), 'Ingrese los apellidos', 'text');
            Page::textInput('Número de Teléfono', 'telefono_p', isset($_POST['telefono_p']) ? $_POST['telefono_p'] : $propietario->getTelefono(), 'Ingrese el número de teléfono', 'text');
        ?>
    </div>
    <div class="row">
        <h5>Información de animal</h5>
        <?php
            Page::textInput('Nombre', 'nombre_a', isset($_POST['nombre_a']) ? $_POST['nombre_a'] : $animal->getNombre(), 'Ingrese el nombre', 'text');
            Page::textInput('Sexo', 'sexo', isset($_POST['sexo']) ? $_POST['sexo'] : $animal->getSexo(), 'Ingrese el sexo', 'text');
            Page::textInput('Especie', 'especie', isset($_POST['especie']) ? $_POST['especie'] : $animal->getEspecie(), 'Ingrese la especie', 'text');
            Page::textInput('Raza', 'raza', isset($_POST['raza']) ? $_POST['raza'] : $animal->getRaza(), 'Ingrese el sexo', 'text');
            Page::textInput('Color', 'color', isset($_POST['color']) ? $_POST['color'] : $animal->getColor(), 'Ingrese el color', 'text');
            Page::textInput('Fecha de nacimiento', 'fecha_naci', isset($_POST['fecha_naci']) ? $_POST['fecha_naci'] : $animal->getFechaNaci(), 'Ingrese la fecha de nacimiento', 'date');
        ?>
    </div>
    <div class='d-flex justify-content-end mb-3'>
        <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
        <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
    </div>
</form>