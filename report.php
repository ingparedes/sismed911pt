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
$report = new report();

// Run the page
$report->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
global $Language;
?>
<?php include_once "header.php"; ?>

<script>
	localStorage.setItem("language", "<?php echo CurrentLanguageID(); ?>");
	localStorage.setItem("language_new_case", "<?php echo $Language->Phrase('dt_newcase'); ?>");
	localStorage.setItem("language_map", "<?php echo $Language->Phrase('dt_map'); ?>");
	localStorage.setItem("language_select", "<?php echo $Language->Phrase('fp_select'); ?>");
</script>

<div class="row mb-3">
	<div class="col-lg-12">
		<table id="tableMaestro" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
			<thead>
				<tr>
					<th><?php echo $Language->Phrase("dt_case"); ?></th>
					<th><?php echo $Language->Phrase("dt_date"); ?></th>
					<th><?php echo $Language->Phrase("dt_time"); ?></th>
					<th><?php echo $Language->Phrase("dt_patient"); ?></th>
					<th><?php echo $Language->Phrase("dt_originhospital"); ?></th>
					<th><?php echo $Language->Phrase("dt_destinationhospital"); ?></th>
					<th><?php echo $Language->Phrase("dt_priority"); ?></th>
					<th><?php echo $Language->Phrase("dt_action"); ?></th>
					<th><?php echo $Language->Phrase("dt_close"); ?></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>

<?php include_once "modals.php"; ?>

<script>
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/report.js", "report");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$report->terminate();
?>