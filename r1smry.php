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
$r1_summary = new r1_summary();

// Run the page
$r1_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r1_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r1_summary->isExport() && !$r1_summary->DrillDown && !$DashboardReport) { ?>
<script>
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r1_summary->DrillDownInPanel) {
	$r1_summary->ExportOptions->render("body");
	$r1_summary->SearchOptions->render("body");
	$r1_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r1_summary->showPageHeader(); ?>
<?php
$r1_summary->showMessage();
?>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r1_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r1_summary->isExport() && !$r1_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php
while ($r1_summary->RecordCount < count($r1_summary->DetailRecords) && $r1_summary->RecordCount < $r1_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r1_summary->ShowHeader) {
?>
<div class="<?php if (!$r1_summary->isExport("word") && !$r1_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r1_summary->ReportTableStyle ?>>
<?php if (!$r1_summary->isExport() && !($r1_summary->DrillDown && $r1_summary->TotalGroups > 0)) { ?>
<!-- Top pager -->
<div class="card-header ew-grid-upper-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r1_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_r1" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r1_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r1_summary->cod_casointerh->Visible) { ?>
	<?php if ($r1_summary->sortUrl($r1_summary->cod_casointerh) == "") { ?>
	<th data-name="cod_casointerh" class="<?php echo $r1_summary->cod_casointerh->headerCellClass() ?>"><div class="r1_cod_casointerh"><div class="ew-table-header-caption"><?php echo $r1_summary->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cod_casointerh" class="<?php echo $r1_summary->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r1_summary->sortUrl($r1_summary->cod_casointerh) ?>', 1);"><div class="r1_cod_casointerh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r1_summary->cod_casointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r1_summary->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r1_summary->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r1_summary->fechahorainterh->Visible) { ?>
	<?php if ($r1_summary->sortUrl($r1_summary->fechahorainterh) == "") { ?>
	<th data-name="fechahorainterh" class="<?php echo $r1_summary->fechahorainterh->headerCellClass() ?>"><div class="r1_fechahorainterh"><div class="ew-table-header-caption"><?php echo $r1_summary->fechahorainterh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="fechahorainterh" class="<?php echo $r1_summary->fechahorainterh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r1_summary->sortUrl($r1_summary->fechahorainterh) ?>', 1);"><div class="r1_fechahorainterh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r1_summary->fechahorainterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r1_summary->fechahorainterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r1_summary->fechahorainterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r1_summary->tipo_serviciointerh->Visible) { ?>
	<?php if ($r1_summary->sortUrl($r1_summary->tipo_serviciointerh) == "") { ?>
	<th data-name="tipo_serviciointerh" class="<?php echo $r1_summary->tipo_serviciointerh->headerCellClass() ?>"><div class="r1_tipo_serviciointerh"><div class="ew-table-header-caption"><?php echo $r1_summary->tipo_serviciointerh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="tipo_serviciointerh" class="<?php echo $r1_summary->tipo_serviciointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r1_summary->sortUrl($r1_summary->tipo_serviciointerh) ?>', 1);"><div class="r1_tipo_serviciointerh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r1_summary->tipo_serviciointerh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r1_summary->tipo_serviciointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r1_summary->tipo_serviciointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r1_summary->motivo_atencioninteh->Visible) { ?>
	<?php if ($r1_summary->sortUrl($r1_summary->motivo_atencioninteh) == "") { ?>
	<th data-name="motivo_atencioninteh" class="<?php echo $r1_summary->motivo_atencioninteh->headerCellClass() ?>"><div class="r1_motivo_atencioninteh"><div class="ew-table-header-caption"><?php echo $r1_summary->motivo_atencioninteh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="motivo_atencioninteh" class="<?php echo $r1_summary->motivo_atencioninteh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r1_summary->sortUrl($r1_summary->motivo_atencioninteh) ?>', 1);"><div class="r1_motivo_atencioninteh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r1_summary->motivo_atencioninteh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r1_summary->motivo_atencioninteh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r1_summary->motivo_atencioninteh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r1_summary->cierreinterh->Visible) { ?>
	<?php if ($r1_summary->sortUrl($r1_summary->cierreinterh) == "") { ?>
	<th data-name="cierreinterh" class="<?php echo $r1_summary->cierreinterh->headerCellClass() ?>" style="white-space: nowrap;"><div class="r1_cierreinterh"><div class="ew-table-header-caption"><?php echo $r1_summary->cierreinterh->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cierreinterh" class="<?php echo $r1_summary->cierreinterh->headerCellClass() ?>" style="white-space: nowrap;"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r1_summary->sortUrl($r1_summary->cierreinterh) ?>', 1);"><div class="r1_cierreinterh">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r1_summary->cierreinterh->caption() ?></span><span class="ew-table-header-sort"><?php if ($r1_summary->cierreinterh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r1_summary->cierreinterh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r1_summary->TotalGroups == 0)
			break; // Show header only
		$r1_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$r1_summary->loadRowValues($r1_summary->DetailRecords[$r1_summary->RecordCount]);
	$r1_summary->RecordCount++;
	$r1_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$r1_summary->resetAttributes();
		$r1_summary->RowType = ROWTYPE_DETAIL;
		$r1_summary->renderRow();
?>
	<tr<?php echo $r1_summary->rowAttributes(); ?>>
<?php if ($r1_summary->cod_casointerh->Visible) { ?>
		<td data-field="cod_casointerh"<?php echo $r1_summary->cod_casointerh->cellAttributes() ?>>
<span<?php echo $r1_summary->cod_casointerh->viewAttributes() ?>><?php echo $r1_summary->cod_casointerh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r1_summary->fechahorainterh->Visible) { ?>
		<td data-field="fechahorainterh"<?php echo $r1_summary->fechahorainterh->cellAttributes() ?>>
<span<?php echo $r1_summary->fechahorainterh->viewAttributes() ?>><?php echo $r1_summary->fechahorainterh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r1_summary->tipo_serviciointerh->Visible) { ?>
		<td data-field="tipo_serviciointerh"<?php echo $r1_summary->tipo_serviciointerh->cellAttributes() ?>>
<span<?php echo $r1_summary->tipo_serviciointerh->viewAttributes() ?>><?php echo $r1_summary->tipo_serviciointerh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r1_summary->motivo_atencioninteh->Visible) { ?>
		<td data-field="motivo_atencioninteh"<?php echo $r1_summary->motivo_atencioninteh->cellAttributes() ?>>
<span<?php echo $r1_summary->motivo_atencioninteh->viewAttributes() ?>><?php echo $r1_summary->motivo_atencioninteh->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r1_summary->cierreinterh->Visible) { ?>
		<td data-field="cierreinterh"<?php echo $r1_summary->cierreinterh->cellAttributes() ?>>
<span<?php echo $r1_summary->cierreinterh->viewAttributes() ?>><?php echo $r1_summary->cierreinterh->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($r1_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$r1_summary->resetAttributes();
	$r1_summary->RowType = ROWTYPE_TOTAL;
	$r1_summary->RowTotalType = ROWTOTAL_GRAND;
	$r1_summary->RowTotalSubType = ROWTOTAL_FOOTER;
	$r1_summary->RowAttrs["class"] = "ew-rpt-grand-summary";
	$r1_summary->renderRow();
?>
<?php if ($r1_summary->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $r1_summary->rowAttributes() ?>><td colspan="<?php echo ($r1_summary->GroupColumnCount + $r1_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r1_summary->TotalCount, 0); ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $r1_summary->rowAttributes() ?>><td colspan="<?php echo ($r1_summary->GroupColumnCount + $r1_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($r1_summary->TotalCount, 0); ?><?php echo $Language->phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if ($r1_summary->TotalGroups > 0) { ?>
<?php if (!$r1_summary->isExport() && !($r1_summary->DrillDown && $r1_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r1_summary->Pager->render() ?>
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
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Bottom Container -->
<div class="row">
	<div id="ew-bottom" class="<?php echo $r1_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($r1_summary->isExport("print") || $r1_summary->isExport("pdf") || $r1_summary->isExport("email") || $r1_summary->isExport("excel") && Config("USE_PHPEXCEL") || $r1_summary->isExport("word") && Config("USE_PHPWORD")) && $r1_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$r1_summary->Page_Breaking($r1_summary->ExportChartPageBreak, $r1_summary->PageBreakContent);
		$r1->r1->PageBreakType = "before"; // Page break type
		$r1->r1->PageBreak = $r1_summary->ExportChartPageBreak;
		$r1->r1->PageBreakContent = $r1_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$r1->r1->DrillDownInPanel = $r1_summary->DrillDownInPanel;
	$r1->r1->render("ew-chart-bottom");
}
?>
<?php if (!$DashboardReport && !$r1_summary->isExport("email") && !$r1_summary->DrillDown && $r1->r1->hasData()) { ?>
<?php if (!$r1_summary->isExport()) { ?>
<div class="mb-3"><a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $Language->phrase("Top") ?></a></div>
<?php } ?>
<?php } ?>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
	</div>
</div>
<!-- /#ew-bottom -->
<?php } ?>
<?php if ((!$r1_summary->isExport() || $r1_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r1_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r1_summary->isExport() && !$r1_summary->DrillDown && !$DashboardReport) { ?>
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
$r1_summary->terminate();
?>