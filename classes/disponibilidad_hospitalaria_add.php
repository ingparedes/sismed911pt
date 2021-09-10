<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class disponibilidad_hospitalaria_add extends disponibilidad_hospitalaria
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'disponibilidad_hospitalaria';

	// Page object name
	public $PageObjName = "disponibilidad_hospitalaria_add";

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

		// Table object (disponibilidad_hospitalaria)
		if (!isset($GLOBALS["disponibilidad_hospitalaria"]) || get_class($GLOBALS["disponibilidad_hospitalaria"]) == PROJECT_NAMESPACE . "disponibilidad_hospitalaria") {
			$GLOBALS["disponibilidad_hospitalaria"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["disponibilidad_hospitalaria"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'disponibilidad_hospitalaria');

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
		global $disponibilidad_hospitalaria;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($disponibilidad_hospitalaria);
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
					if ($pageName == "disponibilidad_hospitalariaview.php")
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
			$key .= @$ar['id_disponibilida'];
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
			$this->id_disponibilida->Visible = FALSE;
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
					$this->terminate(GetUrl("disponibilidad_hospitalarialist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_disponibilida->Visible = FALSE;
		$this->fecha_disponibilidad->setVisibility();
		$this->cod_hospital->setVisibility();
		$this->servicio_disponibilidad->setVisibility();
		$this->estado_disponibilidad->setVisibility();
		$this->cantidad_camas->setVisibility();
		$this->nombre_reporta->setVisibility();
		$this->telefono->setVisibility();
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
		$this->setupLookupOptions($this->cod_hospital);
		$this->setupLookupOptions($this->servicio_disponibilidad);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("disponibilidad_hospitalarialist.php");
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
			if (Get("id_disponibilida") !== NULL) {
				$this->id_disponibilida->setQueryStringValue(Get("id_disponibilida"));
				$this->setKey("id_disponibilida", $this->id_disponibilida->CurrentValue); // Set up key
			} else {
				$this->setKey("id_disponibilida", ""); // Clear key
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
					$this->terminate("disponibilidad_hospitalarialist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "disponibilidad_hospitalarialist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "disponibilidad_hospitalariaview.php")
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
		$this->id_disponibilida->CurrentValue = NULL;
		$this->id_disponibilida->OldValue = $this->id_disponibilida->CurrentValue;
		$this->fecha_disponibilidad->CurrentValue = NULL;
		$this->fecha_disponibilidad->OldValue = $this->fecha_disponibilidad->CurrentValue;
		$this->cod_hospital->CurrentValue = NULL;
		$this->cod_hospital->OldValue = $this->cod_hospital->CurrentValue;
		$this->servicio_disponibilidad->CurrentValue = NULL;
		$this->servicio_disponibilidad->OldValue = $this->servicio_disponibilidad->CurrentValue;
		$this->estado_disponibilidad->CurrentValue = NULL;
		$this->estado_disponibilidad->OldValue = $this->estado_disponibilidad->CurrentValue;
		$this->cantidad_camas->CurrentValue = NULL;
		$this->cantidad_camas->OldValue = $this->cantidad_camas->CurrentValue;
		$this->nombre_reporta->CurrentValue = NULL;
		$this->nombre_reporta->OldValue = $this->nombre_reporta->CurrentValue;
		$this->telefono->CurrentValue = NULL;
		$this->telefono->OldValue = $this->telefono->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'fecha_disponibilidad' first before field var 'x_fecha_disponibilidad'
		$val = $CurrentForm->hasValue("fecha_disponibilidad") ? $CurrentForm->getValue("fecha_disponibilidad") : $CurrentForm->getValue("x_fecha_disponibilidad");
		if (!$this->fecha_disponibilidad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_disponibilidad->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_disponibilidad->setFormValue($val);
			$this->fecha_disponibilidad->CurrentValue = UnFormatDateTime($this->fecha_disponibilidad->CurrentValue, 9);
		}

		// Check field name 'cod_hospital' first before field var 'x_cod_hospital'
		$val = $CurrentForm->hasValue("cod_hospital") ? $CurrentForm->getValue("cod_hospital") : $CurrentForm->getValue("x_cod_hospital");
		if (!$this->cod_hospital->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_hospital->Visible = FALSE; // Disable update for API request
			else
				$this->cod_hospital->setFormValue($val);
		}

		// Check field name 'servicio_disponibilidad' first before field var 'x_servicio_disponibilidad'
		$val = $CurrentForm->hasValue("servicio_disponibilidad") ? $CurrentForm->getValue("servicio_disponibilidad") : $CurrentForm->getValue("x_servicio_disponibilidad");
		if (!$this->servicio_disponibilidad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->servicio_disponibilidad->Visible = FALSE; // Disable update for API request
			else
				$this->servicio_disponibilidad->setFormValue($val);
		}

		// Check field name 'estado_disponibilidad' first before field var 'x_estado_disponibilidad'
		$val = $CurrentForm->hasValue("estado_disponibilidad") ? $CurrentForm->getValue("estado_disponibilidad") : $CurrentForm->getValue("x_estado_disponibilidad");
		if (!$this->estado_disponibilidad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->estado_disponibilidad->Visible = FALSE; // Disable update for API request
			else
				$this->estado_disponibilidad->setFormValue($val);
		}

		// Check field name 'cantidad_camas' first before field var 'x_cantidad_camas'
		$val = $CurrentForm->hasValue("cantidad_camas") ? $CurrentForm->getValue("cantidad_camas") : $CurrentForm->getValue("x_cantidad_camas");
		if (!$this->cantidad_camas->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cantidad_camas->Visible = FALSE; // Disable update for API request
			else
				$this->cantidad_camas->setFormValue($val);
		}

		// Check field name 'nombre_reporta' first before field var 'x_nombre_reporta'
		$val = $CurrentForm->hasValue("nombre_reporta") ? $CurrentForm->getValue("nombre_reporta") : $CurrentForm->getValue("x_nombre_reporta");
		if (!$this->nombre_reporta->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_reporta->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_reporta->setFormValue($val);
		}

		// Check field name 'telefono' first before field var 'x_telefono'
		$val = $CurrentForm->hasValue("telefono") ? $CurrentForm->getValue("telefono") : $CurrentForm->getValue("x_telefono");
		if (!$this->telefono->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono->Visible = FALSE; // Disable update for API request
			else
				$this->telefono->setFormValue($val);
		}

		// Check field name 'id_disponibilida' first before field var 'x_id_disponibilida'
		$val = $CurrentForm->hasValue("id_disponibilida") ? $CurrentForm->getValue("id_disponibilida") : $CurrentForm->getValue("x_id_disponibilida");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->fecha_disponibilidad->CurrentValue = $this->fecha_disponibilidad->FormValue;
		$this->fecha_disponibilidad->CurrentValue = UnFormatDateTime($this->fecha_disponibilidad->CurrentValue, 9);
		$this->cod_hospital->CurrentValue = $this->cod_hospital->FormValue;
		$this->servicio_disponibilidad->CurrentValue = $this->servicio_disponibilidad->FormValue;
		$this->estado_disponibilidad->CurrentValue = $this->estado_disponibilidad->FormValue;
		$this->cantidad_camas->CurrentValue = $this->cantidad_camas->FormValue;
		$this->nombre_reporta->CurrentValue = $this->nombre_reporta->FormValue;
		$this->telefono->CurrentValue = $this->telefono->FormValue;
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
		$this->id_disponibilida->setDbValue($row['id_disponibilida']);
		$this->fecha_disponibilidad->setDbValue($row['fecha_disponibilidad']);
		$this->cod_hospital->setDbValue($row['cod_hospital']);
		if (array_key_exists('EV__cod_hospital', $rs->fields)) {
			$this->cod_hospital->VirtualValue = $rs->fields('EV__cod_hospital'); // Set up virtual field value
		} else {
			$this->cod_hospital->VirtualValue = ""; // Clear value
		}
		$this->servicio_disponibilidad->setDbValue($row['servicio_disponibilidad']);
		if (array_key_exists('EV__servicio_disponibilidad', $rs->fields)) {
			$this->servicio_disponibilidad->VirtualValue = $rs->fields('EV__servicio_disponibilidad'); // Set up virtual field value
		} else {
			$this->servicio_disponibilidad->VirtualValue = ""; // Clear value
		}
		$this->estado_disponibilidad->setDbValue($row['estado_disponibilidad']);
		$this->cantidad_camas->setDbValue($row['cantidad_camas']);
		$this->nombre_reporta->setDbValue($row['nombre_reporta']);
		$this->telefono->setDbValue($row['telefono']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_disponibilida'] = $this->id_disponibilida->CurrentValue;
		$row['fecha_disponibilidad'] = $this->fecha_disponibilidad->CurrentValue;
		$row['cod_hospital'] = $this->cod_hospital->CurrentValue;
		$row['servicio_disponibilidad'] = $this->servicio_disponibilidad->CurrentValue;
		$row['estado_disponibilidad'] = $this->estado_disponibilidad->CurrentValue;
		$row['cantidad_camas'] = $this->cantidad_camas->CurrentValue;
		$row['nombre_reporta'] = $this->nombre_reporta->CurrentValue;
		$row['telefono'] = $this->telefono->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_disponibilida")) != "")
			$this->id_disponibilida->OldValue = $this->getKey("id_disponibilida"); // id_disponibilida
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
		// id_disponibilida
		// fecha_disponibilidad
		// cod_hospital
		// servicio_disponibilidad
		// estado_disponibilidad
		// cantidad_camas
		// nombre_reporta
		// telefono

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_disponibilida
			$this->id_disponibilida->ViewValue = $this->id_disponibilida->CurrentValue;
			$this->id_disponibilida->ViewValue = FormatNumber($this->id_disponibilida->ViewValue, 0, -2, -2, -2);
			$this->id_disponibilida->ViewCustomAttributes = "";

			// fecha_disponibilidad
			$this->fecha_disponibilidad->ViewValue = $this->fecha_disponibilidad->CurrentValue;
			$this->fecha_disponibilidad->ViewValue = FormatDateTime($this->fecha_disponibilidad->ViewValue, 9);
			$this->fecha_disponibilidad->ViewCustomAttributes = "";

			// cod_hospital
			if ($this->cod_hospital->VirtualValue != "") {
				$this->cod_hospital->ViewValue = $this->cod_hospital->VirtualValue;
			} else {
				$curVal = strval($this->cod_hospital->CurrentValue);
				if ($curVal != "") {
					$this->cod_hospital->ViewValue = $this->cod_hospital->lookupCacheOption($curVal);
					if ($this->cod_hospital->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"id_hospital\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->cod_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$arwrk[3] = $rswrk->fields('df3');
							$this->cod_hospital->ViewValue = $this->cod_hospital->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->cod_hospital->ViewValue = $this->cod_hospital->CurrentValue;
						}
					}
				} else {
					$this->cod_hospital->ViewValue = NULL;
				}
			}
			$this->cod_hospital->ViewCustomAttributes = "";

			// servicio_disponibilidad
			if ($this->servicio_disponibilidad->VirtualValue != "") {
				$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->VirtualValue;
			} else {
				$curVal = strval($this->servicio_disponibilidad->CurrentValue);
				if ($curVal != "") {
					$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->lookupCacheOption($curVal);
					if ($this->servicio_disponibilidad->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"servicio_disponabilidad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->servicio_disponibilidad->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->CurrentValue;
						}
					}
				} else {
					$this->servicio_disponibilidad->ViewValue = NULL;
				}
			}
			$this->servicio_disponibilidad->ViewCustomAttributes = "";

			// estado_disponibilidad
			if (strval($this->estado_disponibilidad->CurrentValue) != "") {
				$this->estado_disponibilidad->ViewValue = $this->estado_disponibilidad->optionCaption($this->estado_disponibilidad->CurrentValue);
			} else {
				$this->estado_disponibilidad->ViewValue = NULL;
			}
			$this->estado_disponibilidad->ViewCustomAttributes = "";

			// cantidad_camas
			$this->cantidad_camas->ViewValue = $this->cantidad_camas->CurrentValue;
			$this->cantidad_camas->ViewCustomAttributes = "";

			// nombre_reporta
			$this->nombre_reporta->ViewValue = $this->nombre_reporta->CurrentValue;
			$this->nombre_reporta->ViewCustomAttributes = "";

			// telefono
			$this->telefono->ViewValue = $this->telefono->CurrentValue;
			$this->telefono->ViewCustomAttributes = "";

			// fecha_disponibilidad
			$this->fecha_disponibilidad->LinkCustomAttributes = "";
			$this->fecha_disponibilidad->HrefValue = "";
			$this->fecha_disponibilidad->TooltipValue = "";

			// cod_hospital
			$this->cod_hospital->LinkCustomAttributes = "";
			$this->cod_hospital->HrefValue = "";
			$this->cod_hospital->TooltipValue = "";

			// servicio_disponibilidad
			$this->servicio_disponibilidad->LinkCustomAttributes = "";
			$this->servicio_disponibilidad->HrefValue = "";
			$this->servicio_disponibilidad->TooltipValue = "";

			// estado_disponibilidad
			$this->estado_disponibilidad->LinkCustomAttributes = "";
			$this->estado_disponibilidad->HrefValue = "";
			$this->estado_disponibilidad->TooltipValue = "";

			// cantidad_camas
			$this->cantidad_camas->LinkCustomAttributes = "";
			$this->cantidad_camas->HrefValue = "";
			$this->cantidad_camas->TooltipValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";
			$this->nombre_reporta->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// fecha_disponibilidad
			// cod_hospital

			$this->cod_hospital->EditCustomAttributes = "";
			$curVal = trim(strval($this->cod_hospital->CurrentValue));
			if ($curVal != "")
				$this->cod_hospital->ViewValue = $this->cod_hospital->lookupCacheOption($curVal);
			else
				$this->cod_hospital->ViewValue = $this->cod_hospital->Lookup !== NULL && is_array($this->cod_hospital->Lookup->Options) ? $curVal : NULL;
			if ($this->cod_hospital->ViewValue !== NULL) { // Load from cache
				$this->cod_hospital->EditValue = array_values($this->cod_hospital->Lookup->Options);
				if ($this->cod_hospital->ViewValue == "")
					$this->cod_hospital->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_hospital\"" . SearchString("=", $this->cod_hospital->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->cod_hospital->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->cod_hospital->ViewValue = $this->cod_hospital->displayValue($arwrk);
				} else {
					$this->cod_hospital->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->cod_hospital->EditValue = $arwrk;
			}

			// servicio_disponibilidad
			$this->servicio_disponibilidad->EditAttrs["class"] = "form-control";
			$this->servicio_disponibilidad->EditCustomAttributes = "";
			$curVal = trim(strval($this->servicio_disponibilidad->CurrentValue));
			if ($curVal != "")
				$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->lookupCacheOption($curVal);
			else
				$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->Lookup !== NULL && is_array($this->servicio_disponibilidad->Lookup->Options) ? $curVal : NULL;
			if ($this->servicio_disponibilidad->ViewValue !== NULL) { // Load from cache
				$this->servicio_disponibilidad->EditValue = array_values($this->servicio_disponibilidad->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"servicio_disponabilidad\"" . SearchString("=", $this->servicio_disponibilidad->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->servicio_disponibilidad->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->servicio_disponibilidad->EditValue = $arwrk;
			}

			// estado_disponibilidad
			$this->estado_disponibilidad->EditCustomAttributes = "";
			$this->estado_disponibilidad->EditValue = $this->estado_disponibilidad->options(FALSE);

			// cantidad_camas
			$this->cantidad_camas->EditAttrs["class"] = "form-control";
			$this->cantidad_camas->EditCustomAttributes = "";
			if (!$this->cantidad_camas->Raw)
				$this->cantidad_camas->CurrentValue = HtmlDecode($this->cantidad_camas->CurrentValue);
			$this->cantidad_camas->EditValue = HtmlEncode($this->cantidad_camas->CurrentValue);
			$this->cantidad_camas->PlaceHolder = RemoveHtml($this->cantidad_camas->caption());

			// nombre_reporta
			$this->nombre_reporta->EditAttrs["class"] = "form-control";
			$this->nombre_reporta->EditCustomAttributes = "";
			if (!$this->nombre_reporta->Raw)
				$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
			$this->nombre_reporta->EditValue = HtmlEncode($this->nombre_reporta->CurrentValue);
			$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

			// telefono
			$this->telefono->EditAttrs["class"] = "form-control";
			$this->telefono->EditCustomAttributes = "";
			if (!$this->telefono->Raw)
				$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
			$this->telefono->EditValue = HtmlEncode($this->telefono->CurrentValue);
			$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

			// Add refer script
			// fecha_disponibilidad

			$this->fecha_disponibilidad->LinkCustomAttributes = "";
			$this->fecha_disponibilidad->HrefValue = "";

			// cod_hospital
			$this->cod_hospital->LinkCustomAttributes = "";
			$this->cod_hospital->HrefValue = "";

			// servicio_disponibilidad
			$this->servicio_disponibilidad->LinkCustomAttributes = "";
			$this->servicio_disponibilidad->HrefValue = "";

			// estado_disponibilidad
			$this->estado_disponibilidad->LinkCustomAttributes = "";
			$this->estado_disponibilidad->HrefValue = "";

			// cantidad_camas
			$this->cantidad_camas->LinkCustomAttributes = "";
			$this->cantidad_camas->HrefValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
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
		if ($this->fecha_disponibilidad->Required) {
			if (!$this->fecha_disponibilidad->IsDetailKey && $this->fecha_disponibilidad->FormValue != NULL && $this->fecha_disponibilidad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_disponibilidad->caption(), $this->fecha_disponibilidad->RequiredErrorMessage));
			}
		}
		if ($this->cod_hospital->Required) {
			if (!$this->cod_hospital->IsDetailKey && $this->cod_hospital->FormValue != NULL && $this->cod_hospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_hospital->caption(), $this->cod_hospital->RequiredErrorMessage));
			}
		}
		if ($this->servicio_disponibilidad->Required) {
			if (!$this->servicio_disponibilidad->IsDetailKey && $this->servicio_disponibilidad->FormValue != NULL && $this->servicio_disponibilidad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->servicio_disponibilidad->caption(), $this->servicio_disponibilidad->RequiredErrorMessage));
			}
		}
		if ($this->estado_disponibilidad->Required) {
			if ($this->estado_disponibilidad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado_disponibilidad->caption(), $this->estado_disponibilidad->RequiredErrorMessage));
			}
		}
		if ($this->cantidad_camas->Required) {
			if (!$this->cantidad_camas->IsDetailKey && $this->cantidad_camas->FormValue != NULL && $this->cantidad_camas->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cantidad_camas->caption(), $this->cantidad_camas->RequiredErrorMessage));
			}
		}
		if ($this->nombre_reporta->Required) {
			if (!$this->nombre_reporta->IsDetailKey && $this->nombre_reporta->FormValue != NULL && $this->nombre_reporta->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_reporta->caption(), $this->nombre_reporta->RequiredErrorMessage));
			}
		}
		if ($this->telefono->Required) {
			if (!$this->telefono->IsDetailKey && $this->telefono->FormValue != NULL && $this->telefono->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono->caption(), $this->telefono->RequiredErrorMessage));
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

		// fecha_disponibilidad
		$this->fecha_disponibilidad->CurrentValue = CurrentDateTime();
		$this->fecha_disponibilidad->setDbValueDef($rsnew, $this->fecha_disponibilidad->CurrentValue, NULL);

		// cod_hospital
		$this->cod_hospital->setDbValueDef($rsnew, $this->cod_hospital->CurrentValue, NULL, FALSE);

		// servicio_disponibilidad
		$this->servicio_disponibilidad->setDbValueDef($rsnew, $this->servicio_disponibilidad->CurrentValue, NULL, FALSE);

		// estado_disponibilidad
		$this->estado_disponibilidad->setDbValueDef($rsnew, $this->estado_disponibilidad->CurrentValue, NULL, FALSE);

		// cantidad_camas
		$this->cantidad_camas->setDbValueDef($rsnew, $this->cantidad_camas->CurrentValue, NULL, FALSE);

		// nombre_reporta
		$this->nombre_reporta->setDbValueDef($rsnew, $this->nombre_reporta->CurrentValue, NULL, FALSE);

		// telefono
		$this->telefono->setDbValueDef($rsnew, $this->telefono->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("disponibilidad_hospitalarialist.php"), "", $this->TableVar, TRUE);
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
				case "x_cod_hospital":
					break;
				case "x_servicio_disponibilidad":
					break;
				case "x_estado_disponibilidad":
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
						case "x_cod_hospital":
							break;
						case "x_servicio_disponibilidad":
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
	$this->cod_hospital->CurrentValue = htmlspecialchars($_GET["id_hospital"]);
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