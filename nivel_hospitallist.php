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
$nivel_hospital_list = new nivel_hospital_list();

// Run the page
$nivel_hospital_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_hospital_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$nivel_hospital_list->isExport()) { ?>
<script>
var fnivel_hospitallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fnivel_hospitallist = currentForm = new ew.Form("fnivel_hospitallist", "list");
	fnivel_hospitallist.formKeyCountName = '<?php echo $nivel_hospital_list->FormKeyCountName ?>';
	loadjs.done("fnivel_hospitallist");
});
var fnivel_hospitallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fnivel_hospitallistsrch = currentSearchForm = new ew.Form("fnivel_hospitallistsrch");

	// Dynamic selection lists
	// Filters

	fnivel_hospitallistsrch.filterList = <?php echo $nivel_hospital_list->getFilterList() ?>;
	loadjs.done("fnivel_hospitallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$nivel_hospital_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($nivel_hospital_list->TotalRecords > 0 && $nivel_hospital_list->ExportOptions->visible()) { ?>
<?php $nivel_hospital_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($nivel_hospital_list->ImportOptions->visible()) { ?>
<?php $nivel_hospital_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($nivel_hospital_list->SearchOptions->visible()) { ?>
<?php $nivel_hospital_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($nivel_hospital_list->FilterOptions->visible()) { ?>
<?php $nivel_hospital_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$nivel_hospital_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$nivel_hospital_list->isExport() && !$nivel_hospital->CurrentAction) { ?>
<form name="fnivel_hospitallistsrch" id="fnivel_hospitallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fnivel_hospitallistsrch-search-panel" class="<?php echo $nivel_hospital_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="nivel_hospital">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $nivel_hospital_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($nivel_hospital_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($nivel_hospital_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $nivel_hospital_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($nivel_hospital_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($nivel_hospital_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($nivel_hospital_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($nivel_hospital_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $nivel_hospital_list->showPageHeader(); ?>
<?php
$nivel_hospital_list->showMessage();
?>
<?php if ($nivel_hospital_list->TotalRecords > 0 || $nivel_hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($nivel_hospital_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> nivel_hospital">
<?php if (!$nivel_hospital_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$nivel_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $nivel_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $nivel_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fnivel_hospitallist" id="fnivel_hospitallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_hospital">
<div id="gmp_nivel_hospital" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($nivel_hospital_list->TotalRecords > 0 || $nivel_hospital_list->isGridEdit()) { ?>
<table id="tbl_nivel_hospitallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$nivel_hospital->RowType = ROWTYPE_HEADER;

// Render list options
$nivel_hospital_list->renderListOptions();

// Render list options (header, left)
$nivel_hospital_list->ListOptions->render("header", "left");
?>
<?php if ($nivel_hospital_list->id_nivel->Visible) { // id_nivel ?>
	<?php if ($nivel_hospital_list->SortUrl($nivel_hospital_list->id_nivel) == "") { ?>
		<th data-name="id_nivel" class="<?php echo $nivel_hospital_list->id_nivel->headerCellClass() ?>"><div id="elh_nivel_hospital_id_nivel" class="nivel_hospital_id_nivel"><div class="ew-table-header-caption"><?php echo $nivel_hospital_list->id_nivel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_nivel" class="<?php echo $nivel_hospital_list->id_nivel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $nivel_hospital_list->SortUrl($nivel_hospital_list->id_nivel) ?>', 1);"><div id="elh_nivel_hospital_id_nivel" class="nivel_hospital_id_nivel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $nivel_hospital_list->id_nivel->caption() ?></span><span class="ew-table-header-sort"><?php if ($nivel_hospital_list->id_nivel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($nivel_hospital_list->id_nivel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($nivel_hospital_list->nombre_nivel->Visible) { // nombre_nivel ?>
	<?php if ($nivel_hospital_list->SortUrl($nivel_hospital_list->nombre_nivel) == "") { ?>
		<th data-name="nombre_nivel" class="<?php echo $nivel_hospital_list->nombre_nivel->headerCellClass() ?>"><div id="elh_nivel_hospital_nombre_nivel" class="nivel_hospital_nombre_nivel"><div class="ew-table-header-caption"><?php echo $nivel_hospital_list->nombre_nivel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_nivel" class="<?php echo $nivel_hospital_list->nombre_nivel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $nivel_hospital_list->SortUrl($nivel_hospital_list->nombre_nivel) ?>', 1);"><div id="elh_nivel_hospital_nombre_nivel" class="nivel_hospital_nombre_nivel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $nivel_hospital_list->nombre_nivel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($nivel_hospital_list->nombre_nivel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($nivel_hospital_list->nombre_nivel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$nivel_hospital_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($nivel_hospital_list->ExportAll && $nivel_hospital_list->isExport()) {
	$nivel_hospital_list->StopRecord = $nivel_hospital_list->TotalRecords;
} else {

	// Set the last record to display
	if ($nivel_hospital_list->TotalRecords > $nivel_hospital_list->StartRecord + $nivel_hospital_list->DisplayRecords - 1)
		$nivel_hospital_list->StopRecord = $nivel_hospital_list->StartRecord + $nivel_hospital_list->DisplayRecords - 1;
	else
		$nivel_hospital_list->StopRecord = $nivel_hospital_list->TotalRecords;
}
$nivel_hospital_list->RecordCount = $nivel_hospital_list->StartRecord - 1;
if ($nivel_hospital_list->Recordset && !$nivel_hospital_list->Recordset->EOF) {
	$nivel_hospital_list->Recordset->moveFirst();
	$selectLimit = $nivel_hospital_list->UseSelectLimit;
	if (!$selectLimit && $nivel_hospital_list->StartRecord > 1)
		$nivel_hospital_list->Recordset->move($nivel_hospital_list->StartRecord - 1);
} elseif (!$nivel_hospital->AllowAddDeleteRow && $nivel_hospital_list->StopRecord == 0) {
	$nivel_hospital_list->StopRecord = $nivel_hospital->GridAddRowCount;
}

// Initialize aggregate
$nivel_hospital->RowType = ROWTYPE_AGGREGATEINIT;
$nivel_hospital->resetAttributes();
$nivel_hospital_list->renderRow();
while ($nivel_hospital_list->RecordCount < $nivel_hospital_list->StopRecord) {
	$nivel_hospital_list->RecordCount++;
	if ($nivel_hospital_list->RecordCount >= $nivel_hospital_list->StartRecord) {
		$nivel_hospital_list->RowCount++;

		// Set up key count
		$nivel_hospital_list->KeyCount = $nivel_hospital_list->RowIndex;

		// Init row class and style
		$nivel_hospital->resetAttributes();
		$nivel_hospital->CssClass = "";
		if ($nivel_hospital_list->isGridAdd()) {
		} else {
			$nivel_hospital_list->loadRowValues($nivel_hospital_list->Recordset); // Load row values
		}
		$nivel_hospital->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$nivel_hospital->RowAttrs->merge(["data-rowindex" => $nivel_hospital_list->RowCount, "id" => "r" . $nivel_hospital_list->RowCount . "_nivel_hospital", "data-rowtype" => $nivel_hospital->RowType]);

		// Render row
		$nivel_hospital_list->renderRow();

		// Render list options
		$nivel_hospital_list->renderListOptions();
?>
	<tr <?php echo $nivel_hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$nivel_hospital_list->ListOptions->render("body", "left", $nivel_hospital_list->RowCount);
?>
	<?php if ($nivel_hospital_list->id_nivel->Visible) { // id_nivel ?>
		<td data-name="id_nivel" <?php echo $nivel_hospital_list->id_nivel->cellAttributes() ?>>
<span id="el<?php echo $nivel_hospital_list->RowCount ?>_nivel_hospital_id_nivel">
<span<?php echo $nivel_hospital_list->id_nivel->viewAttributes() ?>><?php echo $nivel_hospital_list->id_nivel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($nivel_hospital_list->nombre_nivel->Visible) { // nombre_nivel ?>
		<td data-name="nombre_nivel" <?php echo $nivel_hospital_list->nombre_nivel->cellAttributes() ?>>
<span id="el<?php echo $nivel_hospital_list->RowCount ?>_nivel_hospital_nombre_nivel">
<span<?php echo $nivel_hospital_list->nombre_nivel->viewAttributes() ?>><?php echo $nivel_hospital_list->nombre_nivel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$nivel_hospital_list->ListOptions->render("body", "right", $nivel_hospital_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$nivel_hospital_list->isGridAdd())
		$nivel_hospital_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$nivel_hospital->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($nivel_hospital_list->Recordset)
	$nivel_hospital_list->Recordset->Close();
?>
<?php if (!$nivel_hospital_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$nivel_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $nivel_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $nivel_hospital_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($nivel_hospital_list->TotalRecords == 0 && !$nivel_hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $nivel_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$nivel_hospital_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$nivel_hospital_list->isExport()) { ?>
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
$nivel_hospital_list->terminate();
?>