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
$insumos_registros_list = new insumos_registros_list();

// Run the page
$insumos_registros_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_registros_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$insumos_registros_list->isExport()) { ?>
<script>
var finsumos_registroslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finsumos_registroslist = currentForm = new ew.Form("finsumos_registroslist", "list");
	finsumos_registroslist.formKeyCountName = '<?php echo $insumos_registros_list->FormKeyCountName ?>';
	loadjs.done("finsumos_registroslist");
});
var finsumos_registroslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finsumos_registroslistsrch = currentSearchForm = new ew.Form("finsumos_registroslistsrch");

	// Dynamic selection lists
	// Filters

	finsumos_registroslistsrch.filterList = <?php echo $insumos_registros_list->getFilterList() ?>;
	loadjs.done("finsumos_registroslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$insumos_registros_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($insumos_registros_list->TotalRecords > 0 && $insumos_registros_list->ExportOptions->visible()) { ?>
<?php $insumos_registros_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($insumos_registros_list->ImportOptions->visible()) { ?>
<?php $insumos_registros_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($insumos_registros_list->SearchOptions->visible()) { ?>
<?php $insumos_registros_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($insumos_registros_list->FilterOptions->visible()) { ?>
<?php $insumos_registros_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$insumos_registros_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$insumos_registros_list->isExport() && !$insumos_registros->CurrentAction) { ?>
<form name="finsumos_registroslistsrch" id="finsumos_registroslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finsumos_registroslistsrch-search-panel" class="<?php echo $insumos_registros_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="insumos_registros">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $insumos_registros_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($insumos_registros_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($insumos_registros_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $insumos_registros_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($insumos_registros_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($insumos_registros_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($insumos_registros_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($insumos_registros_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $insumos_registros_list->showPageHeader(); ?>
<?php
$insumos_registros_list->showMessage();
?>
<?php if ($insumos_registros_list->TotalRecords > 0 || $insumos_registros->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($insumos_registros_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> insumos_registros">
<?php if (!$insumos_registros_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$insumos_registros_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $insumos_registros_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $insumos_registros_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finsumos_registroslist" id="finsumos_registroslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos_registros">
<div id="gmp_insumos_registros" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($insumos_registros_list->TotalRecords > 0 || $insumos_registros_list->isGridEdit()) { ?>
<table id="tbl_insumos_registroslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$insumos_registros->RowType = ROWTYPE_HEADER;

// Render list options
$insumos_registros_list->renderListOptions();

// Render list options (header, left)
$insumos_registros_list->ListOptions->render("header", "left");
?>
<?php if ($insumos_registros_list->id->Visible) { // id ?>
	<?php if ($insumos_registros_list->SortUrl($insumos_registros_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $insumos_registros_list->id->headerCellClass() ?>"><div id="elh_insumos_registros_id" class="insumos_registros_id"><div class="ew-table-header-caption"><?php echo $insumos_registros_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $insumos_registros_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_registros_list->SortUrl($insumos_registros_list->id) ?>', 1);"><div id="elh_insumos_registros_id" class="insumos_registros_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_registros_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($insumos_registros_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_registros_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($insumos_registros_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($insumos_registros_list->SortUrl($insumos_registros_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $insumos_registros_list->cod_casopreh->headerCellClass() ?>"><div id="elh_insumos_registros_cod_casopreh" class="insumos_registros_cod_casopreh"><div class="ew-table-header-caption"><?php echo $insumos_registros_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $insumos_registros_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_registros_list->SortUrl($insumos_registros_list->cod_casopreh) ?>', 1);"><div id="elh_insumos_registros_cod_casopreh" class="insumos_registros_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_registros_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($insumos_registros_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_registros_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($insumos_registros_list->insumos_id->Visible) { // insumos_id ?>
	<?php if ($insumos_registros_list->SortUrl($insumos_registros_list->insumos_id) == "") { ?>
		<th data-name="insumos_id" class="<?php echo $insumos_registros_list->insumos_id->headerCellClass() ?>"><div id="elh_insumos_registros_insumos_id" class="insumos_registros_insumos_id"><div class="ew-table-header-caption"><?php echo $insumos_registros_list->insumos_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="insumos_id" class="<?php echo $insumos_registros_list->insumos_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_registros_list->SortUrl($insumos_registros_list->insumos_id) ?>', 1);"><div id="elh_insumos_registros_insumos_id" class="insumos_registros_insumos_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_registros_list->insumos_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($insumos_registros_list->insumos_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_registros_list->insumos_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($insumos_registros_list->cantidad->Visible) { // cantidad ?>
	<?php if ($insumos_registros_list->SortUrl($insumos_registros_list->cantidad) == "") { ?>
		<th data-name="cantidad" class="<?php echo $insumos_registros_list->cantidad->headerCellClass() ?>"><div id="elh_insumos_registros_cantidad" class="insumos_registros_cantidad"><div class="ew-table-header-caption"><?php echo $insumos_registros_list->cantidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cantidad" class="<?php echo $insumos_registros_list->cantidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $insumos_registros_list->SortUrl($insumos_registros_list->cantidad) ?>', 1);"><div id="elh_insumos_registros_cantidad" class="insumos_registros_cantidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $insumos_registros_list->cantidad->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($insumos_registros_list->cantidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($insumos_registros_list->cantidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$insumos_registros_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($insumos_registros_list->ExportAll && $insumos_registros_list->isExport()) {
	$insumos_registros_list->StopRecord = $insumos_registros_list->TotalRecords;
} else {

	// Set the last record to display
	if ($insumos_registros_list->TotalRecords > $insumos_registros_list->StartRecord + $insumos_registros_list->DisplayRecords - 1)
		$insumos_registros_list->StopRecord = $insumos_registros_list->StartRecord + $insumos_registros_list->DisplayRecords - 1;
	else
		$insumos_registros_list->StopRecord = $insumos_registros_list->TotalRecords;
}
$insumos_registros_list->RecordCount = $insumos_registros_list->StartRecord - 1;
if ($insumos_registros_list->Recordset && !$insumos_registros_list->Recordset->EOF) {
	$insumos_registros_list->Recordset->moveFirst();
	$selectLimit = $insumos_registros_list->UseSelectLimit;
	if (!$selectLimit && $insumos_registros_list->StartRecord > 1)
		$insumos_registros_list->Recordset->move($insumos_registros_list->StartRecord - 1);
} elseif (!$insumos_registros->AllowAddDeleteRow && $insumos_registros_list->StopRecord == 0) {
	$insumos_registros_list->StopRecord = $insumos_registros->GridAddRowCount;
}

// Initialize aggregate
$insumos_registros->RowType = ROWTYPE_AGGREGATEINIT;
$insumos_registros->resetAttributes();
$insumos_registros_list->renderRow();
while ($insumos_registros_list->RecordCount < $insumos_registros_list->StopRecord) {
	$insumos_registros_list->RecordCount++;
	if ($insumos_registros_list->RecordCount >= $insumos_registros_list->StartRecord) {
		$insumos_registros_list->RowCount++;

		// Set up key count
		$insumos_registros_list->KeyCount = $insumos_registros_list->RowIndex;

		// Init row class and style
		$insumos_registros->resetAttributes();
		$insumos_registros->CssClass = "";
		if ($insumos_registros_list->isGridAdd()) {
		} else {
			$insumos_registros_list->loadRowValues($insumos_registros_list->Recordset); // Load row values
		}
		$insumos_registros->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$insumos_registros->RowAttrs->merge(["data-rowindex" => $insumos_registros_list->RowCount, "id" => "r" . $insumos_registros_list->RowCount . "_insumos_registros", "data-rowtype" => $insumos_registros->RowType]);

		// Render row
		$insumos_registros_list->renderRow();

		// Render list options
		$insumos_registros_list->renderListOptions();
?>
	<tr <?php echo $insumos_registros->rowAttributes() ?>>
<?php

// Render list options (body, left)
$insumos_registros_list->ListOptions->render("body", "left", $insumos_registros_list->RowCount);
?>
	<?php if ($insumos_registros_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $insumos_registros_list->id->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_list->RowCount ?>_insumos_registros_id">
<span<?php echo $insumos_registros_list->id->viewAttributes() ?>><?php echo $insumos_registros_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($insumos_registros_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $insumos_registros_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_list->RowCount ?>_insumos_registros_cod_casopreh">
<span<?php echo $insumos_registros_list->cod_casopreh->viewAttributes() ?>><?php echo $insumos_registros_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($insumos_registros_list->insumos_id->Visible) { // insumos_id ?>
		<td data-name="insumos_id" <?php echo $insumos_registros_list->insumos_id->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_list->RowCount ?>_insumos_registros_insumos_id">
<span<?php echo $insumos_registros_list->insumos_id->viewAttributes() ?>><?php echo $insumos_registros_list->insumos_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($insumos_registros_list->cantidad->Visible) { // cantidad ?>
		<td data-name="cantidad" <?php echo $insumos_registros_list->cantidad->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_list->RowCount ?>_insumos_registros_cantidad">
<span<?php echo $insumos_registros_list->cantidad->viewAttributes() ?>><?php echo $insumos_registros_list->cantidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$insumos_registros_list->ListOptions->render("body", "right", $insumos_registros_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$insumos_registros_list->isGridAdd())
		$insumos_registros_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$insumos_registros->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($insumos_registros_list->Recordset)
	$insumos_registros_list->Recordset->Close();
?>
<?php if (!$insumos_registros_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$insumos_registros_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $insumos_registros_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $insumos_registros_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($insumos_registros_list->TotalRecords == 0 && !$insumos_registros->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $insumos_registros_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$insumos_registros_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$insumos_registros_list->isExport()) { ?>
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
$insumos_registros_list->terminate();
?>