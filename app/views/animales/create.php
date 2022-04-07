<form method="POST">
    <div class="row">
        <h5>Información del propietario</h5>
        <?php
            Page::textInput('Nombres', 'nombres_p', isset($_POST['nombres_p']) ? $_POST['nombres_p'] : '', 'Ingrese los nombres', 'text');
            Page::textInput('Apellidos', 'apellidos_p', isset($_POST['apellidos_p']) ? $_POST['apellidos_p'] : '', 'Ingrese los apellidos', 'text');
            Page::textInput('Número de Teléfono', 'telefono_p', isset($_POST['telefono_p']) ? $_POST['telefono_p'] : '', 'Ingrese el número de teléfono', 'text');
        ?>
    </div>
    <div class="row">
        <h5>Información de animal</h5>
        <?php
            Page::textInput('Nombre', 'nombre_a', isset($_POST['nombre_a']) ? $_POST['nombre_a'] : '', 'Ingrese el nombre', 'text');
            $sexos=[ [0=>"Macho", 1 =>"Macho"], [0=>"Hembra", 1 =>"Hembra"] ];
            Page::showSelect('Sexo', 'sexo', isset($_POST['sexo']) ? $_POST['sexo'] : '', $sexos );
            $especies=[[0=>"Felino", 1 =>"Felino"], [0=>"Canino", 1 =>"Canino"]];
            Page::showSelect('Especie', 'especie', isset($_POST['especie']) ? $_POST['especie'] : '', $especies);
            Page::textInput('Raza', 'raza', isset($_POST['raza']) ? $_POST['raza'] : '', 'Ingrese la raza', 'text');
            Page::textInput('Color', 'color', isset($_POST['color']) ? $_POST['color'] : '', 'Ingrese el color', 'text');
            Page::textInput('Fecha de nacimiento', 'fecha_naci', isset($_POST['fecha_naci']) ? $_POST['fecha_naci'] : '', 'Ingrese la fecha de nacimiento', 'date');
        ?>
    </div>
    <div class='d-flex justify-content-end mb-3'>
        <button type="submit" name='agregar' class="btn btn-agregar me-3">Agregar</button>
        <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
    </div>
</form>