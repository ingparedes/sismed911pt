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
$terminos_list = new terminos_list();

// Run the page
$terminos_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$terminos_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$terminos_list->isExport()) { ?>
<script>
var fterminoslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fterminoslist = currentForm = new ew.Form("fterminoslist", "list");
	fterminoslist.formKeyCountName = '<?php echo $terminos_list->FormKeyCountName ?>';
	loadjs.done("fterminoslist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$terminos_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($terminos_list->TotalRecords > 0 && $terminos_list->ExportOptions->visible()) { ?>
<?php $terminos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($terminos_list->ImportOptions->visible()) { ?>
<?php $terminos_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$terminos_list->renderOtherOptions();
?>
<?php $terminos_list->showPageHeader(); ?>
<?php
$terminos_list->showMessage();
?>
<?php if ($terminos_list->TotalRecords > 0 || $terminos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($terminos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> terminos">
<?php if (!$terminos_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$terminos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $terminos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $terminos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fterminoslist" id="fterminoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="terminos">
<div id="gmp_terminos" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($terminos_list->TotalRecords > 0 || $terminos_list->isGridEdit()) { ?>
<table id="tbl_terminoslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$terminos->RowType = ROWTYPE_HEADER;

// Render list options
$terminos_list->renderListOptions();

// Render list options (header, left)
$terminos_list->ListOptions->render("header", "left");
?>
<?php if ($terminos_list->id_terminos->Visible) { // id_terminos ?>
	<?php if ($terminos_list->SortUrl($terminos_list->id_terminos) == "") { ?>
		<th data-name="id_terminos" class="<?php echo $terminos_list->id_terminos->headerCellClass() ?>"><div id="elh_terminos_id_terminos" class="terminos_id_terminos"><div class="ew-table-header-caption"><?php echo $terminos_list->id_terminos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_terminos" class="<?php echo $terminos_list->id_terminos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $terminos_list->SortUrl($terminos_list->id_terminos) ?>', 1);"><div id="elh_terminos_id_terminos" class="terminos_id_terminos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $terminos_list->id_terminos->caption() ?></span><span class="ew-table-header-sort"><?php if ($terminos_list->id_terminos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($terminos_list->id_terminos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$terminos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($terminos_list->ExportAll && $terminos_list->isExport()) {
	$terminos_list->StopRecord = $terminos_list->TotalRecords;
} else {

	// Set the last record to display
	if ($terminos_list->TotalRecords > $terminos_list->StartRecord + $terminos_list->DisplayRecords - 1)
		$terminos_list->StopRecord = $terminos_list->StartRecord + $terminos_list->DisplayRecords - 1;
	else
		$terminos_list->StopRecord = $terminos_list->TotalRecords;
}
$terminos_list->RecordCount = $terminos_list->StartRecord - 1;
if ($terminos_list->Recordset && !$terminos_list->Recordset->EOF) {
	$terminos_list->Recordset->moveFirst();
	$selectLimit = $terminos_list->UseSelectLimit;
	if (!$selectLimit && $terminos_list->StartRecord > 1)
		$terminos_list->Recordset->move($terminos_list->StartRecord - 1);
} elseif (!$terminos->AllowAddDeleteRow && $terminos_list->StopRecord == 0) {
	$terminos_list->StopRecord = $terminos->GridAddRowCount;
}

// Initialize aggregate
$terminos->RowType = ROWTYPE_AGGREGATEINIT;
$terminos->resetAttributes();
$terminos_list->renderRow();
while ($terminos_list->RecordCount < $terminos_list->StopRecord) {
	$terminos_list->RecordCount++;
	if ($terminos_list->RecordCount >= $terminos_list->StartRecord) {
		$terminos_list->RowCount++;

		// Set up key count
		$terminos_list->KeyCount = $terminos_list->RowIndex;

		// Init row class and style
		$terminos->resetAttributes();
		$terminos->CssClass = "";
		if ($terminos_list->isGridAdd()) {
		} else {
			$terminos_list->loadRowValues($terminos_list->Recordset); // Load row values
		}
		$terminos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$terminos->RowAttrs->merge(["data-rowindex" => $terminos_list->RowCount, "id" => "r" . $terminos_list->RowCount . "_terminos", "data-rowtype" => $terminos->RowType]);

		// Render row
		$terminos_list->renderRow();

		// Render list options
		$terminos_list->renderListOptions();
?>
	<tr <?php echo $terminos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$terminos_list->ListOptions->render("body", "left", $terminos_list->RowCount);
?>
	<?php if ($terminos_list->id_terminos->Visible) { // id_terminos ?>
		<td data-name="id_terminos" <?php echo $terminos_list->id_terminos->cellAttributes() ?>>
<span id="el<?php echo $terminos_list->RowCount ?>_terminos_id_terminos">
<span<?php echo $terminos_list->id_terminos->viewAttributes() ?>><?php echo $terminos_list->id_terminos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$terminos_list->ListOptions->render("body", "right", $terminos_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$terminos_list->isGridAdd())
		$terminos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$terminos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($terminos_list->Recordset)
	$terminos_list->Recordset->Close();
?>
<?php if (!$terminos_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$terminos_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $terminos_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $terminos_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($terminos_list->TotalRecords == 0 && !$terminos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $terminos_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$terminos_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$terminos_list->isExport()) { ?>
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
$terminos_list->terminate();
?>