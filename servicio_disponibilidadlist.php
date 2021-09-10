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
$servicio_disponibilidad_list = new servicio_disponibilidad_list();

// Run the page
$servicio_disponibilidad_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_disponibilidad_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$servicio_disponibilidad_list->isExport()) { ?>
<script>
var fservicio_disponibilidadlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fservicio_disponibilidadlist = currentForm = new ew.Form("fservicio_disponibilidadlist", "list");
	fservicio_disponibilidadlist.formKeyCountName = '<?php echo $servicio_disponibilidad_list->FormKeyCountName ?>';
	loadjs.done("fservicio_disponibilidadlist");
});
var fservicio_disponibilidadlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fservicio_disponibilidadlistsrch = currentSearchForm = new ew.Form("fservicio_disponibilidadlistsrch");

	// Dynamic selection lists
	// Filters

	fservicio_disponibilidadlistsrch.filterList = <?php echo $servicio_disponibilidad_list->getFilterList() ?>;
	loadjs.done("fservicio_disponibilidadlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$servicio_disponibilidad_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($servicio_disponibilidad_list->TotalRecords > 0 && $servicio_disponibilidad_list->ExportOptions->visible()) { ?>
<?php $servicio_disponibilidad_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($servicio_disponibilidad_list->ImportOptions->visible()) { ?>
<?php $servicio_disponibilidad_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($servicio_disponibilidad_list->SearchOptions->visible()) { ?>
<?php $servicio_disponibilidad_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($servicio_disponibilidad_list->FilterOptions->visible()) { ?>
<?php $servicio_disponibilidad_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$servicio_disponibilidad_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$servicio_disponibilidad_list->isExport() && !$servicio_disponibilidad->CurrentAction) { ?>
<form name="fservicio_disponibilidadlistsrch" id="fservicio_disponibilidadlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fservicio_disponibilidadlistsrch-search-panel" class="<?php echo $servicio_disponibilidad_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="servicio_disponibilidad">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $servicio_disponibilidad_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($servicio_disponibilidad_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($servicio_disponibilidad_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $servicio_disponibilidad_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($servicio_disponibilidad_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($servicio_disponibilidad_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($servicio_disponibilidad_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($servicio_disponibilidad_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $servicio_disponibilidad_list->showPageHeader(); ?>
<?php
$servicio_disponibilidad_list->showMessage();
?>
<?php if ($servicio_disponibilidad_list->TotalRecords > 0 || $servicio_disponibilidad->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($servicio_disponibilidad_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> servicio_disponibilidad">
<?php if (!$servicio_disponibilidad_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$servicio_disponibilidad_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $servicio_disponibilidad_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $servicio_disponibilidad_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fservicio_disponibilidadlist" id="fservicio_disponibilidadlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_disponibilidad">
<div id="gmp_servicio_disponibilidad" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($servicio_disponibilidad_list->TotalRecords > 0 || $servicio_disponibilidad_list->isGridEdit()) { ?>
<table id="tbl_servicio_disponibilidadlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$servicio_disponibilidad->RowType = ROWTYPE_HEADER;

// Render list options
$servicio_disponibilidad_list->renderListOptions();

// Render list options (header, left)
$servicio_disponibilidad_list->ListOptions->render("header", "left");
?>
<?php if ($servicio_disponibilidad_list->servicio_disponabilidad->Visible) { // servicio_disponabilidad ?>
	<?php if ($servicio_disponibilidad_list->SortUrl($servicio_disponibilidad_list->servicio_disponabilidad) == "") { ?>
		<th data-name="servicio_disponabilidad" class="<?php echo $servicio_disponibilidad_list->servicio_disponabilidad->headerCellClass() ?>"><div id="elh_servicio_disponibilidad_servicio_disponabilidad" class="servicio_disponibilidad_servicio_disponabilidad"><div class="ew-table-header-caption"><?php echo $servicio_disponibilidad_list->servicio_disponabilidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="servicio_disponabilidad" class="<?php echo $servicio_disponibilidad_list->servicio_disponabilidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_disponibilidad_list->SortUrl($servicio_disponibilidad_list->servicio_disponabilidad) ?>', 1);"><div id="elh_servicio_disponibilidad_servicio_disponabilidad" class="servicio_disponibilidad_servicio_disponabilidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_disponibilidad_list->servicio_disponabilidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($servicio_disponibilidad_list->servicio_disponabilidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_disponibilidad_list->servicio_disponabilidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($servicio_disponibilidad_list->nombre_serv_es->Visible) { // nombre_serv_es ?>
	<?php if ($servicio_disponibilidad_list->SortUrl($servicio_disponibilidad_list->nombre_serv_es) == "") { ?>
		<th data-name="nombre_serv_es" class="<?php echo $servicio_disponibilidad_list->nombre_serv_es->headerCellClass() ?>"><div id="elh_servicio_disponibilidad_nombre_serv_es" class="servicio_disponibilidad_nombre_serv_es"><div class="ew-table-header-caption"><?php echo $servicio_disponibilidad_list->nombre_serv_es->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_serv_es" class="<?php echo $servicio_disponibilidad_list->nombre_serv_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $servicio_disponibilidad_list->SortUrl($servicio_disponibilidad_list->nombre_serv_es) ?>', 1);"><div id="elh_servicio_disponibilidad_nombre_serv_es" class="servicio_disponibilidad_nombre_serv_es">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $servicio_disponibilidad_list->nombre_serv_es->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($servicio_disponibilidad_list->nombre_serv_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($servicio_disponibilidad_list->nombre_serv_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$servicio_disponibilidad_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($servicio_disponibilidad_list->ExportAll && $servicio_disponibilidad_list->isExport()) {
	$servicio_disponibilidad_list->StopRecord = $servicio_disponibilidad_list->TotalRecords;
} else {

	// Set the last record to display
	if ($servicio_disponibilidad_list->TotalRecords > $servicio_disponibilidad_list->StartRecord + $servicio_disponibilidad_list->DisplayRecords - 1)
		$servicio_disponibilidad_list->StopRecord = $servicio_disponibilidad_list->StartRecord + $servicio_disponibilidad_list->DisplayRecords - 1;
	else
		$servicio_disponibilidad_list->StopRecord = $servicio_disponibilidad_list->TotalRecords;
}
$servicio_disponibilidad_list->RecordCount = $servicio_disponibilidad_list->StartRecord - 1;
if ($servicio_disponibilidad_list->Recordset && !$servicio_disponibilidad_list->Recordset->EOF) {
	$servicio_disponibilidad_list->Recordset->moveFirst();
	$selectLimit = $servicio_disponibilidad_list->UseSelectLimit;
	if (!$selectLimit && $servicio_disponibilidad_list->StartRecord > 1)
		$servicio_disponibilidad_list->Recordset->move($servicio_disponibilidad_list->StartRecord - 1);
} elseif (!$servicio_disponibilidad->AllowAddDeleteRow && $servicio_disponibilidad_list->StopRecord == 0) {
	$servicio_disponibilidad_list->StopRecord = $servicio_disponibilidad->GridAddRowCount;
}

// Initialize aggregate
$servicio_disponibilidad->RowType = ROWTYPE_AGGREGATEINIT;
$servicio_disponibilidad->resetAttributes();
$servicio_disponibilidad_list->renderRow();
while ($servicio_disponibilidad_list->RecordCount < $servicio_disponibilidad_list->StopRecord) {
	$servicio_disponibilidad_list->RecordCount++;
	if ($servicio_disponibilidad_list->RecordCount >= $servicio_disponibilidad_list->StartRecord) {
		$servicio_disponibilidad_list->RowCount++;

		// Set up key count
		$servicio_disponibilidad_list->KeyCount = $servicio_disponibilidad_list->RowIndex;

		// Init row class and style
		$servicio_disponibilidad->resetAttributes();
		$servicio_disponibilidad->CssClass = "";
		if ($servicio_disponibilidad_list->isGridAdd()) {
		} else {
			$servicio_disponibilidad_list->loadRowValues($servicio_disponibilidad_list->Recordset); // Load row values
		}
		$servicio_disponibilidad->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$servicio_disponibilidad->RowAttrs->merge(["data-rowindex" => $servicio_disponibilidad_list->RowCount, "id" => "r" . $servicio_disponibilidad_list->RowCount . "_servicio_disponibilidad", "data-rowtype" => $servicio_disponibilidad->RowType]);

		// Render row
		$servicio_disponibilidad_list->renderRow();

		// Render list options
		$servicio_disponibilidad_list->renderListOptions();
?>
	<tr <?php echo $servicio_disponibilidad->rowAttributes() ?>>
<?php

// Render list options (body, left)
$servicio_disponibilidad_list->ListOptions->render("body", "left", $servicio_disponibilidad_list->RowCount);
?>
	<?php if ($servicio_disponibilidad_list->servicio_disponabilidad->Visible) { // servicio_disponabilidad ?>
		<td data-name="servicio_disponabilidad" <?php echo $servicio_disponibilidad_list->servicio_disponabilidad->cellAttributes() ?>>
<span id="el<?php echo $servicio_disponibilidad_list->RowCount ?>_servicio_disponibilidad_servicio_disponabilidad">
<span<?php echo $servicio_disponibilidad_list->servicio_disponabilidad->viewAttributes() ?>><?php echo $servicio_disponibilidad_list->servicio_disponabilidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($servicio_disponibilidad_list->nombre_serv_es->Visible) { // nombre_serv_es ?>
		<td data-name="nombre_serv_es" <?php echo $servicio_disponibilidad_list->nombre_serv_es->cellAttributes() ?>>
<span id="el<?php echo $servicio_disponibilidad_list->RowCount ?>_servicio_disponibilidad_nombre_serv_es">
<span<?php echo $servicio_disponibilidad_list->nombre_serv_es->viewAttributes() ?>><?php echo $servicio_disponibilidad_list->nombre_serv_es->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$servicio_disponibilidad_list->ListOptions->render("body", "right", $servicio_disponibilidad_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$servicio_disponibilidad_list->isGridAdd())
		$servicio_disponibilidad_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$servicio_disponibilidad->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($servicio_disponibilidad_list->Recordset)
	$servicio_disponibilidad_list->Recordset->Close();
?>
<?php if (!$servicio_disponibilidad_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$servicio_disponibilidad_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $servicio_disponibilidad_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $servicio_disponibilidad_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($servicio_disponibilidad_list->TotalRecords == 0 && !$servicio_disponibilidad->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $servicio_disponibilidad_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$servicio_disponibilidad_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$servicio_disponibilidad_list->isExport()) { ?>
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
$servicio_disponibilidad_list->terminate();
?>