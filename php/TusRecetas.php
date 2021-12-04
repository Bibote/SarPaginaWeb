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
$xml = simplexml_load_file('../xml/Recetas.xml');
?>
<div id=receta-table>
 <center><table style="overflow-y:auto; height: 500px;" bgcolor='AFEEEE' border='2'>
    <tr>
        <td>Nombre de la receta</td>
        <td>Calorias</td>
        <td>Foto</td>
        <td>Proteina</td>
        <td>Grasa</td>
        <td>Carbohidratos</td>
    </tr>
<?php
foreach($xml->children() as $pedidos){
    $att = $pedidos->attributes();
    if($att['owner']==$_SESSION['nombre']){
    foreach($pedidos->children() as $child){
        if ($child->getName()=='Nombre'){
            $nombre=$child;
        }
        if ($child->getName()=='Calorias'){
            $cal=$child;
        }
        if ($child->getName()=='FotoReceta'){
            $fotoReceta=$child;
        }
        if ($child->getName()=='Proteina'){
            $proteina=$child;
        }
        if ($child->getName()=='Grasa'){
            $grasa=$child;
        }
        if ($child->getName()=='Carbohidratos'){
            $carb=$child;
        }
    }
        
    ?>
<tr>
    <td><?php echo $nombre;?></td> 
    <td><?php echo $cal;?></td>
    <td><?php echo "<img src='$fotoReceta' height='200' width='200'/>";?></td> 
    <td><?php echo $proteina;?></td>
    <td><?php echo $grasa;?></td>
    <td><?php echo $carb;?></td>
    

</tr>
<?php 
}
} ?>
</table>
</div id=receta-table>
</div>
</section>
<?php include '../html/Footer.html' ?>
</body>
</html>