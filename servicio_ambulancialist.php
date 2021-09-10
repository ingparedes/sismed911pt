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
$servicio_ambulancia_list = new servicio_ambulancia_list();

// Run the page
$servicio_ambulancia_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_ambulancia_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$servicio_ambulancia_list->isExport()) { ?>
<script>
var fservicio_ambulancialist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fservicio_ambulancialist = currentForm = new ew.Form("fservicio_ambulancialist", "list");
	fservicio_ambulancialist.formKeyCountName = '<?php echo $servicio_ambulancia_list->FormKeyCountName ?>';
	loadjs.done("fservicio_ambulancialist");
});
var fservicio_ambulancialistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fservicio_ambulancialistsrch = currentSearchForm = new ew.Form("fservicio_ambulancialistsrch");

	// Dynamic selection lists
	// Filters

	fservicio_ambulancialistsrch.filterList = <?php echo $servicio_ambulancia_list->getFilterList() ?>;
	loadjs.done("fservicio_ambulancialistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$servicio_ambulancia_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($servicio_ambulancia_list->TotalRecords > 0 && $servicio_ambulancia_list->ExportOptions->visible()) { ?>
<?php $servicio_ambulancia_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->ImportOptions->visible()) { ?>
<?php $servicio_ambulancia_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->SearchOptions->visible()) { ?>
<?php $servicio_ambulancia_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->FilterOptions->visible()) { ?>
<?php $servicio_ambulancia_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$servicio_ambulancia_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$servicio_ambulancia_list->isExport() && !$servicio_ambulancia->CurrentAction) { ?>
<form name="fservicio_ambulancialistsrch" id="fservicio_ambulancialistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fservicio_ambulancialistsrch-search-panel" class="<?php echo $servicio_ambulancia_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="servicio_ambulancia">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $servicio_ambulancia_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($servicio_ambulancia_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($servicio_ambulancia_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $servicio_ambulancia_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($servicio_ambulancia_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($servicio_ambulancia_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($servicio_ambulancia_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($servicio_ambulancia_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $servicio_ambulancia_list->showPageHeader(); ?>
<?php
$servicio_ambulancia_list->showMessage();
?>
<?php if ($servicio_ambulancia_list->TotalRecords > 0 || $servicio_ambulancia->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($servicio_ambulancia_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> servicio_ambulancia">
<?php if (!$servicio_ambulancia_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$servicio_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $servicio_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $servicio_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fservicio_ambulancialist" id="fservicio_ambulancialist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_ambulancia">
<div id="gmp_servicio_ambulancia" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($servicio_ambulancia_list->TotalRecords > 0 || $servicio_ambulancia_list->isGridEdit()) { ?>
<table id="tbl_servicio_ambulancialist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$servicio_ambulancia->RowType = ROWTYPE_HEADER;

// Render list options
$servicio_ambulancia_list->renderListOptions();

// Render list options (header, left)
$servicio_ambulancia_list->ListOptions->render("header", "left");
?>
<?php if ($servicio_ambulancia_list->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->id_servcioambulacia) == "") { ?>
		<th data-name="id_servcioambulacia" class="<?php echo $servicio_ambulancia_list->id_servcioambulacia->headerCellClass() ?>"><div id="elh_servicio_ambulancia_id_servcioambulacia" class="servicio_ambulancia_id_servcioambulacia"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->id_servcioambulacia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_servcioambulacia" class="<?php echo $servicio_ambulancia_list->id_servcioambulacia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->id_servcioambulacia) ?>', 1);"><div id="elh_servicio_ambulancia_id_servcioambulacia" class="servicio_ambulancia_id_servcioambulacia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->id_servcioambulacia->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->id_servcioambulacia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->id_servcioambulacia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $servicio_ambulancia_list->cod_casointerh->headerCellClass() ?>"><div id="elh_servicio_ambulancia_cod_casointerh" class="servicio_ambulancia_cod_casointerh"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $servicio_ambulancia_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->cod_casointerh) ?>', 1);"><div id="elh_servicio_ambulancia_cod_casointerh" class="servicio_ambulancia_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->cod_ambulancia) == "") { ?>
		<th data-name="cod_ambulancia" class="<?php echo $servicio_ambulancia_list->cod_ambulancia->headerCellClass() ?>"><div id="elh_servicio_ambulancia_cod_ambulancia" class="servicio_ambulancia_cod_ambulancia"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->cod_ambulancia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancia" class="<?php echo $servicio_ambulancia_list->cod_ambulancia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->cod_ambulancia) ?>', 1);"><div id="elh_servicio_ambulancia_cod_ambulancia" class="servicio_ambulancia_cod_ambulancia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->cod_ambulancia->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->cod_ambulancia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->cod_ambulancia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->hora_asigna->Visible) { // hora_asigna ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_asigna) == "") { ?>
		<th data-name="hora_asigna" class="<?php echo $servicio_ambulancia_list->hora_asigna->headerCellClass() ?>"><div id="elh_servicio_ambulancia_hora_asigna" class="servicio_ambulancia_hora_asigna"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_asigna->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_asigna" class="<?php echo $servicio_ambulancia_list->hora_asigna->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_asigna) ?>', 1);"><div id="elh_servicio_ambulancia_hora_asigna" class="servicio_ambulancia_hora_asigna">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_asigna->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->hora_asigna->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->hora_asigna->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->hora_llegada->Visible) { // hora_llegada ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_llegada) == "") { ?>
		<th data-name="hora_llegada" class="<?php echo $servicio_ambulancia_list->hora_llegada->headerCellClass() ?>"><div id="elh_servicio_ambulancia_hora_llegada" class="servicio_ambulancia_hora_llegada"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_llegada->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_llegada" class="<?php echo $servicio_ambulancia_list->hora_llegada->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_llegada) ?>', 1);"><div id="elh_servicio_ambulancia_hora_llegada" class="servicio_ambulancia_hora_llegada">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_llegada->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->hora_llegada->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->hora_llegada->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->hora_inicio->Visible) { // hora_inicio ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_inicio) == "") { ?>
		<th data-name="hora_inicio" class="<?php echo $servicio_ambulancia_list->hora_inicio->headerCellClass() ?>"><div id="elh_servicio_ambulancia_hora_inicio" class="servicio_ambulancia_hora_inicio"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_inicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_inicio" class="<?php echo $servicio_ambulancia_list->hora_inicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_inicio) ?>', 1);"><div id="elh_servicio_ambulancia_hora_inicio" class="servicio_ambulancia_hora_inicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_inicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->hora_inicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->hora_inicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->hora_destino->Visible) { // hora_destino ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_destino) == "") { ?>
		<th data-name="hora_destino" class="<?php echo $servicio_ambulancia_list->hora_destino->headerCellClass() ?>"><div id="elh_servicio_ambulancia_hora_destino" class="servicio_ambulancia_hora_destino"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_destino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_destino" class="<?php echo $servicio_ambulancia_list->hora_destino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_destino) ?>', 1);"><div id="elh_servicio_ambulancia_hora_destino" class="servicio_ambulancia_hora_destino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_destino->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->hora_destino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->hora_destino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->hora_preposicion->Visible) { // hora_preposicion ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_preposicion) == "") { ?>
		<th data-name="hora_preposicion" class="<?php echo $servicio_ambulancia_list->hora_preposicion->headerCellClass() ?>"><div id="elh_servicio_ambulancia_hora_preposicion" class="servicio_ambulancia_hora_preposicion"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_preposicion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_preposicion" class="<?php echo $servicio_ambulancia_list->hora_preposicion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->hora_preposicion) ?>', 1);"><div id="elh_servicio_ambulancia_hora_preposicion" class="servicio_ambulancia_hora_preposicion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->hora_preposicion->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->hora_preposicion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->hora_preposicion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_ambulancia_list->conductor->Visible) { // conductor ?>
	<?php if ($servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->conductor) == "") { ?>
		<th data-name="conductor" class="<?php echo $servicio_ambulancia_list->conductor->headerCellClass() ?>"><div id="elh_servicio_ambulancia_conductor" class="servicio_ambulancia_conductor"><div class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->conductor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="conductor" class="<?php echo $servicio_ambulancia_list->conductor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_ambulancia_list->SortUrl($servicio_ambulancia_list->conductor) ?>', 1);"><div id="elh_servicio_ambulancia_conductor" class="servicio_ambulancia_conductor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_ambulancia_list->conductor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($servicio_ambulancia_list->conductor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_ambulancia_list->conductor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$servicio_ambulancia_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($servicio_ambulancia_list->ExportAll && $servicio_ambulancia_list->isExport()) {
	$servicio_ambulancia_list->StopRecord = $servicio_ambulancia_list->TotalRecords;
} else {

	// Set the last record to display
	if ($servicio_ambulancia_list->TotalRecords > $servicio_ambulancia_list->StartRecord + $servicio_ambulancia_list->DisplayRecords - 1)
		$servicio_ambulancia_list->StopRecord = $servicio_ambulancia_list->StartRecord + $servicio_ambulancia_list->DisplayRecords - 1;
	else
		$servicio_ambulancia_list->StopRecord = $servicio_ambulancia_list->TotalRecords;
}
$servicio_ambulancia_list->RecordCount = $servicio_ambulancia_list->StartRecord - 1;
if ($servicio_ambulancia_list->Recordset && !$servicio_ambulancia_list->Recordset->EOF) {
	$servicio_ambulancia_list->Recordset->moveFirst();
	$selectLimit = $servicio_ambulancia_list->UseSelectLimit;
	if (!$selectLimit && $servicio_ambulancia_list->StartRecord > 1)
		$servicio_ambulancia_list->Recordset->move($servicio_ambulancia_list->StartRecord - 1);
} elseif (!$servicio_ambulancia->AllowAddDeleteRow && $servicio_ambulancia_list->StopRecord == 0) {
	$servicio_ambulancia_list->StopRecord = $servicio_ambulancia->GridAddRowCount;
}

