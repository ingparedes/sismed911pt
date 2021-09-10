<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_evaluacionclinica_add extends preh_evaluacionclinica
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_evaluacionclinica';

	// Page object name
	public $PageObjName = "preh_evaluacionclinica_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (preh_evaluacionclinica)
		if (!isset($GLOBALS["preh_evaluacionclinica"]) || get_class($GLOBALS["preh_evaluacionclinica"]) == PROJECT_NAMESPACE . "preh_evaluacionclinica") {
			$GLOBALS["preh_evaluacionclinica"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["preh_evaluacionclinica"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'preh_evaluacionclinica');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (usuarios)
		$UserTable = $UserTable ?: new usuarios();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$SkipHeaderFooter = $OldSkipHeaderFooter;
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $preh_evaluacionclinica;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($preh_evaluacionclinica);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
	}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "preh_evaluacionclinicaview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id_evaluacionclinica'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;
	public $MultiPages; // Multi pages object

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canAdd()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("preh_evaluacionclinicalist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$OldSkipHeaderFooter = $SkipHeaderFooter;
		$SkipHeaderFooter = TRUE;
		$this->id_evaluacionclinica->Visible = FALSE;
		$this->cod_casopreh->setVisibility();
		$this->fecha_horaevaluacion->setVisibility();
		$this->cod_paciente->setVisibility();
		$this->cod_diag_cie->setVisibility();
		$this->diagnos_txt->setVisibility();
		$this->triage->setVisibility();
		$this->c_clinico->setVisibility();
		$this->examen_fisico->setVisibility();
		$this->tratamiento->setVisibility();
		$this->antecedentes->setVisibility();
		$this->paraclinicos->setVisibility();
		$this->sv_tx->setVisibility();
		$this->sv_fc->setVisibility();
		$this->sv_fr->setVisibility();
		$this->sv_temp->setVisibility();
		$this->sv_gl->setVisibility();
		$this->peso->setVisibility();
		$this->talla->setVisibility();
		$this->sv_fcf->setVisibility();
		$this->sv_satO2->setVisibility();
		$this->sv_apgar->setVisibility();
		$this->sv_gli->setVisibility();
		$this->tipo_paciente->setVisibility();
		$this->usu_sede->setVisibility();
		$this->tiempo_enfermedad->setVisibility();
		$this->tipo_enfermedad->setVisibility();
		$this->ap_med_paciente->setVisibility();
		$this->ap_diabetes->setVisibility();
		$this->ap_cardiop->setVisibility();
		$this->ap_convul->setVisibility();
		$this->ap_asma->setVisibility();
		$this->ap_acv->setVisibility();
		$this->ap_has->setVisibility();
		$this->ap_alergia->setVisibility();
		$this->ap_otros->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Set up multi page object
		$this->setupMultiPages();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->cod_diag_cie);
		$this->setupLookupOptions($this->triage);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_evaluacionclinicalist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id_evaluacionclinica") !== NULL) {
				$this->id_evaluacionclinica->setQueryStringValue(Get("id_evaluacionclinica"));
				$this->setKey("id_evaluacionclinica", $this->id_evaluacionclinica->CurrentValue); // Set up key
			} else {
				$this->setKey("id_evaluacionclinica", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("preh_evaluacionclinicalist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->GetAddUrl();
					if (GetPageName($returnUrl) == "preh_evaluacionclinicalist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "preh_evaluacionclinicaview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id_evaluacionclinica->CurrentValue = NULL;
		$this->id_evaluacionclinica->OldValue = $this->id_evaluacionclinica->CurrentValue;
		$this->cod_casopreh->CurrentValue = NULL;
		$this->cod_casopreh->OldValue = $this->cod_casopreh->CurrentValue;
		$this->fecha_horaevaluacion->CurrentValue = NULL;
		$this->fecha_horaevaluacion->OldValue = $this->fecha_horaevaluacion->CurrentValue;
		$this->cod_paciente->CurrentValue = NULL;
		$this->cod_paciente->OldValue = $this->cod_paciente->CurrentValue;
		$this->cod_diag_cie->CurrentValue = NULL;
		$this->cod_diag_cie->OldValue = $this->cod_diag_cie->CurrentValue;
		$this->diagnos_txt->CurrentValue = NULL;
		$this->diagnos_txt->OldValue = $this->diagnos_txt->CurrentValue;
		$this->triage->CurrentValue = NULL;
		$this->triage->OldValue = $this->triage->CurrentValue;
		$this->c_clinico->CurrentValue = NULL;
		$this->c_clinico->OldValue = $this->c_clinico->CurrentValue;
		$this->examen_fisico->CurrentValue = NULL;
		$this->examen_fisico->OldValue = $this->examen_fisico->CurrentValue;
		$this->tratamiento->CurrentValue = NULL;
		$this->tratamiento->OldValue = $this->tratamiento->CurrentValue;
		$this->antecedentes->CurrentValue = NULL;
		$this->antecedentes->OldValue = $this->antecedentes->CurrentValue;
		$this->paraclinicos->CurrentValue = NULL;
		$this->paraclinicos->OldValue = $this->paraclinicos->CurrentValue;
		$this->sv_tx->CurrentValue = NULL;
		$this->sv_tx->OldValue = $this->sv_tx->CurrentValue;
		$this->sv_fc->CurrentValue = NULL;
		$this->sv_fc->OldValue = $this->sv_fc->CurrentValue;
		$this->sv_fr->CurrentValue = NULL;
		$this->sv_fr->OldValue = $this->sv_fr->CurrentValue;
		$this->sv_temp->CurrentValue = NULL;
		$this->sv_temp->OldValue = $this->sv_temp->CurrentValue;
		$this->sv_gl->CurrentValue = NULL;
		$this->sv_gl->OldValue = $this->sv_gl->CurrentValue;
		$this->peso->CurrentValue = NULL;
		$this->peso->OldValue = $this->peso->CurrentValue;
		$this->talla->CurrentValue = NULL;
		$this->talla->OldValue = $this->talla->CurrentValue;
		$this->sv_fcf->CurrentValue = NULL;
		$this->sv_fcf->OldValue = $this->sv_fcf->CurrentValue;
		$this->sv_satO2->CurrentValue = NULL;
		$this->sv_satO2->OldValue = $this->sv_satO2->CurrentValue;
		$this->sv_apgar->CurrentValue = NULL;
		$this->sv_apgar->OldValue = $this->sv_apgar->CurrentValue;
		$this->sv_gli->CurrentValue = NULL;
		$this->sv_gli->OldValue = $this->sv_gli->CurrentValue;
		$this->tipo_paciente->CurrentValue = NULL;
		$this->tipo_paciente->OldValue = $this->tipo_paciente->CurrentValue;
		$this->usu_sede->CurrentValue = NULL;
		$this->usu_sede->OldValue = $this->usu_sede->CurrentValue;
		$this->tiempo_enfermedad->CurrentValue = NULL;
		$this->tiempo_enfermedad->OldValue = $this->tiempo_enfermedad->CurrentValue;
		$this->tipo_enfermedad->CurrentValue = NULL;
		$this->tipo_enfermedad->OldValue = $this->tipo_enfermedad->CurrentValue;
		$this->ap_med_paciente->CurrentValue = NULL;
		$this->ap_med_paciente->OldValue = $this->ap_med_paciente->CurrentValue;
		$this->ap_diabetes->CurrentValue = "0";
		$this->ap_cardiop->CurrentValue = "0";
		$this->ap_convul->CurrentValue = "0";
		$this->ap_asma->CurrentValue = "0";
		$this->ap_acv->CurrentValue = "0";
		$this->ap_has->CurrentValue = "0";
		$this->ap_alergia->CurrentValue = "0";
		$this->ap_otros->CurrentValue = NULL;
		$this->ap_otros->OldValue = $this->ap_otros->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'cod_casopreh' first before field var 'x_cod_casopreh'
		$val = $CurrentForm->hasValue("cod_casopreh") ? $CurrentForm->getValue("cod_casopreh") : $CurrentForm->getValue("x_cod_casopreh");
		if (!$this->cod_casopreh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_casopreh->Visible = FALSE; // Disable update for API request
			else
				$this->cod_casopreh->setFormValue($val);
		}

		// Check field name 'fecha_horaevaluacion' first before field var 'x_fecha_horaevaluacion'
		$val = $CurrentForm->hasValue("fecha_horaevaluacion") ? $CurrentForm->getValue("fecha_horaevaluacion") : $CurrentForm->getValue("x_fecha_horaevaluacion");
		if (!$this->fecha_horaevaluacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_horaevaluacion->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_horaevaluacion->setFormValue($val);
			$this->fecha_horaevaluacion->CurrentValue = UnFormatDateTime($this->fecha_horaevaluacion->CurrentValue, 0);
		}

		// Check field name 'cod_paciente' first before field var 'x_cod_paciente'
		$val = $CurrentForm->hasValue("cod_paciente") ? $CurrentForm->getValue("cod_paciente") : $CurrentForm->getValue("x_cod_paciente");
		if (!$this->cod_paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_paciente->Visible = FALSE; // Disable update for API request
			else
				$this->cod_paciente->setFormValue($val);
		}

		// Check field name 'cod_diag_cie' first before field var 'x_cod_diag_cie'
		$val = $CurrentForm->hasValue("cod_diag_cie") ? $CurrentForm->getValue("cod_diag_cie") : $CurrentForm->getValue("x_cod_diag_cie");
		if (!$this->cod_diag_cie->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_diag_cie->Visible = FALSE; // Disable update for API request
			else
				$this->cod_diag_cie->setFormValue($val);
		}

		// Check field name 'diagnos_txt' first before field var 'x_diagnos_txt'
		$val = $CurrentForm->hasValue("diagnos_txt") ? $CurrentForm->getValue("diagnos_txt") : $CurrentForm->getValue("x_diagnos_txt");
		if (!$this->diagnos_txt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->diagnos_txt->Visible = FALSE; // Disable update for API request
			else
				$this->diagnos_txt->setFormValue($val);
		}

		// Check field name 'triage' first before field var 'x_triage'
		$val = $CurrentForm->hasValue("triage") ? $CurrentForm->getValue("triage") : $CurrentForm->getValue("x_triage");
		if (!$this->triage->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->triage->Visible = FALSE; // Disable update for API request
			else
				$this->triage->setFormValue($val);
		}

		// Check field name 'c_clinico' first before field var 'x_c_clinico'
		$val = $CurrentForm->hasValue("c_clinico") ? $CurrentForm->getValue("c_clinico") : $CurrentForm->getValue("x_c_clinico");
		if (!$this->c_clinico->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->c_clinico->Visible = FALSE; // Disable update for API request
			else
				$this->c_clinico->setFormValue($val);
		}

		// Check field name 'examen_fisico' first before field var 'x_examen_fisico'
		$val = $CurrentForm->hasValue("examen_fisico") ? $CurrentForm->getValue("examen_fisico") : $CurrentForm->getValue("x_examen_fisico");
		if (!$this->examen_fisico->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->examen_fisico->Visible = FALSE; // Disable update for API request
			else
				$this->examen_fisico->setFormValue($val);
		}

		// Check field name 'tratamiento' first before field var 'x_tratamiento'
		$val = $CurrentForm->hasValue("tratamiento") ? $CurrentForm->getValue("tratamiento") : $CurrentForm->getValue("x_tratamiento");
		if (!$this->tratamiento->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tratamiento->Visible = FALSE; // Disable update for API request
			else
				$this->tratamiento->setFormValue($val);
		}

		// Check field name 'antecedentes' first before field var 'x_antecedentes'
		$val = $CurrentForm->hasValue("antecedentes") ? $CurrentForm->getValue("antecedentes") : $CurrentForm->getValue("x_antecedentes");
		if (!$this->antecedentes->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->antecedentes->Visible = FALSE; // Disable update for API request
			else
				$this->antecedentes->setFormValue($val);
		}

		// Check field name 'paraclinicos' first before field var 'x_paraclinicos'
		$val = $CurrentForm->hasValue("paraclinicos") ? $CurrentForm->getValue("paraclinicos") : $CurrentForm->getValue("x_paraclinicos");
		if (!$this->paraclinicos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->paraclinicos->Visible = FALSE; // Disable update for API request
			else
				$this->paraclinicos->setFormValue($val);
		}

		// Check field name 'sv_tx' first before field var 'x_sv_tx'
		$val = $CurrentForm->hasValue("sv_tx") ? $CurrentForm->getValue("sv_tx") : $CurrentForm->getValue("x_sv_tx");
		if (!$this->sv_tx->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_tx->Visible = FALSE; // Disable update for API request
			else
				$this->sv_tx->setFormValue($val);
		}

		// Check field name 'sv_fc' first before field var 'x_sv_fc'
		$val = $CurrentForm->hasValue("sv_fc") ? $CurrentForm->getValue("sv_fc") : $CurrentForm->getValue("x_sv_fc");
		if (!$this->sv_fc->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_fc->Visible = FALSE; // Disable update for API request
			else
				$this->sv_fc->setFormValue($val);
		}

		// Check field name 'sv_fr' first before field var 'x_sv_fr'
		$val = $CurrentForm->hasValue("sv_fr") ? $CurrentForm->getValue("sv_fr") : $CurrentForm->getValue("x_sv_fr");
		if (!$this->sv_fr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_fr->Visible = FALSE; // Disable update for API request
			else
				$this->sv_fr->setFormValue($val);
		}

		// Check field name 'sv_temp' first before field var 'x_sv_temp'
		$val = $CurrentForm->hasValue("sv_temp") ? $CurrentForm->getValue("sv_temp") : $CurrentForm->getValue("x_sv_temp");
		if (!$this->sv_temp->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_temp->Visible = FALSE; // Disable update for API request
			else
				$this->sv_temp->setFormValue($val);
		}

		// Check field name 'sv_gl' first before field var 'x_sv_gl'
		$val = $CurrentForm->hasValue("sv_gl") ? $CurrentForm->getValue("sv_gl") : $CurrentForm->getValue("x_sv_gl");
		if (!$this->sv_gl->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_gl->Visible = FALSE; // Disable update for API request
			else
				$this->sv_gl->setFormValue($val);
		}

		// Check field name 'peso' first before field var 'x_peso'
		$val = $CurrentForm->hasValue("peso") ? $CurrentForm->getValue("peso") : $CurrentForm->getValue("x_peso");
		if (!$this->peso->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->peso->Visible = FALSE; // Disable update for API request
			else
				$this->peso->setFormValue($val);
		}

		// Check field name 'talla' first before field var 'x_talla'
		$val = $CurrentForm->hasValue("talla") ? $CurrentForm->getValue("talla") : $CurrentForm->getValue("x_talla");
		if (!$this->talla->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->talla->Visible = FALSE; // Disable update for API request
			else
				$this->talla->setFormValue($val);
		}

		// Check field name 'sv_fcf' first before field var 'x_sv_fcf'
		$val = $CurrentForm->hasValue("sv_fcf") ? $CurrentForm->getValue("sv_fcf") : $CurrentForm->getValue("x_sv_fcf");
		if (!$this->sv_fcf->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_fcf->Visible = FALSE; // Disable update for API request
			else
				$this->sv_fcf->setFormValue($val);
		}

		// Check field name 'sv_satO2' first before field var 'x_sv_satO2'
		$val = $CurrentForm->hasValue("sv_satO2") ? $CurrentForm->getValue("sv_satO2") : $CurrentForm->getValue("x_sv_satO2");
		if (!$this->sv_satO2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_satO2->Visible = FALSE; // Disable update for API request
			else
				$this->sv_satO2->setFormValue($val);
		}

		// Check field name 'sv_apgar' first before field var 'x_sv_apgar'
		$val = $CurrentForm->hasValue("sv_apgar") ? $CurrentForm->getValue("sv_apgar") : $CurrentForm->getValue("x_sv_apgar");
		if (!$this->sv_apgar->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_apgar->Visible = FALSE; // Disable update for API request
			else
				$this->sv_apgar->setFormValue($val);
		}

		// Check field name 'sv_gli' first before field var 'x_sv_gli'
		$val = $CurrentForm->hasValue("sv_gli") ? $CurrentForm->getValue("sv_gli") : $CurrentForm->getValue("x_sv_gli");
		if (!$this->sv_gli->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sv_gli->Visible = FALSE; // Disable update for API request
			else
				$this->sv_gli->setFormValue($val);
		}

		// Check field name 'tipo_paciente' first before field var 'x_tipo_paciente'
		$val = $CurrentForm->hasValue("tipo_paciente") ? $CurrentForm->getValue("tipo_paciente") : $CurrentForm->getValue("x_tipo_paciente");
		if (!$this->tipo_paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_paciente->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_paciente->setFormValue($val);
		}

		// Check field name 'usu_sede' first before field var 'x_usu_sede'
		$val = $CurrentForm->hasValue("usu_sede") ? $CurrentForm->getValue("usu_sede") : $CurrentForm->getValue("x_usu_sede");
		if (!$this->usu_sede->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->usu_sede->Visible = FALSE; // Disable update for API request
			else
				$this->usu_sede->setFormValue($val);
		}

		// Check field name 'tiempo_enfermedad' first before field var 'x_tiempo_enfermedad'
		$val = $CurrentForm->hasValue("tiempo_enfermedad") ? $CurrentForm->getValue("tiempo_enfermedad") : $CurrentForm->getValue("x_tiempo_enfermedad");
		if (!$this->tiempo_enfermedad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tiempo_enfermedad->Visible = FALSE; // Disable update for API request
			else
				$this->tiempo_enfermedad->setFormValue($val);
		}

		// Check field name 'tipo_enfermedad' first before field var 'x_tipo_enfermedad'
		$val = $CurrentForm->hasValue("tipo_enfermedad") ? $CurrentForm->getValue("tipo_enfermedad") : $CurrentForm->getValue("x_tipo_enfermedad");
		if (!$this->tipo_enfermedad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_enfermedad->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_enfermedad->setFormValue($val);
		}

		// Check field name 'ap_med_paciente' first before field var 'x_ap_med_paciente'
		$val = $CurrentForm->hasValue("ap_med_paciente") ? $CurrentForm->getValue("ap_med_paciente") : $CurrentForm->getValue("x_ap_med_paciente");
		if (!$this->ap_med_paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_med_paciente->Visible = FALSE; // Disable update for API request
			else
				$this->ap_med_paciente->setFormValue($val);
		}

		// Check field name 'ap_diabetes' first before field var 'x_ap_diabetes'
		$val = $CurrentForm->hasValue("ap_diabetes") ? $CurrentForm->getValue("ap_diabetes") : $CurrentForm->getValue("x_ap_diabetes");
		if (!$this->ap_diabetes->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_diabetes->Visible = FALSE; // Disable update for API request
			else
				$this->ap_diabetes->setFormValue($val);
		}

		// Check field name 'ap_cardiop' first before field var 'x_ap_cardiop'
		$val = $CurrentForm->hasValue("ap_cardiop") ? $CurrentForm->getValue("ap_cardiop") : $CurrentForm->getValue("x_ap_cardiop");
		if (!$this->ap_cardiop->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_cardiop->Visible = FALSE; // Disable update for API request
			else
				$this->ap_cardiop->setFormValue($val);
		}

		// Check field name 'ap_convul' first before field var 'x_ap_convul'
		$val = $CurrentForm->hasValue("ap_convul") ? $CurrentForm->getValue("ap_convul") : $CurrentForm->getValue("x_ap_convul");
		if (!$this->ap_convul->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_convul->Visible = FALSE; // Disable update for API request
			else
				$this->ap_convul->setFormValue($val);
		}

		// Check field name 'ap_asma' first before field var 'x_ap_asma'
		$val = $CurrentForm->hasValue("ap_asma") ? $CurrentForm->getValue("ap_asma") : $CurrentForm->getValue("x_ap_asma");
		if (!$this->ap_asma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_asma->Visible = FALSE; // Disable update for API request
			else
				$this->ap_asma->setFormValue($val);
		}

		// Check field name 'ap_acv' first before field var 'x_ap_acv'
		$val = $CurrentForm->hasValue("ap_acv") ? $CurrentForm->getValue("ap_acv") : $CurrentForm->getValue("x_ap_acv");
		if (!$this->ap_acv->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_acv->Visible = FALSE; // Disable update for API request
			else
				$this->ap_acv->setFormValue($val);
		}

		// Check field name 'ap_has' first before field var 'x_ap_has'
		$val = $CurrentForm->hasValue("ap_has") ? $CurrentForm->getValue("ap_has") : $CurrentForm->getValue("x_ap_has");
		if (!$this->ap_has->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_has->Visible = FALSE; // Disable update for API request
			else
				$this->ap_has->setFormValue($val);
		}

		// Check field name 'ap_alergia' first before field var 'x_ap_alergia'
		$val = $CurrentForm->hasValue("ap_alergia") ? $CurrentForm->getValue("ap_alergia") : $CurrentForm->getValue("x_ap_alergia");
		if (!$this->ap_alergia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_alergia->Visible = FALSE; // Disable update for API request
			else
				$this->ap_alergia->setFormValue($val);
		}

		// Check field name 'ap_otros' first before field var 'x_ap_otros'
		$val = $CurrentForm->hasValue("ap_otros") ? $CurrentForm->getValue("ap_otros") : $CurrentForm->getValue("x_ap_otros");
		if (!$this->ap_otros->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ap_otros->Visible = FALSE; // Disable update for API request
			else
				$this->ap_otros->setFormValue($val);
		}

		// Check field name 'id_evaluacionclinica' first before field var 'x_id_evaluacionclinica'
		$val = $CurrentForm->hasValue("id_evaluacionclinica") ? $CurrentForm->getValue("id_evaluacionclinica") : $CurrentForm->getValue("x_id_evaluacionclinica");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casopreh->CurrentValue = $this->cod_casopreh->FormValue;
		$this->fecha_horaevaluacion->CurrentValue = $this->fecha_horaevaluacion->FormValue;
		$this->fecha_horaevaluacion->CurrentValue = UnFormatDateTime($this->fecha_horaevaluacion->CurrentValue, 0);
		$this->cod_paciente->CurrentValue = $this->cod_paciente->FormValue;
		$this->cod_diag_cie->CurrentValue = $this->cod_diag_cie->FormValue;
		$this->diagnos_txt->CurrentValue = $this->diagnos_txt->FormValue;
		$this->triage->CurrentValue = $this->triage->FormValue;
		$this->c_clinico->CurrentValue = $this->c_clinico->FormValue;
		$this->examen_fisico->CurrentValue = $this->examen_fisico->FormValue;
		$this->tratamiento->CurrentValue = $this->tratamiento->FormValue;
		$this->antecedentes->CurrentValue = $this->antecedentes->FormValue;
		$this->paraclinicos->CurrentValue = $this->paraclinicos->FormValue;
		$this->sv_tx->CurrentValue = $this->sv_tx->FormValue;
		$this->sv_fc->CurrentValue = $this->sv_fc->FormValue;
		$this->sv_fr->CurrentValue = $this->sv_fr->FormValue;
		$this->sv_temp->CurrentValue = $this->sv_temp->FormValue;
		$this->sv_gl->CurrentValue = $this->sv_gl->FormValue;
		$this->peso->CurrentValue = $this->peso->FormValue;
		$this->talla->CurrentValue = $this->talla->FormValue;
		$this->sv_fcf->CurrentValue = $this->sv_fcf->FormValue;
		$this->sv_satO2->CurrentValue = $this->sv_satO2->FormValue;
		$this->sv_apgar->CurrentValue = $this->sv_apgar->FormValue;
		$this->sv_gli->CurrentValue = $this->sv_gli->FormValue;
		$this->tipo_paciente->CurrentValue = $this->tipo_paciente->FormValue;
		$this->usu_sede->CurrentValue = $this->usu_sede->FormValue;
		$this->tiempo_enfermedad->CurrentValue = $this->tiempo_enfermedad->FormValue;
		$this->tipo_enfermedad->CurrentValue = $this->tipo_enfermedad->FormValue;
		$this->ap_med_paciente->CurrentValue = $this->ap_med_paciente->FormValue;
		$this->ap_diabetes->CurrentValue = $this->ap_diabetes->FormValue;
		$this->ap_cardiop->CurrentValue = $this->ap_cardiop->FormValue;
		$this->ap_convul->CurrentValue = $this->ap_convul->FormValue;
		$this->ap_asma->CurrentValue = $this->ap_asma->FormValue;
		$this->ap_acv->CurrentValue = $this->ap_acv->FormValue;
		$this->ap_has->CurrentValue = $this->ap_has->FormValue;
		$this->ap_alergia->CurrentValue = $this->ap_alergia->FormValue;
		$this->ap_otros->CurrentValue = $this->ap_otros->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id_evaluacionclinica->setDbValue($row['id_evaluacionclinica']);
		$this->cod_casopreh->setDbValue($row['cod_casopreh']);
		$this->fecha_horaevaluacion->setDbValue($row['fecha_horaevaluacion']);
		$this->cod_paciente->setDbValue($row['cod_paciente']);
		$this->cod_diag_cie->setDbValue($row['cod_diag_cie']);
		if (array_key_exists('EV__cod_diag_cie', $rs->fields)) {
			$this->cod_diag_cie->VirtualValue = $rs->fields('EV__cod_diag_cie'); // Set up virtual field value
		} else {
			$this->cod_diag_cie->VirtualValue = ""; // Clear value
		}
		$this->diagnos_txt->setDbValue($row['diagnos_txt']);
		$this->triage->setDbValue($row['triage']);
		$this->c_clinico->setDbValue($row['c_clinico']);
		$this->examen_fisico->setDbValue($row['examen_fisico']);
		$this->tratamiento->setDbValue($row['tratamiento']);
		$this->antecedentes->setDbValue($row['antecedentes']);
		$this->paraclinicos->setDbValue($row['paraclinicos']);
		$this->sv_tx->setDbValue($row['sv_tx']);
		$this->sv_fc->setDbValue($row['sv_fc']);
		$this->sv_fr->setDbValue($row['sv_fr']);
		$this->sv_temp->setDbValue($row['sv_temp']);
		$this->sv_gl->setDbValue($row['sv_gl']);
		$this->peso->setDbValue($row['peso']);
		$this->talla->setDbValue($row['talla']);
		$this->sv_fcf->setDbValue($row['sv_fcf']);
		$this->sv_satO2->setDbValue($row['sv_satO2']);
		$this->sv_apgar->setDbValue($row['sv_apgar']);
		$this->sv_gli->setDbValue($row['sv_gli']);
		$this->tipo_paciente->setDbValue($row['tipo_paciente']);
		$this->usu_sede->setDbValue($row['usu_sede']);
		$this->tiempo_enfermedad->setDbValue($row['tiempo_enfermedad']);
		$this->tipo_enfermedad->setDbValue($row['tipo_enfermedad']);
		$this->ap_med_paciente->setDbValue($row['ap_med_paciente']);
		$this->ap_diabetes->setDbValue($row['ap_diabetes']);
		$this->ap_cardiop->setDbValue($row['ap_cardiop']);
		$this->ap_convul->setDbValue($row['ap_convul']);
		$this->ap_asma->setDbValue($row['ap_asma']);
		$this->ap_acv->setDbValue($row['ap_acv']);
		$this->ap_has->setDbValue($row['ap_has']);
		$this->ap_alergia->setDbValue($row['ap_alergia']);
		$this->ap_otros->setDbValue($row['ap_otros']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_evaluacionclinica'] = $this->id_evaluacionclinica->CurrentValue;
		$row['cod_casopreh'] = $this->cod_casopreh->CurrentValue;
		$row['fecha_horaevaluacion'] = $this->fecha_horaevaluacion->CurrentValue;
		$row['cod_paciente'] = $this->cod_paciente->CurrentValue;
		$row['cod_diag_cie'] = $this->cod_diag_cie->CurrentValue;
		$row['diagnos_txt'] = $this->diagnos_txt->CurrentValue;
		$row['triage'] = $this->triage->CurrentValue;
		$row['c_clinico'] = $this->c_clinico->CurrentValue;
		$row['examen_fisico'] = $this->examen_fisico->CurrentValue;
		$row['tratamiento'] = $this->tratamiento->CurrentValue;
		$row['antecedentes'] = $this->antecedentes->CurrentValue;
		$row['paraclinicos'] = $this->paraclinicos->CurrentValue;
		$row['sv_tx'] = $this->sv_tx->CurrentValue;
		$row['sv_fc'] = $this->sv_fc->CurrentValue;
		$row['sv_fr'] = $this->sv_fr->CurrentValue;
		$row['sv_temp'] = $this->sv_temp->CurrentValue;
		$row['sv_gl'] = $this->sv_gl->CurrentValue;
		$row['peso'] = $this->peso->CurrentValue;
		$row['talla'] = $this->talla->CurrentValue;
		$row['sv_fcf'] = $this->sv_fcf->CurrentValue;
		$row['sv_satO2'] = $this->sv_satO2->CurrentValue;
		$row['sv_apgar'] = $this->sv_apgar->CurrentValue;
		$row['sv_gli'] = $this->sv_gli->CurrentValue;
		$row['tipo_paciente'] = $this->tipo_paciente->CurrentValue;
		$row['usu_sede'] = $this->usu_sede->CurrentValue;
		$row['tiempo_enfermedad'] = $this->tiempo_enfermedad->CurrentValue;
		$row['tipo_enfermedad'] = $this->tipo_enfermedad->CurrentValue;
		$row['ap_med_paciente'] = $this->ap_med_paciente->CurrentValue;
		$row['ap_diabetes'] = $this->ap_diabetes->CurrentValue;
		$row['ap_cardiop'] = $this->ap_cardiop->CurrentValue;
		$row['ap_convul'] = $this->ap_convul->CurrentValue;
		$row['ap_asma'] = $this->ap_asma->CurrentValue;
		$row['ap_acv'] = $this->ap_acv->CurrentValue;
		$row['ap_has'] = $this->ap_has->CurrentValue;
		$row['ap_alergia'] = $this->ap_alergia->CurrentValue;
		$row['ap_otros'] = $this->ap_otros->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_evaluacionclinica")) != "")
			$this->id_evaluacionclinica->OldValue = $this->getKey("id_evaluacionclinica"); // id_evaluacionclinica
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id_evaluacionclinica
		// cod_casopreh
		// fecha_horaevaluacion
		// cod_paciente
		// cod_diag_cie
		// diagnos_txt
		// triage
		// c_clinico
		// examen_fisico
		// tratamiento
		// antecedentes
		// paraclinicos
		// sv_tx
		// sv_fc
		// sv_fr
		// sv_temp
		// sv_gl
		// peso
		// talla
		// sv_fcf
		// sv_satO2
		// sv_apgar
		// sv_gli
		// tipo_paciente
		// usu_sede
		// tiempo_enfermedad
		// tipo_enfermedad
		// ap_med_paciente
		// ap_diabetes
		// ap_cardiop
		// ap_convul
		// ap_asma
		// ap_acv
		// ap_has
		// ap_alergia
		// ap_otros

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_evaluacionclinica
			$this->id_evaluacionclinica->ViewValue = $this->id_evaluacionclinica->CurrentValue;
			$this->id_evaluacionclinica->ViewCustomAttributes = "";

			// cod_casopreh
			$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
			$this->cod_casopreh->ViewValue = FormatNumber($this->cod_casopreh->ViewValue, 0, -2, -2, -2);
			$this->cod_casopreh->ViewCustomAttributes = "";

			// fecha_horaevaluacion
			$this->fecha_horaevaluacion->ViewValue = $this->fecha_horaevaluacion->CurrentValue;
			$this->fecha_horaevaluacion->ViewValue = FormatDateTime($this->fecha_horaevaluacion->ViewValue, 0);
			$this->fecha_horaevaluacion->ViewCustomAttributes = "";

			// cod_paciente
			$this->cod_paciente->ViewValue = $this->cod_paciente->CurrentValue;
			$this->cod_paciente->ViewCustomAttributes = "";

			// cod_diag_cie
			if ($this->cod_diag_cie->VirtualValue != "") {
				$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->VirtualValue;
			} else {
				$curVal = strval($this->cod_diag_cie->CurrentValue);
				if ($curVal != "") {
					$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->lookupCacheOption($curVal);
					if ($this->cod_diag_cie->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"codigo_cie\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->cod_diag_cie->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->CurrentValue;
						}
					}
				} else {
					$this->cod_diag_cie->ViewValue = NULL;
				}
			}
			$this->cod_diag_cie->ViewCustomAttributes = "";

			// diagnos_txt
			$this->diagnos_txt->ViewValue = $this->diagnos_txt->CurrentValue;
			$this->diagnos_txt->ViewCustomAttributes = "";

			// triage
			$curVal = strval($this->triage->CurrentValue);
			if ($curVal != "") {
				$this->triage->ViewValue = $this->triage->lookupCacheOption($curVal);
				if ($this->triage->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_triage\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->triage->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->triage->ViewValue = $this->triage->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->triage->ViewValue = $this->triage->CurrentValue;
					}
				}
			} else {
				$this->triage->ViewValue = NULL;
			}
			$this->triage->ViewCustomAttributes = "";

			// c_clinico
			$this->c_clinico->ViewValue = $this->c_clinico->CurrentValue;
			$this->c_clinico->ViewCustomAttributes = "";

			// examen_fisico
			$this->examen_fisico->ViewValue = $this->examen_fisico->CurrentValue;
			$this->examen_fisico->ViewCustomAttributes = "";

			// tratamiento
			$this->tratamiento->ViewValue = $this->tratamiento->CurrentValue;
			$this->tratamiento->ViewCustomAttributes = "";

			// antecedentes
			$this->antecedentes->ViewValue = $this->antecedentes->CurrentValue;
			$this->antecedentes->ViewCustomAttributes = "";

			// paraclinicos
			$this->paraclinicos->ViewValue = $this->paraclinicos->CurrentValue;
			$this->paraclinicos->ViewCustomAttributes = "";

			// sv_tx
			$this->sv_tx->ViewValue = $this->sv_tx->CurrentValue;
			$this->sv_tx->ViewCustomAttributes = "";

			// sv_fc
			$this->sv_fc->ViewValue = $this->sv_fc->CurrentValue;
			$this->sv_fc->ViewCustomAttributes = "";

			// sv_fr
			$this->sv_fr->ViewValue = $this->sv_fr->CurrentValue;
			$this->sv_fr->ViewCustomAttributes = "";

			// sv_temp
			$this->sv_temp->ViewValue = $this->sv_temp->CurrentValue;
			$this->sv_temp->ViewCustomAttributes = "";

			// sv_gl
			$this->sv_gl->ViewValue = $this->sv_gl->CurrentValue;
			$this->sv_gl->ViewCustomAttributes = "";

			// peso
			$this->peso->ViewValue = $this->peso->CurrentValue;
			$this->peso->ViewCustomAttributes = "";

			// talla
			$this->talla->ViewValue = $this->talla->CurrentValue;
			$this->talla->ViewCustomAttributes = "";

			// sv_fcf
			$this->sv_fcf->ViewValue = $this->sv_fcf->CurrentValue;
			$this->sv_fcf->ViewCustomAttributes = "";

			// sv_satO2
			$this->sv_satO2->ViewValue = $this->sv_satO2->CurrentValue;
			$this->sv_satO2->ViewCustomAttributes = "";

			// sv_apgar
			$this->sv_apgar->ViewValue = $this->sv_apgar->CurrentValue;
			$this->sv_apgar->ViewCustomAttributes = "";

			// sv_gli
			$this->sv_gli->ViewValue = $this->sv_gli->CurrentValue;
			$this->sv_gli->ViewCustomAttributes = "";

			// tipo_paciente
			$this->tipo_paciente->ViewValue = $this->tipo_paciente->CurrentValue;
			$this->tipo_paciente->ViewCustomAttributes = "";

			// usu_sede
			$this->usu_sede->ViewValue = $this->usu_sede->CurrentValue;
			$this->usu_sede->ViewCustomAttributes = "";

			// tiempo_enfermedad
			$this->tiempo_enfermedad->ViewValue = $this->tiempo_enfermedad->CurrentValue;
			$this->tiempo_enfermedad->ViewCustomAttributes = "";

			// tipo_enfermedad
			$this->tipo_enfermedad->ViewValue = $this->tipo_enfermedad->CurrentValue;
			$this->tipo_enfermedad->ViewValue = FormatNumber($this->tipo_enfermedad->ViewValue, 0, -2, -2, -2);
			$this->tipo_enfermedad->ViewCustomAttributes = "";

			// ap_med_paciente
			$this->ap_med_paciente->ViewValue = $this->ap_med_paciente->CurrentValue;
			$this->ap_med_paciente->ViewCustomAttributes = "";

			// ap_diabetes
			$this->ap_diabetes->ViewValue = $this->ap_diabetes->CurrentValue;
			$this->ap_diabetes->ViewCustomAttributes = "";

			// ap_cardiop
			$this->ap_cardiop->ViewValue = $this->ap_cardiop->CurrentValue;
			$this->ap_cardiop->ViewCustomAttributes = "";

			// ap_convul
			$this->ap_convul->ViewValue = $this->ap_convul->CurrentValue;
			$this->ap_convul->ViewCustomAttributes = "";

			// ap_asma
			$this->ap_asma->ViewValue = $this->ap_asma->CurrentValue;
			$this->ap_asma->ViewCustomAttributes = "";

			// ap_acv
			$this->ap_acv->ViewValue = $this->ap_acv->CurrentValue;
			$this->ap_acv->ViewCustomAttributes = "";

			// ap_has
			$this->ap_has->ViewValue = $this->ap_has->CurrentValue;
			$this->ap_has->ViewCustomAttributes = "";

			// ap_alergia
			$this->ap_alergia->ViewValue = $this->ap_alergia->CurrentValue;
			$this->ap_alergia->ViewCustomAttributes = "";

			// ap_otros
			$this->ap_otros->ViewValue = $this->ap_otros->CurrentValue;
			$this->ap_otros->ViewCustomAttributes = "";

			// cod_casopreh
			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";
			$this->cod_casopreh->TooltipValue = "";

			// fecha_horaevaluacion
			$this->fecha_horaevaluacion->LinkCustomAttributes = "";
			$this->fecha_horaevaluacion->HrefValue = "";
			$this->fecha_horaevaluacion->TooltipValue = "";

			// cod_paciente
			$this->cod_paciente->LinkCustomAttributes = "";
			$this->cod_paciente->HrefValue = "";
			$this->cod_paciente->TooltipValue = "";

			// cod_diag_cie
			$this->cod_diag_cie->LinkCustomAttributes = "";
			$this->cod_diag_cie->HrefValue = "";
			$this->cod_diag_cie->TooltipValue = "";

			// diagnos_txt
			$this->diagnos_txt->LinkCustomAttributes = "";
			$this->diagnos_txt->HrefValue = "";
			$this->diagnos_txt->TooltipValue = "";

			// triage
			$this->triage->LinkCustomAttributes = "";
			$this->triage->HrefValue = "";
			$this->triage->TooltipValue = "";

			// c_clinico
			$this->c_clinico->LinkCustomAttributes = "";
			$this->c_clinico->HrefValue = "";
			$this->c_clinico->TooltipValue = "";

			// examen_fisico
			$this->examen_fisico->LinkCustomAttributes = "";
			$this->examen_fisico->HrefValue = "";
			$this->examen_fisico->TooltipValue = "";

			// tratamiento
			$this->tratamiento->LinkCustomAttributes = "";
			$this->tratamiento->HrefValue = "";
			$this->tratamiento->TooltipValue = "";

			// antecedentes
			$this->antecedentes->LinkCustomAttributes = "";
			$this->antecedentes->HrefValue = "";
			$this->antecedentes->TooltipValue = "";

			// paraclinicos
			$this->paraclinicos->LinkCustomAttributes = "";
			$this->paraclinicos->HrefValue = "";
			$this->paraclinicos->TooltipValue = "";

			// sv_tx
			$this->sv_tx->LinkCustomAttributes = "";
			$this->sv_tx->HrefValue = "";
			$this->sv_tx->TooltipValue = "";

			// sv_fc
			$this->sv_fc->LinkCustomAttributes = "";
			$this->sv_fc->HrefValue = "";
			$this->sv_fc->TooltipValue = "";

			// sv_fr
			$this->sv_fr->LinkCustomAttributes = "";
			$this->sv_fr->HrefValue = "";
			$this->sv_fr->TooltipValue = "";

			// sv_temp
			$this->sv_temp->LinkCustomAttributes = "";
			$this->sv_temp->HrefValue = "";
			$this->sv_temp->TooltipValue = "";

			// sv_gl
			$this->sv_gl->LinkCustomAttributes = "";
			$this->sv_gl->HrefValue = "";
			$this->sv_gl->TooltipValue = "";

			// peso
			$this->peso->LinkCustomAttributes = "";
			$this->peso->HrefValue = "";
			$this->peso->TooltipValue = "";

			// talla
			$this->talla->LinkCustomAttributes = "";
			$this->talla->HrefValue = "";
			$this->talla->TooltipValue = "";

			// sv_fcf
			$this->sv_fcf->LinkCustomAttributes = "";
			$this->sv_fcf->HrefValue = "";
			$this->sv_fcf->TooltipValue = "";

			// sv_satO2
			$this->sv_satO2->LinkCustomAttributes = "";
			$this->sv_satO2->HrefValue = "";
			$this->sv_satO2->TooltipValue = "";

			// sv_apgar
			$this->sv_apgar->LinkCustomAttributes = "";
			$this->sv_apgar->HrefValue = "";
			$this->sv_apgar->TooltipValue = "";

			// sv_gli
			$this->sv_gli->LinkCustomAttributes = "";
			$this->sv_gli->HrefValue = "";
			$this->sv_gli->TooltipValue = "";

			// tipo_paciente
			$this->tipo_paciente->LinkCustomAttributes = "";
			$this->tipo_paciente->HrefValue = "";
			$this->tipo_paciente->TooltipValue = "";

			// usu_sede
			$this->usu_sede->LinkCustomAttributes = "";
			$this->usu_sede->HrefValue = "";
			$this->usu_sede->TooltipValue = "";

			// tiempo_enfermedad
			$this->tiempo_enfermedad->LinkCustomAttributes = "";
			$this->tiempo_enfermedad->HrefValue = "";
			$this->tiempo_enfermedad->TooltipValue = "";

			// tipo_enfermedad
			$this->tipo_enfermedad->LinkCustomAttributes = "";
			$this->tipo_enfermedad->HrefValue = "";
			$this->tipo_enfermedad->TooltipValue = "";

			// ap_med_paciente
			$this->ap_med_paciente->LinkCustomAttributes = "";
			$this->ap_med_paciente->HrefValue = "";
			$this->ap_med_paciente->TooltipValue = "";

			// ap_diabetes
			$this->ap_diabetes->LinkCustomAttributes = "";
			$this->ap_diabetes->HrefValue = "";
			$this->ap_diabetes->TooltipValue = "";

			// ap_cardiop
			$this->ap_cardiop->LinkCustomAttributes = "";
			$this->ap_cardiop->HrefValue = "";
			$this->ap_cardiop->TooltipValue = "";

			// ap_convul
			$this->ap_convul->LinkCustomAttributes = "";
			$this->ap_convul->HrefValue = "";
			$this->ap_convul->TooltipValue = "";

			// ap_asma
			$this->ap_asma->LinkCustomAttributes = "";
			$this->ap_asma->HrefValue = "";
			$this->ap_asma->TooltipValue = "";

			// ap_acv
			$this->ap_acv->LinkCustomAttributes = "";
			$this->ap_acv->HrefValue = "";
			$this->ap_acv->TooltipValue = "";

			// ap_has
			$this->ap_has->LinkCustomAttributes = "";
			$this->ap_has->HrefValue = "";
			$this->ap_has->TooltipValue = "";

			// ap_alergia
			$this->ap_alergia->LinkCustomAttributes = "";
			$this->ap_alergia->HrefValue = "";
			$this->ap_alergia->TooltipValue = "";

			// ap_otros
			$this->ap_otros->LinkCustomAttributes = "";
			$this->ap_otros->HrefValue = "";
			$this->ap_otros->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// cod_casopreh
			$this->cod_casopreh->EditAttrs["class"] = "form-control";
			$this->cod_casopreh->EditCustomAttributes = "HIDDEN";
			$this->cod_casopreh->EditValue = HtmlEncode($this->cod_casopreh->CurrentValue);
			$this->cod_casopreh->PlaceHolder = RemoveHtml($this->cod_casopreh->caption());

			// fecha_horaevaluacion
			// cod_paciente

			$this->cod_paciente->EditAttrs["class"] = "form-control";
			$this->cod_paciente->EditCustomAttributes = "";
			if (!$this->cod_paciente->Raw)
				$this->cod_paciente->CurrentValue = HtmlDecode($this->cod_paciente->CurrentValue);
			$this->cod_paciente->EditValue = HtmlEncode($this->cod_paciente->CurrentValue);
			$this->cod_paciente->PlaceHolder = RemoveHtml($this->cod_paciente->caption());

			// cod_diag_cie
			$this->cod_diag_cie->EditCustomAttributes = "";
			$curVal = trim(strval($this->cod_diag_cie->CurrentValue));
			if ($curVal != "")
				$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->lookupCacheOption($curVal);
			else
				$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->Lookup !== NULL && is_array($this->cod_diag_cie->Lookup->Options) ? $curVal : NULL;
			if ($this->cod_diag_cie->ViewValue !== NULL) { // Load from cache
				$this->cod_diag_cie->EditValue = array_values($this->cod_diag_cie->Lookup->Options);
				if ($this->cod_diag_cie->ViewValue == "")
					$this->cod_diag_cie->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"codigo_cie\"" . SearchString("=", $this->cod_diag_cie->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->cod_diag_cie->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->displayValue($arwrk);
				} else {
					$this->cod_diag_cie->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->cod_diag_cie->EditValue = $arwrk;
			}

			// diagnos_txt
			$this->diagnos_txt->EditAttrs["class"] = "form-control";
			$this->diagnos_txt->EditCustomAttributes = "";
			$this->diagnos_txt->EditValue = HtmlEncode($this->diagnos_txt->CurrentValue);
			$this->diagnos_txt->PlaceHolder = RemoveHtml($this->diagnos_txt->caption());

			// triage
			$this->triage->EditAttrs["class"] = "form-control";
			$this->triage->EditCustomAttributes = "";
			$curVal = trim(strval($this->triage->CurrentValue));
			if ($curVal != "")
				$this->triage->ViewValue = $this->triage->lookupCacheOption($curVal);
			else
				$this->triage->ViewValue = $this->triage->Lookup !== NULL && is_array($this->triage->Lookup->Options) ? $curVal : NULL;
			if ($this->triage->ViewValue !== NULL) { // Load from cache
				$this->triage->EditValue = array_values($this->triage->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_triage\"" . SearchString("=", $this->triage->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->triage->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->triage->EditValue = $arwrk;
			}

			// c_clinico
			$this->c_clinico->EditAttrs["class"] = "form-control";
			$this->c_clinico->EditCustomAttributes = "";
			$this->c_clinico->EditValue = HtmlEncode($this->c_clinico->CurrentValue);
			$this->c_clinico->PlaceHolder = RemoveHtml($this->c_clinico->caption());

			// examen_fisico
			$this->examen_fisico->EditAttrs["class"] = "form-control";
			$this->examen_fisico->EditCustomAttributes = "";
			$this->examen_fisico->EditValue = HtmlEncode($this->examen_fisico->CurrentValue);
			$this->examen_fisico->PlaceHolder = RemoveHtml($this->examen_fisico->caption());

			// tratamiento
			$this->tratamiento->EditAttrs["class"] = "form-control";
			$this->tratamiento->EditCustomAttributes = "";
			$this->tratamiento->EditValue = HtmlEncode($this->tratamiento->CurrentValue);
			$this->tratamiento->PlaceHolder = RemoveHtml($this->tratamiento->caption());

			// antecedentes
			$this->antecedentes->EditAttrs["class"] = "form-control";
			$this->antecedentes->EditCustomAttributes = "";
			$this->antecedentes->EditValue = HtmlEncode($this->antecedentes->CurrentValue);
			$this->antecedentes->PlaceHolder = RemoveHtml($this->antecedentes->caption());

			// paraclinicos
			$this->paraclinicos->EditAttrs["class"] = "form-control";
			$this->paraclinicos->EditCustomAttributes = "";
			$this->paraclinicos->EditValue = HtmlEncode($this->paraclinicos->CurrentValue);
			$this->paraclinicos->PlaceHolder = RemoveHtml($this->paraclinicos->caption());

			// sv_tx
			$this->sv_tx->EditAttrs["class"] = "form-control";
			$this->sv_tx->EditCustomAttributes = "";
			if (!$this->sv_tx->Raw)
				$this->sv_tx->CurrentValue = HtmlDecode($this->sv_tx->CurrentValue);
			$this->sv_tx->EditValue = HtmlEncode($this->sv_tx->CurrentValue);
			$this->sv_tx->PlaceHolder = RemoveHtml($this->sv_tx->caption());

			// sv_fc
			$this->sv_fc->EditAttrs["class"] = "form-control";
			$this->sv_fc->EditCustomAttributes = "";
			if (!$this->sv_fc->Raw)
				$this->sv_fc->CurrentValue = HtmlDecode($this->sv_fc->CurrentValue);
			$this->sv_fc->EditValue = HtmlEncode($this->sv_fc->CurrentValue);
			$this->sv_fc->PlaceHolder = RemoveHtml($this->sv_fc->caption());

			// sv_fr
			$this->sv_fr->EditAttrs["class"] = "form-control";
			$this->sv_fr->EditCustomAttributes = "";
			if (!$this->sv_fr->Raw)
				$this->sv_fr->CurrentValue = HtmlDecode($this->sv_fr->CurrentValue);
			$this->sv_fr->EditValue = HtmlEncode($this->sv_fr->CurrentValue);
			$this->sv_fr->PlaceHolder = RemoveHtml($this->sv_fr->caption());

			// sv_temp
			$this->sv_temp->EditAttrs["class"] = "form-control";
			$this->sv_temp->EditCustomAttributes = "";
			if (!$this->sv_temp->Raw)
				$this->sv_temp->CurrentValue = HtmlDecode($this->sv_temp->CurrentValue);
			$this->sv_temp->EditValue = HtmlEncode($this->sv_temp->CurrentValue);
			$this->sv_temp->PlaceHolder = RemoveHtml($this->sv_temp->caption());

			// sv_gl
			$this->sv_gl->EditAttrs["class"] = "form-control";
			$this->sv_gl->EditCustomAttributes = "";
			if (!$this->sv_gl->Raw)
				$this->sv_gl->CurrentValue = HtmlDecode($this->sv_gl->CurrentValue);
			$this->sv_gl->EditValue = HtmlEncode($this->sv_gl->CurrentValue);
			$this->sv_gl->PlaceHolder = RemoveHtml($this->sv_gl->caption());

			// peso
			$this->peso->EditAttrs["class"] = "form-control";
			$this->peso->EditCustomAttributes = "";
			if (!$this->peso->Raw)
				$this->peso->CurrentValue = HtmlDecode($this->peso->CurrentValue);
			$this->peso->EditValue = HtmlEncode($this->peso->CurrentValue);
			$this->peso->PlaceHolder = RemoveHtml($this->peso->caption());

			// talla
			$this->talla->EditAttrs["class"] = "form-control";
			$this->talla->EditCustomAttributes = "";
			if (!$this->talla->Raw)
				$this->talla->CurrentValue = HtmlDecode($this->talla->CurrentValue);
			$this->talla->EditValue = HtmlEncode($this->talla->CurrentValue);
			$this->talla->PlaceHolder = RemoveHtml($this->talla->caption());

			// sv_fcf
			$this->sv_fcf->EditAttrs["class"] = "form-control";
			$this->sv_fcf->EditCustomAttributes = "";
			if (!$this->sv_fcf->Raw)
				$this->sv_fcf->CurrentValue = HtmlDecode($this->sv_fcf->CurrentValue);
			$this->sv_fcf->EditValue = HtmlEncode($this->sv_fcf->CurrentValue);
			$this->sv_fcf->PlaceHolder = RemoveHtml($this->sv_fcf->caption());

			// sv_satO2
			$this->sv_satO2->EditAttrs["class"] = "form-control";
			$this->sv_satO2->EditCustomAttributes = "";
			if (!$this->sv_satO2->Raw)
				$this->sv_satO2->CurrentValue = HtmlDecode($this->sv_satO2->CurrentValue);
			$this->sv_satO2->EditValue = HtmlEncode($this->sv_satO2->CurrentValue);
			$this->sv_satO2->PlaceHolder = RemoveHtml($this->sv_satO2->caption());

			// sv_apgar
			$this->sv_apgar->EditAttrs["class"] = "form-control";
			$this->sv_apgar->EditCustomAttributes = "";
			if (!$this->sv_apgar->Raw)
				$this->sv_apgar->CurrentValue = HtmlDecode($this->sv_apgar->CurrentValue);
			$this->sv_apgar->EditValue = HtmlEncode($this->sv_apgar->CurrentValue);
			$this->sv_apgar->PlaceHolder = RemoveHtml($this->sv_apgar->caption());

			// sv_gli
			$this->sv_gli->EditAttrs["class"] = "form-control";
			$this->sv_gli->EditCustomAttributes = "";
			if (!$this->sv_gli->Raw)
				$this->sv_gli->CurrentValue = HtmlDecode($this->sv_gli->CurrentValue);
			$this->sv_gli->EditValue = HtmlEncode($this->sv_gli->CurrentValue);
			$this->sv_gli->PlaceHolder = RemoveHtml($this->sv_gli->caption());

			// tipo_paciente
			$this->tipo_paciente->EditAttrs["class"] = "form-control";
			$this->tipo_paciente->EditCustomAttributes = "";
			if (!$this->tipo_paciente->Raw)
				$this->tipo_paciente->CurrentValue = HtmlDecode($this->tipo_paciente->CurrentValue);
			$this->tipo_paciente->EditValue = HtmlEncode($this->tipo_paciente->CurrentValue);
			$this->tipo_paciente->PlaceHolder = RemoveHtml($this->tipo_paciente->caption());

			// usu_sede
			$this->usu_sede->EditAttrs["class"] = "form-control";
			$this->usu_sede->EditCustomAttributes = "";
			if (!$this->usu_sede->Raw)
				$this->usu_sede->CurrentValue = HtmlDecode($this->usu_sede->CurrentValue);
			$this->usu_sede->EditValue = HtmlEncode($this->usu_sede->CurrentValue);
			$this->usu_sede->PlaceHolder = RemoveHtml($this->usu_sede->caption());

			// tiempo_enfermedad
			$this->tiempo_enfermedad->EditAttrs["class"] = "form-control";
			$this->tiempo_enfermedad->EditCustomAttributes = "";
			if (!$this->tiempo_enfermedad->Raw)
				$this->tiempo_enfermedad->CurrentValue = HtmlDecode($this->tiempo_enfermedad->CurrentValue);
			$this->tiempo_enfermedad->EditValue = HtmlEncode($this->tiempo_enfermedad->CurrentValue);
			$this->tiempo_enfermedad->PlaceHolder = RemoveHtml($this->tiempo_enfermedad->caption());

			// tipo_enfermedad
			$this->tipo_enfermedad->EditAttrs["class"] = "form-control";
			$this->tipo_enfermedad->EditCustomAttributes = "";
			$this->tipo_enfermedad->EditValue = HtmlEncode($this->tipo_enfermedad->CurrentValue);
			$this->tipo_enfermedad->PlaceHolder = RemoveHtml($this->tipo_enfermedad->caption());

			// ap_med_paciente
			$this->ap_med_paciente->EditAttrs["class"] = "form-control";
			$this->ap_med_paciente->EditCustomAttributes = "";
			$this->ap_med_paciente->EditValue = HtmlEncode($this->ap_med_paciente->CurrentValue);
			$this->ap_med_paciente->PlaceHolder = RemoveHtml($this->ap_med_paciente->caption());

			// ap_diabetes
			$this->ap_diabetes->EditAttrs["class"] = "form-control";
			$this->ap_diabetes->EditCustomAttributes = "";
			if (!$this->ap_diabetes->Raw)
				$this->ap_diabetes->CurrentValue = HtmlDecode($this->ap_diabetes->CurrentValue);
			$this->ap_diabetes->EditValue = HtmlEncode($this->ap_diabetes->CurrentValue);
			$this->ap_diabetes->PlaceHolder = RemoveHtml($this->ap_diabetes->caption());

			// ap_cardiop
			$this->ap_cardiop->EditAttrs["class"] = "form-control";
			$this->ap_cardiop->EditCustomAttributes = "";
			if (!$this->ap_cardiop->Raw)
				$this->ap_cardiop->CurrentValue = HtmlDecode($this->ap_cardiop->CurrentValue);
			$this->ap_cardiop->EditValue = HtmlEncode($this->ap_cardiop->CurrentValue);
			$this->ap_cardiop->PlaceHolder = RemoveHtml($this->ap_cardiop->caption());

			// ap_convul
			$this->ap_convul->EditAttrs["class"] = "form-control";
			$this->ap_convul->EditCustomAttributes = "";
			if (!$this->ap_convul->Raw)
				$this->ap_convul->CurrentValue = HtmlDecode($this->ap_convul->CurrentValue);
			$this->ap_convul->EditValue = HtmlEncode($this->ap_convul->CurrentValue);
			$this->ap_convul->PlaceHolder = RemoveHtml($this->ap_convul->caption());

			// ap_asma
			$this->ap_asma->EditAttrs["class"] = "form-control";
			$this->ap_asma->EditCustomAttributes = "";
			if (!$this->ap_asma->Raw)
				$this->ap_asma->CurrentValue = HtmlDecode($this->ap_asma->CurrentValue);
			$this->ap_asma->EditValue = HtmlEncode($this->ap_asma->CurrentValue);
			$this->ap_asma->PlaceHolder = RemoveHtml($this->ap_asma->caption());

			// ap_acv
			$this->ap_acv->EditAttrs["class"] = "form-control";
			$this->ap_acv->EditCustomAttributes = "";
			if (!$this->ap_acv->Raw)
				$this->ap_acv->CurrentValue = HtmlDecode($this->ap_acv->CurrentValue);
			$this->ap_acv->EditValue = HtmlEncode($this->ap_acv->CurrentValue);
			$this->ap_acv->PlaceHolder = RemoveHtml($this->ap_acv->caption());

			// ap_has
			$this->ap_has->EditAttrs["class"] = "form-control";
			$this->ap_has->EditCustomAttributes = "";
			if (!$this->ap_has->Raw)
				$this->ap_has->CurrentValue = HtmlDecode($this->ap_has->CurrentValue);
			$this->ap_has->EditValue = HtmlEncode($this->ap_has->CurrentValue);
			$this->ap_has->PlaceHolder = RemoveHtml($this->ap_has->caption());

			// ap_alergia
			$this->ap_alergia->EditAttrs["class"] = "form-control";
			$this->ap_alergia->EditCustomAttributes = "";
			if (!$this->ap_alergia->Raw)
				$this->ap_alergia->CurrentValue = HtmlDecode($this->ap_alergia->CurrentValue);
			$this->ap_alergia->EditValue = HtmlEncode($this->ap_alergia->CurrentValue);
			$this->ap_alergia->PlaceHolder = RemoveHtml($this->ap_alergia->caption());

			// ap_otros
			$this->ap_otros->EditAttrs["class"] = "form-control";
			$this->ap_otros->EditCustomAttributes = "";
			$this->ap_otros->EditValue = HtmlEncode($this->ap_otros->CurrentValue);
			$this->ap_otros->PlaceHolder = RemoveHtml($this->ap_otros->caption());

			// Add refer script
			// cod_casopreh

			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";

			// fecha_horaevaluacion
			$this->fecha_horaevaluacion->LinkCustomAttributes = "";
			$this->fecha_horaevaluacion->HrefValue = "";

			// cod_paciente
			$this->cod_paciente->LinkCustomAttributes = "";
			$this->cod_paciente->HrefValue = "";

			// cod_diag_cie
			$this->cod_diag_cie->LinkCustomAttributes = "";
			$this->cod_diag_cie->HrefValue = "";

			// diagnos_txt
			$this->diagnos_txt->LinkCustomAttributes = "";
			$this->diagnos_txt->HrefValue = "";

			// triage
			$this->triage->LinkCustomAttributes = "";
			$this->triage->HrefValue = "";

			// c_clinico
			$this->c_clinico->LinkCustomAttributes = "";
			$this->c_clinico->HrefValue = "";

			// examen_fisico
			$this->examen_fisico->LinkCustomAttributes = "";
			$this->examen_fisico->HrefValue = "";

			// tratamiento
			$this->tratamiento->LinkCustomAttributes = "";
			$this->tratamiento->HrefValue = "";

			// antecedentes
			$this->antecedentes->LinkCustomAttributes = "";
			$this->antecedentes->HrefValue = "";

			// paraclinicos
			$this->paraclinicos->LinkCustomAttributes = "";
			$this->paraclinicos->HrefValue = "";

			// sv_tx
			$this->sv_tx->LinkCustomAttributes = "";
			$this->sv_tx->HrefValue = "";

			// sv_fc
			$this->sv_fc->LinkCustomAttributes = "";
			$this->sv_fc->HrefValue = "";

			// sv_fr
			$this->sv_fr->LinkCustomAttributes = "";
			$this->sv_fr->HrefValue = "";

			// sv_temp
			$this->sv_temp->LinkCustomAttributes = "";
			$this->sv_temp->HrefValue = "";

			// sv_gl
			$this->sv_gl->LinkCustomAttributes = "";
			$this->sv_gl->HrefValue = "";

			// peso
			$this->peso->LinkCustomAttributes = "";
			$this->peso->HrefValue = "";

			// talla
			$this->talla->LinkCustomAttributes = "";
			$this->talla->HrefValue = "";

			// sv_fcf
			$this->sv_fcf->LinkCustomAttributes = "";
			$this->sv_fcf->HrefValue = "";

			// sv_satO2
			$this->sv_satO2->LinkCustomAttributes = "";
			$this->sv_satO2->HrefValue = "";

			// sv_apgar
			$this->sv_apgar->LinkCustomAttributes = "";
			$this->sv_apgar->HrefValue = "";

			// sv_gli
			$this->sv_gli->LinkCustomAttributes = "";
			$this->sv_gli->HrefValue = "";

			// tipo_paciente
			$this->tipo_paciente->LinkCustomAttributes = "";
			$this->tipo_paciente->HrefValue = "";

			// usu_sede
			$this->usu_sede->LinkCustomAttributes = "";
			$this->usu_sede->HrefValue = "";

			// tiempo_enfermedad
			$this->tiempo_enfermedad->LinkCustomAttributes = "";
			$this->tiempo_enfermedad->HrefValue = "";

			// tipo_enfermedad
			$this->tipo_enfermedad->LinkCustomAttributes = "";
			$this->tipo_enfermedad->HrefValue = "";

			// ap_med_paciente
			$this->ap_med_paciente->LinkCustomAttributes = "";
			$this->ap_med_paciente->HrefValue = "";

			// ap_diabetes
			$this->ap_diabetes->LinkCustomAttributes = "";
			$this->ap_diabetes->HrefValue = "";

			// ap_cardiop
			$this->ap_cardiop->LinkCustomAttributes = "";
			$this->ap_cardiop->HrefValue = "";

			// ap_convul
			$this->ap_convul->LinkCustomAttributes = "";
			$this->ap_convul->HrefValue = "";

			// ap_asma
			$this->ap_asma->LinkCustomAttributes = "";
			$this->ap_asma->HrefValue = "";

			// ap_acv
			$this->ap_acv->LinkCustomAttributes = "";
			$this->ap_acv->HrefValue = "";

			// ap_has
			$this->ap_has->LinkCustomAttributes = "";
			$this->ap_has->HrefValue = "";

			// ap_alergia
			$this->ap_alergia->LinkCustomAttributes = "";
			$this->ap_alergia->HrefValue = "";

			// ap_otros
			$this->ap_otros->LinkCustomAttributes = "";
			$this->ap_otros->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->cod_casopreh->Required) {
			if (!$this->cod_casopreh->IsDetailKey && $this->cod_casopreh->FormValue != NULL && $this->cod_casopreh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_casopreh->caption(), $this->cod_casopreh->RequiredErrorMessage));
			}
		}
		if ($this->fecha_horaevaluacion->Required) {
			if (!$this->fecha_horaevaluacion->IsDetailKey && $this->fecha_horaevaluacion->FormValue != NULL && $this->fecha_horaevaluacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_horaevaluacion->caption(), $this->fecha_horaevaluacion->RequiredErrorMessage));
			}
		}
		if ($this->cod_paciente->Required) {
			if (!$this->cod_paciente->IsDetailKey && $this->cod_paciente->FormValue != NULL && $this->cod_paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_paciente->caption(), $this->cod_paciente->RequiredErrorMessage));
			}
		}
		if ($this->cod_diag_cie->Required) {
			if (!$this->cod_diag_cie->IsDetailKey && $this->cod_diag_cie->FormValue != NULL && $this->cod_diag_cie->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_diag_cie->caption(), $this->cod_diag_cie->RequiredErrorMessage));
			}
		}
		if ($this->diagnos_txt->Required) {
			if (!$this->diagnos_txt->IsDetailKey && $this->diagnos_txt->FormValue != NULL && $this->diagnos_txt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diagnos_txt->caption(), $this->diagnos_txt->RequiredErrorMessage));
			}
		}
		if ($this->triage->Required) {
			if (!$this->triage->IsDetailKey && $this->triage->FormValue != NULL && $this->triage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->triage->caption(), $this->triage->RequiredErrorMessage));
			}
		}
		if ($this->c_clinico->Required) {
			if (!$this->c_clinico->IsDetailKey && $this->c_clinico->FormValue != NULL && $this->c_clinico->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->c_clinico->caption(), $this->c_clinico->RequiredErrorMessage));
			}
		}
		if ($this->examen_fisico->Required) {
			if (!$this->examen_fisico->IsDetailKey && $this->examen_fisico->FormValue != NULL && $this->examen_fisico->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->examen_fisico->caption(), $this->examen_fisico->RequiredErrorMessage));
			}
		}
		if ($this->tratamiento->Required) {
			if (!$this->tratamiento->IsDetailKey && $this->tratamiento->FormValue != NULL && $this->tratamiento->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tratamiento->caption(), $this->tratamiento->RequiredErrorMessage));
			}
		}
		if ($this->antecedentes->Required) {
			if (!$this->antecedentes->IsDetailKey && $this->antecedentes->FormValue != NULL && $this->antecedentes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->antecedentes->caption(), $this->antecedentes->RequiredErrorMessage));
			}
		}
		if ($this->paraclinicos->Required) {
			if (!$this->paraclinicos->IsDetailKey && $this->paraclinicos->FormValue != NULL && $this->paraclinicos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paraclinicos->caption(), $this->paraclinicos->RequiredErrorMessage));
			}
		}
		if ($this->sv_tx->Required) {
			if (!$this->sv_tx->IsDetailKey && $this->sv_tx->FormValue != NULL && $this->sv_tx->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_tx->caption(), $this->sv_tx->RequiredErrorMessage));
			}
		}
		if ($this->sv_fc->Required) {
			if (!$this->sv_fc->IsDetailKey && $this->sv_fc->FormValue != NULL && $this->sv_fc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_fc->caption(), $this->sv_fc->RequiredErrorMessage));
			}
		}
		if ($this->sv_fr->Required) {
			if (!$this->sv_fr->IsDetailKey && $this->sv_fr->FormValue != NULL && $this->sv_fr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_fr->caption(), $this->sv_fr->RequiredErrorMessage));
			}
		}
		if ($this->sv_temp->Required) {
			if (!$this->sv_temp->IsDetailKey && $this->sv_temp->FormValue != NULL && $this->sv_temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_temp->caption(), $this->sv_temp->RequiredErrorMessage));
			}
		}
		if ($this->sv_gl->Required) {
			if (!$this->sv_gl->IsDetailKey && $this->sv_gl->FormValue != NULL && $this->sv_gl->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_gl->caption(), $this->sv_gl->RequiredErrorMessage));
			}
		}
		if ($this->peso->Required) {
			if (!$this->peso->IsDetailKey && $this->peso->FormValue != NULL && $this->peso->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->peso->caption(), $this->peso->RequiredErrorMessage));
			}
		}
		if ($this->talla->Required) {
			if (!$this->talla->IsDetailKey && $this->talla->FormValue != NULL && $this->talla->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->talla->caption(), $this->talla->RequiredErrorMessage));
			}
		}
		if ($this->sv_fcf->Required) {
			if (!$this->sv_fcf->IsDetailKey && $this->sv_fcf->FormValue != NULL && $this->sv_fcf->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_fcf->caption(), $this->sv_fcf->RequiredErrorMessage));
			}
		}
		if ($this->sv_satO2->Required) {
			if (!$this->sv_satO2->IsDetailKey && $this->sv_satO2->FormValue != NULL && $this->sv_satO2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_satO2->caption(), $this->sv_satO2->RequiredErrorMessage));
			}
		}
		if ($this->sv_apgar->Required) {
			if (!$this->sv_apgar->IsDetailKey && $this->sv_apgar->FormValue != NULL && $this->sv_apgar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_apgar->caption(), $this->sv_apgar->RequiredErrorMessage));
			}
		}
		if ($this->sv_gli->Required) {
			if (!$this->sv_gli->IsDetailKey && $this->sv_gli->FormValue != NULL && $this->sv_gli->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sv_gli->caption(), $this->sv_gli->RequiredErrorMessage));
			}
		}
		if ($this->tipo_paciente->Required) {
			if (!$this->tipo_paciente->IsDetailKey && $this->tipo_paciente->FormValue != NULL && $this->tipo_paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_paciente->caption(), $this->tipo_paciente->RequiredErrorMessage));
			}
		}
		if ($this->usu_sede->Required) {
			if (!$this->usu_sede->IsDetailKey && $this->usu_sede->FormValue != NULL && $this->usu_sede->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usu_sede->caption(), $this->usu_sede->RequiredErrorMessage));
			}
		}
		if ($this->tiempo_enfermedad->Required) {
			if (!$this->tiempo_enfermedad->IsDetailKey && $this->tiempo_enfermedad->FormValue != NULL && $this->tiempo_enfermedad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tiempo_enfermedad->caption(), $this->tiempo_enfermedad->RequiredErrorMessage));
			}
		}
		if ($this->tipo_enfermedad->Required) {
			if (!$this->tipo_enfermedad->IsDetailKey && $this->tipo_enfermedad->FormValue != NULL && $this->tipo_enfermedad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_enfermedad->caption(), $this->tipo_enfermedad->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tipo_enfermedad->FormValue)) {
			AddMessage($FormError, $this->tipo_enfermedad->errorMessage());
		}
		if ($this->ap_med_paciente->Required) {
			if (!$this->ap_med_paciente->IsDetailKey && $this->ap_med_paciente->FormValue != NULL && $this->ap_med_paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_med_paciente->caption(), $this->ap_med_paciente->RequiredErrorMessage));
			}
		}
		if ($this->ap_diabetes->Required) {
			if (!$this->ap_diabetes->IsDetailKey && $this->ap_diabetes->FormValue != NULL && $this->ap_diabetes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_diabetes->caption(), $this->ap_diabetes->RequiredErrorMessage));
			}
		}
		if ($this->ap_cardiop->Required) {
			if (!$this->ap_cardiop->IsDetailKey && $this->ap_cardiop->FormValue != NULL && $this->ap_cardiop->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_cardiop->caption(), $this->ap_cardiop->RequiredErrorMessage));
			}
		}
		if ($this->ap_convul->Required) {
			if (!$this->ap_convul->IsDetailKey && $this->ap_convul->FormValue != NULL && $this->ap_convul->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_convul->caption(), $this->ap_convul->RequiredErrorMessage));
			}
		}
		if ($this->ap_asma->Required) {
			if (!$this->ap_asma->IsDetailKey && $this->ap_asma->FormValue != NULL && $this->ap_asma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_asma->caption(), $this->ap_asma->RequiredErrorMessage));
			}
		}
		if ($this->ap_acv->Required) {
			if (!$this->ap_acv->IsDetailKey && $this->ap_acv->FormValue != NULL && $this->ap_acv->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_acv->caption(), $this->ap_acv->RequiredErrorMessage));
			}
		}
		if ($this->ap_has->Required) {
			if (!$this->ap_has->IsDetailKey && $this->ap_has->FormValue != NULL && $this->ap_has->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_has->caption(), $this->ap_has->RequiredErrorMessage));
			}
		}
		if ($this->ap_alergia->Required) {
			if (!$this->ap_alergia->IsDetailKey && $this->ap_alergia->FormValue != NULL && $this->ap_alergia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_alergia->caption(), $this->ap_alergia->RequiredErrorMessage));
			}
		}
		if ($this->ap_otros->Required) {
			if (!$this->ap_otros->IsDetailKey && $this->ap_otros->FormValue != NULL && $this->ap_otros->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ap_otros->caption(), $this->ap_otros->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// cod_casopreh
		$this->cod_casopreh->setDbValueDef($rsnew, $this->cod_casopreh->CurrentValue, 0, FALSE);

		// fecha_horaevaluacion
		$this->fecha_horaevaluacion->CurrentValue = CurrentDateTime();
		$this->fecha_horaevaluacion->setDbValueDef($rsnew, $this->fecha_horaevaluacion->CurrentValue, NULL);

		// cod_paciente
		$this->cod_paciente->setDbValueDef($rsnew, $this->cod_paciente->CurrentValue, NULL, FALSE);

		// cod_diag_cie
		$this->cod_diag_cie->setDbValueDef($rsnew, $this->cod_diag_cie->CurrentValue, NULL, FALSE);

		// diagnos_txt
		$this->diagnos_txt->setDbValueDef($rsnew, $this->diagnos_txt->CurrentValue, NULL, FALSE);

		// triage
		$this->triage->setDbValueDef($rsnew, $this->triage->CurrentValue, NULL, FALSE);

		// c_clinico
		$this->c_clinico->setDbValueDef($rsnew, $this->c_clinico->CurrentValue, NULL, FALSE);

		// examen_fisico
		$this->examen_fisico->setDbValueDef($rsnew, $this->examen_fisico->CurrentValue, NULL, FALSE);

		// tratamiento
		$this->tratamiento->setDbValueDef($rsnew, $this->tratamiento->CurrentValue, NULL, FALSE);

		// antecedentes
		$this->antecedentes->setDbValueDef($rsnew, $this->antecedentes->CurrentValue, NULL, FALSE);

		// paraclinicos
		$this->paraclinicos->setDbValueDef($rsnew, $this->paraclinicos->CurrentValue, NULL, FALSE);

		// sv_tx
		$this->sv_tx->setDbValueDef($rsnew, $this->sv_tx->CurrentValue, NULL, FALSE);

		// sv_fc
		$this->sv_fc->setDbValueDef($rsnew, $this->sv_fc->CurrentValue, NULL, FALSE);

		// sv_fr
		$this->sv_fr->setDbValueDef($rsnew, $this->sv_fr->CurrentValue, NULL, FALSE);

		// sv_temp
		$this->sv_temp->setDbValueDef($rsnew, $this->sv_temp->CurrentValue, NULL, FALSE);

		// sv_gl
		$this->sv_gl->setDbValueDef($rsnew, $this->sv_gl->CurrentValue, NULL, FALSE);

		// peso
		$this->peso->setDbValueDef($rsnew, $this->peso->CurrentValue, NULL, FALSE);

		// talla
		$this->talla->setDbValueDef($rsnew, $this->talla->CurrentValue, NULL, FALSE);

		// sv_fcf
		$this->sv_fcf->setDbValueDef($rsnew, $this->sv_fcf->CurrentValue, NULL, FALSE);

		// sv_satO2
		$this->sv_satO2->setDbValueDef($rsnew, $this->sv_satO2->CurrentValue, NULL, FALSE);

		// sv_apgar
		$this->sv_apgar->setDbValueDef($rsnew, $this->sv_apgar->CurrentValue, NULL, FALSE);

		// sv_gli
		$this->sv_gli->setDbValueDef($rsnew, $this->sv_gli->CurrentValue, NULL, FALSE);

		// tipo_paciente
		$this->tipo_paciente->setDbValueDef($rsnew, $this->tipo_paciente->CurrentValue, NULL, FALSE);

		// usu_sede
		$this->usu_sede->setDbValueDef($rsnew, $this->usu_sede->CurrentValue, NULL, FALSE);

		// tiempo_enfermedad
		$this->tiempo_enfermedad->setDbValueDef($rsnew, $this->tiempo_enfermedad->CurrentValue, NULL, FALSE);

		// tipo_enfermedad
		$this->tipo_enfermedad->setDbValueDef($rsnew, $this->tipo_enfermedad->CurrentValue, NULL, FALSE);

		// ap_med_paciente
		$this->ap_med_paciente->setDbValueDef($rsnew, $this->ap_med_paciente->CurrentValue, NULL, FALSE);

		// ap_diabetes
		$this->ap_diabetes->setDbValueDef($rsnew, $this->ap_diabetes->CurrentValue, NULL, strval($this->ap_diabetes->CurrentValue) == "");

		// ap_cardiop
		$this->ap_cardiop->setDbValueDef($rsnew, $this->ap_cardiop->CurrentValue, NULL, strval($this->ap_cardiop->CurrentValue) == "");

		// ap_convul
		$this->ap_convul->setDbValueDef($rsnew, $this->ap_convul->CurrentValue, NULL, strval($this->ap_convul->CurrentValue) == "");

		// ap_asma
		$this->ap_asma->setDbValueDef($rsnew, $this->ap_asma->CurrentValue, NULL, strval($this->ap_asma->CurrentValue) == "");

		// ap_acv
		$this->ap_acv->setDbValueDef($rsnew, $this->ap_acv->CurrentValue, NULL, strval($this->ap_acv->CurrentValue) == "");

		// ap_has
		$this->ap_has->setDbValueDef($rsnew, $this->ap_has->CurrentValue, NULL, strval($this->ap_has->CurrentValue) == "");

		// ap_alergia
		$this->ap_alergia->setDbValueDef($rsnew, $this->ap_alergia->CurrentValue, NULL, strval($this->ap_alergia->CurrentValue) == "");

		// ap_otros
		$this->ap_otros->setDbValueDef($rsnew, $this->ap_otros->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_evaluacionclinicalist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Set up multi pages
	protected function setupMultiPages()
	{
		$pages = new SubPages();
		$pages->Style = "tabs";
		$pages->add(0);
		$pages->add(1);
		$pages->add(2);
		$pages->add(3);
		$this->MultiPages = $pages;
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_cod_diag_cie":
					break;
				case "x_triage":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_cod_diag_cie":
							break;
						case "x_triage":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
		$this->cod_casopreh->EditValue = htmlspecialchars($_GET["cod_casopreh"]);
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>