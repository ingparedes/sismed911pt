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
$acercade_list = new acercade_list();

// Run the page
$acercade_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$acercade_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$acercade_list->isExport()) { ?>
<script>
var facercadelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	facercadelist = currentForm = new ew.Form("facercadelist", "list");
	facercadelist.formKeyCountName = '<?php echo $acercade_list->FormKeyCountName ?>';
	loadjs.done("facercadelist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$acercade_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($acercade_list->TotalRecords > 0 && $acercade_list->ExportOptions->visible()) { ?>
<?php $acercade_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($acercade_list->ImportOptions->visible()) { ?>
<?php $acercade_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$acercade_list->renderOtherOptions();
?>
<?php $acercade_list->showPageHeader(); ?>
<?php
$acercade_list->showMessage();
?>
<?php if ($acercade_list->TotalRecords > 0 || $acercade->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($acercade_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> acercade">
<?php if (!$acercade_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$acercade_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $acercade_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $acercade_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="facercadelist" id="facercadelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="acercade">
<div id="gmp_acercade" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($acercade_list->TotalRecords > 0 || $acercade_list->isGridEdit()) { ?>
<table id="tbl_acercadelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$acercade->RowType = ROWTYPE_HEADER;

// Render list options
$acercade_list->renderListOptions();

// Render list options (header, left)
$acercade_list->ListOptions->render("header", "left");
?>
<?php if ($acercade_list->id_acerca->Visible) { // id_acerca ?>
	<?php if ($acercade_list->SortUrl($acercade_list->id_acerca) == "") { ?>
		<th data-name="id_acerca" class="<?php echo $acercade_list->id_acerca->headerCellClass() ?>"><div id="elh_acercade_id_acerca" class="acercade_id_acerca"><div class="ew-table-header-caption"><?php echo $acercade_list->id_acerca->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_acerca" class="<?php echo $acercade_list->id_acerca->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $acercade_list->SortUrl($acercade_list->id_acerca) ?>', 1);"><div id="elh_acercade_id_acerca" class="acercade_id_acerca">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $acercade_list->id_acerca->caption() ?></span><span class="ew-table-header-sort"><?php if ($acercade_list->id_acerca->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($acercade_list->id_acerca->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$acercade_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($acercade_list->ExportAll && $acercade_list->isExport()) {
	$acercade_list->StopRecord = $acercade_list->TotalRecords;
} else {

	// Set the last record to display
	if ($acercade_list->TotalRecords > $acercade_list->StartRecord + $acercade_list->DisplayRecords - 1)
		$acercade_list->StopRecord = $acercade_list->StartRecord + $acercade_list->DisplayRecords - 1;
	else
		$acercade_list->StopRecord = $acercade_list->TotalRecords;
}
$acercade_list->RecordCount = $acercade_list->StartRecord - 1;
if ($acercade_list->Recordset && !$acercade_list->Recordset->EOF) {
	$acercade_list->Recordset->moveFirst();
	$selectLimit = $acercade_list->UseSelectLimit;
	if (!$selectLimit && $acercade_list->StartRecord > 1)
		$acercade_list->Recordset->move($acercade_list->StartRecord - 1);
} elseif (!$acercade->AllowAddDeleteRow && $acercade_list->StopRecord == 0) {
	$acercade_list->StopRecord = $acercade->GridAddRowCount;
}

// Initialize aggregate
$acercade->RowType = ROWTYPE_AGGREGATEINIT;
$acercade->resetAttributes();
$acercade_list->renderRow();
while ($acercade_list->RecordCount < $acercade_list->StopRecord) {
	$acercade_list->RecordCount++;
	if ($acercade_list->RecordCount >= $acercade_list->StartRecord) {
		$acercade_list->RowCount++;

		// Set up key count
		$acercade_list->KeyCount = $acercade_list->RowIndex;

		// Init row class and style
		$acercade->resetAttributes();
		$acercade->CssClass = "";
		if ($acercade_list->isGridAdd()) {
		} else {
			$acercade_list->loadRowValues($acercade_list->Recordset); // Load row values
		}
		$acercade->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$acercade->RowAttrs->merge(["data-rowindex" => $acercade_list->RowCount, "id" => "r" . $acercade_list->RowCount . "_acercade", "data-rowtype" => $acercade->RowType]);

		// Render row
		$acercade_list->renderRow();

		// Render list options
		$acercade_list->renderListOptions();
?>
	<tr <?php echo $acercade->rowAttributes() ?>>
<?php

// Render list options (body, left)
$acercade_list->ListOptions->render("body", "left", $acercade_list->RowCount);
?>
	<?php if ($acercade_list->id_acerca->Visible) { // id_acerca ?>
		<td data-name="id_acerca" <?php echo $acercade_list->id_acerca->cellAttributes() ?>>
<span id="el<?php echo $acercade_list->RowCount ?>_acercade_id_acerca">
<span<?php echo $acercade_list->id_acerca->viewAttributes() ?>><?php echo $acercade_list->id_acerca->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$acercade_list->ListOptions->render("body", "right", $acercade_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$acercade_list->isGridAdd())
		$acercade_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$acercade->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($acercade_list->Recordset)
	$acercade_list->Recordset->Close();
?>
<?php if (!$acercade_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$acercade_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $acercade_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $acercade_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($acercade_list->TotalRecords == 0 && !$acercade->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $acercade_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$acercade_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$acercade_list->isExport()) { ?>
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
$acercade_list->terminate();
?>