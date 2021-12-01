<?php
session_start();
unset($_SESSION['sesion']);
unset($_SESSION['tipo']);
session_destroy();

?>
<script languaje='javascript'> 
alert('Hasta pronto');
location.href='Layout.php';
</script>