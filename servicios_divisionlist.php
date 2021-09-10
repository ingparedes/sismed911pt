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
$servicios_division_list = new servicios_division_list();

// Run the page
$servicios_division_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicios_division_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$servicios_division_list->isExport()) { ?>
<script>
var fservicios_divisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fservicios_divisionlist = currentForm = new ew.Form("fservicios_divisionlist", "list");
	fservicios_divisionlist.formKeyCountName = '<?php echo $servicios_division_list->FormKeyCountName ?>';
	loadjs.done("fservicios_divisionlist");
});
var fservicios_divisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fservicios_divisionlistsrch = currentSearchForm = new ew.Form("fservicios_divisionlistsrch");

	// Dynamic selection lists
	// Filters

	fservicios_divisionlistsrch.filterList = <?php echo $servicios_division_list->getFilterList() ?>;
	loadjs.done("fservicios_divisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$servicios_division_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($servicios_division_list->TotalRecords > 0 && $servicios_division_list->ExportOptions->visible()) { ?>
<?php $servicios_division_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($servicios_division_list->ImportOptions->visible()) { ?>
<?php $servicios_division_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($servicios_division_list->SearchOptions->visible()) { ?>
<?php $servicios_division_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($servicios_division_list->FilterOptions->visible()) { ?>
<?php $servicios_division_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$servicios_division_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$servicios_division_list->isExport() && !$servicios_division->CurrentAction) { ?>
<form name="fservicios_divisionlistsrch" id="fservicios_divisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fservicios_divisionlistsrch-search-panel" class="<?php echo $servicios_division_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="servicios_division">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $servicios_division_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($servicios_division_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($servicios_division_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $servicios_division_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($servicios_division_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($servicios_division_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($servicios_division_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($servicios_division_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $servicios_division_list->showPageHeader(); ?>
<?php
$servicios_division_list->showMessage();
?>
<?php if ($servicios_division_list->TotalRecords > 0 || $servicios_division->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($servicios_division_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> servicios_division">
<?php if (!$servicios_division_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$servicios_division_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $servicios_division_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $servicios_division_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fservicios_divisionlist" id="fservicios_divisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicios_division">
<div id="gmp_servicios_division" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($servicios_division_list->TotalRecords > 0 || $servicios_division_list->isGridEdit()) { ?>
<table id="tbl_servicios_divisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$servicios_division->RowType = ROWTYPE_HEADER;

// Render list options
$servicios_division_list->renderListOptions();

// Render list options (header, left)
$servicios_division_list->ListOptions->render("header", "left");
?>
<?php if ($servicios_division_list->nombre_servicio->Visible) { // nombre_servicio ?>
	<?php if ($servicios_division_list->SortUrl($servicios_division_list->nombre_servicio) == "") { ?>
		<th data-name="nombre_servicio" class="<?php echo $servicios_division_list->nombre_servicio->headerCellClass() ?>"><div id="elh_servicios_division_nombre_servicio" class="servicios_division_nombre_servicio"><div class="ew-table-header-caption"><?php echo $servicios_division_list->nombre_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_servicio" class="<?php echo $servicios_division_list->nombre_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicios_division_list->SortUrl($servicios_division_list->nombre_servicio) ?>', 1);"><div id="elh_servicios_division_nombre_servicio" class="servicios_division_nombre_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicios_division_list->nombre_servicio->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($servicios_division_list->nombre_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicios_division_list->nombre_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicios_division_list->id_servicio->Visible) { // id_servicio ?>
	<?php if ($servicios_division_list->SortUrl($servicios_division_list->id_servicio) == "") { ?>
		<th data-name="id_servicio" class="<?php echo $servicios_division_list->id_servicio->headerCellClass() ?>"><div id="elh_servicios_division_id_servicio" class="servicios_division_id_servicio"><div class="ew-table-header-caption"><?php echo $servicios_division_list->id_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_servicio" class="<?php echo $servicios_division_list->id_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicios_division_list->SortUrl($servicios_division_list->id_servicio) ?>', 1);"><div id="elh_servicios_division_id_servicio" class="servicios_division_id_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicios_division_list->id_servicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicios_division_list->id_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicios_division_list->id_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$servicios_division_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($servicios_division_list->ExportAll && $servicios_division_list->isExport()) {
	$servicios_division_list->StopRecord = $servicios_division_list->TotalRecords;
} else {

	// Set the last record to display
	if ($servicios_division_list->TotalRecords > $servicios_division_list->StartRecord + $servicios_division_list->DisplayRecords - 1)
		$servicios_division_list->StopRecord = $servicios_division_list->StartRecord + $servicios_division_list->DisplayRecords - 1;
	else
		$servicios_division_list->StopRecord = $servicios_division_list->TotalRecords;
}
$servicios_division_list->RecordCount = $servicios_division_list->StartRecord - 1;
if ($servicios_division_list->Recordset && !$servicios_division_list->Recordset->EOF) {
	$servicios_division_list->Recordset->moveFirst();
	$selectLimit = $servicios_division_list->UseSelectLimit;
	if (!$selectLimit && $servicios_division_list->StartRecord > 1)
		$servicios_division_list->Recordset->move($servicios_division_list->StartRecord - 1);
} elseif (!$servicios_division->AllowAddDeleteRow && $servicios_division_list->StopRecord == 0) {
	$servicios_division_list->StopRecord = $servicios_division->GridAddRowCount;
}

// Initialize aggregate
$servicios_division->RowType = ROWTYPE_AGGREGATEINIT;
$servicios_division->resetAttributes();
$servicios_division_list->renderRow();
while ($servicios_division_list->RecordCount < $servicios_division_list->StopRecord) {
	$servicios_division_list->RecordCount++;
	if ($servicios_division_list->RecordCount >= $servicios_division_list->StartRecord) {
		$servicios_division_list->RowCount++;

		// Set up key count
		$servicios_division_list->KeyCount = $servicios_division_list->RowIndex;

		// Init row class and style
		$servicios_division->resetAttributes();
		$servicios_division->CssClass = "";
		if ($servicios_division_list->isGridAdd()) {
		} else {
			$servicios_division_list->loadRowValues($servicios_division_list->Recordset); // Load row values
		}
		$servicios_division->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$servicios_division->RowAttrs->merge(["data-rowindex" => $servicios_division_list->RowCount, "id" => "r" . $servicios_division_list->RowCount . "_servicios_division", "data-rowtype" => $servicios_division->RowType]);

		// Render row
		$servicios_division_list->renderRow();

		// Render list options
		$servicios_division_list->renderListOptions();
?>
	<tr <?php echo $servicios_division->rowAttributes() ?>>
<?php

// Render list options (body, left)
$servicios_division_list->ListOptions->render("body", "left", $servicios_division_list->RowCount);
?>
	<?php if ($servicios_division_list->nombre_servicio->Visible) { // nombre_servicio ?>
		<td data-name="nombre_servicio" <?php echo $servicios_division_list->nombre_servicio->cellAttributes() ?>>
<span id="el<?php echo $servicios_division_list->RowCount ?>_servicios_division_nombre_servicio">
<span<?php echo $servicios_division_list->nombre_servicio->viewAttributes() ?>><?php echo $servicios_division_list->nombre_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicios_division_list->id_servicio->Visible) { // id_servicio ?>
		<td data-name="id_servicio" <?php echo $servicios_division_list->id_servicio->cellAttributes() ?>>
<span id="el<?php echo $servicios_division_list->RowCount ?>_servicios_division_id_servicio">
<span<?php echo $servicios_division_list->id_servicio->viewAttributes() ?>><?php echo $servicios_division_list->id_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$servicios_division_list->ListOptions->render("body", "right", $servicios_division_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$servicios_division_list->isGridAdd())
		$servicios_division_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$servicios_division->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($servicios_division_list->Recordset)
	$servicios_division_list->Recordset->Close();
?>
<?php if (!$servicios_division_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$servicios_division_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $servicios_division_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $servicios_division_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($servicios_division_list->TotalRecords == 0 && !$servicios_division->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $servicios_division_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$servicios_division_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$servicios_division_list->isExport()) { ?>
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
$servicios_division_list->terminate();
?>