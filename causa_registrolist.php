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
$causa_registro_list = new causa_registro_list();

// Run the page
$causa_registro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_registro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$causa_registro_list->isExport()) { ?>
<script>
var fcausa_registrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcausa_registrolist = currentForm = new ew.Form("fcausa_registrolist", "list");
	fcausa_registrolist.formKeyCountName = '<?php echo $causa_registro_list->FormKeyCountName ?>';
	loadjs.done("fcausa_registrolist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$causa_registro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($causa_registro_list->TotalRecords > 0 && $causa_registro_list->ExportOptions->visible()) { ?>
<?php $causa_registro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($causa_registro_list->ImportOptions->visible()) { ?>
<?php $causa_registro_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$causa_registro_list->renderOtherOptions();
?>
<?php $causa_registro_list->showPageHeader(); ?>
<?php
$causa_registro_list->showMessage();
?>
<?php if ($causa_registro_list->TotalRecords > 0 || $causa_registro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($causa_registro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> causa_registro">
<?php if (!$causa_registro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$causa_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcausa_registrolist" id="fcausa_registrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_registro">
<div id="gmp_causa_registro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($causa_registro_list->TotalRecords > 0 || $causa_registro_list->isGridEdit()) { ?>
<table id="tbl_causa_registrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$causa_registro->RowType = ROWTYPE_HEADER;

// Render list options
$causa_registro_list->renderListOptions();

// Render list options (header, left)
$causa_registro_list->ListOptions->render("header", "left");
?>
<?php if ($causa_registro_list->id_registrocausa->Visible) { // id_registrocausa ?>
	<?php if ($causa_registro_list->SortUrl($causa_registro_list->id_registrocausa) == "") { ?>
		<th data-name="id_registrocausa" class="<?php echo $causa_registro_list->id_registrocausa->headerCellClass() ?>"><div id="elh_causa_registro_id_registrocausa" class="causa_registro_id_registrocausa"><div class="ew-table-header-caption"><?php echo $causa_registro_list->id_registrocausa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_registrocausa" class="<?php echo $causa_registro_list->id_registrocausa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_registro_list->SortUrl($causa_registro_list->id_registrocausa) ?>', 1);"><div id="elh_causa_registro_id_registrocausa" class="causa_registro_id_registrocausa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_registro_list->id_registrocausa->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_registro_list->id_registrocausa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_registro_list->id_registrocausa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($causa_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($causa_registro_list->SortUrl($causa_registro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $causa_registro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_causa_registro_cod_casopreh" class="causa_registro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $causa_registro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $causa_registro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_registro_list->SortUrl($causa_registro_list->cod_casopreh) ?>', 1);"><div id="elh_causa_registro_cod_casopreh" class="causa_registro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_registro_list->cod_casopreh->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_registro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_registro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($causa_registro_list->id_causa->Visible) { // id_causa ?>
	<?php if ($causa_registro_list->SortUrl($causa_registro_list->id_causa) == "") { ?>
		<th data-name="id_causa" class="<?php echo $causa_registro_list->id_causa->headerCellClass() ?>"><div id="elh_causa_registro_id_causa" class="causa_registro_id_causa"><div class="ew-table-header-caption"><?php echo $causa_registro_list->id_causa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_causa" class="<?php echo $causa_registro_list->id_causa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $causa_registro_list->SortUrl($causa_registro_list->id_causa) ?>', 1);"><div id="elh_causa_registro_id_causa" class="causa_registro_id_causa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $causa_registro_list->id_causa->caption() ?></span><span class="ew-table-header-sort"><?php if ($causa_registro_list->id_causa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($causa_registro_list->id_causa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$causa_registro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($causa_registro_list->ExportAll && $causa_registro_list->isExport()) {
	$causa_registro_list->StopRecord = $causa_registro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($causa_registro_list->TotalRecords > $causa_registro_list->StartRecord + $causa_registro_list->DisplayRecords - 1)
		$causa_registro_list->StopRecord = $causa_registro_list->StartRecord + $causa_registro_list->DisplayRecords - 1;
	else
		$causa_registro_list->StopRecord = $causa_registro_list->TotalRecords;
}
$causa_registro_list->RecordCount = $causa_registro_list->StartRecord - 1;
if ($causa_registro_list->Recordset && !$causa_registro_list->Recordset->EOF) {
	$causa_registro_list->Recordset->moveFirst();
	$selectLimit = $causa_registro_list->UseSelectLimit;
	if (!$selectLimit && $causa_registro_list->StartRecord > 1)
		$causa_registro_list->Recordset->move($causa_registro_list->StartRecord - 1);
} elseif (!$causa_registro->AllowAddDeleteRow && $causa_registro_list->StopRecord == 0) {
	$causa_registro_list->StopRecord = $causa_registro->GridAddRowCount;
}

// Initialize aggregate
$causa_registro->RowType = ROWTYPE_AGGREGATEINIT;
$causa_registro->resetAttributes();
$causa_registro_list->renderRow();
while ($causa_registro_list->RecordCount < $causa_registro_list->StopRecord) {
	$causa_registro_list->RecordCount++;
	if ($causa_registro_list->RecordCount >= $causa_registro_list->StartRecord) {
		$causa_registro_list->RowCount++;

		// Set up key count
		$causa_registro_list->KeyCount = $causa_registro_list->RowIndex;

		// Init row class and style
		$causa_registro->resetAttributes();
		$causa_registro->CssClass = "";
		if ($causa_registro_list->isGridAdd()) {
		} else {
			$causa_registro_list->loadRowValues($causa_registro_list->Recordset); // Load row values
		}
		$causa_registro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$causa_registro->RowAttrs->merge(["data-rowindex" => $causa_registro_list->RowCount, "id" => "r" . $causa_registro_list->RowCount . "_causa_registro", "data-rowtype" => $causa_registro->RowType]);

		// Render row
		$causa_registro_list->renderRow();

		// Render list options
		$causa_registro_list->renderListOptions();
?>
	<tr <?php echo $causa_registro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$causa_registro_list->ListOptions->render("body", "left", $causa_registro_list->RowCount);
?>
	<?php if ($causa_registro_list->id_registrocausa->Visible) { // id_registrocausa ?>
		<td data-name="id_registrocausa" <?php echo $causa_registro_list->id_registrocausa->cellAttributes() ?>>
<span id="el<?php echo $causa_registro_list->RowCount ?>_causa_registro_id_registrocausa">
<span<?php echo $causa_registro_list->id_registrocausa->viewAttributes() ?>><?php echo $causa_registro_list->id_registrocausa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($causa_registro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $causa_registro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $causa_registro_list->RowCount ?>_causa_registro_cod_casopreh">
<span<?php echo $causa_registro_list->cod_casopreh->viewAttributes() ?>><?php echo $causa_registro_list->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($causa_registro_list->id_causa->Visible) { // id_causa ?>
		<td data-name="id_causa" <?php echo $causa_registro_list->id_causa->cellAttributes() ?>>
<span id="el<?php echo $causa_registro_list->RowCount ?>_causa_registro_id_causa">
<span<?php echo $causa_registro_list->id_causa->viewAttributes() ?>><?php echo $causa_registro_list->id_causa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$causa_registro_list->ListOptions->render("body", "right", $causa_registro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$causa_registro_list->isGridAdd())
		$causa_registro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$causa_registro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($causa_registro_list->Recordset)
	$causa_registro_list->Recordset->Close();
?>
<?php if (!$causa_registro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$causa_registro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $causa_registro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $causa_registro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($causa_registro_list->TotalRecords == 0 && !$causa_registro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $causa_registro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$causa_registro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$causa_registro_list->isExport()) { ?>
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
$causa_registro_list->terminate();
?>