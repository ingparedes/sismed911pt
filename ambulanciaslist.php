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
$ambulancias_list = new ambulancias_list();

// Run the page
$ambulancias_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancias_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ambulancias_list->isExport()) { ?>
<script>
var fambulanciaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fambulanciaslist = currentForm = new ew.Form("fambulanciaslist", "list");
	fambulanciaslist.formKeyCountName = '<?php echo $ambulancias_list->FormKeyCountName ?>';
	loadjs.done("fambulanciaslist");
});
var fambulanciaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fambulanciaslistsrch = currentSearchForm = new ew.Form("fambulanciaslistsrch");

	// Dynamic selection lists
	// Filters

	fambulanciaslistsrch.filterList = <?php echo $ambulancias_list->getFilterList() ?>;
	loadjs.done("fambulanciaslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ambulancias_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ambulancias_list->TotalRecords > 0 && $ambulancias_list->ExportOptions->visible()) { ?>
<?php $ambulancias_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ambulancias_list->ImportOptions->visible()) { ?>
<?php $ambulancias_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ambulancias_list->SearchOptions->visible()) { ?>
<?php $ambulancias_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ambulancias_list->FilterOptions->visible()) { ?>
<?php $ambulancias_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ambulancias_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ambulancias_list->isExport() && !$ambulancias->CurrentAction) { ?>
<form name="fambulanciaslistsrch" id="fambulanciaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fambulanciaslistsrch-search-panel" class="<?php echo $ambulancias_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ambulancias">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ambulancias_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ambulancias_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ambulancias_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ambulancias_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ambulancias_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ambulancias_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ambulancias_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ambulancias_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ambulancias_list->showPageHeader(); ?>
<?php
$ambulancias_list->showMessage();
?>
<?php if ($ambulancias_list->TotalRecords > 0 || $ambulancias->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ambulancias_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ambulancias">
<?php if (!$ambulancias_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ambulancias_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ambulancias_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ambulancias_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fambulanciaslist" id="fambulanciaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancias">
<div id="gmp_ambulancias" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ambulancias_list->TotalRecords > 0 || $ambulancias_list->isGridEdit()) { ?>
<table id="tbl_ambulanciaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ambulancias->RowType = ROWTYPE_HEADER;

// Render list options
$ambulancias_list->renderListOptions();

// Render list options (header, left)
$ambulancias_list->ListOptions->render("header", "left");
?>
<?php if ($ambulancias_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->cod_ambulancias) == "") { ?>
		<th data-name="cod_ambulancias" class="<?php echo $ambulancias_list->cod_ambulancias->headerCellClass() ?>"><div id="elh_ambulancias_cod_ambulancias" class="ambulancias_cod_ambulancias"><div class="ew-table-header-caption"><?php echo $ambulancias_list->cod_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancias" class="<?php echo $ambulancias_list->cod_ambulancias->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->cod_ambulancias) ?>', 1);"><div id="elh_ambulancias_cod_ambulancias" class="ambulancias_cod_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->cod_ambulancias->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->cod_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->cod_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->placas->Visible) { // placas ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->placas) == "") { ?>
		<th data-name="placas" class="<?php echo $ambulancias_list->placas->headerCellClass() ?>"><div id="elh_ambulancias_placas" class="ambulancias_placas"><div class="ew-table-header-caption"><?php echo $ambulancias_list->placas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="placas" class="<?php echo $ambulancias_list->placas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->placas) ?>', 1);"><div id="elh_ambulancias_placas" class="ambulancias_placas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->placas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->placas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->placas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->chasis->Visible) { // chasis ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->chasis) == "") { ?>
		<th data-name="chasis" class="<?php echo $ambulancias_list->chasis->headerCellClass() ?>"><div id="elh_ambulancias_chasis" class="ambulancias_chasis"><div class="ew-table-header-caption"><?php echo $ambulancias_list->chasis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chasis" class="<?php echo $ambulancias_list->chasis->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->chasis) ?>', 1);"><div id="elh_ambulancias_chasis" class="ambulancias_chasis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->chasis->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->chasis->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->chasis->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->marca->Visible) { // marca ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->marca) == "") { ?>
		<th data-name="marca" class="<?php echo $ambulancias_list->marca->headerCellClass() ?>"><div id="elh_ambulancias_marca" class="ambulancias_marca"><div class="ew-table-header-caption"><?php echo $ambulancias_list->marca->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="marca" class="<?php echo $ambulancias_list->marca->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->marca) ?>', 1);"><div id="elh_ambulancias_marca" class="ambulancias_marca">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->marca->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->marca->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->marca->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->modelo->Visible) { // modelo ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->modelo) == "") { ?>
		<th data-name="modelo" class="<?php echo $ambulancias_list->modelo->headerCellClass() ?>"><div id="elh_ambulancias_modelo" class="ambulancias_modelo"><div class="ew-table-header-caption"><?php echo $ambulancias_list->modelo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modelo" class="<?php echo $ambulancias_list->modelo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->modelo) ?>', 1);"><div id="elh_ambulancias_modelo" class="ambulancias_modelo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->modelo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->modelo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->modelo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->tipo_translado->Visible) { // tipo_translado ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->tipo_translado) == "") { ?>
		<th data-name="tipo_translado" class="<?php echo $ambulancias_list->tipo_translado->headerCellClass() ?>"><div id="elh_ambulancias_tipo_translado" class="ambulancias_tipo_translado"><div class="ew-table-header-caption"><?php echo $ambulancias_list->tipo_translado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_translado" class="<?php echo $ambulancias_list->tipo_translado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->tipo_translado) ?>', 1);"><div id="elh_ambulancias_tipo_translado" class="ambulancias_tipo_translado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->tipo_translado->caption() ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->tipo_translado->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->tipo_translado->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->estado->Visible) { // estado ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->estado) == "") { ?>
		<th data-name="estado" class="<?php echo $ambulancias_list->estado->headerCellClass() ?>"><div id="elh_ambulancias_estado" class="ambulancias_estado"><div class="ew-table-header-caption"><?php echo $ambulancias_list->estado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado" class="<?php echo $ambulancias_list->estado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->estado) ?>', 1);"><div id="elh_ambulancias_estado" class="ambulancias_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->estado->caption() ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->estado->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->estado->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->ubicacion->Visible) { // ubicacion ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->ubicacion) == "") { ?>
		<th data-name="ubicacion" class="<?php echo $ambulancias_list->ubicacion->headerCellClass() ?>"><div id="elh_ambulancias_ubicacion" class="ambulancias_ubicacion"><div class="ew-table-header-caption"><?php echo $ambulancias_list->ubicacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ubicacion" class="<?php echo $ambulancias_list->ubicacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->ubicacion) ?>', 1);"><div id="elh_ambulancias_ubicacion" class="ambulancias_ubicacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->ubicacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->ubicacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->ubicacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ambulancias_list->especial->Visible) { // especial ?>
	<?php if ($ambulancias_list->SortUrl($ambulancias_list->especial) == "") { ?>
		<th data-name="especial" class="<?php echo $ambulancias_list->especial->headerCellClass() ?>"><div id="elh_ambulancias_especial" class="ambulancias_especial"><div class="ew-table-header-caption"><?php echo $ambulancias_list->especial->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especial" class="<?php echo $ambulancias_list->especial->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ambulancias_list->SortUrl($ambulancias_list->especial) ?>', 1);"><div id="elh_ambulancias_especial" class="ambulancias_especial">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ambulancias_list->especial->caption() ?></span><span class="ew-table-header-sort"><?php if ($ambulancias_list->especial->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ambulancias_list->especial->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ambulancias_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ambulancias_list->ExportAll && $ambulancias_list->isExport()) {
	$ambulancias_list->StopRecord = $ambulancias_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ambulancias_list->TotalRecords > $ambulancias_list->StartRecord + $ambulancias_list->DisplayRecords - 1)
		$ambulancias_list->StopRecord = $ambulancias_list->StartRecord + $ambulancias_list->DisplayRecords - 1;
	else
		$ambulancias_list->StopRecord = $ambulancias_list->TotalRecords;
}
$ambulancias_list->RecordCount = $ambulancias_list->StartRecord - 1;
if ($ambulancias_list->Recordset && !$ambulancias_list->Recordset->EOF) {
	$ambulancias_list->Recordset->moveFirst();
	$selectLimit = $ambulancias_list->UseSelectLimit;
	if (!$selectLimit && $ambulancias_list->StartRecord > 1)
		$ambulancias_list->Recordset->move($ambulancias_list->StartRecord - 1);
} elseif (!$ambulancias->AllowAddDeleteRow && $ambulancias_list->StopRecord == 0) {
	$ambulancias_list->StopRecord = $ambulancias->GridAddRowCount;
}

