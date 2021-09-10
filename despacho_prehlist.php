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
$despacho_preh_list = new despacho_preh_list();

// Run the page
$despacho_preh_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$despacho_preh_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$despacho_preh_list->isExport()) { ?>
<script>
var fdespacho_prehlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdespacho_prehlist = currentForm = new ew.Form("fdespacho_prehlist", "list");
	fdespacho_prehlist.formKeyCountName = '<?php echo $despacho_preh_list->FormKeyCountName ?>';
	loadjs.done("fdespacho_prehlist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$despacho_preh_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($despacho_preh_list->TotalRecords > 0 && $despacho_preh_list->ExportOptions->visible()) { ?>
<?php $despacho_preh_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($despacho_preh_list->ImportOptions->visible()) { ?>
<?php $despacho_preh_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$despacho_preh_list->renderOtherOptions();
?>
<?php $despacho_preh_list->showPageHeader(); ?>
<?php
$despacho_preh_list->showMessage();
?>
<?php if ($despacho_preh_list->TotalRecords > 0 || $despacho_preh->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($despacho_preh_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> despacho_preh">
<?php if (!$despacho_preh_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$despacho_preh_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $despacho_preh_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $despacho_preh_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdespacho_prehlist" id="fdespacho_prehlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="despacho_preh">
<div id="gmp_despacho_preh" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($despacho_preh_list->TotalRecords > 0 || $despacho_preh_list->isGridEdit()) { ?>
<table id="tbl_despacho_prehlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$despacho_preh->RowType = ROWTYPE_HEADER;

// Render list options
$despacho_preh_list->renderListOptions();

// Render list options (header, left)
$despacho_preh_list->ListOptions->render("header", "left");
?>
<?php if ($despacho_preh_list->id_despacho->Visible) { // id_despacho ?>
	<?php if ($despacho_preh_list->SortUrl($despacho_preh_list->id_despacho) == "") { ?>
		<th data-name="id_despacho" class="<?php echo $despacho_preh_list->id_despacho->headerCellClass() ?>"><div id="elh_despacho_preh_id_despacho" class="despacho_preh_id_despacho"><div class="ew-table-header-caption"><?php echo $despacho_preh_list->id_despacho->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_despacho" class="<?php echo $despacho_preh_list->id_despacho->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $despacho_preh_list->SortUrl($despacho_preh_list->id_despacho) ?>', 1);"><div id="elh_despacho_preh_id_despacho" class="despacho_preh_id_despacho">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $despacho_preh_list->id_despacho->caption() ?></span><span class="ew-table-header-sort"><?php if ($despacho_preh_list->id_despacho->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($despacho_preh_list->id_despacho->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($despacho_preh_list->fechahoradespacho->Visible) { // fechahoradespacho ?>
	<?php if ($despacho_preh_list->SortUrl($despacho_preh_list->fechahoradespacho) == "") { ?>
		<th data-name="fechahoradespacho" class="<?php echo $despacho_preh_list->fechahoradespacho->headerCellClass() ?>"><div id="elh_despacho_preh_fechahoradespacho" class="despacho_preh_fechahoradespacho"><div class="ew-table-header-caption"><?php echo $despacho_preh_list->fechahoradespacho->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fechahoradespacho" class="<?php echo $despacho_preh_list->fechahoradespacho->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $despacho_preh_list->SortUrl($despacho_preh_list->fechahoradespacho) ?>', 1);"><div id="elh_despacho_preh_fechahoradespacho" class="despacho_preh_fechahoradespacho">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $despacho_preh_list->fechahoradespacho->caption() ?></span><span class="ew-table-header-sort"><?php if ($despacho_preh_list->fechahoradespacho->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($despacho_preh_list->fechahoradespacho->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($despacho_preh_list->cod_caso->Visible) { // cod_caso ?>
	<?php if ($despacho_preh_list->SortUrl($despacho_preh_list->cod_caso) == "") { ?>
		<th data-name="cod_caso" class="<?php echo $despacho_preh_list->cod_caso->headerCellClass() ?>"><div id="elh_despacho_preh_cod_caso" class="despacho_preh_cod_caso"><div class="ew-table-header-caption"><?php echo $despacho_preh_list->cod_caso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_caso" class="<?php echo $despacho_preh_list->cod_caso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $despacho_preh_list->SortUrl($despacho_preh_list->cod_caso) ?>', 1);"><div id="elh_despacho_preh_cod_caso" class="despacho_preh_cod_caso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $despacho_preh_list->cod_caso->caption() ?></span><span class="ew-table-header-sort"><?php if ($despacho_preh_list->cod_caso->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($despacho_preh_list->cod_caso->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($despacho_preh_list->sede->Visible) { // sede ?>
	<?php if ($despacho_preh_list->SortUrl($despacho_preh_list->sede) == "") { ?>
		<th data-name="sede" class="<?php echo $despacho_preh_list->sede->headerCellClass() ?>"><div id="elh_despacho_preh_sede" class="despacho_preh_sede"><div class="ew-table-header-caption"><?php echo $despacho_preh_list->sede->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sede" class="<?php echo $despacho_preh_list->sede->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $despacho_preh_list->SortUrl($despacho_preh_list->sede) ?>', 1);"><div id="elh_despacho_preh_sede" class="despacho_preh_sede">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $despacho_preh_list->sede->caption() ?></span><span class="ew-table-header-sort"><?php if ($despacho_preh_list->sede->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($despacho_preh_list->sede->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$despacho_preh_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($despacho_preh_list->ExportAll && $despacho_preh_list->isExport()) {
	$despacho_preh_list->StopRecord = $despacho_preh_list->TotalRecords;
} else {

	// Set the last record to display
	if ($despacho_preh_list->TotalRecords > $despacho_preh_list->StartRecord + $despacho_preh_list->DisplayRecords - 1)
		$despacho_preh_list->StopRecord = $despacho_preh_list->StartRecord + $despacho_preh_list->DisplayRecords - 1;
	else
		$despacho_preh_list->StopRecord = $despacho_preh_list->TotalRecords;
}
$despacho_preh_list->RecordCount = $despacho_preh_list->StartRecord - 1;
if ($despacho_preh_list->Recordset && !$despacho_preh_list->Recordset->EOF) {
	$despacho_preh_list->Recordset->moveFirst();
	$selectLimit = $despacho_preh_list->UseSelectLimit;
	if (!$selectLimit && $despacho_preh_list->StartRecord > 1)
		$despacho_preh_list->Recordset->move($despacho_preh_list->StartRecord - 1);
} elseif (!$despacho_preh->AllowAddDeleteRow && $despacho_preh_list->StopRecord == 0) {
	$despacho_preh_list->StopRecord = $despacho_preh->GridAddRowCount;
}

// Initialize aggregate
$despacho_preh->RowType = ROWTYPE_AGGREGATEINIT;
$despacho_preh->resetAttributes();
$despacho_preh_list->renderRow();
while ($despacho_preh_list->RecordCount < $despacho_preh_list->StopRecord) {
	$despacho_preh_list->RecordCount++;
	if ($despacho_preh_list->RecordCount >= $despacho_preh_list->StartRecord) {
		$despacho_preh_list->RowCount++;

		// Set up key count
		$despacho_preh_list->KeyCount = $despacho_preh_list->RowIndex;

		// Init row class and style
		$despacho_preh->resetAttributes();
		$despacho_preh->CssClass = "";
		if ($despacho_preh_list->isGridAdd()) {
		} else {
			$despacho_preh_list->loadRowValues($despacho_preh_list->Recordset); // Load row values
		}
		$despacho_preh->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$despacho_preh->RowAttrs->merge(["data-rowindex" => $despacho_preh_list->RowCount, "id" => "r" . $despacho_preh_list->RowCount . "_despacho_preh", "data-rowtype" => $despacho_preh->RowType]);

		// Render row
		$despacho_preh_list->renderRow();

		// Render list options
		$despacho_preh_list->renderListOptions();
?>
	<tr <?php echo $despacho_preh->rowAttributes() ?>>
<?php

// Render list options (body, left)
$despacho_preh_list->ListOptions->render("body", "left", $despacho_preh_list->RowCount);
?>
	<?php if ($despacho_preh_list->id_despacho->Visible) { // id_despacho ?>
		<td data-name="id_despacho" <?php echo $despacho_preh_list->id_despacho->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_list->RowCount ?>_despacho_preh_id_despacho">
<span<?php echo $despacho_preh_list->id_despacho->viewAttributes() ?>><?php echo $despacho_preh_list->id_despacho->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($despacho_preh_list->fechahoradespacho->Visible) { // fechahoradespacho ?>
		<td data-name="fechahoradespacho" <?php echo $despacho_preh_list->fechahoradespacho->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_list->RowCount ?>_despacho_preh_fechahoradespacho">
<span<?php echo $despacho_preh_list->fechahoradespacho->viewAttributes() ?>><?php echo $despacho_preh_list->fechahoradespacho->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($despacho_preh_list->cod_caso->Visible) { // cod_caso ?>
		<td data-name="cod_caso" <?php echo $despacho_preh_list->cod_caso->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_list->RowCount ?>_despacho_preh_cod_caso">
<span<?php echo $despacho_preh_list->cod_caso->viewAttributes() ?>><?php echo $despacho_preh_list->cod_caso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($despacho_preh_list->sede->Visible) { // sede ?>
		<td data-name="sede" <?php echo $despacho_preh_list->sede->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_list->RowCount ?>_despacho_preh_sede">
<span<?php echo $despacho_preh_list->sede->viewAttributes() ?>><?php echo $despacho_preh_list->sede->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$despacho_preh_list->ListOptions->render("body", "right", $despacho_preh_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$despacho_preh_list->isGridAdd())
		$despacho_preh_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$despacho_preh->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($despacho_preh_list->Recordset)
	$despacho_preh_list->Recordset->Close();
?>
<?php if (!$despacho_preh_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$despacho_preh_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $despacho_preh_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $despacho_preh_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($despacho_preh_list->TotalRecords == 0 && !$despacho_preh->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $despacho_preh_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$despacho_preh_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$despacho_preh_list->isExport()) { ?>
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
$despacho_preh_list->terminate();
?>