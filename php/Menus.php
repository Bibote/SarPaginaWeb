<?php include '../php/DbConfig.php' ?>
  <?php
  session_start();
  $tipo='';

  echo "<div id='page-wrap'>";
  if (isset($_SESSION['nombre'])){
    $usuario=($_SESSION['nombre']);
    $conn = mysqli_connect($server, $user, $pass, $basededatos);

    if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT foto FROM UserSar Where email='$usuario'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $foto= "data:image/jpeg;base64,".base64_encode ($row['foto'])."";
    }
    
    if($row['foto']==null) {
      
      $foto="../images/anonimo.jpeg";
     }
    
  }
  
  echo "<header class='main' id='h1'>
  <h1 style='color:#000000' align='left' display:inline;>Tiendª<img style='width:7%;height:7%' src='../images/logo.png'></img></h1>";
      if (!isset($_SESSION['nombre'])){
        echo "<span class='right' style=display:inline><a href='Registro.php'>Registro</a></span>
        <span class='right' style=display:inline><a href='LogIn.php'>Login</a></span>

        </header>
      <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>

      </nav>";
      }else{
        echo "
        <span class='right' style=display:inline ><a>$usuario</a></span>
        <img src='$foto' height='100' width='100' style=display:inline;/>
        <span class='right' style=display:inline;><a href='LogOut.php'>Logout</a></span>
        </header>
      <nav class='main' id='n1' role='navigation'>
        <span><a href='VerPedidos.php'>Ver Pedidos</a></span>

      </nav>";

      }
      
?>
