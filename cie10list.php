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
$cie10_list = new cie10_list();

// Run the page
$cie10_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$cie10_list->isExport()) { ?>
<script>
var fcie10list, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcie10list = currentForm = new ew.Form("fcie10list", "list");
	fcie10list.formKeyCountName = '<?php echo $cie10_list->FormKeyCountName ?>';
	loadjs.done("fcie10list");
});
var fcie10listsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcie10listsrch = currentSearchForm = new ew.Form("fcie10listsrch");

	// Dynamic selection lists
	// Filters

	fcie10listsrch.filterList = <?php echo $cie10_list->getFilterList() ?>;
	loadjs.done("fcie10listsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$cie10_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($cie10_list->TotalRecords > 0 && $cie10_list->ExportOptions->visible()) { ?>
<?php $cie10_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($cie10_list->ImportOptions->visible()) { ?>
<?php $cie10_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($cie10_list->SearchOptions->visible()) { ?>
<?php $cie10_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($cie10_list->FilterOptions->visible()) { ?>
<?php $cie10_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$cie10_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$cie10_list->isExport() && !$cie10->CurrentAction) { ?>
<form name="fcie10listsrch" id="fcie10listsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcie10listsrch-search-panel" class="<?php echo $cie10_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="cie10">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $cie10_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($cie10_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($cie10_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $cie10_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($cie10_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($cie10_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($cie10_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($cie10_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $cie10_list->showPageHeader(); ?>
<?php
$cie10_list->showMessage();
?>
<?php if ($cie10_list->TotalRecords > 0 || $cie10->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($cie10_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> cie10">
<?php if (!$cie10_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$cie10_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $cie10_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $cie10_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcie10list" id="fcie10list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10">
<div id="gmp_cie10" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($cie10_list->TotalRecords > 0 || $cie10_list->isGridEdit()) { ?>
<table id="tbl_cie10list" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$cie10->RowType = ROWTYPE_HEADER;

// Render list options
$cie10_list->renderListOptions();

// Render list options (header, left)
$cie10_list->ListOptions->render("header", "left");
?>
<?php if ($cie10_list->codigo_cie->Visible) { // codigo_cie ?>
	<?php if ($cie10_list->SortUrl($cie10_list->codigo_cie) == "") { ?>
		<th data-name="codigo_cie" class="<?php echo $cie10_list->codigo_cie->headerCellClass() ?>"><div id="elh_cie10_codigo_cie" class="cie10_codigo_cie"><div class="ew-table-header-caption"><?php echo $cie10_list->codigo_cie->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="codigo_cie" class="<?php echo $cie10_list->codigo_cie->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->codigo_cie) ?>', 1);"><div id="elh_cie10_codigo_cie" class="cie10_codigo_cie">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->codigo_cie->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->codigo_cie->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->codigo_cie->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->diagnostico->Visible) { // diagnostico ?>
	<?php if ($cie10_list->SortUrl($cie10_list->diagnostico) == "") { ?>
		<th data-name="diagnostico" class="<?php echo $cie10_list->diagnostico->headerCellClass() ?>"><div id="elh_cie10_diagnostico" class="cie10_diagnostico"><div class="ew-table-header-caption"><?php echo $cie10_list->diagnostico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diagnostico" class="<?php echo $cie10_list->diagnostico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->diagnostico) ?>', 1);"><div id="elh_cie10_diagnostico" class="cie10_diagnostico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->diagnostico->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->diagnostico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->diagnostico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->nivel->Visible) { // nivel ?>
	<?php if ($cie10_list->SortUrl($cie10_list->nivel) == "") { ?>
		<th data-name="nivel" class="<?php echo $cie10_list->nivel->headerCellClass() ?>"><div id="elh_cie10_nivel" class="cie10_nivel"><div class="ew-table-header-caption"><?php echo $cie10_list->nivel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel" class="<?php echo $cie10_list->nivel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->nivel) ?>', 1);"><div id="elh_cie10_nivel" class="cie10_nivel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->nivel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->nivel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->nivel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->grupo->Visible) { // grupo ?>
	<?php if ($cie10_list->SortUrl($cie10_list->grupo) == "") { ?>
		<th data-name="grupo" class="<?php echo $cie10_list->grupo->headerCellClass() ?>"><div id="elh_cie10_grupo" class="cie10_grupo"><div class="ew-table-header-caption"><?php echo $cie10_list->grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grupo" class="<?php echo $cie10_list->grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->grupo) ?>', 1);"><div id="elh_cie10_grupo" class="cie10_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->grupo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->grupo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->grupo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->sexo->Visible) { // sexo ?>
	<?php if ($cie10_list->SortUrl($cie10_list->sexo) == "") { ?>
		<th data-name="sexo" class="<?php echo $cie10_list->sexo->headerCellClass() ?>"><div id="elh_cie10_sexo" class="cie10_sexo"><div class="ew-table-header-caption"><?php echo $cie10_list->sexo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sexo" class="<?php echo $cie10_list->sexo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->sexo) ?>', 1);"><div id="elh_cie10_sexo" class="cie10_sexo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->sexo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->sexo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->sexo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->clasificacion->Visible) { // clasificacion ?>
	<?php if ($cie10_list->SortUrl($cie10_list->clasificacion) == "") { ?>
		<th data-name="clasificacion" class="<?php echo $cie10_list->clasificacion->headerCellClass() ?>"><div id="elh_cie10_clasificacion" class="cie10_clasificacion"><div class="ew-table-header-caption"><?php echo $cie10_list->clasificacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="clasificacion" class="<?php echo $cie10_list->clasificacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->clasificacion) ?>', 1);"><div id="elh_cie10_clasificacion" class="cie10_clasificacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->clasificacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->clasificacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->clasificacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->cod->Visible) { // cod ?>
	<?php if ($cie10_list->SortUrl($cie10_list->cod) == "") { ?>
		<th data-name="cod" class="<?php echo $cie10_list->cod->headerCellClass() ?>"><div id="elh_cie10_cod" class="cie10_cod"><div class="ew-table-header-caption"><?php echo $cie10_list->cod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod" class="<?php echo $cie10_list->cod->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->cod) ?>', 1);"><div id="elh_cie10_cod" class="cie10_cod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->cod->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->cod->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->cod->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->notifica->Visible) { // notifica ?>
	<?php if ($cie10_list->SortUrl($cie10_list->notifica) == "") { ?>
		<th data-name="notifica" class="<?php echo $cie10_list->notifica->headerCellClass() ?>"><div id="elh_cie10_notifica" class="cie10_notifica"><div class="ew-table-header-caption"><?php echo $cie10_list->notifica->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="notifica" class="<?php echo $cie10_list->notifica->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->notifica) ?>', 1);"><div id="elh_cie10_notifica" class="cie10_notifica">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->notifica->caption() ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->notifica->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->notifica->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->soat->Visible) { // soat ?>
	<?php if ($cie10_list->SortUrl($cie10_list->soat) == "") { ?>
		<th data-name="soat" class="<?php echo $cie10_list->soat->headerCellClass() ?>"><div id="elh_cie10_soat" class="cie10_soat"><div class="ew-table-header-caption"><?php echo $cie10_list->soat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="soat" class="<?php echo $cie10_list->soat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->soat) ?>', 1);"><div id="elh_cie10_soat" class="cie10_soat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->soat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->soat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->soat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->diagnostico_en->Visible) { // diagnostico_en ?>
	<?php if ($cie10_list->SortUrl($cie10_list->diagnostico_en) == "") { ?>
		<th data-name="diagnostico_en" class="<?php echo $cie10_list->diagnostico_en->headerCellClass() ?>"><div id="elh_cie10_diagnostico_en" class="cie10_diagnostico_en"><div class="ew-table-header-caption"><?php echo $cie10_list->diagnostico_en->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diagnostico_en" class="<?php echo $cie10_list->diagnostico_en->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->diagnostico_en) ?>', 1);"><div id="elh_cie10_diagnostico_en" class="cie10_diagnostico_en">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->diagnostico_en->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->diagnostico_en->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->diagnostico_en->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->diagnostico_pr->Visible) { // diagnostico_pr ?>
	<?php if ($cie10_list->SortUrl($cie10_list->diagnostico_pr) == "") { ?>
		<th data-name="diagnostico_pr" class="<?php echo $cie10_list->diagnostico_pr->headerCellClass() ?>"><div id="elh_cie10_diagnostico_pr" class="cie10_diagnostico_pr"><div class="ew-table-header-caption"><?php echo $cie10_list->diagnostico_pr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diagnostico_pr" class="<?php echo $cie10_list->diagnostico_pr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->diagnostico_pr) ?>', 1);"><div id="elh_cie10_diagnostico_pr" class="cie10_diagnostico_pr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->diagnostico_pr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->diagnostico_pr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->diagnostico_pr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cie10_list->diagnostico_fr->Visible) { // diagnostico_fr ?>
	<?php if ($cie10_list->SortUrl($cie10_list->diagnostico_fr) == "") { ?>
		<th data-name="diagnostico_fr" class="<?php echo $cie10_list->diagnostico_fr->headerCellClass() ?>"><div id="elh_cie10_diagnostico_fr" class="cie10_diagnostico_fr"><div class="ew-table-header-caption"><?php echo $cie10_list->diagnostico_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diagnostico_fr" class="<?php echo $cie10_list->diagnostico_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $cie10_list->SortUrl($cie10_list->diagnostico_fr) ?>', 1);"><div id="elh_cie10_diagnostico_fr" class="cie10_diagnostico_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cie10_list->diagnostico_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cie10_list->diagnostico_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($cie10_list->diagnostico_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$cie10_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($cie10_list->ExportAll && $cie10_list->isExport()) {
	$cie10_list->StopRecord = $cie10_list->TotalRecords;
} else {

	// Set the last record to display
	if ($cie10_list->TotalRecords > $cie10_list->StartRecord + $cie10_list->DisplayRecords - 1)
		$cie10_list->StopRecord = $cie10_list->StartRecord + $cie10_list->DisplayRecords - 1;
	else
		$cie10_list->StopRecord = $cie10_list->TotalRecords;
}
$cie10_list->RecordCount = $cie10_list->StartRecord - 1;
if ($cie10_list->Recordset && !$cie10_list->Recordset->EOF) {
	$cie10_list->Recordset->moveFirst();
	$selectLimit = $cie10_list->UseSelectLimit;
	if (!$selectLimit && $cie10_list->StartRecord > 1)
		$cie10_list->Recordset->move($cie10_list->StartRecord - 1);
} elseif (!$cie10->AllowAddDeleteRow && $cie10_list->StopRecord == 0) {
	$cie10_list->StopRecord = $cie10->GridAddRowCount;
}

// Initialize aggregate
$cie10->RowType = ROWTYPE_AGGREGATEINIT;
$cie10->resetAttributes();
$cie10_list->renderRow();
while ($cie10_list->RecordCount < $cie10_list->StopRecord) {
	$cie10_list->RecordCount++;
	if ($cie10_list->RecordCount >= $cie10_list->StartRecord) {
		$cie10_list->RowCount++;

		// Set up key count
		$cie10_list->KeyCount = $cie10_list->RowIndex;

		// Init row class and style
		$cie10->resetAttributes();
		$cie10->CssClass = "";
		if ($cie10_list->isGridAdd()) {
		} else {
			$cie10_list->loadRowValues($cie10_list->Recordset); // Load row values
		}
		$cie10->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$cie10->RowAttrs->merge(["data-rowindex" => $cie10_list->RowCount, "id" => "r" . $cie10_list->RowCount . "_cie10", "data-rowtype" => $cie10->RowType]);

		// Render row
		$cie10_list->renderRow();

		// Render list options
		$cie10_list->renderListOptions();
?>
	<tr <?php echo $cie10->rowAttributes() ?>>
<?php

// Render list options (body, left)
$cie10_list->ListOptions->render("body", "left", $cie10_list->RowCount);
?>
	<?php if ($cie10_list->codigo_cie->Visible) { // codigo_cie ?>
		<td data-name="codigo_cie" <?php echo $cie10_list->codigo_cie->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_codigo_cie">
<span<?php echo $cie10_list->codigo_cie->viewAttributes() ?>><?php echo $cie10_list->codigo_cie->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->diagnostico->Visible) { // diagnostico ?>
		<td data-name="diagnostico" <?php echo $cie10_list->diagnostico->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_diagnostico">
<span<?php echo $cie10_list->diagnostico->viewAttributes() ?>><?php echo $cie10_list->diagnostico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->nivel->Visible) { // nivel ?>
		<td data-name="nivel" <?php echo $cie10_list->nivel->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_nivel">
<span<?php echo $cie10_list->nivel->viewAttributes() ?>><?php echo $cie10_list->nivel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->grupo->Visible) { // grupo ?>
		<td data-name="grupo" <?php echo $cie10_list->grupo->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_grupo">
<span<?php echo $cie10_list->grupo->viewAttributes() ?>><?php echo $cie10_list->grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->sexo->Visible) { // sexo ?>
		<td data-name="sexo" <?php echo $cie10_list->sexo->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_sexo">
<span<?php echo $cie10_list->sexo->viewAttributes() ?>><?php echo $cie10_list->sexo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->clasificacion->Visible) { // clasificacion ?>
		<td data-name="clasificacion" <?php echo $cie10_list->clasificacion->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_clasificacion">
<span<?php echo $cie10_list->clasificacion->viewAttributes() ?>><?php echo $cie10_list->clasificacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->cod->Visible) { // cod ?>
		<td data-name="cod" <?php echo $cie10_list->cod->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_cod">
<span<?php echo $cie10_list->cod->viewAttributes() ?>><?php echo $cie10_list->cod->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->notifica->Visible) { // notifica ?>
		<td data-name="notifica" <?php echo $cie10_list->notifica->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_notifica">
<span<?php echo $cie10_list->notifica->viewAttributes() ?>><?php echo $cie10_list->notifica->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->soat->Visible) { // soat ?>
		<td data-name="soat" <?php echo $cie10_list->soat->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_soat">
<span<?php echo $cie10_list->soat->viewAttributes() ?>><?php echo $cie10_list->soat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->diagnostico_en->Visible) { // diagnostico_en ?>
		<td data-name="diagnostico_en" <?php echo $cie10_list->diagnostico_en->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_diagnostico_en">
<span<?php echo $cie10_list->diagnostico_en->viewAttributes() ?>><?php echo $cie10_list->diagnostico_en->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->diagnostico_pr->Visible) { // diagnostico_pr ?>
		<td data-name="diagnostico_pr" <?php echo $cie10_list->diagnostico_pr->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_diagnostico_pr">
<span<?php echo $cie10_list->diagnostico_pr->viewAttributes() ?>><?php echo $cie10_list->diagnostico_pr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cie10_list->diagnostico_fr->Visible) { // diagnostico_fr ?>
		<td data-name="diagnostico_fr" <?php echo $cie10_list->diagnostico_fr->cellAttributes() ?>>
<span id="el<?php echo $cie10_list->RowCount ?>_cie10_diagnostico_fr">
<span<?php echo $cie10_list->diagnostico_fr->viewAttributes() ?>><?php echo $cie10_list->diagnostico_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$cie10_list->ListOptions->render("body", "right", $cie10_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$cie10_list->isGridAdd())
		$cie10_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$cie10->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($cie10_list->Recordset)
	$cie10_list->Recordset->Close();
?>
<?php if (!$cie10_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$cie10_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $cie10_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $cie10_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($cie10_list->TotalRecords == 0 && !$cie10->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $cie10_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$cie10_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$cie10_list->isExport()) { ?>
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
$cie10_list->terminate();
?>