<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>

<title> mostrar tabla xml</title>
<style type="text/css">
			body{
				background-image: url(../images/fondoregistro.png);
        
       
        text-align: center;
				
				}
</style>
</head>
<body>  
<?php include '../php/DbConfig.php' ?>
<?php include '../php/Menus.php' ?>
<?php include 'Seguridad.php'?>

<section class="main" id="s1">
<div>
<?php
$xml = simplexml_load_file('../xml/Recetas.xml');
?>
<div id=receta-table>
 <center><table bgcolor='beige' border='2'>
    <tr>
        <td>Nombre de la receta</td>
        <td>Calorias</td>
        <td>Foto</td>
        <td>Proteina</td>
        <td>Grasa</td>
        <td>Carbohidratos</td>
        <td>Ver Receta</td>
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
    $id=$att['id']
        
    ?>
<tr>
    <td><?php echo $nombre;?></td> 
    <td><?php echo $cal;?></td>
    <td><?php echo "<img src='$fotoReceta' height='200' width='200'/>";?></td> 
    <td><?php echo $proteina;?></td>
    <td><?php echo $grasa;?></td>
    <td><?php echo $carb;?></td>
    <td><center><input type='button' value='Ver Receta' onclick="verReceta('<?php echo $id ?>')")></td> 
    

</tr>
<?php 
}
} ?>
</table>
</div id=receta-table>
<script src="../js/VerReceta.js"></script>
</div>
</section>
</body>
</html>