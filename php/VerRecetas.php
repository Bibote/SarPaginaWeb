<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

  <style type="text/css">
			body{
				background-image: url(../images/fondoregistro.png);
        
       
        text-align: center;
				
				}
        </style>
</head>
<body>
<?php include 'Seguridad.php'?>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <?php
$_GET['min'];
$_GET['max'];
//LLamada a la api para ver Recetas
$datos = json_decode( file_get_contents('https://api.spoonacular.com/recipes/findByNutrients?apiKey=d61109831e434037a44efd6725f86fb1&maxCalories='.$_POST['max'].'&minCalories='.$_POST['min'].'&number=3'), true );
      if(($datos['status'])=='failure') {
        print_r("No disponible");
              
      }
      else {
 
        echo "
        <center><table bgcolor='beige' border='2'>
        <tr>
          <td>Nombre de la receta</td>
          <td>Calorias</td>
          <td>Foto</td>
          <td>Proteina</td>
          <td>Grasa</td>
          <td>Carbohidratos</td>
          <td>Guardar Receta</td>
        </tr>";
        foreach($datos as $dato) {
        $id=$dato['id'];
        $nombre=$dato['title'];
        $fotoReceta=$dato['image'];
        $calorias=$dato['calories'];
        $proteina=$dato['protein'];
        $grasa=$dato['fat'];
        $carbs=$dato['carbs'];
        echo "
              <tr>
                <td> $nombre </td>
                <td> $calorias </td>
                <td> <img src='$fotoReceta'></td>
                <td> $proteina </td>
                <td> $grasa </td>
                <td> $carbs </td>
                ";
                echo"<td>"; 
                ?>
                <!--Boton para guardar la receta pasando los parametros de cada fila de la tabla a su respectivo boton-->
                  <center><input type='button' value='Guardar' onclick="guardar('<?php echo $id?>','<?php echo $nombre?>','<?php echo $calorias?>','<?php echo $fotoReceta?>','<?php echo $proteina?>','<?php echo $grasa?>','<?php echo $carbs?>')"> 
                 
                 <?php
        echo" </td>";
                
             echo"</tr>";
              
        }
        echo"</table>";
      }
      //div para mostrar con Ajax si se ha guardado la receta
      echo "<div id='result'>";
?>
  </section>

  <script src="../js/guardarAjax.js"></script>
</body>
</html>