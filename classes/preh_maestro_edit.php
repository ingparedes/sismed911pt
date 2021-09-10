<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_maestro_edit extends preh_maestro
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_maestro';

	// Page object name
	public $PageObjName = "preh_maestro_edit";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$SkipHeaderFooter = $OldSkipHeaderFooter;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $preh_maestro;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->cod_casopreh->Visible = FALSE;
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
					$this->terminate(GetUrl("preh_maestrolist.php"));
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
		$this->cod_casopreh->Visible = FALSE;
		$this->fecha->Visible = FALSE;
		$this->tiempo->Visible = FALSE;
		$this->llamada_fallida->Visible = FALSE;
		$this->longitud->Visible = FALSE;
		$this->latitud->Visible = FALSE;
		$this->quepasa->Visible = FALSE;
		$this->direccion->Visible = FALSE;
		$this->estado_llamada->Visible = FALSE;
		$this->incidente->Visible = FALSE;
		$this->prioridad->Visible = FALSE;
		$this->accion->Visible = FALSE;
		$this->estado->Visible = FALSE;
		$this->cierre->Visible = FALSE;
		$this->caso_multiple->Visible = FALSE;
		$this->paciente->Visible = FALSE;
		$this->evaluacion->Visible = FALSE;
		$this->sede->setVisibility();
		$this->fecha_llamada->Visible = FALSE;
		$this->hospital_destino->setVisibility();
		$this->nombre_medico->setVisibility();
		$this->nombre_confirma->Visible = FALSE;
		$this->telefono_confirma->setVisibility();
		$this->telefono->Visible = FALSE;
		$this->nombre_reporta->Visible = FALSE;
		$this->distrito->Visible = FALSE;
		$this->descripcion->Visible = FALSE;
		$this->observacion->Visible = FALSE;
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
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_maestrolist.php");
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
			if (Get("cod_casopreh") !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Get("cod_casopreh"));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Key(0));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->QueryStringValue);
			} elseif (Post("cod_casopreh") !== NULL) {
				$this->cod_casopreh->setFormValue(Post("cod_casopreh"));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->cod_casopreh->setQueryStringValue(Route(2));
				$this->cod_casopreh->setOldValue($this->cod_casopreh->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_cod_casopreh")) {
					$this->cod_casopreh->setFormValue($CurrentForm->getValue("x_cod_casopreh"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("cod_casopreh") !== NULL) {
					$this->cod_casopreh->setQueryStringValue(Get("cod_casopreh"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->cod_casopreh->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->cod_casopreh->CurrentValue = NULL;
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
					$this->terminate("preh_maestrolist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->GetEditUrl();
				if (GetPageName($returnUrl) == "preh_maestrolist.php")
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

		// Check field name 'telefono_confirma' first before field var 'x_telefono_confirma'
		$val = $CurrentForm->hasValue("telefono_confirma") ? $CurrentForm->getValue("telefono_confirma") : $CurrentForm->getValue("x_telefono_confirma");
		if (!$this->telefono_confirma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->telefono_confirma->Visible = FALSE; // Disable update for API request
			else
				$this->telefono_confirma->setFormValue($val);
		}

		// Check field name 'cod_casopreh' first before field var 'x_cod_casopreh'
		$val = $CurrentForm->hasValue("cod_casopreh") ? $CurrentForm->getValue("cod_casopreh") : $CurrentForm->getValue("x_cod_casopreh");
		if (!$this->cod_casopreh->IsDetailKey)
			$this->cod_casopreh->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->cod_casopreh->CurrentValue = $this->cod_casopreh->FormValue;
		$this->sede->CurrentValue = $this->sede->FormValue;
		$this->hospital_destino->CurrentValue = $this->hospital_destino->FormValue;
		$this->nombre_medico->CurrentValue = $this->nombre_medico->FormValue;
		$this->telefono_confirma->CurrentValue = $this->telefono_confirma->FormValue;
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
		$row = [];
		$row['cod_casopreh'] = NULL;
		$row['fecha'] = NULL;
		$row['tiempo'] = NULL;
		$row['llamada_fallida'] = NULL;
		$row['longitud'] = NULL;
		$row['latitud'] = NULL;
		$row['quepasa'] = NULL;
		$row['direccion'] = NULL;
		$row['estado_llamada'] = NULL;
		$row['incidente'] = NULL;
		$row['prioridad'] = NULL;
		$row['accion'] = NULL;
		$row['estado'] = NULL;
		$row['cierre'] = NULL;
		$row['caso_multiple'] = NULL;
		$row['paciente'] = NULL;
		$row['evaluacion'] = NULL;
		$row['sede'] = NULL;
		$row['fecha_llamada'] = NULL;
		$row['hospital_destino'] = NULL;
		$row['nombre_medico'] = NULL;
		$row['nombre_confirma'] = NULL;
		$row['telefono_confirma'] = NULL;
		$row['telefono'] = NULL;
		$row['nombre_reporta'] = NULL;
		$row['distrito'] = NULL;
		$row['descripcion'] = NULL;
		$row['observacion'] = NULL;
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

			// telefono_confirma
			$this->telefono_confirma->LinkCustomAttributes = "";
			$this->telefono_confirma->HrefValue = "";
			$this->telefono_confirma->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// sede
			$this->sede->EditAttrs["class"] = "form-control";
			$this->sede->EditCustomAttributes = "";

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

			// telefono_confirma
			$this->telefono_confirma->EditAttrs["class"] = "form-control";
			$this->telefono_confirma->EditCustomAttributes = "";
			if (!$this->telefono_confirma->Raw)
				$this->telefono_confirma->CurrentValue = HtmlDecode($this->telefono_confirma->CurrentValue);
			$this->telefono_confirma->EditValue = HtmlEncode($this->telefono_confirma->CurrentValue);
			$this->telefono_confirma->PlaceHolder = RemoveHtml($this->telefono_confirma->caption());

			// Edit refer script
			// sede

			$this->sede->LinkCustomAttributes = "";
			$this->sede->HrefValue = "";

			// hospital_destino
			$this->hospital_destino->LinkCustomAttributes = "";
			$this->hospital_destino->HrefValue = "";

			// nombre_medico
			$this->nombre_medico->LinkCustomAttributes = "";
			$this->nombre_medico->HrefValue = "";

			// telefono_confirma
			$this->telefono_confirma->LinkCustomAttributes = "";
			$this->telefono_confirma->HrefValue = "";
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
		if ($this->telefono_confirma->Required) {
			if (!$this->telefono_confirma->IsDetailKey && $this->telefono_confirma->FormValue != NULL && $this->telefono_confirma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefono_confirma->caption(), $this->telefono_confirma->RequiredErrorMessage));
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

			// sede
			$this->sede->setDbValueDef($rsnew, $this->sede->CurrentValue, NULL, $this->sede->ReadOnly);

			// hospital_destino
			$this->hospital_destino->setDbValueDef($rsnew, $this->hospital_destino->CurrentValue, NULL, $this->hospital_destino->ReadOnly);

			// nombre_medico
			$this->nombre_medico->setDbValueDef($rsnew, $this->nombre_medico->CurrentValue, NULL, $this->nombre_medico->ReadOnly);

			// telefono_confirma
			$this->telefono_confirma->setDbValueDef($rsnew, $this->telefono_confirma->CurrentValue, NULL, $this->telefono_confirma->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_maestrolist.php"), "", $this->TableVar, TRUE);
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
			$this->cod_casopreh->EditValue = htmlspecialchars($_GET["cod_casopreh"]);
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