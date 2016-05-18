<?php
	$this->assign('title','SISSTC | Produtos');
	$this->assign('nav','produtos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/produtos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Produtos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="produtoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idproduto">ID<% if (page.orderBy == 'Idproduto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Codigodebarras">Código de barras<% if (page.orderBy == 'Codigodebarras') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Quantidade">Quantidade<% if (page.orderBy == 'Quantidade') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Preco">Preço<% if (page.orderBy == 'Preco') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
<th id="header_Custo">Custo<% if (page.orderBy == 'Custo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Quantidade">Quantidade<% if (page.orderBy == 'Quantidade') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Unidade">Unidade<% if (page.orderBy == 'Unidade') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>

				
			<tr id="<%= _.escape(item.get('idproduto')) %>">
				<td> <%= _.escape(item.get('idproduto') || '') %></td>
				<td><%= _.escape(item.get('codigodebarras') || '') %></td>
				<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('quantidade') || '') %></td>
				<td>R$ <%= _.escape(item.get('preco') || '') %></td>
				
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
<td>R$<%= _.escape(item.get('custo') || '') %></td>
				<td><%= _.escape(item.get('quantidade') || '') %></td>
				<td><%= _.escape(item.get('unidade') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="produtoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idprodutoInputContainer" class="control-group">
					<label class="control-label" for="idproduto">ID produto</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idproduto"><%= _.escape(item.get('idproduto') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codigodebarrasInputContainer" class="control-group">
					<label class="control-label" for="codigodebarras">Código de barras</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codigodebarras" placeholder="Codigodebarras" value="<%= _.escape(item.get('codigodebarras') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<%= _.escape(item.get('nome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="precoInputContainer" class="control-group">
					<label class="control-label" for="preco">Preço</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="preco" placeholder="Preco" value="<%= _.escape(item.get('preco') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="custoInputContainer" class="control-group">
					<label class="control-label" for="custo">Custo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="custo" placeholder="Custo" value="<%= _.escape(item.get('custo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="quantidadeInputContainer" class="control-group">
					<label class="control-label" for="quantidade">Quantidade</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="quantidade" placeholder="Quantidade" value="<%= _.escape(item.get('quantidade') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="unidadeInputContainer" class="control-group">
					<label class="control-label" for="unidade">Unidade</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="unidade" placeholder="Unidade" value="<%= _.escape(item.get('unidade') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteProdutoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteProdutoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar Produto</button>
						<span id="confirmDeleteProdutoContainer" class="hide">
							<button id="cancelDeleteProdutoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteProdutoButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="produtoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Produto
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="produtoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="saveProdutoButton" class="btn btn-primary">Savar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="produtoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newProdutoButton" class="btn btn-primary">Adicionar Produto</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
