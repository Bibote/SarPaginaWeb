<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

  <style type="text/css">
			body{
				background-image: url(../images/fondoregistro.png);
        text-align:center;
				
				}
        form {
				margin: auto;
				width: 50%;
				max-width: 500px;
				background-color: beige;
				padding: 20px;
				border: 1px solid rgba(0,0,0,0.2);
				font-size: 25px;
        font-family: "Arial", Helvetica, sans-serif;
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

opacity: 1;


}

input[type="submit"]:active {
transform: scale(0.9);

}

  </style>
</head>
<body>
<?php include 'Seguridad.php'?>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <h2>Seleccionar calorias de las recetas</h2>
      <form id='buscador' name='buscador' method='POST' action='VerRecetas.php'><!--Formulario para elegir las calorias, se verifica mediante html5-->
        <label for="min">Min calorias* (min 0):</label> 
        <input type="number" id="min" name="min" min="0" max="2999" required ><br>
        <label for="max">Max calorias* (max 3000):</label> 
        <input type="number" id="max" name="max" min="0" max="3000" required><br>
        <input type="submit" id="enviar" name="buscar"><br>
      </form>
    </div>
  </section>
</body>
</html>
