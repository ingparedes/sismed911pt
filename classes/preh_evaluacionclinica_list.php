<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_evaluacionclinica_list extends preh_evaluacionclinica
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_evaluacionclinica';

	// Page object name
	public $PageObjName = "preh_evaluacionclinica_list";

	// Grid form hidden field names
	public $FormName = "fpreh_evaluacionclinicalist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "preh_evaluacionclinicaadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "preh_evaluacionclinicadelete.php";
		$this->MultiUpdateUrl = "preh_evaluacionclinicaupdate.php";

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option fpreh_evaluacionclinicalistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$SkipHeaderFooter = $OldSkipHeaderFooter;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $preh_evaluacionclinica;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
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
						if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0)
							$val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id_evaluacionclinica->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->fecha_horaevaluacion->Visible = FALSE;
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

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecords = 20;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "10,20,50,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 1; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canList()) {
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
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$OldSkipHeaderFooter = $SkipHeaderFooter;
		$SkipHeaderFooter = TRUE;
		$this->id_evaluacionclinica->setVisibility();
		$this->cod_casopreh->setVisibility();
		$this->fecha_horaevaluacion->setVisibility();
		$this->cod_paciente->setVisibility();
		$this->cod_diag_cie->setVisibility();
		$this->diagnos_txt->Visible = FALSE;
		$this->triage->setVisibility();
		$this->c_clinico->Visible = FALSE;
		$this->examen_fisico->Visible = FALSE;
		$this->tratamiento->Visible = FALSE;
		$this->antecedentes->Visible = FALSE;
		$this->paraclinicos->Visible = FALSE;
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
		$this->ap_med_paciente->Visible = FALSE;
		$this->ap_diabetes->setVisibility();
		$this->ap_cardiop->setVisibility();
		$this->ap_convul->setVisibility();
		$this->ap_asma->setVisibility();
		$this->ap_acv->setVisibility();
		$this->ap_has->setVisibility();
		$this->ap_alergia->setVisibility();
		$this->ap_otros->Visible = FALSE;
		$this->hideFieldsForAddEdit();

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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->cod_diag_cie);
		$this->setupLookupOptions($this->triage);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 20; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 1) {
			$this->id_evaluacionclinica->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id_evaluacionclinica->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->id_evaluacionclinica->AdvancedSearch->toJson(), ","); // Field id_evaluacionclinica
		$filterList = Concat($filterList, $this->cod_casopreh->AdvancedSearch->toJson(), ","); // Field cod_casopreh
		$filterList = Concat($filterList, $this->fecha_horaevaluacion->AdvancedSearch->toJson(), ","); // Field fecha_horaevaluacion
		$filterList = Concat($filterList, $this->cod_paciente->AdvancedSearch->toJson(), ","); // Field cod_paciente
		$filterList = Concat($filterList, $this->cod_diag_cie->AdvancedSearch->toJson(), ","); // Field cod_diag_cie
		$filterList = Concat($filterList, $this->diagnos_txt->AdvancedSearch->toJson(), ","); // Field diagnos_txt
		$filterList = Concat($filterList, $this->triage->AdvancedSearch->toJson(), ","); // Field triage
		$filterList = Concat($filterList, $this->c_clinico->AdvancedSearch->toJson(), ","); // Field c_clinico
		$filterList = Concat($filterList, $this->examen_fisico->AdvancedSearch->toJson(), ","); // Field examen_fisico
		$filterList = Concat($filterList, $this->tratamiento->AdvancedSearch->toJson(), ","); // Field tratamiento
		$filterList = Concat($filterList, $this->antecedentes->AdvancedSearch->toJson(), ","); // Field antecedentes
		$filterList = Concat($filterList, $this->paraclinicos->AdvancedSearch->toJson(), ","); // Field paraclinicos
		$filterList = Concat($filterList, $this->sv_tx->AdvancedSearch->toJson(), ","); // Field sv_tx
		$filterList = Concat($filterList, $this->sv_fc->AdvancedSearch->toJson(), ","); // Field sv_fc
		$filterList = Concat($filterList, $this->sv_fr->AdvancedSearch->toJson(), ","); // Field sv_fr
		$filterList = Concat($filterList, $this->sv_temp->AdvancedSearch->toJson(), ","); // Field sv_temp
		$filterList = Concat($filterList, $this->sv_gl->AdvancedSearch->toJson(), ","); // Field sv_gl
		$filterList = Concat($filterList, $this->peso->AdvancedSearch->toJson(), ","); // Field peso
		$filterList = Concat($filterList, $this->talla->AdvancedSearch->toJson(), ","); // Field talla
		$filterList = Concat($filterList, $this->sv_fcf->AdvancedSearch->toJson(), ","); // Field sv_fcf
		$filterList = Concat($filterList, $this->sv_satO2->AdvancedSearch->toJson(), ","); // Field sv_satO2
		$filterList = Concat($filterList, $this->sv_apgar->AdvancedSearch->toJson(), ","); // Field sv_apgar
		$filterList = Concat($filterList, $this->sv_gli->AdvancedSearch->toJson(), ","); // Field sv_gli
		$filterList = Concat($filterList, $this->tipo_paciente->AdvancedSearch->toJson(), ","); // Field tipo_paciente
		$filterList = Concat($filterList, $this->usu_sede->AdvancedSearch->toJson(), ","); // Field usu_sede
		$filterList = Concat($filterList, $this->tiempo_enfermedad->AdvancedSearch->toJson(), ","); // Field tiempo_enfermedad
		$filterList = Concat($filterList, $this->tipo_enfermedad->AdvancedSearch->toJson(), ","); // Field tipo_enfermedad
		$filterList = Concat($filterList, $this->ap_med_paciente->AdvancedSearch->toJson(), ","); // Field ap_med_paciente
		$filterList = Concat($filterList, $this->ap_diabetes->AdvancedSearch->toJson(), ","); // Field ap_diabetes
		$filterList = Concat($filterList, $this->ap_cardiop->AdvancedSearch->toJson(), ","); // Field ap_cardiop
		$filterList = Concat($filterList, $this->ap_convul->AdvancedSearch->toJson(), ","); // Field ap_convul
		$filterList = Concat($filterList, $this->ap_asma->AdvancedSearch->toJson(), ","); // Field ap_asma
		$filterList = Concat($filterList, $this->ap_acv->AdvancedSearch->toJson(), ","); // Field ap_acv
		$filterList = Concat($filterList, $this->ap_has->AdvancedSearch->toJson(), ","); // Field ap_has
		$filterList = Concat($filterList, $this->ap_alergia->AdvancedSearch->toJson(), ","); // Field ap_alergia
		$filterList = Concat($filterList, $this->ap_otros->AdvancedSearch->toJson(), ","); // Field ap_otros
		if ($this->BasicSearch->Keyword != "") {
			$wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fpreh_evaluacionclinicalistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field id_evaluacionclinica
		$this->id_evaluacionclinica->AdvancedSearch->SearchValue = @$filter["x_id_evaluacionclinica"];
		$this->id_evaluacionclinica->AdvancedSearch->SearchOperator = @$filter["z_id_evaluacionclinica"];
		$this->id_evaluacionclinica->AdvancedSearch->SearchCondition = @$filter["v_id_evaluacionclinica"];
		$this->id_evaluacionclinica->AdvancedSearch->SearchValue2 = @$filter["y_id_evaluacionclinica"];
		$this->id_evaluacionclinica->AdvancedSearch->SearchOperator2 = @$filter["w_id_evaluacionclinica"];
		$this->id_evaluacionclinica->AdvancedSearch->save();

		// Field cod_casopreh
		$this->cod_casopreh->AdvancedSearch->SearchValue = @$filter["x_cod_casopreh"];
		$this->cod_casopreh->AdvancedSearch->SearchOperator = @$filter["z_cod_casopreh"];
		$this->cod_casopreh->AdvancedSearch->SearchCondition = @$filter["v_cod_casopreh"];
		$this->cod_casopreh->AdvancedSearch->SearchValue2 = @$filter["y_cod_casopreh"];
		$this->cod_casopreh->AdvancedSearch->SearchOperator2 = @$filter["w_cod_casopreh"];
		$this->cod_casopreh->AdvancedSearch->save();

		// Field fecha_horaevaluacion
		$this->fecha_horaevaluacion->AdvancedSearch->SearchValue = @$filter["x_fecha_horaevaluacion"];
		$this->fecha_horaevaluacion->AdvancedSearch->SearchOperator = @$filter["z_fecha_horaevaluacion"];
		$this->fecha_horaevaluacion->AdvancedSearch->SearchCondition = @$filter["v_fecha_horaevaluacion"];
		$this->fecha_horaevaluacion->AdvancedSearch->SearchValue2 = @$filter["y_fecha_horaevaluacion"];
		$this->fecha_horaevaluacion->AdvancedSearch->SearchOperator2 = @$filter["w_fecha_horaevaluacion"];
		$this->fecha_horaevaluacion->AdvancedSearch->save();

		// Field cod_paciente
		$this->cod_paciente->AdvancedSearch->SearchValue = @$filter["x_cod_paciente"];
		$this->cod_paciente->AdvancedSearch->SearchOperator = @$filter["z_cod_paciente"];
		$this->cod_paciente->AdvancedSearch->SearchCondition = @$filter["v_cod_paciente"];
		$this->cod_paciente->AdvancedSearch->SearchValue2 = @$filter["y_cod_paciente"];
		$this->cod_paciente->AdvancedSearch->SearchOperator2 = @$filter["w_cod_paciente"];
		$this->cod_paciente->AdvancedSearch->save();

		// Field cod_diag_cie
		$this->cod_diag_cie->AdvancedSearch->SearchValue = @$filter["x_cod_diag_cie"];
		$this->cod_diag_cie->AdvancedSearch->SearchOperator = @$filter["z_cod_diag_cie"];
		$this->cod_diag_cie->AdvancedSearch->SearchCondition = @$filter["v_cod_diag_cie"];
		$this->cod_diag_cie->AdvancedSearch->SearchValue2 = @$filter["y_cod_diag_cie"];
		$this->cod_diag_cie->AdvancedSearch->SearchOperator2 = @$filter["w_cod_diag_cie"];
		$this->cod_diag_cie->AdvancedSearch->save();

		// Field diagnos_txt
		$this->diagnos_txt->AdvancedSearch->SearchValue = @$filter["x_diagnos_txt"];
		$this->diagnos_txt->AdvancedSearch->SearchOperator = @$filter["z_diagnos_txt"];
		$this->diagnos_txt->AdvancedSearch->SearchCondition = @$filter["v_diagnos_txt"];
		$this->diagnos_txt->AdvancedSearch->SearchValue2 = @$filter["y_diagnos_txt"];
		$this->diagnos_txt->AdvancedSearch->SearchOperator2 = @$filter["w_diagnos_txt"];
		$this->diagnos_txt->AdvancedSearch->save();

		// Field triage
		$this->triage->AdvancedSearch->SearchValue = @$filter["x_triage"];
		$this->triage->AdvancedSearch->SearchOperator = @$filter["z_triage"];
		$this->triage->AdvancedSearch->SearchCondition = @$filter["v_triage"];
		$this->triage->AdvancedSearch->SearchValue2 = @$filter["y_triage"];
		$this->triage->AdvancedSearch->SearchOperator2 = @$filter["w_triage"];
		$this->triage->AdvancedSearch->save();

		// Field c_clinico
		$this->c_clinico->AdvancedSearch->SearchValue = @$filter["x_c_clinico"];
		$this->c_clinico->AdvancedSearch->SearchOperator = @$filter["z_c_clinico"];
		$this->c_clinico->AdvancedSearch->SearchCondition = @$filter["v_c_clinico"];
		$this->c_clinico->AdvancedSearch->SearchValue2 = @$filter["y_c_clinico"];
		$this->c_clinico->AdvancedSearch->SearchOperator2 = @$filter["w_c_clinico"];
		$this->c_clinico->AdvancedSearch->save();

		// Field examen_fisico
		$this->examen_fisico->AdvancedSearch->SearchValue = @$filter["x_examen_fisico"];
		$this->examen_fisico->AdvancedSearch->SearchOperator = @$filter["z_examen_fisico"];
		$this->examen_fisico->AdvancedSearch->SearchCondition = @$filter["v_examen_fisico"];
		$this->examen_fisico->AdvancedSearch->SearchValue2 = @$filter["y_examen_fisico"];
		$this->examen_fisico->AdvancedSearch->SearchOperator2 = @$filter["w_examen_fisico"];
		$this->examen_fisico->AdvancedSearch->save();

		// Field tratamiento
		$this->tratamiento->AdvancedSearch->SearchValue = @$filter["x_tratamiento"];
		$this->tratamiento->AdvancedSearch->SearchOperator = @$filter["z_tratamiento"];
		$this->tratamiento->AdvancedSearch->SearchCondition = @$filter["v_tratamiento"];
		$this->tratamiento->AdvancedSearch->SearchValue2 = @$filter["y_tratamiento"];
		$this->tratamiento->AdvancedSearch->SearchOperator2 = @$filter["w_tratamiento"];
		$this->tratamiento->AdvancedSearch->save();

		// Field antecedentes
		$this->antecedentes->AdvancedSearch->SearchValue = @$filter["x_antecedentes"];
		$this->antecedentes->AdvancedSearch->SearchOperator = @$filter["z_antecedentes"];
		$this->antecedentes->AdvancedSearch->SearchCondition = @$filter["v_antecedentes"];
		$this->antecedentes->AdvancedSearch->SearchValue2 = @$filter["y_antecedentes"];
		$this->antecedentes->AdvancedSearch->SearchOperator2 = @$filter["w_antecedentes"];
		$this->antecedentes->AdvancedSearch->save();

		// Field paraclinicos
		$this->paraclinicos->AdvancedSearch->SearchValue = @$filter["x_paraclinicos"];
		$this->paraclinicos->AdvancedSearch->SearchOperator = @$filter["z_paraclinicos"];
		$this->paraclinicos->AdvancedSearch->SearchCondition = @$filter["v_paraclinicos"];
		$this->paraclinicos->AdvancedSearch->SearchValue2 = @$filter["y_paraclinicos"];
		$this->paraclinicos->AdvancedSearch->SearchOperator2 = @$filter["w_paraclinicos"];
		$this->paraclinicos->AdvancedSearch->save();

		// Field sv_tx
		$this->sv_tx->AdvancedSearch->SearchValue = @$filter["x_sv_tx"];
		$this->sv_tx->AdvancedSearch->SearchOperator = @$filter["z_sv_tx"];
		$this->sv_tx->AdvancedSearch->SearchCondition = @$filter["v_sv_tx"];
		$this->sv_tx->AdvancedSearch->SearchValue2 = @$filter["y_sv_tx"];
		$this->sv_tx->AdvancedSearch->SearchOperator2 = @$filter["w_sv_tx"];
		$this->sv_tx->AdvancedSearch->save();

		// Field sv_fc
		$this->sv_fc->AdvancedSearch->SearchValue = @$filter["x_sv_fc"];
		$this->sv_fc->AdvancedSearch->SearchOperator = @$filter["z_sv_fc"];
		$this->sv_fc->AdvancedSearch->SearchCondition = @$filter["v_sv_fc"];
		$this->sv_fc->AdvancedSearch->SearchValue2 = @$filter["y_sv_fc"];
		$this->sv_fc->AdvancedSearch->SearchOperator2 = @$filter["w_sv_fc"];
		$this->sv_fc->AdvancedSearch->save();

		// Field sv_fr
		$this->sv_fr->AdvancedSearch->SearchValue = @$filter["x_sv_fr"];
		$this->sv_fr->AdvancedSearch->SearchOperator = @$filter["z_sv_fr"];
		$this->sv_fr->AdvancedSearch->SearchCondition = @$filter["v_sv_fr"];
		$this->sv_fr->AdvancedSearch->SearchValue2 = @$filter["y_sv_fr"];
		$this->sv_fr->AdvancedSearch->SearchOperator2 = @$filter["w_sv_fr"];
		$this->sv_fr->AdvancedSearch->save();

		// Field sv_temp
		$this->sv_temp->AdvancedSearch->SearchValue = @$filter["x_sv_temp"];
		$this->sv_temp->AdvancedSearch->SearchOperator = @$filter["z_sv_temp"];
		$this->sv_temp->AdvancedSearch->SearchCondition = @$filter["v_sv_temp"];
		$this->sv_temp->AdvancedSearch->SearchValue2 = @$filter["y_sv_temp"];
		$this->sv_temp->AdvancedSearch->SearchOperator2 = @$filter["w_sv_temp"];
		$this->sv_temp->AdvancedSearch->save();

		// Field sv_gl
		$this->sv_gl->AdvancedSearch->SearchValue = @$filter["x_sv_gl"];
		$this->sv_gl->AdvancedSearch->SearchOperator = @$filter["z_sv_gl"];
		$this->sv_gl->AdvancedSearch->SearchCondition = @$filter["v_sv_gl"];
		$this->sv_gl->AdvancedSearch->SearchValue2 = @$filter["y_sv_gl"];
		$this->sv_gl->AdvancedSearch->SearchOperator2 = @$filter["w_sv_gl"];
		$this->sv_gl->AdvancedSearch->save();

		// Field peso
		$this->peso->AdvancedSearch->SearchValue = @$filter["x_peso"];
		$this->peso->AdvancedSearch->SearchOperator = @$filter["z_peso"];
		$this->peso->AdvancedSearch->SearchCondition = @$filter["v_peso"];
		$this->peso->AdvancedSearch->SearchValue2 = @$filter["y_peso"];
		$this->peso->AdvancedSearch->SearchOperator2 = @$filter["w_peso"];
		$this->peso->AdvancedSearch->save();

		// Field talla
		$this->talla->AdvancedSearch->SearchValue = @$filter["x_talla"];
		$this->talla->AdvancedSearch->SearchOperator = @$filter["z_talla"];
		$this->talla->AdvancedSearch->SearchCondition = @$filter["v_talla"];
		$this->talla->AdvancedSearch->SearchValue2 = @$filter["y_talla"];
		$this->talla->AdvancedSearch->SearchOperator2 = @$filter["w_talla"];
		$this->talla->AdvancedSearch->save();

		// Field sv_fcf
		$this->sv_fcf->AdvancedSearch->SearchValue = @$filter["x_sv_fcf"];
		$this->sv_fcf->AdvancedSearch->SearchOperator = @$filter["z_sv_fcf"];
		$this->sv_fcf->AdvancedSearch->SearchCondition = @$filter["v_sv_fcf"];
		$this->sv_fcf->AdvancedSearch->SearchValue2 = @$filter["y_sv_fcf"];
		$this->sv_fcf->AdvancedSearch->SearchOperator2 = @$filter["w_sv_fcf"];
		$this->sv_fcf->AdvancedSearch->save();

		// Field sv_satO2
		$this->sv_satO2->AdvancedSearch->SearchValue = @$filter["x_sv_satO2"];
		$this->sv_satO2->AdvancedSearch->SearchOperator = @$filter["z_sv_satO2"];
		$this->sv_satO2->AdvancedSearch->SearchCondition = @$filter["v_sv_satO2"];
		$this->sv_satO2->AdvancedSearch->SearchValue2 = @$filter["y_sv_satO2"];
		$this->sv_satO2->AdvancedSearch->SearchOperator2 = @$filter["w_sv_satO2"];
		$this->sv_satO2->AdvancedSearch->save();

		// Field sv_apgar
		$this->sv_apgar->AdvancedSearch->SearchValue = @$filter["x_sv_apgar"];
		$this->sv_apgar->AdvancedSearch->SearchOperator = @$filter["z_sv_apgar"];
		$this->sv_apgar->AdvancedSearch->SearchCondition = @$filter["v_sv_apgar"];
		$this->sv_apgar->AdvancedSearch->SearchValue2 = @$filter["y_sv_apgar"];
		$this->sv_apgar->AdvancedSearch->SearchOperator2 = @$filter["w_sv_apgar"];
		$this->sv_apgar->AdvancedSearch->save();

		// Field sv_gli
		$this->sv_gli->AdvancedSearch->SearchValue = @$filter["x_sv_gli"];
		$this->sv_gli->AdvancedSearch->SearchOperator = @$filter["z_sv_gli"];
		$this->sv_gli->AdvancedSearch->SearchCondition = @$filter["v_sv_gli"];
		$this->sv_gli->AdvancedSearch->SearchValue2 = @$filter["y_sv_gli"];
		$this->sv_gli->AdvancedSearch->SearchOperator2 = @$filter["w_sv_gli"];
		$this->sv_gli->AdvancedSearch->save();

		// Field tipo_paciente
		$this->tipo_paciente->AdvancedSearch->SearchValue = @$filter["x_tipo_paciente"];
		$this->tipo_paciente->AdvancedSearch->SearchOperator = @$filter["z_tipo_paciente"];
		$this->tipo_paciente->AdvancedSearch->SearchCondition = @$filter["v_tipo_paciente"];
		$this->tipo_paciente->AdvancedSearch->SearchValue2 = @$filter["y_tipo_paciente"];
		$this->tipo_paciente->AdvancedSearch->SearchOperator2 = @$filter["w_tipo_paciente"];
		$this->tipo_paciente->AdvancedSearch->save();

		// Field usu_sede
		$this->usu_sede->AdvancedSearch->SearchValue = @$filter["x_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchOperator = @$filter["z_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchCondition = @$filter["v_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchValue2 = @$filter["y_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchOperator2 = @$filter["w_usu_sede"];
		$this->usu_sede->AdvancedSearch->save();

		// Field tiempo_enfermedad
		$this->tiempo_enfermedad->AdvancedSearch->SearchValue = @$filter["x_tiempo_enfermedad"];
		$this->tiempo_enfermedad->AdvancedSearch->SearchOperator = @$filter["z_tiempo_enfermedad"];
		$this->tiempo_enfermedad->AdvancedSearch->SearchCondition = @$filter["v_tiempo_enfermedad"];
		$this->tiempo_enfermedad->AdvancedSearch->SearchValue2 = @$filter["y_tiempo_enfermedad"];
		$this->tiempo_enfermedad->AdvancedSearch->SearchOperator2 = @$filter["w_tiempo_enfermedad"];
		$this->tiempo_enfermedad->AdvancedSearch->save();

		// Field tipo_enfermedad
		$this->tipo_enfermedad->AdvancedSearch->SearchValue = @$filter["x_tipo_enfermedad"];
		$this->tipo_enfermedad->AdvancedSearch->SearchOperator = @$filter["z_tipo_enfermedad"];
		$this->tipo_enfermedad->AdvancedSearch->SearchCondition = @$filter["v_tipo_enfermedad"];
		$this->tipo_enfermedad->AdvancedSearch->SearchValue2 = @$filter["y_tipo_enfermedad"];
		$this->tipo_enfermedad->AdvancedSearch->SearchOperator2 = @$filter["w_tipo_enfermedad"];
		$this->tipo_enfermedad->AdvancedSearch->save();

		// Field ap_med_paciente
		$this->ap_med_paciente->AdvancedSearch->SearchValue = @$filter["x_ap_med_paciente"];
		$this->ap_med_paciente->AdvancedSearch->SearchOperator = @$filter["z_ap_med_paciente"];
		$this->ap_med_paciente->AdvancedSearch->SearchCondition = @$filter["v_ap_med_paciente"];
		$this->ap_med_paciente->AdvancedSearch->SearchValue2 = @$filter["y_ap_med_paciente"];
		$this->ap_med_paciente->AdvancedSearch->SearchOperator2 = @$filter["w_ap_med_paciente"];
		$this->ap_med_paciente->AdvancedSearch->save();

		// Field ap_diabetes
		$this->ap_diabetes->AdvancedSearch->SearchValue = @$filter["x_ap_diabetes"];
		$this->ap_diabetes->AdvancedSearch->SearchOperator = @$filter["z_ap_diabetes"];
		$this->ap_diabetes->AdvancedSearch->SearchCondition = @$filter["v_ap_diabetes"];
		$this->ap_diabetes->AdvancedSearch->SearchValue2 = @$filter["y_ap_diabetes"];
		$this->ap_diabetes->AdvancedSearch->SearchOperator2 = @$filter["w_ap_diabetes"];
		$this->ap_diabetes->AdvancedSearch->save();

		// Field ap_cardiop
		$this->ap_cardiop->AdvancedSearch->SearchValue = @$filter["x_ap_cardiop"];
		$this->ap_cardiop->AdvancedSearch->SearchOperator = @$filter["z_ap_cardiop"];
		$this->ap_cardiop->AdvancedSearch->SearchCondition = @$filter["v_ap_cardiop"];
		$this->ap_cardiop->AdvancedSearch->SearchValue2 = @$filter["y_ap_cardiop"];
		$this->ap_cardiop->AdvancedSearch->SearchOperator2 = @$filter["w_ap_cardiop"];
		$this->ap_cardiop->AdvancedSearch->save();

		// Field ap_convul
		$this->ap_convul->AdvancedSearch->SearchValue = @$filter["x_ap_convul"];
		$this->ap_convul->AdvancedSearch->SearchOperator = @$filter["z_ap_convul"];
		$this->ap_convul->AdvancedSearch->SearchCondition = @$filter["v_ap_convul"];
		$this->ap_convul->AdvancedSearch->SearchValue2 = @$filter["y_ap_convul"];
		$this->ap_convul->AdvancedSearch->SearchOperator2 = @$filter["w_ap_convul"];
		$this->ap_convul->AdvancedSearch->save();

		// Field ap_asma
		$this->ap_asma->AdvancedSearch->SearchValue = @$filter["x_ap_asma"];
		$this->ap_asma->AdvancedSearch->SearchOperator = @$filter["z_ap_asma"];
		$this->ap_asma->AdvancedSearch->SearchCondition = @$filter["v_ap_asma"];
		$this->ap_asma->AdvancedSearch->SearchValue2 = @$filter["y_ap_asma"];
		$this->ap_asma->AdvancedSearch->SearchOperator2 = @$filter["w_ap_asma"];
		$this->ap_asma->AdvancedSearch->save();

		// Field ap_acv
		$this->ap_acv->AdvancedSearch->SearchValue = @$filter["x_ap_acv"];
		$this->ap_acv->AdvancedSearch->SearchOperator = @$filter["z_ap_acv"];
		$this->ap_acv->AdvancedSearch->SearchCondition = @$filter["v_ap_acv"];
		$this->ap_acv->AdvancedSearch->SearchValue2 = @$filter["y_ap_acv"];
		$this->ap_acv->AdvancedSearch->SearchOperator2 = @$filter["w_ap_acv"];
		$this->ap_acv->AdvancedSearch->save();

		// Field ap_has
		$this->ap_has->AdvancedSearch->SearchValue = @$filter["x_ap_has"];
		$this->ap_has->AdvancedSearch->SearchOperator = @$filter["z_ap_has"];
		$this->ap_has->AdvancedSearch->SearchCondition = @$filter["v_ap_has"];
		$this->ap_has->AdvancedSearch->SearchValue2 = @$filter["y_ap_has"];
		$this->ap_has->AdvancedSearch->SearchOperator2 = @$filter["w_ap_has"];
		$this->ap_has->AdvancedSearch->save();

		// Field ap_alergia
		$this->ap_alergia->AdvancedSearch->SearchValue = @$filter["x_ap_alergia"];
		$this->ap_alergia->AdvancedSearch->SearchOperator = @$filter["z_ap_alergia"];
		$this->ap_alergia->AdvancedSearch->SearchCondition = @$filter["v_ap_alergia"];
		$this->ap_alergia->AdvancedSearch->SearchValue2 = @$filter["y_ap_alergia"];
		$this->ap_alergia->AdvancedSearch->SearchOperator2 = @$filter["w_ap_alergia"];
		$this->ap_alergia->AdvancedSearch->save();

		// Field ap_otros
		$this->ap_otros->AdvancedSearch->SearchValue = @$filter["x_ap_otros"];
		$this->ap_otros->AdvancedSearch->SearchOperator = @$filter["z_ap_otros"];
		$this->ap_otros->AdvancedSearch->SearchCondition = @$filter["v_ap_otros"];
		$this->ap_otros->AdvancedSearch->SearchValue2 = @$filter["y_ap_otros"];
		$this->ap_otros->AdvancedSearch->SearchOperator2 = @$filter["w_ap_otros"];
		$this->ap_otros->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->cod_paciente, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->cod_diag_cie, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->diagnos_txt, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->triage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->c_clinico, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->examen_fisico, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tratamiento, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->antecedentes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->paraclinicos, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_tx, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_fc, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_fr, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_temp, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_gl, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->peso, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->talla, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_fcf, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_satO2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_apgar, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sv_gli, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tipo_paciente, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->usu_sede, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tiempo_enfermedad, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_med_paciente, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_diabetes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_cardiop, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_convul, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_asma, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_acv, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_has, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_alergia, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ap_otros, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = []; // Array for SQL parts
		$arCond = []; // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
				$keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = [$keyword];
			}
			foreach ($ar as $keyword) {
				if ($keyword != "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == Config("NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == Config("NOT_NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk != "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] != "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql != "") {
			if ($where != "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword != "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword != "") {
						if ($searchStr != "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, ["", "reset", "resetall"]))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id_evaluacionclinica); // id_evaluacionclinica
			$this->updateSort($this->cod_casopreh); // cod_casopreh
			$this->updateSort($this->fecha_horaevaluacion); // fecha_horaevaluacion
			$this->updateSort($this->cod_paciente); // cod_paciente
			$this->updateSort($this->cod_diag_cie); // cod_diag_cie
			$this->updateSort($this->triage); // triage
			$this->updateSort($this->sv_tx); // sv_tx
			$this->updateSort($this->sv_fc); // sv_fc
			$this->updateSort($this->sv_fr); // sv_fr
			$this->updateSort($this->sv_temp); // sv_temp
			$this->updateSort($this->sv_gl); // sv_gl
			$this->updateSort($this->peso); // peso
			$this->updateSort($this->talla); // talla
			$this->updateSort($this->sv_fcf); // sv_fcf
			$this->updateSort($this->sv_satO2); // sv_satO2
			$this->updateSort($this->sv_apgar); // sv_apgar
			$this->updateSort($this->sv_gli); // sv_gli
			$this->updateSort($this->tipo_paciente); // tipo_paciente
			$this->updateSort($this->usu_sede); // usu_sede
			$this->updateSort($this->tiempo_enfermedad); // tiempo_enfermedad
			$this->updateSort($this->tipo_enfermedad); // tipo_enfermedad
			$this->updateSort($this->ap_diabetes); // ap_diabetes
			$this->updateSort($this->ap_cardiop); // ap_cardiop
			$this->updateSort($this->ap_convul); // ap_convul
			$this->updateSort($this->ap_asma); // ap_asma
			$this->updateSort($this->ap_acv); // ap_acv
			$this->updateSort($this->ap_has); // ap_has
			$this->updateSort($this->ap_alergia); // ap_alergia
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() != "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (StartsString("reset", $this->Command)) {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->setSessionOrderByList($orderBy);
				$this->id_evaluacionclinica->setSort("");
				$this->cod_casopreh->setSort("");
				$this->fecha_horaevaluacion->setSort("");
				$this->cod_paciente->setSort("");
				$this->cod_diag_cie->setSort("");
				$this->triage->setSort("");
				$this->sv_tx->setSort("");
				$this->sv_fc->setSort("");
				$this->sv_fr->setSort("");
				$this->sv_temp->setSort("");
				$this->sv_gl->setSort("");
				$this->peso->setSort("");
				$this->talla->setSort("");
				$this->sv_fcf->setSort("");
				$this->sv_satO2->setSort("");
				$this->sv_apgar->setSort("");
				$this->sv_gli->setSort("");
				$this->tipo_paciente->setSort("");
				$this->usu_sede->setSort("");
				$this->tiempo_enfermedad->setSort("");
				$this->tipo_enfermedad->setSort("");
				$this->ap_diabetes->setSort("");
				$this->ap_cardiop->setSort("");
				$this->ap_convul->setSort("");
				$this->ap_asma->setSort("");
				$this->ap_acv->setSort("");
				$this->ap_has->setSort("");
				$this->ap_alergia->setSort("");
			}

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = FALSE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = FALSE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// "view"
		$opt = $this->ListOptions["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id_evaluacionclinica->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		if (IsMobile())
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-table=\"preh_evaluacionclinica\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpreh_evaluacionclinicalistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpreh_evaluacionclinicalistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpreh_evaluacionclinicalist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{
	}

	// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$row = [];
		$row['id_evaluacionclinica'] = NULL;
		$row['cod_casopreh'] = NULL;
		$row['fecha_horaevaluacion'] = NULL;
		$row['cod_paciente'] = NULL;
		$row['cod_diag_cie'] = NULL;
		$row['diagnos_txt'] = NULL;
		$row['triage'] = NULL;
		$row['c_clinico'] = NULL;
		$row['examen_fisico'] = NULL;
		$row['tratamiento'] = NULL;
		$row['antecedentes'] = NULL;
		$row['paraclinicos'] = NULL;
		$row['sv_tx'] = NULL;
		$row['sv_fc'] = NULL;
		$row['sv_fr'] = NULL;
		$row['sv_temp'] = NULL;
		$row['sv_gl'] = NULL;
		$row['peso'] = NULL;
		$row['talla'] = NULL;
		$row['sv_fcf'] = NULL;
		$row['sv_satO2'] = NULL;
		$row['sv_apgar'] = NULL;
		$row['sv_gli'] = NULL;
		$row['tipo_paciente'] = NULL;
		$row['usu_sede'] = NULL;
		$row['tiempo_enfermedad'] = NULL;
		$row['tipo_enfermedad'] = NULL;
		$row['ap_med_paciente'] = NULL;
		$row['ap_diabetes'] = NULL;
		$row['ap_cardiop'] = NULL;
		$row['ap_convul'] = NULL;
		$row['ap_asma'] = NULL;
		$row['ap_acv'] = NULL;
		$row['ap_has'] = NULL;
		$row['ap_alergia'] = NULL;
		$row['ap_otros'] = NULL;
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

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

			// id_evaluacionclinica
			$this->id_evaluacionclinica->LinkCustomAttributes = "";
			$this->id_evaluacionclinica->HrefValue = "";
			$this->id_evaluacionclinica->TooltipValue = "";

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

			// triage
			$this->triage->LinkCustomAttributes = "";
			$this->triage->HrefValue = "";
			$this->triage->TooltipValue = "";

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
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpreh_evaluacionclinicalistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>