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
$camas_hospital_list = new camas_hospital_list();

// Run the page
$camas_hospital_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hospital_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$camas_hospital_list->isExport()) { ?>
<script>
var fcamas_hospitallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcamas_hospitallist = currentForm = new ew.Form("fcamas_hospitallist", "list");
	fcamas_hospitallist.formKeyCountName = '<?php echo $camas_hospital_list->FormKeyCountName ?>';
	loadjs.done("fcamas_hospitallist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$camas_hospital_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($camas_hospital_list->TotalRecords > 0 && $camas_hospital_list->ExportOptions->visible()) { ?>
<?php $camas_hospital_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($camas_hospital_list->ImportOptions->visible()) { ?>
<?php $camas_hospital_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$camas_hospital_list->isExport() || Config("EXPORT_MASTER_RECORD") && $camas_hospital_list->isExport("print")) { ?>
<?php
if ($camas_hospital_list->DbMasterFilter != "" && $camas_hospital->getCurrentMasterTable() == "hospitalesgeneral") {
	if ($camas_hospital_list->MasterRecordExists) {
		include_once "hospitalesgeneralmaster.php";
	}
}
?>
<?php } ?>
<?php
$camas_hospital_list->renderOtherOptions();
?>
<?php $camas_hospital_list->showPageHeader(); ?>
<?php
$camas_hospital_list->showMessage();
?>
<?php if ($camas_hospital_list->TotalRecords > 0 || $camas_hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($camas_hospital_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> camas_hospital">
<?php if (!$camas_hospital_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$camas_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $camas_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $camas_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcamas_hospitallist" id="fcamas_hospitallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hospital">
<?php if ($camas_hospital->getCurrentMasterTable() == "hospitalesgeneral" && $camas_hospital->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="hospitalesgeneral">
<input type="hidden" name="fk_id_hospital" value="<?php echo HtmlEncode($camas_hospital_list->id_hospital->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_camas_hospital" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($camas_hospital_list->TotalRecords > 0 || $camas_hospital_list->isGridEdit()) { ?>
<table id="tbl_camas_hospitallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$camas_hospital->RowType = ROWTYPE_HEADER;

// Render list options
$camas_hospital_list->renderListOptions();

// Render list options (header, left)
$camas_hospital_list->ListOptions->render("header", "left");
?>
<?php if ($camas_hospital_list->id_hospital->Visible) { // id_hospital ?>
	<?php if ($camas_hospital_list->SortUrl($camas_hospital_list->id_hospital) == "") { ?>
		<th data-name="id_hospital" class="<?php echo $camas_hospital_list->id_hospital->headerCellClass() ?>"><div id="elh_camas_hospital_id_hospital" class="camas_hospital_id_hospital"><div class="ew-table-header-caption"><?php echo $camas_hospital_list->id_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hospital" class="<?php echo $camas_hospital_list->id_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hospital_list->SortUrl($camas_hospital_list->id_hospital) ?>', 1);"><div id="elh_camas_hospital_id_hospital" class="camas_hospital_id_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_list->id_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_list->id_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_list->id_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hospital_list->c_hospitalaria->Visible) { // c_hospitalaria ?>
	<?php if ($camas_hospital_list->SortUrl($camas_hospital_list->c_hospitalaria) == "") { ?>
		<th data-name="c_hospitalaria" class="<?php echo $camas_hospital_list->c_hospitalaria->headerCellClass() ?>"><div id="elh_camas_hospital_c_hospitalaria" class="camas_hospital_c_hospitalaria"><div class="ew-table-header-caption"><?php echo $camas_hospital_list->c_hospitalaria->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_hospitalaria" class="<?php echo $camas_hospital_list->c_hospitalaria->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hospital_list->SortUrl($camas_hospital_list->c_hospitalaria) ?>', 1);"><div id="elh_camas_hospital_c_hospitalaria" class="camas_hospital_c_hospitalaria">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_list->c_hospitalaria->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_list->c_hospitalaria->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_list->c_hospitalaria->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hospital_list->c_uci->Visible) { // c_uci ?>
	<?php if ($camas_hospital_list->SortUrl($camas_hospital_list->c_uci) == "") { ?>
		<th data-name="c_uci" class="<?php echo $camas_hospital_list->c_uci->headerCellClass() ?>"><div id="elh_camas_hospital_c_uci" class="camas_hospital_c_uci"><div class="ew-table-header-caption"><?php echo $camas_hospital_list->c_uci->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_uci" class="<?php echo $camas_hospital_list->c_uci->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hospital_list->SortUrl($camas_hospital_list->c_uci) ?>', 1);"><div id="elh_camas_hospital_c_uci" class="camas_hospital_c_uci">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_list->c_uci->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_list->c_uci->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_list->c_uci->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hospital_list->c_especial->Visible) { // c_especial ?>
	<?php if ($camas_hospital_list->SortUrl($camas_hospital_list->c_especial) == "") { ?>
		<th data-name="c_especial" class="<?php echo $camas_hospital_list->c_especial->headerCellClass() ?>"><div id="elh_camas_hospital_c_especial" class="camas_hospital_c_especial"><div class="ew-table-header-caption"><?php echo $camas_hospital_list->c_especial->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_especial" class="<?php echo $camas_hospital_list->c_especial->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $camas_hospital_list->SortUrl($camas_hospital_list->c_especial) ?>', 1);"><div id="elh_camas_hospital_c_especial" class="camas_hospital_c_especial">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_list->c_especial->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_list->c_especial->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_list->c_especial->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$camas_hospital_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($camas_hospital_list->ExportAll && $camas_hospital_list->isExport()) {
	$camas_hospital_list->StopRecord = $camas_hospital_list->TotalRecords;
} else {

	// Set the last record to display
	if ($camas_hospital_list->TotalRecords > $camas_hospital_list->StartRecord + $camas_hospital_list->DisplayRecords - 1)
		$camas_hospital_list->StopRecord = $camas_hospital_list->StartRecord + $camas_hospital_list->DisplayRecords - 1;
	else
		$camas_hospital_list->StopRecord = $camas_hospital_list->TotalRecords;
}
$camas_hospital_list->RecordCount = $camas_hospital_list->StartRecord - 1;
if ($camas_hospital_list->Recordset && !$camas_hospital_list->Recordset->EOF) {
	$camas_hospital_list->Recordset->moveFirst();
	$selectLimit = $camas_hospital_list->UseSelectLimit;
	if (!$selectLimit && $camas_hospital_list->StartRecord > 1)
		$camas_hospital_list->Recordset->move($camas_hospital_list->StartRecord - 1);
} elseif (!$camas_hospital->AllowAddDeleteRow && $camas_hospital_list->StopRecord == 0) {
	$camas_hospital_list->StopRecord = $camas_hospital->GridAddRowCount;
}

// Initialize aggregate
$camas_hospital->RowType = ROWTYPE_AGGREGATEINIT;
$camas_hospital->resetAttributes();
$camas_hospital_list->renderRow();
while ($camas_hospital_list->RecordCount < $camas_hospital_list->StopRecord) {
	$camas_hospital_list->RecordCount++;
	if ($camas_hospital_list->RecordCount >= $camas_hospital_list->StartRecord) {
		$camas_hospital_list->RowCount++;

		// Set up key count
		$camas_hospital_list->KeyCount = $camas_hospital_list->RowIndex;

		// Init row class and style
		$camas_hospital->resetAttributes();
		$camas_hospital->CssClass = "";
		if ($camas_hospital_list->isGridAdd()) {
		} else {
			$camas_hospital_list->loadRowValues($camas_hospital_list->Recordset); // Load row values
		}
		$camas_hospital->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$camas_hospital->RowAttrs->merge(["data-rowindex" => $camas_hospital_list->RowCount, "id" => "r" . $camas_hospital_list->RowCount . "_camas_hospital", "data-rowtype" => $camas_hospital->RowType]);

		// Render row
		$camas_hospital_list->renderRow();

		// Render list options
		$camas_hospital_list->renderListOptions();
?>
	<tr <?php echo $camas_hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$camas_hospital_list->ListOptions->render("body", "left", $camas_hospital_list->RowCount);
?>
	<?php if ($camas_hospital_list->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital" <?php echo $camas_hospital_list->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_list->RowCount ?>_camas_hospital_id_hospital">
<span<?php echo $camas_hospital_list->id_hospital->viewAttributes() ?>><?php echo $camas_hospital_list->id_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hospital_list->c_hospitalaria->Visible) { // c_hospitalaria ?>
		<td data-name="c_hospitalaria" <?php echo $camas_hospital_list->c_hospitalaria->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_list->RowCount ?>_camas_hospital_c_hospitalaria">
<span<?php echo $camas_hospital_list->c_hospitalaria->viewAttributes() ?>><?php echo $camas_hospital_list->c_hospitalaria->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hospital_list->c_uci->Visible) { // c_uci ?>
		<td data-name="c_uci" <?php echo $camas_hospital_list->c_uci->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_list->RowCount ?>_camas_hospital_c_uci">
<span<?php echo $camas_hospital_list->c_uci->viewAttributes() ?>><?php echo $camas_hospital_list->c_uci->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($camas_hospital_list->c_especial->Visible) { // c_especial ?>
		<td data-name="c_especial" <?php echo $camas_hospital_list->c_especial->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_list->RowCount ?>_camas_hospital_c_especial">
<span<?php echo $camas_hospital_list->c_especial->viewAttributes() ?>><?php echo $camas_hospital_list->c_especial->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$camas_hospital_list->ListOptions->render("body", "right", $camas_hospital_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$camas_hospital_list->isGridAdd())
		$camas_hospital_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$camas_hospital->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($camas_hospital_list->Recordset)
	$camas_hospital_list->Recordset->Close();
?>
<?php if (!$camas_hospital_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$camas_hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $camas_hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $camas_hospital_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($camas_hospital_list->TotalRecords == 0 && !$camas_hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $camas_hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$camas_hospital_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$camas_hospital_list->isExport()) { ?>
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
$camas_hospital_list->terminate();
?>