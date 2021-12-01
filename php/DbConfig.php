<?php
$local=1; //0 para la nube
if ($local==1){
    $server="localhost";
    $user="root";
    $pass="";
    $basededatos="sar";
}
else{
    $server="localhost:3306";
    $user="G14";
    $pass="msSQkFaUwXpW7";
    $basededatos="db_G14";
}
?>
