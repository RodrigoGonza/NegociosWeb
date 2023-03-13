<!-- Página de reportes de ventas -->
<!DOCTYPE html>
<html lang="es-MX">
    <head>
    <meta charset="utf-8">
    <script>
    function cambiaParrafo() {
        document.getElementById("parrafo").innerHTML = "parrafo cambiado";
        }
    </script> 
    <script defer src="js/inicio.js"></script>
    <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="inicial.css">
    </head>
    <body style="background-color:powderblue">
        <header class="header">
            <nav class="nav">
                <a href="index.html" class="logo hipervinculo">Logo</a>
                <button class="menu-desplegable">
                    <img src="imagenes/menu.png" width="20px" height="20px">
                </button>
                <ul class="menu">
                    <li class="menu-boton"><a href="productos.html" class="menu-hipervinculo hipervinculo">Buscar Productos</a></li>
                    <li class="menu-boton"><a href="iniciarSesion.html" class="menu-hipervinculo hipervinculo">Iniciar Sesión</a></li>
                    <li class="menu-boton"><a href="#" class="menu-hipervinculo hipervinculo">Carrito de Compra</a></li>
                    <li class="menu-boton"><a href="#" class="menu-hipervinculo hipervinculo">Ventas</a></li>
                </ul>
            </nav>
        </header>
    <?php
    include 'valores.php';
    $usuario = $_POST[usuario];
    $contrasena = $_POST[contrasena];

    function dispError()
    { return mysql_error() . "(" . mysql_errno() . ")" ; }

    $db_cnx = mysqli_connect("localhost", $usuarioDB, $contraseñaDB, $nombreBD);
    $cnx_rslt = mysqli_connect_errno();

    if ($cnx_rslt == 0)
        { echo "Conexion a DB Server exitosa <br>"; }
    else
        { echo "Error de Conexion al DB Server: "  . $cnx_rslt . " " . mysqli_connect_error()
          . "<br><br>" ; exit; }

    //Validación de usuario y contraseña.
    $adminValido = "select usuario_administrador, contrasena from administrador 
                where usuario_administrador = '" . $usuario . "' and contrasena = '" . $contrasena . "';";

    $rslt_set = mysqli_query($db_cnx, $adminValido);
    $nRows = mysqli_num_rows($rslt_set);

    if ($nRows == 0)
        {
            echo "Usuario inexistente o contraseña incorrecta <br><br>" ; exit;
        }

    //Muestra de las ventas realizadas
    $ventas = "select * from venta";

    $rslt_set = mysqli_query($db_cnx, $ventas);
    $nRows = mysqli_num_rows($rslt_set);
    $n = 1;
    $tablaResultados = "<table>
                        <tr>
                        <th>id_venta</th> <th>producto</th> <th>cliente</th> <th>cantidad</th> <th>correo</th> <th>total</th> <th>domicilio_entrega</th>
                        </tr>";
    while ($n <= $nRows)
        { 
        $fila = mysqli_fetch_array($rslt_set);
        $tablaResultados = $tablaResultados . "
            <tr>
           
            <td>" . $fila['id_venta'] . "</td>
           
            <td>" . $fila['id_producto'] . "</td>
           
            <td>" . $fila['nombre_cliente'] . "</td>
           
            <td>" . $fila['cantidad'] . "</td>
           
            <td>" . $fila['correo_electronico'] . "</td>
           
            <td>" . $fila['total'] . "</td>
           
            <td>" . $fila['domicilio_entrega'] . "</td>
           
            </tr>"
           
            ;

        $n++;
        }

    $tablaResultados = $tablaResultados . "</table>";

    echo $tablaResultados;

    echo "<br>";
    ?>

    <footer>
        <p>&copy;Juguetería</p>
        <ul>
            <li><a href="/acerca-de">Acerca de</a></li>
            <li><a href="/conectar">Conectar</a></li>
            <li><a href="/rrss">Redes Sociales</a></li>
        </ul>
    </footer>
</html>