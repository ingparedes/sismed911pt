<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_despacho_edit extends preh_despacho
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_despacho';

	// Page object name
	public $PageObjName = "preh_despacho_edit";

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

		// Table object (preh_despacho)
		if (!isset($GLOBALS["preh_despacho"]) || get_class($GLOBALS["preh_despacho"]) == PROJECT_NAMESPACE . "preh_despacho") {
			$GLOBALS["preh_despacho"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["preh_despacho"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'preh_despacho');

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

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $preh_despacho;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($preh_despacho);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
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
					if ($pageName == "preh_despachoview.php")
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
			$key .= @$ar['cod_casopreh'];
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
			if (!$Security->canEdit()) {
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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("preh_despacholist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->cod_casopreh->setVisibility();
		$this->fecha->setVisibility();
		$this->prioridad->setVisibility();
		$this->nombre_es->setVisibility();
		$this->tiempo->setVisibility();
		$this->cod_ambulancia->setVisibility();
		$this->hora_asigna->setVisibility();
		$this->hora_llegada->setVisibility();
		$this->hora_inicio->setVisibility();
		$this->hora_destino->setVisibility();
		$this->hora_preposicion->setVisibility();
		$this->base->setVisibility();
		$this->sede->setVisibility();
		$this->cierre->setVisibility();
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
		// Check permission

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_despacholist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("cod_casopreh") !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Get("cod_casopreh"));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Key(0));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->QueryStringValue);
			} elseif (Post("cod_casopreh") !== NULL) {
				$this->cod_casopreh->setFormValue(Post("cod_casopreh"));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Route(2));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_cod_casopreh")) {
					$this->cod_casopreh->setFormValue($CurrentForm->getValue("x_cod_casopreh"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("cod_casopreh") !== NULL) {
					$this->cod_casopreh->setQueryStringValue(Get("cod_casopreh"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->cod_casopreh->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->cod_casopreh->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("preh_despacholist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "preh_despacholist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
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
		if ($CurrentForm->hasValue("o_cod_casopreh"))
			$this->cod_casopreh->setOldValue($CurrentForm->getValue("o_cod_casopreh"));

		// Check field name 'fecha' first before field var 'x_fecha'
		$val = $CurrentForm->hasValue("fecha") ? $CurrentForm->getValue("fecha") : $CurrentForm->getValue("x_fecha");
		if (!$this->fecha->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha->Visible = FALSE; // Disable update for API request
			else
				$this->fecha->setFormValue($val);
			$this->fecha->CurrentValue = UnFormatDateTime($this->fecha->CurrentValue, 0);
		}

		// Check field name 'prioridad' first before field var 'x_prioridad'
		$val = $CurrentForm->hasValue("prioridad") ? $CurrentForm->getValue("prioridad") : $CurrentForm->getValue("x_prioridad");
		if (!$this->prioridad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->prioridad->Visible = FALSE; // Disable update for API request
			else
				$this->prioridad->setFormValue($val);
		}

		// Check field name 'nombre_es' first before field var 'x_nombre_es'
		$val = $CurrentForm->hasValue("nombre_es") ? $CurrentForm->getValue("nombre_es") : $CurrentForm->getValue("x_nombre_es");
		if (!$this->nombre_es->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_es->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_es->setFormValue($val);
		}

		// Check field name 'tiempo' first before field var 'x_tiempo'
		$val = $CurrentForm->hasValue("tiempo") ? $CurrentForm->getValue("tiempo") : $CurrentForm->getValue("x_tiempo");
		if (!$this->tiempo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tiempo->Visible = FALSE; // Disable update for API request
			else
				$this->tiempo->setFormValue($val);
		}

		// Check field name 'cod_ambulancia' first before field var 'x_cod_ambulancia'
		$val = $CurrentForm->hasValue("cod_ambulancia") ? $CurrentForm->getValue("cod_ambulancia") : $CurrentForm->getValue("x_cod_ambulancia");
		if (!$this->cod_ambulancia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_ambulancia->Visible = FALSE; // Disable update for API request
			else
				$this->cod_ambulancia->setFormValue($val);
		}

		// Check field name 'hora_asigna' first before field var 'x_hora_asigna'
		$val = $CurrentForm->hasValue("hora_asigna") ? $CurrentForm->getValue("hora_asigna") : $CurrentForm->getValue("x_hora_asigna");
		if (!$this->hora_asigna->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_asigna->Visible = FALSE; // Disable update for API request
			else
				$this->hora_asigna->setFormValue($val);
			$this->hora_asigna->CurrentValue = UnFormatDateTime($this->hora_asigna->CurrentValue, 0);
		}

		// Check field name 'hora_llegada' first before field var 'x_hora_llegada'
		$val = $CurrentForm->hasValue("hora_llegada") ? $CurrentForm->getValue("hora_llegada") : $CurrentForm->getValue("x_hora_llegada");
		if (!$this->hora_llegada->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_llegada->Visible = FALSE; // Disable update for API request
			else
				$this->hora_llegada->setFormValue($val);
			$this->hora_llegada->CurrentValue = UnFormatDateTime($this->hora_llegada->CurrentValue, 0);
		}

		// Check field name 'hora_inicio' first before field var 'x_hora_inicio'
		$val = $CurrentForm->hasValue("hora_inicio") ? $CurrentForm->getValue("hora_inicio") : $CurrentForm->getValue("x_hora_inicio");
		if (!$this->hora_inicio->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_inicio->Visible = FALSE; // Disable update for API request
			else
				$this->hora_inicio->setFormValue($val);
			$this->hora_inicio->CurrentValue = UnFormatDateTime($this->hora_inicio->CurrentValue, 0);
		}

		// Check field name 'hora_destino' first before field var 'x_hora_destino'
		$val = $CurrentForm->hasValue("hora_destino") ? $CurrentForm->getValue("hora_destino") : $CurrentForm->getValue("x_hora_destino");
		if (!$this->hora_destino->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_destino->Visible = FALSE; // Disable update for API request
			else
				$this->hora_destino->setFormValue($val);
			$this->hora_destino->CurrentValue = UnFormatDateTime($this->hora_destino->CurrentValue, 0);
		}

		// Check field name 'hora_preposicion' first before field var 'x_hora_preposicion'
		$val = $CurrentForm->hasValue("hora_preposicion") ? $CurrentForm->getValue("hora_preposicion") : $CurrentForm->getValue("x_hora_preposicion");
		if (!$this->hora_preposicion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_preposicion->Visible = FALSE; // Disable update for API request
			else
				$this->hora_preposicion->setFormValue($val);
			$this->hora_preposicion->CurrentValue = UnFormatDateTime($this->hora_preposicion->CurrentValue, 0);
		}

		// Check field name 'base' first before field var 'x_base'
		$val = $CurrentForm->hasValue("base") ? $CurrentForm->getValue("base") : $CurrentForm->getValue("x_base");
		if (!$this->base->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->base->Visible = FALSE; // Disable update for API request
			else
				$this->base->setFormValue($val);
		}

		// Check field name 'sede' first before field var 'x_sede'
		$val = $CurrentForm->hasValue("sede") ? $CurrentForm->getValue("sede") : $CurrentForm->getValue("x_sede");
		if (!$this->sede->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sede->Visible = FALSE; // Disable update for API request
			else
				$this->sede->setFormValue($val);
		}

		// Check field name 'cierre' first before field var 'x_cierre'
		$val = $CurrentForm->hasValue("cierre") ? $CurrentForm->getValue("cierre") : $CurrentForm->getValue("x_cierre");
		if (!$this->cierre->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cierre->Visible = FALSE; // Disable update for API request
			else
				$this->cierre->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casopreh->CurrentValue = $this->cod_casopreh->FormValue;
		$this->fecha->CurrentValue = $this->fecha->FormValue;
		$this->fecha->CurrentValue = UnFormatDateTime($this->fecha->CurrentValue, 0);
		$this->prioridad->CurrentValue = $this->prioridad->FormValue;
		$this->nombre_es->CurrentValue = $this->nombre_es->FormValue;
		$this->tiempo->CurrentValue = $this->tiempo->FormValue;
		$this->cod_ambulancia->CurrentValue = $this->cod_ambulancia->FormValue;
		$this->hora_asigna->CurrentValue = $this->hora_asigna->FormValue;
		$this->hora_asigna->CurrentValue = UnFormatDateTime($this->hora_asigna->CurrentValue, 0);
		$this->hora_llegada->CurrentValue = $this->hora_llegada->FormValue;
		$this->hora_llegada->CurrentValue = UnFormatDateTime($this->hora_llegada->CurrentValue, 0);
		$this->hora_inicio->CurrentValue = $this->hora_inicio->FormValue;
		$this->hora_inicio->CurrentValue = UnFormatDateTime($this->hora_inicio->CurrentValue, 0);
		$this->hora_destino->CurrentValue = $this->hora_destino->FormValue;
		$this->hora_destino->CurrentValue = UnFormatDateTime($this->hora_destino->CurrentValue, 0);
		$this->hora_preposicion->CurrentValue = $this->hora_preposicion->FormValue;
		$this->hora_preposicion->CurrentValue = UnFormatDateTime($this->hora_preposicion->CurrentValue, 0);
		$this->base->CurrentValue = $this->base->FormValue;
		$this->sede->CurrentValue = $this->sede->FormValue;
		$this->cierre->CurrentValue = $this->cierre->FormValue;
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
		$this->cod_casopreh->setDbValue($row['cod_casopreh']);
		$this->fecha->setDbValue($row['fecha']);
		$this->prioridad->setDbValue($row['prioridad']);
		$this->nombre_es->setDbValue($row['nombre_es']);
		$this->tiempo->setDbValue($row['tiempo']);
		$this->cod_ambulancia->setDbValue($row['cod_ambulancia']);
		$this->hora_asigna->setDbValue($row['hora_asigna']);
		$this->hora_llegada->setDbValue($row['hora_llegada']);
		$this->hora_inicio->setDbValue($row['hora_inicio']);
		$this->hora_destino->setDbValue($row['hora_destino']);
		$this->hora_preposicion->setDbValue($row['hora_preposicion']);
		$this->base->setDbValue($row['base']);
		$this->sede->setDbValue($row['sede']);
		$this->cierre->setDbValue($row['cierre']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['cod_casopreh'] = NULL;
		$row['fecha'] = NULL;
		$row['prioridad'] = NULL;
		$row['nombre_es'] = NULL;
		$row['tiempo'] = NULL;
		$row['cod_ambulancia'] = NULL;
		$row['hora_asigna'] = NULL;
		$row['hora_llegada'] = NULL;
		$row['hora_inicio'] = NULL;
		$row['hora_destino'] = NULL;
		$row['hora_preposicion'] = NULL;
		$row['base'] = NULL;
		$row['sede'] = NULL;
		$row['cierre'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("cod_casopreh")) != "")
			$this->cod_casopreh->OldValue = $this->getKey("cod_casopreh"); // cod_casopreh
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
		// Convert decimal values if posted back

		if ($this->tiempo->FormValue == $this->tiempo->CurrentValue && is_numeric(ConvertToFloatString($this->tiempo->CurrentValue)))
			$this->tiempo->CurrentValue = ConvertToFloatString($this->tiempo->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// cod_casopreh
		// fecha
		// prioridad
		// nombre_es
		// tiempo
		// cod_ambulancia
		// hora_asigna
		// hora_llegada
		// hora_inicio
		// hora_destino
		// hora_preposicion
		// base
		// sede
		// cierre

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// cod_casopreh
			$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
			$this->cod_casopreh->ViewValue = FormatNumber($this->cod_casopreh->ViewValue, 0, -2, -2, -2);
			$this->cod_casopreh->CssClass = "font-weight-bold";
			$this->cod_casopreh->CellCssStyle .= "text-align: center;";
			$this->cod_casopreh->ViewCustomAttributes = "";

			// fecha
			$this->fecha->ViewValue = $this->fecha->CurrentValue;
			$this->fecha->ViewValue = FormatDateTime($this->fecha->ViewValue, 0);
			$this->fecha->ViewCustomAttributes = "";

			// prioridad
			$this->prioridad->ViewValue = $this->prioridad->CurrentValue;
			$this->prioridad->ViewValue = FormatNumber($this->prioridad->ViewValue, 0, -2, -2, -2);
			$this->prioridad->ViewCustomAttributes = "";

			// nombre_es
			$this->nombre_es->ViewValue = $this->nombre_es->CurrentValue;
			$this->nombre_es->ViewCustomAttributes = "";

			// tiempo
			$this->tiempo->ViewValue = $this->tiempo->CurrentValue;
			$this->tiempo->ViewValue = FormatNumber($this->tiempo->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->tiempo->ViewCustomAttributes = "";

			// cod_ambulancia
			$this->cod_ambulancia->ViewValue = $this->cod_ambulancia->CurrentValue;
			$this->cod_ambulancia->CellCssStyle .= "text-align: center;";
			$this->cod_ambulancia->ViewCustomAttributes = "";

			// hora_asigna
			$this->hora_asigna->ViewValue = $this->hora_asigna->CurrentValue;
			$this->hora_asigna->ViewValue = FormatDateTime($this->hora_asigna->ViewValue, 0);
			$this->hora_asigna->CellCssStyle .= "text-align: center;";
			$this->hora_asigna->ViewCustomAttributes = "";

			// hora_llegada
			$this->hora_llegada->ViewValue = $this->hora_llegada->CurrentValue;
			$this->hora_llegada->ViewValue = FormatDateTime($this->hora_llegada->ViewValue, 0);
			$this->hora_llegada->ViewCustomAttributes = "";

			// hora_inicio
			$this->hora_inicio->ViewValue = $this->hora_inicio->CurrentValue;
			$this->hora_inicio->ViewValue = FormatDateTime($this->hora_inicio->ViewValue, 0);
			$this->hora_inicio->ViewCustomAttributes = "";

			// hora_destino
			$this->hora_destino->ViewValue = $this->hora_destino->CurrentValue;
			$this->hora_destino->ViewValue = FormatDateTime($this->hora_destino->ViewValue, 0);
			$this->hora_destino->ViewCustomAttributes = "";

			// hora_preposicion
			$this->hora_preposicion->ViewValue = $this->hora_preposicion->CurrentValue;
			$this->hora_preposicion->ViewValue = FormatDateTime($this->hora_preposicion->ViewValue, 0);
			$this->hora_preposicion->ViewCustomAttributes = "";

			// base
			$this->base->ViewValue = $this->base->CurrentValue;
			$this->base->ViewCustomAttributes = "";

			// sede
			$this->sede->ViewValue = $this->sede->CurrentValue;
			$this->sede->ViewValue = FormatNumber($this->sede->ViewValue, 0, -2, -2, -2);
			$this->sede->ViewCustomAttributes = "";

			// cierre
			$this->cierre->ViewValue = $this->cierre->CurrentValue;
			$this->cierre->ViewValue = FormatNumber($this->cierre->ViewValue, 0, -2, -2, -2);
			$this->cierre->ViewCustomAttributes = "";

			// cod_casopreh
			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";
			$this->cod_casopreh->TooltipValue = "";

			// fecha
			$this->fecha->LinkCustomAttributes = "";
			$this->fecha->HrefValue = "";
			$this->fecha->TooltipValue = "";

			// prioridad
			$this->prioridad->LinkCustomAttributes = "";
			$this->prioridad->HrefValue = "";
			$this->prioridad->TooltipValue = "";

			// nombre_es
			$this->nombre_es->LinkCustomAttributes = "";
			$this->nombre_es->HrefValue = "";
			$this->nombre_es->TooltipValue = "";

			// tiempo
			$this->tiempo->LinkCustomAttributes = "";
			$this->tiempo->HrefValue = "";
			$this->tiempo->TooltipValue = "";

			// cod_ambulancia
			$this->cod_ambulancia->LinkCustomAttributes = "";
			$this->cod_ambulancia->HrefValue = "";
			$this->cod_ambulancia->TooltipValue = "";

			// hora_asigna
			$this->hora_asigna->LinkCustomAttributes = "";
			$this->hora_asigna->HrefValue = "";
			$this->hora_asigna->TooltipValue = "";

			// hora_llegada
			$this->hora_llegada->LinkCustomAttributes = "";
			$this->hora_llegada->HrefValue = "";
			$this->hora_llegada->TooltipValue = "";

			// hora_inicio
			$this->hora_inicio->LinkCustomAttributes = "";
			$this->hora_inicio->HrefValue = "";
			$this->hora_inicio->TooltipValue = "";

			// hora_destino
			$this->hora_destino->LinkCustomAttributes = "";
			$this->hora_destino->HrefValue = "";
			$this->hora_destino->TooltipValue = "";

			// hora_preposicion
			$this->hora_preposicion->LinkCustomAttributes = "";
			$this->hora_preposicion->HrefValue = "";
			$this->hora_preposicion->TooltipValue = "";

			// base
			$this->base->LinkCustomAttributes = "";
			$this->base->HrefValue = "";
			$this->base->TooltipValue = "";

			// sede
			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";
			$this->sede->TooltipValue = "";

			// cierre
			$this->cierre->LinkCustomAttributes = "";
			$this->cierre->HrefValue = "";
			$this->cierre->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// cod_casopreh
			$this->cod_casopreh->EditAttrs["class"] = "form-control";
			$this->cod_casopreh->EditCustomAttributes = "";
			$this->cod_casopreh->EditValue = HtmlEncode($this->cod_casopreh->CurrentValue);
			$this->cod_casopreh->PlaceHolder = RemoveHtml($this->cod_casopreh->caption());

			// fecha
			$this->fecha->EditAttrs["class"] = "form-control";
			$this->fecha->EditCustomAttributes = "";
			$this->fecha->EditValue = HtmlEncode(FormatDateTime($this->fecha->CurrentValue, 8));
			$this->fecha->PlaceHolder = RemoveHtml($this->fecha->caption());

			// prioridad
			$this->prioridad->EditAttrs["class"] = "form-control";
			$this->prioridad->EditCustomAttributes = "";
			$this->prioridad->EditValue = HtmlEncode($this->prioridad->CurrentValue);
			$this->prioridad->PlaceHolder = RemoveHtml($this->prioridad->caption());

			// nombre_es
			$this->nombre_es->EditAttrs["class"] = "form-control";
			$this->nombre_es->EditCustomAttributes = "";
			if (!$this->nombre_es->Raw)
				$this->nombre_es->CurrentValue = HtmlDecode($this->nombre_es->CurrentValue);
			$this->nombre_es->EditValue = HtmlEncode($this->nombre_es->CurrentValue);
			$this->nombre_es->PlaceHolder = RemoveHtml($this->nombre_es->caption());

			// tiempo
			$this->tiempo->EditAttrs["class"] = "form-control";
			$this->tiempo->EditCustomAttributes = "";
			$this->tiempo->EditValue = HtmlEncode($this->tiempo->CurrentValue);
			$this->tiempo->PlaceHolder = RemoveHtml($this->tiempo->caption());
			if (strval($this->tiempo->EditValue) != "" && is_numeric($this->tiempo->EditValue))
				$this->tiempo->EditValue = FormatNumber($this->tiempo->EditValue, -2, -1, -2, 0);
			

			// cod_ambulancia
			$this->cod_ambulancia->EditAttrs["class"] = "form-control";
			$this->cod_ambulancia->EditCustomAttributes = "";
			if (!$this->cod_ambulancia->Raw)
				$this->cod_ambulancia->CurrentValue = HtmlDecode($this->cod_ambulancia->CurrentValue);
			$this->cod_ambulancia->EditValue = HtmlEncode($this->cod_ambulancia->CurrentValue);
			$this->cod_ambulancia->PlaceHolder = RemoveHtml($this->cod_ambulancia->caption());

			// hora_asigna
			$this->hora_asigna->EditAttrs["class"] = "form-control";
			$this->hora_asigna->EditCustomAttributes = "";
			$this->hora_asigna->EditValue = HtmlEncode(FormatDateTime($this->hora_asigna->CurrentValue, 8));
			$this->hora_asigna->PlaceHolder = RemoveHtml($this->hora_asigna->caption());

			// hora_llegada
			$this->hora_llegada->EditAttrs["class"] = "form-control";
			$this->hora_llegada->EditCustomAttributes = "";
			$this->hora_llegada->EditValue = HtmlEncode(FormatDateTime($this->hora_llegada->CurrentValue, 8));
			$this->hora_llegada->PlaceHolder = RemoveHtml($this->hora_llegada->caption());

			// hora_inicio
			$this->hora_inicio->EditAttrs["class"] = "form-control";
			$this->hora_inicio->EditCustomAttributes = "";
			$this->hora_inicio->EditValue = HtmlEncode(FormatDateTime($this->hora_inicio->CurrentValue, 8));
			$this->hora_inicio->PlaceHolder = RemoveHtml($this->hora_inicio->caption());

			// hora_destino
			$this->hora_destino->EditAttrs["class"] = "form-control";
			$this->hora_destino->EditCustomAttributes = "";
			$this->hora_destino->EditValue = HtmlEncode(FormatDateTime($this->hora_destino->CurrentValue, 8));
			$this->hora_destino->PlaceHolder = RemoveHtml($this->hora_destino->caption());

			// hora_preposicion
			$this->hora_preposicion->EditAttrs["class"] = "form-control";
			$this->hora_preposicion->EditCustomAttributes = "";
			$this->hora_preposicion->EditValue = HtmlEncode(FormatDateTime($this->hora_preposicion->CurrentValue, 8));
			$this->hora_preposicion->PlaceHolder = RemoveHtml($this->hora_preposicion->caption());

			// base
			$this->base->EditAttrs["class"] = "form-control";
			$this->base->EditCustomAttributes = "";
			if (!$this->base->Raw)
				$this->base->CurrentValue = HtmlDecode($this->base->CurrentValue);
			$this->base->EditValue = HtmlEncode($this->base->CurrentValue);
			$this->base->PlaceHolder = RemoveHtml($this->base->caption());

			// sede
			$this->sede->EditAttrs["class"] = "form-control";
			$this->sede->EditCustomAttributes = "";
			$this->sede->EditValue = HtmlEncode($this->sede->CurrentValue);
			$this->sede->PlaceHolder = RemoveHtml($this->sede->caption());

			// cierre
			$this->cierre->EditAttrs["class"] = "form-control";
			$this->cierre->EditCustomAttributes = "";
			$this->cierre->EditValue = HtmlEncode($this->cierre->CurrentValue);
			$this->cierre->PlaceHolder = RemoveHtml($this->cierre->caption());

			// Edit refer script
			// cod_casopreh

			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";

			// fecha
			$this->fecha->LinkCustomAttributes = "";
			$this->fecha->HrefValue = "";

			// prioridad
			$this->prioridad->LinkCustomAttributes = "";
			$this->prioridad->HrefValue = "";

			// nombre_es
			$this->nombre_es->LinkCustomAttributes = "";
			$this->nombre_es->HrefValue = "";

			// tiempo
			$this->tiempo->LinkCustomAttributes = "";
			$this->tiempo->HrefValue = "";

			// cod_ambulancia
			$this->cod_ambulancia->LinkCustomAttributes = "";
			$this->cod_ambulancia->HrefValue = "";

			// hora_asigna
			$this->hora_asigna->LinkCustomAttributes = "";
			$this->hora_asigna->HrefValue = "";

			// hora_llegada
			$this->hora_llegada->LinkCustomAttributes = "";
			$this->hora_llegada->HrefValue = "";

			// hora_inicio
			$this->hora_inicio->LinkCustomAttributes = "";
			$this->hora_inicio->HrefValue = "";

			// hora_destino
			$this->hora_destino->LinkCustomAttributes = "";
			$this->hora_destino->HrefValue = "";

			// hora_preposicion
			$this->hora_preposicion->LinkCustomAttributes = "";
			$this->hora_preposicion->HrefValue = "";

			// base
			$this->base->LinkCustomAttributes = "";
			$this->base->HrefValue = "";

			// sede
			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";

			// cierre
			$this->cierre->LinkCustomAttributes = "";
			$this->cierre->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if (!CheckInteger($this->cod_casopreh->FormValue)) {
			AddMessage($FormError, $this->cod_casopreh->errorMessage());
		}
		if ($this->fecha->Required) {
			if (!$this->fecha->IsDetailKey && $this->fecha->FormValue != NULL && $this->fecha->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha->caption(), $this->fecha->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->fecha->FormValue)) {
			AddMessage($FormError, $this->fecha->errorMessage());
		}
		if ($this->prioridad->Required) {
			if (!$this->prioridad->IsDetailKey && $this->prioridad->FormValue != NULL && $this->prioridad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->prioridad->caption(), $this->prioridad->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->prioridad->FormValue)) {
			AddMessage($FormError, $this->prioridad->errorMessage());
		}
		if ($this->nombre_es->Required) {
			if (!$this->nombre_es->IsDetailKey && $this->nombre_es->FormValue != NULL && $this->nombre_es->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_es->caption(), $this->nombre_es->RequiredErrorMessage));
			}
		}
		if ($this->tiempo->Required) {
			if (!$this->tiempo->IsDetailKey && $this->tiempo->FormValue != NULL && $this->tiempo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tiempo->caption(), $this->tiempo->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->tiempo->FormValue)) {
			AddMessage($FormError, $this->tiempo->errorMessage());
		}
		if ($this->cod_ambulancia->Required) {
			if (!$this->cod_ambulancia->IsDetailKey && $this->cod_ambulancia->FormValue != NULL && $this->cod_ambulancia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_ambulancia->caption(), $this->cod_ambulancia->RequiredErrorMessage));
			}
		}
		if ($this->hora_asigna->Required) {
			if (!$this->hora_asigna->IsDetailKey && $this->hora_asigna->FormValue != NULL && $this->hora_asigna->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_asigna->caption(), $this->hora_asigna->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_asigna->FormValue)) {
			AddMessage($FormError, $this->hora_asigna->errorMessage());
		}
		if ($this->hora_llegada->Required) {
			if (!$this->hora_llegada->IsDetailKey && $this->hora_llegada->FormValue != NULL && $this->hora_llegada->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_llegada->caption(), $this->hora_llegada->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_llegada->FormValue)) {
			AddMessage($FormError, $this->hora_llegada->errorMessage());
		}
		if ($this->hora_inicio->Required) {
			if (!$this->hora_inicio->IsDetailKey && $this->hora_inicio->FormValue != NULL && $this->hora_inicio->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_inicio->caption(), $this->hora_inicio->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_inicio->FormValue)) {
			AddMessage($FormError, $this->hora_inicio->errorMessage());
		}
		if ($this->hora_destino->Required) {
			if (!$this->hora_destino->IsDetailKey && $this->hora_destino->FormValue != NULL && $this->hora_destino->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_destino->caption(), $this->hora_destino->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_destino->FormValue)) {
			AddMessage($FormError, $this->hora_destino->errorMessage());
		}
		if ($this->hora_preposicion->Required) {
			if (!$this->hora_preposicion->IsDetailKey && $this->hora_preposicion->FormValue != NULL && $this->hora_preposicion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_preposicion->caption(), $this->hora_preposicion->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_preposicion->FormValue)) {
			AddMessage($FormError, $this->hora_preposicion->errorMessage());
		}
		if ($this->base->Required) {
			if (!$this->base->IsDetailKey && $this->base->FormValue != NULL && $this->base->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->base->caption(), $this->base->RequiredErrorMessage));
			}
		}
		if ($this->sede->Required) {
			if (!$this->sede->IsDetailKey && $this->sede->FormValue != NULL && $this->sede->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sede->caption(), $this->sede->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sede->FormValue)) {
			AddMessage($FormError, $this->sede->errorMessage());
		}
		if ($this->cierre->Required) {
			if (!$this->cierre->IsDetailKey && $this->cierre->FormValue != NULL && $this->cierre->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cierre->caption(), $this->cierre->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cierre->FormValue)) {
			AddMessage($FormError, $this->cierre->errorMessage());
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// cod_casopreh
			$this->cod_casopreh->setDbValueDef($rsnew, $this->cod_casopreh->CurrentValue, NULL, $this->cod_casopreh->ReadOnly);

			// fecha
			$this->fecha->setDbValueDef($rsnew, UnFormatDateTime($this->fecha->CurrentValue, 0), NULL, $this->fecha->ReadOnly);

			// prioridad
			$this->prioridad->setDbValueDef($rsnew, $this->prioridad->CurrentValue, NULL, $this->prioridad->ReadOnly);

			// nombre_es
			$this->nombre_es->setDbValueDef($rsnew, $this->nombre_es->CurrentValue, NULL, $this->nombre_es->ReadOnly);

			// tiempo
			$this->tiempo->setDbValueDef($rsnew, $this->tiempo->CurrentValue, NULL, $this->tiempo->ReadOnly);

			// cod_ambulancia
			$this->cod_ambulancia->setDbValueDef($rsnew, $this->cod_ambulancia->CurrentValue, NULL, $this->cod_ambulancia->ReadOnly);

			// hora_asigna
			$this->hora_asigna->setDbValueDef($rsnew, UnFormatDateTime($this->hora_asigna->CurrentValue, 0), NULL, $this->hora_asigna->ReadOnly);

			// hora_llegada
			$this->hora_llegada->setDbValueDef($rsnew, UnFormatDateTime($this->hora_llegada->CurrentValue, 0), NULL, $this->hora_llegada->ReadOnly);

			// hora_inicio
			$this->hora_inicio->setDbValueDef($rsnew, UnFormatDateTime($this->hora_inicio->CurrentValue, 0), NULL, $this->hora_inicio->ReadOnly);

			// hora_destino
			$this->hora_destino->setDbValueDef($rsnew, UnFormatDateTime($this->hora_destino->CurrentValue, 0), NULL, $this->hora_destino->ReadOnly);

			// hora_preposicion
			$this->hora_preposicion->setDbValueDef($rsnew, UnFormatDateTime($this->hora_preposicion->CurrentValue, 0), NULL, $this->hora_preposicion->ReadOnly);

			// base
			$this->base->setDbValueDef($rsnew, $this->base->CurrentValue, NULL, $this->base->ReadOnly);

			// sede
			$this->sede->setDbValueDef($rsnew, $this->sede->CurrentValue, NULL, $this->sede->ReadOnly);

			// cierre
			$this->cierre->setDbValueDef($rsnew, $this->cierre->CurrentValue, NULL, $this->cierre->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_despacholist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
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