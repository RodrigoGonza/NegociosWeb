<!-- TeclaWin + R, abrir services.msc ClicDer en MySQL |Iniciar -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h1>Compra registrada</h1>

<?php
include 'valores.php';
$nombreCliente = $_POST['nombreCliente'];
$correoElectronico = $_POST['correoElectronico'];
$cantidad = $_POST['cantidad'];
$domicilioEntrega = $_POST['domicilioEntrega'];
$producto = $_POST['producto'];
$idProducto = 0;
$precio = 0;
$cadena = "$nombreCliente $correoElectronico $cantidad $domicilioEntrega $producto";
echo "<h1> $cadena </h1>";
var_dump($_POST);

function dispError()
{ return mysql_error() . "(" . mysql_errno() . ")" ; }
    
$db_cnx = mysqli_connect("localhost", $usuarioDB, $contraseñaDB, $nombreBD);
$cnx_rslt = mysqli_connect_errno();
    
if ($cnx_rslt == 0)
    { echo "Conexion a DB Server exitosa <br>"; }
    else
    { echo "Error de Conexion al DB Server: "  . $cnx_rslt . " " . mysqli_connect_error()
       . "<br><br>" ; exit; }

if ($producto == "balon") 
    { $idProducto = 1;
      $precio = 199.99; }
    elseif ($producto == "triciclo")
    { $idProducto = 2;
      $precio = 1999.99; }
    elseif ($producto == "bicicleta")
    { $idProducto = 3; 
      $precio = 2999.99; } 
    elseif ($producto == "patin") 
    { $idProducto = 4;
      $precio = 999.99; }

$sql_cmd = "insert into venta (id_producto, nombre_cliente, correo_electronico, cantidad, total, domicilio_entrega) 
            values ( '" . $idProducto . "', '" . $nombreCliente . "', '" . $correoElectronico. "', '" . $cantidad . "' , '" . $cantidad*$precio . "', '" . $domicilioEntrega . "' );";
echo "insCmd = $sql_cmd <br>";	

$rslt = mysqli_query($db_cnx, $sql_cmd);
echo "InsRslt = $rslt " . mysqli_error($db_cnx) ."<br>";

echo "<h3>Gracias por su preferencia</h3>";

?>
<a href="index.html">Volver a Inicio</a>

</body>
</html>