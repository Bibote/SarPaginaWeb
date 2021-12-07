<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
			body{
				background-image: url(fondoregistro.png);
        
       
        text-align: center;
				
				}

			form {
				margin: auto;
				width: 50%;
				max-width: 500px;
				background: white;
				padding: 20px;
				border: 1px solid rgba(0,0,0,0.2);
				font-size: 25px;
        font-family: "Times New Roman",Helvetica,sans-serif;
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

				background: linear-gradient(red,white);
				border:0;
				color: brown;
				opacity: 0.7;
				cursor: pointer;
				border-radius: 20px;
				margin-bottom: 0;

			}


		input[type="submit"]:hover {

				opacity: 1;


			}

		input[type="submit"]:active {
				transform: scale(0.9);

			}
		</style>
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
  

</body>
</html>
