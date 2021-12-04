
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
    <?php
         $errores = '';
        $regexA = '/^[a-zA-Z0-9\.]+@[a-zA-Z]+\.[a-zA-Z]+$/i';
     
         $post = (isset($_POST['email']) && !empty($_POST['email'])) &&
              (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
              (isset($_POST['password1']) && !empty($_POST['password1']))&&
              (isset($_POST['password2']) && !empty($_POST['password2'])); 
          $email = $_POST['email'];
          $password1 = $_POST['password1'];
          $encriptada = crypt($password1,'encriptador');
          $password2 = $_POST['password2'];
          $foto=null;
          if ($_FILES['foto']['tmp_name']!='') {
            $foto =addslashes(file_get_contents($_FILES['foto']['tmp_name']));
          }

          
          if ($post) {  
           $nombre = $_POST['nombre'];


          }else{
           $errores = "Hay campos obligatorios sin rellenar";
         }
         if (strlen($password1)<8){
            $errores = "La contraseña debe tener al menos 8 caracteres";
          }
          if ($password1!=$password2){
            $errores = "Las contraseñas no coinciden";
          }
           if(!preg_match($regexA, $email)){

              $errores = "El email es incorrecto";
           }


          
        
          if(!$errores=='') {
            print($errores);
         }
          else {
            $link = mysqli_connect ($server, $user, $pass, $basededatos);
           $sql1="SELECT email FROM UserSar WHERE email='$email' ";
           $result=null;
            $result = mysqli_query($link,$sql1);
           if(mysqli_num_rows($result)==0) {
              $sql2="INSERT INTO UserSar
                 (email,nombre,contraseña,foto) VALUES ('$email','$nombre','$encriptada','$foto')";
              if (!mysqli_query($link, $sql2)){
                mysqli_close($link);
                echo "<span style='color:red'>Se ha producido algun error, vuelve a intentarlo</span>";
               echo "<a href='javascript:history.back();'>Atrás</a>";
             }else{
               mysqli_close($link);
                echo "<span style='color:blue'>Usuario creado</span>";
              }
            }
              else{
                mysqli_close($link);
                echo "<span style='color:red'>Este usuario ya existe</span>";

               }
            }
        
?>
      
    </div>
  </section>
  <script src="../js/Increase.js"></script>



</body>
</html>
