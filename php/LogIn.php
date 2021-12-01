<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
    <form id='logIn' name='logIn' method='POST' enctype="multipart/form-data">
        <label for="email">Email*:</label> 
        <input type="text" id="email" name="email" ><br>
        <label for="password">Contraseña*:</label> 
        <input type="password" id="password" name="password" ><br>
      <br>
      <input type="submit" id="enviar" name="enviar"><br>

      <?php
      
      if(isset($_POST['enviar'])) {
        $errores = '';
     
        $post = (isset($_POST['email']) && !empty($_POST['email'])) &&
              (isset($_POST['password']) && !empty($_POST['password']));


        if ($post) {  
            $email = $_POST['email'];
            $password = $_POST['password'];
            

        }else{
          $errores = "Hay campos sin rellenar";
        }
        
        if(!$errores=='') {
          print($errores);
        }
        else {
          $link = mysqli_connect ($server, $user, $pass, $basededatos);
          $desencriptada = crypt($password,'encriptador');
          $sql1="SELECT * FROM UserSar WHERE email='$email' AND contraseña='$desencriptada'";
          $result=null;
          $result = mysqli_query($link,$sql1);
          mysqli_close($link);
          if(mysqli_num_rows($result) > 0) {
            $usuario=mysqli_fetch_assoc($result);
            $_SESSION['sesion']=$email;
            header('Location:Layout.php');

          }
          else{
            echo ("Par&aacute;metros de login incorrectos ");
          }  
        }
      }
      ?>
      
    </div>
  </section>
  <script src="../js/Increase.js"></script>
  <?php include '../html/Footer.html' ?>


</body>
</html>
