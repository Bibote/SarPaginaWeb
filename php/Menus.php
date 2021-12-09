<?php include '../php/DbConfig.php' ?>
  <?php
  session_start();
  $tipo='';

  echo "<div id='page-wrap'>";
  if (isset($_SESSION['nombre'])){//Si se ha iniciado sesion se busca la foto del usuario y si no tiene se le asigna una de anonimo
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
  
  echo "<header class='main' id='h1'>";
      if (!isset($_SESSION['nombre'])){//Si no hay sesion se muestra para registrarte y hacer Login
        echo "
          
        </header>
      <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span><br>
        <br>
        <span class='main'><a href='Registro.php'>Registro</a></span><br>
        <br>
        <span class='main'><a href='LogIn.php'>Login</a></span>

      </nav>";
      }else{//Si hay una sesion iniciada se muestra lo que puede hacer el usuario, su email y su foto
        echo "
        <span class='right' style=display:inline ><a><strong>$usuario</strong></a></span>
        
        <img src='$foto' height='100' width='100' style=display:inline;/>
        
        <span class='right' style=display:inline;><a href='LogOut.php'>Logout</a></span>
        </header>
      <nav class='main' id='n1' role='navigation'>
        <span><a href='ElegirCal.php'>Buscar Receta</a></span><br>
        <br>
        <span><a href='TusRecetas.php'>Ver Recetas Guardadas</a></span>

      </nav>";

      }
      
?>
