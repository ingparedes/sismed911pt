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
$division_hosp_list = new division_hosp_list();

// Run the page
$division_hosp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$division_hosp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$division_hosp_list->isExport()) { ?>
<script>
var fdivision_hosplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdivision_hosplist = currentForm = new ew.Form("fdivision_hosplist", "list");
	fdivision_hosplist.formKeyCountName = '<?php echo $division_hosp_list->FormKeyCountName ?>';
	loadjs.done("fdivision_hosplist");
});
var fdivision_hosplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdivision_hosplistsrch = currentSearchForm = new ew.Form("fdivision_hosplistsrch");

	// Dynamic selection lists
	// Filters

	fdivision_hosplistsrch.filterList = <?php echo $division_hosp_list->getFilterList() ?>;
	loadjs.done("fdivision_hosplistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$division_hosp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($division_hosp_list->TotalRecords > 0 && $division_hosp_list->ExportOptions->visible()) { ?>
<?php $division_hosp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($division_hosp_list->ImportOptions->visible()) { ?>
<?php $division_hosp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($division_hosp_list->SearchOptions->visible()) { ?>
<?php $division_hosp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($division_hosp_list->FilterOptions->visible()) { ?>
<?php $division_hosp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$division_hosp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$division_hosp_list->isExport() && !$division_hosp->CurrentAction) { ?>
<form name="fdivision_hosplistsrch" id="fdivision_hosplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdivision_hosplistsrch-search-panel" class="<?php echo $division_hosp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="division_hosp">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $division_hosp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($division_hosp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($division_hosp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $division_hosp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($division_hosp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($division_hosp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($division_hosp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($division_hosp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $division_hosp_list->showPageHeader(); ?>
<?php
$division_hosp_list->showMessage();
?>
<?php if ($division_hosp_list->TotalRecords > 0 || $division_hosp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($division_hosp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> division_hosp">
<?php if (!$division_hosp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$division_hosp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $division_hosp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $division_hosp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdivision_hosplist" id="fdivision_hosplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="division_hosp">
<div id="gmp_division_hosp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($division_hosp_list->TotalRecords > 0 || $division_hosp_list->isGridEdit()) { ?>
<table id="tbl_division_hosplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$division_hosp->RowType = ROWTYPE_HEADER;

// Render list options
$division_hosp_list->renderListOptions();

// Render list options (header, left)
$division_hosp_list->ListOptions->render("header", "left");
?>
<?php if ($division_hosp_list->descripcion->Visible) { // descripcion ?>
	<?php if ($division_hosp_list->SortUrl($division_hosp_list->descripcion) == "") { ?>
		<th data-name="descripcion" class="<?php echo $division_hosp_list->descripcion->headerCellClass() ?>"><div id="elh_division_hosp_descripcion" class="division_hosp_descripcion"><div class="ew-table-header-caption"><?php echo $division_hosp_list->descripcion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion" class="<?php echo $division_hosp_list->descripcion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $division_hosp_list->SortUrl($division_hosp_list->descripcion) ?>', 1);"><div id="elh_division_hosp_descripcion" class="division_hosp_descripcion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $division_hosp_list->descripcion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($division_hosp_list->descripcion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($division_hosp_list->descripcion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($division_hosp_list->id_servicio->Visible) { // id_servicio ?>
	<?php if ($division_hosp_list->SortUrl($division_hosp_list->id_servicio) == "") { ?>
		<th data-name="id_servicio" class="<?php echo $division_hosp_list->id_servicio->headerCellClass() ?>"><div id="elh_division_hosp_id_servicio" class="division_hosp_id_servicio"><div class="ew-table-header-caption"><?php echo $division_hosp_list->id_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_servicio" class="<?php echo $division_hosp_list->id_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $division_hosp_list->SortUrl($division_hosp_list->id_servicio) ?>', 1);"><div id="elh_division_hosp_id_servicio" class="division_hosp_id_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $division_hosp_list->id_servicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($division_hosp_list->id_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($division_hosp_list->id_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($division_hosp_list->bloque->Visible) { // bloque ?>
	<?php if ($division_hosp_list->SortUrl($division_hosp_list->bloque) == "") { ?>
		<th data-name="bloque" class="<?php echo $division_hosp_list->bloque->headerCellClass() ?>"><div id="elh_division_hosp_bloque" class="division_hosp_bloque"><div class="ew-table-header-caption"><?php echo $division_hosp_list->bloque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloque" class="<?php echo $division_hosp_list->bloque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $division_hosp_list->SortUrl($division_hosp_list->bloque) ?>', 1);"><div id="elh_division_hosp_bloque" class="division_hosp_bloque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $division_hosp_list->bloque->caption() ?></span><span class="ew-table-header-sort"><?php if ($division_hosp_list->bloque->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($division_hosp_list->bloque->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($division_hosp_list->id_division->Visible) { // id_division ?>
	<?php if ($division_hosp_list->SortUrl($division_hosp_list->id_division) == "") { ?>
		<th data-name="id_division" class="<?php echo $division_hosp_list->id_division->headerCellClass() ?>"><div id="elh_division_hosp_id_division" class="division_hosp_id_division"><div class="ew-table-header-caption"><?php echo $division_hosp_list->id_division->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_division" class="<?php echo $division_hosp_list->id_division->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $division_hosp_list->SortUrl($division_hosp_list->id_division) ?>', 1);"><div id="elh_division_hosp_id_division" class="division_hosp_id_division">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $division_hosp_list->id_division->caption() ?></span><span class="ew-table-header-sort"><?php if ($division_hosp_list->id_division->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($division_hosp_list->id_division->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$division_hosp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($division_hosp_list->ExportAll && $division_hosp_list->isExport()) {
	$division_hosp_list->StopRecord = $division_hosp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($division_hosp_list->TotalRecords > $division_hosp_list->StartRecord + $division_hosp_list->DisplayRecords - 1)
		$division_hosp_list->StopRecord = $division_hosp_list->StartRecord + $division_hosp_list->DisplayRecords - 1;
	else
		$division_hosp_list->StopRecord = $division_hosp_list->TotalRecords;
}
$division_hosp_list->RecordCount = $division_hosp_list->StartRecord - 1;
if ($division_hosp_list->Recordset && !$division_hosp_list->Recordset->EOF) {
	$division_hosp_list->Recordset->moveFirst();
	$selectLimit = $division_hosp_list->UseSelectLimit;
	if (!$selectLimit && $division_hosp_list->StartRecord > 1)
		$division_hosp_list->Recordset->move($division_hosp_list->StartRecord - 1);
} elseif (!$division_hosp->AllowAddDeleteRow && $division_hosp_list->StopRecord == 0) {
	$division_hosp_list->StopRecord = $division_hosp->GridAddRowCount;
}

// Initialize aggregate
$division_hosp->RowType = ROWTYPE_AGGREGATEINIT;
$division_hosp->resetAttributes();
$division_hosp_list->renderRow();
while ($division_hosp_list->RecordCount < $division_hosp_list->StopRecord) {
	$division_hosp_list->RecordCount++;
	if ($division_hosp_list->RecordCount >= $division_hosp_list->StartRecord) {
		$division_hosp_list->RowCount++;

		// Set up key count
		$division_hosp_list->KeyCount = $division_hosp_list->RowIndex;

		// Init row class and style
		$division_hosp->resetAttributes();
		$division_hosp->CssClass = "";
		if ($division_hosp_list->isGridAdd()) {
		} else {
			$division_hosp_list->loadRowValues($division_hosp_list->Recordset); // Load row values
		}
		$division_hosp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$division_hosp->RowAttrs->merge(["data-rowindex" => $division_hosp_list->RowCount, "id" => "r" . $division_hosp_list->RowCount . "_division_hosp", "data-rowtype" => $division_hosp->RowType]);

		// Render row
		$division_hosp_list->renderRow();

		// Render list options
		$division_hosp_list->renderListOptions();
?>
	<tr <?php echo $division_hosp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$division_hosp_list->ListOptions->render("body", "left", $division_hosp_list->RowCount);
?>
	<?php if ($division_hosp_list->descripcion->Visible) { // descripcion ?>
		<td data-name="descripcion" <?php echo $division_hosp_list->descripcion->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_list->RowCount ?>_division_hosp_descripcion">
<span<?php echo $division_hosp_list->descripcion->viewAttributes() ?>><?php echo $division_hosp_list->descripcion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($division_hosp_list->id_servicio->Visible) { // id_servicio ?>
		<td data-name="id_servicio" <?php echo $division_hosp_list->id_servicio->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_list->RowCount ?>_division_hosp_id_servicio">
<span<?php echo $division_hosp_list->id_servicio->viewAttributes() ?>><?php echo $division_hosp_list->id_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($division_hosp_list->bloque->Visible) { // bloque ?>
		<td data-name="bloque" <?php echo $division_hosp_list->bloque->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_list->RowCount ?>_division_hosp_bloque">
<span<?php echo $division_hosp_list->bloque->viewAttributes() ?>><?php echo $division_hosp_list->bloque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($division_hosp_list->id_division->Visible) { // id_division ?>
		<td data-name="id_division" <?php echo $division_hosp_list->id_division->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_list->RowCount ?>_division_hosp_id_division">
<span<?php echo $division_hosp_list->id_division->viewAttributes() ?>><?php echo $division_hosp_list->id_division->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$division_hosp_list->ListOptions->render("body", "right", $division_hosp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$division_hosp_list->isGridAdd())
		$division_hosp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$division_hosp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($division_hosp_list->Recordset)
	$division_hosp_list->Recordset->Close();
?>
<?php if (!$division_hosp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$division_hosp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $division_hosp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $division_hosp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($division_hosp_list->TotalRecords == 0 && !$division_hosp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $division_hosp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$division_hosp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$division_hosp_list->isExport()) { ?>
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
$division_hosp_list->terminate();
?>