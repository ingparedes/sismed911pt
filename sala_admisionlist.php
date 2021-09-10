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
$sala_admision_list = new sala_admision_list();

// Run the page
$sala_admision_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_admision_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sala_admision_list->isExport()) { ?>
<script>
var fsala_admisionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsala_admisionlist = currentForm = new ew.Form("fsala_admisionlist", "list");
	fsala_admisionlist.formKeyCountName = '<?php echo $sala_admision_list->FormKeyCountName ?>';
	loadjs.done("fsala_admisionlist");
});
var fsala_admisionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsala_admisionlistsrch = currentSearchForm = new ew.Form("fsala_admisionlistsrch");

	// Dynamic selection lists
	// Filters

	fsala_admisionlistsrch.filterList = <?php echo $sala_admision_list->getFilterList() ?>;
	loadjs.done("fsala_admisionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sala_admision_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sala_admision_list->TotalRecords > 0 && $sala_admision_list->ExportOptions->visible()) { ?>
<?php $sala_admision_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sala_admision_list->ImportOptions->visible()) { ?>
<?php $sala_admision_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sala_admision_list->SearchOptions->visible()) { ?>
<?php $sala_admision_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sala_admision_list->FilterOptions->visible()) { ?>
<?php $sala_admision_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sala_admision_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sala_admision_list->isExport() && !$sala_admision->CurrentAction) { ?>
<form name="fsala_admisionlistsrch" id="fsala_admisionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsala_admisionlistsrch-search-panel" class="<?php echo $sala_admision_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sala_admision">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sala_admision_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sala_admision_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sala_admision_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sala_admision_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sala_admision_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sala_admision_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sala_admision_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sala_admision_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sala_admision_list->showPageHeader(); ?>
<?php
$sala_admision_list->showMessage();
?>
<?php if ($sala_admision_list->TotalRecords > 0 || $sala_admision->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sala_admision_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sala_admision">
<?php if (!$sala_admision_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sala_admision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sala_admision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sala_admision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsala_admisionlist" id="fsala_admisionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_admision">
<div id="gmp_sala_admision" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sala_admision_list->TotalRecords > 0 || $sala_admision_list->isGridEdit()) { ?>
<table id="tbl_sala_admisionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sala_admision->RowType = ROWTYPE_HEADER;

// Render list options
$sala_admision_list->renderListOptions();

// Render list options (header, left)
$sala_admision_list->ListOptions->render("header", "left");
?>
<?php if ($sala_admision_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $sala_admision_list->cod_casopreh->headerCellClass() ?>"><div id="elh_sala_admision_cod_casopreh" class="sala_admision_cod_casopreh"><div class="ew-table-header-caption"><?php echo $sala_admision_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $sala_admision_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->cod_casopreh) ?>', 1);"><div id="elh_sala_admision_cod_casopreh" class="sala_admision_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->fecha->Visible) { // fecha ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->fecha) == "") { ?>
		<th data-name="fecha" class="<?php echo $sala_admision_list->fecha->headerCellClass() ?>"><div id="elh_sala_admision_fecha" class="sala_admision_fecha"><div class="ew-table-header-caption"><?php echo $sala_admision_list->fecha->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha" class="<?php echo $sala_admision_list->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->fecha) ?>', 1);"><div id="elh_sala_admision_fecha" class="sala_admision_fecha">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->prioridad->Visible) { // prioridad ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->prioridad) == "") { ?>
		<th data-name="prioridad" class="<?php echo $sala_admision_list->prioridad->headerCellClass() ?>"><div id="elh_sala_admision_prioridad" class="sala_admision_prioridad"><div class="ew-table-header-caption"><?php echo $sala_admision_list->prioridad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prioridad" class="<?php echo $sala_admision_list->prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->prioridad) ?>', 1);"><div id="elh_sala_admision_prioridad" class="sala_admision_prioridad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->prioridad->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->nombre_es->Visible) { // nombre_es ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->nombre_es) == "") { ?>
		<th data-name="nombre_es" class="<?php echo $sala_admision_list->nombre_es->headerCellClass() ?>"><div id="elh_sala_admision_nombre_es" class="sala_admision_nombre_es"><div class="ew-table-header-caption"><?php echo $sala_admision_list->nombre_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_es" class="<?php echo $sala_admision_list->nombre_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->nombre_es) ?>', 1);"><div id="elh_sala_admision_nombre_es" class="sala_admision_nombre_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->nombre_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->nombre_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->nombre_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->hospital_destino->Visible) { // hospital_destino ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->hospital_destino) == "") { ?>
		<th data-name="hospital_destino" class="<?php echo $sala_admision_list->hospital_destino->headerCellClass() ?>"><div id="elh_sala_admision_hospital_destino" class="sala_admision_hospital_destino"><div class="ew-table-header-caption"><?php echo $sala_admision_list->hospital_destino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital_destino" class="<?php echo $sala_admision_list->hospital_destino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->hospital_destino) ?>', 1);"><div id="elh_sala_admision_hospital_destino" class="sala_admision_hospital_destino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->hospital_destino->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->hospital_destino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->hospital_destino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->nombre_confirma->Visible) { // nombre_confirma ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->nombre_confirma) == "") { ?>
		<th data-name="nombre_confirma" class="<?php echo $sala_admision_list->nombre_confirma->headerCellClass() ?>"><div id="elh_sala_admision_nombre_confirma" class="sala_admision_nombre_confirma"><div class="ew-table-header-caption"><?php echo $sala_admision_list->nombre_confirma->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_confirma" class="<?php echo $sala_admision_list->nombre_confirma->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->nombre_confirma) ?>', 1);"><div id="elh_sala_admision_nombre_confirma" class="sala_admision_nombre_confirma">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->nombre_confirma->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->nombre_confirma->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->nombre_confirma->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->genero->Visible) { // genero ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->genero) == "") { ?>
		<th data-name="genero" class="<?php echo $sala_admision_list->genero->headerCellClass() ?>"><div id="elh_sala_admision_genero" class="sala_admision_genero"><div class="ew-table-header-caption"><?php echo $sala_admision_list->genero->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="genero" class="<?php echo $sala_admision_list->genero->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->genero) ?>', 1);"><div id="elh_sala_admision_genero" class="sala_admision_genero">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->genero->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->genero->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->genero->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->edad->Visible) { // edad ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->edad) == "") { ?>
		<th data-name="edad" class="<?php echo $sala_admision_list->edad->headerCellClass() ?>"><div id="elh_sala_admision_edad" class="sala_admision_edad"><div class="ew-table-header-caption"><?php echo $sala_admision_list->edad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="edad" class="<?php echo $sala_admision_list->edad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->edad) ?>', 1);"><div id="elh_sala_admision_edad" class="sala_admision_edad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->edad->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->edad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->edad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->cod_ambulancia) == "") { ?>
		<th data-name="cod_ambulancia" class="<?php echo $sala_admision_list->cod_ambulancia->headerCellClass() ?>"><div id="elh_sala_admision_cod_ambulancia" class="sala_admision_cod_ambulancia"><div class="ew-table-header-caption"><?php echo $sala_admision_list->cod_ambulancia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_ambulancia" class="<?php echo $sala_admision_list->cod_ambulancia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->cod_ambulancia) ?>', 1);"><div id="elh_sala_admision_cod_ambulancia" class="sala_admision_cod_ambulancia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->cod_ambulancia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->cod_ambulancia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->cod_ambulancia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_admision_list->cuando_murio->Visible) { // cuando_murio ?>
	<?php if ($sala_admision_list->SortUrl($sala_admision_list->cuando_murio) == "") { ?>
		<th data-name="cuando_murio" class="<?php echo $sala_admision_list->cuando_murio->headerCellClass() ?>"><div id="elh_sala_admision_cuando_murio" class="sala_admision_cuando_murio"><div class="ew-table-header-caption"><?php echo $sala_admision_list->cuando_murio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cuando_murio" class="<?php echo $sala_admision_list->cuando_murio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_admision_list->SortUrl($sala_admision_list->cuando_murio) ?>', 1);"><div id="elh_sala_admision_cuando_murio" class="sala_admision_cuando_murio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_admision_list->cuando_murio->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_admision_list->cuando_murio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_admision_list->cuando_murio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sala_admision_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sala_admision_list->ExportAll && $sala_admision_list->isExport()) {
	$sala_admision_list->StopRecord = $sala_admision_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sala_admision_list->TotalRecords > $sala_admision_list->StartRecord + $sala_admision_list->DisplayRecords - 1)
		$sala_admision_list->StopRecord = $sala_admision_list->StartRecord + $sala_admision_list->DisplayRecords - 1;
	else
		$sala_admision_list->StopRecord = $sala_admision_list->TotalRecords;
}
$sala_admision_list->RecordCount = $sala_admision_list->StartRecord - 1;
if ($sala_admision_list->Recordset && !$sala_admision_list->Recordset->EOF) {
	$sala_admision_list->Recordset->moveFirst();
	$selectLimit = $sala_admision_list->UseSelectLimit;
	if (!$selectLimit && $sala_admision_list->StartRecord > 1)
		$sala_admision_list->Recordset->move($sala_admision_list->StartRecord - 1);
} elseif (!$sala_admision->AllowAddDeleteRow && $sala_admision_list->StopRecord == 0) {
	$sala_admision_list->StopRecord = $sala_admision->GridAddRowCount;
}

