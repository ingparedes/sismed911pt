<?php
namespace PHPMaker2020\sismed911;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$preh_servicio_ambulancia_list = new preh_servicio_ambulancia_list();

// Run the page
$preh_servicio_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_servicio_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_servicio_ambulancia_list->isExport()) { ?>
<script>
var fpreh_servicio_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_servicio_ambulancialist = currentForm = new ew.Form("fpreh_servicio_ambulancialist", "list");
	fpreh_servicio_ambulancialist.formKeyCountName = '<?php echo $preh_servicio_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("fpreh_servicio_ambulancialist");
});
var fpreh_servicio_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_servicio_ambulancialistsrch = currentSearchForm = new ew.Form("fpreh_servicio_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	fpreh_servicio_ambulancialistsrch.filterList = <?php echo $preh_servicio_ambulancia_list->getFilterList() ?>;
	loadjs.done("fpreh_servicio_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_servicio_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_servicio_ambulancia_list->TotalRecords > 0 && $preh_servicio_ambulancia_list->ExportOptions->visible()) { ?>
<?php $preh_servicio_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->ImportOptions->visible()) { ?>
<?php $preh_servicio_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->SearchOptions->visible()) { ?>
<?php $preh_servicio_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->FilterOptions->visible()) { ?>
<?php $preh_servicio_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_servicio_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_servicio_ambulancia_list->isExport() && !$preh_servicio_ambulancia->CurrentAction) { ?>
<form name="fpreh_servicio_ambulancialistsrch" id="fpreh_servicio_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_servicio_ambulancialistsrch-search-panel" class="<?php echo $preh_servicio_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_servicio_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $preh_servicio_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_servicio_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_servicio_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_servicio_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_servicio_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_servicio_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_servicio_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_servicio_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_servicio_ambulancia_list->showPageHeader(); ?>
<?php
$preh_servicio_ambulancia_list->showMessage();
?>
<?php if ($preh_servicio_ambulancia_list->TotalRecords > 0 || $preh_servicio_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_servicio_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_servicio_ambulancia">
<?php if (!$preh_servicio_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_servicio_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_servicio_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_servicio_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_servicio_ambulancialist" id="fpreh_servicio_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_servicio_ambulancia">
<div id="gmp_preh_servicio_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_servicio_ambulancia_list->TotalRecords > 0 || $preh_servicio_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_preh_servicio_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_servicio_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$preh_servicio_ambulancia_list->renderListOptions();

// Render list options (header, left)
$preh_servicio_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($preh_servicio_ambulancia_list->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->id_servcioambulacia) == "") { ?>
		<th data-name="id_servcioambulacia" class="<?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_id_servcioambulacia" class="preh_servicio_ambulancia_id_servcioambulacia"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_servcioambulacia" class="<?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->id_servcioambulacia) ?>', 1);"><div id="elh_preh_servicio_ambulancia_id_servcioambulacia" class="preh_servicio_ambulancia_id_servcioambulacia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->id_servcioambulacia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->id_servcioambulacia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_servicio_ambulancia_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_cod_casopreh" class="preh_servicio_ambulancia_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_servicio_ambulancia_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->cod_casopreh) ?>', 1);"><div id="elh_preh_servicio_ambulancia_cod_casopreh" class="preh_servicio_ambulancia_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->cod_ambulancia) == "") { ?>
		<th data-name="cod_ambulancia" class="<?php echo $preh_servicio_ambulancia_list->cod_ambulancia->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_cod_ambulancia" class="preh_servicio_ambulancia_cod_ambulancia"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->cod_ambulancia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancia" class="<?php echo $preh_servicio_ambulancia_list->cod_ambulancia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->cod_ambulancia) ?>', 1);"><div id="elh_preh_servicio_ambulancia_cod_ambulancia" class="preh_servicio_ambulancia_cod_ambulancia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->cod_ambulancia->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->cod_ambulancia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->cod_ambulancia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->hora_confirma->Visible) { // hora_confirma ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_confirma) == "") { ?>
		<th data-name="hora_confirma" class="<?php echo $preh_servicio_ambulancia_list->hora_confirma->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_hora_confirma" class="preh_servicio_ambulancia_hora_confirma"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_confirma->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_confirma" class="<?php echo $preh_servicio_ambulancia_list->hora_confirma->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_confirma) ?>', 1);"><div id="elh_preh_servicio_ambulancia_hora_confirma" class="preh_servicio_ambulancia_hora_confirma">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_confirma->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->hora_confirma->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->hora_confirma->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->hora_asigna->Visible) { // hora_asigna ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_asigna) == "") { ?>
		<th data-name="hora_asigna" class="<?php echo $preh_servicio_ambulancia_list->hora_asigna->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_hora_asigna" class="preh_servicio_ambulancia_hora_asigna"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_asigna->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_asigna" class="<?php echo $preh_servicio_ambulancia_list->hora_asigna->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_asigna) ?>', 1);"><div id="elh_preh_servicio_ambulancia_hora_asigna" class="preh_servicio_ambulancia_hora_asigna">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_asigna->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->hora_asigna->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->hora_asigna->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->hora_llegada->Visible) { // hora_llegada ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_llegada) == "") { ?>
		<th data-name="hora_llegada" class="<?php echo $preh_servicio_ambulancia_list->hora_llegada->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_hora_llegada" class="preh_servicio_ambulancia_hora_llegada"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_llegada->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_llegada" class="<?php echo $preh_servicio_ambulancia_list->hora_llegada->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_llegada) ?>', 1);"><div id="elh_preh_servicio_ambulancia_hora_llegada" class="preh_servicio_ambulancia_hora_llegada">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_llegada->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->hora_llegada->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->hora_llegada->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->hora_inicio->Visible) { // hora_inicio ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_inicio) == "") { ?>
		<th data-name="hora_inicio" class="<?php echo $preh_servicio_ambulancia_list->hora_inicio->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_hora_inicio" class="preh_servicio_ambulancia_hora_inicio"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_inicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_inicio" class="<?php echo $preh_servicio_ambulancia_list->hora_inicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_inicio) ?>', 1);"><div id="elh_preh_servicio_ambulancia_hora_inicio" class="preh_servicio_ambulancia_hora_inicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_inicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->hora_inicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->hora_inicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->hora_destino->Visible) { // hora_destino ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_destino) == "") { ?>
		<th data-name="hora_destino" class="<?php echo $preh_servicio_ambulancia_list->hora_destino->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_hora_destino" class="preh_servicio_ambulancia_hora_destino"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_destino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_destino" class="<?php echo $preh_servicio_ambulancia_list->hora_destino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_destino) ?>', 1);"><div id="elh_preh_servicio_ambulancia_hora_destino" class="preh_servicio_ambulancia_hora_destino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_destino->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->hora_destino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->hora_destino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->hora_preposicion->Visible) { // hora_preposicion ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_preposicion) == "") { ?>
		<th data-name="hora_preposicion" class="<?php echo $preh_servicio_ambulancia_list->hora_preposicion->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_hora_preposicion" class="preh_servicio_ambulancia_hora_preposicion"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_preposicion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_preposicion" class="<?php echo $preh_servicio_ambulancia_list->hora_preposicion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->hora_preposicion) ?>', 1);"><div id="elh_preh_servicio_ambulancia_hora_preposicion" class="preh_servicio_ambulancia_hora_preposicion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->hora_preposicion->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->hora_preposicion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->hora_preposicion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->tipo_traslado->Visible) { // tipo_traslado ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->tipo_traslado) == "") { ?>
		<th data-name="tipo_traslado" class="<?php echo $preh_servicio_ambulancia_list->tipo_traslado->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_tipo_traslado" class="preh_servicio_ambulancia_tipo_traslado"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->tipo_traslado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_traslado" class="<?php echo $preh_servicio_ambulancia_list->tipo_traslado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->tipo_traslado) ?>', 1);"><div id="elh_preh_servicio_ambulancia_tipo_traslado" class="preh_servicio_ambulancia_tipo_traslado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->tipo_traslado->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->tipo_traslado->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->tipo_traslado->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->traslado_fallido->Visible) { // traslado_fallido ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->traslado_fallido) == "") { ?>
		<th data-name="traslado_fallido" class="<?php echo $preh_servicio_ambulancia_list->traslado_fallido->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_traslado_fallido" class="preh_servicio_ambulancia_traslado_fallido"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->traslado_fallido->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="traslado_fallido" class="<?php echo $preh_servicio_ambulancia_list->traslado_fallido->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->traslado_fallido) ?>', 1);"><div id="elh_preh_servicio_ambulancia_traslado_fallido" class="preh_servicio_ambulancia_traslado_fallido">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->traslado_fallido->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->traslado_fallido->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->traslado_fallido->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->estado_paciente->Visible) { // estado_paciente ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->estado_paciente) == "") { ?>
		<th data-name="estado_paciente" class="<?php echo $preh_servicio_ambulancia_list->estado_paciente->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_estado_paciente" class="preh_servicio_ambulancia_estado_paciente"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->estado_paciente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_paciente" class="<?php echo $preh_servicio_ambulancia_list->estado_paciente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->estado_paciente) ?>', 1);"><div id="elh_preh_servicio_ambulancia_estado_paciente" class="preh_servicio_ambulancia_estado_paciente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->estado_paciente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->estado_paciente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->estado_paciente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->k_final->Visible) { // k_final ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->k_final) == "") { ?>
		<th data-name="k_final" class="<?php echo $preh_servicio_ambulancia_list->k_final->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_k_final" class="preh_servicio_ambulancia_k_final"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->k_final->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="k_final" class="<?php echo $preh_servicio_ambulancia_list->k_final->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->k_final) ?>', 1);"><div id="elh_preh_servicio_ambulancia_k_final" class="preh_servicio_ambulancia_k_final">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->k_final->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->k_final->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->k_final->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->k_inical->Visible) { // k_inical ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->k_inical) == "") { ?>
		<th data-name="k_inical" class="<?php echo $preh_servicio_ambulancia_list->k_inical->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_k_inical" class="preh_servicio_ambulancia_k_inical"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->k_inical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="k_inical" class="<?php echo $preh_servicio_ambulancia_list->k_inical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->k_inical) ?>', 1);"><div id="elh_preh_servicio_ambulancia_k_inical" class="preh_servicio_ambulancia_k_inical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->k_inical->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->k_inical->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->k_inical->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->tipo_serviciosistema) == "") { ?>
		<th data-name="tipo_serviciosistema" class="<?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_tipo_serviciosistema" class="preh_servicio_ambulancia_tipo_serviciosistema"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_serviciosistema" class="<?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->tipo_serviciosistema) ?>', 1);"><div id="elh_preh_servicio_ambulancia_tipo_serviciosistema" class="preh_servicio_ambulancia_tipo_serviciosistema">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->tipo_serviciosistema->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->tipo_serviciosistema->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->preposicion->Visible) { // preposicion ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->preposicion) == "") { ?>
		<th data-name="preposicion" class="<?php echo $preh_servicio_ambulancia_list->preposicion->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_preposicion" class="preh_servicio_ambulancia_preposicion"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->preposicion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="preposicion" class="<?php echo $preh_servicio_ambulancia_list->preposicion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->preposicion) ?>', 1);"><div id="elh_preh_servicio_ambulancia_preposicion" class="preh_servicio_ambulancia_preposicion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->preposicion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->preposicion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->preposicion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->conductor->Visible) { // conductor ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->conductor) == "") { ?>
		<th data-name="conductor" class="<?php echo $preh_servicio_ambulancia_list->conductor->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_conductor" class="preh_servicio_ambulancia_conductor"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->conductor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="conductor" class="<?php echo $preh_servicio_ambulancia_list->conductor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->conductor) ?>', 1);"><div id="elh_preh_servicio_ambulancia_conductor" class="preh_servicio_ambulancia_conductor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->conductor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->conductor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->conductor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->medico->Visible) { // medico ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->medico) == "") { ?>
		<th data-name="medico" class="<?php echo $preh_servicio_ambulancia_list->medico->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_medico" class="preh_servicio_ambulancia_medico"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->medico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="medico" class="<?php echo $preh_servicio_ambulancia_list->medico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->medico) ?>', 1);"><div id="elh_preh_servicio_ambulancia_medico" class="preh_servicio_ambulancia_medico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->medico->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->medico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->medico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->paramedico->Visible) { // paramedico ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->paramedico) == "") { ?>
		<th data-name="paramedico" class="<?php echo $preh_servicio_ambulancia_list->paramedico->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_paramedico" class="preh_servicio_ambulancia_paramedico"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->paramedico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paramedico" class="<?php echo $preh_servicio_ambulancia_list->paramedico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->paramedico) ?>', 1);"><div id="elh_preh_servicio_ambulancia_paramedico" class="preh_servicio_ambulancia_paramedico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->paramedico->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->paramedico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->paramedico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->dx_aph->Visible) { // dx_aph ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->dx_aph) == "") { ?>
		<th data-name="dx_aph" class="<?php echo $preh_servicio_ambulancia_list->dx_aph->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_dx_aph" class="preh_servicio_ambulancia_dx_aph"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->dx_aph->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dx_aph" class="<?php echo $preh_servicio_ambulancia_list->dx_aph->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->dx_aph) ?>', 1);"><div id="elh_preh_servicio_ambulancia_dx_aph" class="preh_servicio_ambulancia_dx_aph">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->dx_aph->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->dx_aph->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->dx_aph->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->dx_soat->Visible) { // dx_soat ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->dx_soat) == "") { ?>
		<th data-name="dx_soat" class="<?php echo $preh_servicio_ambulancia_list->dx_soat->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_dx_soat" class="preh_servicio_ambulancia_dx_soat"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->dx_soat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dx_soat" class="<?php echo $preh_servicio_ambulancia_list->dx_soat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->dx_soat) ?>', 1);"><div id="elh_preh_servicio_ambulancia_dx_soat" class="preh_servicio_ambulancia_dx_soat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->dx_soat->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->dx_soat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->dx_soat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->estado_pacientefinal->Visible) { // estado_pacientefinal ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->estado_pacientefinal) == "") { ?>
		<th data-name="estado_pacientefinal" class="<?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_estado_pacientefinal" class="preh_servicio_ambulancia_estado_pacientefinal"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_pacientefinal" class="<?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->estado_pacientefinal) ?>', 1);"><div id="elh_preh_servicio_ambulancia_estado_pacientefinal" class="preh_servicio_ambulancia_estado_pacientefinal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->estado_pacientefinal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->estado_pacientefinal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->cuando_murio->Visible) { // cuando_murio ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->cuando_murio) == "") { ?>
		<th data-name="cuando_murio" class="<?php echo $preh_servicio_ambulancia_list->cuando_murio->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_cuando_murio" class="preh_servicio_ambulancia_cuando_murio"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->cuando_murio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cuando_murio" class="<?php echo $preh_servicio_ambulancia_list->cuando_murio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->cuando_murio) ?>', 1);"><div id="elh_preh_servicio_ambulancia_cuando_murio" class="preh_servicio_ambulancia_cuando_murio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->cuando_murio->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->cuando_murio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->cuando_murio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->accidente_vehiculo->Visible) { // accidente_vehiculo ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->accidente_vehiculo) == "") { ?>
		<th data-name="accidente_vehiculo" class="<?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_accidente_vehiculo" class="preh_servicio_ambulancia_accidente_vehiculo"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="accidente_vehiculo" class="<?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->accidente_vehiculo) ?>', 1);"><div id="elh_preh_servicio_ambulancia_accidente_vehiculo" class="preh_servicio_ambulancia_accidente_vehiculo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->accidente_vehiculo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->accidente_vehiculo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->atropellado->Visible) { // atropellado ?>
	<?php if ($preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->atropellado) == "") { ?>
		<th data-name="atropellado" class="<?php echo $preh_servicio_ambulancia_list->atropellado->headerCellClass() ?>"><div id="elh_preh_servicio_ambulancia_atropellado" class="preh_servicio_ambulancia_atropellado"><div class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->atropellado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="atropellado" class="<?php echo $preh_servicio_ambulancia_list->atropellado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_servicio_ambulancia_list->SortUrl($preh_servicio_ambulancia_list->atropellado) ?>', 1);"><div id="elh_preh_servicio_ambulancia_atropellado" class="preh_servicio_ambulancia_atropellado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_servicio_ambulancia_list->atropellado->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_servicio_ambulancia_list->atropellado->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_servicio_ambulancia_list->atropellado->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_servicio_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_servicio_ambulancia_list->ExportAll && $preh_servicio_ambulancia_list->isExport()) {
	$preh_servicio_ambulancia_list->StopRecord = $preh_servicio_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_servicio_ambulancia_list->TotalRecords > $preh_servicio_ambulancia_list->StartRecord + $preh_servicio_ambulancia_list->DisplayRecords - 1)
		$preh_servicio_ambulancia_list->StopRecord = $preh_servicio_ambulancia_list->StartRecord + $preh_servicio_ambulancia_list->DisplayRecords - 1;
	else
		$preh_servicio_ambulancia_list->StopRecord = $preh_servicio_ambulancia_list->TotalRecords;
}
$preh_servicio_ambulancia_list->RecordCount = $preh_servicio_ambulancia_list->StartRecord - 1;
if ($preh_servicio_ambulancia_list->Recordset && !$preh_servicio_ambulancia_list->Recordset->EOF) {
	$preh_servicio_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $preh_servicio_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $preh_servicio_ambulancia_list->StartRecord > 1)
		$preh_servicio_ambulancia_list->Recordset->move($preh_servicio_ambulancia_list->StartRecord - 1);
} elseif (!$preh_servicio_ambulancia->AllowAddDeleteRow && $preh_servicio_ambulancia_list->StopRecord == 0) {
	$preh_servicio_ambulancia_list->StopRecord = $preh_servicio_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$preh_servicio_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$preh_servicio_ambulancia->resetAttributes();
$preh_servicio_ambulancia_list->renderRow();
while ($preh_servicio_ambulancia_list->RecordCount < $preh_servicio_ambulancia_list->StopRecord) {
	$preh_servicio_ambulancia_list->RecordCount++;
	if ($preh_servicio_ambulancia_list->RecordCount >= $preh_servicio_ambulancia_list->StartRecord) {
		$preh_servicio_ambulancia_list->RowCount++;

		// Set up key count
		$preh_servicio_ambulancia_list->KeyCount = $preh_servicio_ambulancia_list->RowIndex;

		// Init row class and style
		$preh_servicio_ambulancia->resetAttributes();
		$preh_servicio_ambulancia->CssClass = "";
		if ($preh_servicio_ambulancia_list->isGridAdd()) {
		} else {
			$preh_servicio_ambulancia_list->loadRowValues($preh_servicio_ambulancia_list->Recordset); // Load row values
		}
		$preh_servicio_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_servicio_ambulancia->RowAttrs->merge(["data-rowindex" => $preh_servicio_ambulancia_list->RowCount, "id" => "r" . $preh_servicio_ambulancia_list->RowCount . "_preh_servicio_ambulancia", "data-rowtype" => $preh_servicio_ambulancia->RowType]);

		// Render row
		$preh_servicio_ambulancia_list->renderRow();

		// Render list options
		$preh_servicio_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $preh_servicio_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_servicio_ambulancia_list->ListOptions->render("body", "left", $preh_servicio_ambulancia_list->RowCount);
?>
	<?php if ($preh_servicio_ambulancia_list->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
		<td data-name="id_servcioambulacia" <?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_id_servcioambulacia">
<span<?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->id_servcioambulacia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_servicio_ambulancia_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_cod_casopreh">
<span<?php echo $preh_servicio_ambulancia_list->cod_casopreh->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<td data-name="cod_ambulancia" <?php echo $preh_servicio_ambulancia_list->cod_ambulancia->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_cod_ambulancia">
<span<?php echo $preh_servicio_ambulancia_list->cod_ambulancia->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->hora_confirma->Visible) { // hora_confirma ?>
		<td data-name="hora_confirma" <?php echo $preh_servicio_ambulancia_list->hora_confirma->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_hora_confirma">
<span<?php echo $preh_servicio_ambulancia_list->hora_confirma->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->hora_confirma->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->hora_asigna->Visible) { // hora_asigna ?>
		<td data-name="hora_asigna" <?php echo $preh_servicio_ambulancia_list->hora_asigna->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_hora_asigna">
<span<?php echo $preh_servicio_ambulancia_list->hora_asigna->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->hora_asigna->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->hora_llegada->Visible) { // hora_llegada ?>
		<td data-name="hora_llegada" <?php echo $preh_servicio_ambulancia_list->hora_llegada->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_hora_llegada">
<span<?php echo $preh_servicio_ambulancia_list->hora_llegada->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->hora_llegada->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->hora_inicio->Visible) { // hora_inicio ?>
		<td data-name="hora_inicio" <?php echo $preh_servicio_ambulancia_list->hora_inicio->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_hora_inicio">
<span<?php echo $preh_servicio_ambulancia_list->hora_inicio->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->hora_inicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->hora_destino->Visible) { // hora_destino ?>
		<td data-name="hora_destino" <?php echo $preh_servicio_ambulancia_list->hora_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_hora_destino">
<span<?php echo $preh_servicio_ambulancia_list->hora_destino->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->hora_destino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->hora_preposicion->Visible) { // hora_preposicion ?>
		<td data-name="hora_preposicion" <?php echo $preh_servicio_ambulancia_list->hora_preposicion->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_hora_preposicion">
<span<?php echo $preh_servicio_ambulancia_list->hora_preposicion->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->hora_preposicion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->tipo_traslado->Visible) { // tipo_traslado ?>
		<td data-name="tipo_traslado" <?php echo $preh_servicio_ambulancia_list->tipo_traslado->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_tipo_traslado">
<span<?php echo $preh_servicio_ambulancia_list->tipo_traslado->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->tipo_traslado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->traslado_fallido->Visible) { // traslado_fallido ?>
		<td data-name="traslado_fallido" <?php echo $preh_servicio_ambulancia_list->traslado_fallido->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_traslado_fallido">
<span<?php echo $preh_servicio_ambulancia_list->traslado_fallido->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->traslado_fallido->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->estado_paciente->Visible) { // estado_paciente ?>
		<td data-name="estado_paciente" <?php echo $preh_servicio_ambulancia_list->estado_paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_estado_paciente">
<span<?php echo $preh_servicio_ambulancia_list->estado_paciente->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->estado_paciente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->k_final->Visible) { // k_final ?>
		<td data-name="k_final" <?php echo $preh_servicio_ambulancia_list->k_final->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_k_final">
<span<?php echo $preh_servicio_ambulancia_list->k_final->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->k_final->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->k_inical->Visible) { // k_inical ?>
		<td data-name="k_inical" <?php echo $preh_servicio_ambulancia_list->k_inical->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_k_inical">
<span<?php echo $preh_servicio_ambulancia_list->k_inical->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->k_inical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
		<td data-name="tipo_serviciosistema" <?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_tipo_serviciosistema">
<span<?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->tipo_serviciosistema->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->preposicion->Visible) { // preposicion ?>
		<td data-name="preposicion" <?php echo $preh_servicio_ambulancia_list->preposicion->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_preposicion">
<span<?php echo $preh_servicio_ambulancia_list->preposicion->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->preposicion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->conductor->Visible) { // conductor ?>
		<td data-name="conductor" <?php echo $preh_servicio_ambulancia_list->conductor->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_conductor">
<span<?php echo $preh_servicio_ambulancia_list->conductor->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->conductor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->medico->Visible) { // medico ?>
		<td data-name="medico" <?php echo $preh_servicio_ambulancia_list->medico->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_medico">
<span<?php echo $preh_servicio_ambulancia_list->medico->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->medico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->paramedico->Visible) { // paramedico ?>
		<td data-name="paramedico" <?php echo $preh_servicio_ambulancia_list->paramedico->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_paramedico">
<span<?php echo $preh_servicio_ambulancia_list->paramedico->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->paramedico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->dx_aph->Visible) { // dx_aph ?>
		<td data-name="dx_aph" <?php echo $preh_servicio_ambulancia_list->dx_aph->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_dx_aph">
<span<?php echo $preh_servicio_ambulancia_list->dx_aph->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->dx_aph->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->dx_soat->Visible) { // dx_soat ?>
		<td data-name="dx_soat" <?php echo $preh_servicio_ambulancia_list->dx_soat->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_dx_soat">
<span<?php echo $preh_servicio_ambulancia_list->dx_soat->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->dx_soat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->estado_pacientefinal->Visible) { // estado_pacientefinal ?>
		<td data-name="estado_pacientefinal" <?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_estado_pacientefinal">
<span<?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->estado_pacientefinal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->cuando_murio->Visible) { // cuando_murio ?>
		<td data-name="cuando_murio" <?php echo $preh_servicio_ambulancia_list->cuando_murio->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_cuando_murio">
<span<?php echo $preh_servicio_ambulancia_list->cuando_murio->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->cuando_murio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->accidente_vehiculo->Visible) { // accidente_vehiculo ?>
		<td data-name="accidente_vehiculo" <?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_accidente_vehiculo">
<span<?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->accidente_vehiculo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_servicio_ambulancia_list->atropellado->Visible) { // atropellado ?>
		<td data-name="atropellado" <?php echo $preh_servicio_ambulancia_list->atropellado->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_list->RowCount ?>_preh_servicio_ambulancia_atropellado">
<span<?php echo $preh_servicio_ambulancia_list->atropellado->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_list->atropellado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_servicio_ambulancia_list->ListOptions->render("body", "right", $preh_servicio_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_servicio_ambulancia_list->isGridAdd())
		$preh_servicio_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_servicio_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_servicio_ambulancia_list->Recordset)
	$preh_servicio_ambulancia_list->Recordset->Close();
?>
<?php if (!$preh_servicio_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_servicio_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_servicio_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_servicio_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_servicio_ambulancia_list->TotalRecords == 0 && !$preh_servicio_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_servicio_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_servicio_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_servicio_ambulancia_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$preh_servicio_ambulancia_list->terminate();
?>