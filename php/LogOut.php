<?php
session_start();
unset($_SESSION['nombre']);
session_destroy();

?>
<script languaje='javascript'> 
location.href='Layout.php';
</script>