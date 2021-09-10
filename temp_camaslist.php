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
$temp_camas_list = new temp_camas_list();

// Run the page
$temp_camas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$temp_camas_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$temp_camas_list->isExport()) { ?>
<script>
var ftemp_camaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftemp_camaslist = currentForm = new ew.Form("ftemp_camaslist", "list");
	ftemp_camaslist.formKeyCountName = '<?php echo $temp_camas_list->FormKeyCountName ?>';
	loadjs.done("ftemp_camaslist");
});
var ftemp_camaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftemp_camaslistsrch = currentSearchForm = new ew.Form("ftemp_camaslistsrch");

	// Dynamic selection lists
	// Filters

	ftemp_camaslistsrch.filterList = <?php echo $temp_camas_list->getFilterList() ?>;
	loadjs.done("ftemp_camaslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$temp_camas_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($temp_camas_list->TotalRecords > 0 && $temp_camas_list->ExportOptions->visible()) { ?>
<?php $temp_camas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($temp_camas_list->ImportOptions->visible()) { ?>
<?php $temp_camas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($temp_camas_list->SearchOptions->visible()) { ?>
<?php $temp_camas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($temp_camas_list->FilterOptions->visible()) { ?>
<?php $temp_camas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$temp_camas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$temp_camas_list->isExport() && !$temp_camas->CurrentAction) { ?>
<form name="ftemp_camaslistsrch" id="ftemp_camaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftemp_camaslistsrch-search-panel" class="<?php echo $temp_camas_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="temp_camas">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $temp_camas_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($temp_camas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($temp_camas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $temp_camas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($temp_camas_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($temp_camas_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($temp_camas_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($temp_camas_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $temp_camas_list->showPageHeader(); ?>
<?php
$temp_camas_list->showMessage();
?>
<?php if ($temp_camas_list->TotalRecords > 0 || $temp_camas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($temp_camas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> temp_camas">
<?php if (!$temp_camas_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$temp_camas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $temp_camas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $temp_camas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftemp_camaslist" id="ftemp_camaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="temp_camas">
<div id="gmp_temp_camas" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($temp_camas_list->TotalRecords > 0 || $temp_camas_list->isGridEdit()) { ?>
<table id="tbl_temp_camaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$temp_camas->RowType = ROWTYPE_HEADER;

// Render list options
$temp_camas_list->renderListOptions();

// Render list options (header, left)
$temp_camas_list->ListOptions->render("header", "left");
?>
<?php if ($temp_camas_list->id_hospital->Visible) { // id_hospital ?>
	<?php if ($temp_camas_list->SortUrl($temp_camas_list->id_hospital) == "") { ?>
		<th data-name="id_hospital" class="<?php echo $temp_camas_list->id_hospital->headerCellClass() ?>"><div id="elh_temp_camas_id_hospital" class="temp_camas_id_hospital"><div class="ew-table-header-caption"><?php echo $temp_camas_list->id_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hospital" class="<?php echo $temp_camas_list->id_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $temp_camas_list->SortUrl($temp_camas_list->id_hospital) ?>', 1);"><div id="elh_temp_camas_id_hospital" class="temp_camas_id_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $temp_camas_list->id_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($temp_camas_list->id_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($temp_camas_list->id_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($temp_camas_list->hospital->Visible) { // hospital ?>
	<?php if ($temp_camas_list->SortUrl($temp_camas_list->hospital) == "") { ?>
		<th data-name="hospital" class="<?php echo $temp_camas_list->hospital->headerCellClass() ?>"><div id="elh_temp_camas_hospital" class="temp_camas_hospital"><div class="ew-table-header-caption"><?php echo $temp_camas_list->hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital" class="<?php echo $temp_camas_list->hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $temp_camas_list->SortUrl($temp_camas_list->hospital) ?>', 1);"><div id="elh_temp_camas_hospital" class="temp_camas_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $temp_camas_list->hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($temp_camas_list->hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($temp_camas_list->hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($temp_camas_list->camas_disp->Visible) { // camas_disp ?>
	<?php if ($temp_camas_list->SortUrl($temp_camas_list->camas_disp) == "") { ?>
		<th data-name="camas_disp" class="<?php echo $temp_camas_list->camas_disp->headerCellClass() ?>"><div id="elh_temp_camas_camas_disp" class="temp_camas_camas_disp"><div class="ew-table-header-caption"><?php echo $temp_camas_list->camas_disp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_disp" class="<?php echo $temp_camas_list->camas_disp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $temp_camas_list->SortUrl($temp_camas_list->camas_disp) ?>', 1);"><div id="elh_temp_camas_camas_disp" class="temp_camas_camas_disp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $temp_camas_list->camas_disp->caption() ?></span><span class="ew-table-header-sort"><?php if ($temp_camas_list->camas_disp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($temp_camas_list->camas_disp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($temp_camas_list->camas_uso->Visible) { // camas_uso ?>
	<?php if ($temp_camas_list->SortUrl($temp_camas_list->camas_uso) == "") { ?>
		<th data-name="camas_uso" class="<?php echo $temp_camas_list->camas_uso->headerCellClass() ?>"><div id="elh_temp_camas_camas_uso" class="temp_camas_camas_uso"><div class="ew-table-header-caption"><?php echo $temp_camas_list->camas_uso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_uso" class="<?php echo $temp_camas_list->camas_uso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $temp_camas_list->SortUrl($temp_camas_list->camas_uso) ?>', 1);"><div id="elh_temp_camas_camas_uso" class="temp_camas_camas_uso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $temp_camas_list->camas_uso->caption() ?></span><span class="ew-table-header-sort"><?php if ($temp_camas_list->camas_uso->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($temp_camas_list->camas_uso->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($temp_camas_list->camas_total->Visible) { // camas_total ?>
	<?php if ($temp_camas_list->SortUrl($temp_camas_list->camas_total) == "") { ?>
		<th data-name="camas_total" class="<?php echo $temp_camas_list->camas_total->headerCellClass() ?>"><div id="elh_temp_camas_camas_total" class="temp_camas_camas_total"><div class="ew-table-header-caption"><?php echo $temp_camas_list->camas_total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_total" class="<?php echo $temp_camas_list->camas_total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $temp_camas_list->SortUrl($temp_camas_list->camas_total) ?>', 1);"><div id="elh_temp_camas_camas_total" class="temp_camas_camas_total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $temp_camas_list->camas_total->caption() ?></span><span class="ew-table-header-sort"><?php if ($temp_camas_list->camas_total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($temp_camas_list->camas_total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($temp_camas_list->fecha_reporte->Visible) { // fecha_reporte ?>
	<?php if ($temp_camas_list->SortUrl($temp_camas_list->fecha_reporte) == "") { ?>
		<th data-name="fecha_reporte" class="<?php echo $temp_camas_list->fecha_reporte->headerCellClass() ?>"><div id="elh_temp_camas_fecha_reporte" class="temp_camas_fecha_reporte"><div class="ew-table-header-caption"><?php echo $temp_camas_list->fecha_reporte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_reporte" class="<?php echo $temp_camas_list->fecha_reporte->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $temp_camas_list->SortUrl($temp_camas_list->fecha_reporte) ?>', 1);"><div id="elh_temp_camas_fecha_reporte" class="temp_camas_fecha_reporte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $temp_camas_list->fecha_reporte->caption() ?></span><span class="ew-table-header-sort"><?php if ($temp_camas_list->fecha_reporte->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($temp_camas_list->fecha_reporte->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$temp_camas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($temp_camas_list->ExportAll && $temp_camas_list->isExport()) {
	$temp_camas_list->StopRecord = $temp_camas_list->TotalRecords;
} else {

	// Set the last record to display
	if ($temp_camas_list->TotalRecords > $temp_camas_list->StartRecord + $temp_camas_list->DisplayRecords - 1)
		$temp_camas_list->StopRecord = $temp_camas_list->StartRecord + $temp_camas_list->DisplayRecords - 1;
	else
		$temp_camas_list->StopRecord = $temp_camas_list->TotalRecords;
}
$temp_camas_list->RecordCount = $temp_camas_list->StartRecord - 1;
if ($temp_camas_list->Recordset && !$temp_camas_list->Recordset->EOF) {
	$temp_camas_list->Recordset->moveFirst();
	$selectLimit = $temp_camas_list->UseSelectLimit;
	if (!$selectLimit && $temp_camas_list->StartRecord > 1)
		$temp_camas_list->Recordset->move($temp_camas_list->StartRecord - 1);
} elseif (!$temp_camas->AllowAddDeleteRow && $temp_camas_list->StopRecord == 0) {
	$temp_camas_list->StopRecord = $temp_camas->GridAddRowCount;
}

// Initialize aggregate
$temp_camas->RowType = ROWTYPE_AGGREGATEINIT;
$temp_camas->resetAttributes();
$temp_camas_list->renderRow();
while ($temp_camas_list->RecordCount < $temp_camas_list->StopRecord) {
	$temp_camas_list->RecordCount++;
	if ($temp_camas_list->RecordCount >= $temp_camas_list->StartRecord) {
		$temp_camas_list->RowCount++;

		// Set up key count
		$temp_camas_list->KeyCount = $temp_camas_list->RowIndex;

		// Init row class and style
		$temp_camas->resetAttributes();
		$temp_camas->CssClass = "";
		if ($temp_camas_list->isGridAdd()) {
		} else {
			$temp_camas_list->loadRowValues($temp_camas_list->Recordset); // Load row values
		}
		$temp_camas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$temp_camas->RowAttrs->merge(["data-rowindex" => $temp_camas_list->RowCount, "id" => "r" . $temp_camas_list->RowCount . "_temp_camas", "data-rowtype" => $temp_camas->RowType]);

		// Render row
		$temp_camas_list->renderRow();

		// Render list options
		$temp_camas_list->renderListOptions();
?>
	<tr <?php echo $temp_camas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$temp_camas_list->ListOptions->render("body", "left", $temp_camas_list->RowCount);
?>
	<?php if ($temp_camas_list->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital" <?php echo $temp_camas_list->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $temp_camas_list->RowCount ?>_temp_camas_id_hospital">
<span<?php echo $temp_camas_list->id_hospital->viewAttributes() ?>><?php echo $temp_camas_list->id_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($temp_camas_list->hospital->Visible) { // hospital ?>
		<td data-name="hospital" <?php echo $temp_camas_list->hospital->cellAttributes() ?>>
<span id="el<?php echo $temp_camas_list->RowCount ?>_temp_camas_hospital">
<span<?php echo $temp_camas_list->hospital->viewAttributes() ?>><?php echo $temp_camas_list->hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($temp_camas_list->camas_disp->Visible) { // camas_disp ?>
		<td data-name="camas_disp" <?php echo $temp_camas_list->camas_disp->cellAttributes() ?>>
<span id="el<?php echo $temp_camas_list->RowCount ?>_temp_camas_camas_disp">
<span<?php echo $temp_camas_list->camas_disp->viewAttributes() ?>><?php echo $temp_camas_list->camas_disp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($temp_camas_list->camas_uso->Visible) { // camas_uso ?>
		<td data-name="camas_uso" <?php echo $temp_camas_list->camas_uso->cellAttributes() ?>>
<span id="el<?php echo $temp_camas_list->RowCount ?>_temp_camas_camas_uso">
<span<?php echo $temp_camas_list->camas_uso->viewAttributes() ?>><?php echo $temp_camas_list->camas_uso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($temp_camas_list->camas_total->Visible) { // camas_total ?>
		<td data-name="camas_total" <?php echo $temp_camas_list->camas_total->cellAttributes() ?>>
<span id="el<?php echo $temp_camas_list->RowCount ?>_temp_camas_camas_total">
<span<?php echo $temp_camas_list->camas_total->viewAttributes() ?>><?php echo $temp_camas_list->camas_total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($temp_camas_list->fecha_reporte->Visible) { // fecha_reporte ?>
		<td data-name="fecha_reporte" <?php echo $temp_camas_list->fecha_reporte->cellAttributes() ?>>
<span id="el<?php echo $temp_camas_list->RowCount ?>_temp_camas_fecha_reporte">
<span<?php echo $temp_camas_list->fecha_reporte->viewAttributes() ?>><?php echo $temp_camas_list->fecha_reporte->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$temp_camas_list->ListOptions->render("body", "right", $temp_camas_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$temp_camas_list->isGridAdd())
		$temp_camas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$temp_camas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($temp_camas_list->Recordset)
	$temp_camas_list->Recordset->Close();
?>
<?php if (!$temp_camas_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$temp_camas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $temp_camas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $temp_camas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($temp_camas_list->TotalRecords == 0 && !$temp_camas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $temp_camas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$temp_camas_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$temp_camas_list->isExport()) { ?>
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
$temp_camas_list->terminate();
?>