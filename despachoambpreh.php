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
$despachoambpreh = new despachoambpreh();

// Run the page
$despachoambpreh->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<!--CUSTOM_FILE_CONTENT_BEGIN--><!--CUSTOM_FILE_CONTENT_END-->
<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$despachoambpreh->terminate();
?>