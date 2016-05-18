<?php
include_once ('relatorios/setting.php');
header ( "Access-Control-Allow-Origin: * " );

// Create connection
$conn = new mysqli($server, $user, $pass,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	
	if($stmt = $conn->prepare("SELECT cpfcliente,idcompra FROM tbcompra  where data is null limit 1")) 
	{
			$stmt->execute(); 
			
			$stmt->bind_result($cpfcliente,$idcompra);
			if (!$stmt->fetch())
			{
					
					echo json_encode( array('retorno' => 0));	
			}
			else
			{

				echo json_encode( array('retorno' => 1, 'cpfcliente' => $cpfcliente, 'idcompra' => $idcompra));	
			}
			$stmt->close();
	}
}


$conn->close();
?>