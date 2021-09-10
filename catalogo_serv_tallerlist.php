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
$catalogo_serv_taller_list = new catalogo_serv_taller_list();

// Run the page
$catalogo_serv_taller_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$catalogo_serv_taller_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$catalogo_serv_taller_list->isExport()) { ?>
<script>
var fcatalogo_serv_tallerlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcatalogo_serv_tallerlist = currentForm = new ew.Form("fcatalogo_serv_tallerlist", "list");
	fcatalogo_serv_tallerlist.formKeyCountName = '<?php echo $catalogo_serv_taller_list->FormKeyCountName ?>';
	loadjs.done("fcatalogo_serv_tallerlist");
});
var fcatalogo_serv_tallerlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcatalogo_serv_tallerlistsrch = currentSearchForm = new ew.Form("fcatalogo_serv_tallerlistsrch");

	// Dynamic selection lists
	// Filters

	fcatalogo_serv_tallerlistsrch.filterList = <?php echo $catalogo_serv_taller_list->getFilterList() ?>;
	loadjs.done("fcatalogo_serv_tallerlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$catalogo_serv_taller_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($catalogo_serv_taller_list->TotalRecords > 0 && $catalogo_serv_taller_list->ExportOptions->visible()) { ?>
<?php $catalogo_serv_taller_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($catalogo_serv_taller_list->ImportOptions->visible()) { ?>
<?php $catalogo_serv_taller_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($catalogo_serv_taller_list->SearchOptions->visible()) { ?>
<?php $catalogo_serv_taller_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($catalogo_serv_taller_list->FilterOptions->visible()) { ?>
<?php $catalogo_serv_taller_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$catalogo_serv_taller_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$catalogo_serv_taller_list->isExport() && !$catalogo_serv_taller->CurrentAction) { ?>
<form name="fcatalogo_serv_tallerlistsrch" id="fcatalogo_serv_tallerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcatalogo_serv_tallerlistsrch-search-panel" class="<?php echo $catalogo_serv_taller_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="catalogo_serv_taller">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $catalogo_serv_taller_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($catalogo_serv_taller_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($catalogo_serv_taller_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $catalogo_serv_taller_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($catalogo_serv_taller_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($catalogo_serv_taller_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($catalogo_serv_taller_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($catalogo_serv_taller_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $catalogo_serv_taller_list->showPageHeader(); ?>
<?php
$catalogo_serv_taller_list->showMessage();
?>
<?php if ($catalogo_serv_taller_list->TotalRecords > 0 || $catalogo_serv_taller->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($catalogo_serv_taller_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> catalogo_serv_taller">
<form name="fcatalogo_serv_tallerlist" id="fcatalogo_serv_tallerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="catalogo_serv_taller">
<div id="gmp_catalogo_serv_taller" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($catalogo_serv_taller_list->TotalRecords > 0 || $catalogo_serv_taller_list->isGridEdit()) { ?>
<table id="tbl_catalogo_serv_tallerlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$catalogo_serv_taller->RowType = ROWTYPE_HEADER;

// Render list options
$catalogo_serv_taller_list->renderListOptions();

// Render list options (header, left)
$catalogo_serv_taller_list->ListOptions->render("header", "left");
?>
<?php if ($catalogo_serv_taller_list->id_catalogo->Visible) { // id_catalogo ?>
	<?php if ($catalogo_serv_taller_list->SortUrl($catalogo_serv_taller_list->id_catalogo) == "") { ?>
		<th data-name="id_catalogo" class="<?php echo $catalogo_serv_taller_list->id_catalogo->headerCellClass() ?>"><div id="elh_catalogo_serv_taller_id_catalogo" class="catalogo_serv_taller_id_catalogo"><div class="ew-table-header-caption"><?php echo $catalogo_serv_taller_list->id_catalogo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_catalogo" class="<?php echo $catalogo_serv_taller_list->id_catalogo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $catalogo_serv_taller_list->SortUrl($catalogo_serv_taller_list->id_catalogo) ?>', 1);"><div id="elh_catalogo_serv_taller_id_catalogo" class="catalogo_serv_taller_id_catalogo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $catalogo_serv_taller_list->id_catalogo->caption() ?></span><span class="ew-table-header-sort"><?php if ($catalogo_serv_taller_list->id_catalogo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($catalogo_serv_taller_list->id_catalogo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($catalogo_serv_taller_list->servicio_en->Visible) { // servicio_en ?>
	<?php if ($catalogo_serv_taller_list->SortUrl($catalogo_serv_taller_list->servicio_en) == "") { ?>
		<th data-name="servicio_en" class="<?php echo $catalogo_serv_taller_list->servicio_en->headerCellClass() ?>"><div id="elh_catalogo_serv_taller_servicio_en" class="catalogo_serv_taller_servicio_en"><div class="ew-table-header-caption"><?php echo $catalogo_serv_taller_list->servicio_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="servicio_en" class="<?php echo $catalogo_serv_taller_list->servicio_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $catalogo_serv_taller_list->SortUrl($catalogo_serv_taller_list->servicio_en) ?>', 1);"><div id="elh_catalogo_serv_taller_servicio_en" class="catalogo_serv_taller_servicio_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $catalogo_serv_taller_list->servicio_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($catalogo_serv_taller_list->servicio_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($catalogo_serv_taller_list->servicio_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$catalogo_serv_taller_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($catalogo_serv_taller_list->ExportAll && $catalogo_serv_taller_list->isExport()) {
	$catalogo_serv_taller_list->StopRecord = $catalogo_serv_taller_list->TotalRecords;
} else {

	// Set the last record to display
	if ($catalogo_serv_taller_list->TotalRecords > $catalogo_serv_taller_list->StartRecord + $catalogo_serv_taller_list->DisplayRecords - 1)
		$catalogo_serv_taller_list->StopRecord = $catalogo_serv_taller_list->StartRecord + $catalogo_serv_taller_list->DisplayRecords - 1;
	else
		$catalogo_serv_taller_list->StopRecord = $catalogo_serv_taller_list->TotalRecords;
}
$catalogo_serv_taller_list->RecordCount = $catalogo_serv_taller_list->StartRecord - 1;
if ($catalogo_serv_taller_list->Recordset && !$catalogo_serv_taller_list->Recordset->EOF) {
	$catalogo_serv_taller_list->Recordset->moveFirst();
	$selectLimit = $catalogo_serv_taller_list->UseSelectLimit;
	if (!$selectLimit && $catalogo_serv_taller_list->StartRecord > 1)
		$catalogo_serv_taller_list->Recordset->move($catalogo_serv_taller_list->StartRecord - 1);
} elseif (!$catalogo_serv_taller->AllowAddDeleteRow && $catalogo_serv_taller_list->StopRecord == 0) {
	$catalogo_serv_taller_list->StopRecord = $catalogo_serv_taller->GridAddRowCount;
}

// Initialize aggregate
$catalogo_serv_taller->RowType = ROWTYPE_AGGREGATEINIT;
$catalogo_serv_taller->resetAttributes();
$catalogo_serv_taller_list->renderRow();
while ($catalogo_serv_taller_list->RecordCount < $catalogo_serv_taller_list->StopRecord) {
	$catalogo_serv_taller_list->RecordCount++;
	if ($catalogo_serv_taller_list->RecordCount >= $catalogo_serv_taller_list->StartRecord) {
		$catalogo_serv_taller_list->RowCount++;

		// Set up key count
		$catalogo_serv_taller_list->KeyCount = $catalogo_serv_taller_list->RowIndex;

		// Init row class and style
		$catalogo_serv_taller->resetAttributes();
		$catalogo_serv_taller->CssClass = "";
		if ($catalogo_serv_taller_list->isGridAdd()) {
		} else {
			$catalogo_serv_taller_list->loadRowValues($catalogo_serv_taller_list->Recordset); // Load row values
		}
		$catalogo_serv_taller->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$catalogo_serv_taller->RowAttrs->merge(["data-rowindex" => $catalogo_serv_taller_list->RowCount, "id" => "r" . $catalogo_serv_taller_list->RowCount . "_catalogo_serv_taller", "data-rowtype" => $catalogo_serv_taller->RowType]);

		// Render row
		$catalogo_serv_taller_list->renderRow();

		// Render list options
		$catalogo_serv_taller_list->renderListOptions();
?>
	<tr <?php echo $catalogo_serv_taller->rowAttributes() ?>>
<?php

// Render list options (body, left)
$catalogo_serv_taller_list->ListOptions->render("body", "left", $catalogo_serv_taller_list->RowCount);
?>
	<?php if ($catalogo_serv_taller_list->id_catalogo->Visible) { // id_catalogo ?>
		<td data-name="id_catalogo" <?php echo $catalogo_serv_taller_list->id_catalogo->cellAttributes() ?>>
<span id="el<?php echo $catalogo_serv_taller_list->RowCount ?>_catalogo_serv_taller_id_catalogo">
<span<?php echo $catalogo_serv_taller_list->id_catalogo->viewAttributes() ?>><?php echo $catalogo_serv_taller_list->id_catalogo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($catalogo_serv_taller_list->servicio_en->Visible) { // servicio_en ?>
		<td data-name="servicio_en" <?php echo $catalogo_serv_taller_list->servicio_en->cellAttributes() ?>>
<span id="el<?php echo $catalogo_serv_taller_list->RowCount ?>_catalogo_serv_taller_servicio_en">
<span<?php echo $catalogo_serv_taller_list->servicio_en->viewAttributes() ?>><?php echo $catalogo_serv_taller_list->servicio_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$catalogo_serv_taller_list->ListOptions->render("body", "right", $catalogo_serv_taller_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$catalogo_serv_taller_list->isGridAdd())
		$catalogo_serv_taller_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$catalogo_serv_taller->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($catalogo_serv_taller_list->Recordset)
	$catalogo_serv_taller_list->Recordset->Close();
?>
<?php if (!$catalogo_serv_taller_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$catalogo_serv_taller_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $catalogo_serv_taller_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $catalogo_serv_taller_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($catalogo_serv_taller_list->TotalRecords == 0 && !$catalogo_serv_taller->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $catalogo_serv_taller_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$catalogo_serv_taller_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$catalogo_serv_taller_list->isExport()) { ?>
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
$catalogo_serv_taller_list->terminate();
?>