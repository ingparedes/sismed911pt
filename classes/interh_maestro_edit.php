<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class interh_maestro_edit extends interh_maestro
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'interh_maestro';

	// Page object name
	public $PageObjName = "interh_maestro_edit";

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

		// Table object (interh_maestro)
		if (!isset($GLOBALS["interh_maestro"]) || get_class($GLOBALS["interh_maestro"]) == PROJECT_NAMESPACE . "interh_maestro") {
			$GLOBALS["interh_maestro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["interh_maestro"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'interh_maestro');

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
		global $interh_maestro;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($interh_maestro);
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
					if ($pageName == "interh_maestroview.php")
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->cod_casointerh->Visible = FALSE;
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
					$this->terminate(GetUrl("interh_maestrolist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->cod_casointerh->Visible = FALSE;
		$this->fechahorainterh->Visible = FALSE;
		$this->tiempo->Visible = FALSE;
		$this->cod_expendeinteinteh->Visible = FALSE;
		$this->tipo_serviciointerh->Visible = FALSE;
		$this->hospital_origneinterh->setVisibility();
		$this->nombrereportainterh->Visible = FALSE;
		$this->telefonointerh->Visible = FALSE;
		$this->motivo_atencioninteh->setVisibility();
		$this->accioninterh->Visible = FALSE;
		$this->longitudinterh->Visible = FALSE;
		$this->latitudinterh->Visible = FALSE;
		$this->prioridadinterh->Visible = FALSE;
		$this->estadointerh->Visible = FALSE;
		$this->cierreinterh->Visible = FALSE;
		$this->hospital_destinointerh->setVisibility();
		$this->nombre_recibe->setVisibility();
		$this->ambulancia->Visible = FALSE;
		$this->paciente->Visible = FALSE;
		$this->evaluacion->Visible = FALSE;
		$this->sede->Visible = FALSE;
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
		$this->setupLookupOptions($this->tipo_serviciointerh);
		$this->setupLookupOptions($this->hospital_origneinterh);
		$this->setupLookupOptions($this->motivo_atencioninteh);
		$this->setupLookupOptions($this->accioninterh);
		$this->setupLookupOptions($this->prioridadinterh);
		$this->setupLookupOptions($this->estadointerh);
		$this->setupLookupOptions($this->hospital_destinointerh);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("interh_maestrolist.php");
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
			if (Get("cod_casointerh") !== NULL) {
				$this->cod_casointerh->setQueryStringValue(Get("cod_casointerh"));
				$this->cod_casointerh->setOldValue($this->cod_casointerh->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->cod_casointerh->setQueryStringValue(Key(0));
				$this->cod_casointerh->setOldValue($this->cod_casointerh->QueryStringValue);
			} elseif (Post("cod_casointerh") !== NULL) {
				$this->cod_casointerh->setFormValue(Post("cod_casointerh"));
				$this->cod_casointerh->setOldValue($this->cod_casointerh->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->cod_casointerh->setQueryStringValue(Route(2));
				$this->cod_casointerh->setOldValue($this->cod_casointerh->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_cod_casointerh")) {
					$this->cod_casointerh->setFormValue($CurrentForm->getValue("x_cod_casointerh"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("cod_casointerh") !== NULL) {
					$this->cod_casointerh->setQueryStringValue(Get("cod_casointerh"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->cod_casointerh->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->cod_casointerh->CurrentValue = NULL;
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
					$this->terminate("interh_maestrolist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = "interh_maestrolist.php";
				if (GetPageName($returnUrl) == "interh_maestrolist.php")
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

		// Check field name 'hospital_origneinterh' first before field var 'x_hospital_origneinterh'
		$val = $CurrentForm->hasValue("hospital_origneinterh") ? $CurrentForm->getValue("hospital_origneinterh") : $CurrentForm->getValue("x_hospital_origneinterh");
		if (!$this->hospital_origneinterh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hospital_origneinterh->Visible = FALSE; // Disable update for API request
			else
				$this->hospital_origneinterh->setFormValue($val);
		}

		// Check field name 'motivo_atencioninteh' first before field var 'x_motivo_atencioninteh'
		$val = $CurrentForm->hasValue("motivo_atencioninteh") ? $CurrentForm->getValue("motivo_atencioninteh") : $CurrentForm->getValue("x_motivo_atencioninteh");
		if (!$this->motivo_atencioninteh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->motivo_atencioninteh->Visible = FALSE; // Disable update for API request
			else
				$this->motivo_atencioninteh->setFormValue($val);
		}

		// Check field name 'hospital_destinointerh' first before field var 'x_hospital_destinointerh'
		$val = $CurrentForm->hasValue("hospital_destinointerh") ? $CurrentForm->getValue("hospital_destinointerh") : $CurrentForm->getValue("x_hospital_destinointerh");
		if (!$this->hospital_destinointerh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hospital_destinointerh->Visible = FALSE; // Disable update for API request
			else
				$this->hospital_destinointerh->setFormValue($val);
		}

		// Check field name 'nombre_recibe' first before field var 'x_nombre_recibe'
		$val = $CurrentForm->hasValue("nombre_recibe") ? $CurrentForm->getValue("nombre_recibe") : $CurrentForm->getValue("x_nombre_recibe");
		if (!$this->nombre_recibe->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_recibe->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_recibe->setFormValue($val);
		}

		// Check field name 'cod_casointerh' first before field var 'x_cod_casointerh'
		$val = $CurrentForm->hasValue("cod_casointerh") ? $CurrentForm->getValue("cod_casointerh") : $CurrentForm->getValue("x_cod_casointerh");
		if (!$this->cod_casointerh->IsDetailKey)
			$this->cod_casointerh->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casointerh->CurrentValue = $this->cod_casointerh->FormValue;
		$this->hospital_origneinterh->CurrentValue = $this->hospital_origneinterh->FormValue;
		$this->motivo_atencioninteh->CurrentValue = $this->motivo_atencioninteh->FormValue;
		$this->hospital_destinointerh->CurrentValue = $this->hospital_destinointerh->FormValue;
		$this->nombre_recibe->CurrentValue = $this->nombre_recibe->FormValue;
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
		$this->fechahorainterh->setDbValue($row['fechahorainterh']);
		$this->tiempo->setDbValue($row['tiempo']);
		$this->cod_expendeinteinteh->setDbValue($row['cod_expendeinteinteh']);
		$this->tipo_serviciointerh->setDbValue($row['tipo_serviciointerh']);
		$this->hospital_origneinterh->setDbValue($row['hospital_origneinterh']);
		if (array_key_exists('EV__hospital_origneinterh', $rs->fields)) {
			$this->hospital_origneinterh->VirtualValue = $rs->fields('EV__hospital_origneinterh'); // Set up virtual field value
		} else {
			$this->hospital_origneinterh->VirtualValue = ""; // Clear value
		}
		$this->nombrereportainterh->setDbValue($row['nombrereportainterh']);
		$this->telefonointerh->setDbValue($row['telefonointerh']);
		$this->motivo_atencioninteh->setDbValue($row['motivo_atencioninteh']);
		if (array_key_exists('EV__motivo_atencioninteh', $rs->fields)) {
			$this->motivo_atencioninteh->VirtualValue = $rs->fields('EV__motivo_atencioninteh'); // Set up virtual field value
		} else {
			$this->motivo_atencioninteh->VirtualValue = ""; // Clear value
		}
		$this->accioninterh->setDbValue($row['accioninterh']);
		if (array_key_exists('EV__accioninterh', $rs->fields)) {
			$this->accioninterh->VirtualValue = $rs->fields('EV__accioninterh'); // Set up virtual field value
		} else {
			$this->accioninterh->VirtualValue = ""; // Clear value
		}
		$this->longitudinterh->setDbValue($row['longitudinterh']);
		$this->latitudinterh->setDbValue($row['latitudinterh']);
		$this->prioridadinterh->setDbValue($row['prioridadinterh']);
		$this->estadointerh->setDbValue($row['estadointerh']);
		$this->cierreinterh->setDbValue($row['cierreinterh']);
		$this->hospital_destinointerh->setDbValue($row['hospital_destinointerh']);
		if (array_key_exists('EV__hospital_destinointerh', $rs->fields)) {
			$this->hospital_destinointerh->VirtualValue = $rs->fields('EV__hospital_destinointerh'); // Set up virtual field value
		} else {
			$this->hospital_destinointerh->VirtualValue = ""; // Clear value
		}
		$this->nombre_recibe->setDbValue($row['nombre_recibe']);
		$this->ambulancia->setDbValue($row['ambulancia']);
		$this->paciente->setDbValue($row['paciente']);
		$this->evaluacion->setDbValue($row['evaluacion']);
		$this->sede->setDbValue($row['sede']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['cod_casointerh'] = NULL;
		$row['fechahorainterh'] = NULL;
		$row['tiempo'] = NULL;
		$row['cod_expendeinteinteh'] = NULL;
		$row['tipo_serviciointerh'] = NULL;
		$row['hospital_origneinterh'] = NULL;
		$row['nombrereportainterh'] = NULL;
		$row['telefonointerh'] = NULL;
		$row['motivo_atencioninteh'] = NULL;
		$row['accioninterh'] = NULL;
		$row['longitudinterh'] = NULL;
		$row['latitudinterh'] = NULL;
		$row['prioridadinterh'] = NULL;
		$row['estadointerh'] = NULL;
		$row['cierreinterh'] = NULL;
		$row['hospital_destinointerh'] = NULL;
		$row['nombre_recibe'] = NULL;
		$row['ambulancia'] = NULL;
		$row['paciente'] = NULL;
		$row['evaluacion'] = NULL;
		$row['sede'] = NULL;
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
		// fechahorainterh
		// tiempo
		// cod_expendeinteinteh
		// tipo_serviciointerh
		// hospital_origneinterh
		// nombrereportainterh
		// telefonointerh
		// motivo_atencioninteh
		// accioninterh
		// longitudinterh
		// latitudinterh
		// prioridadinterh
		// estadointerh
		// cierreinterh
		// hospital_destinointerh
		// nombre_recibe
		// ambulancia
		// paciente
		// evaluacion
		// sede

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// cod_casointerh
			$this->cod_casointerh->ViewValue = $this->cod_casointerh->CurrentValue;
			$this->cod_casointerh->CssClass = "font-weight-bold";
			$this->cod_casointerh->CellCssStyle .= "text-align: center;";
			$this->cod_casointerh->ViewCustomAttributes = "";

			// fechahorainterh
			$this->fechahorainterh->ViewValue = $this->fechahorainterh->CurrentValue;
			$this->fechahorainterh->ViewValue = FormatDateTime($this->fechahorainterh->ViewValue, 9);
			$this->fechahorainterh->CssClass = "font-italic";
			$this->fechahorainterh->ViewCustomAttributes = "";

			// tiempo
			$this->tiempo->ViewValue = $this->tiempo->CurrentValue;
			$this->tiempo->ViewValue = FormatNumber($this->tiempo->ViewValue, 0, -2, -2, -2);
			$this->tiempo->ViewCustomAttributes = "";

			// tipo_serviciointerh
			$curVal = strval($this->tipo_serviciointerh->CurrentValue);
			if ($curVal != "") {
				$this->tipo_serviciointerh->ViewValue = $this->tipo_serviciointerh->lookupCacheOption($curVal);
				if ($this->tipo_serviciointerh->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_tiposervicion\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tipo_serviciointerh->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->tipo_serviciointerh->ViewValue = $this->tipo_serviciointerh->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tipo_serviciointerh->ViewValue = $this->tipo_serviciointerh->CurrentValue;
					}
				}
			} else {
				$this->tipo_serviciointerh->ViewValue = NULL;
			}
			$this->tipo_serviciointerh->ViewCustomAttributes = "";

			// hospital_origneinterh
			if ($this->hospital_origneinterh->VirtualValue != "") {
				$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->VirtualValue;
			} else {
				$curVal = strval($this->hospital_origneinterh->CurrentValue);
				if ($curVal != "") {
					$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->lookupCacheOption($curVal);
					if ($this->hospital_origneinterh->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"id_hospital\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->hospital_origneinterh->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->CurrentValue;
						}
					}
				} else {
					$this->hospital_origneinterh->ViewValue = NULL;
				}
			}
			$this->hospital_origneinterh->ViewCustomAttributes = "";

			// nombrereportainterh
			$this->nombrereportainterh->ViewValue = $this->nombrereportainterh->CurrentValue;
			$this->nombrereportainterh->ViewCustomAttributes = "";

			// telefonointerh
			$this->telefonointerh->ViewValue = $this->telefonointerh->CurrentValue;
			$this->telefonointerh->ViewCustomAttributes = "";

			// motivo_atencioninteh
			if ($this->motivo_atencioninteh->VirtualValue != "") {
				$this->motivo_atencioninteh->ViewValue = $this->motivo_atencioninteh->VirtualValue;
			} else {
				$curVal = strval($this->motivo_atencioninteh->CurrentValue);
				if ($curVal != "") {
					$this->motivo_atencioninteh->ViewValue = $this->motivo_atencioninteh->lookupCacheOption($curVal);
					if ($this->motivo_atencioninteh->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"id_motivoatencion\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->motivo_atencioninteh->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->motivo_atencioninteh->ViewValue = $this->motivo_atencioninteh->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->motivo_atencioninteh->ViewValue = $this->motivo_atencioninteh->CurrentValue;
						}
					}
				} else {
					$this->motivo_atencioninteh->ViewValue = NULL;
				}
			}
			$this->motivo_atencioninteh->ViewCustomAttributes = "";

			// accioninterh
			if ($this->accioninterh->VirtualValue != "") {
				$this->accioninterh->ViewValue = $this->accioninterh->VirtualValue;
			} else {
				$curVal = strval($this->accioninterh->CurrentValue);
				if ($curVal != "") {
					$this->accioninterh->ViewValue = $this->accioninterh->lookupCacheOption($curVal);
					if ($this->accioninterh->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"id_accion\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->accioninterh->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->accioninterh->ViewValue = $this->accioninterh->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->accioninterh->ViewValue = $this->accioninterh->CurrentValue;
						}
					}
				} else {
					$this->accioninterh->ViewValue = NULL;
				}
			}
			$this->accioninterh->ViewCustomAttributes = "";

			// longitudinterh
			$this->longitudinterh->ViewValue = $this->longitudinterh->CurrentValue;
			$this->longitudinterh->ViewCustomAttributes = "";

			// latitudinterh
			$this->latitudinterh->ViewCustomAttributes = "";

			// prioridadinterh
			$curVal = strval($this->prioridadinterh->CurrentValue);
			if ($curVal != "") {
				$this->prioridadinterh->ViewValue = $this->prioridadinterh->lookupCacheOption($curVal);
				if ($this->prioridadinterh->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_prioridad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->prioridadinterh->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->prioridadinterh->ViewValue = $this->prioridadinterh->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->prioridadinterh->ViewValue = $this->prioridadinterh->CurrentValue;
					}
				}
			} else {
				$this->prioridadinterh->ViewValue = NULL;
			}
			$this->prioridadinterh->CellCssStyle .= "text-align: center;";
			$this->prioridadinterh->ViewCustomAttributes = "";

			// estadointerh
			$this->estadointerh->ViewValue = $this->estadointerh->CurrentValue;
			$curVal = strval($this->estadointerh->CurrentValue);
			if ($curVal != "") {
				$this->estadointerh->ViewValue = $this->estadointerh->lookupCacheOption($curVal);
				if ($this->estadointerh->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_estadointeh\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->estadointerh->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->estadointerh->ViewValue = $this->estadointerh->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->estadointerh->ViewValue = $this->estadointerh->CurrentValue;
					}
				}
			} else {
				$this->estadointerh->ViewValue = NULL;
			}
			$this->estadointerh->ViewCustomAttributes = "";

			// cierreinterh
			$this->cierreinterh->ViewValue = $this->cierreinterh->CurrentValue;
			$this->cierreinterh->ViewValue = FormatNumber($this->cierreinterh->ViewValue, 0, -2, -2, -2);
			$this->cierreinterh->ViewCustomAttributes = "";

			// hospital_destinointerh
			if ($this->hospital_destinointerh->VirtualValue != "") {
				$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->VirtualValue;
			} else {
				$curVal = strval($this->hospital_destinointerh->CurrentValue);
				if ($curVal != "") {
					$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->lookupCacheOption($curVal);
					if ($this->hospital_destinointerh->ViewValue === NULL) { // Lookup from database
						$filterWrk = "\"id_hospital\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->hospital_destinointerh->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$arwrk[3] = $rswrk->fields('df3');
							$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->CurrentValue;
						}
					}
				} else {
					$this->hospital_destinointerh->ViewValue = NULL;
				}
			}
			$this->hospital_destinointerh->ViewCustomAttributes = "";

			// nombre_recibe
			$this->nombre_recibe->ViewValue = $this->nombre_recibe->CurrentValue;
			$this->nombre_recibe->ViewCustomAttributes = "";

			// sede
			$this->sede->ViewValue = $this->sede->CurrentValue;
			$this->sede->ViewValue = FormatNumber($this->sede->ViewValue, 0, -2, -2, -2);
			$this->sede->ViewCustomAttributes = "";

			// hospital_origneinterh
			$this->hospital_origneinterh->LinkCustomAttributes = "";
			$this->hospital_origneinterh->HrefValue = "";
			$this->hospital_origneinterh->TooltipValue = "";

			// motivo_atencioninteh
			$this->motivo_atencioninteh->LinkCustomAttributes = "";
			$this->motivo_atencioninteh->HrefValue = "";
			$this->motivo_atencioninteh->TooltipValue = "";

			// hospital_destinointerh
			$this->hospital_destinointerh->LinkCustomAttributes = "";
			$this->hospital_destinointerh->HrefValue = "";
			$this->hospital_destinointerh->TooltipValue = "";

			// nombre_recibe
			$this->nombre_recibe->LinkCustomAttributes = "";
			$this->nombre_recibe->HrefValue = "";
			$this->nombre_recibe->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// hospital_origneinterh
			$this->hospital_origneinterh->EditCustomAttributes = "";
			$curVal = trim(strval($this->hospital_origneinterh->CurrentValue));
			if ($curVal != "")
				$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->lookupCacheOption($curVal);
			else
				$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->Lookup !== NULL && is_array($this->hospital_origneinterh->Lookup->Options) ? $curVal : NULL;
			if ($this->hospital_origneinterh->ViewValue !== NULL) { // Load from cache
				$this->hospital_origneinterh->EditValue = array_values($this->hospital_origneinterh->Lookup->Options);
				if ($this->hospital_origneinterh->ViewValue == "")
					$this->hospital_origneinterh->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_hospital\"" . SearchString("=", $this->hospital_origneinterh->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->hospital_origneinterh->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->hospital_origneinterh->ViewValue = $this->hospital_origneinterh->displayValue($arwrk);
				} else {
					$this->hospital_origneinterh->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->hospital_origneinterh->EditValue = $arwrk;
			}

			// motivo_atencioninteh
			$this->motivo_atencioninteh->EditCustomAttributes = "";
			$curVal = trim(strval($this->motivo_atencioninteh->CurrentValue));
			if ($curVal != "")
				$this->motivo_atencioninteh->ViewValue = $this->motivo_atencioninteh->lookupCacheOption($curVal);
			else
				$this->motivo_atencioninteh->ViewValue = $this->motivo_atencioninteh->Lookup !== NULL && is_array($this->motivo_atencioninteh->Lookup->Options) ? $curVal : NULL;
			if ($this->motivo_atencioninteh->ViewValue !== NULL) { // Load from cache
				$this->motivo_atencioninteh->EditValue = array_values($this->motivo_atencioninteh->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_motivoatencion\"" . SearchString("=", $this->motivo_atencioninteh->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->motivo_atencioninteh->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->motivo_atencioninteh->EditValue = $arwrk;
			}

			// hospital_destinointerh
			$this->hospital_destinointerh->EditCustomAttributes = "";
			$curVal = trim(strval($this->hospital_destinointerh->CurrentValue));
			if ($curVal != "")
				$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->lookupCacheOption($curVal);
			else
				$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->Lookup !== NULL && is_array($this->hospital_destinointerh->Lookup->Options) ? $curVal : NULL;
			if ($this->hospital_destinointerh->ViewValue !== NULL) { // Load from cache
				$this->hospital_destinointerh->EditValue = array_values($this->hospital_destinointerh->Lookup->Options);
				if ($this->hospital_destinointerh->ViewValue == "")
					$this->hospital_destinointerh->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_hospital\"" . SearchString("=", $this->hospital_destinointerh->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->hospital_destinointerh->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->hospital_destinointerh->ViewValue = $this->hospital_destinointerh->displayValue($arwrk);
				} else {
					$this->hospital_destinointerh->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->hospital_destinointerh->EditValue = $arwrk;
			}

			// nombre_recibe
			$this->nombre_recibe->EditAttrs["class"] = "form-control";
			$this->nombre_recibe->EditCustomAttributes = "";
			if (!$this->nombre_recibe->Raw)
				$this->nombre_recibe->CurrentValue = HtmlDecode($this->nombre_recibe->CurrentValue);
			$this->nombre_recibe->EditValue = HtmlEncode($this->nombre_recibe->CurrentValue);
			$this->nombre_recibe->PlaceHolder = RemoveHtml($this->nombre_recibe->caption());

			// Edit refer script
			// hospital_origneinterh

			$this->hospital_origneinterh->LinkCustomAttributes = "";
			$this->hospital_origneinterh->HrefValue = "";

			// motivo_atencioninteh
			$this->motivo_atencioninteh->LinkCustomAttributes = "";
			$this->motivo_atencioninteh->HrefValue = "";

			// hospital_destinointerh
			$this->hospital_destinointerh->LinkCustomAttributes = "";
			$this->hospital_destinointerh->HrefValue = "";

			// nombre_recibe
			$this->nombre_recibe->LinkCustomAttributes = "";
			$this->nombre_recibe->HrefValue = "";
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
		if ($this->hospital_origneinterh->Required) {
			if (!$this->hospital_origneinterh->IsDetailKey && $this->hospital_origneinterh->FormValue != NULL && $this->hospital_origneinterh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hospital_origneinterh->caption(), $this->hospital_origneinterh->RequiredErrorMessage));
			}
		}
		if ($this->motivo_atencioninteh->Required) {
			if ($this->motivo_atencioninteh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->motivo_atencioninteh->caption(), $this->motivo_atencioninteh->RequiredErrorMessage));
			}
		}
		if ($this->hospital_destinointerh->Required) {
			if (!$this->hospital_destinointerh->IsDetailKey && $this->hospital_destinointerh->FormValue != NULL && $this->hospital_destinointerh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hospital_destinointerh->caption(), $this->hospital_destinointerh->RequiredErrorMessage));
			}
		}
		if ($this->nombre_recibe->Required) {
			if (!$this->nombre_recibe->IsDetailKey && $this->nombre_recibe->FormValue != NULL && $this->nombre_recibe->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_recibe->caption(), $this->nombre_recibe->RequiredErrorMessage));
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

			// hospital_origneinterh
			$this->hospital_origneinterh->setDbValueDef($rsnew, $this->hospital_origneinterh->CurrentValue, NULL, $this->hospital_origneinterh->ReadOnly);

			// motivo_atencioninteh
			$this->motivo_atencioninteh->setDbValueDef($rsnew, $this->motivo_atencioninteh->CurrentValue, NULL, $this->motivo_atencioninteh->ReadOnly);

			// hospital_destinointerh
			$this->hospital_destinointerh->setDbValueDef($rsnew, $this->hospital_destinointerh->CurrentValue, NULL, $this->hospital_destinointerh->ReadOnly);

			// nombre_recibe
			$this->nombre_recibe->setDbValueDef($rsnew, $this->nombre_recibe->CurrentValue, NULL, $this->nombre_recibe->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("interh_maestrolist.php"), "", $this->TableVar, TRUE);
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
				case "x_tipo_serviciointerh":
					break;
				case "x_hospital_origneinterh":
					break;
				case "x_motivo_atencioninteh":
					break;
				case "x_accioninterh":
					break;
				case "x_prioridadinterh":
					break;
				case "x_estadointerh":
					break;
				case "x_hospital_destinointerh":
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
						case "x_tipo_serviciointerh":
							break;
						case "x_hospital_origneinterh":
							break;
						case "x_motivo_atencioninteh":
							break;
						case "x_accioninterh":
							break;
						case "x_prioridadinterh":
							break;
						case "x_estadointerh":
							break;
						case "x_hospital_destinointerh":
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
			$msg = "your success message";
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
		$this->cod_casointerh->EditValue = htmlspecialchars($_GET["cod_casointerh"]);

		//	$this->cod_ambulancia->EditValue = htmlspecialchars($_GET["cod_ambulancia"]);
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