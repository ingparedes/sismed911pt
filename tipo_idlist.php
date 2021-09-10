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
$tipo_id_list = new tipo_id_list();

// Run the page
$tipo_id_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_id_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_id_list->isExport()) { ?>
<script>
var ftipo_idlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftipo_idlist = currentForm = new ew.Form("ftipo_idlist", "list");
	ftipo_idlist.formKeyCountName = '<?php echo $tipo_id_list->FormKeyCountName ?>';
	loadjs.done("ftipo_idlist");
});
var ftipo_idlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftipo_idlistsrch = currentSearchForm = new ew.Form("ftipo_idlistsrch");

	// Dynamic selection lists
	// Filters

	ftipo_idlistsrch.filterList = <?php echo $tipo_id_list->getFilterList() ?>;
	loadjs.done("ftipo_idlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_id_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tipo_id_list->TotalRecords > 0 && $tipo_id_list->ExportOptions->visible()) { ?>
<?php $tipo_id_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_id_list->ImportOptions->visible()) { ?>
<?php $tipo_id_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_id_list->SearchOptions->visible()) { ?>
<?php $tipo_id_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tipo_id_list->FilterOptions->visible()) { ?>
<?php $tipo_id_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tipo_id_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tipo_id_list->isExport() && !$tipo_id->CurrentAction) { ?>
<form name="ftipo_idlistsrch" id="ftipo_idlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftipo_idlistsrch-search-panel" class="<?php echo $tipo_id_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tipo_id">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $tipo_id_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tipo_id_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tipo_id_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tipo_id_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tipo_id_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tipo_id_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tipo_id_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tipo_id_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tipo_id_list->showPageHeader(); ?>
<?php
$tipo_id_list->showMessage();
?>
<?php if ($tipo_id_list->TotalRecords > 0 || $tipo_id->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tipo_id_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tipo_id">
<?php if (!$tipo_id_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tipo_id_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_id_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_id_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftipo_idlist" id="ftipo_idlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_id">
<div id="gmp_tipo_id" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tipo_id_list->TotalRecords > 0 || $tipo_id_list->isGridEdit()) { ?>
<table id="tbl_tipo_idlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tipo_id->RowType = ROWTYPE_HEADER;

// Render list options
$tipo_id_list->renderListOptions();

// Render list options (header, left)
$tipo_id_list->ListOptions->render("header", "left");
?>
<?php if ($tipo_id_list->id_tipo->Visible) { // id_tipo ?>
	<?php if ($tipo_id_list->SortUrl($tipo_id_list->id_tipo) == "") { ?>
		<th data-name="id_tipo" class="<?php echo $tipo_id_list->id_tipo->headerCellClass() ?>"><div id="elh_tipo_id_id_tipo" class="tipo_id_id_tipo"><div class="ew-table-header-caption"><?php echo $tipo_id_list->id_tipo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_tipo" class="<?php echo $tipo_id_list->id_tipo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_id_list->SortUrl($tipo_id_list->id_tipo) ?>', 1);"><div id="elh_tipo_id_id_tipo" class="tipo_id_id_tipo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_id_list->id_tipo->caption() ?></span><span class="ew-table-header-sort"><?php if ($tipo_id_list->id_tipo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_id_list->id_tipo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_id_list->descripcion->Visible) { // descripcion ?>
	<?php if ($tipo_id_list->SortUrl($tipo_id_list->descripcion) == "") { ?>
		<th data-name="descripcion" class="<?php echo $tipo_id_list->descripcion->headerCellClass() ?>"><div id="elh_tipo_id_descripcion" class="tipo_id_descripcion"><div class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion" class="<?php echo $tipo_id_list->descripcion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_id_list->SortUrl($tipo_id_list->descripcion) ?>', 1);"><div id="elh_tipo_id_descripcion" class="tipo_id_descripcion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_id_list->descripcion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_id_list->descripcion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_id_list->descripcion_en->Visible) { // descripcion_en ?>
	<?php if ($tipo_id_list->SortUrl($tipo_id_list->descripcion_en) == "") { ?>
		<th data-name="descripcion_en" class="<?php echo $tipo_id_list->descripcion_en->headerCellClass() ?>"><div id="elh_tipo_id_descripcion_en" class="tipo_id_descripcion_en"><div class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion_en" class="<?php echo $tipo_id_list->descripcion_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_id_list->SortUrl($tipo_id_list->descripcion_en) ?>', 1);"><div id="elh_tipo_id_descripcion_en" class="tipo_id_descripcion_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_id_list->descripcion_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_id_list->descripcion_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_id_list->descripcion_pr->Visible) { // descripcion_pr ?>
	<?php if ($tipo_id_list->SortUrl($tipo_id_list->descripcion_pr) == "") { ?>
		<th data-name="descripcion_pr" class="<?php echo $tipo_id_list->descripcion_pr->headerCellClass() ?>"><div id="elh_tipo_id_descripcion_pr" class="tipo_id_descripcion_pr"><div class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion_pr" class="<?php echo $tipo_id_list->descripcion_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_id_list->SortUrl($tipo_id_list->descripcion_pr) ?>', 1);"><div id="elh_tipo_id_descripcion_pr" class="tipo_id_descripcion_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_id_list->descripcion_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_id_list->descripcion_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tipo_id_list->descripcion_fr->Visible) { // descripcion_fr ?>
	<?php if ($tipo_id_list->SortUrl($tipo_id_list->descripcion_fr) == "") { ?>
		<th data-name="descripcion_fr" class="<?php echo $tipo_id_list->descripcion_fr->headerCellClass() ?>"><div id="elh_tipo_id_descripcion_fr" class="tipo_id_descripcion_fr"><div class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descripcion_fr" class="<?php echo $tipo_id_list->descripcion_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tipo_id_list->SortUrl($tipo_id_list->descripcion_fr) ?>', 1);"><div id="elh_tipo_id_descripcion_fr" class="tipo_id_descripcion_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tipo_id_list->descripcion_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tipo_id_list->descripcion_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tipo_id_list->descripcion_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tipo_id_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tipo_id_list->ExportAll && $tipo_id_list->isExport()) {
	$tipo_id_list->StopRecord = $tipo_id_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tipo_id_list->TotalRecords > $tipo_id_list->StartRecord + $tipo_id_list->DisplayRecords - 1)
		$tipo_id_list->StopRecord = $tipo_id_list->StartRecord + $tipo_id_list->DisplayRecords - 1;
	else
		$tipo_id_list->StopRecord = $tipo_id_list->TotalRecords;
}
$tipo_id_list->RecordCount = $tipo_id_list->StartRecord - 1;
if ($tipo_id_list->Recordset && !$tipo_id_list->Recordset->EOF) {
	$tipo_id_list->Recordset->moveFirst();
	$selectLimit = $tipo_id_list->UseSelectLimit;
	if (!$selectLimit && $tipo_id_list->StartRecord > 1)
		$tipo_id_list->Recordset->move($tipo_id_list->StartRecord - 1);
} elseif (!$tipo_id->AllowAddDeleteRow && $tipo_id_list->StopRecord == 0) {
	$tipo_id_list->StopRecord = $tipo_id->GridAddRowCount;
}

// Initialize aggregate
$tipo_id->RowType = ROWTYPE_AGGREGATEINIT;
$tipo_id->resetAttributes();
$tipo_id_list->renderRow();
while ($tipo_id_list->RecordCount < $tipo_id_list->StopRecord) {
	$tipo_id_list->RecordCount++;
	if ($tipo_id_list->RecordCount >= $tipo_id_list->StartRecord) {
		$tipo_id_list->RowCount++;

		// Set up key count
		$tipo_id_list->KeyCount = $tipo_id_list->RowIndex;

		// Init row class and style
		$tipo_id->resetAttributes();
		$tipo_id->CssClass = "";
		if ($tipo_id_list->isGridAdd()) {
		} else {
			$tipo_id_list->loadRowValues($tipo_id_list->Recordset); // Load row values
		}
		$tipo_id->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tipo_id->RowAttrs->merge(["data-rowindex" => $tipo_id_list->RowCount, "id" => "r" . $tipo_id_list->RowCount . "_tipo_id", "data-rowtype" => $tipo_id->RowType]);

		// Render row
		$tipo_id_list->renderRow();

		// Render list options
		$tipo_id_list->renderListOptions();
?>
	<tr <?php echo $tipo_id->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tipo_id_list->ListOptions->render("body", "left", $tipo_id_list->RowCount);
?>
	<?php if ($tipo_id_list->id_tipo->Visible) { // id_tipo ?>
		<td data-name="id_tipo" <?php echo $tipo_id_list->id_tipo->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_list->RowCount ?>_tipo_id_id_tipo">
<span<?php echo $tipo_id_list->id_tipo->viewAttributes() ?>><?php echo $tipo_id_list->id_tipo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_id_list->descripcion->Visible) { // descripcion ?>
		<td data-name="descripcion" <?php echo $tipo_id_list->descripcion->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_list->RowCount ?>_tipo_id_descripcion">
<span<?php echo $tipo_id_list->descripcion->viewAttributes() ?>><?php echo $tipo_id_list->descripcion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_id_list->descripcion_en->Visible) { // descripcion_en ?>
		<td data-name="descripcion_en" <?php echo $tipo_id_list->descripcion_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_list->RowCount ?>_tipo_id_descripcion_en">
<span<?php echo $tipo_id_list->descripcion_en->viewAttributes() ?>><?php echo $tipo_id_list->descripcion_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_id_list->descripcion_pr->Visible) { // descripcion_pr ?>
		<td data-name="descripcion_pr" <?php echo $tipo_id_list->descripcion_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_list->RowCount ?>_tipo_id_descripcion_pr">
<span<?php echo $tipo_id_list->descripcion_pr->viewAttributes() ?>><?php echo $tipo_id_list->descripcion_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tipo_id_list->descripcion_fr->Visible) { // descripcion_fr ?>
		<td data-name="descripcion_fr" <?php echo $tipo_id_list->descripcion_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_list->RowCount ?>_tipo_id_descripcion_fr">
<span<?php echo $tipo_id_list->descripcion_fr->viewAttributes() ?>><?php echo $tipo_id_list->descripcion_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tipo_id_list->ListOptions->render("body", "right", $tipo_id_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tipo_id_list->isGridAdd())
		$tipo_id_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tipo_id->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tipo_id_list->Recordset)
	$tipo_id_list->Recordset->Close();
?>
<?php if (!$tipo_id_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tipo_id_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tipo_id_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tipo_id_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tipo_id_list->TotalRecords == 0 && !$tipo_id->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tipo_id_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tipo_id_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_id_list->isExport()) { ?>
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
$tipo_id_list->terminate();
?>