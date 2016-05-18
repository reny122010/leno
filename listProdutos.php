

<?php 
include_once ('relatorios/setting.php');

header ( "Access-Control-Allow-Origin: * " );
class A { 

    public $produtos = array(); 
}
		
		$produto = new A;
  
 		$conecta = mysql_connect($server, $user, $pass) or print (mysql_error()); 
		mysql_select_db($db, $conecta) or print(mysql_error()); 
		$sql = "SELECT Idproduto, codigodebarras, nome FROM tbproduto"; 
		$result = mysql_query($sql, $conecta); 

    	while($consulta = mysql_fetch_array($result)) { 
  
			array_push($produto->produtos, new B($consulta["Idproduto"],utf8_encode($consulta["codigodebarras"]),utf8_encode($consulta["nome"])));
		   // print "Coluna1: $consulta[cpf] - Coluna2: $consulta[nome]<br>"; 
		} 

		mysql_free_result($result); 
		mysql_close($conecta); 
   


class B { 
    public $Idproduto; 
    public $codigodebarras ; 
    public $nome ; 

    function  __construct($Idprodutox , $codigodebarrasx, $nomex){ 
    	
    	$this->Idproduto = $Idprodutox;
    	$this->codigodebarras = $codigodebarrasx;
    	$this->nome = $nomex;
    }
} 


$fp = fopen('listProdutos.json', 'w');
fwrite($fp, json_encode($produto));
fclose($fp);
?> 