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
$departamento_list = new departamento_list();

// Run the page
$departamento_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$departamento_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$departamento_list->isExport()) { ?>
<script>
var fdepartamentolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdepartamentolist = currentForm = new ew.Form("fdepartamentolist", "list");
	fdepartamentolist.formKeyCountName = '<?php echo $departamento_list->FormKeyCountName ?>';
	loadjs.done("fdepartamentolist");
});
var fdepartamentolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdepartamentolistsrch = currentSearchForm = new ew.Form("fdepartamentolistsrch");

	// Dynamic selection lists
	// Filters

	fdepartamentolistsrch.filterList = <?php echo $departamento_list->getFilterList() ?>;
	loadjs.done("fdepartamentolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$departamento_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($departamento_list->TotalRecords > 0 && $departamento_list->ExportOptions->visible()) { ?>
<?php $departamento_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($departamento_list->ImportOptions->visible()) { ?>
<?php $departamento_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($departamento_list->SearchOptions->visible()) { ?>
<?php $departamento_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($departamento_list->FilterOptions->visible()) { ?>
<?php $departamento_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$departamento_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$departamento_list->isExport() && !$departamento->CurrentAction) { ?>
<form name="fdepartamentolistsrch" id="fdepartamentolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdepartamentolistsrch-search-panel" class="<?php echo $departamento_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="departamento">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $departamento_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($departamento_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($departamento_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $departamento_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($departamento_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($departamento_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($departamento_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($departamento_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $departamento_list->showPageHeader(); ?>
<?php
$departamento_list->showMessage();
?>
<?php if ($departamento_list->TotalRecords > 0 || $departamento->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($departamento_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> departamento">
<?php if (!$departamento_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$departamento_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $departamento_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $departamento_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdepartamentolist" id="fdepartamentolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="departamento">
<div id="gmp_departamento" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($departamento_list->TotalRecords > 0 || $departamento_list->isGridEdit()) { ?>
<table id="tbl_departamentolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$departamento->RowType = ROWTYPE_HEADER;

// Render list options
$departamento_list->renderListOptions();

// Render list options (header, left)
$departamento_list->ListOptions->render("header", "left");
?>
<?php if ($departamento_list->cod_dpto->Visible) { // cod_dpto ?>
	<?php if ($departamento_list->SortUrl($departamento_list->cod_dpto) == "") { ?>
		<th data-name="cod_dpto" class="<?php echo $departamento_list->cod_dpto->headerCellClass() ?>"><div id="elh_departamento_cod_dpto" class="departamento_cod_dpto"><div class="ew-table-header-caption"><?php echo $departamento_list->cod_dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_dpto" class="<?php echo $departamento_list->cod_dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $departamento_list->SortUrl($departamento_list->cod_dpto) ?>', 1);"><div id="elh_departamento_cod_dpto" class="departamento_cod_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $departamento_list->cod_dpto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($departamento_list->cod_dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($departamento_list->cod_dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($departamento_list->nombre_dpto->Visible) { // nombre_dpto ?>
	<?php if ($departamento_list->SortUrl($departamento_list->nombre_dpto) == "") { ?>
		<th data-name="nombre_dpto" class="<?php echo $departamento_list->nombre_dpto->headerCellClass() ?>"><div id="elh_departamento_nombre_dpto" class="departamento_nombre_dpto"><div class="ew-table-header-caption"><?php echo $departamento_list->nombre_dpto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_dpto" class="<?php echo $departamento_list->nombre_dpto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $departamento_list->SortUrl($departamento_list->nombre_dpto) ?>', 1);"><div id="elh_departamento_nombre_dpto" class="departamento_nombre_dpto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $departamento_list->nombre_dpto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($departamento_list->nombre_dpto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($departamento_list->nombre_dpto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$departamento_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($departamento_list->ExportAll && $departamento_list->isExport()) {
	$departamento_list->StopRecord = $departamento_list->TotalRecords;
} else {

	// Set the last record to display
	if ($departamento_list->TotalRecords > $departamento_list->StartRecord + $departamento_list->DisplayRecords - 1)
		$departamento_list->StopRecord = $departamento_list->StartRecord + $departamento_list->DisplayRecords - 1;
	else
		$departamento_list->StopRecord = $departamento_list->TotalRecords;
}
$departamento_list->RecordCount = $departamento_list->StartRecord - 1;
if ($departamento_list->Recordset && !$departamento_list->Recordset->EOF) {
	$departamento_list->Recordset->moveFirst();
	$selectLimit = $departamento_list->UseSelectLimit;
	if (!$selectLimit && $departamento_list->StartRecord > 1)
		$departamento_list->Recordset->move($departamento_list->StartRecord - 1);
} elseif (!$departamento->AllowAddDeleteRow && $departamento_list->StopRecord == 0) {
	$departamento_list->StopRecord = $departamento->GridAddRowCount;
}

// Initialize aggregate
$departamento->RowType = ROWTYPE_AGGREGATEINIT;
$departamento->resetAttributes();
$departamento_list->renderRow();
while ($departamento_list->RecordCount < $departamento_list->StopRecord) {
	$departamento_list->RecordCount++;
	if ($departamento_list->RecordCount >= $departamento_list->StartRecord) {
		$departamento_list->RowCount++;

		// Set up key count
		$departamento_list->KeyCount = $departamento_list->RowIndex;

		// Init row class and style
		$departamento->resetAttributes();
		$departamento->CssClass = "";
		if ($departamento_list->isGridAdd()) {
		} else {
			$departamento_list->loadRowValues($departamento_list->Recordset); // Load row values
		}
		$departamento->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$departamento->RowAttrs->merge(["data-rowindex" => $departamento_list->RowCount, "id" => "r" . $departamento_list->RowCount . "_departamento", "data-rowtype" => $departamento->RowType]);

		// Render row
		$departamento_list->renderRow();

		// Render list options
		$departamento_list->renderListOptions();
?>
	<tr <?php echo $departamento->rowAttributes() ?>>
<?php

// Render list options (body, left)
$departamento_list->ListOptions->render("body", "left", $departamento_list->RowCount);
?>
	<?php if ($departamento_list->cod_dpto->Visible) { // cod_dpto ?>
		<td data-name="cod_dpto" <?php echo $departamento_list->cod_dpto->cellAttributes() ?>>
<span id="el<?php echo $departamento_list->RowCount ?>_departamento_cod_dpto">
<span<?php echo $departamento_list->cod_dpto->viewAttributes() ?>><?php echo $departamento_list->cod_dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($departamento_list->nombre_dpto->Visible) { // nombre_dpto ?>
		<td data-name="nombre_dpto" <?php echo $departamento_list->nombre_dpto->cellAttributes() ?>>
<span id="el<?php echo $departamento_list->RowCount ?>_departamento_nombre_dpto">
<span<?php echo $departamento_list->nombre_dpto->viewAttributes() ?>><?php echo $departamento_list->nombre_dpto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$departamento_list->ListOptions->render("body", "right", $departamento_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$departamento_list->isGridAdd())
		$departamento_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$departamento->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($departamento_list->Recordset)
	$departamento_list->Recordset->Close();
?>
<?php if (!$departamento_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$departamento_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $departamento_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $departamento_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($departamento_list->TotalRecords == 0 && !$departamento->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $departamento_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$departamento_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$departamento_list->isExport()) { ?>
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
$departamento_list->terminate();
?>