// Initialize aggregate
$ambulancias->RowType = ROWTYPE_AGGREGATEINIT;
$ambulancias->resetAttributes();
$ambulancias_list->renderRow();
while ($ambulancias_list->RecordCount < $ambulancias_list->StopRecord) {
	$ambulancias_list->RecordCount++;
	if ($ambulancias_list->RecordCount >= $ambulancias_list->StartRecord) {
		$ambulancias_list->RowCount++;

		// Set up key count
		$ambulancias_list->KeyCount = $ambulancias_list->RowIndex;

		// Init row class and style
		$ambulancias->resetAttributes();
		$ambulancias->CssClass = "";
		if ($ambulancias_list->isGridAdd()) {
		} else {
			$ambulancias_list->loadRowValues($ambulancias_list->Recordset); // Load row values
		}
		$ambulancias->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ambulancias->RowAttrs->merge(["data-rowindex" => $ambulancias_list->RowCount, "id" => "r" . $ambulancias_list->RowCount . "_ambulancias", "data-rowtype" => $ambulancias->RowType]);

		// Render row
		$ambulancias_list->renderRow();

		// Render list options
		$ambulancias_list->renderListOptions();
?>
	<tr <?php echo $ambulancias->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ambulancias_list->ListOptions->render("body", "left", $ambulancias_list->RowCount);
?>
	<?php if ($ambulancias_list->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td data-name="cod_ambulancias" <?php echo $ambulancias_list->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_cod_ambulancias">
<span<?php echo $ambulancias_list->cod_ambulancias->viewAttributes() ?>><?php echo $ambulancias_list->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->placas->Visible) { // placas ?>
		<td data-name="placas" <?php echo $ambulancias_list->placas->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_placas">
<span<?php echo $ambulancias_list->placas->viewAttributes() ?>><?php echo $ambulancias_list->placas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->chasis->Visible) { // chasis ?>
		<td data-name="chasis" <?php echo $ambulancias_list->chasis->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_chasis">
<span<?php echo $ambulancias_list->chasis->viewAttributes() ?>><?php echo $ambulancias_list->chasis->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->marca->Visible) { // marca ?>
		<td data-name="marca" <?php echo $ambulancias_list->marca->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_marca">
<span<?php echo $ambulancias_list->marca->viewAttributes() ?>><?php echo $ambulancias_list->marca->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->modelo->Visible) { // modelo ?>
		<td data-name="modelo" <?php echo $ambulancias_list->modelo->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_modelo">
<span<?php echo $ambulancias_list->modelo->viewAttributes() ?>><?php echo $ambulancias_list->modelo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->tipo_translado->Visible) { // tipo_translado ?>
		<td data-name="tipo_translado" <?php echo $ambulancias_list->tipo_translado->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_tipo_translado">
<span<?php echo $ambulancias_list->tipo_translado->viewAttributes() ?>><?php echo $ambulancias_list->tipo_translado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->estado->Visible) { // estado ?>
		<td data-name="estado" <?php echo $ambulancias_list->estado->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_estado">
<span<?php echo $ambulancias_list->estado->viewAttributes() ?>><?php echo $ambulancias_list->estado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->ubicacion->Visible) { // ubicacion ?>
		<td data-name="ubicacion" <?php echo $ambulancias_list->ubicacion->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_ubicacion">
<span<?php echo $ambulancias_list->ubicacion->viewAttributes() ?>><?php echo $ambulancias_list->ubicacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ambulancias_list->especial->Visible) { // especial ?>
		<td data-name="especial" <?php echo $ambulancias_list->especial->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_list->RowCount ?>_ambulancias_especial">
<span<?php echo $ambulancias_list->especial->viewAttributes() ?>><?php echo $ambulancias_list->especial->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ambulancias_list->ListOptions->render("body", "right", $ambulancias_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ambulancias_list->isGridAdd())
		$ambulancias_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ambulancias->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ambulancias_list->Recordset)
	$ambulancias_list->Recordset->Close();
?>
<?php if (!$ambulancias_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ambulancias_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ambulancias_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ambulancias_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ambulancias_list->TotalRecords == 0 && !$ambulancias->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ambulancias_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ambulancias_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ambulancias_list->isExport()) { ?>
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
$ambulancias_list->terminate();
?>