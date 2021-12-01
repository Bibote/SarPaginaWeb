<?php
session_start();
$xml = simplexml_load_file('../xml/Pedidos.xml');
      $pedidos = $xml->addChild('Pedido');
      $pedidos->addAttribute('nombre',$_SESSION['nombre']);
      $pedidos->addAttribute('juego','ajedrez3');

      $pedidos->addChild('Genero','historia');

      $pedidos->addChild('Precio','gratis');

      $pedidos->addChild('Fecha','12/5/4545');
      


      echo $xml->asXML('../xml/Pedidos.xml');

      header('Location:Layout.php');

?>