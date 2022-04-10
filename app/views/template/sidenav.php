<?php
    $tipo_usuario = $_SESSION['auth']['id_tipo_usuario'];
?>
<div class="offcanvas offcanvas-start sidenav-sav" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-body" style='padding:0;'>
        <ul class='sidenav-list-sav'>
            <li class='sidenav-item-sav <?=$urlArr[3] === 'home' ? 'active' : ''?>'>
                <a href="../home"><i class="bi bi-house-door-fill"></i>Home</a>
            </li>
            <li class='sidenav-item-sav <?=$urlArr[3] === 'animales' ? 'active' : ''?>'> 
                <a href="../animales"><i class="bi bi-clipboard2-pulse"></i>Registro de animales</a>
            </li>
            <?php
                //SI EL TIPO DE USUARIO ES ADMIN
                if($tipo_usuario == 1)
                {
            ?>
                <li class='sidenav-item-sav <?=$urlArr[3] === 'usuarios' ? 'active' : ''?>'>
                    <a href="../usuarios"> <i class="bi bi-people-fill"></i>Usuarios</a>
                </li>
                <li class='sidenav-item-sav <?=$urlArr[3] === 'tipo_usuario'? 'active' : ''?>'>
                    <a href="../tipo_usuario"> <i class="bi bi-people-fill"></i>Tipos de usuario</a>
                </li>
            <?php
                }
            ?>
            
            <?php
                //SIL EL TIPO DE USUARIO ES DOCTOR
                if($tipo_usuario == 2)
                {
            ?>
                <li class='sidenav-item-sav <?=$urlArr[3] === 'consultas'? 'active' : ''?>'>
                    <a href="../consultas"><i class="bi bi-heart-pulse"></i>Consultas</a>
                </li>
            <?php
                }
            ?>
            
            <li class='sidenav-item-sav <?=$urlArr[3] === 'recetas'? 'active' : ''?>'>
                <a href="../recetas"><i class="bi bi-file-text"></i>Recetas</a>
            </li>
            <li class='sidenav-item-sav <?=$urlArr[3] === 'citas'? 'active' : ''?>'>
                <a href="../citas"><i class="bi bi-calendar-date-fill"></i>Citas</a>
            </li>
            <li class='sidenav-item-sav <?=$urlArr[3] === 'facturas'? 'active' : ''?>'>
                <a href="../facturas"><i class="bi bi-receipt"></i>Facturas</a>
            </li>
            <li class='sidenav-item-sav'>
                <a href="../perfil/logout.php"><i class="bi bi-box-arrow-left"></i>Cerrar sesion</a>
            </li>
        </ul>
    </div>
</div>