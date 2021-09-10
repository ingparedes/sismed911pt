<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class pacientegeneral_list extends pacientegeneral
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'pacientegeneral';

	// Page object name
	public $PageObjName = "pacientegeneral_list";

	// Grid form hidden field names
	public $FormName = "fpacientegenerallist";
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

		// Table object (pacientegeneral)
		if (!isset($GLOBALS["pacientegeneral"]) || get_class($GLOBALS["pacientegeneral"]) == PROJECT_NAMESPACE . "pacientegeneral") {
			$GLOBALS["pacientegeneral"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pacientegeneral"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "pacientegeneraladd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "pacientegeneraldelete.php";
		$this->MultiUpdateUrl = "pacientegeneralupdate.php";

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pacientegeneral');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpacientegenerallistsrch";

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
		global $pacientegeneral;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pacientegeneral);
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

		// Create form object
		$CurrentForm = new HttpForm();
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
		$this->cod_casointerh->setVisibility();
		$this->id_paciente->setVisibility();
		$this->expendiente->setVisibility();
		$this->tipo_doc->setVisibility();
		$this->num_doc->setVisibility();
		$this->nombre1->setVisibility();
		$this->nombre2->setVisibility();
		$this->apellido1->setVisibility();
		$this->apellido2->setVisibility();
		$this->genero->setVisibility();
		$this->edad->setVisibility();
		$this->fecha_nacido->setVisibility();
		$this->cod_edad->setVisibility();
		$this->telefono->setVisibility();
		$this->celular->setVisibility();
		$this->direccion->setVisibility();
		$this->_email->Visible = FALSE;
		$this->aseguradro->setVisibility();
		$this->observacion->Visible = FALSE;
		$this->nss->setVisibility();
		$this->usu_sede->Visible = FALSE;
		$this->prehospitalario->setVisibility();
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
		$this->setupLookupOptions($this->tipo_doc);
		$this->setupLookupOptions($this->genero);
		$this->setupLookupOptions($this->cod_edad);
		$this->setupLookupOptions($this->aseguradro);

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

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to inline add mode
				if ($this->isAdd() || $this->isCopy())
					$this->inlineAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Insert Inline
					if ($this->isInsert() && @$_SESSION[SESSION_INLINE_MODE] == "add")
						$this->inlineInsert();
				}
			}

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Inline Add mode
	protected function inlineAddMode()
	{
		global $Security, $Language;
		if (!$Security->canAdd())
			return FALSE; // Add not allowed
		$this->CurrentAction = "add";
		$_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
		return TRUE;
	}

	// Perform update to Inline Add/Copy record
	protected function inlineInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$this->loadOldRecord(); // Load old record
		$CurrentForm->Index = 0;
		$this->loadFormValues(); // Get form values

		// Validate form
		if (!$this->validateForm()) {
			$this->setFailureMessage($FormError); // Set validation error message
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
			return;
		}
		$this->SendEmail = TRUE; // Send email on add success
		if ($this->addRow($this->OldRecordset)) { // Add record
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
			$this->clearInlineMode(); // Clear inline add mode
		} else { // Add failed
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
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
		$filterList = Concat($filterList, $this->id_paciente->AdvancedSearch->toJson(), ","); // Field id_paciente
		$filterList = Concat($filterList, $this->expendiente->AdvancedSearch->toJson(), ","); // Field expendiente
		$filterList = Concat($filterList, $this->tipo_doc->AdvancedSearch->toJson(), ","); // Field tipo_doc
		$filterList = Concat($filterList, $this->num_doc->AdvancedSearch->toJson(), ","); // Field num_doc
		$filterList = Concat($filterList, $this->nombre1->AdvancedSearch->toJson(), ","); // Field nombre1
		$filterList = Concat($filterList, $this->nombre2->AdvancedSearch->toJson(), ","); // Field nombre2
		$filterList = Concat($filterList, $this->apellido1->AdvancedSearch->toJson(), ","); // Field apellido1
		$filterList = Concat($filterList, $this->apellido2->AdvancedSearch->toJson(), ","); // Field apellido2
		$filterList = Concat($filterList, $this->genero->AdvancedSearch->toJson(), ","); // Field genero
		$filterList = Concat($filterList, $this->edad->AdvancedSearch->toJson(), ","); // Field edad
		$filterList = Concat($filterList, $this->fecha_nacido->AdvancedSearch->toJson(), ","); // Field fecha_nacido
		$filterList = Concat($filterList, $this->cod_edad->AdvancedSearch->toJson(), ","); // Field cod_edad
		$filterList = Concat($filterList, $this->telefono->AdvancedSearch->toJson(), ","); // Field telefono
		$filterList = Concat($filterList, $this->celular->AdvancedSearch->toJson(), ","); // Field celular
		$filterList = Concat($filterList, $this->direccion->AdvancedSearch->toJson(), ","); // Field direccion
		$filterList = Concat($filterList, $this->_email->AdvancedSearch->toJson(), ","); // Field email
		$filterList = Concat($filterList, $this->aseguradro->AdvancedSearch->toJson(), ","); // Field aseguradro
		$filterList = Concat($filterList, $this->observacion->AdvancedSearch->toJson(), ","); // Field observacion
		$filterList = Concat($filterList, $this->nss->AdvancedSearch->toJson(), ","); // Field nss
		$filterList = Concat($filterList, $this->usu_sede->AdvancedSearch->toJson(), ","); // Field usu_sede
		$filterList = Concat($filterList, $this->prehospitalario->AdvancedSearch->toJson(), ","); // Field prehospitalario
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpacientegenerallistsrch", $filters);
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

		// Field id_paciente
		$this->id_paciente->AdvancedSearch->SearchValue = @$filter["x_id_paciente"];
		$this->id_paciente->AdvancedSearch->SearchOperator = @$filter["z_id_paciente"];
		$this->id_paciente->AdvancedSearch->SearchCondition = @$filter["v_id_paciente"];
		$this->id_paciente->AdvancedSearch->SearchValue2 = @$filter["y_id_paciente"];
		$this->id_paciente->AdvancedSearch->SearchOperator2 = @$filter["w_id_paciente"];
		$this->id_paciente->AdvancedSearch->save();

		// Field expendiente
		$this->expendiente->AdvancedSearch->SearchValue = @$filter["x_expendiente"];
		$this->expendiente->AdvancedSearch->SearchOperator = @$filter["z_expendiente"];
		$this->expendiente->AdvancedSearch->SearchCondition = @$filter["v_expendiente"];
		$this->expendiente->AdvancedSearch->SearchValue2 = @$filter["y_expendiente"];
		$this->expendiente->AdvancedSearch->SearchOperator2 = @$filter["w_expendiente"];
		$this->expendiente->AdvancedSearch->save();

		// Field tipo_doc
		$this->tipo_doc->AdvancedSearch->SearchValue = @$filter["x_tipo_doc"];
		$this->tipo_doc->AdvancedSearch->SearchOperator = @$filter["z_tipo_doc"];
		$this->tipo_doc->AdvancedSearch->SearchCondition = @$filter["v_tipo_doc"];
		$this->tipo_doc->AdvancedSearch->SearchValue2 = @$filter["y_tipo_doc"];
		$this->tipo_doc->AdvancedSearch->SearchOperator2 = @$filter["w_tipo_doc"];
		$this->tipo_doc->AdvancedSearch->save();

		// Field num_doc
		$this->num_doc->AdvancedSearch->SearchValue = @$filter["x_num_doc"];
		$this->num_doc->AdvancedSearch->SearchOperator = @$filter["z_num_doc"];
		$this->num_doc->AdvancedSearch->SearchCondition = @$filter["v_num_doc"];
		$this->num_doc->AdvancedSearch->SearchValue2 = @$filter["y_num_doc"];
		$this->num_doc->AdvancedSearch->SearchOperator2 = @$filter["w_num_doc"];
		$this->num_doc->AdvancedSearch->save();

		// Field nombre1
		$this->nombre1->AdvancedSearch->SearchValue = @$filter["x_nombre1"];
		$this->nombre1->AdvancedSearch->SearchOperator = @$filter["z_nombre1"];
		$this->nombre1->AdvancedSearch->SearchCondition = @$filter["v_nombre1"];
		$this->nombre1->AdvancedSearch->SearchValue2 = @$filter["y_nombre1"];
		$this->nombre1->AdvancedSearch->SearchOperator2 = @$filter["w_nombre1"];
		$this->nombre1->AdvancedSearch->save();

		// Field nombre2
		$this->nombre2->AdvancedSearch->SearchValue = @$filter["x_nombre2"];
		$this->nombre2->AdvancedSearch->SearchOperator = @$filter["z_nombre2"];
		$this->nombre2->AdvancedSearch->SearchCondition = @$filter["v_nombre2"];
		$this->nombre2->AdvancedSearch->SearchValue2 = @$filter["y_nombre2"];
		$this->nombre2->AdvancedSearch->SearchOperator2 = @$filter["w_nombre2"];
		$this->nombre2->AdvancedSearch->save();

		// Field apellido1
		$this->apellido1->AdvancedSearch->SearchValue = @$filter["x_apellido1"];
		$this->apellido1->AdvancedSearch->SearchOperator = @$filter["z_apellido1"];
		$this->apellido1->AdvancedSearch->SearchCondition = @$filter["v_apellido1"];
		$this->apellido1->AdvancedSearch->SearchValue2 = @$filter["y_apellido1"];
		$this->apellido1->AdvancedSearch->SearchOperator2 = @$filter["w_apellido1"];
		$this->apellido1->AdvancedSearch->save();

		// Field apellido2
		$this->apellido2->AdvancedSearch->SearchValue = @$filter["x_apellido2"];
		$this->apellido2->AdvancedSearch->SearchOperator = @$filter["z_apellido2"];
		$this->apellido2->AdvancedSearch->SearchCondition = @$filter["v_apellido2"];
		$this->apellido2->AdvancedSearch->SearchValue2 = @$filter["y_apellido2"];
		$this->apellido2->AdvancedSearch->SearchOperator2 = @$filter["w_apellido2"];
		$this->apellido2->AdvancedSearch->save();

		// Field genero
		$this->genero->AdvancedSearch->SearchValue = @$filter["x_genero"];
		$this->genero->AdvancedSearch->SearchOperator = @$filter["z_genero"];
		$this->genero->AdvancedSearch->SearchCondition = @$filter["v_genero"];
		$this->genero->AdvancedSearch->SearchValue2 = @$filter["y_genero"];
		$this->genero->AdvancedSearch->SearchOperator2 = @$filter["w_genero"];
		$this->genero->AdvancedSearch->save();

		// Field edad
		$this->edad->AdvancedSearch->SearchValue = @$filter["x_edad"];
		$this->edad->AdvancedSearch->SearchOperator = @$filter["z_edad"];
		$this->edad->AdvancedSearch->SearchCondition = @$filter["v_edad"];
		$this->edad->AdvancedSearch->SearchValue2 = @$filter["y_edad"];
		$this->edad->AdvancedSearch->SearchOperator2 = @$filter["w_edad"];
		$this->edad->AdvancedSearch->save();

		// Field fecha_nacido
		$this->fecha_nacido->AdvancedSearch->SearchValue = @$filter["x_fecha_nacido"];
		$this->fecha_nacido->AdvancedSearch->SearchOperator = @$filter["z_fecha_nacido"];
		$this->fecha_nacido->AdvancedSearch->SearchCondition = @$filter["v_fecha_nacido"];
		$this->fecha_nacido->AdvancedSearch->SearchValue2 = @$filter["y_fecha_nacido"];
		$this->fecha_nacido->AdvancedSearch->SearchOperator2 = @$filter["w_fecha_nacido"];
		$this->fecha_nacido->AdvancedSearch->save();

		// Field cod_edad
		$this->cod_edad->AdvancedSearch->SearchValue = @$filter["x_cod_edad"];
		$this->cod_edad->AdvancedSearch->SearchOperator = @$filter["z_cod_edad"];
		$this->cod_edad->AdvancedSearch->SearchCondition = @$filter["v_cod_edad"];
		$this->cod_edad->AdvancedSearch->SearchValue2 = @$filter["y_cod_edad"];
		$this->cod_edad->AdvancedSearch->SearchOperator2 = @$filter["w_cod_edad"];
		$this->cod_edad->AdvancedSearch->save();

		// Field telefono
		$this->telefono->AdvancedSearch->SearchValue = @$filter["x_telefono"];
		$this->telefono->AdvancedSearch->SearchOperator = @$filter["z_telefono"];
		$this->telefono->AdvancedSearch->SearchCondition = @$filter["v_telefono"];
		$this->telefono->AdvancedSearch->SearchValue2 = @$filter["y_telefono"];
		$this->telefono->AdvancedSearch->SearchOperator2 = @$filter["w_telefono"];
		$this->telefono->AdvancedSearch->save();

		// Field celular
		$this->celular->AdvancedSearch->SearchValue = @$filter["x_celular"];
		$this->celular->AdvancedSearch->SearchOperator = @$filter["z_celular"];
		$this->celular->AdvancedSearch->SearchCondition = @$filter["v_celular"];
		$this->celular->AdvancedSearch->SearchValue2 = @$filter["y_celular"];
		$this->celular->AdvancedSearch->SearchOperator2 = @$filter["w_celular"];
		$this->celular->AdvancedSearch->save();

		// Field direccion
		$this->direccion->AdvancedSearch->SearchValue = @$filter["x_direccion"];
		$this->direccion->AdvancedSearch->SearchOperator = @$filter["z_direccion"];
		$this->direccion->AdvancedSearch->SearchCondition = @$filter["v_direccion"];
		$this->direccion->AdvancedSearch->SearchValue2 = @$filter["y_direccion"];
		$this->direccion->AdvancedSearch->SearchOperator2 = @$filter["w_direccion"];
		$this->direccion->AdvancedSearch->save();

		// Field email
		$this->_email->AdvancedSearch->SearchValue = @$filter["x__email"];
		$this->_email->AdvancedSearch->SearchOperator = @$filter["z__email"];
		$this->_email->AdvancedSearch->SearchCondition = @$filter["v__email"];
		$this->_email->AdvancedSearch->SearchValue2 = @$filter["y__email"];
		$this->_email->AdvancedSearch->SearchOperator2 = @$filter["w__email"];
		$this->_email->AdvancedSearch->save();

		// Field aseguradro
		$this->aseguradro->AdvancedSearch->SearchValue = @$filter["x_aseguradro"];
		$this->aseguradro->AdvancedSearch->SearchOperator = @$filter["z_aseguradro"];
		$this->aseguradro->AdvancedSearch->SearchCondition = @$filter["v_aseguradro"];
		$this->aseguradro->AdvancedSearch->SearchValue2 = @$filter["y_aseguradro"];
		$this->aseguradro->AdvancedSearch->SearchOperator2 = @$filter["w_aseguradro"];
		$this->aseguradro->AdvancedSearch->save();

		// Field observacion
		$this->observacion->AdvancedSearch->SearchValue = @$filter["x_observacion"];
		$this->observacion->AdvancedSearch->SearchOperator = @$filter["z_observacion"];
		$this->observacion->AdvancedSearch->SearchCondition = @$filter["v_observacion"];
		$this->observacion->AdvancedSearch->SearchValue2 = @$filter["y_observacion"];
		$this->observacion->AdvancedSearch->SearchOperator2 = @$filter["w_observacion"];
		$this->observacion->AdvancedSearch->save();

		// Field nss
		$this->nss->AdvancedSearch->SearchValue = @$filter["x_nss"];
		$this->nss->AdvancedSearch->SearchOperator = @$filter["z_nss"];
		$this->nss->AdvancedSearch->SearchCondition = @$filter["v_nss"];
		$this->nss->AdvancedSearch->SearchValue2 = @$filter["y_nss"];
		$this->nss->AdvancedSearch->SearchOperator2 = @$filter["w_nss"];
		$this->nss->AdvancedSearch->save();

		// Field usu_sede
		$this->usu_sede->AdvancedSearch->SearchValue = @$filter["x_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchOperator = @$filter["z_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchCondition = @$filter["v_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchValue2 = @$filter["y_usu_sede"];
		$this->usu_sede->AdvancedSearch->SearchOperator2 = @$filter["w_usu_sede"];
		$this->usu_sede->AdvancedSearch->save();

		// Field prehospitalario
		$this->prehospitalario->AdvancedSearch->SearchValue = @$filter["x_prehospitalario"];
		$this->prehospitalario->AdvancedSearch->SearchOperator = @$filter["z_prehospitalario"];
		$this->prehospitalario->AdvancedSearch->SearchCondition = @$filter["v_prehospitalario"];
		$this->prehospitalario->AdvancedSearch->SearchValue2 = @$filter["y_prehospitalario"];
		$this->prehospitalario->AdvancedSearch->SearchOperator2 = @$filter["w_prehospitalario"];
		$this->prehospitalario->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->cod_casointerh, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->expendiente, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->tipo_doc, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->num_doc, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nombre1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nombre2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->apellido1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->apellido2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->genero, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->edad, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->fecha_nacido, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->telefono, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->celular, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->direccion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->aseguradro, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->observacion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nss, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->usu_sede, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->prehospitalario, $arKeywords, $type);
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
			$this->updateSort($this->id_paciente); // id_paciente
			$this->updateSort($this->expendiente); // expendiente
			$this->updateSort($this->tipo_doc); // tipo_doc
			$this->updateSort($this->num_doc); // num_doc
			$this->updateSort($this->nombre1); // nombre1
			$this->updateSort($this->nombre2); // nombre2
			$this->updateSort($this->apellido1); // apellido1
			$this->updateSort($this->apellido2); // apellido2
			$this->updateSort($this->genero); // genero
			$this->updateSort($this->edad); // edad
			$this->updateSort($this->fecha_nacido); // fecha_nacido
			$this->updateSort($this->cod_edad); // cod_edad
			$this->updateSort($this->telefono); // telefono
			$this->updateSort($this->celular); // celular
			$this->updateSort($this->direccion); // direccion
			$this->updateSort($this->aseguradro); // aseguradro
			$this->updateSort($this->nss); // nss
			$this->updateSort($this->prehospitalario); // prehospitalario
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
				$this->cod_casointerh->setSort("");
				$this->id_paciente->setSort("");
				$this->expendiente->setSort("");
				$this->tipo_doc->setSort("");
				$this->num_doc->setSort("");
				$this->nombre1->setSort("");
				$this->nombre2->setSort("");
				$this->apellido1->setSort("");
				$this->apellido2->setSort("");
				$this->genero->setSort("");
				$this->edad->setSort("");
				$this->fecha_nacido->setSort("");
				$this->cod_edad->setSort("");
				$this->telefono->setSort("");
				$this->celular->setSort("");
				$this->direccion->setSort("");
				$this->aseguradro->setSort("");
				$this->nss->setSort("");
				$this->prehospitalario->setSort("");
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
		$item->Visible = $Security->canAdd() && $this->isAdd();
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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);

				// Reload hidden key for delete
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . HtmlEncode($rowkey) . "\">";
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "copy"
		$opt = $this->ListOptions["copy"];
		if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
			$this->ListOptions->CustomItem = "copy"; // Show copy column only
			$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
			$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
				"<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
				"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
				"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
			return;
		}

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
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-table=\"pacientegeneral\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("EditLink") . "</a>";
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
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();

		// Inline Add
		$item = &$option->add("inlineadd");
		$item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode($this->InlineAddUrl) . "\">" .$Language->phrase("InlineAddLink") . "</a>";
		$item->Visible = $this->InlineAddUrl != "" && $Security->canAdd();
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpacientegenerallistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpacientegenerallistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpacientegenerallist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->cod_casointerh->CurrentValue = NULL;
		$this->cod_casointerh->OldValue = $this->cod_casointerh->CurrentValue;
		$this->id_paciente->CurrentValue = NULL;
		$this->id_paciente->OldValue = $this->id_paciente->CurrentValue;
		$this->expendiente->CurrentValue = NULL;
		$this->expendiente->OldValue = $this->expendiente->CurrentValue;
		$this->tipo_doc->CurrentValue = NULL;
		$this->tipo_doc->OldValue = $this->tipo_doc->CurrentValue;
		$this->num_doc->CurrentValue = NULL;
		$this->num_doc->OldValue = $this->num_doc->CurrentValue;
		$this->nombre1->CurrentValue = NULL;
		$this->nombre1->OldValue = $this->nombre1->CurrentValue;
		$this->nombre2->CurrentValue = NULL;
		$this->nombre2->OldValue = $this->nombre2->CurrentValue;
		$this->apellido1->CurrentValue = NULL;
		$this->apellido1->OldValue = $this->apellido1->CurrentValue;
		$this->apellido2->CurrentValue = NULL;
		$this->apellido2->OldValue = $this->apellido2->CurrentValue;
		$this->genero->CurrentValue = NULL;
		$this->genero->OldValue = $this->genero->CurrentValue;
		$this->edad->CurrentValue = NULL;
		$this->edad->OldValue = $this->edad->CurrentValue;
		$this->fecha_nacido->CurrentValue = NULL;
		$this->fecha_nacido->OldValue = $this->fecha_nacido->CurrentValue;
		$this->cod_edad->CurrentValue = NULL;
		$this->cod_edad->OldValue = $this->cod_edad->CurrentValue;
		$this->telefono->CurrentValue = NULL;
		$this->telefono->OldValue = $this->telefono->CurrentValue;
		$this->celular->CurrentValue = NULL;
		$this->celular->OldValue = $this->celular->CurrentValue;
		$this->direccion->CurrentValue = NULL;
		$this->direccion->OldValue = $this->direccion->CurrentValue;
		$this->_email->CurrentValue = NULL;
		$this->_email->OldValue = $this->_email->CurrentValue;
		$this->aseguradro->CurrentValue = NULL;
		$this->aseguradro->OldValue = $this->aseguradro->CurrentValue;
		$this->observacion->CurrentValue = NULL;
		$this->observacion->OldValue = $this->observacion->CurrentValue;
		$this->nss->CurrentValue = NULL;
		$this->nss->OldValue = $this->nss->CurrentValue;
		$this->usu_sede->CurrentValue = NULL;
		$this->usu_sede->OldValue = $this->usu_sede->CurrentValue;
		$this->prehospitalario->CurrentValue = "0";
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'cod_casointerh' first before field var 'x_cod_casointerh'
		$val = $CurrentForm->hasValue("cod_casointerh") ? $CurrentForm->getValue("cod_casointerh") : $CurrentForm->getValue("x_cod_casointerh");
		if (!$this->cod_casointerh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_casointerh->Visible = FALSE; // Disable update for API request
			else
				$this->cod_casointerh->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_cod_casointerh"))
			$this->cod_casointerh->setOldValue($CurrentForm->getValue("o_cod_casointerh"));

		// Check field name 'id_paciente' first before field var 'x_id_paciente'
		$val = $CurrentForm->hasValue("id_paciente") ? $CurrentForm->getValue("id_paciente") : $CurrentForm->getValue("x_id_paciente");
		if (!$this->id_paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->id_paciente->Visible = FALSE; // Disable update for API request
			else
				$this->id_paciente->setFormValue($val);
		}

		// Check field name 'expendiente' first before field var 'x_expendiente'
		$val = $CurrentForm->hasValue("expendiente") ? $CurrentForm->getValue("expendiente") : $CurrentForm->getValue("x_expendiente");
		if (!$this->expendiente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->expendiente->Visible = FALSE; // Disable update for API request
			else
				$this->expendiente->setFormValue($val);
		}

		// Check field name 'tipo_doc' first before field var 'x_tipo_doc'
		$val = $CurrentForm->hasValue("tipo_doc") ? $CurrentForm->getValue("tipo_doc") : $CurrentForm->getValue("x_tipo_doc");
		if (!$this->tipo_doc->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_doc->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_doc->setFormValue($val);
		}

		// Check field name 'num_doc' first before field var 'x_num_doc'
		$val = $CurrentForm->hasValue("num_doc") ? $CurrentForm->getValue("num_doc") : $CurrentForm->getValue("x_num_doc");
		if (!$this->num_doc->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->num_doc->Visible = FALSE; // Disable update for API request
			else
				$this->num_doc->setFormValue($val);
		}

		// Check field name 'nombre1' first before field var 'x_nombre1'
		$val = $CurrentForm->hasValue("nombre1") ? $CurrentForm->getValue("nombre1") : $CurrentForm->getValue("x_nombre1");
		if (!$this->nombre1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre1->Visible = FALSE; // Disable update for API request
			else
				$this->nombre1->setFormValue($val);
		}

		// Check field name 'nombre2' first before field var 'x_nombre2'
		$val = $CurrentForm->hasValue("nombre2") ? $CurrentForm->getValue("nombre2") : $CurrentForm->getValue("x_nombre2");
		if (!$this->nombre2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre2->Visible = FALSE; // Disable update for API request
			else
				$this->nombre2->setFormValue($val);
		}

		// Check field name 'apellido1' first before field var 'x_apellido1'
		$val = $CurrentForm->hasValue("apellido1") ? $CurrentForm->getValue("apellido1") : $CurrentForm->getValue("x_apellido1");
		if (!$this->apellido1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->apellido1->Visible = FALSE; // Disable update for API request
			else
				$this->apellido1->setFormValue($val);
		}

		// Check field name 'apellido2' first before field var 'x_apellido2'
		$val = $CurrentForm->hasValue("apellido2") ? $CurrentForm->getValue("apellido2") : $CurrentForm->getValue("x_apellido2");
		if (!$this->apellido2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->apellido2->Visible = FALSE; // Disable update for API request
			else
				$this->apellido2->setFormValue($val);
		}

		// Check field name 'genero' first before field var 'x_genero'
		$val = $CurrentForm->hasValue("genero") ? $CurrentForm->getValue("genero") : $CurrentForm->getValue("x_genero");
		if (!$this->genero->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->genero->Visible = FALSE; // Disable update for API request
			else
				$this->genero->setFormValue($val);
		}

		// Check field name 'edad' first before field var 'x_edad'
		$val = $CurrentForm->hasValue("edad") ? $CurrentForm->getValue("edad") : $CurrentForm->getValue("x_edad");
		if (!$this->edad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->edad->Visible = FALSE; // Disable update for API request
			else
				$this->edad->setFormValue($val);
		}

		// Check field name 'fecha_nacido' first before field var 'x_fecha_nacido'
		$val = $CurrentForm->hasValue("fecha_nacido") ? $CurrentForm->getValue("fecha_nacido") : $CurrentForm->getValue("x_fecha_nacido");
		if (!$this->fecha_nacido->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_nacido->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_nacido->setFormValue($val);
		}

		// Check field name 'cod_edad' first before field var 'x_cod_edad'
		$val = $CurrentForm->hasValue("cod_edad") ? $CurrentForm->getValue("cod_edad") : $CurrentForm->getValue("x_cod_edad");
		if (!$this->cod_edad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_edad->Visible = FALSE; // Disable update for API request
			else
				$this->cod_edad->setFormValue($val);
		}

		// Check field name 'telefono' first before field var 'x_telefono'
		$val = $CurrentForm->hasValue("telefono") ? $CurrentForm->getValue("telefono") : $CurrentForm->getValue("x_telefono");
		if (!$this->telefono->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono->Visible = FALSE; // Disable update for API request
			else
				$this->telefono->setFormValue($val);
		}

		// Check field name 'celular' first before field var 'x_celular'
		$val = $CurrentForm->hasValue("celular") ? $CurrentForm->getValue("celular") : $CurrentForm->getValue("x_celular");
		if (!$this->celular->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->celular->Visible = FALSE; // Disable update for API request
			else
				$this->celular->setFormValue($val);
		}

		// Check field name 'direccion' first before field var 'x_direccion'
		$val = $CurrentForm->hasValue("direccion") ? $CurrentForm->getValue("direccion") : $CurrentForm->getValue("x_direccion");
		if (!$this->direccion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->direccion->Visible = FALSE; // Disable update for API request
			else
				$this->direccion->setFormValue($val);
		}

		// Check field name 'aseguradro' first before field var 'x_aseguradro'
		$val = $CurrentForm->hasValue("aseguradro") ? $CurrentForm->getValue("aseguradro") : $CurrentForm->getValue("x_aseguradro");
		if (!$this->aseguradro->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->aseguradro->Visible = FALSE; // Disable update for API request
			else
				$this->aseguradro->setFormValue($val);
		}

		// Check field name 'nss' first before field var 'x_nss'
		$val = $CurrentForm->hasValue("nss") ? $CurrentForm->getValue("nss") : $CurrentForm->getValue("x_nss");
		if (!$this->nss->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nss->Visible = FALSE; // Disable update for API request
			else
				$this->nss->setFormValue($val);
		}

		// Check field name 'prehospitalario' first before field var 'x_prehospitalario'
		$val = $CurrentForm->hasValue("prehospitalario") ? $CurrentForm->getValue("prehospitalario") : $CurrentForm->getValue("x_prehospitalario");
		if (!$this->prehospitalario->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->prehospitalario->Visible = FALSE; // Disable update for API request
			else
				$this->prehospitalario->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casointerh->CurrentValue = $this->cod_casointerh->FormValue;
		$this->id_paciente->CurrentValue = $this->id_paciente->FormValue;
		$this->expendiente->CurrentValue = $this->expendiente->FormValue;
		$this->tipo_doc->CurrentValue = $this->tipo_doc->FormValue;
		$this->num_doc->CurrentValue = $this->num_doc->FormValue;
		$this->nombre1->CurrentValue = $this->nombre1->FormValue;
		$this->nombre2->CurrentValue = $this->nombre2->FormValue;
		$this->apellido1->CurrentValue = $this->apellido1->FormValue;
		$this->apellido2->CurrentValue = $this->apellido2->FormValue;
		$this->genero->CurrentValue = $this->genero->FormValue;
		$this->edad->CurrentValue = $this->edad->FormValue;
		$this->fecha_nacido->CurrentValue = $this->fecha_nacido->FormValue;
		$this->cod_edad->CurrentValue = $this->cod_edad->FormValue;
		$this->telefono->CurrentValue = $this->telefono->FormValue;
		$this->celular->CurrentValue = $this->celular->FormValue;
		$this->direccion->CurrentValue = $this->direccion->FormValue;
		$this->aseguradro->CurrentValue = $this->aseguradro->FormValue;
		$this->nss->CurrentValue = $this->nss->FormValue;
		$this->prehospitalario->CurrentValue = $this->prehospitalario->FormValue;
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
		$this->cod_casointerh->setDbValue($row['cod_casointerh']);
		$this->id_paciente->setDbValue($row['id_paciente']);
		$this->expendiente->setDbValue($row['expendiente']);
		$this->tipo_doc->setDbValue($row['tipo_doc']);
		$this->num_doc->setDbValue($row['num_doc']);
		$this->nombre1->setDbValue($row['nombre1']);
		$this->nombre2->setDbValue($row['nombre2']);
		$this->apellido1->setDbValue($row['apellido1']);
		$this->apellido2->setDbValue($row['apellido2']);
		$this->genero->setDbValue($row['genero']);
		$this->edad->setDbValue($row['edad']);
		$this->fecha_nacido->setDbValue($row['fecha_nacido']);
		$this->cod_edad->setDbValue($row['cod_edad']);
		$this->telefono->setDbValue($row['telefono']);
		$this->celular->setDbValue($row['celular']);
		$this->direccion->setDbValue($row['direccion']);
		$this->_email->setDbValue($row['email']);
		$this->aseguradro->setDbValue($row['aseguradro']);
		$this->observacion->setDbValue($row['observacion']);
		$this->nss->setDbValue($row['nss']);
		$this->usu_sede->setDbValue($row['usu_sede']);
		$this->prehospitalario->setDbValue($row['prehospitalario']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['cod_casointerh'] = $this->cod_casointerh->CurrentValue;
		$row['id_paciente'] = $this->id_paciente->CurrentValue;
		$row['expendiente'] = $this->expendiente->CurrentValue;
		$row['tipo_doc'] = $this->tipo_doc->CurrentValue;
		$row['num_doc'] = $this->num_doc->CurrentValue;
		$row['nombre1'] = $this->nombre1->CurrentValue;
		$row['nombre2'] = $this->nombre2->CurrentValue;
		$row['apellido1'] = $this->apellido1->CurrentValue;
		$row['apellido2'] = $this->apellido2->CurrentValue;
		$row['genero'] = $this->genero->CurrentValue;
		$row['edad'] = $this->edad->CurrentValue;
		$row['fecha_nacido'] = $this->fecha_nacido->CurrentValue;
		$row['cod_edad'] = $this->cod_edad->CurrentValue;
		$row['telefono'] = $this->telefono->CurrentValue;
		$row['celular'] = $this->celular->CurrentValue;
		$row['direccion'] = $this->direccion->CurrentValue;
		$row['email'] = $this->_email->CurrentValue;
		$row['aseguradro'] = $this->aseguradro->CurrentValue;
		$row['observacion'] = $this->observacion->CurrentValue;
		$row['nss'] = $this->nss->CurrentValue;
		$row['usu_sede'] = $this->usu_sede->CurrentValue;
		$row['prehospitalario'] = $this->prehospitalario->CurrentValue;
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

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// cod_casointerh
		// id_paciente
		// expendiente
		// tipo_doc
		// num_doc
		// nombre1
		// nombre2
		// apellido1
		// apellido2
		// genero
		// edad
		// fecha_nacido
		// cod_edad
		// telefono
		// celular
		// direccion
		// email

		$this->_email->CellCssStyle = "white-space: nowrap;";

		// aseguradro
		// observacion
		// nss
		// usu_sede
		// prehospitalario

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// cod_casointerh
			$this->cod_casointerh->ViewValue = $this->cod_casointerh->CurrentValue;
			$this->cod_casointerh->ViewValue = FormatNumber($this->cod_casointerh->ViewValue, 0, -2, -2, -2);
			$this->cod_casointerh->ViewCustomAttributes = "";

			// id_paciente
			$this->id_paciente->ViewValue = $this->id_paciente->CurrentValue;
			$this->id_paciente->ViewCustomAttributes = "";

			// expendiente
			$this->expendiente->ViewValue = $this->expendiente->CurrentValue;
			$this->expendiente->ViewCustomAttributes = "";

			// tipo_doc
			$curVal = strval($this->tipo_doc->CurrentValue);
			if ($curVal != "") {
				$this->tipo_doc->ViewValue = $this->tipo_doc->lookupCacheOption($curVal);
				if ($this->tipo_doc->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_tipo\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tipo_doc->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->tipo_doc->ViewValue = $this->tipo_doc->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tipo_doc->ViewValue = $this->tipo_doc->CurrentValue;
					}
				}
			} else {
				$this->tipo_doc->ViewValue = NULL;
			}
			$this->tipo_doc->ViewCustomAttributes = "";

			// num_doc
			$this->num_doc->ViewValue = $this->num_doc->CurrentValue;
			$this->num_doc->ViewCustomAttributes = "";

			// nombre1
			$this->nombre1->ViewValue = $this->nombre1->CurrentValue;
			$this->nombre1->ViewCustomAttributes = "";

			// nombre2
			$this->nombre2->ViewValue = $this->nombre2->CurrentValue;
			$this->nombre2->ViewCustomAttributes = "";

			// apellido1
			$this->apellido1->ViewValue = $this->apellido1->CurrentValue;
			$this->apellido1->ViewCustomAttributes = "";

			// apellido2
			$this->apellido2->ViewValue = $this->apellido2->CurrentValue;
			$this->apellido2->ViewCustomAttributes = "";

			// genero
			$curVal = strval($this->genero->CurrentValue);
			if ($curVal != "") {
				$this->genero->ViewValue = $this->genero->lookupCacheOption($curVal);
				if ($this->genero->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_genero\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->genero->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->genero->ViewValue = $this->genero->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->genero->ViewValue = $this->genero->CurrentValue;
					}
				}
			} else {
				$this->genero->ViewValue = NULL;
			}
			$this->genero->ViewCustomAttributes = "";

			// edad
			$this->edad->ViewValue = $this->edad->CurrentValue;
			$this->edad->ViewValue = FormatNumber($this->edad->ViewValue, 0, -2, -2, -2);
			$this->edad->ViewCustomAttributes = "";

			// fecha_nacido
			$this->fecha_nacido->ViewValue = $this->fecha_nacido->CurrentValue;
			$this->fecha_nacido->ViewCustomAttributes = "";

			// cod_edad
			$curVal = strval($this->cod_edad->CurrentValue);
			if ($curVal != "") {
				$this->cod_edad->ViewValue = $this->cod_edad->lookupCacheOption($curVal);
				if ($this->cod_edad->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_edad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->cod_edad->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->cod_edad->ViewValue = $this->cod_edad->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->cod_edad->ViewValue = $this->cod_edad->CurrentValue;
					}
				}
			} else {
				$this->cod_edad->ViewValue = NULL;
			}
			$this->cod_edad->ViewCustomAttributes = "";

			// telefono
			$this->telefono->ViewValue = $this->telefono->CurrentValue;
			$this->telefono->ViewCustomAttributes = "";

			// celular
			$this->celular->ViewValue = $this->celular->CurrentValue;
			$this->celular->ViewCustomAttributes = "";

			// direccion
			$this->direccion->ViewValue = $this->direccion->CurrentValue;
			$this->direccion->ViewCustomAttributes = "";

			// aseguradro
			$curVal = strval($this->aseguradro->CurrentValue);
			if ($curVal != "") {
				$this->aseguradro->ViewValue = $this->aseguradro->lookupCacheOption($curVal);
				if ($this->aseguradro->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"cod_habiliatacion\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->aseguradro->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->aseguradro->ViewValue = $this->aseguradro->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->aseguradro->ViewValue = $this->aseguradro->CurrentValue;
					}
				}
			} else {
				$this->aseguradro->ViewValue = NULL;
			}
			$this->aseguradro->ViewCustomAttributes = "";

			// nss
			$this->nss->ViewValue = $this->nss->CurrentValue;
			$this->nss->ViewCustomAttributes = "";

			// prehospitalario
			$this->prehospitalario->ViewValue = $this->prehospitalario->CurrentValue;
			$this->prehospitalario->ViewCustomAttributes = "";

			// cod_casointerh
			$this->cod_casointerh->LinkCustomAttributes = "";
			$this->cod_casointerh->HrefValue = "";
			$this->cod_casointerh->TooltipValue = "";

			// id_paciente
			$this->id_paciente->LinkCustomAttributes = "";
			$this->id_paciente->HrefValue = "";
			$this->id_paciente->TooltipValue = "";

			// expendiente
			$this->expendiente->LinkCustomAttributes = "";
			$this->expendiente->HrefValue = "";
			$this->expendiente->TooltipValue = "";

			// tipo_doc
			$this->tipo_doc->LinkCustomAttributes = "";
			$this->tipo_doc->HrefValue = "";
			$this->tipo_doc->TooltipValue = "";

			// num_doc
			$this->num_doc->LinkCustomAttributes = "";
			$this->num_doc->HrefValue = "";
			$this->num_doc->TooltipValue = "";

			// nombre1
			$this->nombre1->LinkCustomAttributes = "";
			$this->nombre1->HrefValue = "";
			$this->nombre1->TooltipValue = "";

			// nombre2
			$this->nombre2->LinkCustomAttributes = "";
			$this->nombre2->HrefValue = "";
			$this->nombre2->TooltipValue = "";

			// apellido1
			$this->apellido1->LinkCustomAttributes = "";
			$this->apellido1->HrefValue = "";
			$this->apellido1->TooltipValue = "";

			// apellido2
			$this->apellido2->LinkCustomAttributes = "";
			$this->apellido2->HrefValue = "";
			$this->apellido2->TooltipValue = "";

			// genero
			$this->genero->LinkCustomAttributes = "";
			$this->genero->HrefValue = "";
			$this->genero->TooltipValue = "";

			// edad
			$this->edad->LinkCustomAttributes = "";
			$this->edad->HrefValue = "";
			$this->edad->TooltipValue = "";

			// fecha_nacido
			$this->fecha_nacido->LinkCustomAttributes = "";
			$this->fecha_nacido->HrefValue = "";
			$this->fecha_nacido->TooltipValue = "";

			// cod_edad
			$this->cod_edad->LinkCustomAttributes = "";
			$this->cod_edad->HrefValue = "";
			$this->cod_edad->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";

			// celular
			$this->celular->LinkCustomAttributes = "";
			$this->celular->HrefValue = "";
			$this->celular->TooltipValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";
			$this->direccion->TooltipValue = "";

			// aseguradro
			$this->aseguradro->LinkCustomAttributes = "";
			$this->aseguradro->HrefValue = "";
			$this->aseguradro->TooltipValue = "";

			// nss
			$this->nss->LinkCustomAttributes = "";
			$this->nss->HrefValue = "";
			$this->nss->TooltipValue = "";

			// prehospitalario
			$this->prehospitalario->LinkCustomAttributes = "";
			$this->prehospitalario->HrefValue = "";
			$this->prehospitalario->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// cod_casointerh
			$this->cod_casointerh->EditAttrs["class"] = "form-control";
			$this->cod_casointerh->EditCustomAttributes = "";
			$this->cod_casointerh->EditValue = HtmlEncode($this->cod_casointerh->CurrentValue);
			$this->cod_casointerh->PlaceHolder = RemoveHtml($this->cod_casointerh->caption());

			// id_paciente
			$this->id_paciente->EditAttrs["class"] = "form-control";
			$this->id_paciente->EditCustomAttributes = "";
			$this->id_paciente->EditValue = HtmlEncode($this->id_paciente->CurrentValue);
			$this->id_paciente->PlaceHolder = RemoveHtml($this->id_paciente->caption());

			// expendiente
			$this->expendiente->EditAttrs["class"] = "form-control";
			$this->expendiente->EditCustomAttributes = "";
			if (!$this->expendiente->Raw)
				$this->expendiente->CurrentValue = HtmlDecode($this->expendiente->CurrentValue);
			$this->expendiente->EditValue = HtmlEncode($this->expendiente->CurrentValue);
			$this->expendiente->PlaceHolder = RemoveHtml($this->expendiente->caption());

			// tipo_doc
			$this->tipo_doc->EditAttrs["class"] = "form-control";
			$this->tipo_doc->EditCustomAttributes = "";
			$curVal = trim(strval($this->tipo_doc->CurrentValue));
			if ($curVal != "")
				$this->tipo_doc->ViewValue = $this->tipo_doc->lookupCacheOption($curVal);
			else
				$this->tipo_doc->ViewValue = $this->tipo_doc->Lookup !== NULL && is_array($this->tipo_doc->Lookup->Options) ? $curVal : NULL;
			if ($this->tipo_doc->ViewValue !== NULL) { // Load from cache
				$this->tipo_doc->EditValue = array_values($this->tipo_doc->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_tipo\"" . SearchString("=", $this->tipo_doc->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->tipo_doc->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->tipo_doc->EditValue = $arwrk;
			}

			// num_doc
			$this->num_doc->EditAttrs["class"] = "form-control";
			$this->num_doc->EditCustomAttributes = "";
			if (!$this->num_doc->Raw)
				$this->num_doc->CurrentValue = HtmlDecode($this->num_doc->CurrentValue);
			$this->num_doc->EditValue = HtmlEncode($this->num_doc->CurrentValue);
			$this->num_doc->PlaceHolder = RemoveHtml($this->num_doc->caption());

			// nombre1
			$this->nombre1->EditAttrs["class"] = "form-control";
			$this->nombre1->EditCustomAttributes = "";
			if (!$this->nombre1->Raw)
				$this->nombre1->CurrentValue = HtmlDecode($this->nombre1->CurrentValue);
			$this->nombre1->EditValue = HtmlEncode($this->nombre1->CurrentValue);
			$this->nombre1->PlaceHolder = RemoveHtml($this->nombre1->caption());

			// nombre2
			$this->nombre2->EditAttrs["class"] = "form-control";
			$this->nombre2->EditCustomAttributes = "";
			if (!$this->nombre2->Raw)
				$this->nombre2->CurrentValue = HtmlDecode($this->nombre2->CurrentValue);
			$this->nombre2->EditValue = HtmlEncode($this->nombre2->CurrentValue);
			$this->nombre2->PlaceHolder = RemoveHtml($this->nombre2->caption());

			// apellido1
			$this->apellido1->EditAttrs["class"] = "form-control";
			$this->apellido1->EditCustomAttributes = "";
			if (!$this->apellido1->Raw)
				$this->apellido1->CurrentValue = HtmlDecode($this->apellido1->CurrentValue);
			$this->apellido1->EditValue = HtmlEncode($this->apellido1->CurrentValue);
			$this->apellido1->PlaceHolder = RemoveHtml($this->apellido1->caption());

			// apellido2
			$this->apellido2->EditAttrs["class"] = "form-control";
			$this->apellido2->EditCustomAttributes = "";
			if (!$this->apellido2->Raw)
				$this->apellido2->CurrentValue = HtmlDecode($this->apellido2->CurrentValue);
			$this->apellido2->EditValue = HtmlEncode($this->apellido2->CurrentValue);
			$this->apellido2->PlaceHolder = RemoveHtml($this->apellido2->caption());

			// genero
			$this->genero->EditCustomAttributes = "";
			$curVal = trim(strval($this->genero->CurrentValue));
			if ($curVal != "")
				$this->genero->ViewValue = $this->genero->lookupCacheOption($curVal);
			else
				$this->genero->ViewValue = $this->genero->Lookup !== NULL && is_array($this->genero->Lookup->Options) ? $curVal : NULL;
			if ($this->genero->ViewValue !== NULL) { // Load from cache
				$this->genero->EditValue = array_values($this->genero->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_genero\"" . SearchString("=", $this->genero->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->genero->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->genero->EditValue = $arwrk;
			}

			// edad
			$this->edad->EditAttrs["class"] = "form-control";
			$this->edad->EditCustomAttributes = "";
			$this->edad->EditValue = HtmlEncode($this->edad->CurrentValue);
			$this->edad->PlaceHolder = RemoveHtml($this->edad->caption());

			// fecha_nacido
			$this->fecha_nacido->EditAttrs["class"] = "form-control";
			$this->fecha_nacido->EditCustomAttributes = "";
			if (!$this->fecha_nacido->Raw)
				$this->fecha_nacido->CurrentValue = HtmlDecode($this->fecha_nacido->CurrentValue);
			$this->fecha_nacido->EditValue = HtmlEncode($this->fecha_nacido->CurrentValue);
			$this->fecha_nacido->PlaceHolder = RemoveHtml($this->fecha_nacido->caption());

			// cod_edad
			$this->cod_edad->EditAttrs["class"] = "form-control";
			$this->cod_edad->EditCustomAttributes = "";
			$curVal = trim(strval($this->cod_edad->CurrentValue));
			if ($curVal != "")
				$this->cod_edad->ViewValue = $this->cod_edad->lookupCacheOption($curVal);
			else
				$this->cod_edad->ViewValue = $this->cod_edad->Lookup !== NULL && is_array($this->cod_edad->Lookup->Options) ? $curVal : NULL;
			if ($this->cod_edad->ViewValue !== NULL) { // Load from cache
				$this->cod_edad->EditValue = array_values($this->cod_edad->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_edad\"" . SearchString("=", $this->cod_edad->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->cod_edad->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->cod_edad->EditValue = $arwrk;
			}

			// telefono
			$this->telefono->EditAttrs["class"] = "form-control";
			$this->telefono->EditCustomAttributes = "";
			if (!$this->telefono->Raw)
				$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
			$this->telefono->EditValue = HtmlEncode($this->telefono->CurrentValue);
			$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

			// celular
			$this->celular->EditAttrs["class"] = "form-control";
			$this->celular->EditCustomAttributes = "";
			if (!$this->celular->Raw)
				$this->celular->CurrentValue = HtmlDecode($this->celular->CurrentValue);
			$this->celular->EditValue = HtmlEncode($this->celular->CurrentValue);
			$this->celular->PlaceHolder = RemoveHtml($this->celular->caption());

			// direccion
			$this->direccion->EditAttrs["class"] = "form-control";
			$this->direccion->EditCustomAttributes = "";
			if (!$this->direccion->Raw)
				$this->direccion->CurrentValue = HtmlDecode($this->direccion->CurrentValue);
			$this->direccion->EditValue = HtmlEncode($this->direccion->CurrentValue);
			$this->direccion->PlaceHolder = RemoveHtml($this->direccion->caption());

			// aseguradro
			$this->aseguradro->EditAttrs["class"] = "form-control";
			$this->aseguradro->EditCustomAttributes = "";
			$curVal = trim(strval($this->aseguradro->CurrentValue));
			if ($curVal != "")
				$this->aseguradro->ViewValue = $this->aseguradro->lookupCacheOption($curVal);
			else
				$this->aseguradro->ViewValue = $this->aseguradro->Lookup !== NULL && is_array($this->aseguradro->Lookup->Options) ? $curVal : NULL;
			if ($this->aseguradro->ViewValue !== NULL) { // Load from cache
				$this->aseguradro->EditValue = array_values($this->aseguradro->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"cod_habiliatacion\"" . SearchString("=", $this->aseguradro->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->aseguradro->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->aseguradro->EditValue = $arwrk;
			}

			// nss
			$this->nss->EditAttrs["class"] = "form-control";
			$this->nss->EditCustomAttributes = "";
			if (!$this->nss->Raw)
				$this->nss->CurrentValue = HtmlDecode($this->nss->CurrentValue);
			$this->nss->EditValue = HtmlEncode($this->nss->CurrentValue);
			$this->nss->PlaceHolder = RemoveHtml($this->nss->caption());

			// prehospitalario
			$this->prehospitalario->EditAttrs["class"] = "form-control";
			$this->prehospitalario->EditCustomAttributes = "";
			if (!$this->prehospitalario->Raw)
				$this->prehospitalario->CurrentValue = HtmlDecode($this->prehospitalario->CurrentValue);
			$this->prehospitalario->EditValue = HtmlEncode($this->prehospitalario->CurrentValue);
			$this->prehospitalario->PlaceHolder = RemoveHtml($this->prehospitalario->caption());

			// Add refer script
			// cod_casointerh

			$this->cod_casointerh->LinkCustomAttributes = "";
			$this->cod_casointerh->HrefValue = "";

			// id_paciente
			$this->id_paciente->LinkCustomAttributes = "";
			$this->id_paciente->HrefValue = "";

			// expendiente
			$this->expendiente->LinkCustomAttributes = "";
			$this->expendiente->HrefValue = "";

			// tipo_doc
			$this->tipo_doc->LinkCustomAttributes = "";
			$this->tipo_doc->HrefValue = "";

			// num_doc
			$this->num_doc->LinkCustomAttributes = "";
			$this->num_doc->HrefValue = "";

			// nombre1
			$this->nombre1->LinkCustomAttributes = "";
			$this->nombre1->HrefValue = "";

			// nombre2
			$this->nombre2->LinkCustomAttributes = "";
			$this->nombre2->HrefValue = "";

			// apellido1
			$this->apellido1->LinkCustomAttributes = "";
			$this->apellido1->HrefValue = "";

			// apellido2
			$this->apellido2->LinkCustomAttributes = "";
			$this->apellido2->HrefValue = "";

			// genero
			$this->genero->LinkCustomAttributes = "";
			$this->genero->HrefValue = "";

			// edad
			$this->edad->LinkCustomAttributes = "";
			$this->edad->HrefValue = "";

			// fecha_nacido
			$this->fecha_nacido->LinkCustomAttributes = "";
			$this->fecha_nacido->HrefValue = "";

			// cod_edad
			$this->cod_edad->LinkCustomAttributes = "";
			$this->cod_edad->HrefValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";

			// celular
			$this->celular->LinkCustomAttributes = "";
			$this->celular->HrefValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";

			// aseguradro
			$this->aseguradro->LinkCustomAttributes = "";
			$this->aseguradro->HrefValue = "";

			// nss
			$this->nss->LinkCustomAttributes = "";
			$this->nss->HrefValue = "";

			// prehospitalario
			$this->prehospitalario->LinkCustomAttributes = "";
			$this->prehospitalario->HrefValue = "";
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
		if ($this->cod_casointerh->Required) {
			if (!$this->cod_casointerh->IsDetailKey && $this->cod_casointerh->FormValue != NULL && $this->cod_casointerh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_casointerh->caption(), $this->cod_casointerh->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cod_casointerh->FormValue)) {
			AddMessage($FormError, $this->cod_casointerh->errorMessage());
		}
		if ($this->id_paciente->Required) {
			if (!$this->id_paciente->IsDetailKey && $this->id_paciente->FormValue != NULL && $this->id_paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_paciente->caption(), $this->id_paciente->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->id_paciente->FormValue)) {
			AddMessage($FormError, $this->id_paciente->errorMessage());
		}
		if ($this->expendiente->Required) {
			if (!$this->expendiente->IsDetailKey && $this->expendiente->FormValue != NULL && $this->expendiente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->expendiente->caption(), $this->expendiente->RequiredErrorMessage));
			}
		}
		if ($this->tipo_doc->Required) {
			if (!$this->tipo_doc->IsDetailKey && $this->tipo_doc->FormValue != NULL && $this->tipo_doc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_doc->caption(), $this->tipo_doc->RequiredErrorMessage));
			}
		}
		if ($this->num_doc->Required) {
			if (!$this->num_doc->IsDetailKey && $this->num_doc->FormValue != NULL && $this->num_doc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->num_doc->caption(), $this->num_doc->RequiredErrorMessage));
			}
		}
		if ($this->nombre1->Required) {
			if (!$this->nombre1->IsDetailKey && $this->nombre1->FormValue != NULL && $this->nombre1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre1->caption(), $this->nombre1->RequiredErrorMessage));
			}
		}
		if ($this->nombre2->Required) {
			if (!$this->nombre2->IsDetailKey && $this->nombre2->FormValue != NULL && $this->nombre2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre2->caption(), $this->nombre2->RequiredErrorMessage));
			}
		}
		if ($this->apellido1->Required) {
			if (!$this->apellido1->IsDetailKey && $this->apellido1->FormValue != NULL && $this->apellido1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->apellido1->caption(), $this->apellido1->RequiredErrorMessage));
			}
		}
		if ($this->apellido2->Required) {
			if (!$this->apellido2->IsDetailKey && $this->apellido2->FormValue != NULL && $this->apellido2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->apellido2->caption(), $this->apellido2->RequiredErrorMessage));
			}
		}
		if ($this->genero->Required) {
			if ($this->genero->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->genero->caption(), $this->genero->RequiredErrorMessage));
			}
		}
		if ($this->edad->Required) {
			if (!$this->edad->IsDetailKey && $this->edad->FormValue != NULL && $this->edad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->edad->caption(), $this->edad->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->edad->FormValue)) {
			AddMessage($FormError, $this->edad->errorMessage());
		}
		if ($this->fecha_nacido->Required) {
			if (!$this->fecha_nacido->IsDetailKey && $this->fecha_nacido->FormValue != NULL && $this->fecha_nacido->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_nacido->caption(), $this->fecha_nacido->RequiredErrorMessage));
			}
		}
		if (!CheckStdDate($this->fecha_nacido->FormValue)) {
			AddMessage($FormError, $this->fecha_nacido->errorMessage());
		}
		if ($this->cod_edad->Required) {
			if (!$this->cod_edad->IsDetailKey && $this->cod_edad->FormValue != NULL && $this->cod_edad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_edad->caption(), $this->cod_edad->RequiredErrorMessage));
			}
		}
		if ($this->telefono->Required) {
			if (!$this->telefono->IsDetailKey && $this->telefono->FormValue != NULL && $this->telefono->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono->caption(), $this->telefono->RequiredErrorMessage));
			}
		}
		if ($this->celular->Required) {
			if (!$this->celular->IsDetailKey && $this->celular->FormValue != NULL && $this->celular->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->celular->caption(), $this->celular->RequiredErrorMessage));
			}
		}
		if ($this->direccion->Required) {
			if (!$this->direccion->IsDetailKey && $this->direccion->FormValue != NULL && $this->direccion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->direccion->caption(), $this->direccion->RequiredErrorMessage));
			}
		}
		if ($this->aseguradro->Required) {
			if (!$this->aseguradro->IsDetailKey && $this->aseguradro->FormValue != NULL && $this->aseguradro->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->aseguradro->caption(), $this->aseguradro->RequiredErrorMessage));
			}
		}
		if ($this->nss->Required) {
			if (!$this->nss->IsDetailKey && $this->nss->FormValue != NULL && $this->nss->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nss->caption(), $this->nss->RequiredErrorMessage));
			}
		}
		if ($this->prehospitalario->Required) {
			if (!$this->prehospitalario->IsDetailKey && $this->prehospitalario->FormValue != NULL && $this->prehospitalario->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->prehospitalario->caption(), $this->prehospitalario->RequiredErrorMessage));
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
		if ($this->cod_casointerh->CurrentValue != "") { // Check field with unique index
			$filter = "(\"cod_casointerh\" = " . AdjustSql($this->cod_casointerh->CurrentValue, $this->Dbid) . ")";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->cod_casointerh->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->cod_casointerh->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// cod_casointerh
		$this->cod_casointerh->setDbValueDef($rsnew, $this->cod_casointerh->CurrentValue, 0, FALSE);

		// id_paciente
		$this->id_paciente->setDbValueDef($rsnew, $this->id_paciente->CurrentValue, 0, strval($this->id_paciente->CurrentValue) == "");

		// expendiente
		$this->expendiente->setDbValueDef($rsnew, $this->expendiente->CurrentValue, NULL, FALSE);

		// tipo_doc
		$this->tipo_doc->setDbValueDef($rsnew, $this->tipo_doc->CurrentValue, NULL, FALSE);

		// num_doc
		$this->num_doc->setDbValueDef($rsnew, $this->num_doc->CurrentValue, NULL, FALSE);

		// nombre1
		$this->nombre1->setDbValueDef($rsnew, $this->nombre1->CurrentValue, NULL, FALSE);

		// nombre2
		$this->nombre2->setDbValueDef($rsnew, $this->nombre2->CurrentValue, NULL, FALSE);

		// apellido1
		$this->apellido1->setDbValueDef($rsnew, $this->apellido1->CurrentValue, NULL, FALSE);

		// apellido2
		$this->apellido2->setDbValueDef($rsnew, $this->apellido2->CurrentValue, NULL, FALSE);

		// genero
		$this->genero->setDbValueDef($rsnew, $this->genero->CurrentValue, NULL, FALSE);

		// edad
		$this->edad->setDbValueDef($rsnew, $this->edad->CurrentValue, NULL, FALSE);

		// fecha_nacido
		$this->fecha_nacido->setDbValueDef($rsnew, $this->fecha_nacido->CurrentValue, NULL, FALSE);

		// cod_edad
		$this->cod_edad->setDbValueDef($rsnew, $this->cod_edad->CurrentValue, NULL, FALSE);

		// telefono
		$this->telefono->setDbValueDef($rsnew, $this->telefono->CurrentValue, NULL, FALSE);

		// celular
		$this->celular->setDbValueDef($rsnew, $this->celular->CurrentValue, NULL, FALSE);

		// direccion
		$this->direccion->setDbValueDef($rsnew, $this->direccion->CurrentValue, NULL, FALSE);

		// aseguradro
		$this->aseguradro->setDbValueDef($rsnew, $this->aseguradro->CurrentValue, NULL, FALSE);

		// nss
		$this->nss->setDbValueDef($rsnew, $this->nss->CurrentValue, NULL, FALSE);

		// prehospitalario
		$this->prehospitalario->setDbValueDef($rsnew, $this->prehospitalario->CurrentValue, NULL, strval($this->prehospitalario->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['cod_casointerh']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter($rsnew);
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
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

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpacientegenerallistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
				case "x_tipo_doc":
					break;
				case "x_genero":
					break;
				case "x_cod_edad":
					break;
				case "x_aseguradro":
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
						case "x_tipo_doc":
							break;
						case "x_genero":
							break;
						case "x_cod_edad":
							break;
						case "x_aseguradro":
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