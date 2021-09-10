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
$triage_list = new triage_list();

// Run the page
$triage_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$triage_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$triage_list->isExport()) { ?>
<script>
var ftriagelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftriagelist = currentForm = new ew.Form("ftriagelist", "list");
	ftriagelist.formKeyCountName = '<?php echo $triage_list->FormKeyCountName ?>';
	loadjs.done("ftriagelist");
});
var ftriagelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftriagelistsrch = currentSearchForm = new ew.Form("ftriagelistsrch");

	// Dynamic selection lists
	// Filters

	ftriagelistsrch.filterList = <?php echo $triage_list->getFilterList() ?>;
	loadjs.done("ftriagelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$triage_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($triage_list->TotalRecords > 0 && $triage_list->ExportOptions->visible()) { ?>
<?php $triage_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($triage_list->ImportOptions->visible()) { ?>
<?php $triage_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($triage_list->SearchOptions->visible()) { ?>
<?php $triage_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($triage_list->FilterOptions->visible()) { ?>
<?php $triage_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$triage_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$triage_list->isExport() && !$triage->CurrentAction) { ?>
<form name="ftriagelistsrch" id="ftriagelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftriagelistsrch-search-panel" class="<?php echo $triage_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="triage">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $triage_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($triage_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($triage_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $triage_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($triage_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($triage_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($triage_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($triage_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $triage_list->showPageHeader(); ?>
<?php
$triage_list->showMessage();
?>
<?php if ($triage_list->TotalRecords > 0 || $triage->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($triage_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> triage">
<?php if (!$triage_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$triage_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $triage_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $triage_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftriagelist" id="ftriagelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="triage">
<div id="gmp_triage" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($triage_list->TotalRecords > 0 || $triage_list->isGridEdit()) { ?>
<table id="tbl_triagelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$triage->RowType = ROWTYPE_HEADER;

// Render list options
$triage_list->renderListOptions();

// Render list options (header, left)
$triage_list->ListOptions->render("header", "left");
?>
<?php if ($triage_list->id_triage->Visible) { // id_triage ?>
	<?php if ($triage_list->SortUrl($triage_list->id_triage) == "") { ?>
		<th data-name="id_triage" class="<?php echo $triage_list->id_triage->headerCellClass() ?>"><div id="elh_triage_id_triage" class="triage_id_triage"><div class="ew-table-header-caption"><?php echo $triage_list->id_triage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_triage" class="<?php echo $triage_list->id_triage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $triage_list->SortUrl($triage_list->id_triage) ?>', 1);"><div id="elh_triage_id_triage" class="triage_id_triage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $triage_list->id_triage->caption() ?></span><span class="ew-table-header-sort"><?php if ($triage_list->id_triage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($triage_list->id_triage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($triage_list->nombre_triage_es->Visible) { // nombre_triage_es ?>
	<?php if ($triage_list->SortUrl($triage_list->nombre_triage_es) == "") { ?>
		<th data-name="nombre_triage_es" class="<?php echo $triage_list->nombre_triage_es->headerCellClass() ?>"><div id="elh_triage_nombre_triage_es" class="triage_nombre_triage_es"><div class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_triage_es" class="<?php echo $triage_list->nombre_triage_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $triage_list->SortUrl($triage_list->nombre_triage_es) ?>', 1);"><div id="elh_triage_nombre_triage_es" class="triage_nombre_triage_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($triage_list->nombre_triage_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($triage_list->nombre_triage_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($triage_list->nombre_triage_en->Visible) { // nombre_triage_en ?>
	<?php if ($triage_list->SortUrl($triage_list->nombre_triage_en) == "") { ?>
		<th data-name="nombre_triage_en" class="<?php echo $triage_list->nombre_triage_en->headerCellClass() ?>"><div id="elh_triage_nombre_triage_en" class="triage_nombre_triage_en"><div class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_triage_en" class="<?php echo $triage_list->nombre_triage_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $triage_list->SortUrl($triage_list->nombre_triage_en) ?>', 1);"><div id="elh_triage_nombre_triage_en" class="triage_nombre_triage_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($triage_list->nombre_triage_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($triage_list->nombre_triage_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($triage_list->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
	<?php if ($triage_list->SortUrl($triage_list->nombre_triage_pr) == "") { ?>
		<th data-name="nombre_triage_pr" class="<?php echo $triage_list->nombre_triage_pr->headerCellClass() ?>"><div id="elh_triage_nombre_triage_pr" class="triage_nombre_triage_pr"><div class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_triage_pr" class="<?php echo $triage_list->nombre_triage_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $triage_list->SortUrl($triage_list->nombre_triage_pr) ?>', 1);"><div id="elh_triage_nombre_triage_pr" class="triage_nombre_triage_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($triage_list->nombre_triage_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($triage_list->nombre_triage_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($triage_list->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
	<?php if ($triage_list->SortUrl($triage_list->nombre_triage_fr) == "") { ?>
		<th data-name="nombre_triage_fr" class="<?php echo $triage_list->nombre_triage_fr->headerCellClass() ?>"><div id="elh_triage_nombre_triage_fr" class="triage_nombre_triage_fr"><div class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_triage_fr" class="<?php echo $triage_list->nombre_triage_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $triage_list->SortUrl($triage_list->nombre_triage_fr) ?>', 1);"><div id="elh_triage_nombre_triage_fr" class="triage_nombre_triage_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $triage_list->nombre_triage_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($triage_list->nombre_triage_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($triage_list->nombre_triage_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$triage_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($triage_list->ExportAll && $triage_list->isExport()) {
	$triage_list->StopRecord = $triage_list->TotalRecords;
} else {

	// Set the last record to display
	if ($triage_list->TotalRecords > $triage_list->StartRecord + $triage_list->DisplayRecords - 1)
		$triage_list->StopRecord = $triage_list->StartRecord + $triage_list->DisplayRecords - 1;
	else
		$triage_list->StopRecord = $triage_list->TotalRecords;
}
$triage_list->RecordCount = $triage_list->StartRecord - 1;
if ($triage_list->Recordset && !$triage_list->Recordset->EOF) {
	$triage_list->Recordset->moveFirst();
	$selectLimit = $triage_list->UseSelectLimit;
	if (!$selectLimit && $triage_list->StartRecord > 1)
		$triage_list->Recordset->move($triage_list->StartRecord - 1);
} elseif (!$triage->AllowAddDeleteRow && $triage_list->StopRecord == 0) {
	$triage_list->StopRecord = $triage->GridAddRowCount;
}

// Initialize aggregate
$triage->RowType = ROWTYPE_AGGREGATEINIT;
$triage->resetAttributes();
$triage_list->renderRow();
while ($triage_list->RecordCount < $triage_list->StopRecord) {
	$triage_list->RecordCount++;
	if ($triage_list->RecordCount >= $triage_list->StartRecord) {
		$triage_list->RowCount++;

		// Set up key count
		$triage_list->KeyCount = $triage_list->RowIndex;

		// Init row class and style
		$triage->resetAttributes();
		$triage->CssClass = "";
		if ($triage_list->isGridAdd()) {
		} else {
			$triage_list->loadRowValues($triage_list->Recordset); // Load row values
		}
		$triage->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$triage->RowAttrs->merge(["data-rowindex" => $triage_list->RowCount, "id" => "r" . $triage_list->RowCount . "_triage", "data-rowtype" => $triage->RowType]);

		// Render row
		$triage_list->renderRow();

		// Render list options
		$triage_list->renderListOptions();
?>
	<tr <?php echo $triage->rowAttributes() ?>>
<?php

// Render list options (body, left)
$triage_list->ListOptions->render("body", "left", $triage_list->RowCount);
?>
	<?php if ($triage_list->id_triage->Visible) { // id_triage ?>
		<td data-name="id_triage" <?php echo $triage_list->id_triage->cellAttributes() ?>>
<span id="el<?php echo $triage_list->RowCount ?>_triage_id_triage">
<span<?php echo $triage_list->id_triage->viewAttributes() ?>><?php echo $triage_list->id_triage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($triage_list->nombre_triage_es->Visible) { // nombre_triage_es ?>
		<td data-name="nombre_triage_es" <?php echo $triage_list->nombre_triage_es->cellAttributes() ?>>
<span id="el<?php echo $triage_list->RowCount ?>_triage_nombre_triage_es">
<span<?php echo $triage_list->nombre_triage_es->viewAttributes() ?>><?php echo $triage_list->nombre_triage_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($triage_list->nombre_triage_en->Visible) { // nombre_triage_en ?>
		<td data-name="nombre_triage_en" <?php echo $triage_list->nombre_triage_en->cellAttributes() ?>>
<span id="el<?php echo $triage_list->RowCount ?>_triage_nombre_triage_en">
<span<?php echo $triage_list->nombre_triage_en->viewAttributes() ?>><?php echo $triage_list->nombre_triage_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($triage_list->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
		<td data-name="nombre_triage_pr" <?php echo $triage_list->nombre_triage_pr->cellAttributes() ?>>
<span id="el<?php echo $triage_list->RowCount ?>_triage_nombre_triage_pr">
<span<?php echo $triage_list->nombre_triage_pr->viewAttributes() ?>><?php echo $triage_list->nombre_triage_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($triage_list->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
		<td data-name="nombre_triage_fr" <?php echo $triage_list->nombre_triage_fr->cellAttributes() ?>>
<span id="el<?php echo $triage_list->RowCount ?>_triage_nombre_triage_fr">
<span<?php echo $triage_list->nombre_triage_fr->viewAttributes() ?>><?php echo $triage_list->nombre_triage_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$triage_list->ListOptions->render("body", "right", $triage_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$triage_list->isGridAdd())
		$triage_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$triage->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($triage_list->Recordset)
	$triage_list->Recordset->Close();
?>
<?php if (!$triage_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$triage_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $triage_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $triage_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($triage_list->TotalRecords == 0 && !$triage->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $triage_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$triage_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$triage_list->isExport()) { ?>
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
$triage_list->terminate();
?>