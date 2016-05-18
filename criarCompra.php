<?php
include_once ('relatorios/setting.php');

header ( "Access-Control-Allow-Origin: * " );
// Create connection
$conn = new mysqli($server, $user, $pass,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ( $stmt = $conn->prepare("INSERT INTO tbcompra (cpfcliente) VALUES (?)") )
{
	$stmt->bind_param("i",$cpfcliente);

	// // set parameters and execute
	$cpfcliente = $_GET["cpf"];
	$stmt->execute();

	$arr = array('idcompra' => $conn->insert_id);
	echo json_encode($arr);		
}
else
{

	echo "Erro".$conn->error;
}



$stmt->close();
$conn->close();
?>
