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
	
	if($stmt = $conn->prepare("SELECT CA.cpfcliente as cpfcliente,CA.idcompra as idcompra, CL.nome as nome FROM tbcompra as CA inner join tbcliente  as CL on CL.cpf = CA.cpfcliente  and CA.data is null limit 1")) 
	{
			$stmt->execute(); 
			
			$stmt->bind_result($cpfcliente,$idcompra,$nome);
			if (!$stmt->fetch())
			{
					
					echo json_encode( array('retorno' => 0));	
			}
			else
			{

				echo json_encode( array('retorno' => 1, 'cpfcliente' => $cpfcliente, 'idcompra' => $idcompra,'nome' => $nome ));	
			}
			$stmt->close();
	}
}


$conn->close();
?>