<?php
	$this->assign('title','SISSTC | Compras');
	$this->assign('nav','compras');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/compras.js").wait(function(){
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
	<i class="icon-th-list"></i> Compras
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="compraCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idcompra">ID<% if (page.orderBy == 'Idcompra') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cpfcliente">CPF<% if (page.orderBy == 'Cpfcliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Valor">Valor<% if (page.orderBy == 'Valor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Data">Data<% if (page.orderBy == 'Data') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idcompra')) %>">
				<td><%= _.escape(item.get('idcompra') || '') %></td>
				<td><%= _.escape(item.get('cpfcliente') || '') %></td>
				<td>R$ <%= _.escape(item.get('valor') || '') %></td>
				<td><%if (item.get('data')) { %><%= _date(app.parseDate(item.get('data'))).format('DD/MM/YYYY') %><% } else { %>NULL<% } %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="compraModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idcompraInputContainer" class="control-group">
					<label class="control-label" for="idcompra">ID</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idcompra"><%= _.escape(item.get('idcompra') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cpfclienteInputContainer" class="control-group">
					<label class="control-label" for="cpfcliente">CPF cliente</label>
					<div class="controls inline-inputs">
						<select id="cpfcliente" name="cpfcliente"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorInputContainer" class="control-group">
					<label class="control-label" for="valor">Valor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valor" placeholder="Valor" value="<%= _.escape(item.get('valor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataInputContainer" class="control-group">
					<label class="control-label" for="data">Data</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="dd/mm/yyyy">
							<input id="data" type="text" value="<%= _date(app.parseDate(item.get('data'))).format('DD/MM/YYYY') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCompraButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCompraButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar Compra</button>
						<span id="confirmDeleteCompraContainer" class="hide">
							<button id="cancelDeleteCompraButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteCompraButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="compraDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Compra
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="compraModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="saveCompraButton" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="compraCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCompraButton" class="btn btn-primary">Adicionar Compra</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
