
<?php 
include_once ('relatorios/setting.php');

header ( "Access-Control-Allow-Origin: * " );
class A { 

    public $vendas = array(); 
}


		
		$idcompra = $_GET["idcompra"];
		$venda = new A;
  
 		$conecta = mysql_connect($server, $user, $pass) or print (mysql_error()); 
		mysql_select_db($db, $conecta) or print(mysql_error()); 
		$sql = "SELECT V.id as idvenda, P.codigodebarras as codigobarras, P.nome as nome, P.unidade as unidade, V.quantidade as quantidade, P.preco as valor, V.valor as valortotal from tbproduto as P inner join tbprodutosparacompra as V on P.idproduto = V.idproduto and V.idcompra = ".$idcompra." order by V.id desc" ; 
		$result = mysql_query($sql, $conecta); 

    	while($consulta = mysql_fetch_array($result)) { 
  
			array_push($venda->vendas, new B($consulta["idvenda"],$consulta["codigobarras"],utf8_encode($consulta["nome"]),$consulta["unidade"],$consulta["quantidade"],$consulta["valor"],$consulta["valortotal"]));
		   // print "Coluna1: $consulta[cpf] - Coluna2: $consulta[nome]<br>"; 
		} 


 
        $conecta = mysql_connect($server, $user, $pass) or print (mysql_error()); 
        mysql_select_db($db, $conecta) or print(mysql_error()); 
        $sql = "SELECT sum(valor) as total, count(idcompra) as quantidadeItens from tbprodutosparacompra where idcompra = ".$idcompra;
        $result = mysql_query($sql, $conecta); 
        while($consulta = mysql_fetch_array($result)) { 
        $quantidadeItens = $consulta["quantidadeItens"];
        $total = $consulta["total"];
        }

		mysql_free_result($result); 
		mysql_close($conecta); 
   


class B { 
    public $idvenda; 
    public $codigobarras;
    public $nome;
    public $unidade;
    public $quantidade;
    public $valor;
    public $valortotal;

    function  __construct($idvenda, $codigobarras, $nome, $unidade,$quantidade,$valor, $valortotal){ 
    	
    	$this->idvenda = $idvenda;
    	$this->codigobarras =  $codigobarras;
    	$this->nome = $nome;
    	$this->unidade =  $unidade;
    	$this->quantidade = $quantidade;
    	$this->valor = $valor;
    	$this->valortotal = $valortotal;
     }
} 

echo json_encode(array('vendas'=>$venda ,'quantidadeItens'=>$quantidadeItens,'total'=>$total) ); 
?> 