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
$preh_evaluacionclinica_list = new preh_evaluacionclinica_list();

// Run the page
$preh_evaluacionclinica_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_evaluacionclinica_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_evaluacionclinica_list->isExport()) { ?>
<script>
var fpreh_evaluacionclinicalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_evaluacionclinicalist = currentForm = new ew.Form("fpreh_evaluacionclinicalist", "list");
	fpreh_evaluacionclinicalist.formKeyCountName = '<?php echo $preh_evaluacionclinica_list->FormKeyCountName ?>';
	loadjs.done("fpreh_evaluacionclinicalist");
});
var fpreh_evaluacionclinicalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_evaluacionclinicalistsrch = currentSearchForm = new ew.Form("fpreh_evaluacionclinicalistsrch");

	// Dynamic selection lists
	// Filters

	fpreh_evaluacionclinicalistsrch.filterList = <?php echo $preh_evaluacionclinica_list->getFilterList() ?>;
	loadjs.done("fpreh_evaluacionclinicalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_evaluacionclinica_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_evaluacionclinica_list->TotalRecords > 0 && $preh_evaluacionclinica_list->ExportOptions->visible()) { ?>
<?php $preh_evaluacionclinica_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ImportOptions->visible()) { ?>
<?php $preh_evaluacionclinica_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->SearchOptions->visible()) { ?>
<?php $preh_evaluacionclinica_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->FilterOptions->visible()) { ?>
<?php $preh_evaluacionclinica_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_evaluacionclinica_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_evaluacionclinica_list->isExport() && !$preh_evaluacionclinica->CurrentAction) { ?>
<form name="fpreh_evaluacionclinicalistsrch" id="fpreh_evaluacionclinicalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_evaluacionclinicalistsrch-search-panel" class="<?php echo $preh_evaluacionclinica_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_evaluacionclinica">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $preh_evaluacionclinica_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_evaluacionclinica_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_evaluacionclinica_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_evaluacionclinica_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_evaluacionclinica_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_evaluacionclinica_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_evaluacionclinica_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_evaluacionclinica_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_evaluacionclinica_list->showPageHeader(); ?>
<?php
$preh_evaluacionclinica_list->showMessage();
?>
<?php if ($preh_evaluacionclinica_list->TotalRecords > 0 || $preh_evaluacionclinica->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_evaluacionclinica_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_evaluacionclinica">
<?php if (!$preh_evaluacionclinica_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_evaluacionclinica_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_evaluacionclinica_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_evaluacionclinica_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_evaluacionclinicalist" id="fpreh_evaluacionclinicalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_evaluacionclinica">
<div id="gmp_preh_evaluacionclinica" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_evaluacionclinica_list->TotalRecords > 0 || $preh_evaluacionclinica_list->isGridEdit()) { ?>
<table id="tbl_preh_evaluacionclinicalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_evaluacionclinica->RowType = ROWTYPE_HEADER;

// Render list options
$preh_evaluacionclinica_list->renderListOptions();

// Render list options (header, left)
$preh_evaluacionclinica_list->ListOptions->render("header", "left");
?>
<?php if ($preh_evaluacionclinica_list->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->id_evaluacionclinica) == "") { ?>
		<th data-name="id_evaluacionclinica" class="<?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_id_evaluacionclinica" class="preh_evaluacionclinica_id_evaluacionclinica"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_evaluacionclinica" class="<?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->id_evaluacionclinica) ?>', 1);"><div id="elh_preh_evaluacionclinica_id_evaluacionclinica" class="preh_evaluacionclinica_id_evaluacionclinica">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->id_evaluacionclinica->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->id_evaluacionclinica->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_evaluacionclinica_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_cod_casopreh" class="preh_evaluacionclinica_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_evaluacionclinica_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->cod_casopreh) ?>', 1);"><div id="elh_preh_evaluacionclinica_cod_casopreh" class="preh_evaluacionclinica_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->fecha_horaevaluacion) == "") { ?>
		<th data-name="fecha_horaevaluacion" class="<?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_fecha_horaevaluacion" class="preh_evaluacionclinica_fecha_horaevaluacion"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_horaevaluacion" class="<?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->fecha_horaevaluacion) ?>', 1);"><div id="elh_preh_evaluacionclinica_fecha_horaevaluacion" class="preh_evaluacionclinica_fecha_horaevaluacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->fecha_horaevaluacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->fecha_horaevaluacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->cod_paciente->Visible) { // cod_paciente ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->cod_paciente) == "") { ?>
		<th data-name="cod_paciente" class="<?php echo $preh_evaluacionclinica_list->cod_paciente->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_cod_paciente" class="preh_evaluacionclinica_cod_paciente"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->cod_paciente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_paciente" class="<?php echo $preh_evaluacionclinica_list->cod_paciente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->cod_paciente) ?>', 1);"><div id="elh_preh_evaluacionclinica_cod_paciente" class="preh_evaluacionclinica_cod_paciente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->cod_paciente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->cod_paciente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->cod_paciente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->cod_diag_cie->Visible) { // cod_diag_cie ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->cod_diag_cie) == "") { ?>
		<th data-name="cod_diag_cie" class="<?php echo $preh_evaluacionclinica_list->cod_diag_cie->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_cod_diag_cie" class="preh_evaluacionclinica_cod_diag_cie"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->cod_diag_cie->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_diag_cie" class="<?php echo $preh_evaluacionclinica_list->cod_diag_cie->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->cod_diag_cie) ?>', 1);"><div id="elh_preh_evaluacionclinica_cod_diag_cie" class="preh_evaluacionclinica_cod_diag_cie">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->cod_diag_cie->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->cod_diag_cie->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->cod_diag_cie->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->triage->Visible) { // triage ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->triage) == "") { ?>
		<th data-name="triage" class="<?php echo $preh_evaluacionclinica_list->triage->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_triage" class="preh_evaluacionclinica_triage"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->triage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="triage" class="<?php echo $preh_evaluacionclinica_list->triage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->triage) ?>', 1);"><div id="elh_preh_evaluacionclinica_triage" class="preh_evaluacionclinica_triage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->triage->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->triage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->triage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_tx->Visible) { // sv_tx ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_tx) == "") { ?>
		<th data-name="sv_tx" class="<?php echo $preh_evaluacionclinica_list->sv_tx->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_tx" class="preh_evaluacionclinica_sv_tx"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_tx->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_tx" class="<?php echo $preh_evaluacionclinica_list->sv_tx->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_tx) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_tx" class="preh_evaluacionclinica_sv_tx">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_tx->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_tx->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_tx->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_fc->Visible) { // sv_fc ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_fc) == "") { ?>
		<th data-name="sv_fc" class="<?php echo $preh_evaluacionclinica_list->sv_fc->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_fc" class="preh_evaluacionclinica_sv_fc"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_fc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_fc" class="<?php echo $preh_evaluacionclinica_list->sv_fc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_fc) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_fc" class="preh_evaluacionclinica_sv_fc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_fc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_fc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_fc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_fr->Visible) { // sv_fr ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_fr) == "") { ?>
		<th data-name="sv_fr" class="<?php echo $preh_evaluacionclinica_list->sv_fr->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_fr" class="preh_evaluacionclinica_sv_fr"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_fr" class="<?php echo $preh_evaluacionclinica_list->sv_fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_fr) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_fr" class="preh_evaluacionclinica_sv_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_temp->Visible) { // sv_temp ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_temp) == "") { ?>
		<th data-name="sv_temp" class="<?php echo $preh_evaluacionclinica_list->sv_temp->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_temp" class="preh_evaluacionclinica_sv_temp"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_temp" class="<?php echo $preh_evaluacionclinica_list->sv_temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_temp) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_temp" class="preh_evaluacionclinica_sv_temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_temp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_temp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_temp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_gl->Visible) { // sv_gl ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_gl) == "") { ?>
		<th data-name="sv_gl" class="<?php echo $preh_evaluacionclinica_list->sv_gl->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_gl" class="preh_evaluacionclinica_sv_gl"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_gl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_gl" class="<?php echo $preh_evaluacionclinica_list->sv_gl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_gl) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_gl" class="preh_evaluacionclinica_sv_gl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_gl->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_gl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_gl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->peso->Visible) { // peso ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->peso) == "") { ?>
		<th data-name="peso" class="<?php echo $preh_evaluacionclinica_list->peso->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_peso" class="preh_evaluacionclinica_peso"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->peso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="peso" class="<?php echo $preh_evaluacionclinica_list->peso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->peso) ?>', 1);"><div id="elh_preh_evaluacionclinica_peso" class="preh_evaluacionclinica_peso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->peso->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->peso->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->peso->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->talla->Visible) { // talla ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->talla) == "") { ?>
		<th data-name="talla" class="<?php echo $preh_evaluacionclinica_list->talla->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_talla" class="preh_evaluacionclinica_talla"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->talla->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="talla" class="<?php echo $preh_evaluacionclinica_list->talla->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->talla) ?>', 1);"><div id="elh_preh_evaluacionclinica_talla" class="preh_evaluacionclinica_talla">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->talla->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->talla->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->talla->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_fcf->Visible) { // sv_fcf ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_fcf) == "") { ?>
		<th data-name="sv_fcf" class="<?php echo $preh_evaluacionclinica_list->sv_fcf->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_fcf" class="preh_evaluacionclinica_sv_fcf"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_fcf->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_fcf" class="<?php echo $preh_evaluacionclinica_list->sv_fcf->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_fcf) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_fcf" class="preh_evaluacionclinica_sv_fcf">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_fcf->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_fcf->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_fcf->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_satO2->Visible) { // sv_satO2 ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_satO2) == "") { ?>
		<th data-name="sv_satO2" class="<?php echo $preh_evaluacionclinica_list->sv_satO2->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_satO2" class="preh_evaluacionclinica_sv_satO2"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_satO2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_satO2" class="<?php echo $preh_evaluacionclinica_list->sv_satO2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_satO2) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_satO2" class="preh_evaluacionclinica_sv_satO2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_satO2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_satO2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_satO2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_apgar->Visible) { // sv_apgar ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_apgar) == "") { ?>
		<th data-name="sv_apgar" class="<?php echo $preh_evaluacionclinica_list->sv_apgar->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_apgar" class="preh_evaluacionclinica_sv_apgar"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_apgar->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_apgar" class="<?php echo $preh_evaluacionclinica_list->sv_apgar->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_apgar) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_apgar" class="preh_evaluacionclinica_sv_apgar">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_apgar->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_apgar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_apgar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->sv_gli->Visible) { // sv_gli ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_gli) == "") { ?>
		<th data-name="sv_gli" class="<?php echo $preh_evaluacionclinica_list->sv_gli->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_sv_gli" class="preh_evaluacionclinica_sv_gli"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_gli->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_gli" class="<?php echo $preh_evaluacionclinica_list->sv_gli->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->sv_gli) ?>', 1);"><div id="elh_preh_evaluacionclinica_sv_gli" class="preh_evaluacionclinica_sv_gli">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->sv_gli->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->sv_gli->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->sv_gli->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->tipo_paciente->Visible) { // tipo_paciente ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->tipo_paciente) == "") { ?>
		<th data-name="tipo_paciente" class="<?php echo $preh_evaluacionclinica_list->tipo_paciente->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_tipo_paciente" class="preh_evaluacionclinica_tipo_paciente"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->tipo_paciente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_paciente" class="<?php echo $preh_evaluacionclinica_list->tipo_paciente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->tipo_paciente) ?>', 1);"><div id="elh_preh_evaluacionclinica_tipo_paciente" class="preh_evaluacionclinica_tipo_paciente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->tipo_paciente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->tipo_paciente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->tipo_paciente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->usu_sede->Visible) { // usu_sede ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->usu_sede) == "") { ?>
		<th data-name="usu_sede" class="<?php echo $preh_evaluacionclinica_list->usu_sede->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_usu_sede" class="preh_evaluacionclinica_usu_sede"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->usu_sede->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usu_sede" class="<?php echo $preh_evaluacionclinica_list->usu_sede->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->usu_sede) ?>', 1);"><div id="elh_preh_evaluacionclinica_usu_sede" class="preh_evaluacionclinica_usu_sede">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->usu_sede->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->usu_sede->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->usu_sede->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->tiempo_enfermedad->Visible) { // tiempo_enfermedad ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->tiempo_enfermedad) == "") { ?>
		<th data-name="tiempo_enfermedad" class="<?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_tiempo_enfermedad" class="preh_evaluacionclinica_tiempo_enfermedad"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tiempo_enfermedad" class="<?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->tiempo_enfermedad) ?>', 1);"><div id="elh_preh_evaluacionclinica_tiempo_enfermedad" class="preh_evaluacionclinica_tiempo_enfermedad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->tiempo_enfermedad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->tiempo_enfermedad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->tipo_enfermedad->Visible) { // tipo_enfermedad ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->tipo_enfermedad) == "") { ?>
		<th data-name="tipo_enfermedad" class="<?php echo $preh_evaluacionclinica_list->tipo_enfermedad->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_tipo_enfermedad" class="preh_evaluacionclinica_tipo_enfermedad"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->tipo_enfermedad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_enfermedad" class="<?php echo $preh_evaluacionclinica_list->tipo_enfermedad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->tipo_enfermedad) ?>', 1);"><div id="elh_preh_evaluacionclinica_tipo_enfermedad" class="preh_evaluacionclinica_tipo_enfermedad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->tipo_enfermedad->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->tipo_enfermedad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->tipo_enfermedad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_diabetes->Visible) { // ap_diabetes ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_diabetes) == "") { ?>
		<th data-name="ap_diabetes" class="<?php echo $preh_evaluacionclinica_list->ap_diabetes->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_diabetes" class="preh_evaluacionclinica_ap_diabetes"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_diabetes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_diabetes" class="<?php echo $preh_evaluacionclinica_list->ap_diabetes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_diabetes) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_diabetes" class="preh_evaluacionclinica_ap_diabetes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_diabetes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_diabetes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_diabetes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_cardiop->Visible) { // ap_cardiop ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_cardiop) == "") { ?>
		<th data-name="ap_cardiop" class="<?php echo $preh_evaluacionclinica_list->ap_cardiop->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_cardiop" class="preh_evaluacionclinica_ap_cardiop"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_cardiop->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_cardiop" class="<?php echo $preh_evaluacionclinica_list->ap_cardiop->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_cardiop) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_cardiop" class="preh_evaluacionclinica_ap_cardiop">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_cardiop->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_cardiop->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_cardiop->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_convul->Visible) { // ap_convul ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_convul) == "") { ?>
		<th data-name="ap_convul" class="<?php echo $preh_evaluacionclinica_list->ap_convul->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_convul" class="preh_evaluacionclinica_ap_convul"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_convul->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_convul" class="<?php echo $preh_evaluacionclinica_list->ap_convul->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_convul) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_convul" class="preh_evaluacionclinica_ap_convul">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_convul->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_convul->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_convul->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_asma->Visible) { // ap_asma ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_asma) == "") { ?>
		<th data-name="ap_asma" class="<?php echo $preh_evaluacionclinica_list->ap_asma->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_asma" class="preh_evaluacionclinica_ap_asma"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_asma->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_asma" class="<?php echo $preh_evaluacionclinica_list->ap_asma->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_asma) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_asma" class="preh_evaluacionclinica_ap_asma">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_asma->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_asma->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_asma->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_acv->Visible) { // ap_acv ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_acv) == "") { ?>
		<th data-name="ap_acv" class="<?php echo $preh_evaluacionclinica_list->ap_acv->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_acv" class="preh_evaluacionclinica_ap_acv"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_acv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_acv" class="<?php echo $preh_evaluacionclinica_list->ap_acv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_acv) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_acv" class="preh_evaluacionclinica_ap_acv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_acv->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_acv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_acv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_has->Visible) { // ap_has ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_has) == "") { ?>
		<th data-name="ap_has" class="<?php echo $preh_evaluacionclinica_list->ap_has->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_has" class="preh_evaluacionclinica_ap_has"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_has->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_has" class="<?php echo $preh_evaluacionclinica_list->ap_has->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_has) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_has" class="preh_evaluacionclinica_ap_has">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_has->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_has->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_has->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_evaluacionclinica_list->ap_alergia->Visible) { // ap_alergia ?>
	<?php if ($preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_alergia) == "") { ?>
		<th data-name="ap_alergia" class="<?php echo $preh_evaluacionclinica_list->ap_alergia->headerCellClass() ?>"><div id="elh_preh_evaluacionclinica_ap_alergia" class="preh_evaluacionclinica_ap_alergia"><div class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_alergia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ap_alergia" class="<?php echo $preh_evaluacionclinica_list->ap_alergia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_evaluacionclinica_list->SortUrl($preh_evaluacionclinica_list->ap_alergia) ?>', 1);"><div id="elh_preh_evaluacionclinica_ap_alergia" class="preh_evaluacionclinica_ap_alergia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_evaluacionclinica_list->ap_alergia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_evaluacionclinica_list->ap_alergia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_evaluacionclinica_list->ap_alergia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_evaluacionclinica_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_evaluacionclinica_list->ExportAll && $preh_evaluacionclinica_list->isExport()) {
	$preh_evaluacionclinica_list->StopRecord = $preh_evaluacionclinica_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_evaluacionclinica_list->TotalRecords > $preh_evaluacionclinica_list->StartRecord + $preh_evaluacionclinica_list->DisplayRecords - 1)
		$preh_evaluacionclinica_list->StopRecord = $preh_evaluacionclinica_list->StartRecord + $preh_evaluacionclinica_list->DisplayRecords - 1;
	else
		$preh_evaluacionclinica_list->StopRecord = $preh_evaluacionclinica_list->TotalRecords;
}
$preh_evaluacionclinica_list->RecordCount = $preh_evaluacionclinica_list->StartRecord - 1;
if ($preh_evaluacionclinica_list->Recordset && !$preh_evaluacionclinica_list->Recordset->EOF) {
	$preh_evaluacionclinica_list->Recordset->moveFirst();
	$selectLimit = $preh_evaluacionclinica_list->UseSelectLimit;
	if (!$selectLimit && $preh_evaluacionclinica_list->StartRecord > 1)
		$preh_evaluacionclinica_list->Recordset->move($preh_evaluacionclinica_list->StartRecord - 1);
} elseif (!$preh_evaluacionclinica->AllowAddDeleteRow && $preh_evaluacionclinica_list->StopRecord == 0) {
	$preh_evaluacionclinica_list->StopRecord = $preh_evaluacionclinica->GridAddRowCount;
}

