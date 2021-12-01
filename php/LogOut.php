<?php
session_start();
unset($_SESSION['nombre']);
session_destroy();

?>
<script languaje='javascript'> 
alert('Hasta pronto');
location.href='Layout.php';
</script>