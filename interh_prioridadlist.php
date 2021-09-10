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
$interh_prioridad_list = new interh_prioridad_list();

// Run the page
$interh_prioridad_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_prioridad_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_prioridad_list->isExport()) { ?>
<script>
var finterh_prioridadlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_prioridadlist = currentForm = new ew.Form("finterh_prioridadlist", "list");
	finterh_prioridadlist.formKeyCountName = '<?php echo $interh_prioridad_list->FormKeyCountName ?>';
	loadjs.done("finterh_prioridadlist");
});
var finterh_prioridadlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finterh_prioridadlistsrch = currentSearchForm = new ew.Form("finterh_prioridadlistsrch");

	// Dynamic selection lists
	// Filters

	finterh_prioridadlistsrch.filterList = <?php echo $interh_prioridad_list->getFilterList() ?>;
	loadjs.done("finterh_prioridadlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_prioridad_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_prioridad_list->TotalRecords > 0 && $interh_prioridad_list->ExportOptions->visible()) { ?>
<?php $interh_prioridad_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_prioridad_list->ImportOptions->visible()) { ?>
<?php $interh_prioridad_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_prioridad_list->SearchOptions->visible()) { ?>
<?php $interh_prioridad_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($interh_prioridad_list->FilterOptions->visible()) { ?>
<?php $interh_prioridad_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_prioridad_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_prioridad_list->isExport() && !$interh_prioridad->CurrentAction) { ?>
<form name="finterh_prioridadlistsrch" id="finterh_prioridadlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finterh_prioridadlistsrch-search-panel" class="<?php echo $interh_prioridad_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_prioridad">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $interh_prioridad_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($interh_prioridad_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($interh_prioridad_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $interh_prioridad_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($interh_prioridad_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($interh_prioridad_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($interh_prioridad_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($interh_prioridad_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $interh_prioridad_list->showPageHeader(); ?>
<?php
$interh_prioridad_list->showMessage();
?>
<?php if ($interh_prioridad_list->TotalRecords > 0 || $interh_prioridad->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_prioridad_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_prioridad">
<?php if (!$interh_prioridad_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$interh_prioridad_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_prioridad_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_prioridad_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finterh_prioridadlist" id="finterh_prioridadlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_prioridad">
<div id="gmp_interh_prioridad" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_prioridad_list->TotalRecords > 0 || $interh_prioridad_list->isGridEdit()) { ?>
<table id="tbl_interh_prioridadlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_prioridad->RowType = ROWTYPE_HEADER;

// Render list options
$interh_prioridad_list->renderListOptions();

// Render list options (header, left)
$interh_prioridad_list->ListOptions->render("header", "left");
?>
<?php if ($interh_prioridad_list->id_prioridad->Visible) { // id_prioridad ?>
	<?php if ($interh_prioridad_list->SortUrl($interh_prioridad_list->id_prioridad) == "") { ?>
		<th data-name="id_prioridad" class="<?php echo $interh_prioridad_list->id_prioridad->headerCellClass() ?>"><div id="elh_interh_prioridad_id_prioridad" class="interh_prioridad_id_prioridad"><div class="ew-table-header-caption"><?php echo $interh_prioridad_list->id_prioridad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_prioridad" class="<?php echo $interh_prioridad_list->id_prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_prioridad_list->SortUrl($interh_prioridad_list->id_prioridad) ?>', 1);"><div id="elh_interh_prioridad_id_prioridad" class="interh_prioridad_id_prioridad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_prioridad_list->id_prioridad->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_prioridad_list->id_prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_prioridad_list->id_prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_prioridad_list->nombre_prioridad->Visible) { // nombre_prioridad ?>
	<?php if ($interh_prioridad_list->SortUrl($interh_prioridad_list->nombre_prioridad) == "") { ?>
		<th data-name="nombre_prioridad" class="<?php echo $interh_prioridad_list->nombre_prioridad->headerCellClass() ?>"><div id="elh_interh_prioridad_nombre_prioridad" class="interh_prioridad_nombre_prioridad"><div class="ew-table-header-caption"><?php echo $interh_prioridad_list->nombre_prioridad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_prioridad" class="<?php echo $interh_prioridad_list->nombre_prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_prioridad_list->SortUrl($interh_prioridad_list->nombre_prioridad) ?>', 1);"><div id="elh_interh_prioridad_nombre_prioridad" class="interh_prioridad_nombre_prioridad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_prioridad_list->nombre_prioridad->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_prioridad_list->nombre_prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_prioridad_list->nombre_prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_prioridad_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_prioridad_list->ExportAll && $interh_prioridad_list->isExport()) {
	$interh_prioridad_list->StopRecord = $interh_prioridad_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_prioridad_list->TotalRecords > $interh_prioridad_list->StartRecord + $interh_prioridad_list->DisplayRecords - 1)
		$interh_prioridad_list->StopRecord = $interh_prioridad_list->StartRecord + $interh_prioridad_list->DisplayRecords - 1;
	else
		$interh_prioridad_list->StopRecord = $interh_prioridad_list->TotalRecords;
}
$interh_prioridad_list->RecordCount = $interh_prioridad_list->StartRecord - 1;
if ($interh_prioridad_list->Recordset && !$interh_prioridad_list->Recordset->EOF) {
	$interh_prioridad_list->Recordset->moveFirst();
	$selectLimit = $interh_prioridad_list->UseSelectLimit;
	if (!$selectLimit && $interh_prioridad_list->StartRecord > 1)
		$interh_prioridad_list->Recordset->move($interh_prioridad_list->StartRecord - 1);
} elseif (!$interh_prioridad->AllowAddDeleteRow && $interh_prioridad_list->StopRecord == 0) {
	$interh_prioridad_list->StopRecord = $interh_prioridad->GridAddRowCount;
}

// Initialize aggregate
$interh_prioridad->RowType = ROWTYPE_AGGREGATEINIT;
$interh_prioridad->resetAttributes();
$interh_prioridad_list->renderRow();
while ($interh_prioridad_list->RecordCount < $interh_prioridad_list->StopRecord) {
	$interh_prioridad_list->RecordCount++;
	if ($interh_prioridad_list->RecordCount >= $interh_prioridad_list->StartRecord) {
		$interh_prioridad_list->RowCount++;

		// Set up key count
		$interh_prioridad_list->KeyCount = $interh_prioridad_list->RowIndex;

		// Init row class and style
		$interh_prioridad->resetAttributes();
		$interh_prioridad->CssClass = "";
		if ($interh_prioridad_list->isGridAdd()) {
		} else {
			$interh_prioridad_list->loadRowValues($interh_prioridad_list->Recordset); // Load row values
		}
		$interh_prioridad->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_prioridad->RowAttrs->merge(["data-rowindex" => $interh_prioridad_list->RowCount, "id" => "r" . $interh_prioridad_list->RowCount . "_interh_prioridad", "data-rowtype" => $interh_prioridad->RowType]);

		// Render row
		$interh_prioridad_list->renderRow();

		// Render list options
		$interh_prioridad_list->renderListOptions();
?>
	<tr <?php echo $interh_prioridad->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_prioridad_list->ListOptions->render("body", "left", $interh_prioridad_list->RowCount);
?>
	<?php if ($interh_prioridad_list->id_prioridad->Visible) { // id_prioridad ?>
		<td data-name="id_prioridad" <?php echo $interh_prioridad_list->id_prioridad->cellAttributes() ?>>
<span id="el<?php echo $interh_prioridad_list->RowCount ?>_interh_prioridad_id_prioridad">
<span<?php echo $interh_prioridad_list->id_prioridad->viewAttributes() ?>><?php echo $interh_prioridad_list->id_prioridad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_prioridad_list->nombre_prioridad->Visible) { // nombre_prioridad ?>
		<td data-name="nombre_prioridad" <?php echo $interh_prioridad_list->nombre_prioridad->cellAttributes() ?>>
<span id="el<?php echo $interh_prioridad_list->RowCount ?>_interh_prioridad_nombre_prioridad">
<span<?php echo $interh_prioridad_list->nombre_prioridad->viewAttributes() ?>><?php echo $interh_prioridad_list->nombre_prioridad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_prioridad_list->ListOptions->render("body", "right", $interh_prioridad_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$interh_prioridad_list->isGridAdd())
		$interh_prioridad_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_prioridad->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_prioridad_list->Recordset)
	$interh_prioridad_list->Recordset->Close();
?>
<?php if (!$interh_prioridad_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_prioridad_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_prioridad_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_prioridad_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_prioridad_list->TotalRecords == 0 && !$interh_prioridad->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_prioridad_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$interh_prioridad_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_prioridad_list->isExport()) { ?>
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
$interh_prioridad_list->terminate();
?>