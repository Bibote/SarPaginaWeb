<?php
session_start();
unset($_SESSION['nombre']);//Se borra el objeto de sesion y se destruye
session_destroy();

?>
<script languaje='javascript'> 
location.href='Layout.php';//se redirecciona al layout de la pagina
</script>