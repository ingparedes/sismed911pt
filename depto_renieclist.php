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
$depto_reniec_list = new depto_reniec_list();

// Run the page
$depto_reniec_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$depto_reniec_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$depto_reniec_list->isExport()) { ?>
<script>
var fdepto_renieclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdepto_renieclist = currentForm = new ew.Form("fdepto_renieclist", "list");
	fdepto_renieclist.formKeyCountName = '<?php echo $depto_reniec_list->FormKeyCountName ?>';
	loadjs.done("fdepto_renieclist");
});
var fdepto_renieclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdepto_renieclistsrch = currentSearchForm = new ew.Form("fdepto_renieclistsrch");

	// Dynamic selection lists
	// Filters

	fdepto_renieclistsrch.filterList = <?php echo $depto_reniec_list->getFilterList() ?>;
	loadjs.done("fdepto_renieclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$depto_reniec_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($depto_reniec_list->TotalRecords > 0 && $depto_reniec_list->ExportOptions->visible()) { ?>
<?php $depto_reniec_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($depto_reniec_list->ImportOptions->visible()) { ?>
<?php $depto_reniec_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($depto_reniec_list->SearchOptions->visible()) { ?>
<?php $depto_reniec_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($depto_reniec_list->FilterOptions->visible()) { ?>
<?php $depto_reniec_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$depto_reniec_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$depto_reniec_list->isExport() && !$depto_reniec->CurrentAction) { ?>
<form name="fdepto_renieclistsrch" id="fdepto_renieclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdepto_renieclistsrch-search-panel" class="<?php echo $depto_reniec_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="depto_reniec">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $depto_reniec_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($depto_reniec_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($depto_reniec_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $depto_reniec_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($depto_reniec_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($depto_reniec_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($depto_reniec_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($depto_reniec_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $depto_reniec_list->showPageHeader(); ?>
<?php
$depto_reniec_list->showMessage();
?>
<?php if ($depto_reniec_list->TotalRecords > 0 || $depto_reniec->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($depto_reniec_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> depto_reniec">
<?php if (!$depto_reniec_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$depto_reniec_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $depto_reniec_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $depto_reniec_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdepto_renieclist" id="fdepto_renieclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depto_reniec">
<div id="gmp_depto_reniec" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($depto_reniec_list->TotalRecords > 0 || $depto_reniec_list->isGridEdit()) { ?>
<table id="tbl_depto_renieclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$depto_reniec->RowType = ROWTYPE_HEADER;

// Render list options
$depto_reniec_list->renderListOptions();

// Render list options (header, left)
$depto_reniec_list->ListOptions->render("header", "left");
?>
<?php if ($depto_reniec_list->cod_dpto->Visible) { // cod_dpto ?>
	<?php if ($depto_reniec_list->SortUrl($depto_reniec_list->cod_dpto) == "") { ?>
		<th data-name="cod_dpto" class="<?php echo $depto_reniec_list->cod_dpto->headerCellClass() ?>"><div id="elh_depto_reniec_cod_dpto" class="depto_reniec_cod_dpto"><div class="ew-table-header-caption"><?php echo $depto_reniec_list->cod_dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_dpto" class="<?php echo $depto_reniec_list->cod_dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depto_reniec_list->SortUrl($depto_reniec_list->cod_dpto) ?>', 1);"><div id="elh_depto_reniec_cod_dpto" class="depto_reniec_cod_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depto_reniec_list->cod_dpto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depto_reniec_list->cod_dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depto_reniec_list->cod_dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depto_reniec_list->nombre_dpto->Visible) { // nombre_dpto ?>
	<?php if ($depto_reniec_list->SortUrl($depto_reniec_list->nombre_dpto) == "") { ?>
		<th data-name="nombre_dpto" class="<?php echo $depto_reniec_list->nombre_dpto->headerCellClass() ?>"><div id="elh_depto_reniec_nombre_dpto" class="depto_reniec_nombre_dpto"><div class="ew-table-header-caption"><?php echo $depto_reniec_list->nombre_dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_dpto" class="<?php echo $depto_reniec_list->nombre_dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depto_reniec_list->SortUrl($depto_reniec_list->nombre_dpto) ?>', 1);"><div id="elh_depto_reniec_nombre_dpto" class="depto_reniec_nombre_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depto_reniec_list->nombre_dpto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depto_reniec_list->nombre_dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depto_reniec_list->nombre_dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$depto_reniec_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($depto_reniec_list->ExportAll && $depto_reniec_list->isExport()) {
	$depto_reniec_list->StopRecord = $depto_reniec_list->TotalRecords;
} else {

	// Set the last record to display
	if ($depto_reniec_list->TotalRecords > $depto_reniec_list->StartRecord + $depto_reniec_list->DisplayRecords - 1)
		$depto_reniec_list->StopRecord = $depto_reniec_list->StartRecord + $depto_reniec_list->DisplayRecords - 1;
	else
		$depto_reniec_list->StopRecord = $depto_reniec_list->TotalRecords;
}
$depto_reniec_list->RecordCount = $depto_reniec_list->StartRecord - 1;
if ($depto_reniec_list->Recordset && !$depto_reniec_list->Recordset->EOF) {
	$depto_reniec_list->Recordset->moveFirst();
	$selectLimit = $depto_reniec_list->UseSelectLimit;
	if (!$selectLimit && $depto_reniec_list->StartRecord > 1)
		$depto_reniec_list->Recordset->move($depto_reniec_list->StartRecord - 1);
} elseif (!$depto_reniec->AllowAddDeleteRow && $depto_reniec_list->StopRecord == 0) {
	$depto_reniec_list->StopRecord = $depto_reniec->GridAddRowCount;
}

// Initialize aggregate
$depto_reniec->RowType = ROWTYPE_AGGREGATEINIT;
$depto_reniec->resetAttributes();
$depto_reniec_list->renderRow();
while ($depto_reniec_list->RecordCount < $depto_reniec_list->StopRecord) {
	$depto_reniec_list->RecordCount++;
	if ($depto_reniec_list->RecordCount >= $depto_reniec_list->StartRecord) {
		$depto_reniec_list->RowCount++;

		// Set up key count
		$depto_reniec_list->KeyCount = $depto_reniec_list->RowIndex;

		// Init row class and style
		$depto_reniec->resetAttributes();
		$depto_reniec->CssClass = "";
		if ($depto_reniec_list->isGridAdd()) {
		} else {
			$depto_reniec_list->loadRowValues($depto_reniec_list->Recordset); // Load row values
		}
		$depto_reniec->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$depto_reniec->RowAttrs->merge(["data-rowindex" => $depto_reniec_list->RowCount, "id" => "r" . $depto_reniec_list->RowCount . "_depto_reniec", "data-rowtype" => $depto_reniec->RowType]);

		// Render row
		$depto_reniec_list->renderRow();

		// Render list options
		$depto_reniec_list->renderListOptions();
?>
	<tr <?php echo $depto_reniec->rowAttributes() ?>>
<?php

// Render list options (body, left)
$depto_reniec_list->ListOptions->render("body", "left", $depto_reniec_list->RowCount);
?>
	<?php if ($depto_reniec_list->cod_dpto->Visible) { // cod_dpto ?>
		<td data-name="cod_dpto" <?php echo $depto_reniec_list->cod_dpto->cellAttributes() ?>>
<span id="el<?php echo $depto_reniec_list->RowCount ?>_depto_reniec_cod_dpto">
<span<?php echo $depto_reniec_list->cod_dpto->viewAttributes() ?>><?php echo $depto_reniec_list->cod_dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depto_reniec_list->nombre_dpto->Visible) { // nombre_dpto ?>
		<td data-name="nombre_dpto" <?php echo $depto_reniec_list->nombre_dpto->cellAttributes() ?>>
<span id="el<?php echo $depto_reniec_list->RowCount ?>_depto_reniec_nombre_dpto">
<span<?php echo $depto_reniec_list->nombre_dpto->viewAttributes() ?>><?php echo $depto_reniec_list->nombre_dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$depto_reniec_list->ListOptions->render("body", "right", $depto_reniec_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$depto_reniec_list->isGridAdd())
		$depto_reniec_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$depto_reniec->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($depto_reniec_list->Recordset)
	$depto_reniec_list->Recordset->Close();
?>
<?php if (!$depto_reniec_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$depto_reniec_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $depto_reniec_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $depto_reniec_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($depto_reniec_list->TotalRecords == 0 && !$depto_reniec->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $depto_reniec_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$depto_reniec_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$depto_reniec_list->isExport()) { ?>
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
$depto_reniec_list->terminate();
?>