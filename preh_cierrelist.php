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
$preh_cierre_list = new preh_cierre_list();

// Run the page
$preh_cierre_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_cierre_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_cierre_list->isExport()) { ?>
<script>
var fpreh_cierrelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_cierrelist = currentForm = new ew.Form("fpreh_cierrelist", "list");
	fpreh_cierrelist.formKeyCountName = '<?php echo $preh_cierre_list->FormKeyCountName ?>';
	loadjs.done("fpreh_cierrelist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_cierre_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_cierre_list->TotalRecords > 0 && $preh_cierre_list->ExportOptions->visible()) { ?>
<?php $preh_cierre_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_cierre_list->ImportOptions->visible()) { ?>
<?php $preh_cierre_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_cierre_list->renderOtherOptions();
?>
<?php $preh_cierre_list->showPageHeader(); ?>
<?php
$preh_cierre_list->showMessage();
?>
<?php if ($preh_cierre_list->TotalRecords > 0 || $preh_cierre->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_cierre_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_cierre">
<?php if (!$preh_cierre_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_cierre_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_cierre_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_cierre_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_cierrelist" id="fpreh_cierrelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_cierre">
<div id="gmp_preh_cierre" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_cierre_list->TotalRecords > 0 || $preh_cierre_list->isGridEdit()) { ?>
<table id="tbl_preh_cierrelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_cierre->RowType = ROWTYPE_HEADER;

// Render list options
$preh_cierre_list->renderListOptions();

// Render list options (header, left)
$preh_cierre_list->ListOptions->render("header", "left");
?>
<?php if ($preh_cierre_list->id_cierre->Visible) { // id_cierre ?>
	<?php if ($preh_cierre_list->SortUrl($preh_cierre_list->id_cierre) == "") { ?>
		<th data-name="id_cierre" class="<?php echo $preh_cierre_list->id_cierre->headerCellClass() ?>"><div id="elh_preh_cierre_id_cierre" class="preh_cierre_id_cierre"><div class="ew-table-header-caption"><?php echo $preh_cierre_list->id_cierre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_cierre" class="<?php echo $preh_cierre_list->id_cierre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_cierre_list->SortUrl($preh_cierre_list->id_cierre) ?>', 1);"><div id="elh_preh_cierre_id_cierre" class="preh_cierre_id_cierre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_cierre_list->id_cierre->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_cierre_list->id_cierre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_cierre_list->id_cierre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_cierre_list->nombrecierre->Visible) { // nombrecierre ?>
	<?php if ($preh_cierre_list->SortUrl($preh_cierre_list->nombrecierre) == "") { ?>
		<th data-name="nombrecierre" class="<?php echo $preh_cierre_list->nombrecierre->headerCellClass() ?>"><div id="elh_preh_cierre_nombrecierre" class="preh_cierre_nombrecierre"><div class="ew-table-header-caption"><?php echo $preh_cierre_list->nombrecierre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombrecierre" class="<?php echo $preh_cierre_list->nombrecierre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_cierre_list->SortUrl($preh_cierre_list->nombrecierre) ?>', 1);"><div id="elh_preh_cierre_nombrecierre" class="preh_cierre_nombrecierre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_cierre_list->nombrecierre->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_cierre_list->nombrecierre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_cierre_list->nombrecierre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_cierre_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_cierre_list->SortUrl($preh_cierre_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_cierre_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_cierre_cod_casopreh" class="preh_cierre_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_cierre_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_cierre_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_cierre_list->SortUrl($preh_cierre_list->cod_casopreh) ?>', 1);"><div id="elh_preh_cierre_cod_casopreh" class="preh_cierre_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_cierre_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_cierre_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_cierre_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_cierre_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_cierre_list->ExportAll && $preh_cierre_list->isExport()) {
	$preh_cierre_list->StopRecord = $preh_cierre_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_cierre_list->TotalRecords > $preh_cierre_list->StartRecord + $preh_cierre_list->DisplayRecords - 1)
		$preh_cierre_list->StopRecord = $preh_cierre_list->StartRecord + $preh_cierre_list->DisplayRecords - 1;
	else
		$preh_cierre_list->StopRecord = $preh_cierre_list->TotalRecords;
}
$preh_cierre_list->RecordCount = $preh_cierre_list->StartRecord - 1;
if ($preh_cierre_list->Recordset && !$preh_cierre_list->Recordset->EOF) {
	$preh_cierre_list->Recordset->moveFirst();
	$selectLimit = $preh_cierre_list->UseSelectLimit;
	if (!$selectLimit && $preh_cierre_list->StartRecord > 1)
		$preh_cierre_list->Recordset->move($preh_cierre_list->StartRecord - 1);
} elseif (!$preh_cierre->AllowAddDeleteRow && $preh_cierre_list->StopRecord == 0) {
	$preh_cierre_list->StopRecord = $preh_cierre->GridAddRowCount;
}

// Initialize aggregate
$preh_cierre->RowType = ROWTYPE_AGGREGATEINIT;
$preh_cierre->resetAttributes();
$preh_cierre_list->renderRow();
while ($preh_cierre_list->RecordCount < $preh_cierre_list->StopRecord) {
	$preh_cierre_list->RecordCount++;
	if ($preh_cierre_list->RecordCount >= $preh_cierre_list->StartRecord) {
		$preh_cierre_list->RowCount++;

		// Set up key count
		$preh_cierre_list->KeyCount = $preh_cierre_list->RowIndex;

		// Init row class and style
		$preh_cierre->resetAttributes();
		$preh_cierre->CssClass = "";
		if ($preh_cierre_list->isGridAdd()) {
		} else {
			$preh_cierre_list->loadRowValues($preh_cierre_list->Recordset); // Load row values
		}
		$preh_cierre->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_cierre->RowAttrs->merge(["data-rowindex" => $preh_cierre_list->RowCount, "id" => "r" . $preh_cierre_list->RowCount . "_preh_cierre", "data-rowtype" => $preh_cierre->RowType]);

		// Render row
		$preh_cierre_list->renderRow();

		// Render list options
		$preh_cierre_list->renderListOptions();
?>
	<tr <?php echo $preh_cierre->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_cierre_list->ListOptions->render("body", "left", $preh_cierre_list->RowCount);
?>
	<?php if ($preh_cierre_list->id_cierre->Visible) { // id_cierre ?>
		<td data-name="id_cierre" <?php echo $preh_cierre_list->id_cierre->cellAttributes() ?>>
<span id="el<?php echo $preh_cierre_list->RowCount ?>_preh_cierre_id_cierre">
<span<?php echo $preh_cierre_list->id_cierre->viewAttributes() ?>><?php echo $preh_cierre_list->id_cierre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_cierre_list->nombrecierre->Visible) { // nombrecierre ?>
		<td data-name="nombrecierre" <?php echo $preh_cierre_list->nombrecierre->cellAttributes() ?>>
<span id="el<?php echo $preh_cierre_list->RowCount ?>_preh_cierre_nombrecierre">
<span<?php echo $preh_cierre_list->nombrecierre->viewAttributes() ?>><?php echo $preh_cierre_list->nombrecierre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_cierre_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_cierre_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_cierre_list->RowCount ?>_preh_cierre_cod_casopreh">
<span<?php echo $preh_cierre_list->cod_casopreh->viewAttributes() ?>><?php echo $preh_cierre_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_cierre_list->ListOptions->render("body", "right", $preh_cierre_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_cierre_list->isGridAdd())
		$preh_cierre_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_cierre->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_cierre_list->Recordset)
	$preh_cierre_list->Recordset->Close();
?>
<?php if (!$preh_cierre_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_cierre_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_cierre_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_cierre_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_cierre_list->TotalRecords == 0 && !$preh_cierre->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_cierre_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_cierre_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_cierre_list->isExport()) { ?>
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
$preh_cierre_list->terminate();
?>