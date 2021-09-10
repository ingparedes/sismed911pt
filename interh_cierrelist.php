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
$interh_cierre_list = new interh_cierre_list();

// Run the page
$interh_cierre_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_cierre_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_cierre_list->isExport()) { ?>
<script>
var finterh_cierrelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_cierrelist = currentForm = new ew.Form("finterh_cierrelist", "list");
	finterh_cierrelist.formKeyCountName = '<?php echo $interh_cierre_list->FormKeyCountName ?>';
	loadjs.done("finterh_cierrelist");
});
var finterh_cierrelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finterh_cierrelistsrch = currentSearchForm = new ew.Form("finterh_cierrelistsrch");

	// Dynamic selection lists
	// Filters

	finterh_cierrelistsrch.filterList = <?php echo $interh_cierre_list->getFilterList() ?>;
	loadjs.done("finterh_cierrelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_cierre_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_cierre_list->TotalRecords > 0 && $interh_cierre_list->ExportOptions->visible()) { ?>
<?php $interh_cierre_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_cierre_list->ImportOptions->visible()) { ?>
<?php $interh_cierre_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_cierre_list->SearchOptions->visible()) { ?>
<?php $interh_cierre_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($interh_cierre_list->FilterOptions->visible()) { ?>
<?php $interh_cierre_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_cierre_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_cierre_list->isExport() && !$interh_cierre->CurrentAction) { ?>
<form name="finterh_cierrelistsrch" id="finterh_cierrelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finterh_cierrelistsrch-search-panel" class="<?php echo $interh_cierre_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_cierre">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $interh_cierre_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($interh_cierre_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($interh_cierre_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $interh_cierre_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($interh_cierre_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($interh_cierre_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($interh_cierre_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($interh_cierre_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $interh_cierre_list->showPageHeader(); ?>
<?php
$interh_cierre_list->showMessage();
?>
<?php if ($interh_cierre_list->TotalRecords > 0 || $interh_cierre->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_cierre_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_cierre">
<?php if (!$interh_cierre_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$interh_cierre_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_cierre_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_cierre_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finterh_cierrelist" id="finterh_cierrelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_cierre">
<div id="gmp_interh_cierre" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_cierre_list->TotalRecords > 0 || $interh_cierre_list->isGridEdit()) { ?>
<table id="tbl_interh_cierrelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_cierre->RowType = ROWTYPE_HEADER;

// Render list options
$interh_cierre_list->renderListOptions();

// Render list options (header, left)
$interh_cierre_list->ListOptions->render("header", "left");
?>
<?php if ($interh_cierre_list->id_cierre->Visible) { // id_cierre ?>
	<?php if ($interh_cierre_list->SortUrl($interh_cierre_list->id_cierre) == "") { ?>
		<th data-name="id_cierre" class="<?php echo $interh_cierre_list->id_cierre->headerCellClass() ?>"><div id="elh_interh_cierre_id_cierre" class="interh_cierre_id_cierre"><div class="ew-table-header-caption"><?php echo $interh_cierre_list->id_cierre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_cierre" class="<?php echo $interh_cierre_list->id_cierre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_cierre_list->SortUrl($interh_cierre_list->id_cierre) ?>', 1);"><div id="elh_interh_cierre_id_cierre" class="interh_cierre_id_cierre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_cierre_list->id_cierre->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_cierre_list->id_cierre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_cierre_list->id_cierre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_cierre_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($interh_cierre_list->SortUrl($interh_cierre_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_cierre_list->cod_casointerh->headerCellClass() ?>"><div id="elh_interh_cierre_cod_casointerh" class="interh_cierre_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_cierre_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_cierre_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_cierre_list->SortUrl($interh_cierre_list->cod_casointerh) ?>', 1);"><div id="elh_interh_cierre_cod_casointerh" class="interh_cierre_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_cierre_list->cod_casointerh->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_cierre_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_cierre_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_cierre_list->nombrecierre->Visible) { // nombrecierre ?>
	<?php if ($interh_cierre_list->SortUrl($interh_cierre_list->nombrecierre) == "") { ?>
		<th data-name="nombrecierre" class="<?php echo $interh_cierre_list->nombrecierre->headerCellClass() ?>"><div id="elh_interh_cierre_nombrecierre" class="interh_cierre_nombrecierre"><div class="ew-table-header-caption"><?php echo $interh_cierre_list->nombrecierre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombrecierre" class="<?php echo $interh_cierre_list->nombrecierre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_cierre_list->SortUrl($interh_cierre_list->nombrecierre) ?>', 1);"><div id="elh_interh_cierre_nombrecierre" class="interh_cierre_nombrecierre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_cierre_list->nombrecierre->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_cierre_list->nombrecierre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_cierre_list->nombrecierre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_cierre_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_cierre_list->ExportAll && $interh_cierre_list->isExport()) {
	$interh_cierre_list->StopRecord = $interh_cierre_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_cierre_list->TotalRecords > $interh_cierre_list->StartRecord + $interh_cierre_list->DisplayRecords - 1)
		$interh_cierre_list->StopRecord = $interh_cierre_list->StartRecord + $interh_cierre_list->DisplayRecords - 1;
	else
		$interh_cierre_list->StopRecord = $interh_cierre_list->TotalRecords;
}
$interh_cierre_list->RecordCount = $interh_cierre_list->StartRecord - 1;
if ($interh_cierre_list->Recordset && !$interh_cierre_list->Recordset->EOF) {
	$interh_cierre_list->Recordset->moveFirst();
	$selectLimit = $interh_cierre_list->UseSelectLimit;
	if (!$selectLimit && $interh_cierre_list->StartRecord > 1)
		$interh_cierre_list->Recordset->move($interh_cierre_list->StartRecord - 1);
} elseif (!$interh_cierre->AllowAddDeleteRow && $interh_cierre_list->StopRecord == 0) {
	$interh_cierre_list->StopRecord = $interh_cierre->GridAddRowCount;
}

// Initialize aggregate
$interh_cierre->RowType = ROWTYPE_AGGREGATEINIT;
$interh_cierre->resetAttributes();
$interh_cierre_list->renderRow();
while ($interh_cierre_list->RecordCount < $interh_cierre_list->StopRecord) {
	$interh_cierre_list->RecordCount++;
	if ($interh_cierre_list->RecordCount >= $interh_cierre_list->StartRecord) {
		$interh_cierre_list->RowCount++;

		// Set up key count
		$interh_cierre_list->KeyCount = $interh_cierre_list->RowIndex;

		// Init row class and style
		$interh_cierre->resetAttributes();
		$interh_cierre->CssClass = "";
		if ($interh_cierre_list->isGridAdd()) {
		} else {
			$interh_cierre_list->loadRowValues($interh_cierre_list->Recordset); // Load row values
		}
		$interh_cierre->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_cierre->RowAttrs->merge(["data-rowindex" => $interh_cierre_list->RowCount, "id" => "r" . $interh_cierre_list->RowCount . "_interh_cierre", "data-rowtype" => $interh_cierre->RowType]);

		// Render row
		$interh_cierre_list->renderRow();

		// Render list options
		$interh_cierre_list->renderListOptions();
?>
	<tr <?php echo $interh_cierre->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_cierre_list->ListOptions->render("body", "left", $interh_cierre_list->RowCount);
?>
	<?php if ($interh_cierre_list->id_cierre->Visible) { // id_cierre ?>
		<td data-name="id_cierre" <?php echo $interh_cierre_list->id_cierre->cellAttributes() ?>>
<span id="el<?php echo $interh_cierre_list->RowCount ?>_interh_cierre_id_cierre">
<span<?php echo $interh_cierre_list->id_cierre->viewAttributes() ?>><?php echo $interh_cierre_list->id_cierre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_cierre_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $interh_cierre_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_cierre_list->RowCount ?>_interh_cierre_cod_casointerh">
<span<?php echo $interh_cierre_list->cod_casointerh->viewAttributes() ?>><?php echo $interh_cierre_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_cierre_list->nombrecierre->Visible) { // nombrecierre ?>
		<td data-name="nombrecierre" <?php echo $interh_cierre_list->nombrecierre->cellAttributes() ?>>
<span id="el<?php echo $interh_cierre_list->RowCount ?>_interh_cierre_nombrecierre">
<span<?php echo $interh_cierre_list->nombrecierre->viewAttributes() ?>><?php echo $interh_cierre_list->nombrecierre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_cierre_list->ListOptions->render("body", "right", $interh_cierre_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$interh_cierre_list->isGridAdd())
		$interh_cierre_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_cierre->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_cierre_list->Recordset)
	$interh_cierre_list->Recordset->Close();
?>
<?php if (!$interh_cierre_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_cierre_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_cierre_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_cierre_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_cierre_list->TotalRecords == 0 && !$interh_cierre->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_cierre_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$interh_cierre_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_cierre_list->isExport()) { ?>
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
$interh_cierre_list->terminate();
?>