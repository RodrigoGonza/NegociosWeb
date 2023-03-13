<!-- TeclaWin + R, abrir services.msc ClicDer en MySQL |Iniciar -->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Procesando pedido</h1>
<?php
$numPedido  = $_POST[numPedido];
$numCliente = $_POST[numCliente];
$codProd    = $_POST[codProducto];
$cantidad   = $_POST[cantidad];

echo "<h2>Recibimos su Pedido num $numPedido </h2>";
echo "Cliente= $numCliente CodigoProducto= $codProd Cant= $cantidad <br>";

function dispError()
{ return mysql_error() . "(" . mysql_errno() . ")" ; }

$db_cnx = mysqli_connect("localhost", "root","spvspv78", "bd231");
$cnx_rslt = mysqli_connect_errno();

if ($cnx_rslt == 0)
   { echo "Conexion a DB Server exitosa <br>"; }
  else
   { echo "Error de Conexion al DB Server: "  . $cnx_rslt . " " . mysqli_connect_error()
       . "<br><br>" ; exit; }


$sql_cmd = "select * from pedidos ; # where numcliente = " . $numCliente;
echo "selCmd = $sql_cmd <br>";		

$rslt_set = mysqli_query($db_cnx, $sql_cmd);
$nRows = mysqli_num_rows($rslt_set);
echo "Rows= " . $nRows. "<br><br>";

echo "<pre>              Ped Prod Cli Cant </pre>";
$n = 1;
while ($n <= $nRows)
  { echo "row # " . $n;
    
    $fila = mysqli_fetch_array($rslt_set);
	echo " Datos=" . $fila[0] . " - " . $fila['codProd'] . " - " . $fila[2] . " - " . $fila['cantidad'] . "<br>" ; 
    $n++;
  }
echo "<br>";

$sql_cmd = "insert into pedidos values ( " . $numPedido . ","
        . "\"" . $codProd . "\"" . "," . $numCliente . "," . $cantidad . ");";
echo "insCmd = $sql_cmd <br>";	

$rslt = mysqli_query($db_cnx, $sql_cmd);
echo "InsRslt = $rslt " . mysqli_error($db_cnx) ."<br>";


echo "<h3>Gracias por su preferencia</h3>";
?>
</body>
</html>