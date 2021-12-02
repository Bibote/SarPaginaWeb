function comprar(nombre,genero,precio,foto) {
    location.href="AddPedido.php?juego="+nombre+"&&genero="+genero+"&&precio="+precio+"&&fotojuego="+foto;
}