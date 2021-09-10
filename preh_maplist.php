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
$preh_map_list = new preh_map_list();

// Run the page
$preh_map_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_map_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_map_list->isExport()) { ?>
<script>
var fpreh_maplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_maplist = currentForm = new ew.Form("fpreh_maplist", "list");
	fpreh_maplist.formKeyCountName = '<?php echo $preh_map_list->FormKeyCountName ?>';
	loadjs.done("fpreh_maplist");
});
var fpreh_maplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_maplistsrch = currentSearchForm = new ew.Form("fpreh_maplistsrch");

	// Dynamic selection lists
	// Filters

	fpreh_maplistsrch.filterList = <?php echo $preh_map_list->getFilterList() ?>;
	loadjs.done("fpreh_maplistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_map_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_map_list->TotalRecords > 0 && $preh_map_list->ExportOptions->visible()) { ?>
<?php $preh_map_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_map_list->ImportOptions->visible()) { ?>
<?php $preh_map_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_map_list->SearchOptions->visible()) { ?>
<?php $preh_map_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_map_list->FilterOptions->visible()) { ?>
<?php $preh_map_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_map_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_map_list->isExport() && !$preh_map->CurrentAction) { ?>
<form name="fpreh_maplistsrch" id="fpreh_maplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_maplistsrch-search-panel" class="<?php echo $preh_map_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_map">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $preh_map_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_map_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_map_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_map_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_map_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_map_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_map_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_map_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_map_list->showPageHeader(); ?>
<?php
$preh_map_list->showMessage();
?>
<?php if ($preh_map_list->TotalRecords > 0 || $preh_map->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_map_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_map">
<?php if (!$preh_map_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_map_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_map_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_map_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_maplist" id="fpreh_maplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_map">
<div id="gmp_preh_map" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_map_list->TotalRecords > 0 || $preh_map_list->isGridEdit()) { ?>
<table id="tbl_preh_maplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_map->RowType = ROWTYPE_HEADER;

// Render list options
$preh_map_list->renderListOptions();

// Render list options (header, left)
$preh_map_list->ListOptions->render("header", "left");
?>
<?php if ($preh_map_list->id_casopreh->Visible) { // id_casopreh ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->id_casopreh) == "") { ?>
		<th data-name="id_casopreh" class="<?php echo $preh_map_list->id_casopreh->headerCellClass() ?>"><div id="elh_preh_map_id_casopreh" class="preh_map_id_casopreh"><div class="ew-table-header-caption"><?php echo $preh_map_list->id_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_casopreh" class="<?php echo $preh_map_list->id_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->id_casopreh) ?>', 1);"><div id="elh_preh_map_id_casopreh" class="preh_map_id_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->id_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->id_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->id_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_map_list->longitud->Visible) { // longitud ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->longitud) == "") { ?>
		<th data-name="longitud" class="<?php echo $preh_map_list->longitud->headerCellClass() ?>"><div id="elh_preh_map_longitud" class="preh_map_longitud"><div class="ew-table-header-caption"><?php echo $preh_map_list->longitud->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="longitud" class="<?php echo $preh_map_list->longitud->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->longitud) ?>', 1);"><div id="elh_preh_map_longitud" class="preh_map_longitud">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->longitud->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->longitud->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->longitud->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_map_list->latitud->Visible) { // latitud ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->latitud) == "") { ?>
		<th data-name="latitud" class="<?php echo $preh_map_list->latitud->headerCellClass() ?>"><div id="elh_preh_map_latitud" class="preh_map_latitud"><div class="ew-table-header-caption"><?php echo $preh_map_list->latitud->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="latitud" class="<?php echo $preh_map_list->latitud->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->latitud) ?>', 1);"><div id="elh_preh_map_latitud" class="preh_map_latitud">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->latitud->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->latitud->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->latitud->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_map_list->nombrellamada->Visible) { // nombrellamada ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->nombrellamada) == "") { ?>
		<th data-name="nombrellamada" class="<?php echo $preh_map_list->nombrellamada->headerCellClass() ?>"><div id="elh_preh_map_nombrellamada" class="preh_map_nombrellamada"><div class="ew-table-header-caption"><?php echo $preh_map_list->nombrellamada->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombrellamada" class="<?php echo $preh_map_list->nombrellamada->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->nombrellamada) ?>', 1);"><div id="elh_preh_map_nombrellamada" class="preh_map_nombrellamada">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->nombrellamada->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->nombrellamada->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->nombrellamada->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_map_list->direccion->Visible) { // direccion ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->direccion) == "") { ?>
		<th data-name="direccion" class="<?php echo $preh_map_list->direccion->headerCellClass() ?>"><div id="elh_preh_map_direccion" class="preh_map_direccion"><div class="ew-table-header-caption"><?php echo $preh_map_list->direccion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="direccion" class="<?php echo $preh_map_list->direccion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->direccion) ?>', 1);"><div id="elh_preh_map_direccion" class="preh_map_direccion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->direccion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->direccion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->direccion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_map_list->cierre->Visible) { // cierre ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->cierre) == "") { ?>
		<th data-name="cierre" class="<?php echo $preh_map_list->cierre->headerCellClass() ?>"><div id="elh_preh_map_cierre" class="preh_map_cierre"><div class="ew-table-header-caption"><?php echo $preh_map_list->cierre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cierre" class="<?php echo $preh_map_list->cierre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->cierre) ?>', 1);"><div id="elh_preh_map_cierre" class="preh_map_cierre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->cierre->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->cierre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->cierre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_map_list->iconos->Visible) { // iconos ?>
	<?php if ($preh_map_list->SortUrl($preh_map_list->iconos) == "") { ?>
		<th data-name="iconos" class="<?php echo $preh_map_list->iconos->headerCellClass() ?>"><div id="elh_preh_map_iconos" class="preh_map_iconos"><div class="ew-table-header-caption"><?php echo $preh_map_list->iconos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iconos" class="<?php echo $preh_map_list->iconos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_map_list->SortUrl($preh_map_list->iconos) ?>', 1);"><div id="elh_preh_map_iconos" class="preh_map_iconos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_map_list->iconos->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_map_list->iconos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_map_list->iconos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_map_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_map_list->ExportAll && $preh_map_list->isExport()) {
	$preh_map_list->StopRecord = $preh_map_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_map_list->TotalRecords > $preh_map_list->StartRecord + $preh_map_list->DisplayRecords - 1)
		$preh_map_list->StopRecord = $preh_map_list->StartRecord + $preh_map_list->DisplayRecords - 1;
	else
		$preh_map_list->StopRecord = $preh_map_list->TotalRecords;
}
$preh_map_list->RecordCount = $preh_map_list->StartRecord - 1;
if ($preh_map_list->Recordset && !$preh_map_list->Recordset->EOF) {
	$preh_map_list->Recordset->moveFirst();
	$selectLimit = $preh_map_list->UseSelectLimit;
	if (!$selectLimit && $preh_map_list->StartRecord > 1)
		$preh_map_list->Recordset->move($preh_map_list->StartRecord - 1);
} elseif (!$preh_map->AllowAddDeleteRow && $preh_map_list->StopRecord == 0) {
	$preh_map_list->StopRecord = $preh_map->GridAddRowCount;
}

