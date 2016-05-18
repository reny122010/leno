<?php
include_once ('relatorios/setting.php');
header ( "Access-Control-Allow-Origin: * " );

// Create connection
$conn = new mysqli($server, $user, $pass,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$idcompra= $_GET["idcompra"];



if ( $stmt = $conn->prepare("DELETE FROM tbprodutosparacompra where idcompra = ? ") )
{
	$stmt->bind_param("i",$idcompra);

	
	$stmt->execute();
	$stmt->close();

	if ( $stmt2 = $conn->prepare("DELETE FROM tbcompra where idcompra = ?") )
	{
		$stmt2->bind_param("i",$idcompra);

		
		$stmt2->execute();

		echo json_encode( array('retorno' => true));
	}
	else
	{

		echo json_encode( array('retorno1' => false));	
	}

	$stmt2->close();	
}
else
{
	echo json_encode( array('retorno2' => false));	
}




$conn->close();

?>