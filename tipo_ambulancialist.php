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
$tipo_ambulancia_list = new tipo_ambulancia_list();

// Run the page
$tipo_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_ambulancia_list->isExport()) { ?>
<script>
var ftipo_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftipo_ambulancialist = currentForm = new ew.Form("ftipo_ambulancialist", "list");
	ftipo_ambulancialist.formKeyCountName = '<?php echo $tipo_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("ftipo_ambulancialist");
});
var ftipo_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftipo_ambulancialistsrch = currentSearchForm = new ew.Form("ftipo_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	ftipo_ambulancialistsrch.filterList = <?php echo $tipo_ambulancia_list->getFilterList() ?>;
	loadjs.done("ftipo_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tipo_ambulancia_list->TotalRecords > 0 && $tipo_ambulancia_list->ExportOptions->visible()) { ?>
<?php $tipo_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->ImportOptions->visible()) { ?>
<?php $tipo_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->SearchOptions->visible()) { ?>
<?php $tipo_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->FilterOptions->visible()) { ?>
<?php $tipo_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tipo_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tipo_ambulancia_list->isExport() && !$tipo_ambulancia->CurrentAction) { ?>
<form name="ftipo_ambulancialistsrch" id="ftipo_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftipo_ambulancialistsrch-search-panel" class="<?php echo $tipo_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tipo_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $tipo_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tipo_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tipo_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tipo_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tipo_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tipo_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tipo_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tipo_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tipo_ambulancia_list->showPageHeader(); ?>
<?php
$tipo_ambulancia_list->showMessage();
?>
<?php if ($tipo_ambulancia_list->TotalRecords > 0 || $tipo_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tipo_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tipo_ambulancia">
<?php if (!$tipo_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tipo_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftipo_ambulancialist" id="ftipo_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_ambulancia">
<div id="gmp_tipo_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tipo_ambulancia_list->TotalRecords > 0 || $tipo_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_tipo_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tipo_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$tipo_ambulancia_list->renderListOptions();

// Render list options (header, left)
$tipo_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($tipo_ambulancia_list->id_tipotransport->Visible) { // id_tipotransport ?>
	<?php if ($tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->id_tipotransport) == "") { ?>
		<th data-name="id_tipotransport" class="<?php echo $tipo_ambulancia_list->id_tipotransport->headerCellClass() ?>"><div id="elh_tipo_ambulancia_id_tipotransport" class="tipo_ambulancia_id_tipotransport"><div class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->id_tipotransport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_tipotransport" class="<?php echo $tipo_ambulancia_list->id_tipotransport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->id_tipotransport) ?>', 1);"><div id="elh_tipo_ambulancia_id_tipotransport" class="tipo_ambulancia_id_tipotransport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->id_tipotransport->caption() ?></span><span class="ew-table-header-sort"><?php if ($tipo_ambulancia_list->id_tipotransport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_ambulancia_list->id_tipotransport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->tipo_amb_es->Visible) { // tipo_amb_es ?>
	<?php if ($tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_es) == "") { ?>
		<th data-name="tipo_amb_es" class="<?php echo $tipo_ambulancia_list->tipo_amb_es->headerCellClass() ?>"><div id="elh_tipo_ambulancia_tipo_amb_es" class="tipo_ambulancia_tipo_amb_es"><div class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_amb_es" class="<?php echo $tipo_ambulancia_list->tipo_amb_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_es) ?>', 1);"><div id="elh_tipo_ambulancia_tipo_amb_es" class="tipo_ambulancia_tipo_amb_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_ambulancia_list->tipo_amb_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_ambulancia_list->tipo_amb_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->tipo_amb_en->Visible) { // tipo_amb_en ?>
	<?php if ($tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_en) == "") { ?>
		<th data-name="tipo_amb_en" class="<?php echo $tipo_ambulancia_list->tipo_amb_en->headerCellClass() ?>"><div id="elh_tipo_ambulancia_tipo_amb_en" class="tipo_ambulancia_tipo_amb_en"><div class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_amb_en" class="<?php echo $tipo_ambulancia_list->tipo_amb_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_en) ?>', 1);"><div id="elh_tipo_ambulancia_tipo_amb_en" class="tipo_ambulancia_tipo_amb_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_ambulancia_list->tipo_amb_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_ambulancia_list->tipo_amb_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
	<?php if ($tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_pr) == "") { ?>
		<th data-name="tipo_amb_pr" class="<?php echo $tipo_ambulancia_list->tipo_amb_pr->headerCellClass() ?>"><div id="elh_tipo_ambulancia_tipo_amb_pr" class="tipo_ambulancia_tipo_amb_pr"><div class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_amb_pr" class="<?php echo $tipo_ambulancia_list->tipo_amb_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_pr) ?>', 1);"><div id="elh_tipo_ambulancia_tipo_amb_pr" class="tipo_ambulancia_tipo_amb_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_ambulancia_list->tipo_amb_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_ambulancia_list->tipo_amb_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
	<?php if ($tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_fr) == "") { ?>
		<th data-name="tipo_amb_fr" class="<?php echo $tipo_ambulancia_list->tipo_amb_fr->headerCellClass() ?>"><div id="elh_tipo_ambulancia_tipo_amb_fr" class="tipo_ambulancia_tipo_amb_fr"><div class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_amb_fr" class="<?php echo $tipo_ambulancia_list->tipo_amb_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->tipo_amb_fr) ?>', 1);"><div id="elh_tipo_ambulancia_tipo_amb_fr" class="tipo_ambulancia_tipo_amb_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->tipo_amb_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_ambulancia_list->tipo_amb_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_ambulancia_list->tipo_amb_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_ambulancia_list->codigo->Visible) { // codigo ?>
	<?php if ($tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->codigo) == "") { ?>
		<th data-name="codigo" class="<?php echo $tipo_ambulancia_list->codigo->headerCellClass() ?>"><div id="elh_tipo_ambulancia_codigo" class="tipo_ambulancia_codigo"><div class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->codigo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="codigo" class="<?php echo $tipo_ambulancia_list->codigo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_ambulancia_list->SortUrl($tipo_ambulancia_list->codigo) ?>', 1);"><div id="elh_tipo_ambulancia_codigo" class="tipo_ambulancia_codigo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_ambulancia_list->codigo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_ambulancia_list->codigo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_ambulancia_list->codigo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tipo_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tipo_ambulancia_list->ExportAll && $tipo_ambulancia_list->isExport()) {
	$tipo_ambulancia_list->StopRecord = $tipo_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tipo_ambulancia_list->TotalRecords > $tipo_ambulancia_list->StartRecord + $tipo_ambulancia_list->DisplayRecords - 1)
		$tipo_ambulancia_list->StopRecord = $tipo_ambulancia_list->StartRecord + $tipo_ambulancia_list->DisplayRecords - 1;
	else
		$tipo_ambulancia_list->StopRecord = $tipo_ambulancia_list->TotalRecords;
}
$tipo_ambulancia_list->RecordCount = $tipo_ambulancia_list->StartRecord - 1;
if ($tipo_ambulancia_list->Recordset && !$tipo_ambulancia_list->Recordset->EOF) {
	$tipo_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $tipo_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $tipo_ambulancia_list->StartRecord > 1)
		$tipo_ambulancia_list->Recordset->move($tipo_ambulancia_list->StartRecord - 1);
} elseif (!$tipo_ambulancia->AllowAddDeleteRow && $tipo_ambulancia_list->StopRecord == 0) {
	$tipo_ambulancia_list->StopRecord = $tipo_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$tipo_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$tipo_ambulancia->resetAttributes();
$tipo_ambulancia_list->renderRow();
while ($tipo_ambulancia_list->RecordCount < $tipo_ambulancia_list->StopRecord) {
	$tipo_ambulancia_list->RecordCount++;
	if ($tipo_ambulancia_list->RecordCount >= $tipo_ambulancia_list->StartRecord) {
		$tipo_ambulancia_list->RowCount++;

		// Set up key count
		$tipo_ambulancia_list->KeyCount = $tipo_ambulancia_list->RowIndex;

		// Init row class and style
		$tipo_ambulancia->resetAttributes();
		$tipo_ambulancia->CssClass = "";
		if ($tipo_ambulancia_list->isGridAdd()) {
		} else {
			$tipo_ambulancia_list->loadRowValues($tipo_ambulancia_list->Recordset); // Load row values
		}
		$tipo_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tipo_ambulancia->RowAttrs->merge(["data-rowindex" => $tipo_ambulancia_list->RowCount, "id" => "r" . $tipo_ambulancia_list->RowCount . "_tipo_ambulancia", "data-rowtype" => $tipo_ambulancia->RowType]);

		// Render row
		$tipo_ambulancia_list->renderRow();

		// Render list options
		$tipo_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $tipo_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tipo_ambulancia_list->ListOptions->render("body", "left", $tipo_ambulancia_list->RowCount);
?>
	<?php if ($tipo_ambulancia_list->id_tipotransport->Visible) { // id_tipotransport ?>
		<td data-name="id_tipotransport" <?php echo $tipo_ambulancia_list->id_tipotransport->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_list->RowCount ?>_tipo_ambulancia_id_tipotransport">
<span<?php echo $tipo_ambulancia_list->id_tipotransport->viewAttributes() ?>><?php echo $tipo_ambulancia_list->id_tipotransport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_ambulancia_list->tipo_amb_es->Visible) { // tipo_amb_es ?>
		<td data-name="tipo_amb_es" <?php echo $tipo_ambulancia_list->tipo_amb_es->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_list->RowCount ?>_tipo_ambulancia_tipo_amb_es">
<span<?php echo $tipo_ambulancia_list->tipo_amb_es->viewAttributes() ?>><?php echo $tipo_ambulancia_list->tipo_amb_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_ambulancia_list->tipo_amb_en->Visible) { // tipo_amb_en ?>
		<td data-name="tipo_amb_en" <?php echo $tipo_ambulancia_list->tipo_amb_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_list->RowCount ?>_tipo_ambulancia_tipo_amb_en">
<span<?php echo $tipo_ambulancia_list->tipo_amb_en->viewAttributes() ?>><?php echo $tipo_ambulancia_list->tipo_amb_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_ambulancia_list->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
		<td data-name="tipo_amb_pr" <?php echo $tipo_ambulancia_list->tipo_amb_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_list->RowCount ?>_tipo_ambulancia_tipo_amb_pr">
<span<?php echo $tipo_ambulancia_list->tipo_amb_pr->viewAttributes() ?>><?php echo $tipo_ambulancia_list->tipo_amb_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_ambulancia_list->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
		<td data-name="tipo_amb_fr" <?php echo $tipo_ambulancia_list->tipo_amb_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_list->RowCount ?>_tipo_ambulancia_tipo_amb_fr">
<span<?php echo $tipo_ambulancia_list->tipo_amb_fr->viewAttributes() ?>><?php echo $tipo_ambulancia_list->tipo_amb_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_ambulancia_list->codigo->Visible) { // codigo ?>
		<td data-name="codigo" <?php echo $tipo_ambulancia_list->codigo->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_list->RowCount ?>_tipo_ambulancia_codigo">
<span<?php echo $tipo_ambulancia_list->codigo->viewAttributes() ?>><?php echo $tipo_ambulancia_list->codigo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tipo_ambulancia_list->ListOptions->render("body", "right", $tipo_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tipo_ambulancia_list->isGridAdd())
		$tipo_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tipo_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tipo_ambulancia_list->Recordset)
	$tipo_ambulancia_list->Recordset->Close();
?>
<?php if (!$tipo_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tipo_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tipo_ambulancia_list->TotalRecords == 0 && !$tipo_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tipo_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tipo_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_ambulancia_list->isExport()) { ?>
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
$tipo_ambulancia_list->terminate();
?>