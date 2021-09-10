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
$tabla_disp_list = new tabla_disp_list();

// Run the page
$tabla_disp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tabla_disp_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tabla_disp_list->isExport()) { ?>
<script>
var ftabla_displist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftabla_displist = currentForm = new ew.Form("ftabla_displist", "list");
	ftabla_displist.formKeyCountName = '<?php echo $tabla_disp_list->FormKeyCountName ?>';
	loadjs.done("ftabla_displist");
});
var ftabla_displistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftabla_displistsrch = currentSearchForm = new ew.Form("ftabla_displistsrch");

	// Dynamic selection lists
	// Filters

	ftabla_displistsrch.filterList = <?php echo $tabla_disp_list->getFilterList() ?>;
	loadjs.done("ftabla_displistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tabla_disp_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tabla_disp_list->TotalRecords > 0 && $tabla_disp_list->ExportOptions->visible()) { ?>
<?php $tabla_disp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tabla_disp_list->ImportOptions->visible()) { ?>
<?php $tabla_disp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tabla_disp_list->SearchOptions->visible()) { ?>
<?php $tabla_disp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tabla_disp_list->FilterOptions->visible()) { ?>
<?php $tabla_disp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tabla_disp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tabla_disp_list->isExport() && !$tabla_disp->CurrentAction) { ?>
<form name="ftabla_displistsrch" id="ftabla_displistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftabla_displistsrch-search-panel" class="<?php echo $tabla_disp_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tabla_disp">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $tabla_disp_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($tabla_disp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($tabla_disp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tabla_disp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tabla_disp_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tabla_disp_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tabla_disp_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tabla_disp_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $tabla_disp_list->showPageHeader(); ?>
<?php
$tabla_disp_list->showMessage();
?>
<?php if ($tabla_disp_list->TotalRecords > 0 || $tabla_disp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tabla_disp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tabla_disp">
<?php if (!$tabla_disp_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$tabla_disp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tabla_disp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tabla_disp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftabla_displist" id="ftabla_displist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tabla_disp">
<div id="gmp_tabla_disp" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($tabla_disp_list->TotalRecords > 0 || $tabla_disp_list->isGridEdit()) { ?>
<table id="tbl_tabla_displist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tabla_disp->RowType = ROWTYPE_HEADER;

// Render list options
$tabla_disp_list->renderListOptions();

// Render list options (header, left)
$tabla_disp_list->ListOptions->render("header", "left");
?>
<?php if ($tabla_disp_list->nombre_hospital->Visible) { // nombre_hospital ?>
	<?php if ($tabla_disp_list->SortUrl($tabla_disp_list->nombre_hospital) == "") { ?>
		<th data-name="nombre_hospital" class="<?php echo $tabla_disp_list->nombre_hospital->headerCellClass() ?>"><div id="elh_tabla_disp_nombre_hospital" class="tabla_disp_nombre_hospital"><div class="ew-table-header-caption"><?php echo $tabla_disp_list->nombre_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_hospital" class="<?php echo $tabla_disp_list->nombre_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tabla_disp_list->SortUrl($tabla_disp_list->nombre_hospital) ?>', 1);"><div id="elh_tabla_disp_nombre_hospital" class="tabla_disp_nombre_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tabla_disp_list->nombre_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tabla_disp_list->nombre_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tabla_disp_list->nombre_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tabla_disp_list->nivel_hospital->Visible) { // nivel_hospital ?>
	<?php if ($tabla_disp_list->SortUrl($tabla_disp_list->nivel_hospital) == "") { ?>
		<th data-name="nivel_hospital" class="<?php echo $tabla_disp_list->nivel_hospital->headerCellClass() ?>"><div id="elh_tabla_disp_nivel_hospital" class="tabla_disp_nivel_hospital"><div class="ew-table-header-caption"><?php echo $tabla_disp_list->nivel_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_hospital" class="<?php echo $tabla_disp_list->nivel_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tabla_disp_list->SortUrl($tabla_disp_list->nivel_hospital) ?>', 1);"><div id="elh_tabla_disp_nivel_hospital" class="tabla_disp_nivel_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tabla_disp_list->nivel_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tabla_disp_list->nivel_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tabla_disp_list->nivel_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tabla_disp_list->camas_hospital->Visible) { // camas_hospital ?>
	<?php if ($tabla_disp_list->SortUrl($tabla_disp_list->camas_hospital) == "") { ?>
		<th data-name="camas_hospital" class="<?php echo $tabla_disp_list->camas_hospital->headerCellClass() ?>"><div id="elh_tabla_disp_camas_hospital" class="tabla_disp_camas_hospital"><div class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_hospital" class="<?php echo $tabla_disp_list->camas_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tabla_disp_list->SortUrl($tabla_disp_list->camas_hospital) ?>', 1);"><div id="elh_tabla_disp_camas_hospital" class="tabla_disp_camas_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tabla_disp_list->camas_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tabla_disp_list->camas_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tabla_disp_list->camas_uci->Visible) { // camas_uci ?>
	<?php if ($tabla_disp_list->SortUrl($tabla_disp_list->camas_uci) == "") { ?>
		<th data-name="camas_uci" class="<?php echo $tabla_disp_list->camas_uci->headerCellClass() ?>"><div id="elh_tabla_disp_camas_uci" class="tabla_disp_camas_uci"><div class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_uci->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_uci" class="<?php echo $tabla_disp_list->camas_uci->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tabla_disp_list->SortUrl($tabla_disp_list->camas_uci) ?>', 1);"><div id="elh_tabla_disp_camas_uci" class="tabla_disp_camas_uci">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_uci->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tabla_disp_list->camas_uci->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tabla_disp_list->camas_uci->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tabla_disp_list->camas_ucin->Visible) { // camas_ucin ?>
	<?php if ($tabla_disp_list->SortUrl($tabla_disp_list->camas_ucin) == "") { ?>
		<th data-name="camas_ucin" class="<?php echo $tabla_disp_list->camas_ucin->headerCellClass() ?>"><div id="elh_tabla_disp_camas_ucin" class="tabla_disp_camas_ucin"><div class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_ucin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_ucin" class="<?php echo $tabla_disp_list->camas_ucin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tabla_disp_list->SortUrl($tabla_disp_list->camas_ucin) ?>', 1);"><div id="elh_tabla_disp_camas_ucin" class="tabla_disp_camas_ucin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_ucin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tabla_disp_list->camas_ucin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tabla_disp_list->camas_ucin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tabla_disp_list->camas_covid->Visible) { // camas_covid ?>
	<?php if ($tabla_disp_list->SortUrl($tabla_disp_list->camas_covid) == "") { ?>
		<th data-name="camas_covid" class="<?php echo $tabla_disp_list->camas_covid->headerCellClass() ?>"><div id="elh_tabla_disp_camas_covid" class="tabla_disp_camas_covid"><div class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_covid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_covid" class="<?php echo $tabla_disp_list->camas_covid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $tabla_disp_list->SortUrl($tabla_disp_list->camas_covid) ?>', 1);"><div id="elh_tabla_disp_camas_covid" class="tabla_disp_camas_covid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tabla_disp_list->camas_covid->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tabla_disp_list->camas_covid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($tabla_disp_list->camas_covid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tabla_disp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tabla_disp_list->ExportAll && $tabla_disp_list->isExport()) {
	$tabla_disp_list->StopRecord = $tabla_disp_list->TotalRecords;
} else {

	// Set the last record to display
	if ($tabla_disp_list->TotalRecords > $tabla_disp_list->StartRecord + $tabla_disp_list->DisplayRecords - 1)
		$tabla_disp_list->StopRecord = $tabla_disp_list->StartRecord + $tabla_disp_list->DisplayRecords - 1;
	else
		$tabla_disp_list->StopRecord = $tabla_disp_list->TotalRecords;
}
$tabla_disp_list->RecordCount = $tabla_disp_list->StartRecord - 1;
if ($tabla_disp_list->Recordset && !$tabla_disp_list->Recordset->EOF) {
	$tabla_disp_list->Recordset->moveFirst();
	$selectLimit = $tabla_disp_list->UseSelectLimit;
	if (!$selectLimit && $tabla_disp_list->StartRecord > 1)
		$tabla_disp_list->Recordset->move($tabla_disp_list->StartRecord - 1);
} elseif (!$tabla_disp->AllowAddDeleteRow && $tabla_disp_list->StopRecord == 0) {
	$tabla_disp_list->StopRecord = $tabla_disp->GridAddRowCount;
}

// Initialize aggregate
$tabla_disp->RowType = ROWTYPE_AGGREGATEINIT;
$tabla_disp->resetAttributes();
$tabla_disp_list->renderRow();
while ($tabla_disp_list->RecordCount < $tabla_disp_list->StopRecord) {
	$tabla_disp_list->RecordCount++;
	if ($tabla_disp_list->RecordCount >= $tabla_disp_list->StartRecord) {
		$tabla_disp_list->RowCount++;

		// Set up key count
		$tabla_disp_list->KeyCount = $tabla_disp_list->RowIndex;

		// Init row class and style
		$tabla_disp->resetAttributes();
		$tabla_disp->CssClass = "";
		if ($tabla_disp_list->isGridAdd()) {
		} else {
			$tabla_disp_list->loadRowValues($tabla_disp_list->Recordset); // Load row values
		}
		$tabla_disp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tabla_disp->RowAttrs->merge(["data-rowindex" => $tabla_disp_list->RowCount, "id" => "r" . $tabla_disp_list->RowCount . "_tabla_disp", "data-rowtype" => $tabla_disp->RowType]);

		// Render row
		$tabla_disp_list->renderRow();

		// Render list options
		$tabla_disp_list->renderListOptions();
?>
	<tr <?php echo $tabla_disp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tabla_disp_list->ListOptions->render("body", "left", $tabla_disp_list->RowCount);
?>
	<?php if ($tabla_disp_list->nombre_hospital->Visible) { // nombre_hospital ?>
		<td data-name="nombre_hospital" <?php echo $tabla_disp_list->nombre_hospital->cellAttributes() ?>>
<span id="el<?php echo $tabla_disp_list->RowCount ?>_tabla_disp_nombre_hospital">
<span<?php echo $tabla_disp_list->nombre_hospital->viewAttributes() ?>><?php echo $tabla_disp_list->nombre_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tabla_disp_list->nivel_hospital->Visible) { // nivel_hospital ?>
		<td data-name="nivel_hospital" <?php echo $tabla_disp_list->nivel_hospital->cellAttributes() ?>>
<span id="el<?php echo $tabla_disp_list->RowCount ?>_tabla_disp_nivel_hospital">
<span<?php echo $tabla_disp_list->nivel_hospital->viewAttributes() ?>><?php echo $tabla_disp_list->nivel_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tabla_disp_list->camas_hospital->Visible) { // camas_hospital ?>
		<td data-name="camas_hospital" <?php echo $tabla_disp_list->camas_hospital->cellAttributes() ?>>
<span id="el<?php echo $tabla_disp_list->RowCount ?>_tabla_disp_camas_hospital">
<span<?php echo $tabla_disp_list->camas_hospital->viewAttributes() ?>><?php
$sql = "SELECT cantidad_camas FROM disponibilidad_hospitalaria WHERE servicio_disponibilidad = '3'  AND cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."'";
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '3' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tabla_disp_list->camas_uci->Visible) { // camas_uci ?>
		<td data-name="camas_uci" <?php echo $tabla_disp_list->camas_uci->cellAttributes() ?>>
<span id="el<?php echo $tabla_disp_list->RowCount ?>_tabla_disp_camas_uci">
<span<?php echo $tabla_disp_list->camas_uci->viewAttributes() ?>><?php

//$sql = "SELECT cantidad_camas FROM disponibilidad_hospitalaria WHERE servicio_disponibilidad = '4'  AND cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."'";
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '4' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tabla_disp_list->camas_ucin->Visible) { // camas_ucin ?>
		<td data-name="camas_ucin" <?php echo $tabla_disp_list->camas_ucin->cellAttributes() ?>>
<span id="el<?php echo $tabla_disp_list->RowCount ?>_tabla_disp_camas_ucin">
<span<?php echo $tabla_disp_list->camas_ucin->viewAttributes() ?>><?php

//$sql = "SELECT cantidad_camas FROM disponibilidad_hospitalaria WHERE servicio_disponibilidad = '2'  AND cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."'";
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '2' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tabla_disp_list->camas_covid->Visible) { // camas_covid ?>
		<td data-name="camas_covid" <?php echo $tabla_disp_list->camas_covid->cellAttributes() ?>>
<span id="el<?php echo $tabla_disp_list->RowCount ?>_tabla_disp_camas_covid">
<span<?php echo $tabla_disp_list->camas_covid->viewAttributes() ?>><?php
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '5' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";

//echo $sql;
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tabla_disp_list->ListOptions->render("body", "right", $tabla_disp_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$tabla_disp_list->isGridAdd())
		$tabla_disp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$tabla_disp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tabla_disp_list->Recordset)
	$tabla_disp_list->Recordset->Close();
?>
<?php if (!$tabla_disp_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tabla_disp_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $tabla_disp_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tabla_disp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tabla_disp_list->TotalRecords == 0 && !$tabla_disp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tabla_disp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tabla_disp_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tabla_disp_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$(".table.ew-table tr").dblclick(function(t){if(!$(t.target).hasClass("btn")&&!$(t.target).hasClass("ew-preview-row-btn")&&!$(t.target).hasClass("custom-control-label")){var a=$(this).find("a.ew-row-link.ew-view").attr("onclick"),e=a.substring(a.lastIndexOf(":'")+2,a.lastIndexOf("'"));console.log(e),ew.modalDialogShow({lnk:this,url:e,caption:'<?php echo Language()->phrase("View"); ?>',btn:null})}}),$(document).on("preview",function(t,a){a.$tabpane.find("tr").dblclick(function(t){if(!$(t.target).hasClass("btn")&&!$(t.target).hasClass("ew-preview-row-btn")&&!$(t.target).hasClass("custom-control-label")){var a=$(this).find("a.ew-row-link.ew-view").attr("ondblclick"),e=a.substring(a.lastIndexOf(":'")+2,a.lastIndexOf("'"));console.log(a),ew.modalDialogShow({lnk:this,url:e,caption:'<?php echo Language()->phrase("View"); ?>',btn:null})}})});
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$tabla_disp_list->terminate();
?>