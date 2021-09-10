<?php
namespace PHPMaker2020\sismed911;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($mante_amb_grid))
	$mante_amb_grid = new mante_amb_grid();

// Run the page
$mante_amb_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mante_amb_grid->Page_Render();
?>
<?php if (!$mante_amb_grid->isExport()) { ?>
<script>
var fmante_ambgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fmante_ambgrid = new ew.Form("fmante_ambgrid", "grid");
	fmante_ambgrid.formKeyCountName = '<?php echo $mante_amb_grid->FormKeyCountName ?>';

	// Validate form
	fmante_ambgrid.validate = function() {
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
			<?php if ($mante_amb_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_grid->id->caption(), $mante_amb_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mante_amb_grid->id_ambulancias->Required) { ?>
				elm = this.getElements("x" + infix + "_id_ambulancias");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_grid->id_ambulancias->caption(), $mante_amb_grid->id_ambulancias->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_ambulancias");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mante_amb_grid->id_ambulancias->errorMessage()) ?>");
			<?php if ($mante_amb_grid->fecha_inicio->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_inicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_grid->fecha_inicio->caption(), $mante_amb_grid->fecha_inicio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_inicio");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mante_amb_grid->fecha_inicio->errorMessage()) ?>");
			<?php if ($mante_amb_grid->fecha_fin->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_fin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_grid->fecha_fin->caption(), $mante_amb_grid->fecha_fin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_fin");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mante_amb_grid->fecha_fin->errorMessage()) ?>");
			<?php if ($mante_amb_grid->taller->Required) { ?>
				elm = this.getElements("x" + infix + "_taller");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_grid->taller->caption(), $mante_amb_grid->taller->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fmante_ambgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "id_ambulancias", false)) return false;
		if (ew.valueChanged(fobj, infix, "fecha_inicio", false)) return false;
		if (ew.valueChanged(fobj, infix, "fecha_fin", false)) return false;
		if (ew.valueChanged(fobj, infix, "taller", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fmante_ambgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmante_ambgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmante_ambgrid.lists["x_taller"] = <?php echo $mante_amb_grid->taller->Lookup->toClientList($mante_amb_grid) ?>;
	fmante_ambgrid.lists["x_taller"].options = <?php echo JsonEncode($mante_amb_grid->taller->lookupOptions()) ?>;
	loadjs.done("fmante_ambgrid");
});
</script>
<?php } ?>
<?php
$mante_amb_grid->renderOtherOptions();
?>
<?php if ($mante_amb_grid->TotalRecords > 0 || $mante_amb->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mante_amb_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mante_amb">
<?php if ($mante_amb_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $mante_amb_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fmante_ambgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_mante_amb" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_mante_ambgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mante_amb->RowType = ROWTYPE_HEADER;

// Render list options
$mante_amb_grid->renderListOptions();

// Render list options (header, left)
$mante_amb_grid->ListOptions->render("header", "left");
?>
<?php if ($mante_amb_grid->id->Visible) { // id ?>
	<?php if ($mante_amb_grid->SortUrl($mante_amb_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $mante_amb_grid->id->headerCellClass() ?>"><div id="elh_mante_amb_id" class="mante_amb_id"><div class="ew-table-header-caption"><?php echo $mante_amb_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mante_amb_grid->id->headerCellClass() ?>"><div><div id="elh_mante_amb_id" class="mante_amb_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_grid->id_ambulancias->Visible) { // id_ambulancias ?>
	<?php if ($mante_amb_grid->SortUrl($mante_amb_grid->id_ambulancias) == "") { ?>
		<th data-name="id_ambulancias" class="<?php echo $mante_amb_grid->id_ambulancias->headerCellClass() ?>"><div id="elh_mante_amb_id_ambulancias" class="mante_amb_id_ambulancias"><div class="ew-table-header-caption"><?php echo $mante_amb_grid->id_ambulancias->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_ambulancias" class="<?php echo $mante_amb_grid->id_ambulancias->headerCellClass() ?>"><div><div id="elh_mante_amb_id_ambulancias" class="mante_amb_id_ambulancias">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_grid->id_ambulancias->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_grid->id_ambulancias->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_grid->id_ambulancias->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_grid->fecha_inicio->Visible) { // fecha_inicio ?>
	<?php if ($mante_amb_grid->SortUrl($mante_amb_grid->fecha_inicio) == "") { ?>
		<th data-name="fecha_inicio" class="<?php echo $mante_amb_grid->fecha_inicio->headerCellClass() ?>"><div id="elh_mante_amb_fecha_inicio" class="mante_amb_fecha_inicio"><div class="ew-table-header-caption"><?php echo $mante_amb_grid->fecha_inicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_inicio" class="<?php echo $mante_amb_grid->fecha_inicio->headerCellClass() ?>"><div><div id="elh_mante_amb_fecha_inicio" class="mante_amb_fecha_inicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_grid->fecha_inicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_grid->fecha_inicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_grid->fecha_inicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_grid->fecha_fin->Visible) { // fecha_fin ?>
	<?php if ($mante_amb_grid->SortUrl($mante_amb_grid->fecha_fin) == "") { ?>
		<th data-name="fecha_fin" class="<?php echo $mante_amb_grid->fecha_fin->headerCellClass() ?>"><div id="elh_mante_amb_fecha_fin" class="mante_amb_fecha_fin"><div class="ew-table-header-caption"><?php echo $mante_amb_grid->fecha_fin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_fin" class="<?php echo $mante_amb_grid->fecha_fin->headerCellClass() ?>"><div><div id="elh_mante_amb_fecha_fin" class="mante_amb_fecha_fin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_grid->fecha_fin->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_grid->fecha_fin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_grid->fecha_fin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mante_amb_grid->taller->Visible) { // taller ?>
	<?php if ($mante_amb_grid->SortUrl($mante_amb_grid->taller) == "") { ?>
		<th data-name="taller" class="<?php echo $mante_amb_grid->taller->headerCellClass() ?>"><div id="elh_mante_amb_taller" class="mante_amb_taller"><div class="ew-table-header-caption"><?php echo $mante_amb_grid->taller->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="taller" class="<?php echo $mante_amb_grid->taller->headerCellClass() ?>"><div><div id="elh_mante_amb_taller" class="mante_amb_taller">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mante_amb_grid->taller->caption() ?></span><span class="ew-table-header-sort"><?php if ($mante_amb_grid->taller->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mante_amb_grid->taller->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mante_amb_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$mante_amb_grid->StartRecord = 1;
$mante_amb_grid->StopRecord = $mante_amb_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($mante_amb->isConfirm() || $mante_amb_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($mante_amb_grid->FormKeyCountName) && ($mante_amb_grid->isGridAdd() || $mante_amb_grid->isGridEdit() || $mante_amb->isConfirm())) {
		$mante_amb_grid->KeyCount = $CurrentForm->getValue($mante_amb_grid->FormKeyCountName);
		$mante_amb_grid->StopRecord = $mante_amb_grid->StartRecord + $mante_amb_grid->KeyCount - 1;
	}
}
$mante_amb_grid->RecordCount = $mante_amb_grid->StartRecord - 1;
if ($mante_amb_grid->Recordset && !$mante_amb_grid->Recordset->EOF) {
	$mante_amb_grid->Recordset->moveFirst();
	$selectLimit = $mante_amb_grid->UseSelectLimit;
	if (!$selectLimit && $mante_amb_grid->StartRecord > 1)
		$mante_amb_grid->Recordset->move($mante_amb_grid->StartRecord - 1);
} elseif (!$mante_amb->AllowAddDeleteRow && $mante_amb_grid->StopRecord == 0) {
	$mante_amb_grid->StopRecord = $mante_amb->GridAddRowCount;
}

// Initialize aggregate
$mante_amb->RowType = ROWTYPE_AGGREGATEINIT;
$mante_amb->resetAttributes();
$mante_amb_grid->renderRow();
if ($mante_amb_grid->isGridAdd())
	$mante_amb_grid->RowIndex = 0;
if ($mante_amb_grid->isGridEdit())
	$mante_amb_grid->RowIndex = 0;
while ($mante_amb_grid->RecordCount < $mante_amb_grid->StopRecord) {
	$mante_amb_grid->RecordCount++;
	if ($mante_amb_grid->RecordCount >= $mante_amb_grid->StartRecord) {
		$mante_amb_grid->RowCount++;
		if ($mante_amb_grid->isGridAdd() || $mante_amb_grid->isGridEdit() || $mante_amb->isConfirm()) {
			$mante_amb_grid->RowIndex++;
			$CurrentForm->Index = $mante_amb_grid->RowIndex;
			if ($CurrentForm->hasValue($mante_amb_grid->FormActionName) && ($mante_amb->isConfirm() || $mante_amb_grid->EventCancelled))
				$mante_amb_grid->RowAction = strval($CurrentForm->getValue($mante_amb_grid->FormActionName));
			elseif ($mante_amb_grid->isGridAdd())
				$mante_amb_grid->RowAction = "insert";
			else
				$mante_amb_grid->RowAction = "";
		}

		// Set up key count
		$mante_amb_grid->KeyCount = $mante_amb_grid->RowIndex;

		// Init row class and style
		$mante_amb->resetAttributes();
		$mante_amb->CssClass = "";
		if ($mante_amb_grid->isGridAdd()) {
			if ($mante_amb->CurrentMode == "copy") {
				$mante_amb_grid->loadRowValues($mante_amb_grid->Recordset); // Load row values
				$mante_amb_grid->setRecordKey($mante_amb_grid->RowOldKey, $mante_amb_grid->Recordset); // Set old record key
			} else {
				$mante_amb_grid->loadRowValues(); // Load default values
				$mante_amb_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$mante_amb_grid->loadRowValues($mante_amb_grid->Recordset); // Load row values
		}
		$mante_amb->RowType = ROWTYPE_VIEW; // Render view
		if ($mante_amb_grid->isGridAdd()) // Grid add
			$mante_amb->RowType = ROWTYPE_ADD; // Render add
		if ($mante_amb_grid->isGridAdd() && $mante_amb->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$mante_amb_grid->restoreCurrentRowFormValues($mante_amb_grid->RowIndex); // Restore form values
		if ($mante_amb_grid->isGridEdit()) { // Grid edit
			if ($mante_amb->EventCancelled)
				$mante_amb_grid->restoreCurrentRowFormValues($mante_amb_grid->RowIndex); // Restore form values
			if ($mante_amb_grid->RowAction == "insert")
				$mante_amb->RowType = ROWTYPE_ADD; // Render add
			else
				$mante_amb->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($mante_amb_grid->isGridEdit() && ($mante_amb->RowType == ROWTYPE_EDIT || $mante_amb->RowType == ROWTYPE_ADD) && $mante_amb->EventCancelled) // Update failed
			$mante_amb_grid->restoreCurrentRowFormValues($mante_amb_grid->RowIndex); // Restore form values
		if ($mante_amb->RowType == ROWTYPE_EDIT) // Edit row
			$mante_amb_grid->EditRowCount++;
		if ($mante_amb->isConfirm()) // Confirm row
			$mante_amb_grid->restoreCurrentRowFormValues($mante_amb_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$mante_amb->RowAttrs->merge(["data-rowindex" => $mante_amb_grid->RowCount, "id" => "r" . $mante_amb_grid->RowCount . "_mante_amb", "data-rowtype" => $mante_amb->RowType]);

		// Render row
		$mante_amb_grid->renderRow();

		// Render list options
		$mante_amb_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($mante_amb_grid->RowAction != "delete" && $mante_amb_grid->RowAction != "insertdelete" && !($mante_amb_grid->RowAction == "insert" && $mante_amb->isConfirm() && $mante_amb_grid->emptyRow())) {
?>
	<tr <?php echo $mante_amb->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mante_amb_grid->ListOptions->render("body", "left", $mante_amb_grid->RowCount);
?>
	<?php if ($mante_amb_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mante_amb_grid->id->cellAttributes() ?>>
<?php if ($mante_amb->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id" class="form-group"></span>
<input type="hidden" data-table="mante_amb" data-field="x_id" name="o<?php echo $mante_amb_grid->RowIndex ?>_id" id="o<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id" class="form-group">
<span<?php echo $mante_amb_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_id" name="x<?php echo $mante_amb_grid->RowIndex ?>_id" id="x<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id">
<span<?php echo $mante_amb_grid->id->viewAttributes() ?>><?php echo $mante_amb_grid->id->getViewValue() ?></span>
</span>
<?php if (!$mante_amb->isConfirm()) { ?>
<input type="hidden" data-table="mante_amb" data-field="x_id" name="x<?php echo $mante_amb_grid->RowIndex ?>_id" id="x<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_id" name="o<?php echo $mante_amb_grid->RowIndex ?>_id" id="o<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="mante_amb" data-field="x_id" name="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_id" id="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_id" name="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_id" id="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->id_ambulancias->Visible) { // id_ambulancias ?>
		<td data-name="id_ambulancias" <?php echo $mante_amb_grid->id_ambulancias->cellAttributes() ?>>
<?php if ($mante_amb->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($mante_amb_grid->id_ambulancias->getSessionValue() != "") { ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id_ambulancias" class="form-group">
<span<?php echo $mante_amb_grid->id_ambulancias->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->id_ambulancias->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id_ambulancias" class="form-group">
<input type="text" data-table="mante_amb" data-field="x_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->id_ambulancias->EditValue ?>"<?php echo $mante_amb_grid->id_ambulancias->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->OldValue) ?>">
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($mante_amb_grid->id_ambulancias->getSessionValue() != "") { ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id_ambulancias" class="form-group">
<span<?php echo $mante_amb_grid->id_ambulancias->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->id_ambulancias->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id_ambulancias" class="form-group">
<input type="text" data-table="mante_amb" data-field="x_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->id_ambulancias->EditValue ?>"<?php echo $mante_amb_grid->id_ambulancias->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_id_ambulancias">
<span<?php echo $mante_amb_grid->id_ambulancias->viewAttributes() ?>><?php echo $mante_amb_grid->id_ambulancias->getViewValue() ?></span>
</span>
<?php if (!$mante_amb->isConfirm()) { ?>
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->fecha_inicio->Visible) { // fecha_inicio ?>
		<td data-name="fecha_inicio" <?php echo $mante_amb_grid->fecha_inicio->cellAttributes() ?>>
<?php if ($mante_amb->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_fecha_inicio" class="form-group">
<input type="text" data-table="mante_amb" data-field="x_fecha_inicio" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->fecha_inicio->EditValue ?>"<?php echo $mante_amb_grid->fecha_inicio->editAttributes() ?>>
<?php if (!$mante_amb_grid->fecha_inicio->ReadOnly && !$mante_amb_grid->fecha_inicio->Disabled && !isset($mante_amb_grid->fecha_inicio->EditAttrs["readonly"]) && !isset($mante_amb_grid->fecha_inicio->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambgrid", "x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->OldValue) ?>">
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_fecha_inicio" class="form-group">
<input type="text" data-table="mante_amb" data-field="x_fecha_inicio" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->fecha_inicio->EditValue ?>"<?php echo $mante_amb_grid->fecha_inicio->editAttributes() ?>>
<?php if (!$mante_amb_grid->fecha_inicio->ReadOnly && !$mante_amb_grid->fecha_inicio->Disabled && !isset($mante_amb_grid->fecha_inicio->EditAttrs["readonly"]) && !isset($mante_amb_grid->fecha_inicio->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambgrid", "x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_fecha_inicio">
<span<?php echo $mante_amb_grid->fecha_inicio->viewAttributes() ?>><?php echo $mante_amb_grid->fecha_inicio->getViewValue() ?></span>
</span>
<?php if (!$mante_amb->isConfirm()) { ?>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->fecha_fin->Visible) { // fecha_fin ?>
		<td data-name="fecha_fin" <?php echo $mante_amb_grid->fecha_fin->cellAttributes() ?>>
<?php if ($mante_amb->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_fecha_fin" class="form-group">
<input type="text" data-table="mante_amb" data-field="x_fecha_fin" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->fecha_fin->EditValue ?>"<?php echo $mante_amb_grid->fecha_fin->editAttributes() ?>>
<?php if (!$mante_amb_grid->fecha_fin->ReadOnly && !$mante_amb_grid->fecha_fin->Disabled && !isset($mante_amb_grid->fecha_fin->EditAttrs["readonly"]) && !isset($mante_amb_grid->fecha_fin->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambgrid", "x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->OldValue) ?>">
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_fecha_fin" class="form-group">
<input type="text" data-table="mante_amb" data-field="x_fecha_fin" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->fecha_fin->EditValue ?>"<?php echo $mante_amb_grid->fecha_fin->editAttributes() ?>>
<?php if (!$mante_amb_grid->fecha_fin->ReadOnly && !$mante_amb_grid->fecha_fin->Disabled && !isset($mante_amb_grid->fecha_fin->EditAttrs["readonly"]) && !isset($mante_amb_grid->fecha_fin->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambgrid", "x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_fecha_fin">
<span<?php echo $mante_amb_grid->fecha_fin->viewAttributes() ?>><?php echo $mante_amb_grid->fecha_fin->getViewValue() ?></span>
</span>
<?php if (!$mante_amb->isConfirm()) { ?>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->taller->Visible) { // taller ?>
		<td data-name="taller" <?php echo $mante_amb_grid->taller->cellAttributes() ?>>
<?php if ($mante_amb->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_taller" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mante_amb" data-field="x_taller" data-value-separator="<?php echo $mante_amb_grid->taller->displayValueSeparatorAttribute() ?>" id="x<?php echo $mante_amb_grid->RowIndex ?>_taller" name="x<?php echo $mante_amb_grid->RowIndex ?>_taller"<?php echo $mante_amb_grid->taller->editAttributes() ?>>
			<?php echo $mante_amb_grid->taller->selectOptionListHtml("x{$mante_amb_grid->RowIndex}_taller") ?>
		</select>
</div>
<?php echo $mante_amb_grid->taller->Lookup->getParamTag($mante_amb_grid, "p_x" . $mante_amb_grid->RowIndex . "_taller") ?>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="o<?php echo $mante_amb_grid->RowIndex ?>_taller" id="o<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->OldValue) ?>">
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_taller" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mante_amb" data-field="x_taller" data-value-separator="<?php echo $mante_amb_grid->taller->displayValueSeparatorAttribute() ?>" id="x<?php echo $mante_amb_grid->RowIndex ?>_taller" name="x<?php echo $mante_amb_grid->RowIndex ?>_taller"<?php echo $mante_amb_grid->taller->editAttributes() ?>>
			<?php echo $mante_amb_grid->taller->selectOptionListHtml("x{$mante_amb_grid->RowIndex}_taller") ?>
		</select>
</div>
<?php echo $mante_amb_grid->taller->Lookup->getParamTag($mante_amb_grid, "p_x" . $mante_amb_grid->RowIndex . "_taller") ?>
</span>
<?php } ?>
<?php if ($mante_amb->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mante_amb_grid->RowCount ?>_mante_amb_taller">
<span<?php echo $mante_amb_grid->taller->viewAttributes() ?>><?php echo $mante_amb_grid->taller->getViewValue() ?></span>
</span>
<?php if (!$mante_amb->isConfirm()) { ?>
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="x<?php echo $mante_amb_grid->RowIndex ?>_taller" id="x<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="o<?php echo $mante_amb_grid->RowIndex ?>_taller" id="o<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_taller" id="fmante_ambgrid$x<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->FormValue) ?>">
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_taller" id="fmante_ambgrid$o<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mante_amb_grid->ListOptions->render("body", "right", $mante_amb_grid->RowCount);
?>
	</tr>
<?php if ($mante_amb->RowType == ROWTYPE_ADD || $mante_amb->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "load"], function() {
	fmante_ambgrid.updateLists(<?php echo $mante_amb_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$mante_amb_grid->isGridAdd() || $mante_amb->CurrentMode == "copy")
		if (!$mante_amb_grid->Recordset->EOF)
			$mante_amb_grid->Recordset->moveNext();
}
?>
<?php
	if ($mante_amb->CurrentMode == "add" || $mante_amb->CurrentMode == "copy" || $mante_amb->CurrentMode == "edit") {
		$mante_amb_grid->RowIndex = '$rowindex$';
		$mante_amb_grid->loadRowValues();

		// Set row properties
		$mante_amb->resetAttributes();
		$mante_amb->RowAttrs->merge(["data-rowindex" => $mante_amb_grid->RowIndex, "id" => "r0_mante_amb", "data-rowtype" => ROWTYPE_ADD]);
		$mante_amb->RowAttrs->appendClass("ew-template");
		$mante_amb->RowType = ROWTYPE_ADD;

		// Render row
		$mante_amb_grid->renderRow();

		// Render list options
		$mante_amb_grid->renderListOptions();
		$mante_amb_grid->StartRowCount = 0;
?>
	<tr <?php echo $mante_amb->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mante_amb_grid->ListOptions->render("body", "left", $mante_amb_grid->RowIndex);
?>
	<?php if ($mante_amb_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$mante_amb->isConfirm()) { ?>
<span id="el$rowindex$_mante_amb_id" class="form-group mante_amb_id"></span>
<?php } else { ?>
<span id="el$rowindex$_mante_amb_id" class="form-group mante_amb_id">
<span<?php echo $mante_amb_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_id" name="x<?php echo $mante_amb_grid->RowIndex ?>_id" id="x<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="mante_amb" data-field="x_id" name="o<?php echo $mante_amb_grid->RowIndex ?>_id" id="o<?php echo $mante_amb_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($mante_amb_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->id_ambulancias->Visible) { // id_ambulancias ?>
		<td data-name="id_ambulancias">
<?php if (!$mante_amb->isConfirm()) { ?>
<?php if ($mante_amb_grid->id_ambulancias->getSessionValue() != "") { ?>
<span id="el$rowindex$_mante_amb_id_ambulancias" class="form-group mante_amb_id_ambulancias">
<span<?php echo $mante_amb_grid->id_ambulancias->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->id_ambulancias->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_mante_amb_id_ambulancias" class="form-group mante_amb_id_ambulancias">
<input type="text" data-table="mante_amb" data-field="x_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->id_ambulancias->EditValue ?>"<?php echo $mante_amb_grid->id_ambulancias->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_mante_amb_id_ambulancias" class="form-group mante_amb_id_ambulancias">
<span<?php echo $mante_amb_grid->id_ambulancias->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->id_ambulancias->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="x<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="mante_amb" data-field="x_id_ambulancias" name="o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" id="o<?php echo $mante_amb_grid->RowIndex ?>_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_grid->id_ambulancias->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->fecha_inicio->Visible) { // fecha_inicio ?>
		<td data-name="fecha_inicio">
<?php if (!$mante_amb->isConfirm()) { ?>
<span id="el$rowindex$_mante_amb_fecha_inicio" class="form-group mante_amb_fecha_inicio">
<input type="text" data-table="mante_amb" data-field="x_fecha_inicio" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->fecha_inicio->EditValue ?>"<?php echo $mante_amb_grid->fecha_inicio->editAttributes() ?>>
<?php if (!$mante_amb_grid->fecha_inicio->ReadOnly && !$mante_amb_grid->fecha_inicio->Disabled && !isset($mante_amb_grid->fecha_inicio->EditAttrs["readonly"]) && !isset($mante_amb_grid->fecha_inicio->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambgrid", "x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_mante_amb_fecha_inicio" class="form-group mante_amb_fecha_inicio">
<span<?php echo $mante_amb_grid->fecha_inicio->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->fecha_inicio->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_inicio" name="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" id="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_inicio" value="<?php echo HtmlEncode($mante_amb_grid->fecha_inicio->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->fecha_fin->Visible) { // fecha_fin ?>
		<td data-name="fecha_fin">
<?php if (!$mante_amb->isConfirm()) { ?>
<span id="el$rowindex$_mante_amb_fecha_fin" class="form-group mante_amb_fecha_fin">
<input type="text" data-table="mante_amb" data-field="x_fecha_fin" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->getPlaceHolder()) ?>" value="<?php echo $mante_amb_grid->fecha_fin->EditValue ?>"<?php echo $mante_amb_grid->fecha_fin->editAttributes() ?>>
<?php if (!$mante_amb_grid->fecha_fin->ReadOnly && !$mante_amb_grid->fecha_fin->Disabled && !isset($mante_amb_grid->fecha_fin->EditAttrs["readonly"]) && !isset($mante_amb_grid->fecha_fin->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambgrid", "x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_mante_amb_fecha_fin" class="form-group mante_amb_fecha_fin">
<span<?php echo $mante_amb_grid->fecha_fin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->fecha_fin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="x<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="mante_amb" data-field="x_fecha_fin" name="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" id="o<?php echo $mante_amb_grid->RowIndex ?>_fecha_fin" value="<?php echo HtmlEncode($mante_amb_grid->fecha_fin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mante_amb_grid->taller->Visible) { // taller ?>
		<td data-name="taller">
<?php if (!$mante_amb->isConfirm()) { ?>
<span id="el$rowindex$_mante_amb_taller" class="form-group mante_amb_taller">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mante_amb" data-field="x_taller" data-value-separator="<?php echo $mante_amb_grid->taller->displayValueSeparatorAttribute() ?>" id="x<?php echo $mante_amb_grid->RowIndex ?>_taller" name="x<?php echo $mante_amb_grid->RowIndex ?>_taller"<?php echo $mante_amb_grid->taller->editAttributes() ?>>
			<?php echo $mante_amb_grid->taller->selectOptionListHtml("x{$mante_amb_grid->RowIndex}_taller") ?>
		</select>
</div>
<?php echo $mante_amb_grid->taller->Lookup->getParamTag($mante_amb_grid, "p_x" . $mante_amb_grid->RowIndex . "_taller") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_mante_amb_taller" class="form-group mante_amb_taller">
<span<?php echo $mante_amb_grid->taller->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_grid->taller->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="x<?php echo $mante_amb_grid->RowIndex ?>_taller" id="x<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="mante_amb" data-field="x_taller" name="o<?php echo $mante_amb_grid->RowIndex ?>_taller" id="o<?php echo $mante_amb_grid->RowIndex ?>_taller" value="<?php echo HtmlEncode($mante_amb_grid->taller->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mante_amb_grid->ListOptions->render("body", "right", $mante_amb_grid->RowIndex);
?>
<script>
loadjs.ready(["fmante_ambgrid", "load"], function() {
	fmante_ambgrid.updateLists(<?php echo $mante_amb_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($mante_amb->CurrentMode == "add" || $mante_amb->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $mante_amb_grid->FormKeyCountName ?>" id="<?php echo $mante_amb_grid->FormKeyCountName ?>" value="<?php echo $mante_amb_grid->KeyCount ?>">
<?php echo $mante_amb_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($mante_amb->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $mante_amb_grid->FormKeyCountName ?>" id="<?php echo $mante_amb_grid->FormKeyCountName ?>" value="<?php echo $mante_amb_grid->KeyCount ?>">
<?php echo $mante_amb_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($mante_amb->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fmante_ambgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mante_amb_grid->Recordset)
	$mante_amb_grid->Recordset->Close();
?>
<?php if ($mante_amb_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $mante_amb_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mante_amb_grid->TotalRecords == 0 && !$mante_amb->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mante_amb_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$mante_amb_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$mante_amb_grid->terminate();
?>