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
$causa_trauma_situacion_list = new causa_trauma_situacion_list();

// Run the page
$causa_trauma_situacion_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_trauma_situacion_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$causa_trauma_situacion_list->isExport()) { ?>
<script>
var fcausa_trauma_situacionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcausa_trauma_situacionlist = currentForm = new ew.Form("fcausa_trauma_situacionlist", "list");
	fcausa_trauma_situacionlist.formKeyCountName = '<?php echo $causa_trauma_situacion_list->FormKeyCountName ?>';
	loadjs.done("fcausa_trauma_situacionlist");
});
var fcausa_trauma_situacionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcausa_trauma_situacionlistsrch = currentSearchForm = new ew.Form("fcausa_trauma_situacionlistsrch");

	// Dynamic selection lists
	// Filters

	fcausa_trauma_situacionlistsrch.filterList = <?php echo $causa_trauma_situacion_list->getFilterList() ?>;
	loadjs.done("fcausa_trauma_situacionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$causa_trauma_situacion_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($causa_trauma_situacion_list->TotalRecords > 0 && $causa_trauma_situacion_list->ExportOptions->visible()) { ?>
<?php $causa_trauma_situacion_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_trauma_situacion_list->ImportOptions->visible()) { ?>
<?php $causa_trauma_situacion_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_trauma_situacion_list->SearchOptions->visible()) { ?>
<?php $causa_trauma_situacion_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($causa_trauma_situacion_list->FilterOptions->visible()) { ?>
<?php $causa_trauma_situacion_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$causa_trauma_situacion_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$causa_trauma_situacion_list->isExport() && !$causa_trauma_situacion->CurrentAction) { ?>
<form name="fcausa_trauma_situacionlistsrch" id="fcausa_trauma_situacionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcausa_trauma_situacionlistsrch-search-panel" class="<?php echo $causa_trauma_situacion_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="causa_trauma_situacion">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $causa_trauma_situacion_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($causa_trauma_situacion_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($causa_trauma_situacion_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $causa_trauma_situacion_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($causa_trauma_situacion_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($causa_trauma_situacion_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($causa_trauma_situacion_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($causa_trauma_situacion_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $causa_trauma_situacion_list->showPageHeader(); ?>
<?php
$causa_trauma_situacion_list->showMessage();
?>
<?php if ($causa_trauma_situacion_list->TotalRecords > 0 || $causa_trauma_situacion->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($causa_trauma_situacion_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> causa_trauma_situacion">
<?php if (!$causa_trauma_situacion_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$causa_trauma_situacion_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_trauma_situacion_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_trauma_situacion_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcausa_trauma_situacionlist" id="fcausa_trauma_situacionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_trauma_situacion">
<div id="gmp_causa_trauma_situacion" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($causa_trauma_situacion_list->TotalRecords > 0 || $causa_trauma_situacion_list->isGridEdit()) { ?>
<table id="tbl_causa_trauma_situacionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$causa_trauma_situacion->RowType = ROWTYPE_HEADER;

// Render list options
$causa_trauma_situacion_list->renderListOptions();

// Render list options (header, left)
$causa_trauma_situacion_list->ListOptions->render("header", "left");
?>
<?php if ($causa_trauma_situacion_list->id->Visible) { // id ?>
	<?php if ($causa_trauma_situacion_list->SortUrl($causa_trauma_situacion_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $causa_trauma_situacion_list->id->headerCellClass() ?>"><div id="elh_causa_trauma_situacion_id" class="causa_trauma_situacion_id"><div class="ew-table-header-caption"><?php echo $causa_trauma_situacion_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $causa_trauma_situacion_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_trauma_situacion_list->SortUrl($causa_trauma_situacion_list->id) ?>', 1);"><div id="elh_causa_trauma_situacion_id" class="causa_trauma_situacion_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_trauma_situacion_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_trauma_situacion_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_trauma_situacion_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($causa_trauma_situacion_list->causa_trauma_categoria->Visible) { // causa_trauma_categoria ?>
	<?php if ($causa_trauma_situacion_list->SortUrl($causa_trauma_situacion_list->causa_trauma_categoria) == "") { ?>
		<th data-name="causa_trauma_categoria" class="<?php echo $causa_trauma_situacion_list->causa_trauma_categoria->headerCellClass() ?>"><div id="elh_causa_trauma_situacion_causa_trauma_categoria" class="causa_trauma_situacion_causa_trauma_categoria"><div class="ew-table-header-caption"><?php echo $causa_trauma_situacion_list->causa_trauma_categoria->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="causa_trauma_categoria" class="<?php echo $causa_trauma_situacion_list->causa_trauma_categoria->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_trauma_situacion_list->SortUrl($causa_trauma_situacion_list->causa_trauma_categoria) ?>', 1);"><div id="elh_causa_trauma_situacion_causa_trauma_categoria" class="causa_trauma_situacion_causa_trauma_categoria">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_trauma_situacion_list->causa_trauma_categoria->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_trauma_situacion_list->causa_trauma_categoria->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_trauma_situacion_list->causa_trauma_categoria->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($causa_trauma_situacion_list->nombre->Visible) { // nombre ?>
	<?php if ($causa_trauma_situacion_list->SortUrl($causa_trauma_situacion_list->nombre) == "") { ?>
		<th data-name="nombre" class="<?php echo $causa_trauma_situacion_list->nombre->headerCellClass() ?>"><div id="elh_causa_trauma_situacion_nombre" class="causa_trauma_situacion_nombre"><div class="ew-table-header-caption"><?php echo $causa_trauma_situacion_list->nombre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre" class="<?php echo $causa_trauma_situacion_list->nombre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_trauma_situacion_list->SortUrl($causa_trauma_situacion_list->nombre) ?>', 1);"><div id="elh_causa_trauma_situacion_nombre" class="causa_trauma_situacion_nombre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_trauma_situacion_list->nombre->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($causa_trauma_situacion_list->nombre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_trauma_situacion_list->nombre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$causa_trauma_situacion_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($causa_trauma_situacion_list->ExportAll && $causa_trauma_situacion_list->isExport()) {
	$causa_trauma_situacion_list->StopRecord = $causa_trauma_situacion_list->TotalRecords;
} else {

	// Set the last record to display
	if ($causa_trauma_situacion_list->TotalRecords > $causa_trauma_situacion_list->StartRecord + $causa_trauma_situacion_list->DisplayRecords - 1)
		$causa_trauma_situacion_list->StopRecord = $causa_trauma_situacion_list->StartRecord + $causa_trauma_situacion_list->DisplayRecords - 1;
	else
		$causa_trauma_situacion_list->StopRecord = $causa_trauma_situacion_list->TotalRecords;
}
$causa_trauma_situacion_list->RecordCount = $causa_trauma_situacion_list->StartRecord - 1;
if ($causa_trauma_situacion_list->Recordset && !$causa_trauma_situacion_list->Recordset->EOF) {
	$causa_trauma_situacion_list->Recordset->moveFirst();
	$selectLimit = $causa_trauma_situacion_list->UseSelectLimit;
	if (!$selectLimit && $causa_trauma_situacion_list->StartRecord > 1)
		$causa_trauma_situacion_list->Recordset->move($causa_trauma_situacion_list->StartRecord - 1);
} elseif (!$causa_trauma_situacion->AllowAddDeleteRow && $causa_trauma_situacion_list->StopRecord == 0) {
	$causa_trauma_situacion_list->StopRecord = $causa_trauma_situacion->GridAddRowCount;
}

// Initialize aggregate
$causa_trauma_situacion->RowType = ROWTYPE_AGGREGATEINIT;
$causa_trauma_situacion->resetAttributes();
$causa_trauma_situacion_list->renderRow();
while ($causa_trauma_situacion_list->RecordCount < $causa_trauma_situacion_list->StopRecord) {
	$causa_trauma_situacion_list->RecordCount++;
	if ($causa_trauma_situacion_list->RecordCount >= $causa_trauma_situacion_list->StartRecord) {
		$causa_trauma_situacion_list->RowCount++;

		// Set up key count
		$causa_trauma_situacion_list->KeyCount = $causa_trauma_situacion_list->RowIndex;

		// Init row class and style
		$causa_trauma_situacion->resetAttributes();
		$causa_trauma_situacion->CssClass = "";
		if ($causa_trauma_situacion_list->isGridAdd()) {
		} else {
			$causa_trauma_situacion_list->loadRowValues($causa_trauma_situacion_list->Recordset); // Load row values
		}
		$causa_trauma_situacion->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$causa_trauma_situacion->RowAttrs->merge(["data-rowindex" => $causa_trauma_situacion_list->RowCount, "id" => "r" . $causa_trauma_situacion_list->RowCount . "_causa_trauma_situacion", "data-rowtype" => $causa_trauma_situacion->RowType]);

		// Render row
		$causa_trauma_situacion_list->renderRow();

		// Render list options
		$causa_trauma_situacion_list->renderListOptions();
?>
	<tr <?php echo $causa_trauma_situacion->rowAttributes() ?>>
<?php

// Render list options (body, left)
$causa_trauma_situacion_list->ListOptions->render("body", "left", $causa_trauma_situacion_list->RowCount);
?>
	<?php if ($causa_trauma_situacion_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $causa_trauma_situacion_list->id->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_situacion_list->RowCount ?>_causa_trauma_situacion_id">
<span<?php echo $causa_trauma_situacion_list->id->viewAttributes() ?>><?php echo $causa_trauma_situacion_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($causa_trauma_situacion_list->causa_trauma_categoria->Visible) { // causa_trauma_categoria ?>
		<td data-name="causa_trauma_categoria" <?php echo $causa_trauma_situacion_list->causa_trauma_categoria->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_situacion_list->RowCount ?>_causa_trauma_situacion_causa_trauma_categoria">
<span<?php echo $causa_trauma_situacion_list->causa_trauma_categoria->viewAttributes() ?>><?php echo $causa_trauma_situacion_list->causa_trauma_categoria->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($causa_trauma_situacion_list->nombre->Visible) { // nombre ?>
		<td data-name="nombre" <?php echo $causa_trauma_situacion_list->nombre->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_situacion_list->RowCount ?>_causa_trauma_situacion_nombre">
<span<?php echo $causa_trauma_situacion_list->nombre->viewAttributes() ?>><?php echo $causa_trauma_situacion_list->nombre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$causa_trauma_situacion_list->ListOptions->render("body", "right", $causa_trauma_situacion_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$causa_trauma_situacion_list->isGridAdd())
		$causa_trauma_situacion_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$causa_trauma_situacion->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($causa_trauma_situacion_list->Recordset)
	$causa_trauma_situacion_list->Recordset->Close();
?>
<?php if (!$causa_trauma_situacion_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$causa_trauma_situacion_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_trauma_situacion_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_trauma_situacion_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($causa_trauma_situacion_list->TotalRecords == 0 && !$causa_trauma_situacion->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $causa_trauma_situacion_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$causa_trauma_situacion_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$causa_trauma_situacion_list->isExport()) { ?>
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
$causa_trauma_situacion_list->terminate();
?>