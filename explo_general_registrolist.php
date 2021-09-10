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
$explo_general_registro_list = new explo_general_registro_list();

// Run the page
$explo_general_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_general_registro_list->isExport()) { ?>
<script>
var fexplo_general_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fexplo_general_registrolist = currentForm = new ew.Form("fexplo_general_registrolist", "list");
	fexplo_general_registrolist.formKeyCountName = '<?php echo $explo_general_registro_list->FormKeyCountName ?>';
	loadjs.done("fexplo_general_registrolist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_general_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($explo_general_registro_list->TotalRecords > 0 && $explo_general_registro_list->ExportOptions->visible()) { ?>
<?php $explo_general_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($explo_general_registro_list->ImportOptions->visible()) { ?>
<?php $explo_general_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$explo_general_registro_list->renderOtherOptions();
?>
<?php $explo_general_registro_list->showPageHeader(); ?>
<?php
$explo_general_registro_list->showMessage();
?>
<?php if ($explo_general_registro_list->TotalRecords > 0 || $explo_general_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($explo_general_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> explo_general_registro">
<?php if (!$explo_general_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$explo_general_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_general_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_general_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fexplo_general_registrolist" id="fexplo_general_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_registro">
<div id="gmp_explo_general_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($explo_general_registro_list->TotalRecords > 0 || $explo_general_registro_list->isGridEdit()) { ?>
<table id="tbl_explo_general_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$explo_general_registro->RowType = ROWTYPE_HEADER;

// Render list options
$explo_general_registro_list->renderListOptions();

// Render list options (header, left)
$explo_general_registro_list->ListOptions->render("header", "left");
?>
<?php if ($explo_general_registro_list->id->Visible) { // id ?>
	<?php if ($explo_general_registro_list->SortUrl($explo_general_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $explo_general_registro_list->id->headerCellClass() ?>"><div id="elh_explo_general_registro_id" class="explo_general_registro_id"><div class="ew-table-header-caption"><?php echo $explo_general_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $explo_general_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_general_registro_list->SortUrl($explo_general_registro_list->id) ?>', 1);"><div id="elh_explo_general_registro_id" class="explo_general_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_general_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_general_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_general_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_general_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($explo_general_registro_list->SortUrl($explo_general_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $explo_general_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_explo_general_registro_cod_casopreh" class="explo_general_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $explo_general_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $explo_general_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_general_registro_list->SortUrl($explo_general_registro_list->cod_casopreh) ?>', 1);"><div id="elh_explo_general_registro_cod_casopreh" class="explo_general_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_general_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_general_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_general_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($explo_general_registro_list->explo_general_afeccion->Visible) { // explo_general_afeccion ?>
	<?php if ($explo_general_registro_list->SortUrl($explo_general_registro_list->explo_general_afeccion) == "") { ?>
		<th data-name="explo_general_afeccion" class="<?php echo $explo_general_registro_list->explo_general_afeccion->headerCellClass() ?>"><div id="elh_explo_general_registro_explo_general_afeccion" class="explo_general_registro_explo_general_afeccion"><div class="ew-table-header-caption"><?php echo $explo_general_registro_list->explo_general_afeccion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="explo_general_afeccion" class="<?php echo $explo_general_registro_list->explo_general_afeccion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $explo_general_registro_list->SortUrl($explo_general_registro_list->explo_general_afeccion) ?>', 1);"><div id="elh_explo_general_registro_explo_general_afeccion" class="explo_general_registro_explo_general_afeccion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $explo_general_registro_list->explo_general_afeccion->caption() ?></span><span class="ew-table-header-sort"><?php if ($explo_general_registro_list->explo_general_afeccion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($explo_general_registro_list->explo_general_afeccion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$explo_general_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($explo_general_registro_list->ExportAll && $explo_general_registro_list->isExport()) {
	$explo_general_registro_list->StopRecord = $explo_general_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($explo_general_registro_list->TotalRecords > $explo_general_registro_list->StartRecord + $explo_general_registro_list->DisplayRecords - 1)
		$explo_general_registro_list->StopRecord = $explo_general_registro_list->StartRecord + $explo_general_registro_list->DisplayRecords - 1;
	else
		$explo_general_registro_list->StopRecord = $explo_general_registro_list->TotalRecords;
}
$explo_general_registro_list->RecordCount = $explo_general_registro_list->StartRecord - 1;
if ($explo_general_registro_list->Recordset && !$explo_general_registro_list->Recordset->EOF) {
	$explo_general_registro_list->Recordset->moveFirst();
	$selectLimit = $explo_general_registro_list->UseSelectLimit;
	if (!$selectLimit && $explo_general_registro_list->StartRecord > 1)
		$explo_general_registro_list->Recordset->move($explo_general_registro_list->StartRecord - 1);
} elseif (!$explo_general_registro->AllowAddDeleteRow && $explo_general_registro_list->StopRecord == 0) {
	$explo_general_registro_list->StopRecord = $explo_general_registro->GridAddRowCount;
}

// Initialize aggregate
$explo_general_registro->RowType = ROWTYPE_AGGREGATEINIT;
$explo_general_registro->resetAttributes();
$explo_general_registro_list->renderRow();
while ($explo_general_registro_list->RecordCount < $explo_general_registro_list->StopRecord) {
	$explo_general_registro_list->RecordCount++;
	if ($explo_general_registro_list->RecordCount >= $explo_general_registro_list->StartRecord) {
		$explo_general_registro_list->RowCount++;

		// Set up key count
		$explo_general_registro_list->KeyCount = $explo_general_registro_list->RowIndex;

		// Init row class and style
		$explo_general_registro->resetAttributes();
		$explo_general_registro->CssClass = "";
		if ($explo_general_registro_list->isGridAdd()) {
		} else {
			$explo_general_registro_list->loadRowValues($explo_general_registro_list->Recordset); // Load row values
		}
		$explo_general_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$explo_general_registro->RowAttrs->merge(["data-rowindex" => $explo_general_registro_list->RowCount, "id" => "r" . $explo_general_registro_list->RowCount . "_explo_general_registro", "data-rowtype" => $explo_general_registro->RowType]);

		// Render row
		$explo_general_registro_list->renderRow();

		// Render list options
		$explo_general_registro_list->renderListOptions();
?>
	<tr <?php echo $explo_general_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$explo_general_registro_list->ListOptions->render("body", "left", $explo_general_registro_list->RowCount);
?>
	<?php if ($explo_general_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $explo_general_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $explo_general_registro_list->RowCount ?>_explo_general_registro_id">
<span<?php echo $explo_general_registro_list->id->viewAttributes() ?>><?php echo $explo_general_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_general_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $explo_general_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $explo_general_registro_list->RowCount ?>_explo_general_registro_cod_casopreh">
<span<?php echo $explo_general_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $explo_general_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($explo_general_registro_list->explo_general_afeccion->Visible) { // explo_general_afeccion ?>
		<td data-name="explo_general_afeccion" <?php echo $explo_general_registro_list->explo_general_afeccion->cellAttributes() ?>>
<span id="el<?php echo $explo_general_registro_list->RowCount ?>_explo_general_registro_explo_general_afeccion">
<span<?php echo $explo_general_registro_list->explo_general_afeccion->viewAttributes() ?>><?php echo $explo_general_registro_list->explo_general_afeccion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$explo_general_registro_list->ListOptions->render("body", "right", $explo_general_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$explo_general_registro_list->isGridAdd())
		$explo_general_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$explo_general_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($explo_general_registro_list->Recordset)
	$explo_general_registro_list->Recordset->Close();
?>
<?php if (!$explo_general_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$explo_general_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $explo_general_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $explo_general_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($explo_general_registro_list->TotalRecords == 0 && !$explo_general_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $explo_general_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$explo_general_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_general_registro_list->isExport()) { ?>
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
$explo_general_registro_list->terminate();
?>