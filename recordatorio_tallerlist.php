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
$recordatorio_taller_list = new recordatorio_taller_list();

// Run the page
$recordatorio_taller_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recordatorio_taller_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$recordatorio_taller_list->isExport()) { ?>
<script>
var frecordatorio_tallerlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	frecordatorio_tallerlist = currentForm = new ew.Form("frecordatorio_tallerlist", "list");
	frecordatorio_tallerlist.formKeyCountName = '<?php echo $recordatorio_taller_list->FormKeyCountName ?>';
	loadjs.done("frecordatorio_tallerlist");
});
var frecordatorio_tallerlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	frecordatorio_tallerlistsrch = currentSearchForm = new ew.Form("frecordatorio_tallerlistsrch");

	// Dynamic selection lists
	// Filters

	frecordatorio_tallerlistsrch.filterList = <?php echo $recordatorio_taller_list->getFilterList() ?>;
	loadjs.done("frecordatorio_tallerlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$recordatorio_taller_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($recordatorio_taller_list->TotalRecords > 0 && $recordatorio_taller_list->ExportOptions->visible()) { ?>
<?php $recordatorio_taller_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($recordatorio_taller_list->ImportOptions->visible()) { ?>
<?php $recordatorio_taller_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($recordatorio_taller_list->SearchOptions->visible()) { ?>
<?php $recordatorio_taller_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($recordatorio_taller_list->FilterOptions->visible()) { ?>
<?php $recordatorio_taller_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$recordatorio_taller_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$recordatorio_taller_list->isExport() && !$recordatorio_taller->CurrentAction) { ?>
<form name="frecordatorio_tallerlistsrch" id="frecordatorio_tallerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="frecordatorio_tallerlistsrch-search-panel" class="<?php echo $recordatorio_taller_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recordatorio_taller">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $recordatorio_taller_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($recordatorio_taller_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($recordatorio_taller_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $recordatorio_taller_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($recordatorio_taller_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($recordatorio_taller_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($recordatorio_taller_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($recordatorio_taller_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $recordatorio_taller_list->showPageHeader(); ?>
<?php
$recordatorio_taller_list->showMessage();
?>
<?php if ($recordatorio_taller_list->TotalRecords > 0 || $recordatorio_taller->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($recordatorio_taller_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recordatorio_taller">
<?php if (!$recordatorio_taller_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$recordatorio_taller_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $recordatorio_taller_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recordatorio_taller_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecordatorio_tallerlist" id="frecordatorio_tallerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recordatorio_taller">
<div id="gmp_recordatorio_taller" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($recordatorio_taller_list->TotalRecords > 0 || $recordatorio_taller_list->isGridEdit()) { ?>
<table id="tbl_recordatorio_tallerlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$recordatorio_taller->RowType = ROWTYPE_HEADER;

// Render list options
$recordatorio_taller_list->renderListOptions();

// Render list options (header, left)
$recordatorio_taller_list->ListOptions->render("header", "left");
?>
<?php if ($recordatorio_taller_list->id->Visible) { // id ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $recordatorio_taller_list->id->headerCellClass() ?>"><div id="elh_recordatorio_taller_id" class="recordatorio_taller_id"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $recordatorio_taller_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->id) ?>', 1);"><div id="elh_recordatorio_taller_id" class="recordatorio_taller_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recordatorio_taller_list->vehiculo->Visible) { // vehiculo ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->vehiculo) == "") { ?>
		<th data-name="vehiculo" class="<?php echo $recordatorio_taller_list->vehiculo->headerCellClass() ?>"><div id="elh_recordatorio_taller_vehiculo" class="recordatorio_taller_vehiculo"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->vehiculo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vehiculo" class="<?php echo $recordatorio_taller_list->vehiculo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->vehiculo) ?>', 1);"><div id="elh_recordatorio_taller_vehiculo" class="recordatorio_taller_vehiculo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->vehiculo->caption() ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->vehiculo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->vehiculo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recordatorio_taller_list->servicio->Visible) { // servicio ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->servicio) == "") { ?>
		<th data-name="servicio" class="<?php echo $recordatorio_taller_list->servicio->headerCellClass() ?>"><div id="elh_recordatorio_taller_servicio" class="recordatorio_taller_servicio"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="servicio" class="<?php echo $recordatorio_taller_list->servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->servicio) ?>', 1);"><div id="elh_recordatorio_taller_servicio" class="recordatorio_taller_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->servicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recordatorio_taller_list->frecuencia_km->Visible) { // frecuencia_km ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->frecuencia_km) == "") { ?>
		<th data-name="frecuencia_km" class="<?php echo $recordatorio_taller_list->frecuencia_km->headerCellClass() ?>"><div id="elh_recordatorio_taller_frecuencia_km" class="recordatorio_taller_frecuencia_km"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->frecuencia_km->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="frecuencia_km" class="<?php echo $recordatorio_taller_list->frecuencia_km->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->frecuencia_km) ?>', 1);"><div id="elh_recordatorio_taller_frecuencia_km" class="recordatorio_taller_frecuencia_km">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->frecuencia_km->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->frecuencia_km->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->frecuencia_km->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recordatorio_taller_list->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->frecuencia_tiempo) == "") { ?>
		<th data-name="frecuencia_tiempo" class="<?php echo $recordatorio_taller_list->frecuencia_tiempo->headerCellClass() ?>"><div id="elh_recordatorio_taller_frecuencia_tiempo" class="recordatorio_taller_frecuencia_tiempo"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->frecuencia_tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="frecuencia_tiempo" class="<?php echo $recordatorio_taller_list->frecuencia_tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->frecuencia_tiempo) ?>', 1);"><div id="elh_recordatorio_taller_frecuencia_tiempo" class="recordatorio_taller_frecuencia_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->frecuencia_tiempo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->frecuencia_tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->frecuencia_tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recordatorio_taller_list->anticipo_km->Visible) { // anticipo_km ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->anticipo_km) == "") { ?>
		<th data-name="anticipo_km" class="<?php echo $recordatorio_taller_list->anticipo_km->headerCellClass() ?>"><div id="elh_recordatorio_taller_anticipo_km" class="recordatorio_taller_anticipo_km"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->anticipo_km->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="anticipo_km" class="<?php echo $recordatorio_taller_list->anticipo_km->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->anticipo_km) ?>', 1);"><div id="elh_recordatorio_taller_anticipo_km" class="recordatorio_taller_anticipo_km">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->anticipo_km->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->anticipo_km->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->anticipo_km->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recordatorio_taller_list->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
	<?php if ($recordatorio_taller_list->SortUrl($recordatorio_taller_list->anticipo_tiempo) == "") { ?>
		<th data-name="anticipo_tiempo" class="<?php echo $recordatorio_taller_list->anticipo_tiempo->headerCellClass() ?>"><div id="elh_recordatorio_taller_anticipo_tiempo" class="recordatorio_taller_anticipo_tiempo"><div class="ew-table-header-caption"><?php echo $recordatorio_taller_list->anticipo_tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="anticipo_tiempo" class="<?php echo $recordatorio_taller_list->anticipo_tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $recordatorio_taller_list->SortUrl($recordatorio_taller_list->anticipo_tiempo) ?>', 1);"><div id="elh_recordatorio_taller_anticipo_tiempo" class="recordatorio_taller_anticipo_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recordatorio_taller_list->anticipo_tiempo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recordatorio_taller_list->anticipo_tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($recordatorio_taller_list->anticipo_tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$recordatorio_taller_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($recordatorio_taller_list->ExportAll && $recordatorio_taller_list->isExport()) {
	$recordatorio_taller_list->StopRecord = $recordatorio_taller_list->TotalRecords;
} else {

	// Set the last record to display
	if ($recordatorio_taller_list->TotalRecords > $recordatorio_taller_list->StartRecord + $recordatorio_taller_list->DisplayRecords - 1)
		$recordatorio_taller_list->StopRecord = $recordatorio_taller_list->StartRecord + $recordatorio_taller_list->DisplayRecords - 1;
	else
		$recordatorio_taller_list->StopRecord = $recordatorio_taller_list->TotalRecords;
}
$recordatorio_taller_list->RecordCount = $recordatorio_taller_list->StartRecord - 1;
if ($recordatorio_taller_list->Recordset && !$recordatorio_taller_list->Recordset->EOF) {
	$recordatorio_taller_list->Recordset->moveFirst();
	$selectLimit = $recordatorio_taller_list->UseSelectLimit;
	if (!$selectLimit && $recordatorio_taller_list->StartRecord > 1)
		$recordatorio_taller_list->Recordset->move($recordatorio_taller_list->StartRecord - 1);
} elseif (!$recordatorio_taller->AllowAddDeleteRow && $recordatorio_taller_list->StopRecord == 0) {
	$recordatorio_taller_list->StopRecord = $recordatorio_taller->GridAddRowCount;
}

// Initialize aggregate
$recordatorio_taller->RowType = ROWTYPE_AGGREGATEINIT;
$recordatorio_taller->resetAttributes();
$recordatorio_taller_list->renderRow();
while ($recordatorio_taller_list->RecordCount < $recordatorio_taller_list->StopRecord) {
	$recordatorio_taller_list->RecordCount++;
	if ($recordatorio_taller_list->RecordCount >= $recordatorio_taller_list->StartRecord) {
		$recordatorio_taller_list->RowCount++;

		// Set up key count
		$recordatorio_taller_list->KeyCount = $recordatorio_taller_list->RowIndex;

		// Init row class and style
		$recordatorio_taller->resetAttributes();
		$recordatorio_taller->CssClass = "";
		if ($recordatorio_taller_list->isGridAdd()) {
		} else {
			$recordatorio_taller_list->loadRowValues($recordatorio_taller_list->Recordset); // Load row values
		}
		$recordatorio_taller->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$recordatorio_taller->RowAttrs->merge(["data-rowindex" => $recordatorio_taller_list->RowCount, "id" => "r" . $recordatorio_taller_list->RowCount . "_recordatorio_taller", "data-rowtype" => $recordatorio_taller->RowType]);

		// Render row
		$recordatorio_taller_list->renderRow();

		// Render list options
		$recordatorio_taller_list->renderListOptions();
?>
	<tr <?php echo $recordatorio_taller->rowAttributes() ?>>
<?php

// Render list options (body, left)
$recordatorio_taller_list->ListOptions->render("body", "left", $recordatorio_taller_list->RowCount);
?>
	<?php if ($recordatorio_taller_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $recordatorio_taller_list->id->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_id">
<span<?php echo $recordatorio_taller_list->id->viewAttributes() ?>><?php echo $recordatorio_taller_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recordatorio_taller_list->vehiculo->Visible) { // vehiculo ?>
		<td data-name="vehiculo" <?php echo $recordatorio_taller_list->vehiculo->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_vehiculo">
<span<?php echo $recordatorio_taller_list->vehiculo->viewAttributes() ?>><?php echo $recordatorio_taller_list->vehiculo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recordatorio_taller_list->servicio->Visible) { // servicio ?>
		<td data-name="servicio" <?php echo $recordatorio_taller_list->servicio->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_servicio">
<span<?php echo $recordatorio_taller_list->servicio->viewAttributes() ?>><?php echo $recordatorio_taller_list->servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recordatorio_taller_list->frecuencia_km->Visible) { // frecuencia_km ?>
		<td data-name="frecuencia_km" <?php echo $recordatorio_taller_list->frecuencia_km->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_frecuencia_km">
<span<?php echo $recordatorio_taller_list->frecuencia_km->viewAttributes() ?>><?php echo $recordatorio_taller_list->frecuencia_km->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recordatorio_taller_list->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
		<td data-name="frecuencia_tiempo" <?php echo $recordatorio_taller_list->frecuencia_tiempo->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_frecuencia_tiempo">
<span<?php echo $recordatorio_taller_list->frecuencia_tiempo->viewAttributes() ?>><?php echo $recordatorio_taller_list->frecuencia_tiempo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recordatorio_taller_list->anticipo_km->Visible) { // anticipo_km ?>
		<td data-name="anticipo_km" <?php echo $recordatorio_taller_list->anticipo_km->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_anticipo_km">
<span<?php echo $recordatorio_taller_list->anticipo_km->viewAttributes() ?>><?php echo $recordatorio_taller_list->anticipo_km->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recordatorio_taller_list->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
		<td data-name="anticipo_tiempo" <?php echo $recordatorio_taller_list->anticipo_tiempo->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_list->RowCount ?>_recordatorio_taller_anticipo_tiempo">
<span<?php echo $recordatorio_taller_list->anticipo_tiempo->viewAttributes() ?>><?php echo $recordatorio_taller_list->anticipo_tiempo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$recordatorio_taller_list->ListOptions->render("body", "right", $recordatorio_taller_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$recordatorio_taller_list->isGridAdd())
		$recordatorio_taller_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$recordatorio_taller->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($recordatorio_taller_list->Recordset)
	$recordatorio_taller_list->Recordset->Close();
?>
<?php if (!$recordatorio_taller_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$recordatorio_taller_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $recordatorio_taller_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recordatorio_taller_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($recordatorio_taller_list->TotalRecords == 0 && !$recordatorio_taller->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $recordatorio_taller_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$recordatorio_taller_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$recordatorio_taller_list->isExport()) { ?>
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
$recordatorio_taller_list->terminate();
?>