<!-- TeclaWin + R, abrir services.msc ClicDer en MySQL |Iniciar -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="respuestaPhp.css">
</head>
<body>
<?php
include 'valores.php';
$correoCliente = $_POST[correoCliente];
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
$adminValido = "select correoCliente, contrasena from cliente 
where correoCliente = '" . $correoCliente. "' and contrasena = '" . $contrasena . "';";

$rslt_set = mysqli_query($db_cnx, $adminValido);
$nRows = mysqli_num_rows($rslt_set);

if ($nRows == 0)
{
echo "Usuario inexistente o contraseña incorrecta <br><br>" ;
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

echo "<script>window.alert('Se ha iniciado sesión')</script>";
echo "<h3>Sesión iniciada<h3><br>";
?>

<div>
  <br><br>
  <a href="productos.html">Ver productos</a>
  <br><br>
  <a href="index.html">Volver a inicio</a>
</div>

</body>
</html>