<?php
include_once ('relatorios/setting.php');
header ( "Access-Control-Allow-Origin: * " );

// Create connection
$conn = new mysqli($server, $user, $pass,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$idcompra = $_GET["idcompra"];
$idproduto = $_GET["idproduto"];
$quantidade= $_GET["quantidade"];



 if($stmt = $conn->prepare("SELECT quantidade as quantidadeaux FROM tbproduto where idproduto = ?")) 
{

		$stmt->bind_param("i",$idproduto); 
		$stmt->execute(); 
						   // $stmt->bind_result($preco);


		$stmt->bind_result($quantidadeaux);

		if (!$stmt->fetch())
		{
				echo json_encode( array('retorno' => 3));	
		}
		else
		{
						  

			if 	($quantidade <= $quantidadeaux )
			{

						$stmt->close();
						
						 if($stmt = $conn->prepare("SELECT preco FROM tbproduto where idproduto = ?")) 
							 {
								
							   $stmt->bind_param("i",$idproduto); 
							   $stmt->execute(); 

								$stmt->bind_result($preco);							 			   
							
							   	
							   	if (!$stmt->fetch())
								{
											echo json_encode( array('retorno' => 3));	
								}
								{
									$valor = $preco*$quantidade;
								

								$stmt->close();

									if ( $stmt = $conn->prepare("INSERT INTO tbprodutosparacompra (Idcompra,idproduto,quantidade,valor) VALUES (?,?,?,?)") )
									{
										$stmt->bind_param("iiid",$idcompra,$idproduto,$quantidade,$valor);


										
										$stmt->execute();

										echo json_encode( array('retorno' => 0,  'valor'=>$valor));	
									}
									else
									{
										echo json_encode( array('retorno' => 1));	
									}							 	
							   
							}
							
						}
						else
						{
							echo json_encode( array('retorno' => 1));		
						}

			}
			else
			{
				echo json_encode( array('retorno' => 2, 'quantidade' => $quantidadeaux));				
			}
		}
		

		
	}


$conn->close();

?>