<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class censo_total_edit extends censo_total
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'censo_total';

	// Page object name
	public $PageObjName = "censo_total_edit";

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

		// Table object (censo_total)
		if (!isset($GLOBALS["censo_total"]) || get_class($GLOBALS["censo_total"]) == PROJECT_NAMESPACE . "censo_total") {
			$GLOBALS["censo_total"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["censo_total"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'censo_total');

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
		global $censo_total;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($censo_total);
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
					if ($pageName == "censo_totalview.php")
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
			$key .= @$ar['id_censo'];
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
			$this->id_censo->Visible = FALSE;
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
					$this->terminate(GetUrl("censo_totallist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_hospital->setVisibility();
		$this->cod_servicio->setVisibility();
		$this->cod_division->setVisibility();
		$this->camas_ocupadas->setVisibility();
		$this->camas_libres->setVisibility();
		$this->camas_fueraservicio->setVisibility();
		$this->nombre_reporta->setVisibility();
		$this->telefono_reporta->setVisibility();
		$this->fecha_reporte->setVisibility();
		$this->id_censo->setVisibility();
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
			$this->terminate("censo_totallist.php");
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
			if (Get("id_censo") !== NULL) {
				$this->id_censo->setQueryStringValue(Get("id_censo"));
				$this->id_censo->setOldValue($this->id_censo->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->id_censo->setQueryStringValue(Key(0));
				$this->id_censo->setOldValue($this->id_censo->QueryStringValue);
			} elseif (Post("id_censo") !== NULL) {
				$this->id_censo->setFormValue(Post("id_censo"));
				$this->id_censo->setOldValue($this->id_censo->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->id_censo->setQueryStringValue(Route(2));
				$this->id_censo->setOldValue($this->id_censo->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_id_censo")) {
					$this->id_censo->setFormValue($CurrentForm->getValue("x_id_censo"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("id_censo") !== NULL) {
					$this->id_censo->setQueryStringValue(Get("id_censo"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->id_censo->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->id_censo->CurrentValue = NULL;
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
					$this->terminate("censo_totallist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "censo_totallist.php")
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

		// Check field name 'id_hospital' first before field var 'x_id_hospital'
		$val = $CurrentForm->hasValue("id_hospital") ? $CurrentForm->getValue("id_hospital") : $CurrentForm->getValue("x_id_hospital");
		if (!$this->id_hospital->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->id_hospital->Visible = FALSE; // Disable update for API request
			else
				$this->id_hospital->setFormValue($val);
		}

		// Check field name 'cod_servicio' first before field var 'x_cod_servicio'
		$val = $CurrentForm->hasValue("cod_servicio") ? $CurrentForm->getValue("cod_servicio") : $CurrentForm->getValue("x_cod_servicio");
		if (!$this->cod_servicio->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_servicio->Visible = FALSE; // Disable update for API request
			else
				$this->cod_servicio->setFormValue($val);
		}

		// Check field name 'cod_division' first before field var 'x_cod_division'
		$val = $CurrentForm->hasValue("cod_division") ? $CurrentForm->getValue("cod_division") : $CurrentForm->getValue("x_cod_division");
		if (!$this->cod_division->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_division->Visible = FALSE; // Disable update for API request
			else
				$this->cod_division->setFormValue($val);
		}

		// Check field name 'camas_ocupadas' first before field var 'x_camas_ocupadas'
		$val = $CurrentForm->hasValue("camas_ocupadas") ? $CurrentForm->getValue("camas_ocupadas") : $CurrentForm->getValue("x_camas_ocupadas");
		if (!$this->camas_ocupadas->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->camas_ocupadas->Visible = FALSE; // Disable update for API request
			else
				$this->camas_ocupadas->setFormValue($val);
		}

		// Check field name 'camas_libres' first before field var 'x_camas_libres'
		$val = $CurrentForm->hasValue("camas_libres") ? $CurrentForm->getValue("camas_libres") : $CurrentForm->getValue("x_camas_libres");
		if (!$this->camas_libres->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->camas_libres->Visible = FALSE; // Disable update for API request
			else
				$this->camas_libres->setFormValue($val);
		}

		// Check field name 'camas_fueraservicio' first before field var 'x_camas_fueraservicio'
		$val = $CurrentForm->hasValue("camas_fueraservicio") ? $CurrentForm->getValue("camas_fueraservicio") : $CurrentForm->getValue("x_camas_fueraservicio");
		if (!$this->camas_fueraservicio->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->camas_fueraservicio->Visible = FALSE; // Disable update for API request
			else
				$this->camas_fueraservicio->setFormValue($val);
		}

		// Check field name 'nombre_reporta' first before field var 'x_nombre_reporta'
		$val = $CurrentForm->hasValue("nombre_reporta") ? $CurrentForm->getValue("nombre_reporta") : $CurrentForm->getValue("x_nombre_reporta");
		if (!$this->nombre_reporta->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_reporta->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_reporta->setFormValue($val);
		}

		// Check field name 'telefono_reporta' first before field var 'x_telefono_reporta'
		$val = $CurrentForm->hasValue("telefono_reporta") ? $CurrentForm->getValue("telefono_reporta") : $CurrentForm->getValue("x_telefono_reporta");
		if (!$this->telefono_reporta->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono_reporta->Visible = FALSE; // Disable update for API request
			else
				$this->telefono_reporta->setFormValue($val);
		}

		// Check field name 'fecha_reporte' first before field var 'x_fecha_reporte'
		$val = $CurrentForm->hasValue("fecha_reporte") ? $CurrentForm->getValue("fecha_reporte") : $CurrentForm->getValue("x_fecha_reporte");
		if (!$this->fecha_reporte->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_reporte->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_reporte->setFormValue($val);
			$this->fecha_reporte->CurrentValue = UnFormatDateTime($this->fecha_reporte->CurrentValue, 0);
		}

		// Check field name 'id_censo' first before field var 'x_id_censo'
		$val = $CurrentForm->hasValue("id_censo") ? $CurrentForm->getValue("id_censo") : $CurrentForm->getValue("x_id_censo");
		if (!$this->id_censo->IsDetailKey)
			$this->id_censo->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id_hospital->CurrentValue = $this->id_hospital->FormValue;
		$this->cod_servicio->CurrentValue = $this->cod_servicio->FormValue;
		$this->cod_division->CurrentValue = $this->cod_division->FormValue;
		$this->camas_ocupadas->CurrentValue = $this->camas_ocupadas->FormValue;
		$this->camas_libres->CurrentValue = $this->camas_libres->FormValue;
		$this->camas_fueraservicio->CurrentValue = $this->camas_fueraservicio->FormValue;
		$this->nombre_reporta->CurrentValue = $this->nombre_reporta->FormValue;
		$this->telefono_reporta->CurrentValue = $this->telefono_reporta->FormValue;
		$this->fecha_reporte->CurrentValue = $this->fecha_reporte->FormValue;
		$this->fecha_reporte->CurrentValue = UnFormatDateTime($this->fecha_reporte->CurrentValue, 0);
		$this->id_censo->CurrentValue = $this->id_censo->FormValue;
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
		$this->id_hospital->setDbValue($row['id_hospital']);
		$this->cod_servicio->setDbValue($row['cod_servicio']);
		$this->cod_division->setDbValue($row['cod_division']);
		$this->camas_ocupadas->setDbValue($row['camas_ocupadas']);
		$this->camas_libres->setDbValue($row['camas_libres']);
		$this->camas_fueraservicio->setDbValue($row['camas_fueraservicio']);
		$this->nombre_reporta->setDbValue($row['nombre_reporta']);
		$this->telefono_reporta->setDbValue($row['telefono_reporta']);
		$this->fecha_reporte->setDbValue($row['fecha_reporte']);
		$this->id_censo->setDbValue($row['id_censo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id_hospital'] = NULL;
		$row['cod_servicio'] = NULL;
		$row['cod_division'] = NULL;
		$row['camas_ocupadas'] = NULL;
		$row['camas_libres'] = NULL;
		$row['camas_fueraservicio'] = NULL;
		$row['nombre_reporta'] = NULL;
		$row['telefono_reporta'] = NULL;
		$row['fecha_reporte'] = NULL;
		$row['id_censo'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_censo")) != "")
			$this->id_censo->OldValue = $this->getKey("id_censo"); // id_censo
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
		// id_hospital
		// cod_servicio
		// cod_division
		// camas_ocupadas
		// camas_libres
		// camas_fueraservicio
		// nombre_reporta
		// telefono_reporta
		// fecha_reporte
		// id_censo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_hospital
			$this->id_hospital->ViewValue = $this->id_hospital->CurrentValue;
			$this->id_hospital->ViewValue = FormatNumber($this->id_hospital->ViewValue, 0, -2, -2, -2);
			$this->id_hospital->ViewCustomAttributes = "";

			// cod_servicio
			$this->cod_servicio->ViewValue = $this->cod_servicio->CurrentValue;
			$this->cod_servicio->ViewValue = FormatNumber($this->cod_servicio->ViewValue, 0, -2, -2, -2);
			$this->cod_servicio->ViewCustomAttributes = "";

			// cod_division
			$this->cod_division->ViewValue = $this->cod_division->CurrentValue;
			$this->cod_division->ViewValue = FormatNumber($this->cod_division->ViewValue, 0, -2, -2, -2);
			$this->cod_division->ViewCustomAttributes = "";

			// camas_ocupadas
			$this->camas_ocupadas->ViewValue = $this->camas_ocupadas->CurrentValue;
			$this->camas_ocupadas->ViewValue = FormatNumber($this->camas_ocupadas->ViewValue, 0, -2, -2, -2);
			$this->camas_ocupadas->ViewCustomAttributes = "";

			// camas_libres
			$this->camas_libres->ViewValue = $this->camas_libres->CurrentValue;
			$this->camas_libres->ViewValue = FormatNumber($this->camas_libres->ViewValue, 0, -2, -2, -2);
			$this->camas_libres->ViewCustomAttributes = "";

			// camas_fueraservicio
			$this->camas_fueraservicio->ViewValue = $this->camas_fueraservicio->CurrentValue;
			$this->camas_fueraservicio->ViewValue = FormatNumber($this->camas_fueraservicio->ViewValue, 0, -2, -2, -2);
			$this->camas_fueraservicio->ViewCustomAttributes = "";

			// nombre_reporta
			$this->nombre_reporta->ViewValue = $this->nombre_reporta->CurrentValue;
			$this->nombre_reporta->ViewCustomAttributes = "";

			// telefono_reporta
			$this->telefono_reporta->ViewValue = $this->telefono_reporta->CurrentValue;
			$this->telefono_reporta->ViewCustomAttributes = "";

			// fecha_reporte
			$this->fecha_reporte->ViewValue = $this->fecha_reporte->CurrentValue;
			$this->fecha_reporte->ViewValue = FormatDateTime($this->fecha_reporte->ViewValue, 0);
			$this->fecha_reporte->ViewCustomAttributes = "";

			// id_censo
			$this->id_censo->ViewValue = $this->id_censo->CurrentValue;
			$this->id_censo->ViewCustomAttributes = "";

			// id_hospital
			$this->id_hospital->LinkCustomAttributes = "";
			$this->id_hospital->HrefValue = "";
			$this->id_hospital->TooltipValue = "";

			// cod_servicio
			$this->cod_servicio->LinkCustomAttributes = "";
			$this->cod_servicio->HrefValue = "";
			$this->cod_servicio->TooltipValue = "";

			// cod_division
			$this->cod_division->LinkCustomAttributes = "";
			$this->cod_division->HrefValue = "";
			$this->cod_division->TooltipValue = "";

			// camas_ocupadas
			$this->camas_ocupadas->LinkCustomAttributes = "";
			$this->camas_ocupadas->HrefValue = "";
			$this->camas_ocupadas->TooltipValue = "";

			// camas_libres
			$this->camas_libres->LinkCustomAttributes = "";
			$this->camas_libres->HrefValue = "";
			$this->camas_libres->TooltipValue = "";

			// camas_fueraservicio
			$this->camas_fueraservicio->LinkCustomAttributes = "";
			$this->camas_fueraservicio->HrefValue = "";
			$this->camas_fueraservicio->TooltipValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";
			$this->nombre_reporta->TooltipValue = "";

			// telefono_reporta
			$this->telefono_reporta->LinkCustomAttributes = "";
			$this->telefono_reporta->HrefValue = "";
			$this->telefono_reporta->TooltipValue = "";

			// fecha_reporte
			$this->fecha_reporte->LinkCustomAttributes = "";
			$this->fecha_reporte->HrefValue = "";
			$this->fecha_reporte->TooltipValue = "";

			// id_censo
			$this->id_censo->LinkCustomAttributes = "";
			$this->id_censo->HrefValue = "";
			$this->id_censo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id_hospital
			$this->id_hospital->EditAttrs["class"] = "form-control";
			$this->id_hospital->EditCustomAttributes = "";
			$this->id_hospital->EditValue = HtmlEncode($this->id_hospital->CurrentValue);
			$this->id_hospital->PlaceHolder = RemoveHtml($this->id_hospital->caption());

			// cod_servicio
			$this->cod_servicio->EditAttrs["class"] = "form-control";
			$this->cod_servicio->EditCustomAttributes = "";
			$this->cod_servicio->EditValue = HtmlEncode($this->cod_servicio->CurrentValue);
			$this->cod_servicio->PlaceHolder = RemoveHtml($this->cod_servicio->caption());

			// cod_division
			$this->cod_division->EditAttrs["class"] = "form-control";
			$this->cod_division->EditCustomAttributes = "";
			$this->cod_division->EditValue = HtmlEncode($this->cod_division->CurrentValue);
			$this->cod_division->PlaceHolder = RemoveHtml($this->cod_division->caption());

			// camas_ocupadas
			$this->camas_ocupadas->EditAttrs["class"] = "form-control";
			$this->camas_ocupadas->EditCustomAttributes = "";
			$this->camas_ocupadas->EditValue = HtmlEncode($this->camas_ocupadas->CurrentValue);
			$this->camas_ocupadas->PlaceHolder = RemoveHtml($this->camas_ocupadas->caption());

			// camas_libres
			$this->camas_libres->EditAttrs["class"] = "form-control";
			$this->camas_libres->EditCustomAttributes = "";
			$this->camas_libres->EditValue = HtmlEncode($this->camas_libres->CurrentValue);
			$this->camas_libres->PlaceHolder = RemoveHtml($this->camas_libres->caption());

			// camas_fueraservicio
			$this->camas_fueraservicio->EditAttrs["class"] = "form-control";
			$this->camas_fueraservicio->EditCustomAttributes = "";
			$this->camas_fueraservicio->EditValue = HtmlEncode($this->camas_fueraservicio->CurrentValue);
			$this->camas_fueraservicio->PlaceHolder = RemoveHtml($this->camas_fueraservicio->caption());

			// nombre_reporta
			$this->nombre_reporta->EditAttrs["class"] = "form-control";
			$this->nombre_reporta->EditCustomAttributes = "";
			if (!$this->nombre_reporta->Raw)
				$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
			$this->nombre_reporta->EditValue = HtmlEncode($this->nombre_reporta->CurrentValue);
			$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

			// telefono_reporta
			$this->telefono_reporta->EditAttrs["class"] = "form-control";
			$this->telefono_reporta->EditCustomAttributes = "";
			if (!$this->telefono_reporta->Raw)
				$this->telefono_reporta->CurrentValue = HtmlDecode($this->telefono_reporta->CurrentValue);
			$this->telefono_reporta->EditValue = HtmlEncode($this->telefono_reporta->CurrentValue);
			$this->telefono_reporta->PlaceHolder = RemoveHtml($this->telefono_reporta->caption());

			// fecha_reporte
			$this->fecha_reporte->EditAttrs["class"] = "form-control";
			$this->fecha_reporte->EditCustomAttributes = "";
			$this->fecha_reporte->EditValue = HtmlEncode(FormatDateTime($this->fecha_reporte->CurrentValue, 8));
			$this->fecha_reporte->PlaceHolder = RemoveHtml($this->fecha_reporte->caption());

			// id_censo
			$this->id_censo->EditAttrs["class"] = "form-control";
			$this->id_censo->EditCustomAttributes = "";
			$this->id_censo->EditValue = $this->id_censo->CurrentValue;
			$this->id_censo->ViewCustomAttributes = "";

			// Edit refer script
			// id_hospital

			$this->id_hospital->LinkCustomAttributes = "";
			$this->id_hospital->HrefValue = "";

			// cod_servicio
			$this->cod_servicio->LinkCustomAttributes = "";
			$this->cod_servicio->HrefValue = "";

			// cod_division
			$this->cod_division->LinkCustomAttributes = "";
			$this->cod_division->HrefValue = "";

			// camas_ocupadas
			$this->camas_ocupadas->LinkCustomAttributes = "";
			$this->camas_ocupadas->HrefValue = "";

			// camas_libres
			$this->camas_libres->LinkCustomAttributes = "";
			$this->camas_libres->HrefValue = "";

			// camas_fueraservicio
			$this->camas_fueraservicio->LinkCustomAttributes = "";
			$this->camas_fueraservicio->HrefValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";

			// telefono_reporta
			$this->telefono_reporta->LinkCustomAttributes = "";
			$this->telefono_reporta->HrefValue = "";

			// fecha_reporte
			$this->fecha_reporte->LinkCustomAttributes = "";
			$this->fecha_reporte->HrefValue = "";

			// id_censo
			$this->id_censo->LinkCustomAttributes = "";
			$this->id_censo->HrefValue = "";
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
		if ($this->id_hospital->Required) {
			if (!$this->id_hospital->IsDetailKey && $this->id_hospital->FormValue != NULL && $this->id_hospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_hospital->caption(), $this->id_hospital->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->id_hospital->FormValue)) {
			AddMessage($FormError, $this->id_hospital->errorMessage());
		}
		if ($this->cod_servicio->Required) {
			if (!$this->cod_servicio->IsDetailKey && $this->cod_servicio->FormValue != NULL && $this->cod_servicio->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_servicio->caption(), $this->cod_servicio->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cod_servicio->FormValue)) {
			AddMessage($FormError, $this->cod_servicio->errorMessage());
		}
		if ($this->cod_division->Required) {
			if (!$this->cod_division->IsDetailKey && $this->cod_division->FormValue != NULL && $this->cod_division->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_division->caption(), $this->cod_division->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cod_division->FormValue)) {
			AddMessage($FormError, $this->cod_division->errorMessage());
		}
		if ($this->camas_ocupadas->Required) {
			if (!$this->camas_ocupadas->IsDetailKey && $this->camas_ocupadas->FormValue != NULL && $this->camas_ocupadas->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->camas_ocupadas->caption(), $this->camas_ocupadas->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->camas_ocupadas->FormValue)) {
			AddMessage($FormError, $this->camas_ocupadas->errorMessage());
		}
		if ($this->camas_libres->Required) {
			if (!$this->camas_libres->IsDetailKey && $this->camas_libres->FormValue != NULL && $this->camas_libres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->camas_libres->caption(), $this->camas_libres->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->camas_libres->FormValue)) {
			AddMessage($FormError, $this->camas_libres->errorMessage());
		}
		if ($this->camas_fueraservicio->Required) {
			if (!$this->camas_fueraservicio->IsDetailKey && $this->camas_fueraservicio->FormValue != NULL && $this->camas_fueraservicio->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->camas_fueraservicio->caption(), $this->camas_fueraservicio->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->camas_fueraservicio->FormValue)) {
			AddMessage($FormError, $this->camas_fueraservicio->errorMessage());
		}
		if ($this->nombre_reporta->Required) {
			if (!$this->nombre_reporta->IsDetailKey && $this->nombre_reporta->FormValue != NULL && $this->nombre_reporta->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_reporta->caption(), $this->nombre_reporta->RequiredErrorMessage));
			}
		}
		if ($this->telefono_reporta->Required) {
			if (!$this->telefono_reporta->IsDetailKey && $this->telefono_reporta->FormValue != NULL && $this->telefono_reporta->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono_reporta->caption(), $this->telefono_reporta->RequiredErrorMessage));
			}
		}
		if ($this->fecha_reporte->Required) {
			if (!$this->fecha_reporte->IsDetailKey && $this->fecha_reporte->FormValue != NULL && $this->fecha_reporte->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_reporte->caption(), $this->fecha_reporte->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->fecha_reporte->FormValue)) {
			AddMessage($FormError, $this->fecha_reporte->errorMessage());
		}
		if ($this->id_censo->Required) {
			if (!$this->id_censo->IsDetailKey && $this->id_censo->FormValue != NULL && $this->id_censo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_censo->caption(), $this->id_censo->RequiredErrorMessage));
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

			// id_hospital
			$this->id_hospital->setDbValueDef($rsnew, $this->id_hospital->CurrentValue, NULL, $this->id_hospital->ReadOnly);

			// cod_servicio
			$this->cod_servicio->setDbValueDef($rsnew, $this->cod_servicio->CurrentValue, NULL, $this->cod_servicio->ReadOnly);

			// cod_division
			$this->cod_division->setDbValueDef($rsnew, $this->cod_division->CurrentValue, NULL, $this->cod_division->ReadOnly);

			// camas_ocupadas
			$this->camas_ocupadas->setDbValueDef($rsnew, $this->camas_ocupadas->CurrentValue, NULL, $this->camas_ocupadas->ReadOnly);

			// camas_libres
			$this->camas_libres->setDbValueDef($rsnew, $this->camas_libres->CurrentValue, NULL, $this->camas_libres->ReadOnly);

			// camas_fueraservicio
			$this->camas_fueraservicio->setDbValueDef($rsnew, $this->camas_fueraservicio->CurrentValue, NULL, $this->camas_fueraservicio->ReadOnly);

			// nombre_reporta
			$this->nombre_reporta->setDbValueDef($rsnew, $this->nombre_reporta->CurrentValue, NULL, $this->nombre_reporta->ReadOnly);

			// telefono_reporta
			$this->telefono_reporta->setDbValueDef($rsnew, $this->telefono_reporta->CurrentValue, NULL, $this->telefono_reporta->ReadOnly);

			// fecha_reporte
			$this->fecha_reporte->setDbValueDef($rsnew, UnFormatDateTime($this->fecha_reporte->CurrentValue, 0), NULL, $this->fecha_reporte->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("censo_totallist.php"), "", $this->TableVar, TRUE);
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