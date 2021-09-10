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
$eventos_proximos_list = new eventos_proximos_list();

// Run the page
$eventos_proximos_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$eventos_proximos_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$eventos_proximos_list->isExport()) { ?>
<script>
var feventos_proximoslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	feventos_proximoslist = currentForm = new ew.Form("feventos_proximoslist", "list");
	feventos_proximoslist.formKeyCountName = '<?php echo $eventos_proximos_list->FormKeyCountName ?>';
	loadjs.done("feventos_proximoslist");
});
var feventos_proximoslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	feventos_proximoslistsrch = currentSearchForm = new ew.Form("feventos_proximoslistsrch");

	// Dynamic selection lists
	// Filters

	feventos_proximoslistsrch.filterList = <?php echo $eventos_proximos_list->getFilterList() ?>;
	loadjs.done("feventos_proximoslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$eventos_proximos_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($eventos_proximos_list->TotalRecords > 0 && $eventos_proximos_list->ExportOptions->visible()) { ?>
<?php $eventos_proximos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($eventos_proximos_list->ImportOptions->visible()) { ?>
<?php $eventos_proximos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($eventos_proximos_list->SearchOptions->visible()) { ?>
<?php $eventos_proximos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($eventos_proximos_list->FilterOptions->visible()) { ?>
<?php $eventos_proximos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$eventos_proximos_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$eventos_proximos_list->isExport() && !$eventos_proximos->CurrentAction) { ?>
<form name="feventos_proximoslistsrch" id="feventos_proximoslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="feventos_proximoslistsrch-search-panel" class="<?php echo $eventos_proximos_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="eventos_proximos">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $eventos_proximos_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($eventos_proximos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($eventos_proximos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $eventos_proximos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($eventos_proximos_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($eventos_proximos_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($eventos_proximos_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($eventos_proximos_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $eventos_proximos_list->showPageHeader(); ?>
<?php
$eventos_proximos_list->showMessage();
?>
<?php if ($eventos_proximos_list->TotalRecords > 0 || $eventos_proximos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($eventos_proximos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> eventos_proximos">
<?php if (!$eventos_proximos_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$eventos_proximos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $eventos_proximos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $eventos_proximos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="feventos_proximoslist" id="feventos_proximoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="eventos_proximos">
<div id="gmp_eventos_proximos" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($eventos_proximos_list->TotalRecords > 0 || $eventos_proximos_list->isGridEdit()) { ?>
<table id="tbl_eventos_proximoslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$eventos_proximos->RowType = ROWTYPE_HEADER;

// Render list options
$eventos_proximos_list->renderListOptions();

// Render list options (header, left)
$eventos_proximos_list->ListOptions->render("header", "left");
?>
<?php if ($eventos_proximos_list->id_ambulancias->Visible) { // id_ambulancias ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->id_ambulancias) == "") { ?>
		<th data-name="id_ambulancias" class="<?php echo $eventos_proximos_list->id_ambulancias->headerCellClass() ?>"><div id="elh_eventos_proximos_id_ambulancias" class="eventos_proximos_id_ambulancias"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->id_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_ambulancias" class="<?php echo $eventos_proximos_list->id_ambulancias->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->id_ambulancias) ?>', 1);"><div id="elh_eventos_proximos_id_ambulancias" class="eventos_proximos_id_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->id_ambulancias->caption() ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->id_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->id_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->cod_ambulancias) == "") { ?>
		<th data-name="cod_ambulancias" class="<?php echo $eventos_proximos_list->cod_ambulancias->headerCellClass() ?>"><div id="elh_eventos_proximos_cod_ambulancias" class="eventos_proximos_cod_ambulancias"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->cod_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancias" class="<?php echo $eventos_proximos_list->cod_ambulancias->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->cod_ambulancias) ?>', 1);"><div id="elh_eventos_proximos_cod_ambulancias" class="eventos_proximos_cod_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->cod_ambulancias->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->cod_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->cod_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->placas->Visible) { // placas ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->placas) == "") { ?>
		<th data-name="placas" class="<?php echo $eventos_proximos_list->placas->headerCellClass() ?>"><div id="elh_eventos_proximos_placas" class="eventos_proximos_placas"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->placas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="placas" class="<?php echo $eventos_proximos_list->placas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->placas) ?>', 1);"><div id="elh_eventos_proximos_placas" class="eventos_proximos_placas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->placas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->placas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->placas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->frecuencia_tiempo) == "") { ?>
		<th data-name="frecuencia_tiempo" class="<?php echo $eventos_proximos_list->frecuencia_tiempo->headerCellClass() ?>"><div id="elh_eventos_proximos_frecuencia_tiempo" class="eventos_proximos_frecuencia_tiempo"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->frecuencia_tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="frecuencia_tiempo" class="<?php echo $eventos_proximos_list->frecuencia_tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->frecuencia_tiempo) ?>', 1);"><div id="elh_eventos_proximos_frecuencia_tiempo" class="eventos_proximos_frecuencia_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->frecuencia_tiempo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->frecuencia_tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->frecuencia_tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->servicio_en->Visible) { // servicio_en ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->servicio_en) == "") { ?>
		<th data-name="servicio_en" class="<?php echo $eventos_proximos_list->servicio_en->headerCellClass() ?>"><div id="elh_eventos_proximos_servicio_en" class="eventos_proximos_servicio_en"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->servicio_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="servicio_en" class="<?php echo $eventos_proximos_list->servicio_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->servicio_en) ?>', 1);"><div id="elh_eventos_proximos_servicio_en" class="eventos_proximos_servicio_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->servicio_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->servicio_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->servicio_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->por_uso->Visible) { // por_uso ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->por_uso) == "") { ?>
		<th data-name="por_uso" class="<?php echo $eventos_proximos_list->por_uso->headerCellClass() ?>"><div id="elh_eventos_proximos_por_uso" class="eventos_proximos_por_uso"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->por_uso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="por_uso" class="<?php echo $eventos_proximos_list->por_uso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->por_uso) ?>', 1);"><div id="elh_eventos_proximos_por_uso" class="eventos_proximos_por_uso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->por_uso->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->por_uso->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->por_uso->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->estado_seguro->Visible) { // estado_seguro ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->estado_seguro) == "") { ?>
		<th data-name="estado_seguro" class="<?php echo $eventos_proximos_list->estado_seguro->headerCellClass() ?>"><div id="elh_eventos_proximos_estado_seguro" class="eventos_proximos_estado_seguro"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->estado_seguro->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_seguro" class="<?php echo $eventos_proximos_list->estado_seguro->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->estado_seguro) ?>', 1);"><div id="elh_eventos_proximos_estado_seguro" class="eventos_proximos_estado_seguro">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->estado_seguro->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->estado_seguro->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->estado_seguro->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($eventos_proximos_list->por_fecha->Visible) { // por_fecha ?>
	<?php if ($eventos_proximos_list->SortUrl($eventos_proximos_list->por_fecha) == "") { ?>
		<th data-name="por_fecha" class="<?php echo $eventos_proximos_list->por_fecha->headerCellClass() ?>"><div id="elh_eventos_proximos_por_fecha" class="eventos_proximos_por_fecha"><div class="ew-table-header-caption"><?php echo $eventos_proximos_list->por_fecha->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="por_fecha" class="<?php echo $eventos_proximos_list->por_fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $eventos_proximos_list->SortUrl($eventos_proximos_list->por_fecha) ?>', 1);"><div id="elh_eventos_proximos_por_fecha" class="eventos_proximos_por_fecha">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $eventos_proximos_list->por_fecha->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($eventos_proximos_list->por_fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($eventos_proximos_list->por_fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$eventos_proximos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($eventos_proximos_list->ExportAll && $eventos_proximos_list->isExport()) {
	$eventos_proximos_list->StopRecord = $eventos_proximos_list->TotalRecords;
} else {

	// Set the last record to display
	if ($eventos_proximos_list->TotalRecords > $eventos_proximos_list->StartRecord + $eventos_proximos_list->DisplayRecords - 1)
		$eventos_proximos_list->StopRecord = $eventos_proximos_list->StartRecord + $eventos_proximos_list->DisplayRecords - 1;
	else
		$eventos_proximos_list->StopRecord = $eventos_proximos_list->TotalRecords;
}
$eventos_proximos_list->RecordCount = $eventos_proximos_list->StartRecord - 1;
if ($eventos_proximos_list->Recordset && !$eventos_proximos_list->Recordset->EOF) {
	$eventos_proximos_list->Recordset->moveFirst();
	$selectLimit = $eventos_proximos_list->UseSelectLimit;
	if (!$selectLimit && $eventos_proximos_list->StartRecord > 1)
		$eventos_proximos_list->Recordset->move($eventos_proximos_list->StartRecord - 1);
} elseif (!$eventos_proximos->AllowAddDeleteRow && $eventos_proximos_list->StopRecord == 0) {
	$eventos_proximos_list->StopRecord = $eventos_proximos->GridAddRowCount;
}

// Initialize aggregate
$eventos_proximos->RowType = ROWTYPE_AGGREGATEINIT;
$eventos_proximos->resetAttributes();
$eventos_proximos_list->renderRow();
while ($eventos_proximos_list->RecordCount < $eventos_proximos_list->StopRecord) {
	$eventos_proximos_list->RecordCount++;
	if ($eventos_proximos_list->RecordCount >= $eventos_proximos_list->StartRecord) {
		$eventos_proximos_list->RowCount++;

		// Set up key count
		$eventos_proximos_list->KeyCount = $eventos_proximos_list->RowIndex;

		// Init row class and style
		$eventos_proximos->resetAttributes();
		$eventos_proximos->CssClass = "";
		if ($eventos_proximos_list->isGridAdd()) {
		} else {
			$eventos_proximos_list->loadRowValues($eventos_proximos_list->Recordset); // Load row values
		}
		$eventos_proximos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$eventos_proximos->RowAttrs->merge(["data-rowindex" => $eventos_proximos_list->RowCount, "id" => "r" . $eventos_proximos_list->RowCount . "_eventos_proximos", "data-rowtype" => $eventos_proximos->RowType]);

		// Render row
		$eventos_proximos_list->renderRow();

		// Render list options
		$eventos_proximos_list->renderListOptions();
?>
	<tr <?php echo $eventos_proximos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$eventos_proximos_list->ListOptions->render("body", "left", $eventos_proximos_list->RowCount);
?>
	<?php if ($eventos_proximos_list->id_ambulancias->Visible) { // id_ambulancias ?>
		<td data-name="id_ambulancias" <?php echo $eventos_proximos_list->id_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_id_ambulancias">
<span<?php echo $eventos_proximos_list->id_ambulancias->viewAttributes() ?>><?php echo $eventos_proximos_list->id_ambulancias->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td data-name="cod_ambulancias" <?php echo $eventos_proximos_list->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_cod_ambulancias">
<span<?php echo $eventos_proximos_list->cod_ambulancias->viewAttributes() ?>><?php echo $eventos_proximos_list->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->placas->Visible) { // placas ?>
		<td data-name="placas" <?php echo $eventos_proximos_list->placas->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_placas">
<span<?php echo $eventos_proximos_list->placas->viewAttributes() ?>><?php echo $eventos_proximos_list->placas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
		<td data-name="frecuencia_tiempo" <?php echo $eventos_proximos_list->frecuencia_tiempo->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_frecuencia_tiempo">
<span<?php echo $eventos_proximos_list->frecuencia_tiempo->viewAttributes() ?>><?php echo $eventos_proximos_list->frecuencia_tiempo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->servicio_en->Visible) { // servicio_en ?>
		<td data-name="servicio_en" <?php echo $eventos_proximos_list->servicio_en->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_servicio_en">
<span<?php echo $eventos_proximos_list->servicio_en->viewAttributes() ?>><?php echo $eventos_proximos_list->servicio_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->por_uso->Visible) { // por_uso ?>
		<td data-name="por_uso" <?php echo $eventos_proximos_list->por_uso->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_por_uso">
<span<?php echo $eventos_proximos_list->por_uso->viewAttributes() ?>><?php
if (CurrentLanguageID() == "en") {
echo "<a href=\"#\"> <span class=\"badge bg-success\">On Time</span></a>";
}elseif (CurrentLanguageID() == "fr") {
echo "<a href=\"#\"> <span class=\"badge bg-success\">Á temps</span></a>";
}elseif (CurrentLanguageID() == "pt") {
echo "<a href=\"#\"> <span class=\"badge bg-success\">A tiempo</span></a>";
}else{
echo "<a href=\"#\"> <span class=\"badge bg-success\">A tiempo</span></a>";
}
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->estado_seguro->Visible) { // estado_seguro ?>
		<td data-name="estado_seguro" <?php echo $eventos_proximos_list->estado_seguro->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_estado_seguro">
<span<?php echo $eventos_proximos_list->estado_seguro->viewAttributes() ?>><?php
if (CurrentLanguageID() == "en") {
echo "<a href=\"#\"> <span class=\"badge bg-success\">On Time</span></a>";
}elseif (CurrentLanguageID() == "fr") {
echo "<a href=\"#\"> <span class=\"badge bg-success\">Á temps</span></a>";
}elseif (CurrentLanguageID() == "pt") {
echo "<a href=\"#\"> <span class=\"badge bg-success\">Á tiemp</span></a>";
}else{
echo "<a href=\"#\"> <span class=\"badge bg-success\">A tiempo</span></a>";
}
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($eventos_proximos_list->por_fecha->Visible) { // por_fecha ?>
		<td data-name="por_fecha" <?php echo $eventos_proximos_list->por_fecha->cellAttributes() ?>>
<span id="el<?php echo $eventos_proximos_list->RowCount ?>_eventos_proximos_por_fecha">
<span<?php echo $eventos_proximos_list->por_fecha->viewAttributes() ?>><?php
if (CurrentLanguageID() == "en") {
echo "<a href=\"#\"> <span class=\"badge bg-danger\">Time out</span></a>";
}elseif (CurrentLanguageID() == "fr") {
echo "<a href=\"#\"> <span class=\"badge bg-danger\">Temps libre</span></a>";
}elseif (CurrentLanguageID() == "pt") {
echo "<a href=\"#\"> <span class=\"badge bg-danger\">Tempo esgotado</span></a>";
}else{
echo "<a href=\"#\"> <span class=\"badge bg-danger\">Vencido</span></a>";
}
?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$eventos_proximos_list->ListOptions->render("body", "right", $eventos_proximos_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$eventos_proximos_list->isGridAdd())
		$eventos_proximos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$eventos_proximos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($eventos_proximos_list->Recordset)
	$eventos_proximos_list->Recordset->Close();
?>
<?php if (!$eventos_proximos_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$eventos_proximos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $eventos_proximos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $eventos_proximos_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($eventos_proximos_list->TotalRecords == 0 && !$eventos_proximos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $eventos_proximos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$eventos_proximos_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$eventos_proximos_list->isExport()) { ?>
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
$eventos_proximos_list->terminate();
?>