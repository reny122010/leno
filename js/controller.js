var appHashtag = angular.module("appLeno", []);
var value;

$(document).ready(function() {
    var options = {
    	url: "listProdutos.json",
      	listLocation: "produtos",
      	getValue: "nome",

        list: {
          	onSelectItemEvent: function() {
            		value = $("#provider-json").getSelectedItemData().Idproduto;
            }, 
            match: {
          		enabled: true
        	}
        }
    };
    $("#provider-json").easyAutocomplete(options);
});

appHashtag.controller("lenoCtrl", ['$scope', '$http', '$window',function($scope, $http,$window){

	$scope.venda = {nome:"Não definido", numero:"Não definido", itens:0, total:0.00};
	$scope.status = {now: "Escolha o cliente!"};
	var endereco  = "http://10.0.0.3/sisstc";

	document.getElementById("qnt").value = "1";


	var disableComponentes = function(input){
		switch (input){
			case 1:
				document.getElementById("liLimparVenda").className = "disableicon";
				document.getElementById("liCancelarVenda").className = "disableicon";
				document.getElementById("spanAdicionar").className = "input-group-btn disableicon";
				document.getElementById("divVender").className = "col-lg-12 col-sm-12 col-md-12 col-xs-12 disableicon";
				document.getElementById("liEscolherCliente").className = "dropdown";
				document.getElementById("aEscolherCliente").className = "dropdown-toggle";
				document.getElementById("aLimparVenda").className = "disable";
				document.getElementById("aCancelarVenda").className = "disable";
				document.getElementById("Adicionar").className = "btn btn-secondary disable";
				document.getElementById("btnVender").className = "btn btn-success btnMenu disable";
				$scope.status.now = "Escolha o cliente!";
				break;
			case 2:
				document.getElementById("liLimparVenda").className = "";
				document.getElementById("liCancelarVenda").className = "";
				document.getElementById("spanAdicionar").className = "input-group-btn ";
				document.getElementById("divVender").className = "col-lg-12 col-sm-12 col-md-12 col-xs-12 disableicon";
				document.getElementById("liEscolherCliente").className = "dropdown disableicon";
				document.getElementById("aEscolherCliente").className = "dropdown-toggle disable";
				document.getElementById("aLimparVenda").className = "";
				document.getElementById("aCancelarVenda").className = "";
				document.getElementById("Adicionar").className = "btn btn-secondary ";
				document.getElementById("btnVender").className = "btn btn-success btnMenu disable";
				$scope.status.now = "Escolha os itens!";
				break;
			case 3:
				document.getElementById("liLimparVenda").className = "";
				document.getElementById("liCancelarVenda").className = "";
				document.getElementById("spanAdicionar").className = "input-group-btn ";
				document.getElementById("divVender").className = "col-lg-12 col-sm-12 col-md-12 col-xs-12";
				document.getElementById("liEscolherCliente").className = "dropdown disableicon";
				document.getElementById("aEscolherCliente").className = "dropdown-toggle disable";
				document.getElementById("aLimparVenda").className = "";
				document.getElementById("aCancelarVenda").className = "";
				document.getElementById("Adicionar").className = "btn btn-secondary ";
				document.getElementById("btnVender").className = "btn btn-success btnMenu";
				$scope.status.now = "Escolha mais itens ou finalize a venda!";
				break;
			case 4:
				$scope.status.now = "Item não adicionado!";
				break;
			case 5:
				$scope.status.now = "Item não encontrado!";
				break;
			default:
				break;
		}
	}



	var produtoList = function(){
		$http.get(endereco+"/listProdutos.php").success(function(response){
	    	$scope.listofProduto = response;
	    });	
    };

    var vendaList = function(){
		$http.get(endereco+"/listCompra.php?idcompra="+$scope.venda.numero).success(function(response){
	    	$scope.itensList = response;
	    	console.log(response);
	    });	
    };

    var clientList = function(){
		$http.get(endereco+"/listClientes.php").success(function(response){
	    	$scope.listofClient = response;
	    });	
    };


    $scope.initCompra = function(cpf, nome){
    	console.log("chamou");
    	$scope.nome = nome;
    	console.log("my name"+$scope.nome);
    	$http.get(endereco+"/criarCompra.php?cpf="+cpf).success(function(response){
    		console.log(response);	
    		$scope.venda.nome = nome;
    		$scope.venda.numero = response.idcompra;
    		vendaList();
    		disableComponentes(2);
    	});
    }
    $scope.itensList = "";
    var addItem = function(valor){
    	if($scope.venda.itens == 0){
    		disableComponentes(3);
    	}
    	$scope.venda.itens = $scope.venda.itens+1;
    	$scope.venda.total = $scope.venda.total+valor;
    	
    }

    var removeItem = function(valor){
    	$scope.venda.itens = $scope.venda.itens-1;
    	$scope.venda.total = $scope.venda.total-valor;
    	if($scope.venda.itens == 0){
    		disableComponentes(2);
    	}
    }


    $scope.addList = function(){

		$http.get(endereco+"/inserirProdutoCompra.php?idcompra="+$scope.venda.numero+"&idproduto="
			+value+"&quantidade="+$scope.inputitem.qnt).success(function(response){
				if(response.retorno == 0){
					addItem(response.valor);
					vendaList();
				}
				if(response.retorno == 1){
					disableComponentes(4);
				}
				if(response.retorno == 2){
					$scope.status.now = "Quantidade no estoque é insuficiente. Quantidade atual: "+response.quantidade;
				}if (response.retorno == 3){
					disableComponentes(5);
				}
				document.getElementById("provider-json").value = "";
				console.log(response);
    	});
	}

	$scope.removeList = function(id, valor){
		$http.get(endereco+"/removerItem.php?idvenda="+id).success(function(response){
				removeItem(valor);
				vendaList();
				console.log(response);
    	});
	}

	
	$scope.cancelarVenda = function(){
		$http.get(endereco+"/cancelarCompra.php?idcompra="+$scope.venda.numero).success(function(response){
			console.log(response);
			$scope.venda = {nome:"Não definido", numero:"Não definido", itens:0, total:0.00};
			vendaList();
			disableComponentes(1);
    	});
	}

	$scope.limparVenda = function(){
		$http.get(endereco+"/limparVendas.php?idcompra="+$scope.venda.numero).success(function(response){
			console.log(response);
			$scope.venda.itens = 0;
			$scope.venda.total = 0.00;
			vendaList();
			disableComponentes(2);
    	});
	}

	$scope.vender = function(){
		$http.get(endereco+"/finalizarVenda.php?idcompra="+$scope.venda.numero).success(function(response){
			$window.location.reload();
    	});
	}

    $scope.test =function(valor){
    	$scope.toggleText = valor;
    }

	clientList();
	produtoList();
}]);
    