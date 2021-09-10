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
$camas_hosptlz_list = new camas_hosptlz_list();

// Run the page
$camas_hosptlz_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hosptlz_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$camas_hosptlz_list->isExport()) { ?>
<script>
var fcamas_hosptlzlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcamas_hosptlzlist = currentForm = new ew.Form("fcamas_hosptlzlist", "list");
	fcamas_hosptlzlist.formKeyCountName = '<?php echo $camas_hosptlz_list->FormKeyCountName ?>';
	loadjs.done("fcamas_hosptlzlist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$camas_hosptlz_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($camas_hosptlz_list->TotalRecords > 0 && $camas_hosptlz_list->ExportOptions->visible()) { ?>
<?php $camas_hosptlz_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($camas_hosptlz_list->ImportOptions->visible()) { ?>
<?php $camas_hosptlz_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$camas_hosptlz_list->renderOtherOptions();
?>
<?php $camas_hosptlz_list->showPageHeader(); ?>
<?php
$camas_hosptlz_list->showMessage();
?>
<?php if ($camas_hosptlz_list->TotalRecords > 0 || $camas_hosptlz->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($camas_hosptlz_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> camas_hosptlz">
<?php if (!$camas_hosptlz_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$camas_hosptlz_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $camas_hosptlz_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $camas_hosptlz_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcamas_hosptlzlist" id="fcamas_hosptlzlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hosptlz">
<div id="gmp_camas_hosptlz" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($camas_hosptlz_list->TotalRecords > 0 || $camas_hosptlz_list->isGridEdit()) { ?>
<table id="tbl_camas_hosptlzlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$camas_hosptlz->RowType = ROWTYPE_HEADER;

// Render list options
$camas_hosptlz_list->renderListOptions();

// Render list options (header, left)
$camas_hosptlz_list->ListOptions->render("header", "left");
?>
<?php if ($camas_hosptlz_list->id->Visible) { // id ?>
	<?php if ($camas_hosptlz_list->SortUrl($camas_hosptlz_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $camas_hosptlz_list->id->headerCellClass() ?>"><div id="elh_camas_hosptlz_id" class="camas_hosptlz_id"><div class="ew-table-header-caption"><?php echo $camas_hosptlz_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $camas_hosptlz_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hosptlz_list->SortUrl($camas_hosptlz_list->id) ?>', 1);"><div id="elh_camas_hosptlz_id" class="camas_hosptlz_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hosptlz_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hosptlz_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hosptlz_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hosptlz_list->ocupadas->Visible) { // ocupadas ?>
	<?php if ($camas_hosptlz_list->SortUrl($camas_hosptlz_list->ocupadas) == "") { ?>
		<th data-name="ocupadas" class="<?php echo $camas_hosptlz_list->ocupadas->headerCellClass() ?>"><div id="elh_camas_hosptlz_ocupadas" class="camas_hosptlz_ocupadas"><div class="ew-table-header-caption"><?php echo $camas_hosptlz_list->ocupadas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ocupadas" class="<?php echo $camas_hosptlz_list->ocupadas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hosptlz_list->SortUrl($camas_hosptlz_list->ocupadas) ?>', 1);"><div id="elh_camas_hosptlz_ocupadas" class="camas_hosptlz_ocupadas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hosptlz_list->ocupadas->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hosptlz_list->ocupadas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hosptlz_list->ocupadas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hosptlz_list->sin_servicio->Visible) { // sin_servicio ?>
	<?php if ($camas_hosptlz_list->SortUrl($camas_hosptlz_list->sin_servicio) == "") { ?>
		<th data-name="sin_servicio" class="<?php echo $camas_hosptlz_list->sin_servicio->headerCellClass() ?>"><div id="elh_camas_hosptlz_sin_servicio" class="camas_hosptlz_sin_servicio"><div class="ew-table-header-caption"><?php echo $camas_hosptlz_list->sin_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sin_servicio" class="<?php echo $camas_hosptlz_list->sin_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hosptlz_list->SortUrl($camas_hosptlz_list->sin_servicio) ?>', 1);"><div id="elh_camas_hosptlz_sin_servicio" class="camas_hosptlz_sin_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hosptlz_list->sin_servicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hosptlz_list->sin_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hosptlz_list->sin_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hosptlz_list->libres->Visible) { // libres ?>
	<?php if ($camas_hosptlz_list->SortUrl($camas_hosptlz_list->libres) == "") { ?>
		<th data-name="libres" class="<?php echo $camas_hosptlz_list->libres->headerCellClass() ?>"><div id="elh_camas_hosptlz_libres" class="camas_hosptlz_libres"><div class="ew-table-header-caption"><?php echo $camas_hosptlz_list->libres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="libres" class="<?php echo $camas_hosptlz_list->libres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hosptlz_list->SortUrl($camas_hosptlz_list->libres) ?>', 1);"><div id="elh_camas_hosptlz_libres" class="camas_hosptlz_libres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hosptlz_list->libres->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hosptlz_list->libres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hosptlz_list->libres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hosptlz_list->id_camas->Visible) { // id_camas ?>
	<?php if ($camas_hosptlz_list->SortUrl($camas_hosptlz_list->id_camas) == "") { ?>
		<th data-name="id_camas" class="<?php echo $camas_hosptlz_list->id_camas->headerCellClass() ?>"><div id="elh_camas_hosptlz_id_camas" class="camas_hosptlz_id_camas"><div class="ew-table-header-caption"><?php echo $camas_hosptlz_list->id_camas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_camas" class="<?php echo $camas_hosptlz_list->id_camas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hosptlz_list->SortUrl($camas_hosptlz_list->id_camas) ?>', 1);"><div id="elh_camas_hosptlz_id_camas" class="camas_hosptlz_id_camas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hosptlz_list->id_camas->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hosptlz_list->id_camas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hosptlz_list->id_camas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$camas_hosptlz_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($camas_hosptlz_list->ExportAll && $camas_hosptlz_list->isExport()) {
	$camas_hosptlz_list->StopRecord = $camas_hosptlz_list->TotalRecords;
} else {

	// Set the last record to display
	if ($camas_hosptlz_list->TotalRecords > $camas_hosptlz_list->StartRecord + $camas_hosptlz_list->DisplayRecords - 1)
		$camas_hosptlz_list->StopRecord = $camas_hosptlz_list->StartRecord + $camas_hosptlz_list->DisplayRecords - 1;
	else
		$camas_hosptlz_list->StopRecord = $camas_hosptlz_list->TotalRecords;
}
$camas_hosptlz_list->RecordCount = $camas_hosptlz_list->StartRecord - 1;
if ($camas_hosptlz_list->Recordset && !$camas_hosptlz_list->Recordset->EOF) {
	$camas_hosptlz_list->Recordset->moveFirst();
	$selectLimit = $camas_hosptlz_list->UseSelectLimit;
	if (!$selectLimit && $camas_hosptlz_list->StartRecord > 1)
		$camas_hosptlz_list->Recordset->move($camas_hosptlz_list->StartRecord - 1);
} elseif (!$camas_hosptlz->AllowAddDeleteRow && $camas_hosptlz_list->StopRecord == 0) {
	$camas_hosptlz_list->StopRecord = $camas_hosptlz->GridAddRowCount;
}

// Initialize aggregate
$camas_hosptlz->RowType = ROWTYPE_AGGREGATEINIT;
$camas_hosptlz->resetAttributes();
$camas_hosptlz_list->renderRow();
while ($camas_hosptlz_list->RecordCount < $camas_hosptlz_list->StopRecord) {
	$camas_hosptlz_list->RecordCount++;
	if ($camas_hosptlz_list->RecordCount >= $camas_hosptlz_list->StartRecord) {
		$camas_hosptlz_list->RowCount++;

		// Set up key count
		$camas_hosptlz_list->KeyCount = $camas_hosptlz_list->RowIndex;

		// Init row class and style
		$camas_hosptlz->resetAttributes();
		$camas_hosptlz->CssClass = "";
		if ($camas_hosptlz_list->isGridAdd()) {
		} else {
			$camas_hosptlz_list->loadRowValues($camas_hosptlz_list->Recordset); // Load row values
		}
		$camas_hosptlz->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$camas_hosptlz->RowAttrs->merge(["data-rowindex" => $camas_hosptlz_list->RowCount, "id" => "r" . $camas_hosptlz_list->RowCount . "_camas_hosptlz", "data-rowtype" => $camas_hosptlz->RowType]);

		// Render row
		$camas_hosptlz_list->renderRow();

		// Render list options
		$camas_hosptlz_list->renderListOptions();
?>
	<tr <?php echo $camas_hosptlz->rowAttributes() ?>>
<?php

// Render list options (body, left)
$camas_hosptlz_list->ListOptions->render("body", "left", $camas_hosptlz_list->RowCount);
?>
	<?php if ($camas_hosptlz_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $camas_hosptlz_list->id->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_list->RowCount ?>_camas_hosptlz_id">
<span<?php echo $camas_hosptlz_list->id->viewAttributes() ?>><?php echo $camas_hosptlz_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hosptlz_list->ocupadas->Visible) { // ocupadas ?>
		<td data-name="ocupadas" <?php echo $camas_hosptlz_list->ocupadas->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_list->RowCount ?>_camas_hosptlz_ocupadas">
<span<?php echo $camas_hosptlz_list->ocupadas->viewAttributes() ?>><?php echo $camas_hosptlz_list->ocupadas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hosptlz_list->sin_servicio->Visible) { // sin_servicio ?>
		<td data-name="sin_servicio" <?php echo $camas_hosptlz_list->sin_servicio->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_list->RowCount ?>_camas_hosptlz_sin_servicio">
<span<?php echo $camas_hosptlz_list->sin_servicio->viewAttributes() ?>><?php echo $camas_hosptlz_list->sin_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hosptlz_list->libres->Visible) { // libres ?>
		<td data-name="libres" <?php echo $camas_hosptlz_list->libres->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_list->RowCount ?>_camas_hosptlz_libres">
<span<?php echo $camas_hosptlz_list->libres->viewAttributes() ?>><?php echo $camas_hosptlz_list->libres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hosptlz_list->id_camas->Visible) { // id_camas ?>
		<td data-name="id_camas" <?php echo $camas_hosptlz_list->id_camas->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_list->RowCount ?>_camas_hosptlz_id_camas">
<span<?php echo $camas_hosptlz_list->id_camas->viewAttributes() ?>><?php echo $camas_hosptlz_list->id_camas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$camas_hosptlz_list->ListOptions->render("body", "right", $camas_hosptlz_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$camas_hosptlz_list->isGridAdd())
		$camas_hosptlz_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$camas_hosptlz->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($camas_hosptlz_list->Recordset)
	$camas_hosptlz_list->Recordset->Close();
?>
<?php if (!$camas_hosptlz_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$camas_hosptlz_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $camas_hosptlz_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $camas_hosptlz_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($camas_hosptlz_list->TotalRecords == 0 && !$camas_hosptlz->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $camas_hosptlz_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$camas_hosptlz_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$camas_hosptlz_list->isExport()) { ?>
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
$camas_hosptlz_list->terminate();
?>