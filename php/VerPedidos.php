<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>
<title> mostrar tabla xml</title>
</head>
<body>  
<?php include '../php/DbConfig.php' ?>
<?php include '../php/Menus.php' ?>

<section class="main" id="s1">
<div>
<?php

$xml = simplexml_load_file('../xml/Pedidos.xml');
?>
<center><table border='2' bgcolor='AFEEEE'>
<tr>
      <td>Nombre</td>
      <td>Genero</td>
      <td>Precio</td>
      <td>Fecha</td>
    </tr>
<?php
foreach($xml->children() as $pedidos){
    $nombre = $pedidos->attributes();
    if($nombre['nombre']==$_SESSION['nombre']){
    foreach($pedidos->children() as $child){
        if ($child->getName()=='Genero'){
            $genero=$child;
        }
        if ($child->getName()=='Precio'){
            $precio=$child;
        }
        if ($child->getName()=='Fecha'){
            $fecha=$child;
        }
    }
        
    ?>
<tr>
    <td><?php echo $nombre['juego'];?></td> 
    <td><?php echo $genero;?></td> 
    <td><?php echo $precio;?></td>
    <td><?php echo $fecha;?></td>

</tr>
<?php 
}
} ?>
</table>

</div>
</section>
<?php include '../html/Footer.html' ?>
</body>
</html>