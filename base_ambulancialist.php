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
$base_ambulancia_list = new base_ambulancia_list();

// Run the page
$base_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$base_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$base_ambulancia_list->isExport()) { ?>
<script>
var fbase_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbase_ambulancialist = currentForm = new ew.Form("fbase_ambulancialist", "list");
	fbase_ambulancialist.formKeyCountName = '<?php echo $base_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("fbase_ambulancialist");
});
var fbase_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbase_ambulancialistsrch = currentSearchForm = new ew.Form("fbase_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	fbase_ambulancialistsrch.filterList = <?php echo $base_ambulancia_list->getFilterList() ?>;
	loadjs.done("fbase_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$base_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($base_ambulancia_list->TotalRecords > 0 && $base_ambulancia_list->ExportOptions->visible()) { ?>
<?php $base_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($base_ambulancia_list->ImportOptions->visible()) { ?>
<?php $base_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($base_ambulancia_list->SearchOptions->visible()) { ?>
<?php $base_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($base_ambulancia_list->FilterOptions->visible()) { ?>
<?php $base_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$base_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$base_ambulancia_list->isExport() && !$base_ambulancia->CurrentAction) { ?>
<form name="fbase_ambulancialistsrch" id="fbase_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbase_ambulancialistsrch-search-panel" class="<?php echo $base_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="base_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $base_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($base_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($base_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $base_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($base_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($base_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($base_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($base_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $base_ambulancia_list->showPageHeader(); ?>
<?php
$base_ambulancia_list->showMessage();
?>
<?php if ($base_ambulancia_list->TotalRecords > 0 || $base_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($base_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> base_ambulancia">
<?php if (!$base_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$base_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $base_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $base_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbase_ambulancialist" id="fbase_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="base_ambulancia">
<div id="gmp_base_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($base_ambulancia_list->TotalRecords > 0 || $base_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_base_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$base_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$base_ambulancia_list->renderListOptions();

// Render list options (header, left)
$base_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($base_ambulancia_list->id_base->Visible) { // id_base ?>
	<?php if ($base_ambulancia_list->SortUrl($base_ambulancia_list->id_base) == "") { ?>
		<th data-name="id_base" class="<?php echo $base_ambulancia_list->id_base->headerCellClass() ?>"><div id="elh_base_ambulancia_id_base" class="base_ambulancia_id_base"><div class="ew-table-header-caption"><?php echo $base_ambulancia_list->id_base->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_base" class="<?php echo $base_ambulancia_list->id_base->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $base_ambulancia_list->SortUrl($base_ambulancia_list->id_base) ?>', 1);"><div id="elh_base_ambulancia_id_base" class="base_ambulancia_id_base">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $base_ambulancia_list->id_base->caption() ?></span><span class="ew-table-header-sort"><?php if ($base_ambulancia_list->id_base->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($base_ambulancia_list->id_base->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($base_ambulancia_list->nombre->Visible) { // nombre ?>
	<?php if ($base_ambulancia_list->SortUrl($base_ambulancia_list->nombre) == "") { ?>
		<th data-name="nombre" class="<?php echo $base_ambulancia_list->nombre->headerCellClass() ?>"><div id="elh_base_ambulancia_nombre" class="base_ambulancia_nombre"><div class="ew-table-header-caption"><?php echo $base_ambulancia_list->nombre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre" class="<?php echo $base_ambulancia_list->nombre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $base_ambulancia_list->SortUrl($base_ambulancia_list->nombre) ?>', 1);"><div id="elh_base_ambulancia_nombre" class="base_ambulancia_nombre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $base_ambulancia_list->nombre->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($base_ambulancia_list->nombre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($base_ambulancia_list->nombre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($base_ambulancia_list->dpto->Visible) { // dpto ?>
	<?php if ($base_ambulancia_list->SortUrl($base_ambulancia_list->dpto) == "") { ?>
		<th data-name="dpto" class="<?php echo $base_ambulancia_list->dpto->headerCellClass() ?>"><div id="elh_base_ambulancia_dpto" class="base_ambulancia_dpto"><div class="ew-table-header-caption"><?php echo $base_ambulancia_list->dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dpto" class="<?php echo $base_ambulancia_list->dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $base_ambulancia_list->SortUrl($base_ambulancia_list->dpto) ?>', 1);"><div id="elh_base_ambulancia_dpto" class="base_ambulancia_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $base_ambulancia_list->dpto->caption() ?></span><span class="ew-table-header-sort"><?php if ($base_ambulancia_list->dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($base_ambulancia_list->dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($base_ambulancia_list->provincia->Visible) { // provincia ?>
	<?php if ($base_ambulancia_list->SortUrl($base_ambulancia_list->provincia) == "") { ?>
		<th data-name="provincia" class="<?php echo $base_ambulancia_list->provincia->headerCellClass() ?>"><div id="elh_base_ambulancia_provincia" class="base_ambulancia_provincia"><div class="ew-table-header-caption"><?php echo $base_ambulancia_list->provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="provincia" class="<?php echo $base_ambulancia_list->provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $base_ambulancia_list->SortUrl($base_ambulancia_list->provincia) ?>', 1);"><div id="elh_base_ambulancia_provincia" class="base_ambulancia_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $base_ambulancia_list->provincia->caption() ?></span><span class="ew-table-header-sort"><?php if ($base_ambulancia_list->provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($base_ambulancia_list->provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($base_ambulancia_list->distrito->Visible) { // distrito ?>
	<?php if ($base_ambulancia_list->SortUrl($base_ambulancia_list->distrito) == "") { ?>
		<th data-name="distrito" class="<?php echo $base_ambulancia_list->distrito->headerCellClass() ?>"><div id="elh_base_ambulancia_distrito" class="base_ambulancia_distrito"><div class="ew-table-header-caption"><?php echo $base_ambulancia_list->distrito->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="distrito" class="<?php echo $base_ambulancia_list->distrito->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $base_ambulancia_list->SortUrl($base_ambulancia_list->distrito) ?>', 1);"><div id="elh_base_ambulancia_distrito" class="base_ambulancia_distrito">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $base_ambulancia_list->distrito->caption() ?></span><span class="ew-table-header-sort"><?php if ($base_ambulancia_list->distrito->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($base_ambulancia_list->distrito->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$base_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($base_ambulancia_list->ExportAll && $base_ambulancia_list->isExport()) {
	$base_ambulancia_list->StopRecord = $base_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($base_ambulancia_list->TotalRecords > $base_ambulancia_list->StartRecord + $base_ambulancia_list->DisplayRecords - 1)
		$base_ambulancia_list->StopRecord = $base_ambulancia_list->StartRecord + $base_ambulancia_list->DisplayRecords - 1;
	else
		$base_ambulancia_list->StopRecord = $base_ambulancia_list->TotalRecords;
}
$base_ambulancia_list->RecordCount = $base_ambulancia_list->StartRecord - 1;
if ($base_ambulancia_list->Recordset && !$base_ambulancia_list->Recordset->EOF) {
	$base_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $base_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $base_ambulancia_list->StartRecord > 1)
		$base_ambulancia_list->Recordset->move($base_ambulancia_list->StartRecord - 1);
} elseif (!$base_ambulancia->AllowAddDeleteRow && $base_ambulancia_list->StopRecord == 0) {
	$base_ambulancia_list->StopRecord = $base_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$base_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$base_ambulancia->resetAttributes();
$base_ambulancia_list->renderRow();
while ($base_ambulancia_list->RecordCount < $base_ambulancia_list->StopRecord) {
	$base_ambulancia_list->RecordCount++;
	if ($base_ambulancia_list->RecordCount >= $base_ambulancia_list->StartRecord) {
		$base_ambulancia_list->RowCount++;

		// Set up key count
		$base_ambulancia_list->KeyCount = $base_ambulancia_list->RowIndex;

		// Init row class and style
		$base_ambulancia->resetAttributes();
		$base_ambulancia->CssClass = "";
		if ($base_ambulancia_list->isGridAdd()) {
		} else {
			$base_ambulancia_list->loadRowValues($base_ambulancia_list->Recordset); // Load row values
		}
		$base_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$base_ambulancia->RowAttrs->merge(["data-rowindex" => $base_ambulancia_list->RowCount, "id" => "r" . $base_ambulancia_list->RowCount . "_base_ambulancia", "data-rowtype" => $base_ambulancia->RowType]);

		// Render row
		$base_ambulancia_list->renderRow();

		// Render list options
		$base_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $base_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$base_ambulancia_list->ListOptions->render("body", "left", $base_ambulancia_list->RowCount);
?>
	<?php if ($base_ambulancia_list->id_base->Visible) { // id_base ?>
		<td data-name="id_base" <?php echo $base_ambulancia_list->id_base->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_list->RowCount ?>_base_ambulancia_id_base">
<span<?php echo $base_ambulancia_list->id_base->viewAttributes() ?>><?php echo $base_ambulancia_list->id_base->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($base_ambulancia_list->nombre->Visible) { // nombre ?>
		<td data-name="nombre" <?php echo $base_ambulancia_list->nombre->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_list->RowCount ?>_base_ambulancia_nombre">
<span<?php echo $base_ambulancia_list->nombre->viewAttributes() ?>><?php echo $base_ambulancia_list->nombre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($base_ambulancia_list->dpto->Visible) { // dpto ?>
		<td data-name="dpto" <?php echo $base_ambulancia_list->dpto->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_list->RowCount ?>_base_ambulancia_dpto">
<span<?php echo $base_ambulancia_list->dpto->viewAttributes() ?>><?php echo $base_ambulancia_list->dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($base_ambulancia_list->provincia->Visible) { // provincia ?>
		<td data-name="provincia" <?php echo $base_ambulancia_list->provincia->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_list->RowCount ?>_base_ambulancia_provincia">
<span<?php echo $base_ambulancia_list->provincia->viewAttributes() ?>><?php echo $base_ambulancia_list->provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($base_ambulancia_list->distrito->Visible) { // distrito ?>
		<td data-name="distrito" <?php echo $base_ambulancia_list->distrito->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_list->RowCount ?>_base_ambulancia_distrito">
<span<?php echo $base_ambulancia_list->distrito->viewAttributes() ?>><?php echo $base_ambulancia_list->distrito->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$base_ambulancia_list->ListOptions->render("body", "right", $base_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$base_ambulancia_list->isGridAdd())
		$base_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$base_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($base_ambulancia_list->Recordset)
	$base_ambulancia_list->Recordset->Close();
?>
<?php if (!$base_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$base_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $base_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $base_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($base_ambulancia_list->TotalRecords == 0 && !$base_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $base_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$base_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$base_ambulancia_list->isExport()) { ?>
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
$base_ambulancia_list->terminate();
?>