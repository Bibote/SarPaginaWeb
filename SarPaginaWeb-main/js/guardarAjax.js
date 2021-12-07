function guardar(id, nombre,calorias, fotoReceta, proteina,grasas,carbs) {
    XMLHttp= new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (XMLHttp.readyState==4 && XMLHttp.status==200){
            document.getElementById("result").innerHTML=XMLHttp.responseText;
        }
    }
XMLHttp.open("GET","AddReceta.php?id="+id+"&&nombre="+nombre+"&&calorias="+calorias+"&&fotoReceta="+fotoReceta+"&&proteina="+proteina+"&&grasa="+grasas+"&&carbohidratos="+carbs, true);
XMLHttp.send();  

}