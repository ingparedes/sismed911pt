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
$interh_maestro_list = new interh_maestro_list();

// Run the page
$interh_maestro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_maestro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_maestro_list->isExport()) { ?>
<script>
var finterh_maestrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_maestrolist = currentForm = new ew.Form("finterh_maestrolist", "list");
	finterh_maestrolist.formKeyCountName = '<?php echo $interh_maestro_list->FormKeyCountName ?>';
	loadjs.done("finterh_maestrolist");
});
var finterh_maestrolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finterh_maestrolistsrch = currentSearchForm = new ew.Form("finterh_maestrolistsrch");

	// Dynamic selection lists
	// Filters

	finterh_maestrolistsrch.filterList = <?php echo $interh_maestro_list->getFilterList() ?>;
	loadjs.done("finterh_maestrolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_maestro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_maestro_list->TotalRecords > 0 && $interh_maestro_list->ExportOptions->visible()) { ?>
<?php $interh_maestro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_maestro_list->ImportOptions->visible()) { ?>
<?php $interh_maestro_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_maestro_list->SearchOptions->visible()) { ?>
<?php $interh_maestro_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($interh_maestro_list->FilterOptions->visible()) { ?>
<?php $interh_maestro_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_maestro_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_maestro_list->isExport() && !$interh_maestro->CurrentAction) { ?>
<form name="finterh_maestrolistsrch" id="finterh_maestrolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finterh_maestrolistsrch-search-panel" class="<?php echo $interh_maestro_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_maestro">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $interh_maestro_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($interh_maestro_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($interh_maestro_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $interh_maestro_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($interh_maestro_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($interh_maestro_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($interh_maestro_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($interh_maestro_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $interh_maestro_list->showPageHeader(); ?>
<?php
$interh_maestro_list->showMessage();
?>
<?php if ($interh_maestro_list->TotalRecords > 0 || $interh_maestro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_maestro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_maestro">
<?php if (!$interh_maestro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$interh_maestro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_maestro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_maestro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finterh_maestrolist" id="finterh_maestrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_maestro">
<div id="gmp_interh_maestro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_maestro_list->TotalRecords > 0 || $interh_maestro_list->isGridEdit()) { ?>
<table id="tbl_interh_maestrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_maestro->RowType = ROWTYPE_HEADER;

// Render list options
$interh_maestro_list->renderListOptions();

// Render list options (header, left)
$interh_maestro_list->ListOptions->render("header", "left");
?>
<?php if ($interh_maestro_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_maestro_list->cod_casointerh->headerCellClass() ?>"><div id="elh_interh_maestro_cod_casointerh" class="interh_maestro_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_maestro_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->cod_casointerh) ?>', 1);"><div id="elh_interh_maestro_cod_casointerh" class="interh_maestro_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->cod_casointerh->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->fechahorainterh->Visible) { // fechahorainterh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->fechahorainterh) == "") { ?>
		<th data-name="fechahorainterh" class="<?php echo $interh_maestro_list->fechahorainterh->headerCellClass() ?>"><div id="elh_interh_maestro_fechahorainterh" class="interh_maestro_fechahorainterh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->fechahorainterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fechahorainterh" class="<?php echo $interh_maestro_list->fechahorainterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->fechahorainterh) ?>', 1);"><div id="elh_interh_maestro_fechahorainterh" class="interh_maestro_fechahorainterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->fechahorainterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->fechahorainterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->fechahorainterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->tiempo->Visible) { // tiempo ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->tiempo) == "") { ?>
		<th data-name="tiempo" class="<?php echo $interh_maestro_list->tiempo->headerCellClass() ?>"><div id="elh_interh_maestro_tiempo" class="interh_maestro_tiempo"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tiempo" class="<?php echo $interh_maestro_list->tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->tiempo) ?>', 1);"><div id="elh_interh_maestro_tiempo" class="interh_maestro_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->tiempo->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->hospital_origneinterh) == "") { ?>
		<th data-name="hospital_origneinterh" class="<?php echo $interh_maestro_list->hospital_origneinterh->headerCellClass() ?>"><div id="elh_interh_maestro_hospital_origneinterh" class="interh_maestro_hospital_origneinterh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->hospital_origneinterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital_origneinterh" class="<?php echo $interh_maestro_list->hospital_origneinterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->hospital_origneinterh) ?>', 1);"><div id="elh_interh_maestro_hospital_origneinterh" class="interh_maestro_hospital_origneinterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->hospital_origneinterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->hospital_origneinterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->hospital_origneinterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->motivo_atencioninteh) == "") { ?>
		<th data-name="motivo_atencioninteh" class="<?php echo $interh_maestro_list->motivo_atencioninteh->headerCellClass() ?>"><div id="elh_interh_maestro_motivo_atencioninteh" class="interh_maestro_motivo_atencioninteh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->motivo_atencioninteh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="motivo_atencioninteh" class="<?php echo $interh_maestro_list->motivo_atencioninteh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->motivo_atencioninteh) ?>', 1);"><div id="elh_interh_maestro_motivo_atencioninteh" class="interh_maestro_motivo_atencioninteh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->motivo_atencioninteh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->motivo_atencioninteh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->motivo_atencioninteh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->accioninterh->Visible) { // accioninterh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->accioninterh) == "") { ?>
		<th data-name="accioninterh" class="<?php echo $interh_maestro_list->accioninterh->headerCellClass() ?>"><div id="elh_interh_maestro_accioninterh" class="interh_maestro_accioninterh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->accioninterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="accioninterh" class="<?php echo $interh_maestro_list->accioninterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->accioninterh) ?>', 1);"><div id="elh_interh_maestro_accioninterh" class="interh_maestro_accioninterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->accioninterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->accioninterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->accioninterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->prioridadinterh->Visible) { // prioridadinterh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->prioridadinterh) == "") { ?>
		<th data-name="prioridadinterh" class="<?php echo $interh_maestro_list->prioridadinterh->headerCellClass() ?>"><div id="elh_interh_maestro_prioridadinterh" class="interh_maestro_prioridadinterh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->prioridadinterh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prioridadinterh" class="<?php echo $interh_maestro_list->prioridadinterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->prioridadinterh) ?>', 1);"><div id="elh_interh_maestro_prioridadinterh" class="interh_maestro_prioridadinterh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->prioridadinterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->prioridadinterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->prioridadinterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->estadointerh->Visible) { // estadointerh ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->estadointerh) == "") { ?>
		<th data-name="estadointerh" class="<?php echo $interh_maestro_list->estadointerh->headerCellClass() ?>"><div id="elh_interh_maestro_estadointerh" class="interh_maestro_estadointerh"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->estadointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estadointerh" class="<?php echo $interh_maestro_list->estadointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->estadointerh) ?>', 1);"><div id="elh_interh_maestro_estadointerh" class="interh_maestro_estadointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->estadointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->estadointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->estadointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->ambulancia->Visible) { // ambulancia ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->ambulancia) == "") { ?>
		<th data-name="ambulancia" class="<?php echo $interh_maestro_list->ambulancia->headerCellClass() ?>"><div id="elh_interh_maestro_ambulancia" class="interh_maestro_ambulancia"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->ambulancia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ambulancia" class="<?php echo $interh_maestro_list->ambulancia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->ambulancia) ?>', 1);"><div id="elh_interh_maestro_ambulancia" class="interh_maestro_ambulancia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->ambulancia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->ambulancia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->ambulancia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_maestro_list->paciente->Visible) { // paciente ?>
	<?php if ($interh_maestro_list->SortUrl($interh_maestro_list->paciente) == "") { ?>
		<th data-name="paciente" class="<?php echo $interh_maestro_list->paciente->headerCellClass() ?>"><div id="elh_interh_maestro_paciente" class="interh_maestro_paciente"><div class="ew-table-header-caption"><?php echo $interh_maestro_list->paciente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paciente" class="<?php echo $interh_maestro_list->paciente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_maestro_list->SortUrl($interh_maestro_list->paciente) ?>', 1);"><div id="elh_interh_maestro_paciente" class="interh_maestro_paciente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_maestro_list->paciente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_maestro_list->paciente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_maestro_list->paciente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_maestro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_maestro_list->ExportAll && $interh_maestro_list->isExport()) {
	$interh_maestro_list->StopRecord = $interh_maestro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_maestro_list->TotalRecords > $interh_maestro_list->StartRecord + $interh_maestro_list->DisplayRecords - 1)
		$interh_maestro_list->StopRecord = $interh_maestro_list->StartRecord + $interh_maestro_list->DisplayRecords - 1;
	else
		$interh_maestro_list->StopRecord = $interh_maestro_list->TotalRecords;
}
$interh_maestro_list->RecordCount = $interh_maestro_list->StartRecord - 1;
if ($interh_maestro_list->Recordset && !$interh_maestro_list->Recordset->EOF) {
	$interh_maestro_list->Recordset->moveFirst();
	$selectLimit = $interh_maestro_list->UseSelectLimit;
	if (!$selectLimit && $interh_maestro_list->StartRecord > 1)
		$interh_maestro_list->Recordset->move($interh_maestro_list->StartRecord - 1);
} elseif (!$interh_maestro->AllowAddDeleteRow && $interh_maestro_list->StopRecord == 0) {
	$interh_maestro_list->StopRecord = $interh_maestro->GridAddRowCount;
}

// Initialize aggregate
$interh_maestro->RowType = ROWTYPE_AGGREGATEINIT;
$interh_maestro->resetAttributes();
$interh_maestro_list->renderRow();
while ($interh_maestro_list->RecordCount < $interh_maestro_list->StopRecord) {
	$interh_maestro_list->RecordCount++;
	if ($interh_maestro_list->RecordCount >= $interh_maestro_list->StartRecord) {
		$interh_maestro_list->RowCount++;

		// Set up key count
		$interh_maestro_list->KeyCount = $interh_maestro_list->RowIndex;

		// Init row class and style
		$interh_maestro->resetAttributes();
		$interh_maestro->CssClass = "";
		if ($interh_maestro_list->isGridAdd()) {
		} else {
			$interh_maestro_list->loadRowValues($interh_maestro_list->Recordset); // Load row values
		}
		$interh_maestro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_maestro->RowAttrs->merge(["data-rowindex" => $interh_maestro_list->RowCount, "id" => "r" . $interh_maestro_list->RowCount . "_interh_maestro", "data-rowtype" => $interh_maestro->RowType]);

		// Render row
		$interh_maestro_list->renderRow();

		// Render list options
		$interh_maestro_list->renderListOptions();
?>
	<tr <?php echo $interh_maestro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_maestro_list->ListOptions->render("body", "left", $interh_maestro_list->RowCount);
?>
	<?php if ($interh_maestro_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $interh_maestro_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_cod_casointerh">
<span<?php echo $interh_maestro_list->cod_casointerh->viewAttributes() ?>><?php echo $interh_maestro_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->fechahorainterh->Visible) { // fechahorainterh ?>
		<td data-name="fechahorainterh" <?php echo $interh_maestro_list->fechahorainterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_fechahorainterh">
<span<?php echo $interh_maestro_list->fechahorainterh->viewAttributes() ?>><?php echo $interh_maestro_list->fechahorainterh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->tiempo->Visible) { // tiempo ?>
		<td data-name="tiempo" <?php echo $interh_maestro_list->tiempo->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_tiempo">
<span<?php echo $interh_maestro_list->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
		<td data-name="hospital_origneinterh" <?php echo $interh_maestro_list->hospital_origneinterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_hospital_origneinterh">
<span<?php echo $interh_maestro_list->hospital_origneinterh->viewAttributes() ?>><?php echo $interh_maestro_list->hospital_origneinterh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
		<td data-name="motivo_atencioninteh" <?php echo $interh_maestro_list->motivo_atencioninteh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_motivo_atencioninteh">
<span<?php echo $interh_maestro_list->motivo_atencioninteh->viewAttributes() ?>><?php echo $interh_maestro_list->motivo_atencioninteh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->accioninterh->Visible) { // accioninterh ?>
		<td data-name="accioninterh" <?php echo $interh_maestro_list->accioninterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_accioninterh">
<span<?php echo $interh_maestro_list->accioninterh->viewAttributes() ?>><?php echo $interh_maestro_list->accioninterh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->prioridadinterh->Visible) { // prioridadinterh ?>
		<td data-name="prioridadinterh" <?php echo $interh_maestro_list->prioridadinterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_prioridadinterh">
<span<?php echo $interh_maestro_list->prioridadinterh->viewAttributes() ?>><?php
if(CurrentPage()->prioridadinterh->CurrentValue == 1)
echo "<i class='fas fa-caret-up'></i> ".CurrentPage()->prioridadinterh->CurrentValue. "High";
elseif (CurrentPage()->prioridadinterh->CurrentValue == 2)
echo "<i class='fas fa-caret-left'></i> ".CurrentPage()->prioridadinterh->CurrentValue. " Medium";
else
echo "<i class='fas fa-caret-down'></i> ".CurrentPage()->prioridadinterh->CurrentValue. " Low";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->estadointerh->Visible) { // estadointerh ?>
		<td data-name="estadointerh" <?php echo $interh_maestro_list->estadointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_estadointerh">
<span<?php echo $interh_maestro_list->estadointerh->viewAttributes() ?>><?php
$h_asigna = ExecuteScalar("SELECT hora_asigna FROM interh_maestro INNER JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.id_maestrointerh WHERE interh_maestro.cod_casointerh =".CurrentPage()->cod_casointerh->CurrentValue);
$h_llegada = ExecuteScalar("SELECT hora_llegada FROM interh_maestro INNER JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.id_maestrointerh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
$h_hospital = ExecuteScalar("SELECT hora_destino FROM interh_maestro INNER JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.id_maestrointerh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
if ( $h_asigna <> '')
echo "<small><li class = 'badge bg-info'> <i class='fas fa-check'></i> Asignada </li></small>";
if ( $h_llegada <> '')
echo "<small><li class = 'badge bg-secondary'> <i class='fas fa-check'></i> Destino </li></small>";
if ( $h_hospital <> '')
echo "<small><li class = 'badge bg-success'> <i class='fas fa-check'></i> Hospital </li></small>";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->ambulancia->Visible) { // ambulancia ?>
		<td data-name="ambulancia" <?php echo $interh_maestro_list->ambulancia->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_ambulancia">
<span<?php echo $interh_maestro_list->ambulancia->viewAttributes() ?>><?php
$ambu = ExecuteScalar("SELECT servicio_ambulancia.cod_ambulancia FROM servicio_ambulancia WHERE id_maestrointerh =".CurrentPage()->cod_casointerh->CurrentValue);
echo $ambu;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_maestro_list->paciente->Visible) { // paciente ?>
		<td data-name="paciente" <?php echo $interh_maestro_list->paciente->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_list->RowCount ?>_interh_maestro_paciente">
<span<?php echo $interh_maestro_list->paciente->viewAttributes() ?>><?php
$genero = ExecuteScalar("SELECT edad FROM pacientegeneral INNER JOIN interh_maestro ON interh_maestro.cod_casointerh = pacientegeneral.cod_pacienteinterh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
$cod_ide = ExecuteScalar("SELECT num_doc FROM pacientegeneral INNER JOIN interh_maestro ON interh_maestro.cod_casointerh = pacientegeneral.cod_pacienteinterh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
if ( $genero <> '' or $cod_ide <> '')
 echo "<i class='icofont-check-circled icofont-3x'></i> </br>"."Registrado";
?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_maestro_list->ListOptions->render("body", "right", $interh_maestro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$interh_maestro_list->isGridAdd())
		$interh_maestro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_maestro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_maestro_list->Recordset)
	$interh_maestro_list->Recordset->Close();
?>
<?php if (!$interh_maestro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_maestro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_maestro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_maestro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_maestro_list->TotalRecords == 0 && !$interh_maestro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_maestro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$interh_maestro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_maestro_list->isExport()) { ?>
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
$interh_maestro_list->terminate();
?>