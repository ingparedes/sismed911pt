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
$provincias_list = new provincias_list();

// Run the page
$provincias_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$provincias_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$provincias_list->isExport()) { ?>
<script>
var fprovinciaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fprovinciaslist = currentForm = new ew.Form("fprovinciaslist", "list");
	fprovinciaslist.formKeyCountName = '<?php echo $provincias_list->FormKeyCountName ?>';
	loadjs.done("fprovinciaslist");
});
var fprovinciaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fprovinciaslistsrch = currentSearchForm = new ew.Form("fprovinciaslistsrch");

	// Dynamic selection lists
	// Filters

	fprovinciaslistsrch.filterList = <?php echo $provincias_list->getFilterList() ?>;
	loadjs.done("fprovinciaslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$provincias_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($provincias_list->TotalRecords > 0 && $provincias_list->ExportOptions->visible()) { ?>
<?php $provincias_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($provincias_list->ImportOptions->visible()) { ?>
<?php $provincias_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($provincias_list->SearchOptions->visible()) { ?>
<?php $provincias_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($provincias_list->FilterOptions->visible()) { ?>
<?php $provincias_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$provincias_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$provincias_list->isExport() && !$provincias->CurrentAction) { ?>
<form name="fprovinciaslistsrch" id="fprovinciaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fprovinciaslistsrch-search-panel" class="<?php echo $provincias_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="provincias">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $provincias_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($provincias_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($provincias_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $provincias_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($provincias_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($provincias_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($provincias_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($provincias_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $provincias_list->showPageHeader(); ?>
<?php
$provincias_list->showMessage();
?>
<?php if ($provincias_list->TotalRecords > 0 || $provincias->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($provincias_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> provincias">
<?php if (!$provincias_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$provincias_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $provincias_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $provincias_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fprovinciaslist" id="fprovinciaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="provincias">
<div id="gmp_provincias" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($provincias_list->TotalRecords > 0 || $provincias_list->isGridEdit()) { ?>
<table id="tbl_provinciaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$provincias->RowType = ROWTYPE_HEADER;

// Render list options
$provincias_list->renderListOptions();

// Render list options (header, left)
$provincias_list->ListOptions->render("header", "left");
?>
<?php if ($provincias_list->cod_departamento->Visible) { // cod_departamento ?>
	<?php if ($provincias_list->SortUrl($provincias_list->cod_departamento) == "") { ?>
		<th data-name="cod_departamento" class="<?php echo $provincias_list->cod_departamento->headerCellClass() ?>"><div id="elh_provincias_cod_departamento" class="provincias_cod_departamento"><div class="ew-table-header-caption"><?php echo $provincias_list->cod_departamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_departamento" class="<?php echo $provincias_list->cod_departamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $provincias_list->SortUrl($provincias_list->cod_departamento) ?>', 1);"><div id="elh_provincias_cod_departamento" class="provincias_cod_departamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $provincias_list->cod_departamento->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($provincias_list->cod_departamento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($provincias_list->cod_departamento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($provincias_list->cod_provincia->Visible) { // cod_provincia ?>
	<?php if ($provincias_list->SortUrl($provincias_list->cod_provincia) == "") { ?>
		<th data-name="cod_provincia" class="<?php echo $provincias_list->cod_provincia->headerCellClass() ?>"><div id="elh_provincias_cod_provincia" class="provincias_cod_provincia"><div class="ew-table-header-caption"><?php echo $provincias_list->cod_provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_provincia" class="<?php echo $provincias_list->cod_provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $provincias_list->SortUrl($provincias_list->cod_provincia) ?>', 1);"><div id="elh_provincias_cod_provincia" class="provincias_cod_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $provincias_list->cod_provincia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($provincias_list->cod_provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($provincias_list->cod_provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($provincias_list->nombre_provincia->Visible) { // nombre_provincia ?>
	<?php if ($provincias_list->SortUrl($provincias_list->nombre_provincia) == "") { ?>
		<th data-name="nombre_provincia" class="<?php echo $provincias_list->nombre_provincia->headerCellClass() ?>"><div id="elh_provincias_nombre_provincia" class="provincias_nombre_provincia"><div class="ew-table-header-caption"><?php echo $provincias_list->nombre_provincia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_provincia" class="<?php echo $provincias_list->nombre_provincia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $provincias_list->SortUrl($provincias_list->nombre_provincia) ?>', 1);"><div id="elh_provincias_nombre_provincia" class="provincias_nombre_provincia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $provincias_list->nombre_provincia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($provincias_list->nombre_provincia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($provincias_list->nombre_provincia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$provincias_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($provincias_list->ExportAll && $provincias_list->isExport()) {
	$provincias_list->StopRecord = $provincias_list->TotalRecords;
} else {

	// Set the last record to display
	if ($provincias_list->TotalRecords > $provincias_list->StartRecord + $provincias_list->DisplayRecords - 1)
		$provincias_list->StopRecord = $provincias_list->StartRecord + $provincias_list->DisplayRecords - 1;
	else
		$provincias_list->StopRecord = $provincias_list->TotalRecords;
}
$provincias_list->RecordCount = $provincias_list->StartRecord - 1;
if ($provincias_list->Recordset && !$provincias_list->Recordset->EOF) {
	$provincias_list->Recordset->moveFirst();
	$selectLimit = $provincias_list->UseSelectLimit;
	if (!$selectLimit && $provincias_list->StartRecord > 1)
		$provincias_list->Recordset->move($provincias_list->StartRecord - 1);
} elseif (!$provincias->AllowAddDeleteRow && $provincias_list->StopRecord == 0) {
	$provincias_list->StopRecord = $provincias->GridAddRowCount;
}

// Initialize aggregate
$provincias->RowType = ROWTYPE_AGGREGATEINIT;
$provincias->resetAttributes();
$provincias_list->renderRow();
while ($provincias_list->RecordCount < $provincias_list->StopRecord) {
	$provincias_list->RecordCount++;
	if ($provincias_list->RecordCount >= $provincias_list->StartRecord) {
		$provincias_list->RowCount++;

		// Set up key count
		$provincias_list->KeyCount = $provincias_list->RowIndex;

		// Init row class and style
		$provincias->resetAttributes();
		$provincias->CssClass = "";
		if ($provincias_list->isGridAdd()) {
		} else {
			$provincias_list->loadRowValues($provincias_list->Recordset); // Load row values
		}
		$provincias->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$provincias->RowAttrs->merge(["data-rowindex" => $provincias_list->RowCount, "id" => "r" . $provincias_list->RowCount . "_provincias", "data-rowtype" => $provincias->RowType]);

		// Render row
		$provincias_list->renderRow();

		// Render list options
		$provincias_list->renderListOptions();
?>
	<tr <?php echo $provincias->rowAttributes() ?>>
<?php

// Render list options (body, left)
$provincias_list->ListOptions->render("body", "left", $provincias_list->RowCount);
?>
	<?php if ($provincias_list->cod_departamento->Visible) { // cod_departamento ?>
		<td data-name="cod_departamento" <?php echo $provincias_list->cod_departamento->cellAttributes() ?>>
<span id="el<?php echo $provincias_list->RowCount ?>_provincias_cod_departamento">
<span<?php echo $provincias_list->cod_departamento->viewAttributes() ?>><?php echo $provincias_list->cod_departamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($provincias_list->cod_provincia->Visible) { // cod_provincia ?>
		<td data-name="cod_provincia" <?php echo $provincias_list->cod_provincia->cellAttributes() ?>>
<span id="el<?php echo $provincias_list->RowCount ?>_provincias_cod_provincia">
<span<?php echo $provincias_list->cod_provincia->viewAttributes() ?>><?php echo $provincias_list->cod_provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($provincias_list->nombre_provincia->Visible) { // nombre_provincia ?>
		<td data-name="nombre_provincia" <?php echo $provincias_list->nombre_provincia->cellAttributes() ?>>
<span id="el<?php echo $provincias_list->RowCount ?>_provincias_nombre_provincia">
<span<?php echo $provincias_list->nombre_provincia->viewAttributes() ?>><?php echo $provincias_list->nombre_provincia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$provincias_list->ListOptions->render("body", "right", $provincias_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$provincias_list->isGridAdd())
		$provincias_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$provincias->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($provincias_list->Recordset)
	$provincias_list->Recordset->Close();
?>
<?php if (!$provincias_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$provincias_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $provincias_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $provincias_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($provincias_list->TotalRecords == 0 && !$provincias->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $provincias_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$provincias_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$provincias_list->isExport()) { ?>
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
$provincias_list->terminate();
?>