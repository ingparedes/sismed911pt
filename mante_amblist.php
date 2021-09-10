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
$mante_amb_list = new mante_amb_list();

// Run the page
$mante_amb_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mante_amb_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mante_amb_list->isExport()) { ?>
<script>
var fmante_amblist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmante_amblist = currentForm = new ew.Form("fmante_amblist", "list");
	fmante_amblist.formKeyCountName = '<?php echo $mante_amb_list->FormKeyCountName ?>';
	loadjs.done("fmante_amblist");
});
var fmante_amblistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmante_amblistsrch = currentSearchForm = new ew.Form("fmante_amblistsrch");

	// Dynamic selection lists
	// Filters

	fmante_amblistsrch.filterList = <?php echo $mante_amb_list->getFilterList() ?>;
	loadjs.done("fmante_amblistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mante_amb_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mante_amb_list->TotalRecords > 0 && $mante_amb_list->ExportOptions->visible()) { ?>
<?php $mante_amb_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mante_amb_list->ImportOptions->visible()) { ?>
<?php $mante_amb_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mante_amb_list->SearchOptions->visible()) { ?>
<?php $mante_amb_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mante_amb_list->FilterOptions->visible()) { ?>
<?php $mante_amb_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$mante_amb_list->isExport() || Config("EXPORT_MASTER_RECORD") && $mante_amb_list->isExport("print")) { ?>
<?php
if ($mante_amb_list->DbMasterFilter != "" && $mante_amb->getCurrentMasterTable() == "ambulancias") {
	if ($mante_amb_list->MasterRecordExists) {
		include_once "ambulanciasmaster.php";
	}
}
?>
<?php } ?>
<?php
$mante_amb_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mante_amb_list->isExport() && !$mante_amb->CurrentAction) { ?>
<form name="fmante_amblistsrch" id="fmante_amblistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmante_amblistsrch-search-panel" class="<?php echo $mante_amb_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mante_amb">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mante_amb_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mante_amb_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mante_amb_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mante_amb_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mante_amb_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mante_amb_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mante_amb_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mante_amb_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mante_amb_list->showPageHeader(); ?>
<?php
$mante_amb_list->showMessage();
?>
<?php if ($mante_amb_list->TotalRecords > 0 || $mante_amb->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mante_amb_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mante_amb">
<?php if (!$mante_amb_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mante_amb_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mante_amb_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mante_amb_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmante_amblist" id="fmante_amblist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mante_amb">
<?php if ($mante_amb->getCurrentMasterTable() == "ambulancias" && $mante_amb->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ambulancias">
<input type="hidden" name="fk_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_list->id_ambulancias->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_mante_amb" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mante_amb_list->TotalRecords > 0 || $mante_amb_list->isGridEdit()) { ?>
<table id="tbl_mante_amblist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mante_amb->RowType = ROWTYPE_HEADER;

// Render list options
$mante_amb_list->renderListOptions();

// Render list options (header, left)
$mante_amb_list->ListOptions->render("header", "left");
?>
<?php if ($mante_amb_list->id->Visible) { // id ?>
	<?php if ($mante_amb_list->SortUrl($mante_amb_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mante_amb_list->id->headerCellClass() ?>"><div id="elh_mante_amb_id" class="mante_amb_id"><div class="ew-table-header-caption"><?php echo $mante_amb_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mante_amb_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mante_amb_list->SortUrl($mante_amb_list->id) ?>', 1);"><div id="elh_mante_amb_id" class="mante_amb_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_list->id_ambulancias->Visible) { // id_ambulancias ?>
	<?php if ($mante_amb_list->SortUrl($mante_amb_list->id_ambulancias) == "") { ?>
		<th data-name="id_ambulancias" class="<?php echo $mante_amb_list->id_ambulancias->headerCellClass() ?>"><div id="elh_mante_amb_id_ambulancias" class="mante_amb_id_ambulancias"><div class="ew-table-header-caption"><?php echo $mante_amb_list->id_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_ambulancias" class="<?php echo $mante_amb_list->id_ambulancias->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mante_amb_list->SortUrl($mante_amb_list->id_ambulancias) ?>', 1);"><div id="elh_mante_amb_id_ambulancias" class="mante_amb_id_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_list->id_ambulancias->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_list->id_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_list->id_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_list->fecha_inicio->Visible) { // fecha_inicio ?>
	<?php if ($mante_amb_list->SortUrl($mante_amb_list->fecha_inicio) == "") { ?>
		<th data-name="fecha_inicio" class="<?php echo $mante_amb_list->fecha_inicio->headerCellClass() ?>"><div id="elh_mante_amb_fecha_inicio" class="mante_amb_fecha_inicio"><div class="ew-table-header-caption"><?php echo $mante_amb_list->fecha_inicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_inicio" class="<?php echo $mante_amb_list->fecha_inicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mante_amb_list->SortUrl($mante_amb_list->fecha_inicio) ?>', 1);"><div id="elh_mante_amb_fecha_inicio" class="mante_amb_fecha_inicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_list->fecha_inicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_list->fecha_inicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_list->fecha_inicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_list->fecha_fin->Visible) { // fecha_fin ?>
	<?php if ($mante_amb_list->SortUrl($mante_amb_list->fecha_fin) == "") { ?>
		<th data-name="fecha_fin" class="<?php echo $mante_amb_list->fecha_fin->headerCellClass() ?>"><div id="elh_mante_amb_fecha_fin" class="mante_amb_fecha_fin"><div class="ew-table-header-caption"><?php echo $mante_amb_list->fecha_fin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_fin" class="<?php echo $mante_amb_list->fecha_fin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mante_amb_list->SortUrl($mante_amb_list->fecha_fin) ?>', 1);"><div id="elh_mante_amb_fecha_fin" class="mante_amb_fecha_fin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_list->fecha_fin->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_list->fecha_fin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_list->fecha_fin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_list->taller->Visible) { // taller ?>
	<?php if ($mante_amb_list->SortUrl($mante_amb_list->taller) == "") { ?>
		<th data-name="taller" class="<?php echo $mante_amb_list->taller->headerCellClass() ?>"><div id="elh_mante_amb_taller" class="mante_amb_taller"><div class="ew-table-header-caption"><?php echo $mante_amb_list->taller->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="taller" class="<?php echo $mante_amb_list->taller->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mante_amb_list->SortUrl($mante_amb_list->taller) ?>', 1);"><div id="elh_mante_amb_taller" class="mante_amb_taller">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_list->taller->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_list->taller->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_list->taller->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mante_amb_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mante_amb_list->ExportAll && $mante_amb_list->isExport()) {
	$mante_amb_list->StopRecord = $mante_amb_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mante_amb_list->TotalRecords > $mante_amb_list->StartRecord + $mante_amb_list->DisplayRecords - 1)
		$mante_amb_list->StopRecord = $mante_amb_list->StartRecord + $mante_amb_list->DisplayRecords - 1;
	else
		$mante_amb_list->StopRecord = $mante_amb_list->TotalRecords;
}
$mante_amb_list->RecordCount = $mante_amb_list->StartRecord - 1;
if ($mante_amb_list->Recordset && !$mante_amb_list->Recordset->EOF) {
	$mante_amb_list->Recordset->moveFirst();
	$selectLimit = $mante_amb_list->UseSelectLimit;
	if (!$selectLimit && $mante_amb_list->StartRecord > 1)
		$mante_amb_list->Recordset->move($mante_amb_list->StartRecord - 1);
} elseif (!$mante_amb->AllowAddDeleteRow && $mante_amb_list->StopRecord == 0) {
	$mante_amb_list->StopRecord = $mante_amb->GridAddRowCount;
}

// Initialize aggregate
$mante_amb->RowType = ROWTYPE_AGGREGATEINIT;
$mante_amb->resetAttributes();
$mante_amb_list->renderRow();
while ($mante_amb_list->RecordCount < $mante_amb_list->StopRecord) {
	$mante_amb_list->RecordCount++;
	if ($mante_amb_list->RecordCount >= $mante_amb_list->StartRecord) {
		$mante_amb_list->RowCount++;

		// Set up key count
		$mante_amb_list->KeyCount = $mante_amb_list->RowIndex;

		// Init row class and style
		$mante_amb->resetAttributes();
		$mante_amb->CssClass = "";
		if ($mante_amb_list->isGridAdd()) {
		} else {
			$mante_amb_list->loadRowValues($mante_amb_list->Recordset); // Load row values
		}
		$mante_amb->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mante_amb->RowAttrs->merge(["data-rowindex" => $mante_amb_list->RowCount, "id" => "r" . $mante_amb_list->RowCount . "_mante_amb", "data-rowtype" => $mante_amb->RowType]);

		// Render row
		$mante_amb_list->renderRow();

		// Render list options
		$mante_amb_list->renderListOptions();
?>
	<tr <?php echo $mante_amb->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mante_amb_list->ListOptions->render("body", "left", $mante_amb_list->RowCount);
?>
	<?php if ($mante_amb_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mante_amb_list->id->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_list->RowCount ?>_mante_amb_id">
<span<?php echo $mante_amb_list->id->viewAttributes() ?>><?php echo $mante_amb_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mante_amb_list->id_ambulancias->Visible) { // id_ambulancias ?>
		<td data-name="id_ambulancias" <?php echo $mante_amb_list->id_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_list->RowCount ?>_mante_amb_id_ambulancias">
<span<?php echo $mante_amb_list->id_ambulancias->viewAttributes() ?>><?php echo $mante_amb_list->id_ambulancias->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mante_amb_list->fecha_inicio->Visible) { // fecha_inicio ?>
		<td data-name="fecha_inicio" <?php echo $mante_amb_list->fecha_inicio->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_list->RowCount ?>_mante_amb_fecha_inicio">
<span<?php echo $mante_amb_list->fecha_inicio->viewAttributes() ?>><?php echo $mante_amb_list->fecha_inicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mante_amb_list->fecha_fin->Visible) { // fecha_fin ?>
		<td data-name="fecha_fin" <?php echo $mante_amb_list->fecha_fin->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_list->RowCount ?>_mante_amb_fecha_fin">
<span<?php echo $mante_amb_list->fecha_fin->viewAttributes() ?>><?php echo $mante_amb_list->fecha_fin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mante_amb_list->taller->Visible) { // taller ?>
		<td data-name="taller" <?php echo $mante_amb_list->taller->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_list->RowCount ?>_mante_amb_taller">
<span<?php echo $mante_amb_list->taller->viewAttributes() ?>><?php echo $mante_amb_list->taller->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mante_amb_list->ListOptions->render("body", "right", $mante_amb_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mante_amb_list->isGridAdd())
		$mante_amb_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mante_amb->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mante_amb_list->Recordset)
	$mante_amb_list->Recordset->Close();
?>
<?php if (!$mante_amb_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mante_amb_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mante_amb_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mante_amb_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mante_amb_list->TotalRecords == 0 && !$mante_amb->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mante_amb_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mante_amb_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mante_amb_list->isExport()) { ?>
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
$mante_amb_list->terminate();
?>