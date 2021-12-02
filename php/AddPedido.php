<?php
session_start();
print_r($_GET['juego']);
$xml = simplexml_load_file('../xml/Pedidos.xml');
      $pedidos = $xml->addChild('Pedido');
      $pedidos->addAttribute('nombre',$_SESSION['nombre']);
      $pedidos->addAttribute('juego',$_GET['juego']);

      $pedidos->addChild('Genero',$_GET['genero']);

      $pedidos->addChild('Precio',$_GET['precio']);

      $pedidos->addChild('Fecha',date("d/m/Y"));
      
      $pedidos->addChild('Foto',$_GET['fotojuego']);
      
      echo $xml->asXML('../xml/Pedidos.xml');

      header('Location:VerPedidos.php');

?>