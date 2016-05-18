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

if($stmt2 = $conn->prepare("SELECT sum(valor) as total FROM tbprodutosparacompra where idcompra = ?")) 
	 {

	   $stmt2->bind_param("i",$idcompra); 
	   $stmt2->execute(); 
	   // $stmt->bind_result($preco);


		$stmt2->bind_result($total);
	   while ($stmt2->fetch()) {
	   
	
	   	$valor = $total;
	 
	   }
	}

 $stmt2->close();

if ( $stmt = $conn->prepare("UPDATE tbcompra set valor = ?, data = now() where idcompra = ? ") )
{
	$stmt->bind_param("di",$valor,$idcompra);

	
	$stmt->execute();
	$stmt->close();

echo json_encode( array('retorno2' => true));	
}
else
{
	echo json_encode( array('retorno2' => false));	
}




$conn->close();

?>