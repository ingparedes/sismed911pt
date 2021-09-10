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
$caso_mltple_list = new caso_mltple_list();

// Run the page
$caso_mltple_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$caso_mltple_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$caso_mltple_list->isExport()) { ?>
<script>
var fcaso_mltplelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcaso_mltplelist = currentForm = new ew.Form("fcaso_mltplelist", "list");
	fcaso_mltplelist.formKeyCountName = '<?php echo $caso_mltple_list->FormKeyCountName ?>';
	loadjs.done("fcaso_mltplelist");
});
var fcaso_mltplelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcaso_mltplelistsrch = currentSearchForm = new ew.Form("fcaso_mltplelistsrch");

	// Dynamic selection lists
	// Filters

	fcaso_mltplelistsrch.filterList = <?php echo $caso_mltple_list->getFilterList() ?>;
	loadjs.done("fcaso_mltplelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$caso_mltple_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($caso_mltple_list->TotalRecords > 0 && $caso_mltple_list->ExportOptions->visible()) { ?>
<?php $caso_mltple_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($caso_mltple_list->ImportOptions->visible()) { ?>
<?php $caso_mltple_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($caso_mltple_list->SearchOptions->visible()) { ?>
<?php $caso_mltple_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($caso_mltple_list->FilterOptions->visible()) { ?>
<?php $caso_mltple_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$caso_mltple_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$caso_mltple_list->isExport() && !$caso_mltple->CurrentAction) { ?>
<form name="fcaso_mltplelistsrch" id="fcaso_mltplelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcaso_mltplelistsrch-search-panel" class="<?php echo $caso_mltple_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="caso_mltple">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $caso_mltple_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($caso_mltple_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($caso_mltple_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $caso_mltple_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($caso_mltple_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($caso_mltple_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($caso_mltple_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($caso_mltple_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $caso_mltple_list->showPageHeader(); ?>
<?php
$caso_mltple_list->showMessage();
?>
<?php if ($caso_mltple_list->TotalRecords > 0 || $caso_mltple->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($caso_mltple_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> caso_mltple">
<?php if (!$caso_mltple_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$caso_mltple_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $caso_mltple_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $caso_mltple_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcaso_mltplelist" id="fcaso_mltplelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="caso_mltple">
<div id="gmp_caso_mltple" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($caso_mltple_list->TotalRecords > 0 || $caso_mltple_list->isGridEdit()) { ?>
<table id="tbl_caso_mltplelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$caso_mltple->RowType = ROWTYPE_HEADER;

// Render list options
$caso_mltple_list->renderListOptions();

// Render list options (header, left)
$caso_mltple_list->ListOptions->render("header", "left");
?>
<?php if ($caso_mltple_list->caso_mltple->Visible) { // caso_mltple ?>
	<?php if ($caso_mltple_list->SortUrl($caso_mltple_list->caso_mltple) == "") { ?>
		<th data-name="caso_mltple" class="<?php echo $caso_mltple_list->caso_mltple->headerCellClass() ?>"><div id="elh_caso_mltple_caso_mltple" class="caso_mltple_caso_mltple"><div class="ew-table-header-caption"><?php echo $caso_mltple_list->caso_mltple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="caso_mltple" class="<?php echo $caso_mltple_list->caso_mltple->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $caso_mltple_list->SortUrl($caso_mltple_list->caso_mltple) ?>', 1);"><div id="elh_caso_mltple_caso_mltple" class="caso_mltple_caso_mltple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $caso_mltple_list->caso_mltple->caption() ?></span><span class="ew-table-header-sort"><?php if ($caso_mltple_list->caso_mltple->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($caso_mltple_list->caso_mltple->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($caso_mltple_list->incidente->Visible) { // incidente ?>
	<?php if ($caso_mltple_list->SortUrl($caso_mltple_list->incidente) == "") { ?>
		<th data-name="incidente" class="<?php echo $caso_mltple_list->incidente->headerCellClass() ?>"><div id="elh_caso_mltple_incidente" class="caso_mltple_incidente"><div class="ew-table-header-caption"><?php echo $caso_mltple_list->incidente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="incidente" class="<?php echo $caso_mltple_list->incidente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $caso_mltple_list->SortUrl($caso_mltple_list->incidente) ?>', 1);"><div id="elh_caso_mltple_incidente" class="caso_mltple_incidente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $caso_mltple_list->incidente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($caso_mltple_list->incidente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($caso_mltple_list->incidente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($caso_mltple_list->fecha->Visible) { // fecha ?>
	<?php if ($caso_mltple_list->SortUrl($caso_mltple_list->fecha) == "") { ?>
		<th data-name="fecha" class="<?php echo $caso_mltple_list->fecha->headerCellClass() ?>"><div id="elh_caso_mltple_fecha" class="caso_mltple_fecha"><div class="ew-table-header-caption"><?php echo $caso_mltple_list->fecha->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha" class="<?php echo $caso_mltple_list->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $caso_mltple_list->SortUrl($caso_mltple_list->fecha) ?>', 1);"><div id="elh_caso_mltple_fecha" class="caso_mltple_fecha">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $caso_mltple_list->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($caso_mltple_list->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($caso_mltple_list->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($caso_mltple_list->id_casomltple->Visible) { // id_casomltple ?>
	<?php if ($caso_mltple_list->SortUrl($caso_mltple_list->id_casomltple) == "") { ?>
		<th data-name="id_casomltple" class="<?php echo $caso_mltple_list->id_casomltple->headerCellClass() ?>"><div id="elh_caso_mltple_id_casomltple" class="caso_mltple_id_casomltple"><div class="ew-table-header-caption"><?php echo $caso_mltple_list->id_casomltple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_casomltple" class="<?php echo $caso_mltple_list->id_casomltple->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $caso_mltple_list->SortUrl($caso_mltple_list->id_casomltple) ?>', 1);"><div id="elh_caso_mltple_id_casomltple" class="caso_mltple_id_casomltple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $caso_mltple_list->id_casomltple->caption() ?></span><span class="ew-table-header-sort"><?php if ($caso_mltple_list->id_casomltple->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($caso_mltple_list->id_casomltple->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$caso_mltple_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($caso_mltple_list->ExportAll && $caso_mltple_list->isExport()) {
	$caso_mltple_list->StopRecord = $caso_mltple_list->TotalRecords;
} else {

	// Set the last record to display
	if ($caso_mltple_list->TotalRecords > $caso_mltple_list->StartRecord + $caso_mltple_list->DisplayRecords - 1)
		$caso_mltple_list->StopRecord = $caso_mltple_list->StartRecord + $caso_mltple_list->DisplayRecords - 1;
	else
		$caso_mltple_list->StopRecord = $caso_mltple_list->TotalRecords;
}
$caso_mltple_list->RecordCount = $caso_mltple_list->StartRecord - 1;
if ($caso_mltple_list->Recordset && !$caso_mltple_list->Recordset->EOF) {
	$caso_mltple_list->Recordset->moveFirst();
	$selectLimit = $caso_mltple_list->UseSelectLimit;
	if (!$selectLimit && $caso_mltple_list->StartRecord > 1)
		$caso_mltple_list->Recordset->move($caso_mltple_list->StartRecord - 1);
} elseif (!$caso_mltple->AllowAddDeleteRow && $caso_mltple_list->StopRecord == 0) {
	$caso_mltple_list->StopRecord = $caso_mltple->GridAddRowCount;
}

// Initialize aggregate
$caso_mltple->RowType = ROWTYPE_AGGREGATEINIT;
$caso_mltple->resetAttributes();
$caso_mltple_list->renderRow();
while ($caso_mltple_list->RecordCount < $caso_mltple_list->StopRecord) {
	$caso_mltple_list->RecordCount++;
	if ($caso_mltple_list->RecordCount >= $caso_mltple_list->StartRecord) {
		$caso_mltple_list->RowCount++;

		// Set up key count
		$caso_mltple_list->KeyCount = $caso_mltple_list->RowIndex;

		// Init row class and style
		$caso_mltple->resetAttributes();
		$caso_mltple->CssClass = "";
		if ($caso_mltple_list->isGridAdd()) {
		} else {
			$caso_mltple_list->loadRowValues($caso_mltple_list->Recordset); // Load row values
		}
		$caso_mltple->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$caso_mltple->RowAttrs->merge(["data-rowindex" => $caso_mltple_list->RowCount, "id" => "r" . $caso_mltple_list->RowCount . "_caso_mltple", "data-rowtype" => $caso_mltple->RowType]);

		// Render row
		$caso_mltple_list->renderRow();

		// Render list options
		$caso_mltple_list->renderListOptions();
?>
	<tr <?php echo $caso_mltple->rowAttributes() ?>>
<?php

// Render list options (body, left)
$caso_mltple_list->ListOptions->render("body", "left", $caso_mltple_list->RowCount);
?>
	<?php if ($caso_mltple_list->caso_mltple->Visible) { // caso_mltple ?>
		<td data-name="caso_mltple" <?php echo $caso_mltple_list->caso_mltple->cellAttributes() ?>>
<span id="el<?php echo $caso_mltple_list->RowCount ?>_caso_mltple_caso_mltple">
<span<?php echo $caso_mltple_list->caso_mltple->viewAttributes() ?>><?php echo $caso_mltple_list->caso_mltple->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($caso_mltple_list->incidente->Visible) { // incidente ?>
		<td data-name="incidente" <?php echo $caso_mltple_list->incidente->cellAttributes() ?>>
<span id="el<?php echo $caso_mltple_list->RowCount ?>_caso_mltple_incidente">
<span<?php echo $caso_mltple_list->incidente->viewAttributes() ?>><?php echo $caso_mltple_list->incidente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($caso_mltple_list->fecha->Visible) { // fecha ?>
		<td data-name="fecha" <?php echo $caso_mltple_list->fecha->cellAttributes() ?>>
<span id="el<?php echo $caso_mltple_list->RowCount ?>_caso_mltple_fecha">
<span<?php echo $caso_mltple_list->fecha->viewAttributes() ?>><?php echo $caso_mltple_list->fecha->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($caso_mltple_list->id_casomltple->Visible) { // id_casomltple ?>
		<td data-name="id_casomltple" <?php echo $caso_mltple_list->id_casomltple->cellAttributes() ?>>
<span id="el<?php echo $caso_mltple_list->RowCount ?>_caso_mltple_id_casomltple">
<span<?php echo $caso_mltple_list->id_casomltple->viewAttributes() ?>><?php echo $caso_mltple_list->id_casomltple->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$caso_mltple_list->ListOptions->render("body", "right", $caso_mltple_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$caso_mltple_list->isGridAdd())
		$caso_mltple_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$caso_mltple->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($caso_mltple_list->Recordset)
	$caso_mltple_list->Recordset->Close();
?>
<?php if (!$caso_mltple_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$caso_mltple_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $caso_mltple_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $caso_mltple_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($caso_mltple_list->TotalRecords == 0 && !$caso_mltple->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $caso_mltple_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$caso_mltple_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$caso_mltple_list->isExport()) { ?>
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
$caso_mltple_list->terminate();
?>