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
$causa_externa_list = new causa_externa_list();

// Run the page
$causa_externa_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_externa_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$causa_externa_list->isExport()) { ?>
<script>
var fcausa_externalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcausa_externalist = currentForm = new ew.Form("fcausa_externalist", "list");
	fcausa_externalist.formKeyCountName = '<?php echo $causa_externa_list->FormKeyCountName ?>';
	loadjs.done("fcausa_externalist");
});
var fcausa_externalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcausa_externalistsrch = currentSearchForm = new ew.Form("fcausa_externalistsrch");

	// Dynamic selection lists
	// Filters

	fcausa_externalistsrch.filterList = <?php echo $causa_externa_list->getFilterList() ?>;
	loadjs.done("fcausa_externalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$causa_externa_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($causa_externa_list->TotalRecords > 0 && $causa_externa_list->ExportOptions->visible()) { ?>
<?php $causa_externa_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_externa_list->ImportOptions->visible()) { ?>
<?php $causa_externa_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_externa_list->SearchOptions->visible()) { ?>
<?php $causa_externa_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($causa_externa_list->FilterOptions->visible()) { ?>
<?php $causa_externa_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$causa_externa_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$causa_externa_list->isExport() && !$causa_externa->CurrentAction) { ?>
<form name="fcausa_externalistsrch" id="fcausa_externalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcausa_externalistsrch-search-panel" class="<?php echo $causa_externa_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="causa_externa">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $causa_externa_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($causa_externa_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($causa_externa_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $causa_externa_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($causa_externa_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($causa_externa_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($causa_externa_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($causa_externa_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $causa_externa_list->showPageHeader(); ?>
<?php
$causa_externa_list->showMessage();
?>
<?php if ($causa_externa_list->TotalRecords > 0 || $causa_externa->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($causa_externa_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> causa_externa">
<?php if (!$causa_externa_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$causa_externa_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_externa_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_externa_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcausa_externalist" id="fcausa_externalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_externa">
<div id="gmp_causa_externa" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($causa_externa_list->TotalRecords > 0 || $causa_externa_list->isGridEdit()) { ?>
<table id="tbl_causa_externalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$causa_externa->RowType = ROWTYPE_HEADER;

// Render list options
$causa_externa_list->renderListOptions();

// Render list options (header, left)
$causa_externa_list->ListOptions->render("header", "left");
?>
<?php if ($causa_externa_list->id_causa->Visible) { // id_causa ?>
	<?php if ($causa_externa_list->SortUrl($causa_externa_list->id_causa) == "") { ?>
		<th data-name="id_causa" class="<?php echo $causa_externa_list->id_causa->headerCellClass() ?>"><div id="elh_causa_externa_id_causa" class="causa_externa_id_causa"><div class="ew-table-header-caption"><?php echo $causa_externa_list->id_causa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_causa" class="<?php echo $causa_externa_list->id_causa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_externa_list->SortUrl($causa_externa_list->id_causa) ?>', 1);"><div id="elh_causa_externa_id_causa" class="causa_externa_id_causa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_externa_list->id_causa->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_externa_list->id_causa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_externa_list->id_causa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($causa_externa_list->nom_causa->Visible) { // nom_causa ?>
	<?php if ($causa_externa_list->SortUrl($causa_externa_list->nom_causa) == "") { ?>
		<th data-name="nom_causa" class="<?php echo $causa_externa_list->nom_causa->headerCellClass() ?>"><div id="elh_causa_externa_nom_causa" class="causa_externa_nom_causa"><div class="ew-table-header-caption"><?php echo $causa_externa_list->nom_causa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nom_causa" class="<?php echo $causa_externa_list->nom_causa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_externa_list->SortUrl($causa_externa_list->nom_causa) ?>', 1);"><div id="elh_causa_externa_nom_causa" class="causa_externa_nom_causa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_externa_list->nom_causa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($causa_externa_list->nom_causa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_externa_list->nom_causa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$causa_externa_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($causa_externa_list->ExportAll && $causa_externa_list->isExport()) {
	$causa_externa_list->StopRecord = $causa_externa_list->TotalRecords;
} else {

	// Set the last record to display
	if ($causa_externa_list->TotalRecords > $causa_externa_list->StartRecord + $causa_externa_list->DisplayRecords - 1)
		$causa_externa_list->StopRecord = $causa_externa_list->StartRecord + $causa_externa_list->DisplayRecords - 1;
	else
		$causa_externa_list->StopRecord = $causa_externa_list->TotalRecords;
}
$causa_externa_list->RecordCount = $causa_externa_list->StartRecord - 1;
if ($causa_externa_list->Recordset && !$causa_externa_list->Recordset->EOF) {
	$causa_externa_list->Recordset->moveFirst();
	$selectLimit = $causa_externa_list->UseSelectLimit;
	if (!$selectLimit && $causa_externa_list->StartRecord > 1)
		$causa_externa_list->Recordset->move($causa_externa_list->StartRecord - 1);
} elseif (!$causa_externa->AllowAddDeleteRow && $causa_externa_list->StopRecord == 0) {
	$causa_externa_list->StopRecord = $causa_externa->GridAddRowCount;
}

// Initialize aggregate
$causa_externa->RowType = ROWTYPE_AGGREGATEINIT;
$causa_externa->resetAttributes();
$causa_externa_list->renderRow();
while ($causa_externa_list->RecordCount < $causa_externa_list->StopRecord) {
	$causa_externa_list->RecordCount++;
	if ($causa_externa_list->RecordCount >= $causa_externa_list->StartRecord) {
		$causa_externa_list->RowCount++;

		// Set up key count
		$causa_externa_list->KeyCount = $causa_externa_list->RowIndex;

		// Init row class and style
		$causa_externa->resetAttributes();
		$causa_externa->CssClass = "";
		if ($causa_externa_list->isGridAdd()) {
		} else {
			$causa_externa_list->loadRowValues($causa_externa_list->Recordset); // Load row values
		}
		$causa_externa->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$causa_externa->RowAttrs->merge(["data-rowindex" => $causa_externa_list->RowCount, "id" => "r" . $causa_externa_list->RowCount . "_causa_externa", "data-rowtype" => $causa_externa->RowType]);

		// Render row
		$causa_externa_list->renderRow();

		// Render list options
		$causa_externa_list->renderListOptions();
?>
	<tr <?php echo $causa_externa->rowAttributes() ?>>
<?php

// Render list options (body, left)
$causa_externa_list->ListOptions->render("body", "left", $causa_externa_list->RowCount);
?>
	<?php if ($causa_externa_list->id_causa->Visible) { // id_causa ?>
		<td data-name="id_causa" <?php echo $causa_externa_list->id_causa->cellAttributes() ?>>
<span id="el<?php echo $causa_externa_list->RowCount ?>_causa_externa_id_causa">
<span<?php echo $causa_externa_list->id_causa->viewAttributes() ?>><?php echo $causa_externa_list->id_causa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($causa_externa_list->nom_causa->Visible) { // nom_causa ?>
		<td data-name="nom_causa" <?php echo $causa_externa_list->nom_causa->cellAttributes() ?>>
<span id="el<?php echo $causa_externa_list->RowCount ?>_causa_externa_nom_causa">
<span<?php echo $causa_externa_list->nom_causa->viewAttributes() ?>><?php echo $causa_externa_list->nom_causa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$causa_externa_list->ListOptions->render("body", "right", $causa_externa_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$causa_externa_list->isGridAdd())
		$causa_externa_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$causa_externa->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($causa_externa_list->Recordset)
	$causa_externa_list->Recordset->Close();
?>
<?php if (!$causa_externa_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$causa_externa_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_externa_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_externa_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($causa_externa_list->TotalRecords == 0 && !$causa_externa->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $causa_externa_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$causa_externa_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$causa_externa_list->isExport()) { ?>
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
$causa_externa_list->terminate();
?>