<?php
	$this->assign('title','SISSTC | Pagamentos');
	$this->assign('nav','pagamentos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/pagamentos.js").wait(function(){
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
	<i class="icon-th-list"></i> Pagamentos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Buscar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="pagamentoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">ID<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cpfcliente">CPF cliente<% if (page.orderBy == 'Cpfcliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Valor">Valor<% if (page.orderBy == 'Valor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Data">Data<% if (page.orderBy == 'Data') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Tipo">Tipo<% if (page.orderBy == 'Tipo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('cpfcliente') || '') %></td>
				<td>R$ <%= _.escape(item.get('valor') || '') %></td>
				<td><%if (item.get('data')) { %><%= _date(app.parseDate(item.get('data'))).format('DD/MM/YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('tipo') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="pagamentoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
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
				<div id="tipoInputContainer" class="control-group">
					<label class="control-label" for="tipo">Tipo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tipo" placeholder="Tipo" value="<%= _.escape(item.get('tipo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePagamentoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePagamentoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Pagamento</button>
						<span id="confirmDeletePagamentoContainer" class="hide">
							<button id="cancelDeletePagamentoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeletePagamentoButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="pagamentoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Pagamento
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="pagamentoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="savePagamentoButton" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="pagamentoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPagamentoButton" class="btn btn-primary">Adicionar Pagamento</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
