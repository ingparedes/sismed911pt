<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class pacientegeneral_add extends pacientegeneral
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'pacientegeneral';

	// Page object name
	public $PageObjName = "pacientegeneral_add";

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

		// Table object (pacientegeneral)
		if (!isset($GLOBALS["pacientegeneral"]) || get_class($GLOBALS["pacientegeneral"]) == PROJECT_NAMESPACE . "pacientegeneral") {
			$GLOBALS["pacientegeneral"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pacientegeneral"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pacientegeneral');

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
		global $pacientegeneral;
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
				$doc = new $class($pacientegeneral);
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
					if ($pageName == "pacientegeneralview.php")
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
			$key .= @$ar['cod_casointerh'];
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
					$this->terminate(GetUrl("pacientegenerallist.php"));
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
		$this->cod_casointerh->setVisibility();
		$this->id_paciente->setVisibility();
		$this->expendiente->setVisibility();
		$this->tipo_doc->setVisibility();
		$this->num_doc->setVisibility();
		$this->nombre1->setVisibility();
		$this->nombre2->setVisibility();
		$this->apellido1->setVisibility();
		$this->apellido2->setVisibility();
		$this->genero->setVisibility();
		$this->edad->setVisibility();
		$this->fecha_nacido->setVisibility();
		$this->cod_edad->setVisibility();
		$this->telefono->setVisibility();
		$this->celular->setVisibility();
		$this->direccion->setVisibility();
		$this->_email->Visible = FALSE;
		$this->aseguradro->setVisibility();
		$this->observacion->setVisibility();
		$this->nss->setVisibility();
		$this->usu_sede->Visible = FALSE;
		$this->prehospitalario->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

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
		$this->setupLookupOptions($this->tipo_doc);
		$this->setupLookupOptions($this->genero);
		$this->setupLookupOptions($this->cod_edad);
		$this->setupLookupOptions($this->aseguradro);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pacientegenerallist.php");
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
			if (Get("cod_casointerh") !== NULL) {
				$this->cod_casointerh->setQueryStringValue(Get("cod_casointerh"));
				$this->setKey("cod_casointerh", $this->cod_casointerh->CurrentValue); // Set up key
			} else {
				$this->setKey("cod_casointerh", ""); // Clear key
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
					$this->terminate("pacientegenerallist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->GetAddUrl();
					if (GetPageName($returnUrl) == "pacientegenerallist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "pacientegeneralview.php")
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
		$this->cod_casointerh->CurrentValue = NULL;
		$this->cod_casointerh->OldValue = $this->cod_casointerh->CurrentValue;
		$this->id_paciente->CurrentValue = NULL;
		$this->id_paciente->OldValue = $this->id_paciente->CurrentValue;
		$this->expendiente->CurrentValue = NULL;
		$this->expendiente->OldValue = $this->expendiente->CurrentValue;
		$this->tipo_doc->CurrentValue = NULL;
		$this->tipo_doc->OldValue = $this->tipo_doc->CurrentValue;
		$this->num_doc->CurrentValue = NULL;
		$this->num_doc->OldValue = $this->num_doc->CurrentValue;
		$this->nombre1->CurrentValue = NULL;
		$this->nombre1->OldValue = $this->nombre1->CurrentValue;
		$this->nombre2->CurrentValue = NULL;
		$this->nombre2->OldValue = $this->nombre2->CurrentValue;
		$this->apellido1->CurrentValue = NULL;
		$this->apellido1->OldValue = $this->apellido1->CurrentValue;
		$this->apellido2->CurrentValue = NULL;
		$this->apellido2->OldValue = $this->apellido2->CurrentValue;
		$this->genero->CurrentValue = NULL;
		$this->genero->OldValue = $this->genero->CurrentValue;
		$this->edad->CurrentValue = NULL;
		$this->edad->OldValue = $this->edad->CurrentValue;
		$this->fecha_nacido->CurrentValue = NULL;
		$this->fecha_nacido->OldValue = $this->fecha_nacido->CurrentValue;
		$this->cod_edad->CurrentValue = NULL;
		$this->cod_edad->OldValue = $this->cod_edad->CurrentValue;
		$this->telefono->CurrentValue = NULL;
		$this->telefono->OldValue = $this->telefono->CurrentValue;
		$this->celular->CurrentValue = NULL;
		$this->celular->OldValue = $this->celular->CurrentValue;
		$this->direccion->CurrentValue = NULL;
		$this->direccion->OldValue = $this->direccion->CurrentValue;
		$this->_email->CurrentValue = NULL;
		$this->_email->OldValue = $this->_email->CurrentValue;
		$this->aseguradro->CurrentValue = NULL;
		$this->aseguradro->OldValue = $this->aseguradro->CurrentValue;
		$this->observacion->CurrentValue = NULL;
		$this->observacion->OldValue = $this->observacion->CurrentValue;
		$this->nss->CurrentValue = NULL;
		$this->nss->OldValue = $this->nss->CurrentValue;
		$this->usu_sede->CurrentValue = NULL;
		$this->usu_sede->OldValue = $this->usu_sede->CurrentValue;
		$this->prehospitalario->CurrentValue = "0";
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'cod_casointerh' first before field var 'x_cod_casointerh'
		$val = $CurrentForm->hasValue("cod_casointerh") ? $CurrentForm->getValue("cod_casointerh") : $CurrentForm->getValue("x_cod_casointerh");
		if (!$this->cod_casointerh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_casointerh->Visible = FALSE; // Disable update for API request
			else
				$this->cod_casointerh->setFormValue($val);
		}

		// Check field name 'id_paciente' first before field var 'x_id_paciente'
		$val = $CurrentForm->hasValue("id_paciente") ? $CurrentForm->getValue("id_paciente") : $CurrentForm->getValue("x_id_paciente");
		if (!$this->id_paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->id_paciente->Visible = FALSE; // Disable update for API request
			else
				$this->id_paciente->setFormValue($val);
		}

		// Check field name 'expendiente' first before field var 'x_expendiente'
		$val = $CurrentForm->hasValue("expendiente") ? $CurrentForm->getValue("expendiente") : $CurrentForm->getValue("x_expendiente");
		if (!$this->expendiente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->expendiente->Visible = FALSE; // Disable update for API request
			else
				$this->expendiente->setFormValue($val);
		}

		// Check field name 'tipo_doc' first before field var 'x_tipo_doc'
		$val = $CurrentForm->hasValue("tipo_doc") ? $CurrentForm->getValue("tipo_doc") : $CurrentForm->getValue("x_tipo_doc");
		if (!$this->tipo_doc->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_doc->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_doc->setFormValue($val);
		}

		// Check field name 'num_doc' first before field var 'x_num_doc'
		$val = $CurrentForm->hasValue("num_doc") ? $CurrentForm->getValue("num_doc") : $CurrentForm->getValue("x_num_doc");
		if (!$this->num_doc->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->num_doc->Visible = FALSE; // Disable update for API request
			else
				$this->num_doc->setFormValue($val);
		}

		// Check field name 'nombre1' first before field var 'x_nombre1'
		$val = $CurrentForm->hasValue("nombre1") ? $CurrentForm->getValue("nombre1") : $CurrentForm->getValue("x_nombre1");
		if (!$this->nombre1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre1->Visible = FALSE; // Disable update for API request
			else
				$this->nombre1->setFormValue($val);
		}

		// Check field name 'nombre2' first before field var 'x_nombre2'
		$val = $CurrentForm->hasValue("nombre2") ? $CurrentForm->getValue("nombre2") : $CurrentForm->getValue("x_nombre2");
		if (!$this->nombre2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre2->Visible = FALSE; // Disable update for API request
			else
				$this->nombre2->setFormValue($val);
		}

		// Check field name 'apellido1' first before field var 'x_apellido1'
		$val = $CurrentForm->hasValue("apellido1") ? $CurrentForm->getValue("apellido1") : $CurrentForm->getValue("x_apellido1");
		if (!$this->apellido1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->apellido1->Visible = FALSE; // Disable update for API request
			else
				$this->apellido1->setFormValue($val);
		}

		// Check field name 'apellido2' first before field var 'x_apellido2'
		$val = $CurrentForm->hasValue("apellido2") ? $CurrentForm->getValue("apellido2") : $CurrentForm->getValue("x_apellido2");
		if (!$this->apellido2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->apellido2->Visible = FALSE; // Disable update for API request
			else
				$this->apellido2->setFormValue($val);
		}

		// Check field name 'genero' first before field var 'x_genero'
		$val = $CurrentForm->hasValue("genero") ? $CurrentForm->getValue("genero") : $CurrentForm->getValue("x_genero");
		if (!$this->genero->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->genero->Visible = FALSE; // Disable update for API request
			else
				$this->genero->setFormValue($val);
		}

		// Check field name 'edad' first before field var 'x_edad'
		$val = $CurrentForm->hasValue("edad") ? $CurrentForm->getValue("edad") : $CurrentForm->getValue("x_edad");
		if (!$this->edad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->edad->Visible = FALSE; // Disable update for API request
			else
				$this->edad->setFormValue($val);
		}

		// Check field name 'fecha_nacido' first before field var 'x_fecha_nacido'
		$val = $CurrentForm->hasValue("fecha_nacido") ? $CurrentForm->getValue("fecha_nacido") : $CurrentForm->getValue("x_fecha_nacido");
		if (!$this->fecha_nacido->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_nacido->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_nacido->setFormValue($val);
		}

		// Check field name 'cod_edad' first before field var 'x_cod_edad'
		$val = $CurrentForm->hasValue("cod_edad") ? $CurrentForm->getValue("cod_edad") : $CurrentForm->getValue("x_cod_edad");
		if (!$this->cod_edad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_edad->Visible = FALSE; // Disable update for API request
			else
				$this->cod_edad->setFormValue($val);
		}

		// Check field name 'telefono' first before field var 'x_telefono'
		$val = $CurrentForm->hasValue("telefono") ? $CurrentForm->getValue("telefono") : $CurrentForm->getValue("x_telefono");
		if (!$this->telefono->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono->Visible = FALSE; // Disable update for API request
			else
				$this->telefono->setFormValue($val);
		}

		// Check field name 'celular' first before field var 'x_celular'
		$val = $CurrentForm->hasValue("celular") ? $CurrentForm->getValue("celular") : $CurrentForm->getValue("x_celular");
		if (!$this->celular->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->celular->Visible = FALSE; // Disable update for API request
			else
				$this->celular->setFormValue($val);
		}

		// Check field name 'direccion' first before field var 'x_direccion'
		$val = $CurrentForm->hasValue("direccion") ? $CurrentForm->getValue("direccion") : $CurrentForm->getValue("x_direccion");
		if (!$this->direccion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->direccion->Visible = FALSE; // Disable update for API request
			else
				$this->direccion->setFormValue($val);
		}

		// Check field name 'aseguradro' first before field var 'x_aseguradro'
		$val = $CurrentForm->hasValue("aseguradro") ? $CurrentForm->getValue("aseguradro") : $CurrentForm->getValue("x_aseguradro");
		if (!$this->aseguradro->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->aseguradro->Visible = FALSE; // Disable update for API request
			else
				$this->aseguradro->setFormValue($val);
		}

		// Check field name 'observacion' first before field var 'x_observacion'
		$val = $CurrentForm->hasValue("observacion") ? $CurrentForm->getValue("observacion") : $CurrentForm->getValue("x_observacion");
		if (!$this->observacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->observacion->Visible = FALSE; // Disable update for API request
			else
				$this->observacion->setFormValue($val);
		}

		// Check field name 'nss' first before field var 'x_nss'
		$val = $CurrentForm->hasValue("nss") ? $CurrentForm->getValue("nss") : $CurrentForm->getValue("x_nss");
		if (!$this->nss->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nss->Visible = FALSE; // Disable update for API request
			else
				$this->nss->setFormValue($val);
		}

		// Check field name 'prehospitalario' first before field var 'x_prehospitalario'
		$val = $CurrentForm->hasValue("prehospitalario") ? $CurrentForm->getValue("prehospitalario") : $CurrentForm->getValue("x_prehospitalario");
		if (!$this->prehospitalario->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->prehospitalario->Visible = FALSE; // Disable update for API request
			else
				$this->prehospitalario->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casointerh->CurrentValue = $this->cod_casointerh->FormValue;
		$this->id_paciente->CurrentValue = $this->id_paciente->FormValue;
		$this->expendiente->CurrentValue = $this->expendiente->FormValue;
		$this->tipo_doc->CurrentValue = $this->tipo_doc->FormValue;
		$this->num_doc->CurrentValue = $this->num_doc->FormValue;
		$this->nombre1->CurrentValue = $this->nombre1->FormValue;
		$this->nombre2->CurrentValue = $this->nombre2->FormValue;
		$this->apellido1->CurrentValue = $this->apellido1->FormValue;
		$this->apellido2->CurrentValue = $this->apellido2->FormValue;
		$this->genero->CurrentValue = $this->genero->FormValue;
		$this->edad->CurrentValue = $this->edad->FormValue;
		$this->fecha_nacido->CurrentValue = $this->fecha_nacido->FormValue;
		$this->cod_edad->CurrentValue = $this->cod_edad->FormValue;
		$this->telefono->CurrentValue = $this->telefono->FormValue;
		$this->celular->CurrentValue = $this->celular->FormValue;
		$this->direccion->CurrentValue = $this->direccion->FormValue;
		$this->aseguradro->CurrentValue = $this->aseguradro->FormValue;
		$this->observacion->CurrentValue = $this->observacion->FormValue;
		$this->nss->CurrentValue = $this->nss->FormValue;
		$this->prehospitalario->CurrentValue = $this->prehospitalario->FormValue;
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
		$this->cod_casointerh->setDbValue($row['cod_casointerh']);
		$this->id_paciente->setDbValue($row['id_paciente']);
		$this->expendiente->setDbValue($row['expendiente']);
		$this->tipo_doc->setDbValue($row['tipo_doc']);
		$this->num_doc->setDbValue($row['num_doc']);
		$this->nombre1->setDbValue($row['nombre1']);
		$this->nombre2->setDbValue($row['nombre2']);
		$this->apellido1->setDbValue($row['apellido1']);
		$this->apellido2->setDbValue($row['apellido2']);
		$this->genero->setDbValue($row['genero']);
		$this->edad->setDbValue($row['edad']);
		$this->fecha_nacido->setDbValue($row['fecha_nacido']);
		$this->cod_edad->setDbValue($row['cod_edad']);
		$this->telefono->setDbValue($row['telefono']);
		$this->celular->setDbValue($row['celular']);
		$this->direccion->setDbValue($row['direccion']);
		$this->_email->setDbValue($row['email']);
		$this->aseguradro->setDbValue($row['aseguradro']);
		$this->observacion->setDbValue($row['observacion']);
		$this->nss->setDbValue($row['nss']);
		$this->usu_sede->setDbValue($row['usu_sede']);
		$this->prehospitalario->setDbValue($row['prehospitalario']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['cod_casointerh'] = $this->cod_casointerh->CurrentValue;
		$row['id_paciente'] = $this->id_paciente->CurrentValue;
		$row['expendiente'] = $this->expendiente->CurrentValue;
		$row['tipo_doc'] = $this->tipo_doc->CurrentValue;
		$row['num_doc'] = $this->num_doc->CurrentValue;
		$row['nombre1'] = $this->nombre1->CurrentValue;
		$row['nombre2'] = $this->nombre2->CurrentValue;
		$row['apellido1'] = $this->apellido1->CurrentValue;
		$row['apellido2'] = $this->apellido2->CurrentValue;
		$row['genero'] = $this->genero->CurrentValue;
		$row['edad'] = $this->edad->CurrentValue;
		$row['fecha_nacido'] = $this->fecha_nacido->CurrentValue;
		$row['cod_edad'] = $this->cod_edad->CurrentValue;
		$row['telefono'] = $this->telefono->CurrentValue;
		$row['celular'] = $this->celular->CurrentValue;
		$row['direccion'] = $this->direccion->CurrentValue;
		$row['email'] = $this->_email->CurrentValue;
		$row['aseguradro'] = $this->aseguradro->CurrentValue;
		$row['observacion'] = $this->observacion->CurrentValue;
		$row['nss'] = $this->nss->CurrentValue;
		$row['usu_sede'] = $this->usu_sede->CurrentValue;
		$row['prehospitalario'] = $this->prehospitalario->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("cod_casointerh")) != "")
			$this->cod_casointerh->OldValue = $this->getKey("cod_casointerh"); // cod_casointerh
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
		// cod_casointerh
		// id_paciente
		// expendiente
		// tipo_doc
		// num_doc
		// nombre1
		// nombre2
		// apellido1
		// apellido2
		// genero
		// edad
		// fecha_nacido
		// cod_edad
		// telefono
		// celular
		// direccion
		// email
		// aseguradro
		// observacion
		// nss
		// usu_sede
		// prehospitalario

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// cod_casointerh
			$this->cod_casointerh->ViewValue = $this->cod_casointerh->CurrentValue;
			$this->cod_casointerh->ViewValue = FormatNumber($this->cod_casointerh->ViewValue, 0, -2, -2, -2);
			$this->cod_casointerh->ViewCustomAttributes = "";

			// id_paciente
			$this->id_paciente->ViewValue = $this->id_paciente->CurrentValue;
			$this->id_paciente->ViewCustomAttributes = "";

			// expendiente
			$this->expendiente->ViewValue = $this->expendiente->CurrentValue;
			$this->expendiente->ViewCustomAttributes = "";

			// tipo_doc
			$curVal = strval($this->tipo_doc->CurrentValue);
			if ($curVal != "") {
				$this->tipo_doc->ViewValue = $this->tipo_doc->lookupCacheOption($curVal);
				if ($this->tipo_doc->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_tipo\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tipo_doc->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->tipo_doc->ViewValue = $this->tipo_doc->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tipo_doc->ViewValue = $this->tipo_doc->CurrentValue;
					}
				}
			} else {
				$this->tipo_doc->ViewValue = NULL;
			}
			$this->tipo_doc->ViewCustomAttributes = "";

			// num_doc
			$this->num_doc->ViewValue = $this->num_doc->CurrentValue;
			$this->num_doc->ViewCustomAttributes = "";

			// nombre1
			$this->nombre1->ViewValue = $this->nombre1->CurrentValue;
			$this->nombre1->ViewCustomAttributes = "";

			// nombre2
			$this->nombre2->ViewValue = $this->nombre2->CurrentValue;
			$this->nombre2->ViewCustomAttributes = "";

			// apellido1
			$this->apellido1->ViewValue = $this->apellido1->CurrentValue;
			$this->apellido1->ViewCustomAttributes = "";

			// apellido2
			$this->apellido2->ViewValue = $this->apellido2->CurrentValue;
			$this->apellido2->ViewCustomAttributes = "";

			// genero
			$curVal = strval($this->genero->CurrentValue);
			if ($curVal != "") {
				$this->genero->ViewValue = $this->genero->lookupCacheOption($curVal);
				if ($this->genero->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_genero\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->genero->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->genero->ViewValue = $this->genero->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->genero->ViewValue = $this->genero->CurrentValue;
					}
				}
			} else {
				$this->genero->ViewValue = NULL;
			}
			$this->genero->ViewCustomAttributes = "";

			// edad
			$this->edad->ViewValue = $this->edad->CurrentValue;
			$this->edad->ViewValue = FormatNumber($this->edad->ViewValue, 0, -2, -2, -2);
			$this->edad->ViewCustomAttributes = "";

			// fecha_nacido
			$this->fecha_nacido->ViewValue = $this->fecha_nacido->CurrentValue;
			$this->fecha_nacido->ViewCustomAttributes = "";

			// cod_edad
			$curVal = strval($this->cod_edad->CurrentValue);
			if ($curVal != "") {
				$this->cod_edad->ViewValue = $this->cod_edad->lookupCacheOption($curVal);
				if ($this->cod_edad->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_edad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->cod_edad->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->cod_edad->ViewValue = $this->cod_edad->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->cod_edad->ViewValue = $this->cod_edad->CurrentValue;
					}
				}
			} else {
				$this->cod_edad->ViewValue = NULL;
			}
			$this->cod_edad->ViewCustomAttributes = "";

			// telefono
			$this->telefono->ViewValue = $this->telefono->CurrentValue;
			$this->telefono->ViewCustomAttributes = "";

			// celular
			$this->celular->ViewValue = $this->celular->CurrentValue;
			$this->celular->ViewCustomAttributes = "";

			// direccion
			$this->direccion->ViewValue = $this->direccion->CurrentValue;
			$this->direccion->ViewCustomAttributes = "";

			// aseguradro
			$curVal = strval($this->aseguradro->CurrentValue);
			if ($curVal != "") {
				$this->aseguradro->ViewValue = $this->aseguradro->lookupCacheOption($curVal);
				if ($this->aseguradro->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"cod_habiliatacion\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->aseguradro->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->aseguradro->ViewValue = $this->aseguradro->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->aseguradro->ViewValue = $this->aseguradro->CurrentValue;
					}
				}
			} else {
				$this->aseguradro->ViewValue = NULL;
			}
			$this->aseguradro->ViewCustomAttributes = "";

			// observacion
			$this->observacion->ViewValue = $this->observacion->CurrentValue;
			$this->observacion->ViewCustomAttributes = "";

			// nss
			$this->nss->ViewValue = $this->nss->CurrentValue;
			$this->nss->ViewCustomAttributes = "";

			// prehospitalario
			$this->prehospitalario->ViewValue = $this->prehospitalario->CurrentValue;
			$this->prehospitalario->ViewCustomAttributes = "";

			// cod_casointerh
			$this->cod_casointerh->LinkCustomAttributes = "";
			$this->cod_casointerh->HrefValue = "";
			$this->cod_casointerh->TooltipValue = "";

			// id_paciente
			$this->id_paciente->LinkCustomAttributes = "";
			$this->id_paciente->HrefValue = "";
			$this->id_paciente->TooltipValue = "";

			// expendiente
			$this->expendiente->LinkCustomAttributes = "";
			$this->expendiente->HrefValue = "";
			$this->expendiente->TooltipValue = "";

			// tipo_doc
			$this->tipo_doc->LinkCustomAttributes = "";
			$this->tipo_doc->HrefValue = "";
			$this->tipo_doc->TooltipValue = "";

			// num_doc
			$this->num_doc->LinkCustomAttributes = "";
			$this->num_doc->HrefValue = "";
			$this->num_doc->TooltipValue = "";

			// nombre1
			$this->nombre1->LinkCustomAttributes = "";
			$this->nombre1->HrefValue = "";
			$this->nombre1->TooltipValue = "";

			// nombre2
			$this->nombre2->LinkCustomAttributes = "";
			$this->nombre2->HrefValue = "";
			$this->nombre2->TooltipValue = "";

			// apellido1
			$this->apellido1->LinkCustomAttributes = "";
			$this->apellido1->HrefValue = "";
			$this->apellido1->TooltipValue = "";

			// apellido2
			$this->apellido2->LinkCustomAttributes = "";
			$this->apellido2->HrefValue = "";
			$this->apellido2->TooltipValue = "";

			// genero
			$this->genero->LinkCustomAttributes = "";
			$this->genero->HrefValue = "";
			$this->genero->TooltipValue = "";

			// edad
			$this->edad->LinkCustomAttributes = "";
			$this->edad->HrefValue = "";
			$this->edad->TooltipValue = "";

			// fecha_nacido
			$this->fecha_nacido->LinkCustomAttributes = "";
			$this->fecha_nacido->HrefValue = "";
			$this->fecha_nacido->TooltipValue = "";

			// cod_edad
			$this->cod_edad->LinkCustomAttributes = "";
			$this->cod_edad->HrefValue = "";
			$this->cod_edad->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";

			// celular
			$this->celular->LinkCustomAttributes = "";
			$this->celular->HrefValue = "";
			$this->celular->TooltipValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";
			$this->direccion->TooltipValue = "";

			// aseguradro
			$this->aseguradro->LinkCustomAttributes = "";
			$this->aseguradro->HrefValue = "";
			$this->aseguradro->TooltipValue = "";

			// observacion
			$this->observacion->LinkCustomAttributes = "";
			$this->observacion->HrefValue = "";
			$this->observacion->TooltipValue = "";

			// nss
			$this->nss->LinkCustomAttributes = "";
			$this->nss->HrefValue = "";
			$this->nss->TooltipValue = "";

			// prehospitalario
			$this->prehospitalario->LinkCustomAttributes = "";
			$this->prehospitalario->HrefValue = "";
			$this->prehospitalario->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// cod_casointerh
			$this->cod_casointerh->EditAttrs["class"] = "form-control";
			$this->cod_casointerh->EditCustomAttributes = "";
			$this->cod_casointerh->EditValue = HtmlEncode($this->cod_casointerh->CurrentValue);
			$this->cod_casointerh->PlaceHolder = RemoveHtml($this->cod_casointerh->caption());

			// id_paciente
			$this->id_paciente->EditAttrs["class"] = "form-control";
			$this->id_paciente->EditCustomAttributes = "";
			$this->id_paciente->EditValue = HtmlEncode($this->id_paciente->CurrentValue);
			$this->id_paciente->PlaceHolder = RemoveHtml($this->id_paciente->caption());

			// expendiente
			$this->expendiente->EditAttrs["class"] = "form-control";
			$this->expendiente->EditCustomAttributes = "";
			if (!$this->expendiente->Raw)
				$this->expendiente->CurrentValue = HtmlDecode($this->expendiente->CurrentValue);
			$this->expendiente->EditValue = HtmlEncode($this->expendiente->CurrentValue);
			$this->expendiente->PlaceHolder = RemoveHtml($this->expendiente->caption());

			// tipo_doc
			$this->tipo_doc->EditAttrs["class"] = "form-control";
			$this->tipo_doc->EditCustomAttributes = "";
			$curVal = trim(strval($this->tipo_doc->CurrentValue));
			if ($curVal != "")
				$this->tipo_doc->ViewValue = $this->tipo_doc->lookupCacheOption($curVal);
			else
				$this->tipo_doc->ViewValue = $this->tipo_doc->Lookup !== NULL && is_array($this->tipo_doc->Lookup->Options) ? $curVal : NULL;
			if ($this->tipo_doc->ViewValue !== NULL) { // Load from cache
				$this->tipo_doc->EditValue = array_values($this->tipo_doc->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_tipo\"" . SearchString("=", $this->tipo_doc->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->tipo_doc->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->tipo_doc->EditValue = $arwrk;
			}

			// num_doc
			$this->num_doc->EditAttrs["class"] = "form-control";
			$this->num_doc->EditCustomAttributes = "";
			if (!$this->num_doc->Raw)
				$this->num_doc->CurrentValue = HtmlDecode($this->num_doc->CurrentValue);
			$this->num_doc->EditValue = HtmlEncode($this->num_doc->CurrentValue);
			$this->num_doc->PlaceHolder = RemoveHtml($this->num_doc->caption());

			// nombre1
			$this->nombre1->EditAttrs["class"] = "form-control";
			$this->nombre1->EditCustomAttributes = "";
			if (!$this->nombre1->Raw)
				$this->nombre1->CurrentValue = HtmlDecode($this->nombre1->CurrentValue);
			$this->nombre1->EditValue = HtmlEncode($this->nombre1->CurrentValue);
			$this->nombre1->PlaceHolder = RemoveHtml($this->nombre1->caption());

			// nombre2
			$this->nombre2->EditAttrs["class"] = "form-control";
			$this->nombre2->EditCustomAttributes = "";
			if (!$this->nombre2->Raw)
				$this->nombre2->CurrentValue = HtmlDecode($this->nombre2->CurrentValue);
			$this->nombre2->EditValue = HtmlEncode($this->nombre2->CurrentValue);
			$this->nombre2->PlaceHolder = RemoveHtml($this->nombre2->caption());

			// apellido1
			$this->apellido1->EditAttrs["class"] = "form-control";
			$this->apellido1->EditCustomAttributes = "";
			if (!$this->apellido1->Raw)
				$this->apellido1->CurrentValue = HtmlDecode($this->apellido1->CurrentValue);
			$this->apellido1->EditValue = HtmlEncode($this->apellido1->CurrentValue);
			$this->apellido1->PlaceHolder = RemoveHtml($this->apellido1->caption());

			// apellido2
			$this->apellido2->EditAttrs["class"] = "form-control";
			$this->apellido2->EditCustomAttributes = "";
			if (!$this->apellido2->Raw)
				$this->apellido2->CurrentValue = HtmlDecode($this->apellido2->CurrentValue);
			$this->apellido2->EditValue = HtmlEncode($this->apellido2->CurrentValue);
			$this->apellido2->PlaceHolder = RemoveHtml($this->apellido2->caption());

			// genero
			$this->genero->EditCustomAttributes = "";
			$curVal = trim(strval($this->genero->CurrentValue));
			if ($curVal != "")
				$this->genero->ViewValue = $this->genero->lookupCacheOption($curVal);
			else
				$this->genero->ViewValue = $this->genero->Lookup !== NULL && is_array($this->genero->Lookup->Options) ? $curVal : NULL;
			if ($this->genero->ViewValue !== NULL) { // Load from cache
				$this->genero->EditValue = array_values($this->genero->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_genero\"" . SearchString("=", $this->genero->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->genero->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->genero->EditValue = $arwrk;
			}

			// edad
			$this->edad->EditAttrs["class"] = "form-control";
			$this->edad->EditCustomAttributes = "";
			$this->edad->EditValue = HtmlEncode($this->edad->CurrentValue);
			$this->edad->PlaceHolder = RemoveHtml($this->edad->caption());

			// fecha_nacido
			$this->fecha_nacido->EditAttrs["class"] = "form-control";
			$this->fecha_nacido->EditCustomAttributes = "";
			if (!$this->fecha_nacido->Raw)
				$this->fecha_nacido->CurrentValue = HtmlDecode($this->fecha_nacido->CurrentValue);
			$this->fecha_nacido->EditValue = HtmlEncode($this->fecha_nacido->CurrentValue);
			$this->fecha_nacido->PlaceHolder = RemoveHtml($this->fecha_nacido->caption());

			// cod_edad
			$this->cod_edad->EditAttrs["class"] = "form-control";
			$this->cod_edad->EditCustomAttributes = "";
			$curVal = trim(strval($this->cod_edad->CurrentValue));
			if ($curVal != "")
				$this->cod_edad->ViewValue = $this->cod_edad->lookupCacheOption($curVal);
			else
				$this->cod_edad->ViewValue = $this->cod_edad->Lookup !== NULL && is_array($this->cod_edad->Lookup->Options) ? $curVal : NULL;
			if ($this->cod_edad->ViewValue !== NULL) { // Load from cache
				$this->cod_edad->EditValue = array_values($this->cod_edad->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_edad\"" . SearchString("=", $this->cod_edad->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->cod_edad->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->cod_edad->EditValue = $arwrk;
			}

			// telefono
			$this->telefono->EditAttrs["class"] = "form-control";
			$this->telefono->EditCustomAttributes = "";
			if (!$this->telefono->Raw)
				$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
			$this->telefono->EditValue = HtmlEncode($this->telefono->CurrentValue);
			$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

			// celular
			$this->celular->EditAttrs["class"] = "form-control";
			$this->celular->EditCustomAttributes = "";
			if (!$this->celular->Raw)
				$this->celular->CurrentValue = HtmlDecode($this->celular->CurrentValue);
			$this->celular->EditValue = HtmlEncode($this->celular->CurrentValue);
			$this->celular->PlaceHolder = RemoveHtml($this->celular->caption());

			// direccion
			$this->direccion->EditAttrs["class"] = "form-control";
			$this->direccion->EditCustomAttributes = "";
			if (!$this->direccion->Raw)
				$this->direccion->CurrentValue = HtmlDecode($this->direccion->CurrentValue);
			$this->direccion->EditValue = HtmlEncode($this->direccion->CurrentValue);
			$this->direccion->PlaceHolder = RemoveHtml($this->direccion->caption());

			// aseguradro
			$this->aseguradro->EditAttrs["class"] = "form-control";
			$this->aseguradro->EditCustomAttributes = "";
			$curVal = trim(strval($this->aseguradro->CurrentValue));
			if ($curVal != "")
				$this->aseguradro->ViewValue = $this->aseguradro->lookupCacheOption($curVal);
			else
				$this->aseguradro->ViewValue = $this->aseguradro->Lookup !== NULL && is_array($this->aseguradro->Lookup->Options) ? $curVal : NULL;
			if ($this->aseguradro->ViewValue !== NULL) { // Load from cache
				$this->aseguradro->EditValue = array_values($this->aseguradro->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"cod_habiliatacion\"" . SearchString("=", $this->aseguradro->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->aseguradro->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->aseguradro->EditValue = $arwrk;
			}

			// observacion
			$this->observacion->EditAttrs["class"] = "form-control";
			$this->observacion->EditCustomAttributes = "";
			$this->observacion->EditValue = HtmlEncode($this->observacion->CurrentValue);
			$this->observacion->PlaceHolder = RemoveHtml($this->observacion->caption());

			// nss
			$this->nss->EditAttrs["class"] = "form-control";
			$this->nss->EditCustomAttributes = "";
			if (!$this->nss->Raw)
				$this->nss->CurrentValue = HtmlDecode($this->nss->CurrentValue);
			$this->nss->EditValue = HtmlEncode($this->nss->CurrentValue);
			$this->nss->PlaceHolder = RemoveHtml($this->nss->caption());

			// prehospitalario
			$this->prehospitalario->EditAttrs["class"] = "form-control";
			$this->prehospitalario->EditCustomAttributes = "";
			if (!$this->prehospitalario->Raw)
				$this->prehospitalario->CurrentValue = HtmlDecode($this->prehospitalario->CurrentValue);
			$this->prehospitalario->EditValue = HtmlEncode($this->prehospitalario->CurrentValue);
			$this->prehospitalario->PlaceHolder = RemoveHtml($this->prehospitalario->caption());

			// Add refer script
			// cod_casointerh

			$this->cod_casointerh->LinkCustomAttributes = "";
			$this->cod_casointerh->HrefValue = "";

			// id_paciente
			$this->id_paciente->LinkCustomAttributes = "";
			$this->id_paciente->HrefValue = "";

			// expendiente
			$this->expendiente->LinkCustomAttributes = "";
			$this->expendiente->HrefValue = "";

			// tipo_doc
			$this->tipo_doc->LinkCustomAttributes = "";
			$this->tipo_doc->HrefValue = "";

			// num_doc
			$this->num_doc->LinkCustomAttributes = "";
			$this->num_doc->HrefValue = "";

			// nombre1
			$this->nombre1->LinkCustomAttributes = "";
			$this->nombre1->HrefValue = "";

			// nombre2
			$this->nombre2->LinkCustomAttributes = "";
			$this->nombre2->HrefValue = "";

			// apellido1
			$this->apellido1->LinkCustomAttributes = "";
			$this->apellido1->HrefValue = "";

			// apellido2
			$this->apellido2->LinkCustomAttributes = "";
			$this->apellido2->HrefValue = "";

			// genero
			$this->genero->LinkCustomAttributes = "";
			$this->genero->HrefValue = "";

			// edad
			$this->edad->LinkCustomAttributes = "";
			$this->edad->HrefValue = "";

			// fecha_nacido
			$this->fecha_nacido->LinkCustomAttributes = "";
			$this->fecha_nacido->HrefValue = "";

			// cod_edad
			$this->cod_edad->LinkCustomAttributes = "";
			$this->cod_edad->HrefValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";

			// celular
			$this->celular->LinkCustomAttributes = "";
			$this->celular->HrefValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";

			// aseguradro
			$this->aseguradro->LinkCustomAttributes = "";
			$this->aseguradro->HrefValue = "";

			// observacion
			$this->observacion->LinkCustomAttributes = "";
			$this->observacion->HrefValue = "";

			// nss
			$this->nss->LinkCustomAttributes = "";
			$this->nss->HrefValue = "";

			// prehospitalario
			$this->prehospitalario->LinkCustomAttributes = "";
			$this->prehospitalario->HrefValue = "";
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
		if ($this->cod_casointerh->Required) {
			if (!$this->cod_casointerh->IsDetailKey && $this->cod_casointerh->FormValue != NULL && $this->cod_casointerh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_casointerh->caption(), $this->cod_casointerh->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cod_casointerh->FormValue)) {
			AddMessage($FormError, $this->cod_casointerh->errorMessage());
		}
		if ($this->id_paciente->Required) {
			if (!$this->id_paciente->IsDetailKey && $this->id_paciente->FormValue != NULL && $this->id_paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_paciente->caption(), $this->id_paciente->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->id_paciente->FormValue)) {
			AddMessage($FormError, $this->id_paciente->errorMessage());
		}
		if ($this->expendiente->Required) {
			if (!$this->expendiente->IsDetailKey && $this->expendiente->FormValue != NULL && $this->expendiente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->expendiente->caption(), $this->expendiente->RequiredErrorMessage));
			}
		}
		if ($this->tipo_doc->Required) {
			if (!$this->tipo_doc->IsDetailKey && $this->tipo_doc->FormValue != NULL && $this->tipo_doc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_doc->caption(), $this->tipo_doc->RequiredErrorMessage));
			}
		}
		if ($this->num_doc->Required) {
			if (!$this->num_doc->IsDetailKey && $this->num_doc->FormValue != NULL && $this->num_doc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->num_doc->caption(), $this->num_doc->RequiredErrorMessage));
			}
		}
		if ($this->nombre1->Required) {
			if (!$this->nombre1->IsDetailKey && $this->nombre1->FormValue != NULL && $this->nombre1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre1->caption(), $this->nombre1->RequiredErrorMessage));
			}
		}
		if ($this->nombre2->Required) {
			if (!$this->nombre2->IsDetailKey && $this->nombre2->FormValue != NULL && $this->nombre2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre2->caption(), $this->nombre2->RequiredErrorMessage));
			}
		}
		if ($this->apellido1->Required) {
			if (!$this->apellido1->IsDetailKey && $this->apellido1->FormValue != NULL && $this->apellido1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->apellido1->caption(), $this->apellido1->RequiredErrorMessage));
			}
		}
		if ($this->apellido2->Required) {
			if (!$this->apellido2->IsDetailKey && $this->apellido2->FormValue != NULL && $this->apellido2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->apellido2->caption(), $this->apellido2->RequiredErrorMessage));
			}
		}
		if ($this->genero->Required) {
			if ($this->genero->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->genero->caption(), $this->genero->RequiredErrorMessage));
			}
		}
		if ($this->edad->Required) {
			if (!$this->edad->IsDetailKey && $this->edad->FormValue != NULL && $this->edad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->edad->caption(), $this->edad->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->edad->FormValue)) {
			AddMessage($FormError, $this->edad->errorMessage());
		}
		if ($this->fecha_nacido->Required) {
			if (!$this->fecha_nacido->IsDetailKey && $this->fecha_nacido->FormValue != NULL && $this->fecha_nacido->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_nacido->caption(), $this->fecha_nacido->RequiredErrorMessage));
			}
		}
		if (!CheckStdDate($this->fecha_nacido->FormValue)) {
			AddMessage($FormError, $this->fecha_nacido->errorMessage());
		}
		if ($this->cod_edad->Required) {
			if (!$this->cod_edad->IsDetailKey && $this->cod_edad->FormValue != NULL && $this->cod_edad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_edad->caption(), $this->cod_edad->RequiredErrorMessage));
			}
		}
		if ($this->telefono->Required) {
			if (!$this->telefono->IsDetailKey && $this->telefono->FormValue != NULL && $this->telefono->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono->caption(), $this->telefono->RequiredErrorMessage));
			}
		}
		if ($this->celular->Required) {
			if (!$this->celular->IsDetailKey && $this->celular->FormValue != NULL && $this->celular->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->celular->caption(), $this->celular->RequiredErrorMessage));
			}
		}
		if ($this->direccion->Required) {
			if (!$this->direccion->IsDetailKey && $this->direccion->FormValue != NULL && $this->direccion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->direccion->caption(), $this->direccion->RequiredErrorMessage));
			}
		}
		if ($this->aseguradro->Required) {
			if (!$this->aseguradro->IsDetailKey && $this->aseguradro->FormValue != NULL && $this->aseguradro->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->aseguradro->caption(), $this->aseguradro->RequiredErrorMessage));
			}
		}
		if ($this->observacion->Required) {
			if (!$this->observacion->IsDetailKey && $this->observacion->FormValue != NULL && $this->observacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->observacion->caption(), $this->observacion->RequiredErrorMessage));
			}
		}
		if ($this->nss->Required) {
			if (!$this->nss->IsDetailKey && $this->nss->FormValue != NULL && $this->nss->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nss->caption(), $this->nss->RequiredErrorMessage));
			}
		}
		if ($this->prehospitalario->Required) {
			if (!$this->prehospitalario->IsDetailKey && $this->prehospitalario->FormValue != NULL && $this->prehospitalario->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->prehospitalario->caption(), $this->prehospitalario->RequiredErrorMessage));
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
		if ($this->cod_casointerh->CurrentValue != "") { // Check field with unique index
			$filter = "(\"cod_casointerh\" = " . AdjustSql($this->cod_casointerh->CurrentValue, $this->Dbid) . ")";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->cod_casointerh->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->cod_casointerh->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// cod_casointerh
		$this->cod_casointerh->setDbValueDef($rsnew, $this->cod_casointerh->CurrentValue, 0, FALSE);

		// id_paciente
		$this->id_paciente->setDbValueDef($rsnew, $this->id_paciente->CurrentValue, 0, strval($this->id_paciente->CurrentValue) == "");

		// expendiente
		$this->expendiente->setDbValueDef($rsnew, $this->expendiente->CurrentValue, NULL, FALSE);

		// tipo_doc
		$this->tipo_doc->setDbValueDef($rsnew, $this->tipo_doc->CurrentValue, NULL, FALSE);

		// num_doc
		$this->num_doc->setDbValueDef($rsnew, $this->num_doc->CurrentValue, NULL, FALSE);

		// nombre1
		$this->nombre1->setDbValueDef($rsnew, $this->nombre1->CurrentValue, NULL, FALSE);

		// nombre2
		$this->nombre2->setDbValueDef($rsnew, $this->nombre2->CurrentValue, NULL, FALSE);

		// apellido1
		$this->apellido1->setDbValueDef($rsnew, $this->apellido1->CurrentValue, NULL, FALSE);

		// apellido2
		$this->apellido2->setDbValueDef($rsnew, $this->apellido2->CurrentValue, NULL, FALSE);

		// genero
		$this->genero->setDbValueDef($rsnew, $this->genero->CurrentValue, NULL, FALSE);

		// edad
		$this->edad->setDbValueDef($rsnew, $this->edad->CurrentValue, NULL, FALSE);

		// fecha_nacido
		$this->fecha_nacido->setDbValueDef($rsnew, $this->fecha_nacido->CurrentValue, NULL, FALSE);

		// cod_edad
		$this->cod_edad->setDbValueDef($rsnew, $this->cod_edad->CurrentValue, NULL, FALSE);

		// telefono
		$this->telefono->setDbValueDef($rsnew, $this->telefono->CurrentValue, NULL, FALSE);

		// celular
		$this->celular->setDbValueDef($rsnew, $this->celular->CurrentValue, NULL, FALSE);

		// direccion
		$this->direccion->setDbValueDef($rsnew, $this->direccion->CurrentValue, NULL, FALSE);

		// aseguradro
		$this->aseguradro->setDbValueDef($rsnew, $this->aseguradro->CurrentValue, NULL, FALSE);

		// observacion
		$this->observacion->setDbValueDef($rsnew, $this->observacion->CurrentValue, NULL, FALSE);

		// nss
		$this->nss->setDbValueDef($rsnew, $this->nss->CurrentValue, NULL, FALSE);

		// prehospitalario
		$this->prehospitalario->setDbValueDef($rsnew, $this->prehospitalario->CurrentValue, NULL, strval($this->prehospitalario->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['cod_casointerh']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter($rsnew);
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pacientegenerallist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
				case "x_tipo_doc":
					break;
				case "x_genero":
					break;
				case "x_cod_edad":
					break;
				case "x_aseguradro":
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
						case "x_tipo_doc":
							break;
						case "x_genero":
							break;
						case "x_cod_edad":
							break;
						case "x_aseguradro":
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