// Initialize aggregate
$preh_evaluacionclinica->RowType = ROWTYPE_AGGREGATEINIT;
$preh_evaluacionclinica->resetAttributes();
$preh_evaluacionclinica_list->renderRow();
while ($preh_evaluacionclinica_list->RecordCount < $preh_evaluacionclinica_list->StopRecord) {
	$preh_evaluacionclinica_list->RecordCount++;
	if ($preh_evaluacionclinica_list->RecordCount >= $preh_evaluacionclinica_list->StartRecord) {
		$preh_evaluacionclinica_list->RowCount++;

		// Set up key count
		$preh_evaluacionclinica_list->KeyCount = $preh_evaluacionclinica_list->RowIndex;

		// Init row class and style
		$preh_evaluacionclinica->resetAttributes();
		$preh_evaluacionclinica->CssClass = "";
		if ($preh_evaluacionclinica_list->isGridAdd()) {
		} else {
			$preh_evaluacionclinica_list->loadRowValues($preh_evaluacionclinica_list->Recordset); // Load row values
		}
		$preh_evaluacionclinica->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_evaluacionclinica->RowAttrs->merge(["data-rowindex" => $preh_evaluacionclinica_list->RowCount, "id" => "r" . $preh_evaluacionclinica_list->RowCount . "_preh_evaluacionclinica", "data-rowtype" => $preh_evaluacionclinica->RowType]);

		// Render row
		$preh_evaluacionclinica_list->renderRow();

		// Render list options
		$preh_evaluacionclinica_list->renderListOptions();
?>
	<tr <?php echo $preh_evaluacionclinica->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_evaluacionclinica_list->ListOptions->render("body", "left", $preh_evaluacionclinica_list->RowCount);
?>
	<?php if ($preh_evaluacionclinica_list->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
		<td data-name="id_evaluacionclinica" <?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_id_evaluacionclinica">
<span<?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->id_evaluacionclinica->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_evaluacionclinica_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_cod_casopreh">
<span<?php echo $preh_evaluacionclinica_list->cod_casopreh->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
		<td data-name="fecha_horaevaluacion" <?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_fecha_horaevaluacion">
<span<?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->fecha_horaevaluacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->cod_paciente->Visible) { // cod_paciente ?>
		<td data-name="cod_paciente" <?php echo $preh_evaluacionclinica_list->cod_paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_cod_paciente">
<span<?php echo $preh_evaluacionclinica_list->cod_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->cod_paciente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->cod_diag_cie->Visible) { // cod_diag_cie ?>
		<td data-name="cod_diag_cie" <?php echo $preh_evaluacionclinica_list->cod_diag_cie->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_cod_diag_cie">
<span<?php echo $preh_evaluacionclinica_list->cod_diag_cie->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->cod_diag_cie->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->triage->Visible) { // triage ?>
		<td data-name="triage" <?php echo $preh_evaluacionclinica_list->triage->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_triage">
<span<?php echo $preh_evaluacionclinica_list->triage->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->triage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_tx->Visible) { // sv_tx ?>
		<td data-name="sv_tx" <?php echo $preh_evaluacionclinica_list->sv_tx->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_tx">
<span<?php echo $preh_evaluacionclinica_list->sv_tx->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_tx->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_fc->Visible) { // sv_fc ?>
		<td data-name="sv_fc" <?php echo $preh_evaluacionclinica_list->sv_fc->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_fc">
<span<?php echo $preh_evaluacionclinica_list->sv_fc->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_fc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_fr->Visible) { // sv_fr ?>
		<td data-name="sv_fr" <?php echo $preh_evaluacionclinica_list->sv_fr->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_fr">
<span<?php echo $preh_evaluacionclinica_list->sv_fr->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_temp->Visible) { // sv_temp ?>
		<td data-name="sv_temp" <?php echo $preh_evaluacionclinica_list->sv_temp->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_temp">
<span<?php echo $preh_evaluacionclinica_list->sv_temp->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_gl->Visible) { // sv_gl ?>
		<td data-name="sv_gl" <?php echo $preh_evaluacionclinica_list->sv_gl->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_gl">
<span<?php echo $preh_evaluacionclinica_list->sv_gl->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_gl->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->peso->Visible) { // peso ?>
		<td data-name="peso" <?php echo $preh_evaluacionclinica_list->peso->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_peso">
<span<?php echo $preh_evaluacionclinica_list->peso->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->peso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->talla->Visible) { // talla ?>
		<td data-name="talla" <?php echo $preh_evaluacionclinica_list->talla->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_talla">
<span<?php echo $preh_evaluacionclinica_list->talla->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->talla->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_fcf->Visible) { // sv_fcf ?>
		<td data-name="sv_fcf" <?php echo $preh_evaluacionclinica_list->sv_fcf->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_fcf">
<span<?php echo $preh_evaluacionclinica_list->sv_fcf->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_fcf->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_satO2->Visible) { // sv_satO2 ?>
		<td data-name="sv_satO2" <?php echo $preh_evaluacionclinica_list->sv_satO2->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_satO2">
<span<?php echo $preh_evaluacionclinica_list->sv_satO2->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_satO2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_apgar->Visible) { // sv_apgar ?>
		<td data-name="sv_apgar" <?php echo $preh_evaluacionclinica_list->sv_apgar->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_apgar">
<span<?php echo $preh_evaluacionclinica_list->sv_apgar->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_apgar->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->sv_gli->Visible) { // sv_gli ?>
		<td data-name="sv_gli" <?php echo $preh_evaluacionclinica_list->sv_gli->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_sv_gli">
<span<?php echo $preh_evaluacionclinica_list->sv_gli->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->sv_gli->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->tipo_paciente->Visible) { // tipo_paciente ?>
		<td data-name="tipo_paciente" <?php echo $preh_evaluacionclinica_list->tipo_paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_tipo_paciente">
<span<?php echo $preh_evaluacionclinica_list->tipo_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->tipo_paciente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->usu_sede->Visible) { // usu_sede ?>
		<td data-name="usu_sede" <?php echo $preh_evaluacionclinica_list->usu_sede->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_usu_sede">
<span<?php echo $preh_evaluacionclinica_list->usu_sede->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->usu_sede->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->tiempo_enfermedad->Visible) { // tiempo_enfermedad ?>
		<td data-name="tiempo_enfermedad" <?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_tiempo_enfermedad">
<span<?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->tiempo_enfermedad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->tipo_enfermedad->Visible) { // tipo_enfermedad ?>
		<td data-name="tipo_enfermedad" <?php echo $preh_evaluacionclinica_list->tipo_enfermedad->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_tipo_enfermedad">
<span<?php echo $preh_evaluacionclinica_list->tipo_enfermedad->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->tipo_enfermedad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_diabetes->Visible) { // ap_diabetes ?>
		<td data-name="ap_diabetes" <?php echo $preh_evaluacionclinica_list->ap_diabetes->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_diabetes">
<span<?php echo $preh_evaluacionclinica_list->ap_diabetes->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_diabetes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_cardiop->Visible) { // ap_cardiop ?>
		<td data-name="ap_cardiop" <?php echo $preh_evaluacionclinica_list->ap_cardiop->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_cardiop">
<span<?php echo $preh_evaluacionclinica_list->ap_cardiop->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_cardiop->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_convul->Visible) { // ap_convul ?>
		<td data-name="ap_convul" <?php echo $preh_evaluacionclinica_list->ap_convul->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_convul">
<span<?php echo $preh_evaluacionclinica_list->ap_convul->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_convul->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_asma->Visible) { // ap_asma ?>
		<td data-name="ap_asma" <?php echo $preh_evaluacionclinica_list->ap_asma->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_asma">
<span<?php echo $preh_evaluacionclinica_list->ap_asma->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_asma->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_acv->Visible) { // ap_acv ?>
		<td data-name="ap_acv" <?php echo $preh_evaluacionclinica_list->ap_acv->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_acv">
<span<?php echo $preh_evaluacionclinica_list->ap_acv->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_acv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_has->Visible) { // ap_has ?>
		<td data-name="ap_has" <?php echo $preh_evaluacionclinica_list->ap_has->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_has">
<span<?php echo $preh_evaluacionclinica_list->ap_has->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_has->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_evaluacionclinica_list->ap_alergia->Visible) { // ap_alergia ?>
		<td data-name="ap_alergia" <?php echo $preh_evaluacionclinica_list->ap_alergia->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_list->RowCount ?>_preh_evaluacionclinica_ap_alergia">
<span<?php echo $preh_evaluacionclinica_list->ap_alergia->viewAttributes() ?>><?php echo $preh_evaluacionclinica_list->ap_alergia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_evaluacionclinica_list->ListOptions->render("body", "right", $preh_evaluacionclinica_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_evaluacionclinica_list->isGridAdd())
		$preh_evaluacionclinica_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_evaluacionclinica->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_evaluacionclinica_list->Recordset)
	$preh_evaluacionclinica_list->Recordset->Close();
?>
<?php if (!$preh_evaluacionclinica_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_evaluacionclinica_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_evaluacionclinica_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_evaluacionclinica_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_evaluacionclinica_list->TotalRecords == 0 && !$preh_evaluacionclinica->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_evaluacionclinica_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_evaluacionclinica_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_evaluacionclinica_list->isExport()) { ?>
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
$preh_evaluacionclinica_list->terminate();
?>