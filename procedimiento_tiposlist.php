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
$procedimiento_tipos_list = new procedimiento_tipos_list();

// Run the page
$procedimiento_tipos_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_tipos_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$procedimiento_tipos_list->isExport()) { ?>
<script>
var fprocedimiento_tiposlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fprocedimiento_tiposlist = currentForm = new ew.Form("fprocedimiento_tiposlist", "list");
	fprocedimiento_tiposlist.formKeyCountName = '<?php echo $procedimiento_tipos_list->FormKeyCountName ?>';
	loadjs.done("fprocedimiento_tiposlist");
});
var fprocedimiento_tiposlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fprocedimiento_tiposlistsrch = currentSearchForm = new ew.Form("fprocedimiento_tiposlistsrch");

	// Dynamic selection lists
	// Filters

	fprocedimiento_tiposlistsrch.filterList = <?php echo $procedimiento_tipos_list->getFilterList() ?>;
	loadjs.done("fprocedimiento_tiposlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$procedimiento_tipos_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($procedimiento_tipos_list->TotalRecords > 0 && $procedimiento_tipos_list->ExportOptions->visible()) { ?>
<?php $procedimiento_tipos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($procedimiento_tipos_list->ImportOptions->visible()) { ?>
<?php $procedimiento_tipos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($procedimiento_tipos_list->SearchOptions->visible()) { ?>
<?php $procedimiento_tipos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($procedimiento_tipos_list->FilterOptions->visible()) { ?>
<?php $procedimiento_tipos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$procedimiento_tipos_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$procedimiento_tipos_list->isExport() && !$procedimiento_tipos->CurrentAction) { ?>
<form name="fprocedimiento_tiposlistsrch" id="fprocedimiento_tiposlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fprocedimiento_tiposlistsrch-search-panel" class="<?php echo $procedimiento_tipos_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="procedimiento_tipos">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $procedimiento_tipos_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($procedimiento_tipos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($procedimiento_tipos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $procedimiento_tipos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($procedimiento_tipos_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($procedimiento_tipos_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($procedimiento_tipos_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($procedimiento_tipos_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $procedimiento_tipos_list->showPageHeader(); ?>
<?php
$procedimiento_tipos_list->showMessage();
?>
<?php if ($procedimiento_tipos_list->TotalRecords > 0 || $procedimiento_tipos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($procedimiento_tipos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> procedimiento_tipos">
<?php if (!$procedimiento_tipos_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$procedimiento_tipos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $procedimiento_tipos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $procedimiento_tipos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fprocedimiento_tiposlist" id="fprocedimiento_tiposlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_tipos">
<div id="gmp_procedimiento_tipos" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($procedimiento_tipos_list->TotalRecords > 0 || $procedimiento_tipos_list->isGridEdit()) { ?>
<table id="tbl_procedimiento_tiposlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$procedimiento_tipos->RowType = ROWTYPE_HEADER;

// Render list options
$procedimiento_tipos_list->renderListOptions();

// Render list options (header, left)
$procedimiento_tipos_list->ListOptions->render("header", "left");
?>
<?php if ($procedimiento_tipos_list->id->Visible) { // id ?>
	<?php if ($procedimiento_tipos_list->SortUrl($procedimiento_tipos_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $procedimiento_tipos_list->id->headerCellClass() ?>"><div id="elh_procedimiento_tipos_id" class="procedimiento_tipos_id"><div class="ew-table-header-caption"><?php echo $procedimiento_tipos_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $procedimiento_tipos_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $procedimiento_tipos_list->SortUrl($procedimiento_tipos_list->id) ?>', 1);"><div id="elh_procedimiento_tipos_id" class="procedimiento_tipos_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $procedimiento_tipos_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($procedimiento_tipos_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($procedimiento_tipos_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($procedimiento_tipos_list->nombre_procedimeto->Visible) { // nombre_procedimeto ?>
	<?php if ($procedimiento_tipos_list->SortUrl($procedimiento_tipos_list->nombre_procedimeto) == "") { ?>
		<th data-name="nombre_procedimeto" class="<?php echo $procedimiento_tipos_list->nombre_procedimeto->headerCellClass() ?>"><div id="elh_procedimiento_tipos_nombre_procedimeto" class="procedimiento_tipos_nombre_procedimeto"><div class="ew-table-header-caption"><?php echo $procedimiento_tipos_list->nombre_procedimeto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_procedimeto" class="<?php echo $procedimiento_tipos_list->nombre_procedimeto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $procedimiento_tipos_list->SortUrl($procedimiento_tipos_list->nombre_procedimeto) ?>', 1);"><div id="elh_procedimiento_tipos_nombre_procedimeto" class="procedimiento_tipos_nombre_procedimeto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $procedimiento_tipos_list->nombre_procedimeto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($procedimiento_tipos_list->nombre_procedimeto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($procedimiento_tipos_list->nombre_procedimeto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$procedimiento_tipos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($procedimiento_tipos_list->ExportAll && $procedimiento_tipos_list->isExport()) {
	$procedimiento_tipos_list->StopRecord = $procedimiento_tipos_list->TotalRecords;
} else {

	// Set the last record to display
	if ($procedimiento_tipos_list->TotalRecords > $procedimiento_tipos_list->StartRecord + $procedimiento_tipos_list->DisplayRecords - 1)
		$procedimiento_tipos_list->StopRecord = $procedimiento_tipos_list->StartRecord + $procedimiento_tipos_list->DisplayRecords - 1;
	else
		$procedimiento_tipos_list->StopRecord = $procedimiento_tipos_list->TotalRecords;
}
$procedimiento_tipos_list->RecordCount = $procedimiento_tipos_list->StartRecord - 1;
if ($procedimiento_tipos_list->Recordset && !$procedimiento_tipos_list->Recordset->EOF) {
	$procedimiento_tipos_list->Recordset->moveFirst();
	$selectLimit = $procedimiento_tipos_list->UseSelectLimit;
	if (!$selectLimit && $procedimiento_tipos_list->StartRecord > 1)
		$procedimiento_tipos_list->Recordset->move($procedimiento_tipos_list->StartRecord - 1);
} elseif (!$procedimiento_tipos->AllowAddDeleteRow && $procedimiento_tipos_list->StopRecord == 0) {
	$procedimiento_tipos_list->StopRecord = $procedimiento_tipos->GridAddRowCount;
}

// Initialize aggregate
$procedimiento_tipos->RowType = ROWTYPE_AGGREGATEINIT;
$procedimiento_tipos->resetAttributes();
$procedimiento_tipos_list->renderRow();
while ($procedimiento_tipos_list->RecordCount < $procedimiento_tipos_list->StopRecord) {
	$procedimiento_tipos_list->RecordCount++;
	if ($procedimiento_tipos_list->RecordCount >= $procedimiento_tipos_list->StartRecord) {
		$procedimiento_tipos_list->RowCount++;

		// Set up key count
		$procedimiento_tipos_list->KeyCount = $procedimiento_tipos_list->RowIndex;

		// Init row class and style
		$procedimiento_tipos->resetAttributes();
		$procedimiento_tipos->CssClass = "";
		if ($procedimiento_tipos_list->isGridAdd()) {
		} else {
			$procedimiento_tipos_list->loadRowValues($procedimiento_tipos_list->Recordset); // Load row values
		}
		$procedimiento_tipos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$procedimiento_tipos->RowAttrs->merge(["data-rowindex" => $procedimiento_tipos_list->RowCount, "id" => "r" . $procedimiento_tipos_list->RowCount . "_procedimiento_tipos", "data-rowtype" => $procedimiento_tipos->RowType]);

		// Render row
		$procedimiento_tipos_list->renderRow();

		// Render list options
		$procedimiento_tipos_list->renderListOptions();
?>
	<tr <?php echo $procedimiento_tipos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$procedimiento_tipos_list->ListOptions->render("body", "left", $procedimiento_tipos_list->RowCount);
?>
	<?php if ($procedimiento_tipos_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $procedimiento_tipos_list->id->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_tipos_list->RowCount ?>_procedimiento_tipos_id">
<span<?php echo $procedimiento_tipos_list->id->viewAttributes() ?>><?php echo $procedimiento_tipos_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($procedimiento_tipos_list->nombre_procedimeto->Visible) { // nombre_procedimeto ?>
		<td data-name="nombre_procedimeto" <?php echo $procedimiento_tipos_list->nombre_procedimeto->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_tipos_list->RowCount ?>_procedimiento_tipos_nombre_procedimeto">
<span<?php echo $procedimiento_tipos_list->nombre_procedimeto->viewAttributes() ?>><?php echo $procedimiento_tipos_list->nombre_procedimeto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$procedimiento_tipos_list->ListOptions->render("body", "right", $procedimiento_tipos_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$procedimiento_tipos_list->isGridAdd())
		$procedimiento_tipos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$procedimiento_tipos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($procedimiento_tipos_list->Recordset)
	$procedimiento_tipos_list->Recordset->Close();
?>
<?php if (!$procedimiento_tipos_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$procedimiento_tipos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $procedimiento_tipos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $procedimiento_tipos_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($procedimiento_tipos_list->TotalRecords == 0 && !$procedimiento_tipos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $procedimiento_tipos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$procedimiento_tipos_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$procedimiento_tipos_list->isExport()) { ?>
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
$procedimiento_tipos_list->terminate();
?>