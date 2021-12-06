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
	localStorage.setItem("language_select", "<?php echo $Language->Phrase('fp_select'); ?>");
</script>

<div class="row mb-3">
	<div class="col-lg-12">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="ambulance-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
					<?php echo $Language->Phrase('fa_ambulance'); ?>
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="ambulance-tab">
				<table id="tableAmbulance" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
					<thead>
						<tr>
							<th><?php echo $Language->Phrase('fa_ambulance'); ?></th>
							<th><?php echo $Language->Phrase('m_ambulanceplaca'); ?></th>
							<th><?php echo $Language->Phrase('m_ambulancemark'); ?></th>
							<th><?php echo $Language->Phrase('m_state'); ?></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="mt-5 mx-5">
					<canvas id="myChart"></canvas>
				</div>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
		</div>
	</div>
</div>

<script>
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/report.js", "report");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$report->terminate();
?>