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
$preh_destino_list = new preh_destino_list();

// Run the page
$preh_destino_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_destino_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_destino_list->isExport()) { ?>
<script>
var fpreh_destinolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_destinolist = currentForm = new ew.Form("fpreh_destinolist", "list");
	fpreh_destinolist.formKeyCountName = '<?php echo $preh_destino_list->FormKeyCountName ?>';
	loadjs.done("fpreh_destinolist");
});
var fpreh_destinolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_destinolistsrch = currentSearchForm = new ew.Form("fpreh_destinolistsrch");

	// Dynamic selection lists
	// Filters

	fpreh_destinolistsrch.filterList = <?php echo $preh_destino_list->getFilterList() ?>;
	loadjs.done("fpreh_destinolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_destino_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_destino_list->TotalRecords > 0 && $preh_destino_list->ExportOptions->visible()) { ?>
<?php $preh_destino_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_destino_list->ImportOptions->visible()) { ?>
<?php $preh_destino_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_destino_list->SearchOptions->visible()) { ?>
<?php $preh_destino_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_destino_list->FilterOptions->visible()) { ?>
<?php $preh_destino_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_destino_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_destino_list->isExport() && !$preh_destino->CurrentAction) { ?>
<form name="fpreh_destinolistsrch" id="fpreh_destinolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_destinolistsrch-search-panel" class="<?php echo $preh_destino_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_destino">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $preh_destino_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_destino_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_destino_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_destino_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_destino_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_destino_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_destino_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_destino_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_destino_list->showPageHeader(); ?>
<?php
$preh_destino_list->showMessage();
?>
<?php if ($preh_destino_list->TotalRecords > 0 || $preh_destino->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_destino_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_destino">
<?php if (!$preh_destino_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_destino_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_destino_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_destino_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_destinolist" id="fpreh_destinolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_destino">
<div id="gmp_preh_destino" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_destino_list->TotalRecords > 0 || $preh_destino_list->isGridEdit()) { ?>
<table id="tbl_preh_destinolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_destino->RowType = ROWTYPE_HEADER;

// Render list options
$preh_destino_list->renderListOptions();

// Render list options (header, left)
$preh_destino_list->ListOptions->render("header", "left");
?>
<?php if ($preh_destino_list->id_destino->Visible) { // id_destino ?>
	<?php if ($preh_destino_list->SortUrl($preh_destino_list->id_destino) == "") { ?>
		<th data-name="id_destino" class="<?php echo $preh_destino_list->id_destino->headerCellClass() ?>"><div id="elh_preh_destino_id_destino" class="preh_destino_id_destino"><div class="ew-table-header-caption"><?php echo $preh_destino_list->id_destino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_destino" class="<?php echo $preh_destino_list->id_destino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_destino_list->SortUrl($preh_destino_list->id_destino) ?>', 1);"><div id="elh_preh_destino_id_destino" class="preh_destino_id_destino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_destino_list->id_destino->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_destino_list->id_destino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_destino_list->id_destino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_destino_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_destino_list->SortUrl($preh_destino_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_destino_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_destino_cod_casopreh" class="preh_destino_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_destino_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_destino_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_destino_list->SortUrl($preh_destino_list->cod_casopreh) ?>', 1);"><div id="elh_preh_destino_cod_casopreh" class="preh_destino_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_destino_list->cod_casopreh->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_destino_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_destino_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_destino_list->cod_hospitaldestino->Visible) { // cod_hospitaldestino ?>
	<?php if ($preh_destino_list->SortUrl($preh_destino_list->cod_hospitaldestino) == "") { ?>
		<th data-name="cod_hospitaldestino" class="<?php echo $preh_destino_list->cod_hospitaldestino->headerCellClass() ?>"><div id="elh_preh_destino_cod_hospitaldestino" class="preh_destino_cod_hospitaldestino"><div class="ew-table-header-caption"><?php echo $preh_destino_list->cod_hospitaldestino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_hospitaldestino" class="<?php echo $preh_destino_list->cod_hospitaldestino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_destino_list->SortUrl($preh_destino_list->cod_hospitaldestino) ?>', 1);"><div id="elh_preh_destino_cod_hospitaldestino" class="preh_destino_cod_hospitaldestino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_destino_list->cod_hospitaldestino->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_destino_list->cod_hospitaldestino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_destino_list->cod_hospitaldestino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_destino_list->nom_medicorecibe->Visible) { // nom_medicorecibe ?>
	<?php if ($preh_destino_list->SortUrl($preh_destino_list->nom_medicorecibe) == "") { ?>
		<th data-name="nom_medicorecibe" class="<?php echo $preh_destino_list->nom_medicorecibe->headerCellClass() ?>"><div id="elh_preh_destino_nom_medicorecibe" class="preh_destino_nom_medicorecibe"><div class="ew-table-header-caption"><?php echo $preh_destino_list->nom_medicorecibe->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nom_medicorecibe" class="<?php echo $preh_destino_list->nom_medicorecibe->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_destino_list->SortUrl($preh_destino_list->nom_medicorecibe) ?>', 1);"><div id="elh_preh_destino_nom_medicorecibe" class="preh_destino_nom_medicorecibe">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_destino_list->nom_medicorecibe->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_destino_list->nom_medicorecibe->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_destino_list->nom_medicorecibe->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_destino_list->telefono_medico->Visible) { // telefono_medico ?>
	<?php if ($preh_destino_list->SortUrl($preh_destino_list->telefono_medico) == "") { ?>
		<th data-name="telefono_medico" class="<?php echo $preh_destino_list->telefono_medico->headerCellClass() ?>"><div id="elh_preh_destino_telefono_medico" class="preh_destino_telefono_medico"><div class="ew-table-header-caption"><?php echo $preh_destino_list->telefono_medico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono_medico" class="<?php echo $preh_destino_list->telefono_medico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_destino_list->SortUrl($preh_destino_list->telefono_medico) ?>', 1);"><div id="elh_preh_destino_telefono_medico" class="preh_destino_telefono_medico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_destino_list->telefono_medico->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_destino_list->telefono_medico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_destino_list->telefono_medico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_destino_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_destino_list->ExportAll && $preh_destino_list->isExport()) {
	$preh_destino_list->StopRecord = $preh_destino_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_destino_list->TotalRecords > $preh_destino_list->StartRecord + $preh_destino_list->DisplayRecords - 1)
		$preh_destino_list->StopRecord = $preh_destino_list->StartRecord + $preh_destino_list->DisplayRecords - 1;
	else
		$preh_destino_list->StopRecord = $preh_destino_list->TotalRecords;
}
$preh_destino_list->RecordCount = $preh_destino_list->StartRecord - 1;
if ($preh_destino_list->Recordset && !$preh_destino_list->Recordset->EOF) {
	$preh_destino_list->Recordset->moveFirst();
	$selectLimit = $preh_destino_list->UseSelectLimit;
	if (!$selectLimit && $preh_destino_list->StartRecord > 1)
		$preh_destino_list->Recordset->move($preh_destino_list->StartRecord - 1);
} elseif (!$preh_destino->AllowAddDeleteRow && $preh_destino_list->StopRecord == 0) {
	$preh_destino_list->StopRecord = $preh_destino->GridAddRowCount;
}

// Initialize aggregate
$preh_destino->RowType = ROWTYPE_AGGREGATEINIT;
$preh_destino->resetAttributes();
$preh_destino_list->renderRow();
while ($preh_destino_list->RecordCount < $preh_destino_list->StopRecord) {
	$preh_destino_list->RecordCount++;
	if ($preh_destino_list->RecordCount >= $preh_destino_list->StartRecord) {
		$preh_destino_list->RowCount++;

		// Set up key count
		$preh_destino_list->KeyCount = $preh_destino_list->RowIndex;

		// Init row class and style
		$preh_destino->resetAttributes();
		$preh_destino->CssClass = "";
		if ($preh_destino_list->isGridAdd()) {
		} else {
			$preh_destino_list->loadRowValues($preh_destino_list->Recordset); // Load row values
		}
		$preh_destino->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_destino->RowAttrs->merge(["data-rowindex" => $preh_destino_list->RowCount, "id" => "r" . $preh_destino_list->RowCount . "_preh_destino", "data-rowtype" => $preh_destino->RowType]);

		// Render row
		$preh_destino_list->renderRow();

		// Render list options
		$preh_destino_list->renderListOptions();
?>
	<tr <?php echo $preh_destino->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_destino_list->ListOptions->render("body", "left", $preh_destino_list->RowCount);
?>
	<?php if ($preh_destino_list->id_destino->Visible) { // id_destino ?>
		<td data-name="id_destino" <?php echo $preh_destino_list->id_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_list->RowCount ?>_preh_destino_id_destino">
<span<?php echo $preh_destino_list->id_destino->viewAttributes() ?>><?php echo $preh_destino_list->id_destino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_destino_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_destino_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_list->RowCount ?>_preh_destino_cod_casopreh">
<span<?php echo $preh_destino_list->cod_casopreh->viewAttributes() ?>><?php echo $preh_destino_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_destino_list->cod_hospitaldestino->Visible) { // cod_hospitaldestino ?>
		<td data-name="cod_hospitaldestino" <?php echo $preh_destino_list->cod_hospitaldestino->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_list->RowCount ?>_preh_destino_cod_hospitaldestino">
<span<?php echo $preh_destino_list->cod_hospitaldestino->viewAttributes() ?>><?php echo $preh_destino_list->cod_hospitaldestino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_destino_list->nom_medicorecibe->Visible) { // nom_medicorecibe ?>
		<td data-name="nom_medicorecibe" <?php echo $preh_destino_list->nom_medicorecibe->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_list->RowCount ?>_preh_destino_nom_medicorecibe">
<span<?php echo $preh_destino_list->nom_medicorecibe->viewAttributes() ?>><?php echo $preh_destino_list->nom_medicorecibe->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_destino_list->telefono_medico->Visible) { // telefono_medico ?>
		<td data-name="telefono_medico" <?php echo $preh_destino_list->telefono_medico->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_list->RowCount ?>_preh_destino_telefono_medico">
<span<?php echo $preh_destino_list->telefono_medico->viewAttributes() ?>><?php echo $preh_destino_list->telefono_medico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_destino_list->ListOptions->render("body", "right", $preh_destino_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_destino_list->isGridAdd())
		$preh_destino_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_destino->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_destino_list->Recordset)
	$preh_destino_list->Recordset->Close();
?>
<?php if (!$preh_destino_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_destino_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_destino_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_destino_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_destino_list->TotalRecords == 0 && !$preh_destino->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_destino_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_destino_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_destino_list->isExport()) { ?>
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
$preh_destino_list->terminate();
?>