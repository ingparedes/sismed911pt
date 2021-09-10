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
$interh_map_list = new interh_map_list();

// Run the page
$interh_map_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_map_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_map_list->isExport()) { ?>
<script>
var finterh_maplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_maplist = currentForm = new ew.Form("finterh_maplist", "list");
	finterh_maplist.formKeyCountName = '<?php echo $interh_map_list->FormKeyCountName ?>';
	loadjs.done("finterh_maplist");
});
var finterh_maplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finterh_maplistsrch = currentSearchForm = new ew.Form("finterh_maplistsrch");

	// Dynamic selection lists
	// Filters

	finterh_maplistsrch.filterList = <?php echo $interh_map_list->getFilterList() ?>;
	loadjs.done("finterh_maplistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_map_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_map_list->TotalRecords > 0 && $interh_map_list->ExportOptions->visible()) { ?>
<?php $interh_map_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_map_list->ImportOptions->visible()) { ?>
<?php $interh_map_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_map_list->SearchOptions->visible()) { ?>
<?php $interh_map_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($interh_map_list->FilterOptions->visible()) { ?>
<?php $interh_map_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_map_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_map_list->isExport() && !$interh_map->CurrentAction) { ?>
<form name="finterh_maplistsrch" id="finterh_maplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finterh_maplistsrch-search-panel" class="<?php echo $interh_map_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_map">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $interh_map_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($interh_map_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($interh_map_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $interh_map_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($interh_map_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($interh_map_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($interh_map_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($interh_map_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $interh_map_list->showPageHeader(); ?>
<?php
$interh_map_list->showMessage();
?>
<?php if ($interh_map_list->TotalRecords > 0 || $interh_map->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_map_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_map">
<form name="finterh_maplist" id="finterh_maplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_map">
<div id="gmp_interh_map" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_map_list->TotalRecords > 0 || $interh_map_list->isGridEdit()) { ?>
<table id="tbl_interh_maplist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_map->RowType = ROWTYPE_HEADER;

// Render list options
$interh_map_list->renderListOptions();

// Render list options (header, left)
$interh_map_list->ListOptions->render("header", "left", "", "block", $interh_map->TableVar, "interh_maplist");
?>
<?php if ($interh_map_list->latitud_hospital->Visible) { // latitud_hospital ?>
	<?php if ($interh_map_list->SortUrl($interh_map_list->latitud_hospital) == "") { ?>
		<th data-name="latitud_hospital" class="<?php echo $interh_map_list->latitud_hospital->headerCellClass() ?>"><div id="elh_interh_map_latitud_hospital" class="interh_map_latitud_hospital"><div class="ew-table-header-caption"><script id="tpc_interh_map_latitud_hospital" type="text/html"><?php echo $interh_map_list->latitud_hospital->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="latitud_hospital" class="<?php echo $interh_map_list->latitud_hospital->headerCellClass() ?>"><script id="tpc_interh_map_latitud_hospital" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_map_list->SortUrl($interh_map_list->latitud_hospital) ?>', 1);"><div id="elh_interh_map_latitud_hospital" class="interh_map_latitud_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_map_list->latitud_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_map_list->latitud_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_map_list->latitud_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_map_list->longitud_hospital->Visible) { // longitud_hospital ?>
	<?php if ($interh_map_list->SortUrl($interh_map_list->longitud_hospital) == "") { ?>
		<th data-name="longitud_hospital" class="<?php echo $interh_map_list->longitud_hospital->headerCellClass() ?>"><div id="elh_interh_map_longitud_hospital" class="interh_map_longitud_hospital"><div class="ew-table-header-caption"><script id="tpc_interh_map_longitud_hospital" type="text/html"><?php echo $interh_map_list->longitud_hospital->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="longitud_hospital" class="<?php echo $interh_map_list->longitud_hospital->headerCellClass() ?>"><script id="tpc_interh_map_longitud_hospital" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_map_list->SortUrl($interh_map_list->longitud_hospital) ?>', 1);"><div id="elh_interh_map_longitud_hospital" class="interh_map_longitud_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_map_list->longitud_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_map_list->longitud_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_map_list->longitud_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_map_list->nombre_hospital->Visible) { // nombre_hospital ?>
	<?php if ($interh_map_list->SortUrl($interh_map_list->nombre_hospital) == "") { ?>
		<th data-name="nombre_hospital" class="<?php echo $interh_map_list->nombre_hospital->headerCellClass() ?>"><div id="elh_interh_map_nombre_hospital" class="interh_map_nombre_hospital"><div class="ew-table-header-caption"><script id="tpc_interh_map_nombre_hospital" type="text/html"><?php echo $interh_map_list->nombre_hospital->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_hospital" class="<?php echo $interh_map_list->nombre_hospital->headerCellClass() ?>"><script id="tpc_interh_map_nombre_hospital" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_map_list->SortUrl($interh_map_list->nombre_hospital) ?>', 1);"><div id="elh_interh_map_nombre_hospital" class="interh_map_nombre_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_map_list->nombre_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_map_list->nombre_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_map_list->nombre_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_map_list->nivel_hospital->Visible) { // nivel_hospital ?>
	<?php if ($interh_map_list->SortUrl($interh_map_list->nivel_hospital) == "") { ?>
		<th data-name="nivel_hospital" class="<?php echo $interh_map_list->nivel_hospital->headerCellClass() ?>"><div id="elh_interh_map_nivel_hospital" class="interh_map_nivel_hospital"><div class="ew-table-header-caption"><script id="tpc_interh_map_nivel_hospital" type="text/html"><?php echo $interh_map_list->nivel_hospital->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_hospital" class="<?php echo $interh_map_list->nivel_hospital->headerCellClass() ?>"><script id="tpc_interh_map_nivel_hospital" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_map_list->SortUrl($interh_map_list->nivel_hospital) ?>', 1);"><div id="elh_interh_map_nivel_hospital" class="interh_map_nivel_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_map_list->nivel_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_map_list->nivel_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_map_list->nivel_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_map_list->estado->Visible) { // estado ?>
	<?php if ($interh_map_list->SortUrl($interh_map_list->estado) == "") { ?>
		<th data-name="estado" class="<?php echo $interh_map_list->estado->headerCellClass() ?>"><div id="elh_interh_map_estado" class="interh_map_estado"><div class="ew-table-header-caption"><script id="tpc_interh_map_estado" type="text/html"><?php echo $interh_map_list->estado->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="estado" class="<?php echo $interh_map_list->estado->headerCellClass() ?>"><script id="tpc_interh_map_estado" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_map_list->SortUrl($interh_map_list->estado) ?>', 1);"><div id="elh_interh_map_estado" class="interh_map_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_map_list->estado->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_map_list->estado->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_map_list->estado->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_map_list->ListOptions->render("header", "right", "", "block", $interh_map->TableVar, "interh_maplist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_map_list->ExportAll && $interh_map_list->isExport()) {
	$interh_map_list->StopRecord = $interh_map_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_map_list->TotalRecords > $interh_map_list->StartRecord + $interh_map_list->DisplayRecords - 1)
		$interh_map_list->StopRecord = $interh_map_list->StartRecord + $interh_map_list->DisplayRecords - 1;
	else
		$interh_map_list->StopRecord = $interh_map_list->TotalRecords;
}
$interh_map_list->RecordCount = $interh_map_list->StartRecord - 1;
if ($interh_map_list->Recordset && !$interh_map_list->Recordset->EOF) {
	$interh_map_list->Recordset->moveFirst();
	$selectLimit = $interh_map_list->UseSelectLimit;
	if (!$selectLimit && $interh_map_list->StartRecord > 1)
		$interh_map_list->Recordset->move($interh_map_list->StartRecord - 1);
} elseif (!$interh_map->AllowAddDeleteRow && $interh_map_list->StopRecord == 0) {
	$interh_map_list->StopRecord = $interh_map->GridAddRowCount;
}

// Initialize aggregate
$interh_map->RowType = ROWTYPE_AGGREGATEINIT;
$interh_map->resetAttributes();
$interh_map_list->renderRow();
while ($interh_map_list->RecordCount < $interh_map_list->StopRecord) {
	$interh_map_list->RecordCount++;
	if ($interh_map_list->RecordCount >= $interh_map_list->StartRecord) {
		$interh_map_list->RowCount++;

		// Set up key count
		$interh_map_list->KeyCount = $interh_map_list->RowIndex;

		// Init row class and style
		$interh_map->resetAttributes();
		$interh_map->CssClass = "";
		if ($interh_map_list->isGridAdd()) {
		} else {
			$interh_map_list->loadRowValues($interh_map_list->Recordset); // Load row values
		}
		$interh_map->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_map->RowAttrs->merge(["data-rowindex" => $interh_map_list->RowCount, "id" => "r" . $interh_map_list->RowCount . "_interh_map", "data-rowtype" => $interh_map->RowType]);

		// Render row
		$interh_map_list->renderRow();

		// Render list options
		$interh_map_list->renderListOptions();

		// Save row and cell attributes
		$interh_map_list->Attrs[$interh_map_list->RowCount] = ["row_attrs" => $interh_map->rowAttributes(), "cell_attrs" => []];
		$interh_map_list->Attrs[$interh_map_list->RowCount]["cell_attrs"] = $interh_map->fieldCellAttributes();
?>
	<tr <?php echo $interh_map->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_map_list->ListOptions->render("body", "left", $interh_map_list->RowCount, "block", $interh_map->TableVar, "interh_maplist");
?>
	<?php if ($interh_map_list->latitud_hospital->Visible) { // latitud_hospital ?>
		<td data-name="latitud_hospital" <?php echo $interh_map_list->latitud_hospital->cellAttributes() ?>>
<script id="orig<?php echo $interh_map_list->RowCount ?>_interh_map_latitud_hospital" class="interh_maplist" type="text/html">
<?php echo $interh_map_list->latitud_hospital->getViewValue() ?>
</script><script id="tpx<?php echo $interh_map_list->RowCount ?>_interh_map_latitud_hospital" class="interh_maplist" type="text/html">
<script>
loadjs.ready("head", function() {
	ew.googleMaps.push(jQuery.extend({"id":"gm_interh_map_x_latitud_hospital","name":"Google Maps","width":200,"width_field":null,"height":200,"height_field":null,"latitude":null,"latitude_field":"latitud_hospital","longitude":null,"longitude_field":"longitud_hospital","address":null,"address_field":null,"type":"ROADMAP","type_field":null,"zoom":8,"zoom_field":null,"title":null,"title_field":null,"icon":null,"icon_field":"icon_hospital","description":null,"description_field":"tipo","use_single_map":true,"single_map_width":600,"single_map_height":600,"show_map_on_top":true,"show_all_markers":true,"geocoding_delay":250,"use_marker_clusterer":false,"cluster_max_zoom":-1,"cluster_grid_size":-1,"cluster_styles":-1,"template_id":"orig<?php echo $interh_map_list->RowCount ?>_interh_map_latitud_hospital"}, {
		latitude: <?php echo JsonEncode($interh_map_list->latitud_hospital->CurrentValue, "undefined") ?>,
	longitude: <?php echo JsonEncode($interh_map_list->longitud_hospital->CurrentValue, "undefined") ?>,
	icon: <?php echo JsonEncode($interh_map_list->icon_hospital->CurrentValue, "string") ?>,
	description: <?php echo JsonEncode($interh_map_list->tipo->CurrentValue, "string") ?>

	}));
});
{{:"<"}}/script>

</script>
<script id="tpx<?php echo $interh_map_list->RowCount ?>_interh_map_latitud_hospital" type="text/html"><span id="el<?php echo $interh_map_list->RowCount ?>_interh_map_latitud_hospital">
<span<?php echo $interh_map_list->latitud_hospital->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx<?php echo $interh_map_list->RowCount ?>_interh_map_latitud_hospital")/}}</span>
</span></script>
</td>
	<?php } ?>
	<?php if ($interh_map_list->longitud_hospital->Visible) { // longitud_hospital ?>
		<td data-name="longitud_hospital" <?php echo $interh_map_list->longitud_hospital->cellAttributes() ?>>
<script id="tpx<?php echo $interh_map_list->RowCount ?>_interh_map_longitud_hospital" type="text/html"><span id="el<?php echo $interh_map_list->RowCount ?>_interh_map_longitud_hospital">
<span<?php echo $interh_map_list->longitud_hospital->viewAttributes() ?>><?php echo $interh_map_list->longitud_hospital->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($interh_map_list->nombre_hospital->Visible) { // nombre_hospital ?>
		<td data-name="nombre_hospital" <?php echo $interh_map_list->nombre_hospital->cellAttributes() ?>>
<script id="tpx<?php echo $interh_map_list->RowCount ?>_interh_map_nombre_hospital" type="text/html"><span id="el<?php echo $interh_map_list->RowCount ?>_interh_map_nombre_hospital">
<span<?php echo $interh_map_list->nombre_hospital->viewAttributes() ?>><?php echo $interh_map_list->nombre_hospital->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($interh_map_list->nivel_hospital->Visible) { // nivel_hospital ?>
		<td data-name="nivel_hospital" <?php echo $interh_map_list->nivel_hospital->cellAttributes() ?>>
<script id="tpx<?php echo $interh_map_list->RowCount ?>_interh_map_nivel_hospital" type="text/html"><span id="el<?php echo $interh_map_list->RowCount ?>_interh_map_nivel_hospital">
<span<?php echo $interh_map_list->nivel_hospital->viewAttributes() ?>><?php echo $interh_map_list->nivel_hospital->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($interh_map_list->estado->Visible) { // estado ?>
		<td data-name="estado" <?php echo $interh_map_list->estado->cellAttributes() ?>>
<script id="tpx<?php echo $interh_map_list->RowCount ?>_interh_map_estado" type="text/html"><span id="el<?php echo $interh_map_list->RowCount ?>_interh_map_estado">
<span<?php echo $interh_map_list->estado->viewAttributes() ?>><?php echo $interh_map_list->estado->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_map_list->ListOptions->render("body", "right", $interh_map_list->RowCount, "block", $interh_map->TableVar, "interh_maplist");
?>
	</tr>
<?php
	}
	if (!$interh_map_list->isGridAdd())
		$interh_map_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_interh_maplist" class="ew-custom-template"></div>
<script id="tpm_interh_maplist" type="text/html">
<div id="ct_interh_map_list"><?php if ($interh_map_list->RowCount > 0) { ?>
<?php for ($i = $interh_map_list->StartRowCount; $i <= $interh_map_list->RowCount; $i++) { ?>
{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_interh_map_latitud_hospital")/}}

<?php } ?>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_map->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_map_list->Recordset)
	$interh_map_list->Recordset->Close();
?>
<?php if (!$interh_map_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_map_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_map_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_map_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_map_list->TotalRecords == 0 && !$interh_map->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_map_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($interh_map->Rows) ?> };
	ew.applyTemplate("tpd_interh_maplist", "tpm_interh_maplist", "interh_maplist", "<?php echo $interh_map->CustomExport ?>", ew.templateData);
	$("script.interh_maplist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$interh_map_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_map_list->isExport()) { ?>
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
$interh_map_list->terminate();
?>