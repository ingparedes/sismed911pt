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
$r2_summary = new r2_summary();

// Run the page
$r2_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r2_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r2_summary->isExport() && !$r2_summary->DrillDown && !$DashboardReport) { ?>
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
			return this.onError(elm, "<?php echo JsEncode($r2_summary->fecha->errorMessage()) ?>");

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

	fsummary.filterList = <?php echo $r2_summary->getFilterList() ?>;
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
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<?php if ($r2_summary->ShowCurrentFilter) { ?>
<?php $r2_summary->showFilterList() ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r2_summary->DrillDownInPanel) {
	$r2_summary->ExportOptions->render("body");
	$r2_summary->SearchOptions->render("body");
	$r2_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r2_summary->showPageHeader(); ?>
<?php
$r2_summary->showMessage();
?>
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r2_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r2_summary->isExport() && !$r2_summary->DrillDown && !$DashboardReport) { ?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$r2_summary->isExport() && !$r2->CurrentAction) { ?>
<form name="fsummary" id="fsummary" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsummary-search-panel" class="<?php echo $r2_summary->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="r2">
	<div class="ew-extended-search">
<?php

// Render search row
$r2->RowType = ROWTYPE_SEARCH;
$r2->resetAttributes();
$r2_summary->renderRow();
?>
<?php if ($r2_summary->fecha->Visible) { // fecha ?>
	<?php
		$r2_summary->SearchColumnCount++;
		if (($r2_summary->SearchColumnCount - 1) % $r2_summary->SearchFieldsPerRow == 0) {
			$r2_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r2_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_fecha" class="ew-cell form-group">
		<label for="x_fecha" class="ew-search-caption ew-label"><?php echo $r2_summary->fecha->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_fecha" id="z_fecha" value="BETWEEN">
</span>
		<span id="el_r2_fecha" class="ew-search-field">
<input type="text" data-table="r2" data-field="x_fecha" name="x_fecha" id="x_fecha" maxlength="4" placeholder="<?php echo HtmlEncode($r2_summary->fecha->getPlaceHolder()) ?>" value="<?php echo $r2_summary->fecha->EditValue ?>"<?php echo $r2_summary->fecha->editAttributes() ?>>
<?php if (!$r2_summary->fecha->ReadOnly && !$r2_summary->fecha->Disabled && !isset($r2_summary->fecha->EditAttrs["readonly"]) && !isset($r2_summary->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "x_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_r2_fecha" class="ew-search-field2">
<input type="text" data-table="r2" data-field="x_fecha" name="y_fecha" id="y_fecha" maxlength="4" placeholder="<?php echo HtmlEncode($r2_summary->fecha->getPlaceHolder()) ?>" value="<?php echo $r2_summary->fecha->EditValue2 ?>"<?php echo $r2_summary->fecha->editAttributes() ?>>
<?php if (!$r2_summary->fecha->ReadOnly && !$r2_summary->fecha->Disabled && !isset($r2_summary->fecha->EditAttrs["readonly"]) && !isset($r2_summary->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "y_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($r2_summary->SearchColumnCount % $r2_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($r2_summary->SearchColumnCount % $r2_summary->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $r2_summary->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
while ($r2_summary->RecordCount < count($r2_summary->DetailRecords) && $r2_summary->RecordCount < $r2_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r2_summary->ShowHeader) {
?>
<div class="<?php if (!$r2_summary->isExport("word") && !$r2_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r2_summary->ReportTableStyle ?>>
<?php if (!$r2_summary->isExport() && !($r2_summary->DrillDown && $r2_summary->TotalGroups > 0)) { ?>
<!-- Top pager -->
<div class="card-header ew-grid-upper-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r2_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_r2" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r2_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r2_summary->cod_casointerh->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->cod_casointerh) == "") { ?>
	<th data-name="cod_casointerh" class="<?php echo $r2_summary->cod_casointerh->headerCellClass() ?>"><div class="r2_cod_casointerh"><div class="ew-table-header-caption"><?php echo $r2_summary->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cod_casointerh" class="<?php echo $r2_summary->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->cod_casointerh) ?>', 1);"><div class="r2_cod_casointerh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r2_summary->fechahorainterh->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->fechahorainterh) == "") { ?>
	<th data-name="fechahorainterh" class="<?php echo $r2_summary->fechahorainterh->headerCellClass() ?>"><div class="r2_fechahorainterh"><div class="ew-table-header-caption"><?php echo $r2_summary->fechahorainterh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="fechahorainterh" class="<?php echo $r2_summary->fechahorainterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->fechahorainterh) ?>', 1);"><div class="r2_fechahorainterh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->fechahorainterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->fechahorainterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->fechahorainterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r2_summary->cierreinterh->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->cierreinterh) == "") { ?>
	<th data-name="cierreinterh" class="<?php echo $r2_summary->cierreinterh->headerCellClass() ?>"><div class="r2_cierreinterh"><div class="ew-table-header-caption"><?php echo $r2_summary->cierreinterh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cierreinterh" class="<?php echo $r2_summary->cierreinterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->cierreinterh) ?>', 1);"><div class="r2_cierreinterh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->cierreinterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->cierreinterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->cierreinterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r2_summary->nombre_prioridad->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->nombre_prioridad) == "") { ?>
	<th data-name="nombre_prioridad" class="<?php echo $r2_summary->nombre_prioridad->headerCellClass() ?>"><div class="r2_nombre_prioridad"><div class="ew-table-header-caption"><?php echo $r2_summary->nombre_prioridad->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_prioridad" class="<?php echo $r2_summary->nombre_prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->nombre_prioridad) ?>', 1);"><div class="r2_nombre_prioridad">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->nombre_prioridad->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->nombre_prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->nombre_prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r2_summary->nombre_motivo_es->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->nombre_motivo_es) == "") { ?>
	<th data-name="nombre_motivo_es" class="<?php echo $r2_summary->nombre_motivo_es->headerCellClass() ?>"><div class="r2_nombre_motivo_es"><div class="ew-table-header-caption"><?php echo $r2_summary->nombre_motivo_es->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_motivo_es" class="<?php echo $r2_summary->nombre_motivo_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->nombre_motivo_es) ?>', 1);"><div class="r2_nombre_motivo_es">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->nombre_motivo_es->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->nombre_motivo_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->nombre_motivo_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r2_summary->nombre_tiposervicion_es->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->nombre_tiposervicion_es) == "") { ?>
	<th data-name="nombre_tiposervicion_es" class="<?php echo $r2_summary->nombre_tiposervicion_es->headerCellClass() ?>"><div class="r2_nombre_tiposervicion_es"><div class="ew-table-header-caption"><?php echo $r2_summary->nombre_tiposervicion_es->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nombre_tiposervicion_es" class="<?php echo $r2_summary->nombre_tiposervicion_es->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->nombre_tiposervicion_es) ?>', 1);"><div class="r2_nombre_tiposervicion_es">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->nombre_tiposervicion_es->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->nombre_tiposervicion_es->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->nombre_tiposervicion_es->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r2_summary->fecha->Visible) { ?>
	<?php if ($r2_summary->sortUrl($r2_summary->fecha) == "") { ?>
	<th data-name="fecha" class="<?php echo $r2_summary->fecha->headerCellClass() ?>"><div class="r2_fecha"><div class="ew-table-header-caption"><?php echo $r2_summary->fecha->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="fecha" class="<?php echo $r2_summary->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r2_summary->sortUrl($r2_summary->fecha) ?>', 1);"><div class="r2_fecha">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r2_summary->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($r2_summary->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r2_summary->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r2_summary->TotalGroups == 0)
			break; // Show header only
		$r2_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$r2_summary->loadRowValues($r2_summary->DetailRecords[$r2_summary->RecordCount]);
	$r2_summary->RecordCount++;
	$r2_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$r2_summary->resetAttributes();
		$r2_summary->RowType = ROWTYPE_DETAIL;
		$r2_summary->renderRow();
?>
	<tr<?php echo $r2_summary->rowAttributes(); ?>>
<?php if ($r2_summary->cod_casointerh->Visible) { ?>
		<td data-field="cod_casointerh"<?php echo $r2_summary->cod_casointerh->cellAttributes() ?>>
<span<?php echo $r2_summary->cod_casointerh->viewAttributes() ?>><?php echo $r2_summary->cod_casointerh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r2_summary->fechahorainterh->Visible) { ?>
		<td data-field="fechahorainterh"<?php echo $r2_summary->fechahorainterh->cellAttributes() ?>>
<span<?php echo $r2_summary->fechahorainterh->viewAttributes() ?>><?php echo $r2_summary->fechahorainterh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r2_summary->cierreinterh->Visible) { ?>
		<td data-field="cierreinterh"<?php echo $r2_summary->cierreinterh->cellAttributes() ?>>
<span<?php echo $r2_summary->cierreinterh->viewAttributes() ?>><?php echo $r2_summary->cierreinterh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r2_summary->nombre_prioridad->Visible) { ?>
		<td data-field="nombre_prioridad"<?php echo $r2_summary->nombre_prioridad->cellAttributes() ?>>
<span<?php echo $r2_summary->nombre_prioridad->viewAttributes() ?>><?php echo $r2_summary->nombre_prioridad->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r2_summary->nombre_motivo_es->Visible) { ?>
		<td data-field="nombre_motivo_es"<?php echo $r2_summary->nombre_motivo_es->cellAttributes() ?>>
<span<?php echo $r2_summary->nombre_motivo_es->viewAttributes() ?>><?php echo $r2_summary->nombre_motivo_es->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r2_summary->nombre_tiposervicion_es->Visible) { ?>
		<td data-field="nombre_tiposervicion_es"<?php echo $r2_summary->nombre_tiposervicion_es->cellAttributes() ?>>
<span<?php echo $r2_summary->nombre_tiposervicion_es->viewAttributes() ?>><?php echo $r2_summary->nombre_tiposervicion_es->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r2_summary->fecha->Visible) { ?>
		<td data-field="fecha"<?php echo $r2_summary->fecha->cellAttributes() ?>>
<span<?php echo $r2_summary->fecha->viewAttributes() ?>><?php echo $r2_summary->fecha->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($r2_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$r2_summary->resetAttributes();
	$r2_summary->RowType = ROWTYPE_TOTAL;
	$r2_summary->RowTotalType = ROWTOTAL_GRAND;
	$r2_summary->RowTotalSubType = ROWTOTAL_FOOTER;
	$r2_summary->RowAttrs["class"] = "ew-rpt-grand-summary";
	$r2_summary->renderRow();
?>
<?php if ($r2_summary->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $r2_summary->rowAttributes() ?>><td colspan="<?php echo ($r2_summary->GroupColumnCount + $r2_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r2_summary->TotalCount, 0); ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $r2_summary->rowAttributes() ?>><td colspan="<?php echo ($r2_summary->GroupColumnCount + $r2_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($r2_summary->TotalCount, 0); ?><?php echo $Language->phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if ($r2_summary->TotalGroups > 0) { ?>
<?php if (!$r2_summary->isExport() && !($r2_summary->DrillDown && $r2_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r2_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Bottom Container -->
<div class="row">
	<div id="ew-bottom" class="<?php echo $r2_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($r2_summary->isExport("print") || $r2_summary->isExport("pdf") || $r2_summary->isExport("email") || $r2_summary->isExport("excel") && Config("USE_PHPEXCEL") || $r2_summary->isExport("word") && Config("USE_PHPWORD")) && $r2_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$r2_summary->Page_Breaking($r2_summary->ExportChartPageBreak, $r2_summary->PageBreakContent);
		$r2->Tipo_servicio->PageBreakType = "before"; // Page break type
		$r2->Tipo_servicio->PageBreak = $r2_summary->ExportChartPageBreak;
		$r2->Tipo_servicio->PageBreakContent = $r2_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$r2->Tipo_servicio->DrillDownInPanel = $r2_summary->DrillDownInPanel;
	$r2->Tipo_servicio->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$r2_summary->isExport("email") && !$r2_summary->DrillDown && $r2->Tipo_servicio->hasData()) { ?>
<?php if (!$r2_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($r2_summary->isExport("print") || $r2_summary->isExport("pdf") || $r2_summary->isExport("email") || $r2_summary->isExport("excel") && Config("USE_PHPEXCEL") || $r2_summary->isExport("word") && Config("USE_PHPWORD")) && $r2_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$r2_summary->Page_Breaking($r2_summary->ExportChartPageBreak, $r2_summary->PageBreakContent);
		$r2->Prioridad->PageBreakType = "before"; // Page break type
		$r2->Prioridad->PageBreak = $r2_summary->ExportChartPageBreak;
		$r2->Prioridad->PageBreakContent = $r2_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$r2->Prioridad->DrillDownInPanel = $r2_summary->DrillDownInPanel;
	$r2->Prioridad->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$r2_summary->isExport("email") && !$r2_summary->DrillDown && $r2->Prioridad->hasData()) { ?>
<?php if (!$r2_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($r2_summary->isExport("print") || $r2_summary->isExport("pdf") || $r2_summary->isExport("email") || $r2_summary->isExport("excel") && Config("USE_PHPEXCEL") || $r2_summary->isExport("word") && Config("USE_PHPWORD")) && $r2_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$r2_summary->Page_Breaking($r2_summary->ExportChartPageBreak, $r2_summary->PageBreakContent);
		$r2->Motivo_atencion->PageBreakType = "before"; // Page break type
		$r2->Motivo_atencion->PageBreak = $r2_summary->ExportChartPageBreak;
		$r2->Motivo_atencion->PageBreakContent = $r2_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$r2->Motivo_atencion->DrillDownInPanel = $r2_summary->DrillDownInPanel;
	$r2->Motivo_atencion->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$r2_summary->isExport("email") && !$r2_summary->DrillDown && $r2->Motivo_atencion->hasData()) { ?>
<?php if (!$r2_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($r2_summary->isExport("print") || $r2_summary->isExport("pdf") || $r2_summary->isExport("email") || $r2_summary->isExport("excel") && Config("USE_PHPEXCEL") || $r2_summary->isExport("word") && Config("USE_PHPWORD")) && $r2_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$r2_summary->Page_Breaking($r2_summary->ExportChartPageBreak, $r2_summary->PageBreakContent);
		$r2->Casos_por_dia->PageBreakType = "before"; // Page break type
		$r2->Casos_por_dia->PageBreak = $r2_summary->ExportChartPageBreak;
		$r2->Casos_por_dia->PageBreakContent = $r2_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$r2->Casos_por_dia->DrillDownInPanel = $r2_summary->DrillDownInPanel;
	$r2->Casos_por_dia->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$r2_summary->isExport("email") && !$r2_summary->DrillDown && $r2->Casos_por_dia->hasData()) { ?>
<?php if (!$r2_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
	</div>
</div>
<!-- /#ew-bottom -->
<?php } ?>
<?php if ((!$r2_summary->isExport() || $r2_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r2_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r2_summary->isExport() && !$r2_summary->DrillDown && !$DashboardReport) { ?>
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
$r2_summary->terminate();
?>