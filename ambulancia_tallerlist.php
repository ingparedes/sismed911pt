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
$ambulancia_taller_list = new ambulancia_taller_list();

// Run the page
$ambulancia_taller_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancia_taller_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ambulancia_taller_list->isExport()) { ?>
<script>
var fambulancia_tallerlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fambulancia_tallerlist = currentForm = new ew.Form("fambulancia_tallerlist", "list");
	fambulancia_tallerlist.formKeyCountName = '<?php echo $ambulancia_taller_list->FormKeyCountName ?>';
	loadjs.done("fambulancia_tallerlist");
});
var fambulancia_tallerlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fambulancia_tallerlistsrch = currentSearchForm = new ew.Form("fambulancia_tallerlistsrch");

	// Dynamic selection lists
	// Filters

	fambulancia_tallerlistsrch.filterList = <?php echo $ambulancia_taller_list->getFilterList() ?>;
	loadjs.done("fambulancia_tallerlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ambulancia_taller_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ambulancia_taller_list->TotalRecords > 0 && $ambulancia_taller_list->ExportOptions->visible()) { ?>
<?php $ambulancia_taller_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ambulancia_taller_list->ImportOptions->visible()) { ?>
<?php $ambulancia_taller_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ambulancia_taller_list->SearchOptions->visible()) { ?>
<?php $ambulancia_taller_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ambulancia_taller_list->FilterOptions->visible()) { ?>
<?php $ambulancia_taller_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ambulancia_taller_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ambulancia_taller_list->isExport() && !$ambulancia_taller->CurrentAction) { ?>
<form name="fambulancia_tallerlistsrch" id="fambulancia_tallerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fambulancia_tallerlistsrch-search-panel" class="<?php echo $ambulancia_taller_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ambulancia_taller">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ambulancia_taller_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ambulancia_taller_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ambulancia_taller_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ambulancia_taller_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ambulancia_taller_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ambulancia_taller_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ambulancia_taller_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ambulancia_taller_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ambulancia_taller_list->showPageHeader(); ?>
<?php
$ambulancia_taller_list->showMessage();
?>
<?php if ($ambulancia_taller_list->TotalRecords > 0 || $ambulancia_taller->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ambulancia_taller_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ambulancia_taller">
<?php if (!$ambulancia_taller_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ambulancia_taller_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ambulancia_taller_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ambulancia_taller_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fambulancia_tallerlist" id="fambulancia_tallerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancia_taller">
<div id="gmp_ambulancia_taller" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ambulancia_taller_list->TotalRecords > 0 || $ambulancia_taller_list->isGridEdit()) { ?>
<table id="tbl_ambulancia_tallerlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ambulancia_taller->RowType = ROWTYPE_HEADER;

// Render list options
$ambulancia_taller_list->renderListOptions();

// Render list options (header, left)
$ambulancia_taller_list->ListOptions->render("header", "left");
?>
<?php if ($ambulancia_taller_list->id->Visible) { // id ?>
	<?php if ($ambulancia_taller_list->SortUrl($ambulancia_taller_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ambulancia_taller_list->id->headerCellClass() ?>"><div id="elh_ambulancia_taller_id" class="ambulancia_taller_id"><div class="ew-table-header-caption"><?php echo $ambulancia_taller_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ambulancia_taller_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancia_taller_list->SortUrl($ambulancia_taller_list->id) ?>', 1);"><div id="elh_ambulancia_taller_id" class="ambulancia_taller_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancia_taller_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ambulancia_taller_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancia_taller_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancia_taller_list->nombre_taller->Visible) { // nombre_taller ?>
	<?php if ($ambulancia_taller_list->SortUrl($ambulancia_taller_list->nombre_taller) == "") { ?>
		<th data-name="nombre_taller" class="<?php echo $ambulancia_taller_list->nombre_taller->headerCellClass() ?>"><div id="elh_ambulancia_taller_nombre_taller" class="ambulancia_taller_nombre_taller"><div class="ew-table-header-caption"><?php echo $ambulancia_taller_list->nombre_taller->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_taller" class="<?php echo $ambulancia_taller_list->nombre_taller->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancia_taller_list->SortUrl($ambulancia_taller_list->nombre_taller) ?>', 1);"><div id="elh_ambulancia_taller_nombre_taller" class="ambulancia_taller_nombre_taller">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancia_taller_list->nombre_taller->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ambulancia_taller_list->nombre_taller->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancia_taller_list->nombre_taller->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ambulancia_taller_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ambulancia_taller_list->ExportAll && $ambulancia_taller_list->isExport()) {
	$ambulancia_taller_list->StopRecord = $ambulancia_taller_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ambulancia_taller_list->TotalRecords > $ambulancia_taller_list->StartRecord + $ambulancia_taller_list->DisplayRecords - 1)
		$ambulancia_taller_list->StopRecord = $ambulancia_taller_list->StartRecord + $ambulancia_taller_list->DisplayRecords - 1;
	else
		$ambulancia_taller_list->StopRecord = $ambulancia_taller_list->TotalRecords;
}
$ambulancia_taller_list->RecordCount = $ambulancia_taller_list->StartRecord - 1;
if ($ambulancia_taller_list->Recordset && !$ambulancia_taller_list->Recordset->EOF) {
	$ambulancia_taller_list->Recordset->moveFirst();
	$selectLimit = $ambulancia_taller_list->UseSelectLimit;
	if (!$selectLimit && $ambulancia_taller_list->StartRecord > 1)
		$ambulancia_taller_list->Recordset->move($ambulancia_taller_list->StartRecord - 1);
} elseif (!$ambulancia_taller->AllowAddDeleteRow && $ambulancia_taller_list->StopRecord == 0) {
	$ambulancia_taller_list->StopRecord = $ambulancia_taller->GridAddRowCount;
}

// Initialize aggregate
$ambulancia_taller->RowType = ROWTYPE_AGGREGATEINIT;
$ambulancia_taller->resetAttributes();
$ambulancia_taller_list->renderRow();
while ($ambulancia_taller_list->RecordCount < $ambulancia_taller_list->StopRecord) {
	$ambulancia_taller_list->RecordCount++;
	if ($ambulancia_taller_list->RecordCount >= $ambulancia_taller_list->StartRecord) {
		$ambulancia_taller_list->RowCount++;

		// Set up key count
		$ambulancia_taller_list->KeyCount = $ambulancia_taller_list->RowIndex;

		// Init row class and style
		$ambulancia_taller->resetAttributes();
		$ambulancia_taller->CssClass = "";
		if ($ambulancia_taller_list->isGridAdd()) {
		} else {
			$ambulancia_taller_list->loadRowValues($ambulancia_taller_list->Recordset); // Load row values
		}
		$ambulancia_taller->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ambulancia_taller->RowAttrs->merge(["data-rowindex" => $ambulancia_taller_list->RowCount, "id" => "r" . $ambulancia_taller_list->RowCount . "_ambulancia_taller", "data-rowtype" => $ambulancia_taller->RowType]);

		// Render row
		$ambulancia_taller_list->renderRow();

		// Render list options
		$ambulancia_taller_list->renderListOptions();
?>
	<tr <?php echo $ambulancia_taller->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ambulancia_taller_list->ListOptions->render("body", "left", $ambulancia_taller_list->RowCount);
?>
	<?php if ($ambulancia_taller_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ambulancia_taller_list->id->cellAttributes() ?>>
<span id="el<?php echo $ambulancia_taller_list->RowCount ?>_ambulancia_taller_id">
<span<?php echo $ambulancia_taller_list->id->viewAttributes() ?>><?php echo $ambulancia_taller_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancia_taller_list->nombre_taller->Visible) { // nombre_taller ?>
		<td data-name="nombre_taller" <?php echo $ambulancia_taller_list->nombre_taller->cellAttributes() ?>>
<span id="el<?php echo $ambulancia_taller_list->RowCount ?>_ambulancia_taller_nombre_taller">
<span<?php echo $ambulancia_taller_list->nombre_taller->viewAttributes() ?>><?php echo $ambulancia_taller_list->nombre_taller->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ambulancia_taller_list->ListOptions->render("body", "right", $ambulancia_taller_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ambulancia_taller_list->isGridAdd())
		$ambulancia_taller_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ambulancia_taller->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ambulancia_taller_list->Recordset)
	$ambulancia_taller_list->Recordset->Close();
?>
<?php if (!$ambulancia_taller_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ambulancia_taller_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ambulancia_taller_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ambulancia_taller_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ambulancia_taller_list->TotalRecords == 0 && !$ambulancia_taller->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ambulancia_taller_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ambulancia_taller_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ambulancia_taller_list->isExport()) { ?>
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
$ambulancia_taller_list->terminate();
?>