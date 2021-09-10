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
$interh_hospitales_summary = new interh_hospitales_summary();

// Run the page
$interh_hospitales_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_hospitales_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$interh_hospitales_summary->isExport() && !$interh_hospitales_summary->DrillDown && !$DashboardReport) { ?>
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
		elm = this.getElements("x" + infix + "_fecha");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($interh_hospitales_summary->fecha->errorMessage()) ?>");

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

	fsummary.filterList = <?php echo $interh_hospitales_summary->getFilterList() ?>;
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
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<?php if ($interh_hospitales_summary->ShowCurrentFilter) { ?>
<?php $interh_hospitales_summary->showFilterList() ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$interh_hospitales_summary->DrillDownInPanel) {
	$interh_hospitales_summary->ExportOptions->render("body");
	$interh_hospitales_summary->SearchOptions->render("body");
	$interh_hospitales_summary->FilterOptions->render("body");
}
?>
</div>
<?php $interh_hospitales_summary->showPageHeader(); ?>
<?php
$interh_hospitales_summary->showMessage();
?>
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $interh_hospitales_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$interh_hospitales_summary->isExport() && !$interh_hospitales_summary->DrillDown && !$DashboardReport) { ?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$interh_hospitales_summary->isExport() && !$interh_hospitales->CurrentAction) { ?>
<form name="fsummary" id="fsummary" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsummary-search-panel" class="<?php echo $interh_hospitales_summary->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="interh_hospitales">
	<div class="ew-extended-search">
<?php

// Render search row
$interh_hospitales->RowType = ROWTYPE_SEARCH;
$interh_hospitales->resetAttributes();
$interh_hospitales_summary->renderRow();
?>
<?php if ($interh_hospitales_summary->fecha->Visible) { // fecha ?>
	<?php
		$interh_hospitales_summary->SearchColumnCount++;
		if (($interh_hospitales_summary->SearchColumnCount - 1) % $interh_hospitales_summary->SearchFieldsPerRow == 0) {
			$interh_hospitales_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $interh_hospitales_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_fecha" class="ew-cell form-group">
		<label for="x_fecha" class="ew-search-caption ew-label"><?php echo $interh_hospitales_summary->fecha->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_fecha" id="z_fecha" value="BETWEEN">
</span>
		<span id="el_interh_hospitales_fecha" class="ew-search-field">
<input type="text" data-table="interh_hospitales" data-field="x_fecha" name="x_fecha" id="x_fecha" maxlength="4" placeholder="<?php echo HtmlEncode($interh_hospitales_summary->fecha->getPlaceHolder()) ?>" value="<?php echo $interh_hospitales_summary->fecha->EditValue ?>"<?php echo $interh_hospitales_summary->fecha->editAttributes() ?>>
<?php if (!$interh_hospitales_summary->fecha->ReadOnly && !$interh_hospitales_summary->fecha->Disabled && !isset($interh_hospitales_summary->fecha->EditAttrs["readonly"]) && !isset($interh_hospitales_summary->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "x_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_interh_hospitales_fecha" class="ew-search-field2">
<input type="text" data-table="interh_hospitales" data-field="x_fecha" name="y_fecha" id="y_fecha" maxlength="4" placeholder="<?php echo HtmlEncode($interh_hospitales_summary->fecha->getPlaceHolder()) ?>" value="<?php echo $interh_hospitales_summary->fecha->EditValue2 ?>"<?php echo $interh_hospitales_summary->fecha->editAttributes() ?>>
<?php if (!$interh_hospitales_summary->fecha->ReadOnly && !$interh_hospitales_summary->fecha->Disabled && !isset($interh_hospitales_summary->fecha->EditAttrs["readonly"]) && !isset($interh_hospitales_summary->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "y_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($interh_hospitales_summary->SearchColumnCount % $interh_hospitales_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($interh_hospitales_summary->SearchColumnCount % $interh_hospitales_summary->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $interh_hospitales_summary->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
while ($interh_hospitales_summary->RecordCount < count($interh_hospitales_summary->DetailRecords) && $interh_hospitales_summary->RecordCount < $interh_hospitales_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($interh_hospitales_summary->ShowHeader) {
?>
<div class="<?php if (!$interh_hospitales_summary->isExport("word") && !$interh_hospitales_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $interh_hospitales_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_interh_hospitales" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $interh_hospitales_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($interh_hospitales_summary->cod_casointerh->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->cod_casointerh) == "") { ?>
	<th data-name="cod_casointerh" class="<?php echo $interh_hospitales_summary->cod_casointerh->headerCellClass() ?>"><div class="interh_hospitales_cod_casointerh"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cod_casointerh" class="<?php echo $interh_hospitales_summary->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->cod_casointerh) ?>', 1);"><div class="interh_hospitales_cod_casointerh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_hospitales_summary->fecha->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->fecha) == "") { ?>
	<th data-name="fecha" class="<?php echo $interh_hospitales_summary->fecha->headerCellClass() ?>"><div class="interh_hospitales_fecha"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->fecha->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="fecha" class="<?php echo $interh_hospitales_summary->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->fecha) ?>', 1);"><div class="interh_hospitales_fecha">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_hospitales_summary->hospitalorigen->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->hospitalorigen) == "") { ?>
	<th data-name="hospitalorigen" class="<?php echo $interh_hospitales_summary->hospitalorigen->headerCellClass() ?>"><div class="interh_hospitales_hospitalorigen"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->hospitalorigen->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="hospitalorigen" class="<?php echo $interh_hospitales_summary->hospitalorigen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->hospitalorigen) ?>', 1);"><div class="interh_hospitales_hospitalorigen">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->hospitalorigen->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->hospitalorigen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->hospitalorigen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_hospitales_summary->hospitaldestino->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->hospitaldestino) == "") { ?>
	<th data-name="hospitaldestino" class="<?php echo $interh_hospitales_summary->hospitaldestino->headerCellClass() ?>"><div class="interh_hospitales_hospitaldestino"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->hospitaldestino->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="hospitaldestino" class="<?php echo $interh_hospitales_summary->hospitaldestino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->hospitaldestino) ?>', 1);"><div class="interh_hospitales_hospitaldestino">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->hospitaldestino->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->hospitaldestino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->hospitaldestino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_hospitales_summary->nombre_prioridad->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->nombre_prioridad) == "") { ?>
	<th data-name="nombre_prioridad" class="<?php echo $interh_hospitales_summary->nombre_prioridad->headerCellClass() ?>"><div class="interh_hospitales_nombre_prioridad"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->nombre_prioridad->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_prioridad" class="<?php echo $interh_hospitales_summary->nombre_prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->nombre_prioridad) ?>', 1);"><div class="interh_hospitales_nombre_prioridad">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->nombre_prioridad->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->nombre_prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->nombre_prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_hospitales_summary->nombre_motivo_es->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->nombre_motivo_es) == "") { ?>
	<th data-name="nombre_motivo_es" class="<?php echo $interh_hospitales_summary->nombre_motivo_es->headerCellClass() ?>"><div class="interh_hospitales_nombre_motivo_es"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->nombre_motivo_es->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_motivo_es" class="<?php echo $interh_hospitales_summary->nombre_motivo_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->nombre_motivo_es) ?>', 1);"><div class="interh_hospitales_nombre_motivo_es">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->nombre_motivo_es->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->nombre_motivo_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->nombre_motivo_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($interh_hospitales_summary->nombre_tiposervicion_es->Visible) { ?>
	<?php if ($interh_hospitales_summary->sortUrl($interh_hospitales_summary->nombre_tiposervicion_es) == "") { ?>
	<th data-name="nombre_tiposervicion_es" class="<?php echo $interh_hospitales_summary->nombre_tiposervicion_es->headerCellClass() ?>"><div class="interh_hospitales_nombre_tiposervicion_es"><div class="ew-table-header-caption"><?php echo $interh_hospitales_summary->nombre_tiposervicion_es->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_tiposervicion_es" class="<?php echo $interh_hospitales_summary->nombre_tiposervicion_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $interh_hospitales_summary->sortUrl($interh_hospitales_summary->nombre_tiposervicion_es) ?>', 1);"><div class="interh_hospitales_nombre_tiposervicion_es">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $interh_hospitales_summary->nombre_tiposervicion_es->caption() ?></span><span class="ew-table-header-sort"><?php if ($interh_hospitales_summary->nombre_tiposervicion_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($interh_hospitales_summary->nombre_tiposervicion_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($interh_hospitales_summary->TotalGroups == 0)
			break; // Show header only
		$interh_hospitales_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$interh_hospitales_summary->loadRowValues($interh_hospitales_summary->DetailRecords[$interh_hospitales_summary->RecordCount]);
	$interh_hospitales_summary->RecordCount++;
	$interh_hospitales_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$interh_hospitales_summary->resetAttributes();
		$interh_hospitales_summary->RowType = ROWTYPE_DETAIL;
		$interh_hospitales_summary->renderRow();
?>
	<tr<?php echo $interh_hospitales_summary->rowAttributes(); ?>>
<?php if ($interh_hospitales_summary->cod_casointerh->Visible) { ?>
		<td data-field="cod_casointerh"<?php echo $interh_hospitales_summary->cod_casointerh->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->cod_casointerh->viewAttributes() ?>><?php echo $interh_hospitales_summary->cod_casointerh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_hospitales_summary->fecha->Visible) { ?>
		<td data-field="fecha"<?php echo $interh_hospitales_summary->fecha->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->fecha->viewAttributes() ?>><?php echo $interh_hospitales_summary->fecha->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_hospitales_summary->hospitalorigen->Visible) { ?>
		<td data-field="hospitalorigen"<?php echo $interh_hospitales_summary->hospitalorigen->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->hospitalorigen->viewAttributes() ?>><?php echo $interh_hospitales_summary->hospitalorigen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_hospitales_summary->hospitaldestino->Visible) { ?>
		<td data-field="hospitaldestino"<?php echo $interh_hospitales_summary->hospitaldestino->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->hospitaldestino->viewAttributes() ?>><?php echo $interh_hospitales_summary->hospitaldestino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_hospitales_summary->nombre_prioridad->Visible) { ?>
		<td data-field="nombre_prioridad"<?php echo $interh_hospitales_summary->nombre_prioridad->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->nombre_prioridad->viewAttributes() ?>><?php echo $interh_hospitales_summary->nombre_prioridad->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_hospitales_summary->nombre_motivo_es->Visible) { ?>
		<td data-field="nombre_motivo_es"<?php echo $interh_hospitales_summary->nombre_motivo_es->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->nombre_motivo_es->viewAttributes() ?>><?php echo $interh_hospitales_summary->nombre_motivo_es->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($interh_hospitales_summary->nombre_tiposervicion_es->Visible) { ?>
		<td data-field="nombre_tiposervicion_es"<?php echo $interh_hospitales_summary->nombre_tiposervicion_es->cellAttributes() ?>>
<span<?php echo $interh_hospitales_summary->nombre_tiposervicion_es->viewAttributes() ?>><?php echo $interh_hospitales_summary->nombre_tiposervicion_es->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($interh_hospitales_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$interh_hospitales_summary->resetAttributes();
	$interh_hospitales_summary->RowType = ROWTYPE_TOTAL;
	$interh_hospitales_summary->RowTotalType = ROWTOTAL_GRAND;
	$interh_hospitales_summary->RowTotalSubType = ROWTOTAL_FOOTER;
	$interh_hospitales_summary->RowAttrs["class"] = "ew-rpt-grand-summary";
	$interh_hospitales_summary->renderRow();
?>
<?php if ($interh_hospitales_summary->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $interh_hospitales_summary->rowAttributes() ?>><td colspan="<?php echo ($interh_hospitales_summary->GroupColumnCount + $interh_hospitales_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($interh_hospitales_summary->TotalCount, 0); ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $interh_hospitales_summary->rowAttributes() ?>><td colspan="<?php echo ($interh_hospitales_summary->GroupColumnCount + $interh_hospitales_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($interh_hospitales_summary->TotalCount, 0); ?><?php echo $Language->phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$interh_hospitales_summary->isExport() && !($interh_hospitales_summary->DrillDown && $interh_hospitales_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $interh_hospitales_summary->Pager->render() ?>
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
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Bottom Container -->
<div class="row">
	<div id="ew-bottom" class="<?php echo $interh_hospitales_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($interh_hospitales_summary->isExport("print") || $interh_hospitales_summary->isExport("pdf") || $interh_hospitales_summary->isExport("email") || $interh_hospitales_summary->isExport("excel") && Config("USE_PHPEXCEL") || $interh_hospitales_summary->isExport("word") && Config("USE_PHPWORD")) && $interh_hospitales_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$interh_hospitales_summary->Page_Breaking($interh_hospitales_summary->ExportChartPageBreak, $interh_hospitales_summary->PageBreakContent);
		$interh_hospitales->Hospital_remisor->PageBreakType = "before"; // Page break type
		$interh_hospitales->Hospital_remisor->PageBreak = $interh_hospitales_summary->ExportChartPageBreak;
		$interh_hospitales->Hospital_remisor->PageBreakContent = $interh_hospitales_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$interh_hospitales->Hospital_remisor->DrillDownInPanel = $interh_hospitales_summary->DrillDownInPanel;
	$interh_hospitales->Hospital_remisor->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$interh_hospitales_summary->isExport("email") && !$interh_hospitales_summary->DrillDown && $interh_hospitales->Hospital_remisor->hasData()) { ?>
<?php if (!$interh_hospitales_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($interh_hospitales_summary->isExport("print") || $interh_hospitales_summary->isExport("pdf") || $interh_hospitales_summary->isExport("email") || $interh_hospitales_summary->isExport("excel") && Config("USE_PHPEXCEL") || $interh_hospitales_summary->isExport("word") && Config("USE_PHPWORD")) && $interh_hospitales_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$interh_hospitales_summary->Page_Breaking($interh_hospitales_summary->ExportChartPageBreak, $interh_hospitales_summary->PageBreakContent);
		$interh_hospitales->Hospital_receptor->PageBreakType = "before"; // Page break type
		$interh_hospitales->Hospital_receptor->PageBreak = $interh_hospitales_summary->ExportChartPageBreak;
		$interh_hospitales->Hospital_receptor->PageBreakContent = $interh_hospitales_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$interh_hospitales->Hospital_receptor->DrillDownInPanel = $interh_hospitales_summary->DrillDownInPanel;
	$interh_hospitales->Hospital_receptor->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$interh_hospitales_summary->isExport("email") && !$interh_hospitales_summary->DrillDown && $interh_hospitales->Hospital_receptor->hasData()) { ?>
<?php if (!$interh_hospitales_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
	</div>
</div>
<!-- /#ew-bottom -->
<?php } ?>
<?php if ((!$interh_hospitales_summary->isExport() || $interh_hospitales_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$interh_hospitales_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_hospitales_summary->isExport() && !$interh_hospitales_summary->DrillDown && !$DashboardReport) { ?>
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
$interh_hospitales_summary->terminate();
?>