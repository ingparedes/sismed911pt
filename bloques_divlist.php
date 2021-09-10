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
$bloques_div_list = new bloques_div_list();

// Run the page
$bloques_div_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bloques_div_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bloques_div_list->isExport()) { ?>
<script>
var fbloques_divlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbloques_divlist = currentForm = new ew.Form("fbloques_divlist", "list");
	fbloques_divlist.formKeyCountName = '<?php echo $bloques_div_list->FormKeyCountName ?>';
	loadjs.done("fbloques_divlist");
});
var fbloques_divlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbloques_divlistsrch = currentSearchForm = new ew.Form("fbloques_divlistsrch");

	// Dynamic selection lists
	// Filters

	fbloques_divlistsrch.filterList = <?php echo $bloques_div_list->getFilterList() ?>;
	loadjs.done("fbloques_divlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bloques_div_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bloques_div_list->TotalRecords > 0 && $bloques_div_list->ExportOptions->visible()) { ?>
<?php $bloques_div_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bloques_div_list->ImportOptions->visible()) { ?>
<?php $bloques_div_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bloques_div_list->SearchOptions->visible()) { ?>
<?php $bloques_div_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bloques_div_list->FilterOptions->visible()) { ?>
<?php $bloques_div_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bloques_div_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bloques_div_list->isExport() && !$bloques_div->CurrentAction) { ?>
<form name="fbloques_divlistsrch" id="fbloques_divlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbloques_divlistsrch-search-panel" class="<?php echo $bloques_div_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bloques_div">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bloques_div_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bloques_div_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bloques_div_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bloques_div_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bloques_div_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bloques_div_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bloques_div_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bloques_div_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bloques_div_list->showPageHeader(); ?>
<?php
$bloques_div_list->showMessage();
?>
<?php if ($bloques_div_list->TotalRecords > 0 || $bloques_div->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bloques_div_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bloques_div">
<?php if (!$bloques_div_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bloques_div_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bloques_div_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bloques_div_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbloques_divlist" id="fbloques_divlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bloques_div">
<div id="gmp_bloques_div" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bloques_div_list->TotalRecords > 0 || $bloques_div_list->isGridEdit()) { ?>
<table id="tbl_bloques_divlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bloques_div->RowType = ROWTYPE_HEADER;

// Render list options
$bloques_div_list->renderListOptions();

// Render list options (header, left)
$bloques_div_list->ListOptions->render("header", "left");
?>
<?php if ($bloques_div_list->bloque->Visible) { // bloque ?>
	<?php if ($bloques_div_list->SortUrl($bloques_div_list->bloque) == "") { ?>
		<th data-name="bloque" class="<?php echo $bloques_div_list->bloque->headerCellClass() ?>"><div id="elh_bloques_div_bloque" class="bloques_div_bloque"><div class="ew-table-header-caption"><?php echo $bloques_div_list->bloque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloque" class="<?php echo $bloques_div_list->bloque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bloques_div_list->SortUrl($bloques_div_list->bloque) ?>', 1);"><div id="elh_bloques_div_bloque" class="bloques_div_bloque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bloques_div_list->bloque->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bloques_div_list->bloque->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bloques_div_list->bloque->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bloques_div_list->fecha_creacion->Visible) { // fecha_creacion ?>
	<?php if ($bloques_div_list->SortUrl($bloques_div_list->fecha_creacion) == "") { ?>
		<th data-name="fecha_creacion" class="<?php echo $bloques_div_list->fecha_creacion->headerCellClass() ?>"><div id="elh_bloques_div_fecha_creacion" class="bloques_div_fecha_creacion"><div class="ew-table-header-caption"><?php echo $bloques_div_list->fecha_creacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_creacion" class="<?php echo $bloques_div_list->fecha_creacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bloques_div_list->SortUrl($bloques_div_list->fecha_creacion) ?>', 1);"><div id="elh_bloques_div_fecha_creacion" class="bloques_div_fecha_creacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bloques_div_list->fecha_creacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($bloques_div_list->fecha_creacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bloques_div_list->fecha_creacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bloques_div_list->id->Visible) { // id ?>
	<?php if ($bloques_div_list->SortUrl($bloques_div_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $bloques_div_list->id->headerCellClass() ?>"><div id="elh_bloques_div_id" class="bloques_div_id"><div class="ew-table-header-caption"><?php echo $bloques_div_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $bloques_div_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bloques_div_list->SortUrl($bloques_div_list->id) ?>', 1);"><div id="elh_bloques_div_id" class="bloques_div_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bloques_div_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($bloques_div_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bloques_div_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bloques_div_list->activo->Visible) { // activo ?>
	<?php if ($bloques_div_list->SortUrl($bloques_div_list->activo) == "") { ?>
		<th data-name="activo" class="<?php echo $bloques_div_list->activo->headerCellClass() ?>"><div id="elh_bloques_div_activo" class="bloques_div_activo"><div class="ew-table-header-caption"><?php echo $bloques_div_list->activo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="activo" class="<?php echo $bloques_div_list->activo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bloques_div_list->SortUrl($bloques_div_list->activo) ?>', 1);"><div id="elh_bloques_div_activo" class="bloques_div_activo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bloques_div_list->activo->caption() ?></span><span class="ew-table-header-sort"><?php if ($bloques_div_list->activo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bloques_div_list->activo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bloques_div_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bloques_div_list->ExportAll && $bloques_div_list->isExport()) {
	$bloques_div_list->StopRecord = $bloques_div_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bloques_div_list->TotalRecords > $bloques_div_list->StartRecord + $bloques_div_list->DisplayRecords - 1)
		$bloques_div_list->StopRecord = $bloques_div_list->StartRecord + $bloques_div_list->DisplayRecords - 1;
	else
		$bloques_div_list->StopRecord = $bloques_div_list->TotalRecords;
}
$bloques_div_list->RecordCount = $bloques_div_list->StartRecord - 1;
if ($bloques_div_list->Recordset && !$bloques_div_list->Recordset->EOF) {
	$bloques_div_list->Recordset->moveFirst();
	$selectLimit = $bloques_div_list->UseSelectLimit;
	if (!$selectLimit && $bloques_div_list->StartRecord > 1)
		$bloques_div_list->Recordset->move($bloques_div_list->StartRecord - 1);
} elseif (!$bloques_div->AllowAddDeleteRow && $bloques_div_list->StopRecord == 0) {
	$bloques_div_list->StopRecord = $bloques_div->GridAddRowCount;
}

// Initialize aggregate
$bloques_div->RowType = ROWTYPE_AGGREGATEINIT;
$bloques_div->resetAttributes();
$bloques_div_list->renderRow();
while ($bloques_div_list->RecordCount < $bloques_div_list->StopRecord) {
	$bloques_div_list->RecordCount++;
	if ($bloques_div_list->RecordCount >= $bloques_div_list->StartRecord) {
		$bloques_div_list->RowCount++;

		// Set up key count
		$bloques_div_list->KeyCount = $bloques_div_list->RowIndex;

		// Init row class and style
		$bloques_div->resetAttributes();
		$bloques_div->CssClass = "";
		if ($bloques_div_list->isGridAdd()) {
		} else {
			$bloques_div_list->loadRowValues($bloques_div_list->Recordset); // Load row values
		}
		$bloques_div->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bloques_div->RowAttrs->merge(["data-rowindex" => $bloques_div_list->RowCount, "id" => "r" . $bloques_div_list->RowCount . "_bloques_div", "data-rowtype" => $bloques_div->RowType]);

		// Render row
		$bloques_div_list->renderRow();

		// Render list options
		$bloques_div_list->renderListOptions();
?>
	<tr <?php echo $bloques_div->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bloques_div_list->ListOptions->render("body", "left", $bloques_div_list->RowCount);
?>
	<?php if ($bloques_div_list->bloque->Visible) { // bloque ?>
		<td data-name="bloque" <?php echo $bloques_div_list->bloque->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_list->RowCount ?>_bloques_div_bloque">
<span<?php echo $bloques_div_list->bloque->viewAttributes() ?>><?php echo $bloques_div_list->bloque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bloques_div_list->fecha_creacion->Visible) { // fecha_creacion ?>
		<td data-name="fecha_creacion" <?php echo $bloques_div_list->fecha_creacion->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_list->RowCount ?>_bloques_div_fecha_creacion">
<span<?php echo $bloques_div_list->fecha_creacion->viewAttributes() ?>><?php echo $bloques_div_list->fecha_creacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bloques_div_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $bloques_div_list->id->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_list->RowCount ?>_bloques_div_id">
<span<?php echo $bloques_div_list->id->viewAttributes() ?>><?php echo $bloques_div_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bloques_div_list->activo->Visible) { // activo ?>
		<td data-name="activo" <?php echo $bloques_div_list->activo->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_list->RowCount ?>_bloques_div_activo">
<span<?php echo $bloques_div_list->activo->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_activo" class="custom-control-input" value="<?php echo $bloques_div_list->activo->getViewValue() ?>" disabled<?php if (ConvertToBool($bloques_div_list->activo->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_activo"></label></div></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bloques_div_list->ListOptions->render("body", "right", $bloques_div_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bloques_div_list->isGridAdd())
		$bloques_div_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bloques_div->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bloques_div_list->Recordset)
	$bloques_div_list->Recordset->Close();
?>
<?php if (!$bloques_div_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$bloques_div_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bloques_div_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bloques_div_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bloques_div_list->TotalRecords == 0 && !$bloques_div->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bloques_div_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bloques_div_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bloques_div_list->isExport()) { ?>
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
$bloques_div_list->terminate();
?>