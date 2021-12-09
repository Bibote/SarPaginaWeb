<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
			body{
				background-image: url(../images/fondoregistro.png);
        text-align: center;
       

				
				}
        form {
				margin: auto;
				width: 50%;
				max-width: 500px;
				background-color: beige;
				padding: 20px;
				border: 1px solid rgba(0,0,0,0.2);
				font-size: 25px;
        font-family:"Arial", Helvetica, sans-serif;
        display:inline-block;
        font-weight: bold;
      
        }
        input {

display: block;
padding: 7px;
width: 100%;
margin: 30px 0;
font-size: 15px;


}


input[type="submit"] {

background: linear-gradient(white,white);
border:0;
color: black;
opacity: 0.7;
cursor: pointer;
border-radius: 20px;
margin-bottom: 0;

}


input[type="submit"]:hover {

opacity: 0.5;


}

input[type="submit"]:active {
transform: scale(0.9);

}
</style>
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
            $_SESSION['nombre']=$email;
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



</body>
</html>
