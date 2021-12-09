<?php
//PHP de seguridad que lo que hace es si no hay una sesion iniciada te manda al Layout, este php se incluira en los php de funcionalides de usuario registrados
session_start();

if(!isset($_SESSION['nombre'])) {
    header('Location:Layout.php');
}

?>