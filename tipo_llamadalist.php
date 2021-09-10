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
$tipo_llamada_list = new tipo_llamada_list();

// Run the page
$tipo_llamada_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_llamada_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_llamada_list->isExport()) { ?>
<script>
var ftipo_llamadalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftipo_llamadalist = currentForm = new ew.Form("ftipo_llamadalist", "list");
	ftipo_llamadalist.formKeyCountName = '<?php echo $tipo_llamada_list->FormKeyCountName ?>';
	loadjs.done("ftipo_llamadalist");
});
var ftipo_llamadalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftipo_llamadalistsrch = currentSearchForm = new ew.Form("ftipo_llamadalistsrch");

	// Dynamic selection lists
	// Filters

	ftipo_llamadalistsrch.filterList = <?php echo $tipo_llamada_list->getFilterList() ?>;
	loadjs.done("ftipo_llamadalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_llamada_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tipo_llamada_list->TotalRecords > 0 && $tipo_llamada_list->ExportOptions->visible()) { ?>
<?php $tipo_llamada_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_llamada_list->ImportOptions->visible()) { ?>
<?php $tipo_llamada_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_llamada_list->SearchOptions->visible()) { ?>
<?php $tipo_llamada_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_llamada_list->FilterOptions->visible()) { ?>
<?php $tipo_llamada_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tipo_llamada_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tipo_llamada_list->isExport() && !$tipo_llamada->CurrentAction) { ?>
<form name="ftipo_llamadalistsrch" id="ftipo_llamadalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftipo_llamadalistsrch-search-panel" class="<?php echo $tipo_llamada_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tipo_llamada">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $tipo_llamada_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tipo_llamada_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tipo_llamada_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tipo_llamada_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tipo_llamada_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tipo_llamada_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tipo_llamada_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tipo_llamada_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tipo_llamada_list->showPageHeader(); ?>
<?php
$tipo_llamada_list->showMessage();
?>
<?php if ($tipo_llamada_list->TotalRecords > 0 || $tipo_llamada->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tipo_llamada_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tipo_llamada">
<?php if (!$tipo_llamada_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tipo_llamada_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_llamada_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_llamada_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftipo_llamadalist" id="ftipo_llamadalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_llamada">
<div id="gmp_tipo_llamada" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tipo_llamada_list->TotalRecords > 0 || $tipo_llamada_list->isGridEdit()) { ?>
<table id="tbl_tipo_llamadalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tipo_llamada->RowType = ROWTYPE_HEADER;

// Render list options
$tipo_llamada_list->renderListOptions();

// Render list options (header, left)
$tipo_llamada_list->ListOptions->render("header", "left");
?>
<?php if ($tipo_llamada_list->id_llamda_f->Visible) { // id_llamda_f ?>
	<?php if ($tipo_llamada_list->SortUrl($tipo_llamada_list->id_llamda_f) == "") { ?>
		<th data-name="id_llamda_f" class="<?php echo $tipo_llamada_list->id_llamda_f->headerCellClass() ?>"><div id="elh_tipo_llamada_id_llamda_f" class="tipo_llamada_id_llamda_f"><div class="ew-table-header-caption"><?php echo $tipo_llamada_list->id_llamda_f->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_llamda_f" class="<?php echo $tipo_llamada_list->id_llamda_f->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_llamada_list->SortUrl($tipo_llamada_list->id_llamda_f) ?>', 1);"><div id="elh_tipo_llamada_id_llamda_f" class="tipo_llamada_id_llamda_f">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_llamada_list->id_llamda_f->caption() ?></span><span class="ew-table-header-sort"><?php if ($tipo_llamada_list->id_llamda_f->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_llamada_list->id_llamda_f->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_llamada_list->llamada_fallida->Visible) { // llamada_fallida ?>
	<?php if ($tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida) == "") { ?>
		<th data-name="llamada_fallida" class="<?php echo $tipo_llamada_list->llamada_fallida->headerCellClass() ?>"><div id="elh_tipo_llamada_llamada_fallida" class="tipo_llamada_llamada_fallida"><div class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="llamada_fallida" class="<?php echo $tipo_llamada_list->llamada_fallida->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida) ?>', 1);"><div id="elh_tipo_llamada_llamada_fallida" class="tipo_llamada_llamada_fallida">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_llamada_list->llamada_fallida->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_llamada_list->llamada_fallida->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_llamada_list->llamada_fallida_en->Visible) { // llamada_fallida_en ?>
	<?php if ($tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida_en) == "") { ?>
		<th data-name="llamada_fallida_en" class="<?php echo $tipo_llamada_list->llamada_fallida_en->headerCellClass() ?>"><div id="elh_tipo_llamada_llamada_fallida_en" class="tipo_llamada_llamada_fallida_en"><div class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="llamada_fallida_en" class="<?php echo $tipo_llamada_list->llamada_fallida_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida_en) ?>', 1);"><div id="elh_tipo_llamada_llamada_fallida_en" class="tipo_llamada_llamada_fallida_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_llamada_list->llamada_fallida_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_llamada_list->llamada_fallida_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_llamada_list->llamada_fallida_pr->Visible) { // llamada_fallida_pr ?>
	<?php if ($tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida_pr) == "") { ?>
		<th data-name="llamada_fallida_pr" class="<?php echo $tipo_llamada_list->llamada_fallida_pr->headerCellClass() ?>"><div id="elh_tipo_llamada_llamada_fallida_pr" class="tipo_llamada_llamada_fallida_pr"><div class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="llamada_fallida_pr" class="<?php echo $tipo_llamada_list->llamada_fallida_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida_pr) ?>', 1);"><div id="elh_tipo_llamada_llamada_fallida_pr" class="tipo_llamada_llamada_fallida_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_llamada_list->llamada_fallida_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_llamada_list->llamada_fallida_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_llamada_list->llamada_fallida_fr->Visible) { // llamada_fallida_fr ?>
	<?php if ($tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida_fr) == "") { ?>
		<th data-name="llamada_fallida_fr" class="<?php echo $tipo_llamada_list->llamada_fallida_fr->headerCellClass() ?>"><div id="elh_tipo_llamada_llamada_fallida_fr" class="tipo_llamada_llamada_fallida_fr"><div class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="llamada_fallida_fr" class="<?php echo $tipo_llamada_list->llamada_fallida_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_llamada_list->SortUrl($tipo_llamada_list->llamada_fallida_fr) ?>', 1);"><div id="elh_tipo_llamada_llamada_fallida_fr" class="tipo_llamada_llamada_fallida_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_llamada_list->llamada_fallida_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_llamada_list->llamada_fallida_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_llamada_list->llamada_fallida_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tipo_llamada_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tipo_llamada_list->ExportAll && $tipo_llamada_list->isExport()) {
	$tipo_llamada_list->StopRecord = $tipo_llamada_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tipo_llamada_list->TotalRecords > $tipo_llamada_list->StartRecord + $tipo_llamada_list->DisplayRecords - 1)
		$tipo_llamada_list->StopRecord = $tipo_llamada_list->StartRecord + $tipo_llamada_list->DisplayRecords - 1;
	else
		$tipo_llamada_list->StopRecord = $tipo_llamada_list->TotalRecords;
}
$tipo_llamada_list->RecordCount = $tipo_llamada_list->StartRecord - 1;
if ($tipo_llamada_list->Recordset && !$tipo_llamada_list->Recordset->EOF) {
	$tipo_llamada_list->Recordset->moveFirst();
	$selectLimit = $tipo_llamada_list->UseSelectLimit;
	if (!$selectLimit && $tipo_llamada_list->StartRecord > 1)
		$tipo_llamada_list->Recordset->move($tipo_llamada_list->StartRecord - 1);
} elseif (!$tipo_llamada->AllowAddDeleteRow && $tipo_llamada_list->StopRecord == 0) {
	$tipo_llamada_list->StopRecord = $tipo_llamada->GridAddRowCount;
}

// Initialize aggregate
$tipo_llamada->RowType = ROWTYPE_AGGREGATEINIT;
$tipo_llamada->resetAttributes();
$tipo_llamada_list->renderRow();
while ($tipo_llamada_list->RecordCount < $tipo_llamada_list->StopRecord) {
	$tipo_llamada_list->RecordCount++;
	if ($tipo_llamada_list->RecordCount >= $tipo_llamada_list->StartRecord) {
		$tipo_llamada_list->RowCount++;

		// Set up key count
		$tipo_llamada_list->KeyCount = $tipo_llamada_list->RowIndex;

		// Init row class and style
		$tipo_llamada->resetAttributes();
		$tipo_llamada->CssClass = "";
		if ($tipo_llamada_list->isGridAdd()) {
		} else {
			$tipo_llamada_list->loadRowValues($tipo_llamada_list->Recordset); // Load row values
		}
		$tipo_llamada->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tipo_llamada->RowAttrs->merge(["data-rowindex" => $tipo_llamada_list->RowCount, "id" => "r" . $tipo_llamada_list->RowCount . "_tipo_llamada", "data-rowtype" => $tipo_llamada->RowType]);

		// Render row
		$tipo_llamada_list->renderRow();

		// Render list options
		$tipo_llamada_list->renderListOptions();
?>
	<tr <?php echo $tipo_llamada->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tipo_llamada_list->ListOptions->render("body", "left", $tipo_llamada_list->RowCount);
?>
	<?php if ($tipo_llamada_list->id_llamda_f->Visible) { // id_llamda_f ?>
		<td data-name="id_llamda_f" <?php echo $tipo_llamada_list->id_llamda_f->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_list->RowCount ?>_tipo_llamada_id_llamda_f">
<span<?php echo $tipo_llamada_list->id_llamda_f->viewAttributes() ?>><?php echo $tipo_llamada_list->id_llamda_f->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_llamada_list->llamada_fallida->Visible) { // llamada_fallida ?>
		<td data-name="llamada_fallida" <?php echo $tipo_llamada_list->llamada_fallida->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_list->RowCount ?>_tipo_llamada_llamada_fallida">
<span<?php echo $tipo_llamada_list->llamada_fallida->viewAttributes() ?>><?php echo $tipo_llamada_list->llamada_fallida->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_llamada_list->llamada_fallida_en->Visible) { // llamada_fallida_en ?>
		<td data-name="llamada_fallida_en" <?php echo $tipo_llamada_list->llamada_fallida_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_list->RowCount ?>_tipo_llamada_llamada_fallida_en">
<span<?php echo $tipo_llamada_list->llamada_fallida_en->viewAttributes() ?>><?php echo $tipo_llamada_list->llamada_fallida_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_llamada_list->llamada_fallida_pr->Visible) { // llamada_fallida_pr ?>
		<td data-name="llamada_fallida_pr" <?php echo $tipo_llamada_list->llamada_fallida_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_list->RowCount ?>_tipo_llamada_llamada_fallida_pr">
<span<?php echo $tipo_llamada_list->llamada_fallida_pr->viewAttributes() ?>><?php echo $tipo_llamada_list->llamada_fallida_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_llamada_list->llamada_fallida_fr->Visible) { // llamada_fallida_fr ?>
		<td data-name="llamada_fallida_fr" <?php echo $tipo_llamada_list->llamada_fallida_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_list->RowCount ?>_tipo_llamada_llamada_fallida_fr">
<span<?php echo $tipo_llamada_list->llamada_fallida_fr->viewAttributes() ?>><?php echo $tipo_llamada_list->llamada_fallida_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tipo_llamada_list->ListOptions->render("body", "right", $tipo_llamada_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tipo_llamada_list->isGridAdd())
		$tipo_llamada_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tipo_llamada->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tipo_llamada_list->Recordset)
	$tipo_llamada_list->Recordset->Close();
?>
<?php if (!$tipo_llamada_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tipo_llamada_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_llamada_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_llamada_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tipo_llamada_list->TotalRecords == 0 && !$tipo_llamada->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tipo_llamada_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tipo_llamada_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_llamada_list->isExport()) { ?>
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
$tipo_llamada_list->terminate();
?>