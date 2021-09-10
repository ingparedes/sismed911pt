<?php
namespace PHPMaker2020\sismed911;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($camas_hospital_grid))
	$camas_hospital_grid = new camas_hospital_grid();

// Run the page
$camas_hospital_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hospital_grid->Page_Render();
?>
<?php if (!$camas_hospital_grid->isExport()) { ?>
<script>
var fcamas_hospitalgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fcamas_hospitalgrid = new ew.Form("fcamas_hospitalgrid", "grid");
	fcamas_hospitalgrid.formKeyCountName = '<?php echo $camas_hospital_grid->FormKeyCountName ?>';

	// Validate form
	fcamas_hospitalgrid.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($camas_hospital_grid->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_grid->id_hospital->caption(), $camas_hospital_grid->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($camas_hospital_grid->c_hospitalaria->Required) { ?>
				elm = this.getElements("x" + infix + "_c_hospitalaria");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_grid->c_hospitalaria->caption(), $camas_hospital_grid->c_hospitalaria->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_c_hospitalaria");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($camas_hospital_grid->c_hospitalaria->errorMessage()) ?>");
			<?php if ($camas_hospital_grid->c_uci->Required) { ?>
				elm = this.getElements("x" + infix + "_c_uci");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_grid->c_uci->caption(), $camas_hospital_grid->c_uci->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_c_uci");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($camas_hospital_grid->c_uci->errorMessage()) ?>");
			<?php if ($camas_hospital_grid->c_especial->Required) { ?>
				elm = this.getElements("x" + infix + "_c_especial");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_grid->c_especial->caption(), $camas_hospital_grid->c_especial->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_c_especial");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($camas_hospital_grid->c_especial->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fcamas_hospitalgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "id_hospital", false)) return false;
		if (ew.valueChanged(fobj, infix, "c_hospitalaria", false)) return false;
		if (ew.valueChanged(fobj, infix, "c_uci", false)) return false;
		if (ew.valueChanged(fobj, infix, "c_especial", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fcamas_hospitalgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcamas_hospitalgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcamas_hospitalgrid");
});
</script>
<?php } ?>
<?php
$camas_hospital_grid->renderOtherOptions();
?>
<?php if ($camas_hospital_grid->TotalRecords > 0 || $camas_hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($camas_hospital_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> camas_hospital">
<?php if ($camas_hospital_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $camas_hospital_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fcamas_hospitalgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_camas_hospital" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_camas_hospitalgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$camas_hospital->RowType = ROWTYPE_HEADER;

// Render list options
$camas_hospital_grid->renderListOptions();

// Render list options (header, left)
$camas_hospital_grid->ListOptions->render("header", "left");
?>
<?php if ($camas_hospital_grid->id_hospital->Visible) { // id_hospital ?>
	<?php if ($camas_hospital_grid->SortUrl($camas_hospital_grid->id_hospital) == "") { ?>
		<th data-name="id_hospital" class="<?php echo $camas_hospital_grid->id_hospital->headerCellClass() ?>"><div id="elh_camas_hospital_id_hospital" class="camas_hospital_id_hospital"><div class="ew-table-header-caption"><?php echo $camas_hospital_grid->id_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hospital" class="<?php echo $camas_hospital_grid->id_hospital->headerCellClass() ?>"><div><div id="elh_camas_hospital_id_hospital" class="camas_hospital_id_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_grid->id_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_grid->id_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_grid->id_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hospital_grid->c_hospitalaria->Visible) { // c_hospitalaria ?>
	<?php if ($camas_hospital_grid->SortUrl($camas_hospital_grid->c_hospitalaria) == "") { ?>
		<th data-name="c_hospitalaria" class="<?php echo $camas_hospital_grid->c_hospitalaria->headerCellClass() ?>"><div id="elh_camas_hospital_c_hospitalaria" class="camas_hospital_c_hospitalaria"><div class="ew-table-header-caption"><?php echo $camas_hospital_grid->c_hospitalaria->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_hospitalaria" class="<?php echo $camas_hospital_grid->c_hospitalaria->headerCellClass() ?>"><div><div id="elh_camas_hospital_c_hospitalaria" class="camas_hospital_c_hospitalaria">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_grid->c_hospitalaria->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_grid->c_hospitalaria->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_grid->c_hospitalaria->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hospital_grid->c_uci->Visible) { // c_uci ?>
	<?php if ($camas_hospital_grid->SortUrl($camas_hospital_grid->c_uci) == "") { ?>
		<th data-name="c_uci" class="<?php echo $camas_hospital_grid->c_uci->headerCellClass() ?>"><div id="elh_camas_hospital_c_uci" class="camas_hospital_c_uci"><div class="ew-table-header-caption"><?php echo $camas_hospital_grid->c_uci->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_uci" class="<?php echo $camas_hospital_grid->c_uci->headerCellClass() ?>"><div><div id="elh_camas_hospital_c_uci" class="camas_hospital_c_uci">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_grid->c_uci->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_grid->c_uci->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_grid->c_uci->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($camas_hospital_grid->c_especial->Visible) { // c_especial ?>
	<?php if ($camas_hospital_grid->SortUrl($camas_hospital_grid->c_especial) == "") { ?>
		<th data-name="c_especial" class="<?php echo $camas_hospital_grid->c_especial->headerCellClass() ?>"><div id="elh_camas_hospital_c_especial" class="camas_hospital_c_especial"><div class="ew-table-header-caption"><?php echo $camas_hospital_grid->c_especial->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="c_especial" class="<?php echo $camas_hospital_grid->c_especial->headerCellClass() ?>"><div><div id="elh_camas_hospital_c_especial" class="camas_hospital_c_especial">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $camas_hospital_grid->c_especial->caption() ?></span><span class="ew-table-header-sort"><?php if ($camas_hospital_grid->c_especial->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($camas_hospital_grid->c_especial->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$camas_hospital_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$camas_hospital_grid->StartRecord = 1;
$camas_hospital_grid->StopRecord = $camas_hospital_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($camas_hospital->isConfirm() || $camas_hospital_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($camas_hospital_grid->FormKeyCountName) && ($camas_hospital_grid->isGridAdd() || $camas_hospital_grid->isGridEdit() || $camas_hospital->isConfirm())) {
		$camas_hospital_grid->KeyCount = $CurrentForm->getValue($camas_hospital_grid->FormKeyCountName);
		$camas_hospital_grid->StopRecord = $camas_hospital_grid->StartRecord + $camas_hospital_grid->KeyCount - 1;
	}
}
$camas_hospital_grid->RecordCount = $camas_hospital_grid->StartRecord - 1;
if ($camas_hospital_grid->Recordset && !$camas_hospital_grid->Recordset->EOF) {
	$camas_hospital_grid->Recordset->moveFirst();
	$selectLimit = $camas_hospital_grid->UseSelectLimit;
	if (!$selectLimit && $camas_hospital_grid->StartRecord > 1)
		$camas_hospital_grid->Recordset->move($camas_hospital_grid->StartRecord - 1);
} elseif (!$camas_hospital->AllowAddDeleteRow && $camas_hospital_grid->StopRecord == 0) {
	$camas_hospital_grid->StopRecord = $camas_hospital->GridAddRowCount;
}

// Initialize aggregate
$camas_hospital->RowType = ROWTYPE_AGGREGATEINIT;
$camas_hospital->resetAttributes();
$camas_hospital_grid->renderRow();
if ($camas_hospital_grid->isGridAdd())
	$camas_hospital_grid->RowIndex = 0;
if ($camas_hospital_grid->isGridEdit())
	$camas_hospital_grid->RowIndex = 0;
while ($camas_hospital_grid->RecordCount < $camas_hospital_grid->StopRecord) {
	$camas_hospital_grid->RecordCount++;
	if ($camas_hospital_grid->RecordCount >= $camas_hospital_grid->StartRecord) {
		$camas_hospital_grid->RowCount++;
		if ($camas_hospital_grid->isGridAdd() || $camas_hospital_grid->isGridEdit() || $camas_hospital->isConfirm()) {
			$camas_hospital_grid->RowIndex++;
			$CurrentForm->Index = $camas_hospital_grid->RowIndex;
			if ($CurrentForm->hasValue($camas_hospital_grid->FormActionName) && ($camas_hospital->isConfirm() || $camas_hospital_grid->EventCancelled))
				$camas_hospital_grid->RowAction = strval($CurrentForm->getValue($camas_hospital_grid->FormActionName));
			elseif ($camas_hospital_grid->isGridAdd())
				$camas_hospital_grid->RowAction = "insert";
			else
				$camas_hospital_grid->RowAction = "";
		}

		// Set up key count
		$camas_hospital_grid->KeyCount = $camas_hospital_grid->RowIndex;

		// Init row class and style
		$camas_hospital->resetAttributes();
		$camas_hospital->CssClass = "";
		if ($camas_hospital_grid->isGridAdd()) {
			if ($camas_hospital->CurrentMode == "copy") {
				$camas_hospital_grid->loadRowValues($camas_hospital_grid->Recordset); // Load row values
				$camas_hospital_grid->setRecordKey($camas_hospital_grid->RowOldKey, $camas_hospital_grid->Recordset); // Set old record key
			} else {
				$camas_hospital_grid->loadRowValues(); // Load default values
				$camas_hospital_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$camas_hospital_grid->loadRowValues($camas_hospital_grid->Recordset); // Load row values
		}
		$camas_hospital->RowType = ROWTYPE_VIEW; // Render view
		if ($camas_hospital_grid->isGridAdd()) // Grid add
			$camas_hospital->RowType = ROWTYPE_ADD; // Render add
		if ($camas_hospital_grid->isGridAdd() && $camas_hospital->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$camas_hospital_grid->restoreCurrentRowFormValues($camas_hospital_grid->RowIndex); // Restore form values
		if ($camas_hospital_grid->isGridEdit()) { // Grid edit
			if ($camas_hospital->EventCancelled)
				$camas_hospital_grid->restoreCurrentRowFormValues($camas_hospital_grid->RowIndex); // Restore form values
			if ($camas_hospital_grid->RowAction == "insert")
				$camas_hospital->RowType = ROWTYPE_ADD; // Render add
			else
				$camas_hospital->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($camas_hospital_grid->isGridEdit() && ($camas_hospital->RowType == ROWTYPE_EDIT || $camas_hospital->RowType == ROWTYPE_ADD) && $camas_hospital->EventCancelled) // Update failed
			$camas_hospital_grid->restoreCurrentRowFormValues($camas_hospital_grid->RowIndex); // Restore form values
		if ($camas_hospital->RowType == ROWTYPE_EDIT) // Edit row
			$camas_hospital_grid->EditRowCount++;
		if ($camas_hospital->isConfirm()) // Confirm row
			$camas_hospital_grid->restoreCurrentRowFormValues($camas_hospital_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$camas_hospital->RowAttrs->merge(["data-rowindex" => $camas_hospital_grid->RowCount, "id" => "r" . $camas_hospital_grid->RowCount . "_camas_hospital", "data-rowtype" => $camas_hospital->RowType]);

		// Render row
		$camas_hospital_grid->renderRow();

		// Render list options
		$camas_hospital_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($camas_hospital_grid->RowAction != "delete" && $camas_hospital_grid->RowAction != "insertdelete" && !($camas_hospital_grid->RowAction == "insert" && $camas_hospital->isConfirm() && $camas_hospital_grid->emptyRow())) {
?>
	<tr <?php echo $camas_hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$camas_hospital_grid->ListOptions->render("body", "left", $camas_hospital_grid->RowCount);
?>
	<?php if ($camas_hospital_grid->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital" <?php echo $camas_hospital_grid->id_hospital->cellAttributes() ?>>
<?php if ($camas_hospital->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($camas_hospital_grid->id_hospital->getSessionValue() != "") { ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_id_hospital" class="form-group">
<span<?php echo $camas_hospital_grid->id_hospital->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->id_hospital->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_id_hospital" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->id_hospital->EditValue ?>"<?php echo $camas_hospital_grid->id_hospital->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->OldValue) ?>">
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($camas_hospital_grid->id_hospital->getSessionValue() != "") { ?>

<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_id_hospital" class="form-group">
<span<?php echo $camas_hospital_grid->id_hospital->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->id_hospital->EditValue)) ?>"></span>
</span>

<input type="hidden" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->CurrentValue) ?>">
<?php } else { ?>

<input type="text" data-table="camas_hospital" data-field="x_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->id_hospital->EditValue ?>"<?php echo $camas_hospital_grid->id_hospital->editAttributes() ?>>

<?php } ?>

<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->OldValue != null ? $camas_hospital_grid->id_hospital->OldValue : $camas_hospital_grid->id_hospital->CurrentValue) ?>">
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_id_hospital">
<span<?php echo $camas_hospital_grid->id_hospital->viewAttributes() ?>><?php echo $camas_hospital_grid->id_hospital->getViewValue() ?></span>
</span>
<?php if (!$camas_hospital->isConfirm()) { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($camas_hospital_grid->c_hospitalaria->Visible) { // c_hospitalaria ?>
		<td data-name="c_hospitalaria" <?php echo $camas_hospital_grid->c_hospitalaria->cellAttributes() ?>>
<?php if ($camas_hospital->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_hospitalaria" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_c_hospitalaria" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_hospitalaria->EditValue ?>"<?php echo $camas_hospital_grid->c_hospitalaria->editAttributes() ?>>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->OldValue) ?>">
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_hospitalaria" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_c_hospitalaria" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_hospitalaria->EditValue ?>"<?php echo $camas_hospital_grid->c_hospitalaria->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_hospitalaria">
<span<?php echo $camas_hospital_grid->c_hospitalaria->viewAttributes() ?>><?php echo $camas_hospital_grid->c_hospitalaria->getViewValue() ?></span>
</span>
<?php if (!$camas_hospital->isConfirm()) { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($camas_hospital_grid->c_uci->Visible) { // c_uci ?>
		<td data-name="c_uci" <?php echo $camas_hospital_grid->c_uci->cellAttributes() ?>>
<?php if ($camas_hospital->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_uci" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_c_uci" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_uci->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_uci->EditValue ?>"<?php echo $camas_hospital_grid->c_uci->editAttributes() ?>>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->OldValue) ?>">
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_uci" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_c_uci" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_uci->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_uci->EditValue ?>"<?php echo $camas_hospital_grid->c_uci->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_uci">
<span<?php echo $camas_hospital_grid->c_uci->viewAttributes() ?>><?php echo $camas_hospital_grid->c_uci->getViewValue() ?></span>
</span>
<?php if (!$camas_hospital->isConfirm()) { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($camas_hospital_grid->c_especial->Visible) { // c_especial ?>
		<td data-name="c_especial" <?php echo $camas_hospital_grid->c_especial->cellAttributes() ?>>
<?php if ($camas_hospital->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_especial" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_c_especial" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_especial->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_especial->EditValue ?>"<?php echo $camas_hospital_grid->c_especial->editAttributes() ?>>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->OldValue) ?>">
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_especial" class="form-group">
<input type="text" data-table="camas_hospital" data-field="x_c_especial" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_especial->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_especial->EditValue ?>"<?php echo $camas_hospital_grid->c_especial->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($camas_hospital->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $camas_hospital_grid->RowCount ?>_camas_hospital_c_especial">
<span<?php echo $camas_hospital_grid->c_especial->viewAttributes() ?>><?php echo $camas_hospital_grid->c_especial->getViewValue() ?></span>
</span>
<?php if (!$camas_hospital->isConfirm()) { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="fcamas_hospitalgrid$x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->FormValue) ?>">
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="fcamas_hospitalgrid$o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$camas_hospital_grid->ListOptions->render("body", "right", $camas_hospital_grid->RowCount);
?>
	</tr>
<?php if ($camas_hospital->RowType == ROWTYPE_ADD || $camas_hospital->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fcamas_hospitalgrid", "load"], function() {
	fcamas_hospitalgrid.updateLists(<?php echo $camas_hospital_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$camas_hospital_grid->isGridAdd() || $camas_hospital->CurrentMode == "copy")
		if (!$camas_hospital_grid->Recordset->EOF)
			$camas_hospital_grid->Recordset->moveNext();
}
?>
<?php
	if ($camas_hospital->CurrentMode == "add" || $camas_hospital->CurrentMode == "copy" || $camas_hospital->CurrentMode == "edit") {
		$camas_hospital_grid->RowIndex = '$rowindex$';
		$camas_hospital_grid->loadRowValues();

		// Set row properties
		$camas_hospital->resetAttributes();
		$camas_hospital->RowAttrs->merge(["data-rowindex" => $camas_hospital_grid->RowIndex, "id" => "r0_camas_hospital", "data-rowtype" => ROWTYPE_ADD]);
		$camas_hospital->RowAttrs->appendClass("ew-template");
		$camas_hospital->RowType = ROWTYPE_ADD;

		// Render row
		$camas_hospital_grid->renderRow();

		// Render list options
		$camas_hospital_grid->renderListOptions();
		$camas_hospital_grid->StartRowCount = 0;
?>
	<tr <?php echo $camas_hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$camas_hospital_grid->ListOptions->render("body", "left", $camas_hospital_grid->RowIndex);
?>
	<?php if ($camas_hospital_grid->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital">
<?php if (!$camas_hospital->isConfirm()) { ?>
<?php if ($camas_hospital_grid->id_hospital->getSessionValue() != "") { ?>
<span id="el$rowindex$_camas_hospital_id_hospital" class="form-group camas_hospital_id_hospital">
<span<?php echo $camas_hospital_grid->id_hospital->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->id_hospital->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_camas_hospital_id_hospital" class="form-group camas_hospital_id_hospital">
<input type="text" data-table="camas_hospital" data-field="x_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->id_hospital->EditValue ?>"<?php echo $camas_hospital_grid->id_hospital->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_camas_hospital_id_hospital" class="form-group camas_hospital_id_hospital">
<span<?php echo $camas_hospital_grid->id_hospital->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->id_hospital->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="x<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="camas_hospital" data-field="x_id_hospital" name="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" id="o<?php echo $camas_hospital_grid->RowIndex ?>_id_hospital" value="<?php echo HtmlEncode($camas_hospital_grid->id_hospital->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($camas_hospital_grid->c_hospitalaria->Visible) { // c_hospitalaria ?>
		<td data-name="c_hospitalaria">
<?php if (!$camas_hospital->isConfirm()) { ?>
<span id="el$rowindex$_camas_hospital_c_hospitalaria" class="form-group camas_hospital_c_hospitalaria">
<input type="text" data-table="camas_hospital" data-field="x_c_hospitalaria" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_hospitalaria->EditValue ?>"<?php echo $camas_hospital_grid->c_hospitalaria->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_camas_hospital_c_hospitalaria" class="form-group camas_hospital_c_hospitalaria">
<span<?php echo $camas_hospital_grid->c_hospitalaria->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->c_hospitalaria->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_hospitalaria" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_hospitalaria" value="<?php echo HtmlEncode($camas_hospital_grid->c_hospitalaria->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($camas_hospital_grid->c_uci->Visible) { // c_uci ?>
		<td data-name="c_uci">
<?php if (!$camas_hospital->isConfirm()) { ?>
<span id="el$rowindex$_camas_hospital_c_uci" class="form-group camas_hospital_c_uci">
<input type="text" data-table="camas_hospital" data-field="x_c_uci" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_uci->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_uci->EditValue ?>"<?php echo $camas_hospital_grid->c_uci->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_camas_hospital_c_uci" class="form-group camas_hospital_c_uci">
<span<?php echo $camas_hospital_grid->c_uci->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->c_uci->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_uci" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_uci" value="<?php echo HtmlEncode($camas_hospital_grid->c_uci->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($camas_hospital_grid->c_especial->Visible) { // c_especial ?>
		<td data-name="c_especial">
<?php if (!$camas_hospital->isConfirm()) { ?>
<span id="el$rowindex$_camas_hospital_c_especial" class="form-group camas_hospital_c_especial">
<input type="text" data-table="camas_hospital" data-field="x_c_especial" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_grid->c_especial->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_grid->c_especial->EditValue ?>"<?php echo $camas_hospital_grid->c_especial->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_camas_hospital_c_especial" class="form-group camas_hospital_c_especial">
<span<?php echo $camas_hospital_grid->c_especial->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_grid->c_especial->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="x<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="camas_hospital" data-field="x_c_especial" name="o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" id="o<?php echo $camas_hospital_grid->RowIndex ?>_c_especial" value="<?php echo HtmlEncode($camas_hospital_grid->c_especial->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$camas_hospital_grid->ListOptions->render("body", "right", $camas_hospital_grid->RowIndex);
?>
<script>
loadjs.ready(["fcamas_hospitalgrid", "load"], function() {
	fcamas_hospitalgrid.updateLists(<?php echo $camas_hospital_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($camas_hospital->CurrentMode == "add" || $camas_hospital->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $camas_hospital_grid->FormKeyCountName ?>" id="<?php echo $camas_hospital_grid->FormKeyCountName ?>" value="<?php echo $camas_hospital_grid->KeyCount ?>">
<?php echo $camas_hospital_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($camas_hospital->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $camas_hospital_grid->FormKeyCountName ?>" id="<?php echo $camas_hospital_grid->FormKeyCountName ?>" value="<?php echo $camas_hospital_grid->KeyCount ?>">
<?php echo $camas_hospital_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($camas_hospital->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fcamas_hospitalgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($camas_hospital_grid->Recordset)
	$camas_hospital_grid->Recordset->Close();
?>
<?php if ($camas_hospital_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $camas_hospital_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($camas_hospital_grid->TotalRecords == 0 && !$camas_hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $camas_hospital_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$camas_hospital_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$camas_hospital_grid->terminate();
?>