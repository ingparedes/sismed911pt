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
$explo_general_afeccion_list = new explo_general_afeccion_list();

// Run the page
$explo_general_afeccion_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_afeccion_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_general_afeccion_list->isExport()) { ?>
<script>
var fexplo_general_afeccionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fexplo_general_afeccionlist = currentForm = new ew.Form("fexplo_general_afeccionlist", "list");
	fexplo_general_afeccionlist.formKeyCountName = '<?php echo $explo_general_afeccion_list->FormKeyCountName ?>';
	loadjs.done("fexplo_general_afeccionlist");
});
var fexplo_general_afeccionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fexplo_general_afeccionlistsrch = currentSearchForm = new ew.Form("fexplo_general_afeccionlistsrch");

	// Dynamic selection lists
	// Filters

	fexplo_general_afeccionlistsrch.filterList = <?php echo $explo_general_afeccion_list->getFilterList() ?>;
	loadjs.done("fexplo_general_afeccionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_general_afeccion_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($explo_general_afeccion_list->TotalRecords > 0 && $explo_general_afeccion_list->ExportOptions->visible()) { ?>
<?php $explo_general_afeccion_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_general_afeccion_list->ImportOptions->visible()) { ?>
<?php $explo_general_afeccion_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_general_afeccion_list->SearchOptions->visible()) { ?>
<?php $explo_general_afeccion_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($explo_general_afeccion_list->FilterOptions->visible()) { ?>
<?php $explo_general_afeccion_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$explo_general_afeccion_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$explo_general_afeccion_list->isExport() && !$explo_general_afeccion->CurrentAction) { ?>
<form name="fexplo_general_afeccionlistsrch" id="fexplo_general_afeccionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fexplo_general_afeccionlistsrch-search-panel" class="<?php echo $explo_general_afeccion_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="explo_general_afeccion">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $explo_general_afeccion_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($explo_general_afeccion_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($explo_general_afeccion_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $explo_general_afeccion_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($explo_general_afeccion_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($explo_general_afeccion_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($explo_general_afeccion_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($explo_general_afeccion_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $explo_general_afeccion_list->showPageHeader(); ?>
<?php
$explo_general_afeccion_list->showMessage();
?>
<?php if ($explo_general_afeccion_list->TotalRecords > 0 || $explo_general_afeccion->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($explo_general_afeccion_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> explo_general_afeccion">
<?php if (!$explo_general_afeccion_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$explo_general_afeccion_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_general_afeccion_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_general_afeccion_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fexplo_general_afeccionlist" id="fexplo_general_afeccionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_afeccion">
<div id="gmp_explo_general_afeccion" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($explo_general_afeccion_list->TotalRecords > 0 || $explo_general_afeccion_list->isGridEdit()) { ?>
<table id="tbl_explo_general_afeccionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$explo_general_afeccion->RowType = ROWTYPE_HEADER;

// Render list options
$explo_general_afeccion_list->renderListOptions();

// Render list options (header, left)
$explo_general_afeccion_list->ListOptions->render("header", "left");
?>
<?php if ($explo_general_afeccion_list->id->Visible) { // id ?>
	<?php if ($explo_general_afeccion_list->SortUrl($explo_general_afeccion_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $explo_general_afeccion_list->id->headerCellClass() ?>"><div id="elh_explo_general_afeccion_id" class="explo_general_afeccion_id"><div class="ew-table-header-caption"><?php echo $explo_general_afeccion_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $explo_general_afeccion_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_general_afeccion_list->SortUrl($explo_general_afeccion_list->id) ?>', 1);"><div id="elh_explo_general_afeccion_id" class="explo_general_afeccion_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_general_afeccion_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_general_afeccion_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_general_afeccion_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_general_afeccion_list->explo_general_cat->Visible) { // explo_general_cat ?>
	<?php if ($explo_general_afeccion_list->SortUrl($explo_general_afeccion_list->explo_general_cat) == "") { ?>
		<th data-name="explo_general_cat" class="<?php echo $explo_general_afeccion_list->explo_general_cat->headerCellClass() ?>"><div id="elh_explo_general_afeccion_explo_general_cat" class="explo_general_afeccion_explo_general_cat"><div class="ew-table-header-caption"><?php echo $explo_general_afeccion_list->explo_general_cat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="explo_general_cat" class="<?php echo $explo_general_afeccion_list->explo_general_cat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_general_afeccion_list->SortUrl($explo_general_afeccion_list->explo_general_cat) ?>', 1);"><div id="elh_explo_general_afeccion_explo_general_cat" class="explo_general_afeccion_explo_general_cat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_general_afeccion_list->explo_general_cat->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_general_afeccion_list->explo_general_cat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_general_afeccion_list->explo_general_cat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_general_afeccion_list->descripcion->Visible) { // descripcion ?>
	<?php if ($explo_general_afeccion_list->SortUrl($explo_general_afeccion_list->descripcion) == "") { ?>
		<th data-name="descripcion" class="<?php echo $explo_general_afeccion_list->descripcion->headerCellClass() ?>"><div id="elh_explo_general_afeccion_descripcion" class="explo_general_afeccion_descripcion"><div class="ew-table-header-caption"><?php echo $explo_general_afeccion_list->descripcion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion" class="<?php echo $explo_general_afeccion_list->descripcion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_general_afeccion_list->SortUrl($explo_general_afeccion_list->descripcion) ?>', 1);"><div id="elh_explo_general_afeccion_descripcion" class="explo_general_afeccion_descripcion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_general_afeccion_list->descripcion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($explo_general_afeccion_list->descripcion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_general_afeccion_list->descripcion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$explo_general_afeccion_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($explo_general_afeccion_list->ExportAll && $explo_general_afeccion_list->isExport()) {
	$explo_general_afeccion_list->StopRecord = $explo_general_afeccion_list->TotalRecords;
} else {

	// Set the last record to display
	if ($explo_general_afeccion_list->TotalRecords > $explo_general_afeccion_list->StartRecord + $explo_general_afeccion_list->DisplayRecords - 1)
		$explo_general_afeccion_list->StopRecord = $explo_general_afeccion_list->StartRecord + $explo_general_afeccion_list->DisplayRecords - 1;
	else
		$explo_general_afeccion_list->StopRecord = $explo_general_afeccion_list->TotalRecords;
}
$explo_general_afeccion_list->RecordCount = $explo_general_afeccion_list->StartRecord - 1;
if ($explo_general_afeccion_list->Recordset && !$explo_general_afeccion_list->Recordset->EOF) {
	$explo_general_afeccion_list->Recordset->moveFirst();
	$selectLimit = $explo_general_afeccion_list->UseSelectLimit;
	if (!$selectLimit && $explo_general_afeccion_list->StartRecord > 1)
		$explo_general_afeccion_list->Recordset->move($explo_general_afeccion_list->StartRecord - 1);
} elseif (!$explo_general_afeccion->AllowAddDeleteRow && $explo_general_afeccion_list->StopRecord == 0) {
	$explo_general_afeccion_list->StopRecord = $explo_general_afeccion->GridAddRowCount;
}

// Initialize aggregate
$explo_general_afeccion->RowType = ROWTYPE_AGGREGATEINIT;
$explo_general_afeccion->resetAttributes();
$explo_general_afeccion_list->renderRow();
while ($explo_general_afeccion_list->RecordCount < $explo_general_afeccion_list->StopRecord) {
	$explo_general_afeccion_list->RecordCount++;
	if ($explo_general_afeccion_list->RecordCount >= $explo_general_afeccion_list->StartRecord) {
		$explo_general_afeccion_list->RowCount++;

		// Set up key count
		$explo_general_afeccion_list->KeyCount = $explo_general_afeccion_list->RowIndex;

		// Init row class and style
		$explo_general_afeccion->resetAttributes();
		$explo_general_afeccion->CssClass = "";
		if ($explo_general_afeccion_list->isGridAdd()) {
		} else {
			$explo_general_afeccion_list->loadRowValues($explo_general_afeccion_list->Recordset); // Load row values
		}
		$explo_general_afeccion->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$explo_general_afeccion->RowAttrs->merge(["data-rowindex" => $explo_general_afeccion_list->RowCount, "id" => "r" . $explo_general_afeccion_list->RowCount . "_explo_general_afeccion", "data-rowtype" => $explo_general_afeccion->RowType]);

		// Render row
		$explo_general_afeccion_list->renderRow();

		// Render list options
		$explo_general_afeccion_list->renderListOptions();
?>
	<tr <?php echo $explo_general_afeccion->rowAttributes() ?>>
<?php

// Render list options (body, left)
$explo_general_afeccion_list->ListOptions->render("body", "left", $explo_general_afeccion_list->RowCount);
?>
	<?php if ($explo_general_afeccion_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $explo_general_afeccion_list->id->cellAttributes() ?>>
<span id="el<?php echo $explo_general_afeccion_list->RowCount ?>_explo_general_afeccion_id">
<span<?php echo $explo_general_afeccion_list->id->viewAttributes() ?>><?php echo $explo_general_afeccion_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_general_afeccion_list->explo_general_cat->Visible) { // explo_general_cat ?>
		<td data-name="explo_general_cat" <?php echo $explo_general_afeccion_list->explo_general_cat->cellAttributes() ?>>
<span id="el<?php echo $explo_general_afeccion_list->RowCount ?>_explo_general_afeccion_explo_general_cat">
<span<?php echo $explo_general_afeccion_list->explo_general_cat->viewAttributes() ?>><?php echo $explo_general_afeccion_list->explo_general_cat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_general_afeccion_list->descripcion->Visible) { // descripcion ?>
		<td data-name="descripcion" <?php echo $explo_general_afeccion_list->descripcion->cellAttributes() ?>>
<span id="el<?php echo $explo_general_afeccion_list->RowCount ?>_explo_general_afeccion_descripcion">
<span<?php echo $explo_general_afeccion_list->descripcion->viewAttributes() ?>><?php echo $explo_general_afeccion_list->descripcion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$explo_general_afeccion_list->ListOptions->render("body", "right", $explo_general_afeccion_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$explo_general_afeccion_list->isGridAdd())
		$explo_general_afeccion_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$explo_general_afeccion->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($explo_general_afeccion_list->Recordset)
	$explo_general_afeccion_list->Recordset->Close();
?>
<?php if (!$explo_general_afeccion_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$explo_general_afeccion_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_general_afeccion_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_general_afeccion_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($explo_general_afeccion_list->TotalRecords == 0 && !$explo_general_afeccion->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $explo_general_afeccion_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$explo_general_afeccion_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_general_afeccion_list->isExport()) { ?>
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
$explo_general_afeccion_list->terminate();
?>