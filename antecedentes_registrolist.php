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
$antecedentes_registro_list = new antecedentes_registro_list();

// Run the page
$antecedentes_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$antecedentes_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$antecedentes_registro_list->isExport()) { ?>
<script>
var fantecedentes_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fantecedentes_registrolist = currentForm = new ew.Form("fantecedentes_registrolist", "list");
	fantecedentes_registrolist.formKeyCountName = '<?php echo $antecedentes_registro_list->FormKeyCountName ?>';
	loadjs.done("fantecedentes_registrolist");
});
var fantecedentes_registrolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fantecedentes_registrolistsrch = currentSearchForm = new ew.Form("fantecedentes_registrolistsrch");

	// Dynamic selection lists
	// Filters

	fantecedentes_registrolistsrch.filterList = <?php echo $antecedentes_registro_list->getFilterList() ?>;
	loadjs.done("fantecedentes_registrolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$antecedentes_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($antecedentes_registro_list->TotalRecords > 0 && $antecedentes_registro_list->ExportOptions->visible()) { ?>
<?php $antecedentes_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($antecedentes_registro_list->ImportOptions->visible()) { ?>
<?php $antecedentes_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($antecedentes_registro_list->SearchOptions->visible()) { ?>
<?php $antecedentes_registro_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($antecedentes_registro_list->FilterOptions->visible()) { ?>
<?php $antecedentes_registro_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$antecedentes_registro_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$antecedentes_registro_list->isExport() && !$antecedentes_registro->CurrentAction) { ?>
<form name="fantecedentes_registrolistsrch" id="fantecedentes_registrolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fantecedentes_registrolistsrch-search-panel" class="<?php echo $antecedentes_registro_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="antecedentes_registro">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $antecedentes_registro_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($antecedentes_registro_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($antecedentes_registro_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $antecedentes_registro_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($antecedentes_registro_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($antecedentes_registro_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($antecedentes_registro_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($antecedentes_registro_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $antecedentes_registro_list->showPageHeader(); ?>
<?php
$antecedentes_registro_list->showMessage();
?>
<?php if ($antecedentes_registro_list->TotalRecords > 0 || $antecedentes_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($antecedentes_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> antecedentes_registro">
<?php if (!$antecedentes_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$antecedentes_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $antecedentes_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $antecedentes_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fantecedentes_registrolist" id="fantecedentes_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="antecedentes_registro">
<div id="gmp_antecedentes_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($antecedentes_registro_list->TotalRecords > 0 || $antecedentes_registro_list->isGridEdit()) { ?>
<table id="tbl_antecedentes_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$antecedentes_registro->RowType = ROWTYPE_HEADER;

// Render list options
$antecedentes_registro_list->renderListOptions();

// Render list options (header, left)
$antecedentes_registro_list->ListOptions->render("header", "left");
?>
<?php if ($antecedentes_registro_list->id->Visible) { // id ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $antecedentes_registro_list->id->headerCellClass() ?>"><div id="elh_antecedentes_registro_id" class="antecedentes_registro_id"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $antecedentes_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->id) ?>', 1);"><div id="elh_antecedentes_registro_id" class="antecedentes_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $antecedentes_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_antecedentes_registro_cod_casopreh" class="antecedentes_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $antecedentes_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->cod_casopreh) ?>', 1);"><div id="elh_antecedentes_registro_cod_casopreh" class="antecedentes_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->diabetes->Visible) { // diabetes ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->diabetes) == "") { ?>
		<th data-name="diabetes" class="<?php echo $antecedentes_registro_list->diabetes->headerCellClass() ?>"><div id="elh_antecedentes_registro_diabetes" class="antecedentes_registro_diabetes"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->diabetes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diabetes" class="<?php echo $antecedentes_registro_list->diabetes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->diabetes) ?>', 1);"><div id="elh_antecedentes_registro_diabetes" class="antecedentes_registro_diabetes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->diabetes->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->diabetes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->diabetes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->cardiopatia->Visible) { // cardiopatia ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->cardiopatia) == "") { ?>
		<th data-name="cardiopatia" class="<?php echo $antecedentes_registro_list->cardiopatia->headerCellClass() ?>"><div id="elh_antecedentes_registro_cardiopatia" class="antecedentes_registro_cardiopatia"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->cardiopatia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cardiopatia" class="<?php echo $antecedentes_registro_list->cardiopatia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->cardiopatia) ?>', 1);"><div id="elh_antecedentes_registro_cardiopatia" class="antecedentes_registro_cardiopatia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->cardiopatia->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->cardiopatia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->cardiopatia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->convulsiones->Visible) { // convulsiones ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->convulsiones) == "") { ?>
		<th data-name="convulsiones" class="<?php echo $antecedentes_registro_list->convulsiones->headerCellClass() ?>"><div id="elh_antecedentes_registro_convulsiones" class="antecedentes_registro_convulsiones"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->convulsiones->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="convulsiones" class="<?php echo $antecedentes_registro_list->convulsiones->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->convulsiones) ?>', 1);"><div id="elh_antecedentes_registro_convulsiones" class="antecedentes_registro_convulsiones">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->convulsiones->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->convulsiones->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->convulsiones->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->asmabronquitis->Visible) { // asmabronquitis ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->asmabronquitis) == "") { ?>
		<th data-name="asmabronquitis" class="<?php echo $antecedentes_registro_list->asmabronquitis->headerCellClass() ?>"><div id="elh_antecedentes_registro_asmabronquitis" class="antecedentes_registro_asmabronquitis"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->asmabronquitis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asmabronquitis" class="<?php echo $antecedentes_registro_list->asmabronquitis->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->asmabronquitis) ?>', 1);"><div id="elh_antecedentes_registro_asmabronquitis" class="antecedentes_registro_asmabronquitis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->asmabronquitis->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->asmabronquitis->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->asmabronquitis->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->acv->Visible) { // acv ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->acv) == "") { ?>
		<th data-name="acv" class="<?php echo $antecedentes_registro_list->acv->headerCellClass() ?>"><div id="elh_antecedentes_registro_acv" class="antecedentes_registro_acv"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->acv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acv" class="<?php echo $antecedentes_registro_list->acv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->acv) ?>', 1);"><div id="elh_antecedentes_registro_acv" class="antecedentes_registro_acv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->acv->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->acv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->acv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->has->Visible) { // has ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->has) == "") { ?>
		<th data-name="has" class="<?php echo $antecedentes_registro_list->has->headerCellClass() ?>"><div id="elh_antecedentes_registro_has" class="antecedentes_registro_has"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->has->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="has" class="<?php echo $antecedentes_registro_list->has->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->has) ?>', 1);"><div id="elh_antecedentes_registro_has" class="antecedentes_registro_has">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->has->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->has->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->has->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->alergia->Visible) { // alergia ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->alergia) == "") { ?>
		<th data-name="alergia" class="<?php echo $antecedentes_registro_list->alergia->headerCellClass() ?>"><div id="elh_antecedentes_registro_alergia" class="antecedentes_registro_alergia"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->alergia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alergia" class="<?php echo $antecedentes_registro_list->alergia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->alergia) ?>', 1);"><div id="elh_antecedentes_registro_alergia" class="antecedentes_registro_alergia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->alergia->caption() ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->alergia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->alergia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->medicamentos->Visible) { // medicamentos ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->medicamentos) == "") { ?>
		<th data-name="medicamentos" class="<?php echo $antecedentes_registro_list->medicamentos->headerCellClass() ?>"><div id="elh_antecedentes_registro_medicamentos" class="antecedentes_registro_medicamentos"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->medicamentos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="medicamentos" class="<?php echo $antecedentes_registro_list->medicamentos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->medicamentos) ?>', 1);"><div id="elh_antecedentes_registro_medicamentos" class="antecedentes_registro_medicamentos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->medicamentos->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->medicamentos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->medicamentos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($antecedentes_registro_list->otros->Visible) { // otros ?>
	<?php if ($antecedentes_registro_list->SortUrl($antecedentes_registro_list->otros) == "") { ?>
		<th data-name="otros" class="<?php echo $antecedentes_registro_list->otros->headerCellClass() ?>"><div id="elh_antecedentes_registro_otros" class="antecedentes_registro_otros"><div class="ew-table-header-caption"><?php echo $antecedentes_registro_list->otros->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="otros" class="<?php echo $antecedentes_registro_list->otros->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $antecedentes_registro_list->SortUrl($antecedentes_registro_list->otros) ?>', 1);"><div id="elh_antecedentes_registro_otros" class="antecedentes_registro_otros">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $antecedentes_registro_list->otros->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($antecedentes_registro_list->otros->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($antecedentes_registro_list->otros->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$antecedentes_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($antecedentes_registro_list->ExportAll && $antecedentes_registro_list->isExport()) {
	$antecedentes_registro_list->StopRecord = $antecedentes_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($antecedentes_registro_list->TotalRecords > $antecedentes_registro_list->StartRecord + $antecedentes_registro_list->DisplayRecords - 1)
		$antecedentes_registro_list->StopRecord = $antecedentes_registro_list->StartRecord + $antecedentes_registro_list->DisplayRecords - 1;
	else
		$antecedentes_registro_list->StopRecord = $antecedentes_registro_list->TotalRecords;
}
$antecedentes_registro_list->RecordCount = $antecedentes_registro_list->StartRecord - 1;
if ($antecedentes_registro_list->Recordset && !$antecedentes_registro_list->Recordset->EOF) {
	$antecedentes_registro_list->Recordset->moveFirst();
	$selectLimit = $antecedentes_registro_list->UseSelectLimit;
	if (!$selectLimit && $antecedentes_registro_list->StartRecord > 1)
		$antecedentes_registro_list->Recordset->move($antecedentes_registro_list->StartRecord - 1);
} elseif (!$antecedentes_registro->AllowAddDeleteRow && $antecedentes_registro_list->StopRecord == 0) {
	$antecedentes_registro_list->StopRecord = $antecedentes_registro->GridAddRowCount;
}

// Initialize aggregate
$antecedentes_registro->RowType = ROWTYPE_AGGREGATEINIT;
$antecedentes_registro->resetAttributes();
$antecedentes_registro_list->renderRow();
while ($antecedentes_registro_list->RecordCount < $antecedentes_registro_list->StopRecord) {
	$antecedentes_registro_list->RecordCount++;
	if ($antecedentes_registro_list->RecordCount >= $antecedentes_registro_list->StartRecord) {
		$antecedentes_registro_list->RowCount++;

		// Set up key count
		$antecedentes_registro_list->KeyCount = $antecedentes_registro_list->RowIndex;

		// Init row class and style
		$antecedentes_registro->resetAttributes();
		$antecedentes_registro->CssClass = "";
		if ($antecedentes_registro_list->isGridAdd()) {
		} else {
			$antecedentes_registro_list->loadRowValues($antecedentes_registro_list->Recordset); // Load row values
		}
		$antecedentes_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$antecedentes_registro->RowAttrs->merge(["data-rowindex" => $antecedentes_registro_list->RowCount, "id" => "r" . $antecedentes_registro_list->RowCount . "_antecedentes_registro", "data-rowtype" => $antecedentes_registro->RowType]);

		// Render row
		$antecedentes_registro_list->renderRow();

		// Render list options
		$antecedentes_registro_list->renderListOptions();
?>
	<tr <?php echo $antecedentes_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$antecedentes_registro_list->ListOptions->render("body", "left", $antecedentes_registro_list->RowCount);
?>
	<?php if ($antecedentes_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $antecedentes_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_id">
<span<?php echo $antecedentes_registro_list->id->viewAttributes() ?>><?php echo $antecedentes_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $antecedentes_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_cod_casopreh">
<span<?php echo $antecedentes_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $antecedentes_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->diabetes->Visible) { // diabetes ?>
		<td data-name="diabetes" <?php echo $antecedentes_registro_list->diabetes->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_diabetes">
<span<?php echo $antecedentes_registro_list->diabetes->viewAttributes() ?>><?php echo $antecedentes_registro_list->diabetes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->cardiopatia->Visible) { // cardiopatia ?>
		<td data-name="cardiopatia" <?php echo $antecedentes_registro_list->cardiopatia->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_cardiopatia">
<span<?php echo $antecedentes_registro_list->cardiopatia->viewAttributes() ?>><?php echo $antecedentes_registro_list->cardiopatia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->convulsiones->Visible) { // convulsiones ?>
		<td data-name="convulsiones" <?php echo $antecedentes_registro_list->convulsiones->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_convulsiones">
<span<?php echo $antecedentes_registro_list->convulsiones->viewAttributes() ?>><?php echo $antecedentes_registro_list->convulsiones->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->asmabronquitis->Visible) { // asmabronquitis ?>
		<td data-name="asmabronquitis" <?php echo $antecedentes_registro_list->asmabronquitis->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_asmabronquitis">
<span<?php echo $antecedentes_registro_list->asmabronquitis->viewAttributes() ?>><?php echo $antecedentes_registro_list->asmabronquitis->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->acv->Visible) { // acv ?>
		<td data-name="acv" <?php echo $antecedentes_registro_list->acv->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_acv">
<span<?php echo $antecedentes_registro_list->acv->viewAttributes() ?>><?php echo $antecedentes_registro_list->acv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->has->Visible) { // has ?>
		<td data-name="has" <?php echo $antecedentes_registro_list->has->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_has">
<span<?php echo $antecedentes_registro_list->has->viewAttributes() ?>><?php echo $antecedentes_registro_list->has->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->alergia->Visible) { // alergia ?>
		<td data-name="alergia" <?php echo $antecedentes_registro_list->alergia->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_alergia">
<span<?php echo $antecedentes_registro_list->alergia->viewAttributes() ?>><?php echo $antecedentes_registro_list->alergia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->medicamentos->Visible) { // medicamentos ?>
		<td data-name="medicamentos" <?php echo $antecedentes_registro_list->medicamentos->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_medicamentos">
<span<?php echo $antecedentes_registro_list->medicamentos->viewAttributes() ?>><?php echo $antecedentes_registro_list->medicamentos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($antecedentes_registro_list->otros->Visible) { // otros ?>
		<td data-name="otros" <?php echo $antecedentes_registro_list->otros->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_list->RowCount ?>_antecedentes_registro_otros">
<span<?php echo $antecedentes_registro_list->otros->viewAttributes() ?>><?php echo $antecedentes_registro_list->otros->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$antecedentes_registro_list->ListOptions->render("body", "right", $antecedentes_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$antecedentes_registro_list->isGridAdd())
		$antecedentes_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$antecedentes_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($antecedentes_registro_list->Recordset)
	$antecedentes_registro_list->Recordset->Close();
?>
<?php if (!$antecedentes_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$antecedentes_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $antecedentes_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $antecedentes_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($antecedentes_registro_list->TotalRecords == 0 && !$antecedentes_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $antecedentes_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$antecedentes_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$antecedentes_registro_list->isExport()) { ?>
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
$antecedentes_registro_list->terminate();
?>