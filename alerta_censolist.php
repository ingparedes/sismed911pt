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
$alerta_censo_list = new alerta_censo_list();

// Run the page
$alerta_censo_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alerta_censo_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$alerta_censo_list->isExport()) { ?>
<script>
var falerta_censolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	falerta_censolist = currentForm = new ew.Form("falerta_censolist", "list");
	falerta_censolist.formKeyCountName = '<?php echo $alerta_censo_list->FormKeyCountName ?>';
	loadjs.done("falerta_censolist");
});
var falerta_censolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	falerta_censolistsrch = currentSearchForm = new ew.Form("falerta_censolistsrch");

	// Dynamic selection lists
	// Filters

	falerta_censolistsrch.filterList = <?php echo $alerta_censo_list->getFilterList() ?>;
	loadjs.done("falerta_censolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$alerta_censo_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($alerta_censo_list->TotalRecords > 0 && $alerta_censo_list->ExportOptions->visible()) { ?>
<?php $alerta_censo_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($alerta_censo_list->ImportOptions->visible()) { ?>
<?php $alerta_censo_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($alerta_censo_list->SearchOptions->visible()) { ?>
<?php $alerta_censo_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($alerta_censo_list->FilterOptions->visible()) { ?>
<?php $alerta_censo_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$alerta_censo_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$alerta_censo_list->isExport() && !$alerta_censo->CurrentAction) { ?>
<form name="falerta_censolistsrch" id="falerta_censolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="falerta_censolistsrch-search-panel" class="<?php echo $alerta_censo_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="alerta_censo">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $alerta_censo_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($alerta_censo_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($alerta_censo_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $alerta_censo_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($alerta_censo_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($alerta_censo_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($alerta_censo_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($alerta_censo_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $alerta_censo_list->showPageHeader(); ?>
<?php
$alerta_censo_list->showMessage();
?>
<?php if ($alerta_censo_list->TotalRecords > 0 || $alerta_censo->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($alerta_censo_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> alerta_censo">
<?php if (!$alerta_censo_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$alerta_censo_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $alerta_censo_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $alerta_censo_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="falerta_censolist" id="falerta_censolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alerta_censo">
<div id="gmp_alerta_censo" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($alerta_censo_list->TotalRecords > 0 || $alerta_censo_list->isGridEdit()) { ?>
<table id="tbl_alerta_censolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$alerta_censo->RowType = ROWTYPE_HEADER;

// Render list options
$alerta_censo_list->renderListOptions();

// Render list options (header, left)
$alerta_censo_list->ListOptions->render("header", "left");
?>
<?php if ($alerta_censo_list->id_tiempocenso->Visible) { // id_tiempocenso ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->id_tiempocenso) == "") { ?>
		<th data-name="id_tiempocenso" class="<?php echo $alerta_censo_list->id_tiempocenso->headerCellClass() ?>"><div id="elh_alerta_censo_id_tiempocenso" class="alerta_censo_id_tiempocenso"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->id_tiempocenso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_tiempocenso" class="<?php echo $alerta_censo_list->id_tiempocenso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->id_tiempocenso) ?>', 1);"><div id="elh_alerta_censo_id_tiempocenso" class="alerta_censo_id_tiempocenso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->id_tiempocenso->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->id_tiempocenso->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->id_tiempocenso->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->hora1->Visible) { // hora1 ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->hora1) == "") { ?>
		<th data-name="hora1" class="<?php echo $alerta_censo_list->hora1->headerCellClass() ?>"><div id="elh_alerta_censo_hora1" class="alerta_censo_hora1"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->hora1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora1" class="<?php echo $alerta_censo_list->hora1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->hora1) ?>', 1);"><div id="elh_alerta_censo_hora1" class="alerta_censo_hora1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->hora1->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->hora1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->hora1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->hora2->Visible) { // hora2 ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->hora2) == "") { ?>
		<th data-name="hora2" class="<?php echo $alerta_censo_list->hora2->headerCellClass() ?>"><div id="elh_alerta_censo_hora2" class="alerta_censo_hora2"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->hora2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora2" class="<?php echo $alerta_censo_list->hora2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->hora2) ?>', 1);"><div id="elh_alerta_censo_hora2" class="alerta_censo_hora2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->hora2->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->hora2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->hora2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->hora3->Visible) { // hora3 ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->hora3) == "") { ?>
		<th data-name="hora3" class="<?php echo $alerta_censo_list->hora3->headerCellClass() ?>"><div id="elh_alerta_censo_hora3" class="alerta_censo_hora3"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->hora3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora3" class="<?php echo $alerta_censo_list->hora3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->hora3) ?>', 1);"><div id="elh_alerta_censo_hora3" class="alerta_censo_hora3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->hora3->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->hora3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->hora3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->hora4->Visible) { // hora4 ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->hora4) == "") { ?>
		<th data-name="hora4" class="<?php echo $alerta_censo_list->hora4->headerCellClass() ?>"><div id="elh_alerta_censo_hora4" class="alerta_censo_hora4"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->hora4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hora4" class="<?php echo $alerta_censo_list->hora4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->hora4) ?>', 1);"><div id="elh_alerta_censo_hora4" class="alerta_censo_hora4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->hora4->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->hora4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->hora4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->t_recordatorio->Visible) { // t_recordatorio ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->t_recordatorio) == "") { ?>
		<th data-name="t_recordatorio" class="<?php echo $alerta_censo_list->t_recordatorio->headerCellClass() ?>"><div id="elh_alerta_censo_t_recordatorio" class="alerta_censo_t_recordatorio"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->t_recordatorio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="t_recordatorio" class="<?php echo $alerta_censo_list->t_recordatorio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->t_recordatorio) ?>', 1);"><div id="elh_alerta_censo_t_recordatorio" class="alerta_censo_t_recordatorio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->t_recordatorio->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->t_recordatorio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->t_recordatorio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->texto_recordatorio->Visible) { // texto_recordatorio ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->texto_recordatorio) == "") { ?>
		<th data-name="texto_recordatorio" class="<?php echo $alerta_censo_list->texto_recordatorio->headerCellClass() ?>"><div id="elh_alerta_censo_texto_recordatorio" class="alerta_censo_texto_recordatorio"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->texto_recordatorio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="texto_recordatorio" class="<?php echo $alerta_censo_list->texto_recordatorio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->texto_recordatorio) ?>', 1);"><div id="elh_alerta_censo_texto_recordatorio" class="alerta_censo_texto_recordatorio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->texto_recordatorio->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->texto_recordatorio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->texto_recordatorio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->t_notificacion->Visible) { // t_notificacion ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->t_notificacion) == "") { ?>
		<th data-name="t_notificacion" class="<?php echo $alerta_censo_list->t_notificacion->headerCellClass() ?>"><div id="elh_alerta_censo_t_notificacion" class="alerta_censo_t_notificacion"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->t_notificacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="t_notificacion" class="<?php echo $alerta_censo_list->t_notificacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->t_notificacion) ?>', 1);"><div id="elh_alerta_censo_t_notificacion" class="alerta_censo_t_notificacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->t_notificacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->t_notificacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->t_notificacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($alerta_censo_list->texto_notificacion->Visible) { // texto_notificacion ?>
	<?php if ($alerta_censo_list->SortUrl($alerta_censo_list->texto_notificacion) == "") { ?>
		<th data-name="texto_notificacion" class="<?php echo $alerta_censo_list->texto_notificacion->headerCellClass() ?>"><div id="elh_alerta_censo_texto_notificacion" class="alerta_censo_texto_notificacion"><div class="ew-table-header-caption"><?php echo $alerta_censo_list->texto_notificacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="texto_notificacion" class="<?php echo $alerta_censo_list->texto_notificacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $alerta_censo_list->SortUrl($alerta_censo_list->texto_notificacion) ?>', 1);"><div id="elh_alerta_censo_texto_notificacion" class="alerta_censo_texto_notificacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $alerta_censo_list->texto_notificacion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($alerta_censo_list->texto_notificacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($alerta_censo_list->texto_notificacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$alerta_censo_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($alerta_censo_list->ExportAll && $alerta_censo_list->isExport()) {
	$alerta_censo_list->StopRecord = $alerta_censo_list->TotalRecords;
} else {

	// Set the last record to display
	if ($alerta_censo_list->TotalRecords > $alerta_censo_list->StartRecord + $alerta_censo_list->DisplayRecords - 1)
		$alerta_censo_list->StopRecord = $alerta_censo_list->StartRecord + $alerta_censo_list->DisplayRecords - 1;
	else
		$alerta_censo_list->StopRecord = $alerta_censo_list->TotalRecords;
}
$alerta_censo_list->RecordCount = $alerta_censo_list->StartRecord - 1;
if ($alerta_censo_list->Recordset && !$alerta_censo_list->Recordset->EOF) {
	$alerta_censo_list->Recordset->moveFirst();
	$selectLimit = $alerta_censo_list->UseSelectLimit;
	if (!$selectLimit && $alerta_censo_list->StartRecord > 1)
		$alerta_censo_list->Recordset->move($alerta_censo_list->StartRecord - 1);
} elseif (!$alerta_censo->AllowAddDeleteRow && $alerta_censo_list->StopRecord == 0) {
	$alerta_censo_list->StopRecord = $alerta_censo->GridAddRowCount;
}

// Initialize aggregate
$alerta_censo->RowType = ROWTYPE_AGGREGATEINIT;
$alerta_censo->resetAttributes();
$alerta_censo_list->renderRow();
while ($alerta_censo_list->RecordCount < $alerta_censo_list->StopRecord) {
	$alerta_censo_list->RecordCount++;
	if ($alerta_censo_list->RecordCount >= $alerta_censo_list->StartRecord) {
		$alerta_censo_list->RowCount++;

		// Set up key count
		$alerta_censo_list->KeyCount = $alerta_censo_list->RowIndex;

		// Init row class and style
		$alerta_censo->resetAttributes();
		$alerta_censo->CssClass = "";
		if ($alerta_censo_list->isGridAdd()) {
		} else {
			$alerta_censo_list->loadRowValues($alerta_censo_list->Recordset); // Load row values
		}
		$alerta_censo->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$alerta_censo->RowAttrs->merge(["data-rowindex" => $alerta_censo_list->RowCount, "id" => "r" . $alerta_censo_list->RowCount . "_alerta_censo", "data-rowtype" => $alerta_censo->RowType]);

		// Render row
		$alerta_censo_list->renderRow();

		// Render list options
		$alerta_censo_list->renderListOptions();
?>
	<tr <?php echo $alerta_censo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$alerta_censo_list->ListOptions->render("body", "left", $alerta_censo_list->RowCount);
?>
	<?php if ($alerta_censo_list->id_tiempocenso->Visible) { // id_tiempocenso ?>
		<td data-name="id_tiempocenso" <?php echo $alerta_censo_list->id_tiempocenso->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_id_tiempocenso">
<span<?php echo $alerta_censo_list->id_tiempocenso->viewAttributes() ?>><?php echo $alerta_censo_list->id_tiempocenso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->hora1->Visible) { // hora1 ?>
		<td data-name="hora1" <?php echo $alerta_censo_list->hora1->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_hora1">
<span<?php echo $alerta_censo_list->hora1->viewAttributes() ?>><?php echo $alerta_censo_list->hora1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->hora2->Visible) { // hora2 ?>
		<td data-name="hora2" <?php echo $alerta_censo_list->hora2->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_hora2">
<span<?php echo $alerta_censo_list->hora2->viewAttributes() ?>><?php echo $alerta_censo_list->hora2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->hora3->Visible) { // hora3 ?>
		<td data-name="hora3" <?php echo $alerta_censo_list->hora3->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_hora3">
<span<?php echo $alerta_censo_list->hora3->viewAttributes() ?>><?php echo $alerta_censo_list->hora3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->hora4->Visible) { // hora4 ?>
		<td data-name="hora4" <?php echo $alerta_censo_list->hora4->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_hora4">
<span<?php echo $alerta_censo_list->hora4->viewAttributes() ?>><?php echo $alerta_censo_list->hora4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->t_recordatorio->Visible) { // t_recordatorio ?>
		<td data-name="t_recordatorio" <?php echo $alerta_censo_list->t_recordatorio->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_t_recordatorio">
<span<?php echo $alerta_censo_list->t_recordatorio->viewAttributes() ?>><?php echo $alerta_censo_list->t_recordatorio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->texto_recordatorio->Visible) { // texto_recordatorio ?>
		<td data-name="texto_recordatorio" <?php echo $alerta_censo_list->texto_recordatorio->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_texto_recordatorio">
<span<?php echo $alerta_censo_list->texto_recordatorio->viewAttributes() ?>><?php echo $alerta_censo_list->texto_recordatorio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->t_notificacion->Visible) { // t_notificacion ?>
		<td data-name="t_notificacion" <?php echo $alerta_censo_list->t_notificacion->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_t_notificacion">
<span<?php echo $alerta_censo_list->t_notificacion->viewAttributes() ?>><?php echo $alerta_censo_list->t_notificacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($alerta_censo_list->texto_notificacion->Visible) { // texto_notificacion ?>
		<td data-name="texto_notificacion" <?php echo $alerta_censo_list->texto_notificacion->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_list->RowCount ?>_alerta_censo_texto_notificacion">
<span<?php echo $alerta_censo_list->texto_notificacion->viewAttributes() ?>><?php echo $alerta_censo_list->texto_notificacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$alerta_censo_list->ListOptions->render("body", "right", $alerta_censo_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$alerta_censo_list->isGridAdd())
		$alerta_censo_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$alerta_censo->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($alerta_censo_list->Recordset)
	$alerta_censo_list->Recordset->Close();
?>
<?php if (!$alerta_censo_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$alerta_censo_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $alerta_censo_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $alerta_censo_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($alerta_censo_list->TotalRecords == 0 && !$alerta_censo->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $alerta_censo_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$alerta_censo_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$alerta_censo_list->isExport()) { ?>
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
$alerta_censo_list->terminate();
?>