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
$trauma_registro_list = new trauma_registro_list();

// Run the page
$trauma_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$trauma_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$trauma_registro_list->isExport()) { ?>
<script>
var ftrauma_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftrauma_registrolist = currentForm = new ew.Form("ftrauma_registrolist", "list");
	ftrauma_registrolist.formKeyCountName = '<?php echo $trauma_registro_list->FormKeyCountName ?>';
	loadjs.done("ftrauma_registrolist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$trauma_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($trauma_registro_list->TotalRecords > 0 && $trauma_registro_list->ExportOptions->visible()) { ?>
<?php $trauma_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($trauma_registro_list->ImportOptions->visible()) { ?>
<?php $trauma_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$trauma_registro_list->renderOtherOptions();
?>
<?php $trauma_registro_list->showPageHeader(); ?>
<?php
$trauma_registro_list->showMessage();
?>
<?php if ($trauma_registro_list->TotalRecords > 0 || $trauma_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($trauma_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> trauma_registro">
<?php if (!$trauma_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$trauma_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $trauma_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $trauma_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftrauma_registrolist" id="ftrauma_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="trauma_registro">
<div id="gmp_trauma_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($trauma_registro_list->TotalRecords > 0 || $trauma_registro_list->isGridEdit()) { ?>
<table id="tbl_trauma_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$trauma_registro->RowType = ROWTYPE_HEADER;

// Render list options
$trauma_registro_list->renderListOptions();

// Render list options (header, left)
$trauma_registro_list->ListOptions->render("header", "left");
?>
<?php if ($trauma_registro_list->id->Visible) { // id ?>
	<?php if ($trauma_registro_list->SortUrl($trauma_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $trauma_registro_list->id->headerCellClass() ?>"><div id="elh_trauma_registro_id" class="trauma_registro_id"><div class="ew-table-header-caption"><?php echo $trauma_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $trauma_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $trauma_registro_list->SortUrl($trauma_registro_list->id) ?>', 1);"><div id="elh_trauma_registro_id" class="trauma_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $trauma_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($trauma_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($trauma_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($trauma_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($trauma_registro_list->SortUrl($trauma_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $trauma_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_trauma_registro_cod_casopreh" class="trauma_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $trauma_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $trauma_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $trauma_registro_list->SortUrl($trauma_registro_list->cod_casopreh) ?>', 1);"><div id="elh_trauma_registro_cod_casopreh" class="trauma_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $trauma_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($trauma_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($trauma_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($trauma_registro_list->causa_trauma_registro->Visible) { // causa_trauma_registro ?>
	<?php if ($trauma_registro_list->SortUrl($trauma_registro_list->causa_trauma_registro) == "") { ?>
		<th data-name="causa_trauma_registro" class="<?php echo $trauma_registro_list->causa_trauma_registro->headerCellClass() ?>"><div id="elh_trauma_registro_causa_trauma_registro" class="trauma_registro_causa_trauma_registro"><div class="ew-table-header-caption"><?php echo $trauma_registro_list->causa_trauma_registro->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="causa_trauma_registro" class="<?php echo $trauma_registro_list->causa_trauma_registro->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $trauma_registro_list->SortUrl($trauma_registro_list->causa_trauma_registro) ?>', 1);"><div id="elh_trauma_registro_causa_trauma_registro" class="trauma_registro_causa_trauma_registro">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $trauma_registro_list->causa_trauma_registro->caption() ?></span><span class="ew-table-header-sort"><?php if ($trauma_registro_list->causa_trauma_registro->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($trauma_registro_list->causa_trauma_registro->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$trauma_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($trauma_registro_list->ExportAll && $trauma_registro_list->isExport()) {
	$trauma_registro_list->StopRecord = $trauma_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($trauma_registro_list->TotalRecords > $trauma_registro_list->StartRecord + $trauma_registro_list->DisplayRecords - 1)
		$trauma_registro_list->StopRecord = $trauma_registro_list->StartRecord + $trauma_registro_list->DisplayRecords - 1;
	else
		$trauma_registro_list->StopRecord = $trauma_registro_list->TotalRecords;
}
$trauma_registro_list->RecordCount = $trauma_registro_list->StartRecord - 1;
if ($trauma_registro_list->Recordset && !$trauma_registro_list->Recordset->EOF) {
	$trauma_registro_list->Recordset->moveFirst();
	$selectLimit = $trauma_registro_list->UseSelectLimit;
	if (!$selectLimit && $trauma_registro_list->StartRecord > 1)
		$trauma_registro_list->Recordset->move($trauma_registro_list->StartRecord - 1);
} elseif (!$trauma_registro->AllowAddDeleteRow && $trauma_registro_list->StopRecord == 0) {
	$trauma_registro_list->StopRecord = $trauma_registro->GridAddRowCount;
}

// Initialize aggregate
$trauma_registro->RowType = ROWTYPE_AGGREGATEINIT;
$trauma_registro->resetAttributes();
$trauma_registro_list->renderRow();
while ($trauma_registro_list->RecordCount < $trauma_registro_list->StopRecord) {
	$trauma_registro_list->RecordCount++;
	if ($trauma_registro_list->RecordCount >= $trauma_registro_list->StartRecord) {
		$trauma_registro_list->RowCount++;

		// Set up key count
		$trauma_registro_list->KeyCount = $trauma_registro_list->RowIndex;

		// Init row class and style
		$trauma_registro->resetAttributes();
		$trauma_registro->CssClass = "";
		if ($trauma_registro_list->isGridAdd()) {
		} else {
			$trauma_registro_list->loadRowValues($trauma_registro_list->Recordset); // Load row values
		}
		$trauma_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$trauma_registro->RowAttrs->merge(["data-rowindex" => $trauma_registro_list->RowCount, "id" => "r" . $trauma_registro_list->RowCount . "_trauma_registro", "data-rowtype" => $trauma_registro->RowType]);

		// Render row
		$trauma_registro_list->renderRow();

		// Render list options
		$trauma_registro_list->renderListOptions();
?>
	<tr <?php echo $trauma_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$trauma_registro_list->ListOptions->render("body", "left", $trauma_registro_list->RowCount);
?>
	<?php if ($trauma_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $trauma_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $trauma_registro_list->RowCount ?>_trauma_registro_id">
<span<?php echo $trauma_registro_list->id->viewAttributes() ?>><?php echo $trauma_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($trauma_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $trauma_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $trauma_registro_list->RowCount ?>_trauma_registro_cod_casopreh">
<span<?php echo $trauma_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $trauma_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($trauma_registro_list->causa_trauma_registro->Visible) { // causa_trauma_registro ?>
		<td data-name="causa_trauma_registro" <?php echo $trauma_registro_list->causa_trauma_registro->cellAttributes() ?>>
<span id="el<?php echo $trauma_registro_list->RowCount ?>_trauma_registro_causa_trauma_registro">
<span<?php echo $trauma_registro_list->causa_trauma_registro->viewAttributes() ?>><?php echo $trauma_registro_list->causa_trauma_registro->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$trauma_registro_list->ListOptions->render("body", "right", $trauma_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$trauma_registro_list->isGridAdd())
		$trauma_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$trauma_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($trauma_registro_list->Recordset)
	$trauma_registro_list->Recordset->Close();
?>
<?php if (!$trauma_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$trauma_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $trauma_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $trauma_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($trauma_registro_list->TotalRecords == 0 && !$trauma_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $trauma_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$trauma_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$trauma_registro_list->isExport()) { ?>
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
$trauma_registro_list->terminate();
?>