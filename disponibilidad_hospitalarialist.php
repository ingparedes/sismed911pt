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
$disponibilidad_hospitalaria_list = new disponibilidad_hospitalaria_list();

// Run the page
$disponibilidad_hospitalaria_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$disponibilidad_hospitalaria_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$disponibilidad_hospitalaria_list->isExport()) { ?>
<script>
var fdisponibilidad_hospitalarialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdisponibilidad_hospitalarialist = currentForm = new ew.Form("fdisponibilidad_hospitalarialist", "list");
	fdisponibilidad_hospitalarialist.formKeyCountName = '<?php echo $disponibilidad_hospitalaria_list->FormKeyCountName ?>';
	loadjs.done("fdisponibilidad_hospitalarialist");
});
var fdisponibilidad_hospitalarialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdisponibilidad_hospitalarialistsrch = currentSearchForm = new ew.Form("fdisponibilidad_hospitalarialistsrch");

	// Dynamic selection lists
	// Filters

	fdisponibilidad_hospitalarialistsrch.filterList = <?php echo $disponibilidad_hospitalaria_list->getFilterList() ?>;
	loadjs.done("fdisponibilidad_hospitalarialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$disponibilidad_hospitalaria_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($disponibilidad_hospitalaria_list->TotalRecords > 0 && $disponibilidad_hospitalaria_list->ExportOptions->visible()) { ?>
<?php $disponibilidad_hospitalaria_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->ImportOptions->visible()) { ?>
<?php $disponibilidad_hospitalaria_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->SearchOptions->visible()) { ?>
<?php $disponibilidad_hospitalaria_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->FilterOptions->visible()) { ?>
<?php $disponibilidad_hospitalaria_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$disponibilidad_hospitalaria_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$disponibilidad_hospitalaria_list->isExport() && !$disponibilidad_hospitalaria->CurrentAction) { ?>
<form name="fdisponibilidad_hospitalarialistsrch" id="fdisponibilidad_hospitalarialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdisponibilidad_hospitalarialistsrch-search-panel" class="<?php echo $disponibilidad_hospitalaria_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="disponibilidad_hospitalaria">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $disponibilidad_hospitalaria_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($disponibilidad_hospitalaria_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($disponibilidad_hospitalaria_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $disponibilidad_hospitalaria_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($disponibilidad_hospitalaria_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($disponibilidad_hospitalaria_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($disponibilidad_hospitalaria_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($disponibilidad_hospitalaria_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $disponibilidad_hospitalaria_list->showPageHeader(); ?>
<?php
$disponibilidad_hospitalaria_list->showMessage();
?>
<?php if ($disponibilidad_hospitalaria_list->TotalRecords > 0 || $disponibilidad_hospitalaria->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($disponibilidad_hospitalaria_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> disponibilidad_hospitalaria">
<?php if (!$disponibilidad_hospitalaria_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$disponibilidad_hospitalaria_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $disponibilidad_hospitalaria_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $disponibilidad_hospitalaria_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdisponibilidad_hospitalarialist" id="fdisponibilidad_hospitalarialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="disponibilidad_hospitalaria">
<div id="gmp_disponibilidad_hospitalaria" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($disponibilidad_hospitalaria_list->TotalRecords > 0 || $disponibilidad_hospitalaria_list->isGridEdit()) { ?>
<table id="tbl_disponibilidad_hospitalarialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$disponibilidad_hospitalaria->RowType = ROWTYPE_HEADER;

// Render list options
$disponibilidad_hospitalaria_list->renderListOptions();

// Render list options (header, left)
$disponibilidad_hospitalaria_list->ListOptions->render("header", "left");
?>
<?php if ($disponibilidad_hospitalaria_list->id_disponibilida->Visible) { // id_disponibilida ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->id_disponibilida) == "") { ?>
		<th data-name="id_disponibilida" class="<?php echo $disponibilidad_hospitalaria_list->id_disponibilida->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_id_disponibilida" class="disponibilidad_hospitalaria_id_disponibilida"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->id_disponibilida->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_disponibilida" class="<?php echo $disponibilidad_hospitalaria_list->id_disponibilida->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->id_disponibilida) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_id_disponibilida" class="disponibilidad_hospitalaria_id_disponibilida">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->id_disponibilida->caption() ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->id_disponibilida->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->id_disponibilida->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->fecha_disponibilidad->Visible) { // fecha_disponibilidad ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->fecha_disponibilidad) == "") { ?>
		<th data-name="fecha_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_fecha_disponibilidad" class="disponibilidad_hospitalaria_fecha_disponibilidad"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->fecha_disponibilidad) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_fecha_disponibilidad" class="disponibilidad_hospitalaria_fecha_disponibilidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->fecha_disponibilidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->fecha_disponibilidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->cod_hospital->Visible) { // cod_hospital ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->cod_hospital) == "") { ?>
		<th data-name="cod_hospital" class="<?php echo $disponibilidad_hospitalaria_list->cod_hospital->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_cod_hospital" class="disponibilidad_hospitalaria_cod_hospital"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->cod_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_hospital" class="<?php echo $disponibilidad_hospitalaria_list->cod_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->cod_hospital) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_cod_hospital" class="disponibilidad_hospitalaria_cod_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->cod_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->cod_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->cod_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->servicio_disponibilidad->Visible) { // servicio_disponibilidad ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->servicio_disponibilidad) == "") { ?>
		<th data-name="servicio_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_servicio_disponibilidad" class="disponibilidad_hospitalaria_servicio_disponibilidad"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="servicio_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->servicio_disponibilidad) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_servicio_disponibilidad" class="disponibilidad_hospitalaria_servicio_disponibilidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->servicio_disponibilidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->servicio_disponibilidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->estado_disponibilidad->Visible) { // estado_disponibilidad ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->estado_disponibilidad) == "") { ?>
		<th data-name="estado_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_estado_disponibilidad" class="disponibilidad_hospitalaria_estado_disponibilidad"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->estado_disponibilidad) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_estado_disponibilidad" class="disponibilidad_hospitalaria_estado_disponibilidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->estado_disponibilidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->estado_disponibilidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->cantidad_camas->Visible) { // cantidad_camas ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->cantidad_camas) == "") { ?>
		<th data-name="cantidad_camas" class="<?php echo $disponibilidad_hospitalaria_list->cantidad_camas->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_cantidad_camas" class="disponibilidad_hospitalaria_cantidad_camas"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->cantidad_camas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cantidad_camas" class="<?php echo $disponibilidad_hospitalaria_list->cantidad_camas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->cantidad_camas) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_cantidad_camas" class="disponibilidad_hospitalaria_cantidad_camas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->cantidad_camas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->cantidad_camas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->cantidad_camas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->nombre_reporta->Visible) { // nombre_reporta ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->nombre_reporta) == "") { ?>
		<th data-name="nombre_reporta" class="<?php echo $disponibilidad_hospitalaria_list->nombre_reporta->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_nombre_reporta" class="disponibilidad_hospitalaria_nombre_reporta"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->nombre_reporta->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_reporta" class="<?php echo $disponibilidad_hospitalaria_list->nombre_reporta->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->nombre_reporta) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_nombre_reporta" class="disponibilidad_hospitalaria_nombre_reporta">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->nombre_reporta->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->nombre_reporta->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->nombre_reporta->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->telefono->Visible) { // telefono ?>
	<?php if ($disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->telefono) == "") { ?>
		<th data-name="telefono" class="<?php echo $disponibilidad_hospitalaria_list->telefono->headerCellClass() ?>"><div id="elh_disponibilidad_hospitalaria_telefono" class="disponibilidad_hospitalaria_telefono"><div class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->telefono->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono" class="<?php echo $disponibilidad_hospitalaria_list->telefono->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $disponibilidad_hospitalaria_list->SortUrl($disponibilidad_hospitalaria_list->telefono) ?>', 1);"><div id="elh_disponibilidad_hospitalaria_telefono" class="disponibilidad_hospitalaria_telefono">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $disponibilidad_hospitalaria_list->telefono->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($disponibilidad_hospitalaria_list->telefono->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($disponibilidad_hospitalaria_list->telefono->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$disponibilidad_hospitalaria_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($disponibilidad_hospitalaria_list->ExportAll && $disponibilidad_hospitalaria_list->isExport()) {
	$disponibilidad_hospitalaria_list->StopRecord = $disponibilidad_hospitalaria_list->TotalRecords;
} else {

	// Set the last record to display
	if ($disponibilidad_hospitalaria_list->TotalRecords > $disponibilidad_hospitalaria_list->StartRecord + $disponibilidad_hospitalaria_list->DisplayRecords - 1)
		$disponibilidad_hospitalaria_list->StopRecord = $disponibilidad_hospitalaria_list->StartRecord + $disponibilidad_hospitalaria_list->DisplayRecords - 1;
	else
		$disponibilidad_hospitalaria_list->StopRecord = $disponibilidad_hospitalaria_list->TotalRecords;
}
$disponibilidad_hospitalaria_list->RecordCount = $disponibilidad_hospitalaria_list->StartRecord - 1;
if ($disponibilidad_hospitalaria_list->Recordset && !$disponibilidad_hospitalaria_list->Recordset->EOF) {
	$disponibilidad_hospitalaria_list->Recordset->moveFirst();
	$selectLimit = $disponibilidad_hospitalaria_list->UseSelectLimit;
	if (!$selectLimit && $disponibilidad_hospitalaria_list->StartRecord > 1)
		$disponibilidad_hospitalaria_list->Recordset->move($disponibilidad_hospitalaria_list->StartRecord - 1);
} elseif (!$disponibilidad_hospitalaria->AllowAddDeleteRow && $disponibilidad_hospitalaria_list->StopRecord == 0) {
	$disponibilidad_hospitalaria_list->StopRecord = $disponibilidad_hospitalaria->GridAddRowCount;
}

