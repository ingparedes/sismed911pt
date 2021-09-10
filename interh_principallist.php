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
$interh_principal_list = new interh_principal_list();

// Run the page
$interh_principal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_principal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_principal_list->isExport()) { ?>
<script>
var finterh_principallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_principallist = currentForm = new ew.Form("finterh_principallist", "list");
	finterh_principallist.formKeyCountName = '<?php echo $interh_principal_list->FormKeyCountName ?>';
	loadjs.done("finterh_principallist");
});
var finterh_principallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finterh_principallistsrch = currentSearchForm = new ew.Form("finterh_principallistsrch");

	// Dynamic selection lists
	// Filters

	finterh_principallistsrch.filterList = <?php echo $interh_principal_list->getFilterList() ?>;
	loadjs.done("finterh_principallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_principal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_principal_list->TotalRecords > 0 && $interh_principal_list->ExportOptions->visible()) { ?>
<?php $interh_principal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_principal_list->ImportOptions->visible()) { ?>
<?php $interh_principal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_principal_list->SearchOptions->visible()) { ?>
<?php $interh_principal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($interh_principal_list->FilterOptions->visible()) { ?>
<?php $interh_principal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_principal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_principal_list->isExport() && !$interh_principal->CurrentAction) { ?>
<form name="finterh_principallistsrch" id="finterh_principallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finterh_principallistsrch-search-panel" class="<?php echo $interh_principal_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_principal">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $interh_principal_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($interh_principal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($interh_principal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $interh_principal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($interh_principal_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($interh_principal_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($interh_principal_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($interh_principal_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $interh_principal_list->showPageHeader(); ?>
<?php
$interh_principal_list->showMessage();
?>
<?php if ($interh_principal_list->TotalRecords > 0 || $interh_principal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_principal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_principal">
<?php if (!$interh_principal_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$interh_principal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_principal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_principal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finterh_principallist" id="finterh_principallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_principal">
<div id="gmp_interh_principal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_principal_list->TotalRecords > 0 || $interh_principal_list->isGridEdit()) { ?>
<table id="tbl_interh_principallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_principal->RowType = ROWTYPE_HEADER;

// Render list options
$interh_principal_list->renderListOptions();

// Render list options (header, left)
$interh_principal_list->ListOptions->render("header", "left");
?>
<?php if ($interh_principal_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_principal_list->cod_casointerh->headerCellClass() ?>"><div id="elh_interh_principal_cod_casointerh" class="interh_principal_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_principal_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_principal_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->cod_casointerh) ?>', 1);"><div id="elh_interh_principal_cod_casointerh" class="interh_principal_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->fechahorainterh->Visible) { // fechahorainterh ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->fechahorainterh) == "") { ?>
		<th data-name="fechahorainterh" class="<?php echo $interh_principal_list->fechahorainterh->headerCellClass() ?>"><div id="elh_interh_principal_fechahorainterh" class="interh_principal_fechahorainterh"><div class="ew-table-header-caption"><?php echo $interh_principal_list->fechahorainterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fechahorainterh" class="<?php echo $interh_principal_list->fechahorainterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->fechahorainterh) ?>', 1);"><div id="elh_interh_principal_fechahorainterh" class="interh_principal_fechahorainterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->fechahorainterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->fechahorainterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->fechahorainterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->hospitalorigen->Visible) { // hospitalorigen ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->hospitalorigen) == "") { ?>
		<th data-name="hospitalorigen" class="<?php echo $interh_principal_list->hospitalorigen->headerCellClass() ?>"><div id="elh_interh_principal_hospitalorigen" class="interh_principal_hospitalorigen"><div class="ew-table-header-caption"><?php echo $interh_principal_list->hospitalorigen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospitalorigen" class="<?php echo $interh_principal_list->hospitalorigen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->hospitalorigen) ?>', 1);"><div id="elh_interh_principal_hospitalorigen" class="interh_principal_hospitalorigen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->hospitalorigen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->hospitalorigen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->hospitalorigen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->accioninterh->Visible) { // accioninterh ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->accioninterh) == "") { ?>
		<th data-name="accioninterh" class="<?php echo $interh_principal_list->accioninterh->headerCellClass() ?>"><div id="elh_interh_principal_accioninterh" class="interh_principal_accioninterh"><div class="ew-table-header-caption"><?php echo $interh_principal_list->accioninterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="accioninterh" class="<?php echo $interh_principal_list->accioninterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->accioninterh) ?>', 1);"><div id="elh_interh_principal_accioninterh" class="interh_principal_accioninterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->accioninterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->accioninterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->accioninterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->cierreinterh->Visible) { // cierreinterh ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->cierreinterh) == "") { ?>
		<th data-name="cierreinterh" class="<?php echo $interh_principal_list->cierreinterh->headerCellClass() ?>"><div id="elh_interh_principal_cierreinterh" class="interh_principal_cierreinterh"><div class="ew-table-header-caption"><?php echo $interh_principal_list->cierreinterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cierreinterh" class="<?php echo $interh_principal_list->cierreinterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->cierreinterh) ?>', 1);"><div id="elh_interh_principal_cierreinterh" class="interh_principal_cierreinterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->cierreinterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->cierreinterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->cierreinterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->hospitaldestino->Visible) { // hospitaldestino ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->hospitaldestino) == "") { ?>
		<th data-name="hospitaldestino" class="<?php echo $interh_principal_list->hospitaldestino->headerCellClass() ?>"><div id="elh_interh_principal_hospitaldestino" class="interh_principal_hospitaldestino"><div class="ew-table-header-caption"><?php echo $interh_principal_list->hospitaldestino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospitaldestino" class="<?php echo $interh_principal_list->hospitaldestino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->hospitaldestino) ?>', 1);"><div id="elh_interh_principal_hospitaldestino" class="interh_principal_hospitaldestino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->hospitaldestino->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->hospitaldestino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->hospitaldestino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->sede->Visible) { // sede ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->sede) == "") { ?>
		<th data-name="sede" class="<?php echo $interh_principal_list->sede->headerCellClass() ?>"><div id="elh_interh_principal_sede" class="interh_principal_sede"><div class="ew-table-header-caption"><?php echo $interh_principal_list->sede->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sede" class="<?php echo $interh_principal_list->sede->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->sede) ?>', 1);"><div id="elh_interh_principal_sede" class="interh_principal_sede">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->sede->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->sede->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->sede->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->nombre_prioridad->Visible) { // nombre_prioridad ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->nombre_prioridad) == "") { ?>
		<th data-name="nombre_prioridad" class="<?php echo $interh_principal_list->nombre_prioridad->headerCellClass() ?>"><div id="elh_interh_principal_nombre_prioridad" class="interh_principal_nombre_prioridad"><div class="ew-table-header-caption"><?php echo $interh_principal_list->nombre_prioridad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_prioridad" class="<?php echo $interh_principal_list->nombre_prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->nombre_prioridad) ?>', 1);"><div id="elh_interh_principal_nombre_prioridad" class="interh_principal_nombre_prioridad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->nombre_prioridad->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->nombre_prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->nombre_prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->nombre_motivo_es->Visible) { // nombre_motivo_es ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->nombre_motivo_es) == "") { ?>
		<th data-name="nombre_motivo_es" class="<?php echo $interh_principal_list->nombre_motivo_es->headerCellClass() ?>"><div id="elh_interh_principal_nombre_motivo_es" class="interh_principal_nombre_motivo_es"><div class="ew-table-header-caption"><?php echo $interh_principal_list->nombre_motivo_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_motivo_es" class="<?php echo $interh_principal_list->nombre_motivo_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->nombre_motivo_es) ?>', 1);"><div id="elh_interh_principal_nombre_motivo_es" class="interh_principal_nombre_motivo_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->nombre_motivo_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->nombre_motivo_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->nombre_motivo_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->nombre_tiposervicion_es->Visible) { // nombre_tiposervicion_es ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->nombre_tiposervicion_es) == "") { ?>
		<th data-name="nombre_tiposervicion_es" class="<?php echo $interh_principal_list->nombre_tiposervicion_es->headerCellClass() ?>"><div id="elh_interh_principal_nombre_tiposervicion_es" class="interh_principal_nombre_tiposervicion_es"><div class="ew-table-header-caption"><?php echo $interh_principal_list->nombre_tiposervicion_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_tiposervicion_es" class="<?php echo $interh_principal_list->nombre_tiposervicion_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->nombre_tiposervicion_es) ?>', 1);"><div id="elh_interh_principal_nombre_tiposervicion_es" class="interh_principal_nombre_tiposervicion_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->nombre_tiposervicion_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->nombre_tiposervicion_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->nombre_tiposervicion_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_principal_list->fecha->Visible) { // fecha ?>
	<?php if ($interh_principal_list->SortUrl($interh_principal_list->fecha) == "") { ?>
		<th data-name="fecha" class="<?php echo $interh_principal_list->fecha->headerCellClass() ?>"><div id="elh_interh_principal_fecha" class="interh_principal_fecha"><div class="ew-table-header-caption"><?php echo $interh_principal_list->fecha->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha" class="<?php echo $interh_principal_list->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_principal_list->SortUrl($interh_principal_list->fecha) ?>', 1);"><div id="elh_interh_principal_fecha" class="interh_principal_fecha">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_principal_list->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_principal_list->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_principal_list->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_principal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_principal_list->ExportAll && $interh_principal_list->isExport()) {
	$interh_principal_list->StopRecord = $interh_principal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_principal_list->TotalRecords > $interh_principal_list->StartRecord + $interh_principal_list->DisplayRecords - 1)
		$interh_principal_list->StopRecord = $interh_principal_list->StartRecord + $interh_principal_list->DisplayRecords - 1;
	else
		$interh_principal_list->StopRecord = $interh_principal_list->TotalRecords;
}
$interh_principal_list->RecordCount = $interh_principal_list->StartRecord - 1;
if ($interh_principal_list->Recordset && !$interh_principal_list->Recordset->EOF) {
	$interh_principal_list->Recordset->moveFirst();
	$selectLimit = $interh_principal_list->UseSelectLimit;
	if (!$selectLimit && $interh_principal_list->StartRecord > 1)
		$interh_principal_list->Recordset->move($interh_principal_list->StartRecord - 1);
} elseif (!$interh_principal->AllowAddDeleteRow && $interh_principal_list->StopRecord == 0) {
	$interh_principal_list->StopRecord = $interh_principal->GridAddRowCount;
}

// Initialize aggregate
$interh_principal->RowType = ROWTYPE_AGGREGATEINIT;
$interh_principal->resetAttributes();
$interh_principal_list->renderRow();
while ($interh_principal_list->RecordCount < $interh_principal_list->StopRecord) {
	$interh_principal_list->RecordCount++;
	if ($interh_principal_list->RecordCount >= $interh_principal_list->StartRecord) {
		$interh_principal_list->RowCount++;

		// Set up key count
		$interh_principal_list->KeyCount = $interh_principal_list->RowIndex;

		// Init row class and style
		$interh_principal->resetAttributes();
		$interh_principal->CssClass = "";
		if ($interh_principal_list->isGridAdd()) {
		} else {
			$interh_principal_list->loadRowValues($interh_principal_list->Recordset); // Load row values
		}
		$interh_principal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_principal->RowAttrs->merge(["data-rowindex" => $interh_principal_list->RowCount, "id" => "r" . $interh_principal_list->RowCount . "_interh_principal", "data-rowtype" => $interh_principal->RowType]);

		// Render row
		$interh_principal_list->renderRow();

		// Render list options
		$interh_principal_list->renderListOptions();
?>
	<tr <?php echo $interh_principal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_principal_list->ListOptions->render("body", "left", $interh_principal_list->RowCount);
?>
	<?php if ($interh_principal_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $interh_principal_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_cod_casointerh">
<span<?php echo $interh_principal_list->cod_casointerh->viewAttributes() ?>><?php echo $interh_principal_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->fechahorainterh->Visible) { // fechahorainterh ?>
		<td data-name="fechahorainterh" <?php echo $interh_principal_list->fechahorainterh->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_fechahorainterh">
<span<?php echo $interh_principal_list->fechahorainterh->viewAttributes() ?>><?php echo $interh_principal_list->fechahorainterh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->hospitalorigen->Visible) { // hospitalorigen ?>
		<td data-name="hospitalorigen" <?php echo $interh_principal_list->hospitalorigen->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_hospitalorigen">
<span<?php echo $interh_principal_list->hospitalorigen->viewAttributes() ?>><?php echo $interh_principal_list->hospitalorigen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->accioninterh->Visible) { // accioninterh ?>
		<td data-name="accioninterh" <?php echo $interh_principal_list->accioninterh->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_accioninterh">
<span<?php echo $interh_principal_list->accioninterh->viewAttributes() ?>><?php echo $interh_principal_list->accioninterh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->cierreinterh->Visible) { // cierreinterh ?>
		<td data-name="cierreinterh" <?php echo $interh_principal_list->cierreinterh->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_cierreinterh">
<span<?php echo $interh_principal_list->cierreinterh->viewAttributes() ?>><?php echo $interh_principal_list->cierreinterh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->hospitaldestino->Visible) { // hospitaldestino ?>
		<td data-name="hospitaldestino" <?php echo $interh_principal_list->hospitaldestino->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_hospitaldestino">
<span<?php echo $interh_principal_list->hospitaldestino->viewAttributes() ?>><?php echo $interh_principal_list->hospitaldestino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->sede->Visible) { // sede ?>
		<td data-name="sede" <?php echo $interh_principal_list->sede->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_sede">
<span<?php echo $interh_principal_list->sede->viewAttributes() ?>><?php echo $interh_principal_list->sede->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->nombre_prioridad->Visible) { // nombre_prioridad ?>
		<td data-name="nombre_prioridad" <?php echo $interh_principal_list->nombre_prioridad->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_nombre_prioridad">
<span<?php echo $interh_principal_list->nombre_prioridad->viewAttributes() ?>><?php echo $interh_principal_list->nombre_prioridad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->nombre_motivo_es->Visible) { // nombre_motivo_es ?>
		<td data-name="nombre_motivo_es" <?php echo $interh_principal_list->nombre_motivo_es->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_nombre_motivo_es">
<span<?php echo $interh_principal_list->nombre_motivo_es->viewAttributes() ?>><?php echo $interh_principal_list->nombre_motivo_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->nombre_tiposervicion_es->Visible) { // nombre_tiposervicion_es ?>
		<td data-name="nombre_tiposervicion_es" <?php echo $interh_principal_list->nombre_tiposervicion_es->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_nombre_tiposervicion_es">
<span<?php echo $interh_principal_list->nombre_tiposervicion_es->viewAttributes() ?>><?php echo $interh_principal_list->nombre_tiposervicion_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_principal_list->fecha->Visible) { // fecha ?>
		<td data-name="fecha" <?php echo $interh_principal_list->fecha->cellAttributes() ?>>
<span id="el<?php echo $interh_principal_list->RowCount ?>_interh_principal_fecha">
<span<?php echo $interh_principal_list->fecha->viewAttributes() ?>><?php echo $interh_principal_list->fecha->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_principal_list->ListOptions->render("body", "right", $interh_principal_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$interh_principal_list->isGridAdd())
		$interh_principal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_principal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_principal_list->Recordset)
	$interh_principal_list->Recordset->Close();
?>
<?php if (!$interh_principal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_principal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_principal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_principal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_principal_list->TotalRecords == 0 && !$interh_principal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_principal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$interh_principal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_principal_list->isExport()) { ?>
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
$interh_principal_list->terminate();
?>