<?php
$local=0; //0 para la nube
//Informacion para conectarse con la base de datos
if ($local==1){
    $server="localhost";
    $user="root";
    $pass="";
    $basededatos="sar";
}
else{
    $server="localhost:3306";
    $user="msaez034";
    $pass="KQzMwoXZhNXb";
    $basededatos="db_msaez034";
}
?>
