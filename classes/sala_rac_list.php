<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class sala_rac_list extends sala_rac
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'sala_rac';

	// Page object name
	public $PageObjName = "sala_rac_list";

	// Grid form hidden field names
	public $FormName = "fsala_raclist";
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

		// Table object (sala_rac)
		if (!isset($GLOBALS["sala_rac"]) || get_class($GLOBALS["sala_rac"]) == PROJECT_NAMESPACE . "sala_rac") {
			$GLOBALS["sala_rac"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["sala_rac"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "sala_racadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "sala_racdelete.php";
		$this->MultiUpdateUrl = "sala_racupdate.php";

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'sala_rac');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fsala_raclistsrch";

		// List actions
		$this->ListActions = new ListActions();
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
		global $sala_rac;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($sala_rac);
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
			$key .= @$ar['id_registro'];
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
		$this->id_registro->setVisibility();
		$this->fecha_hora->setVisibility();
		$this->id_admision->setVisibility();
		$this->acompanante->setVisibility();
		$this->tel_acompanante->setVisibility();
		$this->tipo_urgencia->setVisibility();
		$this->clasificacion->setVisibility();
		$this->motivo_consulta->Visible = FALSE;
		$this->signos_vitales->Visible = FALSE;
		$this->so2->setVisibility();
		$this->fr->setVisibility();
		$this->_t->setVisibility();
		$this->fc->setVisibility();
		$this->pas->setVisibility();
		$this->pad->setVisibility();
		$this->local_trauma->setVisibility();
		$this->sistema->setVisibility();
		$this->nivel_conciencia->setVisibility();
		$this->dolor->setVisibility();
		$this->signos_sintomas->setVisibility();
		$this->factores_riesgos->setVisibility();
		$this->estado_final->setVisibility();
		$this->tipo_ingreso->setVisibility();
		$this->hora_clasificacion->setVisibility();
		$this->descripcion_signos->Visible = FALSE;
		$this->hospital->setVisibility();
		$this->motivo_trauma->setVisibility();
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
			$this->id_registro->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id_registro->OldValue))
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
		$filterList = Concat($filterList, $this->id_registro->AdvancedSearch->toJson(), ","); // Field id_registro
		$filterList = Concat($filterList, $this->fecha_hora->AdvancedSearch->toJson(), ","); // Field fecha_hora
		$filterList = Concat($filterList, $this->id_admision->AdvancedSearch->toJson(), ","); // Field id_admision
		$filterList = Concat($filterList, $this->acompanante->AdvancedSearch->toJson(), ","); // Field acompañante
		$filterList = Concat($filterList, $this->tel_acompanante->AdvancedSearch->toJson(), ","); // Field tel_acompañante
		$filterList = Concat($filterList, $this->tipo_urgencia->AdvancedSearch->toJson(), ","); // Field tipo_urgencia
		$filterList = Concat($filterList, $this->clasificacion->AdvancedSearch->toJson(), ","); // Field clasificacion
		$filterList = Concat($filterList, $this->motivo_consulta->AdvancedSearch->toJson(), ","); // Field motivo_consulta
		$filterList = Concat($filterList, $this->signos_vitales->AdvancedSearch->toJson(), ","); // Field signos_vitales
		$filterList = Concat($filterList, $this->so2->AdvancedSearch->toJson(), ","); // Field so2
		$filterList = Concat($filterList, $this->fr->AdvancedSearch->toJson(), ","); // Field fr
		$filterList = Concat($filterList, $this->_t->AdvancedSearch->toJson(), ","); // Field t
		$filterList = Concat($filterList, $this->fc->AdvancedSearch->toJson(), ","); // Field fc
		$filterList = Concat($filterList, $this->pas->AdvancedSearch->toJson(), ","); // Field pas
		$filterList = Concat($filterList, $this->pad->AdvancedSearch->toJson(), ","); // Field pad
		$filterList = Concat($filterList, $this->local_trauma->AdvancedSearch->toJson(), ","); // Field local_trauma
		$filterList = Concat($filterList, $this->sistema->AdvancedSearch->toJson(), ","); // Field sistema
		$filterList = Concat($filterList, $this->nivel_conciencia->AdvancedSearch->toJson(), ","); // Field nivel_conciencia
		$filterList = Concat($filterList, $this->dolor->AdvancedSearch->toJson(), ","); // Field dolor
		$filterList = Concat($filterList, $this->signos_sintomas->AdvancedSearch->toJson(), ","); // Field signos_sintomas
		$filterList = Concat($filterList, $this->factores_riesgos->AdvancedSearch->toJson(), ","); // Field factores_riesgos
		$filterList = Concat($filterList, $this->estado_final->AdvancedSearch->toJson(), ","); // Field estado_final
		$filterList = Concat($filterList, $this->tipo_ingreso->AdvancedSearch->toJson(), ","); // Field tipo_ingreso
		$filterList = Concat($filterList, $this->hora_clasificacion->AdvancedSearch->toJson(), ","); // Field hora_clasificacion
		$filterList = Concat($filterList, $this->descripcion_signos->AdvancedSearch->toJson(), ","); // Field descripcion_signos
		$filterList = Concat($filterList, $this->hospital->AdvancedSearch->toJson(), ","); // Field hospital
		$filterList = Concat($filterList, $this->motivo_trauma->AdvancedSearch->toJson(), ","); // Field motivo_trauma
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fsala_raclistsrch", $filters);
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

		// Field id_registro
		$this->id_registro->AdvancedSearch->SearchValue = @$filter["x_id_registro"];
		$this->id_registro->AdvancedSearch->SearchOperator = @$filter["z_id_registro"];
		$this->id_registro->AdvancedSearch->SearchCondition = @$filter["v_id_registro"];
		$this->id_registro->AdvancedSearch->SearchValue2 = @$filter["y_id_registro"];
		$this->id_registro->AdvancedSearch->SearchOperator2 = @$filter["w_id_registro"];
		$this->id_registro->AdvancedSearch->save();

		// Field fecha_hora
		$this->fecha_hora->AdvancedSearch->SearchValue = @$filter["x_fecha_hora"];
		$this->fecha_hora->AdvancedSearch->SearchOperator = @$filter["z_fecha_hora"];
		$this->fecha_hora->AdvancedSearch->SearchCondition = @$filter["v_fecha_hora"];
		$this->fecha_hora->AdvancedSearch->SearchValue2 = @$filter["y_fecha_hora"];
		$this->fecha_hora->AdvancedSearch->SearchOperator2 = @$filter["w_fecha_hora"];
		$this->fecha_hora->AdvancedSearch->save();

		// Field id_admision
		$this->id_admision->AdvancedSearch->SearchValue = @$filter["x_id_admision"];
		$this->id_admision->AdvancedSearch->SearchOperator = @$filter["z_id_admision"];
		$this->id_admision->AdvancedSearch->SearchCondition = @$filter["v_id_admision"];
		$this->id_admision->AdvancedSearch->SearchValue2 = @$filter["y_id_admision"];
		$this->id_admision->AdvancedSearch->SearchOperator2 = @$filter["w_id_admision"];
		$this->id_admision->AdvancedSearch->save();

		// Field acompañante
		$this->acompanante->AdvancedSearch->SearchValue = @$filter["x_acompanante"];
		$this->acompanante->AdvancedSearch->SearchOperator = @$filter["z_acompanante"];
		$this->acompanante->AdvancedSearch->SearchCondition = @$filter["v_acompanante"];
		$this->acompanante->AdvancedSearch->SearchValue2 = @$filter["y_acompanante"];
		$this->acompanante->AdvancedSearch->SearchOperator2 = @$filter["w_acompanante"];
		$this->acompanante->AdvancedSearch->save();

		// Field tel_acompañante
		$this->tel_acompanante->AdvancedSearch->SearchValue = @$filter["x_tel_acompanante"];
		$this->tel_acompanante->AdvancedSearch->SearchOperator = @$filter["z_tel_acompanante"];
		$this->tel_acompanante->AdvancedSearch->SearchCondition = @$filter["v_tel_acompanante"];
		$this->tel_acompanante->AdvancedSearch->SearchValue2 = @$filter["y_tel_acompanante"];
		$this->tel_acompanante->AdvancedSearch->SearchOperator2 = @$filter["w_tel_acompanante"];
		$this->tel_acompanante->AdvancedSearch->save();

		// Field tipo_urgencia
		$this->tipo_urgencia->AdvancedSearch->SearchValue = @$filter["x_tipo_urgencia"];
		$this->tipo_urgencia->AdvancedSearch->SearchOperator = @$filter["z_tipo_urgencia"];
		$this->tipo_urgencia->AdvancedSearch->SearchCondition = @$filter["v_tipo_urgencia"];
		$this->tipo_urgencia->AdvancedSearch->SearchValue2 = @$filter["y_tipo_urgencia"];
		$this->tipo_urgencia->AdvancedSearch->SearchOperator2 = @$filter["w_tipo_urgencia"];
		$this->tipo_urgencia->AdvancedSearch->save();

		// Field clasificacion
		$this->clasificacion->AdvancedSearch->SearchValue = @$filter["x_clasificacion"];
		$this->clasificacion->AdvancedSearch->SearchOperator = @$filter["z_clasificacion"];
		$this->clasificacion->AdvancedSearch->SearchCondition = @$filter["v_clasificacion"];
		$this->clasificacion->AdvancedSearch->SearchValue2 = @$filter["y_clasificacion"];
		$this->clasificacion->AdvancedSearch->SearchOperator2 = @$filter["w_clasificacion"];
		$this->clasificacion->AdvancedSearch->save();

		// Field motivo_consulta
		$this->motivo_consulta->AdvancedSearch->SearchValue = @$filter["x_motivo_consulta"];
		$this->motivo_consulta->AdvancedSearch->SearchOperator = @$filter["z_motivo_consulta"];
		$this->motivo_consulta->AdvancedSearch->SearchCondition = @$filter["v_motivo_consulta"];
		$this->motivo_consulta->AdvancedSearch->SearchValue2 = @$filter["y_motivo_consulta"];
		$this->motivo_consulta->AdvancedSearch->SearchOperator2 = @$filter["w_motivo_consulta"];
		$this->motivo_consulta->AdvancedSearch->save();

		// Field signos_vitales
		$this->signos_vitales->AdvancedSearch->SearchValue = @$filter["x_signos_vitales"];
		$this->signos_vitales->AdvancedSearch->SearchOperator = @$filter["z_signos_vitales"];
		$this->signos_vitales->AdvancedSearch->SearchCondition = @$filter["v_signos_vitales"];
		$this->signos_vitales->AdvancedSearch->SearchValue2 = @$filter["y_signos_vitales"];
		$this->signos_vitales->AdvancedSearch->SearchOperator2 = @$filter["w_signos_vitales"];
		$this->signos_vitales->AdvancedSearch->save();

		// Field so2
		$this->so2->AdvancedSearch->SearchValue = @$filter["x_so2"];
		$this->so2->AdvancedSearch->SearchOperator = @$filter["z_so2"];
		$this->so2->AdvancedSearch->SearchCondition = @$filter["v_so2"];
		$this->so2->AdvancedSearch->SearchValue2 = @$filter["y_so2"];
		$this->so2->AdvancedSearch->SearchOperator2 = @$filter["w_so2"];
		$this->so2->AdvancedSearch->save();

		// Field fr
		$this->fr->AdvancedSearch->SearchValue = @$filter["x_fr"];
		$this->fr->AdvancedSearch->SearchOperator = @$filter["z_fr"];
		$this->fr->AdvancedSearch->SearchCondition = @$filter["v_fr"];
		$this->fr->AdvancedSearch->SearchValue2 = @$filter["y_fr"];
		$this->fr->AdvancedSearch->SearchOperator2 = @$filter["w_fr"];
		$this->fr->AdvancedSearch->save();

		// Field t
		$this->_t->AdvancedSearch->SearchValue = @$filter["x__t"];
		$this->_t->AdvancedSearch->SearchOperator = @$filter["z__t"];
		$this->_t->AdvancedSearch->SearchCondition = @$filter["v__t"];
		$this->_t->AdvancedSearch->SearchValue2 = @$filter["y__t"];
		$this->_t->AdvancedSearch->SearchOperator2 = @$filter["w__t"];
		$this->_t->AdvancedSearch->save();

		// Field fc
		$this->fc->AdvancedSearch->SearchValue = @$filter["x_fc"];
		$this->fc->AdvancedSearch->SearchOperator = @$filter["z_fc"];
		$this->fc->AdvancedSearch->SearchCondition = @$filter["v_fc"];
		$this->fc->AdvancedSearch->SearchValue2 = @$filter["y_fc"];
		$this->fc->AdvancedSearch->SearchOperator2 = @$filter["w_fc"];
		$this->fc->AdvancedSearch->save();

		// Field pas
		$this->pas->AdvancedSearch->SearchValue = @$filter["x_pas"];
		$this->pas->AdvancedSearch->SearchOperator = @$filter["z_pas"];
		$this->pas->AdvancedSearch->SearchCondition = @$filter["v_pas"];
		$this->pas->AdvancedSearch->SearchValue2 = @$filter["y_pas"];
		$this->pas->AdvancedSearch->SearchOperator2 = @$filter["w_pas"];
		$this->pas->AdvancedSearch->save();

		// Field pad
		$this->pad->AdvancedSearch->SearchValue = @$filter["x_pad"];
		$this->pad->AdvancedSearch->SearchOperator = @$filter["z_pad"];
		$this->pad->AdvancedSearch->SearchCondition = @$filter["v_pad"];
		$this->pad->AdvancedSearch->SearchValue2 = @$filter["y_pad"];
		$this->pad->AdvancedSearch->SearchOperator2 = @$filter["w_pad"];
		$this->pad->AdvancedSearch->save();

		// Field local_trauma
		$this->local_trauma->AdvancedSearch->SearchValue = @$filter["x_local_trauma"];
		$this->local_trauma->AdvancedSearch->SearchOperator = @$filter["z_local_trauma"];
		$this->local_trauma->AdvancedSearch->SearchCondition = @$filter["v_local_trauma"];
		$this->local_trauma->AdvancedSearch->SearchValue2 = @$filter["y_local_trauma"];
		$this->local_trauma->AdvancedSearch->SearchOperator2 = @$filter["w_local_trauma"];
		$this->local_trauma->AdvancedSearch->save();

		// Field sistema
		$this->sistema->AdvancedSearch->SearchValue = @$filter["x_sistema"];
		$this->sistema->AdvancedSearch->SearchOperator = @$filter["z_sistema"];
		$this->sistema->AdvancedSearch->SearchCondition = @$filter["v_sistema"];
		$this->sistema->AdvancedSearch->SearchValue2 = @$filter["y_sistema"];
		$this->sistema->AdvancedSearch->SearchOperator2 = @$filter["w_sistema"];
		$this->sistema->AdvancedSearch->save();

		// Field nivel_conciencia
		$this->nivel_conciencia->AdvancedSearch->SearchValue = @$filter["x_nivel_conciencia"];
		$this->nivel_conciencia->AdvancedSearch->SearchOperator = @$filter["z_nivel_conciencia"];
		$this->nivel_conciencia->AdvancedSearch->SearchCondition = @$filter["v_nivel_conciencia"];
		$this->nivel_conciencia->AdvancedSearch->SearchValue2 = @$filter["y_nivel_conciencia"];
		$this->nivel_conciencia->AdvancedSearch->SearchOperator2 = @$filter["w_nivel_conciencia"];
		$this->nivel_conciencia->AdvancedSearch->save();

		// Field dolor
		$this->dolor->AdvancedSearch->SearchValue = @$filter["x_dolor"];
		$this->dolor->AdvancedSearch->SearchOperator = @$filter["z_dolor"];
		$this->dolor->AdvancedSearch->SearchCondition = @$filter["v_dolor"];
		$this->dolor->AdvancedSearch->SearchValue2 = @$filter["y_dolor"];
		$this->dolor->AdvancedSearch->SearchOperator2 = @$filter["w_dolor"];
		$this->dolor->AdvancedSearch->save();

		// Field signos_sintomas
		$this->signos_sintomas->AdvancedSearch->SearchValue = @$filter["x_signos_sintomas"];
		$this->signos_sintomas->AdvancedSearch->SearchOperator = @$filter["z_signos_sintomas"];
		$this->signos_sintomas->AdvancedSearch->SearchCondition = @$filter["v_signos_sintomas"];
		$this->signos_sintomas->AdvancedSearch->SearchValue2 = @$filter["y_signos_sintomas"];
		$this->signos_sintomas->AdvancedSearch->SearchOperator2 = @$filter["w_signos_sintomas"];
		$this->signos_sintomas->AdvancedSearch->save();

		// Field factores_riesgos
		$this->factores_riesgos->AdvancedSearch->SearchValue = @$filter["x_factores_riesgos"];
		$this->factores_riesgos->AdvancedSearch->SearchOperator = @$filter["z_factores_riesgos"];
		$this->factores_riesgos->AdvancedSearch->SearchCondition = @$filter["v_factores_riesgos"];
		$this->factores_riesgos->AdvancedSearch->SearchValue2 = @$filter["y_factores_riesgos"];
		$this->factores_riesgos->AdvancedSearch->SearchOperator2 = @$filter["w_factores_riesgos"];
		$this->factores_riesgos->AdvancedSearch->save();

		// Field estado_final
		$this->estado_final->AdvancedSearch->SearchValue = @$filter["x_estado_final"];
		$this->estado_final->AdvancedSearch->SearchOperator = @$filter["z_estado_final"];
		$this->estado_final->AdvancedSearch->SearchCondition = @$filter["v_estado_final"];
		$this->estado_final->AdvancedSearch->SearchValue2 = @$filter["y_estado_final"];
		$this->estado_final->AdvancedSearch->SearchOperator2 = @$filter["w_estado_final"];
		$this->estado_final->AdvancedSearch->save();

		// Field tipo_ingreso
		$this->tipo_ingreso->AdvancedSearch->SearchValue = @$filter["x_tipo_ingreso"];
		$this->tipo_ingreso->AdvancedSearch->SearchOperator = @$filter["z_tipo_ingreso"];
		$this->tipo_ingreso->AdvancedSearch->SearchCondition = @$filter["v_tipo_ingreso"];
		$this->tipo_ingreso->AdvancedSearch->SearchValue2 = @$filter["y_tipo_ingreso"];
		$this->tipo_ingreso->AdvancedSearch->SearchOperator2 = @$filter["w_tipo_ingreso"];
		$this->tipo_ingreso->AdvancedSearch->save();

		// Field hora_clasificacion
		$this->hora_clasificacion->AdvancedSearch->SearchValue = @$filter["x_hora_clasificacion"];
		$this->hora_clasificacion->AdvancedSearch->SearchOperator = @$filter["z_hora_clasificacion"];
		$this->hora_clasificacion->AdvancedSearch->SearchCondition = @$filter["v_hora_clasificacion"];
		$this->hora_clasificacion->AdvancedSearch->SearchValue2 = @$filter["y_hora_clasificacion"];
		$this->hora_clasificacion->AdvancedSearch->SearchOperator2 = @$filter["w_hora_clasificacion"];
		$this->hora_clasificacion->AdvancedSearch->save();

		// Field descripcion_signos
		$this->descripcion_signos->AdvancedSearch->SearchValue = @$filter["x_descripcion_signos"];
		$this->descripcion_signos->AdvancedSearch->SearchOperator = @$filter["z_descripcion_signos"];
		$this->descripcion_signos->AdvancedSearch->SearchCondition = @$filter["v_descripcion_signos"];
		$this->descripcion_signos->AdvancedSearch->SearchValue2 = @$filter["y_descripcion_signos"];
		$this->descripcion_signos->AdvancedSearch->SearchOperator2 = @$filter["w_descripcion_signos"];
		$this->descripcion_signos->AdvancedSearch->save();

		// Field hospital
		$this->hospital->AdvancedSearch->SearchValue = @$filter["x_hospital"];
		$this->hospital->AdvancedSearch->SearchOperator = @$filter["z_hospital"];
		$this->hospital->AdvancedSearch->SearchCondition = @$filter["v_hospital"];
		$this->hospital->AdvancedSearch->SearchValue2 = @$filter["y_hospital"];
		$this->hospital->AdvancedSearch->SearchOperator2 = @$filter["w_hospital"];
		$this->hospital->AdvancedSearch->save();

		// Field motivo_trauma
		$this->motivo_trauma->AdvancedSearch->SearchValue = @$filter["x_motivo_trauma"];
		$this->motivo_trauma->AdvancedSearch->SearchOperator = @$filter["z_motivo_trauma"];
		$this->motivo_trauma->AdvancedSearch->SearchCondition = @$filter["v_motivo_trauma"];
		$this->motivo_trauma->AdvancedSearch->SearchValue2 = @$filter["y_motivo_trauma"];
		$this->motivo_trauma->AdvancedSearch->SearchOperator2 = @$filter["w_motivo_trauma"];
		$this->motivo_trauma->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->id_admision, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->acompanante, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tel_acompanante, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tipo_urgencia, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->clasificacion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->motivo_consulta, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->signos_vitales, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->so2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->fr, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_t, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->fc, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->pas, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->pad, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->local_trauma, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sistema, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nivel_conciencia, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->dolor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->signos_sintomas, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->factores_riesgos, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->estado_final, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tipo_ingreso, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->descripcion_signos, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hospital, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->motivo_trauma, $arKeywords, $type);
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
			$this->updateSort($this->id_registro); // id_registro
			$this->updateSort($this->fecha_hora); // fecha_hora
			$this->updateSort($this->id_admision); // id_admision
			$this->updateSort($this->acompanante); // acompañante
			$this->updateSort($this->tel_acompanante); // tel_acompañante
			$this->updateSort($this->tipo_urgencia); // tipo_urgencia
			$this->updateSort($this->clasificacion); // clasificacion
			$this->updateSort($this->so2); // so2
			$this->updateSort($this->fr); // fr
			$this->updateSort($this->_t); // t
			$this->updateSort($this->fc); // fc
			$this->updateSort($this->pas); // pas
			$this->updateSort($this->pad); // pad
			$this->updateSort($this->local_trauma); // local_trauma
			$this->updateSort($this->sistema); // sistema
			$this->updateSort($this->nivel_conciencia); // nivel_conciencia
			$this->updateSort($this->dolor); // dolor
			$this->updateSort($this->signos_sintomas); // signos_sintomas
			$this->updateSort($this->factores_riesgos); // factores_riesgos
			$this->updateSort($this->estado_final); // estado_final
			$this->updateSort($this->tipo_ingreso); // tipo_ingreso
			$this->updateSort($this->hora_clasificacion); // hora_clasificacion
			$this->updateSort($this->hospital); // hospital
			$this->updateSort($this->motivo_trauma); // motivo_trauma
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
				$this->id_registro->setSort("");
				$this->fecha_hora->setSort("");
				$this->id_admision->setSort("");
				$this->acompanante->setSort("");
				$this->tel_acompanante->setSort("");
				$this->tipo_urgencia->setSort("");
				$this->clasificacion->setSort("");
				$this->so2->setSort("");
				$this->fr->setSort("");
				$this->_t->setSort("");
				$this->fc->setSort("");
				$this->pas->setSort("");
				$this->pad->setSort("");
				$this->local_trauma->setSort("");
				$this->sistema->setSort("");
				$this->nivel_conciencia->setSort("");
				$this->dolor->setSort("");
				$this->signos_sintomas->setSort("");
				$this->factores_riesgos->setSort("");
				$this->estado_final->setSort("");
				$this->tipo_ingreso->setSort("");
				$this->hora_clasificacion->setSort("");
				$this->hospital->setSort("");
				$this->motivo_trauma->setSort("");
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

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
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

		// "copy"
		$opt = $this->ListOptions["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
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
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id_registro->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fsala_raclistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fsala_raclistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fsala_raclist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
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
		$this->id_registro->setDbValue($row['id_registro']);
		$this->fecha_hora->setDbValue($row['fecha_hora']);
		$this->id_admision->setDbValue($row['id_admision']);
		$this->acompanante->setDbValue($row['acompañante']);
		$this->tel_acompanante->setDbValue($row['tel_acompañante']);
		$this->tipo_urgencia->setDbValue($row['tipo_urgencia']);
		$this->clasificacion->setDbValue($row['clasificacion']);
		$this->motivo_consulta->setDbValue($row['motivo_consulta']);
		$this->signos_vitales->setDbValue($row['signos_vitales']);
		$this->so2->setDbValue($row['so2']);
		$this->fr->setDbValue($row['fr']);
		$this->_t->setDbValue($row['t']);
		$this->fc->setDbValue($row['fc']);
		$this->pas->setDbValue($row['pas']);
		$this->pad->setDbValue($row['pad']);
		$this->local_trauma->setDbValue($row['local_trauma']);
		$this->sistema->setDbValue($row['sistema']);
		$this->nivel_conciencia->setDbValue($row['nivel_conciencia']);
		$this->dolor->setDbValue($row['dolor']);
		$this->signos_sintomas->setDbValue($row['signos_sintomas']);
		$this->factores_riesgos->setDbValue($row['factores_riesgos']);
		$this->estado_final->setDbValue($row['estado_final']);
		$this->tipo_ingreso->setDbValue($row['tipo_ingreso']);
		$this->hora_clasificacion->setDbValue($row['hora_clasificacion']);
		$this->descripcion_signos->setDbValue($row['descripcion_signos']);
		$this->hospital->setDbValue($row['hospital']);
		$this->motivo_trauma->setDbValue($row['motivo_trauma']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id_registro'] = NULL;
		$row['fecha_hora'] = NULL;
		$row['id_admision'] = NULL;
		$row['acompañante'] = NULL;
		$row['tel_acompañante'] = NULL;
		$row['tipo_urgencia'] = NULL;
		$row['clasificacion'] = NULL;
		$row['motivo_consulta'] = NULL;
		$row['signos_vitales'] = NULL;
		$row['so2'] = NULL;
		$row['fr'] = NULL;
		$row['t'] = NULL;
		$row['fc'] = NULL;
		$row['pas'] = NULL;
		$row['pad'] = NULL;
		$row['local_trauma'] = NULL;
		$row['sistema'] = NULL;
		$row['nivel_conciencia'] = NULL;
		$row['dolor'] = NULL;
		$row['signos_sintomas'] = NULL;
		$row['factores_riesgos'] = NULL;
		$row['estado_final'] = NULL;
		$row['tipo_ingreso'] = NULL;
		$row['hora_clasificacion'] = NULL;
		$row['descripcion_signos'] = NULL;
		$row['hospital'] = NULL;
		$row['motivo_trauma'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_registro")) != "")
			$this->id_registro->OldValue = $this->getKey("id_registro"); // id_registro
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
		// id_registro
		// fecha_hora
		// id_admision
		// acompañante
		// tel_acompañante
		// tipo_urgencia
		// clasificacion
		// motivo_consulta
		// signos_vitales
		// so2
		// fr
		// t
		// fc
		// pas
		// pad
		// local_trauma
		// sistema
		// nivel_conciencia
		// dolor
		// signos_sintomas
		// factores_riesgos
		// estado_final
		// tipo_ingreso
		// hora_clasificacion
		// descripcion_signos
		// hospital
		// motivo_trauma

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_registro
			$this->id_registro->ViewValue = $this->id_registro->CurrentValue;
			$this->id_registro->ViewValue = FormatNumber($this->id_registro->ViewValue, 0, -2, -2, -2);
			$this->id_registro->ViewCustomAttributes = "";

			// fecha_hora
			$this->fecha_hora->ViewValue = $this->fecha_hora->CurrentValue;
			$this->fecha_hora->ViewValue = FormatDateTime($this->fecha_hora->ViewValue, 0);
			$this->fecha_hora->ViewCustomAttributes = "";

			// id_admision
			$this->id_admision->ViewValue = $this->id_admision->CurrentValue;
			$this->id_admision->ViewCustomAttributes = "";

			// acompañante
			$this->acompanante->ViewValue = $this->acompanante->CurrentValue;
			$this->acompanante->ViewCustomAttributes = "";

			// tel_acompañante
			$this->tel_acompanante->ViewValue = $this->tel_acompanante->CurrentValue;
			$this->tel_acompanante->ViewCustomAttributes = "";

			// tipo_urgencia
			$this->tipo_urgencia->ViewValue = $this->tipo_urgencia->CurrentValue;
			$this->tipo_urgencia->ViewCustomAttributes = "";

			// clasificacion
			$this->clasificacion->ViewValue = $this->clasificacion->CurrentValue;
			$this->clasificacion->ViewCustomAttributes = "";

			// so2
			$this->so2->ViewValue = $this->so2->CurrentValue;
			$this->so2->ViewCustomAttributes = "";

			// fr
			$this->fr->ViewValue = $this->fr->CurrentValue;
			$this->fr->ViewCustomAttributes = "";

			// t
			$this->_t->ViewValue = $this->_t->CurrentValue;
			$this->_t->ViewCustomAttributes = "";

			// fc
			$this->fc->ViewValue = $this->fc->CurrentValue;
			$this->fc->ViewCustomAttributes = "";

			// pas
			$this->pas->ViewValue = $this->pas->CurrentValue;
			$this->pas->ViewCustomAttributes = "";

			// pad
			$this->pad->ViewValue = $this->pad->CurrentValue;
			$this->pad->ViewCustomAttributes = "";

			// local_trauma
			$this->local_trauma->ViewValue = $this->local_trauma->CurrentValue;
			$this->local_trauma->ViewCustomAttributes = "";

			// sistema
			$this->sistema->ViewValue = $this->sistema->CurrentValue;
			$this->sistema->ViewCustomAttributes = "";

			// nivel_conciencia
			$this->nivel_conciencia->ViewValue = $this->nivel_conciencia->CurrentValue;
			$this->nivel_conciencia->ViewCustomAttributes = "";

			// dolor
			$this->dolor->ViewValue = $this->dolor->CurrentValue;
			$this->dolor->ViewCustomAttributes = "";

			// signos_sintomas
			$this->signos_sintomas->ViewValue = $this->signos_sintomas->CurrentValue;
			$this->signos_sintomas->ViewCustomAttributes = "";

			// factores_riesgos
			$this->factores_riesgos->ViewValue = $this->factores_riesgos->CurrentValue;
			$this->factores_riesgos->ViewCustomAttributes = "";

			// estado_final
			$this->estado_final->ViewValue = $this->estado_final->CurrentValue;
			$this->estado_final->ViewCustomAttributes = "";

			// tipo_ingreso
			$this->tipo_ingreso->ViewValue = $this->tipo_ingreso->CurrentValue;
			$this->tipo_ingreso->ViewCustomAttributes = "";

			// hora_clasificacion
			$this->hora_clasificacion->ViewValue = $this->hora_clasificacion->CurrentValue;
			$this->hora_clasificacion->ViewValue = FormatDateTime($this->hora_clasificacion->ViewValue, 0);
			$this->hora_clasificacion->ViewCustomAttributes = "";

			// hospital
			$this->hospital->ViewValue = $this->hospital->CurrentValue;
			$this->hospital->ViewCustomAttributes = "";

			// motivo_trauma
			$this->motivo_trauma->ViewValue = $this->motivo_trauma->CurrentValue;
			$this->motivo_trauma->ViewCustomAttributes = "";

			// id_registro
			$this->id_registro->LinkCustomAttributes = "";
			$this->id_registro->HrefValue = "";
			$this->id_registro->TooltipValue = "";

			// fecha_hora
			$this->fecha_hora->LinkCustomAttributes = "";
			$this->fecha_hora->HrefValue = "";
			$this->fecha_hora->TooltipValue = "";

			// id_admision
			$this->id_admision->LinkCustomAttributes = "";
			$this->id_admision->HrefValue = "";
			$this->id_admision->TooltipValue = "";

			// acompañante
			$this->acompanante->LinkCustomAttributes = "";
			$this->acompanante->HrefValue = "";
			$this->acompanante->TooltipValue = "";

			// tel_acompañante
			$this->tel_acompanante->LinkCustomAttributes = "";
			$this->tel_acompanante->HrefValue = "";
			$this->tel_acompanante->TooltipValue = "";

			// tipo_urgencia
			$this->tipo_urgencia->LinkCustomAttributes = "";
			$this->tipo_urgencia->HrefValue = "";
			$this->tipo_urgencia->TooltipValue = "";

			// clasificacion
			$this->clasificacion->LinkCustomAttributes = "";
			$this->clasificacion->HrefValue = "";
			$this->clasificacion->TooltipValue = "";

			// so2
			$this->so2->LinkCustomAttributes = "";
			$this->so2->HrefValue = "";
			$this->so2->TooltipValue = "";

			// fr
			$this->fr->LinkCustomAttributes = "";
			$this->fr->HrefValue = "";
			$this->fr->TooltipValue = "";

			// t
			$this->_t->LinkCustomAttributes = "";
			$this->_t->HrefValue = "";
			$this->_t->TooltipValue = "";

			// fc
			$this->fc->LinkCustomAttributes = "";
			$this->fc->HrefValue = "";
			$this->fc->TooltipValue = "";

			// pas
			$this->pas->LinkCustomAttributes = "";
			$this->pas->HrefValue = "";
			$this->pas->TooltipValue = "";

			// pad
			$this->pad->LinkCustomAttributes = "";
			$this->pad->HrefValue = "";
			$this->pad->TooltipValue = "";

			// local_trauma
			$this->local_trauma->LinkCustomAttributes = "";
			$this->local_trauma->HrefValue = "";
			$this->local_trauma->TooltipValue = "";

			// sistema
			$this->sistema->LinkCustomAttributes = "";
			$this->sistema->HrefValue = "";
			$this->sistema->TooltipValue = "";

			// nivel_conciencia
			$this->nivel_conciencia->LinkCustomAttributes = "";
			$this->nivel_conciencia->HrefValue = "";
			$this->nivel_conciencia->TooltipValue = "";

			// dolor
			$this->dolor->LinkCustomAttributes = "";
			$this->dolor->HrefValue = "";
			$this->dolor->TooltipValue = "";

			// signos_sintomas
			$this->signos_sintomas->LinkCustomAttributes = "";
			$this->signos_sintomas->HrefValue = "";
			$this->signos_sintomas->TooltipValue = "";

			// factores_riesgos
			$this->factores_riesgos->LinkCustomAttributes = "";
			$this->factores_riesgos->HrefValue = "";
			$this->factores_riesgos->TooltipValue = "";

			// estado_final
			$this->estado_final->LinkCustomAttributes = "";
			$this->estado_final->HrefValue = "";
			$this->estado_final->TooltipValue = "";

			// tipo_ingreso
			$this->tipo_ingreso->LinkCustomAttributes = "";
			$this->tipo_ingreso->HrefValue = "";
			$this->tipo_ingreso->TooltipValue = "";

			// hora_clasificacion
			$this->hora_clasificacion->LinkCustomAttributes = "";
			$this->hora_clasificacion->HrefValue = "";
			$this->hora_clasificacion->TooltipValue = "";

			// hospital
			$this->hospital->LinkCustomAttributes = "";
			$this->hospital->HrefValue = "";
			$this->hospital->TooltipValue = "";

			// motivo_trauma
			$this->motivo_trauma->LinkCustomAttributes = "";
			$this->motivo_trauma->HrefValue = "";
			$this->motivo_trauma->TooltipValue = "";
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fsala_raclistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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