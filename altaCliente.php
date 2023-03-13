<!-- TeclaWin + R, abrir services.msc ClicDer en MySQL |Iniciar -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="respuestaPhp.css">
</head>
<body>
<h1>Dando de alta cliente</h1>
<?php
include 'valores.php';
$nombreCliente = $_POST[nombreCliente];
$apPatCliente = $_POST[apPatCliente];
$apMatCliente  = $_POST[apMatCliente];
$correoCliente = $_POST[correoCliente];
$contrasena = $_POST[contrasena];
$domicilio = $_POST[domicilio];

/*
echo "Cliente= $nombreCliente CodigoProducto= $apMatCliente Cant= $apPatCliente correo= $correoCliente 
      Domicilio= $domicilio <br>";
*/

function dispError()
{ return mysql_error() . "(" . mysql_errno() . ")" ; }

$db_cnx = mysqli_connect("localhost", $usuarioDB, $contraseñaDB, $nombreBD);
$cnx_rslt = mysqli_connect_errno();

if ($cnx_rslt == 0)
   { echo "Conexion a DB Server exitosa <br>"; }
  else
   { echo "Error de Conexion al DB Server: "  . $cnx_rslt . " " . mysqli_connect_error()
       . "<br><br>" ; exit; }

$sql_cmd = "insert into cliente (nombreCliente, apPatCliente, apMatCliente, correoCliente, contrasena, domicilio) values ( '" . $nombreCliente . "', '" . $apPatCliente . "', '" . $apMatCliente. "', '" . $correoCliente . "' , '" . $contrasena . "', '" . $domicilio . "' );";

//echo "insCmd = $sql_cmd <br>";	
$rslt = mysqli_query($db_cnx, $sql_cmd);
if ($rslt == 1) {
  echo "<h3>Cliente dado de alta</h3>";
  echo "<h3>Gracias por su preferencia</h3>";
  echo "<div>
        <br><br>
        <a href='iniciarSesion.html'>Iniciar Sesión</a>
        <br><br>
        <a href='productos.html'>Ver productos</a>
        <br><br>
        <a href='index.html'>Volver a inicio</a>
        </div>";
  exit;
}

echo "Error al tratar de dar de alta el cliente = $rslt " . mysqli_error($db_cnx) ."<br>";

?>
<div>
  <br><br>
  <a href="iniciarSesion.html">Iniciar Sesión</a>
  <br><br>
  <a href="productos.html">Ver productos</a>
  <br><br>
  <a href="index.html">Volver a inicio</a>
</div>
</body>
</html>