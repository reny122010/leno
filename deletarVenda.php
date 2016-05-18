<?php
include_once ('relatorios/setting.php');
header ( "Access-Control-Allow-Origin: * " );

// Create connection
$conn = new mysqli($server, $user, $pass,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$idvenda = $_GET["idvenda"];



if ( $stmt = $conn->prepare("DELETE FROM tbprodutosparacompra where id = ?") )
{
	$stmt->bind_param("i",$idvenda);

	
	$stmt->execute();

	echo json_encode( array('retorno' => true));	
}
else
{
	echo json_encode( array('retorno' => false));	
}



$stmt->close();
$conn->close();

?>