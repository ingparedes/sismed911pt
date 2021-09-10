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
$causa_trauma_categoria_list = new causa_trauma_categoria_list();

// Run the page
$causa_trauma_categoria_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_trauma_categoria_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$causa_trauma_categoria_list->isExport()) { ?>
<script>
var fcausa_trauma_categorialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcausa_trauma_categorialist = currentForm = new ew.Form("fcausa_trauma_categorialist", "list");
	fcausa_trauma_categorialist.formKeyCountName = '<?php echo $causa_trauma_categoria_list->FormKeyCountName ?>';
	loadjs.done("fcausa_trauma_categorialist");
});
var fcausa_trauma_categorialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcausa_trauma_categorialistsrch = currentSearchForm = new ew.Form("fcausa_trauma_categorialistsrch");

	// Dynamic selection lists
	// Filters

	fcausa_trauma_categorialistsrch.filterList = <?php echo $causa_trauma_categoria_list->getFilterList() ?>;
	loadjs.done("fcausa_trauma_categorialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$causa_trauma_categoria_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($causa_trauma_categoria_list->TotalRecords > 0 && $causa_trauma_categoria_list->ExportOptions->visible()) { ?>
<?php $causa_trauma_categoria_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_trauma_categoria_list->ImportOptions->visible()) { ?>
<?php $causa_trauma_categoria_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_trauma_categoria_list->SearchOptions->visible()) { ?>
<?php $causa_trauma_categoria_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($causa_trauma_categoria_list->FilterOptions->visible()) { ?>
<?php $causa_trauma_categoria_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$causa_trauma_categoria_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$causa_trauma_categoria_list->isExport() && !$causa_trauma_categoria->CurrentAction) { ?>
<form name="fcausa_trauma_categorialistsrch" id="fcausa_trauma_categorialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcausa_trauma_categorialistsrch-search-panel" class="<?php echo $causa_trauma_categoria_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="causa_trauma_categoria">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $causa_trauma_categoria_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($causa_trauma_categoria_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($causa_trauma_categoria_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $causa_trauma_categoria_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($causa_trauma_categoria_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($causa_trauma_categoria_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($causa_trauma_categoria_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($causa_trauma_categoria_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $causa_trauma_categoria_list->showPageHeader(); ?>
<?php
$causa_trauma_categoria_list->showMessage();
?>
<?php if ($causa_trauma_categoria_list->TotalRecords > 0 || $causa_trauma_categoria->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($causa_trauma_categoria_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> causa_trauma_categoria">
<?php if (!$causa_trauma_categoria_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$causa_trauma_categoria_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_trauma_categoria_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_trauma_categoria_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcausa_trauma_categorialist" id="fcausa_trauma_categorialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_trauma_categoria">
<div id="gmp_causa_trauma_categoria" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($causa_trauma_categoria_list->TotalRecords > 0 || $causa_trauma_categoria_list->isGridEdit()) { ?>
<table id="tbl_causa_trauma_categorialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$causa_trauma_categoria->RowType = ROWTYPE_HEADER;

// Render list options
$causa_trauma_categoria_list->renderListOptions();

// Render list options (header, left)
$causa_trauma_categoria_list->ListOptions->render("header", "left");
?>
<?php if ($causa_trauma_categoria_list->id->Visible) { // id ?>
	<?php if ($causa_trauma_categoria_list->SortUrl($causa_trauma_categoria_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $causa_trauma_categoria_list->id->headerCellClass() ?>"><div id="elh_causa_trauma_categoria_id" class="causa_trauma_categoria_id"><div class="ew-table-header-caption"><?php echo $causa_trauma_categoria_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $causa_trauma_categoria_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_trauma_categoria_list->SortUrl($causa_trauma_categoria_list->id) ?>', 1);"><div id="elh_causa_trauma_categoria_id" class="causa_trauma_categoria_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_trauma_categoria_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_trauma_categoria_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_trauma_categoria_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($causa_trauma_categoria_list->causa_trauma->Visible) { // causa_trauma ?>
	<?php if ($causa_trauma_categoria_list->SortUrl($causa_trauma_categoria_list->causa_trauma) == "") { ?>
		<th data-name="causa_trauma" class="<?php echo $causa_trauma_categoria_list->causa_trauma->headerCellClass() ?>"><div id="elh_causa_trauma_categoria_causa_trauma" class="causa_trauma_categoria_causa_trauma"><div class="ew-table-header-caption"><?php echo $causa_trauma_categoria_list->causa_trauma->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="causa_trauma" class="<?php echo $causa_trauma_categoria_list->causa_trauma->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_trauma_categoria_list->SortUrl($causa_trauma_categoria_list->causa_trauma) ?>', 1);"><div id="elh_causa_trauma_categoria_causa_trauma" class="causa_trauma_categoria_causa_trauma">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_trauma_categoria_list->causa_trauma->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($causa_trauma_categoria_list->causa_trauma->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_trauma_categoria_list->causa_trauma->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$causa_trauma_categoria_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($causa_trauma_categoria_list->ExportAll && $causa_trauma_categoria_list->isExport()) {
	$causa_trauma_categoria_list->StopRecord = $causa_trauma_categoria_list->TotalRecords;
} else {

	// Set the last record to display
	if ($causa_trauma_categoria_list->TotalRecords > $causa_trauma_categoria_list->StartRecord + $causa_trauma_categoria_list->DisplayRecords - 1)
		$causa_trauma_categoria_list->StopRecord = $causa_trauma_categoria_list->StartRecord + $causa_trauma_categoria_list->DisplayRecords - 1;
	else
		$causa_trauma_categoria_list->StopRecord = $causa_trauma_categoria_list->TotalRecords;
}
$causa_trauma_categoria_list->RecordCount = $causa_trauma_categoria_list->StartRecord - 1;
if ($causa_trauma_categoria_list->Recordset && !$causa_trauma_categoria_list->Recordset->EOF) {
	$causa_trauma_categoria_list->Recordset->moveFirst();
	$selectLimit = $causa_trauma_categoria_list->UseSelectLimit;
	if (!$selectLimit && $causa_trauma_categoria_list->StartRecord > 1)
		$causa_trauma_categoria_list->Recordset->move($causa_trauma_categoria_list->StartRecord - 1);
} elseif (!$causa_trauma_categoria->AllowAddDeleteRow && $causa_trauma_categoria_list->StopRecord == 0) {
	$causa_trauma_categoria_list->StopRecord = $causa_trauma_categoria->GridAddRowCount;
}

// Initialize aggregate
$causa_trauma_categoria->RowType = ROWTYPE_AGGREGATEINIT;
$causa_trauma_categoria->resetAttributes();
$causa_trauma_categoria_list->renderRow();
while ($causa_trauma_categoria_list->RecordCount < $causa_trauma_categoria_list->StopRecord) {
	$causa_trauma_categoria_list->RecordCount++;
	if ($causa_trauma_categoria_list->RecordCount >= $causa_trauma_categoria_list->StartRecord) {
		$causa_trauma_categoria_list->RowCount++;

		// Set up key count
		$causa_trauma_categoria_list->KeyCount = $causa_trauma_categoria_list->RowIndex;

		// Init row class and style
		$causa_trauma_categoria->resetAttributes();
		$causa_trauma_categoria->CssClass = "";
		if ($causa_trauma_categoria_list->isGridAdd()) {
		} else {
			$causa_trauma_categoria_list->loadRowValues($causa_trauma_categoria_list->Recordset); // Load row values
		}
		$causa_trauma_categoria->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$causa_trauma_categoria->RowAttrs->merge(["data-rowindex" => $causa_trauma_categoria_list->RowCount, "id" => "r" . $causa_trauma_categoria_list->RowCount . "_causa_trauma_categoria", "data-rowtype" => $causa_trauma_categoria->RowType]);

		// Render row
		$causa_trauma_categoria_list->renderRow();

		// Render list options
		$causa_trauma_categoria_list->renderListOptions();
?>
	<tr <?php echo $causa_trauma_categoria->rowAttributes() ?>>
<?php

// Render list options (body, left)
$causa_trauma_categoria_list->ListOptions->render("body", "left", $causa_trauma_categoria_list->RowCount);
?>
	<?php if ($causa_trauma_categoria_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $causa_trauma_categoria_list->id->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_categoria_list->RowCount ?>_causa_trauma_categoria_id">
<span<?php echo $causa_trauma_categoria_list->id->viewAttributes() ?>><?php echo $causa_trauma_categoria_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($causa_trauma_categoria_list->causa_trauma->Visible) { // causa_trauma ?>
		<td data-name="causa_trauma" <?php echo $causa_trauma_categoria_list->causa_trauma->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_categoria_list->RowCount ?>_causa_trauma_categoria_causa_trauma">
<span<?php echo $causa_trauma_categoria_list->causa_trauma->viewAttributes() ?>><?php echo $causa_trauma_categoria_list->causa_trauma->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$causa_trauma_categoria_list->ListOptions->render("body", "right", $causa_trauma_categoria_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$causa_trauma_categoria_list->isGridAdd())
		$causa_trauma_categoria_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$causa_trauma_categoria->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($causa_trauma_categoria_list->Recordset)
	$causa_trauma_categoria_list->Recordset->Close();
?>
<?php if (!$causa_trauma_categoria_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$causa_trauma_categoria_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_trauma_categoria_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_trauma_categoria_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($causa_trauma_categoria_list->TotalRecords == 0 && !$causa_trauma_categoria->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $causa_trauma_categoria_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$causa_trauma_categoria_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$causa_trauma_categoria_list->isExport()) { ?>
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
$causa_trauma_categoria_list->terminate();
?>