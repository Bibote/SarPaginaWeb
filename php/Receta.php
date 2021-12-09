<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include 'Seguridad.php'?>
  <section style="height: 1700px;" class="main" id="s1">
      
    <div>
    <?php
        $datos = json_decode(file_get_contents('https://api.spoonacular.com/recipes/'.$_GET['id'].'/card?apiKey=d61109831e434037a44efd6725f86fb1&maxCalories='), true );
        //Llamada a la API usando el url parametrizadas para conseguir el id 
        if ($datos['status']=='success') {//Se ve si la API tiene la receta
        ?>

        <img src='<?php echo $datos['url']?>'><!--Se pone la imagen que nos ha pasado la api en el Json-->
        <?php
        }
        else {
        ?><!--Si no hay receta se le notifica al user-->
        <h3 style='color:#FF0000'>Receta No Encontrada</h1>
        <?php
        }
        ?>
        


      

    </div>
  </section>
</body>
</html>