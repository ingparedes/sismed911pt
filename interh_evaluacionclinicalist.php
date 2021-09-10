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
$interh_evaluacionclinica_list = new interh_evaluacionclinica_list();

// Run the page
$interh_evaluacionclinica_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_evaluacionclinica_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_evaluacionclinica_list->isExport()) { ?>
<script>
var finterh_evaluacionclinicalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	finterh_evaluacionclinicalist = currentForm = new ew.Form("finterh_evaluacionclinicalist", "list");
	finterh_evaluacionclinicalist.formKeyCountName = '<?php echo $interh_evaluacionclinica_list->FormKeyCountName ?>';
	loadjs.done("finterh_evaluacionclinicalist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_evaluacionclinica_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($interh_evaluacionclinica_list->TotalRecords > 0 && $interh_evaluacionclinica_list->ExportOptions->visible()) { ?>
<?php $interh_evaluacionclinica_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->ImportOptions->visible()) { ?>
<?php $interh_evaluacionclinica_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$interh_evaluacionclinica_list->renderOtherOptions();
?>
<?php $interh_evaluacionclinica_list->showPageHeader(); ?>
<?php
$interh_evaluacionclinica_list->showMessage();
?>
<?php if ($interh_evaluacionclinica_list->TotalRecords > 0 || $interh_evaluacionclinica->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($interh_evaluacionclinica_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> interh_evaluacionclinica">
<?php if (!$interh_evaluacionclinica_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$interh_evaluacionclinica_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_evaluacionclinica_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_evaluacionclinica_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="finterh_evaluacionclinicalist" id="finterh_evaluacionclinicalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_evaluacionclinica">
<div id="gmp_interh_evaluacionclinica" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($interh_evaluacionclinica_list->TotalRecords > 0 || $interh_evaluacionclinica_list->isGridEdit()) { ?>
<table id="tbl_interh_evaluacionclinicalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$interh_evaluacionclinica->RowType = ROWTYPE_HEADER;

// Render list options
$interh_evaluacionclinica_list->renderListOptions();

// Render list options (header, left)
$interh_evaluacionclinica_list->ListOptions->render("header", "left");
?>
<?php if ($interh_evaluacionclinica_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_evaluacionclinica_list->cod_casointerh->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_cod_casointerh" class="interh_evaluacionclinica_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $interh_evaluacionclinica_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->cod_casointerh) ?>', 1);"><div id="elh_interh_evaluacionclinica_cod_casointerh" class="interh_evaluacionclinica_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->fecha_horaevaluacion) == "") { ?>
		<th data-name="fecha_horaevaluacion" class="<?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_fecha_horaevaluacion" class="interh_evaluacionclinica_fecha_horaevaluacion"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_horaevaluacion" class="<?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->fecha_horaevaluacion) ?>', 1);"><div id="elh_interh_evaluacionclinica_fecha_horaevaluacion" class="interh_evaluacionclinica_fecha_horaevaluacion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->fecha_horaevaluacion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->fecha_horaevaluacion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->cod_diag_cie->Visible) { // cod_diag_cie ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->cod_diag_cie) == "") { ?>
		<th data-name="cod_diag_cie" class="<?php echo $interh_evaluacionclinica_list->cod_diag_cie->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_cod_diag_cie" class="interh_evaluacionclinica_cod_diag_cie"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->cod_diag_cie->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_diag_cie" class="<?php echo $interh_evaluacionclinica_list->cod_diag_cie->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->cod_diag_cie) ?>', 1);"><div id="elh_interh_evaluacionclinica_cod_diag_cie" class="interh_evaluacionclinica_cod_diag_cie">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->cod_diag_cie->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->cod_diag_cie->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->cod_diag_cie->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->triage->Visible) { // triage ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->triage) == "") { ?>
		<th data-name="triage" class="<?php echo $interh_evaluacionclinica_list->triage->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_triage" class="interh_evaluacionclinica_triage"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->triage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="triage" class="<?php echo $interh_evaluacionclinica_list->triage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->triage) ?>', 1);"><div id="elh_interh_evaluacionclinica_triage" class="interh_evaluacionclinica_triage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->triage->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->triage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->triage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->sv_tx->Visible) { // sv_tx ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->sv_tx) == "") { ?>
		<th data-name="sv_tx" class="<?php echo $interh_evaluacionclinica_list->sv_tx->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_sv_tx" class="interh_evaluacionclinica_sv_tx"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->sv_tx->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_tx" class="<?php echo $interh_evaluacionclinica_list->sv_tx->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->sv_tx) ?>', 1);"><div id="elh_interh_evaluacionclinica_sv_tx" class="interh_evaluacionclinica_sv_tx">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->sv_tx->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->sv_tx->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->sv_tx->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->sv_fc->Visible) { // sv_fc ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->sv_fc) == "") { ?>
		<th data-name="sv_fc" class="<?php echo $interh_evaluacionclinica_list->sv_fc->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_sv_fc" class="interh_evaluacionclinica_sv_fc"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->sv_fc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_fc" class="<?php echo $interh_evaluacionclinica_list->sv_fc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->sv_fc) ?>', 1);"><div id="elh_interh_evaluacionclinica_sv_fc" class="interh_evaluacionclinica_sv_fc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->sv_fc->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->sv_fc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->sv_fc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_evaluacionclinica_list->sv_gl->Visible) { // sv_gl ?>
	<?php if ($interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->sv_gl) == "") { ?>
		<th data-name="sv_gl" class="<?php echo $interh_evaluacionclinica_list->sv_gl->headerCellClass() ?>"><div id="elh_interh_evaluacionclinica_sv_gl" class="interh_evaluacionclinica_sv_gl"><div class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->sv_gl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sv_gl" class="<?php echo $interh_evaluacionclinica_list->sv_gl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_evaluacionclinica_list->SortUrl($interh_evaluacionclinica_list->sv_gl) ?>', 1);"><div id="elh_interh_evaluacionclinica_sv_gl" class="interh_evaluacionclinica_sv_gl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_evaluacionclinica_list->sv_gl->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_evaluacionclinica_list->sv_gl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_evaluacionclinica_list->sv_gl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$interh_evaluacionclinica_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($interh_evaluacionclinica_list->ExportAll && $interh_evaluacionclinica_list->isExport()) {
	$interh_evaluacionclinica_list->StopRecord = $interh_evaluacionclinica_list->TotalRecords;
} else {

	// Set the last record to display
	if ($interh_evaluacionclinica_list->TotalRecords > $interh_evaluacionclinica_list->StartRecord + $interh_evaluacionclinica_list->DisplayRecords - 1)
		$interh_evaluacionclinica_list->StopRecord = $interh_evaluacionclinica_list->StartRecord + $interh_evaluacionclinica_list->DisplayRecords - 1;
	else
		$interh_evaluacionclinica_list->StopRecord = $interh_evaluacionclinica_list->TotalRecords;
}
$interh_evaluacionclinica_list->RecordCount = $interh_evaluacionclinica_list->StartRecord - 1;
if ($interh_evaluacionclinica_list->Recordset && !$interh_evaluacionclinica_list->Recordset->EOF) {
	$interh_evaluacionclinica_list->Recordset->moveFirst();
	$selectLimit = $interh_evaluacionclinica_list->UseSelectLimit;
	if (!$selectLimit && $interh_evaluacionclinica_list->StartRecord > 1)
		$interh_evaluacionclinica_list->Recordset->move($interh_evaluacionclinica_list->StartRecord - 1);
} elseif (!$interh_evaluacionclinica->AllowAddDeleteRow && $interh_evaluacionclinica_list->StopRecord == 0) {
	$interh_evaluacionclinica_list->StopRecord = $interh_evaluacionclinica->GridAddRowCount;
}

// Initialize aggregate
$interh_evaluacionclinica->RowType = ROWTYPE_AGGREGATEINIT;
$interh_evaluacionclinica->resetAttributes();
$interh_evaluacionclinica_list->renderRow();
while ($interh_evaluacionclinica_list->RecordCount < $interh_evaluacionclinica_list->StopRecord) {
	$interh_evaluacionclinica_list->RecordCount++;
	if ($interh_evaluacionclinica_list->RecordCount >= $interh_evaluacionclinica_list->StartRecord) {
		$interh_evaluacionclinica_list->RowCount++;

		// Set up key count
		$interh_evaluacionclinica_list->KeyCount = $interh_evaluacionclinica_list->RowIndex;

		// Init row class and style
		$interh_evaluacionclinica->resetAttributes();
		$interh_evaluacionclinica->CssClass = "";
		if ($interh_evaluacionclinica_list->isGridAdd()) {
		} else {
			$interh_evaluacionclinica_list->loadRowValues($interh_evaluacionclinica_list->Recordset); // Load row values
		}
		$interh_evaluacionclinica->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$interh_evaluacionclinica->RowAttrs->merge(["data-rowindex" => $interh_evaluacionclinica_list->RowCount, "id" => "r" . $interh_evaluacionclinica_list->RowCount . "_interh_evaluacionclinica", "data-rowtype" => $interh_evaluacionclinica->RowType]);

		// Render row
		$interh_evaluacionclinica_list->renderRow();

		// Render list options
		$interh_evaluacionclinica_list->renderListOptions();
?>
	<tr <?php echo $interh_evaluacionclinica->rowAttributes() ?>>
<?php

// Render list options (body, left)
$interh_evaluacionclinica_list->ListOptions->render("body", "left", $interh_evaluacionclinica_list->RowCount);
?>
	<?php if ($interh_evaluacionclinica_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $interh_evaluacionclinica_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_cod_casointerh">
<span<?php echo $interh_evaluacionclinica_list->cod_casointerh->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_evaluacionclinica_list->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
		<td data-name="fecha_horaevaluacion" <?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_fecha_horaevaluacion">
<span<?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->fecha_horaevaluacion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_evaluacionclinica_list->cod_diag_cie->Visible) { // cod_diag_cie ?>
		<td data-name="cod_diag_cie" <?php echo $interh_evaluacionclinica_list->cod_diag_cie->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_cod_diag_cie">
<span<?php echo $interh_evaluacionclinica_list->cod_diag_cie->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->cod_diag_cie->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_evaluacionclinica_list->triage->Visible) { // triage ?>
		<td data-name="triage" <?php echo $interh_evaluacionclinica_list->triage->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_triage">
<span<?php echo $interh_evaluacionclinica_list->triage->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->triage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_evaluacionclinica_list->sv_tx->Visible) { // sv_tx ?>
		<td data-name="sv_tx" <?php echo $interh_evaluacionclinica_list->sv_tx->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_sv_tx">
<span<?php echo $interh_evaluacionclinica_list->sv_tx->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->sv_tx->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_evaluacionclinica_list->sv_fc->Visible) { // sv_fc ?>
		<td data-name="sv_fc" <?php echo $interh_evaluacionclinica_list->sv_fc->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_sv_fc">
<span<?php echo $interh_evaluacionclinica_list->sv_fc->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->sv_fc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($interh_evaluacionclinica_list->sv_gl->Visible) { // sv_gl ?>
		<td data-name="sv_gl" <?php echo $interh_evaluacionclinica_list->sv_gl->cellAttributes() ?>>
<span id="el<?php echo $interh_evaluacionclinica_list->RowCount ?>_interh_evaluacionclinica_sv_gl">
<span<?php echo $interh_evaluacionclinica_list->sv_gl->viewAttributes() ?>><?php echo $interh_evaluacionclinica_list->sv_gl->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$interh_evaluacionclinica_list->ListOptions->render("body", "right", $interh_evaluacionclinica_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$interh_evaluacionclinica_list->isGridAdd())
		$interh_evaluacionclinica_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$interh_evaluacionclinica->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($interh_evaluacionclinica_list->Recordset)
	$interh_evaluacionclinica_list->Recordset->Close();
?>
<?php if (!$interh_evaluacionclinica_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$interh_evaluacionclinica_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_evaluacionclinica_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $interh_evaluacionclinica_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($interh_evaluacionclinica_list->TotalRecords == 0 && !$interh_evaluacionclinica->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $interh_evaluacionclinica_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$interh_evaluacionclinica_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_evaluacionclinica_list->isExport()) { ?>
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
$interh_evaluacionclinica_list->terminate();
?>