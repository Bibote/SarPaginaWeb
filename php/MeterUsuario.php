
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
			body{
				background-image: url(../images/fondoregistro.png);
        text-align:center;
				
				}
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
    <?php
        $errores = '';
        $regexA = '/^[a-zA-Z0-9\.]+@[a-zA-Z]+\.[a-zA-Z]+$/i';//Regex para comprobar el email
     
         $post = (isset($_POST['email']) && !empty($_POST['email'])) &&
              (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
              (isset($_POST['password1']) && !empty($_POST['password1']))&&
              (isset($_POST['password2']) && !empty($_POST['password2'])); //Verifica que todo esta lleno
          $email = $_POST['email'];
          $password1 = $_POST['password1'];
          $encriptada = crypt($password1,'encriptador');
          $password2 = $_POST['password2'];
          $foto=null;
          if ($_FILES['foto']['tmp_name']!='') {
            $foto =addslashes(file_get_contents($_FILES['foto']['tmp_name']));//Se cambia el formato de la imagen para meterlo en la base de datos
          }

          
          if ($post) {  
           $nombre = $_POST['nombre'];


          }else{
           $errores = "Hay campos obligatorios sin rellenar";
         }
         if (strlen($password1)<8){
            $errores = "La contraseña debe tener al menos 8 caracteres";//Verifica que la contraseña tiene 8 caracteres
          }
          if ($password1!=$password2){//Verifica que las contraseñas coinciden
            $errores = "Las contraseñas no coinciden";
          }
           if(!preg_match($regexA, $email)){//Verifica que se cumple el regular expresion del email

              $errores = "El email es incorrecto";
           }


          
        
          if(!$errores=='') {
            print($errores);
         }
          else {//Si no hay errores se conecta con la BD para meter al usuario
            $link = mysqli_connect ($server, $user, $pass, $basededatos);
           $sql1="SELECT email FROM UserSar WHERE email='$email' ";
           $result=null;
            $result = mysqli_query($link,$sql1);
           if(mysqli_num_rows($result)==0) {
              $sql2="INSERT INTO UserSar
                 (email,nombre,contraseña,foto) VALUES ('$email','$nombre','$encriptada','$foto')";
              if (!mysqli_query($link, $sql2)){//Si hay algun error con la bd aparece un mensaje de error
                mysqli_close($link);
                echo '<script type="text/javascript">
                alert("Se ha producido un error vuelve a intentarlo.");
                </script>';
               echo "<a href='javascript:history.back();'>Atrás</a>";
             }else{//Si todo funciona bien se mete al usuario
               mysqli_close($link);
                echo "<script type='text/javascript'>
                alert('Usuario guardado con éxito.');
                location.href='LogIn.php';
                </script>
                ";
 
              }
            }
              else{//Si ya existe el usuario se notifica que ya existe
                mysqli_close($link);
                echo "<script type='text/javascript'>
                alert('Este usuario ya existe.');
                location.href='Registro.php';
                </script>";
               }
            }
        
?>
      
    </div>
  </section>
  <script src="../js/Increase.js"></script>



</body>
</html>
