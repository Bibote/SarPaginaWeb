<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
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
