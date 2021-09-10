<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class interh_motivoatencion_addopt extends interh_motivoatencion
{

	// Page ID
	public $PageID = "addopt";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'interh_motivoatencion';

	// Page object name
	public $PageObjName = "interh_motivoatencion_addopt";

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
		$hidden = FALSE;
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

		// Table object (interh_motivoatencion)
		if (!isset($GLOBALS["interh_motivoatencion"]) || get_class($GLOBALS["interh_motivoatencion"]) == PROJECT_NAMESPACE . "interh_motivoatencion") {
			$GLOBALS["interh_motivoatencion"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["interh_motivoatencion"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'addopt');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'interh_motivoatencion');

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
		global $interh_motivoatencion;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($interh_motivoatencion);
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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
			$key .= @$ar['id_motivoatencion'];
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
			$this->id_motivoatencion->Visible = FALSE;
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

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
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
					$this->terminate(GetUrl("interh_motivoatencionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_motivoatencion->Visible = FALSE;
		$this->nombre_motivo_es->setVisibility();
		$this->nombre_motivo_en->setVisibility();
		$this->nombre_motivo_fr->setVisibility();
		$this->nombre_motivo_pr->setVisibility();
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
		set_error_handler(PROJECT_NAMESPACE . "ErrorHandler");

		// Set up Breadcrumb
		//$this->setupBreadcrumb(); // Not used

		$this->loadRowValues(); // Load default values

		// Render row
		$this->RowType = ROWTYPE_ADD; // Render add type
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
		$this->id_motivoatencion->CurrentValue = NULL;
		$this->id_motivoatencion->OldValue = $this->id_motivoatencion->CurrentValue;
		$this->nombre_motivo_es->CurrentValue = NULL;
		$this->nombre_motivo_es->OldValue = $this->nombre_motivo_es->CurrentValue;
		$this->nombre_motivo_en->CurrentValue = NULL;
		$this->nombre_motivo_en->OldValue = $this->nombre_motivo_en->CurrentValue;
		$this->nombre_motivo_fr->CurrentValue = NULL;
		$this->nombre_motivo_fr->OldValue = $this->nombre_motivo_fr->CurrentValue;
		$this->nombre_motivo_pr->CurrentValue = NULL;
		$this->nombre_motivo_pr->OldValue = $this->nombre_motivo_pr->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'nombre_motivo_es' first before field var 'x_nombre_motivo_es'
		$val = $CurrentForm->hasValue("nombre_motivo_es") ? $CurrentForm->getValue("nombre_motivo_es") : $CurrentForm->getValue("x_nombre_motivo_es");
		if (!$this->nombre_motivo_es->IsDetailKey) {
			$this->nombre_motivo_es->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'nombre_motivo_en' first before field var 'x_nombre_motivo_en'
		$val = $CurrentForm->hasValue("nombre_motivo_en") ? $CurrentForm->getValue("nombre_motivo_en") : $CurrentForm->getValue("x_nombre_motivo_en");
		if (!$this->nombre_motivo_en->IsDetailKey) {
			$this->nombre_motivo_en->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'nombre_motivo_fr' first before field var 'x_nombre_motivo_fr'
		$val = $CurrentForm->hasValue("nombre_motivo_fr") ? $CurrentForm->getValue("nombre_motivo_fr") : $CurrentForm->getValue("x_nombre_motivo_fr");
		if (!$this->nombre_motivo_fr->IsDetailKey) {
			$this->nombre_motivo_fr->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'nombre_motivo_pr' first before field var 'x_nombre_motivo_pr'
		$val = $CurrentForm->hasValue("nombre_motivo_pr") ? $CurrentForm->getValue("nombre_motivo_pr") : $CurrentForm->getValue("x_nombre_motivo_pr");
		if (!$this->nombre_motivo_pr->IsDetailKey) {
			$this->nombre_motivo_pr->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'id_motivoatencion' first before field var 'x_id_motivoatencion'
		$val = $CurrentForm->hasValue("id_motivoatencion") ? $CurrentForm->getValue("id_motivoatencion") : $CurrentForm->getValue("x_id_motivoatencion");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->nombre_motivo_es->CurrentValue = ConvertToUtf8($this->nombre_motivo_es->FormValue);
		$this->nombre_motivo_en->CurrentValue = ConvertToUtf8($this->nombre_motivo_en->FormValue);
		$this->nombre_motivo_fr->CurrentValue = ConvertToUtf8($this->nombre_motivo_fr->FormValue);
		$this->nombre_motivo_pr->CurrentValue = ConvertToUtf8($this->nombre_motivo_pr->FormValue);
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
		$this->id_motivoatencion->setDbValue($row['id_motivoatencion']);
		$this->nombre_motivo_es->setDbValue($row['nombre_motivo_es']);
		$this->nombre_motivo_en->setDbValue($row['nombre_motivo_en']);
		$this->nombre_motivo_fr->setDbValue($row['nombre_motivo_fr']);
		$this->nombre_motivo_pr->setDbValue($row['nombre_motivo_pr']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_motivoatencion'] = $this->id_motivoatencion->CurrentValue;
		$row['nombre_motivo_es'] = $this->nombre_motivo_es->CurrentValue;
		$row['nombre_motivo_en'] = $this->nombre_motivo_en->CurrentValue;
		$row['nombre_motivo_fr'] = $this->nombre_motivo_fr->CurrentValue;
		$row['nombre_motivo_pr'] = $this->nombre_motivo_pr->CurrentValue;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id_motivoatencion
		// nombre_motivo_es
		// nombre_motivo_en
		// nombre_motivo_fr
		// nombre_motivo_pr

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_motivoatencion
			$this->id_motivoatencion->ViewValue = $this->id_motivoatencion->CurrentValue;
			$this->id_motivoatencion->ViewCustomAttributes = "";

			// nombre_motivo_es
			$this->nombre_motivo_es->ViewValue = $this->nombre_motivo_es->CurrentValue;
			$this->nombre_motivo_es->ViewCustomAttributes = "";

			// nombre_motivo_en
			$this->nombre_motivo_en->ViewValue = $this->nombre_motivo_en->CurrentValue;
			$this->nombre_motivo_en->ViewCustomAttributes = "";

			// nombre_motivo_fr
			$this->nombre_motivo_fr->ViewValue = $this->nombre_motivo_fr->CurrentValue;
			$this->nombre_motivo_fr->ViewCustomAttributes = "";

			// nombre_motivo_pr
			$this->nombre_motivo_pr->ViewValue = $this->nombre_motivo_pr->CurrentValue;
			$this->nombre_motivo_pr->ViewCustomAttributes = "";

			// nombre_motivo_es
			$this->nombre_motivo_es->LinkCustomAttributes = "";
			$this->nombre_motivo_es->HrefValue = "";
			$this->nombre_motivo_es->TooltipValue = "";

			// nombre_motivo_en
			$this->nombre_motivo_en->LinkCustomAttributes = "";
			$this->nombre_motivo_en->HrefValue = "";
			$this->nombre_motivo_en->TooltipValue = "";

			// nombre_motivo_fr
			$this->nombre_motivo_fr->LinkCustomAttributes = "";
			$this->nombre_motivo_fr->HrefValue = "";
			$this->nombre_motivo_fr->TooltipValue = "";

			// nombre_motivo_pr
			$this->nombre_motivo_pr->LinkCustomAttributes = "";
			$this->nombre_motivo_pr->HrefValue = "";
			$this->nombre_motivo_pr->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// nombre_motivo_es
			$this->nombre_motivo_es->EditAttrs["class"] = "form-control";
			$this->nombre_motivo_es->EditCustomAttributes = "";
			if (!$this->nombre_motivo_es->Raw)
				$this->nombre_motivo_es->CurrentValue = HtmlDecode($this->nombre_motivo_es->CurrentValue);
			$this->nombre_motivo_es->EditValue = HtmlEncode($this->nombre_motivo_es->CurrentValue);
			$this->nombre_motivo_es->PlaceHolder = RemoveHtml($this->nombre_motivo_es->caption());

			// nombre_motivo_en
			$this->nombre_motivo_en->EditAttrs["class"] = "form-control";
			$this->nombre_motivo_en->EditCustomAttributes = "";
			if (!$this->nombre_motivo_en->Raw)
				$this->nombre_motivo_en->CurrentValue = HtmlDecode($this->nombre_motivo_en->CurrentValue);
			$this->nombre_motivo_en->EditValue = HtmlEncode($this->nombre_motivo_en->CurrentValue);
			$this->nombre_motivo_en->PlaceHolder = RemoveHtml($this->nombre_motivo_en->caption());

			// nombre_motivo_fr
			$this->nombre_motivo_fr->EditAttrs["class"] = "form-control";
			$this->nombre_motivo_fr->EditCustomAttributes = "";
			if (!$this->nombre_motivo_fr->Raw)
				$this->nombre_motivo_fr->CurrentValue = HtmlDecode($this->nombre_motivo_fr->CurrentValue);
			$this->nombre_motivo_fr->EditValue = HtmlEncode($this->nombre_motivo_fr->CurrentValue);
			$this->nombre_motivo_fr->PlaceHolder = RemoveHtml($this->nombre_motivo_fr->caption());

			// nombre_motivo_pr
			$this->nombre_motivo_pr->EditAttrs["class"] = "form-control";
			$this->nombre_motivo_pr->EditCustomAttributes = "";
			if (!$this->nombre_motivo_pr->Raw)
				$this->nombre_motivo_pr->CurrentValue = HtmlDecode($this->nombre_motivo_pr->CurrentValue);
			$this->nombre_motivo_pr->EditValue = HtmlEncode($this->nombre_motivo_pr->CurrentValue);
			$this->nombre_motivo_pr->PlaceHolder = RemoveHtml($this->nombre_motivo_pr->caption());

			// Add refer script
			// nombre_motivo_es

			$this->nombre_motivo_es->LinkCustomAttributes = "";
			$this->nombre_motivo_es->HrefValue = "";

			// nombre_motivo_en
			$this->nombre_motivo_en->LinkCustomAttributes = "";
			$this->nombre_motivo_en->HrefValue = "";

			// nombre_motivo_fr
			$this->nombre_motivo_fr->LinkCustomAttributes = "";
			$this->nombre_motivo_fr->HrefValue = "";

			// nombre_motivo_pr
			$this->nombre_motivo_pr->LinkCustomAttributes = "";
			$this->nombre_motivo_pr->HrefValue = "";
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
		if ($this->nombre_motivo_es->Required) {
			if (!$this->nombre_motivo_es->IsDetailKey && $this->nombre_motivo_es->FormValue != NULL && $this->nombre_motivo_es->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_motivo_es->caption(), $this->nombre_motivo_es->RequiredErrorMessage));
			}
		}
		if ($this->nombre_motivo_en->Required) {
			if (!$this->nombre_motivo_en->IsDetailKey && $this->nombre_motivo_en->FormValue != NULL && $this->nombre_motivo_en->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_motivo_en->caption(), $this->nombre_motivo_en->RequiredErrorMessage));
			}
		}
		if ($this->nombre_motivo_fr->Required) {
			if (!$this->nombre_motivo_fr->IsDetailKey && $this->nombre_motivo_fr->FormValue != NULL && $this->nombre_motivo_fr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_motivo_fr->caption(), $this->nombre_motivo_fr->RequiredErrorMessage));
			}
		}
		if ($this->nombre_motivo_pr->Required) {
			if (!$this->nombre_motivo_pr->IsDetailKey && $this->nombre_motivo_pr->FormValue != NULL && $this->nombre_motivo_pr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_motivo_pr->caption(), $this->nombre_motivo_pr->RequiredErrorMessage));
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

		// nombre_motivo_es
		$this->nombre_motivo_es->setDbValueDef($rsnew, $this->nombre_motivo_es->CurrentValue, NULL, FALSE);

		// nombre_motivo_en
		$this->nombre_motivo_en->setDbValueDef($rsnew, $this->nombre_motivo_en->CurrentValue, NULL, FALSE);

		// nombre_motivo_fr
		$this->nombre_motivo_fr->setDbValueDef($rsnew, $this->nombre_motivo_fr->CurrentValue, NULL, FALSE);

		// nombre_motivo_pr
		$this->nombre_motivo_pr->setDbValueDef($rsnew, $this->nombre_motivo_pr->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("interh_motivoatencionlist.php"), "", $this->TableVar, TRUE);
		$pageId = "addopt";
		$Breadcrumb->add("addopt", $pageId, $url);
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
} // End class
?>