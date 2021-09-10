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
$incidentes_list = new incidentes_list();

// Run the page
$incidentes_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$incidentes_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$incidentes_list->isExport()) { ?>
<script>
var fincidenteslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fincidenteslist = currentForm = new ew.Form("fincidenteslist", "list");
	fincidenteslist.formKeyCountName = '<?php echo $incidentes_list->FormKeyCountName ?>';
	loadjs.done("fincidenteslist");
});
var fincidenteslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fincidenteslistsrch = currentSearchForm = new ew.Form("fincidenteslistsrch");

	// Dynamic selection lists
	// Filters

	fincidenteslistsrch.filterList = <?php echo $incidentes_list->getFilterList() ?>;
	loadjs.done("fincidenteslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$incidentes_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($incidentes_list->TotalRecords > 0 && $incidentes_list->ExportOptions->visible()) { ?>
<?php $incidentes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($incidentes_list->ImportOptions->visible()) { ?>
<?php $incidentes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($incidentes_list->SearchOptions->visible()) { ?>
<?php $incidentes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($incidentes_list->FilterOptions->visible()) { ?>
<?php $incidentes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$incidentes_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$incidentes_list->isExport() && !$incidentes->CurrentAction) { ?>
<form name="fincidenteslistsrch" id="fincidenteslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fincidenteslistsrch-search-panel" class="<?php echo $incidentes_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="incidentes">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $incidentes_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($incidentes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($incidentes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $incidentes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($incidentes_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($incidentes_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($incidentes_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($incidentes_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $incidentes_list->showPageHeader(); ?>
<?php
$incidentes_list->showMessage();
?>
<?php if ($incidentes_list->TotalRecords > 0 || $incidentes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($incidentes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> incidentes">
<?php if (!$incidentes_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$incidentes_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $incidentes_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $incidentes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fincidenteslist" id="fincidenteslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="incidentes">
<div id="gmp_incidentes" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($incidentes_list->TotalRecords > 0 || $incidentes_list->isGridEdit()) { ?>
<table id="tbl_incidenteslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$incidentes->RowType = ROWTYPE_HEADER;

// Render list options
$incidentes_list->renderListOptions();

// Render list options (header, left)
$incidentes_list->ListOptions->render("header", "left");
?>
<?php if ($incidentes_list->id_incidente->Visible) { // id_incidente ?>
	<?php if ($incidentes_list->SortUrl($incidentes_list->id_incidente) == "") { ?>
		<th data-name="id_incidente" class="<?php echo $incidentes_list->id_incidente->headerCellClass() ?>"><div id="elh_incidentes_id_incidente" class="incidentes_id_incidente"><div class="ew-table-header-caption"><?php echo $incidentes_list->id_incidente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_incidente" class="<?php echo $incidentes_list->id_incidente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $incidentes_list->SortUrl($incidentes_list->id_incidente) ?>', 1);"><div id="elh_incidentes_id_incidente" class="incidentes_id_incidente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $incidentes_list->id_incidente->caption() ?></span><span class="ew-table-header-sort"><?php if ($incidentes_list->id_incidente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($incidentes_list->id_incidente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($incidentes_list->nombre_es->Visible) { // nombre_es ?>
	<?php if ($incidentes_list->SortUrl($incidentes_list->nombre_es) == "") { ?>
		<th data-name="nombre_es" class="<?php echo $incidentes_list->nombre_es->headerCellClass() ?>"><div id="elh_incidentes_nombre_es" class="incidentes_nombre_es"><div class="ew-table-header-caption"><?php echo $incidentes_list->nombre_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_es" class="<?php echo $incidentes_list->nombre_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $incidentes_list->SortUrl($incidentes_list->nombre_es) ?>', 1);"><div id="elh_incidentes_nombre_es" class="incidentes_nombre_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $incidentes_list->nombre_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($incidentes_list->nombre_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($incidentes_list->nombre_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($incidentes_list->nombre_en->Visible) { // nombre_en ?>
	<?php if ($incidentes_list->SortUrl($incidentes_list->nombre_en) == "") { ?>
		<th data-name="nombre_en" class="<?php echo $incidentes_list->nombre_en->headerCellClass() ?>"><div id="elh_incidentes_nombre_en" class="incidentes_nombre_en"><div class="ew-table-header-caption"><?php echo $incidentes_list->nombre_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_en" class="<?php echo $incidentes_list->nombre_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $incidentes_list->SortUrl($incidentes_list->nombre_en) ?>', 1);"><div id="elh_incidentes_nombre_en" class="incidentes_nombre_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $incidentes_list->nombre_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($incidentes_list->nombre_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($incidentes_list->nombre_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($incidentes_list->nombre_fr->Visible) { // nombre_fr ?>
	<?php if ($incidentes_list->SortUrl($incidentes_list->nombre_fr) == "") { ?>
		<th data-name="nombre_fr" class="<?php echo $incidentes_list->nombre_fr->headerCellClass() ?>"><div id="elh_incidentes_nombre_fr" class="incidentes_nombre_fr"><div class="ew-table-header-caption"><?php echo $incidentes_list->nombre_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_fr" class="<?php echo $incidentes_list->nombre_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $incidentes_list->SortUrl($incidentes_list->nombre_fr) ?>', 1);"><div id="elh_incidentes_nombre_fr" class="incidentes_nombre_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $incidentes_list->nombre_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($incidentes_list->nombre_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($incidentes_list->nombre_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($incidentes_list->nombre_pt->Visible) { // nombre_pt ?>
	<?php if ($incidentes_list->SortUrl($incidentes_list->nombre_pt) == "") { ?>
		<th data-name="nombre_pt" class="<?php echo $incidentes_list->nombre_pt->headerCellClass() ?>"><div id="elh_incidentes_nombre_pt" class="incidentes_nombre_pt"><div class="ew-table-header-caption"><?php echo $incidentes_list->nombre_pt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_pt" class="<?php echo $incidentes_list->nombre_pt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $incidentes_list->SortUrl($incidentes_list->nombre_pt) ?>', 1);"><div id="elh_incidentes_nombre_pt" class="incidentes_nombre_pt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $incidentes_list->nombre_pt->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($incidentes_list->nombre_pt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($incidentes_list->nombre_pt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$incidentes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($incidentes_list->ExportAll && $incidentes_list->isExport()) {
	$incidentes_list->StopRecord = $incidentes_list->TotalRecords;
} else {

	// Set the last record to display
	if ($incidentes_list->TotalRecords > $incidentes_list->StartRecord + $incidentes_list->DisplayRecords - 1)
		$incidentes_list->StopRecord = $incidentes_list->StartRecord + $incidentes_list->DisplayRecords - 1;
	else
		$incidentes_list->StopRecord = $incidentes_list->TotalRecords;
}
$incidentes_list->RecordCount = $incidentes_list->StartRecord - 1;
if ($incidentes_list->Recordset && !$incidentes_list->Recordset->EOF) {
	$incidentes_list->Recordset->moveFirst();
	$selectLimit = $incidentes_list->UseSelectLimit;
	if (!$selectLimit && $incidentes_list->StartRecord > 1)
		$incidentes_list->Recordset->move($incidentes_list->StartRecord - 1);
} elseif (!$incidentes->AllowAddDeleteRow && $incidentes_list->StopRecord == 0) {
	$incidentes_list->StopRecord = $incidentes->GridAddRowCount;
}

// Initialize aggregate
$incidentes->RowType = ROWTYPE_AGGREGATEINIT;
$incidentes->resetAttributes();
$incidentes_list->renderRow();
while ($incidentes_list->RecordCount < $incidentes_list->StopRecord) {
	$incidentes_list->RecordCount++;
	if ($incidentes_list->RecordCount >= $incidentes_list->StartRecord) {
		$incidentes_list->RowCount++;

		// Set up key count
		$incidentes_list->KeyCount = $incidentes_list->RowIndex;

		// Init row class and style
		$incidentes->resetAttributes();
		$incidentes->CssClass = "";
		if ($incidentes_list->isGridAdd()) {
		} else {
			$incidentes_list->loadRowValues($incidentes_list->Recordset); // Load row values
		}
		$incidentes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$incidentes->RowAttrs->merge(["data-rowindex" => $incidentes_list->RowCount, "id" => "r" . $incidentes_list->RowCount . "_incidentes", "data-rowtype" => $incidentes->RowType]);

		// Render row
		$incidentes_list->renderRow();

		// Render list options
		$incidentes_list->renderListOptions();
?>
	<tr <?php echo $incidentes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$incidentes_list->ListOptions->render("body", "left", $incidentes_list->RowCount);
?>
	<?php if ($incidentes_list->id_incidente->Visible) { // id_incidente ?>
		<td data-name="id_incidente" <?php echo $incidentes_list->id_incidente->cellAttributes() ?>>
<span id="el<?php echo $incidentes_list->RowCount ?>_incidentes_id_incidente">
<span<?php echo $incidentes_list->id_incidente->viewAttributes() ?>><?php echo $incidentes_list->id_incidente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($incidentes_list->nombre_es->Visible) { // nombre_es ?>
		<td data-name="nombre_es" <?php echo $incidentes_list->nombre_es->cellAttributes() ?>>
<span id="el<?php echo $incidentes_list->RowCount ?>_incidentes_nombre_es">
<span<?php echo $incidentes_list->nombre_es->viewAttributes() ?>><?php echo $incidentes_list->nombre_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($incidentes_list->nombre_en->Visible) { // nombre_en ?>
		<td data-name="nombre_en" <?php echo $incidentes_list->nombre_en->cellAttributes() ?>>
<span id="el<?php echo $incidentes_list->RowCount ?>_incidentes_nombre_en">
<span<?php echo $incidentes_list->nombre_en->viewAttributes() ?>><?php echo $incidentes_list->nombre_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($incidentes_list->nombre_fr->Visible) { // nombre_fr ?>
		<td data-name="nombre_fr" <?php echo $incidentes_list->nombre_fr->cellAttributes() ?>>
<span id="el<?php echo $incidentes_list->RowCount ?>_incidentes_nombre_fr">
<span<?php echo $incidentes_list->nombre_fr->viewAttributes() ?>><?php echo $incidentes_list->nombre_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($incidentes_list->nombre_pt->Visible) { // nombre_pt ?>
		<td data-name="nombre_pt" <?php echo $incidentes_list->nombre_pt->cellAttributes() ?>>
<span id="el<?php echo $incidentes_list->RowCount ?>_incidentes_nombre_pt">
<span<?php echo $incidentes_list->nombre_pt->viewAttributes() ?>><?php echo $incidentes_list->nombre_pt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$incidentes_list->ListOptions->render("body", "right", $incidentes_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$incidentes_list->isGridAdd())
		$incidentes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$incidentes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($incidentes_list->Recordset)
	$incidentes_list->Recordset->Close();
?>
<?php if (!$incidentes_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$incidentes_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $incidentes_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $incidentes_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($incidentes_list->TotalRecords == 0 && !$incidentes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $incidentes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$incidentes_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$incidentes_list->isExport()) { ?>
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
$incidentes_list->terminate();
?>