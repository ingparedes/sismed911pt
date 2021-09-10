<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class antecedentes_registro_add extends antecedentes_registro
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'antecedentes_registro';

	// Page object name
	public $PageObjName = "antecedentes_registro_add";

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

		// Table object (antecedentes_registro)
		if (!isset($GLOBALS["antecedentes_registro"]) || get_class($GLOBALS["antecedentes_registro"]) == PROJECT_NAMESPACE . "antecedentes_registro") {
			$GLOBALS["antecedentes_registro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["antecedentes_registro"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'antecedentes_registro');

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
		global $antecedentes_registro;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($antecedentes_registro);
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
					if ($pageName == "antecedentes_registroview.php")
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
			$key .= @$ar['id'];
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
			$this->id->Visible = FALSE;
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
					$this->terminate(GetUrl("antecedentes_registrolist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->cod_casopreh->setVisibility();
		$this->diabetes->setVisibility();
		$this->cardiopatia->setVisibility();
		$this->convulsiones->setVisibility();
		$this->asmabronquitis->setVisibility();
		$this->acv->setVisibility();
		$this->has->setVisibility();
		$this->alergia->setVisibility();
		$this->medicamentos->setVisibility();
		$this->otros->setVisibility();
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

		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("antecedentes_registrolist.php");
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
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
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
					$this->terminate("antecedentes_registrolist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "antecedentes_registrolist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "antecedentes_registroview.php")
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
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->cod_casopreh->CurrentValue = NULL;
		$this->cod_casopreh->OldValue = $this->cod_casopreh->CurrentValue;
		$this->diabetes->CurrentValue = NULL;
		$this->diabetes->OldValue = $this->diabetes->CurrentValue;
		$this->cardiopatia->CurrentValue = NULL;
		$this->cardiopatia->OldValue = $this->cardiopatia->CurrentValue;
		$this->convulsiones->CurrentValue = NULL;
		$this->convulsiones->OldValue = $this->convulsiones->CurrentValue;
		$this->asmabronquitis->CurrentValue = NULL;
		$this->asmabronquitis->OldValue = $this->asmabronquitis->CurrentValue;
		$this->acv->CurrentValue = NULL;
		$this->acv->OldValue = $this->acv->CurrentValue;
		$this->has->CurrentValue = NULL;
		$this->has->OldValue = $this->has->CurrentValue;
		$this->alergia->CurrentValue = NULL;
		$this->alergia->OldValue = $this->alergia->CurrentValue;
		$this->medicamentos->CurrentValue = NULL;
		$this->medicamentos->OldValue = $this->medicamentos->CurrentValue;
		$this->otros->CurrentValue = NULL;
		$this->otros->OldValue = $this->otros->CurrentValue;
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

		// Check field name 'diabetes' first before field var 'x_diabetes'
		$val = $CurrentForm->hasValue("diabetes") ? $CurrentForm->getValue("diabetes") : $CurrentForm->getValue("x_diabetes");
		if (!$this->diabetes->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->diabetes->Visible = FALSE; // Disable update for API request
			else
				$this->diabetes->setFormValue($val);
		}

		// Check field name 'cardiopatia' first before field var 'x_cardiopatia'
		$val = $CurrentForm->hasValue("cardiopatia") ? $CurrentForm->getValue("cardiopatia") : $CurrentForm->getValue("x_cardiopatia");
		if (!$this->cardiopatia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cardiopatia->Visible = FALSE; // Disable update for API request
			else
				$this->cardiopatia->setFormValue($val);
		}

		// Check field name 'convulsiones' first before field var 'x_convulsiones'
		$val = $CurrentForm->hasValue("convulsiones") ? $CurrentForm->getValue("convulsiones") : $CurrentForm->getValue("x_convulsiones");
		if (!$this->convulsiones->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->convulsiones->Visible = FALSE; // Disable update for API request
			else
				$this->convulsiones->setFormValue($val);
		}

		// Check field name 'asmabronquitis' first before field var 'x_asmabronquitis'
		$val = $CurrentForm->hasValue("asmabronquitis") ? $CurrentForm->getValue("asmabronquitis") : $CurrentForm->getValue("x_asmabronquitis");
		if (!$this->asmabronquitis->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->asmabronquitis->Visible = FALSE; // Disable update for API request
			else
				$this->asmabronquitis->setFormValue($val);
		}

		// Check field name 'acv' first before field var 'x_acv'
		$val = $CurrentForm->hasValue("acv") ? $CurrentForm->getValue("acv") : $CurrentForm->getValue("x_acv");
		if (!$this->acv->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->acv->Visible = FALSE; // Disable update for API request
			else
				$this->acv->setFormValue($val);
		}

		// Check field name 'has' first before field var 'x_has'
		$val = $CurrentForm->hasValue("has") ? $CurrentForm->getValue("has") : $CurrentForm->getValue("x_has");
		if (!$this->has->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->has->Visible = FALSE; // Disable update for API request
			else
				$this->has->setFormValue($val);
		}

		// Check field name 'alergia' first before field var 'x_alergia'
		$val = $CurrentForm->hasValue("alergia") ? $CurrentForm->getValue("alergia") : $CurrentForm->getValue("x_alergia");
		if (!$this->alergia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->alergia->Visible = FALSE; // Disable update for API request
			else
				$this->alergia->setFormValue($val);
		}

		// Check field name 'medicamentos' first before field var 'x_medicamentos'
		$val = $CurrentForm->hasValue("medicamentos") ? $CurrentForm->getValue("medicamentos") : $CurrentForm->getValue("x_medicamentos");
		if (!$this->medicamentos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->medicamentos->Visible = FALSE; // Disable update for API request
			else
				$this->medicamentos->setFormValue($val);
		}

		// Check field name 'otros' first before field var 'x_otros'
		$val = $CurrentForm->hasValue("otros") ? $CurrentForm->getValue("otros") : $CurrentForm->getValue("x_otros");
		if (!$this->otros->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->otros->Visible = FALSE; // Disable update for API request
			else
				$this->otros->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casopreh->CurrentValue = $this->cod_casopreh->FormValue;
		$this->diabetes->CurrentValue = $this->diabetes->FormValue;
		$this->cardiopatia->CurrentValue = $this->cardiopatia->FormValue;
		$this->convulsiones->CurrentValue = $this->convulsiones->FormValue;
		$this->asmabronquitis->CurrentValue = $this->asmabronquitis->FormValue;
		$this->acv->CurrentValue = $this->acv->FormValue;
		$this->has->CurrentValue = $this->has->FormValue;
		$this->alergia->CurrentValue = $this->alergia->FormValue;
		$this->medicamentos->CurrentValue = $this->medicamentos->FormValue;
		$this->otros->CurrentValue = $this->otros->FormValue;
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
		$this->id->setDbValue($row['id']);
		$this->cod_casopreh->setDbValue($row['cod_casopreh']);
		$this->diabetes->setDbValue($row['diabetes']);
		$this->cardiopatia->setDbValue($row['cardiopatia']);
		$this->convulsiones->setDbValue($row['convulsiones']);
		$this->asmabronquitis->setDbValue($row['asmabronquitis']);
		$this->acv->setDbValue($row['acv']);
		$this->has->setDbValue($row['has']);
		$this->alergia->setDbValue($row['alergia']);
		$this->medicamentos->setDbValue($row['medicamentos']);
		$this->otros->setDbValue($row['otros']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['cod_casopreh'] = $this->cod_casopreh->CurrentValue;
		$row['diabetes'] = $this->diabetes->CurrentValue;
		$row['cardiopatia'] = $this->cardiopatia->CurrentValue;
		$row['convulsiones'] = $this->convulsiones->CurrentValue;
		$row['asmabronquitis'] = $this->asmabronquitis->CurrentValue;
		$row['acv'] = $this->acv->CurrentValue;
		$row['has'] = $this->has->CurrentValue;
		$row['alergia'] = $this->alergia->CurrentValue;
		$row['medicamentos'] = $this->medicamentos->CurrentValue;
		$row['otros'] = $this->otros->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
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
		// id
		// cod_casopreh
		// diabetes
		// cardiopatia
		// convulsiones
		// asmabronquitis
		// acv
		// has
		// alergia
		// medicamentos
		// otros

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// cod_casopreh
			$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
			$this->cod_casopreh->ViewValue = FormatNumber($this->cod_casopreh->ViewValue, 0, -2, -2, -2);
			$this->cod_casopreh->ViewCustomAttributes = "";

			// diabetes
			$this->diabetes->ViewValue = $this->diabetes->CurrentValue;
			$this->diabetes->ViewValue = FormatNumber($this->diabetes->ViewValue, 0, -2, -2, -2);
			$this->diabetes->ViewCustomAttributes = "";

			// cardiopatia
			$this->cardiopatia->ViewValue = $this->cardiopatia->CurrentValue;
			$this->cardiopatia->ViewValue = FormatNumber($this->cardiopatia->ViewValue, 0, -2, -2, -2);
			$this->cardiopatia->ViewCustomAttributes = "";

			// convulsiones
			$this->convulsiones->ViewValue = $this->convulsiones->CurrentValue;
			$this->convulsiones->ViewValue = FormatNumber($this->convulsiones->ViewValue, 0, -2, -2, -2);
			$this->convulsiones->ViewCustomAttributes = "";

			// asmabronquitis
			$this->asmabronquitis->ViewValue = $this->asmabronquitis->CurrentValue;
			$this->asmabronquitis->ViewValue = FormatNumber($this->asmabronquitis->ViewValue, 0, -2, -2, -2);
			$this->asmabronquitis->ViewCustomAttributes = "";

			// acv
			$this->acv->ViewValue = $this->acv->CurrentValue;
			$this->acv->ViewValue = FormatNumber($this->acv->ViewValue, 0, -2, -2, -2);
			$this->acv->ViewCustomAttributes = "";

			// has
			$this->has->ViewValue = $this->has->CurrentValue;
			$this->has->ViewValue = FormatNumber($this->has->ViewValue, 0, -2, -2, -2);
			$this->has->ViewCustomAttributes = "";

			// alergia
			$this->alergia->ViewValue = $this->alergia->CurrentValue;
			$this->alergia->ViewValue = FormatNumber($this->alergia->ViewValue, 0, -2, -2, -2);
			$this->alergia->ViewCustomAttributes = "";

			// medicamentos
			$this->medicamentos->ViewValue = $this->medicamentos->CurrentValue;
			$this->medicamentos->ViewCustomAttributes = "";

			// otros
			$this->otros->ViewValue = $this->otros->CurrentValue;
			$this->otros->ViewCustomAttributes = "";

			// cod_casopreh
			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";
			$this->cod_casopreh->TooltipValue = "";

			// diabetes
			$this->diabetes->LinkCustomAttributes = "";
			$this->diabetes->HrefValue = "";
			$this->diabetes->TooltipValue = "";

			// cardiopatia
			$this->cardiopatia->LinkCustomAttributes = "";
			$this->cardiopatia->HrefValue = "";
			$this->cardiopatia->TooltipValue = "";

			// convulsiones
			$this->convulsiones->LinkCustomAttributes = "";
			$this->convulsiones->HrefValue = "";
			$this->convulsiones->TooltipValue = "";

			// asmabronquitis
			$this->asmabronquitis->LinkCustomAttributes = "";
			$this->asmabronquitis->HrefValue = "";
			$this->asmabronquitis->TooltipValue = "";

			// acv
			$this->acv->LinkCustomAttributes = "";
			$this->acv->HrefValue = "";
			$this->acv->TooltipValue = "";

			// has
			$this->has->LinkCustomAttributes = "";
			$this->has->HrefValue = "";
			$this->has->TooltipValue = "";

			// alergia
			$this->alergia->LinkCustomAttributes = "";
			$this->alergia->HrefValue = "";
			$this->alergia->TooltipValue = "";

			// medicamentos
			$this->medicamentos->LinkCustomAttributes = "";
			$this->medicamentos->HrefValue = "";
			$this->medicamentos->TooltipValue = "";

			// otros
			$this->otros->LinkCustomAttributes = "";
			$this->otros->HrefValue = "";
			$this->otros->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// cod_casopreh
			$this->cod_casopreh->EditAttrs["class"] = "form-control";
			$this->cod_casopreh->EditCustomAttributes = "";
			$this->cod_casopreh->EditValue = HtmlEncode($this->cod_casopreh->CurrentValue);
			$this->cod_casopreh->PlaceHolder = RemoveHtml($this->cod_casopreh->caption());

			// diabetes
			$this->diabetes->EditAttrs["class"] = "form-control";
			$this->diabetes->EditCustomAttributes = "";
			$this->diabetes->EditValue = HtmlEncode($this->diabetes->CurrentValue);
			$this->diabetes->PlaceHolder = RemoveHtml($this->diabetes->caption());

			// cardiopatia
			$this->cardiopatia->EditAttrs["class"] = "form-control";
			$this->cardiopatia->EditCustomAttributes = "";
			$this->cardiopatia->EditValue = HtmlEncode($this->cardiopatia->CurrentValue);
			$this->cardiopatia->PlaceHolder = RemoveHtml($this->cardiopatia->caption());

			// convulsiones
			$this->convulsiones->EditAttrs["class"] = "form-control";
			$this->convulsiones->EditCustomAttributes = "";
			$this->convulsiones->EditValue = HtmlEncode($this->convulsiones->CurrentValue);
			$this->convulsiones->PlaceHolder = RemoveHtml($this->convulsiones->caption());

			// asmabronquitis
			$this->asmabronquitis->EditAttrs["class"] = "form-control";
			$this->asmabronquitis->EditCustomAttributes = "";
			$this->asmabronquitis->EditValue = HtmlEncode($this->asmabronquitis->CurrentValue);
			$this->asmabronquitis->PlaceHolder = RemoveHtml($this->asmabronquitis->caption());

			// acv
			$this->acv->EditAttrs["class"] = "form-control";
			$this->acv->EditCustomAttributes = "";
			$this->acv->EditValue = HtmlEncode($this->acv->CurrentValue);
			$this->acv->PlaceHolder = RemoveHtml($this->acv->caption());

			// has
			$this->has->EditAttrs["class"] = "form-control";
			$this->has->EditCustomAttributes = "";
			$this->has->EditValue = HtmlEncode($this->has->CurrentValue);
			$this->has->PlaceHolder = RemoveHtml($this->has->caption());

			// alergia
			$this->alergia->EditAttrs["class"] = "form-control";
			$this->alergia->EditCustomAttributes = "";
			$this->alergia->EditValue = HtmlEncode($this->alergia->CurrentValue);
			$this->alergia->PlaceHolder = RemoveHtml($this->alergia->caption());

			// medicamentos
			$this->medicamentos->EditAttrs["class"] = "form-control";
			$this->medicamentos->EditCustomAttributes = "";
			if (!$this->medicamentos->Raw)
				$this->medicamentos->CurrentValue = HtmlDecode($this->medicamentos->CurrentValue);
			$this->medicamentos->EditValue = HtmlEncode($this->medicamentos->CurrentValue);
			$this->medicamentos->PlaceHolder = RemoveHtml($this->medicamentos->caption());

			// otros
			$this->otros->EditAttrs["class"] = "form-control";
			$this->otros->EditCustomAttributes = "";
			if (!$this->otros->Raw)
				$this->otros->CurrentValue = HtmlDecode($this->otros->CurrentValue);
			$this->otros->EditValue = HtmlEncode($this->otros->CurrentValue);
			$this->otros->PlaceHolder = RemoveHtml($this->otros->caption());

			// Add refer script
			// cod_casopreh

			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";

			// diabetes
			$this->diabetes->LinkCustomAttributes = "";
			$this->diabetes->HrefValue = "";

			// cardiopatia
			$this->cardiopatia->LinkCustomAttributes = "";
			$this->cardiopatia->HrefValue = "";

			// convulsiones
			$this->convulsiones->LinkCustomAttributes = "";
			$this->convulsiones->HrefValue = "";

			// asmabronquitis
			$this->asmabronquitis->LinkCustomAttributes = "";
			$this->asmabronquitis->HrefValue = "";

			// acv
			$this->acv->LinkCustomAttributes = "";
			$this->acv->HrefValue = "";

			// has
			$this->has->LinkCustomAttributes = "";
			$this->has->HrefValue = "";

			// alergia
			$this->alergia->LinkCustomAttributes = "";
			$this->alergia->HrefValue = "";

			// medicamentos
			$this->medicamentos->LinkCustomAttributes = "";
			$this->medicamentos->HrefValue = "";

			// otros
			$this->otros->LinkCustomAttributes = "";
			$this->otros->HrefValue = "";
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
		if ($this->diabetes->Required) {
			if (!$this->diabetes->IsDetailKey && $this->diabetes->FormValue != NULL && $this->diabetes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diabetes->caption(), $this->diabetes->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->diabetes->FormValue)) {
			AddMessage($FormError, $this->diabetes->errorMessage());
		}
		if ($this->cardiopatia->Required) {
			if (!$this->cardiopatia->IsDetailKey && $this->cardiopatia->FormValue != NULL && $this->cardiopatia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cardiopatia->caption(), $this->cardiopatia->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cardiopatia->FormValue)) {
			AddMessage($FormError, $this->cardiopatia->errorMessage());
		}
		if ($this->convulsiones->Required) {
			if (!$this->convulsiones->IsDetailKey && $this->convulsiones->FormValue != NULL && $this->convulsiones->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->convulsiones->caption(), $this->convulsiones->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->convulsiones->FormValue)) {
			AddMessage($FormError, $this->convulsiones->errorMessage());
		}
		if ($this->asmabronquitis->Required) {
			if (!$this->asmabronquitis->IsDetailKey && $this->asmabronquitis->FormValue != NULL && $this->asmabronquitis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->asmabronquitis->caption(), $this->asmabronquitis->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->asmabronquitis->FormValue)) {
			AddMessage($FormError, $this->asmabronquitis->errorMessage());
		}
		if ($this->acv->Required) {
			if (!$this->acv->IsDetailKey && $this->acv->FormValue != NULL && $this->acv->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->acv->caption(), $this->acv->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->acv->FormValue)) {
			AddMessage($FormError, $this->acv->errorMessage());
		}
		if ($this->has->Required) {
			if (!$this->has->IsDetailKey && $this->has->FormValue != NULL && $this->has->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->has->caption(), $this->has->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->has->FormValue)) {
			AddMessage($FormError, $this->has->errorMessage());
		}
		if ($this->alergia->Required) {
			if (!$this->alergia->IsDetailKey && $this->alergia->FormValue != NULL && $this->alergia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->alergia->caption(), $this->alergia->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->alergia->FormValue)) {
			AddMessage($FormError, $this->alergia->errorMessage());
		}
		if ($this->medicamentos->Required) {
			if (!$this->medicamentos->IsDetailKey && $this->medicamentos->FormValue != NULL && $this->medicamentos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->medicamentos->caption(), $this->medicamentos->RequiredErrorMessage));
			}
		}
		if ($this->otros->Required) {
			if (!$this->otros->IsDetailKey && $this->otros->FormValue != NULL && $this->otros->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->otros->caption(), $this->otros->RequiredErrorMessage));
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
		$this->cod_casopreh->setDbValueDef($rsnew, $this->cod_casopreh->CurrentValue, NULL, FALSE);

		// diabetes
		$this->diabetes->setDbValueDef($rsnew, $this->diabetes->CurrentValue, NULL, FALSE);

		// cardiopatia
		$this->cardiopatia->setDbValueDef($rsnew, $this->cardiopatia->CurrentValue, NULL, FALSE);

		// convulsiones
		$this->convulsiones->setDbValueDef($rsnew, $this->convulsiones->CurrentValue, NULL, FALSE);

		// asmabronquitis
		$this->asmabronquitis->setDbValueDef($rsnew, $this->asmabronquitis->CurrentValue, NULL, FALSE);

		// acv
		$this->acv->setDbValueDef($rsnew, $this->acv->CurrentValue, NULL, FALSE);

		// has
		$this->has->setDbValueDef($rsnew, $this->has->CurrentValue, NULL, FALSE);

		// alergia
		$this->alergia->setDbValueDef($rsnew, $this->alergia->CurrentValue, NULL, FALSE);

		// medicamentos
		$this->medicamentos->setDbValueDef($rsnew, $this->medicamentos->CurrentValue, NULL, FALSE);

		// otros
		$this->otros->setDbValueDef($rsnew, $this->otros->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("antecedentes_registrolist.php"), "", $this->TableVar, TRUE);
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