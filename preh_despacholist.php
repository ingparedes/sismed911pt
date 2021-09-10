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
$preh_despacho_list = new preh_despacho_list();

// Run the page
$preh_despacho_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_despacho_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_despacho_list->isExport()) { ?>
<script>
var fpreh_despacholist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_despacholist = currentForm = new ew.Form("fpreh_despacholist", "list");
	fpreh_despacholist.formKeyCountName = '<?php echo $preh_despacho_list->FormKeyCountName ?>';
	loadjs.done("fpreh_despacholist");
});
var fpreh_despacholistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_despacholistsrch = currentSearchForm = new ew.Form("fpreh_despacholistsrch");

	// Dynamic selection lists
	// Filters

	fpreh_despacholistsrch.filterList = <?php echo $preh_despacho_list->getFilterList() ?>;
	loadjs.done("fpreh_despacholistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_despacho_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_despacho_list->TotalRecords > 0 && $preh_despacho_list->ExportOptions->visible()) { ?>
<?php $preh_despacho_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_despacho_list->ImportOptions->visible()) { ?>
<?php $preh_despacho_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_despacho_list->SearchOptions->visible()) { ?>
<?php $preh_despacho_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_despacho_list->FilterOptions->visible()) { ?>
<?php $preh_despacho_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_despacho_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_despacho_list->isExport() && !$preh_despacho->CurrentAction) { ?>
<form name="fpreh_despacholistsrch" id="fpreh_despacholistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_despacholistsrch-search-panel" class="<?php echo $preh_despacho_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_despacho">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $preh_despacho_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_despacho_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_despacho_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_despacho_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_despacho_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_despacho_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_despacho_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_despacho_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_despacho_list->showPageHeader(); ?>
<?php
$preh_despacho_list->showMessage();
?>
<?php if ($preh_despacho_list->TotalRecords > 0 || $preh_despacho->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_despacho_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_despacho">
<?php if (!$preh_despacho_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_despacho_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_despacho_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_despacho_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_despacholist" id="fpreh_despacholist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_despacho">
<div id="gmp_preh_despacho" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_despacho_list->TotalRecords > 0 || $preh_despacho_list->isGridEdit()) { ?>
<table id="tbl_preh_despacholist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_despacho->RowType = ROWTYPE_HEADER;

// Render list options
$preh_despacho_list->renderListOptions();

// Render list options (header, left)
$preh_despacho_list->ListOptions->render("header", "left");
?>
<?php if ($preh_despacho_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_despacho_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_despacho_cod_casopreh" class="preh_despacho_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_despacho_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->cod_casopreh) ?>', 1);"><div id="elh_preh_despacho_cod_casopreh" class="preh_despacho_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->fecha->Visible) { // fecha ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->fecha) == "") { ?>
		<th data-name="fecha" class="<?php echo $preh_despacho_list->fecha->headerCellClass() ?>"><div id="elh_preh_despacho_fecha" class="preh_despacho_fecha"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->fecha->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha" class="<?php echo $preh_despacho_list->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->fecha) ?>', 1);"><div id="elh_preh_despacho_fecha" class="preh_despacho_fecha">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->nombre_es->Visible) { // nombre_es ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->nombre_es) == "") { ?>
		<th data-name="nombre_es" class="<?php echo $preh_despacho_list->nombre_es->headerCellClass() ?>"><div id="elh_preh_despacho_nombre_es" class="preh_despacho_nombre_es"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->nombre_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_es" class="<?php echo $preh_despacho_list->nombre_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->nombre_es) ?>', 1);"><div id="elh_preh_despacho_nombre_es" class="preh_despacho_nombre_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->nombre_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->nombre_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->nombre_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->tiempo->Visible) { // tiempo ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->tiempo) == "") { ?>
		<th data-name="tiempo" class="<?php echo $preh_despacho_list->tiempo->headerCellClass() ?>"><div id="elh_preh_despacho_tiempo" class="preh_despacho_tiempo"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tiempo" class="<?php echo $preh_despacho_list->tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->tiempo) ?>', 1);"><div id="elh_preh_despacho_tiempo" class="preh_despacho_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->tiempo->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->cod_ambulancia) == "") { ?>
		<th data-name="cod_ambulancia" class="<?php echo $preh_despacho_list->cod_ambulancia->headerCellClass() ?>"><div id="elh_preh_despacho_cod_ambulancia" class="preh_despacho_cod_ambulancia"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->cod_ambulancia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancia" class="<?php echo $preh_despacho_list->cod_ambulancia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->cod_ambulancia) ?>', 1);"><div id="elh_preh_despacho_cod_ambulancia" class="preh_despacho_cod_ambulancia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->cod_ambulancia->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->cod_ambulancia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->cod_ambulancia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->hora_asigna->Visible) { // hora_asigna ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->hora_asigna) == "") { ?>
		<th data-name="hora_asigna" class="<?php echo $preh_despacho_list->hora_asigna->headerCellClass() ?>"><div id="elh_preh_despacho_hora_asigna" class="preh_despacho_hora_asigna"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_asigna->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_asigna" class="<?php echo $preh_despacho_list->hora_asigna->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->hora_asigna) ?>', 1);"><div id="elh_preh_despacho_hora_asigna" class="preh_despacho_hora_asigna">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_asigna->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->hora_asigna->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->hora_asigna->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->hora_llegada->Visible) { // hora_llegada ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->hora_llegada) == "") { ?>
		<th data-name="hora_llegada" class="<?php echo $preh_despacho_list->hora_llegada->headerCellClass() ?>"><div id="elh_preh_despacho_hora_llegada" class="preh_despacho_hora_llegada"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_llegada->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_llegada" class="<?php echo $preh_despacho_list->hora_llegada->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->hora_llegada) ?>', 1);"><div id="elh_preh_despacho_hora_llegada" class="preh_despacho_hora_llegada">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_llegada->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->hora_llegada->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->hora_llegada->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->hora_inicio->Visible) { // hora_inicio ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->hora_inicio) == "") { ?>
		<th data-name="hora_inicio" class="<?php echo $preh_despacho_list->hora_inicio->headerCellClass() ?>"><div id="elh_preh_despacho_hora_inicio" class="preh_despacho_hora_inicio"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_inicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_inicio" class="<?php echo $preh_despacho_list->hora_inicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->hora_inicio) ?>', 1);"><div id="elh_preh_despacho_hora_inicio" class="preh_despacho_hora_inicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_inicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->hora_inicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->hora_inicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->hora_destino->Visible) { // hora_destino ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->hora_destino) == "") { ?>
		<th data-name="hora_destino" class="<?php echo $preh_despacho_list->hora_destino->headerCellClass() ?>"><div id="elh_preh_despacho_hora_destino" class="preh_despacho_hora_destino"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_destino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_destino" class="<?php echo $preh_despacho_list->hora_destino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->hora_destino) ?>', 1);"><div id="elh_preh_despacho_hora_destino" class="preh_despacho_hora_destino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_destino->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->hora_destino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->hora_destino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->hora_preposicion->Visible) { // hora_preposicion ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->hora_preposicion) == "") { ?>
		<th data-name="hora_preposicion" class="<?php echo $preh_despacho_list->hora_preposicion->headerCellClass() ?>"><div id="elh_preh_despacho_hora_preposicion" class="preh_despacho_hora_preposicion"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_preposicion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_preposicion" class="<?php echo $preh_despacho_list->hora_preposicion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->hora_preposicion) ?>', 1);"><div id="elh_preh_despacho_hora_preposicion" class="preh_despacho_hora_preposicion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->hora_preposicion->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->hora_preposicion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->hora_preposicion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_despacho_list->base->Visible) { // base ?>
	<?php if ($preh_despacho_list->SortUrl($preh_despacho_list->base) == "") { ?>
		<th data-name="base" class="<?php echo $preh_despacho_list->base->headerCellClass() ?>"><div id="elh_preh_despacho_base" class="preh_despacho_base"><div class="ew-table-header-caption"><?php echo $preh_despacho_list->base->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="base" class="<?php echo $preh_despacho_list->base->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_despacho_list->SortUrl($preh_despacho_list->base) ?>', 1);"><div id="elh_preh_despacho_base" class="preh_despacho_base">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_despacho_list->base->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_despacho_list->base->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_despacho_list->base->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_despacho_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_despacho_list->ExportAll && $preh_despacho_list->isExport()) {
	$preh_despacho_list->StopRecord = $preh_despacho_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_despacho_list->TotalRecords > $preh_despacho_list->StartRecord + $preh_despacho_list->DisplayRecords - 1)
		$preh_despacho_list->StopRecord = $preh_despacho_list->StartRecord + $preh_despacho_list->DisplayRecords - 1;
	else
		$preh_despacho_list->StopRecord = $preh_despacho_list->TotalRecords;
}
$preh_despacho_list->RecordCount = $preh_despacho_list->StartRecord - 1;
if ($preh_despacho_list->Recordset && !$preh_despacho_list->Recordset->EOF) {
	$preh_despacho_list->Recordset->moveFirst();
	$selectLimit = $preh_despacho_list->UseSelectLimit;
	if (!$selectLimit && $preh_despacho_list->StartRecord > 1)
		$preh_despacho_list->Recordset->move($preh_despacho_list->StartRecord - 1);
} elseif (!$preh_despacho->AllowAddDeleteRow && $preh_despacho_list->StopRecord == 0) {
	$preh_despacho_list->StopRecord = $preh_despacho->GridAddRowCount;
}

