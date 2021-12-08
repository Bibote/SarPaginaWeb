<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
			body{
				background-image: url(fondoregistro.png);
        text-align:center;
				
				}
        form {
				margin: auto;
				width: 50%;
				max-width: 500px;
				background-color: white;
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
      <h2>Seleccionar calorias de las recetas</h2>
      <form id='buscador' name='buscador' method='POST' action='VerRecetas.php'>
        <label for="min">Min calorias*:</label> 
        <input type="number" id="min" name="min" required ><br>
        <label for="max">Max calorias*:</label> 
        <input type="number" id="max" name="max" required><br>
        <input type="submit" id="enviar" name="buscar"><br>
      </form>
    </div>
  </section>
</body>
</html>
