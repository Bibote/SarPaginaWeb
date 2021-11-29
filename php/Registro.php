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
    <form id='signUp' name='signUp' method='POST' enctype="multipart/form-data">
        <label for="email">Email*:</label> 
        <input type="text" id="email" name="email"><br>
        <label for="nombre">Nombre*:</label> 
        <input type="text" id="nombre" name="nombre" ><br> 
        <label for="password1">Contraseña*:</label> 
        <input type="password" id="password1" name="password1" ><br>
        <label for="password2">Repetir contraseña*:</label> 
        <input type="password" id="password2" name="password2" ><br>
        <label for="foto">Foto</label>
        <input type="file" accept="image/*" name="foto" onchange='loadFile(event)'><br>
      <input type="submit" id="enviar" name="enviar"><br>
      <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
      };
      </script>
      <img id='output'/><br>



      <?php
      
      
        if(isset($_POST['enviar'])) { 
         $post=false; 
         $errores = '';
          $regex = '/^[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]+$/i';
     
         $post = (isset($_POST['email']) && !empty($_POST['email'])) &&
              (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
              (isset($_POST['password1']) && !empty($_POST['password1']))&&
              (isset($_POST['password2']) && !empty($_POST['password2']))&&
              (isset($_POST['foto']) && !empty($_POST['foto']));

          
 
          $email = $_POST['email'];
          $password1 = $_POST['password1'];
          $password2 = $_POST['password2'];
          print_r($email);
          if ($post) {  
           $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $encriptada = crypt($password1);
            $foto =addslashes(file_get_contents($_FILES['foto']['tmp_name']));


          }else{
           $errores = "Hay campos obligatorios sin rellenar";
         }
         if (strlen($password1)<8){
            $errores = "La contraseña debe tener al menos 8 caracteres";
          }
          if ($password1!=$password2){
            $errores = "Las contraseñas no coinciden";
          }
           if(!preg_match($regex, $email)){

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
           if(isset($result)) {
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
        }
       
      
      ?>
      
    </div>
    
    
  </section>
  <script src="../js/ClientEnrollment.js"></script>
  <?php include '../html/Footer.html' ?>
  

</body>
</html>
