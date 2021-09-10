<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class usuarios_add extends usuarios
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'usuarios';

	// Page object name
	public $PageObjName = "usuarios_add";

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

		// Table object (usuarios)
		if (!isset($GLOBALS["usuarios"]) || get_class($GLOBALS["usuarios"]) == PROJECT_NAMESPACE . "usuarios") {
			$GLOBALS["usuarios"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["usuarios"];
		}

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'usuarios');

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
		global $usuarios;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($usuarios);
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
					if ($pageName == "usuariosview.php")
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
			$key .= @$ar['id_user'];
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id_user->Visible = FALSE;
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
					$this->terminate(GetUrl("usuarioslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_user->Visible = FALSE;
		$this->fecha_creacion->setVisibility();
		$this->nombres->setVisibility();
		$this->apellidos->setVisibility();
		$this->telefono->setVisibility();
		$this->_login->setVisibility();
		$this->pw->setVisibility();
		$this->perfil->setVisibility();
		$this->sede->setVisibility();
		$this->acode->setVisibility();
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
		$this->setupLookupOptions($this->perfil);
		$this->setupLookupOptions($this->sede);
		$this->setupLookupOptions($this->acode);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("usuarioslist.php");
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
			if (Get("id_user") !== NULL) {
				$this->id_user->setQueryStringValue(Get("id_user"));
				$this->setKey("id_user", $this->id_user->CurrentValue); // Set up key
			} else {
				$this->setKey("id_user", ""); // Clear key
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
					$this->terminate("usuarioslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "usuarioslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "usuariosview.php")
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
		$this->id_user->CurrentValue = NULL;
		$this->id_user->OldValue = $this->id_user->CurrentValue;
		$this->fecha_creacion->CurrentValue = NULL;
		$this->fecha_creacion->OldValue = $this->fecha_creacion->CurrentValue;
		$this->nombres->CurrentValue = NULL;
		$this->nombres->OldValue = $this->nombres->CurrentValue;
		$this->apellidos->CurrentValue = NULL;
		$this->apellidos->OldValue = $this->apellidos->CurrentValue;
		$this->telefono->CurrentValue = NULL;
		$this->telefono->OldValue = $this->telefono->CurrentValue;
		$this->_login->CurrentValue = NULL;
		$this->_login->OldValue = $this->_login->CurrentValue;
		$this->pw->CurrentValue = NULL;
		$this->pw->OldValue = $this->pw->CurrentValue;
		$this->perfil->CurrentValue = NULL;
		$this->perfil->OldValue = $this->perfil->CurrentValue;
		$this->sede->CurrentValue = NULL;
		$this->sede->OldValue = $this->sede->CurrentValue;
		$this->acode->CurrentValue = NULL;
		$this->acode->OldValue = $this->acode->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'fecha_creacion' first before field var 'x_fecha_creacion'
		$val = $CurrentForm->hasValue("fecha_creacion") ? $CurrentForm->getValue("fecha_creacion") : $CurrentForm->getValue("x_fecha_creacion");
		if (!$this->fecha_creacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_creacion->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_creacion->setFormValue($val);
			$this->fecha_creacion->CurrentValue = UnFormatDateTime($this->fecha_creacion->CurrentValue, 0);
		}

		// Check field name 'nombres' first before field var 'x_nombres'
		$val = $CurrentForm->hasValue("nombres") ? $CurrentForm->getValue("nombres") : $CurrentForm->getValue("x_nombres");
		if (!$this->nombres->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombres->Visible = FALSE; // Disable update for API request
			else
				$this->nombres->setFormValue($val);
		}

		// Check field name 'apellidos' first before field var 'x_apellidos'
		$val = $CurrentForm->hasValue("apellidos") ? $CurrentForm->getValue("apellidos") : $CurrentForm->getValue("x_apellidos");
		if (!$this->apellidos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->apellidos->Visible = FALSE; // Disable update for API request
			else
				$this->apellidos->setFormValue($val);
		}

		// Check field name 'telefono' first before field var 'x_telefono'
		$val = $CurrentForm->hasValue("telefono") ? $CurrentForm->getValue("telefono") : $CurrentForm->getValue("x_telefono");
		if (!$this->telefono->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono->Visible = FALSE; // Disable update for API request
			else
				$this->telefono->setFormValue($val);
		}

		// Check field name 'login' first before field var 'x__login'
		$val = $CurrentForm->hasValue("login") ? $CurrentForm->getValue("login") : $CurrentForm->getValue("x__login");
		if (!$this->_login->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_login->Visible = FALSE; // Disable update for API request
			else
				$this->_login->setFormValue($val);
		}

		// Check field name 'pw' first before field var 'x_pw'
		$val = $CurrentForm->hasValue("pw") ? $CurrentForm->getValue("pw") : $CurrentForm->getValue("x_pw");
		if (!$this->pw->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->pw->Visible = FALSE; // Disable update for API request
			else
				if (Config("ENCRYPTED_PASSWORD")) // Encrypted password, use raw value
					$this->pw->setRawFormValue($val);
				else
					$this->pw->setFormValue($val);
		}

		// Check field name 'perfil' first before field var 'x_perfil'
		$val = $CurrentForm->hasValue("perfil") ? $CurrentForm->getValue("perfil") : $CurrentForm->getValue("x_perfil");
		if (!$this->perfil->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->perfil->Visible = FALSE; // Disable update for API request
			else
				$this->perfil->setFormValue($val);
		}

		// Check field name 'sede' first before field var 'x_sede'
		$val = $CurrentForm->hasValue("sede") ? $CurrentForm->getValue("sede") : $CurrentForm->getValue("x_sede");
		if (!$this->sede->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sede->Visible = FALSE; // Disable update for API request
			else
				$this->sede->setFormValue($val);
		}

		// Check field name 'acode' first before field var 'x_acode'
		$val = $CurrentForm->hasValue("acode") ? $CurrentForm->getValue("acode") : $CurrentForm->getValue("x_acode");
		if (!$this->acode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->acode->Visible = FALSE; // Disable update for API request
			else
				$this->acode->setFormValue($val);
		}

		// Check field name 'id_user' first before field var 'x_id_user'
		$val = $CurrentForm->hasValue("id_user") ? $CurrentForm->getValue("id_user") : $CurrentForm->getValue("x_id_user");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->fecha_creacion->CurrentValue = $this->fecha_creacion->FormValue;
		$this->fecha_creacion->CurrentValue = UnFormatDateTime($this->fecha_creacion->CurrentValue, 0);
		$this->nombres->CurrentValue = $this->nombres->FormValue;
		$this->apellidos->CurrentValue = $this->apellidos->FormValue;
		$this->telefono->CurrentValue = $this->telefono->FormValue;
		$this->_login->CurrentValue = $this->_login->FormValue;
		$this->pw->CurrentValue = $this->pw->FormValue;
		$this->perfil->CurrentValue = $this->perfil->FormValue;
		$this->sede->CurrentValue = $this->sede->FormValue;
		$this->acode->CurrentValue = $this->acode->FormValue;
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
		$this->id_user->setDbValue($row['id_user']);
		$this->fecha_creacion->setDbValue($row['fecha_creacion']);
		$this->nombres->setDbValue($row['nombres']);
		$this->apellidos->setDbValue($row['apellidos']);
		$this->telefono->setDbValue($row['telefono']);
		$this->_login->setDbValue($row['login']);
		$this->pw->setDbValue($row['pw']);
		$this->perfil->setDbValue($row['perfil']);
		$this->sede->setDbValue($row['sede']);
		$this->acode->setDbValue($row['acode']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_user'] = $this->id_user->CurrentValue;
		$row['fecha_creacion'] = $this->fecha_creacion->CurrentValue;
		$row['nombres'] = $this->nombres->CurrentValue;
		$row['apellidos'] = $this->apellidos->CurrentValue;
		$row['telefono'] = $this->telefono->CurrentValue;
		$row['login'] = $this->_login->CurrentValue;
		$row['pw'] = $this->pw->CurrentValue;
		$row['perfil'] = $this->perfil->CurrentValue;
		$row['sede'] = $this->sede->CurrentValue;
		$row['acode'] = $this->acode->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_user")) != "")
			$this->id_user->OldValue = $this->getKey("id_user"); // id_user
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
		// id_user
		// fecha_creacion
		// nombres
		// apellidos
		// telefono
		// login
		// pw
		// perfil
		// sede
		// acode

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_user
			$this->id_user->ViewValue = $this->id_user->CurrentValue;
			$this->id_user->ViewCustomAttributes = "";

			// fecha_creacion
			$this->fecha_creacion->ViewValue = $this->fecha_creacion->CurrentValue;
			$this->fecha_creacion->ViewValue = FormatDateTime($this->fecha_creacion->ViewValue, 0);
			$this->fecha_creacion->ViewCustomAttributes = "";

			// nombres
			$this->nombres->ViewValue = $this->nombres->CurrentValue;
			$this->nombres->ViewCustomAttributes = "";

			// apellidos
			$this->apellidos->ViewValue = $this->apellidos->CurrentValue;
			$this->apellidos->ViewCustomAttributes = "";

			// telefono
			$this->telefono->ViewValue = $this->telefono->CurrentValue;
			$this->telefono->ViewCustomAttributes = "";

			// login
			$this->_login->ViewValue = $this->_login->CurrentValue;
			$this->_login->ViewCustomAttributes = "";

			// pw
			$this->pw->ViewValue = $Language->phrase("PasswordMask");
			$this->pw->ViewCustomAttributes = "";

			// perfil
			if ($Security->canAdmin()) { // System admin
				$curVal = strval($this->perfil->CurrentValue);
				if ($curVal != "") {
					$this->perfil->ViewValue = $this->perfil->lookupCacheOption($curVal);
					if ($this->perfil->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"userlevelid\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->perfil->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->perfil->ViewValue = $this->perfil->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->perfil->ViewValue = $this->perfil->CurrentValue;
						}
					}
				} else {
					$this->perfil->ViewValue = NULL;
				}
			} else {
				$this->perfil->ViewValue = $Language->phrase("PasswordMask");
			}
			$this->perfil->ViewCustomAttributes = "";

			// sede
			$curVal = strval($this->sede->CurrentValue);
			if ($curVal != "") {
				$this->sede->ViewValue = $this->sede->lookupCacheOption($curVal);
				if ($this->sede->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_sede\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->sede->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->sede->ViewValue = $this->sede->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->sede->ViewValue = $this->sede->CurrentValue;
					}
				}
			} else {
				$this->sede->ViewValue = NULL;
			}
			$this->sede->ViewCustomAttributes = "";

			// acode
			$curVal = strval($this->acode->CurrentValue);
			if ($curVal != "") {
				$this->acode->ViewValue = $this->acode->lookupCacheOption($curVal);
				if ($this->acode->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"nombreacode\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->acode->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->acode->ViewValue = $this->acode->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->acode->ViewValue = $this->acode->CurrentValue;
					}
				}
			} else {
				$this->acode->ViewValue = NULL;
			}
			$this->acode->ViewCustomAttributes = "";

			// fecha_creacion
			$this->fecha_creacion->LinkCustomAttributes = "";
			$this->fecha_creacion->HrefValue = "";
			$this->fecha_creacion->TooltipValue = "";

			// nombres
			$this->nombres->LinkCustomAttributes = "";
			$this->nombres->HrefValue = "";
			$this->nombres->TooltipValue = "";

			// apellidos
			$this->apellidos->LinkCustomAttributes = "";
			$this->apellidos->HrefValue = "";
			$this->apellidos->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";

			// login
			$this->_login->LinkCustomAttributes = "";
			$this->_login->HrefValue = "";
			$this->_login->TooltipValue = "";

			// pw
			$this->pw->LinkCustomAttributes = "";
			$this->pw->HrefValue = "";
			$this->pw->TooltipValue = "";

			// perfil
			$this->perfil->LinkCustomAttributes = "";
			$this->perfil->HrefValue = "";
			$this->perfil->TooltipValue = "";

			// sede
			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";
			$this->sede->TooltipValue = "";

			// acode
			$this->acode->LinkCustomAttributes = "";
			$this->acode->HrefValue = "";
			$this->acode->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// fecha_creacion
			// nombres

			$this->nombres->EditAttrs["class"] = "form-control";
			$this->nombres->EditCustomAttributes = "";
			if (!$this->nombres->Raw)
				$this->nombres->CurrentValue = HtmlDecode($this->nombres->CurrentValue);
			$this->nombres->EditValue = HtmlEncode($this->nombres->CurrentValue);
			$this->nombres->PlaceHolder = RemoveHtml($this->nombres->caption());

			// apellidos
			$this->apellidos->EditAttrs["class"] = "form-control";
			$this->apellidos->EditCustomAttributes = "";
			if (!$this->apellidos->Raw)
				$this->apellidos->CurrentValue = HtmlDecode($this->apellidos->CurrentValue);
			$this->apellidos->EditValue = HtmlEncode($this->apellidos->CurrentValue);
			$this->apellidos->PlaceHolder = RemoveHtml($this->apellidos->caption());

			// telefono
			$this->telefono->EditAttrs["class"] = "form-control";
			$this->telefono->EditCustomAttributes = "";
			if (!$this->telefono->Raw)
				$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
			$this->telefono->EditValue = HtmlEncode($this->telefono->CurrentValue);
			$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

			// login
			$this->_login->EditAttrs["class"] = "form-control";
			$this->_login->EditCustomAttributes = "";
			if (!$this->_login->Raw)
				$this->_login->CurrentValue = HtmlDecode($this->_login->CurrentValue);
			$this->_login->EditValue = HtmlEncode($this->_login->CurrentValue);
			$this->_login->PlaceHolder = RemoveHtml($this->_login->caption());

			// pw
			$this->pw->EditAttrs["class"] = "form-control";
			$this->pw->EditCustomAttributes = "";
			$this->pw->EditValue = HtmlEncode($this->pw->CurrentValue);
			$this->pw->PlaceHolder = RemoveHtml($this->pw->caption());

			// perfil
			$this->perfil->EditAttrs["class"] = "form-control";
			$this->perfil->EditCustomAttributes = "";
			if (!$Security->canAdmin()) { // System admin
				$this->perfil->EditValue = $Language->phrase("PasswordMask");
			} else {
				$curVal = trim(strval($this->perfil->CurrentValue));
				if ($curVal != "")
					$this->perfil->ViewValue = $this->perfil->lookupCacheOption($curVal);
				else
					$this->perfil->ViewValue = $this->perfil->Lookup !== NULL && is_array($this->perfil->Lookup->Options) ? $curVal : NULL;
				if ($this->perfil->ViewValue !== NULL) { // Load from cache
					$this->perfil->EditValue = array_values($this->perfil->Lookup->Options);
				} else { // Lookup from database
					if ($curVal == "") {
						$filterWrk = "0=1";
					} else {
						$filterWrk = "\"userlevelid\"" . SearchString("=", $this->perfil->CurrentValue, DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->perfil->Lookup->getSql(TRUE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					$arwrk = $rswrk ? $rswrk->getRows() : [];
					if ($rswrk)
						$rswrk->close();
					$this->perfil->EditValue = $arwrk;
				}
			}

			// sede
			$this->sede->EditAttrs["class"] = "form-control";
			$this->sede->EditCustomAttributes = "";
			$curVal = trim(strval($this->sede->CurrentValue));
			if ($curVal != "")
				$this->sede->ViewValue = $this->sede->lookupCacheOption($curVal);
			else
				$this->sede->ViewValue = $this->sede->Lookup !== NULL && is_array($this->sede->Lookup->Options) ? $curVal : NULL;
			if ($this->sede->ViewValue !== NULL) { // Load from cache
				$this->sede->EditValue = array_values($this->sede->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_sede\"" . SearchString("=", $this->sede->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sede->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sede->EditValue = $arwrk;
			}

			// acode
			$this->acode->EditAttrs["class"] = "form-control";
			$this->acode->EditCustomAttributes = "";
			$curVal = trim(strval($this->acode->CurrentValue));
			if ($curVal != "")
				$this->acode->ViewValue = $this->acode->lookupCacheOption($curVal);
			else
				$this->acode->ViewValue = $this->acode->Lookup !== NULL && is_array($this->acode->Lookup->Options) ? $curVal : NULL;
			if ($this->acode->ViewValue !== NULL) { // Load from cache
				$this->acode->EditValue = array_values($this->acode->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"nombreacode\"" . SearchString("=", $this->acode->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->acode->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->acode->EditValue = $arwrk;
			}

			// Add refer script
			// fecha_creacion

			$this->fecha_creacion->LinkCustomAttributes = "";
			$this->fecha_creacion->HrefValue = "";

			// nombres
			$this->nombres->LinkCustomAttributes = "";
			$this->nombres->HrefValue = "";

			// apellidos
			$this->apellidos->LinkCustomAttributes = "";
			$this->apellidos->HrefValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";

			// login
			$this->_login->LinkCustomAttributes = "";
			$this->_login->HrefValue = "";

			// pw
			$this->pw->LinkCustomAttributes = "";
			$this->pw->HrefValue = "";

			// perfil
			$this->perfil->LinkCustomAttributes = "";
			$this->perfil->HrefValue = "";

			// sede
			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";

			// acode
			$this->acode->LinkCustomAttributes = "";
			$this->acode->HrefValue = "";
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
		if ($this->fecha_creacion->Required) {
			if (!$this->fecha_creacion->IsDetailKey && $this->fecha_creacion->FormValue != NULL && $this->fecha_creacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_creacion->caption(), $this->fecha_creacion->RequiredErrorMessage));
			}
		}
		if ($this->nombres->Required) {
			if (!$this->nombres->IsDetailKey && $this->nombres->FormValue != NULL && $this->nombres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombres->caption(), $this->nombres->RequiredErrorMessage));
			}
		}
		if ($this->apellidos->Required) {
			if (!$this->apellidos->IsDetailKey && $this->apellidos->FormValue != NULL && $this->apellidos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->apellidos->caption(), $this->apellidos->RequiredErrorMessage));
			}
		}
		if ($this->telefono->Required) {
			if (!$this->telefono->IsDetailKey && $this->telefono->FormValue != NULL && $this->telefono->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono->caption(), $this->telefono->RequiredErrorMessage));
			}
		}
		if ($this->_login->Required) {
			if (!$this->_login->IsDetailKey && $this->_login->FormValue != NULL && $this->_login->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_login->caption(), $this->_login->RequiredErrorMessage));
			}
		}
		if ($this->pw->Required) {
			if (!$this->pw->IsDetailKey && $this->pw->FormValue != NULL && $this->pw->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pw->caption(), $this->pw->RequiredErrorMessage));
			}
		}
		if ($this->perfil->Required) {
			if (!$this->perfil->IsDetailKey && $this->perfil->FormValue != NULL && $this->perfil->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->perfil->caption(), $this->perfil->RequiredErrorMessage));
			}
		}
		if ($this->sede->Required) {
			if (!$this->sede->IsDetailKey && $this->sede->FormValue != NULL && $this->sede->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sede->caption(), $this->sede->RequiredErrorMessage));
			}
		}
		if ($this->acode->Required) {
			if (!$this->acode->IsDetailKey && $this->acode->FormValue != NULL && $this->acode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->acode->caption(), $this->acode->RequiredErrorMessage));
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

		// fecha_creacion
		$this->fecha_creacion->CurrentValue = CurrentDateTime();
		$this->fecha_creacion->setDbValueDef($rsnew, $this->fecha_creacion->CurrentValue, NULL);

		// nombres
		$this->nombres->setDbValueDef($rsnew, $this->nombres->CurrentValue, NULL, FALSE);

		// apellidos
		$this->apellidos->setDbValueDef($rsnew, $this->apellidos->CurrentValue, NULL, FALSE);

		// telefono
		$this->telefono->setDbValueDef($rsnew, $this->telefono->CurrentValue, NULL, FALSE);

		// login
		$this->_login->setDbValueDef($rsnew, $this->_login->CurrentValue, NULL, FALSE);

		// pw
		$this->pw->setDbValueDef($rsnew, $this->pw->CurrentValue, NULL, FALSE);

		// perfil
		
		if ($Security->canAdmin()) { // System admin
			
			$this->perfil->setDbValueDef($rsnew, $this->perfil->CurrentValue, NULL, FALSE);
			
		}
		

		// sede
		$this->sede->setDbValueDef($rsnew, $this->sede->CurrentValue, NULL, FALSE);

		// acode
		$this->acode->setDbValueDef($rsnew, $this->acode->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("usuarioslist.php"), "", $this->TableVar, TRUE);
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
				case "x_perfil":
					break;
				case "x_sede":
					break;
				case "x_acode":
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
						case "x_perfil":
							break;
						case "x_sede":
							break;
						case "x_acode":
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