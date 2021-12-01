<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  
    <div>
    <form id='signUp' name='signUp' method='POST' enctype="multipart/form-data" action="MeterUsuario.php">
        <label for="email">Email*:</label> 
        <input type="email" id="email" name="email" require><br>
        <label for="nombre">Nombre*:</label> 
        <input type="text" id="nombre" name="nombre" ><br> 
        <label for="password1">Contraseña*:</label> 
        <input type="password" id="password1" name="password1" ><br>
        <label for="password2">Repetir contraseña*:</label> 
        <input type="password" id="password2" name="password2" ><br>
        <label for="foto">Foto</label>
        <input type="file" accept="image/*" name="foto" onchange='loadFile(event)'<br>
      <input type="submit" id="enviar" name="enviar"><br>
    </form>
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

      
    </div>
    
    
  </section>
  <script src="../js/ClientEnrollment.js"></script>
  <?php include '../html/Footer.html' ?>
  

</body>
</html>