// Initialize aggregate
$disponibilidad_hospitalaria->RowType = ROWTYPE_AGGREGATEINIT;
$disponibilidad_hospitalaria->resetAttributes();
$disponibilidad_hospitalaria_list->renderRow();
while ($disponibilidad_hospitalaria_list->RecordCount < $disponibilidad_hospitalaria_list->StopRecord) {
	$disponibilidad_hospitalaria_list->RecordCount++;
	if ($disponibilidad_hospitalaria_list->RecordCount >= $disponibilidad_hospitalaria_list->StartRecord) {
		$disponibilidad_hospitalaria_list->RowCount++;

		// Set up key count
		$disponibilidad_hospitalaria_list->KeyCount = $disponibilidad_hospitalaria_list->RowIndex;

		// Init row class and style
		$disponibilidad_hospitalaria->resetAttributes();
		$disponibilidad_hospitalaria->CssClass = "";
		if ($disponibilidad_hospitalaria_list->isGridAdd()) {
		} else {
			$disponibilidad_hospitalaria_list->loadRowValues($disponibilidad_hospitalaria_list->Recordset); // Load row values
		}
		$disponibilidad_hospitalaria->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$disponibilidad_hospitalaria->RowAttrs->merge(["data-rowindex" => $disponibilidad_hospitalaria_list->RowCount, "id" => "r" . $disponibilidad_hospitalaria_list->RowCount . "_disponibilidad_hospitalaria", "data-rowtype" => $disponibilidad_hospitalaria->RowType]);

		// Render row
		$disponibilidad_hospitalaria_list->renderRow();

		// Render list options
		$disponibilidad_hospitalaria_list->renderListOptions();
?>
	<tr <?php echo $disponibilidad_hospitalaria->rowAttributes() ?>>
<?php

// Render list options (body, left)
$disponibilidad_hospitalaria_list->ListOptions->render("body", "left", $disponibilidad_hospitalaria_list->RowCount);
?>
	<?php if ($disponibilidad_hospitalaria_list->id_disponibilida->Visible) { // id_disponibilida ?>
		<td data-name="id_disponibilida" <?php echo $disponibilidad_hospitalaria_list->id_disponibilida->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_id_disponibilida">
<span<?php echo $disponibilidad_hospitalaria_list->id_disponibilida->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->id_disponibilida->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->fecha_disponibilidad->Visible) { // fecha_disponibilidad ?>
		<td data-name="fecha_disponibilidad" <?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_fecha_disponibilidad">
<span<?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->fecha_disponibilidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->cod_hospital->Visible) { // cod_hospital ?>
		<td data-name="cod_hospital" <?php echo $disponibilidad_hospitalaria_list->cod_hospital->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_cod_hospital">
<span<?php echo $disponibilidad_hospitalaria_list->cod_hospital->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->cod_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->servicio_disponibilidad->Visible) { // servicio_disponibilidad ?>
		<td data-name="servicio_disponibilidad" <?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_servicio_disponibilidad">
<span<?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->servicio_disponibilidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->estado_disponibilidad->Visible) { // estado_disponibilidad ?>
		<td data-name="estado_disponibilidad" <?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_estado_disponibilidad">
<span<?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->estado_disponibilidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->cantidad_camas->Visible) { // cantidad_camas ?>
		<td data-name="cantidad_camas" <?php echo $disponibilidad_hospitalaria_list->cantidad_camas->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_cantidad_camas">
<span<?php echo $disponibilidad_hospitalaria_list->cantidad_camas->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->cantidad_camas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->nombre_reporta->Visible) { // nombre_reporta ?>
		<td data-name="nombre_reporta" <?php echo $disponibilidad_hospitalaria_list->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_nombre_reporta">
<span<?php echo $disponibilidad_hospitalaria_list->nombre_reporta->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($disponibilidad_hospitalaria_list->telefono->Visible) { // telefono ?>
		<td data-name="telefono" <?php echo $disponibilidad_hospitalaria_list->telefono->cellAttributes() ?>>
<span id="el<?php echo $disponibilidad_hospitalaria_list->RowCount ?>_disponibilidad_hospitalaria_telefono">
<span<?php echo $disponibilidad_hospitalaria_list->telefono->viewAttributes() ?>><?php echo $disponibilidad_hospitalaria_list->telefono->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$disponibilidad_hospitalaria_list->ListOptions->render("body", "right", $disponibilidad_hospitalaria_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$disponibilidad_hospitalaria_list->isGridAdd())
		$disponibilidad_hospitalaria_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$disponibilidad_hospitalaria->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($disponibilidad_hospitalaria_list->Recordset)
	$disponibilidad_hospitalaria_list->Recordset->Close();
?>
<?php if (!$disponibilidad_hospitalaria_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$disponibilidad_hospitalaria_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $disponibilidad_hospitalaria_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $disponibilidad_hospitalaria_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($disponibilidad_hospitalaria_list->TotalRecords == 0 && !$disponibilidad_hospitalaria->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $disponibilidad_hospitalaria_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$disponibilidad_hospitalaria_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$disponibilidad_hospitalaria_list->isExport()) { ?>
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
$disponibilidad_hospitalaria_list->terminate();
?>