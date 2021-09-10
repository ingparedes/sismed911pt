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
$provincias_reniec_list = new provincias_reniec_list();

// Run the page
$provincias_reniec_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$provincias_reniec_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$provincias_reniec_list->isExport()) { ?>
<script>
var fprovincias_renieclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fprovincias_renieclist = currentForm = new ew.Form("fprovincias_renieclist", "list");
	fprovincias_renieclist.formKeyCountName = '<?php echo $provincias_reniec_list->FormKeyCountName ?>';
	loadjs.done("fprovincias_renieclist");
});
var fprovincias_renieclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fprovincias_renieclistsrch = currentSearchForm = new ew.Form("fprovincias_renieclistsrch");

	// Dynamic selection lists
	// Filters

	fprovincias_renieclistsrch.filterList = <?php echo $provincias_reniec_list->getFilterList() ?>;
	loadjs.done("fprovincias_renieclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$provincias_reniec_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($provincias_reniec_list->TotalRecords > 0 && $provincias_reniec_list->ExportOptions->visible()) { ?>
<?php $provincias_reniec_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($provincias_reniec_list->ImportOptions->visible()) { ?>
<?php $provincias_reniec_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($provincias_reniec_list->SearchOptions->visible()) { ?>
<?php $provincias_reniec_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($provincias_reniec_list->FilterOptions->visible()) { ?>
<?php $provincias_reniec_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$provincias_reniec_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$provincias_reniec_list->isExport() && !$provincias_reniec->CurrentAction) { ?>
<form name="fprovincias_renieclistsrch" id="fprovincias_renieclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fprovincias_renieclistsrch-search-panel" class="<?php echo $provincias_reniec_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="provincias_reniec">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $provincias_reniec_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($provincias_reniec_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($provincias_reniec_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $provincias_reniec_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($provincias_reniec_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($provincias_reniec_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($provincias_reniec_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($provincias_reniec_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $provincias_reniec_list->showPageHeader(); ?>
<?php
$provincias_reniec_list->showMessage();
?>
<?php if ($provincias_reniec_list->TotalRecords > 0 || $provincias_reniec->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($provincias_reniec_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> provincias_reniec">
<?php if (!$provincias_reniec_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$provincias_reniec_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $provincias_reniec_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $provincias_reniec_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fprovincias_renieclist" id="fprovincias_renieclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="provincias_reniec">
<div id="gmp_provincias_reniec" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($provincias_reniec_list->TotalRecords > 0 || $provincias_reniec_list->isGridEdit()) { ?>
<table id="tbl_provincias_renieclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$provincias_reniec->RowType = ROWTYPE_HEADER;

// Render list options
$provincias_reniec_list->renderListOptions();

// Render list options (header, left)
$provincias_reniec_list->ListOptions->render("header", "left");
?>
<?php if ($provincias_reniec_list->cod_departamento->Visible) { // cod_departamento ?>
	<?php if ($provincias_reniec_list->SortUrl($provincias_reniec_list->cod_departamento) == "") { ?>
		<th data-name="cod_departamento" class="<?php echo $provincias_reniec_list->cod_departamento->headerCellClass() ?>"><div id="elh_provincias_reniec_cod_departamento" class="provincias_reniec_cod_departamento"><div class="ew-table-header-caption"><?php echo $provincias_reniec_list->cod_departamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_departamento" class="<?php echo $provincias_reniec_list->cod_departamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $provincias_reniec_list->SortUrl($provincias_reniec_list->cod_departamento) ?>', 1);"><div id="elh_provincias_reniec_cod_departamento" class="provincias_reniec_cod_departamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $provincias_reniec_list->cod_departamento->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($provincias_reniec_list->cod_departamento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($provincias_reniec_list->cod_departamento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($provincias_reniec_list->cod_provincia->Visible) { // cod_provincia ?>
	<?php if ($provincias_reniec_list->SortUrl($provincias_reniec_list->cod_provincia) == "") { ?>
		<th data-name="cod_provincia" class="<?php echo $provincias_reniec_list->cod_provincia->headerCellClass() ?>"><div id="elh_provincias_reniec_cod_provincia" class="provincias_reniec_cod_provincia"><div class="ew-table-header-caption"><?php echo $provincias_reniec_list->cod_provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_provincia" class="<?php echo $provincias_reniec_list->cod_provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $provincias_reniec_list->SortUrl($provincias_reniec_list->cod_provincia) ?>', 1);"><div id="elh_provincias_reniec_cod_provincia" class="provincias_reniec_cod_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $provincias_reniec_list->cod_provincia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($provincias_reniec_list->cod_provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($provincias_reniec_list->cod_provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($provincias_reniec_list->nombre_provincia->Visible) { // nombre_provincia ?>
	<?php if ($provincias_reniec_list->SortUrl($provincias_reniec_list->nombre_provincia) == "") { ?>
		<th data-name="nombre_provincia" class="<?php echo $provincias_reniec_list->nombre_provincia->headerCellClass() ?>"><div id="elh_provincias_reniec_nombre_provincia" class="provincias_reniec_nombre_provincia"><div class="ew-table-header-caption"><?php echo $provincias_reniec_list->nombre_provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_provincia" class="<?php echo $provincias_reniec_list->nombre_provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $provincias_reniec_list->SortUrl($provincias_reniec_list->nombre_provincia) ?>', 1);"><div id="elh_provincias_reniec_nombre_provincia" class="provincias_reniec_nombre_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $provincias_reniec_list->nombre_provincia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($provincias_reniec_list->nombre_provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($provincias_reniec_list->nombre_provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$provincias_reniec_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($provincias_reniec_list->ExportAll && $provincias_reniec_list->isExport()) {
	$provincias_reniec_list->StopRecord = $provincias_reniec_list->TotalRecords;
} else {

	// Set the last record to display
	if ($provincias_reniec_list->TotalRecords > $provincias_reniec_list->StartRecord + $provincias_reniec_list->DisplayRecords - 1)
		$provincias_reniec_list->StopRecord = $provincias_reniec_list->StartRecord + $provincias_reniec_list->DisplayRecords - 1;
	else
		$provincias_reniec_list->StopRecord = $provincias_reniec_list->TotalRecords;
}
$provincias_reniec_list->RecordCount = $provincias_reniec_list->StartRecord - 1;
if ($provincias_reniec_list->Recordset && !$provincias_reniec_list->Recordset->EOF) {
	$provincias_reniec_list->Recordset->moveFirst();
	$selectLimit = $provincias_reniec_list->UseSelectLimit;
	if (!$selectLimit && $provincias_reniec_list->StartRecord > 1)
		$provincias_reniec_list->Recordset->move($provincias_reniec_list->StartRecord - 1);
} elseif (!$provincias_reniec->AllowAddDeleteRow && $provincias_reniec_list->StopRecord == 0) {
	$provincias_reniec_list->StopRecord = $provincias_reniec->GridAddRowCount;
}

// Initialize aggregate
$provincias_reniec->RowType = ROWTYPE_AGGREGATEINIT;
$provincias_reniec->resetAttributes();
$provincias_reniec_list->renderRow();
while ($provincias_reniec_list->RecordCount < $provincias_reniec_list->StopRecord) {
	$provincias_reniec_list->RecordCount++;
	if ($provincias_reniec_list->RecordCount >= $provincias_reniec_list->StartRecord) {
		$provincias_reniec_list->RowCount++;

		// Set up key count
		$provincias_reniec_list->KeyCount = $provincias_reniec_list->RowIndex;

		// Init row class and style
		$provincias_reniec->resetAttributes();
		$provincias_reniec->CssClass = "";
		if ($provincias_reniec_list->isGridAdd()) {
		} else {
			$provincias_reniec_list->loadRowValues($provincias_reniec_list->Recordset); // Load row values
		}
		$provincias_reniec->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$provincias_reniec->RowAttrs->merge(["data-rowindex" => $provincias_reniec_list->RowCount, "id" => "r" . $provincias_reniec_list->RowCount . "_provincias_reniec", "data-rowtype" => $provincias_reniec->RowType]);

		// Render row
		$provincias_reniec_list->renderRow();

		// Render list options
		$provincias_reniec_list->renderListOptions();
?>
	<tr <?php echo $provincias_reniec->rowAttributes() ?>>
<?php

// Render list options (body, left)
$provincias_reniec_list->ListOptions->render("body", "left", $provincias_reniec_list->RowCount);
?>
	<?php if ($provincias_reniec_list->cod_departamento->Visible) { // cod_departamento ?>
		<td data-name="cod_departamento" <?php echo $provincias_reniec_list->cod_departamento->cellAttributes() ?>>
<span id="el<?php echo $provincias_reniec_list->RowCount ?>_provincias_reniec_cod_departamento">
<span<?php echo $provincias_reniec_list->cod_departamento->viewAttributes() ?>><?php echo $provincias_reniec_list->cod_departamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($provincias_reniec_list->cod_provincia->Visible) { // cod_provincia ?>
		<td data-name="cod_provincia" <?php echo $provincias_reniec_list->cod_provincia->cellAttributes() ?>>
<span id="el<?php echo $provincias_reniec_list->RowCount ?>_provincias_reniec_cod_provincia">
<span<?php echo $provincias_reniec_list->cod_provincia->viewAttributes() ?>><?php echo $provincias_reniec_list->cod_provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($provincias_reniec_list->nombre_provincia->Visible) { // nombre_provincia ?>
		<td data-name="nombre_provincia" <?php echo $provincias_reniec_list->nombre_provincia->cellAttributes() ?>>
<span id="el<?php echo $provincias_reniec_list->RowCount ?>_provincias_reniec_nombre_provincia">
<span<?php echo $provincias_reniec_list->nombre_provincia->viewAttributes() ?>><?php echo $provincias_reniec_list->nombre_provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$provincias_reniec_list->ListOptions->render("body", "right", $provincias_reniec_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$provincias_reniec_list->isGridAdd())
		$provincias_reniec_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$provincias_reniec->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($provincias_reniec_list->Recordset)
	$provincias_reniec_list->Recordset->Close();
?>
<?php if (!$provincias_reniec_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$provincias_reniec_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $provincias_reniec_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $provincias_reniec_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($provincias_reniec_list->TotalRecords == 0 && !$provincias_reniec->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $provincias_reniec_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$provincias_reniec_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$provincias_reniec_list->isExport()) { ?>
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
$provincias_reniec_list->terminate();
?>