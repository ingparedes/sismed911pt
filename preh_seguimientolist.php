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
$preh_seguimiento_list = new preh_seguimiento_list();

// Run the page
$preh_seguimiento_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_seguimiento_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_seguimiento_list->isExport()) { ?>
<script>
var fpreh_seguimientolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_seguimientolist = currentForm = new ew.Form("fpreh_seguimientolist", "list");
	fpreh_seguimientolist.formKeyCountName = '<?php echo $preh_seguimiento_list->FormKeyCountName ?>';
	loadjs.done("fpreh_seguimientolist");
});
var fpreh_seguimientolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_seguimientolistsrch = currentSearchForm = new ew.Form("fpreh_seguimientolistsrch");

	// Dynamic selection lists
	// Filters

	fpreh_seguimientolistsrch.filterList = <?php echo $preh_seguimiento_list->getFilterList() ?>;
	loadjs.done("fpreh_seguimientolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_seguimiento_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_seguimiento_list->TotalRecords > 0 && $preh_seguimiento_list->ExportOptions->visible()) { ?>
<?php $preh_seguimiento_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_seguimiento_list->ImportOptions->visible()) { ?>
<?php $preh_seguimiento_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_seguimiento_list->SearchOptions->visible()) { ?>
<?php $preh_seguimiento_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_seguimiento_list->FilterOptions->visible()) { ?>
<?php $preh_seguimiento_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_seguimiento_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_seguimiento_list->isExport() && !$preh_seguimiento->CurrentAction) { ?>
<form name="fpreh_seguimientolistsrch" id="fpreh_seguimientolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_seguimientolistsrch-search-panel" class="<?php echo $preh_seguimiento_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_seguimiento">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $preh_seguimiento_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_seguimiento_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_seguimiento_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_seguimiento_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_seguimiento_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_seguimiento_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_seguimiento_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_seguimiento_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_seguimiento_list->showPageHeader(); ?>
<?php
$preh_seguimiento_list->showMessage();
?>
<?php if ($preh_seguimiento_list->TotalRecords > 0 || $preh_seguimiento->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_seguimiento_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_seguimiento">
<?php if (!$preh_seguimiento_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_seguimiento_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_seguimiento_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_seguimiento_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_seguimientolist" id="fpreh_seguimientolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_seguimiento">
<div id="gmp_preh_seguimiento" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_seguimiento_list->TotalRecords > 0 || $preh_seguimiento_list->isGridEdit()) { ?>
<table id="tbl_preh_seguimientolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_seguimiento->RowType = ROWTYPE_HEADER;

// Render list options
$preh_seguimiento_list->renderListOptions();

// Render list options (header, left)
$preh_seguimiento_list->ListOptions->render("header", "left");
?>
<?php if ($preh_seguimiento_list->id_seguimiento->Visible) { // id_seguimiento ?>
	<?php if ($preh_seguimiento_list->SortUrl($preh_seguimiento_list->id_seguimiento) == "") { ?>
		<th data-name="id_seguimiento" class="<?php echo $preh_seguimiento_list->id_seguimiento->headerCellClass() ?>"><div id="elh_preh_seguimiento_id_seguimiento" class="preh_seguimiento_id_seguimiento"><div class="ew-table-header-caption"><?php echo $preh_seguimiento_list->id_seguimiento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_seguimiento" class="<?php echo $preh_seguimiento_list->id_seguimiento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_seguimiento_list->SortUrl($preh_seguimiento_list->id_seguimiento) ?>', 1);"><div id="elh_preh_seguimiento_id_seguimiento" class="preh_seguimiento_id_seguimiento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_seguimiento_list->id_seguimiento->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_seguimiento_list->id_seguimiento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_seguimiento_list->id_seguimiento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_seguimiento_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_seguimiento_list->SortUrl($preh_seguimiento_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_seguimiento_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_seguimiento_cod_casopreh" class="preh_seguimiento_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_seguimiento_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_seguimiento_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_seguimiento_list->SortUrl($preh_seguimiento_list->cod_casopreh) ?>', 1);"><div id="elh_preh_seguimiento_cod_casopreh" class="preh_seguimiento_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_seguimiento_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_seguimiento_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_seguimiento_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_seguimiento_list->fecha_seguimento->Visible) { // fecha_seguimento ?>
	<?php if ($preh_seguimiento_list->SortUrl($preh_seguimiento_list->fecha_seguimento) == "") { ?>
		<th data-name="fecha_seguimento" class="<?php echo $preh_seguimiento_list->fecha_seguimento->headerCellClass() ?>"><div id="elh_preh_seguimiento_fecha_seguimento" class="preh_seguimiento_fecha_seguimento"><div class="ew-table-header-caption"><?php echo $preh_seguimiento_list->fecha_seguimento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_seguimento" class="<?php echo $preh_seguimiento_list->fecha_seguimento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_seguimiento_list->SortUrl($preh_seguimiento_list->fecha_seguimento) ?>', 1);"><div id="elh_preh_seguimiento_fecha_seguimento" class="preh_seguimiento_fecha_seguimento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_seguimiento_list->fecha_seguimento->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_seguimiento_list->fecha_seguimento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_seguimiento_list->fecha_seguimento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_seguimiento_list->despacho->Visible) { // despacho ?>
	<?php if ($preh_seguimiento_list->SortUrl($preh_seguimiento_list->despacho) == "") { ?>
		<th data-name="despacho" class="<?php echo $preh_seguimiento_list->despacho->headerCellClass() ?>"><div id="elh_preh_seguimiento_despacho" class="preh_seguimiento_despacho"><div class="ew-table-header-caption"><?php echo $preh_seguimiento_list->despacho->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="despacho" class="<?php echo $preh_seguimiento_list->despacho->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_seguimiento_list->SortUrl($preh_seguimiento_list->despacho) ?>', 1);"><div id="elh_preh_seguimiento_despacho" class="preh_seguimiento_despacho">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_seguimiento_list->despacho->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_seguimiento_list->despacho->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_seguimiento_list->despacho->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_seguimiento_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_seguimiento_list->ExportAll && $preh_seguimiento_list->isExport()) {
	$preh_seguimiento_list->StopRecord = $preh_seguimiento_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_seguimiento_list->TotalRecords > $preh_seguimiento_list->StartRecord + $preh_seguimiento_list->DisplayRecords - 1)
		$preh_seguimiento_list->StopRecord = $preh_seguimiento_list->StartRecord + $preh_seguimiento_list->DisplayRecords - 1;
	else
		$preh_seguimiento_list->StopRecord = $preh_seguimiento_list->TotalRecords;
}
$preh_seguimiento_list->RecordCount = $preh_seguimiento_list->StartRecord - 1;
if ($preh_seguimiento_list->Recordset && !$preh_seguimiento_list->Recordset->EOF) {
	$preh_seguimiento_list->Recordset->moveFirst();
	$selectLimit = $preh_seguimiento_list->UseSelectLimit;
	if (!$selectLimit && $preh_seguimiento_list->StartRecord > 1)
		$preh_seguimiento_list->Recordset->move($preh_seguimiento_list->StartRecord - 1);
} elseif (!$preh_seguimiento->AllowAddDeleteRow && $preh_seguimiento_list->StopRecord == 0) {
	$preh_seguimiento_list->StopRecord = $preh_seguimiento->GridAddRowCount;
}

// Initialize aggregate
$preh_seguimiento->RowType = ROWTYPE_AGGREGATEINIT;
$preh_seguimiento->resetAttributes();
$preh_seguimiento_list->renderRow();
while ($preh_seguimiento_list->RecordCount < $preh_seguimiento_list->StopRecord) {
	$preh_seguimiento_list->RecordCount++;
	if ($preh_seguimiento_list->RecordCount >= $preh_seguimiento_list->StartRecord) {
		$preh_seguimiento_list->RowCount++;

		// Set up key count
		$preh_seguimiento_list->KeyCount = $preh_seguimiento_list->RowIndex;

		// Init row class and style
		$preh_seguimiento->resetAttributes();
		$preh_seguimiento->CssClass = "";
		if ($preh_seguimiento_list->isGridAdd()) {
		} else {
			$preh_seguimiento_list->loadRowValues($preh_seguimiento_list->Recordset); // Load row values
		}
		$preh_seguimiento->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_seguimiento->RowAttrs->merge(["data-rowindex" => $preh_seguimiento_list->RowCount, "id" => "r" . $preh_seguimiento_list->RowCount . "_preh_seguimiento", "data-rowtype" => $preh_seguimiento->RowType]);

		// Render row
		$preh_seguimiento_list->renderRow();

		// Render list options
		$preh_seguimiento_list->renderListOptions();
?>
	<tr <?php echo $preh_seguimiento->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_seguimiento_list->ListOptions->render("body", "left", $preh_seguimiento_list->RowCount);
?>
	<?php if ($preh_seguimiento_list->id_seguimiento->Visible) { // id_seguimiento ?>
		<td data-name="id_seguimiento" <?php echo $preh_seguimiento_list->id_seguimiento->cellAttributes() ?>>
<span id="el<?php echo $preh_seguimiento_list->RowCount ?>_preh_seguimiento_id_seguimiento">
<span<?php echo $preh_seguimiento_list->id_seguimiento->viewAttributes() ?>><?php echo $preh_seguimiento_list->id_seguimiento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_seguimiento_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_seguimiento_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_seguimiento_list->RowCount ?>_preh_seguimiento_cod_casopreh">
<span<?php echo $preh_seguimiento_list->cod_casopreh->viewAttributes() ?>><?php echo $preh_seguimiento_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_seguimiento_list->fecha_seguimento->Visible) { // fecha_seguimento ?>
		<td data-name="fecha_seguimento" <?php echo $preh_seguimiento_list->fecha_seguimento->cellAttributes() ?>>
<span id="el<?php echo $preh_seguimiento_list->RowCount ?>_preh_seguimiento_fecha_seguimento">
<span<?php echo $preh_seguimiento_list->fecha_seguimento->viewAttributes() ?>><?php echo $preh_seguimiento_list->fecha_seguimento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_seguimiento_list->despacho->Visible) { // despacho ?>
		<td data-name="despacho" <?php echo $preh_seguimiento_list->despacho->cellAttributes() ?>>
<span id="el<?php echo $preh_seguimiento_list->RowCount ?>_preh_seguimiento_despacho">
<span<?php echo $preh_seguimiento_list->despacho->viewAttributes() ?>><?php echo $preh_seguimiento_list->despacho->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_seguimiento_list->ListOptions->render("body", "right", $preh_seguimiento_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_seguimiento_list->isGridAdd())
		$preh_seguimiento_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_seguimiento->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_seguimiento_list->Recordset)
	$preh_seguimiento_list->Recordset->Close();
?>
<?php if (!$preh_seguimiento_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_seguimiento_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_seguimiento_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_seguimiento_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_seguimiento_list->TotalRecords == 0 && !$preh_seguimiento->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_seguimiento_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_seguimiento_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_seguimiento_list->isExport()) { ?>
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
$preh_seguimiento_list->terminate();
?>