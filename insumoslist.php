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
$insumos_list = new insumos_list();

// Run the page
$insumos_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$insumos_list->isExport()) { ?>
<script>
var finsumoslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finsumoslist = currentForm = new ew.Form("finsumoslist", "list");
	finsumoslist.formKeyCountName = '<?php echo $insumos_list->FormKeyCountName ?>';
	loadjs.done("finsumoslist");
});
var finsumoslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finsumoslistsrch = currentSearchForm = new ew.Form("finsumoslistsrch");

	// Dynamic selection lists
	// Filters

	finsumoslistsrch.filterList = <?php echo $insumos_list->getFilterList() ?>;
	loadjs.done("finsumoslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$insumos_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($insumos_list->TotalRecords > 0 && $insumos_list->ExportOptions->visible()) { ?>
<?php $insumos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($insumos_list->ImportOptions->visible()) { ?>
<?php $insumos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($insumos_list->SearchOptions->visible()) { ?>
<?php $insumos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($insumos_list->FilterOptions->visible()) { ?>
<?php $insumos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$insumos_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$insumos_list->isExport() && !$insumos->CurrentAction) { ?>
<form name="finsumoslistsrch" id="finsumoslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finsumoslistsrch-search-panel" class="<?php echo $insumos_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="insumos">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $insumos_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($insumos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($insumos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $insumos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($insumos_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($insumos_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($insumos_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($insumos_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $insumos_list->showPageHeader(); ?>
<?php
$insumos_list->showMessage();
?>
<?php if ($insumos_list->TotalRecords > 0 || $insumos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($insumos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> insumos">
<?php if (!$insumos_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$insumos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $insumos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $insumos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finsumoslist" id="finsumoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos">
<div id="gmp_insumos" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($insumos_list->TotalRecords > 0 || $insumos_list->isGridEdit()) { ?>
<table id="tbl_insumoslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$insumos->RowType = ROWTYPE_HEADER;

// Render list options
$insumos_list->renderListOptions();

// Render list options (header, left)
$insumos_list->ListOptions->render("header", "left");
?>
<?php if ($insumos_list->id_insumo->Visible) { // id_insumo ?>
	<?php if ($insumos_list->SortUrl($insumos_list->id_insumo) == "") { ?>
		<th data-name="id_insumo" class="<?php echo $insumos_list->id_insumo->headerCellClass() ?>"><div id="elh_insumos_id_insumo" class="insumos_id_insumo"><div class="ew-table-header-caption"><?php echo $insumos_list->id_insumo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_insumo" class="<?php echo $insumos_list->id_insumo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_list->SortUrl($insumos_list->id_insumo) ?>', 1);"><div id="elh_insumos_id_insumo" class="insumos_id_insumo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_list->id_insumo->caption() ?></span><span class="ew-table-header-sort"><?php if ($insumos_list->id_insumo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_list->id_insumo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($insumos_list->nombre_insumo->Visible) { // nombre_insumo ?>
	<?php if ($insumos_list->SortUrl($insumos_list->nombre_insumo) == "") { ?>
		<th data-name="nombre_insumo" class="<?php echo $insumos_list->nombre_insumo->headerCellClass() ?>"><div id="elh_insumos_nombre_insumo" class="insumos_nombre_insumo"><div class="ew-table-header-caption"><?php echo $insumos_list->nombre_insumo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_insumo" class="<?php echo $insumos_list->nombre_insumo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_list->SortUrl($insumos_list->nombre_insumo) ?>', 1);"><div id="elh_insumos_nombre_insumo" class="insumos_nombre_insumo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_list->nombre_insumo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($insumos_list->nombre_insumo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_list->nombre_insumo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($insumos_list->valor->Visible) { // valor ?>
	<?php if ($insumos_list->SortUrl($insumos_list->valor) == "") { ?>
		<th data-name="valor" class="<?php echo $insumos_list->valor->headerCellClass() ?>"><div id="elh_insumos_valor" class="insumos_valor"><div class="ew-table-header-caption"><?php echo $insumos_list->valor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="valor" class="<?php echo $insumos_list->valor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_list->SortUrl($insumos_list->valor) ?>', 1);"><div id="elh_insumos_valor" class="insumos_valor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_list->valor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($insumos_list->valor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_list->valor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$insumos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($insumos_list->ExportAll && $insumos_list->isExport()) {
	$insumos_list->StopRecord = $insumos_list->TotalRecords;
} else {

	// Set the last record to display
	if ($insumos_list->TotalRecords > $insumos_list->StartRecord + $insumos_list->DisplayRecords - 1)
		$insumos_list->StopRecord = $insumos_list->StartRecord + $insumos_list->DisplayRecords - 1;
	else
		$insumos_list->StopRecord = $insumos_list->TotalRecords;
}
$insumos_list->RecordCount = $insumos_list->StartRecord - 1;
if ($insumos_list->Recordset && !$insumos_list->Recordset->EOF) {
	$insumos_list->Recordset->moveFirst();
	$selectLimit = $insumos_list->UseSelectLimit;
	if (!$selectLimit && $insumos_list->StartRecord > 1)
		$insumos_list->Recordset->move($insumos_list->StartRecord - 1);
} elseif (!$insumos->AllowAddDeleteRow && $insumos_list->StopRecord == 0) {
	$insumos_list->StopRecord = $insumos->GridAddRowCount;
}

// Initialize aggregate
$insumos->RowType = ROWTYPE_AGGREGATEINIT;
$insumos->resetAttributes();
$insumos_list->renderRow();
while ($insumos_list->RecordCount < $insumos_list->StopRecord) {
	$insumos_list->RecordCount++;
	if ($insumos_list->RecordCount >= $insumos_list->StartRecord) {
		$insumos_list->RowCount++;

		// Set up key count
		$insumos_list->KeyCount = $insumos_list->RowIndex;

		// Init row class and style
		$insumos->resetAttributes();
		$insumos->CssClass = "";
		if ($insumos_list->isGridAdd()) {
		} else {
			$insumos_list->loadRowValues($insumos_list->Recordset); // Load row values
		}
		$insumos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$insumos->RowAttrs->merge(["data-rowindex" => $insumos_list->RowCount, "id" => "r" . $insumos_list->RowCount . "_insumos", "data-rowtype" => $insumos->RowType]);

		// Render row
		$insumos_list->renderRow();

		// Render list options
		$insumos_list->renderListOptions();
?>
	<tr <?php echo $insumos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$insumos_list->ListOptions->render("body", "left", $insumos_list->RowCount);
?>
	<?php if ($insumos_list->id_insumo->Visible) { // id_insumo ?>
		<td data-name="id_insumo" <?php echo $insumos_list->id_insumo->cellAttributes() ?>>
<span id="el<?php echo $insumos_list->RowCount ?>_insumos_id_insumo">
<span<?php echo $insumos_list->id_insumo->viewAttributes() ?>><?php echo $insumos_list->id_insumo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($insumos_list->nombre_insumo->Visible) { // nombre_insumo ?>
		<td data-name="nombre_insumo" <?php echo $insumos_list->nombre_insumo->cellAttributes() ?>>
<span id="el<?php echo $insumos_list->RowCount ?>_insumos_nombre_insumo">
<span<?php echo $insumos_list->nombre_insumo->viewAttributes() ?>><?php echo $insumos_list->nombre_insumo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($insumos_list->valor->Visible) { // valor ?>
		<td data-name="valor" <?php echo $insumos_list->valor->cellAttributes() ?>>
<span id="el<?php echo $insumos_list->RowCount ?>_insumos_valor">
<span<?php echo $insumos_list->valor->viewAttributes() ?>><?php echo $insumos_list->valor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$insumos_list->ListOptions->render("body", "right", $insumos_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$insumos_list->isGridAdd())
		$insumos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$insumos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($insumos_list->Recordset)
	$insumos_list->Recordset->Close();
?>
<?php if (!$insumos_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$insumos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $insumos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $insumos_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($insumos_list->TotalRecords == 0 && !$insumos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $insumos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$insumos_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$insumos_list->isExport()) { ?>
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
$insumos_list->terminate();
?>