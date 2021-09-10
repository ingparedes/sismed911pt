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
$medicamentos_registros_list = new medicamentos_registros_list();

// Run the page
$medicamentos_registros_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_registros_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$medicamentos_registros_list->isExport()) { ?>
<script>
var fmedicamentos_registroslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmedicamentos_registroslist = currentForm = new ew.Form("fmedicamentos_registroslist", "list");
	fmedicamentos_registroslist.formKeyCountName = '<?php echo $medicamentos_registros_list->FormKeyCountName ?>';
	loadjs.done("fmedicamentos_registroslist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$medicamentos_registros_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($medicamentos_registros_list->TotalRecords > 0 && $medicamentos_registros_list->ExportOptions->visible()) { ?>
<?php $medicamentos_registros_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($medicamentos_registros_list->ImportOptions->visible()) { ?>
<?php $medicamentos_registros_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$medicamentos_registros_list->renderOtherOptions();
?>
<?php $medicamentos_registros_list->showPageHeader(); ?>
<?php
$medicamentos_registros_list->showMessage();
?>
<?php if ($medicamentos_registros_list->TotalRecords > 0 || $medicamentos_registros->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($medicamentos_registros_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> medicamentos_registros">
<?php if (!$medicamentos_registros_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$medicamentos_registros_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $medicamentos_registros_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $medicamentos_registros_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmedicamentos_registroslist" id="fmedicamentos_registroslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos_registros">
<div id="gmp_medicamentos_registros" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($medicamentos_registros_list->TotalRecords > 0 || $medicamentos_registros_list->isGridEdit()) { ?>
<table id="tbl_medicamentos_registroslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$medicamentos_registros->RowType = ROWTYPE_HEADER;

// Render list options
$medicamentos_registros_list->renderListOptions();

// Render list options (header, left)
$medicamentos_registros_list->ListOptions->render("header", "left");
?>
<?php if ($medicamentos_registros_list->id->Visible) { // id ?>
	<?php if ($medicamentos_registros_list->SortUrl($medicamentos_registros_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $medicamentos_registros_list->id->headerCellClass() ?>"><div id="elh_medicamentos_registros_id" class="medicamentos_registros_id"><div class="ew-table-header-caption"><?php echo $medicamentos_registros_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $medicamentos_registros_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_registros_list->SortUrl($medicamentos_registros_list->id) ?>', 1);"><div id="elh_medicamentos_registros_id" class="medicamentos_registros_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_registros_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_registros_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_registros_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($medicamentos_registros_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($medicamentos_registros_list->SortUrl($medicamentos_registros_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $medicamentos_registros_list->cod_casopreh->headerCellClass() ?>"><div id="elh_medicamentos_registros_cod_casopreh" class="medicamentos_registros_cod_casopreh"><div class="ew-table-header-caption"><?php echo $medicamentos_registros_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $medicamentos_registros_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_registros_list->SortUrl($medicamentos_registros_list->cod_casopreh) ?>', 1);"><div id="elh_medicamentos_registros_cod_casopreh" class="medicamentos_registros_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_registros_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_registros_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_registros_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($medicamentos_registros_list->medicamentos_id->Visible) { // medicamentos_id ?>
	<?php if ($medicamentos_registros_list->SortUrl($medicamentos_registros_list->medicamentos_id) == "") { ?>
		<th data-name="medicamentos_id" class="<?php echo $medicamentos_registros_list->medicamentos_id->headerCellClass() ?>"><div id="elh_medicamentos_registros_medicamentos_id" class="medicamentos_registros_medicamentos_id"><div class="ew-table-header-caption"><?php echo $medicamentos_registros_list->medicamentos_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="medicamentos_id" class="<?php echo $medicamentos_registros_list->medicamentos_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_registros_list->SortUrl($medicamentos_registros_list->medicamentos_id) ?>', 1);"><div id="elh_medicamentos_registros_medicamentos_id" class="medicamentos_registros_medicamentos_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_registros_list->medicamentos_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_registros_list->medicamentos_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_registros_list->medicamentos_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($medicamentos_registros_list->cantidad->Visible) { // cantidad ?>
	<?php if ($medicamentos_registros_list->SortUrl($medicamentos_registros_list->cantidad) == "") { ?>
		<th data-name="cantidad" class="<?php echo $medicamentos_registros_list->cantidad->headerCellClass() ?>"><div id="elh_medicamentos_registros_cantidad" class="medicamentos_registros_cantidad"><div class="ew-table-header-caption"><?php echo $medicamentos_registros_list->cantidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cantidad" class="<?php echo $medicamentos_registros_list->cantidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $medicamentos_registros_list->SortUrl($medicamentos_registros_list->cantidad) ?>', 1);"><div id="elh_medicamentos_registros_cantidad" class="medicamentos_registros_cantidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $medicamentos_registros_list->cantidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($medicamentos_registros_list->cantidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($medicamentos_registros_list->cantidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$medicamentos_registros_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($medicamentos_registros_list->ExportAll && $medicamentos_registros_list->isExport()) {
	$medicamentos_registros_list->StopRecord = $medicamentos_registros_list->TotalRecords;
} else {

	// Set the last record to display
	if ($medicamentos_registros_list->TotalRecords > $medicamentos_registros_list->StartRecord + $medicamentos_registros_list->DisplayRecords - 1)
		$medicamentos_registros_list->StopRecord = $medicamentos_registros_list->StartRecord + $medicamentos_registros_list->DisplayRecords - 1;
	else
		$medicamentos_registros_list->StopRecord = $medicamentos_registros_list->TotalRecords;
}
$medicamentos_registros_list->RecordCount = $medicamentos_registros_list->StartRecord - 1;
if ($medicamentos_registros_list->Recordset && !$medicamentos_registros_list->Recordset->EOF) {
	$medicamentos_registros_list->Recordset->moveFirst();
	$selectLimit = $medicamentos_registros_list->UseSelectLimit;
	if (!$selectLimit && $medicamentos_registros_list->StartRecord > 1)
		$medicamentos_registros_list->Recordset->move($medicamentos_registros_list->StartRecord - 1);
} elseif (!$medicamentos_registros->AllowAddDeleteRow && $medicamentos_registros_list->StopRecord == 0) {
	$medicamentos_registros_list->StopRecord = $medicamentos_registros->GridAddRowCount;
}

// Initialize aggregate
$medicamentos_registros->RowType = ROWTYPE_AGGREGATEINIT;
$medicamentos_registros->resetAttributes();
$medicamentos_registros_list->renderRow();
while ($medicamentos_registros_list->RecordCount < $medicamentos_registros_list->StopRecord) {
	$medicamentos_registros_list->RecordCount++;
	if ($medicamentos_registros_list->RecordCount >= $medicamentos_registros_list->StartRecord) {
		$medicamentos_registros_list->RowCount++;

		// Set up key count
		$medicamentos_registros_list->KeyCount = $medicamentos_registros_list->RowIndex;

		// Init row class and style
		$medicamentos_registros->resetAttributes();
		$medicamentos_registros->CssClass = "";
		if ($medicamentos_registros_list->isGridAdd()) {
		} else {
			$medicamentos_registros_list->loadRowValues($medicamentos_registros_list->Recordset); // Load row values
		}
		$medicamentos_registros->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$medicamentos_registros->RowAttrs->merge(["data-rowindex" => $medicamentos_registros_list->RowCount, "id" => "r" . $medicamentos_registros_list->RowCount . "_medicamentos_registros", "data-rowtype" => $medicamentos_registros->RowType]);

		// Render row
		$medicamentos_registros_list->renderRow();

		// Render list options
		$medicamentos_registros_list->renderListOptions();
?>
	<tr <?php echo $medicamentos_registros->rowAttributes() ?>>
<?php

// Render list options (body, left)
$medicamentos_registros_list->ListOptions->render("body", "left", $medicamentos_registros_list->RowCount);
?>
	<?php if ($medicamentos_registros_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $medicamentos_registros_list->id->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_list->RowCount ?>_medicamentos_registros_id">
<span<?php echo $medicamentos_registros_list->id->viewAttributes() ?>><?php echo $medicamentos_registros_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($medicamentos_registros_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $medicamentos_registros_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_list->RowCount ?>_medicamentos_registros_cod_casopreh">
<span<?php echo $medicamentos_registros_list->cod_casopreh->viewAttributes() ?>><?php echo $medicamentos_registros_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($medicamentos_registros_list->medicamentos_id->Visible) { // medicamentos_id ?>
		<td data-name="medicamentos_id" <?php echo $medicamentos_registros_list->medicamentos_id->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_list->RowCount ?>_medicamentos_registros_medicamentos_id">
<span<?php echo $medicamentos_registros_list->medicamentos_id->viewAttributes() ?>><?php echo $medicamentos_registros_list->medicamentos_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($medicamentos_registros_list->cantidad->Visible) { // cantidad ?>
		<td data-name="cantidad" <?php echo $medicamentos_registros_list->cantidad->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_list->RowCount ?>_medicamentos_registros_cantidad">
<span<?php echo $medicamentos_registros_list->cantidad->viewAttributes() ?>><?php echo $medicamentos_registros_list->cantidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$medicamentos_registros_list->ListOptions->render("body", "right", $medicamentos_registros_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$medicamentos_registros_list->isGridAdd())
		$medicamentos_registros_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$medicamentos_registros->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($medicamentos_registros_list->Recordset)
	$medicamentos_registros_list->Recordset->Close();
?>
<?php if (!$medicamentos_registros_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$medicamentos_registros_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $medicamentos_registros_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $medicamentos_registros_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($medicamentos_registros_list->TotalRecords == 0 && !$medicamentos_registros->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $medicamentos_registros_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$medicamentos_registros_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$medicamentos_registros_list->isExport()) { ?>
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
$medicamentos_registros_list->terminate();
?>