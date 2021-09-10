<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class interh_maestro_view extends interh_maestro
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'interh_maestro';

	// Page object name
	public $PageObjName = "interh_maestro_view";

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
		$keyUrl = "";
		if (Get("cod_casointerh") !== NULL) {
			$this->RecKey["cod_casointerh"] = Get("cod_casointerh");
			$keyUrl .= "&amp;cod_casointerh=" . urlencode($this->RecKey["cod_casointerh"]);
		}
		$this->ExportPrintUrl = $this->pageUrl() . "export=print" . $keyUrl;
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html" . $keyUrl;
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel" . $keyUrl;
		$this->ExportWordUrl = $this->pageUrl() . "export=word" . $keyUrl;
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml" . $keyUrl;
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv" . $keyUrl;
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf" . $keyUrl;

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

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

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
	public $ExportOptions; // Export options
	public $OtherOptions; // Other options
	public $DisplayRecords = 1;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $RecKey = [];
	public $IsModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canView()) {
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
			if (!$Security->canView()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("interh_maestrolist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->cod_casointerh->setVisibility();
		$this->fechahorainterh->setVisibility();
		$this->tiempo->setVisibility();
		$this->cod_expendeinteinteh->setVisibility();
		$this->tipo_serviciointerh->setVisibility();
		$this->hospital_origneinterh->setVisibility();
		$this->nombrereportainterh->setVisibility();
		$this->telefonointerh->setVisibility();
		$this->motivo_atencioninteh->setVisibility();
		$this->accioninterh->setVisibility();
		$this->longitudinterh->setVisibility();
		$this->latitudinterh->setVisibility();
		$this->prioridadinterh->setVisibility();
		$this->estadointerh->setVisibility();
		$this->cierreinterh->setVisibility();
		$this->hospital_destinointerh->setVisibility();
		$this->nombre_recibe->setVisibility();
		$this->ambulancia->setVisibility();
		$this->paciente->setVisibility();
		$this->evaluacion->setVisibility();
		$this->sede->setVisibility();
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
		if (!$Security->canView()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("interh_maestrolist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;

		// Load current record
		$loadCurrentRecord = FALSE;
		$returnUrl = "";
		$matchRecord = FALSE;
		if ($this->isPageRequest()) { // Validate request
			if (Get("cod_casointerh") !== NULL) {
				$this->cod_casointerh->setQueryStringValue(Get("cod_casointerh"));
				$this->RecKey["cod_casointerh"] = $this->cod_casointerh->QueryStringValue;
			} elseif (IsApi() && Key(0) !== NULL) {
				$this->cod_casointerh->setQueryStringValue(Key(0));
				$this->RecKey["cod_casointerh"] = $this->cod_casointerh->QueryStringValue;
			} elseif (Post("cod_casointerh") !== NULL) {
				$this->cod_casointerh->setFormValue(Post("cod_casointerh"));
				$this->RecKey["cod_casointerh"] = $this->cod_casointerh->FormValue;
			} elseif (IsApi() && Route(2) !== NULL) {
				$this->cod_casointerh->setFormValue(Route(2));
				$this->RecKey["cod_casointerh"] = $this->cod_casointerh->FormValue;
			} else {
				$returnUrl = "interh_maestrolist.php"; // Return to list
			}

			// Get action
			$this->CurrentAction = "show"; // Display
			switch ($this->CurrentAction) {
				case "show": // Get a record to display

					// Load record based on key
					if (IsApi()) {
						$filter = $this->getRecordFilter();
						$this->CurrentFilter = $filter;
						$sql = $this->getCurrentSql();
						$conn = $this->getConnection();
						$this->Recordset = LoadRecordset($sql, $conn);
						$res = $this->Recordset && !$this->Recordset->EOF;
					} else {
						$res = $this->loadRow();
					}
					if (!$res) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
						$returnUrl = "interh_maestrolist.php"; // No matching record, return to list
					}
			}
		} else {
			$returnUrl = "interh_maestrolist.php"; // Not page request, return to list
		}
		if ($returnUrl != "") {
			$this->terminate($returnUrl);
			return;
		}

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Render row
		$this->RowType = ROWTYPE_VIEW;
		$this->resetAttributes();
		$this->renderRow();

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset, TRUE); // Get current record only
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows]);
			$this->terminate(TRUE);
		}
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		$item->Visible = ($this->AddUrl != "" && $Security->canAdd());

		// Edit
		$item = &$option->add("edit");
		$editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		$item->Visible = ($this->EditUrl != "" && $Security->canEdit());

		// Delete
		$item = &$option->add("delete");
		if ($this->IsModal) // Handle as inline delete
			$item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery($this->DeleteUrl, "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl != "" && $Security->canDelete());

		// Set up action default
		$option = $options["action"];
		$option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
		$option->UseDropDownButton = FALSE;
		$option->UseButtonGroup = TRUE;
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
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

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->AddUrl = $this->getAddUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();
		$this->ListUrl = $this->getListUrl();
		$this->setupOtherOptions();

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

			// ambulancia
			$this->ambulancia->ViewValue = $this->ambulancia->CurrentValue;
			$this->ambulancia->CssClass = "font-weight-bold";
			$this->ambulancia->CellCssStyle .= "text-align: center;";
			$this->ambulancia->ViewCustomAttributes = "";

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
				$this->tiempo->LinkAttrs["data-tooltip-id"] = "tt_interh_maestro_x_tiempo";
				$this->tiempo->LinkAttrs["data-tooltip-width"] = $this->tiempo->TooltipWidth;
				$this->tiempo->LinkAttrs["data-placement"] = Config("CSS_FLIP") ? "left" : "right";
			}

			// tipo_serviciointerh
			$this->tipo_serviciointerh->LinkCustomAttributes = "";
			$this->tipo_serviciointerh->HrefValue = "";
			$this->tipo_serviciointerh->TooltipValue = "";

			// hospital_origneinterh
			$this->hospital_origneinterh->LinkCustomAttributes = "";
			$this->hospital_origneinterh->HrefValue = "";
			$this->hospital_origneinterh->TooltipValue = "";

			// nombrereportainterh
			$this->nombrereportainterh->LinkCustomAttributes = "";
			$this->nombrereportainterh->HrefValue = "";
			$this->nombrereportainterh->TooltipValue = "";

			// telefonointerh
			$this->telefonointerh->LinkCustomAttributes = "";
			$this->telefonointerh->HrefValue = "";
			$this->telefonointerh->TooltipValue = "";

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

			// hospital_destinointerh
			$this->hospital_destinointerh->LinkCustomAttributes = "";
			$this->hospital_destinointerh->HrefValue = "";
			$this->hospital_destinointerh->TooltipValue = "";

			// nombre_recibe
			$this->nombre_recibe->LinkCustomAttributes = "";
			$this->nombre_recibe->HrefValue = "";
			$this->nombre_recibe->TooltipValue = "";

			// ambulancia
			$this->ambulancia->LinkCustomAttributes = "";
			$this->ambulancia->HrefValue = "";
			$this->ambulancia->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("interh_maestrolist.php"), "", $this->TableVar, TRUE);
		$pageId = "view";
		$Breadcrumb->add("view", $pageId, $url);
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
	if (CurrentLanguageID() == "en") {
	$GLOBALS["Language"]->setPhrase("frap", "Quick Actions");
	} else {
	$GLOBALS["Language"]->setPhrase("frap", "Aksi Cepat");
	}

	//$GLOBALS["Language"]->setPhrase("frap", "Ficha Atencion Interhospitalaria");
		$item = @$this->ExportOptions->Items["pdf"];
		if ($item)   
			$item->Visible = FALSE; 
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
		$this->OtherOptions["detail"]->Items["detail_interh_evaluacionclinica"]->Visible = FALSE;
		$this->OtherOptions["detail"]->Items["detail_interh_seguimiento"]->Visible = FALSE;
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

			$row = ExecuteScalar("SELECT cod_ambulancia FROM servicio_ambulancia WHERE cod_casointerh = '".Get('cod_casointerh')."'"); //Consulta quien tiene servicio de ambulancia
			$cierre = ExecuteScalar("SELECT cierreinterh FROM interh_maestro WHERE cod_casointerh = '".Get('cod_casointerh')."'"); //Consulta quien tiene caso sin cerrar
		$cierre_caso = "";
		$paciente= "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Paciente\" data-table=\"interh_seguimiento\" data-caption=\"<img src='images/icon/028-head.png' width='40' height='45'></br>Paciente\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'pacientegeneraledit.php?cod_pacienteinterh=".Get('cod_casointerh')."&cod_casointerh=".Get('cod_casointerh')."'});\" data-original-title=\"Agregar Paciente\"><img src='images/icon/028-head.png' width='25' height='27'></a>";
		$evaluacion= "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Evaluacion Clinica\" data-table=\"interh_seguimiento\" data-caption=\"<img src='images/icon/029-heart.png' width='40' height='45'></br>Evaluación Clinica\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'interh_evaluacionclinicaadd.php?showmaster=interh_maestro&cod_casointerh=".Get('cod_casointerh')."&cod_pacienteinterh=".Get('cod_casointerh')."'});\" data-original-title=\"Agregar Seguimiento\"><img src='images/icon/029-heart.png' width='25' height='27'></a>";
		if ($row == ""){
		$ambulancia= "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Ambulancia\" data-table=\"servicio_ambulancia\" data-caption=\"<img src='images/icon/001-ambulance.png' width='40' height='45'></br>Servicio de Ambulancia\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'asigna_ambulancialist.php?cod_pacienteinterh=".Get('cod_casointerh')."&id_maestrointerh=".Get('cod_casointerh')."'});\" data-original-title=\"Servicio de Ambulancia\"><img src='images/icon/001-ambulance.png' width='25' height='27'></a>";
			if ($cierre=='0'){			
				$cierre_caso= "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Cerrar Caso\" data-table=\"cerrar caso\" data-caption=\"<img src='images/icon/cancelar(1).png' width='40' height='45'></br>Cerrar Caso\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'interh_cierreadd.php?cod_pacienteinterh=".Get('cod_casointerh')."&cod_casointerh=".Get('cod_casointerh')."'});\" data-original-title=\"Cerrar Caso\"><img src='images/icon/001-canceldoc.png' width='25' height='27'></a>";
			}else {
				$cierre_caso = "";
			} //if cierre  
		}else{
			$ambulancia = "<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Ambulancia\" data-table=\"servicio_ambulancia\" data-caption=\"<img src='images/icon/001-ambulance_red.png' width='40' height='45'></br>-Servicio de Ambulancia\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'servicio_ambulanciaedit.php?cod_pacienteinterh=".Get('cod_casointerh')."&cod_ambulancia=".$row."&id_maestrointerh=".Get('cod_casointerh')."'});\" data-original-title=\"-Servicio de Ambulancia\"><img src='images/icon/001-ambulance_red.png' width='25' height='27'></a>";
		}
		$hospital ="<a class=\"btn btn-default ew-add-edit ew-add\" title=\" Hospital Destino\" data-table=\"servicio_ambulancia\" data-caption=\"<img src='images/icon/033-hospital.png' width='40' height='45'></br>Hospital de Destino\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'interh_maestroedit.php?cod_casointerh=".Get('cod_casointerh')."&cod_pacienteinterh=".Get('cod_casointerh')."'});\" data-original-title=\"Servicio de Ambulancia\"><img src='images/icon/033-hospital.png' width='25' height='27'></a>";
		$notas ="<a class=\"btn btn-default ew-add-edit ew-add\" title=\"Notas\" data-table=\"servicio_ambulancia\" data-caption=\"<img src='images/icon/025-folder.png' width='40' height='45'></br>Notas\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'interh_seguimientoadd.php?cod_casointerh=".Get('cod_casointerh')."&cod_pacienteinterh=".Get('cod_casointerh')."'});\" data-original-title=\"Notas\"><img src='images/icon/025-folder.png' width='25' height='27'></a>";
		$header = $paciente.$evaluacion.$ambulancia.$hospital.$notas.$cierre_caso;
	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

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
} // End class
?>