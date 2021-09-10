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
$asigna_ambulancia_list = new asigna_ambulancia_list();

// Run the page
$asigna_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$asigna_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$asigna_ambulancia_list->isExport()) { ?>
<script>
var fasigna_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fasigna_ambulancialist = currentForm = new ew.Form("fasigna_ambulancialist", "list");
	fasigna_ambulancialist.formKeyCountName = '<?php echo $asigna_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("fasigna_ambulancialist");
});
var fasigna_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fasigna_ambulancialistsrch = currentSearchForm = new ew.Form("fasigna_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	fasigna_ambulancialistsrch.filterList = <?php echo $asigna_ambulancia_list->getFilterList() ?>;
	loadjs.done("fasigna_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$asigna_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($asigna_ambulancia_list->TotalRecords > 0 && $asigna_ambulancia_list->ExportOptions->visible()) { ?>
<?php $asigna_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($asigna_ambulancia_list->ImportOptions->visible()) { ?>
<?php $asigna_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($asigna_ambulancia_list->SearchOptions->visible()) { ?>
<?php $asigna_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($asigna_ambulancia_list->FilterOptions->visible()) { ?>
<?php $asigna_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$asigna_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$asigna_ambulancia_list->isExport() && !$asigna_ambulancia->CurrentAction) { ?>
<form name="fasigna_ambulancialistsrch" id="fasigna_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fasigna_ambulancialistsrch-search-panel" class="<?php echo $asigna_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="asigna_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $asigna_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($asigna_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($asigna_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $asigna_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($asigna_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($asigna_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($asigna_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($asigna_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $asigna_ambulancia_list->showPageHeader(); ?>
<?php
$asigna_ambulancia_list->showMessage();
?>
<?php if ($asigna_ambulancia_list->TotalRecords > 0 || $asigna_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($asigna_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> asigna_ambulancia">
<?php if (!$asigna_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$asigna_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $asigna_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $asigna_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fasigna_ambulancialist" id="fasigna_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="asigna_ambulancia">
<div id="gmp_asigna_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($asigna_ambulancia_list->TotalRecords > 0 || $asigna_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_asigna_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$asigna_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$asigna_ambulancia_list->renderListOptions();

// Render list options (header, left)
$asigna_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($asigna_ambulancia_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<?php if ($asigna_ambulancia_list->SortUrl($asigna_ambulancia_list->cod_ambulancias) == "") { ?>
		<th data-name="cod_ambulancias" class="<?php echo $asigna_ambulancia_list->cod_ambulancias->headerCellClass() ?>"><div id="elh_asigna_ambulancia_cod_ambulancias" class="asigna_ambulancia_cod_ambulancias"><div class="ew-table-header-caption"><?php echo $asigna_ambulancia_list->cod_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancias" class="<?php echo $asigna_ambulancia_list->cod_ambulancias->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $asigna_ambulancia_list->SortUrl($asigna_ambulancia_list->cod_ambulancias) ?>', 1);"><div id="elh_asigna_ambulancia_cod_ambulancias" class="asigna_ambulancia_cod_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $asigna_ambulancia_list->cod_ambulancias->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($asigna_ambulancia_list->cod_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($asigna_ambulancia_list->cod_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($asigna_ambulancia_list->placas->Visible) { // placas ?>
	<?php if ($asigna_ambulancia_list->SortUrl($asigna_ambulancia_list->placas) == "") { ?>
		<th data-name="placas" class="<?php echo $asigna_ambulancia_list->placas->headerCellClass() ?>"><div id="elh_asigna_ambulancia_placas" class="asigna_ambulancia_placas"><div class="ew-table-header-caption"><?php echo $asigna_ambulancia_list->placas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="placas" class="<?php echo $asigna_ambulancia_list->placas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $asigna_ambulancia_list->SortUrl($asigna_ambulancia_list->placas) ?>', 1);"><div id="elh_asigna_ambulancia_placas" class="asigna_ambulancia_placas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $asigna_ambulancia_list->placas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($asigna_ambulancia_list->placas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($asigna_ambulancia_list->placas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$asigna_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($asigna_ambulancia_list->ExportAll && $asigna_ambulancia_list->isExport()) {
	$asigna_ambulancia_list->StopRecord = $asigna_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($asigna_ambulancia_list->TotalRecords > $asigna_ambulancia_list->StartRecord + $asigna_ambulancia_list->DisplayRecords - 1)
		$asigna_ambulancia_list->StopRecord = $asigna_ambulancia_list->StartRecord + $asigna_ambulancia_list->DisplayRecords - 1;
	else
		$asigna_ambulancia_list->StopRecord = $asigna_ambulancia_list->TotalRecords;
}
$asigna_ambulancia_list->RecordCount = $asigna_ambulancia_list->StartRecord - 1;
if ($asigna_ambulancia_list->Recordset && !$asigna_ambulancia_list->Recordset->EOF) {
	$asigna_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $asigna_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $asigna_ambulancia_list->StartRecord > 1)
		$asigna_ambulancia_list->Recordset->move($asigna_ambulancia_list->StartRecord - 1);
} elseif (!$asigna_ambulancia->AllowAddDeleteRow && $asigna_ambulancia_list->StopRecord == 0) {
	$asigna_ambulancia_list->StopRecord = $asigna_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$asigna_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$asigna_ambulancia->resetAttributes();
$asigna_ambulancia_list->renderRow();
while ($asigna_ambulancia_list->RecordCount < $asigna_ambulancia_list->StopRecord) {
	$asigna_ambulancia_list->RecordCount++;
	if ($asigna_ambulancia_list->RecordCount >= $asigna_ambulancia_list->StartRecord) {
		$asigna_ambulancia_list->RowCount++;

		// Set up key count
		$asigna_ambulancia_list->KeyCount = $asigna_ambulancia_list->RowIndex;

		// Init row class and style
		$asigna_ambulancia->resetAttributes();
		$asigna_ambulancia->CssClass = "";
		if ($asigna_ambulancia_list->isGridAdd()) {
		} else {
			$asigna_ambulancia_list->loadRowValues($asigna_ambulancia_list->Recordset); // Load row values
		}
		$asigna_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$asigna_ambulancia->RowAttrs->merge(["data-rowindex" => $asigna_ambulancia_list->RowCount, "id" => "r" . $asigna_ambulancia_list->RowCount . "_asigna_ambulancia", "data-rowtype" => $asigna_ambulancia->RowType]);

		// Render row
		$asigna_ambulancia_list->renderRow();

		// Render list options
		$asigna_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $asigna_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$asigna_ambulancia_list->ListOptions->render("body", "left", $asigna_ambulancia_list->RowCount);
?>
	<?php if ($asigna_ambulancia_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td data-name="cod_ambulancias" <?php echo $asigna_ambulancia_list->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $asigna_ambulancia_list->RowCount ?>_asigna_ambulancia_cod_ambulancias">
<span<?php echo $asigna_ambulancia_list->cod_ambulancias->viewAttributes() ?>><?php echo $asigna_ambulancia_list->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($asigna_ambulancia_list->placas->Visible) { // placas ?>
		<td data-name="placas" <?php echo $asigna_ambulancia_list->placas->cellAttributes() ?>>
<span id="el<?php echo $asigna_ambulancia_list->RowCount ?>_asigna_ambulancia_placas">
<span<?php echo $asigna_ambulancia_list->placas->viewAttributes() ?>><?php echo $asigna_ambulancia_list->placas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$asigna_ambulancia_list->ListOptions->render("body", "right", $asigna_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$asigna_ambulancia_list->isGridAdd())
		$asigna_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$asigna_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($asigna_ambulancia_list->Recordset)
	$asigna_ambulancia_list->Recordset->Close();
?>
<?php if (!$asigna_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$asigna_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $asigna_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $asigna_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($asigna_ambulancia_list->TotalRecords == 0 && !$asigna_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $asigna_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$asigna_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$asigna_ambulancia_list->isExport()) { ?>
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
$asigna_ambulancia_list->terminate();
?>