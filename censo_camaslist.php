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
$censo_camas_list = new censo_camas_list();

// Run the page
$censo_camas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_camas_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$censo_camas_list->isExport()) { ?>
<script>
var fcenso_camaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcenso_camaslist = currentForm = new ew.Form("fcenso_camaslist", "list");
	fcenso_camaslist.formKeyCountName = '<?php echo $censo_camas_list->FormKeyCountName ?>';
	loadjs.done("fcenso_camaslist");
});
var fcenso_camaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcenso_camaslistsrch = currentSearchForm = new ew.Form("fcenso_camaslistsrch");

	// Dynamic selection lists
	// Filters

	fcenso_camaslistsrch.filterList = <?php echo $censo_camas_list->getFilterList() ?>;
	loadjs.done("fcenso_camaslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$censo_camas_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($censo_camas_list->TotalRecords > 0 && $censo_camas_list->ExportOptions->visible()) { ?>
<?php $censo_camas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($censo_camas_list->ImportOptions->visible()) { ?>
<?php $censo_camas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($censo_camas_list->SearchOptions->visible()) { ?>
<?php $censo_camas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($censo_camas_list->FilterOptions->visible()) { ?>
<?php $censo_camas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$censo_camas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$censo_camas_list->isExport() && !$censo_camas->CurrentAction) { ?>
<form name="fcenso_camaslistsrch" id="fcenso_camaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcenso_camaslistsrch-search-panel" class="<?php echo $censo_camas_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="censo_camas">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $censo_camas_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($censo_camas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($censo_camas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $censo_camas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($censo_camas_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($censo_camas_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($censo_camas_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($censo_camas_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $censo_camas_list->showPageHeader(); ?>
<?php
$censo_camas_list->showMessage();
?>
<?php if ($censo_camas_list->TotalRecords > 0 || $censo_camas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($censo_camas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> censo_camas">
<?php if (!$censo_camas_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$censo_camas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $censo_camas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $censo_camas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcenso_camaslist" id="fcenso_camaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_camas">
<div id="gmp_censo_camas" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($censo_camas_list->TotalRecords > 0 || $censo_camas_list->isGridEdit()) { ?>
<table id="tbl_censo_camaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$censo_camas->RowType = ROWTYPE_HEADER;

// Render list options
$censo_camas_list->renderListOptions();

// Render list options (header, left)
$censo_camas_list->ListOptions->render("header", "left");
?>
<?php if ($censo_camas_list->id_cama->Visible) { // id_cama ?>
	<?php if ($censo_camas_list->SortUrl($censo_camas_list->id_cama) == "") { ?>
		<th data-name="id_cama" class="<?php echo $censo_camas_list->id_cama->headerCellClass() ?>"><div id="elh_censo_camas_id_cama" class="censo_camas_id_cama"><div class="ew-table-header-caption"><?php echo $censo_camas_list->id_cama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_cama" class="<?php echo $censo_camas_list->id_cama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_camas_list->SortUrl($censo_camas_list->id_cama) ?>', 1);"><div id="elh_censo_camas_id_cama" class="censo_camas_id_cama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_camas_list->id_cama->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_camas_list->id_cama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_camas_list->id_cama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_camas_list->id_hospital->Visible) { // id_hospital ?>
	<?php if ($censo_camas_list->SortUrl($censo_camas_list->id_hospital) == "") { ?>
		<th data-name="id_hospital" class="<?php echo $censo_camas_list->id_hospital->headerCellClass() ?>"><div id="elh_censo_camas_id_hospital" class="censo_camas_id_hospital"><div class="ew-table-header-caption"><?php echo $censo_camas_list->id_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hospital" class="<?php echo $censo_camas_list->id_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_camas_list->SortUrl($censo_camas_list->id_hospital) ?>', 1);"><div id="elh_censo_camas_id_hospital" class="censo_camas_id_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_camas_list->id_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_camas_list->id_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_camas_list->id_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_camas_list->fecha_reporte->Visible) { // fecha_reporte ?>
	<?php if ($censo_camas_list->SortUrl($censo_camas_list->fecha_reporte) == "") { ?>
		<th data-name="fecha_reporte" class="<?php echo $censo_camas_list->fecha_reporte->headerCellClass() ?>"><div id="elh_censo_camas_fecha_reporte" class="censo_camas_fecha_reporte"><div class="ew-table-header-caption"><?php echo $censo_camas_list->fecha_reporte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_reporte" class="<?php echo $censo_camas_list->fecha_reporte->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_camas_list->SortUrl($censo_camas_list->fecha_reporte) ?>', 1);"><div id="elh_censo_camas_fecha_reporte" class="censo_camas_fecha_reporte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_camas_list->fecha_reporte->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_camas_list->fecha_reporte->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_camas_list->fecha_reporte->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_camas_list->nombre_reporta->Visible) { // nombre_reporta ?>
	<?php if ($censo_camas_list->SortUrl($censo_camas_list->nombre_reporta) == "") { ?>
		<th data-name="nombre_reporta" class="<?php echo $censo_camas_list->nombre_reporta->headerCellClass() ?>"><div id="elh_censo_camas_nombre_reporta" class="censo_camas_nombre_reporta"><div class="ew-table-header-caption"><?php echo $censo_camas_list->nombre_reporta->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_reporta" class="<?php echo $censo_camas_list->nombre_reporta->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_camas_list->SortUrl($censo_camas_list->nombre_reporta) ?>', 1);"><div id="elh_censo_camas_nombre_reporta" class="censo_camas_nombre_reporta">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_camas_list->nombre_reporta->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($censo_camas_list->nombre_reporta->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_camas_list->nombre_reporta->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_camas_list->tele_reporta->Visible) { // tele_reporta ?>
	<?php if ($censo_camas_list->SortUrl($censo_camas_list->tele_reporta) == "") { ?>
		<th data-name="tele_reporta" class="<?php echo $censo_camas_list->tele_reporta->headerCellClass() ?>"><div id="elh_censo_camas_tele_reporta" class="censo_camas_tele_reporta"><div class="ew-table-header-caption"><?php echo $censo_camas_list->tele_reporta->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tele_reporta" class="<?php echo $censo_camas_list->tele_reporta->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_camas_list->SortUrl($censo_camas_list->tele_reporta) ?>', 1);"><div id="elh_censo_camas_tele_reporta" class="censo_camas_tele_reporta">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_camas_list->tele_reporta->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($censo_camas_list->tele_reporta->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_camas_list->tele_reporta->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_camas_list->id_bloque->Visible) { // id_bloque ?>
	<?php if ($censo_camas_list->SortUrl($censo_camas_list->id_bloque) == "") { ?>
		<th data-name="id_bloque" class="<?php echo $censo_camas_list->id_bloque->headerCellClass() ?>"><div id="elh_censo_camas_id_bloque" class="censo_camas_id_bloque"><div class="ew-table-header-caption"><?php echo $censo_camas_list->id_bloque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_bloque" class="<?php echo $censo_camas_list->id_bloque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_camas_list->SortUrl($censo_camas_list->id_bloque) ?>', 1);"><div id="elh_censo_camas_id_bloque" class="censo_camas_id_bloque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_camas_list->id_bloque->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_camas_list->id_bloque->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_camas_list->id_bloque->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$censo_camas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($censo_camas_list->ExportAll && $censo_camas_list->isExport()) {
	$censo_camas_list->StopRecord = $censo_camas_list->TotalRecords;
} else {

	// Set the last record to display
	if ($censo_camas_list->TotalRecords > $censo_camas_list->StartRecord + $censo_camas_list->DisplayRecords - 1)
		$censo_camas_list->StopRecord = $censo_camas_list->StartRecord + $censo_camas_list->DisplayRecords - 1;
	else
		$censo_camas_list->StopRecord = $censo_camas_list->TotalRecords;
}
$censo_camas_list->RecordCount = $censo_camas_list->StartRecord - 1;
if ($censo_camas_list->Recordset && !$censo_camas_list->Recordset->EOF) {
	$censo_camas_list->Recordset->moveFirst();
	$selectLimit = $censo_camas_list->UseSelectLimit;
	if (!$selectLimit && $censo_camas_list->StartRecord > 1)
		$censo_camas_list->Recordset->move($censo_camas_list->StartRecord - 1);
} elseif (!$censo_camas->AllowAddDeleteRow && $censo_camas_list->StopRecord == 0) {
	$censo_camas_list->StopRecord = $censo_camas->GridAddRowCount;
}

// Initialize aggregate
$censo_camas->RowType = ROWTYPE_AGGREGATEINIT;
$censo_camas->resetAttributes();
$censo_camas_list->renderRow();
while ($censo_camas_list->RecordCount < $censo_camas_list->StopRecord) {
	$censo_camas_list->RecordCount++;
	if ($censo_camas_list->RecordCount >= $censo_camas_list->StartRecord) {
		$censo_camas_list->RowCount++;

		// Set up key count
		$censo_camas_list->KeyCount = $censo_camas_list->RowIndex;

		// Init row class and style
		$censo_camas->resetAttributes();
		$censo_camas->CssClass = "";
		if ($censo_camas_list->isGridAdd()) {
		} else {
			$censo_camas_list->loadRowValues($censo_camas_list->Recordset); // Load row values
		}
		$censo_camas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$censo_camas->RowAttrs->merge(["data-rowindex" => $censo_camas_list->RowCount, "id" => "r" . $censo_camas_list->RowCount . "_censo_camas", "data-rowtype" => $censo_camas->RowType]);

		// Render row
		$censo_camas_list->renderRow();

		// Render list options
		$censo_camas_list->renderListOptions();
?>
	<tr <?php echo $censo_camas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$censo_camas_list->ListOptions->render("body", "left", $censo_camas_list->RowCount);
?>
	<?php if ($censo_camas_list->id_cama->Visible) { // id_cama ?>
		<td data-name="id_cama" <?php echo $censo_camas_list->id_cama->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_list->RowCount ?>_censo_camas_id_cama">
<span<?php echo $censo_camas_list->id_cama->viewAttributes() ?>><?php echo $censo_camas_list->id_cama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_camas_list->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital" <?php echo $censo_camas_list->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_list->RowCount ?>_censo_camas_id_hospital">
<span<?php echo $censo_camas_list->id_hospital->viewAttributes() ?>><?php echo $censo_camas_list->id_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_camas_list->fecha_reporte->Visible) { // fecha_reporte ?>
		<td data-name="fecha_reporte" <?php echo $censo_camas_list->fecha_reporte->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_list->RowCount ?>_censo_camas_fecha_reporte">
<span<?php echo $censo_camas_list->fecha_reporte->viewAttributes() ?>><?php echo $censo_camas_list->fecha_reporte->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_camas_list->nombre_reporta->Visible) { // nombre_reporta ?>
		<td data-name="nombre_reporta" <?php echo $censo_camas_list->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_list->RowCount ?>_censo_camas_nombre_reporta">
<span<?php echo $censo_camas_list->nombre_reporta->viewAttributes() ?>><?php echo $censo_camas_list->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_camas_list->tele_reporta->Visible) { // tele_reporta ?>
		<td data-name="tele_reporta" <?php echo $censo_camas_list->tele_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_list->RowCount ?>_censo_camas_tele_reporta">
<span<?php echo $censo_camas_list->tele_reporta->viewAttributes() ?>><?php echo $censo_camas_list->tele_reporta->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_camas_list->id_bloque->Visible) { // id_bloque ?>
		<td data-name="id_bloque" <?php echo $censo_camas_list->id_bloque->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_list->RowCount ?>_censo_camas_id_bloque">
<span<?php echo $censo_camas_list->id_bloque->viewAttributes() ?>><?php echo $censo_camas_list->id_bloque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$censo_camas_list->ListOptions->render("body", "right", $censo_camas_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$censo_camas_list->isGridAdd())
		$censo_camas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$censo_camas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($censo_camas_list->Recordset)
	$censo_camas_list->Recordset->Close();
?>
<?php if (!$censo_camas_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$censo_camas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $censo_camas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $censo_camas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($censo_camas_list->TotalRecords == 0 && !$censo_camas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $censo_camas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$censo_camas_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$censo_camas_list->isExport()) { ?>
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
$censo_camas_list->terminate();
?>