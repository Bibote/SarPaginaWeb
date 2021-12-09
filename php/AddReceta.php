<?php
session_start();
//Aqui se añadira las recetas al xml y se notificara al usuario de que se ha guardado
$xml = simplexml_load_file('../xml/Recetas.xml');
      $receta = $xml->addChild('Receta');
      $receta->addAttribute('owner',$_SESSION['nombre']);
      $receta->addAttribute('id',$_GET['id']);

      $receta->addChild('Nombre',$_GET['nombre']);

      $receta->addChild('Calorias',$_GET['calorias']);

      $receta->addChild('FotoReceta',$_GET['fotoReceta']);

      $receta->addChild('Proteina',$_GET['proteina']);

      $receta->addChild('Grasa',$_GET['grasa']);
      
      $receta->addChild('Carbohidratos',$_GET['carbohidratos']);
      echo $xml->asXML('../xml/Recetas.xml');
      echo "<h3 style='color:#0000FF'>Receta Guardada</h1>";

?>