// Initialize aggregate
$sala_admision->RowType = ROWTYPE_AGGREGATEINIT;
$sala_admision->resetAttributes();
$sala_admision_list->renderRow();
while ($sala_admision_list->RecordCount < $sala_admision_list->StopRecord) {
	$sala_admision_list->RecordCount++;
	if ($sala_admision_list->RecordCount >= $sala_admision_list->StartRecord) {
		$sala_admision_list->RowCount++;

		// Set up key count
		$sala_admision_list->KeyCount = $sala_admision_list->RowIndex;

		// Init row class and style
		$sala_admision->resetAttributes();
		$sala_admision->CssClass = "";
		if ($sala_admision_list->isGridAdd()) {
		} else {
			$sala_admision_list->loadRowValues($sala_admision_list->Recordset); // Load row values
		}
		$sala_admision->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sala_admision->RowAttrs->merge(["data-rowindex" => $sala_admision_list->RowCount, "id" => "r" . $sala_admision_list->RowCount . "_sala_admision", "data-rowtype" => $sala_admision->RowType]);

		// Render row
		$sala_admision_list->renderRow();

		// Render list options
		$sala_admision_list->renderListOptions();
?>
	<tr <?php echo $sala_admision->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sala_admision_list->ListOptions->render("body", "left", $sala_admision_list->RowCount);
?>
	<?php if ($sala_admision_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $sala_admision_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_cod_casopreh">
<span<?php echo $sala_admision_list->cod_casopreh->viewAttributes() ?>><?php echo $sala_admision_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->fecha->Visible) { // fecha ?>
		<td data-name="fecha" <?php echo $sala_admision_list->fecha->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_fecha">
<span<?php echo $sala_admision_list->fecha->viewAttributes() ?>><?php echo $sala_admision_list->fecha->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->prioridad->Visible) { // prioridad ?>
		<td data-name="prioridad" <?php echo $sala_admision_list->prioridad->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_prioridad">
<span<?php echo $sala_admision_list->prioridad->viewAttributes() ?>><?php echo $sala_admision_list->prioridad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->nombre_es->Visible) { // nombre_es ?>
		<td data-name="nombre_es" <?php echo $sala_admision_list->nombre_es->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_nombre_es">
<span<?php echo $sala_admision_list->nombre_es->viewAttributes() ?>><?php echo $sala_admision_list->nombre_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->hospital_destino->Visible) { // hospital_destino ?>
		<td data-name="hospital_destino" <?php echo $sala_admision_list->hospital_destino->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_hospital_destino">
<span<?php echo $sala_admision_list->hospital_destino->viewAttributes() ?>><?php echo $sala_admision_list->hospital_destino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->nombre_confirma->Visible) { // nombre_confirma ?>
		<td data-name="nombre_confirma" <?php echo $sala_admision_list->nombre_confirma->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_nombre_confirma">
<span<?php echo $sala_admision_list->nombre_confirma->viewAttributes() ?>><?php echo $sala_admision_list->nombre_confirma->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->genero->Visible) { // genero ?>
		<td data-name="genero" <?php echo $sala_admision_list->genero->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_genero">
<span<?php echo $sala_admision_list->genero->viewAttributes() ?>><?php echo $sala_admision_list->genero->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->edad->Visible) { // edad ?>
		<td data-name="edad" <?php echo $sala_admision_list->edad->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_edad">
<span<?php echo $sala_admision_list->edad->viewAttributes() ?>><?php echo $sala_admision_list->edad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<td data-name="cod_ambulancia" <?php echo $sala_admision_list->cod_ambulancia->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_cod_ambulancia">
<span<?php echo $sala_admision_list->cod_ambulancia->viewAttributes() ?>><?php echo $sala_admision_list->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_admision_list->cuando_murio->Visible) { // cuando_murio ?>
		<td data-name="cuando_murio" <?php echo $sala_admision_list->cuando_murio->cellAttributes() ?>>
<span id="el<?php echo $sala_admision_list->RowCount ?>_sala_admision_cuando_murio">
<span<?php echo $sala_admision_list->cuando_murio->viewAttributes() ?>><?php echo $sala_admision_list->cuando_murio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sala_admision_list->ListOptions->render("body", "right", $sala_admision_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sala_admision_list->isGridAdd())
		$sala_admision_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sala_admision->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sala_admision_list->Recordset)
	$sala_admision_list->Recordset->Close();
?>
<?php if (!$sala_admision_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sala_admision_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sala_admision_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sala_admision_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sala_admision_list->TotalRecords == 0 && !$sala_admision->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sala_admision_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sala_admision_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sala_admision_list->isExport()) { ?>
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
$sala_admision_list->terminate();
?>