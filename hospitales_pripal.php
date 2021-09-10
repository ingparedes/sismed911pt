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
$hospitales_pripal = new hospitales_pripal();

// Run the page
$hospitales_pripal->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="tilex">
					<div class="wrapper">
						<div class="headerx">Hospital Mario Correa</div>

						<div class="banner-img">
							<img src="http://via.placeholder.com/640x360" alt="Image 1">
						</div>

						<div class="dates">
							<div class="start">
								<strong>STARTS</strong> 12:30 JAN 2015
								<span></span>
							</div>
							<div class="ends">
								<strong>ENDS</strong> 14:30 JAN 2015
							</div>
						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>


					</div>
				</div> 
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="tilex">
					<div class="wrapper">
						<div class="headerx">Hospital Evaristo Garcia</div>

						<div class="banner-img">
							<img src="http://via.placeholder.com/640x360" alt="Image 1">
						</div>

						<div class="dates">
							<div class="start">
								<strong>STARTS</strong> 12:30 JAN 2015
								<span></span>
							</div>
							<div class="ends">
								<strong>ENDS</strong> 14:30 JAN 2015
							</div>
						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>


					</div>
				</div> 
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="tilex">
					<div class="wrapper">
						<div class="headerx">Hospital San Juan de Dios</div>

						<div class="banner-img">
							<img src="http://via.placeholder.com/640x360" alt="Image 1">
						</div>

						<div class="dates">
							<div class="start">
								<strong>STARTS</strong> 12:30 JAN 2015
								<span></span>
							</div>
							<div class="ends">
								<strong>ENDS</strong> 14:30 JAN 2015
							</div>
						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>


					</div>
				</div> 
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="tilex">
					<div class="wrapper">
						<div class="headerx">Clínica Valle del Lili</div>

				        <div class="card">
					          <div class="card-content">
					            <div class="card-body">
					              <div class="media d-flex">
					                <div class="media-body text-left">
					                  <h3 class="success">64.89 %</h3>
					                  <span>Bounce Rate</span>
					                </div>
					                <div class="align-self-center">
					                  <i class="fas fa-user-plus success font-large-2 float-right"></i>
					                </div>
					              </div>
					              <div class="progress mt-1 mb-0" style="height: 7px;">
					                <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
					              </div>
					            </div>
					          </div>
					        </div>

						<div class="dates">
							<div class="start">
								<strong>STARTS</strong> 12:30 JAN 2015
								<span></span>
							</div>
							<div class="ends">
								<strong>ENDS</strong> 14:30 JAN 2015
							</div>
						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>

						<div class="stats">

							<div>
								<strong>INVITED</strong> 3098
							</div>

							<div>
								<strong>JOINED</strong> 562
							</div>

							<div>
								<strong>DECLINED</strong> 182
							</div>

						</div>


					</div>
				</div> 
			</div>
		</div>
	</div>

	<script src="js/Chart.bundle.min.js"></script>
	<script src="js/widgets.js"></script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$hospitales_pripal->terminate();
?>