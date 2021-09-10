<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_servicio_ambulancia_add extends preh_servicio_ambulancia
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_servicio_ambulancia';

	// Page object name
	public $PageObjName = "preh_servicio_ambulancia_add";

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

		// Table object (preh_servicio_ambulancia)
		if (!isset($GLOBALS["preh_servicio_ambulancia"]) || get_class($GLOBALS["preh_servicio_ambulancia"]) == PROJECT_NAMESPACE . "preh_servicio_ambulancia") {
			$GLOBALS["preh_servicio_ambulancia"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["preh_servicio_ambulancia"];
		}

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'preh_servicio_ambulancia');

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
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$SkipHeaderFooter = $OldSkipHeaderFooter;
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $preh_servicio_ambulancia;
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
				$doc = new $class($preh_servicio_ambulancia);
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
					if ($pageName == "preh_servicio_ambulanciaview.php")
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
			$key .= @$ar['cod_casopreh'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['cod_ambulancia'];
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
					$this->terminate(GetUrl("preh_servicio_ambulancialist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$OldSkipHeaderFooter = $SkipHeaderFooter;
		$SkipHeaderFooter = TRUE;
		$this->id_servcioambulacia->setVisibility();
		$this->cod_casopreh->setVisibility();
		$this->cod_ambulancia->setVisibility();
		$this->hora_confirma->setVisibility();
		$this->hora_asigna->setVisibility();
		$this->hora_llegada->setVisibility();
		$this->hora_inicio->setVisibility();
		$this->hora_destino->setVisibility();
		$this->hora_preposicion->setVisibility();
		$this->observaciones->setVisibility();
		$this->tipo_traslado->setVisibility();
		$this->traslado_fallido->setVisibility();
		$this->estado_paciente->setVisibility();
		$this->k_final->setVisibility();
		$this->k_inical->setVisibility();
		$this->tipo_serviciosistema->setVisibility();
		$this->preposicion->setVisibility();
		$this->conductor->setVisibility();
		$this->medico->setVisibility();
		$this->paramedico->setVisibility();
		$this->dx_aph->setVisibility();
		$this->dx_soat->setVisibility();
		$this->estado_pacientefinal->setVisibility();
		$this->cuando_murio->setVisibility();
		$this->accidente_vehiculo->setVisibility();
		$this->atropellado->setVisibility();
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
		$this->setupLookupOptions($this->traslado_fallido);
		$this->setupLookupOptions($this->dx_aph);
		$this->setupLookupOptions($this->dx_soat);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_servicio_ambulancialist.php");
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
			if (Get("cod_ambulancia") !== NULL) {
				$this->cod_ambulancia->setQueryStringValue(Get("cod_ambulancia"));
				$this->setKey("cod_ambulancia", $this->cod_ambulancia->CurrentValue); // Set up key
			} else {
				$this->setKey("cod_ambulancia", ""); // Clear key
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
					$this->terminate("preh_servicio_ambulancialist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "preh_servicio_ambulancialist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "preh_servicio_ambulanciaview.php")
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
		$this->id_servcioambulacia->CurrentValue = NULL;
		$this->id_servcioambulacia->OldValue = $this->id_servcioambulacia->CurrentValue;
		$this->cod_casopreh->CurrentValue = NULL;
		$this->cod_casopreh->OldValue = $this->cod_casopreh->CurrentValue;
		$this->cod_ambulancia->CurrentValue = NULL;
		$this->cod_ambulancia->OldValue = $this->cod_ambulancia->CurrentValue;
		$this->hora_confirma->CurrentValue = NULL;
		$this->hora_confirma->OldValue = $this->hora_confirma->CurrentValue;
		$this->hora_asigna->CurrentValue = NULL;
		$this->hora_asigna->OldValue = $this->hora_asigna->CurrentValue;
		$this->hora_llegada->CurrentValue = NULL;
		$this->hora_llegada->OldValue = $this->hora_llegada->CurrentValue;
		$this->hora_inicio->CurrentValue = NULL;
		$this->hora_inicio->OldValue = $this->hora_inicio->CurrentValue;
		$this->hora_destino->CurrentValue = NULL;
		$this->hora_destino->OldValue = $this->hora_destino->CurrentValue;
		$this->hora_preposicion->CurrentValue = NULL;
		$this->hora_preposicion->OldValue = $this->hora_preposicion->CurrentValue;
		$this->observaciones->CurrentValue = NULL;
		$this->observaciones->OldValue = $this->observaciones->CurrentValue;
		$this->tipo_traslado->CurrentValue = NULL;
		$this->tipo_traslado->OldValue = $this->tipo_traslado->CurrentValue;
		$this->traslado_fallido->CurrentValue = NULL;
		$this->traslado_fallido->OldValue = $this->traslado_fallido->CurrentValue;
		$this->estado_paciente->CurrentValue = NULL;
		$this->estado_paciente->OldValue = $this->estado_paciente->CurrentValue;
		$this->k_final->CurrentValue = NULL;
		$this->k_final->OldValue = $this->k_final->CurrentValue;
		$this->k_inical->CurrentValue = NULL;
		$this->k_inical->OldValue = $this->k_inical->CurrentValue;
		$this->tipo_serviciosistema->CurrentValue = NULL;
		$this->tipo_serviciosistema->OldValue = $this->tipo_serviciosistema->CurrentValue;
		$this->preposicion->CurrentValue = NULL;
		$this->preposicion->OldValue = $this->preposicion->CurrentValue;
		$this->conductor->CurrentValue = NULL;
		$this->conductor->OldValue = $this->conductor->CurrentValue;
		$this->medico->CurrentValue = NULL;
		$this->medico->OldValue = $this->medico->CurrentValue;
		$this->paramedico->CurrentValue = NULL;
		$this->paramedico->OldValue = $this->paramedico->CurrentValue;
		$this->dx_aph->CurrentValue = NULL;
		$this->dx_aph->OldValue = $this->dx_aph->CurrentValue;
		$this->dx_soat->CurrentValue = NULL;
		$this->dx_soat->OldValue = $this->dx_soat->CurrentValue;
		$this->estado_pacientefinal->CurrentValue = NULL;
		$this->estado_pacientefinal->OldValue = $this->estado_pacientefinal->CurrentValue;
		$this->cuando_murio->CurrentValue = NULL;
		$this->cuando_murio->OldValue = $this->cuando_murio->CurrentValue;
		$this->accidente_vehiculo->CurrentValue = NULL;
		$this->accidente_vehiculo->OldValue = $this->accidente_vehiculo->CurrentValue;
		$this->atropellado->CurrentValue = NULL;
		$this->atropellado->OldValue = $this->atropellado->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id_servcioambulacia' first before field var 'x_id_servcioambulacia'
		$val = $CurrentForm->hasValue("id_servcioambulacia") ? $CurrentForm->getValue("id_servcioambulacia") : $CurrentForm->getValue("x_id_servcioambulacia");
		if (!$this->id_servcioambulacia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->id_servcioambulacia->Visible = FALSE; // Disable update for API request
			else
				$this->id_servcioambulacia->setFormValue($val);
		}

		// Check field name 'cod_casopreh' first before field var 'x_cod_casopreh'
		$val = $CurrentForm->hasValue("cod_casopreh") ? $CurrentForm->getValue("cod_casopreh") : $CurrentForm->getValue("x_cod_casopreh");
		if (!$this->cod_casopreh->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_casopreh->Visible = FALSE; // Disable update for API request
			else
				$this->cod_casopreh->setFormValue($val);
		}

		// Check field name 'cod_ambulancia' first before field var 'x_cod_ambulancia'
		$val = $CurrentForm->hasValue("cod_ambulancia") ? $CurrentForm->getValue("cod_ambulancia") : $CurrentForm->getValue("x_cod_ambulancia");
		if (!$this->cod_ambulancia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cod_ambulancia->Visible = FALSE; // Disable update for API request
			else
				$this->cod_ambulancia->setFormValue($val);
		}

		// Check field name 'hora_confirma' first before field var 'x_hora_confirma'
		$val = $CurrentForm->hasValue("hora_confirma") ? $CurrentForm->getValue("hora_confirma") : $CurrentForm->getValue("x_hora_confirma");
		if (!$this->hora_confirma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_confirma->Visible = FALSE; // Disable update for API request
			else
				$this->hora_confirma->setFormValue($val);
			$this->hora_confirma->CurrentValue = UnFormatDateTime($this->hora_confirma->CurrentValue, 0);
		}

		// Check field name 'hora_asigna' first before field var 'x_hora_asigna'
		$val = $CurrentForm->hasValue("hora_asigna") ? $CurrentForm->getValue("hora_asigna") : $CurrentForm->getValue("x_hora_asigna");
		if (!$this->hora_asigna->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_asigna->Visible = FALSE; // Disable update for API request
			else
				$this->hora_asigna->setFormValue($val);
			$this->hora_asigna->CurrentValue = UnFormatDateTime($this->hora_asigna->CurrentValue, 0);
		}

		// Check field name 'hora_llegada' first before field var 'x_hora_llegada'
		$val = $CurrentForm->hasValue("hora_llegada") ? $CurrentForm->getValue("hora_llegada") : $CurrentForm->getValue("x_hora_llegada");
		if (!$this->hora_llegada->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_llegada->Visible = FALSE; // Disable update for API request
			else
				$this->hora_llegada->setFormValue($val);
			$this->hora_llegada->CurrentValue = UnFormatDateTime($this->hora_llegada->CurrentValue, 0);
		}

		// Check field name 'hora_inicio' first before field var 'x_hora_inicio'
		$val = $CurrentForm->hasValue("hora_inicio") ? $CurrentForm->getValue("hora_inicio") : $CurrentForm->getValue("x_hora_inicio");
		if (!$this->hora_inicio->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_inicio->Visible = FALSE; // Disable update for API request
			else
				$this->hora_inicio->setFormValue($val);
			$this->hora_inicio->CurrentValue = UnFormatDateTime($this->hora_inicio->CurrentValue, 0);
		}

		// Check field name 'hora_destino' first before field var 'x_hora_destino'
		$val = $CurrentForm->hasValue("hora_destino") ? $CurrentForm->getValue("hora_destino") : $CurrentForm->getValue("x_hora_destino");
		if (!$this->hora_destino->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_destino->Visible = FALSE; // Disable update for API request
			else
				$this->hora_destino->setFormValue($val);
			$this->hora_destino->CurrentValue = UnFormatDateTime($this->hora_destino->CurrentValue, 0);
		}

		// Check field name 'hora_preposicion' first before field var 'x_hora_preposicion'
		$val = $CurrentForm->hasValue("hora_preposicion") ? $CurrentForm->getValue("hora_preposicion") : $CurrentForm->getValue("x_hora_preposicion");
		if (!$this->hora_preposicion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_preposicion->Visible = FALSE; // Disable update for API request
			else
				$this->hora_preposicion->setFormValue($val);
			$this->hora_preposicion->CurrentValue = UnFormatDateTime($this->hora_preposicion->CurrentValue, 0);
		}

		// Check field name 'observaciones' first before field var 'x_observaciones'
		$val = $CurrentForm->hasValue("observaciones") ? $CurrentForm->getValue("observaciones") : $CurrentForm->getValue("x_observaciones");
		if (!$this->observaciones->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->observaciones->Visible = FALSE; // Disable update for API request
			else
				$this->observaciones->setFormValue($val);
		}

		// Check field name 'tipo_traslado' first before field var 'x_tipo_traslado'
		$val = $CurrentForm->hasValue("tipo_traslado") ? $CurrentForm->getValue("tipo_traslado") : $CurrentForm->getValue("x_tipo_traslado");
		if (!$this->tipo_traslado->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_traslado->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_traslado->setFormValue($val);
		}

		// Check field name 'traslado_fallido' first before field var 'x_traslado_fallido'
		$val = $CurrentForm->hasValue("traslado_fallido") ? $CurrentForm->getValue("traslado_fallido") : $CurrentForm->getValue("x_traslado_fallido");
		if (!$this->traslado_fallido->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->traslado_fallido->Visible = FALSE; // Disable update for API request
			else
				$this->traslado_fallido->setFormValue($val);
		}

		// Check field name 'estado_paciente' first before field var 'x_estado_paciente'
		$val = $CurrentForm->hasValue("estado_paciente") ? $CurrentForm->getValue("estado_paciente") : $CurrentForm->getValue("x_estado_paciente");
		if (!$this->estado_paciente->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->estado_paciente->Visible = FALSE; // Disable update for API request
			else
				$this->estado_paciente->setFormValue($val);
		}

		// Check field name 'k_final' first before field var 'x_k_final'
		$val = $CurrentForm->hasValue("k_final") ? $CurrentForm->getValue("k_final") : $CurrentForm->getValue("x_k_final");
		if (!$this->k_final->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->k_final->Visible = FALSE; // Disable update for API request
			else
				$this->k_final->setFormValue($val);
		}

		// Check field name 'k_inical' first before field var 'x_k_inical'
		$val = $CurrentForm->hasValue("k_inical") ? $CurrentForm->getValue("k_inical") : $CurrentForm->getValue("x_k_inical");
		if (!$this->k_inical->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->k_inical->Visible = FALSE; // Disable update for API request
			else
				$this->k_inical->setFormValue($val);
		}

		// Check field name 'tipo_serviciosistema' first before field var 'x_tipo_serviciosistema'
		$val = $CurrentForm->hasValue("tipo_serviciosistema") ? $CurrentForm->getValue("tipo_serviciosistema") : $CurrentForm->getValue("x_tipo_serviciosistema");
		if (!$this->tipo_serviciosistema->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_serviciosistema->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_serviciosistema->setFormValue($val);
		}

		// Check field name 'preposicion' first before field var 'x_preposicion'
		$val = $CurrentForm->hasValue("preposicion") ? $CurrentForm->getValue("preposicion") : $CurrentForm->getValue("x_preposicion");
		if (!$this->preposicion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->preposicion->Visible = FALSE; // Disable update for API request
			else
				$this->preposicion->setFormValue($val);
		}

		// Check field name 'conductor' first before field var 'x_conductor'
		$val = $CurrentForm->hasValue("conductor") ? $CurrentForm->getValue("conductor") : $CurrentForm->getValue("x_conductor");
		if (!$this->conductor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->conductor->Visible = FALSE; // Disable update for API request
			else
				$this->conductor->setFormValue($val);
		}

		// Check field name 'medico' first before field var 'x_medico'
		$val = $CurrentForm->hasValue("medico") ? $CurrentForm->getValue("medico") : $CurrentForm->getValue("x_medico");
		if (!$this->medico->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->medico->Visible = FALSE; // Disable update for API request
			else
				$this->medico->setFormValue($val);
		}

		// Check field name 'paramedico' first before field var 'x_paramedico'
		$val = $CurrentForm->hasValue("paramedico") ? $CurrentForm->getValue("paramedico") : $CurrentForm->getValue("x_paramedico");
		if (!$this->paramedico->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->paramedico->Visible = FALSE; // Disable update for API request
			else
				$this->paramedico->setFormValue($val);
		}

		// Check field name 'dx_aph' first before field var 'x_dx_aph'
		$val = $CurrentForm->hasValue("dx_aph") ? $CurrentForm->getValue("dx_aph") : $CurrentForm->getValue("x_dx_aph");
		if (!$this->dx_aph->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dx_aph->Visible = FALSE; // Disable update for API request
			else
				$this->dx_aph->setFormValue($val);
		}

		// Check field name 'dx_soat' first before field var 'x_dx_soat'
		$val = $CurrentForm->hasValue("dx_soat") ? $CurrentForm->getValue("dx_soat") : $CurrentForm->getValue("x_dx_soat");
		if (!$this->dx_soat->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dx_soat->Visible = FALSE; // Disable update for API request
			else
				$this->dx_soat->setFormValue($val);
		}

		// Check field name 'estado_pacientefinal' first before field var 'x_estado_pacientefinal'
		$val = $CurrentForm->hasValue("estado_pacientefinal") ? $CurrentForm->getValue("estado_pacientefinal") : $CurrentForm->getValue("x_estado_pacientefinal");
		if (!$this->estado_pacientefinal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->estado_pacientefinal->Visible = FALSE; // Disable update for API request
			else
				$this->estado_pacientefinal->setFormValue($val);
		}

		// Check field name 'cuando_murio' first before field var 'x_cuando_murio'
		$val = $CurrentForm->hasValue("cuando_murio") ? $CurrentForm->getValue("cuando_murio") : $CurrentForm->getValue("x_cuando_murio");
		if (!$this->cuando_murio->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cuando_murio->Visible = FALSE; // Disable update for API request
			else
				$this->cuando_murio->setFormValue($val);
		}

		// Check field name 'accidente_vehiculo' first before field var 'x_accidente_vehiculo'
		$val = $CurrentForm->hasValue("accidente_vehiculo") ? $CurrentForm->getValue("accidente_vehiculo") : $CurrentForm->getValue("x_accidente_vehiculo");
		if (!$this->accidente_vehiculo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->accidente_vehiculo->Visible = FALSE; // Disable update for API request
			else
				$this->accidente_vehiculo->setFormValue($val);
		}

		// Check field name 'atropellado' first before field var 'x_atropellado'
		$val = $CurrentForm->hasValue("atropellado") ? $CurrentForm->getValue("atropellado") : $CurrentForm->getValue("x_atropellado");
		if (!$this->atropellado->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->atropellado->Visible = FALSE; // Disable update for API request
			else
				$this->atropellado->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id_servcioambulacia->CurrentValue = $this->id_servcioambulacia->FormValue;
		$this->cod_casopreh->CurrentValue = $this->cod_casopreh->FormValue;
		$this->cod_ambulancia->CurrentValue = $this->cod_ambulancia->FormValue;
		$this->hora_confirma->CurrentValue = $this->hora_confirma->FormValue;
		$this->hora_confirma->CurrentValue = UnFormatDateTime($this->hora_confirma->CurrentValue, 0);
		$this->hora_asigna->CurrentValue = $this->hora_asigna->FormValue;
		$this->hora_asigna->CurrentValue = UnFormatDateTime($this->hora_asigna->CurrentValue, 0);
		$this->hora_llegada->CurrentValue = $this->hora_llegada->FormValue;
		$this->hora_llegada->CurrentValue = UnFormatDateTime($this->hora_llegada->CurrentValue, 0);
		$this->hora_inicio->CurrentValue = $this->hora_inicio->FormValue;
		$this->hora_inicio->CurrentValue = UnFormatDateTime($this->hora_inicio->CurrentValue, 0);
		$this->hora_destino->CurrentValue = $this->hora_destino->FormValue;
		$this->hora_destino->CurrentValue = UnFormatDateTime($this->hora_destino->CurrentValue, 0);
		$this->hora_preposicion->CurrentValue = $this->hora_preposicion->FormValue;
		$this->hora_preposicion->CurrentValue = UnFormatDateTime($this->hora_preposicion->CurrentValue, 0);
		$this->observaciones->CurrentValue = $this->observaciones->FormValue;
		$this->tipo_traslado->CurrentValue = $this->tipo_traslado->FormValue;
		$this->traslado_fallido->CurrentValue = $this->traslado_fallido->FormValue;
		$this->estado_paciente->CurrentValue = $this->estado_paciente->FormValue;
		$this->k_final->CurrentValue = $this->k_final->FormValue;
		$this->k_inical->CurrentValue = $this->k_inical->FormValue;
		$this->tipo_serviciosistema->CurrentValue = $this->tipo_serviciosistema->FormValue;
		$this->preposicion->CurrentValue = $this->preposicion->FormValue;
		$this->conductor->CurrentValue = $this->conductor->FormValue;
		$this->medico->CurrentValue = $this->medico->FormValue;
		$this->paramedico->CurrentValue = $this->paramedico->FormValue;
		$this->dx_aph->CurrentValue = $this->dx_aph->FormValue;
		$this->dx_soat->CurrentValue = $this->dx_soat->FormValue;
		$this->estado_pacientefinal->CurrentValue = $this->estado_pacientefinal->FormValue;
		$this->cuando_murio->CurrentValue = $this->cuando_murio->FormValue;
		$this->accidente_vehiculo->CurrentValue = $this->accidente_vehiculo->FormValue;
		$this->atropellado->CurrentValue = $this->atropellado->FormValue;
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
		$this->id_servcioambulacia->setDbValue($row['id_servcioambulacia']);
		$this->cod_casopreh->setDbValue($row['cod_casopreh']);
		$this->cod_ambulancia->setDbValue($row['cod_ambulancia']);
		$this->hora_confirma->setDbValue($row['hora_confirma']);
		$this->hora_asigna->setDbValue($row['hora_asigna']);
		$this->hora_llegada->setDbValue($row['hora_llegada']);
		$this->hora_inicio->setDbValue($row['hora_inicio']);
		$this->hora_destino->setDbValue($row['hora_destino']);
		$this->hora_preposicion->setDbValue($row['hora_preposicion']);
		$this->observaciones->setDbValue($row['observaciones']);
		$this->tipo_traslado->setDbValue($row['tipo_traslado']);
		$this->traslado_fallido->setDbValue($row['traslado_fallido']);
		$this->estado_paciente->setDbValue($row['estado_paciente']);
		$this->k_final->setDbValue($row['k_final']);
		$this->k_inical->setDbValue($row['k_inical']);
		$this->tipo_serviciosistema->setDbValue($row['tipo_serviciosistema']);
		$this->preposicion->setDbValue($row['preposicion']);
		$this->conductor->setDbValue($row['conductor']);
		$this->medico->setDbValue($row['medico']);
		$this->paramedico->setDbValue($row['paramedico']);
		$this->dx_aph->setDbValue($row['dx_aph']);
		$this->dx_soat->setDbValue($row['dx_soat']);
		$this->estado_pacientefinal->setDbValue($row['estado_pacientefinal']);
		$this->cuando_murio->setDbValue($row['cuando_murio']);
		$this->accidente_vehiculo->setDbValue($row['accidente_vehiculo']);
		$this->atropellado->setDbValue($row['atropellado']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_servcioambulacia'] = $this->id_servcioambulacia->CurrentValue;
		$row['cod_casopreh'] = $this->cod_casopreh->CurrentValue;
		$row['cod_ambulancia'] = $this->cod_ambulancia->CurrentValue;
		$row['hora_confirma'] = $this->hora_confirma->CurrentValue;
		$row['hora_asigna'] = $this->hora_asigna->CurrentValue;
		$row['hora_llegada'] = $this->hora_llegada->CurrentValue;
		$row['hora_inicio'] = $this->hora_inicio->CurrentValue;
		$row['hora_destino'] = $this->hora_destino->CurrentValue;
		$row['hora_preposicion'] = $this->hora_preposicion->CurrentValue;
		$row['observaciones'] = $this->observaciones->CurrentValue;
		$row['tipo_traslado'] = $this->tipo_traslado->CurrentValue;
		$row['traslado_fallido'] = $this->traslado_fallido->CurrentValue;
		$row['estado_paciente'] = $this->estado_paciente->CurrentValue;
		$row['k_final'] = $this->k_final->CurrentValue;
		$row['k_inical'] = $this->k_inical->CurrentValue;
		$row['tipo_serviciosistema'] = $this->tipo_serviciosistema->CurrentValue;
		$row['preposicion'] = $this->preposicion->CurrentValue;
		$row['conductor'] = $this->conductor->CurrentValue;
		$row['medico'] = $this->medico->CurrentValue;
		$row['paramedico'] = $this->paramedico->CurrentValue;
		$row['dx_aph'] = $this->dx_aph->CurrentValue;
		$row['dx_soat'] = $this->dx_soat->CurrentValue;
		$row['estado_pacientefinal'] = $this->estado_pacientefinal->CurrentValue;
		$row['cuando_murio'] = $this->cuando_murio->CurrentValue;
		$row['accidente_vehiculo'] = $this->accidente_vehiculo->CurrentValue;
		$row['atropellado'] = $this->atropellado->CurrentValue;
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
		if (strval($this->getKey("cod_ambulancia")) != "")
			$this->cod_ambulancia->OldValue = $this->getKey("cod_ambulancia"); // cod_ambulancia
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
		// id_servcioambulacia
		// cod_casopreh
		// cod_ambulancia
		// hora_confirma
		// hora_asigna
		// hora_llegada
		// hora_inicio
		// hora_destino
		// hora_preposicion
		// observaciones
		// tipo_traslado
		// traslado_fallido
		// estado_paciente
		// k_final
		// k_inical
		// tipo_serviciosistema
		// preposicion
		// conductor
		// medico
		// paramedico
		// dx_aph
		// dx_soat
		// estado_pacientefinal
		// cuando_murio
		// accidente_vehiculo
		// atropellado

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_servcioambulacia
			$this->id_servcioambulacia->ViewValue = $this->id_servcioambulacia->CurrentValue;
			$this->id_servcioambulacia->ViewCustomAttributes = "";

			// cod_casopreh
			$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
			$this->cod_casopreh->ViewValue = FormatNumber($this->cod_casopreh->ViewValue, 0, -2, -2, -2);
			$this->cod_casopreh->ViewCustomAttributes = "";

			// cod_ambulancia
			$this->cod_ambulancia->ViewValue = $this->cod_ambulancia->CurrentValue;
			$this->cod_ambulancia->ViewCustomAttributes = "";

			// hora_confirma
			$this->hora_confirma->ViewValue = $this->hora_confirma->CurrentValue;
			$this->hora_confirma->ViewValue = FormatDateTime($this->hora_confirma->ViewValue, 0);
			$this->hora_confirma->ViewCustomAttributes = "";

			// hora_asigna
			$this->hora_asigna->ViewValue = $this->hora_asigna->CurrentValue;
			$this->hora_asigna->ViewValue = FormatDateTime($this->hora_asigna->ViewValue, 0);
			$this->hora_asigna->ViewCustomAttributes = "";

			// hora_llegada
			$this->hora_llegada->ViewValue = $this->hora_llegada->CurrentValue;
			$this->hora_llegada->ViewValue = FormatDateTime($this->hora_llegada->ViewValue, 0);
			$this->hora_llegada->ViewCustomAttributes = "";

			// hora_inicio
			$this->hora_inicio->ViewValue = $this->hora_inicio->CurrentValue;
			$this->hora_inicio->ViewValue = FormatDateTime($this->hora_inicio->ViewValue, 0);
			$this->hora_inicio->ViewCustomAttributes = "";

			// hora_destino
			$this->hora_destino->ViewValue = $this->hora_destino->CurrentValue;
			$this->hora_destino->ViewValue = FormatDateTime($this->hora_destino->ViewValue, 0);
			$this->hora_destino->ViewCustomAttributes = "";

			// hora_preposicion
			$this->hora_preposicion->ViewValue = $this->hora_preposicion->CurrentValue;
			$this->hora_preposicion->ViewValue = FormatDateTime($this->hora_preposicion->ViewValue, 0);
			$this->hora_preposicion->ViewCustomAttributes = "";

			// observaciones
			$this->observaciones->ViewValue = $this->observaciones->CurrentValue;
			$this->observaciones->ViewCustomAttributes = "";

			// tipo_traslado
			$this->tipo_traslado->ViewValue = $this->tipo_traslado->CurrentValue;
			$this->tipo_traslado->ViewCustomAttributes = "";

			// traslado_fallido
			$curVal = strval($this->traslado_fallido->CurrentValue);
			if ($curVal != "") {
				$this->traslado_fallido->ViewValue = $this->traslado_fallido->lookupCacheOption($curVal);
				if ($this->traslado_fallido->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_tranlado_fallido\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->traslado_fallido->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->traslado_fallido->ViewValue = $this->traslado_fallido->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->traslado_fallido->ViewValue = $this->traslado_fallido->CurrentValue;
					}
				}
			} else {
				$this->traslado_fallido->ViewValue = NULL;
			}
			$this->traslado_fallido->ViewCustomAttributes = "";

			// estado_paciente
			$this->estado_paciente->ViewValue = $this->estado_paciente->CurrentValue;
			$this->estado_paciente->ViewCustomAttributes = "";

			// k_final
			$this->k_final->ViewValue = $this->k_final->CurrentValue;
			$this->k_final->ViewCustomAttributes = "";

			// k_inical
			$this->k_inical->ViewValue = $this->k_inical->CurrentValue;
			$this->k_inical->ViewCustomAttributes = "";

			// tipo_serviciosistema
			$this->tipo_serviciosistema->ViewValue = $this->tipo_serviciosistema->CurrentValue;
			$this->tipo_serviciosistema->ViewCustomAttributes = "";

			// preposicion
			$this->preposicion->ViewValue = $this->preposicion->CurrentValue;
			$this->preposicion->ViewCustomAttributes = "";

			// conductor
			$this->conductor->ViewValue = $this->conductor->CurrentValue;
			$this->conductor->ViewCustomAttributes = "";

			// medico
			$this->medico->ViewValue = $this->medico->CurrentValue;
			$this->medico->ViewCustomAttributes = "";

			// paramedico
			$this->paramedico->ViewValue = $this->paramedico->CurrentValue;
			$this->paramedico->ViewCustomAttributes = "";

			// dx_aph
			$curVal = strval($this->dx_aph->CurrentValue);
			if ($curVal != "") {
				$this->dx_aph->ViewValue = $this->dx_aph->lookupCacheOption($curVal);
				if ($this->dx_aph->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "\"codigo_cie\"" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->dx_aph->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->dx_aph->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$this->dx_aph->ViewValue->add($this->dx_aph->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->dx_aph->ViewValue = $this->dx_aph->CurrentValue;
					}
				}
			} else {
				$this->dx_aph->ViewValue = NULL;
			}
			$this->dx_aph->ViewCustomAttributes = "";

			// dx_soat
			$curVal = strval($this->dx_soat->CurrentValue);
			if ($curVal != "") {
				$this->dx_soat->ViewValue = $this->dx_soat->lookupCacheOption($curVal);
				if ($this->dx_soat->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "\"codigo_cie\"" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->dx_soat->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->dx_soat->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$this->dx_soat->ViewValue->add($this->dx_soat->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->dx_soat->ViewValue = $this->dx_soat->CurrentValue;
					}
				}
			} else {
				$this->dx_soat->ViewValue = NULL;
			}
			$this->dx_soat->ViewCustomAttributes = "";

			// estado_pacientefinal
			if (strval($this->estado_pacientefinal->CurrentValue) != "") {
				$this->estado_pacientefinal->ViewValue = $this->estado_pacientefinal->optionCaption($this->estado_pacientefinal->CurrentValue);
			} else {
				$this->estado_pacientefinal->ViewValue = NULL;
			}
			$this->estado_pacientefinal->ViewCustomAttributes = "";

			// cuando_murio
			$this->cuando_murio->ViewValue = $this->cuando_murio->CurrentValue;
			$this->cuando_murio->ViewValue = FormatNumber($this->cuando_murio->ViewValue, 0, -2, -2, -2);
			$this->cuando_murio->ViewCustomAttributes = "";

			// accidente_vehiculo
			if (strval($this->accidente_vehiculo->CurrentValue) != "") {
				$this->accidente_vehiculo->ViewValue = $this->accidente_vehiculo->optionCaption($this->accidente_vehiculo->CurrentValue);
			} else {
				$this->accidente_vehiculo->ViewValue = NULL;
			}
			$this->accidente_vehiculo->ViewCustomAttributes = "";

			// atropellado
			if (strval($this->atropellado->CurrentValue) != "") {
				$this->atropellado->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->atropellado->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->atropellado->ViewValue->add($this->atropellado->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->atropellado->ViewValue = NULL;
			}
			$this->atropellado->ViewCustomAttributes = "";

			// id_servcioambulacia
			$this->id_servcioambulacia->LinkCustomAttributes = "";
			$this->id_servcioambulacia->HrefValue = "";
			$this->id_servcioambulacia->TooltipValue = "";

			// cod_casopreh
			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";
			$this->cod_casopreh->TooltipValue = "";

			// cod_ambulancia
			$this->cod_ambulancia->LinkCustomAttributes = "";
			$this->cod_ambulancia->HrefValue = "";
			$this->cod_ambulancia->TooltipValue = "";

			// hora_confirma
			$this->hora_confirma->LinkCustomAttributes = "";
			$this->hora_confirma->HrefValue = "";
			$this->hora_confirma->TooltipValue = "";

			// hora_asigna
			$this->hora_asigna->LinkCustomAttributes = "";
			$this->hora_asigna->HrefValue = "";
			$this->hora_asigna->TooltipValue = "";

			// hora_llegada
			$this->hora_llegada->LinkCustomAttributes = "";
			$this->hora_llegada->HrefValue = "";
			$this->hora_llegada->TooltipValue = "";

			// hora_inicio
			$this->hora_inicio->LinkCustomAttributes = "";
			$this->hora_inicio->HrefValue = "";
			$this->hora_inicio->TooltipValue = "";

			// hora_destino
			$this->hora_destino->LinkCustomAttributes = "";
			$this->hora_destino->HrefValue = "";
			$this->hora_destino->TooltipValue = "";

			// hora_preposicion
			$this->hora_preposicion->LinkCustomAttributes = "";
			$this->hora_preposicion->HrefValue = "";
			$this->hora_preposicion->TooltipValue = "";

			// observaciones
			$this->observaciones->LinkCustomAttributes = "";
			$this->observaciones->HrefValue = "";
			$this->observaciones->TooltipValue = "";

			// tipo_traslado
			$this->tipo_traslado->LinkCustomAttributes = "";
			$this->tipo_traslado->HrefValue = "";
			$this->tipo_traslado->TooltipValue = "";

			// traslado_fallido
			$this->traslado_fallido->LinkCustomAttributes = "";
			$this->traslado_fallido->HrefValue = "";
			$this->traslado_fallido->TooltipValue = "";

			// estado_paciente
			$this->estado_paciente->LinkCustomAttributes = "";
			$this->estado_paciente->HrefValue = "";
			$this->estado_paciente->TooltipValue = "";

			// k_final
			$this->k_final->LinkCustomAttributes = "";
			$this->k_final->HrefValue = "";
			$this->k_final->TooltipValue = "";

			// k_inical
			$this->k_inical->LinkCustomAttributes = "";
			$this->k_inical->HrefValue = "";
			$this->k_inical->TooltipValue = "";

			// tipo_serviciosistema
			$this->tipo_serviciosistema->LinkCustomAttributes = "";
			$this->tipo_serviciosistema->HrefValue = "";
			$this->tipo_serviciosistema->TooltipValue = "";

			// preposicion
			$this->preposicion->LinkCustomAttributes = "";
			$this->preposicion->HrefValue = "";
			$this->preposicion->TooltipValue = "";

			// conductor
			$this->conductor->LinkCustomAttributes = "";
			$this->conductor->HrefValue = "";
			$this->conductor->TooltipValue = "";

			// medico
			$this->medico->LinkCustomAttributes = "";
			$this->medico->HrefValue = "";
			$this->medico->TooltipValue = "";

			// paramedico
			$this->paramedico->LinkCustomAttributes = "";
			$this->paramedico->HrefValue = "";
			$this->paramedico->TooltipValue = "";

			// dx_aph
			$this->dx_aph->LinkCustomAttributes = "";
			$this->dx_aph->HrefValue = "";
			$this->dx_aph->TooltipValue = "";

			// dx_soat
			$this->dx_soat->LinkCustomAttributes = "";
			$this->dx_soat->HrefValue = "";
			$this->dx_soat->TooltipValue = "";

			// estado_pacientefinal
			$this->estado_pacientefinal->LinkCustomAttributes = "";
			$this->estado_pacientefinal->HrefValue = "";
			$this->estado_pacientefinal->TooltipValue = "";

			// cuando_murio
			$this->cuando_murio->LinkCustomAttributes = "";
			$this->cuando_murio->HrefValue = "";
			$this->cuando_murio->TooltipValue = "";

			// accidente_vehiculo
			$this->accidente_vehiculo->LinkCustomAttributes = "";
			$this->accidente_vehiculo->HrefValue = "";
			$this->accidente_vehiculo->TooltipValue = "";

			// atropellado
			$this->atropellado->LinkCustomAttributes = "";
			$this->atropellado->HrefValue = "";
			$this->atropellado->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id_servcioambulacia
			$this->id_servcioambulacia->EditAttrs["class"] = "form-control";
			$this->id_servcioambulacia->EditCustomAttributes = "";
			$this->id_servcioambulacia->EditValue = HtmlEncode($this->id_servcioambulacia->CurrentValue);
			$this->id_servcioambulacia->PlaceHolder = RemoveHtml($this->id_servcioambulacia->caption());

			// cod_casopreh
			$this->cod_casopreh->EditAttrs["class"] = "form-control";
			$this->cod_casopreh->EditCustomAttributes = "";
			$this->cod_casopreh->EditValue = HtmlEncode($this->cod_casopreh->CurrentValue);
			$this->cod_casopreh->PlaceHolder = RemoveHtml($this->cod_casopreh->caption());

			// cod_ambulancia
			$this->cod_ambulancia->EditAttrs["class"] = "form-control";
			$this->cod_ambulancia->EditCustomAttributes = "";
			if (!$this->cod_ambulancia->Raw)
				$this->cod_ambulancia->CurrentValue = HtmlDecode($this->cod_ambulancia->CurrentValue);
			$this->cod_ambulancia->EditValue = HtmlEncode($this->cod_ambulancia->CurrentValue);
			$this->cod_ambulancia->PlaceHolder = RemoveHtml($this->cod_ambulancia->caption());

			// hora_confirma
			$this->hora_confirma->EditAttrs["class"] = "form-control";
			$this->hora_confirma->EditCustomAttributes = "";
			$this->hora_confirma->EditValue = HtmlEncode(FormatDateTime($this->hora_confirma->CurrentValue, 8));
			$this->hora_confirma->PlaceHolder = RemoveHtml($this->hora_confirma->caption());

			// hora_asigna
			$this->hora_asigna->EditAttrs["class"] = "form-control";
			$this->hora_asigna->EditCustomAttributes = "";
			$this->hora_asigna->EditValue = HtmlEncode(FormatDateTime($this->hora_asigna->CurrentValue, 8));
			$this->hora_asigna->PlaceHolder = RemoveHtml($this->hora_asigna->caption());

			// hora_llegada
			$this->hora_llegada->EditAttrs["class"] = "form-control";
			$this->hora_llegada->EditCustomAttributes = "";
			$this->hora_llegada->EditValue = HtmlEncode(FormatDateTime($this->hora_llegada->CurrentValue, 8));
			$this->hora_llegada->PlaceHolder = RemoveHtml($this->hora_llegada->caption());

			// hora_inicio
			$this->hora_inicio->EditAttrs["class"] = "form-control";
			$this->hora_inicio->EditCustomAttributes = "";
			$this->hora_inicio->EditValue = HtmlEncode(FormatDateTime($this->hora_inicio->CurrentValue, 8));
			$this->hora_inicio->PlaceHolder = RemoveHtml($this->hora_inicio->caption());

			// hora_destino
			$this->hora_destino->EditAttrs["class"] = "form-control";
			$this->hora_destino->EditCustomAttributes = "";
			$this->hora_destino->EditValue = HtmlEncode(FormatDateTime($this->hora_destino->CurrentValue, 8));
			$this->hora_destino->PlaceHolder = RemoveHtml($this->hora_destino->caption());

			// hora_preposicion
			$this->hora_preposicion->EditAttrs["class"] = "form-control";
			$this->hora_preposicion->EditCustomAttributes = "";
			$this->hora_preposicion->EditValue = HtmlEncode(FormatDateTime($this->hora_preposicion->CurrentValue, 8));
			$this->hora_preposicion->PlaceHolder = RemoveHtml($this->hora_preposicion->caption());

			// observaciones
			$this->observaciones->EditAttrs["class"] = "form-control";
			$this->observaciones->EditCustomAttributes = "";
			$this->observaciones->EditValue = HtmlEncode($this->observaciones->CurrentValue);
			$this->observaciones->PlaceHolder = RemoveHtml($this->observaciones->caption());

			// tipo_traslado
			$this->tipo_traslado->EditAttrs["class"] = "form-control";
			$this->tipo_traslado->EditCustomAttributes = "";
			if (!$this->tipo_traslado->Raw)
				$this->tipo_traslado->CurrentValue = HtmlDecode($this->tipo_traslado->CurrentValue);
			$this->tipo_traslado->EditValue = HtmlEncode($this->tipo_traslado->CurrentValue);
			$this->tipo_traslado->PlaceHolder = RemoveHtml($this->tipo_traslado->caption());

			// traslado_fallido
			$this->traslado_fallido->EditAttrs["class"] = "form-control";
			$this->traslado_fallido->EditCustomAttributes = "";
			$curVal = trim(strval($this->traslado_fallido->CurrentValue));
			if ($curVal != "")
				$this->traslado_fallido->ViewValue = $this->traslado_fallido->lookupCacheOption($curVal);
			else
				$this->traslado_fallido->ViewValue = $this->traslado_fallido->Lookup !== NULL && is_array($this->traslado_fallido->Lookup->Options) ? $curVal : NULL;
			if ($this->traslado_fallido->ViewValue !== NULL) { // Load from cache
				$this->traslado_fallido->EditValue = array_values($this->traslado_fallido->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "\"id_tranlado_fallido\"" . SearchString("=", $this->traslado_fallido->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->traslado_fallido->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->traslado_fallido->EditValue = $arwrk;
			}

			// estado_paciente
			$this->estado_paciente->EditAttrs["class"] = "form-control";
			$this->estado_paciente->EditCustomAttributes = "";
			if (!$this->estado_paciente->Raw)
				$this->estado_paciente->CurrentValue = HtmlDecode($this->estado_paciente->CurrentValue);
			$this->estado_paciente->EditValue = HtmlEncode($this->estado_paciente->CurrentValue);
			$this->estado_paciente->PlaceHolder = RemoveHtml($this->estado_paciente->caption());

			// k_final
			$this->k_final->EditAttrs["class"] = "form-control";
			$this->k_final->EditCustomAttributes = "";
			if (!$this->k_final->Raw)
				$this->k_final->CurrentValue = HtmlDecode($this->k_final->CurrentValue);
			$this->k_final->EditValue = HtmlEncode($this->k_final->CurrentValue);
			$this->k_final->PlaceHolder = RemoveHtml($this->k_final->caption());

			// k_inical
			$this->k_inical->EditAttrs["class"] = "form-control";
			$this->k_inical->EditCustomAttributes = "";
			if (!$this->k_inical->Raw)
				$this->k_inical->CurrentValue = HtmlDecode($this->k_inical->CurrentValue);
			$this->k_inical->EditValue = HtmlEncode($this->k_inical->CurrentValue);
			$this->k_inical->PlaceHolder = RemoveHtml($this->k_inical->caption());

			// tipo_serviciosistema
			$this->tipo_serviciosistema->EditAttrs["class"] = "form-control";
			$this->tipo_serviciosistema->EditCustomAttributes = "";
			if (!$this->tipo_serviciosistema->Raw)
				$this->tipo_serviciosistema->CurrentValue = HtmlDecode($this->tipo_serviciosistema->CurrentValue);
			$this->tipo_serviciosistema->EditValue = HtmlEncode($this->tipo_serviciosistema->CurrentValue);
			$this->tipo_serviciosistema->PlaceHolder = RemoveHtml($this->tipo_serviciosistema->caption());

			// preposicion
			$this->preposicion->EditAttrs["class"] = "form-control";
			$this->preposicion->EditCustomAttributes = "";
			if (!$this->preposicion->Raw)
				$this->preposicion->CurrentValue = HtmlDecode($this->preposicion->CurrentValue);
			$this->preposicion->EditValue = HtmlEncode($this->preposicion->CurrentValue);
			$this->preposicion->PlaceHolder = RemoveHtml($this->preposicion->caption());

			// conductor
			$this->conductor->EditAttrs["class"] = "form-control";
			$this->conductor->EditCustomAttributes = "";
			if (!$this->conductor->Raw)
				$this->conductor->CurrentValue = HtmlDecode($this->conductor->CurrentValue);
			$this->conductor->EditValue = HtmlEncode($this->conductor->CurrentValue);
			$this->conductor->PlaceHolder = RemoveHtml($this->conductor->caption());

			// medico
			$this->medico->EditAttrs["class"] = "form-control";
			$this->medico->EditCustomAttributes = "";
			if (!$this->medico->Raw)
				$this->medico->CurrentValue = HtmlDecode($this->medico->CurrentValue);
			$this->medico->EditValue = HtmlEncode($this->medico->CurrentValue);
			$this->medico->PlaceHolder = RemoveHtml($this->medico->caption());

			// paramedico
			$this->paramedico->EditAttrs["class"] = "form-control";
			$this->paramedico->EditCustomAttributes = "";
			if (!$this->paramedico->Raw)
				$this->paramedico->CurrentValue = HtmlDecode($this->paramedico->CurrentValue);
			$this->paramedico->EditValue = HtmlEncode($this->paramedico->CurrentValue);
			$this->paramedico->PlaceHolder = RemoveHtml($this->paramedico->caption());

			// dx_aph
			$this->dx_aph->EditCustomAttributes = "";
			$curVal = trim(strval($this->dx_aph->CurrentValue));
			if ($curVal != "")
				$this->dx_aph->ViewValue = $this->dx_aph->lookupCacheOption($curVal);
			else
				$this->dx_aph->ViewValue = $this->dx_aph->Lookup !== NULL && is_array($this->dx_aph->Lookup->Options) ? $curVal : NULL;
			if ($this->dx_aph->ViewValue !== NULL) { // Load from cache
				$this->dx_aph->EditValue = array_values($this->dx_aph->Lookup->Options);
				if ($this->dx_aph->ViewValue == "")
					$this->dx_aph->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "\"codigo_cie\"" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->dx_aph->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->dx_aph->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
						$this->dx_aph->ViewValue->add($this->dx_aph->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->dx_aph->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->dx_aph->EditValue = $arwrk;
			}

			// dx_soat
			$this->dx_soat->EditCustomAttributes = "";
			$curVal = trim(strval($this->dx_soat->CurrentValue));
			if ($curVal != "")
				$this->dx_soat->ViewValue = $this->dx_soat->lookupCacheOption($curVal);
			else
				$this->dx_soat->ViewValue = $this->dx_soat->Lookup !== NULL && is_array($this->dx_soat->Lookup->Options) ? $curVal : NULL;
			if ($this->dx_soat->ViewValue !== NULL) { // Load from cache
				$this->dx_soat->EditValue = array_values($this->dx_soat->Lookup->Options);
				if ($this->dx_soat->ViewValue == "")
					$this->dx_soat->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "\"codigo_cie\"" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->dx_soat->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->dx_soat->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
						$this->dx_soat->ViewValue->add($this->dx_soat->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->dx_soat->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->dx_soat->EditValue = $arwrk;
			}

			// estado_pacientefinal
			$this->estado_pacientefinal->EditCustomAttributes = "";
			$this->estado_pacientefinal->EditValue = $this->estado_pacientefinal->options(FALSE);

			// cuando_murio
			$this->cuando_murio->EditAttrs["class"] = "form-control";
			$this->cuando_murio->EditCustomAttributes = "";
			$this->cuando_murio->EditValue = HtmlEncode($this->cuando_murio->CurrentValue);
			$this->cuando_murio->PlaceHolder = RemoveHtml($this->cuando_murio->caption());

			// accidente_vehiculo
			$this->accidente_vehiculo->EditCustomAttributes = "";
			$this->accidente_vehiculo->EditValue = $this->accidente_vehiculo->options(FALSE);

			// atropellado
			$this->atropellado->EditCustomAttributes = "";
			$this->atropellado->EditValue = $this->atropellado->options(FALSE);

			// Add refer script
			// id_servcioambulacia

			$this->id_servcioambulacia->LinkCustomAttributes = "";
			$this->id_servcioambulacia->HrefValue = "";

			// cod_casopreh
			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";

			// cod_ambulancia
			$this->cod_ambulancia->LinkCustomAttributes = "";
			$this->cod_ambulancia->HrefValue = "";

			// hora_confirma
			$this->hora_confirma->LinkCustomAttributes = "";
			$this->hora_confirma->HrefValue = "";

			// hora_asigna
			$this->hora_asigna->LinkCustomAttributes = "";
			$this->hora_asigna->HrefValue = "";

			// hora_llegada
			$this->hora_llegada->LinkCustomAttributes = "";
			$this->hora_llegada->HrefValue = "";

			// hora_inicio
			$this->hora_inicio->LinkCustomAttributes = "";
			$this->hora_inicio->HrefValue = "";

			// hora_destino
			$this->hora_destino->LinkCustomAttributes = "";
			$this->hora_destino->HrefValue = "";

			// hora_preposicion
			$this->hora_preposicion->LinkCustomAttributes = "";
			$this->hora_preposicion->HrefValue = "";

			// observaciones
			$this->observaciones->LinkCustomAttributes = "";
			$this->observaciones->HrefValue = "";

			// tipo_traslado
			$this->tipo_traslado->LinkCustomAttributes = "";
			$this->tipo_traslado->HrefValue = "";

			// traslado_fallido
			$this->traslado_fallido->LinkCustomAttributes = "";
			$this->traslado_fallido->HrefValue = "";

			// estado_paciente
			$this->estado_paciente->LinkCustomAttributes = "";
			$this->estado_paciente->HrefValue = "";

			// k_final
			$this->k_final->LinkCustomAttributes = "";
			$this->k_final->HrefValue = "";

			// k_inical
			$this->k_inical->LinkCustomAttributes = "";
			$this->k_inical->HrefValue = "";

			// tipo_serviciosistema
			$this->tipo_serviciosistema->LinkCustomAttributes = "";
			$this->tipo_serviciosistema->HrefValue = "";

			// preposicion
			$this->preposicion->LinkCustomAttributes = "";
			$this->preposicion->HrefValue = "";

			// conductor
			$this->conductor->LinkCustomAttributes = "";
			$this->conductor->HrefValue = "";

			// medico
			$this->medico->LinkCustomAttributes = "";
			$this->medico->HrefValue = "";

			// paramedico
			$this->paramedico->LinkCustomAttributes = "";
			$this->paramedico->HrefValue = "";

			// dx_aph
			$this->dx_aph->LinkCustomAttributes = "";
			$this->dx_aph->HrefValue = "";

			// dx_soat
			$this->dx_soat->LinkCustomAttributes = "";
			$this->dx_soat->HrefValue = "";

			// estado_pacientefinal
			$this->estado_pacientefinal->LinkCustomAttributes = "";
			$this->estado_pacientefinal->HrefValue = "";

			// cuando_murio
			$this->cuando_murio->LinkCustomAttributes = "";
			$this->cuando_murio->HrefValue = "";

			// accidente_vehiculo
			$this->accidente_vehiculo->LinkCustomAttributes = "";
			$this->accidente_vehiculo->HrefValue = "";

			// atropellado
			$this->atropellado->LinkCustomAttributes = "";
			$this->atropellado->HrefValue = "";
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
		if ($this->id_servcioambulacia->Required) {
			if (!$this->id_servcioambulacia->IsDetailKey && $this->id_servcioambulacia->FormValue != NULL && $this->id_servcioambulacia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_servcioambulacia->caption(), $this->id_servcioambulacia->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->id_servcioambulacia->FormValue)) {
			AddMessage($FormError, $this->id_servcioambulacia->errorMessage());
		}
		if ($this->cod_casopreh->Required) {
			if (!$this->cod_casopreh->IsDetailKey && $this->cod_casopreh->FormValue != NULL && $this->cod_casopreh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_casopreh->caption(), $this->cod_casopreh->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cod_casopreh->FormValue)) {
			AddMessage($FormError, $this->cod_casopreh->errorMessage());
		}
		if ($this->cod_ambulancia->Required) {
			if (!$this->cod_ambulancia->IsDetailKey && $this->cod_ambulancia->FormValue != NULL && $this->cod_ambulancia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cod_ambulancia->caption(), $this->cod_ambulancia->RequiredErrorMessage));
			}
		}
		if ($this->hora_confirma->Required) {
			if (!$this->hora_confirma->IsDetailKey && $this->hora_confirma->FormValue != NULL && $this->hora_confirma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_confirma->caption(), $this->hora_confirma->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_confirma->FormValue)) {
			AddMessage($FormError, $this->hora_confirma->errorMessage());
		}
		if ($this->hora_asigna->Required) {
			if (!$this->hora_asigna->IsDetailKey && $this->hora_asigna->FormValue != NULL && $this->hora_asigna->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_asigna->caption(), $this->hora_asigna->RequiredErrorMessage));
			}
		}
		if ($this->hora_llegada->Required) {
			if (!$this->hora_llegada->IsDetailKey && $this->hora_llegada->FormValue != NULL && $this->hora_llegada->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_llegada->caption(), $this->hora_llegada->RequiredErrorMessage));
			}
		}
		if ($this->hora_inicio->Required) {
			if (!$this->hora_inicio->IsDetailKey && $this->hora_inicio->FormValue != NULL && $this->hora_inicio->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_inicio->caption(), $this->hora_inicio->RequiredErrorMessage));
			}
		}
		if ($this->hora_destino->Required) {
			if (!$this->hora_destino->IsDetailKey && $this->hora_destino->FormValue != NULL && $this->hora_destino->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_destino->caption(), $this->hora_destino->RequiredErrorMessage));
			}
		}
		if ($this->hora_preposicion->Required) {
			if (!$this->hora_preposicion->IsDetailKey && $this->hora_preposicion->FormValue != NULL && $this->hora_preposicion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_preposicion->caption(), $this->hora_preposicion->RequiredErrorMessage));
			}
		}
		if ($this->observaciones->Required) {
			if (!$this->observaciones->IsDetailKey && $this->observaciones->FormValue != NULL && $this->observaciones->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->observaciones->caption(), $this->observaciones->RequiredErrorMessage));
			}
		}
		if ($this->tipo_traslado->Required) {
			if (!$this->tipo_traslado->IsDetailKey && $this->tipo_traslado->FormValue != NULL && $this->tipo_traslado->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_traslado->caption(), $this->tipo_traslado->RequiredErrorMessage));
			}
		}
		if ($this->traslado_fallido->Required) {
			if (!$this->traslado_fallido->IsDetailKey && $this->traslado_fallido->FormValue != NULL && $this->traslado_fallido->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->traslado_fallido->caption(), $this->traslado_fallido->RequiredErrorMessage));
			}
		}
		if ($this->estado_paciente->Required) {
			if (!$this->estado_paciente->IsDetailKey && $this->estado_paciente->FormValue != NULL && $this->estado_paciente->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado_paciente->caption(), $this->estado_paciente->RequiredErrorMessage));
			}
		}
		if ($this->k_final->Required) {
			if (!$this->k_final->IsDetailKey && $this->k_final->FormValue != NULL && $this->k_final->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->k_final->caption(), $this->k_final->RequiredErrorMessage));
			}
		}
		if ($this->k_inical->Required) {
			if (!$this->k_inical->IsDetailKey && $this->k_inical->FormValue != NULL && $this->k_inical->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->k_inical->caption(), $this->k_inical->RequiredErrorMessage));
			}
		}
		if ($this->tipo_serviciosistema->Required) {
			if (!$this->tipo_serviciosistema->IsDetailKey && $this->tipo_serviciosistema->FormValue != NULL && $this->tipo_serviciosistema->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_serviciosistema->caption(), $this->tipo_serviciosistema->RequiredErrorMessage));
			}
		}
		if ($this->preposicion->Required) {
			if (!$this->preposicion->IsDetailKey && $this->preposicion->FormValue != NULL && $this->preposicion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->preposicion->caption(), $this->preposicion->RequiredErrorMessage));
			}
		}
		if ($this->conductor->Required) {
			if (!$this->conductor->IsDetailKey && $this->conductor->FormValue != NULL && $this->conductor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->conductor->caption(), $this->conductor->RequiredErrorMessage));
			}
		}
		if ($this->medico->Required) {
			if (!$this->medico->IsDetailKey && $this->medico->FormValue != NULL && $this->medico->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->medico->caption(), $this->medico->RequiredErrorMessage));
			}
		}
		if ($this->paramedico->Required) {
			if (!$this->paramedico->IsDetailKey && $this->paramedico->FormValue != NULL && $this->paramedico->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paramedico->caption(), $this->paramedico->RequiredErrorMessage));
			}
		}
		if ($this->dx_aph->Required) {
			if ($this->dx_aph->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dx_aph->caption(), $this->dx_aph->RequiredErrorMessage));
			}
		}
		if ($this->dx_soat->Required) {
			if ($this->dx_soat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dx_soat->caption(), $this->dx_soat->RequiredErrorMessage));
			}
		}
		if ($this->estado_pacientefinal->Required) {
			if ($this->estado_pacientefinal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado_pacientefinal->caption(), $this->estado_pacientefinal->RequiredErrorMessage));
			}
		}
		if ($this->cuando_murio->Required) {
			if (!$this->cuando_murio->IsDetailKey && $this->cuando_murio->FormValue != NULL && $this->cuando_murio->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cuando_murio->caption(), $this->cuando_murio->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cuando_murio->FormValue)) {
			AddMessage($FormError, $this->cuando_murio->errorMessage());
		}
		if ($this->accidente_vehiculo->Required) {
			if ($this->accidente_vehiculo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->accidente_vehiculo->caption(), $this->accidente_vehiculo->RequiredErrorMessage));
			}
		}
		if ($this->atropellado->Required) {
			if ($this->atropellado->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->atropellado->caption(), $this->atropellado->RequiredErrorMessage));
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

		// id_servcioambulacia
		$this->id_servcioambulacia->setDbValueDef($rsnew, $this->id_servcioambulacia->CurrentValue, 0, strval($this->id_servcioambulacia->CurrentValue) == "");

		// cod_casopreh
		$this->cod_casopreh->setDbValueDef($rsnew, $this->cod_casopreh->CurrentValue, 0, FALSE);

		// cod_ambulancia
		$this->cod_ambulancia->setDbValueDef($rsnew, $this->cod_ambulancia->CurrentValue, "", FALSE);

		// hora_confirma
		$this->hora_confirma->setDbValueDef($rsnew, UnFormatDateTime($this->hora_confirma->CurrentValue, 0), NULL, FALSE);

		// hora_asigna
		$this->hora_asigna->setDbValueDef($rsnew, UnFormatDateTime($this->hora_asigna->CurrentValue, 0), NULL, FALSE);

		// hora_llegada
		$this->hora_llegada->setDbValueDef($rsnew, UnFormatDateTime($this->hora_llegada->CurrentValue, 0), NULL, FALSE);

		// hora_inicio
		$this->hora_inicio->setDbValueDef($rsnew, UnFormatDateTime($this->hora_inicio->CurrentValue, 0), NULL, FALSE);

		// hora_destino
		$this->hora_destino->setDbValueDef($rsnew, UnFormatDateTime($this->hora_destino->CurrentValue, 0), NULL, FALSE);

		// hora_preposicion
		$this->hora_preposicion->setDbValueDef($rsnew, UnFormatDateTime($this->hora_preposicion->CurrentValue, 0), NULL, FALSE);

		// observaciones
		$this->observaciones->setDbValueDef($rsnew, $this->observaciones->CurrentValue, NULL, FALSE);

		// tipo_traslado
		$this->tipo_traslado->setDbValueDef($rsnew, $this->tipo_traslado->CurrentValue, NULL, FALSE);

		// traslado_fallido
		$this->traslado_fallido->setDbValueDef($rsnew, $this->traslado_fallido->CurrentValue, NULL, FALSE);

		// estado_paciente
		$this->estado_paciente->setDbValueDef($rsnew, $this->estado_paciente->CurrentValue, NULL, FALSE);

		// k_final
		$this->k_final->setDbValueDef($rsnew, $this->k_final->CurrentValue, NULL, FALSE);

		// k_inical
		$this->k_inical->setDbValueDef($rsnew, $this->k_inical->CurrentValue, NULL, FALSE);

		// tipo_serviciosistema
		$this->tipo_serviciosistema->setDbValueDef($rsnew, $this->tipo_serviciosistema->CurrentValue, NULL, FALSE);

		// preposicion
		$this->preposicion->setDbValueDef($rsnew, $this->preposicion->CurrentValue, NULL, FALSE);

		// conductor
		$this->conductor->setDbValueDef($rsnew, $this->conductor->CurrentValue, NULL, FALSE);

		// medico
		$this->medico->setDbValueDef($rsnew, $this->medico->CurrentValue, NULL, FALSE);

		// paramedico
		$this->paramedico->setDbValueDef($rsnew, $this->paramedico->CurrentValue, NULL, FALSE);

		// dx_aph
		$this->dx_aph->setDbValueDef($rsnew, $this->dx_aph->CurrentValue, NULL, FALSE);

		// dx_soat
		$this->dx_soat->setDbValueDef($rsnew, $this->dx_soat->CurrentValue, NULL, FALSE);

		// estado_pacientefinal
		$this->estado_pacientefinal->setDbValueDef($rsnew, $this->estado_pacientefinal->CurrentValue, NULL, FALSE);

		// cuando_murio
		$this->cuando_murio->setDbValueDef($rsnew, $this->cuando_murio->CurrentValue, NULL, FALSE);

		// accidente_vehiculo
		$this->accidente_vehiculo->setDbValueDef($rsnew, $this->accidente_vehiculo->CurrentValue, NULL, FALSE);

		// atropellado
		$this->atropellado->setDbValueDef($rsnew, $this->atropellado->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['cod_casopreh']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['cod_ambulancia']) == "") {
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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_servicio_ambulancialist.php"), "", $this->TableVar, TRUE);
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
				case "x_traslado_fallido":
					break;
				case "x_dx_aph":
					break;
				case "x_dx_soat":
					break;
				case "x_estado_pacientefinal":
					break;
				case "x_accidente_vehiculo":
					break;
				case "x_atropellado":
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
						case "x_traslado_fallido":
							break;
						case "x_dx_aph":
							break;
						case "x_dx_soat":
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
		$this->cod_casopreh->EditValue = htmlspecialchars($_GET["cod_casopreh"]);
		$this->cod_ambulancia->EditValue = htmlspecialchars($_GET["cod_ambulancia"]);

	//	$this->hora_llegada->EditValue = htmlspecialchars('10/10/2020');	
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