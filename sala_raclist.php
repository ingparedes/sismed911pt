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
$sala_rac_list = new sala_rac_list();

// Run the page
$sala_rac_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_rac_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sala_rac_list->isExport()) { ?>
<script>
var fsala_raclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsala_raclist = currentForm = new ew.Form("fsala_raclist", "list");
	fsala_raclist.formKeyCountName = '<?php echo $sala_rac_list->FormKeyCountName ?>';
	loadjs.done("fsala_raclist");
});
var fsala_raclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsala_raclistsrch = currentSearchForm = new ew.Form("fsala_raclistsrch");

	// Dynamic selection lists
	// Filters

	fsala_raclistsrch.filterList = <?php echo $sala_rac_list->getFilterList() ?>;
	loadjs.done("fsala_raclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sala_rac_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sala_rac_list->TotalRecords > 0 && $sala_rac_list->ExportOptions->visible()) { ?>
<?php $sala_rac_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sala_rac_list->ImportOptions->visible()) { ?>
<?php $sala_rac_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sala_rac_list->SearchOptions->visible()) { ?>
<?php $sala_rac_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sala_rac_list->FilterOptions->visible()) { ?>
<?php $sala_rac_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sala_rac_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sala_rac_list->isExport() && !$sala_rac->CurrentAction) { ?>
<form name="fsala_raclistsrch" id="fsala_raclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsala_raclistsrch-search-panel" class="<?php echo $sala_rac_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sala_rac">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sala_rac_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sala_rac_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sala_rac_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sala_rac_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sala_rac_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sala_rac_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sala_rac_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sala_rac_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sala_rac_list->showPageHeader(); ?>
<?php
$sala_rac_list->showMessage();
?>
<?php if ($sala_rac_list->TotalRecords > 0 || $sala_rac->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sala_rac_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sala_rac">
<?php if (!$sala_rac_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sala_rac_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sala_rac_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sala_rac_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsala_raclist" id="fsala_raclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_rac">
<div id="gmp_sala_rac" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sala_rac_list->TotalRecords > 0 || $sala_rac_list->isGridEdit()) { ?>
<table id="tbl_sala_raclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sala_rac->RowType = ROWTYPE_HEADER;

// Render list options
$sala_rac_list->renderListOptions();

// Render list options (header, left)
$sala_rac_list->ListOptions->render("header", "left");
?>
<?php if ($sala_rac_list->id_registro->Visible) { // id_registro ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->id_registro) == "") { ?>
		<th data-name="id_registro" class="<?php echo $sala_rac_list->id_registro->headerCellClass() ?>"><div id="elh_sala_rac_id_registro" class="sala_rac_id_registro"><div class="ew-table-header-caption"><?php echo $sala_rac_list->id_registro->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_registro" class="<?php echo $sala_rac_list->id_registro->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->id_registro) ?>', 1);"><div id="elh_sala_rac_id_registro" class="sala_rac_id_registro">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->id_registro->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->id_registro->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->id_registro->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->fecha_hora->Visible) { // fecha_hora ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->fecha_hora) == "") { ?>
		<th data-name="fecha_hora" class="<?php echo $sala_rac_list->fecha_hora->headerCellClass() ?>"><div id="elh_sala_rac_fecha_hora" class="sala_rac_fecha_hora"><div class="ew-table-header-caption"><?php echo $sala_rac_list->fecha_hora->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_hora" class="<?php echo $sala_rac_list->fecha_hora->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->fecha_hora) ?>', 1);"><div id="elh_sala_rac_fecha_hora" class="sala_rac_fecha_hora">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->fecha_hora->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->fecha_hora->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->fecha_hora->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->id_admision->Visible) { // id_admision ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->id_admision) == "") { ?>
		<th data-name="id_admision" class="<?php echo $sala_rac_list->id_admision->headerCellClass() ?>"><div id="elh_sala_rac_id_admision" class="sala_rac_id_admision"><div class="ew-table-header-caption"><?php echo $sala_rac_list->id_admision->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_admision" class="<?php echo $sala_rac_list->id_admision->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->id_admision) ?>', 1);"><div id="elh_sala_rac_id_admision" class="sala_rac_id_admision">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->id_admision->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->id_admision->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->id_admision->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->acompanante->Visible) { // acompañante ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->acompanante) == "") { ?>
		<th data-name="acompanante" class="<?php echo $sala_rac_list->acompanante->headerCellClass() ?>"><div id="elh_sala_rac_acompanante" class="sala_rac_acompanante"><div class="ew-table-header-caption"><?php echo $sala_rac_list->acompanante->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="acompanante" class="<?php echo $sala_rac_list->acompanante->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->acompanante) ?>', 1);"><div id="elh_sala_rac_acompanante" class="sala_rac_acompanante">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->acompanante->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->acompanante->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->acompanante->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->tel_acompanante->Visible) { // tel_acompañante ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->tel_acompanante) == "") { ?>
		<th data-name="tel_acompanante" class="<?php echo $sala_rac_list->tel_acompanante->headerCellClass() ?>"><div id="elh_sala_rac_tel_acompanante" class="sala_rac_tel_acompanante"><div class="ew-table-header-caption"><?php echo $sala_rac_list->tel_acompanante->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tel_acompanante" class="<?php echo $sala_rac_list->tel_acompanante->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->tel_acompanante) ?>', 1);"><div id="elh_sala_rac_tel_acompanante" class="sala_rac_tel_acompanante">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->tel_acompanante->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->tel_acompanante->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->tel_acompanante->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->tipo_urgencia->Visible) { // tipo_urgencia ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->tipo_urgencia) == "") { ?>
		<th data-name="tipo_urgencia" class="<?php echo $sala_rac_list->tipo_urgencia->headerCellClass() ?>"><div id="elh_sala_rac_tipo_urgencia" class="sala_rac_tipo_urgencia"><div class="ew-table-header-caption"><?php echo $sala_rac_list->tipo_urgencia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_urgencia" class="<?php echo $sala_rac_list->tipo_urgencia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->tipo_urgencia) ?>', 1);"><div id="elh_sala_rac_tipo_urgencia" class="sala_rac_tipo_urgencia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->tipo_urgencia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->tipo_urgencia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->tipo_urgencia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->clasificacion->Visible) { // clasificacion ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->clasificacion) == "") { ?>
		<th data-name="clasificacion" class="<?php echo $sala_rac_list->clasificacion->headerCellClass() ?>"><div id="elh_sala_rac_clasificacion" class="sala_rac_clasificacion"><div class="ew-table-header-caption"><?php echo $sala_rac_list->clasificacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="clasificacion" class="<?php echo $sala_rac_list->clasificacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->clasificacion) ?>', 1);"><div id="elh_sala_rac_clasificacion" class="sala_rac_clasificacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->clasificacion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->clasificacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->clasificacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->so2->Visible) { // so2 ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->so2) == "") { ?>
		<th data-name="so2" class="<?php echo $sala_rac_list->so2->headerCellClass() ?>"><div id="elh_sala_rac_so2" class="sala_rac_so2"><div class="ew-table-header-caption"><?php echo $sala_rac_list->so2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="so2" class="<?php echo $sala_rac_list->so2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->so2) ?>', 1);"><div id="elh_sala_rac_so2" class="sala_rac_so2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->so2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->so2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->so2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->fr->Visible) { // fr ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->fr) == "") { ?>
		<th data-name="fr" class="<?php echo $sala_rac_list->fr->headerCellClass() ?>"><div id="elh_sala_rac_fr" class="sala_rac_fr"><div class="ew-table-header-caption"><?php echo $sala_rac_list->fr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fr" class="<?php echo $sala_rac_list->fr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->fr) ?>', 1);"><div id="elh_sala_rac_fr" class="sala_rac_fr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->fr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->fr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->fr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->_t->Visible) { // t ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->_t) == "") { ?>
		<th data-name="_t" class="<?php echo $sala_rac_list->_t->headerCellClass() ?>"><div id="elh_sala_rac__t" class="sala_rac__t"><div class="ew-table-header-caption"><?php echo $sala_rac_list->_t->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_t" class="<?php echo $sala_rac_list->_t->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->_t) ?>', 1);"><div id="elh_sala_rac__t" class="sala_rac__t">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->_t->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->_t->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->_t->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->fc->Visible) { // fc ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->fc) == "") { ?>
		<th data-name="fc" class="<?php echo $sala_rac_list->fc->headerCellClass() ?>"><div id="elh_sala_rac_fc" class="sala_rac_fc"><div class="ew-table-header-caption"><?php echo $sala_rac_list->fc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fc" class="<?php echo $sala_rac_list->fc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->fc) ?>', 1);"><div id="elh_sala_rac_fc" class="sala_rac_fc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->fc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->fc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->fc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->pas->Visible) { // pas ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->pas) == "") { ?>
		<th data-name="pas" class="<?php echo $sala_rac_list->pas->headerCellClass() ?>"><div id="elh_sala_rac_pas" class="sala_rac_pas"><div class="ew-table-header-caption"><?php echo $sala_rac_list->pas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pas" class="<?php echo $sala_rac_list->pas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->pas) ?>', 1);"><div id="elh_sala_rac_pas" class="sala_rac_pas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->pas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->pas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->pas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->pad->Visible) { // pad ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->pad) == "") { ?>
		<th data-name="pad" class="<?php echo $sala_rac_list->pad->headerCellClass() ?>"><div id="elh_sala_rac_pad" class="sala_rac_pad"><div class="ew-table-header-caption"><?php echo $sala_rac_list->pad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pad" class="<?php echo $sala_rac_list->pad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->pad) ?>', 1);"><div id="elh_sala_rac_pad" class="sala_rac_pad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->pad->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->pad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->pad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->local_trauma->Visible) { // local_trauma ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->local_trauma) == "") { ?>
		<th data-name="local_trauma" class="<?php echo $sala_rac_list->local_trauma->headerCellClass() ?>"><div id="elh_sala_rac_local_trauma" class="sala_rac_local_trauma"><div class="ew-table-header-caption"><?php echo $sala_rac_list->local_trauma->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="local_trauma" class="<?php echo $sala_rac_list->local_trauma->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->local_trauma) ?>', 1);"><div id="elh_sala_rac_local_trauma" class="sala_rac_local_trauma">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->local_trauma->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->local_trauma->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->local_trauma->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->sistema->Visible) { // sistema ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->sistema) == "") { ?>
		<th data-name="sistema" class="<?php echo $sala_rac_list->sistema->headerCellClass() ?>"><div id="elh_sala_rac_sistema" class="sala_rac_sistema"><div class="ew-table-header-caption"><?php echo $sala_rac_list->sistema->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sistema" class="<?php echo $sala_rac_list->sistema->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->sistema) ?>', 1);"><div id="elh_sala_rac_sistema" class="sala_rac_sistema">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->sistema->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->sistema->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->sistema->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->nivel_conciencia->Visible) { // nivel_conciencia ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->nivel_conciencia) == "") { ?>
		<th data-name="nivel_conciencia" class="<?php echo $sala_rac_list->nivel_conciencia->headerCellClass() ?>"><div id="elh_sala_rac_nivel_conciencia" class="sala_rac_nivel_conciencia"><div class="ew-table-header-caption"><?php echo $sala_rac_list->nivel_conciencia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_conciencia" class="<?php echo $sala_rac_list->nivel_conciencia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->nivel_conciencia) ?>', 1);"><div id="elh_sala_rac_nivel_conciencia" class="sala_rac_nivel_conciencia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->nivel_conciencia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->nivel_conciencia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->nivel_conciencia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->dolor->Visible) { // dolor ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->dolor) == "") { ?>
		<th data-name="dolor" class="<?php echo $sala_rac_list->dolor->headerCellClass() ?>"><div id="elh_sala_rac_dolor" class="sala_rac_dolor"><div class="ew-table-header-caption"><?php echo $sala_rac_list->dolor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dolor" class="<?php echo $sala_rac_list->dolor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->dolor) ?>', 1);"><div id="elh_sala_rac_dolor" class="sala_rac_dolor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->dolor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->dolor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->dolor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->signos_sintomas->Visible) { // signos_sintomas ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->signos_sintomas) == "") { ?>
		<th data-name="signos_sintomas" class="<?php echo $sala_rac_list->signos_sintomas->headerCellClass() ?>"><div id="elh_sala_rac_signos_sintomas" class="sala_rac_signos_sintomas"><div class="ew-table-header-caption"><?php echo $sala_rac_list->signos_sintomas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signos_sintomas" class="<?php echo $sala_rac_list->signos_sintomas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->signos_sintomas) ?>', 1);"><div id="elh_sala_rac_signos_sintomas" class="sala_rac_signos_sintomas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->signos_sintomas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->signos_sintomas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->signos_sintomas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->factores_riesgos->Visible) { // factores_riesgos ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->factores_riesgos) == "") { ?>
		<th data-name="factores_riesgos" class="<?php echo $sala_rac_list->factores_riesgos->headerCellClass() ?>"><div id="elh_sala_rac_factores_riesgos" class="sala_rac_factores_riesgos"><div class="ew-table-header-caption"><?php echo $sala_rac_list->factores_riesgos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="factores_riesgos" class="<?php echo $sala_rac_list->factores_riesgos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->factores_riesgos) ?>', 1);"><div id="elh_sala_rac_factores_riesgos" class="sala_rac_factores_riesgos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->factores_riesgos->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->factores_riesgos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->factores_riesgos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->estado_final->Visible) { // estado_final ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->estado_final) == "") { ?>
		<th data-name="estado_final" class="<?php echo $sala_rac_list->estado_final->headerCellClass() ?>"><div id="elh_sala_rac_estado_final" class="sala_rac_estado_final"><div class="ew-table-header-caption"><?php echo $sala_rac_list->estado_final->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_final" class="<?php echo $sala_rac_list->estado_final->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->estado_final) ?>', 1);"><div id="elh_sala_rac_estado_final" class="sala_rac_estado_final">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->estado_final->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->estado_final->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->estado_final->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->tipo_ingreso->Visible) { // tipo_ingreso ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->tipo_ingreso) == "") { ?>
		<th data-name="tipo_ingreso" class="<?php echo $sala_rac_list->tipo_ingreso->headerCellClass() ?>"><div id="elh_sala_rac_tipo_ingreso" class="sala_rac_tipo_ingreso"><div class="ew-table-header-caption"><?php echo $sala_rac_list->tipo_ingreso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_ingreso" class="<?php echo $sala_rac_list->tipo_ingreso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->tipo_ingreso) ?>', 1);"><div id="elh_sala_rac_tipo_ingreso" class="sala_rac_tipo_ingreso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->tipo_ingreso->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->tipo_ingreso->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->tipo_ingreso->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->hora_clasificacion->Visible) { // hora_clasificacion ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->hora_clasificacion) == "") { ?>
		<th data-name="hora_clasificacion" class="<?php echo $sala_rac_list->hora_clasificacion->headerCellClass() ?>"><div id="elh_sala_rac_hora_clasificacion" class="sala_rac_hora_clasificacion"><div class="ew-table-header-caption"><?php echo $sala_rac_list->hora_clasificacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora_clasificacion" class="<?php echo $sala_rac_list->hora_clasificacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->hora_clasificacion) ?>', 1);"><div id="elh_sala_rac_hora_clasificacion" class="sala_rac_hora_clasificacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->hora_clasificacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->hora_clasificacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->hora_clasificacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->hospital->Visible) { // hospital ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->hospital) == "") { ?>
		<th data-name="hospital" class="<?php echo $sala_rac_list->hospital->headerCellClass() ?>"><div id="elh_sala_rac_hospital" class="sala_rac_hospital"><div class="ew-table-header-caption"><?php echo $sala_rac_list->hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital" class="<?php echo $sala_rac_list->hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->hospital) ?>', 1);"><div id="elh_sala_rac_hospital" class="sala_rac_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sala_rac_list->motivo_trauma->Visible) { // motivo_trauma ?>
	<?php if ($sala_rac_list->SortUrl($sala_rac_list->motivo_trauma) == "") { ?>
		<th data-name="motivo_trauma" class="<?php echo $sala_rac_list->motivo_trauma->headerCellClass() ?>"><div id="elh_sala_rac_motivo_trauma" class="sala_rac_motivo_trauma"><div class="ew-table-header-caption"><?php echo $sala_rac_list->motivo_trauma->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="motivo_trauma" class="<?php echo $sala_rac_list->motivo_trauma->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sala_rac_list->SortUrl($sala_rac_list->motivo_trauma) ?>', 1);"><div id="elh_sala_rac_motivo_trauma" class="sala_rac_motivo_trauma">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sala_rac_list->motivo_trauma->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sala_rac_list->motivo_trauma->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sala_rac_list->motivo_trauma->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sala_rac_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sala_rac_list->ExportAll && $sala_rac_list->isExport()) {
	$sala_rac_list->StopRecord = $sala_rac_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sala_rac_list->TotalRecords > $sala_rac_list->StartRecord + $sala_rac_list->DisplayRecords - 1)
		$sala_rac_list->StopRecord = $sala_rac_list->StartRecord + $sala_rac_list->DisplayRecords - 1;
	else
		$sala_rac_list->StopRecord = $sala_rac_list->TotalRecords;
}
$sala_rac_list->RecordCount = $sala_rac_list->StartRecord - 1;
if ($sala_rac_list->Recordset && !$sala_rac_list->Recordset->EOF) {
	$sala_rac_list->Recordset->moveFirst();
	$selectLimit = $sala_rac_list->UseSelectLimit;
	if (!$selectLimit && $sala_rac_list->StartRecord > 1)
		$sala_rac_list->Recordset->move($sala_rac_list->StartRecord - 1);
} elseif (!$sala_rac->AllowAddDeleteRow && $sala_rac_list->StopRecord == 0) {
	$sala_rac_list->StopRecord = $sala_rac->GridAddRowCount;
}