// Initialize aggregate
$servicio_ambulancia->RowType = ROWTYPE_AGGREGATEINIT;
$servicio_ambulancia->resetAttributes();
$servicio_ambulancia_list->renderRow();
while ($servicio_ambulancia_list->RecordCount < $servicio_ambulancia_list->StopRecord) {
	$servicio_ambulancia_list->RecordCount++;
	if ($servicio_ambulancia_list->RecordCount >= $servicio_ambulancia_list->StartRecord) {
		$servicio_ambulancia_list->RowCount++;

		// Set up key count
		$servicio_ambulancia_list->KeyCount = $servicio_ambulancia_list->RowIndex;

		// Init row class and style
		$servicio_ambulancia->resetAttributes();
		$servicio_ambulancia->CssClass = "";
		if ($servicio_ambulancia_list->isGridAdd()) {
		} else {
			$servicio_ambulancia_list->loadRowValues($servicio_ambulancia_list->Recordset); // Load row values
		}
		$servicio_ambulancia->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$servicio_ambulancia->RowAttrs->merge(["data-rowindex" => $servicio_ambulancia_list->RowCount, "id" => "r" . $servicio_ambulancia_list->RowCount . "_servicio_ambulancia", "data-rowtype" => $servicio_ambulancia->RowType]);

		// Render row
		$servicio_ambulancia_list->renderRow();

		// Render list options
		$servicio_ambulancia_list->renderListOptions();
?>
	<tr <?php echo $servicio_ambulancia->rowAttributes() ?>>
<?php

// Render list options (body, left)
$servicio_ambulancia_list->ListOptions->render("body", "left", $servicio_ambulancia_list->RowCount);
?>
	<?php if ($servicio_ambulancia_list->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
		<td data-name="id_servcioambulacia" <?php echo $servicio_ambulancia_list->id_servcioambulacia->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_id_servcioambulacia">
<span<?php echo $servicio_ambulancia_list->id_servcioambulacia->viewAttributes() ?>><?php echo $servicio_ambulancia_list->id_servcioambulacia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $servicio_ambulancia_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_cod_casointerh">
<span<?php echo $servicio_ambulancia_list->cod_casointerh->viewAttributes() ?>><?php echo $servicio_ambulancia_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<td data-name="cod_ambulancia" <?php echo $servicio_ambulancia_list->cod_ambulancia->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_cod_ambulancia">
<span<?php echo $servicio_ambulancia_list->cod_ambulancia->viewAttributes() ?>><?php echo $servicio_ambulancia_list->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->hora_asigna->Visible) { // hora_asigna ?>
		<td data-name="hora_asigna" <?php echo $servicio_ambulancia_list->hora_asigna->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_hora_asigna">
<span<?php echo $servicio_ambulancia_list->hora_asigna->viewAttributes() ?>><?php echo $servicio_ambulancia_list->hora_asigna->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->hora_llegada->Visible) { // hora_llegada ?>
		<td data-name="hora_llegada" <?php echo $servicio_ambulancia_list->hora_llegada->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_hora_llegada">
<span<?php echo $servicio_ambulancia_list->hora_llegada->viewAttributes() ?>><?php echo $servicio_ambulancia_list->hora_llegada->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->hora_inicio->Visible) { // hora_inicio ?>
		<td data-name="hora_inicio" <?php echo $servicio_ambulancia_list->hora_inicio->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_hora_inicio">
<span<?php echo $servicio_ambulancia_list->hora_inicio->viewAttributes() ?>><?php echo $servicio_ambulancia_list->hora_inicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->hora_destino->Visible) { // hora_destino ?>
		<td data-name="hora_destino" <?php echo $servicio_ambulancia_list->hora_destino->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_hora_destino">
<span<?php echo $servicio_ambulancia_list->hora_destino->viewAttributes() ?>><?php echo $servicio_ambulancia_list->hora_destino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->hora_preposicion->Visible) { // hora_preposicion ?>
		<td data-name="hora_preposicion" <?php echo $servicio_ambulancia_list->hora_preposicion->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_hora_preposicion">
<span<?php echo $servicio_ambulancia_list->hora_preposicion->viewAttributes() ?>><?php echo $servicio_ambulancia_list->hora_preposicion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_ambulancia_list->conductor->Visible) { // conductor ?>
		<td data-name="conductor" <?php echo $servicio_ambulancia_list->conductor->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_list->RowCount ?>_servicio_ambulancia_conductor">
<span<?php echo $servicio_ambulancia_list->conductor->viewAttributes() ?>><?php echo $servicio_ambulancia_list->conductor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$servicio_ambulancia_list->ListOptions->render("body", "right", $servicio_ambulancia_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$servicio_ambulancia_list->isGridAdd())
		$servicio_ambulancia_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$servicio_ambulancia->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($servicio_ambulancia_list->Recordset)
	$servicio_ambulancia_list->Recordset->Close();
?>
<?php if (!$servicio_ambulancia_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$servicio_ambulancia_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $servicio_ambulancia_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $servicio_ambulancia_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($servicio_ambulancia_list->TotalRecords == 0 && !$servicio_ambulancia->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $servicio_ambulancia_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$servicio_ambulancia_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$servicio_ambulancia_list->isExport()) { ?>
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
$servicio_ambulancia_list->terminate();
?>