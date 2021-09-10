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
$distrito_reniec_list = new distrito_reniec_list();

// Run the page
$distrito_reniec_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$distrito_reniec_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$distrito_reniec_list->isExport()) { ?>
<script>
var fdistrito_renieclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdistrito_renieclist = currentForm = new ew.Form("fdistrito_renieclist", "list");
	fdistrito_renieclist.formKeyCountName = '<?php echo $distrito_reniec_list->FormKeyCountName ?>';
	loadjs.done("fdistrito_renieclist");
});
var fdistrito_renieclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdistrito_renieclistsrch = currentSearchForm = new ew.Form("fdistrito_renieclistsrch");

	// Dynamic selection lists
	// Filters

	fdistrito_renieclistsrch.filterList = <?php echo $distrito_reniec_list->getFilterList() ?>;
	loadjs.done("fdistrito_renieclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$distrito_reniec_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($distrito_reniec_list->TotalRecords > 0 && $distrito_reniec_list->ExportOptions->visible()) { ?>
<?php $distrito_reniec_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($distrito_reniec_list->ImportOptions->visible()) { ?>
<?php $distrito_reniec_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($distrito_reniec_list->SearchOptions->visible()) { ?>
<?php $distrito_reniec_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($distrito_reniec_list->FilterOptions->visible()) { ?>
<?php $distrito_reniec_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$distrito_reniec_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$distrito_reniec_list->isExport() && !$distrito_reniec->CurrentAction) { ?>
<form name="fdistrito_renieclistsrch" id="fdistrito_renieclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdistrito_renieclistsrch-search-panel" class="<?php echo $distrito_reniec_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="distrito_reniec">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $distrito_reniec_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($distrito_reniec_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($distrito_reniec_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $distrito_reniec_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($distrito_reniec_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($distrito_reniec_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($distrito_reniec_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($distrito_reniec_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $distrito_reniec_list->showPageHeader(); ?>
<?php
$distrito_reniec_list->showMessage();
?>
<?php if ($distrito_reniec_list->TotalRecords > 0 || $distrito_reniec->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($distrito_reniec_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> distrito_reniec">
<?php if (!$distrito_reniec_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$distrito_reniec_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $distrito_reniec_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $distrito_reniec_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdistrito_renieclist" id="fdistrito_renieclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="distrito_reniec">
<div id="gmp_distrito_reniec" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($distrito_reniec_list->TotalRecords > 0 || $distrito_reniec_list->isGridEdit()) { ?>
<table id="tbl_distrito_renieclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$distrito_reniec->RowType = ROWTYPE_HEADER;

// Render list options
$distrito_reniec_list->renderListOptions();

// Render list options (header, left)
$distrito_reniec_list->ListOptions->render("header", "left");
?>
<?php if ($distrito_reniec_list->cod_dpto->Visible) { // cod_dpto ?>
	<?php if ($distrito_reniec_list->SortUrl($distrito_reniec_list->cod_dpto) == "") { ?>
		<th data-name="cod_dpto" class="<?php echo $distrito_reniec_list->cod_dpto->headerCellClass() ?>"><div id="elh_distrito_reniec_cod_dpto" class="distrito_reniec_cod_dpto"><div class="ew-table-header-caption"><?php echo $distrito_reniec_list->cod_dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_dpto" class="<?php echo $distrito_reniec_list->cod_dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_reniec_list->SortUrl($distrito_reniec_list->cod_dpto) ?>', 1);"><div id="elh_distrito_reniec_cod_dpto" class="distrito_reniec_cod_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_reniec_list->cod_dpto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_reniec_list->cod_dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_reniec_list->cod_dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($distrito_reniec_list->cod_provincia->Visible) { // cod_provincia ?>
	<?php if ($distrito_reniec_list->SortUrl($distrito_reniec_list->cod_provincia) == "") { ?>
		<th data-name="cod_provincia" class="<?php echo $distrito_reniec_list->cod_provincia->headerCellClass() ?>"><div id="elh_distrito_reniec_cod_provincia" class="distrito_reniec_cod_provincia"><div class="ew-table-header-caption"><?php echo $distrito_reniec_list->cod_provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_provincia" class="<?php echo $distrito_reniec_list->cod_provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_reniec_list->SortUrl($distrito_reniec_list->cod_provincia) ?>', 1);"><div id="elh_distrito_reniec_cod_provincia" class="distrito_reniec_cod_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_reniec_list->cod_provincia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_reniec_list->cod_provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_reniec_list->cod_provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($distrito_reniec_list->cod_distrito->Visible) { // cod_distrito ?>
	<?php if ($distrito_reniec_list->SortUrl($distrito_reniec_list->cod_distrito) == "") { ?>
		<th data-name="cod_distrito" class="<?php echo $distrito_reniec_list->cod_distrito->headerCellClass() ?>"><div id="elh_distrito_reniec_cod_distrito" class="distrito_reniec_cod_distrito"><div class="ew-table-header-caption"><?php echo $distrito_reniec_list->cod_distrito->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_distrito" class="<?php echo $distrito_reniec_list->cod_distrito->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_reniec_list->SortUrl($distrito_reniec_list->cod_distrito) ?>', 1);"><div id="elh_distrito_reniec_cod_distrito" class="distrito_reniec_cod_distrito">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_reniec_list->cod_distrito->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_reniec_list->cod_distrito->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_reniec_list->cod_distrito->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($distrito_reniec_list->nombre_distrito->Visible) { // nombre_distrito ?>
	<?php if ($distrito_reniec_list->SortUrl($distrito_reniec_list->nombre_distrito) == "") { ?>
		<th data-name="nombre_distrito" class="<?php echo $distrito_reniec_list->nombre_distrito->headerCellClass() ?>"><div id="elh_distrito_reniec_nombre_distrito" class="distrito_reniec_nombre_distrito"><div class="ew-table-header-caption"><?php echo $distrito_reniec_list->nombre_distrito->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_distrito" class="<?php echo $distrito_reniec_list->nombre_distrito->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $distrito_reniec_list->SortUrl($distrito_reniec_list->nombre_distrito) ?>', 1);"><div id="elh_distrito_reniec_nombre_distrito" class="distrito_reniec_nombre_distrito">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $distrito_reniec_list->nombre_distrito->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($distrito_reniec_list->nombre_distrito->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($distrito_reniec_list->nombre_distrito->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$distrito_reniec_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($distrito_reniec_list->ExportAll && $distrito_reniec_list->isExport()) {
	$distrito_reniec_list->StopRecord = $distrito_reniec_list->TotalRecords;
} else {

	// Set the last record to display
	if ($distrito_reniec_list->TotalRecords > $distrito_reniec_list->StartRecord + $distrito_reniec_list->DisplayRecords - 1)
		$distrito_reniec_list->StopRecord = $distrito_reniec_list->StartRecord + $distrito_reniec_list->DisplayRecords - 1;
	else
		$distrito_reniec_list->StopRecord = $distrito_reniec_list->TotalRecords;
}
$distrito_reniec_list->RecordCount = $distrito_reniec_list->StartRecord - 1;
if ($distrito_reniec_list->Recordset && !$distrito_reniec_list->Recordset->EOF) {
	$distrito_reniec_list->Recordset->moveFirst();
	$selectLimit = $distrito_reniec_list->UseSelectLimit;
	if (!$selectLimit && $distrito_reniec_list->StartRecord > 1)
		$distrito_reniec_list->Recordset->move($distrito_reniec_list->StartRecord - 1);
} elseif (!$distrito_reniec->AllowAddDeleteRow && $distrito_reniec_list->StopRecord == 0) {
	$distrito_reniec_list->StopRecord = $distrito_reniec->GridAddRowCount;
}

// Initialize aggregate
$distrito_reniec->RowType = ROWTYPE_AGGREGATEINIT;
$distrito_reniec->resetAttributes();
$distrito_reniec_list->renderRow();
while ($distrito_reniec_list->RecordCount < $distrito_reniec_list->StopRecord) {
	$distrito_reniec_list->RecordCount++;
	if ($distrito_reniec_list->RecordCount >= $distrito_reniec_list->StartRecord) {
		$distrito_reniec_list->RowCount++;

		// Set up key count
		$distrito_reniec_list->KeyCount = $distrito_reniec_list->RowIndex;

		// Init row class and style
		$distrito_reniec->resetAttributes();
		$distrito_reniec->CssClass = "";
		if ($distrito_reniec_list->isGridAdd()) {
		} else {
			$distrito_reniec_list->loadRowValues($distrito_reniec_list->Recordset); // Load row values
		}
		$distrito_reniec->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$distrito_reniec->RowAttrs->merge(["data-rowindex" => $distrito_reniec_list->RowCount, "id" => "r" . $distrito_reniec_list->RowCount . "_distrito_reniec", "data-rowtype" => $distrito_reniec->RowType]);

		// Render row
		$distrito_reniec_list->renderRow();

		// Render list options
		$distrito_reniec_list->renderListOptions();
?>
	<tr <?php echo $distrito_reniec->rowAttributes() ?>>
<?php

// Render list options (body, left)
$distrito_reniec_list->ListOptions->render("body", "left", $distrito_reniec_list->RowCount);
?>
	<?php if ($distrito_reniec_list->cod_dpto->Visible) { // cod_dpto ?>
		<td data-name="cod_dpto" <?php echo $distrito_reniec_list->cod_dpto->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_list->RowCount ?>_distrito_reniec_cod_dpto">
<span<?php echo $distrito_reniec_list->cod_dpto->viewAttributes() ?>><?php echo $distrito_reniec_list->cod_dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($distrito_reniec_list->cod_provincia->Visible) { // cod_provincia ?>
		<td data-name="cod_provincia" <?php echo $distrito_reniec_list->cod_provincia->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_list->RowCount ?>_distrito_reniec_cod_provincia">
<span<?php echo $distrito_reniec_list->cod_provincia->viewAttributes() ?>><?php echo $distrito_reniec_list->cod_provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($distrito_reniec_list->cod_distrito->Visible) { // cod_distrito ?>
		<td data-name="cod_distrito" <?php echo $distrito_reniec_list->cod_distrito->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_list->RowCount ?>_distrito_reniec_cod_distrito">
<span<?php echo $distrito_reniec_list->cod_distrito->viewAttributes() ?>><?php echo $distrito_reniec_list->cod_distrito->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($distrito_reniec_list->nombre_distrito->Visible) { // nombre_distrito ?>
		<td data-name="nombre_distrito" <?php echo $distrito_reniec_list->nombre_distrito->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_list->RowCount ?>_distrito_reniec_nombre_distrito">
<span<?php echo $distrito_reniec_list->nombre_distrito->viewAttributes() ?>><?php echo $distrito_reniec_list->nombre_distrito->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$distrito_reniec_list->ListOptions->render("body", "right", $distrito_reniec_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$distrito_reniec_list->isGridAdd())
		$distrito_reniec_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$distrito_reniec->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($distrito_reniec_list->Recordset)
	$distrito_reniec_list->Recordset->Close();
?>
<?php if (!$distrito_reniec_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$distrito_reniec_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $distrito_reniec_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $distrito_reniec_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($distrito_reniec_list->TotalRecords == 0 && !$distrito_reniec->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $distrito_reniec_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$distrito_reniec_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$distrito_reniec_list->isExport()) { ?>
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
$distrito_reniec_list->terminate();
?>