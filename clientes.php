
<?php 

class A { 

    public $collection = array(); 

    function  __construct(){ 
    	$server="servidor2.stchost.com.br";
		 $db="sisstc";
		 $user="stchost";
		 $pass="os@Ruam08@";
 		$conecta = mysql_connect($server, $user, $pass) or print (mysql_error()); 
		mysql_select_db($db, $conecta) or print(mysql_error()); 
		$sql = "SELECT cpf, nome FROM tbcliente"; 
		$result = mysql_query($sql, $conecta); 

    	while($consulta = mysql_fetch_array($result)) { 
    		$var = utf8_encode($consulta["nome"]);
			array_push($this->collection, new B($var,$consulta["cpf"]));
		   // print "Coluna1: $consulta[cpf] - Coluna2: $consulta[nome]<br>"; 
		} 

		mysql_free_result($result); 
		mysql_close($conecta); 
    } 
} 

class B { 
    public $nome = 1; 
    public $cpf ; 

    function  __construct($nomex , $cpfx){ 
    	
    	$this->nome = $nomex;
    	$this->cpf = $cpfx;
    }
} 

echo json_encode(new A); 
?> 