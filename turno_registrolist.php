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
$turno_registro_list = new turno_registro_list();

// Run the page
$turno_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$turno_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$turno_registro_list->isExport()) { ?>
<script>
var fturno_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fturno_registrolist = currentForm = new ew.Form("fturno_registrolist", "list");
	fturno_registrolist.formKeyCountName = '<?php echo $turno_registro_list->FormKeyCountName ?>';
	loadjs.done("fturno_registrolist");
});
var fturno_registrolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fturno_registrolistsrch = currentSearchForm = new ew.Form("fturno_registrolistsrch");

	// Dynamic selection lists
	// Filters

	fturno_registrolistsrch.filterList = <?php echo $turno_registro_list->getFilterList() ?>;
	loadjs.done("fturno_registrolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$turno_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($turno_registro_list->TotalRecords > 0 && $turno_registro_list->ExportOptions->visible()) { ?>
<?php $turno_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($turno_registro_list->ImportOptions->visible()) { ?>
<?php $turno_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($turno_registro_list->SearchOptions->visible()) { ?>
<?php $turno_registro_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($turno_registro_list->FilterOptions->visible()) { ?>
<?php $turno_registro_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$turno_registro_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$turno_registro_list->isExport() && !$turno_registro->CurrentAction) { ?>
<form name="fturno_registrolistsrch" id="fturno_registrolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fturno_registrolistsrch-search-panel" class="<?php echo $turno_registro_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="turno_registro">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $turno_registro_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($turno_registro_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($turno_registro_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $turno_registro_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($turno_registro_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($turno_registro_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($turno_registro_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($turno_registro_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $turno_registro_list->showPageHeader(); ?>
<?php
$turno_registro_list->showMessage();
?>
<?php if ($turno_registro_list->TotalRecords > 0 || $turno_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($turno_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> turno_registro">
<?php if (!$turno_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$turno_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $turno_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $turno_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fturno_registrolist" id="fturno_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="turno_registro">
<div id="gmp_turno_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($turno_registro_list->TotalRecords > 0 || $turno_registro_list->isGridEdit()) { ?>
<table id="tbl_turno_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$turno_registro->RowType = ROWTYPE_HEADER;

// Render list options
$turno_registro_list->renderListOptions();

// Render list options (header, left)
$turno_registro_list->ListOptions->render("header", "left");
?>
<?php if ($turno_registro_list->id->Visible) { // id ?>
	<?php if ($turno_registro_list->SortUrl($turno_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $turno_registro_list->id->headerCellClass() ?>"><div id="elh_turno_registro_id" class="turno_registro_id"><div class="ew-table-header-caption"><?php echo $turno_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $turno_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $turno_registro_list->SortUrl($turno_registro_list->id) ?>', 1);"><div id="elh_turno_registro_id" class="turno_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $turno_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($turno_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($turno_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($turno_registro_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<?php if ($turno_registro_list->SortUrl($turno_registro_list->cod_ambulancias) == "") { ?>
		<th data-name="cod_ambulancias" class="<?php echo $turno_registro_list->cod_ambulancias->headerCellClass() ?>"><div id="elh_turno_registro_cod_ambulancias" class="turno_registro_cod_ambulancias"><div class="ew-table-header-caption"><?php echo $turno_registro_list->cod_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancias" class="<?php echo $turno_registro_list->cod_ambulancias->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $turno_registro_list->SortUrl($turno_registro_list->cod_ambulancias) ?>', 1);"><div id="elh_turno_registro_cod_ambulancias" class="turno_registro_cod_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $turno_registro_list->cod_ambulancias->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($turno_registro_list->cod_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($turno_registro_list->cod_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($turno_registro_list->km_actual->Visible) { // km_actual ?>
	<?php if ($turno_registro_list->SortUrl($turno_registro_list->km_actual) == "") { ?>
		<th data-name="km_actual" class="<?php echo $turno_registro_list->km_actual->headerCellClass() ?>"><div id="elh_turno_registro_km_actual" class="turno_registro_km_actual"><div class="ew-table-header-caption"><?php echo $turno_registro_list->km_actual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="km_actual" class="<?php echo $turno_registro_list->km_actual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $turno_registro_list->SortUrl($turno_registro_list->km_actual) ?>', 1);"><div id="elh_turno_registro_km_actual" class="turno_registro_km_actual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $turno_registro_list->km_actual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($turno_registro_list->km_actual->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($turno_registro_list->km_actual->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($turno_registro_list->combustible_actual->Visible) { // combustible_actual ?>
	<?php if ($turno_registro_list->SortUrl($turno_registro_list->combustible_actual) == "") { ?>
		<th data-name="combustible_actual" class="<?php echo $turno_registro_list->combustible_actual->headerCellClass() ?>"><div id="elh_turno_registro_combustible_actual" class="turno_registro_combustible_actual"><div class="ew-table-header-caption"><?php echo $turno_registro_list->combustible_actual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="combustible_actual" class="<?php echo $turno_registro_list->combustible_actual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $turno_registro_list->SortUrl($turno_registro_list->combustible_actual) ?>', 1);"><div id="elh_turno_registro_combustible_actual" class="turno_registro_combustible_actual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $turno_registro_list->combustible_actual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($turno_registro_list->combustible_actual->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($turno_registro_list->combustible_actual->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($turno_registro_list->cantidadtiket->Visible) { // cantidadtiket ?>
	<?php if ($turno_registro_list->SortUrl($turno_registro_list->cantidadtiket) == "") { ?>
		<th data-name="cantidadtiket" class="<?php echo $turno_registro_list->cantidadtiket->headerCellClass() ?>"><div id="elh_turno_registro_cantidadtiket" class="turno_registro_cantidadtiket"><div class="ew-table-header-caption"><?php echo $turno_registro_list->cantidadtiket->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cantidadtiket" class="<?php echo $turno_registro_list->cantidadtiket->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $turno_registro_list->SortUrl($turno_registro_list->cantidadtiket) ?>', 1);"><div id="elh_turno_registro_cantidadtiket" class="turno_registro_cantidadtiket">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $turno_registro_list->cantidadtiket->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($turno_registro_list->cantidadtiket->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($turno_registro_list->cantidadtiket->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($turno_registro_list->usuario->Visible) { // usuario ?>
	<?php if ($turno_registro_list->SortUrl($turno_registro_list->usuario) == "") { ?>
		<th data-name="usuario" class="<?php echo $turno_registro_list->usuario->headerCellClass() ?>"><div id="elh_turno_registro_usuario" class="turno_registro_usuario"><div class="ew-table-header-caption"><?php echo $turno_registro_list->usuario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario" class="<?php echo $turno_registro_list->usuario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $turno_registro_list->SortUrl($turno_registro_list->usuario) ?>', 1);"><div id="elh_turno_registro_usuario" class="turno_registro_usuario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $turno_registro_list->usuario->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($turno_registro_list->usuario->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($turno_registro_list->usuario->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$turno_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($turno_registro_list->ExportAll && $turno_registro_list->isExport()) {
	$turno_registro_list->StopRecord = $turno_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($turno_registro_list->TotalRecords > $turno_registro_list->StartRecord + $turno_registro_list->DisplayRecords - 1)
		$turno_registro_list->StopRecord = $turno_registro_list->StartRecord + $turno_registro_list->DisplayRecords - 1;
	else
		$turno_registro_list->StopRecord = $turno_registro_list->TotalRecords;
}
$turno_registro_list->RecordCount = $turno_registro_list->StartRecord - 1;
if ($turno_registro_list->Recordset && !$turno_registro_list->Recordset->EOF) {
	$turno_registro_list->Recordset->moveFirst();
	$selectLimit = $turno_registro_list->UseSelectLimit;
	if (!$selectLimit && $turno_registro_list->StartRecord > 1)
		$turno_registro_list->Recordset->move($turno_registro_list->StartRecord - 1);
} elseif (!$turno_registro->AllowAddDeleteRow && $turno_registro_list->StopRecord == 0) {
	$turno_registro_list->StopRecord = $turno_registro->GridAddRowCount;
}

// Initialize aggregate
$turno_registro->RowType = ROWTYPE_AGGREGATEINIT;
$turno_registro->resetAttributes();
$turno_registro_list->renderRow();
while ($turno_registro_list->RecordCount < $turno_registro_list->StopRecord) {
	$turno_registro_list->RecordCount++;
	if ($turno_registro_list->RecordCount >= $turno_registro_list->StartRecord) {
		$turno_registro_list->RowCount++;

		// Set up key count
		$turno_registro_list->KeyCount = $turno_registro_list->RowIndex;

		// Init row class and style
		$turno_registro->resetAttributes();
		$turno_registro->CssClass = "";
		if ($turno_registro_list->isGridAdd()) {
		} else {
			$turno_registro_list->loadRowValues($turno_registro_list->Recordset); // Load row values
		}
		$turno_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$turno_registro->RowAttrs->merge(["data-rowindex" => $turno_registro_list->RowCount, "id" => "r" . $turno_registro_list->RowCount . "_turno_registro", "data-rowtype" => $turno_registro->RowType]);

		// Render row
		$turno_registro_list->renderRow();

		// Render list options
		$turno_registro_list->renderListOptions();
?>
	<tr <?php echo $turno_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$turno_registro_list->ListOptions->render("body", "left", $turno_registro_list->RowCount);
?>
	<?php if ($turno_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $turno_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_list->RowCount ?>_turno_registro_id">
<span<?php echo $turno_registro_list->id->viewAttributes() ?>><?php echo $turno_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($turno_registro_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td data-name="cod_ambulancias" <?php echo $turno_registro_list->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_list->RowCount ?>_turno_registro_cod_ambulancias">
<span<?php echo $turno_registro_list->cod_ambulancias->viewAttributes() ?>><?php echo $turno_registro_list->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($turno_registro_list->km_actual->Visible) { // km_actual ?>
		<td data-name="km_actual" <?php echo $turno_registro_list->km_actual->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_list->RowCount ?>_turno_registro_km_actual">
<span<?php echo $turno_registro_list->km_actual->viewAttributes() ?>><?php echo $turno_registro_list->km_actual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($turno_registro_list->combustible_actual->Visible) { // combustible_actual ?>
		<td data-name="combustible_actual" <?php echo $turno_registro_list->combustible_actual->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_list->RowCount ?>_turno_registro_combustible_actual">
<span<?php echo $turno_registro_list->combustible_actual->viewAttributes() ?>><?php echo $turno_registro_list->combustible_actual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($turno_registro_list->cantidadtiket->Visible) { // cantidadtiket ?>
		<td data-name="cantidadtiket" <?php echo $turno_registro_list->cantidadtiket->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_list->RowCount ?>_turno_registro_cantidadtiket">
<span<?php echo $turno_registro_list->cantidadtiket->viewAttributes() ?>><?php echo $turno_registro_list->cantidadtiket->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($turno_registro_list->usuario->Visible) { // usuario ?>
		<td data-name="usuario" <?php echo $turno_registro_list->usuario->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_list->RowCount ?>_turno_registro_usuario">
<span<?php echo $turno_registro_list->usuario->viewAttributes() ?>><?php echo $turno_registro_list->usuario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$turno_registro_list->ListOptions->render("body", "right", $turno_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$turno_registro_list->isGridAdd())
		$turno_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$turno_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($turno_registro_list->Recordset)
	$turno_registro_list->Recordset->Close();
?>
<?php if (!$turno_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$turno_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $turno_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $turno_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($turno_registro_list->TotalRecords == 0 && !$turno_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $turno_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$turno_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$turno_registro_list->isExport()) { ?>
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
$turno_registro_list->terminate();
?>