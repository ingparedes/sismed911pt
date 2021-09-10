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
$explo_fisica_registro_list = new explo_fisica_registro_list();

// Run the page
$explo_fisica_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_fisica_registro_list->isExport()) { ?>
<script>
var fexplo_fisica_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fexplo_fisica_registrolist = currentForm = new ew.Form("fexplo_fisica_registrolist", "list");
	fexplo_fisica_registrolist.formKeyCountName = '<?php echo $explo_fisica_registro_list->FormKeyCountName ?>';
	loadjs.done("fexplo_fisica_registrolist");
});
var fexplo_fisica_registrolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fexplo_fisica_registrolistsrch = currentSearchForm = new ew.Form("fexplo_fisica_registrolistsrch");

	// Dynamic selection lists
	// Filters

	fexplo_fisica_registrolistsrch.filterList = <?php echo $explo_fisica_registro_list->getFilterList() ?>;
	loadjs.done("fexplo_fisica_registrolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_fisica_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($explo_fisica_registro_list->TotalRecords > 0 && $explo_fisica_registro_list->ExportOptions->visible()) { ?>
<?php $explo_fisica_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->ImportOptions->visible()) { ?>
<?php $explo_fisica_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->SearchOptions->visible()) { ?>
<?php $explo_fisica_registro_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->FilterOptions->visible()) { ?>
<?php $explo_fisica_registro_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$explo_fisica_registro_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$explo_fisica_registro_list->isExport() && !$explo_fisica_registro->CurrentAction) { ?>
<form name="fexplo_fisica_registrolistsrch" id="fexplo_fisica_registrolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fexplo_fisica_registrolistsrch-search-panel" class="<?php echo $explo_fisica_registro_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="explo_fisica_registro">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $explo_fisica_registro_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($explo_fisica_registro_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($explo_fisica_registro_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $explo_fisica_registro_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($explo_fisica_registro_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($explo_fisica_registro_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($explo_fisica_registro_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($explo_fisica_registro_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $explo_fisica_registro_list->showPageHeader(); ?>
<?php
$explo_fisica_registro_list->showMessage();
?>
<?php if ($explo_fisica_registro_list->TotalRecords > 0 || $explo_fisica_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($explo_fisica_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> explo_fisica_registro">
<?php if (!$explo_fisica_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$explo_fisica_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_fisica_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_fisica_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fexplo_fisica_registrolist" id="fexplo_fisica_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica_registro">
<div id="gmp_explo_fisica_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($explo_fisica_registro_list->TotalRecords > 0 || $explo_fisica_registro_list->isGridEdit()) { ?>
<table id="tbl_explo_fisica_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$explo_fisica_registro->RowType = ROWTYPE_HEADER;

// Render list options
$explo_fisica_registro_list->renderListOptions();

// Render list options (header, left)
$explo_fisica_registro_list->ListOptions->render("header", "left");
?>
<?php if ($explo_fisica_registro_list->id->Visible) { // id ?>
	<?php if ($explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $explo_fisica_registro_list->id->headerCellClass() ?>"><div id="elh_explo_fisica_registro_id" class="explo_fisica_registro_id"><div class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $explo_fisica_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->id) ?>', 1);"><div id="elh_explo_fisica_registro_id" class="explo_fisica_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->id_trauma_fisico->Visible) { // id_trauma_fisico ?>
	<?php if ($explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->id_trauma_fisico) == "") { ?>
		<th data-name="id_trauma_fisico" class="<?php echo $explo_fisica_registro_list->id_trauma_fisico->headerCellClass() ?>"><div id="elh_explo_fisica_registro_id_trauma_fisico" class="explo_fisica_registro_id_trauma_fisico"><div class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->id_trauma_fisico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_trauma_fisico" class="<?php echo $explo_fisica_registro_list->id_trauma_fisico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->id_trauma_fisico) ?>', 1);"><div id="elh_explo_fisica_registro_id_trauma_fisico" class="explo_fisica_registro_id_trauma_fisico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->id_trauma_fisico->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_registro_list->id_trauma_fisico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_registro_list->id_trauma_fisico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->posx->Visible) { // posx ?>
	<?php if ($explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->posx) == "") { ?>
		<th data-name="posx" class="<?php echo $explo_fisica_registro_list->posx->headerCellClass() ?>"><div id="elh_explo_fisica_registro_posx" class="explo_fisica_registro_posx"><div class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->posx->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="posx" class="<?php echo $explo_fisica_registro_list->posx->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->posx) ?>', 1);"><div id="elh_explo_fisica_registro_posx" class="explo_fisica_registro_posx">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->posx->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_registro_list->posx->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_registro_list->posx->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->posy->Visible) { // posy ?>
	<?php if ($explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->posy) == "") { ?>
		<th data-name="posy" class="<?php echo $explo_fisica_registro_list->posy->headerCellClass() ?>"><div id="elh_explo_fisica_registro_posy" class="explo_fisica_registro_posy"><div class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->posy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="posy" class="<?php echo $explo_fisica_registro_list->posy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->posy) ?>', 1);"><div id="elh_explo_fisica_registro_posy" class="explo_fisica_registro_posy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->posy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_registro_list->posy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_registro_list->posy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->pos->Visible) { // pos ?>
	<?php if ($explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->pos) == "") { ?>
		<th data-name="pos" class="<?php echo $explo_fisica_registro_list->pos->headerCellClass() ?>"><div id="elh_explo_fisica_registro_pos" class="explo_fisica_registro_pos"><div class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->pos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pos" class="<?php echo $explo_fisica_registro_list->pos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->pos) ?>', 1);"><div id="elh_explo_fisica_registro_pos" class="explo_fisica_registro_pos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->pos->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_registro_list->pos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_registro_list->pos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_fisica_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $explo_fisica_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_explo_fisica_registro_cod_casopreh" class="explo_fisica_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $explo_fisica_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_fisica_registro_list->SortUrl($explo_fisica_registro_list->cod_casopreh) ?>', 1);"><div id="elh_explo_fisica_registro_cod_casopreh" class="explo_fisica_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_fisica_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_fisica_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_fisica_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$explo_fisica_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($explo_fisica_registro_list->ExportAll && $explo_fisica_registro_list->isExport()) {
	$explo_fisica_registro_list->StopRecord = $explo_fisica_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($explo_fisica_registro_list->TotalRecords > $explo_fisica_registro_list->StartRecord + $explo_fisica_registro_list->DisplayRecords - 1)
		$explo_fisica_registro_list->StopRecord = $explo_fisica_registro_list->StartRecord + $explo_fisica_registro_list->DisplayRecords - 1;
	else
		$explo_fisica_registro_list->StopRecord = $explo_fisica_registro_list->TotalRecords;
}
$explo_fisica_registro_list->RecordCount = $explo_fisica_registro_list->StartRecord - 1;
if ($explo_fisica_registro_list->Recordset && !$explo_fisica_registro_list->Recordset->EOF) {
	$explo_fisica_registro_list->Recordset->moveFirst();
	$selectLimit = $explo_fisica_registro_list->UseSelectLimit;
	if (!$selectLimit && $explo_fisica_registro_list->StartRecord > 1)
		$explo_fisica_registro_list->Recordset->move($explo_fisica_registro_list->StartRecord - 1);
} elseif (!$explo_fisica_registro->AllowAddDeleteRow && $explo_fisica_registro_list->StopRecord == 0) {
	$explo_fisica_registro_list->StopRecord = $explo_fisica_registro->GridAddRowCount;
}

// Initialize aggregate
$explo_fisica_registro->RowType = ROWTYPE_AGGREGATEINIT;
$explo_fisica_registro->resetAttributes();
$explo_fisica_registro_list->renderRow();
while ($explo_fisica_registro_list->RecordCount < $explo_fisica_registro_list->StopRecord) {
	$explo_fisica_registro_list->RecordCount++;
	if ($explo_fisica_registro_list->RecordCount >= $explo_fisica_registro_list->StartRecord) {
		$explo_fisica_registro_list->RowCount++;

		// Set up key count
		$explo_fisica_registro_list->KeyCount = $explo_fisica_registro_list->RowIndex;

		// Init row class and style
		$explo_fisica_registro->resetAttributes();
		$explo_fisica_registro->CssClass = "";
		if ($explo_fisica_registro_list->isGridAdd()) {
		} else {
			$explo_fisica_registro_list->loadRowValues($explo_fisica_registro_list->Recordset); // Load row values
		}
		$explo_fisica_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$explo_fisica_registro->RowAttrs->merge(["data-rowindex" => $explo_fisica_registro_list->RowCount, "id" => "r" . $explo_fisica_registro_list->RowCount . "_explo_fisica_registro", "data-rowtype" => $explo_fisica_registro->RowType]);

		// Render row
		$explo_fisica_registro_list->renderRow();

		// Render list options
		$explo_fisica_registro_list->renderListOptions();
?>
	<tr <?php echo $explo_fisica_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$explo_fisica_registro_list->ListOptions->render("body", "left", $explo_fisica_registro_list->RowCount);
?>
	<?php if ($explo_fisica_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $explo_fisica_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_list->RowCount ?>_explo_fisica_registro_id">
<span<?php echo $explo_fisica_registro_list->id->viewAttributes() ?>><?php echo $explo_fisica_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_fisica_registro_list->id_trauma_fisico->Visible) { // id_trauma_fisico ?>
		<td data-name="id_trauma_fisico" <?php echo $explo_fisica_registro_list->id_trauma_fisico->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_list->RowCount ?>_explo_fisica_registro_id_trauma_fisico">
<span<?php echo $explo_fisica_registro_list->id_trauma_fisico->viewAttributes() ?>><?php echo $explo_fisica_registro_list->id_trauma_fisico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_fisica_registro_list->posx->Visible) { // posx ?>
		<td data-name="posx" <?php echo $explo_fisica_registro_list->posx->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_list->RowCount ?>_explo_fisica_registro_posx">
<span<?php echo $explo_fisica_registro_list->posx->viewAttributes() ?>><?php echo $explo_fisica_registro_list->posx->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_fisica_registro_list->posy->Visible) { // posy ?>
		<td data-name="posy" <?php echo $explo_fisica_registro_list->posy->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_list->RowCount ?>_explo_fisica_registro_posy">
<span<?php echo $explo_fisica_registro_list->posy->viewAttributes() ?>><?php echo $explo_fisica_registro_list->posy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_fisica_registro_list->pos->Visible) { // pos ?>
		<td data-name="pos" <?php echo $explo_fisica_registro_list->pos->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_list->RowCount ?>_explo_fisica_registro_pos">
<span<?php echo $explo_fisica_registro_list->pos->viewAttributes() ?>><?php echo $explo_fisica_registro_list->pos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_fisica_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $explo_fisica_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_list->RowCount ?>_explo_fisica_registro_cod_casopreh">
<span<?php echo $explo_fisica_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $explo_fisica_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$explo_fisica_registro_list->ListOptions->render("body", "right", $explo_fisica_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$explo_fisica_registro_list->isGridAdd())
		$explo_fisica_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$explo_fisica_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($explo_fisica_registro_list->Recordset)
	$explo_fisica_registro_list->Recordset->Close();
?>
<?php if (!$explo_fisica_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$explo_fisica_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_fisica_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_fisica_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($explo_fisica_registro_list->TotalRecords == 0 && !$explo_fisica_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $explo_fisica_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$explo_fisica_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_fisica_registro_list->isExport()) { ?>
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
$explo_fisica_registro_list->terminate();
?>