// Initialize aggregate
$preh_despacho->RowType = ROWTYPE_AGGREGATEINIT;
$preh_despacho->resetAttributes();
$preh_despacho_list->renderRow();
while ($preh_despacho_list->RecordCount < $preh_despacho_list->StopRecord) {
	$preh_despacho_list->RecordCount++;
	if ($preh_despacho_list->RecordCount >= $preh_despacho_list->StartRecord) {
		$preh_despacho_list->RowCount++;

		// Set up key count
		$preh_despacho_list->KeyCount = $preh_despacho_list->RowIndex;

		// Init row class and style
		$preh_despacho->resetAttributes();
		$preh_despacho->CssClass = "";
		if ($preh_despacho_list->isGridAdd()) {
		} else {
			$preh_despacho_list->loadRowValues($preh_despacho_list->Recordset); // Load row values
		}
		$preh_despacho->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_despacho->RowAttrs->merge(["data-rowindex" => $preh_despacho_list->RowCount, "id" => "r" . $preh_despacho_list->RowCount . "_preh_despacho", "data-rowtype" => $preh_despacho->RowType]);

		// Render row
		$preh_despacho_list->renderRow();

		// Render list options
		$preh_despacho_list->renderListOptions();
?>
	<tr <?php echo $preh_despacho->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_despacho_list->ListOptions->render("body", "left", $preh_despacho_list->RowCount);
?>
	<?php if ($preh_despacho_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_despacho_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_cod_casopreh">
<span<?php echo $preh_despacho_list->cod_casopreh->viewAttributes() ?>><?php echo $preh_despacho_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->fecha->Visible) { // fecha ?>
		<td data-name="fecha" <?php echo $preh_despacho_list->fecha->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_fecha">
<span<?php echo $preh_despacho_list->fecha->viewAttributes() ?>><?php echo $preh_despacho_list->fecha->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->nombre_es->Visible) { // nombre_es ?>
		<td data-name="nombre_es" <?php echo $preh_despacho_list->nombre_es->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_nombre_es">
<span<?php echo $preh_despacho_list->nombre_es->viewAttributes() ?>><?php echo $preh_despacho_list->nombre_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->tiempo->Visible) { // tiempo ?>
		<td data-name="tiempo" <?php echo $preh_despacho_list->tiempo->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_tiempo">
<span<?php echo $preh_despacho_list->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<td data-name="cod_ambulancia" <?php echo $preh_despacho_list->cod_ambulancia->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_cod_ambulancia">
<span<?php echo $preh_despacho_list->cod_ambulancia->viewAttributes() ?>><?php echo $preh_despacho_list->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->hora_asigna->Visible) { // hora_asigna ?>
		<td data-name="hora_asigna" <?php echo $preh_despacho_list->hora_asigna->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_hora_asigna">
<span<?php echo $preh_despacho_list->hora_asigna->viewAttributes() ?>><?php
if (CurrentPage()->hora_asigna->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_asigna->CurrentValue;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->hora_llegada->Visible) { // hora_llegada ?>
		<td data-name="hora_llegada" <?php echo $preh_despacho_list->hora_llegada->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_hora_llegada">
<span<?php echo $preh_despacho_list->hora_llegada->viewAttributes() ?>><?php
if ( CurrentPage()->hora_llegada->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_llegada->CurrentValue;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->hora_inicio->Visible) { // hora_inicio ?>
		<td data-name="hora_inicio" <?php echo $preh_despacho_list->hora_inicio->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_hora_inicio">
<span<?php echo $preh_despacho_list->hora_inicio->viewAttributes() ?>><?php
if (CurrentPage()->hora_inicio->CurrentValue !="")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_inicio->CurrentValue;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->hora_destino->Visible) { // hora_destino ?>
		<td data-name="hora_destino" <?php echo $preh_despacho_list->hora_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_hora_destino">
<span<?php echo $preh_despacho_list->hora_destino->viewAttributes() ?>><?php
if(CurrentPage()->hora_destino->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_destino->CurrentValue;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->hora_preposicion->Visible) { // hora_preposicion ?>
		<td data-name="hora_preposicion" <?php echo $preh_despacho_list->hora_preposicion->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_hora_preposicion">
<span<?php echo $preh_despacho_list->hora_preposicion->viewAttributes() ?>><?php
if(CurrentPage()->hora_preposicion->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_preposicion->CurrentValue;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_despacho_list->base->Visible) { // base ?>
		<td data-name="base" <?php echo $preh_despacho_list->base->cellAttributes() ?>>
<span id="el<?php echo $preh_despacho_list->RowCount ?>_preh_despacho_base">
<span<?php echo $preh_despacho_list->base->viewAttributes() ?>><?php echo $preh_despacho_list->base->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_despacho_list->ListOptions->render("body", "right", $preh_despacho_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_despacho_list->isGridAdd())
		$preh_despacho_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_despacho->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_despacho_list->Recordset)
	$preh_despacho_list->Recordset->Close();
?>
<?php if (!$preh_despacho_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_despacho_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_despacho_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_despacho_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_despacho_list->TotalRecords == 0 && !$preh_despacho->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_despacho_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_despacho_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_despacho_list->isExport()) { ?>
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
$preh_despacho_list->terminate();
?>