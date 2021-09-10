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
$webservices_list = new webservices_list();

// Run the page
$webservices_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$webservices_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$webservices_list->isExport()) { ?>
<script>
var fwebserviceslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fwebserviceslist = currentForm = new ew.Form("fwebserviceslist", "list");
	fwebserviceslist.formKeyCountName = '<?php echo $webservices_list->FormKeyCountName ?>';
	loadjs.done("fwebserviceslist");
});
var fwebserviceslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fwebserviceslistsrch = currentSearchForm = new ew.Form("fwebserviceslistsrch");

	// Dynamic selection lists
	// Filters

	fwebserviceslistsrch.filterList = <?php echo $webservices_list->getFilterList() ?>;
	loadjs.done("fwebserviceslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$webservices_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($webservices_list->TotalRecords > 0 && $webservices_list->ExportOptions->visible()) { ?>
<?php $webservices_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($webservices_list->ImportOptions->visible()) { ?>
<?php $webservices_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($webservices_list->SearchOptions->visible()) { ?>
<?php $webservices_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($webservices_list->FilterOptions->visible()) { ?>
<?php $webservices_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$webservices_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$webservices_list->isExport() && !$webservices->CurrentAction) { ?>
<form name="fwebserviceslistsrch" id="fwebserviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fwebserviceslistsrch-search-panel" class="<?php echo $webservices_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="webservices">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $webservices_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($webservices_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($webservices_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $webservices_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($webservices_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($webservices_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($webservices_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($webservices_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $webservices_list->showPageHeader(); ?>
<?php
$webservices_list->showMessage();
?>
<?php if ($webservices_list->TotalRecords > 0 || $webservices->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($webservices_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> webservices">
<?php if (!$webservices_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$webservices_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $webservices_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $webservices_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fwebserviceslist" id="fwebserviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="webservices">
<div id="gmp_webservices" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($webservices_list->TotalRecords > 0 || $webservices_list->isGridEdit()) { ?>
<table id="tbl_webserviceslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$webservices->RowType = ROWTYPE_HEADER;

// Render list options
$webservices_list->renderListOptions();

// Render list options (header, left)
$webservices_list->ListOptions->render("header", "left");
?>
<?php if ($webservices_list->id_parametros->Visible) { // id_parametros ?>
	<?php if ($webservices_list->SortUrl($webservices_list->id_parametros) == "") { ?>
		<th data-name="id_parametros" class="<?php echo $webservices_list->id_parametros->headerCellClass() ?>"><div id="elh_webservices_id_parametros" class="webservices_id_parametros"><div class="ew-table-header-caption"><?php echo $webservices_list->id_parametros->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_parametros" class="<?php echo $webservices_list->id_parametros->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $webservices_list->SortUrl($webservices_list->id_parametros) ?>', 1);"><div id="elh_webservices_id_parametros" class="webservices_id_parametros">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $webservices_list->id_parametros->caption() ?></span><span class="ew-table-header-sort"><?php if ($webservices_list->id_parametros->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($webservices_list->id_parametros->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($webservices_list->caller->Visible) { // caller ?>
	<?php if ($webservices_list->SortUrl($webservices_list->caller) == "") { ?>
		<th data-name="caller" class="<?php echo $webservices_list->caller->headerCellClass() ?>"><div id="elh_webservices_caller" class="webservices_caller"><div class="ew-table-header-caption"><?php echo $webservices_list->caller->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="caller" class="<?php echo $webservices_list->caller->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $webservices_list->SortUrl($webservices_list->caller) ?>', 1);"><div id="elh_webservices_caller" class="webservices_caller">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $webservices_list->caller->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($webservices_list->caller->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($webservices_list->caller->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($webservices_list->idpersonas->Visible) { // idpersonas ?>
	<?php if ($webservices_list->SortUrl($webservices_list->idpersonas) == "") { ?>
		<th data-name="idpersonas" class="<?php echo $webservices_list->idpersonas->headerCellClass() ?>"><div id="elh_webservices_idpersonas" class="webservices_idpersonas"><div class="ew-table-header-caption"><?php echo $webservices_list->idpersonas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="idpersonas" class="<?php echo $webservices_list->idpersonas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $webservices_list->SortUrl($webservices_list->idpersonas) ?>', 1);"><div id="elh_webservices_idpersonas" class="webservices_idpersonas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $webservices_list->idpersonas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($webservices_list->idpersonas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($webservices_list->idpersonas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($webservices_list->disponiblecamas->Visible) { // disponiblecamas ?>
	<?php if ($webservices_list->SortUrl($webservices_list->disponiblecamas) == "") { ?>
		<th data-name="disponiblecamas" class="<?php echo $webservices_list->disponiblecamas->headerCellClass() ?>"><div id="elh_webservices_disponiblecamas" class="webservices_disponiblecamas"><div class="ew-table-header-caption"><?php echo $webservices_list->disponiblecamas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="disponiblecamas" class="<?php echo $webservices_list->disponiblecamas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $webservices_list->SortUrl($webservices_list->disponiblecamas) ?>', 1);"><div id="elh_webservices_disponiblecamas" class="webservices_disponiblecamas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $webservices_list->disponiblecamas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($webservices_list->disponiblecamas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($webservices_list->disponiblecamas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($webservices_list->afiliados->Visible) { // afiliados ?>
	<?php if ($webservices_list->SortUrl($webservices_list->afiliados) == "") { ?>
		<th data-name="afiliados" class="<?php echo $webservices_list->afiliados->headerCellClass() ?>"><div id="elh_webservices_afiliados" class="webservices_afiliados"><div class="ew-table-header-caption"><?php echo $webservices_list->afiliados->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="afiliados" class="<?php echo $webservices_list->afiliados->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $webservices_list->SortUrl($webservices_list->afiliados) ?>', 1);"><div id="elh_webservices_afiliados" class="webservices_afiliados">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $webservices_list->afiliados->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($webservices_list->afiliados->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($webservices_list->afiliados->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$webservices_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($webservices_list->ExportAll && $webservices_list->isExport()) {
	$webservices_list->StopRecord = $webservices_list->TotalRecords;
} else {

	// Set the last record to display
	if ($webservices_list->TotalRecords > $webservices_list->StartRecord + $webservices_list->DisplayRecords - 1)
		$webservices_list->StopRecord = $webservices_list->StartRecord + $webservices_list->DisplayRecords - 1;
	else
		$webservices_list->StopRecord = $webservices_list->TotalRecords;
}
$webservices_list->RecordCount = $webservices_list->StartRecord - 1;
if ($webservices_list->Recordset && !$webservices_list->Recordset->EOF) {
	$webservices_list->Recordset->moveFirst();
	$selectLimit = $webservices_list->UseSelectLimit;
	if (!$selectLimit && $webservices_list->StartRecord > 1)
		$webservices_list->Recordset->move($webservices_list->StartRecord - 1);
} elseif (!$webservices->AllowAddDeleteRow && $webservices_list->StopRecord == 0) {
	$webservices_list->StopRecord = $webservices->GridAddRowCount;
}

// Initialize aggregate
$webservices->RowType = ROWTYPE_AGGREGATEINIT;
$webservices->resetAttributes();
$webservices_list->renderRow();
while ($webservices_list->RecordCount < $webservices_list->StopRecord) {
	$webservices_list->RecordCount++;
	if ($webservices_list->RecordCount >= $webservices_list->StartRecord) {
		$webservices_list->RowCount++;

		// Set up key count
		$webservices_list->KeyCount = $webservices_list->RowIndex;

		// Init row class and style
		$webservices->resetAttributes();
		$webservices->CssClass = "";
		if ($webservices_list->isGridAdd()) {
		} else {
			$webservices_list->loadRowValues($webservices_list->Recordset); // Load row values
		}
		$webservices->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$webservices->RowAttrs->merge(["data-rowindex" => $webservices_list->RowCount, "id" => "r" . $webservices_list->RowCount . "_webservices", "data-rowtype" => $webservices->RowType]);

		// Render row
		$webservices_list->renderRow();

		// Render list options
		$webservices_list->renderListOptions();
?>
	<tr <?php echo $webservices->rowAttributes() ?>>
<?php

// Render list options (body, left)
$webservices_list->ListOptions->render("body", "left", $webservices_list->RowCount);
?>
	<?php if ($webservices_list->id_parametros->Visible) { // id_parametros ?>
		<td data-name="id_parametros" <?php echo $webservices_list->id_parametros->cellAttributes() ?>>
<span id="el<?php echo $webservices_list->RowCount ?>_webservices_id_parametros">
<span<?php echo $webservices_list->id_parametros->viewAttributes() ?>><?php echo $webservices_list->id_parametros->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($webservices_list->caller->Visible) { // caller ?>
		<td data-name="caller" <?php echo $webservices_list->caller->cellAttributes() ?>>
<span id="el<?php echo $webservices_list->RowCount ?>_webservices_caller">
<span<?php echo $webservices_list->caller->viewAttributes() ?>><?php echo $webservices_list->caller->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($webservices_list->idpersonas->Visible) { // idpersonas ?>
		<td data-name="idpersonas" <?php echo $webservices_list->idpersonas->cellAttributes() ?>>
<span id="el<?php echo $webservices_list->RowCount ?>_webservices_idpersonas">
<span<?php echo $webservices_list->idpersonas->viewAttributes() ?>><?php echo $webservices_list->idpersonas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($webservices_list->disponiblecamas->Visible) { // disponiblecamas ?>
		<td data-name="disponiblecamas" <?php echo $webservices_list->disponiblecamas->cellAttributes() ?>>
<span id="el<?php echo $webservices_list->RowCount ?>_webservices_disponiblecamas">
<span<?php echo $webservices_list->disponiblecamas->viewAttributes() ?>><?php echo $webservices_list->disponiblecamas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($webservices_list->afiliados->Visible) { // afiliados ?>
		<td data-name="afiliados" <?php echo $webservices_list->afiliados->cellAttributes() ?>>
<span id="el<?php echo $webservices_list->RowCount ?>_webservices_afiliados">
<span<?php echo $webservices_list->afiliados->viewAttributes() ?>><?php echo $webservices_list->afiliados->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$webservices_list->ListOptions->render("body", "right", $webservices_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$webservices_list->isGridAdd())
		$webservices_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$webservices->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($webservices_list->Recordset)
	$webservices_list->Recordset->Close();
?>
<?php if (!$webservices_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$webservices_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $webservices_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $webservices_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($webservices_list->TotalRecords == 0 && !$webservices->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $webservices_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$webservices_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$webservices_list->isExport()) { ?>
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
$webservices_list->terminate();
?>