// Initialize aggregate
$sala_rac->RowType = ROWTYPE_AGGREGATEINIT;
$sala_rac->resetAttributes();
$sala_rac_list->renderRow();
while ($sala_rac_list->RecordCount < $sala_rac_list->StopRecord) {
	$sala_rac_list->RecordCount++;
	if ($sala_rac_list->RecordCount >= $sala_rac_list->StartRecord) {
		$sala_rac_list->RowCount++;

		// Set up key count
		$sala_rac_list->KeyCount = $sala_rac_list->RowIndex;

		// Init row class and style
		$sala_rac->resetAttributes();
		$sala_rac->CssClass = "";
		if ($sala_rac_list->isGridAdd()) {
		} else {
			$sala_rac_list->loadRowValues($sala_rac_list->Recordset); // Load row values
		}
		$sala_rac->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sala_rac->RowAttrs->merge(["data-rowindex" => $sala_rac_list->RowCount, "id" => "r" . $sala_rac_list->RowCount . "_sala_rac", "data-rowtype" => $sala_rac->RowType]);

		// Render row
		$sala_rac_list->renderRow();

		// Render list options
		$sala_rac_list->renderListOptions();
?>
	<tr <?php echo $sala_rac->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sala_rac_list->ListOptions->render("body", "left", $sala_rac_list->RowCount);
?>
	<?php if ($sala_rac_list->id_registro->Visible) { // id_registro ?>
		<td data-name="id_registro" <?php echo $sala_rac_list->id_registro->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_id_registro">
<span<?php echo $sala_rac_list->id_registro->viewAttributes() ?>><?php echo $sala_rac_list->id_registro->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->fecha_hora->Visible) { // fecha_hora ?>
		<td data-name="fecha_hora" <?php echo $sala_rac_list->fecha_hora->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_fecha_hora">
<span<?php echo $sala_rac_list->fecha_hora->viewAttributes() ?>><?php echo $sala_rac_list->fecha_hora->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->id_admision->Visible) { // id_admision ?>
		<td data-name="id_admision" <?php echo $sala_rac_list->id_admision->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_id_admision">
<span<?php echo $sala_rac_list->id_admision->viewAttributes() ?>><?php echo $sala_rac_list->id_admision->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->acompanante->Visible) { // acompañante ?>
		<td data-name="acompanante" <?php echo $sala_rac_list->acompanante->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_acompanante">
<span<?php echo $sala_rac_list->acompanante->viewAttributes() ?>><?php echo $sala_rac_list->acompanante->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->tel_acompanante->Visible) { // tel_acompañante ?>
		<td data-name="tel_acompanante" <?php echo $sala_rac_list->tel_acompanante->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_tel_acompanante">
<span<?php echo $sala_rac_list->tel_acompanante->viewAttributes() ?>><?php echo $sala_rac_list->tel_acompanante->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->tipo_urgencia->Visible) { // tipo_urgencia ?>
		<td data-name="tipo_urgencia" <?php echo $sala_rac_list->tipo_urgencia->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_tipo_urgencia">
<span<?php echo $sala_rac_list->tipo_urgencia->viewAttributes() ?>><?php echo $sala_rac_list->tipo_urgencia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->clasificacion->Visible) { // clasificacion ?>
		<td data-name="clasificacion" <?php echo $sala_rac_list->clasificacion->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_clasificacion">
<span<?php echo $sala_rac_list->clasificacion->viewAttributes() ?>><?php echo $sala_rac_list->clasificacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->so2->Visible) { // so2 ?>
		<td data-name="so2" <?php echo $sala_rac_list->so2->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_so2">
<span<?php echo $sala_rac_list->so2->viewAttributes() ?>><?php echo $sala_rac_list->so2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->fr->Visible) { // fr ?>
		<td data-name="fr" <?php echo $sala_rac_list->fr->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_fr">
<span<?php echo $sala_rac_list->fr->viewAttributes() ?>><?php echo $sala_rac_list->fr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->_t->Visible) { // t ?>
		<td data-name="_t" <?php echo $sala_rac_list->_t->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac__t">
<span<?php echo $sala_rac_list->_t->viewAttributes() ?>><?php echo $sala_rac_list->_t->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->fc->Visible) { // fc ?>
		<td data-name="fc" <?php echo $sala_rac_list->fc->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_fc">
<span<?php echo $sala_rac_list->fc->viewAttributes() ?>><?php echo $sala_rac_list->fc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->pas->Visible) { // pas ?>
		<td data-name="pas" <?php echo $sala_rac_list->pas->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_pas">
<span<?php echo $sala_rac_list->pas->viewAttributes() ?>><?php echo $sala_rac_list->pas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->pad->Visible) { // pad ?>
		<td data-name="pad" <?php echo $sala_rac_list->pad->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_pad">
<span<?php echo $sala_rac_list->pad->viewAttributes() ?>><?php echo $sala_rac_list->pad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->local_trauma->Visible) { // local_trauma ?>
		<td data-name="local_trauma" <?php echo $sala_rac_list->local_trauma->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_local_trauma">
<span<?php echo $sala_rac_list->local_trauma->viewAttributes() ?>><?php echo $sala_rac_list->local_trauma->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->sistema->Visible) { // sistema ?>
		<td data-name="sistema" <?php echo $sala_rac_list->sistema->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_sistema">
<span<?php echo $sala_rac_list->sistema->viewAttributes() ?>><?php echo $sala_rac_list->sistema->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->nivel_conciencia->Visible) { // nivel_conciencia ?>
		<td data-name="nivel_conciencia" <?php echo $sala_rac_list->nivel_conciencia->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_nivel_conciencia">
<span<?php echo $sala_rac_list->nivel_conciencia->viewAttributes() ?>><?php echo $sala_rac_list->nivel_conciencia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->dolor->Visible) { // dolor ?>
		<td data-name="dolor" <?php echo $sala_rac_list->dolor->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_dolor">
<span<?php echo $sala_rac_list->dolor->viewAttributes() ?>><?php echo $sala_rac_list->dolor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->signos_sintomas->Visible) { // signos_sintomas ?>
		<td data-name="signos_sintomas" <?php echo $sala_rac_list->signos_sintomas->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_signos_sintomas">
<span<?php echo $sala_rac_list->signos_sintomas->viewAttributes() ?>><?php echo $sala_rac_list->signos_sintomas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->factores_riesgos->Visible) { // factores_riesgos ?>
		<td data-name="factores_riesgos" <?php echo $sala_rac_list->factores_riesgos->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_factores_riesgos">
<span<?php echo $sala_rac_list->factores_riesgos->viewAttributes() ?>><?php echo $sala_rac_list->factores_riesgos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->estado_final->Visible) { // estado_final ?>
		<td data-name="estado_final" <?php echo $sala_rac_list->estado_final->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_estado_final">
<span<?php echo $sala_rac_list->estado_final->viewAttributes() ?>><?php echo $sala_rac_list->estado_final->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->tipo_ingreso->Visible) { // tipo_ingreso ?>
		<td data-name="tipo_ingreso" <?php echo $sala_rac_list->tipo_ingreso->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_tipo_ingreso">
<span<?php echo $sala_rac_list->tipo_ingreso->viewAttributes() ?>><?php echo $sala_rac_list->tipo_ingreso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->hora_clasificacion->Visible) { // hora_clasificacion ?>
		<td data-name="hora_clasificacion" <?php echo $sala_rac_list->hora_clasificacion->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_hora_clasificacion">
<span<?php echo $sala_rac_list->hora_clasificacion->viewAttributes() ?>><?php echo $sala_rac_list->hora_clasificacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->hospital->Visible) { // hospital ?>
		<td data-name="hospital" <?php echo $sala_rac_list->hospital->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_hospital">
<span<?php echo $sala_rac_list->hospital->viewAttributes() ?>><?php echo $sala_rac_list->hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sala_rac_list->motivo_trauma->Visible) { // motivo_trauma ?>
		<td data-name="motivo_trauma" <?php echo $sala_rac_list->motivo_trauma->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_list->RowCount ?>_sala_rac_motivo_trauma">
<span<?php echo $sala_rac_list->motivo_trauma->viewAttributes() ?>><?php echo $sala_rac_list->motivo_trauma->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sala_rac_list->ListOptions->render("body", "right", $sala_rac_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sala_rac_list->isGridAdd())
		$sala_rac_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sala_rac->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sala_rac_list->Recordset)
	$sala_rac_list->Recordset->Close();
?>
<?php if (!$sala_rac_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sala_rac_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sala_rac_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sala_rac_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sala_rac_list->TotalRecords == 0 && !$sala_rac->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sala_rac_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sala_rac_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sala_rac_list->isExport()) { ?>
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
$sala_rac_list->terminate();
?>