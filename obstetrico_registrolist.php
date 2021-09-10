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
$obstetrico_registro_list = new obstetrico_registro_list();

// Run the page
$obstetrico_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obstetrico_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obstetrico_registro_list->isExport()) { ?>
<script>
var fobstetrico_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fobstetrico_registrolist = currentForm = new ew.Form("fobstetrico_registrolist", "list");
	fobstetrico_registrolist.formKeyCountName = '<?php echo $obstetrico_registro_list->FormKeyCountName ?>';
	loadjs.done("fobstetrico_registrolist");
});
var fobstetrico_registrolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fobstetrico_registrolistsrch = currentSearchForm = new ew.Form("fobstetrico_registrolistsrch");

	// Dynamic selection lists
	// Filters

	fobstetrico_registrolistsrch.filterList = <?php echo $obstetrico_registro_list->getFilterList() ?>;
	loadjs.done("fobstetrico_registrolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obstetrico_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($obstetrico_registro_list->TotalRecords > 0 && $obstetrico_registro_list->ExportOptions->visible()) { ?>
<?php $obstetrico_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($obstetrico_registro_list->ImportOptions->visible()) { ?>
<?php $obstetrico_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($obstetrico_registro_list->SearchOptions->visible()) { ?>
<?php $obstetrico_registro_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($obstetrico_registro_list->FilterOptions->visible()) { ?>
<?php $obstetrico_registro_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$obstetrico_registro_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$obstetrico_registro_list->isExport() && !$obstetrico_registro->CurrentAction) { ?>
<form name="fobstetrico_registrolistsrch" id="fobstetrico_registrolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fobstetrico_registrolistsrch-search-panel" class="<?php echo $obstetrico_registro_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="obstetrico_registro">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $obstetrico_registro_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($obstetrico_registro_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($obstetrico_registro_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $obstetrico_registro_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($obstetrico_registro_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($obstetrico_registro_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($obstetrico_registro_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($obstetrico_registro_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $obstetrico_registro_list->showPageHeader(); ?>
<?php
$obstetrico_registro_list->showMessage();
?>
<?php if ($obstetrico_registro_list->TotalRecords > 0 || $obstetrico_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($obstetrico_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> obstetrico_registro">
<?php if (!$obstetrico_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$obstetrico_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obstetrico_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obstetrico_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fobstetrico_registrolist" id="fobstetrico_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obstetrico_registro">
<div id="gmp_obstetrico_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($obstetrico_registro_list->TotalRecords > 0 || $obstetrico_registro_list->isGridEdit()) { ?>
<table id="tbl_obstetrico_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$obstetrico_registro->RowType = ROWTYPE_HEADER;

// Render list options
$obstetrico_registro_list->renderListOptions();

// Render list options (header, left)
$obstetrico_registro_list->ListOptions->render("header", "left");
?>
<?php if ($obstetrico_registro_list->id->Visible) { // id ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $obstetrico_registro_list->id->headerCellClass() ?>"><div id="elh_obstetrico_registro_id" class="obstetrico_registro_id"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $obstetrico_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->id) ?>', 1);"><div id="elh_obstetrico_registro_id" class="obstetrico_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $obstetrico_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_obstetrico_registro_cod_casopreh" class="obstetrico_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $obstetrico_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->cod_casopreh) ?>', 1);"><div id="elh_obstetrico_registro_cod_casopreh" class="obstetrico_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->trabajoparto->Visible) { // trabajoparto ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->trabajoparto) == "") { ?>
		<th data-name="trabajoparto" class="<?php echo $obstetrico_registro_list->trabajoparto->headerCellClass() ?>"><div id="elh_obstetrico_registro_trabajoparto" class="obstetrico_registro_trabajoparto"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->trabajoparto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="trabajoparto" class="<?php echo $obstetrico_registro_list->trabajoparto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->trabajoparto) ?>', 1);"><div id="elh_obstetrico_registro_trabajoparto" class="obstetrico_registro_trabajoparto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->trabajoparto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->trabajoparto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->trabajoparto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->sangradovaginal->Visible) { // sangradovaginal ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->sangradovaginal) == "") { ?>
		<th data-name="sangradovaginal" class="<?php echo $obstetrico_registro_list->sangradovaginal->headerCellClass() ?>"><div id="elh_obstetrico_registro_sangradovaginal" class="obstetrico_registro_sangradovaginal"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->sangradovaginal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sangradovaginal" class="<?php echo $obstetrico_registro_list->sangradovaginal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->sangradovaginal) ?>', 1);"><div id="elh_obstetrico_registro_sangradovaginal" class="obstetrico_registro_sangradovaginal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->sangradovaginal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->sangradovaginal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->sangradovaginal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->g->Visible) { // g ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->g) == "") { ?>
		<th data-name="g" class="<?php echo $obstetrico_registro_list->g->headerCellClass() ?>"><div id="elh_obstetrico_registro_g" class="obstetrico_registro_g"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->g->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="g" class="<?php echo $obstetrico_registro_list->g->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->g) ?>', 1);"><div id="elh_obstetrico_registro_g" class="obstetrico_registro_g">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->g->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->g->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->g->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->p->Visible) { // p ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->p) == "") { ?>
		<th data-name="p" class="<?php echo $obstetrico_registro_list->p->headerCellClass() ?>"><div id="elh_obstetrico_registro_p" class="obstetrico_registro_p"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->p->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="p" class="<?php echo $obstetrico_registro_list->p->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->p) ?>', 1);"><div id="elh_obstetrico_registro_p" class="obstetrico_registro_p">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->p->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->p->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->p->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->a->Visible) { // a ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->a) == "") { ?>
		<th data-name="a" class="<?php echo $obstetrico_registro_list->a->headerCellClass() ?>"><div id="elh_obstetrico_registro_a" class="obstetrico_registro_a"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="a" class="<?php echo $obstetrico_registro_list->a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->a) ?>', 1);"><div id="elh_obstetrico_registro_a" class="obstetrico_registro_a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->a->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->a->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->n->Visible) { // n ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->n) == "") { ?>
		<th data-name="n" class="<?php echo $obstetrico_registro_list->n->headerCellClass() ?>"><div id="elh_obstetrico_registro_n" class="obstetrico_registro_n"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->n->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="n" class="<?php echo $obstetrico_registro_list->n->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->n) ?>', 1);"><div id="elh_obstetrico_registro_n" class="obstetrico_registro_n">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->n->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->n->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->n->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->c->Visible) { // c ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->c) == "") { ?>
		<th data-name="c" class="<?php echo $obstetrico_registro_list->c->headerCellClass() ?>"><div id="elh_obstetrico_registro_c" class="obstetrico_registro_c"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->c->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c" class="<?php echo $obstetrico_registro_list->c->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->c) ?>', 1);"><div id="elh_obstetrico_registro_c" class="obstetrico_registro_c">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->c->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->c->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->c->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->fuente->Visible) { // fuente ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->fuente) == "") { ?>
		<th data-name="fuente" class="<?php echo $obstetrico_registro_list->fuente->headerCellClass() ?>"><div id="elh_obstetrico_registro_fuente" class="obstetrico_registro_fuente"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->fuente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fuente" class="<?php echo $obstetrico_registro_list->fuente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->fuente) ?>', 1);"><div id="elh_obstetrico_registro_fuente" class="obstetrico_registro_fuente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->fuente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->fuente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->fuente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($obstetrico_registro_list->tiempo->Visible) { // tiempo ?>
	<?php if ($obstetrico_registro_list->SortUrl($obstetrico_registro_list->tiempo) == "") { ?>
		<th data-name="tiempo" class="<?php echo $obstetrico_registro_list->tiempo->headerCellClass() ?>"><div id="elh_obstetrico_registro_tiempo" class="obstetrico_registro_tiempo"><div class="ew-table-header-caption"><?php echo $obstetrico_registro_list->tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tiempo" class="<?php echo $obstetrico_registro_list->tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $obstetrico_registro_list->SortUrl($obstetrico_registro_list->tiempo) ?>', 1);"><div id="elh_obstetrico_registro_tiempo" class="obstetrico_registro_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $obstetrico_registro_list->tiempo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($obstetrico_registro_list->tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($obstetrico_registro_list->tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$obstetrico_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($obstetrico_registro_list->ExportAll && $obstetrico_registro_list->isExport()) {
	$obstetrico_registro_list->StopRecord = $obstetrico_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($obstetrico_registro_list->TotalRecords > $obstetrico_registro_list->StartRecord + $obstetrico_registro_list->DisplayRecords - 1)
		$obstetrico_registro_list->StopRecord = $obstetrico_registro_list->StartRecord + $obstetrico_registro_list->DisplayRecords - 1;
	else
		$obstetrico_registro_list->StopRecord = $obstetrico_registro_list->TotalRecords;
}
$obstetrico_registro_list->RecordCount = $obstetrico_registro_list->StartRecord - 1;
if ($obstetrico_registro_list->Recordset && !$obstetrico_registro_list->Recordset->EOF) {
	$obstetrico_registro_list->Recordset->moveFirst();
	$selectLimit = $obstetrico_registro_list->UseSelectLimit;
	if (!$selectLimit && $obstetrico_registro_list->StartRecord > 1)
		$obstetrico_registro_list->Recordset->move($obstetrico_registro_list->StartRecord - 1);
} elseif (!$obstetrico_registro->AllowAddDeleteRow && $obstetrico_registro_list->StopRecord == 0) {
	$obstetrico_registro_list->StopRecord = $obstetrico_registro->GridAddRowCount;
}

// Initialize aggregate
$obstetrico_registro->RowType = ROWTYPE_AGGREGATEINIT;
$obstetrico_registro->resetAttributes();
$obstetrico_registro_list->renderRow();
while ($obstetrico_registro_list->RecordCount < $obstetrico_registro_list->StopRecord) {
	$obstetrico_registro_list->RecordCount++;
	if ($obstetrico_registro_list->RecordCount >= $obstetrico_registro_list->StartRecord) {
		$obstetrico_registro_list->RowCount++;

		// Set up key count
		$obstetrico_registro_list->KeyCount = $obstetrico_registro_list->RowIndex;

		// Init row class and style
		$obstetrico_registro->resetAttributes();
		$obstetrico_registro->CssClass = "";
		if ($obstetrico_registro_list->isGridAdd()) {
		} else {
			$obstetrico_registro_list->loadRowValues($obstetrico_registro_list->Recordset); // Load row values
		}
		$obstetrico_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$obstetrico_registro->RowAttrs->merge(["data-rowindex" => $obstetrico_registro_list->RowCount, "id" => "r" . $obstetrico_registro_list->RowCount . "_obstetrico_registro", "data-rowtype" => $obstetrico_registro->RowType]);

		// Render row
		$obstetrico_registro_list->renderRow();

		// Render list options
		$obstetrico_registro_list->renderListOptions();
?>
	<tr <?php echo $obstetrico_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$obstetrico_registro_list->ListOptions->render("body", "left", $obstetrico_registro_list->RowCount);
?>
	<?php if ($obstetrico_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $obstetrico_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_id">
<span<?php echo $obstetrico_registro_list->id->viewAttributes() ?>><?php echo $obstetrico_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $obstetrico_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_cod_casopreh">
<span<?php echo $obstetrico_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $obstetrico_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->trabajoparto->Visible) { // trabajoparto ?>
		<td data-name="trabajoparto" <?php echo $obstetrico_registro_list->trabajoparto->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_trabajoparto">
<span<?php echo $obstetrico_registro_list->trabajoparto->viewAttributes() ?>><?php echo $obstetrico_registro_list->trabajoparto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->sangradovaginal->Visible) { // sangradovaginal ?>
		<td data-name="sangradovaginal" <?php echo $obstetrico_registro_list->sangradovaginal->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_sangradovaginal">
<span<?php echo $obstetrico_registro_list->sangradovaginal->viewAttributes() ?>><?php echo $obstetrico_registro_list->sangradovaginal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->g->Visible) { // g ?>
		<td data-name="g" <?php echo $obstetrico_registro_list->g->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_g">
<span<?php echo $obstetrico_registro_list->g->viewAttributes() ?>><?php echo $obstetrico_registro_list->g->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->p->Visible) { // p ?>
		<td data-name="p" <?php echo $obstetrico_registro_list->p->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_p">
<span<?php echo $obstetrico_registro_list->p->viewAttributes() ?>><?php echo $obstetrico_registro_list->p->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->a->Visible) { // a ?>
		<td data-name="a" <?php echo $obstetrico_registro_list->a->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_a">
<span<?php echo $obstetrico_registro_list->a->viewAttributes() ?>><?php echo $obstetrico_registro_list->a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->n->Visible) { // n ?>
		<td data-name="n" <?php echo $obstetrico_registro_list->n->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_n">
<span<?php echo $obstetrico_registro_list->n->viewAttributes() ?>><?php echo $obstetrico_registro_list->n->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->c->Visible) { // c ?>
		<td data-name="c" <?php echo $obstetrico_registro_list->c->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_c">
<span<?php echo $obstetrico_registro_list->c->viewAttributes() ?>><?php echo $obstetrico_registro_list->c->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->fuente->Visible) { // fuente ?>
		<td data-name="fuente" <?php echo $obstetrico_registro_list->fuente->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_fuente">
<span<?php echo $obstetrico_registro_list->fuente->viewAttributes() ?>><?php echo $obstetrico_registro_list->fuente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($obstetrico_registro_list->tiempo->Visible) { // tiempo ?>
		<td data-name="tiempo" <?php echo $obstetrico_registro_list->tiempo->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_list->RowCount ?>_obstetrico_registro_tiempo">
<span<?php echo $obstetrico_registro_list->tiempo->viewAttributes() ?>><?php echo $obstetrico_registro_list->tiempo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$obstetrico_registro_list->ListOptions->render("body", "right", $obstetrico_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$obstetrico_registro_list->isGridAdd())
		$obstetrico_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$obstetrico_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($obstetrico_registro_list->Recordset)
	$obstetrico_registro_list->Recordset->Close();
?>
<?php if (!$obstetrico_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$obstetrico_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $obstetrico_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $obstetrico_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($obstetrico_registro_list->TotalRecords == 0 && !$obstetrico_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $obstetrico_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$obstetrico_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obstetrico_registro_list->isExport()) { ?>
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
$obstetrico_registro_list->terminate();
?>