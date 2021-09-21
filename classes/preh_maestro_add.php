<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_maestro_add extends preh_maestro
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_maestro';

	// Page object name
	public $PageObjName = "preh_maestro_add";

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

		// Table object (preh_maestro)
		if (!isset($GLOBALS["preh_maestro"]) || get_class($GLOBALS["preh_maestro"]) == PROJECT_NAMESPACE . "preh_maestro") {
			$GLOBALS["preh_maestro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["preh_maestro"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'preh_maestro');

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
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $preh_maestro;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($preh_maestro);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
					if ($pageName == "preh_maestroview.php")
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
			$key .= @$ar['cod_casopreh'];
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
					$this->terminate(GetUrl("preh_maestrolist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->cod_casopreh->Visible = FALSE;
		$this->fecha->setVisibility();
		$this->tiempo->setVisibility();
		$this->llamada_fallida->setVisibility();
		$this->longitud->setVisibility();
		$this->latitud->setVisibility();
		$this->quepasa->setVisibility();
		$this->direccion->setVisibility();
		$this->estado_llamada->setVisibility();
		$this->incidente->setVisibility();
		$this->prioridad->setVisibility();
		$this->accion->setVisibility();
		$this->estado->setVisibility();
		$this->cierre->setVisibility();
		$this->caso_multiple->setVisibility();
		$this->paciente->setVisibility();
		$this->evaluacion->setVisibility();
		$this->sede->setVisibility();
		$this->fecha_llamada->Visible = FALSE;
		$this->hospital_destino->setVisibility();
		$this->nombre_medico->setVisibility();
		$this->nombre_confirma->setVisibility();
		$this->telefono_confirma->setVisibility();
		$this->telefono->setVisibility();
		$this->nombre_reporta->setVisibility();
		$this->distrito->setVisibility();
		$this->descripcion->setVisibility();
		$this->observacion->setVisibility();
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
		$this->setupLookupOptions($this->llamada_fallida);
		$this->setupLookupOptions($this->incidente);
		$this->setupLookupOptions($this->prioridad);
		$this->setupLookupOptions($this->accion);
		$this->setupLookupOptions($this->hospital_destino);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_maestrolist.php");
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
			if (Get("cod_casopreh") !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Get("cod_casopreh"));
				$this->setKey("cod_casopreh", $this->cod_casopreh->CurrentValue); // Set up key
			} else {
				$this->setKey("cod_casopreh", ""); // Clear key
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
					$this->terminate("preh_maestrolist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "preh_maestrolist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "preh_maestroview.php")
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
		$this->cod_casopreh->CurrentValue = NULL;
		$this->cod_casopreh->OldValue = $this->cod_casopreh->CurrentValue;
		$this->fecha->CurrentValue = NULL;
		$this->fecha->OldValue = $this->fecha->CurrentValue;
		$this->tiempo->CurrentValue = NULL;
		$this->tiempo->OldValue = $this->tiempo->CurrentValue;
		$this->llamada_fallida->CurrentValue = NULL;
		$this->llamada_fallida->OldValue = $this->llamada_fallida->CurrentValue;
		$this->longitud->CurrentValue = NULL;
		$this->longitud->OldValue = $this->longitud->CurrentValue;
		$this->latitud->CurrentValue = NULL;
		$this->latitud->OldValue = $this->latitud->CurrentValue;
		$this->quepasa->CurrentValue = NULL;
		$this->quepasa->OldValue = $this->quepasa->CurrentValue;
		$this->direccion->CurrentValue = NULL;
		$this->direccion->OldValue = $this->direccion->CurrentValue;
		$this->estado_llamada->CurrentValue = NULL;
		$this->estado_llamada->OldValue = $this->estado_llamada->CurrentValue;
		$this->incidente->CurrentValue = NULL;
		$this->incidente->OldValue = $this->incidente->CurrentValue;
		$this->prioridad->CurrentValue = NULL;
		$this->prioridad->OldValue = $this->prioridad->CurrentValue;
		$this->accion->CurrentValue = NULL;
		$this->accion->OldValue = $this->accion->CurrentValue;
		$this->estado->CurrentValue = 1;
		//$this->estado->OldValue = $this->estado->CurrentValue;
		$this->cierre->CurrentValue = 0;
		$this->caso_multiple->CurrentValue = 0;
		$this->paciente->CurrentValue = NULL;
		$this->paciente->OldValue = $this->paciente->CurrentValue;
		$this->evaluacion->CurrentValue = NULL;
		$this->evaluacion->OldValue = $this->evaluacion->CurrentValue;
		$this->sede->CurrentValue = NULL;
		$this->sede->OldValue = $this->sede->CurrentValue;
		$this->fecha_llamada->CurrentValue = NULL;
		$this->fecha_llamada->OldValue = $this->fecha_llamada->CurrentValue;
		$this->hospital_destino->CurrentValue = NULL;
		$this->hospital_destino->OldValue = $this->hospital_destino->CurrentValue;
		$this->nombre_medico->CurrentValue = NULL;
		$this->nombre_medico->OldValue = $this->nombre_medico->CurrentValue;
		$this->nombre_confirma->CurrentValue = NULL;
		$this->nombre_confirma->OldValue = $this->nombre_confirma->CurrentValue;
		$this->telefono_confirma->CurrentValue = NULL;
		$this->telefono_confirma->OldValue = $this->telefono_confirma->CurrentValue;
		$this->telefono->CurrentValue = NULL;
		$this->telefono->OldValue = $this->telefono->CurrentValue;
		$this->nombre_reporta->CurrentValue = NULL;
		$this->nombre_reporta->OldValue = $this->nombre_reporta->CurrentValue;
		$this->distrito->CurrentValue = NULL;
		$this->distrito->OldValue = $this->distrito->CurrentValue;
		$this->descripcion->CurrentValue = NULL;
		$this->descripcion->OldValue = $this->descripcion->CurrentValue;
		$this->observacion->CurrentValue = NULL;
		$this->observacion->OldValue = $this->observacion->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'fecha' first before field var 'x_fecha'
		$val = $CurrentForm->hasValue("fecha") ? $CurrentForm->getValue("fecha") : $CurrentForm->getValue("x_fecha");
		if (!$this->fecha->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha->Visible = FALSE; // Disable update for API request
			else
				$this->fecha->setFormValue($val);
			$this->fecha->CurrentValue = UnFormatDateTime($this->fecha->CurrentValue, 109);
		}

		// Check field name 'tiempo' first before field var 'x_tiempo'
		$val = $CurrentForm->hasValue("tiempo") ? $CurrentForm->getValue("tiempo") : $CurrentForm->getValue("x_tiempo");
		if (!$this->tiempo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tiempo->Visible = FALSE; // Disable update for API request
			else
				$this->tiempo->setFormValue($val);
		}

		// Check field name 'llamada_fallida' first before field var 'x_llamada_fallida'
		$val = $CurrentForm->hasValue("llamada_fallida") ? $CurrentForm->getValue("llamada_fallida") : $CurrentForm->getValue("x_llamada_fallida");
		if (!$this->llamada_fallida->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->llamada_fallida->Visible = FALSE; // Disable update for API request
			else
				$this->llamada_fallida->setFormValue($val);
		}

		// Check field name 'longitud' first before field var 'x_longitud'
		$val = $CurrentForm->hasValue("longitud") ? $CurrentForm->getValue("longitud") : $CurrentForm->getValue("x_longitud");
		if (!$this->longitud->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->longitud->Visible = FALSE; // Disable update for API request
			else
				$this->longitud->setFormValue($val);
		}

		// Check field name 'latitud' first before field var 'x_latitud'
		$val = $CurrentForm->hasValue("latitud") ? $CurrentForm->getValue("latitud") : $CurrentForm->getValue("x_latitud");
		if (!$this->latitud->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->latitud->Visible = FALSE; // Disable update for API request
			else
				$this->latitud->setFormValue($val);
		}

		// Check field name 'quepasa' first before field var 'x_quepasa'
		$val = $CurrentForm->hasValue("quepasa") ? $CurrentForm->getValue("quepasa") : $CurrentForm->getValue("x_quepasa");
		if (!$this->quepasa->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->quepasa->Visible = FALSE; // Disable update for API request
			else
				$this->quepasa->setFormValue($val);
		}

		// Check field name 'direccion' first before field var 'x_direccion'
		$val = $CurrentForm->hasValue("direccion") ? $CurrentForm->getValue("direccion") : $CurrentForm->getValue("x_direccion");
		if (!$this->direccion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->direccion->Visible = FALSE; // Disable update for API request
			else
				$this->direccion->setFormValue($val);
		}

		// Check field name 'estado_llamada' first before field var 'x_estado_llamada'
		$val = $CurrentForm->hasValue("estado_llamada") ? $CurrentForm->getValue("estado_llamada") : $CurrentForm->getValue("x_estado_llamada");
		if (!$this->estado_llamada->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->estado_llamada->Visible = FALSE; // Disable update for API request
			else
				$this->estado_llamada->setFormValue($val);
		}

		// Check field name 'incidente' first before field var 'x_incidente'
		$val = $CurrentForm->hasValue("incidente") ? $CurrentForm->getValue("incidente") : $CurrentForm->getValue("x_incidente");
		if (!$this->incidente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->incidente->Visible = FALSE; // Disable update for API request
			else
				$this->incidente->setFormValue($val);
		}

		// Check field name 'prioridad' first before field var 'x_prioridad'
		$val = $CurrentForm->hasValue("prioridad") ? $CurrentForm->getValue("prioridad") : $CurrentForm->getValue("x_prioridad");
		if (!$this->prioridad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->prioridad->Visible = FALSE; // Disable update for API request
			else
				$this->prioridad->setFormValue($val);
		}

		// Check field name 'accion' first before field var 'x_accion'
		$val = $CurrentForm->hasValue("accion") ? $CurrentForm->getValue("accion") : $CurrentForm->getValue("x_accion");
		if (!$this->accion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->accion->Visible = FALSE; // Disable update for API request
			else
				$this->accion->setFormValue($val);
		}

		// Check field name 'estado' first before field var 'x_estado'
		$val = $CurrentForm->hasValue("estado") ? $CurrentForm->getValue("estado") : $CurrentForm->getValue("x_estado");
		if (!$this->estado->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->estado->Visible = FALSE; // Disable update for API request
			else
				$this->estado->setFormValue($val);
		}

		// Check field name 'cierre' first before field var 'x_cierre'
		$val = $CurrentForm->hasValue("cierre") ? $CurrentForm->getValue("cierre") : $CurrentForm->getValue("x_cierre");
		if (!$this->cierre->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cierre->Visible = FALSE; // Disable update for API request
			else
				$this->cierre->setFormValue($val);
		}

		// Check field name 'caso_multiple' first before field var 'x_caso_multiple'
		$val = $CurrentForm->hasValue("caso_multiple") ? $CurrentForm->getValue("caso_multiple") : $CurrentForm->getValue("x_caso_multiple");
		if (!$this->caso_multiple->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->caso_multiple->Visible = FALSE; // Disable update for API request
			else
				$this->caso_multiple->setFormValue($val);
		}

		// Check field name 'paciente' first before field var 'x_paciente'
		$val = $CurrentForm->hasValue("paciente") ? $CurrentForm->getValue("paciente") : $CurrentForm->getValue("x_paciente");
		if (!$this->paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->paciente->Visible = FALSE; // Disable update for API request
			else
				$this->paciente->setFormValue($val);
		}

		// Check field name 'evaluacion' first before field var 'x_evaluacion'
		$val = $CurrentForm->hasValue("evaluacion") ? $CurrentForm->getValue("evaluacion") : $CurrentForm->getValue("x_evaluacion");
		if (!$this->evaluacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->evaluacion->Visible = FALSE; // Disable update for API request
			else
				$this->evaluacion->setFormValue($val);
		}

		// Check field name 'sede' first before field var 'x_sede'
		$val = $CurrentForm->hasValue("sede") ? $CurrentForm->getValue("sede") : $CurrentForm->getValue("x_sede");
		if (!$this->sede->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sede->Visible = FALSE; // Disable update for API request
			else
				$this->sede->setFormValue($val);
		}

		// Check field name 'hospital_destino' first before field var 'x_hospital_destino'
		$val = $CurrentForm->hasValue("hospital_destino") ? $CurrentForm->getValue("hospital_destino") : $CurrentForm->getValue("x_hospital_destino");
		if (!$this->hospital_destino->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hospital_destino->Visible = FALSE; // Disable update for API request
			else
				$this->hospital_destino->setFormValue($val);
		}

		// Check field name 'nombre_medico' first before field var 'x_nombre_medico'
		$val = $CurrentForm->hasValue("nombre_medico") ? $CurrentForm->getValue("nombre_medico") : $CurrentForm->getValue("x_nombre_medico");
		if (!$this->nombre_medico->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_medico->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_medico->setFormValue($val);
		}

		// Check field name 'nombre_confirma' first before field var 'x_nombre_confirma'
		$val = $CurrentForm->hasValue("nombre_confirma") ? $CurrentForm->getValue("nombre_confirma") : $CurrentForm->getValue("x_nombre_confirma");
		if (!$this->nombre_confirma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_confirma->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_confirma->setFormValue($val);
		}

		// Check field name 'telefono_confirma' first before field var 'x_telefono_confirma'
		$val = $CurrentForm->hasValue("telefono_confirma") ? $CurrentForm->getValue("telefono_confirma") : $CurrentForm->getValue("x_telefono_confirma");
		if (!$this->telefono_confirma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono_confirma->Visible = FALSE; // Disable update for API request
			else
				$this->telefono_confirma->setFormValue($val);
		}

		// Check field name 'telefono' first before field var 'x_telefono'
		$val = $CurrentForm->hasValue("telefono") ? $CurrentForm->getValue("telefono") : $CurrentForm->getValue("x_telefono");
		if (!$this->telefono->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono->Visible = FALSE; // Disable update for API request
			else
				$this->telefono->setFormValue($val);
		}

		// Check field name 'nombre_reporta' first before field var 'x_nombre_reporta'
		$val = $CurrentForm->hasValue("nombre_reporta") ? $CurrentForm->getValue("nombre_reporta") : $CurrentForm->getValue("x_nombre_reporta");
		if (!$this->nombre_reporta->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nombre_reporta->Visible = FALSE; // Disable update for API request
			else
				$this->nombre_reporta->setFormValue($val);
		}

		// Check field name 'distrito' first before field var 'x_distrito'
		$val = $CurrentForm->hasValue("distrito") ? $CurrentForm->getValue("distrito") : $CurrentForm->getValue("x_distrito");
		if (!$this->distrito->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->distrito->Visible = FALSE; // Disable update for API request
			else
				$this->distrito->setFormValue($val);
		}

		// Check field name 'descripcion' first before field var 'x_descripcion'
		$val = $CurrentForm->hasValue("descripcion") ? $CurrentForm->getValue("descripcion") : $CurrentForm->getValue("x_descripcion");
		if (!$this->descripcion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->descripcion->Visible = FALSE; // Disable update for API request
			else
				$this->descripcion->setFormValue($val);
		}

		// Check field name 'observacion' first before field var 'x_observacion'
		$val = $CurrentForm->hasValue("observacion") ? $CurrentForm->getValue("observacion") : $CurrentForm->getValue("x_observacion");
		if (!$this->observacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->observacion->Visible = FALSE; // Disable update for API request
			else
				$this->observacion->setFormValue($val);
		}

		// Check field name 'cod_casopreh' first before field var 'x_cod_casopreh'
		$val = $CurrentForm->hasValue("cod_casopreh") ? $CurrentForm->getValue("cod_casopreh") : $CurrentForm->getValue("x_cod_casopreh");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->fecha->CurrentValue = $this->fecha->FormValue;
		$this->fecha->CurrentValue = UnFormatDateTime($this->fecha->CurrentValue, 109);
		$this->tiempo->CurrentValue = $this->tiempo->FormValue;
		$this->llamada_fallida->CurrentValue = $this->llamada_fallida->FormValue;
		$this->longitud->CurrentValue = $this->longitud->FormValue;
		$this->latitud->CurrentValue = $this->latitud->FormValue;
		$this->quepasa->CurrentValue = $this->quepasa->FormValue;
		$this->direccion->CurrentValue = $this->direccion->FormValue;
		$this->estado_llamada->CurrentValue = $this->estado_llamada->FormValue;
		$this->incidente->CurrentValue = $this->incidente->FormValue;
		$this->prioridad->CurrentValue = $this->prioridad->FormValue;
		$this->accion->CurrentValue = $this->accion->FormValue;
		$this->estado->CurrentValue = $this->estado->FormValue;
		$this->cierre->CurrentValue = $this->cierre->FormValue;
		$this->caso_multiple->CurrentValue = $this->caso_multiple->FormValue;
		$this->paciente->CurrentValue = $this->paciente->FormValue;
		$this->evaluacion->CurrentValue = $this->evaluacion->FormValue;
		$this->sede->CurrentValue = $this->sede->FormValue;
		$this->hospital_destino->CurrentValue = $this->hospital_destino->FormValue;
		$this->nombre_medico->CurrentValue = $this->nombre_medico->FormValue;
		$this->nombre_confirma->CurrentValue = $this->nombre_confirma->FormValue;
		$this->telefono_confirma->CurrentValue = $this->telefono_confirma->FormValue;
		$this->telefono->CurrentValue = $this->telefono->FormValue;
		$this->nombre_reporta->CurrentValue = $this->nombre_reporta->FormValue;
		$this->distrito->CurrentValue = $this->distrito->FormValue;
		$this->descripcion->CurrentValue = $this->descripcion->FormValue;
		$this->observacion->CurrentValue = $this->observacion->FormValue;
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
		$this->cod_casopreh->setDbValue($row['cod_casopreh']);
		$this->fecha->setDbValue($row['fecha']);
		$this->tiempo->setDbValue($row['tiempo']);
		$this->llamada_fallida->setDbValue($row['llamada_fallida']);
		$this->longitud->setDbValue($row['longitud']);
		$this->latitud->setDbValue($row['latitud']);
		$this->quepasa->setDbValue($row['quepasa']);
		$this->direccion->setDbValue($row['direccion']);
		$this->estado_llamada->setDbValue($row['estado_llamada']);
		$this->incidente->setDbValue($row['incidente']);
		$this->prioridad->setDbValue($row['prioridad']);
		$this->accion->setDbValue($row['accion']);
		$this->estado->setDbValue($row['estado']);
		$this->cierre->setDbValue($row['cierre']);
		$this->caso_multiple->setDbValue($row['caso_multiple']);
		$this->paciente->setDbValue($row['paciente']);
		$this->evaluacion->setDbValue($row['evaluacion']);
		$this->sede->setDbValue($row['sede']);
		$this->fecha_llamada->setDbValue($row['fecha_llamada']);
		$this->hospital_destino->setDbValue($row['hospital_destino']);
		$this->nombre_medico->setDbValue($row['nombre_medico']);
		$this->nombre_confirma->setDbValue($row['nombre_confirma']);
		$this->telefono_confirma->setDbValue($row['telefono_confirma']);
		$this->telefono->setDbValue($row['telefono']);
		$this->nombre_reporta->setDbValue($row['nombre_reporta']);
		$this->distrito->setDbValue($row['distrito']);
		$this->descripcion->setDbValue($row['descripcion']);
		$this->observacion->setDbValue($row['observacion']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['cod_casopreh'] = $this->cod_casopreh->CurrentValue;
		$row['fecha'] = $this->fecha->CurrentValue;
		$row['tiempo'] = $this->tiempo->CurrentValue;
		$row['llamada_fallida'] = $this->llamada_fallida->CurrentValue;
		$row['longitud'] = $this->longitud->CurrentValue;
		$row['latitud'] = $this->latitud->CurrentValue;
		$row['quepasa'] = $this->quepasa->CurrentValue;
		$row['direccion'] = $this->direccion->CurrentValue;
		$row['estado_llamada'] = $this->estado_llamada->CurrentValue;
		$row['incidente'] = $this->incidente->CurrentValue;
		$row['prioridad'] = $this->prioridad->CurrentValue;
		$row['accion'] = $this->accion->CurrentValue;
		$row['estado'] = $this->estado->CurrentValue;
		$row['cierre'] = $this->cierre->CurrentValue;
		$row['caso_multiple'] = $this->caso_multiple->CurrentValue;
		$row['paciente'] = $this->paciente->CurrentValue;
		$row['evaluacion'] = $this->evaluacion->CurrentValue;
		$row['sede'] = $this->sede->CurrentValue;
		$row['fecha_llamada'] = $this->fecha_llamada->CurrentValue;
		$row['hospital_destino'] = $this->hospital_destino->CurrentValue;
		$row['nombre_medico'] = $this->nombre_medico->CurrentValue;
		$row['nombre_confirma'] = $this->nombre_confirma->CurrentValue;
		$row['telefono_confirma'] = $this->telefono_confirma->CurrentValue;
		$row['telefono'] = $this->telefono->CurrentValue;
		$row['nombre_reporta'] = $this->nombre_reporta->CurrentValue;
		$row['distrito'] = $this->distrito->CurrentValue;
		$row['descripcion'] = $this->descripcion->CurrentValue;
		$row['observacion'] = $this->observacion->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("cod_casopreh")) != "")
			$this->cod_casopreh->OldValue = $this->getKey("cod_casopreh"); // cod_casopreh
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
		// Convert decimal values if posted back

		if ($this->tiempo->FormValue == $this->tiempo->CurrentValue && is_numeric(ConvertToFloatString($this->tiempo->CurrentValue)))
			$this->tiempo->CurrentValue = ConvertToFloatString($this->tiempo->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// cod_casopreh
		// fecha
		// tiempo
		// llamada_fallida
		// longitud
		// latitud
		// quepasa
		// direccion
		// estado_llamada
		// incidente
		// prioridad
		// accion
		// estado
		// cierre
		// caso_multiple
		// paciente
		// evaluacion
		// sede
		// fecha_llamada
		// hospital_destino
		// nombre_medico
		// nombre_confirma
		// telefono_confirma
		// telefono
		// nombre_reporta
		// distrito
		// descripcion
		// observacion

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// cod_casopreh
			$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
			$this->cod_casopreh->CssClass = "font-weight-bold";
			$this->cod_casopreh->CellCssStyle .= "text-align: center;";
			$this->cod_casopreh->ViewCustomAttributes = "";

			// fecha
			$this->fecha->ViewValue = $this->fecha->CurrentValue;
			$this->fecha->ViewValue = FormatDateTime($this->fecha->ViewValue, 109);
			$this->fecha->ViewCustomAttributes = "";

			// tiempo
			$this->tiempo->ViewValue = $this->tiempo->CurrentValue;
			$this->tiempo->ViewValue = FormatNumber($this->tiempo->ViewValue, 2, -2, -2, -2);
			$this->tiempo->ViewCustomAttributes = "";

			// llamada_fallida
			$curVal = strval($this->llamada_fallida->CurrentValue);
			if ($curVal != "") {
				$this->llamada_fallida->ViewValue = $this->llamada_fallida->lookupCacheOption($curVal);
				if ($this->llamada_fallida->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_llamda_f\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->llamada_fallida->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->llamada_fallida->ViewValue = $this->llamada_fallida->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->llamada_fallida->ViewValue = $this->llamada_fallida->CurrentValue;
					}
				}
			} else {
				$this->llamada_fallida->ViewValue = NULL;
			}
			$this->llamada_fallida->ViewCustomAttributes = "";

			// longitud
			$this->longitud->ViewValue = $this->longitud->CurrentValue;
			$this->longitud->ViewCustomAttributes = "";

			// latitud
			$this->latitud->ViewValue = $this->latitud->CurrentValue;
			$this->latitud->ViewCustomAttributes = "";

			// quepasa
			$this->quepasa->ViewValue = $this->quepasa->CurrentValue;
			$this->quepasa->ViewCustomAttributes = "";

			// direccion
			$this->direccion->ViewValue = $this->direccion->CurrentValue;
			$this->direccion->ViewCustomAttributes = "";

			// estado_llamada
			$this->estado_llamada->ViewCustomAttributes = "";

			// incidente
			$curVal = strval($this->incidente->CurrentValue);
			if ($curVal != "") {
				$this->incidente->ViewValue = $this->incidente->lookupCacheOption($curVal);
				if ($this->incidente->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_incidente\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->incidente->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->incidente->ViewValue = $this->incidente->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->incidente->ViewValue = $this->incidente->CurrentValue;
					}
				}
			} else {
				$this->incidente->ViewValue = NULL;
			}
			$this->incidente->ViewCustomAttributes = "";

			// prioridad
			$curVal = strval($this->prioridad->CurrentValue);
			if ($curVal != "") {
				$this->prioridad->ViewValue = $this->prioridad->lookupCacheOption($curVal);
				if ($this->prioridad->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_prioridad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->prioridad->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->prioridad->ViewValue = $this->prioridad->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->prioridad->ViewValue = $this->prioridad->CurrentValue;
					}
				}
			} else {
				$this->prioridad->ViewValue = NULL;
			}
			$this->prioridad->CellCssStyle .= "text-align: center;";
			$this->prioridad->ViewCustomAttributes = "";

			// accion
			$curVal = strval($this->accion->CurrentValue);
			if ($curVal != "") {
				$this->accion->ViewValue = $this->accion->lookupCacheOption($curVal);
				if ($this->accion->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_accion\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->accion->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->accion->ViewValue = $this->accion->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->accion->ViewValue = $this->accion->CurrentValue;
					}
				}
			} else {
				$this->accion->ViewValue = NULL;
			}
			$this->accion->ViewCustomAttributes = "";

			// estado
			$this->estado->ViewValue = $this->estado->CurrentValue;
			$this->estado->ViewValue = FormatNumber($this->estado->ViewValue, 0, -2, -2, -2);
			$this->estado->ViewCustomAttributes = "";

			// cierre
			$this->cierre->ViewValue = $this->cierre->CurrentValue;
			$this->cierre->ViewValue = FormatNumber($this->cierre->ViewValue, 0, -2, -2, -2);
			$this->cierre->ViewCustomAttributes = "";

			// caso_multiple
			$this->caso_multiple->ViewValue = $this->caso_multiple->CurrentValue;
			$this->caso_multiple->ViewValue = FormatNumber($this->caso_multiple->ViewValue, 0, -2, -2, -2);
			$this->caso_multiple->ViewCustomAttributes = "";

			// paciente
			$this->paciente->ViewValue = $this->paciente->CurrentValue;
			$this->paciente->ViewCustomAttributes = "";

			// evaluacion
			$this->evaluacion->ViewValue = $this->evaluacion->CurrentValue;
			$this->evaluacion->ViewCustomAttributes = "";

			// sede
			$this->sede->ViewValue = $this->sede->CurrentValue;
			$this->sede->ViewValue = FormatNumber($this->sede->ViewValue, 0, -2, -2, -2);
			$this->sede->ViewCustomAttributes = "";

			// fecha_llamada
			$this->fecha_llamada->ViewValue = $this->fecha_llamada->CurrentValue;
			$this->fecha_llamada->ViewValue = FormatDateTime($this->fecha_llamada->ViewValue, 0);
			$this->fecha_llamada->ViewCustomAttributes = "";

			// hospital_destino
			$curVal = strval($this->hospital_destino->CurrentValue);
			if ($curVal != "") {
				$this->hospital_destino->ViewValue = $this->hospital_destino->lookupCacheOption($curVal);
				if ($this->hospital_destino->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_hospital\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->hospital_destino->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->hospital_destino->ViewValue = $this->hospital_destino->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->hospital_destino->ViewValue = $this->hospital_destino->CurrentValue;
					}
				}
			} else {
				$this->hospital_destino->ViewValue = NULL;
			}
			$this->hospital_destino->ViewCustomAttributes = "";

			// nombre_medico
			$this->nombre_medico->ViewValue = $this->nombre_medico->CurrentValue;
			$this->nombre_medico->ViewCustomAttributes = "";

			// nombre_confirma
			$this->nombre_confirma->ViewValue = $this->nombre_confirma->CurrentValue;
			$this->nombre_confirma->ViewCustomAttributes = "";

			// telefono_confirma
			$this->telefono_confirma->ViewValue = $this->telefono_confirma->CurrentValue;
			$this->telefono_confirma->ViewCustomAttributes = "";

			// telefono
			$this->telefono->ViewValue = $this->telefono->CurrentValue;
			$this->telefono->ViewCustomAttributes = "";

			// nombre_reporta
			$this->nombre_reporta->ViewValue = $this->nombre_reporta->CurrentValue;
			$this->nombre_reporta->ViewCustomAttributes = "";

			// distrito
			$this->distrito->ViewValue = $this->distrito->CurrentValue;
			$this->distrito->ViewCustomAttributes = "";

			// descripcion
			$this->descripcion->ViewValue = $this->descripcion->CurrentValue;
			$this->descripcion->ViewCustomAttributes = "";

			// observacion
			$this->observacion->ViewValue = $this->observacion->CurrentValue;
			$this->observacion->ViewCustomAttributes = "";

			// fecha
			$this->fecha->LinkCustomAttributes = "";
			$this->fecha->HrefValue = "";
			$this->fecha->TooltipValue = "";

			// tiempo
			$this->tiempo->LinkCustomAttributes = "";
			$this->tiempo->HrefValue = "";
			$this->tiempo->TooltipValue = "";

			// llamada_fallida
			$this->llamada_fallida->LinkCustomAttributes = "";
			$this->llamada_fallida->HrefValue = "";
			$this->llamada_fallida->TooltipValue = "";

			// longitud
			$this->longitud->LinkCustomAttributes = "";
			$this->longitud->HrefValue = "";
			$this->longitud->TooltipValue = "";

			// latitud
			$this->latitud->LinkCustomAttributes = "";
			$this->latitud->HrefValue = "";
			$this->latitud->TooltipValue = "";

			// quepasa
			$this->quepasa->LinkCustomAttributes = "";
			$this->quepasa->HrefValue = "";
			$this->quepasa->TooltipValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";
			$this->direccion->TooltipValue = "";

			// estado_llamada
			$this->estado_llamada->LinkCustomAttributes = "";
			$this->estado_llamada->HrefValue = "";
			$this->estado_llamada->TooltipValue = "";

			// incidente
			$this->incidente->LinkCustomAttributes = "";
			$this->incidente->HrefValue = "";
			$this->incidente->TooltipValue = "";

			// prioridad
			$this->prioridad->LinkCustomAttributes = "";
			$this->prioridad->HrefValue = "";
			$this->prioridad->TooltipValue = "";

			// accion
			$this->accion->LinkCustomAttributes = "";
			$this->accion->HrefValue = "";
			$this->accion->TooltipValue = "";

			// estado
			$this->estado->LinkCustomAttributes = "";
			$this->estado->HrefValue = "";
			$this->estado->TooltipValue = "";

			// cierre
			$this->cierre->LinkCustomAttributes = "";
			$this->cierre->HrefValue = "";
			$this->cierre->TooltipValue = "";

			// caso_multiple
			$this->caso_multiple->LinkCustomAttributes = "";
			$this->caso_multiple->HrefValue = "";
			$this->caso_multiple->TooltipValue = "";

			// paciente
			$this->paciente->LinkCustomAttributes = "";
			$this->paciente->HrefValue = "";
			$this->paciente->TooltipValue = "";

			// evaluacion
			$this->evaluacion->LinkCustomAttributes = "";
			$this->evaluacion->HrefValue = "";
			$this->evaluacion->TooltipValue = "";

			// sede
			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";
			$this->sede->TooltipValue = "";

			// hospital_destino
			$this->hospital_destino->LinkCustomAttributes = "";
			$this->hospital_destino->HrefValue = "";
			$this->hospital_destino->TooltipValue = "";

			// nombre_medico
			$this->nombre_medico->LinkCustomAttributes = "";
			$this->nombre_medico->HrefValue = "";
			$this->nombre_medico->TooltipValue = "";

			// nombre_confirma
			$this->nombre_confirma->LinkCustomAttributes = "";
			$this->nombre_confirma->HrefValue = "";
			$this->nombre_confirma->TooltipValue = "";

			// telefono_confirma
			$this->telefono_confirma->LinkCustomAttributes = "";
			$this->telefono_confirma->HrefValue = "";
			$this->telefono_confirma->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";
			$this->nombre_reporta->TooltipValue = "";

			// distrito
			$this->distrito->LinkCustomAttributes = "";
			$this->distrito->HrefValue = "";
			$this->distrito->TooltipValue = "";

			// descripcion
			$this->descripcion->LinkCustomAttributes = "";
			$this->descripcion->HrefValue = "";
			$this->descripcion->TooltipValue = "";

			// observacion
			$this->observacion->LinkCustomAttributes = "";
			$this->observacion->HrefValue = "";
			$this->observacion->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// fecha
			// tiempo

			$this->tiempo->EditAttrs["class"] = "form-control";
			$this->tiempo->EditCustomAttributes = "";
			$this->tiempo->EditValue = HtmlEncode($this->tiempo->CurrentValue);
			$this->tiempo->PlaceHolder = RemoveHtml($this->tiempo->caption());
			if (strval($this->tiempo->EditValue) != "" && is_numeric($this->tiempo->EditValue))
				$this->tiempo->EditValue = FormatNumber($this->tiempo->EditValue, -2, -2, -2, -2);
			

			// llamada_fallida
			$this->llamada_fallida->EditAttrs["class"] = "form-control";
			$this->llamada_fallida->EditCustomAttributes = "";
			$curVal = trim(strval($this->llamada_fallida->CurrentValue));
			if ($curVal != "")
				$this->llamada_fallida->ViewValue = $this->llamada_fallida->lookupCacheOption($curVal);
			else
				$this->llamada_fallida->ViewValue = $this->llamada_fallida->Lookup !== NULL && is_array($this->llamada_fallida->Lookup->Options) ? $curVal : NULL;
			if ($this->llamada_fallida->ViewValue !== NULL) { // Load from cache
				$this->llamada_fallida->EditValue = array_values($this->llamada_fallida->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_llamda_f\"" . SearchString("=", $this->llamada_fallida->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->llamada_fallida->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->llamada_fallida->EditValue = $arwrk;
			}

			// longitud
			$this->longitud->EditAttrs["class"] = "form-control";
			$this->longitud->EditCustomAttributes = "";
			if (!$this->longitud->Raw)
				$this->longitud->CurrentValue = HtmlDecode($this->longitud->CurrentValue);
			$this->longitud->EditValue = HtmlEncode($this->longitud->CurrentValue);
			$this->longitud->PlaceHolder = RemoveHtml($this->longitud->caption());

			// latitud
			$this->latitud->EditAttrs["class"] = "form-control";
			$this->latitud->EditCustomAttributes = "";
			if (!$this->latitud->Raw)
				$this->latitud->CurrentValue = HtmlDecode($this->latitud->CurrentValue);
			$this->latitud->EditValue = HtmlEncode($this->latitud->CurrentValue);
			$this->latitud->PlaceHolder = RemoveHtml($this->latitud->caption());

			// quepasa
			$this->quepasa->EditAttrs["class"] = "form-control";
			$this->quepasa->EditCustomAttributes = "";
			$this->quepasa->EditValue = HtmlEncode($this->quepasa->CurrentValue);
			$this->quepasa->PlaceHolder = RemoveHtml($this->quepasa->caption());

			// direccion
			$this->direccion->EditAttrs["class"] = "form-control";
			$this->direccion->EditCustomAttributes = "";
			if (!$this->direccion->Raw)
				$this->direccion->CurrentValue = HtmlDecode($this->direccion->CurrentValue);
			$this->direccion->EditValue = HtmlEncode($this->direccion->CurrentValue);
			$this->direccion->PlaceHolder = RemoveHtml($this->direccion->caption());

			// estado_llamada
			$this->estado_llamada->EditAttrs["class"] = "form-control";
			$this->estado_llamada->EditCustomAttributes = "";

			// incidente
			$this->incidente->EditAttrs["class"] = "form-control";
			$this->incidente->EditCustomAttributes = "";
			$curVal = trim(strval($this->incidente->CurrentValue));
			if ($curVal != "")
				$this->incidente->ViewValue = $this->incidente->lookupCacheOption($curVal);
			else
				$this->incidente->ViewValue = $this->incidente->Lookup !== NULL && is_array($this->incidente->Lookup->Options) ? $curVal : NULL;
			if ($this->incidente->ViewValue !== NULL) { // Load from cache
				$this->incidente->EditValue = array_values($this->incidente->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_incidente\"" . SearchString("=", $this->incidente->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->incidente->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->incidente->EditValue = $arwrk;
			}

			// prioridad
			$this->prioridad->EditAttrs["class"] = "form-control";
			$this->prioridad->EditCustomAttributes = "";
			$curVal = trim(strval($this->prioridad->CurrentValue));
			if ($curVal != "")
				$this->prioridad->ViewValue = $this->prioridad->lookupCacheOption($curVal);
			else
				$this->prioridad->ViewValue = $this->prioridad->Lookup !== NULL && is_array($this->prioridad->Lookup->Options) ? $curVal : NULL;
			if ($this->prioridad->ViewValue !== NULL) { // Load from cache
				$this->prioridad->EditValue = array_values($this->prioridad->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_prioridad\"" . SearchString("=", $this->prioridad->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->prioridad->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->prioridad->EditValue = $arwrk;
			}

			// accion
			$this->accion->EditAttrs["class"] = "form-control";
			$this->accion->EditCustomAttributes = "";
			$curVal = trim(strval($this->accion->CurrentValue));
			if ($curVal != "")
				$this->accion->ViewValue = $this->accion->lookupCacheOption($curVal);
			else
				$this->accion->ViewValue = $this->accion->Lookup !== NULL && is_array($this->accion->Lookup->Options) ? $curVal : NULL;
			if ($this->accion->ViewValue !== NULL) { // Load from cache
				$this->accion->EditValue = array_values($this->accion->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_accion\"" . SearchString("=", $this->accion->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->accion->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->accion->EditValue = $arwrk;
			}

			// estado
			$this->estado->EditAttrs["class"] = "form-control";
			$this->estado->EditCustomAttributes = "";
			$this->estado->EditValue = HtmlEncode($this->estado->CurrentValue);
			$this->estado->PlaceHolder = RemoveHtml($this->estado->caption());

			// cierre
			$this->cierre->EditAttrs["class"] = "form-control";
			$this->cierre->EditCustomAttributes = "HIDDEN";
			$this->cierre->EditValue = HtmlEncode($this->cierre->CurrentValue);
			$this->cierre->PlaceHolder = RemoveHtml($this->cierre->caption());

			// caso_multiple
			$this->caso_multiple->EditAttrs["class"] = "form-control";
			$this->caso_multiple->EditCustomAttributes = "";
			$this->caso_multiple->EditValue = HtmlEncode($this->caso_multiple->CurrentValue);
			$this->caso_multiple->PlaceHolder = RemoveHtml($this->caso_multiple->caption());

			// paciente
			$this->paciente->EditAttrs["class"] = "form-control";
			$this->paciente->EditCustomAttributes = "";
			$this->paciente->EditValue = HtmlEncode($this->paciente->CurrentValue);
			$this->paciente->PlaceHolder = RemoveHtml($this->paciente->caption());

			// evaluacion
			$this->evaluacion->EditAttrs["class"] = "form-control";
			$this->evaluacion->EditCustomAttributes = "";
			$this->evaluacion->EditValue = HtmlEncode($this->evaluacion->CurrentValue);
			$this->evaluacion->PlaceHolder = RemoveHtml($this->evaluacion->caption());

			// sede
			$this->sede->EditAttrs["class"] = "form-control";
			$this->sede->EditCustomAttributes = "";
			$this->sede->EditValue = HtmlEncode($this->sede->CurrentValue);
			$this->sede->PlaceHolder = RemoveHtml($this->sede->caption());

			// hospital_destino
			$this->hospital_destino->EditCustomAttributes = "";
			$curVal = trim(strval($this->hospital_destino->CurrentValue));
			if ($curVal != "")
				$this->hospital_destino->ViewValue = $this->hospital_destino->lookupCacheOption($curVal);
			else
				$this->hospital_destino->ViewValue = $this->hospital_destino->Lookup !== NULL && is_array($this->hospital_destino->Lookup->Options) ? $curVal : NULL;
			if ($this->hospital_destino->ViewValue !== NULL) { // Load from cache
				$this->hospital_destino->EditValue = array_values($this->hospital_destino->Lookup->Options);
				if ($this->hospital_destino->ViewValue == "")
					$this->hospital_destino->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_hospital\"" . SearchString("=", $this->hospital_destino->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->hospital_destino->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->hospital_destino->ViewValue = $this->hospital_destino->displayValue($arwrk);
				} else {
					$this->hospital_destino->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->hospital_destino->EditValue = $arwrk;
			}

			// nombre_medico
			$this->nombre_medico->EditAttrs["class"] = "form-control";
			$this->nombre_medico->EditCustomAttributes = "";
			if (!$this->nombre_medico->Raw)
				$this->nombre_medico->CurrentValue = HtmlDecode($this->nombre_medico->CurrentValue);
			$this->nombre_medico->EditValue = HtmlEncode($this->nombre_medico->CurrentValue);
			$this->nombre_medico->PlaceHolder = RemoveHtml($this->nombre_medico->caption());

			// nombre_confirma
			$this->nombre_confirma->EditAttrs["class"] = "form-control";
			$this->nombre_confirma->EditCustomAttributes = "";
			if (!$this->nombre_confirma->Raw)
				$this->nombre_confirma->CurrentValue = HtmlDecode($this->nombre_confirma->CurrentValue);
			$this->nombre_confirma->EditValue = HtmlEncode($this->nombre_confirma->CurrentValue);
			$this->nombre_confirma->PlaceHolder = RemoveHtml($this->nombre_confirma->caption());

			// telefono_confirma
			$this->telefono_confirma->EditAttrs["class"] = "form-control";
			$this->telefono_confirma->EditCustomAttributes = "";
			if (!$this->telefono_confirma->Raw)
				$this->telefono_confirma->CurrentValue = HtmlDecode($this->telefono_confirma->CurrentValue);
			$this->telefono_confirma->EditValue = HtmlEncode($this->telefono_confirma->CurrentValue);
			$this->telefono_confirma->PlaceHolder = RemoveHtml($this->telefono_confirma->caption());

			// telefono
			$this->telefono->EditAttrs["class"] = "form-control";
			$this->telefono->EditCustomAttributes = "";
			if (!$this->telefono->Raw)
				$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
			$this->telefono->EditValue = HtmlEncode($this->telefono->CurrentValue);
			$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

			// nombre_reporta
			$this->nombre_reporta->EditAttrs["class"] = "form-control";
			$this->nombre_reporta->EditCustomAttributes = "";
			if (!$this->nombre_reporta->Raw)
				$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
			$this->nombre_reporta->EditValue = HtmlEncode($this->nombre_reporta->CurrentValue);
			$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

			// distrito
			$this->distrito->EditAttrs["class"] = "form-control";
			$this->distrito->EditCustomAttributes = "";
			if (!$this->distrito->Raw)
				$this->distrito->CurrentValue = HtmlDecode($this->distrito->CurrentValue);
			$this->distrito->EditValue = HtmlEncode($this->distrito->CurrentValue);
			$this->distrito->PlaceHolder = RemoveHtml($this->distrito->caption());

			// descripcion
			$this->descripcion->EditAttrs["class"] = "form-control";
			$this->descripcion->EditCustomAttributes = "";
			$this->descripcion->EditValue = HtmlEncode($this->descripcion->CurrentValue);
			$this->descripcion->PlaceHolder = RemoveHtml($this->descripcion->caption());

			// observacion
			$this->observacion->EditAttrs["class"] = "form-control";
			$this->observacion->EditCustomAttributes = "";
			$this->observacion->EditValue = HtmlEncode($this->observacion->CurrentValue);
			$this->observacion->PlaceHolder = RemoveHtml($this->observacion->caption());

			// Add refer script
			// fecha

			$this->fecha->LinkCustomAttributes = "";
			$this->fecha->HrefValue = "";

			// tiempo
			$this->tiempo->LinkCustomAttributes = "";
			$this->tiempo->HrefValue = "";

			// llamada_fallida
			$this->llamada_fallida->LinkCustomAttributes = "";
			$this->llamada_fallida->HrefValue = "";

			// longitud
			$this->longitud->LinkCustomAttributes = "";
			$this->longitud->HrefValue = "";

			// latitud
			$this->latitud->LinkCustomAttributes = "";
			$this->latitud->HrefValue = "";

			// quepasa
			$this->quepasa->LinkCustomAttributes = "";
			$this->quepasa->HrefValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";

			// estado_llamada
			$this->estado_llamada->LinkCustomAttributes = "";
			$this->estado_llamada->HrefValue = "";

			// incidente
			$this->incidente->LinkCustomAttributes = "";
			$this->incidente->HrefValue = "";

			// prioridad
			$this->prioridad->LinkCustomAttributes = "";
			$this->prioridad->HrefValue = "";

			// accion
			$this->accion->LinkCustomAttributes = "";
			$this->accion->HrefValue = "";

			// estado
			$this->estado->LinkCustomAttributes = "";
			$this->estado->HrefValue = "";

			// cierre
			$this->cierre->LinkCustomAttributes = "";
			$this->cierre->HrefValue = "";

			// caso_multiple
			$this->caso_multiple->LinkCustomAttributes = "";
			$this->caso_multiple->HrefValue = "";

			// paciente
			$this->paciente->LinkCustomAttributes = "";
			$this->paciente->HrefValue = "";

			// evaluacion
			$this->evaluacion->LinkCustomAttributes = "";
			$this->evaluacion->HrefValue = "";

			// sede
			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";

			// hospital_destino
			$this->hospital_destino->LinkCustomAttributes = "";
			$this->hospital_destino->HrefValue = "";

			// nombre_medico
			$this->nombre_medico->LinkCustomAttributes = "";
			$this->nombre_medico->HrefValue = "";

			// nombre_confirma
			$this->nombre_confirma->LinkCustomAttributes = "";
			$this->nombre_confirma->HrefValue = "";

			// telefono_confirma
			$this->telefono_confirma->LinkCustomAttributes = "";
			$this->telefono_confirma->HrefValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";

			// distrito
			$this->distrito->LinkCustomAttributes = "";
			$this->distrito->HrefValue = "";

			// descripcion
			$this->descripcion->LinkCustomAttributes = "";
			$this->descripcion->HrefValue = "";

			// observacion
			$this->observacion->LinkCustomAttributes = "";
			$this->observacion->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
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
		if ($this->fecha->Required) {
			if (!$this->fecha->IsDetailKey && $this->fecha->FormValue != NULL && $this->fecha->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha->caption(), $this->fecha->RequiredErrorMessage));
			}
		}
		if ($this->tiempo->Required) {
			if (!$this->tiempo->IsDetailKey && $this->tiempo->FormValue != NULL && $this->tiempo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tiempo->caption(), $this->tiempo->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->tiempo->FormValue)) {
			AddMessage($FormError, $this->tiempo->errorMessage());
		}
		if ($this->llamada_fallida->Required) {
			if (!$this->llamada_fallida->IsDetailKey && $this->llamada_fallida->FormValue != NULL && $this->llamada_fallida->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->llamada_fallida->caption(), $this->llamada_fallida->RequiredErrorMessage));
			}
		}
		if ($this->longitud->Required) {
			if (!$this->longitud->IsDetailKey && $this->longitud->FormValue != NULL && $this->longitud->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->longitud->caption(), $this->longitud->RequiredErrorMessage));
			}
		}
		if ($this->latitud->Required) {
			if (!$this->latitud->IsDetailKey && $this->latitud->FormValue != NULL && $this->latitud->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->latitud->caption(), $this->latitud->RequiredErrorMessage));
			}
		}
		if ($this->quepasa->Required) {
			if (!$this->quepasa->IsDetailKey && $this->quepasa->FormValue != NULL && $this->quepasa->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->quepasa->caption(), $this->quepasa->RequiredErrorMessage));
			}
		}
		if ($this->direccion->Required) {
			if (!$this->direccion->IsDetailKey && $this->direccion->FormValue != NULL && $this->direccion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->direccion->caption(), $this->direccion->RequiredErrorMessage));
			}
		}
		if ($this->estado_llamada->Required) {
			if (!$this->estado_llamada->IsDetailKey && $this->estado_llamada->FormValue != NULL && $this->estado_llamada->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado_llamada->caption(), $this->estado_llamada->RequiredErrorMessage));
			}
		}
		if ($this->incidente->Required) {
			if (!$this->incidente->IsDetailKey && $this->incidente->FormValue != NULL && $this->incidente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->incidente->caption(), $this->incidente->RequiredErrorMessage));
			}
		}
		if ($this->prioridad->Required) {
			if (!$this->prioridad->IsDetailKey && $this->prioridad->FormValue != NULL && $this->prioridad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->prioridad->caption(), $this->prioridad->RequiredErrorMessage));
			}
		}
		if ($this->accion->Required) {
			if (!$this->accion->IsDetailKey && $this->accion->FormValue != NULL && $this->accion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->accion->caption(), $this->accion->RequiredErrorMessage));
			}
		}
		if ($this->estado->Required) {
			if (!$this->estado->IsDetailKey && $this->estado->FormValue != NULL && $this->estado->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado->caption(), $this->estado->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->estado->FormValue)) {
			AddMessage($FormError, $this->estado->errorMessage());
		}
		if ($this->cierre->Required) {
			if (!$this->cierre->IsDetailKey && $this->cierre->FormValue != NULL && $this->cierre->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cierre->caption(), $this->cierre->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cierre->FormValue)) {
			AddMessage($FormError, $this->cierre->errorMessage());
		}
		if ($this->caso_multiple->Required) {
			if (!$this->caso_multiple->IsDetailKey && $this->caso_multiple->FormValue != NULL && $this->caso_multiple->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->caso_multiple->caption(), $this->caso_multiple->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->caso_multiple->FormValue)) {
			AddMessage($FormError, $this->caso_multiple->errorMessage());
		}
		if ($this->paciente->Required) {
			if (!$this->paciente->IsDetailKey && $this->paciente->FormValue != NULL && $this->paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paciente->caption(), $this->paciente->RequiredErrorMessage));
			}
		}
		if ($this->evaluacion->Required) {
			if (!$this->evaluacion->IsDetailKey && $this->evaluacion->FormValue != NULL && $this->evaluacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->evaluacion->caption(), $this->evaluacion->RequiredErrorMessage));
			}
		}
		if ($this->sede->Required) {
			if (!$this->sede->IsDetailKey && $this->sede->FormValue != NULL && $this->sede->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sede->caption(), $this->sede->RequiredErrorMessage));
			}
		}
		if ($this->hospital_destino->Required) {
			if (!$this->hospital_destino->IsDetailKey && $this->hospital_destino->FormValue != NULL && $this->hospital_destino->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hospital_destino->caption(), $this->hospital_destino->RequiredErrorMessage));
			}
		}
		if ($this->nombre_medico->Required) {
			if (!$this->nombre_medico->IsDetailKey && $this->nombre_medico->FormValue != NULL && $this->nombre_medico->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_medico->caption(), $this->nombre_medico->RequiredErrorMessage));
			}
		}
		if ($this->nombre_confirma->Required) {
			if (!$this->nombre_confirma->IsDetailKey && $this->nombre_confirma->FormValue != NULL && $this->nombre_confirma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_confirma->caption(), $this->nombre_confirma->RequiredErrorMessage));
			}
		}
		if ($this->telefono_confirma->Required) {
			if (!$this->telefono_confirma->IsDetailKey && $this->telefono_confirma->FormValue != NULL && $this->telefono_confirma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono_confirma->caption(), $this->telefono_confirma->RequiredErrorMessage));
			}
		}
		if ($this->telefono->Required) {
			if (!$this->telefono->IsDetailKey && $this->telefono->FormValue != NULL && $this->telefono->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono->caption(), $this->telefono->RequiredErrorMessage));
			}
		}
		if ($this->nombre_reporta->Required) {
			if (!$this->nombre_reporta->IsDetailKey && $this->nombre_reporta->FormValue != NULL && $this->nombre_reporta->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nombre_reporta->caption(), $this->nombre_reporta->RequiredErrorMessage));
			}
		}
		if ($this->distrito->Required) {
			if (!$this->distrito->IsDetailKey && $this->distrito->FormValue != NULL && $this->distrito->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->distrito->caption(), $this->distrito->RequiredErrorMessage));
			}
		}
		if ($this->descripcion->Required) {
			if (!$this->descripcion->IsDetailKey && $this->descripcion->FormValue != NULL && $this->descripcion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descripcion->caption(), $this->descripcion->RequiredErrorMessage));
			}
		}
		if ($this->observacion->Required) {
			if (!$this->observacion->IsDetailKey && $this->observacion->FormValue != NULL && $this->observacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->observacion->caption(), $this->observacion->RequiredErrorMessage));
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

		// fecha
		$this->fecha->CurrentValue = CurrentDateTime();
		$this->fecha->setDbValueDef($rsnew, $this->fecha->CurrentValue, NULL);

		// tiempo
		$this->tiempo->setDbValueDef($rsnew, $this->tiempo->CurrentValue, NULL, FALSE);

		// llamada_fallida
		$this->llamada_fallida->setDbValueDef($rsnew, $this->llamada_fallida->CurrentValue, NULL, FALSE);

		// longitud
		$this->longitud->setDbValueDef($rsnew, $this->longitud->CurrentValue, NULL, FALSE);

		// latitud
		$this->latitud->setDbValueDef($rsnew, $this->latitud->CurrentValue, NULL, FALSE);

		// quepasa
		$this->quepasa->setDbValueDef($rsnew, $this->quepasa->CurrentValue, NULL, FALSE);

		// direccion
		$this->direccion->setDbValueDef($rsnew, $this->direccion->CurrentValue, NULL, FALSE);

		// estado_llamada
		$this->estado_llamada->setDbValueDef($rsnew, $this->estado_llamada->CurrentValue, NULL, FALSE);

		// incidente
		$this->incidente->setDbValueDef($rsnew, $this->incidente->CurrentValue, NULL, FALSE);

		// prioridad
		$this->prioridad->setDbValueDef($rsnew, $this->prioridad->CurrentValue, NULL, FALSE);

		// accion
		$this->accion->setDbValueDef($rsnew, $this->accion->CurrentValue, NULL, FALSE);

		// estado
		$this->estado->setDbValueDef($rsnew, $this->estado->CurrentValue, NULL, FALSE);

		// cierre
		$this->cierre->setDbValueDef($rsnew, $this->cierre->CurrentValue, NULL, strval($this->cierre->CurrentValue) == "");

		// caso_multiple
		$this->caso_multiple->setDbValueDef($rsnew, $this->caso_multiple->CurrentValue, NULL, strval($this->caso_multiple->CurrentValue) == "");

		// paciente
		$this->paciente->setDbValueDef($rsnew, $this->paciente->CurrentValue, NULL, FALSE);

		// evaluacion
		$this->evaluacion->setDbValueDef($rsnew, $this->evaluacion->CurrentValue, NULL, FALSE);

		// sede
		$this->sede->setDbValueDef($rsnew, $this->sede->CurrentValue, NULL, FALSE);

		// hospital_destino
		$this->hospital_destino->setDbValueDef($rsnew, $this->hospital_destino->CurrentValue, NULL, FALSE);

		// nombre_medico
		$this->nombre_medico->setDbValueDef($rsnew, $this->nombre_medico->CurrentValue, NULL, FALSE);

		// nombre_confirma
		$this->nombre_confirma->setDbValueDef($rsnew, $this->nombre_confirma->CurrentValue, NULL, FALSE);

		// telefono_confirma
		$this->telefono_confirma->setDbValueDef($rsnew, $this->telefono_confirma->CurrentValue, NULL, FALSE);

		// telefono
		$this->telefono->setDbValueDef($rsnew, $this->telefono->CurrentValue, NULL, FALSE);

		// nombre_reporta
		$this->nombre_reporta->setDbValueDef($rsnew, $this->nombre_reporta->CurrentValue, NULL, FALSE);

		// distrito
		$this->distrito->setDbValueDef($rsnew, $this->distrito->CurrentValue, NULL, FALSE);

		// descripcion
		$this->descripcion->setDbValueDef($rsnew, $this->descripcion->CurrentValue, NULL, FALSE);

		// observacion
		$this->observacion->setDbValueDef($rsnew, $this->observacion->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_maestrolist.php"), "", $this->TableVar, TRUE);
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
				case "x_llamada_fallida":
					break;
				case "x_incidente":
					break;
				case "x_prioridad":
					break;
				case "x_accion":
					break;
				case "x_hospital_destino":
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
						case "x_llamada_fallida":
							break;
						case "x_incidente":
							break;
						case "x_prioridad":
							break;
						case "x_accion":
							break;
						case "x_hospital_destino":
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

		//echo "nuevo caso";
	if (CurrentLanguageID() == "en") {
	$GLOBALS["Language"]->setPhrase("nuevo_caso", "New case");
	} elseif  (CurrentLanguageID() == "es") {
	$GLOBALS["Language"]->setPhrase("nuevo_caso", "Nuevo caso");
	} elseif  (CurrentLanguageID() == "fr") {
	$GLOBALS["Language"]->setPhrase("nuevo_caso", "Nouveau cas");
	} else
	$GLOBALS["Language"]->setPhrase("nuevo_caso", "Novo caso");

		//echo "estadistica llamadas";
	if (CurrentLanguageID() == "en") {
	$GLOBALS["Language"]->setPhrase("stat_call", "Call statistics");
	} elseif  (CurrentLanguageID() == "es") {
	$GLOBALS["Language"]->setPhrase("stat_call", "Estadistica llamada");
	} elseif  (CurrentLanguageID() == "fr") {
	$GLOBALS["Language"]->setPhrase("stat_call", "Statistiques des appels");
	} else
	$GLOBALS["Language"]->setPhrase("stat_call", "Estatísticas de chamadas");

		//echo "incidente";
	if (CurrentLanguageID() == "en") {
	$GLOBALS["Language"]->setPhrase("incidente", "Incident");
	} elseif  (CurrentLanguageID() == "es") {
	$GLOBALS["Language"]->setPhrase("incidente", "Incidente");
	} elseif  (CurrentLanguageID() == "fr") {
	$GLOBALS["Language"]->setPhrase("incidente", "Incident");
	} else
	$GLOBALS["Language"]->setPhrase("incidente", "Incidente");

		//echo "multiole";
	if (CurrentLanguageID() == "en") {
	$GLOBALS["Language"]->setPhrase("multiple", "Multiple case");
	} elseif  (CurrentLanguageID() == "es") {
	$GLOBALS["Language"]->setPhrase("multiple", "Caso multiple");
	} elseif  (CurrentLanguageID() == "fr") {
	$GLOBALS["Language"]->setPhrase("multiple", "Cas multiple");
	} else
	$GLOBALS["Language"]->setPhrase("multiple", "Caso múltiplo");
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
					$msg = "Event request registration form. If you select an incident, you will have a guidance protocol for evaluating and making the decision on priority";
				elseif(CurrentLanguageID() =="es")
					$msg = "Formulario de registro de solicitud de evento. Si selecciona un incidente tendrá un protocolo de orientación para evaluar y tomar la decisión sobre la prioridad";
				elseif (CurrentLanguageID() == "pt")
					$msg = "portuges";
				else 
					$msg = "frances";

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
			$this->sede->EditValue = CurrentUserInfo('sede');
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