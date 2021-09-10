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
$firmas_registro_list = new firmas_registro_list();

// Run the page
$firmas_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$firmas_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$firmas_registro_list->isExport()) { ?>
<script>
var ffirmas_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ffirmas_registrolist = currentForm = new ew.Form("ffirmas_registrolist", "list");
	ffirmas_registrolist.formKeyCountName = '<?php echo $firmas_registro_list->FormKeyCountName ?>';
	loadjs.done("ffirmas_registrolist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$firmas_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($firmas_registro_list->TotalRecords > 0 && $firmas_registro_list->ExportOptions->visible()) { ?>
<?php $firmas_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($firmas_registro_list->ImportOptions->visible()) { ?>
<?php $firmas_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$firmas_registro_list->renderOtherOptions();
?>
<?php $firmas_registro_list->showPageHeader(); ?>
<?php
$firmas_registro_list->showMessage();
?>
<?php if ($firmas_registro_list->TotalRecords > 0 || $firmas_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($firmas_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> firmas_registro">
<?php if (!$firmas_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$firmas_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $firmas_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $firmas_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ffirmas_registrolist" id="ffirmas_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="firmas_registro">
<div id="gmp_firmas_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($firmas_registro_list->TotalRecords > 0 || $firmas_registro_list->isGridEdit()) { ?>
<table id="tbl_firmas_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$firmas_registro->RowType = ROWTYPE_HEADER;

// Render list options
$firmas_registro_list->renderListOptions();

// Render list options (header, left)
$firmas_registro_list->ListOptions->render("header", "left");
?>
<?php if ($firmas_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($firmas_registro_list->SortUrl($firmas_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $firmas_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_firmas_registro_cod_casopreh" class="firmas_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $firmas_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $firmas_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $firmas_registro_list->SortUrl($firmas_registro_list->cod_casopreh) ?>', 1);"><div id="elh_firmas_registro_cod_casopreh" class="firmas_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $firmas_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($firmas_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($firmas_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($firmas_registro_list->id->Visible) { // id ?>
	<?php if ($firmas_registro_list->SortUrl($firmas_registro_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $firmas_registro_list->id->headerCellClass() ?>"><div id="elh_firmas_registro_id" class="firmas_registro_id"><div class="ew-table-header-caption"><?php echo $firmas_registro_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $firmas_registro_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $firmas_registro_list->SortUrl($firmas_registro_list->id) ?>', 1);"><div id="elh_firmas_registro_id" class="firmas_registro_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $firmas_registro_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($firmas_registro_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($firmas_registro_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($firmas_registro_list->ancho->Visible) { // ancho ?>
	<?php if ($firmas_registro_list->SortUrl($firmas_registro_list->ancho) == "") { ?>
		<th data-name="ancho" class="<?php echo $firmas_registro_list->ancho->headerCellClass() ?>"><div id="elh_firmas_registro_ancho" class="firmas_registro_ancho"><div class="ew-table-header-caption"><?php echo $firmas_registro_list->ancho->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ancho" class="<?php echo $firmas_registro_list->ancho->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $firmas_registro_list->SortUrl($firmas_registro_list->ancho) ?>', 1);"><div id="elh_firmas_registro_ancho" class="firmas_registro_ancho">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $firmas_registro_list->ancho->caption() ?></span><span class="ew-table-header-sort"><?php if ($firmas_registro_list->ancho->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($firmas_registro_list->ancho->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$firmas_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($firmas_registro_list->ExportAll && $firmas_registro_list->isExport()) {
	$firmas_registro_list->StopRecord = $firmas_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($firmas_registro_list->TotalRecords > $firmas_registro_list->StartRecord + $firmas_registro_list->DisplayRecords - 1)
		$firmas_registro_list->StopRecord = $firmas_registro_list->StartRecord + $firmas_registro_list->DisplayRecords - 1;
	else
		$firmas_registro_list->StopRecord = $firmas_registro_list->TotalRecords;
}
$firmas_registro_list->RecordCount = $firmas_registro_list->StartRecord - 1;
if ($firmas_registro_list->Recordset && !$firmas_registro_list->Recordset->EOF) {
	$firmas_registro_list->Recordset->moveFirst();
	$selectLimit = $firmas_registro_list->UseSelectLimit;
	if (!$selectLimit && $firmas_registro_list->StartRecord > 1)
		$firmas_registro_list->Recordset->move($firmas_registro_list->StartRecord - 1);
} elseif (!$firmas_registro->AllowAddDeleteRow && $firmas_registro_list->StopRecord == 0) {
	$firmas_registro_list->StopRecord = $firmas_registro->GridAddRowCount;
}

// Initialize aggregate
$firmas_registro->RowType = ROWTYPE_AGGREGATEINIT;
$firmas_registro->resetAttributes();
$firmas_registro_list->renderRow();
while ($firmas_registro_list->RecordCount < $firmas_registro_list->StopRecord) {
	$firmas_registro_list->RecordCount++;
	if ($firmas_registro_list->RecordCount >= $firmas_registro_list->StartRecord) {
		$firmas_registro_list->RowCount++;

		// Set up key count
		$firmas_registro_list->KeyCount = $firmas_registro_list->RowIndex;

		// Init row class and style
		$firmas_registro->resetAttributes();
		$firmas_registro->CssClass = "";
		if ($firmas_registro_list->isGridAdd()) {
		} else {
			$firmas_registro_list->loadRowValues($firmas_registro_list->Recordset); // Load row values
		}
		$firmas_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$firmas_registro->RowAttrs->merge(["data-rowindex" => $firmas_registro_list->RowCount, "id" => "r" . $firmas_registro_list->RowCount . "_firmas_registro", "data-rowtype" => $firmas_registro->RowType]);

		// Render row
		$firmas_registro_list->renderRow();

		// Render list options
		$firmas_registro_list->renderListOptions();
?>
	<tr <?php echo $firmas_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$firmas_registro_list->ListOptions->render("body", "left", $firmas_registro_list->RowCount);
?>
	<?php if ($firmas_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $firmas_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $firmas_registro_list->RowCount ?>_firmas_registro_cod_casopreh">
<span<?php echo $firmas_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $firmas_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($firmas_registro_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $firmas_registro_list->id->cellAttributes() ?>>
<span id="el<?php echo $firmas_registro_list->RowCount ?>_firmas_registro_id">
<span<?php echo $firmas_registro_list->id->viewAttributes() ?>><?php echo $firmas_registro_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($firmas_registro_list->ancho->Visible) { // ancho ?>
		<td data-name="ancho" <?php echo $firmas_registro_list->ancho->cellAttributes() ?>>
<span id="el<?php echo $firmas_registro_list->RowCount ?>_firmas_registro_ancho">
<span<?php echo $firmas_registro_list->ancho->viewAttributes() ?>><?php echo $firmas_registro_list->ancho->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$firmas_registro_list->ListOptions->render("body", "right", $firmas_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$firmas_registro_list->isGridAdd())
		$firmas_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$firmas_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($firmas_registro_list->Recordset)
	$firmas_registro_list->Recordset->Close();
?>
<?php if (!$firmas_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$firmas_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $firmas_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $firmas_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($firmas_registro_list->TotalRecords == 0 && !$firmas_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $firmas_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$firmas_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$firmas_registro_list->isExport()) { ?>
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
$firmas_registro_list->terminate();
?>