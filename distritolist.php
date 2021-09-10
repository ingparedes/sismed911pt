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
$distrito_list = new distrito_list();

// Run the page
$distrito_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$distrito_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$distrito_list->isExport()) { ?>
<script>
var fdistritolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdistritolist = currentForm = new ew.Form("fdistritolist", "list");
	fdistritolist.formKeyCountName = '<?php echo $distrito_list->FormKeyCountName ?>';
	loadjs.done("fdistritolist");
});
var fdistritolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdistritolistsrch = currentSearchForm = new ew.Form("fdistritolistsrch");

	// Dynamic selection lists
	// Filters

	fdistritolistsrch.filterList = <?php echo $distrito_list->getFilterList() ?>;
	loadjs.done("fdistritolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$distrito_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($distrito_list->TotalRecords > 0 && $distrito_list->ExportOptions->visible()) { ?>
<?php $distrito_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($distrito_list->ImportOptions->visible()) { ?>
<?php $distrito_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($distrito_list->SearchOptions->visible()) { ?>
<?php $distrito_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($distrito_list->FilterOptions->visible()) { ?>
<?php $distrito_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$distrito_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$distrito_list->isExport() && !$distrito->CurrentAction) { ?>
<form name="fdistritolistsrch" id="fdistritolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdistritolistsrch-search-panel" class="<?php echo $distrito_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="distrito">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $distrito_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($distrito_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($distrito_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $distrito_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($distrito_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($distrito_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($distrito_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($distrito_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $distrito_list->showPageHeader(); ?>
<?php
$distrito_list->showMessage();
?>
<?php if ($distrito_list->TotalRecords > 0 || $distrito->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($distrito_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> distrito">
<?php if (!$distrito_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$distrito_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $distrito_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $distrito_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdistritolist" id="fdistritolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="distrito">
<div id="gmp_distrito" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($distrito_list->TotalRecords > 0 || $distrito_list->isGridEdit()) { ?>
<table id="tbl_distritolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$distrito->RowType = ROWTYPE_HEADER;

// Render list options
$distrito_list->renderListOptions();

// Render list options (header, left)
$distrito_list->ListOptions->render("header", "left");
?>
<?php if ($distrito_list->cod_dpto->Visible) { // cod_dpto ?>
	<?php if ($distrito_list->SortUrl($distrito_list->cod_dpto) == "") { ?>
		<th data-name="cod_dpto" class="<?php echo $distrito_list->cod_dpto->headerCellClass() ?>"><div id="elh_distrito_cod_dpto" class="distrito_cod_dpto"><div class="ew-table-header-caption"><?php echo $distrito_list->cod_dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_dpto" class="<?php echo $distrito_list->cod_dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_list->SortUrl($distrito_list->cod_dpto) ?>', 1);"><div id="elh_distrito_cod_dpto" class="distrito_cod_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_list->cod_dpto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_list->cod_dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_list->cod_dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($distrito_list->cod_provincia->Visible) { // cod_provincia ?>
	<?php if ($distrito_list->SortUrl($distrito_list->cod_provincia) == "") { ?>
		<th data-name="cod_provincia" class="<?php echo $distrito_list->cod_provincia->headerCellClass() ?>"><div id="elh_distrito_cod_provincia" class="distrito_cod_provincia"><div class="ew-table-header-caption"><?php echo $distrito_list->cod_provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_provincia" class="<?php echo $distrito_list->cod_provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_list->SortUrl($distrito_list->cod_provincia) ?>', 1);"><div id="elh_distrito_cod_provincia" class="distrito_cod_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_list->cod_provincia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_list->cod_provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_list->cod_provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($distrito_list->cod_distrito->Visible) { // cod_distrito ?>
	<?php if ($distrito_list->SortUrl($distrito_list->cod_distrito) == "") { ?>
		<th data-name="cod_distrito" class="<?php echo $distrito_list->cod_distrito->headerCellClass() ?>"><div id="elh_distrito_cod_distrito" class="distrito_cod_distrito"><div class="ew-table-header-caption"><?php echo $distrito_list->cod_distrito->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_distrito" class="<?php echo $distrito_list->cod_distrito->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_list->SortUrl($distrito_list->cod_distrito) ?>', 1);"><div id="elh_distrito_cod_distrito" class="distrito_cod_distrito">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_list->cod_distrito->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_list->cod_distrito->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_list->cod_distrito->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($distrito_list->nombre_distrito->Visible) { // nombre_distrito ?>
	<?php if ($distrito_list->SortUrl($distrito_list->nombre_distrito) == "") { ?>
		<th data-name="nombre_distrito" class="<?php echo $distrito_list->nombre_distrito->headerCellClass() ?>"><div id="elh_distrito_nombre_distrito" class="distrito_nombre_distrito"><div class="ew-table-header-caption"><?php echo $distrito_list->nombre_distrito->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_distrito" class="<?php echo $distrito_list->nombre_distrito->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_list->SortUrl($distrito_list->nombre_distrito) ?>', 1);"><div id="elh_distrito_nombre_distrito" class="distrito_nombre_distrito">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_list->nombre_distrito->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_list->nombre_distrito->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_list->nombre_distrito->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$distrito_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($distrito_list->ExportAll && $distrito_list->isExport()) {
	$distrito_list->StopRecord = $distrito_list->TotalRecords;
} else {

	// Set the last record to display
	if ($distrito_list->TotalRecords > $distrito_list->StartRecord + $distrito_list->DisplayRecords - 1)
		$distrito_list->StopRecord = $distrito_list->StartRecord + $distrito_list->DisplayRecords - 1;
	else
		$distrito_list->StopRecord = $distrito_list->TotalRecords;
}
$distrito_list->RecordCount = $distrito_list->StartRecord - 1;
if ($distrito_list->Recordset && !$distrito_list->Recordset->EOF) {
	$distrito_list->Recordset->moveFirst();
	$selectLimit = $distrito_list->UseSelectLimit;
	if (!$selectLimit && $distrito_list->StartRecord > 1)
		$distrito_list->Recordset->move($distrito_list->StartRecord - 1);
} elseif (!$distrito->AllowAddDeleteRow && $distrito_list->StopRecord == 0) {
	$distrito_list->StopRecord = $distrito->GridAddRowCount;
}

// Initialize aggregate
$distrito->RowType = ROWTYPE_AGGREGATEINIT;
$distrito->resetAttributes();
$distrito_list->renderRow();
while ($distrito_list->RecordCount < $distrito_list->StopRecord) {
	$distrito_list->RecordCount++;
	if ($distrito_list->RecordCount >= $distrito_list->StartRecord) {
		$distrito_list->RowCount++;

		// Set up key count
		$distrito_list->KeyCount = $distrito_list->RowIndex;

		// Init row class and style
		$distrito->resetAttributes();
		$distrito->CssClass = "";
		if ($distrito_list->isGridAdd()) {
		} else {
			$distrito_list->loadRowValues($distrito_list->Recordset); // Load row values
		}
		$distrito->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$distrito->RowAttrs->merge(["data-rowindex" => $distrito_list->RowCount, "id" => "r" . $distrito_list->RowCount . "_distrito", "data-rowtype" => $distrito->RowType]);

		// Render row
		$distrito_list->renderRow();

		// Render list options
		$distrito_list->renderListOptions();
?>
	<tr <?php echo $distrito->rowAttributes() ?>>
<?php

// Render list options (body, left)
$distrito_list->ListOptions->render("body", "left", $distrito_list->RowCount);
?>
	<?php if ($distrito_list->cod_dpto->Visible) { // cod_dpto ?>
		<td data-name="cod_dpto" <?php echo $distrito_list->cod_dpto->cellAttributes() ?>>
<span id="el<?php echo $distrito_list->RowCount ?>_distrito_cod_dpto">
<span<?php echo $distrito_list->cod_dpto->viewAttributes() ?>><?php echo $distrito_list->cod_dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($distrito_list->cod_provincia->Visible) { // cod_provincia ?>
		<td data-name="cod_provincia" <?php echo $distrito_list->cod_provincia->cellAttributes() ?>>
<span id="el<?php echo $distrito_list->RowCount ?>_distrito_cod_provincia">
<span<?php echo $distrito_list->cod_provincia->viewAttributes() ?>><?php echo $distrito_list->cod_provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($distrito_list->cod_distrito->Visible) { // cod_distrito ?>
		<td data-name="cod_distrito" <?php echo $distrito_list->cod_distrito->cellAttributes() ?>>
<span id="el<?php echo $distrito_list->RowCount ?>_distrito_cod_distrito">
<span<?php echo $distrito_list->cod_distrito->viewAttributes() ?>><?php echo $distrito_list->cod_distrito->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($distrito_list->nombre_distrito->Visible) { // nombre_distrito ?>
		<td data-name="nombre_distrito" <?php echo $distrito_list->nombre_distrito->cellAttributes() ?>>
<span id="el<?php echo $distrito_list->RowCount ?>_distrito_nombre_distrito">
<span<?php echo $distrito_list->nombre_distrito->viewAttributes() ?>><?php echo $distrito_list->nombre_distrito->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$distrito_list->ListOptions->render("body", "right", $distrito_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$distrito_list->isGridAdd())
		$distrito_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$distrito->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($distrito_list->Recordset)
	$distrito_list->Recordset->Close();
?>
<?php if (!$distrito_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$distrito_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $distrito_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $distrito_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($distrito_list->TotalRecords == 0 && !$distrito->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $distrito_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$distrito_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$distrito_list->isExport()) { ?>
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
$distrito_list->terminate();
?>