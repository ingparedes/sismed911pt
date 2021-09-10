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
$vista_cmultiple_list = new vista_cmultiple_list();

// Run the page
$vista_cmultiple_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vista_cmultiple_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$vista_cmultiple_list->isExport()) { ?>
<script>
var fvista_cmultiplelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fvista_cmultiplelist = currentForm = new ew.Form("fvista_cmultiplelist", "list");
	fvista_cmultiplelist.formKeyCountName = '<?php echo $vista_cmultiple_list->FormKeyCountName ?>';
	loadjs.done("fvista_cmultiplelist");
});
var fvista_cmultiplelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fvista_cmultiplelistsrch = currentSearchForm = new ew.Form("fvista_cmultiplelistsrch");

	// Dynamic selection lists
	// Filters

	fvista_cmultiplelistsrch.filterList = <?php echo $vista_cmultiple_list->getFilterList() ?>;
	loadjs.done("fvista_cmultiplelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$vista_cmultiple_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vista_cmultiple_list->TotalRecords > 0 && $vista_cmultiple_list->ExportOptions->visible()) { ?>
<?php $vista_cmultiple_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vista_cmultiple_list->ImportOptions->visible()) { ?>
<?php $vista_cmultiple_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vista_cmultiple_list->SearchOptions->visible()) { ?>
<?php $vista_cmultiple_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vista_cmultiple_list->FilterOptions->visible()) { ?>
<?php $vista_cmultiple_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$vista_cmultiple_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vista_cmultiple_list->isExport() && !$vista_cmultiple->CurrentAction) { ?>
<form name="fvista_cmultiplelistsrch" id="fvista_cmultiplelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fvista_cmultiplelistsrch-search-panel" class="<?php echo $vista_cmultiple_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vista_cmultiple">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $vista_cmultiple_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($vista_cmultiple_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($vista_cmultiple_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vista_cmultiple_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vista_cmultiple_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vista_cmultiple_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vista_cmultiple_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vista_cmultiple_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $vista_cmultiple_list->showPageHeader(); ?>
<?php
$vista_cmultiple_list->showMessage();
?>
<?php if ($vista_cmultiple_list->TotalRecords > 0 || $vista_cmultiple->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vista_cmultiple_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vista_cmultiple">
<?php if (!$vista_cmultiple_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vista_cmultiple_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vista_cmultiple_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vista_cmultiple_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvista_cmultiplelist" id="fvista_cmultiplelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vista_cmultiple">
<div id="gmp_vista_cmultiple" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($vista_cmultiple_list->TotalRecords > 0 || $vista_cmultiple_list->isGridEdit()) { ?>
<table id="tbl_vista_cmultiplelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vista_cmultiple->RowType = ROWTYPE_HEADER;

// Render list options
$vista_cmultiple_list->renderListOptions();

// Render list options (header, left)
$vista_cmultiple_list->ListOptions->render("header", "left");
?>
<?php if ($vista_cmultiple_list->nombre_es->Visible) { // nombre_es ?>
	<?php if ($vista_cmultiple_list->SortUrl($vista_cmultiple_list->nombre_es) == "") { ?>
		<th data-name="nombre_es" class="<?php echo $vista_cmultiple_list->nombre_es->headerCellClass() ?>"><div id="elh_vista_cmultiple_nombre_es" class="vista_cmultiple_nombre_es"><div class="ew-table-header-caption"><?php echo $vista_cmultiple_list->nombre_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_es" class="<?php echo $vista_cmultiple_list->nombre_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vista_cmultiple_list->SortUrl($vista_cmultiple_list->nombre_es) ?>', 1);"><div id="elh_vista_cmultiple_nombre_es" class="vista_cmultiple_nombre_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vista_cmultiple_list->nombre_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vista_cmultiple_list->nombre_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vista_cmultiple_list->nombre_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vista_cmultiple_list->caso_mltple->Visible) { // caso_mltple ?>
	<?php if ($vista_cmultiple_list->SortUrl($vista_cmultiple_list->caso_mltple) == "") { ?>
		<th data-name="caso_mltple" class="<?php echo $vista_cmultiple_list->caso_mltple->headerCellClass() ?>"><div id="elh_vista_cmultiple_caso_mltple" class="vista_cmultiple_caso_mltple"><div class="ew-table-header-caption"><?php echo $vista_cmultiple_list->caso_mltple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="caso_mltple" class="<?php echo $vista_cmultiple_list->caso_mltple->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vista_cmultiple_list->SortUrl($vista_cmultiple_list->caso_mltple) ?>', 1);"><div id="elh_vista_cmultiple_caso_mltple" class="vista_cmultiple_caso_mltple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vista_cmultiple_list->caso_mltple->caption() ?></span><span class="ew-table-header-sort"><?php if ($vista_cmultiple_list->caso_mltple->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vista_cmultiple_list->caso_mltple->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vista_cmultiple_list->cierre->Visible) { // cierre ?>
	<?php if ($vista_cmultiple_list->SortUrl($vista_cmultiple_list->cierre) == "") { ?>
		<th data-name="cierre" class="<?php echo $vista_cmultiple_list->cierre->headerCellClass() ?>"><div id="elh_vista_cmultiple_cierre" class="vista_cmultiple_cierre"><div class="ew-table-header-caption"><?php echo $vista_cmultiple_list->cierre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cierre" class="<?php echo $vista_cmultiple_list->cierre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $vista_cmultiple_list->SortUrl($vista_cmultiple_list->cierre) ?>', 1);"><div id="elh_vista_cmultiple_cierre" class="vista_cmultiple_cierre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vista_cmultiple_list->cierre->caption() ?></span><span class="ew-table-header-sort"><?php if ($vista_cmultiple_list->cierre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($vista_cmultiple_list->cierre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vista_cmultiple_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vista_cmultiple_list->ExportAll && $vista_cmultiple_list->isExport()) {
	$vista_cmultiple_list->StopRecord = $vista_cmultiple_list->TotalRecords;
} else {

	// Set the last record to display
	if ($vista_cmultiple_list->TotalRecords > $vista_cmultiple_list->StartRecord + $vista_cmultiple_list->DisplayRecords - 1)
		$vista_cmultiple_list->StopRecord = $vista_cmultiple_list->StartRecord + $vista_cmultiple_list->DisplayRecords - 1;
	else
		$vista_cmultiple_list->StopRecord = $vista_cmultiple_list->TotalRecords;
}
$vista_cmultiple_list->RecordCount = $vista_cmultiple_list->StartRecord - 1;
if ($vista_cmultiple_list->Recordset && !$vista_cmultiple_list->Recordset->EOF) {
	$vista_cmultiple_list->Recordset->moveFirst();
	$selectLimit = $vista_cmultiple_list->UseSelectLimit;
	if (!$selectLimit && $vista_cmultiple_list->StartRecord > 1)
		$vista_cmultiple_list->Recordset->move($vista_cmultiple_list->StartRecord - 1);
} elseif (!$vista_cmultiple->AllowAddDeleteRow && $vista_cmultiple_list->StopRecord == 0) {
	$vista_cmultiple_list->StopRecord = $vista_cmultiple->GridAddRowCount;
}

// Initialize aggregate
$vista_cmultiple->RowType = ROWTYPE_AGGREGATEINIT;
$vista_cmultiple->resetAttributes();
$vista_cmultiple_list->renderRow();
while ($vista_cmultiple_list->RecordCount < $vista_cmultiple_list->StopRecord) {
	$vista_cmultiple_list->RecordCount++;
	if ($vista_cmultiple_list->RecordCount >= $vista_cmultiple_list->StartRecord) {
		$vista_cmultiple_list->RowCount++;

		// Set up key count
		$vista_cmultiple_list->KeyCount = $vista_cmultiple_list->RowIndex;

		// Init row class and style
		$vista_cmultiple->resetAttributes();
		$vista_cmultiple->CssClass = "";
		if ($vista_cmultiple_list->isGridAdd()) {
		} else {
			$vista_cmultiple_list->loadRowValues($vista_cmultiple_list->Recordset); // Load row values
		}
		$vista_cmultiple->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vista_cmultiple->RowAttrs->merge(["data-rowindex" => $vista_cmultiple_list->RowCount, "id" => "r" . $vista_cmultiple_list->RowCount . "_vista_cmultiple", "data-rowtype" => $vista_cmultiple->RowType]);

		// Render row
		$vista_cmultiple_list->renderRow();

		// Render list options
		$vista_cmultiple_list->renderListOptions();
?>
	<tr <?php echo $vista_cmultiple->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vista_cmultiple_list->ListOptions->render("body", "left", $vista_cmultiple_list->RowCount);
?>
	<?php if ($vista_cmultiple_list->nombre_es->Visible) { // nombre_es ?>
		<td data-name="nombre_es" <?php echo $vista_cmultiple_list->nombre_es->cellAttributes() ?>>
<span id="el<?php echo $vista_cmultiple_list->RowCount ?>_vista_cmultiple_nombre_es">
<span<?php echo $vista_cmultiple_list->nombre_es->viewAttributes() ?>><?php echo $vista_cmultiple_list->nombre_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vista_cmultiple_list->caso_mltple->Visible) { // caso_mltple ?>
		<td data-name="caso_mltple" <?php echo $vista_cmultiple_list->caso_mltple->cellAttributes() ?>>
<span id="el<?php echo $vista_cmultiple_list->RowCount ?>_vista_cmultiple_caso_mltple">
<span<?php echo $vista_cmultiple_list->caso_mltple->viewAttributes() ?>><?php echo $vista_cmultiple_list->caso_mltple->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vista_cmultiple_list->cierre->Visible) { // cierre ?>
		<td data-name="cierre" <?php echo $vista_cmultiple_list->cierre->cellAttributes() ?>>
<span id="el<?php echo $vista_cmultiple_list->RowCount ?>_vista_cmultiple_cierre">
<span<?php echo $vista_cmultiple_list->cierre->viewAttributes() ?>><?php echo $vista_cmultiple_list->cierre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vista_cmultiple_list->ListOptions->render("body", "right", $vista_cmultiple_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$vista_cmultiple_list->isGridAdd())
		$vista_cmultiple_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$vista_cmultiple->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vista_cmultiple_list->Recordset)
	$vista_cmultiple_list->Recordset->Close();
?>
<?php if (!$vista_cmultiple_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vista_cmultiple_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $vista_cmultiple_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vista_cmultiple_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vista_cmultiple_list->TotalRecords == 0 && !$vista_cmultiple->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vista_cmultiple_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vista_cmultiple_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$vista_cmultiple_list->isExport()) { ?>
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
$vista_cmultiple_list->terminate();
?>