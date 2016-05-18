<?php
	$this->assign('title','SISSTC | ProdutosComprados');
	$this->assign('nav','produtoscomprados');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/produtoscomprados.js").wait(function(){
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
	<i class="icon-th-list"></i> ProdutosComprados
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="produtosCompradoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idcompra">Idcompra<% if (page.orderBy == 'Idcompra') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idproduto">Id Produto<% if (page.orderBy == 'Idproduto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Quantidade">Quantidade<% if (page.orderBy == 'Quantidade') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Valor">Valor<% if (page.orderBy == 'Valor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idcompra')) %>">
				<td><%= _.escape(item.get('idcompra') || '') %></td>
				<td><%= _.escape(item.get('idproduto') || '') %></td>
				<td><%= _.escape(item.get('quantidade') || '') %></td>
				<td>R$ <%= _.escape(item.get('valor') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="produtosCompradoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idcompraInputContainer" class="control-group">
					<label class="control-label" for="idcompra">Id compra</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idcompra"><%= _.escape(item.get('idcompra') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idprodutoInputContainer" class="control-group">
					<label class="control-label" for="idproduto">ID Produto</label>
					<div class="controls inline-inputs">
						<select id="idproduto" name="idproduto"></select>
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
				<div id="valorInputContainer" class="control-group">
					<label class="control-label" for="valor">Valor</label>
					<div class="controls inline-inputs money">
						<input type="text" class="input-xlarge" id="valor" placeholder="Valor" value="<%= _.escape(item.get('valor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteProdutosCompradoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteProdutosCompradoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar ProdutosComprado</button>
						<span id="confirmDeleteProdutosCompradoContainer" class="hide">
							<button id="cancelDeleteProdutosCompradoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteProdutosCompradoButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="produtosCompradoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar ProdutosComprado
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="produtosCompradoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveProdutosCompradoButton" class="btn btn-primary">Savar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="produtosCompradoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newProdutosCompradoButton" class="btn btn-primary">Adicionar ProdutosComprado</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