// Initialize aggregate
$preh_map->RowType = ROWTYPE_AGGREGATEINIT;
$preh_map->resetAttributes();
$preh_map_list->renderRow();
while ($preh_map_list->RecordCount < $preh_map_list->StopRecord) {
	$preh_map_list->RecordCount++;
	if ($preh_map_list->RecordCount >= $preh_map_list->StartRecord) {
		$preh_map_list->RowCount++;

		// Set up key count
		$preh_map_list->KeyCount = $preh_map_list->RowIndex;

		// Init row class and style
		$preh_map->resetAttributes();
		$preh_map->CssClass = "";
		if ($preh_map_list->isGridAdd()) {
		} else {
			$preh_map_list->loadRowValues($preh_map_list->Recordset); // Load row values
		}
		$preh_map->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_map->RowAttrs->merge(["data-rowindex" => $preh_map_list->RowCount, "id" => "r" . $preh_map_list->RowCount . "_preh_map", "data-rowtype" => $preh_map->RowType]);

		// Render row
		$preh_map_list->renderRow();

		// Render list options
		$preh_map_list->renderListOptions();
?>
	<tr <?php echo $preh_map->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_map_list->ListOptions->render("body", "left", $preh_map_list->RowCount);
?>
	<?php if ($preh_map_list->id_casopreh->Visible) { // id_casopreh ?>
		<td data-name="id_casopreh" <?php echo $preh_map_list->id_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_id_casopreh">
<span<?php echo $preh_map_list->id_casopreh->viewAttributes() ?>><?php echo $preh_map_list->id_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_map_list->longitud->Visible) { // longitud ?>
		<td data-name="longitud" <?php echo $preh_map_list->longitud->cellAttributes() ?>>
<script id="orig<?php echo $preh_map_list->RowCount ?>_preh_map_longitud" class="preh_maestroadd" type="text/html">
<?php echo $preh_map_list->longitud->getViewValue() ?>
</script>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_longitud">
<span<?php echo $preh_map_list->longitud->viewAttributes() ?>><script>
loadjs.ready("head", function() {
	ew.googleMaps.push(jQuery.extend({"id":"gm_preh_map_x_longitud","name":"Google Maps","width":200,"width_field":null,"height":200,"height_field":null,"latitude":null,"latitude_field":"latitud","longitude":null,"longitude_field":"longitud","address":null,"address_field":null,"type":"ROADMAP","type_field":null,"zoom":8,"zoom_field":null,"title":null,"title_field":null,"icon":null,"icon_field":"iconos","description":null,"description_field":"tipo","use_single_map":true,"single_map_width":600,"single_map_height":600,"show_map_on_top":true,"show_all_markers":true,"geocoding_delay":250,"use_marker_clusterer":true,"cluster_max_zoom":-1,"cluster_grid_size":-1,"cluster_styles":-1,"template_id":"orig<?php echo $preh_map_list->RowCount ?>_preh_map_longitud"}, {
		latitude: <?php echo JsonEncode($preh_map_list->latitud->CurrentValue, "undefined") ?>,
	longitude: <?php echo JsonEncode($preh_map_list->longitud->CurrentValue, "undefined") ?>,
	icon: <?php echo JsonEncode($preh_map_list->iconos->CurrentValue, "string") ?>,
	description: <?php echo JsonEncode($preh_map_list->tipo->CurrentValue, "string") ?>

	}));
});
</script></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_map_list->latitud->Visible) { // latitud ?>
		<td data-name="latitud" <?php echo $preh_map_list->latitud->cellAttributes() ?>>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_latitud">
<span<?php echo $preh_map_list->latitud->viewAttributes() ?>><?php echo $preh_map_list->latitud->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_map_list->nombrellamada->Visible) { // nombrellamada ?>
		<td data-name="nombrellamada" <?php echo $preh_map_list->nombrellamada->cellAttributes() ?>>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_nombrellamada">
<span<?php echo $preh_map_list->nombrellamada->viewAttributes() ?>><?php echo $preh_map_list->nombrellamada->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_map_list->direccion->Visible) { // direccion ?>
		<td data-name="direccion" <?php echo $preh_map_list->direccion->cellAttributes() ?>>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_direccion">
<span<?php echo $preh_map_list->direccion->viewAttributes() ?>><?php echo $preh_map_list->direccion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_map_list->cierre->Visible) { // cierre ?>
		<td data-name="cierre" <?php echo $preh_map_list->cierre->cellAttributes() ?>>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_cierre">
<span<?php echo $preh_map_list->cierre->viewAttributes() ?>><?php echo $preh_map_list->cierre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_map_list->iconos->Visible) { // iconos ?>
		<td data-name="iconos" <?php echo $preh_map_list->iconos->cellAttributes() ?>>
<span id="el<?php echo $preh_map_list->RowCount ?>_preh_map_iconos">
<span<?php echo $preh_map_list->iconos->viewAttributes() ?>><?php echo $preh_map_list->iconos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_map_list->ListOptions->render("body", "right", $preh_map_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_map_list->isGridAdd())
		$preh_map_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_map->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_map_list->Recordset)
	$preh_map_list->Recordset->Close();
?>
<?php if (!$preh_map_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_map_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_map_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_map_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_map_list->TotalRecords == 0 && !$preh_map->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_map_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_map_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_map_list->isExport()) { ?>
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
$preh_map_list->terminate();
?>