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
$especialidad_hospital_list = new especialidad_hospital_list();

// Run the page
$especialidad_hospital_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especialidad_hospital_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$especialidad_hospital_list->isExport()) { ?>
<script>
var fespecialidad_hospitallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fespecialidad_hospitallist = currentForm = new ew.Form("fespecialidad_hospitallist", "list");
	fespecialidad_hospitallist.formKeyCountName = '<?php echo $especialidad_hospital_list->FormKeyCountName ?>';
	loadjs.done("fespecialidad_hospitallist");
});
var fespecialidad_hospitallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fespecialidad_hospitallistsrch = currentSearchForm = new ew.Form("fespecialidad_hospitallistsrch");

	// Dynamic selection lists
	// Filters

	fespecialidad_hospitallistsrch.filterList = <?php echo $especialidad_hospital_list->getFilterList() ?>;
	loadjs.done("fespecialidad_hospitallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$especialidad_hospital_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($especialidad_hospital_list->TotalRecords > 0 && $especialidad_hospital_list->ExportOptions->visible()) { ?>
<?php $especialidad_hospital_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($especialidad_hospital_list->ImportOptions->visible()) { ?>
<?php $especialidad_hospital_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($especialidad_hospital_list->SearchOptions->visible()) { ?>
<?php $especialidad_hospital_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($especialidad_hospital_list->FilterOptions->visible()) { ?>
<?php $especialidad_hospital_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$especialidad_hospital_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$especialidad_hospital_list->isExport() && !$especialidad_hospital->CurrentAction) { ?>
<form name="fespecialidad_hospitallistsrch" id="fespecialidad_hospitallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fespecialidad_hospitallistsrch-search-panel" class="<?php echo $especialidad_hospital_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="especialidad_hospital">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $especialidad_hospital_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($especialidad_hospital_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($especialidad_hospital_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $especialidad_hospital_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($especialidad_hospital_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($especialidad_hospital_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($especialidad_hospital_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($especialidad_hospital_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $especialidad_hospital_list->showPageHeader(); ?>
<?php
$especialidad_hospital_list->showMessage();
?>
<?php if ($especialidad_hospital_list->TotalRecords > 0 || $especialidad_hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($especialidad_hospital_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> especialidad_hospital">
<?php if (!$especialidad_hospital_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$especialidad_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $especialidad_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $especialidad_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fespecialidad_hospitallist" id="fespecialidad_hospitallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especialidad_hospital">
<div id="gmp_especialidad_hospital" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($especialidad_hospital_list->TotalRecords > 0 || $especialidad_hospital_list->isGridEdit()) { ?>
<table id="tbl_especialidad_hospitallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$especialidad_hospital->RowType = ROWTYPE_HEADER;

// Render list options
$especialidad_hospital_list->renderListOptions();

// Render list options (header, left)
$especialidad_hospital_list->ListOptions->render("header", "left");
?>
<?php if ($especialidad_hospital_list->id_especialidad->Visible) { // id_especialidad ?>
	<?php if ($especialidad_hospital_list->SortUrl($especialidad_hospital_list->id_especialidad) == "") { ?>
		<th data-name="id_especialidad" class="<?php echo $especialidad_hospital_list->id_especialidad->headerCellClass() ?>"><div id="elh_especialidad_hospital_id_especialidad" class="especialidad_hospital_id_especialidad"><div class="ew-table-header-caption"><?php echo $especialidad_hospital_list->id_especialidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_especialidad" class="<?php echo $especialidad_hospital_list->id_especialidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especialidad_hospital_list->SortUrl($especialidad_hospital_list->id_especialidad) ?>', 1);"><div id="elh_especialidad_hospital_id_especialidad" class="especialidad_hospital_id_especialidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especialidad_hospital_list->id_especialidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($especialidad_hospital_list->id_especialidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especialidad_hospital_list->id_especialidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especialidad_hospital_list->especialidad_es->Visible) { // especialidad_es ?>
	<?php if ($especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_es) == "") { ?>
		<th data-name="especialidad_es" class="<?php echo $especialidad_hospital_list->especialidad_es->headerCellClass() ?>"><div id="elh_especialidad_hospital_especialidad_es" class="especialidad_hospital_especialidad_es"><div class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especialidad_es" class="<?php echo $especialidad_hospital_list->especialidad_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_es) ?>', 1);"><div id="elh_especialidad_hospital_especialidad_es" class="especialidad_hospital_especialidad_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especialidad_hospital_list->especialidad_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especialidad_hospital_list->especialidad_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especialidad_hospital_list->especialidad_en->Visible) { // especialidad_en ?>
	<?php if ($especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_en) == "") { ?>
		<th data-name="especialidad_en" class="<?php echo $especialidad_hospital_list->especialidad_en->headerCellClass() ?>"><div id="elh_especialidad_hospital_especialidad_en" class="especialidad_hospital_especialidad_en"><div class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especialidad_en" class="<?php echo $especialidad_hospital_list->especialidad_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_en) ?>', 1);"><div id="elh_especialidad_hospital_especialidad_en" class="especialidad_hospital_especialidad_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especialidad_hospital_list->especialidad_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especialidad_hospital_list->especialidad_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especialidad_hospital_list->especialidad_pr->Visible) { // especialidad_pr ?>
	<?php if ($especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_pr) == "") { ?>
		<th data-name="especialidad_pr" class="<?php echo $especialidad_hospital_list->especialidad_pr->headerCellClass() ?>"><div id="elh_especialidad_hospital_especialidad_pr" class="especialidad_hospital_especialidad_pr"><div class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especialidad_pr" class="<?php echo $especialidad_hospital_list->especialidad_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_pr) ?>', 1);"><div id="elh_especialidad_hospital_especialidad_pr" class="especialidad_hospital_especialidad_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especialidad_hospital_list->especialidad_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especialidad_hospital_list->especialidad_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especialidad_hospital_list->especialidad_fr->Visible) { // especialidad_fr ?>
	<?php if ($especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_fr) == "") { ?>
		<th data-name="especialidad_fr" class="<?php echo $especialidad_hospital_list->especialidad_fr->headerCellClass() ?>"><div id="elh_especialidad_hospital_especialidad_fr" class="especialidad_hospital_especialidad_fr"><div class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especialidad_fr" class="<?php echo $especialidad_hospital_list->especialidad_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especialidad_hospital_list->SortUrl($especialidad_hospital_list->especialidad_fr) ?>', 1);"><div id="elh_especialidad_hospital_especialidad_fr" class="especialidad_hospital_especialidad_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especialidad_hospital_list->especialidad_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especialidad_hospital_list->especialidad_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especialidad_hospital_list->especialidad_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$especialidad_hospital_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($especialidad_hospital_list->ExportAll && $especialidad_hospital_list->isExport()) {
	$especialidad_hospital_list->StopRecord = $especialidad_hospital_list->TotalRecords;
} else {

	// Set the last record to display
	if ($especialidad_hospital_list->TotalRecords > $especialidad_hospital_list->StartRecord + $especialidad_hospital_list->DisplayRecords - 1)
		$especialidad_hospital_list->StopRecord = $especialidad_hospital_list->StartRecord + $especialidad_hospital_list->DisplayRecords - 1;
	else
		$especialidad_hospital_list->StopRecord = $especialidad_hospital_list->TotalRecords;
}
$especialidad_hospital_list->RecordCount = $especialidad_hospital_list->StartRecord - 1;
if ($especialidad_hospital_list->Recordset && !$especialidad_hospital_list->Recordset->EOF) {
	$especialidad_hospital_list->Recordset->moveFirst();
	$selectLimit = $especialidad_hospital_list->UseSelectLimit;
	if (!$selectLimit && $especialidad_hospital_list->StartRecord > 1)
		$especialidad_hospital_list->Recordset->move($especialidad_hospital_list->StartRecord - 1);
} elseif (!$especialidad_hospital->AllowAddDeleteRow && $especialidad_hospital_list->StopRecord == 0) {
	$especialidad_hospital_list->StopRecord = $especialidad_hospital->GridAddRowCount;
}

// Initialize aggregate
$especialidad_hospital->RowType = ROWTYPE_AGGREGATEINIT;
$especialidad_hospital->resetAttributes();
$especialidad_hospital_list->renderRow();
while ($especialidad_hospital_list->RecordCount < $especialidad_hospital_list->StopRecord) {
	$especialidad_hospital_list->RecordCount++;
	if ($especialidad_hospital_list->RecordCount >= $especialidad_hospital_list->StartRecord) {
		$especialidad_hospital_list->RowCount++;

		// Set up key count
		$especialidad_hospital_list->KeyCount = $especialidad_hospital_list->RowIndex;

		// Init row class and style
		$especialidad_hospital->resetAttributes();
		$especialidad_hospital->CssClass = "";
		if ($especialidad_hospital_list->isGridAdd()) {
		} else {
			$especialidad_hospital_list->loadRowValues($especialidad_hospital_list->Recordset); // Load row values
		}
		$especialidad_hospital->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$especialidad_hospital->RowAttrs->merge(["data-rowindex" => $especialidad_hospital_list->RowCount, "id" => "r" . $especialidad_hospital_list->RowCount . "_especialidad_hospital", "data-rowtype" => $especialidad_hospital->RowType]);

		// Render row
		$especialidad_hospital_list->renderRow();

		// Render list options
		$especialidad_hospital_list->renderListOptions();
?>
	<tr <?php echo $especialidad_hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$especialidad_hospital_list->ListOptions->render("body", "left", $especialidad_hospital_list->RowCount);
?>
	<?php if ($especialidad_hospital_list->id_especialidad->Visible) { // id_especialidad ?>
		<td data-name="id_especialidad" <?php echo $especialidad_hospital_list->id_especialidad->cellAttributes() ?>>
<span id="el<?php echo $especialidad_hospital_list->RowCount ?>_especialidad_hospital_id_especialidad">
<span<?php echo $especialidad_hospital_list->id_especialidad->viewAttributes() ?>><?php echo $especialidad_hospital_list->id_especialidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especialidad_hospital_list->especialidad_es->Visible) { // especialidad_es ?>
		<td data-name="especialidad_es" <?php echo $especialidad_hospital_list->especialidad_es->cellAttributes() ?>>
<span id="el<?php echo $especialidad_hospital_list->RowCount ?>_especialidad_hospital_especialidad_es">
<span<?php echo $especialidad_hospital_list->especialidad_es->viewAttributes() ?>><?php echo $especialidad_hospital_list->especialidad_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especialidad_hospital_list->especialidad_en->Visible) { // especialidad_en ?>
		<td data-name="especialidad_en" <?php echo $especialidad_hospital_list->especialidad_en->cellAttributes() ?>>
<span id="el<?php echo $especialidad_hospital_list->RowCount ?>_especialidad_hospital_especialidad_en">
<span<?php echo $especialidad_hospital_list->especialidad_en->viewAttributes() ?>><?php echo $especialidad_hospital_list->especialidad_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especialidad_hospital_list->especialidad_pr->Visible) { // especialidad_pr ?>
		<td data-name="especialidad_pr" <?php echo $especialidad_hospital_list->especialidad_pr->cellAttributes() ?>>
<span id="el<?php echo $especialidad_hospital_list->RowCount ?>_especialidad_hospital_especialidad_pr">
<span<?php echo $especialidad_hospital_list->especialidad_pr->viewAttributes() ?>><?php echo $especialidad_hospital_list->especialidad_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especialidad_hospital_list->especialidad_fr->Visible) { // especialidad_fr ?>
		<td data-name="especialidad_fr" <?php echo $especialidad_hospital_list->especialidad_fr->cellAttributes() ?>>
<span id="el<?php echo $especialidad_hospital_list->RowCount ?>_especialidad_hospital_especialidad_fr">
<span<?php echo $especialidad_hospital_list->especialidad_fr->viewAttributes() ?>><?php echo $especialidad_hospital_list->especialidad_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$especialidad_hospital_list->ListOptions->render("body", "right", $especialidad_hospital_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$especialidad_hospital_list->isGridAdd())
		$especialidad_hospital_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$especialidad_hospital->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($especialidad_hospital_list->Recordset)
	$especialidad_hospital_list->Recordset->Close();
?>
<?php if (!$especialidad_hospital_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$especialidad_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $especialidad_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $especialidad_hospital_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($especialidad_hospital_list->TotalRecords == 0 && !$especialidad_hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $especialidad_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$especialidad_hospital_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$especialidad_hospital_list->isExport()) { ?>
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
$especialidad_hospital_list->terminate();
?>