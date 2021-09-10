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
$modalidad_ambulancia_list = new modalidad_ambulancia_list();

// Run the page
$modalidad_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$modalidad_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$modalidad_ambulancia_list->isExport()) { ?>
<script>
var fmodalidad_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmodalidad_ambulancialist = currentForm = new ew.Form("fmodalidad_ambulancialist", "list");
	fmodalidad_ambulancialist.formKeyCountName = '<?php echo $modalidad_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("fmodalidad_ambulancialist");
});
var fmodalidad_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmodalidad_ambulancialistsrch = currentSearchForm = new ew.Form("fmodalidad_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	fmodalidad_ambulancialistsrch.filterList = <?php echo $modalidad_ambulancia_list->getFilterList() ?>;
	loadjs.done("fmodalidad_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$modalidad_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($modalidad_ambulancia_list->TotalRecords > 0 && $modalidad_ambulancia_list->ExportOptions->visible()) { ?>
<?php $modalidad_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->ImportOptions->visible()) { ?>
<?php $modalidad_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->SearchOptions->visible()) { ?>
<?php $modalidad_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->FilterOptions->visible()) { ?>
<?php $modalidad_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$modalidad_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$modalidad_ambulancia_list->isExport() && !$modalidad_ambulancia->CurrentAction) { ?>
<form name="fmodalidad_ambulancialistsrch" id="fmodalidad_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmodalidad_ambulancialistsrch-search-panel" class="<?php echo $modalidad_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="modalidad_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $modalidad_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($modalidad_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($modalidad_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $modalidad_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($modalidad_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($modalidad_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($modalidad_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($modalidad_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $modalidad_ambulancia_list->showPageHeader(); ?>
<?php
$modalidad_ambulancia_list->showMessage();
?>
<?php if ($modalidad_ambulancia_list->TotalRecords > 0 || $modalidad_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($modalidad_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> modalidad_ambulancia">
<?php if (!$modalidad_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$modalidad_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $modalidad_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $modalidad_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmodalidad_ambulancialist" id="fmodalidad_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="modalidad_ambulancia">
<div id="gmp_modalidad_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($modalidad_ambulancia_list->TotalRecords > 0 || $modalidad_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_modalidad_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$modalidad_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$modalidad_ambulancia_list->renderListOptions();

// Render list options (header, left)
$modalidad_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($modalidad_ambulancia_list->id_modalidad->Visible) { // id_modalidad ?>
	<?php if ($modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->id_modalidad) == "") { ?>
		<th data-name="id_modalidad" class="<?php echo $modalidad_ambulancia_list->id_modalidad->headerCellClass() ?>"><div id="elh_modalidad_ambulancia_id_modalidad" class="modalidad_ambulancia_id_modalidad"><div class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->id_modalidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_modalidad" class="<?php echo $modalidad_ambulancia_list->id_modalidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->id_modalidad) ?>', 1);"><div id="elh_modalidad_ambulancia_id_modalidad" class="modalidad_ambulancia_id_modalidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->id_modalidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($modalidad_ambulancia_list->id_modalidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($modalidad_ambulancia_list->id_modalidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->modalidadambu_es->Visible) { // modalidadambu_es ?>
	<?php if ($modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_es) == "") { ?>
		<th data-name="modalidadambu_es" class="<?php echo $modalidad_ambulancia_list->modalidadambu_es->headerCellClass() ?>"><div id="elh_modalidad_ambulancia_modalidadambu_es" class="modalidad_ambulancia_modalidadambu_es"><div class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modalidadambu_es" class="<?php echo $modalidad_ambulancia_list->modalidadambu_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_es) ?>', 1);"><div id="elh_modalidad_ambulancia_modalidadambu_es" class="modalidad_ambulancia_modalidadambu_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($modalidad_ambulancia_list->modalidadambu_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($modalidad_ambulancia_list->modalidadambu_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->modalidadambu_en->Visible) { // modalidadambu_en ?>
	<?php if ($modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_en) == "") { ?>
		<th data-name="modalidadambu_en" class="<?php echo $modalidad_ambulancia_list->modalidadambu_en->headerCellClass() ?>"><div id="elh_modalidad_ambulancia_modalidadambu_en" class="modalidad_ambulancia_modalidadambu_en"><div class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modalidadambu_en" class="<?php echo $modalidad_ambulancia_list->modalidadambu_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_en) ?>', 1);"><div id="elh_modalidad_ambulancia_modalidadambu_en" class="modalidad_ambulancia_modalidadambu_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($modalidad_ambulancia_list->modalidadambu_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($modalidad_ambulancia_list->modalidadambu_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->modalidadambu_pr->Visible) { // modalidadambu_pr ?>
	<?php if ($modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_pr) == "") { ?>
		<th data-name="modalidadambu_pr" class="<?php echo $modalidad_ambulancia_list->modalidadambu_pr->headerCellClass() ?>"><div id="elh_modalidad_ambulancia_modalidadambu_pr" class="modalidad_ambulancia_modalidadambu_pr"><div class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modalidadambu_pr" class="<?php echo $modalidad_ambulancia_list->modalidadambu_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_pr) ?>', 1);"><div id="elh_modalidad_ambulancia_modalidadambu_pr" class="modalidad_ambulancia_modalidadambu_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($modalidad_ambulancia_list->modalidadambu_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($modalidad_ambulancia_list->modalidadambu_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($modalidad_ambulancia_list->modalidadambu_fr->Visible) { // modalidadambu_fr ?>
	<?php if ($modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_fr) == "") { ?>
		<th data-name="modalidadambu_fr" class="<?php echo $modalidad_ambulancia_list->modalidadambu_fr->headerCellClass() ?>"><div id="elh_modalidad_ambulancia_modalidadambu_fr" class="modalidad_ambulancia_modalidadambu_fr"><div class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modalidadambu_fr" class="<?php echo $modalidad_ambulancia_list->modalidadambu_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $modalidad_ambulancia_list->SortUrl($modalidad_ambulancia_list->modalidadambu_fr) ?>', 1);"><div id="elh_modalidad_ambulancia_modalidadambu_fr" class="modalidad_ambulancia_modalidadambu_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $modalidad_ambulancia_list->modalidadambu_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($modalidad_ambulancia_list->modalidadambu_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($modalidad_ambulancia_list->modalidadambu_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$modalidad_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($modalidad_ambulancia_list->ExportAll && $modalidad_ambulancia_list->isExport()) {
	$modalidad_ambulancia_list->StopRecord = $modalidad_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($modalidad_ambulancia_list->TotalRecords > $modalidad_ambulancia_list->StartRecord + $modalidad_ambulancia_list->DisplayRecords - 1)
		$modalidad_ambulancia_list->StopRecord = $modalidad_ambulancia_list->StartRecord + $modalidad_ambulancia_list->DisplayRecords - 1;
	else
		$modalidad_ambulancia_list->StopRecord = $modalidad_ambulancia_list->TotalRecords;
}
$modalidad_ambulancia_list->RecordCount = $modalidad_ambulancia_list->StartRecord - 1;
if ($modalidad_ambulancia_list->Recordset && !$modalidad_ambulancia_list->Recordset->EOF) {
	$modalidad_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $modalidad_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $modalidad_ambulancia_list->StartRecord > 1)
		$modalidad_ambulancia_list->Recordset->move($modalidad_ambulancia_list->StartRecord - 1);
} elseif (!$modalidad_ambulancia->AllowAddDeleteRow && $modalidad_ambulancia_list->StopRecord == 0) {
	$modalidad_ambulancia_list->StopRecord = $modalidad_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$modalidad_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$modalidad_ambulancia->resetAttributes();
$modalidad_ambulancia_list->renderRow();
while ($modalidad_ambulancia_list->RecordCount < $modalidad_ambulancia_list->StopRecord) {
	$modalidad_ambulancia_list->RecordCount++;
	if ($modalidad_ambulancia_list->RecordCount >= $modalidad_ambulancia_list->StartRecord) {
		$modalidad_ambulancia_list->RowCount++;

		// Set up key count
		$modalidad_ambulancia_list->KeyCount = $modalidad_ambulancia_list->RowIndex;

		// Init row class and style
		$modalidad_ambulancia->resetAttributes();
		$modalidad_ambulancia->CssClass = "";
		if ($modalidad_ambulancia_list->isGridAdd()) {
		} else {
			$modalidad_ambulancia_list->loadRowValues($modalidad_ambulancia_list->Recordset); // Load row values
		}
		$modalidad_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$modalidad_ambulancia->RowAttrs->merge(["data-rowindex" => $modalidad_ambulancia_list->RowCount, "id" => "r" . $modalidad_ambulancia_list->RowCount . "_modalidad_ambulancia", "data-rowtype" => $modalidad_ambulancia->RowType]);

		// Render row
		$modalidad_ambulancia_list->renderRow();

		// Render list options
		$modalidad_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $modalidad_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$modalidad_ambulancia_list->ListOptions->render("body", "left", $modalidad_ambulancia_list->RowCount);
?>
	<?php if ($modalidad_ambulancia_list->id_modalidad->Visible) { // id_modalidad ?>
		<td data-name="id_modalidad" <?php echo $modalidad_ambulancia_list->id_modalidad->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_list->RowCount ?>_modalidad_ambulancia_id_modalidad">
<span<?php echo $modalidad_ambulancia_list->id_modalidad->viewAttributes() ?>><?php echo $modalidad_ambulancia_list->id_modalidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($modalidad_ambulancia_list->modalidadambu_es->Visible) { // modalidadambu_es ?>
		<td data-name="modalidadambu_es" <?php echo $modalidad_ambulancia_list->modalidadambu_es->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_list->RowCount ?>_modalidad_ambulancia_modalidadambu_es">
<span<?php echo $modalidad_ambulancia_list->modalidadambu_es->viewAttributes() ?>><?php echo $modalidad_ambulancia_list->modalidadambu_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($modalidad_ambulancia_list->modalidadambu_en->Visible) { // modalidadambu_en ?>
		<td data-name="modalidadambu_en" <?php echo $modalidad_ambulancia_list->modalidadambu_en->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_list->RowCount ?>_modalidad_ambulancia_modalidadambu_en">
<span<?php echo $modalidad_ambulancia_list->modalidadambu_en->viewAttributes() ?>><?php echo $modalidad_ambulancia_list->modalidadambu_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($modalidad_ambulancia_list->modalidadambu_pr->Visible) { // modalidadambu_pr ?>
		<td data-name="modalidadambu_pr" <?php echo $modalidad_ambulancia_list->modalidadambu_pr->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_list->RowCount ?>_modalidad_ambulancia_modalidadambu_pr">
<span<?php echo $modalidad_ambulancia_list->modalidadambu_pr->viewAttributes() ?>><?php echo $modalidad_ambulancia_list->modalidadambu_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($modalidad_ambulancia_list->modalidadambu_fr->Visible) { // modalidadambu_fr ?>
		<td data-name="modalidadambu_fr" <?php echo $modalidad_ambulancia_list->modalidadambu_fr->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_list->RowCount ?>_modalidad_ambulancia_modalidadambu_fr">
<span<?php echo $modalidad_ambulancia_list->modalidadambu_fr->viewAttributes() ?>><?php echo $modalidad_ambulancia_list->modalidadambu_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$modalidad_ambulancia_list->ListOptions->render("body", "right", $modalidad_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$modalidad_ambulancia_list->isGridAdd())
		$modalidad_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$modalidad_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($modalidad_ambulancia_list->Recordset)
	$modalidad_ambulancia_list->Recordset->Close();
?>
<?php if (!$modalidad_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$modalidad_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $modalidad_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $modalidad_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($modalidad_ambulancia_list->TotalRecords == 0 && !$modalidad_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $modalidad_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$modalidad_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$modalidad_ambulancia_list->isExport()) { ?>
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
$modalidad_ambulancia_list->terminate();
?>