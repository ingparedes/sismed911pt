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
$sector_hospital_list = new sector_hospital_list();

// Run the page
$sector_hospital_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sector_hospital_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sector_hospital_list->isExport()) { ?>
<script>
var fsector_hospitallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsector_hospitallist = currentForm = new ew.Form("fsector_hospitallist", "list");
	fsector_hospitallist.formKeyCountName = '<?php echo $sector_hospital_list->FormKeyCountName ?>';
	loadjs.done("fsector_hospitallist");
});
var fsector_hospitallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsector_hospitallistsrch = currentSearchForm = new ew.Form("fsector_hospitallistsrch");

	// Dynamic selection lists
	// Filters

	fsector_hospitallistsrch.filterList = <?php echo $sector_hospital_list->getFilterList() ?>;
	loadjs.done("fsector_hospitallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sector_hospital_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sector_hospital_list->TotalRecords > 0 && $sector_hospital_list->ExportOptions->visible()) { ?>
<?php $sector_hospital_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sector_hospital_list->ImportOptions->visible()) { ?>
<?php $sector_hospital_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sector_hospital_list->SearchOptions->visible()) { ?>
<?php $sector_hospital_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sector_hospital_list->FilterOptions->visible()) { ?>
<?php $sector_hospital_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sector_hospital_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sector_hospital_list->isExport() && !$sector_hospital->CurrentAction) { ?>
<form name="fsector_hospitallistsrch" id="fsector_hospitallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsector_hospitallistsrch-search-panel" class="<?php echo $sector_hospital_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sector_hospital">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sector_hospital_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sector_hospital_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sector_hospital_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sector_hospital_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sector_hospital_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sector_hospital_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sector_hospital_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sector_hospital_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sector_hospital_list->showPageHeader(); ?>
<?php
$sector_hospital_list->showMessage();
?>
<?php if ($sector_hospital_list->TotalRecords > 0 || $sector_hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sector_hospital_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sector_hospital">
<?php if (!$sector_hospital_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sector_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sector_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sector_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsector_hospitallist" id="fsector_hospitallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sector_hospital">
<div id="gmp_sector_hospital" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sector_hospital_list->TotalRecords > 0 || $sector_hospital_list->isGridEdit()) { ?>
<table id="tbl_sector_hospitallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sector_hospital->RowType = ROWTYPE_HEADER;

// Render list options
$sector_hospital_list->renderListOptions();

// Render list options (header, left)
$sector_hospital_list->ListOptions->render("header", "left");
?>
<?php if ($sector_hospital_list->id_sector->Visible) { // id_sector ?>
	<?php if ($sector_hospital_list->SortUrl($sector_hospital_list->id_sector) == "") { ?>
		<th data-name="id_sector" class="<?php echo $sector_hospital_list->id_sector->headerCellClass() ?>"><div id="elh_sector_hospital_id_sector" class="sector_hospital_id_sector"><div class="ew-table-header-caption"><?php echo $sector_hospital_list->id_sector->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_sector" class="<?php echo $sector_hospital_list->id_sector->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sector_hospital_list->SortUrl($sector_hospital_list->id_sector) ?>', 1);"><div id="elh_sector_hospital_id_sector" class="sector_hospital_id_sector">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sector_hospital_list->id_sector->caption() ?></span><span class="ew-table-header-sort"><?php if ($sector_hospital_list->id_sector->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sector_hospital_list->id_sector->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sector_hospital_list->nombre_sector->Visible) { // nombre_sector ?>
	<?php if ($sector_hospital_list->SortUrl($sector_hospital_list->nombre_sector) == "") { ?>
		<th data-name="nombre_sector" class="<?php echo $sector_hospital_list->nombre_sector->headerCellClass() ?>"><div id="elh_sector_hospital_nombre_sector" class="sector_hospital_nombre_sector"><div class="ew-table-header-caption"><?php echo $sector_hospital_list->nombre_sector->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_sector" class="<?php echo $sector_hospital_list->nombre_sector->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sector_hospital_list->SortUrl($sector_hospital_list->nombre_sector) ?>', 1);"><div id="elh_sector_hospital_nombre_sector" class="sector_hospital_nombre_sector">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sector_hospital_list->nombre_sector->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sector_hospital_list->nombre_sector->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sector_hospital_list->nombre_sector->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sector_hospital_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sector_hospital_list->ExportAll && $sector_hospital_list->isExport()) {
	$sector_hospital_list->StopRecord = $sector_hospital_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sector_hospital_list->TotalRecords > $sector_hospital_list->StartRecord + $sector_hospital_list->DisplayRecords - 1)
		$sector_hospital_list->StopRecord = $sector_hospital_list->StartRecord + $sector_hospital_list->DisplayRecords - 1;
	else
		$sector_hospital_list->StopRecord = $sector_hospital_list->TotalRecords;
}
$sector_hospital_list->RecordCount = $sector_hospital_list->StartRecord - 1;
if ($sector_hospital_list->Recordset && !$sector_hospital_list->Recordset->EOF) {
	$sector_hospital_list->Recordset->moveFirst();
	$selectLimit = $sector_hospital_list->UseSelectLimit;
	if (!$selectLimit && $sector_hospital_list->StartRecord > 1)
		$sector_hospital_list->Recordset->move($sector_hospital_list->StartRecord - 1);
} elseif (!$sector_hospital->AllowAddDeleteRow && $sector_hospital_list->StopRecord == 0) {
	$sector_hospital_list->StopRecord = $sector_hospital->GridAddRowCount;
}

// Initialize aggregate
$sector_hospital->RowType = ROWTYPE_AGGREGATEINIT;
$sector_hospital->resetAttributes();
$sector_hospital_list->renderRow();
while ($sector_hospital_list->RecordCount < $sector_hospital_list->StopRecord) {
	$sector_hospital_list->RecordCount++;
	if ($sector_hospital_list->RecordCount >= $sector_hospital_list->StartRecord) {
		$sector_hospital_list->RowCount++;

		// Set up key count
		$sector_hospital_list->KeyCount = $sector_hospital_list->RowIndex;

		// Init row class and style
		$sector_hospital->resetAttributes();
		$sector_hospital->CssClass = "";
		if ($sector_hospital_list->isGridAdd()) {
		} else {
			$sector_hospital_list->loadRowValues($sector_hospital_list->Recordset); // Load row values
		}
		$sector_hospital->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sector_hospital->RowAttrs->merge(["data-rowindex" => $sector_hospital_list->RowCount, "id" => "r" . $sector_hospital_list->RowCount . "_sector_hospital", "data-rowtype" => $sector_hospital->RowType]);

		// Render row
		$sector_hospital_list->renderRow();

		// Render list options
		$sector_hospital_list->renderListOptions();
?>
	<tr <?php echo $sector_hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sector_hospital_list->ListOptions->render("body", "left", $sector_hospital_list->RowCount);
?>
	<?php if ($sector_hospital_list->id_sector->Visible) { // id_sector ?>
		<td data-name="id_sector" <?php echo $sector_hospital_list->id_sector->cellAttributes() ?>>
<span id="el<?php echo $sector_hospital_list->RowCount ?>_sector_hospital_id_sector">
<span<?php echo $sector_hospital_list->id_sector->viewAttributes() ?>><?php echo $sector_hospital_list->id_sector->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sector_hospital_list->nombre_sector->Visible) { // nombre_sector ?>
		<td data-name="nombre_sector" <?php echo $sector_hospital_list->nombre_sector->cellAttributes() ?>>
<span id="el<?php echo $sector_hospital_list->RowCount ?>_sector_hospital_nombre_sector">
<span<?php echo $sector_hospital_list->nombre_sector->viewAttributes() ?>><?php echo $sector_hospital_list->nombre_sector->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sector_hospital_list->ListOptions->render("body", "right", $sector_hospital_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sector_hospital_list->isGridAdd())
		$sector_hospital_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sector_hospital->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sector_hospital_list->Recordset)
	$sector_hospital_list->Recordset->Close();
?>
<?php if (!$sector_hospital_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sector_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sector_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sector_hospital_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sector_hospital_list->TotalRecords == 0 && !$sector_hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sector_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sector_hospital_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sector_hospital_list->isExport()) { ?>
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
$sector_hospital_list->terminate();
?>