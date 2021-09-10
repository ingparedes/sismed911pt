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
$especial_ambulancia_list = new especial_ambulancia_list();

// Run the page
$especial_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especial_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$especial_ambulancia_list->isExport()) { ?>
<script>
var fespecial_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fespecial_ambulancialist = currentForm = new ew.Form("fespecial_ambulancialist", "list");
	fespecial_ambulancialist.formKeyCountName = '<?php echo $especial_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("fespecial_ambulancialist");
});
var fespecial_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fespecial_ambulancialistsrch = currentSearchForm = new ew.Form("fespecial_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	fespecial_ambulancialistsrch.filterList = <?php echo $especial_ambulancia_list->getFilterList() ?>;
	loadjs.done("fespecial_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$especial_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($especial_ambulancia_list->TotalRecords > 0 && $especial_ambulancia_list->ExportOptions->visible()) { ?>
<?php $especial_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($especial_ambulancia_list->ImportOptions->visible()) { ?>
<?php $especial_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($especial_ambulancia_list->SearchOptions->visible()) { ?>
<?php $especial_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($especial_ambulancia_list->FilterOptions->visible()) { ?>
<?php $especial_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$especial_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$especial_ambulancia_list->isExport() && !$especial_ambulancia->CurrentAction) { ?>
<form name="fespecial_ambulancialistsrch" id="fespecial_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fespecial_ambulancialistsrch-search-panel" class="<?php echo $especial_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="especial_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $especial_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($especial_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($especial_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $especial_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($especial_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($especial_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($especial_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($especial_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $especial_ambulancia_list->showPageHeader(); ?>
<?php
$especial_ambulancia_list->showMessage();
?>
<?php if ($especial_ambulancia_list->TotalRecords > 0 || $especial_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($especial_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> especial_ambulancia">
<?php if (!$especial_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$especial_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $especial_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $especial_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fespecial_ambulancialist" id="fespecial_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especial_ambulancia">
<div id="gmp_especial_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($especial_ambulancia_list->TotalRecords > 0 || $especial_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_especial_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$especial_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$especial_ambulancia_list->renderListOptions();

// Render list options (header, left)
$especial_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($especial_ambulancia_list->id_especialambulancia->Visible) { // id_especialambulancia ?>
	<?php if ($especial_ambulancia_list->SortUrl($especial_ambulancia_list->id_especialambulancia) == "") { ?>
		<th data-name="id_especialambulancia" class="<?php echo $especial_ambulancia_list->id_especialambulancia->headerCellClass() ?>"><div id="elh_especial_ambulancia_id_especialambulancia" class="especial_ambulancia_id_especialambulancia"><div class="ew-table-header-caption"><?php echo $especial_ambulancia_list->id_especialambulancia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_especialambulancia" class="<?php echo $especial_ambulancia_list->id_especialambulancia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especial_ambulancia_list->SortUrl($especial_ambulancia_list->id_especialambulancia) ?>', 1);"><div id="elh_especial_ambulancia_id_especialambulancia" class="especial_ambulancia_id_especialambulancia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especial_ambulancia_list->id_especialambulancia->caption() ?></span><span class="ew-table-header-sort"><?php if ($especial_ambulancia_list->id_especialambulancia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especial_ambulancia_list->id_especialambulancia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especial_ambulancia_list->especial_es->Visible) { // especial_es ?>
	<?php if ($especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_es) == "") { ?>
		<th data-name="especial_es" class="<?php echo $especial_ambulancia_list->especial_es->headerCellClass() ?>"><div id="elh_especial_ambulancia_especial_es" class="especial_ambulancia_especial_es"><div class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especial_es" class="<?php echo $especial_ambulancia_list->especial_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_es) ?>', 1);"><div id="elh_especial_ambulancia_especial_es" class="especial_ambulancia_especial_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especial_ambulancia_list->especial_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especial_ambulancia_list->especial_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especial_ambulancia_list->especial_en->Visible) { // especial_en ?>
	<?php if ($especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_en) == "") { ?>
		<th data-name="especial_en" class="<?php echo $especial_ambulancia_list->especial_en->headerCellClass() ?>"><div id="elh_especial_ambulancia_especial_en" class="especial_ambulancia_especial_en"><div class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especial_en" class="<?php echo $especial_ambulancia_list->especial_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_en) ?>', 1);"><div id="elh_especial_ambulancia_especial_en" class="especial_ambulancia_especial_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especial_ambulancia_list->especial_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especial_ambulancia_list->especial_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especial_ambulancia_list->especial_pr->Visible) { // especial_pr ?>
	<?php if ($especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_pr) == "") { ?>
		<th data-name="especial_pr" class="<?php echo $especial_ambulancia_list->especial_pr->headerCellClass() ?>"><div id="elh_especial_ambulancia_especial_pr" class="especial_ambulancia_especial_pr"><div class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especial_pr" class="<?php echo $especial_ambulancia_list->especial_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_pr) ?>', 1);"><div id="elh_especial_ambulancia_especial_pr" class="especial_ambulancia_especial_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especial_ambulancia_list->especial_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especial_ambulancia_list->especial_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($especial_ambulancia_list->especial_fr->Visible) { // especial_fr ?>
	<?php if ($especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_fr) == "") { ?>
		<th data-name="especial_fr" class="<?php echo $especial_ambulancia_list->especial_fr->headerCellClass() ?>"><div id="elh_especial_ambulancia_especial_fr" class="especial_ambulancia_especial_fr"><div class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especial_fr" class="<?php echo $especial_ambulancia_list->especial_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $especial_ambulancia_list->SortUrl($especial_ambulancia_list->especial_fr) ?>', 1);"><div id="elh_especial_ambulancia_especial_fr" class="especial_ambulancia_especial_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $especial_ambulancia_list->especial_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($especial_ambulancia_list->especial_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($especial_ambulancia_list->especial_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$especial_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($especial_ambulancia_list->ExportAll && $especial_ambulancia_list->isExport()) {
	$especial_ambulancia_list->StopRecord = $especial_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($especial_ambulancia_list->TotalRecords > $especial_ambulancia_list->StartRecord + $especial_ambulancia_list->DisplayRecords - 1)
		$especial_ambulancia_list->StopRecord = $especial_ambulancia_list->StartRecord + $especial_ambulancia_list->DisplayRecords - 1;
	else
		$especial_ambulancia_list->StopRecord = $especial_ambulancia_list->TotalRecords;
}
$especial_ambulancia_list->RecordCount = $especial_ambulancia_list->StartRecord - 1;
if ($especial_ambulancia_list->Recordset && !$especial_ambulancia_list->Recordset->EOF) {
	$especial_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $especial_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $especial_ambulancia_list->StartRecord > 1)
		$especial_ambulancia_list->Recordset->move($especial_ambulancia_list->StartRecord - 1);
} elseif (!$especial_ambulancia->AllowAddDeleteRow && $especial_ambulancia_list->StopRecord == 0) {
	$especial_ambulancia_list->StopRecord = $especial_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$especial_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$especial_ambulancia->resetAttributes();
$especial_ambulancia_list->renderRow();
while ($especial_ambulancia_list->RecordCount < $especial_ambulancia_list->StopRecord) {
	$especial_ambulancia_list->RecordCount++;
	if ($especial_ambulancia_list->RecordCount >= $especial_ambulancia_list->StartRecord) {
		$especial_ambulancia_list->RowCount++;

		// Set up key count
		$especial_ambulancia_list->KeyCount = $especial_ambulancia_list->RowIndex;

		// Init row class and style
		$especial_ambulancia->resetAttributes();
		$especial_ambulancia->CssClass = "";
		if ($especial_ambulancia_list->isGridAdd()) {
		} else {
			$especial_ambulancia_list->loadRowValues($especial_ambulancia_list->Recordset); // Load row values
		}
		$especial_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$especial_ambulancia->RowAttrs->merge(["data-rowindex" => $especial_ambulancia_list->RowCount, "id" => "r" . $especial_ambulancia_list->RowCount . "_especial_ambulancia", "data-rowtype" => $especial_ambulancia->RowType]);

		// Render row
		$especial_ambulancia_list->renderRow();

		// Render list options
		$especial_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $especial_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$especial_ambulancia_list->ListOptions->render("body", "left", $especial_ambulancia_list->RowCount);
?>
	<?php if ($especial_ambulancia_list->id_especialambulancia->Visible) { // id_especialambulancia ?>
		<td data-name="id_especialambulancia" <?php echo $especial_ambulancia_list->id_especialambulancia->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_list->RowCount ?>_especial_ambulancia_id_especialambulancia">
<span<?php echo $especial_ambulancia_list->id_especialambulancia->viewAttributes() ?>><?php echo $especial_ambulancia_list->id_especialambulancia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especial_ambulancia_list->especial_es->Visible) { // especial_es ?>
		<td data-name="especial_es" <?php echo $especial_ambulancia_list->especial_es->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_list->RowCount ?>_especial_ambulancia_especial_es">
<span<?php echo $especial_ambulancia_list->especial_es->viewAttributes() ?>><?php echo $especial_ambulancia_list->especial_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especial_ambulancia_list->especial_en->Visible) { // especial_en ?>
		<td data-name="especial_en" <?php echo $especial_ambulancia_list->especial_en->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_list->RowCount ?>_especial_ambulancia_especial_en">
<span<?php echo $especial_ambulancia_list->especial_en->viewAttributes() ?>><?php echo $especial_ambulancia_list->especial_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especial_ambulancia_list->especial_pr->Visible) { // especial_pr ?>
		<td data-name="especial_pr" <?php echo $especial_ambulancia_list->especial_pr->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_list->RowCount ?>_especial_ambulancia_especial_pr">
<span<?php echo $especial_ambulancia_list->especial_pr->viewAttributes() ?>><?php echo $especial_ambulancia_list->especial_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($especial_ambulancia_list->especial_fr->Visible) { // especial_fr ?>
		<td data-name="especial_fr" <?php echo $especial_ambulancia_list->especial_fr->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_list->RowCount ?>_especial_ambulancia_especial_fr">
<span<?php echo $especial_ambulancia_list->especial_fr->viewAttributes() ?>><?php echo $especial_ambulancia_list->especial_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$especial_ambulancia_list->ListOptions->render("body", "right", $especial_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$especial_ambulancia_list->isGridAdd())
		$especial_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$especial_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($especial_ambulancia_list->Recordset)
	$especial_ambulancia_list->Recordset->Close();
?>
<?php if (!$especial_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$especial_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $especial_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $especial_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($especial_ambulancia_list->TotalRecords == 0 && !$especial_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $especial_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$especial_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$especial_ambulancia_list->isExport()) { ?>
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
$especial_ambulancia_list->terminate();
?>