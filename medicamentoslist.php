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
$medicamentos_list = new medicamentos_list();

// Run the page
$medicamentos_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$medicamentos_list->isExport()) { ?>
<script>
var fmedicamentoslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmedicamentoslist = currentForm = new ew.Form("fmedicamentoslist", "list");
	fmedicamentoslist.formKeyCountName = '<?php echo $medicamentos_list->FormKeyCountName ?>';
	loadjs.done("fmedicamentoslist");
});
var fmedicamentoslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmedicamentoslistsrch = currentSearchForm = new ew.Form("fmedicamentoslistsrch");

	// Dynamic selection lists
	// Filters

	fmedicamentoslistsrch.filterList = <?php echo $medicamentos_list->getFilterList() ?>;
	loadjs.done("fmedicamentoslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$medicamentos_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($medicamentos_list->TotalRecords > 0 && $medicamentos_list->ExportOptions->visible()) { ?>
<?php $medicamentos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($medicamentos_list->ImportOptions->visible()) { ?>
<?php $medicamentos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($medicamentos_list->SearchOptions->visible()) { ?>
<?php $medicamentos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($medicamentos_list->FilterOptions->visible()) { ?>
<?php $medicamentos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$medicamentos_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$medicamentos_list->isExport() && !$medicamentos->CurrentAction) { ?>
<form name="fmedicamentoslistsrch" id="fmedicamentoslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmedicamentoslistsrch-search-panel" class="<?php echo $medicamentos_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="medicamentos">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $medicamentos_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($medicamentos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($medicamentos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $medicamentos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($medicamentos_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($medicamentos_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($medicamentos_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($medicamentos_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $medicamentos_list->showPageHeader(); ?>
<?php
$medicamentos_list->showMessage();
?>
<?php if ($medicamentos_list->TotalRecords > 0 || $medicamentos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($medicamentos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> medicamentos">
<?php if (!$medicamentos_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$medicamentos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $medicamentos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $medicamentos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmedicamentoslist" id="fmedicamentoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos">
<div id="gmp_medicamentos" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($medicamentos_list->TotalRecords > 0 || $medicamentos_list->isGridEdit()) { ?>
<table id="tbl_medicamentoslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$medicamentos->RowType = ROWTYPE_HEADER;

// Render list options
$medicamentos_list->renderListOptions();

// Render list options (header, left)
$medicamentos_list->ListOptions->render("header", "left");
?>
<?php if ($medicamentos_list->id_medicamento->Visible) { // id_medicamento ?>
	<?php if ($medicamentos_list->SortUrl($medicamentos_list->id_medicamento) == "") { ?>
		<th data-name="id_medicamento" class="<?php echo $medicamentos_list->id_medicamento->headerCellClass() ?>"><div id="elh_medicamentos_id_medicamento" class="medicamentos_id_medicamento"><div class="ew-table-header-caption"><?php echo $medicamentos_list->id_medicamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_medicamento" class="<?php echo $medicamentos_list->id_medicamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_list->SortUrl($medicamentos_list->id_medicamento) ?>', 1);"><div id="elh_medicamentos_id_medicamento" class="medicamentos_id_medicamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_list->id_medicamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_list->id_medicamento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_list->id_medicamento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($medicamentos_list->nombre_medicamento->Visible) { // nombre_medicamento ?>
	<?php if ($medicamentos_list->SortUrl($medicamentos_list->nombre_medicamento) == "") { ?>
		<th data-name="nombre_medicamento" class="<?php echo $medicamentos_list->nombre_medicamento->headerCellClass() ?>"><div id="elh_medicamentos_nombre_medicamento" class="medicamentos_nombre_medicamento"><div class="ew-table-header-caption"><?php echo $medicamentos_list->nombre_medicamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_medicamento" class="<?php echo $medicamentos_list->nombre_medicamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_list->SortUrl($medicamentos_list->nombre_medicamento) ?>', 1);"><div id="elh_medicamentos_nombre_medicamento" class="medicamentos_nombre_medicamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_list->nombre_medicamento->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_list->nombre_medicamento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_list->nombre_medicamento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($medicamentos_list->valor->Visible) { // valor ?>
	<?php if ($medicamentos_list->SortUrl($medicamentos_list->valor) == "") { ?>
		<th data-name="valor" class="<?php echo $medicamentos_list->valor->headerCellClass() ?>"><div id="elh_medicamentos_valor" class="medicamentos_valor"><div class="ew-table-header-caption"><?php echo $medicamentos_list->valor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="valor" class="<?php echo $medicamentos_list->valor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_list->SortUrl($medicamentos_list->valor) ?>', 1);"><div id="elh_medicamentos_valor" class="medicamentos_valor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_list->valor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_list->valor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_list->valor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$medicamentos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($medicamentos_list->ExportAll && $medicamentos_list->isExport()) {
	$medicamentos_list->StopRecord = $medicamentos_list->TotalRecords;
} else {

	// Set the last record to display
	if ($medicamentos_list->TotalRecords > $medicamentos_list->StartRecord + $medicamentos_list->DisplayRecords - 1)
		$medicamentos_list->StopRecord = $medicamentos_list->StartRecord + $medicamentos_list->DisplayRecords - 1;
	else
		$medicamentos_list->StopRecord = $medicamentos_list->TotalRecords;
}
$medicamentos_list->RecordCount = $medicamentos_list->StartRecord - 1;
if ($medicamentos_list->Recordset && !$medicamentos_list->Recordset->EOF) {
	$medicamentos_list->Recordset->moveFirst();
	$selectLimit = $medicamentos_list->UseSelectLimit;
	if (!$selectLimit && $medicamentos_list->StartRecord > 1)
		$medicamentos_list->Recordset->move($medicamentos_list->StartRecord - 1);
} elseif (!$medicamentos->AllowAddDeleteRow && $medicamentos_list->StopRecord == 0) {
	$medicamentos_list->StopRecord = $medicamentos->GridAddRowCount;
}

// Initialize aggregate
$medicamentos->RowType = ROWTYPE_AGGREGATEINIT;
$medicamentos->resetAttributes();
$medicamentos_list->renderRow();
while ($medicamentos_list->RecordCount < $medicamentos_list->StopRecord) {
	$medicamentos_list->RecordCount++;
	if ($medicamentos_list->RecordCount >= $medicamentos_list->StartRecord) {
		$medicamentos_list->RowCount++;

		// Set up key count
		$medicamentos_list->KeyCount = $medicamentos_list->RowIndex;

		// Init row class and style
		$medicamentos->resetAttributes();
		$medicamentos->CssClass = "";
		if ($medicamentos_list->isGridAdd()) {
		} else {
			$medicamentos_list->loadRowValues($medicamentos_list->Recordset); // Load row values
		}
		$medicamentos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$medicamentos->RowAttrs->merge(["data-rowindex" => $medicamentos_list->RowCount, "id" => "r" . $medicamentos_list->RowCount . "_medicamentos", "data-rowtype" => $medicamentos->RowType]);

		// Render row
		$medicamentos_list->renderRow();

		// Render list options
		$medicamentos_list->renderListOptions();
?>
	<tr <?php echo $medicamentos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$medicamentos_list->ListOptions->render("body", "left", $medicamentos_list->RowCount);
?>
	<?php if ($medicamentos_list->id_medicamento->Visible) { // id_medicamento ?>
		<td data-name="id_medicamento" <?php echo $medicamentos_list->id_medicamento->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_list->RowCount ?>_medicamentos_id_medicamento">
<span<?php echo $medicamentos_list->id_medicamento->viewAttributes() ?>><?php echo $medicamentos_list->id_medicamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($medicamentos_list->nombre_medicamento->Visible) { // nombre_medicamento ?>
		<td data-name="nombre_medicamento" <?php echo $medicamentos_list->nombre_medicamento->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_list->RowCount ?>_medicamentos_nombre_medicamento">
<span<?php echo $medicamentos_list->nombre_medicamento->viewAttributes() ?>><?php echo $medicamentos_list->nombre_medicamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($medicamentos_list->valor->Visible) { // valor ?>
		<td data-name="valor" <?php echo $medicamentos_list->valor->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_list->RowCount ?>_medicamentos_valor">
<span<?php echo $medicamentos_list->valor->viewAttributes() ?>><?php echo $medicamentos_list->valor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$medicamentos_list->ListOptions->render("body", "right", $medicamentos_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$medicamentos_list->isGridAdd())
		$medicamentos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$medicamentos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($medicamentos_list->Recordset)
	$medicamentos_list->Recordset->Close();
?>
<?php if (!$medicamentos_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$medicamentos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $medicamentos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $medicamentos_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($medicamentos_list->TotalRecords == 0 && !$medicamentos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $medicamentos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$medicamentos_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$medicamentos_list->isExport()) { ?>
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
$medicamentos_list->terminate();
?>