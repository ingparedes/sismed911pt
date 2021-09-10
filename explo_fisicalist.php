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
$explo_fisica_list = new explo_fisica_list();

// Run the page
$explo_fisica_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_fisica_list->isExport()) { ?>
<script>
var fexplo_fisicalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fexplo_fisicalist = currentForm = new ew.Form("fexplo_fisicalist", "list");
	fexplo_fisicalist.formKeyCountName = '<?php echo $explo_fisica_list->FormKeyCountName ?>';
	loadjs.done("fexplo_fisicalist");
});
var fexplo_fisicalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fexplo_fisicalistsrch = currentSearchForm = new ew.Form("fexplo_fisicalistsrch");

	// Dynamic selection lists
	// Filters

	fexplo_fisicalistsrch.filterList = <?php echo $explo_fisica_list->getFilterList() ?>;
	loadjs.done("fexplo_fisicalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_fisica_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($explo_fisica_list->TotalRecords > 0 && $explo_fisica_list->ExportOptions->visible()) { ?>
<?php $explo_fisica_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_fisica_list->ImportOptions->visible()) { ?>
<?php $explo_fisica_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_fisica_list->SearchOptions->visible()) { ?>
<?php $explo_fisica_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($explo_fisica_list->FilterOptions->visible()) { ?>
<?php $explo_fisica_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$explo_fisica_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$explo_fisica_list->isExport() && !$explo_fisica->CurrentAction) { ?>
<form name="fexplo_fisicalistsrch" id="fexplo_fisicalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fexplo_fisicalistsrch-search-panel" class="<?php echo $explo_fisica_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="explo_fisica">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $explo_fisica_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($explo_fisica_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($explo_fisica_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $explo_fisica_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($explo_fisica_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($explo_fisica_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($explo_fisica_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($explo_fisica_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $explo_fisica_list->showPageHeader(); ?>
<?php
$explo_fisica_list->showMessage();
?>
<?php if ($explo_fisica_list->TotalRecords > 0 || $explo_fisica->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($explo_fisica_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> explo_fisica">
<?php if (!$explo_fisica_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$explo_fisica_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_fisica_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_fisica_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fexplo_fisicalist" id="fexplo_fisicalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica">
<div id="gmp_explo_fisica" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($explo_fisica_list->TotalRecords > 0 || $explo_fisica_list->isGridEdit()) { ?>
<table id="tbl_explo_fisicalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$explo_fisica->RowType = ROWTYPE_HEADER;

// Render list options
$explo_fisica_list->renderListOptions();

// Render list options (header, left)
$explo_fisica_list->ListOptions->render("header", "left");
?>
<?php if ($explo_fisica_list->id->Visible) { // id ?>
	<?php if ($explo_fisica_list->SortUrl($explo_fisica_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $explo_fisica_list->id->headerCellClass() ?>"><div id="elh_explo_fisica_id" class="explo_fisica_id"><div class="ew-table-header-caption"><?php echo $explo_fisica_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $explo_fisica_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_list->SortUrl($explo_fisica_list->id) ?>', 1);"><div id="elh_explo_fisica_id" class="explo_fisica_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_fisica_list->nombre->Visible) { // nombre ?>
	<?php if ($explo_fisica_list->SortUrl($explo_fisica_list->nombre) == "") { ?>
		<th data-name="nombre" class="<?php echo $explo_fisica_list->nombre->headerCellClass() ?>"><div id="elh_explo_fisica_nombre" class="explo_fisica_nombre"><div class="ew-table-header-caption"><?php echo $explo_fisica_list->nombre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre" class="<?php echo $explo_fisica_list->nombre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_list->SortUrl($explo_fisica_list->nombre) ?>', 1);"><div id="elh_explo_fisica_nombre" class="explo_fisica_nombre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_list->nombre->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_list->nombre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_list->nombre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$explo_fisica_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($explo_fisica_list->ExportAll && $explo_fisica_list->isExport()) {
	$explo_fisica_list->StopRecord = $explo_fisica_list->TotalRecords;
} else {

	// Set the last record to display
	if ($explo_fisica_list->TotalRecords > $explo_fisica_list->StartRecord + $explo_fisica_list->DisplayRecords - 1)
		$explo_fisica_list->StopRecord = $explo_fisica_list->StartRecord + $explo_fisica_list->DisplayRecords - 1;
	else
		$explo_fisica_list->StopRecord = $explo_fisica_list->TotalRecords;
}
$explo_fisica_list->RecordCount = $explo_fisica_list->StartRecord - 1;
if ($explo_fisica_list->Recordset && !$explo_fisica_list->Recordset->EOF) {
	$explo_fisica_list->Recordset->moveFirst();
	$selectLimit = $explo_fisica_list->UseSelectLimit;
	if (!$selectLimit && $explo_fisica_list->StartRecord > 1)
		$explo_fisica_list->Recordset->move($explo_fisica_list->StartRecord - 1);
} elseif (!$explo_fisica->AllowAddDeleteRow && $explo_fisica_list->StopRecord == 0) {
	$explo_fisica_list->StopRecord = $explo_fisica->GridAddRowCount;
}

// Initialize aggregate
$explo_fisica->RowType = ROWTYPE_AGGREGATEINIT;
$explo_fisica->resetAttributes();
$explo_fisica_list->renderRow();
while ($explo_fisica_list->RecordCount < $explo_fisica_list->StopRecord) {
	$explo_fisica_list->RecordCount++;
	if ($explo_fisica_list->RecordCount >= $explo_fisica_list->StartRecord) {
		$explo_fisica_list->RowCount++;

		// Set up key count
		$explo_fisica_list->KeyCount = $explo_fisica_list->RowIndex;

		// Init row class and style
		$explo_fisica->resetAttributes();
		$explo_fisica->CssClass = "";
		if ($explo_fisica_list->isGridAdd()) {
		} else {
			$explo_fisica_list->loadRowValues($explo_fisica_list->Recordset); // Load row values
		}
		$explo_fisica->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$explo_fisica->RowAttrs->merge(["data-rowindex" => $explo_fisica_list->RowCount, "id" => "r" . $explo_fisica_list->RowCount . "_explo_fisica", "data-rowtype" => $explo_fisica->RowType]);

		// Render row
		$explo_fisica_list->renderRow();

		// Render list options
		$explo_fisica_list->renderListOptions();
?>
	<tr <?php echo $explo_fisica->rowAttributes() ?>>
<?php

// Render list options (body, left)
$explo_fisica_list->ListOptions->render("body", "left", $explo_fisica_list->RowCount);
?>
	<?php if ($explo_fisica_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $explo_fisica_list->id->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_list->RowCount ?>_explo_fisica_id">
<span<?php echo $explo_fisica_list->id->viewAttributes() ?>><?php echo $explo_fisica_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_fisica_list->nombre->Visible) { // nombre ?>
		<td data-name="nombre" <?php echo $explo_fisica_list->nombre->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_list->RowCount ?>_explo_fisica_nombre">
<span<?php echo $explo_fisica_list->nombre->viewAttributes() ?>><?php echo $explo_fisica_list->nombre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$explo_fisica_list->ListOptions->render("body", "right", $explo_fisica_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$explo_fisica_list->isGridAdd())
		$explo_fisica_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$explo_fisica->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($explo_fisica_list->Recordset)
	$explo_fisica_list->Recordset->Close();
?>
<?php if (!$explo_fisica_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$explo_fisica_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_fisica_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_fisica_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($explo_fisica_list->TotalRecords == 0 && !$explo_fisica->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $explo_fisica_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$explo_fisica_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_fisica_list->isExport()) { ?>
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
$explo_fisica_list->terminate();
?>