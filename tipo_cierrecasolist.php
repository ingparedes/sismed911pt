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
$tipo_cierrecaso_list = new tipo_cierrecaso_list();

// Run the page
$tipo_cierrecaso_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_cierrecaso_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_cierrecaso_list->isExport()) { ?>
<script>
var ftipo_cierrecasolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftipo_cierrecasolist = currentForm = new ew.Form("ftipo_cierrecasolist", "list");
	ftipo_cierrecasolist.formKeyCountName = '<?php echo $tipo_cierrecaso_list->FormKeyCountName ?>';
	loadjs.done("ftipo_cierrecasolist");
});
var ftipo_cierrecasolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftipo_cierrecasolistsrch = currentSearchForm = new ew.Form("ftipo_cierrecasolistsrch");

	// Dynamic selection lists
	// Filters

	ftipo_cierrecasolistsrch.filterList = <?php echo $tipo_cierrecaso_list->getFilterList() ?>;
	loadjs.done("ftipo_cierrecasolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_cierrecaso_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tipo_cierrecaso_list->TotalRecords > 0 && $tipo_cierrecaso_list->ExportOptions->visible()) { ?>
<?php $tipo_cierrecaso_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->ImportOptions->visible()) { ?>
<?php $tipo_cierrecaso_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->SearchOptions->visible()) { ?>
<?php $tipo_cierrecaso_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->FilterOptions->visible()) { ?>
<?php $tipo_cierrecaso_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tipo_cierrecaso_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tipo_cierrecaso_list->isExport() && !$tipo_cierrecaso->CurrentAction) { ?>
<form name="ftipo_cierrecasolistsrch" id="ftipo_cierrecasolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftipo_cierrecasolistsrch-search-panel" class="<?php echo $tipo_cierrecaso_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tipo_cierrecaso">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $tipo_cierrecaso_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tipo_cierrecaso_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tipo_cierrecaso_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tipo_cierrecaso_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tipo_cierrecaso_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tipo_cierrecaso_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tipo_cierrecaso_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tipo_cierrecaso_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tipo_cierrecaso_list->showPageHeader(); ?>
<?php
$tipo_cierrecaso_list->showMessage();
?>
<?php if ($tipo_cierrecaso_list->TotalRecords > 0 || $tipo_cierrecaso->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tipo_cierrecaso_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tipo_cierrecaso">
<?php if (!$tipo_cierrecaso_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tipo_cierrecaso_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_cierrecaso_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_cierrecaso_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftipo_cierrecasolist" id="ftipo_cierrecasolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_cierrecaso">
<div id="gmp_tipo_cierrecaso" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tipo_cierrecaso_list->TotalRecords > 0 || $tipo_cierrecaso_list->isGridEdit()) { ?>
<table id="tbl_tipo_cierrecasolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tipo_cierrecaso->RowType = ROWTYPE_HEADER;

// Render list options
$tipo_cierrecaso_list->renderListOptions();

// Render list options (header, left)
$tipo_cierrecaso_list->ListOptions->render("header", "left");
?>
<?php if ($tipo_cierrecaso_list->id_tranlado_fallido->Visible) { // id_tranlado_fallido ?>
	<?php if ($tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->id_tranlado_fallido) == "") { ?>
		<th data-name="id_tranlado_fallido" class="<?php echo $tipo_cierrecaso_list->id_tranlado_fallido->headerCellClass() ?>"><div id="elh_tipo_cierrecaso_id_tranlado_fallido" class="tipo_cierrecaso_id_tranlado_fallido"><div class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->id_tranlado_fallido->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_tranlado_fallido" class="<?php echo $tipo_cierrecaso_list->id_tranlado_fallido->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->id_tranlado_fallido) ?>', 1);"><div id="elh_tipo_cierrecaso_id_tranlado_fallido" class="tipo_cierrecaso_id_tranlado_fallido">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->id_tranlado_fallido->caption() ?></span><span class="ew-table-header-sort"><?php if ($tipo_cierrecaso_list->id_tranlado_fallido->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_cierrecaso_list->id_tranlado_fallido->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_es->Visible) { // tipo_cierrecaso_es ?>
	<?php if ($tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_es) == "") { ?>
		<th data-name="tipo_cierrecaso_es" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->headerCellClass() ?>"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_es" class="tipo_cierrecaso_tipo_cierrecaso_es"><div class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_cierrecaso_es" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_es) ?>', 1);"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_es" class="tipo_cierrecaso_tipo_cierrecaso_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_cierrecaso_list->tipo_cierrecaso_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_cierrecaso_list->tipo_cierrecaso_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_en->Visible) { // tipo_cierrecaso_en ?>
	<?php if ($tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_en) == "") { ?>
		<th data-name="tipo_cierrecaso_en" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->headerCellClass() ?>"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_en" class="tipo_cierrecaso_tipo_cierrecaso_en"><div class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_cierrecaso_en" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_en) ?>', 1);"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_en" class="tipo_cierrecaso_tipo_cierrecaso_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_cierrecaso_list->tipo_cierrecaso_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_cierrecaso_list->tipo_cierrecaso_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_pr->Visible) { // tipo_cierrecaso_pr ?>
	<?php if ($tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_pr) == "") { ?>
		<th data-name="tipo_cierrecaso_pr" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->headerCellClass() ?>"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_pr" class="tipo_cierrecaso_tipo_cierrecaso_pr"><div class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_cierrecaso_pr" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_pr) ?>', 1);"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_pr" class="tipo_cierrecaso_tipo_cierrecaso_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_cierrecaso_list->tipo_cierrecaso_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_cierrecaso_list->tipo_cierrecaso_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_fr->Visible) { // tipo_cierrecaso_fr ?>
	<?php if ($tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_fr) == "") { ?>
		<th data-name="tipo_cierrecaso_fr" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->headerCellClass() ?>"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_fr" class="tipo_cierrecaso_tipo_cierrecaso_fr"><div class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_cierrecaso_fr" class="<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_cierrecaso_list->SortUrl($tipo_cierrecaso_list->tipo_cierrecaso_fr) ?>', 1);"><div id="elh_tipo_cierrecaso_tipo_cierrecaso_fr" class="tipo_cierrecaso_tipo_cierrecaso_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_cierrecaso_list->tipo_cierrecaso_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_cierrecaso_list->tipo_cierrecaso_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tipo_cierrecaso_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tipo_cierrecaso_list->ExportAll && $tipo_cierrecaso_list->isExport()) {
	$tipo_cierrecaso_list->StopRecord = $tipo_cierrecaso_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tipo_cierrecaso_list->TotalRecords > $tipo_cierrecaso_list->StartRecord + $tipo_cierrecaso_list->DisplayRecords - 1)
		$tipo_cierrecaso_list->StopRecord = $tipo_cierrecaso_list->StartRecord + $tipo_cierrecaso_list->DisplayRecords - 1;
	else
		$tipo_cierrecaso_list->StopRecord = $tipo_cierrecaso_list->TotalRecords;
}
$tipo_cierrecaso_list->RecordCount = $tipo_cierrecaso_list->StartRecord - 1;
if ($tipo_cierrecaso_list->Recordset && !$tipo_cierrecaso_list->Recordset->EOF) {
	$tipo_cierrecaso_list->Recordset->moveFirst();
	$selectLimit = $tipo_cierrecaso_list->UseSelectLimit;
	if (!$selectLimit && $tipo_cierrecaso_list->StartRecord > 1)
		$tipo_cierrecaso_list->Recordset->move($tipo_cierrecaso_list->StartRecord - 1);
} elseif (!$tipo_cierrecaso->AllowAddDeleteRow && $tipo_cierrecaso_list->StopRecord == 0) {
	$tipo_cierrecaso_list->StopRecord = $tipo_cierrecaso->GridAddRowCount;
}

// Initialize aggregate
$tipo_cierrecaso->RowType = ROWTYPE_AGGREGATEINIT;
$tipo_cierrecaso->resetAttributes();
$tipo_cierrecaso_list->renderRow();
while ($tipo_cierrecaso_list->RecordCount < $tipo_cierrecaso_list->StopRecord) {
	$tipo_cierrecaso_list->RecordCount++;
	if ($tipo_cierrecaso_list->RecordCount >= $tipo_cierrecaso_list->StartRecord) {
		$tipo_cierrecaso_list->RowCount++;

		// Set up key count
		$tipo_cierrecaso_list->KeyCount = $tipo_cierrecaso_list->RowIndex;

		// Init row class and style
		$tipo_cierrecaso->resetAttributes();
		$tipo_cierrecaso->CssClass = "";
		if ($tipo_cierrecaso_list->isGridAdd()) {
		} else {
			$tipo_cierrecaso_list->loadRowValues($tipo_cierrecaso_list->Recordset); // Load row values
		}
		$tipo_cierrecaso->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tipo_cierrecaso->RowAttrs->merge(["data-rowindex" => $tipo_cierrecaso_list->RowCount, "id" => "r" . $tipo_cierrecaso_list->RowCount . "_tipo_cierrecaso", "data-rowtype" => $tipo_cierrecaso->RowType]);

		// Render row
		$tipo_cierrecaso_list->renderRow();

		// Render list options
		$tipo_cierrecaso_list->renderListOptions();
?>
	<tr <?php echo $tipo_cierrecaso->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tipo_cierrecaso_list->ListOptions->render("body", "left", $tipo_cierrecaso_list->RowCount);
?>
	<?php if ($tipo_cierrecaso_list->id_tranlado_fallido->Visible) { // id_tranlado_fallido ?>
		<td data-name="id_tranlado_fallido" <?php echo $tipo_cierrecaso_list->id_tranlado_fallido->cellAttributes() ?>>
<span id="el<?php echo $tipo_cierrecaso_list->RowCount ?>_tipo_cierrecaso_id_tranlado_fallido">
<span<?php echo $tipo_cierrecaso_list->id_tranlado_fallido->viewAttributes() ?>><?php echo $tipo_cierrecaso_list->id_tranlado_fallido->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_es->Visible) { // tipo_cierrecaso_es ?>
		<td data-name="tipo_cierrecaso_es" <?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->cellAttributes() ?>>
<span id="el<?php echo $tipo_cierrecaso_list->RowCount ?>_tipo_cierrecaso_tipo_cierrecaso_es">
<span<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->viewAttributes() ?>><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_en->Visible) { // tipo_cierrecaso_en ?>
		<td data-name="tipo_cierrecaso_en" <?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_cierrecaso_list->RowCount ?>_tipo_cierrecaso_tipo_cierrecaso_en">
<span<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->viewAttributes() ?>><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_pr->Visible) { // tipo_cierrecaso_pr ?>
		<td data-name="tipo_cierrecaso_pr" <?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_cierrecaso_list->RowCount ?>_tipo_cierrecaso_tipo_cierrecaso_pr">
<span<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->viewAttributes() ?>><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_cierrecaso_list->tipo_cierrecaso_fr->Visible) { // tipo_cierrecaso_fr ?>
		<td data-name="tipo_cierrecaso_fr" <?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_cierrecaso_list->RowCount ?>_tipo_cierrecaso_tipo_cierrecaso_fr">
<span<?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->viewAttributes() ?>><?php echo $tipo_cierrecaso_list->tipo_cierrecaso_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tipo_cierrecaso_list->ListOptions->render("body", "right", $tipo_cierrecaso_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tipo_cierrecaso_list->isGridAdd())
		$tipo_cierrecaso_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tipo_cierrecaso->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tipo_cierrecaso_list->Recordset)
	$tipo_cierrecaso_list->Recordset->Close();
?>
<?php if (!$tipo_cierrecaso_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tipo_cierrecaso_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_cierrecaso_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_cierrecaso_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tipo_cierrecaso_list->TotalRecords == 0 && !$tipo_cierrecaso->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tipo_cierrecaso_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tipo_cierrecaso_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_cierrecaso_list->isExport()) { ?>
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
$tipo_cierrecaso_list->terminate();
?>