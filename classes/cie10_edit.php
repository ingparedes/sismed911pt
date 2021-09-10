<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class cie10_edit extends cie10
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'cie10';

	// Page object name
	public $PageObjName = "cie10_edit";

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

		// Table object (cie10)
		if (!isset($GLOBALS["cie10"]) || get_class($GLOBALS["cie10"]) == PROJECT_NAMESPACE . "cie10") {
			$GLOBALS["cie10"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["cie10"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'cie10');

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
		global $cie10;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($cie10);
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
					if ($pageName == "cie10view.php")
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
			$key .= @$ar['codigo_cie'];
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
					$this->terminate(GetUrl("cie10list.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->codigo_cie->setVisibility();
		$this->diagnostico->setVisibility();
		$this->nivel->setVisibility();
		$this->grupo->setVisibility();
		$this->sexo->setVisibility();
		$this->clasificacion->setVisibility();
		$this->cod->setVisibility();
		$this->notifica->setVisibility();
		$this->soat->setVisibility();
		$this->diagnostico_en->setVisibility();
		$this->diagnostico_pr->setVisibility();
		$this->diagnostico_fr->setVisibility();
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
			$this->terminate("cie10list.php");
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
			if (Get("codigo_cie") !== NULL) {
				$this->codigo_cie->setQueryStringValue(Get("codigo_cie"));
				$this->codigo_cie->setOldValue($this->codigo_cie->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->codigo_cie->setQueryStringValue(Key(0));
				$this->codigo_cie->setOldValue($this->codigo_cie->QueryStringValue);
			} elseif (Post("codigo_cie") !== NULL) {
				$this->codigo_cie->setFormValue(Post("codigo_cie"));
				$this->codigo_cie->setOldValue($this->codigo_cie->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->codigo_cie->setQueryStringValue(Route(2));
				$this->codigo_cie->setOldValue($this->codigo_cie->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_codigo_cie")) {
					$this->codigo_cie->setFormValue($CurrentForm->getValue("x_codigo_cie"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("codigo_cie") !== NULL) {
					$this->codigo_cie->setQueryStringValue(Get("codigo_cie"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->codigo_cie->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->codigo_cie->CurrentValue = NULL;
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
					$this->terminate("cie10list.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "cie10list.php")
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

		// Check field name 'codigo_cie' first before field var 'x_codigo_cie'
		$val = $CurrentForm->hasValue("codigo_cie") ? $CurrentForm->getValue("codigo_cie") : $CurrentForm->getValue("x_codigo_cie");
		if (!$this->codigo_cie->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->codigo_cie->Visible = FALSE; // Disable update for API request
			else
				$this->codigo_cie->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_codigo_cie"))
			$this->codigo_cie->setOldValue($CurrentForm->getValue("o_codigo_cie"));

		// Check field name 'diagnostico' first before field var 'x_diagnostico'
		$val = $CurrentForm->hasValue("diagnostico") ? $CurrentForm->getValue("diagnostico") : $CurrentForm->getValue("x_diagnostico");
		if (!$this->diagnostico->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->diagnostico->Visible = FALSE; // Disable update for API request
			else
				$this->diagnostico->setFormValue($val);
		}

		// Check field name 'nivel' first before field var 'x_nivel'
		$val = $CurrentForm->hasValue("nivel") ? $CurrentForm->getValue("nivel") : $CurrentForm->getValue("x_nivel");
		if (!$this->nivel->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nivel->Visible = FALSE; // Disable update for API request
			else
				$this->nivel->setFormValue($val);
		}

		// Check field name 'grupo' first before field var 'x_grupo'
		$val = $CurrentForm->hasValue("grupo") ? $CurrentForm->getValue("grupo") : $CurrentForm->getValue("x_grupo");
		if (!$this->grupo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->grupo->Visible = FALSE; // Disable update for API request
			else
				$this->grupo->setFormValue($val);
		}

		// Check field name 'sexo' first before field var 'x_sexo'
		$val = $CurrentForm->hasValue("sexo") ? $CurrentForm->getValue("sexo") : $CurrentForm->getValue("x_sexo");
		if (!$this->sexo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sexo->Visible = FALSE; // Disable update for API request
			else
				$this->sexo->setFormValue($val);
		}

		// Check field name 'clasificacion' first before field var 'x_clasificacion'
		$val = $CurrentForm->hasValue("clasificacion") ? $CurrentForm->getValue("clasificacion") : $CurrentForm->getValue("x_clasificacion");
		if (!$this->clasificacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->clasificacion->Visible = FALSE; // Disable update for API request
			else
				$this->clasificacion->setFormValue($val);
		}

		// Check field name 'cod' first before field var 'x_cod'
		$val = $CurrentForm->hasValue("cod") ? $CurrentForm->getValue("cod") : $CurrentForm->getValue("x_cod");
		if (!$this->cod->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod->Visible = FALSE; // Disable update for API request
			else
				$this->cod->setFormValue($val);
		}

		// Check field name 'notifica' first before field var 'x_notifica'
		$val = $CurrentForm->hasValue("notifica") ? $CurrentForm->getValue("notifica") : $CurrentForm->getValue("x_notifica");
		if (!$this->notifica->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->notifica->Visible = FALSE; // Disable update for API request
			else
				$this->notifica->setFormValue($val);
		}

		// Check field name 'soat' first before field var 'x_soat'
		$val = $CurrentForm->hasValue("soat") ? $CurrentForm->getValue("soat") : $CurrentForm->getValue("x_soat");
		if (!$this->soat->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->soat->Visible = FALSE; // Disable update for API request
			else
				$this->soat->setFormValue($val);
		}

		// Check field name 'diagnostico_en' first before field var 'x_diagnostico_en'
		$val = $CurrentForm->hasValue("diagnostico_en") ? $CurrentForm->getValue("diagnostico_en") : $CurrentForm->getValue("x_diagnostico_en");
		if (!$this->diagnostico_en->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->diagnostico_en->Visible = FALSE; // Disable update for API request
			else
				$this->diagnostico_en->setFormValue($val);
		}

		// Check field name 'diagnostico_pr' first before field var 'x_diagnostico_pr'
		$val = $CurrentForm->hasValue("diagnostico_pr") ? $CurrentForm->getValue("diagnostico_pr") : $CurrentForm->getValue("x_diagnostico_pr");
		if (!$this->diagnostico_pr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->diagnostico_pr->Visible = FALSE; // Disable update for API request
			else
				$this->diagnostico_pr->setFormValue($val);
		}

		// Check field name 'diagnostico_fr' first before field var 'x_diagnostico_fr'
		$val = $CurrentForm->hasValue("diagnostico_fr") ? $CurrentForm->getValue("diagnostico_fr") : $CurrentForm->getValue("x_diagnostico_fr");
		if (!$this->diagnostico_fr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->diagnostico_fr->Visible = FALSE; // Disable update for API request
			else
				$this->diagnostico_fr->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->codigo_cie->CurrentValue = $this->codigo_cie->FormValue;
		$this->diagnostico->CurrentValue = $this->diagnostico->FormValue;
		$this->nivel->CurrentValue = $this->nivel->FormValue;
		$this->grupo->CurrentValue = $this->grupo->FormValue;
		$this->sexo->CurrentValue = $this->sexo->FormValue;
		$this->clasificacion->CurrentValue = $this->clasificacion->FormValue;
		$this->cod->CurrentValue = $this->cod->FormValue;
		$this->notifica->CurrentValue = $this->notifica->FormValue;
		$this->soat->CurrentValue = $this->soat->FormValue;
		$this->diagnostico_en->CurrentValue = $this->diagnostico_en->FormValue;
		$this->diagnostico_pr->CurrentValue = $this->diagnostico_pr->FormValue;
		$this->diagnostico_fr->CurrentValue = $this->diagnostico_fr->FormValue;
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
		$this->codigo_cie->setDbValue($row['codigo_cie']);
		$this->diagnostico->setDbValue($row['diagnostico']);
		$this->nivel->setDbValue($row['nivel']);
		$this->grupo->setDbValue($row['grupo']);
		$this->sexo->setDbValue($row['sexo']);
		$this->clasificacion->setDbValue($row['clasificacion']);
		$this->cod->setDbValue($row['cod']);
		$this->notifica->setDbValue($row['notifica']);
		$this->soat->setDbValue($row['soat']);
		$this->diagnostico_en->setDbValue($row['diagnostico_en']);
		$this->diagnostico_pr->setDbValue($row['diagnostico_pr']);
		$this->diagnostico_fr->setDbValue($row['diagnostico_fr']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['codigo_cie'] = NULL;
		$row['diagnostico'] = NULL;
		$row['nivel'] = NULL;
		$row['grupo'] = NULL;
		$row['sexo'] = NULL;
		$row['clasificacion'] = NULL;
		$row['cod'] = NULL;
		$row['notifica'] = NULL;
		$row['soat'] = NULL;
		$row['diagnostico_en'] = NULL;
		$row['diagnostico_pr'] = NULL;
		$row['diagnostico_fr'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("codigo_cie")) != "")
			$this->codigo_cie->OldValue = $this->getKey("codigo_cie"); // codigo_cie
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
		// codigo_cie
		// diagnostico
		// nivel
		// grupo
		// sexo
		// clasificacion
		// cod
		// notifica
		// soat
		// diagnostico_en
		// diagnostico_pr
		// diagnostico_fr

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// codigo_cie
			$this->codigo_cie->ViewValue = $this->codigo_cie->CurrentValue;
			$this->codigo_cie->ViewCustomAttributes = "";

			// diagnostico
			$this->diagnostico->ViewValue = $this->diagnostico->CurrentValue;
			$this->diagnostico->ViewCustomAttributes = "";

			// nivel
			$this->nivel->ViewValue = $this->nivel->CurrentValue;
			$this->nivel->ViewCustomAttributes = "";

			// grupo
			$this->grupo->ViewValue = $this->grupo->CurrentValue;
			$this->grupo->ViewCustomAttributes = "";

			// sexo
			$this->sexo->ViewValue = $this->sexo->CurrentValue;
			$this->sexo->ViewCustomAttributes = "";

			// clasificacion
			$this->clasificacion->ViewValue = $this->clasificacion->CurrentValue;
			$this->clasificacion->ViewValue = FormatNumber($this->clasificacion->ViewValue, 0, -2, -2, -2);
			$this->clasificacion->ViewCustomAttributes = "";

			// cod
			$this->cod->ViewValue = $this->cod->CurrentValue;
			$this->cod->ViewCustomAttributes = "";

			// notifica
			$this->notifica->ViewValue = $this->notifica->CurrentValue;
			$this->notifica->ViewValue = FormatNumber($this->notifica->ViewValue, 0, -2, -2, -2);
			$this->notifica->ViewCustomAttributes = "";

			// soat
			$this->soat->ViewValue = $this->soat->CurrentValue;
			$this->soat->ViewCustomAttributes = "";

			// diagnostico_en
			$this->diagnostico_en->ViewValue = $this->diagnostico_en->CurrentValue;
			$this->diagnostico_en->ViewCustomAttributes = "";

			// diagnostico_pr
			$this->diagnostico_pr->ViewValue = $this->diagnostico_pr->CurrentValue;
			$this->diagnostico_pr->ViewCustomAttributes = "";

			// diagnostico_fr
			$this->diagnostico_fr->ViewValue = $this->diagnostico_fr->CurrentValue;
			$this->diagnostico_fr->ViewCustomAttributes = "";

			// codigo_cie
			$this->codigo_cie->LinkCustomAttributes = "";
			$this->codigo_cie->HrefValue = "";
			$this->codigo_cie->TooltipValue = "";

			// diagnostico
			$this->diagnostico->LinkCustomAttributes = "";
			$this->diagnostico->HrefValue = "";
			$this->diagnostico->TooltipValue = "";

			// nivel
			$this->nivel->LinkCustomAttributes = "";
			$this->nivel->HrefValue = "";
			$this->nivel->TooltipValue = "";

			// grupo
			$this->grupo->LinkCustomAttributes = "";
			$this->grupo->HrefValue = "";
			$this->grupo->TooltipValue = "";

			// sexo
			$this->sexo->LinkCustomAttributes = "";
			$this->sexo->HrefValue = "";
			$this->sexo->TooltipValue = "";

			// clasificacion
			$this->clasificacion->LinkCustomAttributes = "";
			$this->clasificacion->HrefValue = "";
			$this->clasificacion->TooltipValue = "";

			// cod
			$this->cod->LinkCustomAttributes = "";
			$this->cod->HrefValue = "";
			$this->cod->TooltipValue = "";

			// notifica
			$this->notifica->LinkCustomAttributes = "";
			$this->notifica->HrefValue = "";
			$this->notifica->TooltipValue = "";

			// soat
			$this->soat->LinkCustomAttributes = "";
			$this->soat->HrefValue = "";
			$this->soat->TooltipValue = "";

			// diagnostico_en
			$this->diagnostico_en->LinkCustomAttributes = "";
			$this->diagnostico_en->HrefValue = "";
			$this->diagnostico_en->TooltipValue = "";

			// diagnostico_pr
			$this->diagnostico_pr->LinkCustomAttributes = "";
			$this->diagnostico_pr->HrefValue = "";
			$this->diagnostico_pr->TooltipValue = "";

			// diagnostico_fr
			$this->diagnostico_fr->LinkCustomAttributes = "";
			$this->diagnostico_fr->HrefValue = "";
			$this->diagnostico_fr->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// codigo_cie
			$this->codigo_cie->EditAttrs["class"] = "form-control";
			$this->codigo_cie->EditCustomAttributes = "";
			if (!$this->codigo_cie->Raw)
				$this->codigo_cie->CurrentValue = HtmlDecode($this->codigo_cie->CurrentValue);
			$this->codigo_cie->EditValue = HtmlEncode($this->codigo_cie->CurrentValue);
			$this->codigo_cie->PlaceHolder = RemoveHtml($this->codigo_cie->caption());

			// diagnostico
			$this->diagnostico->EditAttrs["class"] = "form-control";
			$this->diagnostico->EditCustomAttributes = "";
			if (!$this->diagnostico->Raw)
				$this->diagnostico->CurrentValue = HtmlDecode($this->diagnostico->CurrentValue);
			$this->diagnostico->EditValue = HtmlEncode($this->diagnostico->CurrentValue);
			$this->diagnostico->PlaceHolder = RemoveHtml($this->diagnostico->caption());

			// nivel
			$this->nivel->EditAttrs["class"] = "form-control";
			$this->nivel->EditCustomAttributes = "";
			if (!$this->nivel->Raw)
				$this->nivel->CurrentValue = HtmlDecode($this->nivel->CurrentValue);
			$this->nivel->EditValue = HtmlEncode($this->nivel->CurrentValue);
			$this->nivel->PlaceHolder = RemoveHtml($this->nivel->caption());

			// grupo
			$this->grupo->EditAttrs["class"] = "form-control";
			$this->grupo->EditCustomAttributes = "";
			if (!$this->grupo->Raw)
				$this->grupo->CurrentValue = HtmlDecode($this->grupo->CurrentValue);
			$this->grupo->EditValue = HtmlEncode($this->grupo->CurrentValue);
			$this->grupo->PlaceHolder = RemoveHtml($this->grupo->caption());

			// sexo
			$this->sexo->EditAttrs["class"] = "form-control";
			$this->sexo->EditCustomAttributes = "";
			if (!$this->sexo->Raw)
				$this->sexo->CurrentValue = HtmlDecode($this->sexo->CurrentValue);
			$this->sexo->EditValue = HtmlEncode($this->sexo->CurrentValue);
			$this->sexo->PlaceHolder = RemoveHtml($this->sexo->caption());

			// clasificacion
			$this->clasificacion->EditAttrs["class"] = "form-control";
			$this->clasificacion->EditCustomAttributes = "";
			$this->clasificacion->EditValue = HtmlEncode($this->clasificacion->CurrentValue);
			$this->clasificacion->PlaceHolder = RemoveHtml($this->clasificacion->caption());

			// cod
			$this->cod->EditAttrs["class"] = "form-control";
			$this->cod->EditCustomAttributes = "";
			if (!$this->cod->Raw)
				$this->cod->CurrentValue = HtmlDecode($this->cod->CurrentValue);
			$this->cod->EditValue = HtmlEncode($this->cod->CurrentValue);
			$this->cod->PlaceHolder = RemoveHtml($this->cod->caption());

			// notifica
			$this->notifica->EditAttrs["class"] = "form-control";
			$this->notifica->EditCustomAttributes = "";
			$this->notifica->EditValue = HtmlEncode($this->notifica->CurrentValue);
			$this->notifica->PlaceHolder = RemoveHtml($this->notifica->caption());

			// soat
			$this->soat->EditAttrs["class"] = "form-control";
			$this->soat->EditCustomAttributes = "";
			if (!$this->soat->Raw)
				$this->soat->CurrentValue = HtmlDecode($this->soat->CurrentValue);
			$this->soat->EditValue = HtmlEncode($this->soat->CurrentValue);
			$this->soat->PlaceHolder = RemoveHtml($this->soat->caption());

			// diagnostico_en
			$this->diagnostico_en->EditAttrs["class"] = "form-control";
			$this->diagnostico_en->EditCustomAttributes = "";
			$this->diagnostico_en->EditValue = HtmlEncode($this->diagnostico_en->CurrentValue);
			$this->diagnostico_en->PlaceHolder = RemoveHtml($this->diagnostico_en->caption());

			// diagnostico_pr
			$this->diagnostico_pr->EditAttrs["class"] = "form-control";
			$this->diagnostico_pr->EditCustomAttributes = "";
			$this->diagnostico_pr->EditValue = HtmlEncode($this->diagnostico_pr->CurrentValue);
			$this->diagnostico_pr->PlaceHolder = RemoveHtml($this->diagnostico_pr->caption());

			// diagnostico_fr
			$this->diagnostico_fr->EditAttrs["class"] = "form-control";
			$this->diagnostico_fr->EditCustomAttributes = "";
			$this->diagnostico_fr->EditValue = HtmlEncode($this->diagnostico_fr->CurrentValue);
			$this->diagnostico_fr->PlaceHolder = RemoveHtml($this->diagnostico_fr->caption());

			// Edit refer script
			// codigo_cie

			$this->codigo_cie->LinkCustomAttributes = "";
			$this->codigo_cie->HrefValue = "";

			// diagnostico
			$this->diagnostico->LinkCustomAttributes = "";
			$this->diagnostico->HrefValue = "";

			// nivel
			$this->nivel->LinkCustomAttributes = "";
			$this->nivel->HrefValue = "";

			// grupo
			$this->grupo->LinkCustomAttributes = "";
			$this->grupo->HrefValue = "";

			// sexo
			$this->sexo->LinkCustomAttributes = "";
			$this->sexo->HrefValue = "";

			// clasificacion
			$this->clasificacion->LinkCustomAttributes = "";
			$this->clasificacion->HrefValue = "";

			// cod
			$this->cod->LinkCustomAttributes = "";
			$this->cod->HrefValue = "";

			// notifica
			$this->notifica->LinkCustomAttributes = "";
			$this->notifica->HrefValue = "";

			// soat
			$this->soat->LinkCustomAttributes = "";
			$this->soat->HrefValue = "";

			// diagnostico_en
			$this->diagnostico_en->LinkCustomAttributes = "";
			$this->diagnostico_en->HrefValue = "";

			// diagnostico_pr
			$this->diagnostico_pr->LinkCustomAttributes = "";
			$this->diagnostico_pr->HrefValue = "";

			// diagnostico_fr
			$this->diagnostico_fr->LinkCustomAttributes = "";
			$this->diagnostico_fr->HrefValue = "";
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
		if ($this->codigo_cie->Required) {
			if (!$this->codigo_cie->IsDetailKey && $this->codigo_cie->FormValue != NULL && $this->codigo_cie->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->codigo_cie->caption(), $this->codigo_cie->RequiredErrorMessage));
			}
		}
		if ($this->diagnostico->Required) {
			if (!$this->diagnostico->IsDetailKey && $this->diagnostico->FormValue != NULL && $this->diagnostico->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diagnostico->caption(), $this->diagnostico->RequiredErrorMessage));
			}
		}
		if ($this->nivel->Required) {
			if (!$this->nivel->IsDetailKey && $this->nivel->FormValue != NULL && $this->nivel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nivel->caption(), $this->nivel->RequiredErrorMessage));
			}
		}
		if ($this->grupo->Required) {
			if (!$this->grupo->IsDetailKey && $this->grupo->FormValue != NULL && $this->grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grupo->caption(), $this->grupo->RequiredErrorMessage));
			}
		}
		if ($this->sexo->Required) {
			if (!$this->sexo->IsDetailKey && $this->sexo->FormValue != NULL && $this->sexo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sexo->caption(), $this->sexo->RequiredErrorMessage));
			}
		}
		if ($this->clasificacion->Required) {
			if (!$this->clasificacion->IsDetailKey && $this->clasificacion->FormValue != NULL && $this->clasificacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->clasificacion->caption(), $this->clasificacion->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->clasificacion->FormValue)) {
			AddMessage($FormError, $this->clasificacion->errorMessage());
		}
		if ($this->cod->Required) {
			if (!$this->cod->IsDetailKey && $this->cod->FormValue != NULL && $this->cod->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod->caption(), $this->cod->RequiredErrorMessage));
			}
		}
		if ($this->notifica->Required) {
			if (!$this->notifica->IsDetailKey && $this->notifica->FormValue != NULL && $this->notifica->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->notifica->caption(), $this->notifica->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->notifica->FormValue)) {
			AddMessage($FormError, $this->notifica->errorMessage());
		}
		if ($this->soat->Required) {
			if (!$this->soat->IsDetailKey && $this->soat->FormValue != NULL && $this->soat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->soat->caption(), $this->soat->RequiredErrorMessage));
			}
		}
		if ($this->diagnostico_en->Required) {
			if (!$this->diagnostico_en->IsDetailKey && $this->diagnostico_en->FormValue != NULL && $this->diagnostico_en->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diagnostico_en->caption(), $this->diagnostico_en->RequiredErrorMessage));
			}
		}
		if ($this->diagnostico_pr->Required) {
			if (!$this->diagnostico_pr->IsDetailKey && $this->diagnostico_pr->FormValue != NULL && $this->diagnostico_pr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diagnostico_pr->caption(), $this->diagnostico_pr->RequiredErrorMessage));
			}
		}
		if ($this->diagnostico_fr->Required) {
			if (!$this->diagnostico_fr->IsDetailKey && $this->diagnostico_fr->FormValue != NULL && $this->diagnostico_fr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diagnostico_fr->caption(), $this->diagnostico_fr->RequiredErrorMessage));
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

			// codigo_cie
			$this->codigo_cie->setDbValueDef($rsnew, $this->codigo_cie->CurrentValue, "", $this->codigo_cie->ReadOnly);

			// diagnostico
			$this->diagnostico->setDbValueDef($rsnew, $this->diagnostico->CurrentValue, NULL, $this->diagnostico->ReadOnly);

			// nivel
			$this->nivel->setDbValueDef($rsnew, $this->nivel->CurrentValue, NULL, $this->nivel->ReadOnly);

			// grupo
			$this->grupo->setDbValueDef($rsnew, $this->grupo->CurrentValue, NULL, $this->grupo->ReadOnly);

			// sexo
			$this->sexo->setDbValueDef($rsnew, $this->sexo->CurrentValue, NULL, $this->sexo->ReadOnly);

			// clasificacion
			$this->clasificacion->setDbValueDef($rsnew, $this->clasificacion->CurrentValue, NULL, $this->clasificacion->ReadOnly);

			// cod
			$this->cod->setDbValueDef($rsnew, $this->cod->CurrentValue, NULL, $this->cod->ReadOnly);

			// notifica
			$this->notifica->setDbValueDef($rsnew, $this->notifica->CurrentValue, NULL, $this->notifica->ReadOnly);

			// soat
			$this->soat->setDbValueDef($rsnew, $this->soat->CurrentValue, NULL, $this->soat->ReadOnly);

			// diagnostico_en
			$this->diagnostico_en->setDbValueDef($rsnew, $this->diagnostico_en->CurrentValue, NULL, $this->diagnostico_en->ReadOnly);

			// diagnostico_pr
			$this->diagnostico_pr->setDbValueDef($rsnew, $this->diagnostico_pr->CurrentValue, NULL, $this->diagnostico_pr->ReadOnly);

			// diagnostico_fr
			$this->diagnostico_fr->setDbValueDef($rsnew, $this->diagnostico_fr->CurrentValue, NULL, $this->diagnostico_fr->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("cie10list.php"), "", $this->TableVar, TRUE);
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