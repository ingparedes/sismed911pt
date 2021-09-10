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
$interh_reporte_summary = new interh_reporte_summary();

// Run the page
$interh_reporte_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_reporte_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$interh_reporte_summary->isExport() && !$interh_reporte_summary->DrillDown && !$DashboardReport) { ?>
<script>
var fsummary, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	fsummary = currentForm = new ew.Form("fsummary", "summary");
	currentPageID = ew.PAGE_ID = "summary";

	// Validate function for search
	fsummary.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_fechahorainterh");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($interh_reporte_summary->fechahorainterh->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fsummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsummary.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fsummary.filterList = <?php echo $interh_reporte_summary->getFilterList() ?>;
	loadjs.done("fsummary");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<?php if ($interh_reporte_summary->ShowCurrentFilter) { ?>
<?php $interh_reporte_summary->showFilterList() ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$interh_reporte_summary->DrillDownInPanel) {
	$interh_reporte_summary->ExportOptions->render("body");
	$interh_reporte_summary->SearchOptions->render("body");
	$interh_reporte_summary->FilterOptions->render("body");
}
?>
</div>
<?php $interh_reporte_summary->showPageHeader(); ?>
<?php
$interh_reporte_summary->showMessage();
?>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $interh_reporte_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$interh_reporte_summary->isExport() && !$interh_reporte_summary->DrillDown && !$DashboardReport) { ?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_reporte_summary->isExport() && !$interh_reporte->CurrentAction) { ?>
<form name="fsummary" id="fsummary" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsummary-search-panel" class="<?php echo $interh_reporte_summary->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_reporte">
	<div class="ew-extended-search">
<?php

// Render search row
$interh_reporte->RowType = ROWTYPE_SEARCH;
$interh_reporte->resetAttributes();
$interh_reporte_summary->renderRow();
?>
<?php if ($interh_reporte_summary->fechahorainterh->Visible) { // fechahorainterh ?>
	<?php
		$interh_reporte_summary->SearchColumnCount++;
		if (($interh_reporte_summary->SearchColumnCount - 1) % $interh_reporte_summary->SearchFieldsPerRow == 0) {
			$interh_reporte_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $interh_reporte_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_fechahorainterh" class="ew-cell form-group">
		<label for="x_fechahorainterh" class="ew-search-caption ew-label"><?php echo $interh_reporte_summary->fechahorainterh->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_fechahorainterh" id="z_fechahorainterh" value="BETWEEN">
</span>
		<span id="el_interh_reporte_fechahorainterh" class="ew-search-field">
<input type="text" data-table="interh_reporte" data-field="x_fechahorainterh" name="x_fechahorainterh" id="x_fechahorainterh" maxlength="8" placeholder="<?php echo HtmlEncode($interh_reporte_summary->fechahorainterh->getPlaceHolder()) ?>" value="<?php echo $interh_reporte_summary->fechahorainterh->EditValue ?>"<?php echo $interh_reporte_summary->fechahorainterh->editAttributes() ?>>
<?php if (!$interh_reporte_summary->fechahorainterh->ReadOnly && !$interh_reporte_summary->fechahorainterh->Disabled && !isset($interh_reporte_summary->fechahorainterh->EditAttrs["readonly"]) && !isset($interh_reporte_summary->fechahorainterh->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "x_fechahorainterh", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_interh_reporte_fechahorainterh" class="ew-search-field2">
<input type="text" data-table="interh_reporte" data-field="x_fechahorainterh" name="y_fechahorainterh" id="y_fechahorainterh" maxlength="8" placeholder="<?php echo HtmlEncode($interh_reporte_summary->fechahorainterh->getPlaceHolder()) ?>" value="<?php echo $interh_reporte_summary->fechahorainterh->EditValue2 ?>"<?php echo $interh_reporte_summary->fechahorainterh->editAttributes() ?>>
<?php if (!$interh_reporte_summary->fechahorainterh->ReadOnly && !$interh_reporte_summary->fechahorainterh->Disabled && !isset($interh_reporte_summary->fechahorainterh->EditAttrs["readonly"]) && !isset($interh_reporte_summary->fechahorainterh->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "y_fechahorainterh", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($interh_reporte_summary->SearchColumnCount % $interh_reporte_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($interh_reporte_summary->SearchColumnCount % $interh_reporte_summary->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $interh_reporte_summary->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
while ($interh_reporte_summary->RecordCount < count($interh_reporte_summary->DetailRecords) && $interh_reporte_summary->RecordCount < $interh_reporte_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($interh_reporte_summary->ShowHeader) {
?>
<div class="<?php if (!$interh_reporte_summary->isExport("word") && !$interh_reporte_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $interh_reporte_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_interh_reporte" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $interh_reporte_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($interh_reporte_summary->cod_casointerh->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->cod_casointerh) == "") { ?>
	<th data-name="cod_casointerh" class="<?php echo $interh_reporte_summary->cod_casointerh->headerCellClass() ?>"><div class="interh_reporte_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cod_casointerh" class="<?php echo $interh_reporte_summary->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->cod_casointerh) ?>', 1);"><div class="interh_reporte_cod_casointerh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->fechahorainterh->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->fechahorainterh) == "") { ?>
	<th data-name="fechahorainterh" class="<?php echo $interh_reporte_summary->fechahorainterh->headerCellClass() ?>"><div class="interh_reporte_fechahorainterh"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->fechahorainterh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="fechahorainterh" class="<?php echo $interh_reporte_summary->fechahorainterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->fechahorainterh) ?>', 1);"><div class="interh_reporte_fechahorainterh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->fechahorainterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->fechahorainterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->fechahorainterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->hospitalorigen->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->hospitalorigen) == "") { ?>
	<th data-name="hospitalorigen" class="<?php echo $interh_reporte_summary->hospitalorigen->headerCellClass() ?>"><div class="interh_reporte_hospitalorigen"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->hospitalorigen->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="hospitalorigen" class="<?php echo $interh_reporte_summary->hospitalorigen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->hospitalorigen) ?>', 1);"><div class="interh_reporte_hospitalorigen">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->hospitalorigen->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->hospitalorigen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->hospitalorigen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->cierreinterh->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->cierreinterh) == "") { ?>
	<th data-name="cierreinterh" class="<?php echo $interh_reporte_summary->cierreinterh->headerCellClass() ?>"><div class="interh_reporte_cierreinterh"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->cierreinterh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cierreinterh" class="<?php echo $interh_reporte_summary->cierreinterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->cierreinterh) ?>', 1);"><div class="interh_reporte_cierreinterh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->cierreinterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->cierreinterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->cierreinterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->nombre_prioridad->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->nombre_prioridad) == "") { ?>
	<th data-name="nombre_prioridad" class="<?php echo $interh_reporte_summary->nombre_prioridad->headerCellClass() ?>"><div class="interh_reporte_nombre_prioridad"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->nombre_prioridad->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_prioridad" class="<?php echo $interh_reporte_summary->nombre_prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->nombre_prioridad) ?>', 1);"><div class="interh_reporte_nombre_prioridad">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->nombre_prioridad->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->nombre_prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->nombre_prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->nombre_motivo_es->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->nombre_motivo_es) == "") { ?>
	<th data-name="nombre_motivo_es" class="<?php echo $interh_reporte_summary->nombre_motivo_es->headerCellClass() ?>"><div class="interh_reporte_nombre_motivo_es"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->nombre_motivo_es->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_motivo_es" class="<?php echo $interh_reporte_summary->nombre_motivo_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->nombre_motivo_es) ?>', 1);"><div class="interh_reporte_nombre_motivo_es">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->nombre_motivo_es->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->nombre_motivo_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->nombre_motivo_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->nombre_tiposervicion_es->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->nombre_tiposervicion_es) == "") { ?>
	<th data-name="nombre_tiposervicion_es" class="<?php echo $interh_reporte_summary->nombre_tiposervicion_es->headerCellClass() ?>"><div class="interh_reporte_nombre_tiposervicion_es"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->nombre_tiposervicion_es->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_tiposervicion_es" class="<?php echo $interh_reporte_summary->nombre_tiposervicion_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->nombre_tiposervicion_es) ?>', 1);"><div class="interh_reporte_nombre_tiposervicion_es">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->nombre_tiposervicion_es->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->nombre_tiposervicion_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->nombre_tiposervicion_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_reporte_summary->fecha->Visible) { ?>
	<?php if ($interh_reporte_summary->sortUrl($interh_reporte_summary->fecha) == "") { ?>
	<th data-name="fecha" class="<?php echo $interh_reporte_summary->fecha->headerCellClass() ?>"><div class="interh_reporte_fecha"><div class="ew-table-header-caption"><?php echo $interh_reporte_summary->fecha->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="fecha" class="<?php echo $interh_reporte_summary->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_reporte_summary->sortUrl($interh_reporte_summary->fecha) ?>', 1);"><div class="interh_reporte_fecha">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_reporte_summary->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_reporte_summary->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_reporte_summary->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($interh_reporte_summary->TotalGroups == 0)
			break; // Show header only
		$interh_reporte_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$interh_reporte_summary->loadRowValues($interh_reporte_summary->DetailRecords[$interh_reporte_summary->RecordCount]);
	$interh_reporte_summary->RecordCount++;
	$interh_reporte_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$interh_reporte_summary->resetAttributes();
		$interh_reporte_summary->RowType = ROWTYPE_DETAIL;
		$interh_reporte_summary->renderRow();
?>
	<tr<?php echo $interh_reporte_summary->rowAttributes(); ?>>
<?php if ($interh_reporte_summary->cod_casointerh->Visible) { ?>
		<td data-field="cod_casointerh"<?php echo $interh_reporte_summary->cod_casointerh->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->cod_casointerh->viewAttributes() ?>><?php echo $interh_reporte_summary->cod_casointerh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->fechahorainterh->Visible) { ?>
		<td data-field="fechahorainterh"<?php echo $interh_reporte_summary->fechahorainterh->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->fechahorainterh->viewAttributes() ?>><?php echo $interh_reporte_summary->fechahorainterh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->hospitalorigen->Visible) { ?>
		<td data-field="hospitalorigen"<?php echo $interh_reporte_summary->hospitalorigen->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->hospitalorigen->viewAttributes() ?>><?php echo $interh_reporte_summary->hospitalorigen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->cierreinterh->Visible) { ?>
		<td data-field="cierreinterh"<?php echo $interh_reporte_summary->cierreinterh->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->cierreinterh->viewAttributes() ?>><?php echo $interh_reporte_summary->cierreinterh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->nombre_prioridad->Visible) { ?>
		<td data-field="nombre_prioridad"<?php echo $interh_reporte_summary->nombre_prioridad->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->nombre_prioridad->viewAttributes() ?>><?php echo $interh_reporte_summary->nombre_prioridad->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->nombre_motivo_es->Visible) { ?>
		<td data-field="nombre_motivo_es"<?php echo $interh_reporte_summary->nombre_motivo_es->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->nombre_motivo_es->viewAttributes() ?>><?php echo $interh_reporte_summary->nombre_motivo_es->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->nombre_tiposervicion_es->Visible) { ?>
		<td data-field="nombre_tiposervicion_es"<?php echo $interh_reporte_summary->nombre_tiposervicion_es->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->nombre_tiposervicion_es->viewAttributes() ?>><?php echo $interh_reporte_summary->nombre_tiposervicion_es->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_reporte_summary->fecha->Visible) { ?>
		<td data-field="fecha"<?php echo $interh_reporte_summary->fecha->cellAttributes() ?>>
<span<?php echo $interh_reporte_summary->fecha->viewAttributes() ?>><?php echo $interh_reporte_summary->fecha->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($interh_reporte_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$interh_reporte_summary->resetAttributes();
	$interh_reporte_summary->RowType = ROWTYPE_TOTAL;
	$interh_reporte_summary->RowTotalType = ROWTOTAL_GRAND;
	$interh_reporte_summary->RowTotalSubType = ROWTOTAL_FOOTER;
	$interh_reporte_summary->RowAttrs["class"] = "ew-rpt-grand-summary";
	$interh_reporte_summary->renderRow();
?>
<?php if ($interh_reporte_summary->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $interh_reporte_summary->rowAttributes() ?>><td colspan="<?php echo ($interh_reporte_summary->GroupColumnCount + $interh_reporte_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($interh_reporte_summary->TotalCount, 0); ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $interh_reporte_summary->rowAttributes() ?>><td colspan="<?php echo ($interh_reporte_summary->GroupColumnCount + $interh_reporte_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($interh_reporte_summary->TotalCount, 0); ?><?php echo $Language->phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$interh_reporte_summary->isExport() && !($interh_reporte_summary->DrillDown && $interh_reporte_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_reporte_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Bottom Container -->
<div class="row">
	<div id="ew-bottom" class="<?php echo $interh_reporte_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($interh_reporte_summary->isExport("print") || $interh_reporte_summary->isExport("pdf") || $interh_reporte_summary->isExport("email") || $interh_reporte_summary->isExport("excel") && Config("USE_PHPEXCEL") || $interh_reporte_summary->isExport("word") && Config("USE_PHPWORD")) && $interh_reporte_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$interh_reporte_summary->Page_Breaking($interh_reporte_summary->ExportChartPageBreak, $interh_reporte_summary->PageBreakContent);
		$interh_reporte->motivo_de_remision->PageBreakType = "before"; // Page break type
		$interh_reporte->motivo_de_remision->PageBreak = $interh_reporte_summary->ExportChartPageBreak;
		$interh_reporte->motivo_de_remision->PageBreakContent = $interh_reporte_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$interh_reporte->motivo_de_remision->DrillDownInPanel = $interh_reporte_summary->DrillDownInPanel;
	$interh_reporte->motivo_de_remision->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$interh_reporte_summary->isExport("email") && !$interh_reporte_summary->DrillDown && $interh_reporte->motivo_de_remision->hasData()) { ?>
<?php if (!$interh_reporte_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
	</div>
</div>
<!-- /#ew-bottom -->
<?php } ?>
<?php if ((!$interh_reporte_summary->isExport() || $interh_reporte_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$interh_reporte_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_reporte_summary->isExport() && !$interh_reporte_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$interh_reporte_summary->terminate();
?>