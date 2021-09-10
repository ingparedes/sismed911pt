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
$sede_sismed_list = new sede_sismed_list();

// Run the page
$sede_sismed_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sede_sismed_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sede_sismed_list->isExport()) { ?>
<script>
var fsede_sismedlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsede_sismedlist = currentForm = new ew.Form("fsede_sismedlist", "list");
	fsede_sismedlist.formKeyCountName = '<?php echo $sede_sismed_list->FormKeyCountName ?>';
	loadjs.done("fsede_sismedlist");
});
var fsede_sismedlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsede_sismedlistsrch = currentSearchForm = new ew.Form("fsede_sismedlistsrch");

	// Dynamic selection lists
	// Filters

	fsede_sismedlistsrch.filterList = <?php echo $sede_sismed_list->getFilterList() ?>;
	loadjs.done("fsede_sismedlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sede_sismed_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sede_sismed_list->TotalRecords > 0 && $sede_sismed_list->ExportOptions->visible()) { ?>
<?php $sede_sismed_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sede_sismed_list->ImportOptions->visible()) { ?>
<?php $sede_sismed_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sede_sismed_list->SearchOptions->visible()) { ?>
<?php $sede_sismed_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sede_sismed_list->FilterOptions->visible()) { ?>
<?php $sede_sismed_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sede_sismed_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sede_sismed_list->isExport() && !$sede_sismed->CurrentAction) { ?>
<form name="fsede_sismedlistsrch" id="fsede_sismedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsede_sismedlistsrch-search-panel" class="<?php echo $sede_sismed_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sede_sismed">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sede_sismed_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sede_sismed_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sede_sismed_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sede_sismed_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sede_sismed_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sede_sismed_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sede_sismed_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sede_sismed_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sede_sismed_list->showPageHeader(); ?>
<?php
$sede_sismed_list->showMessage();
?>
<?php if ($sede_sismed_list->TotalRecords > 0 || $sede_sismed->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sede_sismed_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sede_sismed">
<?php if (!$sede_sismed_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sede_sismed_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sede_sismed_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sede_sismed_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsede_sismedlist" id="fsede_sismedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sede_sismed">
<div id="gmp_sede_sismed" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sede_sismed_list->TotalRecords > 0 || $sede_sismed_list->isGridEdit()) { ?>
<table id="tbl_sede_sismedlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sede_sismed->RowType = ROWTYPE_HEADER;

// Render list options
$sede_sismed_list->renderListOptions();

// Render list options (header, left)
$sede_sismed_list->ListOptions->render("header", "left");
?>
<?php if ($sede_sismed_list->id_sede->Visible) { // id_sede ?>
	<?php if ($sede_sismed_list->SortUrl($sede_sismed_list->id_sede) == "") { ?>
		<th data-name="id_sede" class="<?php echo $sede_sismed_list->id_sede->headerCellClass() ?>"><div id="elh_sede_sismed_id_sede" class="sede_sismed_id_sede"><div class="ew-table-header-caption"><?php echo $sede_sismed_list->id_sede->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_sede" class="<?php echo $sede_sismed_list->id_sede->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sede_sismed_list->SortUrl($sede_sismed_list->id_sede) ?>', 1);"><div id="elh_sede_sismed_id_sede" class="sede_sismed_id_sede">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sede_sismed_list->id_sede->caption() ?></span><span class="ew-table-header-sort"><?php if ($sede_sismed_list->id_sede->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sede_sismed_list->id_sede->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sede_sismed_list->nombre_sede->Visible) { // nombre_sede ?>
	<?php if ($sede_sismed_list->SortUrl($sede_sismed_list->nombre_sede) == "") { ?>
		<th data-name="nombre_sede" class="<?php echo $sede_sismed_list->nombre_sede->headerCellClass() ?>"><div id="elh_sede_sismed_nombre_sede" class="sede_sismed_nombre_sede"><div class="ew-table-header-caption"><?php echo $sede_sismed_list->nombre_sede->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_sede" class="<?php echo $sede_sismed_list->nombre_sede->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sede_sismed_list->SortUrl($sede_sismed_list->nombre_sede) ?>', 1);"><div id="elh_sede_sismed_nombre_sede" class="sede_sismed_nombre_sede">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sede_sismed_list->nombre_sede->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sede_sismed_list->nombre_sede->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sede_sismed_list->nombre_sede->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sede_sismed_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sede_sismed_list->ExportAll && $sede_sismed_list->isExport()) {
	$sede_sismed_list->StopRecord = $sede_sismed_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sede_sismed_list->TotalRecords > $sede_sismed_list->StartRecord + $sede_sismed_list->DisplayRecords - 1)
		$sede_sismed_list->StopRecord = $sede_sismed_list->StartRecord + $sede_sismed_list->DisplayRecords - 1;
	else
		$sede_sismed_list->StopRecord = $sede_sismed_list->TotalRecords;
}
$sede_sismed_list->RecordCount = $sede_sismed_list->StartRecord - 1;
if ($sede_sismed_list->Recordset && !$sede_sismed_list->Recordset->EOF) {
	$sede_sismed_list->Recordset->moveFirst();
	$selectLimit = $sede_sismed_list->UseSelectLimit;
	if (!$selectLimit && $sede_sismed_list->StartRecord > 1)
		$sede_sismed_list->Recordset->move($sede_sismed_list->StartRecord - 1);
} elseif (!$sede_sismed->AllowAddDeleteRow && $sede_sismed_list->StopRecord == 0) {
	$sede_sismed_list->StopRecord = $sede_sismed->GridAddRowCount;
}

// Initialize aggregate
$sede_sismed->RowType = ROWTYPE_AGGREGATEINIT;
$sede_sismed->resetAttributes();
$sede_sismed_list->renderRow();
while ($sede_sismed_list->RecordCount < $sede_sismed_list->StopRecord) {
	$sede_sismed_list->RecordCount++;
	if ($sede_sismed_list->RecordCount >= $sede_sismed_list->StartRecord) {
		$sede_sismed_list->RowCount++;

		// Set up key count
		$sede_sismed_list->KeyCount = $sede_sismed_list->RowIndex;

		// Init row class and style
		$sede_sismed->resetAttributes();
		$sede_sismed->CssClass = "";
		if ($sede_sismed_list->isGridAdd()) {
		} else {
			$sede_sismed_list->loadRowValues($sede_sismed_list->Recordset); // Load row values
		}
		$sede_sismed->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sede_sismed->RowAttrs->merge(["data-rowindex" => $sede_sismed_list->RowCount, "id" => "r" . $sede_sismed_list->RowCount . "_sede_sismed", "data-rowtype" => $sede_sismed->RowType]);

		// Render row
		$sede_sismed_list->renderRow();

		// Render list options
		$sede_sismed_list->renderListOptions();
?>
	<tr <?php echo $sede_sismed->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sede_sismed_list->ListOptions->render("body", "left", $sede_sismed_list->RowCount);
?>
	<?php if ($sede_sismed_list->id_sede->Visible) { // id_sede ?>
		<td data-name="id_sede" <?php echo $sede_sismed_list->id_sede->cellAttributes() ?>>
<span id="el<?php echo $sede_sismed_list->RowCount ?>_sede_sismed_id_sede">
<span<?php echo $sede_sismed_list->id_sede->viewAttributes() ?>><?php echo $sede_sismed_list->id_sede->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sede_sismed_list->nombre_sede->Visible) { // nombre_sede ?>
		<td data-name="nombre_sede" <?php echo $sede_sismed_list->nombre_sede->cellAttributes() ?>>
<span id="el<?php echo $sede_sismed_list->RowCount ?>_sede_sismed_nombre_sede">
<span<?php echo $sede_sismed_list->nombre_sede->viewAttributes() ?>><?php echo $sede_sismed_list->nombre_sede->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sede_sismed_list->ListOptions->render("body", "right", $sede_sismed_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sede_sismed_list->isGridAdd())
		$sede_sismed_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sede_sismed->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sede_sismed_list->Recordset)
	$sede_sismed_list->Recordset->Close();
?>
<?php if (!$sede_sismed_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sede_sismed_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sede_sismed_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sede_sismed_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sede_sismed_list->TotalRecords == 0 && !$sede_sismed->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sede_sismed_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sede_sismed_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sede_sismed_list->isExport()) { ?>
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
$sede_sismed_list->terminate();
?>