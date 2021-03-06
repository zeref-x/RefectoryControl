<?php
	$this->assign('title','REFECONTROL | Fichas');
	$this->assign('nav','fichas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/fichas.js").wait(function(){
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
	<i class="icon-th-list"></i> Fichas
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>
<p id="newButtonContainer" class="buttonContainer">
		<button id="newFichaButton" class="btn btn-primary">Add Ficha</button>
	</p>

	<!-- underscore template for the collection -->
	<script type="text/template" id="fichaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idficha">Idficha<% if (page.orderBy == 'Idficha') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DataDasFichas">Data Das Fichas<% if (page.orderBy == 'DataDasFichas') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_FichasMinimasDoDia">Fichas Minimas Do Dia<% if (page.orderBy == 'FichasMinimasDoDia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cardapio">Cardapio<% if (page.orderBy == 'Cardapio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idficha')) %>">
				<td><%= _.escape(item.get('idficha') || '') %></td>
				<td><%if (item.get('dataDasFichas')) { %><%= _date(app.parseDate(item.get('dataDasFichas'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('fichasMinimasDoDia') || '') %></td>
				<td><%= _.escape(item.get('cardapio') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="fichaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idfichaInputContainer" class="control-group">
					<label class="control-label" for="idficha">Idficha</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idficha"><%= _.escape(item.get('idficha') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataDasFichasInputContainer" class="control-group">
					<label class="control-label" for="dataDasFichas">Data Das Fichas</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataDasFichas" type="text" value="<%= _date(app.parseDate(item.get('dataDasFichas'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fichasMinimasDoDiaInputContainer" class="control-group">
					<label class="control-label" for="fichasMinimasDoDia">Fichas Minimas Do Dia</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fichasMinimasDoDia" placeholder="Fichas Minimas Do Dia" value="<%= _.escape(item.get('fichasMinimasDoDia') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cardapioInputContainer" class="control-group">
					<label class="control-label" for="cardapio">Cardapio</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cardapio" placeholder="Cardapio" value="<%= _.escape(item.get('cardapio') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteFichaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteFichaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Ficha</button>
						<span id="confirmDeleteFichaContainer" class="hide">
							<button id="cancelDeleteFichaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteFichaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="fichaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Ficha
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="fichaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveFichaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="fichaCollectionContainer" class="collectionContainer">
	</div>

	
</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
