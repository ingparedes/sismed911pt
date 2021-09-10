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
$interh_seguimiento_list = new interh_seguimiento_list();

// Run the page
$interh_seguimiento_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_seguimiento_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_seguimiento_list->isExport()) { ?>
<script>
var finterh_seguimientolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_seguimientolist = currentForm = new ew.Form("finterh_seguimientolist", "list");
	finterh_seguimientolist.formKeyCountName = '<?php echo $interh_seguimiento_list->FormKeyCountName ?>';
	loadjs.done("finterh_seguimientolist");
});
var finterh_seguimientolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	finterh_seguimientolistsrch = currentSearchForm = new ew.Form("finterh_seguimientolistsrch");

	// Validate function for search
	finterh_seguimientolistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	finterh_seguimientolistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_seguimientolistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	finterh_seguimientolistsrch.filterList = <?php echo $interh_seguimiento_list->getFilterList() ?>;
	loadjs.done("finterh_seguimientolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_seguimiento_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_seguimiento_list->TotalRecords > 0 && $interh_seguimiento_list->ExportOptions->visible()) { ?>
<?php $interh_seguimiento_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_seguimiento_list->ImportOptions->visible()) { ?>
<?php $interh_seguimiento_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_seguimiento_list->SearchOptions->visible()) { ?>
<?php $interh_seguimiento_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($interh_seguimiento_list->FilterOptions->visible()) { ?>
<?php $interh_seguimiento_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_seguimiento_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_seguimiento_list->isExport() && !$interh_seguimiento->CurrentAction) { ?>
<form name="finterh_seguimientolistsrch" id="finterh_seguimientolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="finterh_seguimientolistsrch-search-panel" class="<?php echo $interh_seguimiento_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_seguimiento">
	<div class="ew-extended-search">
<?php

// Render search row
$interh_seguimiento->RowType = ROWTYPE_SEARCH;
$interh_seguimiento->resetAttributes();
$interh_seguimiento_list->renderRow();
?>
<?php if ($interh_seguimiento_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php
		$interh_seguimiento_list->SearchColumnCount++;
		if (($interh_seguimiento_list->SearchColumnCount - 1) % $interh_seguimiento_list->SearchFieldsPerRow == 0) {
			$interh_seguimiento_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $interh_seguimiento_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_cod_casointerh" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $interh_seguimiento_list->cod_casointerh->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_cod_casointerh" id="z_cod_casointerh" value="=">
</span>
		<span id="el_interh_seguimiento_cod_casointerh" class="ew-search-field">
<input type="text" data-table="interh_seguimiento" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" maxlength="10" placeholder="<?php echo HtmlEncode($interh_seguimiento_list->cod_casointerh->getPlaceHolder()) ?>" value="<?php echo $interh_seguimiento_list->cod_casointerh->EditValue ?>"<?php echo $interh_seguimiento_list->cod_casointerh->editAttributes() ?>>
</span>
	</div>
	<?php if ($interh_seguimiento_list->SearchColumnCount % $interh_seguimiento_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($interh_seguimiento_list->SearchColumnCount % $interh_seguimiento_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $interh_seguimiento_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($interh_seguimiento_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($interh_seguimiento_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $interh_seguimiento_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($interh_seguimiento_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($interh_seguimiento_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($interh_seguimiento_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($interh_seguimiento_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $interh_seguimiento_list->showPageHeader(); ?>
<?php
$interh_seguimiento_list->showMessage();
?>
<?php if ($interh_seguimiento_list->TotalRecords > 0 || $interh_seguimiento->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_seguimiento_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_seguimiento">
<?php if (!$interh_seguimiento_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$interh_seguimiento_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_seguimiento_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_seguimiento_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finterh_seguimientolist" id="finterh_seguimientolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_seguimiento">
<div id="gmp_interh_seguimiento" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_seguimiento_list->TotalRecords > 0 || $interh_seguimiento_list->isGridEdit()) { ?>
<table id="tbl_interh_seguimientolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_seguimiento->RowType = ROWTYPE_HEADER;

// Render list options
$interh_seguimiento_list->renderListOptions();

// Render list options (header, left)
$interh_seguimiento_list->ListOptions->render("header", "left");
?>
<?php if ($interh_seguimiento_list->id_seguimiento->Visible) { // id_seguimiento ?>
	<?php if ($interh_seguimiento_list->SortUrl($interh_seguimiento_list->id_seguimiento) == "") { ?>
		<th data-name="id_seguimiento" class="<?php echo $interh_seguimiento_list->id_seguimiento->headerCellClass() ?>"><div id="elh_interh_seguimiento_id_seguimiento" class="interh_seguimiento_id_seguimiento"><div class="ew-table-header-caption"><?php echo $interh_seguimiento_list->id_seguimiento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_seguimiento" class="<?php echo $interh_seguimiento_list->id_seguimiento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_seguimiento_list->SortUrl($interh_seguimiento_list->id_seguimiento) ?>', 1);"><div id="elh_interh_seguimiento_id_seguimiento" class="interh_seguimiento_id_seguimiento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_seguimiento_list->id_seguimiento->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_seguimiento_list->id_seguimiento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_seguimiento_list->id_seguimiento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_seguimiento_list->fecha_seguimento->Visible) { // fecha_seguimento ?>
	<?php if ($interh_seguimiento_list->SortUrl($interh_seguimiento_list->fecha_seguimento) == "") { ?>
		<th data-name="fecha_seguimento" class="<?php echo $interh_seguimiento_list->fecha_seguimento->headerCellClass() ?>"><div id="elh_interh_seguimiento_fecha_seguimento" class="interh_seguimiento_fecha_seguimento"><div class="ew-table-header-caption"><?php echo $interh_seguimiento_list->fecha_seguimento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_seguimento" class="<?php echo $interh_seguimiento_list->fecha_seguimento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_seguimiento_list->SortUrl($interh_seguimiento_list->fecha_seguimento) ?>', 1);"><div id="elh_interh_seguimiento_fecha_seguimento" class="interh_seguimiento_fecha_seguimento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_seguimiento_list->fecha_seguimento->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_seguimiento_list->fecha_seguimento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_seguimiento_list->fecha_seguimento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_seguimiento_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($interh_seguimiento_list->SortUrl($interh_seguimiento_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_seguimiento_list->cod_casointerh->headerCellClass() ?>"><div id="elh_interh_seguimiento_cod_casointerh" class="interh_seguimiento_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_seguimiento_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_seguimiento_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_seguimiento_list->SortUrl($interh_seguimiento_list->cod_casointerh) ?>', 1);"><div id="elh_interh_seguimiento_cod_casointerh" class="interh_seguimiento_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_seguimiento_list->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_seguimiento_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_seguimiento_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_seguimiento_list->seguimento->Visible) { // seguimento ?>
	<?php if ($interh_seguimiento_list->SortUrl($interh_seguimiento_list->seguimento) == "") { ?>
		<th data-name="seguimento" class="<?php echo $interh_seguimiento_list->seguimento->headerCellClass() ?>"><div id="elh_interh_seguimiento_seguimento" class="interh_seguimiento_seguimento"><div class="ew-table-header-caption"><?php echo $interh_seguimiento_list->seguimento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="seguimento" class="<?php echo $interh_seguimiento_list->seguimento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_seguimiento_list->SortUrl($interh_seguimiento_list->seguimento) ?>', 1);"><div id="elh_interh_seguimiento_seguimento" class="interh_seguimiento_seguimento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_seguimiento_list->seguimento->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($interh_seguimiento_list->seguimento->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_seguimiento_list->seguimento->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_seguimiento_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_seguimiento_list->ExportAll && $interh_seguimiento_list->isExport()) {
	$interh_seguimiento_list->StopRecord = $interh_seguimiento_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_seguimiento_list->TotalRecords > $interh_seguimiento_list->StartRecord + $interh_seguimiento_list->DisplayRecords - 1)
		$interh_seguimiento_list->StopRecord = $interh_seguimiento_list->StartRecord + $interh_seguimiento_list->DisplayRecords - 1;
	else
		$interh_seguimiento_list->StopRecord = $interh_seguimiento_list->TotalRecords;
}
$interh_seguimiento_list->RecordCount = $interh_seguimiento_list->StartRecord - 1;
if ($interh_seguimiento_list->Recordset && !$interh_seguimiento_list->Recordset->EOF) {
	$interh_seguimiento_list->Recordset->moveFirst();
	$selectLimit = $interh_seguimiento_list->UseSelectLimit;
	if (!$selectLimit && $interh_seguimiento_list->StartRecord > 1)
		$interh_seguimiento_list->Recordset->move($interh_seguimiento_list->StartRecord - 1);
} elseif (!$interh_seguimiento->AllowAddDeleteRow && $interh_seguimiento_list->StopRecord == 0) {
	$interh_seguimiento_list->StopRecord = $interh_seguimiento->GridAddRowCount;
}

// Initialize aggregate
$interh_seguimiento->RowType = ROWTYPE_AGGREGATEINIT;
$interh_seguimiento->resetAttributes();
$interh_seguimiento_list->renderRow();
while ($interh_seguimiento_list->RecordCount < $interh_seguimiento_list->StopRecord) {
	$interh_seguimiento_list->RecordCount++;
	if ($interh_seguimiento_list->RecordCount >= $interh_seguimiento_list->StartRecord) {
		$interh_seguimiento_list->RowCount++;

		// Set up key count
		$interh_seguimiento_list->KeyCount = $interh_seguimiento_list->RowIndex;

		// Init row class and style
		$interh_seguimiento->resetAttributes();
		$interh_seguimiento->CssClass = "";
		if ($interh_seguimiento_list->isGridAdd()) {
		} else {
			$interh_seguimiento_list->loadRowValues($interh_seguimiento_list->Recordset); // Load row values
		}
		$interh_seguimiento->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_seguimiento->RowAttrs->merge(["data-rowindex" => $interh_seguimiento_list->RowCount, "id" => "r" . $interh_seguimiento_list->RowCount . "_interh_seguimiento", "data-rowtype" => $interh_seguimiento->RowType]);

		// Render row
		$interh_seguimiento_list->renderRow();

		// Render list options
		$interh_seguimiento_list->renderListOptions();
?>
	<tr <?php echo $interh_seguimiento->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_seguimiento_list->ListOptions->render("body", "left", $interh_seguimiento_list->RowCount);
?>
	<?php if ($interh_seguimiento_list->id_seguimiento->Visible) { // id_seguimiento ?>
		<td data-name="id_seguimiento" <?php echo $interh_seguimiento_list->id_seguimiento->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_list->RowCount ?>_interh_seguimiento_id_seguimiento">
<span<?php echo $interh_seguimiento_list->id_seguimiento->viewAttributes() ?>><?php echo $interh_seguimiento_list->id_seguimiento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_seguimiento_list->fecha_seguimento->Visible) { // fecha_seguimento ?>
		<td data-name="fecha_seguimento" <?php echo $interh_seguimiento_list->fecha_seguimento->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_list->RowCount ?>_interh_seguimiento_fecha_seguimento">
<span<?php echo $interh_seguimiento_list->fecha_seguimento->viewAttributes() ?>><?php echo $interh_seguimiento_list->fecha_seguimento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_seguimiento_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $interh_seguimiento_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_list->RowCount ?>_interh_seguimiento_cod_casointerh">
<span<?php echo $interh_seguimiento_list->cod_casointerh->viewAttributes() ?>><?php echo $interh_seguimiento_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_seguimiento_list->seguimento->Visible) { // seguimento ?>
		<td data-name="seguimento" <?php echo $interh_seguimiento_list->seguimento->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_list->RowCount ?>_interh_seguimiento_seguimento">
<span<?php echo $interh_seguimiento_list->seguimento->viewAttributes() ?>><?php echo $interh_seguimiento_list->seguimento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_seguimiento_list->ListOptions->render("body", "right", $interh_seguimiento_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$interh_seguimiento_list->isGridAdd())
		$interh_seguimiento_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_seguimiento->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_seguimiento_list->Recordset)
	$interh_seguimiento_list->Recordset->Close();
?>
<?php if (!$interh_seguimiento_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_seguimiento_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_seguimiento_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_seguimiento_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_seguimiento_list->TotalRecords == 0 && !$interh_seguimiento->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_seguimiento_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$interh_seguimiento_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_seguimiento_list->isExport()) { ?>
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
$interh_seguimiento_list->terminate();
?>