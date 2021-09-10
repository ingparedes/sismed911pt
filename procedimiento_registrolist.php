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
$procedimiento_registro_list = new procedimiento_registro_list();

// Run the page
$procedimiento_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$procedimiento_registro_list->isExport()) { ?>
<script>
var fprocedimiento_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fprocedimiento_registrolist = currentForm = new ew.Form("fprocedimiento_registrolist", "list");
	fprocedimiento_registrolist.formKeyCountName = '<?php echo $procedimiento_registro_list->FormKeyCountName ?>';
	loadjs.done("fprocedimiento_registrolist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$procedimiento_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($procedimiento_registro_list->TotalRecords > 0 && $procedimiento_registro_list->ExportOptions->visible()) { ?>
<?php $procedimiento_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($procedimiento_registro_list->ImportOptions->visible()) { ?>
<?php $procedimiento_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$procedimiento_registro_list->renderOtherOptions();
?>
<?php $procedimiento_registro_list->showPageHeader(); ?>
<?php
$procedimiento_registro_list->showMessage();
?>
<?php if ($procedimiento_registro_list->TotalRecords > 0 || $procedimiento_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($procedimiento_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> procedimiento_registro">
<?php if (!$procedimiento_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$procedimiento_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $procedimiento_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $procedimiento_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fprocedimiento_registrolist" id="fprocedimiento_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_registro">
<div id="gmp_procedimiento_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($procedimiento_registro_list->TotalRecords > 0 || $procedimiento_registro_list->isGridEdit()) { ?>
<table id="tbl_procedimiento_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$procedimiento_registro->RowType = ROWTYPE_HEADER;

// Render list options
$procedimiento_registro_list->renderListOptions();

// Render list options (header, left)
$procedimiento_registro_list->ListOptions->render("header", "left");
?>
<?php if ($procedimiento_registro_list->id->Visible) { // id ?>
	<?php if ($procedimiento_registro_list->SortUrl($procedimiento_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $procedimiento_registro_list->id->headerCellClass() ?>"><div id="elh_procedimiento_registro_id" class="procedimiento_registro_id"><div class="ew-table-header-caption"><?php echo $procedimiento_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $procedimiento_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $procedimiento_registro_list->SortUrl($procedimiento_registro_list->id) ?>', 1);"><div id="elh_procedimiento_registro_id" class="procedimiento_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $procedimiento_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($procedimiento_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($procedimiento_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($procedimiento_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($procedimiento_registro_list->SortUrl($procedimiento_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $procedimiento_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_procedimiento_registro_cod_casopreh" class="procedimiento_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $procedimiento_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $procedimiento_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $procedimiento_registro_list->SortUrl($procedimiento_registro_list->cod_casopreh) ?>', 1);"><div id="elh_procedimiento_registro_cod_casopreh" class="procedimiento_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $procedimiento_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($procedimiento_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($procedimiento_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($procedimiento_registro_list->procedimiento_tipo_id->Visible) { // procedimiento_tipo_id ?>
	<?php if ($procedimiento_registro_list->SortUrl($procedimiento_registro_list->procedimiento_tipo_id) == "") { ?>
		<th data-name="procedimiento_tipo_id" class="<?php echo $procedimiento_registro_list->procedimiento_tipo_id->headerCellClass() ?>"><div id="elh_procedimiento_registro_procedimiento_tipo_id" class="procedimiento_registro_procedimiento_tipo_id"><div class="ew-table-header-caption"><?php echo $procedimiento_registro_list->procedimiento_tipo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procedimiento_tipo_id" class="<?php echo $procedimiento_registro_list->procedimiento_tipo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $procedimiento_registro_list->SortUrl($procedimiento_registro_list->procedimiento_tipo_id) ?>', 1);"><div id="elh_procedimiento_registro_procedimiento_tipo_id" class="procedimiento_registro_procedimiento_tipo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $procedimiento_registro_list->procedimiento_tipo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($procedimiento_registro_list->procedimiento_tipo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($procedimiento_registro_list->procedimiento_tipo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$procedimiento_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($procedimiento_registro_list->ExportAll && $procedimiento_registro_list->isExport()) {
	$procedimiento_registro_list->StopRecord = $procedimiento_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($procedimiento_registro_list->TotalRecords > $procedimiento_registro_list->StartRecord + $procedimiento_registro_list->DisplayRecords - 1)
		$procedimiento_registro_list->StopRecord = $procedimiento_registro_list->StartRecord + $procedimiento_registro_list->DisplayRecords - 1;
	else
		$procedimiento_registro_list->StopRecord = $procedimiento_registro_list->TotalRecords;
}
$procedimiento_registro_list->RecordCount = $procedimiento_registro_list->StartRecord - 1;
if ($procedimiento_registro_list->Recordset && !$procedimiento_registro_list->Recordset->EOF) {
	$procedimiento_registro_list->Recordset->moveFirst();
	$selectLimit = $procedimiento_registro_list->UseSelectLimit;
	if (!$selectLimit && $procedimiento_registro_list->StartRecord > 1)
		$procedimiento_registro_list->Recordset->move($procedimiento_registro_list->StartRecord - 1);
} elseif (!$procedimiento_registro->AllowAddDeleteRow && $procedimiento_registro_list->StopRecord == 0) {
	$procedimiento_registro_list->StopRecord = $procedimiento_registro->GridAddRowCount;
}

// Initialize aggregate
$procedimiento_registro->RowType = ROWTYPE_AGGREGATEINIT;
$procedimiento_registro->resetAttributes();
$procedimiento_registro_list->renderRow();
while ($procedimiento_registro_list->RecordCount < $procedimiento_registro_list->StopRecord) {
	$procedimiento_registro_list->RecordCount++;
	if ($procedimiento_registro_list->RecordCount >= $procedimiento_registro_list->StartRecord) {
		$procedimiento_registro_list->RowCount++;

		// Set up key count
		$procedimiento_registro_list->KeyCount = $procedimiento_registro_list->RowIndex;

		// Init row class and style
		$procedimiento_registro->resetAttributes();
		$procedimiento_registro->CssClass = "";
		if ($procedimiento_registro_list->isGridAdd()) {
		} else {
			$procedimiento_registro_list->loadRowValues($procedimiento_registro_list->Recordset); // Load row values
		}
		$procedimiento_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$procedimiento_registro->RowAttrs->merge(["data-rowindex" => $procedimiento_registro_list->RowCount, "id" => "r" . $procedimiento_registro_list->RowCount . "_procedimiento_registro", "data-rowtype" => $procedimiento_registro->RowType]);

		// Render row
		$procedimiento_registro_list->renderRow();

		// Render list options
		$procedimiento_registro_list->renderListOptions();
?>
	<tr <?php echo $procedimiento_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$procedimiento_registro_list->ListOptions->render("body", "left", $procedimiento_registro_list->RowCount);
?>
	<?php if ($procedimiento_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $procedimiento_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_registro_list->RowCount ?>_procedimiento_registro_id">
<span<?php echo $procedimiento_registro_list->id->viewAttributes() ?>><?php echo $procedimiento_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($procedimiento_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $procedimiento_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_registro_list->RowCount ?>_procedimiento_registro_cod_casopreh">
<span<?php echo $procedimiento_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $procedimiento_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($procedimiento_registro_list->procedimiento_tipo_id->Visible) { // procedimiento_tipo_id ?>
		<td data-name="procedimiento_tipo_id" <?php echo $procedimiento_registro_list->procedimiento_tipo_id->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_registro_list->RowCount ?>_procedimiento_registro_procedimiento_tipo_id">
<span<?php echo $procedimiento_registro_list->procedimiento_tipo_id->viewAttributes() ?>><?php echo $procedimiento_registro_list->procedimiento_tipo_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$procedimiento_registro_list->ListOptions->render("body", "right", $procedimiento_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$procedimiento_registro_list->isGridAdd())
		$procedimiento_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$procedimiento_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($procedimiento_registro_list->Recordset)
	$procedimiento_registro_list->Recordset->Close();
?>
<?php if (!$procedimiento_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$procedimiento_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $procedimiento_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $procedimiento_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($procedimiento_registro_list->TotalRecords == 0 && !$procedimiento_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $procedimiento_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$procedimiento_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$procedimiento_registro_list->isExport()) { ?>
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
$procedimiento_registro_list->terminate();
?>