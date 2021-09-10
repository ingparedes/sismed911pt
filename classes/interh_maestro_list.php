<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class interh_maestro_list extends interh_maestro
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'interh_maestro';

	// Page object name
	public $PageObjName = "interh_maestro_list";

	// Grid form hidden field names
	public $FormName = "finterh_maestrolist";
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

		// Table object (interh_maestro)
		if (!isset($GLOBALS["interh_maestro"]) || get_class($GLOBALS["interh_maestro"]) == PROJECT_NAMESPACE . "interh_maestro") {
			$GLOBALS["interh_maestro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["interh_maestro"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "interh_maestroadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "interh_maestrodelete.php";
		$this->MultiUpdateUrl = "interh_maestroupdate.php";

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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
		$this->FilterOptions->TagClassName = "ew-filter-option finterh_maestrolistsrch";

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
		if ($this->isAddOrEdit())
			$this->fechahorainterh->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->estadointerh->Visible = FALSE;
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
		$this->cod_casointerh->setVisibility();
		$this->fechahorainterh->setVisibility();
		$this->tiempo->setVisibility();
		$this->cod_expendeinteinteh->Visible = FALSE;
		$this->tipo_serviciointerh->Visible = FALSE;
		$this->hospital_origneinterh->setVisibility();
		$this->nombrereportainterh->Visible = FALSE;
		$this->telefonointerh->Visible = FALSE;
		$this->motivo_atencioninteh->setVisibility();
		$this->accioninterh->setVisibility();
		$this->longitudinterh->Visible = FALSE;
		$this->latitudinterh->Visible = FALSE;
		$this->prioridadinterh->setVisibility();
		$this->estadointerh->setVisibility();
		$this->cierreinterh->Visible = FALSE;
		$this->hospital_destinointerh->Visible = FALSE;
		$this->nombre_recibe->Visible = FALSE;
		$this->ambulancia->setVisibility();
		$this->paciente->setVisibility();
		$this->evaluacion->Visible = FALSE;
		$this->sede->Visible = FALSE;
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
		$this->setupLookupOptions($this->tipo_serviciointerh);
		$this->setupLookupOptions($this->hospital_origneinterh);
		$this->setupLookupOptions($this->motivo_atencioninteh);
		$this->setupLookupOptions($this->accioninterh);
		$this->setupLookupOptions($this->prioridadinterh);
		$this->setupLookupOptions($this->estadointerh);
		$this->setupLookupOptions($this->hospital_destinointerh);

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
			$this->cod_casointerh->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->cod_casointerh->OldValue))
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
		$filterList = Concat($filterList, $this->cod_casointerh->AdvancedSearch->toJson(), ","); // Field cod_casointerh
		$filterList = Concat($filterList, $this->tiempo->AdvancedSearch->toJson(), ","); // Field tiempo
		$filterList = Concat($filterList, $this->tipo_serviciointerh->AdvancedSearch->toJson(), ","); // Field tipo_serviciointerh
		$filterList = Concat($filterList, $this->hospital_origneinterh->AdvancedSearch->toJson(), ","); // Field hospital_origneinterh
		$filterList = Concat($filterList, $this->nombrereportainterh->AdvancedSearch->toJson(), ","); // Field nombrereportainterh
		$filterList = Concat($filterList, $this->telefonointerh->AdvancedSearch->toJson(), ","); // Field telefonointerh
		$filterList = Concat($filterList, $this->motivo_atencioninteh->AdvancedSearch->toJson(), ","); // Field motivo_atencioninteh
		$filterList = Concat($filterList, $this->accioninterh->AdvancedSearch->toJson(), ","); // Field accioninterh
		$filterList = Concat($filterList, $this->longitudinterh->AdvancedSearch->toJson(), ","); // Field longitudinterh
		$filterList = Concat($filterList, $this->latitudinterh->AdvancedSearch->toJson(), ","); // Field latitudinterh
		$filterList = Concat($filterList, $this->prioridadinterh->AdvancedSearch->toJson(), ","); // Field prioridadinterh
		$filterList = Concat($filterList, $this->estadointerh->AdvancedSearch->toJson(), ","); // Field estadointerh
		$filterList = Concat($filterList, $this->cierreinterh->AdvancedSearch->toJson(), ","); // Field cierreinterh
		$filterList = Concat($filterList, $this->hospital_destinointerh->AdvancedSearch->toJson(), ","); // Field hospital_destinointerh
		$filterList = Concat($filterList, $this->nombre_recibe->AdvancedSearch->toJson(), ","); // Field nombre_recibe
		$filterList = Concat($filterList, $this->ambulancia->AdvancedSearch->toJson(), ","); // Field ambulancia
		$filterList = Concat($filterList, $this->paciente->AdvancedSearch->toJson(), ","); // Field paciente
		$filterList = Concat($filterList, $this->evaluacion->AdvancedSearch->toJson(), ","); // Field evaluacion
		$filterList = Concat($filterList, $this->sede->AdvancedSearch->toJson(), ","); // Field sede
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
			$UserProfile->setSearchFilters(CurrentUserName(), "finterh_maestrolistsrch", $filters);
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

		// Field cod_casointerh
		$this->cod_casointerh->AdvancedSearch->SearchValue = @$filter["x_cod_casointerh"];
		$this->cod_casointerh->AdvancedSearch->SearchOperator = @$filter["z_cod_casointerh"];
		$this->cod_casointerh->AdvancedSearch->SearchCondition = @$filter["v_cod_casointerh"];
		$this->cod_casointerh->AdvancedSearch->SearchValue2 = @$filter["y_cod_casointerh"];
		$this->cod_casointerh->AdvancedSearch->SearchOperator2 = @$filter["w_cod_casointerh"];
		$this->cod_casointerh->AdvancedSearch->save();

		// Field tiempo
		$this->tiempo->AdvancedSearch->SearchValue = @$filter["x_tiempo"];
		$this->tiempo->AdvancedSearch->SearchOperator = @$filter["z_tiempo"];
		$this->tiempo->AdvancedSearch->SearchCondition = @$filter["v_tiempo"];
		$this->tiempo->AdvancedSearch->SearchValue2 = @$filter["y_tiempo"];
		$this->tiempo->AdvancedSearch->SearchOperator2 = @$filter["w_tiempo"];
		$this->tiempo->AdvancedSearch->save();

		// Field tipo_serviciointerh
		$this->tipo_serviciointerh->AdvancedSearch->SearchValue = @$filter["x_tipo_serviciointerh"];
		$this->tipo_serviciointerh->AdvancedSearch->SearchOperator = @$filter["z_tipo_serviciointerh"];
		$this->tipo_serviciointerh->AdvancedSearch->SearchCondition = @$filter["v_tipo_serviciointerh"];
		$this->tipo_serviciointerh->AdvancedSearch->SearchValue2 = @$filter["y_tipo_serviciointerh"];
		$this->tipo_serviciointerh->AdvancedSearch->SearchOperator2 = @$filter["w_tipo_serviciointerh"];
		$this->tipo_serviciointerh->AdvancedSearch->save();

		// Field hospital_origneinterh
		$this->hospital_origneinterh->AdvancedSearch->SearchValue = @$filter["x_hospital_origneinterh"];
		$this->hospital_origneinterh->AdvancedSearch->SearchOperator = @$filter["z_hospital_origneinterh"];
		$this->hospital_origneinterh->AdvancedSearch->SearchCondition = @$filter["v_hospital_origneinterh"];
		$this->hospital_origneinterh->AdvancedSearch->SearchValue2 = @$filter["y_hospital_origneinterh"];
		$this->hospital_origneinterh->AdvancedSearch->SearchOperator2 = @$filter["w_hospital_origneinterh"];
		$this->hospital_origneinterh->AdvancedSearch->save();

		// Field nombrereportainterh
		$this->nombrereportainterh->AdvancedSearch->SearchValue = @$filter["x_nombrereportainterh"];
		$this->nombrereportainterh->AdvancedSearch->SearchOperator = @$filter["z_nombrereportainterh"];
		$this->nombrereportainterh->AdvancedSearch->SearchCondition = @$filter["v_nombrereportainterh"];
		$this->nombrereportainterh->AdvancedSearch->SearchValue2 = @$filter["y_nombrereportainterh"];
		$this->nombrereportainterh->AdvancedSearch->SearchOperator2 = @$filter["w_nombrereportainterh"];
		$this->nombrereportainterh->AdvancedSearch->save();

		// Field telefonointerh
		$this->telefonointerh->AdvancedSearch->SearchValue = @$filter["x_telefonointerh"];
		$this->telefonointerh->AdvancedSearch->SearchOperator = @$filter["z_telefonointerh"];
		$this->telefonointerh->AdvancedSearch->SearchCondition = @$filter["v_telefonointerh"];
		$this->telefonointerh->AdvancedSearch->SearchValue2 = @$filter["y_telefonointerh"];
		$this->telefonointerh->AdvancedSearch->SearchOperator2 = @$filter["w_telefonointerh"];
		$this->telefonointerh->AdvancedSearch->save();

		// Field motivo_atencioninteh
		$this->motivo_atencioninteh->AdvancedSearch->SearchValue = @$filter["x_motivo_atencioninteh"];
		$this->motivo_atencioninteh->AdvancedSearch->SearchOperator = @$filter["z_motivo_atencioninteh"];
		$this->motivo_atencioninteh->AdvancedSearch->SearchCondition = @$filter["v_motivo_atencioninteh"];
		$this->motivo_atencioninteh->AdvancedSearch->SearchValue2 = @$filter["y_motivo_atencioninteh"];
		$this->motivo_atencioninteh->AdvancedSearch->SearchOperator2 = @$filter["w_motivo_atencioninteh"];
		$this->motivo_atencioninteh->AdvancedSearch->save();

		// Field accioninterh
		$this->accioninterh->AdvancedSearch->SearchValue = @$filter["x_accioninterh"];
		$this->accioninterh->AdvancedSearch->SearchOperator = @$filter["z_accioninterh"];
		$this->accioninterh->AdvancedSearch->SearchCondition = @$filter["v_accioninterh"];
		$this->accioninterh->AdvancedSearch->SearchValue2 = @$filter["y_accioninterh"];
		$this->accioninterh->AdvancedSearch->SearchOperator2 = @$filter["w_accioninterh"];
		$this->accioninterh->AdvancedSearch->save();

		// Field longitudinterh
		$this->longitudinterh->AdvancedSearch->SearchValue = @$filter["x_longitudinterh"];
		$this->longitudinterh->AdvancedSearch->SearchOperator = @$filter["z_longitudinterh"];
		$this->longitudinterh->AdvancedSearch->SearchCondition = @$filter["v_longitudinterh"];
		$this->longitudinterh->AdvancedSearch->SearchValue2 = @$filter["y_longitudinterh"];
		$this->longitudinterh->AdvancedSearch->SearchOperator2 = @$filter["w_longitudinterh"];
		$this->longitudinterh->AdvancedSearch->save();

		// Field latitudinterh
		$this->latitudinterh->AdvancedSearch->SearchValue = @$filter["x_latitudinterh"];
		$this->latitudinterh->AdvancedSearch->SearchOperator = @$filter["z_latitudinterh"];
		$this->latitudinterh->AdvancedSearch->SearchCondition = @$filter["v_latitudinterh"];
		$this->latitudinterh->AdvancedSearch->SearchValue2 = @$filter["y_latitudinterh"];
		$this->latitudinterh->AdvancedSearch->SearchOperator2 = @$filter["w_latitudinterh"];
		$this->latitudinterh->AdvancedSearch->save();

		// Field prioridadinterh
		$this->prioridadinterh->AdvancedSearch->SearchValue = @$filter["x_prioridadinterh"];
		$this->prioridadinterh->AdvancedSearch->SearchOperator = @$filter["z_prioridadinterh"];
		$this->prioridadinterh->AdvancedSearch->SearchCondition = @$filter["v_prioridadinterh"];
		$this->prioridadinterh->AdvancedSearch->SearchValue2 = @$filter["y_prioridadinterh"];
		$this->prioridadinterh->AdvancedSearch->SearchOperator2 = @$filter["w_prioridadinterh"];
		$this->prioridadinterh->AdvancedSearch->save();

		// Field estadointerh
		$this->estadointerh->AdvancedSearch->SearchValue = @$filter["x_estadointerh"];
		$this->estadointerh->AdvancedSearch->SearchOperator = @$filter["z_estadointerh"];
		$this->estadointerh->AdvancedSearch->SearchCondition = @$filter["v_estadointerh"];
		$this->estadointerh->AdvancedSearch->SearchValue2 = @$filter["y_estadointerh"];
		$this->estadointerh->AdvancedSearch->SearchOperator2 = @$filter["w_estadointerh"];
		$this->estadointerh->AdvancedSearch->save();

		// Field cierreinterh
		$this->cierreinterh->AdvancedSearch->SearchValue = @$filter["x_cierreinterh"];
		$this->cierreinterh->AdvancedSearch->SearchOperator = @$filter["z_cierreinterh"];
		$this->cierreinterh->AdvancedSearch->SearchCondition = @$filter["v_cierreinterh"];
		$this->cierreinterh->AdvancedSearch->SearchValue2 = @$filter["y_cierreinterh"];
		$this->cierreinterh->AdvancedSearch->SearchOperator2 = @$filter["w_cierreinterh"];
		$this->cierreinterh->AdvancedSearch->save();

		// Field hospital_destinointerh
		$this->hospital_destinointerh->AdvancedSearch->SearchValue = @$filter["x_hospital_destinointerh"];
		$this->hospital_destinointerh->AdvancedSearch->SearchOperator = @$filter["z_hospital_destinointerh"];
		$this->hospital_destinointerh->AdvancedSearch->SearchCondition = @$filter["v_hospital_destinointerh"];
		$this->hospital_destinointerh->AdvancedSearch->SearchValue2 = @$filter["y_hospital_destinointerh"];
		$this->hospital_destinointerh->AdvancedSearch->SearchOperator2 = @$filter["w_hospital_destinointerh"];
		$this->hospital_destinointerh->AdvancedSearch->save();

		// Field nombre_recibe
		$this->nombre_recibe->AdvancedSearch->SearchValue = @$filter["x_nombre_recibe"];
		$this->nombre_recibe->AdvancedSearch->SearchOperator = @$filter["z_nombre_recibe"];
		$this->nombre_recibe->AdvancedSearch->SearchCondition = @$filter["v_nombre_recibe"];
		$this->nombre_recibe->AdvancedSearch->SearchValue2 = @$filter["y_nombre_recibe"];
		$this->nombre_recibe->AdvancedSearch->SearchOperator2 = @$filter["w_nombre_recibe"];
		$this->nombre_recibe->AdvancedSearch->save();

		// Field ambulancia
		$this->ambulancia->AdvancedSearch->SearchValue = @$filter["x_ambulancia"];
		$this->ambulancia->AdvancedSearch->SearchOperator = @$filter["z_ambulancia"];
		$this->ambulancia->AdvancedSearch->SearchCondition = @$filter["v_ambulancia"];
		$this->ambulancia->AdvancedSearch->SearchValue2 = @$filter["y_ambulancia"];
		$this->ambulancia->AdvancedSearch->SearchOperator2 = @$filter["w_ambulancia"];
		$this->ambulancia->AdvancedSearch->save();

		// Field paciente
		$this->paciente->AdvancedSearch->SearchValue = @$filter["x_paciente"];
		$this->paciente->AdvancedSearch->SearchOperator = @$filter["z_paciente"];
		$this->paciente->AdvancedSearch->SearchCondition = @$filter["v_paciente"];
		$this->paciente->AdvancedSearch->SearchValue2 = @$filter["y_paciente"];
		$this->paciente->AdvancedSearch->SearchOperator2 = @$filter["w_paciente"];
		$this->paciente->AdvancedSearch->save();

		// Field evaluacion
		$this->evaluacion->AdvancedSearch->SearchValue = @$filter["x_evaluacion"];
		$this->evaluacion->AdvancedSearch->SearchOperator = @$filter["z_evaluacion"];
		$this->evaluacion->AdvancedSearch->SearchCondition = @$filter["v_evaluacion"];
		$this->evaluacion->AdvancedSearch->SearchValue2 = @$filter["y_evaluacion"];
		$this->evaluacion->AdvancedSearch->SearchOperator2 = @$filter["w_evaluacion"];
		$this->evaluacion->AdvancedSearch->save();

		// Field sede
		$this->sede->AdvancedSearch->SearchValue = @$filter["x_sede"];
		$this->sede->AdvancedSearch->SearchOperator = @$filter["z_sede"];
		$this->sede->AdvancedSearch->SearchCondition = @$filter["v_sede"];
		$this->sede->AdvancedSearch->SearchValue2 = @$filter["y_sede"];
		$this->sede->AdvancedSearch->SearchOperator2 = @$filter["w_sede"];
		$this->sede->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->cod_casointerh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tipo_serviciointerh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hospital_origneinterh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nombrereportainterh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->motivo_atencioninteh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->accioninterh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ambulancia, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->paciente, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->evaluacion, $arKeywords, $type);
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
			$this->updateSort($this->cod_casointerh); // cod_casointerh
			$this->updateSort($this->fechahorainterh); // fechahorainterh
			$this->updateSort($this->tiempo); // tiempo
			$this->updateSort($this->hospital_origneinterh); // hospital_origneinterh
			$this->updateSort($this->motivo_atencioninteh); // motivo_atencioninteh
			$this->updateSort($this->accioninterh); // accioninterh
			$this->updateSort($this->prioridadinterh); // prioridadinterh
			$this->updateSort($this->estadointerh); // estadointerh
			$this->updateSort($this->ambulancia); // ambulancia
			$this->updateSort($this->paciente); // paciente
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
				$this->cod_casointerh->setSort("");
				$this->fechahorainterh->setSort("");
				$this->tiempo->setSort("");
				$this->hospital_origneinterh->setSort("");
				$this->motivo_atencioninteh->setSort("");
				$this->accioninterh->setSort("");
				$this->prioridadinterh->setSort("");
				$this->estadointerh->setSort("");
				$this->ambulancia->setSort("");
				$this->paciente->setSort("");
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
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-table=\"interh_maestro\" data-caption=\"" . $viewcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->ViewUrl) . "',btn:null});\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-table=\"interh_maestro\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("EditLink") . "</a>";
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
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->cod_casointerh->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-table=\"interh_maestro\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("AddLink") . "</a>";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"finterh_maestrolistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"finterh_maestrolistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.finterh_maestrolist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Convert decimal values if posted back
		if ($this->tiempo->FormValue == $this->tiempo->CurrentValue && is_numeric(ConvertToFloatString($this->tiempo->CurrentValue)))
			$this->tiempo->CurrentValue = ConvertToFloatString($this->tiempo->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// cod_casointerh
		// fechahorainterh
		// tiempo
		// cod_expendeinteinteh

		$this->cod_expendeinteinteh->CellCssStyle = "white-space: nowrap;";

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

		$this->cierreinterh->CellCssStyle = "white-space: nowrap;";

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

			// ambulancia
			$this->ambulancia->ViewValue = $this->ambulancia->CurrentValue;
			$this->ambulancia->CssClass = "font-weight-bold";
			$this->ambulancia->CellCssStyle .= "text-align: center;";
			$this->ambulancia->ViewCustomAttributes = "";

			// paciente
			$this->paciente->ViewValue = $this->paciente->CurrentValue;
			$this->paciente->CellCssStyle .= "text-align: center;";
			$this->paciente->ViewCustomAttributes = "";

			// sede
			$this->sede->ViewValue = $this->sede->CurrentValue;
			$this->sede->ViewValue = FormatNumber($this->sede->ViewValue, 0, -2, -2, -2);
			$this->sede->ViewCustomAttributes = "";

			// cod_casointerh
			$this->cod_casointerh->LinkCustomAttributes = "";
			$this->cod_casointerh->HrefValue = "";
			$this->cod_casointerh->TooltipValue = "";

			// fechahorainterh
			$this->fechahorainterh->LinkCustomAttributes = "";
			$this->fechahorainterh->HrefValue = "";
			$this->fechahorainterh->TooltipValue = "";

			// tiempo
			$this->tiempo->LinkCustomAttributes = "";
			$this->tiempo->HrefValue = "";
			if (!$this->isExport()) {
				$this->tiempo->TooltipValue = $this->tiempo->ViewValue != "" ? $this->tiempo->ViewValue : $this->tiempo->CurrentValue;
				if ($this->tiempo->HrefValue == "")
					$this->tiempo->HrefValue = "javascript:void(0);";
				$this->tiempo->LinkAttrs->appendClass("ew-tooltip-link");
				$this->tiempo->LinkAttrs["data-tooltip-id"] = "tt_interh_maestro_x" . $this->RowCount . "_tiempo";
				$this->tiempo->LinkAttrs["data-tooltip-width"] = $this->tiempo->TooltipWidth;
				$this->tiempo->LinkAttrs["data-placement"] = Config("CSS_FLIP") ? "left" : "right";
			}

			// hospital_origneinterh
			$this->hospital_origneinterh->LinkCustomAttributes = "";
			$this->hospital_origneinterh->HrefValue = "";
			$this->hospital_origneinterh->TooltipValue = "";

			// motivo_atencioninteh
			$this->motivo_atencioninteh->LinkCustomAttributes = "";
			$this->motivo_atencioninteh->HrefValue = "";
			$this->motivo_atencioninteh->TooltipValue = "";

			// accioninterh
			$this->accioninterh->LinkCustomAttributes = "";
			$this->accioninterh->HrefValue = "";
			$this->accioninterh->TooltipValue = "";

			// prioridadinterh
			$this->prioridadinterh->LinkCustomAttributes = "";
			$this->prioridadinterh->HrefValue = "";
			$this->prioridadinterh->TooltipValue = "";

			// estadointerh
			$this->estadointerh->LinkCustomAttributes = "";
			$this->estadointerh->HrefValue = "";
			$this->estadointerh->TooltipValue = "";

			// ambulancia
			$this->ambulancia->LinkCustomAttributes = "";
			$this->ambulancia->HrefValue = "";
			$this->ambulancia->TooltipValue = "";

			// paciente
			$this->paciente->LinkCustomAttributes = "";
			$this->paciente->HrefValue = "";
			$this->paciente->TooltipValue = "";
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"finterh_maestrolistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
		//Language()->setPhrase("AddLink", "<img src='images/icon/010-call.png' width='40' height='45'></br> Nuevo Caso" );  // adjust to your new phrase
	//Language()->setPhraseClass("AddLink", ""); // remove the plus icon
	//	$item = &$this->ExportOptions->add("MyName");
	//	$item->Body = "<a href='http://gps.gnsyscar.com/iniciop.asp' target='_blank' class ='btn btn-default fa fa-map-marker' ></a>";
	 //$this->CustomActions["star"] = new ListAction("star", "Add Star");

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
				if (CurrentLanguageID() == "en")
					$msg = "List of pending cases to carry out the management of the Inter-hospital process.";
				elseif(CurrentLanguageID() =="es")
					$msg = "Lista de los casos pendientes para realizar la gestión del proceso Inter-hospital";
				elseif (CurrentLanguageID() == "pt")
					$msg = "español";
				else 
					$msg = "frances";
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
	$options = &$this->OtherOptions;
	$option = $options["action"];
	$item = &$option->Add("mybutton");
	$item->Body = "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Caso\" data-table=\"Caso\" data-caption=\"<img src='images/icon/010-call.png' width='40' height='45'></br>New \" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'interh_maestroadd.php'});\" data-original-title=\"Caso Nuevo\"><img src='images/icon/010-call.png' width='45' height='45'> <br/>New</a>";
	$options2 = &$this->OtherOptions;
	$option2 = $options2["action"];
	$item2 = &$option2->Add("mybutton2");
	$item2->Body = "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Disponobilidad\" data-table=\"Disponibilidad\" data-caption=\"<img src='images/icon/mapa.png' width='40' height='45'></br>Map \" href=\"http://gps.gnsyscar.com/iniciop.asp\" target=\"_blank\" data-original-title=\"Mapa\"><img src='images/icon/mapa.png' width='45' height='45'> <br/>Map</a>";
	$this->OtherOptions["addedit"]->UseDropDownButton = TRUE; // do not use dropdown button style
	$my_options = &$this->OtherOptions; // define the option using OtherOptions
	$my_option = $my_options["addedit"]; // near from add/edit button of OtherOptions
	$my_item = &$my_option->Add("mynewbutton"); // add the button
	$my_item->Body = "<div class='dropdown-menu'><a class='dropdown-item' href='#'>Action</a>
	</div>"; // define the link and the caption
		if (!empty($_GET["cod_casointerh"]) && !empty($_GET["cod_ambulancia"])){		
			$this->cod_casointerh->EditValue = htmlspecialchars($_GET["cod_casointerh"]);
			$this->cod_ambulancia->EditValue = htmlspecialchars($_GET["cod_ambulancia"]);
		}
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

		$this->ListOptions["edit"]->Body = "<a class=\"ew-row-link ew-view\" title=\"Registro de Datos\" data-table=\"interh_maestro\" data-caption=\"Registro de Datos\" href=\"menu_caso.php?cod_casointerh=".$this->cod_casointerh->CurrentValue."&id_paciente=".$this->cod_casointerh->CurrentValue." \" ><i data-phrase=\"ViewLink\" data-caption=\"Detail\" class=\"fas fa-folder-plus fa-2x\"></i>";
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