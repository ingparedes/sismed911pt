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
$cie10dx_list = new cie10dx_list();

// Run the page
$cie10dx_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10dx_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$cie10dx_list->isExport()) { ?>
<script>
var fcie10dxlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcie10dxlist = currentForm = new ew.Form("fcie10dxlist", "list");
	fcie10dxlist.formKeyCountName = '<?php echo $cie10dx_list->FormKeyCountName ?>';
	loadjs.done("fcie10dxlist");
});
var fcie10dxlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcie10dxlistsrch = currentSearchForm = new ew.Form("fcie10dxlistsrch");

	// Dynamic selection lists
	// Filters

	fcie10dxlistsrch.filterList = <?php echo $cie10dx_list->getFilterList() ?>;
	loadjs.done("fcie10dxlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$cie10dx_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($cie10dx_list->TotalRecords > 0 && $cie10dx_list->ExportOptions->visible()) { ?>
<?php $cie10dx_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($cie10dx_list->ImportOptions->visible()) { ?>
<?php $cie10dx_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($cie10dx_list->SearchOptions->visible()) { ?>
<?php $cie10dx_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($cie10dx_list->FilterOptions->visible()) { ?>
<?php $cie10dx_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$cie10dx_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$cie10dx_list->isExport() && !$cie10dx->CurrentAction) { ?>
<form name="fcie10dxlistsrch" id="fcie10dxlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcie10dxlistsrch-search-panel" class="<?php echo $cie10dx_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="cie10dx">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $cie10dx_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($cie10dx_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($cie10dx_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $cie10dx_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($cie10dx_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($cie10dx_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($cie10dx_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($cie10dx_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $cie10dx_list->showPageHeader(); ?>
<?php
$cie10dx_list->showMessage();
?>
<?php if ($cie10dx_list->TotalRecords > 0 || $cie10dx->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($cie10dx_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> cie10dx">
<?php if (!$cie10dx_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$cie10dx_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $cie10dx_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $cie10dx_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcie10dxlist" id="fcie10dxlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10dx">
<div id="gmp_cie10dx" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($cie10dx_list->TotalRecords > 0 || $cie10dx_list->isGridEdit()) { ?>
<table id="tbl_cie10dxlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$cie10dx->RowType = ROWTYPE_HEADER;

// Render list options
$cie10dx_list->renderListOptions();

// Render list options (header, left)
$cie10dx_list->ListOptions->render("header", "left");
?>
<?php if ($cie10dx_list->codcie10->Visible) { // codcie10 ?>
	<?php if ($cie10dx_list->SortUrl($cie10dx_list->codcie10) == "") { ?>
		<th data-name="codcie10" class="<?php echo $cie10dx_list->codcie10->headerCellClass() ?>"><div id="elh_cie10dx_codcie10" class="cie10dx_codcie10"><div class="ew-table-header-caption"><?php echo $cie10dx_list->codcie10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="codcie10" class="<?php echo $cie10dx_list->codcie10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10dx_list->SortUrl($cie10dx_list->codcie10) ?>', 1);"><div id="elh_cie10dx_codcie10" class="cie10dx_codcie10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10dx_list->codcie10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10dx_list->codcie10->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10dx_list->codcie10->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10dx_list->iddx->Visible) { // iddx ?>
	<?php if ($cie10dx_list->SortUrl($cie10dx_list->iddx) == "") { ?>
		<th data-name="iddx" class="<?php echo $cie10dx_list->iddx->headerCellClass() ?>"><div id="elh_cie10dx_iddx" class="cie10dx_iddx"><div class="ew-table-header-caption"><?php echo $cie10dx_list->iddx->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iddx" class="<?php echo $cie10dx_list->iddx->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10dx_list->SortUrl($cie10dx_list->iddx) ?>', 1);"><div id="elh_cie10dx_iddx" class="cie10dx_iddx">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10dx_list->iddx->caption() ?></span><span class="ew-table-header-sort"><?php if ($cie10dx_list->iddx->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10dx_list->iddx->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$cie10dx_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($cie10dx_list->ExportAll && $cie10dx_list->isExport()) {
	$cie10dx_list->StopRecord = $cie10dx_list->TotalRecords;
} else {

	// Set the last record to display
	if ($cie10dx_list->TotalRecords > $cie10dx_list->StartRecord + $cie10dx_list->DisplayRecords - 1)
		$cie10dx_list->StopRecord = $cie10dx_list->StartRecord + $cie10dx_list->DisplayRecords - 1;
	else
		$cie10dx_list->StopRecord = $cie10dx_list->TotalRecords;
}
$cie10dx_list->RecordCount = $cie10dx_list->StartRecord - 1;
if ($cie10dx_list->Recordset && !$cie10dx_list->Recordset->EOF) {
	$cie10dx_list->Recordset->moveFirst();
	$selectLimit = $cie10dx_list->UseSelectLimit;
	if (!$selectLimit && $cie10dx_list->StartRecord > 1)
		$cie10dx_list->Recordset->move($cie10dx_list->StartRecord - 1);
} elseif (!$cie10dx->AllowAddDeleteRow && $cie10dx_list->StopRecord == 0) {
	$cie10dx_list->StopRecord = $cie10dx->GridAddRowCount;
}

// Initialize aggregate
$cie10dx->RowType = ROWTYPE_AGGREGATEINIT;
$cie10dx->resetAttributes();
$cie10dx_list->renderRow();
while ($cie10dx_list->RecordCount < $cie10dx_list->StopRecord) {
	$cie10dx_list->RecordCount++;
	if ($cie10dx_list->RecordCount >= $cie10dx_list->StartRecord) {
		$cie10dx_list->RowCount++;

		// Set up key count
		$cie10dx_list->KeyCount = $cie10dx_list->RowIndex;

		// Init row class and style
		$cie10dx->resetAttributes();
		$cie10dx->CssClass = "";
		if ($cie10dx_list->isGridAdd()) {
		} else {
			$cie10dx_list->loadRowValues($cie10dx_list->Recordset); // Load row values
		}
		$cie10dx->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$cie10dx->RowAttrs->merge(["data-rowindex" => $cie10dx_list->RowCount, "id" => "r" . $cie10dx_list->RowCount . "_cie10dx", "data-rowtype" => $cie10dx->RowType]);

		// Render row
		$cie10dx_list->renderRow();

		// Render list options
		$cie10dx_list->renderListOptions();
?>
	<tr <?php echo $cie10dx->rowAttributes() ?>>
<?php

// Render list options (body, left)
$cie10dx_list->ListOptions->render("body", "left", $cie10dx_list->RowCount);
?>
	<?php if ($cie10dx_list->codcie10->Visible) { // codcie10 ?>
		<td data-name="codcie10" <?php echo $cie10dx_list->codcie10->cellAttributes() ?>>
<span id="el<?php echo $cie10dx_list->RowCount ?>_cie10dx_codcie10">
<span<?php echo $cie10dx_list->codcie10->viewAttributes() ?>><?php echo $cie10dx_list->codcie10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10dx_list->iddx->Visible) { // iddx ?>
		<td data-name="iddx" <?php echo $cie10dx_list->iddx->cellAttributes() ?>>
<span id="el<?php echo $cie10dx_list->RowCount ?>_cie10dx_iddx">
<span<?php echo $cie10dx_list->iddx->viewAttributes() ?>><?php echo $cie10dx_list->iddx->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$cie10dx_list->ListOptions->render("body", "right", $cie10dx_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$cie10dx_list->isGridAdd())
		$cie10dx_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$cie10dx->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($cie10dx_list->Recordset)
	$cie10dx_list->Recordset->Close();
?>
<?php if (!$cie10dx_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$cie10dx_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $cie10dx_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $cie10dx_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($cie10dx_list->TotalRecords == 0 && !$cie10dx->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $cie10dx_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$cie10dx_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$cie10dx_list->isExport()) { ?>
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
$cie10dx_list->terminate();
?>