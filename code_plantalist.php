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
$code_planta_list = new code_planta_list();

// Run the page
$code_planta_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$code_planta_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$code_planta_list->isExport()) { ?>
<script>
var fcode_plantalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcode_plantalist = currentForm = new ew.Form("fcode_plantalist", "list");
	fcode_plantalist.formKeyCountName = '<?php echo $code_planta_list->FormKeyCountName ?>';
	loadjs.done("fcode_plantalist");
});
var fcode_plantalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcode_plantalistsrch = currentSearchForm = new ew.Form("fcode_plantalistsrch");

	// Dynamic selection lists
	// Filters

	fcode_plantalistsrch.filterList = <?php echo $code_planta_list->getFilterList() ?>;
	loadjs.done("fcode_plantalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$code_planta_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($code_planta_list->TotalRecords > 0 && $code_planta_list->ExportOptions->visible()) { ?>
<?php $code_planta_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($code_planta_list->ImportOptions->visible()) { ?>
<?php $code_planta_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($code_planta_list->SearchOptions->visible()) { ?>
<?php $code_planta_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($code_planta_list->FilterOptions->visible()) { ?>
<?php $code_planta_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$code_planta_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$code_planta_list->isExport() && !$code_planta->CurrentAction) { ?>
<form name="fcode_plantalistsrch" id="fcode_plantalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcode_plantalistsrch-search-panel" class="<?php echo $code_planta_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="code_planta">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $code_planta_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($code_planta_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($code_planta_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $code_planta_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($code_planta_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($code_planta_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($code_planta_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($code_planta_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $code_planta_list->showPageHeader(); ?>
<?php
$code_planta_list->showMessage();
?>
<?php if ($code_planta_list->TotalRecords > 0 || $code_planta->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($code_planta_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> code_planta">
<?php if (!$code_planta_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$code_planta_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $code_planta_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $code_planta_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcode_plantalist" id="fcode_plantalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="code_planta">
<div id="gmp_code_planta" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($code_planta_list->TotalRecords > 0 || $code_planta_list->isGridEdit()) { ?>
<table id="tbl_code_plantalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$code_planta->RowType = ROWTYPE_HEADER;

// Render list options
$code_planta_list->renderListOptions();

// Render list options (header, left)
$code_planta_list->ListOptions->render("header", "left");
?>
<?php if ($code_planta_list->idacode->Visible) { // idacode ?>
	<?php if ($code_planta_list->SortUrl($code_planta_list->idacode) == "") { ?>
		<th data-name="idacode" class="<?php echo $code_planta_list->idacode->headerCellClass() ?>"><div id="elh_code_planta_idacode" class="code_planta_idacode"><div class="ew-table-header-caption"><?php echo $code_planta_list->idacode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="idacode" class="<?php echo $code_planta_list->idacode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $code_planta_list->SortUrl($code_planta_list->idacode) ?>', 1);"><div id="elh_code_planta_idacode" class="code_planta_idacode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $code_planta_list->idacode->caption() ?></span><span class="ew-table-header-sort"><?php if ($code_planta_list->idacode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($code_planta_list->idacode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($code_planta_list->nombreacode->Visible) { // nombreacode ?>
	<?php if ($code_planta_list->SortUrl($code_planta_list->nombreacode) == "") { ?>
		<th data-name="nombreacode" class="<?php echo $code_planta_list->nombreacode->headerCellClass() ?>"><div id="elh_code_planta_nombreacode" class="code_planta_nombreacode"><div class="ew-table-header-caption"><?php echo $code_planta_list->nombreacode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombreacode" class="<?php echo $code_planta_list->nombreacode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $code_planta_list->SortUrl($code_planta_list->nombreacode) ?>', 1);"><div id="elh_code_planta_nombreacode" class="code_planta_nombreacode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $code_planta_list->nombreacode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($code_planta_list->nombreacode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($code_planta_list->nombreacode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$code_planta_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($code_planta_list->ExportAll && $code_planta_list->isExport()) {
	$code_planta_list->StopRecord = $code_planta_list->TotalRecords;
} else {

	// Set the last record to display
	if ($code_planta_list->TotalRecords > $code_planta_list->StartRecord + $code_planta_list->DisplayRecords - 1)
		$code_planta_list->StopRecord = $code_planta_list->StartRecord + $code_planta_list->DisplayRecords - 1;
	else
		$code_planta_list->StopRecord = $code_planta_list->TotalRecords;
}
$code_planta_list->RecordCount = $code_planta_list->StartRecord - 1;
if ($code_planta_list->Recordset && !$code_planta_list->Recordset->EOF) {
	$code_planta_list->Recordset->moveFirst();
	$selectLimit = $code_planta_list->UseSelectLimit;
	if (!$selectLimit && $code_planta_list->StartRecord > 1)
		$code_planta_list->Recordset->move($code_planta_list->StartRecord - 1);
} elseif (!$code_planta->AllowAddDeleteRow && $code_planta_list->StopRecord == 0) {
	$code_planta_list->StopRecord = $code_planta->GridAddRowCount;
}

// Initialize aggregate
$code_planta->RowType = ROWTYPE_AGGREGATEINIT;
$code_planta->resetAttributes();
$code_planta_list->renderRow();
while ($code_planta_list->RecordCount < $code_planta_list->StopRecord) {
	$code_planta_list->RecordCount++;
	if ($code_planta_list->RecordCount >= $code_planta_list->StartRecord) {
		$code_planta_list->RowCount++;

		// Set up key count
		$code_planta_list->KeyCount = $code_planta_list->RowIndex;

		// Init row class and style
		$code_planta->resetAttributes();
		$code_planta->CssClass = "";
		if ($code_planta_list->isGridAdd()) {
		} else {
			$code_planta_list->loadRowValues($code_planta_list->Recordset); // Load row values
		}
		$code_planta->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$code_planta->RowAttrs->merge(["data-rowindex" => $code_planta_list->RowCount, "id" => "r" . $code_planta_list->RowCount . "_code_planta", "data-rowtype" => $code_planta->RowType]);

		// Render row
		$code_planta_list->renderRow();

		// Render list options
		$code_planta_list->renderListOptions();
?>
	<tr <?php echo $code_planta->rowAttributes() ?>>
<?php

// Render list options (body, left)
$code_planta_list->ListOptions->render("body", "left", $code_planta_list->RowCount);
?>
	<?php if ($code_planta_list->idacode->Visible) { // idacode ?>
		<td data-name="idacode" <?php echo $code_planta_list->idacode->cellAttributes() ?>>
<span id="el<?php echo $code_planta_list->RowCount ?>_code_planta_idacode">
<span<?php echo $code_planta_list->idacode->viewAttributes() ?>><?php echo $code_planta_list->idacode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($code_planta_list->nombreacode->Visible) { // nombreacode ?>
		<td data-name="nombreacode" <?php echo $code_planta_list->nombreacode->cellAttributes() ?>>
<span id="el<?php echo $code_planta_list->RowCount ?>_code_planta_nombreacode">
<span<?php echo $code_planta_list->nombreacode->viewAttributes() ?>><?php echo $code_planta_list->nombreacode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$code_planta_list->ListOptions->render("body", "right", $code_planta_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$code_planta_list->isGridAdd())
		$code_planta_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$code_planta->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($code_planta_list->Recordset)
	$code_planta_list->Recordset->Close();
?>
<?php if (!$code_planta_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$code_planta_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $code_planta_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $code_planta_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($code_planta_list->TotalRecords == 0 && !$code_planta->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $code_planta_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$code_planta_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$code_planta_list->isExport()) { ?>
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
$code_planta_list->terminate();
?>