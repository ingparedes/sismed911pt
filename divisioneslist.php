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
$divisiones_list = new divisiones_list();

// Run the page
$divisiones_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$divisiones_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$divisiones_list->isExport()) { ?>
<script>
var fdivisioneslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdivisioneslist = currentForm = new ew.Form("fdivisioneslist", "list");
	fdivisioneslist.formKeyCountName = '<?php echo $divisiones_list->FormKeyCountName ?>';
	loadjs.done("fdivisioneslist");
});
var fdivisioneslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdivisioneslistsrch = currentSearchForm = new ew.Form("fdivisioneslistsrch");

	// Dynamic selection lists
	// Filters

	fdivisioneslistsrch.filterList = <?php echo $divisiones_list->getFilterList() ?>;
	loadjs.done("fdivisioneslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$divisiones_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($divisiones_list->TotalRecords > 0 && $divisiones_list->ExportOptions->visible()) { ?>
<?php $divisiones_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($divisiones_list->ImportOptions->visible()) { ?>
<?php $divisiones_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($divisiones_list->SearchOptions->visible()) { ?>
<?php $divisiones_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($divisiones_list->FilterOptions->visible()) { ?>
<?php $divisiones_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$divisiones_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$divisiones_list->isExport() && !$divisiones->CurrentAction) { ?>
<form name="fdivisioneslistsrch" id="fdivisioneslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdivisioneslistsrch-search-panel" class="<?php echo $divisiones_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="divisiones">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $divisiones_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($divisiones_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($divisiones_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $divisiones_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($divisiones_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($divisiones_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($divisiones_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($divisiones_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $divisiones_list->showPageHeader(); ?>
<?php
$divisiones_list->showMessage();
?>
<?php if ($divisiones_list->TotalRecords > 0 || $divisiones->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($divisiones_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> divisiones">
<?php if (!$divisiones_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$divisiones_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $divisiones_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $divisiones_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdivisioneslist" id="fdivisioneslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="divisiones">
<div id="gmp_divisiones" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($divisiones_list->TotalRecords > 0 || $divisiones_list->isGridEdit()) { ?>
<table id="tbl_divisioneslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$divisiones->RowType = ROWTYPE_HEADER;

// Render list options
$divisiones_list->renderListOptions();

// Render list options (header, left)
$divisiones_list->ListOptions->render("header", "left");
?>
<?php if ($divisiones_list->id_servicio->Visible) { // id_servicio ?>
	<?php if ($divisiones_list->SortUrl($divisiones_list->id_servicio) == "") { ?>
		<th data-name="id_servicio" class="<?php echo $divisiones_list->id_servicio->headerCellClass() ?>"><div id="elh_divisiones_id_servicio" class="divisiones_id_servicio"><div class="ew-table-header-caption"><?php echo $divisiones_list->id_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_servicio" class="<?php echo $divisiones_list->id_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $divisiones_list->SortUrl($divisiones_list->id_servicio) ?>', 1);"><div id="elh_divisiones_id_servicio" class="divisiones_id_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $divisiones_list->id_servicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($divisiones_list->id_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($divisiones_list->id_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($divisiones_list->descripcion->Visible) { // descripcion ?>
	<?php if ($divisiones_list->SortUrl($divisiones_list->descripcion) == "") { ?>
		<th data-name="descripcion" class="<?php echo $divisiones_list->descripcion->headerCellClass() ?>"><div id="elh_divisiones_descripcion" class="divisiones_descripcion"><div class="ew-table-header-caption"><?php echo $divisiones_list->descripcion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion" class="<?php echo $divisiones_list->descripcion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $divisiones_list->SortUrl($divisiones_list->descripcion) ?>', 1);"><div id="elh_divisiones_descripcion" class="divisiones_descripcion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $divisiones_list->descripcion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($divisiones_list->descripcion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($divisiones_list->descripcion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($divisiones_list->nombre_servicio->Visible) { // nombre_servicio ?>
	<?php if ($divisiones_list->SortUrl($divisiones_list->nombre_servicio) == "") { ?>
		<th data-name="nombre_servicio" class="<?php echo $divisiones_list->nombre_servicio->headerCellClass() ?>"><div id="elh_divisiones_nombre_servicio" class="divisiones_nombre_servicio"><div class="ew-table-header-caption"><?php echo $divisiones_list->nombre_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_servicio" class="<?php echo $divisiones_list->nombre_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $divisiones_list->SortUrl($divisiones_list->nombre_servicio) ?>', 1);"><div id="elh_divisiones_nombre_servicio" class="divisiones_nombre_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $divisiones_list->nombre_servicio->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($divisiones_list->nombre_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($divisiones_list->nombre_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($divisiones_list->bloque->Visible) { // bloque ?>
	<?php if ($divisiones_list->SortUrl($divisiones_list->bloque) == "") { ?>
		<th data-name="bloque" class="<?php echo $divisiones_list->bloque->headerCellClass() ?>"><div id="elh_divisiones_bloque" class="divisiones_bloque"><div class="ew-table-header-caption"><?php echo $divisiones_list->bloque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloque" class="<?php echo $divisiones_list->bloque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $divisiones_list->SortUrl($divisiones_list->bloque) ?>', 1);"><div id="elh_divisiones_bloque" class="divisiones_bloque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $divisiones_list->bloque->caption() ?></span><span class="ew-table-header-sort"><?php if ($divisiones_list->bloque->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($divisiones_list->bloque->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$divisiones_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($divisiones_list->ExportAll && $divisiones_list->isExport()) {
	$divisiones_list->StopRecord = $divisiones_list->TotalRecords;
} else {

	// Set the last record to display
	if ($divisiones_list->TotalRecords > $divisiones_list->StartRecord + $divisiones_list->DisplayRecords - 1)
		$divisiones_list->StopRecord = $divisiones_list->StartRecord + $divisiones_list->DisplayRecords - 1;
	else
		$divisiones_list->StopRecord = $divisiones_list->TotalRecords;
}
$divisiones_list->RecordCount = $divisiones_list->StartRecord - 1;
if ($divisiones_list->Recordset && !$divisiones_list->Recordset->EOF) {
	$divisiones_list->Recordset->moveFirst();
	$selectLimit = $divisiones_list->UseSelectLimit;
	if (!$selectLimit && $divisiones_list->StartRecord > 1)
		$divisiones_list->Recordset->move($divisiones_list->StartRecord - 1);
} elseif (!$divisiones->AllowAddDeleteRow && $divisiones_list->StopRecord == 0) {
	$divisiones_list->StopRecord = $divisiones->GridAddRowCount;
}

// Initialize aggregate
$divisiones->RowType = ROWTYPE_AGGREGATEINIT;
$divisiones->resetAttributes();
$divisiones_list->renderRow();
while ($divisiones_list->RecordCount < $divisiones_list->StopRecord) {
	$divisiones_list->RecordCount++;
	if ($divisiones_list->RecordCount >= $divisiones_list->StartRecord) {
		$divisiones_list->RowCount++;

		// Set up key count
		$divisiones_list->KeyCount = $divisiones_list->RowIndex;

		// Init row class and style
		$divisiones->resetAttributes();
		$divisiones->CssClass = "";
		if ($divisiones_list->isGridAdd()) {
		} else {
			$divisiones_list->loadRowValues($divisiones_list->Recordset); // Load row values
		}
		$divisiones->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$divisiones->RowAttrs->merge(["data-rowindex" => $divisiones_list->RowCount, "id" => "r" . $divisiones_list->RowCount . "_divisiones", "data-rowtype" => $divisiones->RowType]);

		// Render row
		$divisiones_list->renderRow();

		// Render list options
		$divisiones_list->renderListOptions();
?>
	<tr <?php echo $divisiones->rowAttributes() ?>>
<?php

// Render list options (body, left)
$divisiones_list->ListOptions->render("body", "left", $divisiones_list->RowCount);
?>
	<?php if ($divisiones_list->id_servicio->Visible) { // id_servicio ?>
		<td data-name="id_servicio" <?php echo $divisiones_list->id_servicio->cellAttributes() ?>>
<span id="el<?php echo $divisiones_list->RowCount ?>_divisiones_id_servicio">
<span<?php echo $divisiones_list->id_servicio->viewAttributes() ?>><?php echo $divisiones_list->id_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($divisiones_list->descripcion->Visible) { // descripcion ?>
		<td data-name="descripcion" <?php echo $divisiones_list->descripcion->cellAttributes() ?>>
<span id="el<?php echo $divisiones_list->RowCount ?>_divisiones_descripcion">
<span<?php echo $divisiones_list->descripcion->viewAttributes() ?>><?php echo $divisiones_list->descripcion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($divisiones_list->nombre_servicio->Visible) { // nombre_servicio ?>
		<td data-name="nombre_servicio" <?php echo $divisiones_list->nombre_servicio->cellAttributes() ?>>
<span id="el<?php echo $divisiones_list->RowCount ?>_divisiones_nombre_servicio">
<span<?php echo $divisiones_list->nombre_servicio->viewAttributes() ?>><?php echo $divisiones_list->nombre_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($divisiones_list->bloque->Visible) { // bloque ?>
		<td data-name="bloque" <?php echo $divisiones_list->bloque->cellAttributes() ?>>
<span id="el<?php echo $divisiones_list->RowCount ?>_divisiones_bloque">
<span<?php echo $divisiones_list->bloque->viewAttributes() ?>><?php echo $divisiones_list->bloque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$divisiones_list->ListOptions->render("body", "right", $divisiones_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$divisiones_list->isGridAdd())
		$divisiones_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$divisiones->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($divisiones_list->Recordset)
	$divisiones_list->Recordset->Close();
?>
<?php if (!$divisiones_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$divisiones_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $divisiones_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $divisiones_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($divisiones_list->TotalRecords == 0 && !$divisiones->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $divisiones_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$divisiones_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$divisiones_list->isExport()) { ?>
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
$divisiones_list->terminate();
?>