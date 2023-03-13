<!-- Index de Juguetería -->
<!DOCTYPE html>
<html lang="es-MX">
    <head>
       <!-- <link rel="stylesheet" href="css/inicial.css"> -->
    <meta charset="utf-8">
    <script>
    function cambiaParrafo() {
        document.getElementById("parrafo").innerHTML = "parrafo cambiado";
        }
    </script> 
    <script src="js/funciones.js"></script>
    <link rel="stylesheet" href="css/productos.css">
    </head>
    <body style="background-color:powderblue">
        <h1 style="color:darkblue;font-size:50px;font-family:'Lucida Sans';text-align:center;border: 5px solid dodgerblue;">Juguetería</h1>
        <p style="color:tomato"><strong>Juguetes</strong></p>
        <hr>
        <h2 style="color: darkgreen;font-size:30px">Productos</h2>
        <p id="parrafo">Tenemos bicicletas de todas las rodadas</p>
        <img src="imagenes/bicicleta.jpg" width="200" height="150" alt="Bicicleta" title="Bicicleta"> 
        <button type="button" onclick="cambiaParrafo()">Cambiar parrafo</button>
        <button type="button" onclick="compraRealizada()">Hacer compra</button>
        <button onclick="window.print()">Print this page</button>
        <hr>
        <p id="compra"></p>
        <hr>
        <pre style="background-color:lightgreen;font-size:20px">
            <em>
                Contamos con los mejores precios del mercado.

                Recomendado por los consumidores   !!!
            </em>
        </pre>
        <br>
        <a href="https://www.juguetron.mx/">Visitar Juguetron</a>
        <br>
        <?php
        $color = "rojo"; 
        echo "El color es: " . $color . "<br>";
        ?>
        <a href="productos.html">Buscar productos</a>
    </body>
</html>