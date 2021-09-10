<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class sala_rac_edit extends sala_rac
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'sala_rac';

	// Page object name
	public $PageObjName = "sala_rac_edit";

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

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "sala_racview.php")
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
					$this->terminate(GetUrl("sala_raclist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_registro->setVisibility();
		$this->fecha_hora->setVisibility();
		$this->id_admision->setVisibility();
		$this->acompanante->setVisibility();
		$this->tel_acompanante->setVisibility();
		$this->tipo_urgencia->setVisibility();
		$this->clasificacion->setVisibility();
		$this->motivo_consulta->setVisibility();
		$this->signos_vitales->setVisibility();
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
		$this->descripcion_signos->setVisibility();
		$this->hospital->setVisibility();
		$this->motivo_trauma->setVisibility();
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
		// Check permission

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("sala_raclist.php");
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
			if (Get("id_registro") !== NULL) {
				$this->id_registro->setQueryStringValue(Get("id_registro"));
				$this->id_registro->setOldValue($this->id_registro->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->id_registro->setQueryStringValue(Key(0));
				$this->id_registro->setOldValue($this->id_registro->QueryStringValue);
			} elseif (Post("id_registro") !== NULL) {
				$this->id_registro->setFormValue(Post("id_registro"));
				$this->id_registro->setOldValue($this->id_registro->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->id_registro->setQueryStringValue(Route(2));
				$this->id_registro->setOldValue($this->id_registro->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_id_registro")) {
					$this->id_registro->setFormValue($CurrentForm->getValue("x_id_registro"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("id_registro") !== NULL) {
					$this->id_registro->setQueryStringValue(Get("id_registro"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->id_registro->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->id_registro->CurrentValue = NULL;
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
					$this->terminate("sala_raclist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "sala_raclist.php")
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

		// Check field name 'id_registro' first before field var 'x_id_registro'
		$val = $CurrentForm->hasValue("id_registro") ? $CurrentForm->getValue("id_registro") : $CurrentForm->getValue("x_id_registro");
		if (!$this->id_registro->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->id_registro->Visible = FALSE; // Disable update for API request
			else
				$this->id_registro->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_id_registro"))
			$this->id_registro->setOldValue($CurrentForm->getValue("o_id_registro"));

		// Check field name 'fecha_hora' first before field var 'x_fecha_hora'
		$val = $CurrentForm->hasValue("fecha_hora") ? $CurrentForm->getValue("fecha_hora") : $CurrentForm->getValue("x_fecha_hora");
		if (!$this->fecha_hora->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fecha_hora->Visible = FALSE; // Disable update for API request
			else
				$this->fecha_hora->setFormValue($val);
			$this->fecha_hora->CurrentValue = UnFormatDateTime($this->fecha_hora->CurrentValue, 0);
		}

		// Check field name 'id_admision' first before field var 'x_id_admision'
		$val = $CurrentForm->hasValue("id_admision") ? $CurrentForm->getValue("id_admision") : $CurrentForm->getValue("x_id_admision");
		if (!$this->id_admision->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->id_admision->Visible = FALSE; // Disable update for API request
			else
				$this->id_admision->setFormValue($val);
		}

		// Check field name 'acompañante' first before field var 'x_acompanante'
		$val = $CurrentForm->hasValue("acompañante") ? $CurrentForm->getValue("acompañante") : $CurrentForm->getValue("x_acompanante");
		if (!$this->acompanante->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->acompanante->Visible = FALSE; // Disable update for API request
			else
				$this->acompanante->setFormValue($val);
		}

		// Check field name 'tel_acompañante' first before field var 'x_tel_acompanante'
		$val = $CurrentForm->hasValue("tel_acompañante") ? $CurrentForm->getValue("tel_acompañante") : $CurrentForm->getValue("x_tel_acompanante");
		if (!$this->tel_acompanante->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tel_acompanante->Visible = FALSE; // Disable update for API request
			else
				$this->tel_acompanante->setFormValue($val);
		}

		// Check field name 'tipo_urgencia' first before field var 'x_tipo_urgencia'
		$val = $CurrentForm->hasValue("tipo_urgencia") ? $CurrentForm->getValue("tipo_urgencia") : $CurrentForm->getValue("x_tipo_urgencia");
		if (!$this->tipo_urgencia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_urgencia->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_urgencia->setFormValue($val);
		}

		// Check field name 'clasificacion' first before field var 'x_clasificacion'
		$val = $CurrentForm->hasValue("clasificacion") ? $CurrentForm->getValue("clasificacion") : $CurrentForm->getValue("x_clasificacion");
		if (!$this->clasificacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->clasificacion->Visible = FALSE; // Disable update for API request
			else
				$this->clasificacion->setFormValue($val);
		}

		// Check field name 'motivo_consulta' first before field var 'x_motivo_consulta'
		$val = $CurrentForm->hasValue("motivo_consulta") ? $CurrentForm->getValue("motivo_consulta") : $CurrentForm->getValue("x_motivo_consulta");
		if (!$this->motivo_consulta->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->motivo_consulta->Visible = FALSE; // Disable update for API request
			else
				$this->motivo_consulta->setFormValue($val);
		}

		// Check field name 'signos_vitales' first before field var 'x_signos_vitales'
		$val = $CurrentForm->hasValue("signos_vitales") ? $CurrentForm->getValue("signos_vitales") : $CurrentForm->getValue("x_signos_vitales");
		if (!$this->signos_vitales->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->signos_vitales->Visible = FALSE; // Disable update for API request
			else
				$this->signos_vitales->setFormValue($val);
		}

		// Check field name 'so2' first before field var 'x_so2'
		$val = $CurrentForm->hasValue("so2") ? $CurrentForm->getValue("so2") : $CurrentForm->getValue("x_so2");
		if (!$this->so2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->so2->Visible = FALSE; // Disable update for API request
			else
				$this->so2->setFormValue($val);
		}

		// Check field name 'fr' first before field var 'x_fr'
		$val = $CurrentForm->hasValue("fr") ? $CurrentForm->getValue("fr") : $CurrentForm->getValue("x_fr");
		if (!$this->fr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fr->Visible = FALSE; // Disable update for API request
			else
				$this->fr->setFormValue($val);
		}

		// Check field name '_t' first before field var 'x__t'
		$val = $CurrentForm->hasValue("_t") ? $CurrentForm->getValue("_t") : $CurrentForm->getValue("x__t");
		if (!$this->_t->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_t->Visible = FALSE; // Disable update for API request
			else
				$this->_t->setFormValue($val);
		}

		// Check field name 'fc' first before field var 'x_fc'
		$val = $CurrentForm->hasValue("fc") ? $CurrentForm->getValue("fc") : $CurrentForm->getValue("x_fc");
		if (!$this->fc->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fc->Visible = FALSE; // Disable update for API request
			else
				$this->fc->setFormValue($val);
		}

		// Check field name 'pas' first before field var 'x_pas'
		$val = $CurrentForm->hasValue("pas") ? $CurrentForm->getValue("pas") : $CurrentForm->getValue("x_pas");
		if (!$this->pas->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->pas->Visible = FALSE; // Disable update for API request
			else
				$this->pas->setFormValue($val);
		}

		// Check field name 'pad' first before field var 'x_pad'
		$val = $CurrentForm->hasValue("pad") ? $CurrentForm->getValue("pad") : $CurrentForm->getValue("x_pad");
		if (!$this->pad->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->pad->Visible = FALSE; // Disable update for API request
			else
				$this->pad->setFormValue($val);
		}

		// Check field name 'local_trauma' first before field var 'x_local_trauma'
		$val = $CurrentForm->hasValue("local_trauma") ? $CurrentForm->getValue("local_trauma") : $CurrentForm->getValue("x_local_trauma");
		if (!$this->local_trauma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->local_trauma->Visible = FALSE; // Disable update for API request
			else
				$this->local_trauma->setFormValue($val);
		}

		// Check field name 'sistema' first before field var 'x_sistema'
		$val = $CurrentForm->hasValue("sistema") ? $CurrentForm->getValue("sistema") : $CurrentForm->getValue("x_sistema");
		if (!$this->sistema->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sistema->Visible = FALSE; // Disable update for API request
			else
				$this->sistema->setFormValue($val);
		}

		// Check field name 'nivel_conciencia' first before field var 'x_nivel_conciencia'
		$val = $CurrentForm->hasValue("nivel_conciencia") ? $CurrentForm->getValue("nivel_conciencia") : $CurrentForm->getValue("x_nivel_conciencia");
		if (!$this->nivel_conciencia->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->nivel_conciencia->Visible = FALSE; // Disable update for API request
			else
				$this->nivel_conciencia->setFormValue($val);
		}

		// Check field name 'dolor' first before field var 'x_dolor'
		$val = $CurrentForm->hasValue("dolor") ? $CurrentForm->getValue("dolor") : $CurrentForm->getValue("x_dolor");
		if (!$this->dolor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dolor->Visible = FALSE; // Disable update for API request
			else
				$this->dolor->setFormValue($val);
		}

		// Check field name 'signos_sintomas' first before field var 'x_signos_sintomas'
		$val = $CurrentForm->hasValue("signos_sintomas") ? $CurrentForm->getValue("signos_sintomas") : $CurrentForm->getValue("x_signos_sintomas");
		if (!$this->signos_sintomas->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->signos_sintomas->Visible = FALSE; // Disable update for API request
			else
				$this->signos_sintomas->setFormValue($val);
		}

		// Check field name 'factores_riesgos' first before field var 'x_factores_riesgos'
		$val = $CurrentForm->hasValue("factores_riesgos") ? $CurrentForm->getValue("factores_riesgos") : $CurrentForm->getValue("x_factores_riesgos");
		if (!$this->factores_riesgos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->factores_riesgos->Visible = FALSE; // Disable update for API request
			else
				$this->factores_riesgos->setFormValue($val);
		}

		// Check field name 'estado_final' first before field var 'x_estado_final'
		$val = $CurrentForm->hasValue("estado_final") ? $CurrentForm->getValue("estado_final") : $CurrentForm->getValue("x_estado_final");
		if (!$this->estado_final->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->estado_final->Visible = FALSE; // Disable update for API request
			else
				$this->estado_final->setFormValue($val);
		}

		// Check field name 'tipo_ingreso' first before field var 'x_tipo_ingreso'
		$val = $CurrentForm->hasValue("tipo_ingreso") ? $CurrentForm->getValue("tipo_ingreso") : $CurrentForm->getValue("x_tipo_ingreso");
		if (!$this->tipo_ingreso->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tipo_ingreso->Visible = FALSE; // Disable update for API request
			else
				$this->tipo_ingreso->setFormValue($val);
		}

		// Check field name 'hora_clasificacion' first before field var 'x_hora_clasificacion'
		$val = $CurrentForm->hasValue("hora_clasificacion") ? $CurrentForm->getValue("hora_clasificacion") : $CurrentForm->getValue("x_hora_clasificacion");
		if (!$this->hora_clasificacion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hora_clasificacion->Visible = FALSE; // Disable update for API request
			else
				$this->hora_clasificacion->setFormValue($val);
			$this->hora_clasificacion->CurrentValue = UnFormatDateTime($this->hora_clasificacion->CurrentValue, 0);
		}

		// Check field name 'descripcion_signos' first before field var 'x_descripcion_signos'
		$val = $CurrentForm->hasValue("descripcion_signos") ? $CurrentForm->getValue("descripcion_signos") : $CurrentForm->getValue("x_descripcion_signos");
		if (!$this->descripcion_signos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->descripcion_signos->Visible = FALSE; // Disable update for API request
			else
				$this->descripcion_signos->setFormValue($val);
		}

		// Check field name 'hospital' first before field var 'x_hospital'
		$val = $CurrentForm->hasValue("hospital") ? $CurrentForm->getValue("hospital") : $CurrentForm->getValue("x_hospital");
		if (!$this->hospital->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->hospital->Visible = FALSE; // Disable update for API request
			else
				$this->hospital->setFormValue($val);
		}

		// Check field name 'motivo_trauma' first before field var 'x_motivo_trauma'
		$val = $CurrentForm->hasValue("motivo_trauma") ? $CurrentForm->getValue("motivo_trauma") : $CurrentForm->getValue("x_motivo_trauma");
		if (!$this->motivo_trauma->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->motivo_trauma->Visible = FALSE; // Disable update for API request
			else
				$this->motivo_trauma->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id_registro->CurrentValue = $this->id_registro->FormValue;
		$this->fecha_hora->CurrentValue = $this->fecha_hora->FormValue;
		$this->fecha_hora->CurrentValue = UnFormatDateTime($this->fecha_hora->CurrentValue, 0);
		$this->id_admision->CurrentValue = $this->id_admision->FormValue;
		$this->acompanante->CurrentValue = $this->acompanante->FormValue;
		$this->tel_acompanante->CurrentValue = $this->tel_acompanante->FormValue;
		$this->tipo_urgencia->CurrentValue = $this->tipo_urgencia->FormValue;
		$this->clasificacion->CurrentValue = $this->clasificacion->FormValue;
		$this->motivo_consulta->CurrentValue = $this->motivo_consulta->FormValue;
		$this->signos_vitales->CurrentValue = $this->signos_vitales->FormValue;
		$this->so2->CurrentValue = $this->so2->FormValue;
		$this->fr->CurrentValue = $this->fr->FormValue;
		$this->_t->CurrentValue = $this->_t->FormValue;
		$this->fc->CurrentValue = $this->fc->FormValue;
		$this->pas->CurrentValue = $this->pas->FormValue;
		$this->pad->CurrentValue = $this->pad->FormValue;
		$this->local_trauma->CurrentValue = $this->local_trauma->FormValue;
		$this->sistema->CurrentValue = $this->sistema->FormValue;
		$this->nivel_conciencia->CurrentValue = $this->nivel_conciencia->FormValue;
		$this->dolor->CurrentValue = $this->dolor->FormValue;
		$this->signos_sintomas->CurrentValue = $this->signos_sintomas->FormValue;
		$this->factores_riesgos->CurrentValue = $this->factores_riesgos->FormValue;
		$this->estado_final->CurrentValue = $this->estado_final->FormValue;
		$this->tipo_ingreso->CurrentValue = $this->tipo_ingreso->FormValue;
		$this->hora_clasificacion->CurrentValue = $this->hora_clasificacion->FormValue;
		$this->hora_clasificacion->CurrentValue = UnFormatDateTime($this->hora_clasificacion->CurrentValue, 0);
		$this->descripcion_signos->CurrentValue = $this->descripcion_signos->FormValue;
		$this->hospital->CurrentValue = $this->hospital->FormValue;
		$this->motivo_trauma->CurrentValue = $this->motivo_trauma->FormValue;
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

			// motivo_consulta
			$this->motivo_consulta->ViewValue = $this->motivo_consulta->CurrentValue;
			$this->motivo_consulta->ViewCustomAttributes = "";

			// signos_vitales
			$this->signos_vitales->ViewValue = $this->signos_vitales->CurrentValue;
			$this->signos_vitales->ViewCustomAttributes = "";

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

			// descripcion_signos
			$this->descripcion_signos->ViewValue = $this->descripcion_signos->CurrentValue;
			$this->descripcion_signos->ViewCustomAttributes = "";

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

			// motivo_consulta
			$this->motivo_consulta->LinkCustomAttributes = "";
			$this->motivo_consulta->HrefValue = "";
			$this->motivo_consulta->TooltipValue = "";

			// signos_vitales
			$this->signos_vitales->LinkCustomAttributes = "";
			$this->signos_vitales->HrefValue = "";
			$this->signos_vitales->TooltipValue = "";

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

			// descripcion_signos
			$this->descripcion_signos->LinkCustomAttributes = "";
			$this->descripcion_signos->HrefValue = "";
			$this->descripcion_signos->TooltipValue = "";

			// hospital
			$this->hospital->LinkCustomAttributes = "";
			$this->hospital->HrefValue = "";
			$this->hospital->TooltipValue = "";

			// motivo_trauma
			$this->motivo_trauma->LinkCustomAttributes = "";
			$this->motivo_trauma->HrefValue = "";
			$this->motivo_trauma->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id_registro
			$this->id_registro->EditAttrs["class"] = "form-control";
			$this->id_registro->EditCustomAttributes = "";
			$this->id_registro->EditValue = HtmlEncode($this->id_registro->CurrentValue);
			$this->id_registro->PlaceHolder = RemoveHtml($this->id_registro->caption());

			// fecha_hora
			$this->fecha_hora->EditAttrs["class"] = "form-control";
			$this->fecha_hora->EditCustomAttributes = "";
			$this->fecha_hora->EditValue = HtmlEncode(FormatDateTime($this->fecha_hora->CurrentValue, 8));
			$this->fecha_hora->PlaceHolder = RemoveHtml($this->fecha_hora->caption());

			// id_admision
			$this->id_admision->EditAttrs["class"] = "form-control";
			$this->id_admision->EditCustomAttributes = "";
			if (!$this->id_admision->Raw)
				$this->id_admision->CurrentValue = HtmlDecode($this->id_admision->CurrentValue);
			$this->id_admision->EditValue = HtmlEncode($this->id_admision->CurrentValue);
			$this->id_admision->PlaceHolder = RemoveHtml($this->id_admision->caption());

			// acompañante
			$this->acompanante->EditAttrs["class"] = "form-control";
			$this->acompanante->EditCustomAttributes = "";
			if (!$this->acompanante->Raw)
				$this->acompanante->CurrentValue = HtmlDecode($this->acompanante->CurrentValue);
			$this->acompanante->EditValue = HtmlEncode($this->acompanante->CurrentValue);
			$this->acompanante->PlaceHolder = RemoveHtml($this->acompanante->caption());

			// tel_acompañante
			$this->tel_acompanante->EditAttrs["class"] = "form-control";
			$this->tel_acompanante->EditCustomAttributes = "";
			if (!$this->tel_acompanante->Raw)
				$this->tel_acompanante->CurrentValue = HtmlDecode($this->tel_acompanante->CurrentValue);
			$this->tel_acompanante->EditValue = HtmlEncode($this->tel_acompanante->CurrentValue);
			$this->tel_acompanante->PlaceHolder = RemoveHtml($this->tel_acompanante->caption());

			// tipo_urgencia
			$this->tipo_urgencia->EditAttrs["class"] = "form-control";
			$this->tipo_urgencia->EditCustomAttributes = "";
			if (!$this->tipo_urgencia->Raw)
				$this->tipo_urgencia->CurrentValue = HtmlDecode($this->tipo_urgencia->CurrentValue);
			$this->tipo_urgencia->EditValue = HtmlEncode($this->tipo_urgencia->CurrentValue);
			$this->tipo_urgencia->PlaceHolder = RemoveHtml($this->tipo_urgencia->caption());

			// clasificacion
			$this->clasificacion->EditAttrs["class"] = "form-control";
			$this->clasificacion->EditCustomAttributes = "";
			if (!$this->clasificacion->Raw)
				$this->clasificacion->CurrentValue = HtmlDecode($this->clasificacion->CurrentValue);
			$this->clasificacion->EditValue = HtmlEncode($this->clasificacion->CurrentValue);
			$this->clasificacion->PlaceHolder = RemoveHtml($this->clasificacion->caption());

			// motivo_consulta
			$this->motivo_consulta->EditAttrs["class"] = "form-control";
			$this->motivo_consulta->EditCustomAttributes = "";
			$this->motivo_consulta->EditValue = HtmlEncode($this->motivo_consulta->CurrentValue);
			$this->motivo_consulta->PlaceHolder = RemoveHtml($this->motivo_consulta->caption());

			// signos_vitales
			$this->signos_vitales->EditAttrs["class"] = "form-control";
			$this->signos_vitales->EditCustomAttributes = "";
			$this->signos_vitales->EditValue = HtmlEncode($this->signos_vitales->CurrentValue);
			$this->signos_vitales->PlaceHolder = RemoveHtml($this->signos_vitales->caption());

			// so2
			$this->so2->EditAttrs["class"] = "form-control";
			$this->so2->EditCustomAttributes = "";
			if (!$this->so2->Raw)
				$this->so2->CurrentValue = HtmlDecode($this->so2->CurrentValue);
			$this->so2->EditValue = HtmlEncode($this->so2->CurrentValue);
			$this->so2->PlaceHolder = RemoveHtml($this->so2->caption());

			// fr
			$this->fr->EditAttrs["class"] = "form-control";
			$this->fr->EditCustomAttributes = "";
			if (!$this->fr->Raw)
				$this->fr->CurrentValue = HtmlDecode($this->fr->CurrentValue);
			$this->fr->EditValue = HtmlEncode($this->fr->CurrentValue);
			$this->fr->PlaceHolder = RemoveHtml($this->fr->caption());

			// t
			$this->_t->EditAttrs["class"] = "form-control";
			$this->_t->EditCustomAttributes = "";
			if (!$this->_t->Raw)
				$this->_t->CurrentValue = HtmlDecode($this->_t->CurrentValue);
			$this->_t->EditValue = HtmlEncode($this->_t->CurrentValue);
			$this->_t->PlaceHolder = RemoveHtml($this->_t->caption());

			// fc
			$this->fc->EditAttrs["class"] = "form-control";
			$this->fc->EditCustomAttributes = "";
			if (!$this->fc->Raw)
				$this->fc->CurrentValue = HtmlDecode($this->fc->CurrentValue);
			$this->fc->EditValue = HtmlEncode($this->fc->CurrentValue);
			$this->fc->PlaceHolder = RemoveHtml($this->fc->caption());

			// pas
			$this->pas->EditAttrs["class"] = "form-control";
			$this->pas->EditCustomAttributes = "";
			if (!$this->pas->Raw)
				$this->pas->CurrentValue = HtmlDecode($this->pas->CurrentValue);
			$this->pas->EditValue = HtmlEncode($this->pas->CurrentValue);
			$this->pas->PlaceHolder = RemoveHtml($this->pas->caption());

			// pad
			$this->pad->EditAttrs["class"] = "form-control";
			$this->pad->EditCustomAttributes = "";
			if (!$this->pad->Raw)
				$this->pad->CurrentValue = HtmlDecode($this->pad->CurrentValue);
			$this->pad->EditValue = HtmlEncode($this->pad->CurrentValue);
			$this->pad->PlaceHolder = RemoveHtml($this->pad->caption());

			// local_trauma
			$this->local_trauma->EditAttrs["class"] = "form-control";
			$this->local_trauma->EditCustomAttributes = "";
			if (!$this->local_trauma->Raw)
				$this->local_trauma->CurrentValue = HtmlDecode($this->local_trauma->CurrentValue);
			$this->local_trauma->EditValue = HtmlEncode($this->local_trauma->CurrentValue);
			$this->local_trauma->PlaceHolder = RemoveHtml($this->local_trauma->caption());

			// sistema
			$this->sistema->EditAttrs["class"] = "form-control";
			$this->sistema->EditCustomAttributes = "";
			if (!$this->sistema->Raw)
				$this->sistema->CurrentValue = HtmlDecode($this->sistema->CurrentValue);
			$this->sistema->EditValue = HtmlEncode($this->sistema->CurrentValue);
			$this->sistema->PlaceHolder = RemoveHtml($this->sistema->caption());

			// nivel_conciencia
			$this->nivel_conciencia->EditAttrs["class"] = "form-control";
			$this->nivel_conciencia->EditCustomAttributes = "";
			if (!$this->nivel_conciencia->Raw)
				$this->nivel_conciencia->CurrentValue = HtmlDecode($this->nivel_conciencia->CurrentValue);
			$this->nivel_conciencia->EditValue = HtmlEncode($this->nivel_conciencia->CurrentValue);
			$this->nivel_conciencia->PlaceHolder = RemoveHtml($this->nivel_conciencia->caption());

			// dolor
			$this->dolor->EditAttrs["class"] = "form-control";
			$this->dolor->EditCustomAttributes = "";
			if (!$this->dolor->Raw)
				$this->dolor->CurrentValue = HtmlDecode($this->dolor->CurrentValue);
			$this->dolor->EditValue = HtmlEncode($this->dolor->CurrentValue);
			$this->dolor->PlaceHolder = RemoveHtml($this->dolor->caption());

			// signos_sintomas
			$this->signos_sintomas->EditAttrs["class"] = "form-control";
			$this->signos_sintomas->EditCustomAttributes = "";
			if (!$this->signos_sintomas->Raw)
				$this->signos_sintomas->CurrentValue = HtmlDecode($this->signos_sintomas->CurrentValue);
			$this->signos_sintomas->EditValue = HtmlEncode($this->signos_sintomas->CurrentValue);
			$this->signos_sintomas->PlaceHolder = RemoveHtml($this->signos_sintomas->caption());

			// factores_riesgos
			$this->factores_riesgos->EditAttrs["class"] = "form-control";
			$this->factores_riesgos->EditCustomAttributes = "";
			if (!$this->factores_riesgos->Raw)
				$this->factores_riesgos->CurrentValue = HtmlDecode($this->factores_riesgos->CurrentValue);
			$this->factores_riesgos->EditValue = HtmlEncode($this->factores_riesgos->CurrentValue);
			$this->factores_riesgos->PlaceHolder = RemoveHtml($this->factores_riesgos->caption());

			// estado_final
			$this->estado_final->EditAttrs["class"] = "form-control";
			$this->estado_final->EditCustomAttributes = "";
			if (!$this->estado_final->Raw)
				$this->estado_final->CurrentValue = HtmlDecode($this->estado_final->CurrentValue);
			$this->estado_final->EditValue = HtmlEncode($this->estado_final->CurrentValue);
			$this->estado_final->PlaceHolder = RemoveHtml($this->estado_final->caption());

			// tipo_ingreso
			$this->tipo_ingreso->EditAttrs["class"] = "form-control";
			$this->tipo_ingreso->EditCustomAttributes = "";
			if (!$this->tipo_ingreso->Raw)
				$this->tipo_ingreso->CurrentValue = HtmlDecode($this->tipo_ingreso->CurrentValue);
			$this->tipo_ingreso->EditValue = HtmlEncode($this->tipo_ingreso->CurrentValue);
			$this->tipo_ingreso->PlaceHolder = RemoveHtml($this->tipo_ingreso->caption());

			// hora_clasificacion
			$this->hora_clasificacion->EditAttrs["class"] = "form-control";
			$this->hora_clasificacion->EditCustomAttributes = "";
			$this->hora_clasificacion->EditValue = HtmlEncode(FormatDateTime($this->hora_clasificacion->CurrentValue, 8));
			$this->hora_clasificacion->PlaceHolder = RemoveHtml($this->hora_clasificacion->caption());

			// descripcion_signos
			$this->descripcion_signos->EditAttrs["class"] = "form-control";
			$this->descripcion_signos->EditCustomAttributes = "";
			$this->descripcion_signos->EditValue = HtmlEncode($this->descripcion_signos->CurrentValue);
			$this->descripcion_signos->PlaceHolder = RemoveHtml($this->descripcion_signos->caption());

			// hospital
			$this->hospital->EditAttrs["class"] = "form-control";
			$this->hospital->EditCustomAttributes = "";
			if (!$this->hospital->Raw)
				$this->hospital->CurrentValue = HtmlDecode($this->hospital->CurrentValue);
			$this->hospital->EditValue = HtmlEncode($this->hospital->CurrentValue);
			$this->hospital->PlaceHolder = RemoveHtml($this->hospital->caption());

			// motivo_trauma
			$this->motivo_trauma->EditAttrs["class"] = "form-control";
			$this->motivo_trauma->EditCustomAttributes = "";
			if (!$this->motivo_trauma->Raw)
				$this->motivo_trauma->CurrentValue = HtmlDecode($this->motivo_trauma->CurrentValue);
			$this->motivo_trauma->EditValue = HtmlEncode($this->motivo_trauma->CurrentValue);
			$this->motivo_trauma->PlaceHolder = RemoveHtml($this->motivo_trauma->caption());

			// Edit refer script
			// id_registro

			$this->id_registro->LinkCustomAttributes = "";
			$this->id_registro->HrefValue = "";

			// fecha_hora
			$this->fecha_hora->LinkCustomAttributes = "";
			$this->fecha_hora->HrefValue = "";

			// id_admision
			$this->id_admision->LinkCustomAttributes = "";
			$this->id_admision->HrefValue = "";

			// acompañante
			$this->acompanante->LinkCustomAttributes = "";
			$this->acompanante->HrefValue = "";

			// tel_acompañante
			$this->tel_acompanante->LinkCustomAttributes = "";
			$this->tel_acompanante->HrefValue = "";

			// tipo_urgencia
			$this->tipo_urgencia->LinkCustomAttributes = "";
			$this->tipo_urgencia->HrefValue = "";

			// clasificacion
			$this->clasificacion->LinkCustomAttributes = "";
			$this->clasificacion->HrefValue = "";

			// motivo_consulta
			$this->motivo_consulta->LinkCustomAttributes = "";
			$this->motivo_consulta->HrefValue = "";

			// signos_vitales
			$this->signos_vitales->LinkCustomAttributes = "";
			$this->signos_vitales->HrefValue = "";

			// so2
			$this->so2->LinkCustomAttributes = "";
			$this->so2->HrefValue = "";

			// fr
			$this->fr->LinkCustomAttributes = "";
			$this->fr->HrefValue = "";

			// t
			$this->_t->LinkCustomAttributes = "";
			$this->_t->HrefValue = "";

			// fc
			$this->fc->LinkCustomAttributes = "";
			$this->fc->HrefValue = "";

			// pas
			$this->pas->LinkCustomAttributes = "";
			$this->pas->HrefValue = "";

			// pad
			$this->pad->LinkCustomAttributes = "";
			$this->pad->HrefValue = "";

			// local_trauma
			$this->local_trauma->LinkCustomAttributes = "";
			$this->local_trauma->HrefValue = "";

			// sistema
			$this->sistema->LinkCustomAttributes = "";
			$this->sistema->HrefValue = "";

			// nivel_conciencia
			$this->nivel_conciencia->LinkCustomAttributes = "";
			$this->nivel_conciencia->HrefValue = "";

			// dolor
			$this->dolor->LinkCustomAttributes = "";
			$this->dolor->HrefValue = "";

			// signos_sintomas
			$this->signos_sintomas->LinkCustomAttributes = "";
			$this->signos_sintomas->HrefValue = "";

			// factores_riesgos
			$this->factores_riesgos->LinkCustomAttributes = "";
			$this->factores_riesgos->HrefValue = "";

			// estado_final
			$this->estado_final->LinkCustomAttributes = "";
			$this->estado_final->HrefValue = "";

			// tipo_ingreso
			$this->tipo_ingreso->LinkCustomAttributes = "";
			$this->tipo_ingreso->HrefValue = "";

			// hora_clasificacion
			$this->hora_clasificacion->LinkCustomAttributes = "";
			$this->hora_clasificacion->HrefValue = "";

			// descripcion_signos
			$this->descripcion_signos->LinkCustomAttributes = "";
			$this->descripcion_signos->HrefValue = "";

			// hospital
			$this->hospital->LinkCustomAttributes = "";
			$this->hospital->HrefValue = "";

			// motivo_trauma
			$this->motivo_trauma->LinkCustomAttributes = "";
			$this->motivo_trauma->HrefValue = "";
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
		if ($this->id_registro->Required) {
			if (!$this->id_registro->IsDetailKey && $this->id_registro->FormValue != NULL && $this->id_registro->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_registro->caption(), $this->id_registro->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->id_registro->FormValue)) {
			AddMessage($FormError, $this->id_registro->errorMessage());
		}
		if ($this->fecha_hora->Required) {
			if (!$this->fecha_hora->IsDetailKey && $this->fecha_hora->FormValue != NULL && $this->fecha_hora->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fecha_hora->caption(), $this->fecha_hora->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->fecha_hora->FormValue)) {
			AddMessage($FormError, $this->fecha_hora->errorMessage());
		}
		if ($this->id_admision->Required) {
			if (!$this->id_admision->IsDetailKey && $this->id_admision->FormValue != NULL && $this->id_admision->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_admision->caption(), $this->id_admision->RequiredErrorMessage));
			}
		}
		if ($this->acompanante->Required) {
			if (!$this->acompanante->IsDetailKey && $this->acompanante->FormValue != NULL && $this->acompanante->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->acompanante->caption(), $this->acompanante->RequiredErrorMessage));
			}
		}
		if ($this->tel_acompanante->Required) {
			if (!$this->tel_acompanante->IsDetailKey && $this->tel_acompanante->FormValue != NULL && $this->tel_acompanante->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tel_acompanante->caption(), $this->tel_acompanante->RequiredErrorMessage));
			}
		}
		if ($this->tipo_urgencia->Required) {
			if (!$this->tipo_urgencia->IsDetailKey && $this->tipo_urgencia->FormValue != NULL && $this->tipo_urgencia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_urgencia->caption(), $this->tipo_urgencia->RequiredErrorMessage));
			}
		}
		if ($this->clasificacion->Required) {
			if (!$this->clasificacion->IsDetailKey && $this->clasificacion->FormValue != NULL && $this->clasificacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->clasificacion->caption(), $this->clasificacion->RequiredErrorMessage));
			}
		}
		if ($this->motivo_consulta->Required) {
			if (!$this->motivo_consulta->IsDetailKey && $this->motivo_consulta->FormValue != NULL && $this->motivo_consulta->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->motivo_consulta->caption(), $this->motivo_consulta->RequiredErrorMessage));
			}
		}
		if ($this->signos_vitales->Required) {
			if (!$this->signos_vitales->IsDetailKey && $this->signos_vitales->FormValue != NULL && $this->signos_vitales->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->signos_vitales->caption(), $this->signos_vitales->RequiredErrorMessage));
			}
		}
		if ($this->so2->Required) {
			if (!$this->so2->IsDetailKey && $this->so2->FormValue != NULL && $this->so2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->so2->caption(), $this->so2->RequiredErrorMessage));
			}
		}
		if ($this->fr->Required) {
			if (!$this->fr->IsDetailKey && $this->fr->FormValue != NULL && $this->fr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fr->caption(), $this->fr->RequiredErrorMessage));
			}
		}
		if ($this->_t->Required) {
			if (!$this->_t->IsDetailKey && $this->_t->FormValue != NULL && $this->_t->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_t->caption(), $this->_t->RequiredErrorMessage));
			}
		}
		if ($this->fc->Required) {
			if (!$this->fc->IsDetailKey && $this->fc->FormValue != NULL && $this->fc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fc->caption(), $this->fc->RequiredErrorMessage));
			}
		}
		if ($this->pas->Required) {
			if (!$this->pas->IsDetailKey && $this->pas->FormValue != NULL && $this->pas->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pas->caption(), $this->pas->RequiredErrorMessage));
			}
		}
		if ($this->pad->Required) {
			if (!$this->pad->IsDetailKey && $this->pad->FormValue != NULL && $this->pad->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pad->caption(), $this->pad->RequiredErrorMessage));
			}
		}
		if ($this->local_trauma->Required) {
			if (!$this->local_trauma->IsDetailKey && $this->local_trauma->FormValue != NULL && $this->local_trauma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->local_trauma->caption(), $this->local_trauma->RequiredErrorMessage));
			}
		}
		if ($this->sistema->Required) {
			if (!$this->sistema->IsDetailKey && $this->sistema->FormValue != NULL && $this->sistema->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sistema->caption(), $this->sistema->RequiredErrorMessage));
			}
		}
		if ($this->nivel_conciencia->Required) {
			if (!$this->nivel_conciencia->IsDetailKey && $this->nivel_conciencia->FormValue != NULL && $this->nivel_conciencia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nivel_conciencia->caption(), $this->nivel_conciencia->RequiredErrorMessage));
			}
		}
		if ($this->dolor->Required) {
			if (!$this->dolor->IsDetailKey && $this->dolor->FormValue != NULL && $this->dolor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dolor->caption(), $this->dolor->RequiredErrorMessage));
			}
		}
		if ($this->signos_sintomas->Required) {
			if (!$this->signos_sintomas->IsDetailKey && $this->signos_sintomas->FormValue != NULL && $this->signos_sintomas->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->signos_sintomas->caption(), $this->signos_sintomas->RequiredErrorMessage));
			}
		}
		if ($this->factores_riesgos->Required) {
			if (!$this->factores_riesgos->IsDetailKey && $this->factores_riesgos->FormValue != NULL && $this->factores_riesgos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->factores_riesgos->caption(), $this->factores_riesgos->RequiredErrorMessage));
			}
		}
		if ($this->estado_final->Required) {
			if (!$this->estado_final->IsDetailKey && $this->estado_final->FormValue != NULL && $this->estado_final->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado_final->caption(), $this->estado_final->RequiredErrorMessage));
			}
		}
		if ($this->tipo_ingreso->Required) {
			if (!$this->tipo_ingreso->IsDetailKey && $this->tipo_ingreso->FormValue != NULL && $this->tipo_ingreso->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tipo_ingreso->caption(), $this->tipo_ingreso->RequiredErrorMessage));
			}
		}
		if ($this->hora_clasificacion->Required) {
			if (!$this->hora_clasificacion->IsDetailKey && $this->hora_clasificacion->FormValue != NULL && $this->hora_clasificacion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hora_clasificacion->caption(), $this->hora_clasificacion->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->hora_clasificacion->FormValue)) {
			AddMessage($FormError, $this->hora_clasificacion->errorMessage());
		}
		if ($this->descripcion_signos->Required) {
			if (!$this->descripcion_signos->IsDetailKey && $this->descripcion_signos->FormValue != NULL && $this->descripcion_signos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descripcion_signos->caption(), $this->descripcion_signos->RequiredErrorMessage));
			}
		}
		if ($this->hospital->Required) {
			if (!$this->hospital->IsDetailKey && $this->hospital->FormValue != NULL && $this->hospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hospital->caption(), $this->hospital->RequiredErrorMessage));
			}
		}
		if ($this->motivo_trauma->Required) {
			if (!$this->motivo_trauma->IsDetailKey && $this->motivo_trauma->FormValue != NULL && $this->motivo_trauma->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->motivo_trauma->caption(), $this->motivo_trauma->RequiredErrorMessage));
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

			// id_registro
			$this->id_registro->setDbValueDef($rsnew, $this->id_registro->CurrentValue, 0, $this->id_registro->ReadOnly);

			// fecha_hora
			$this->fecha_hora->setDbValueDef($rsnew, UnFormatDateTime($this->fecha_hora->CurrentValue, 0), NULL, $this->fecha_hora->ReadOnly);

			// id_admision
			$this->id_admision->setDbValueDef($rsnew, $this->id_admision->CurrentValue, NULL, $this->id_admision->ReadOnly);

			// acompañante
			$this->acompanante->setDbValueDef($rsnew, $this->acompanante->CurrentValue, NULL, $this->acompanante->ReadOnly);

			// tel_acompañante
			$this->tel_acompanante->setDbValueDef($rsnew, $this->tel_acompanante->CurrentValue, NULL, $this->tel_acompanante->ReadOnly);

			// tipo_urgencia
			$this->tipo_urgencia->setDbValueDef($rsnew, $this->tipo_urgencia->CurrentValue, NULL, $this->tipo_urgencia->ReadOnly);

			// clasificacion
			$this->clasificacion->setDbValueDef($rsnew, $this->clasificacion->CurrentValue, NULL, $this->clasificacion->ReadOnly);

			// motivo_consulta
			$this->motivo_consulta->setDbValueDef($rsnew, $this->motivo_consulta->CurrentValue, NULL, $this->motivo_consulta->ReadOnly);

			// signos_vitales
			$this->signos_vitales->setDbValueDef($rsnew, $this->signos_vitales->CurrentValue, NULL, $this->signos_vitales->ReadOnly);

			// so2
			$this->so2->setDbValueDef($rsnew, $this->so2->CurrentValue, NULL, $this->so2->ReadOnly);

			// fr
			$this->fr->setDbValueDef($rsnew, $this->fr->CurrentValue, NULL, $this->fr->ReadOnly);

			// t
			$this->_t->setDbValueDef($rsnew, $this->_t->CurrentValue, NULL, $this->_t->ReadOnly);

			// fc
			$this->fc->setDbValueDef($rsnew, $this->fc->CurrentValue, NULL, $this->fc->ReadOnly);

			// pas
			$this->pas->setDbValueDef($rsnew, $this->pas->CurrentValue, NULL, $this->pas->ReadOnly);

			// pad
			$this->pad->setDbValueDef($rsnew, $this->pad->CurrentValue, NULL, $this->pad->ReadOnly);

			// local_trauma
			$this->local_trauma->setDbValueDef($rsnew, $this->local_trauma->CurrentValue, NULL, $this->local_trauma->ReadOnly);

			// sistema
			$this->sistema->setDbValueDef($rsnew, $this->sistema->CurrentValue, NULL, $this->sistema->ReadOnly);

			// nivel_conciencia
			$this->nivel_conciencia->setDbValueDef($rsnew, $this->nivel_conciencia->CurrentValue, NULL, $this->nivel_conciencia->ReadOnly);

			// dolor
			$this->dolor->setDbValueDef($rsnew, $this->dolor->CurrentValue, NULL, $this->dolor->ReadOnly);

			// signos_sintomas
			$this->signos_sintomas->setDbValueDef($rsnew, $this->signos_sintomas->CurrentValue, NULL, $this->signos_sintomas->ReadOnly);

			// factores_riesgos
			$this->factores_riesgos->setDbValueDef($rsnew, $this->factores_riesgos->CurrentValue, NULL, $this->factores_riesgos->ReadOnly);

			// estado_final
			$this->estado_final->setDbValueDef($rsnew, $this->estado_final->CurrentValue, NULL, $this->estado_final->ReadOnly);

			// tipo_ingreso
			$this->tipo_ingreso->setDbValueDef($rsnew, $this->tipo_ingreso->CurrentValue, NULL, $this->tipo_ingreso->ReadOnly);

			// hora_clasificacion
			$this->hora_clasificacion->setDbValueDef($rsnew, UnFormatDateTime($this->hora_clasificacion->CurrentValue, 0), NULL, $this->hora_clasificacion->ReadOnly);

			// descripcion_signos
			$this->descripcion_signos->setDbValueDef($rsnew, $this->descripcion_signos->CurrentValue, NULL, $this->descripcion_signos->ReadOnly);

			// hospital
			$this->hospital->setDbValueDef($rsnew, $this->hospital->CurrentValue, "", $this->hospital->ReadOnly);

			// motivo_trauma
			$this->motivo_trauma->setDbValueDef($rsnew, $this->motivo_trauma->CurrentValue, NULL, $this->motivo_trauma->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("sala_raclist.php"), "", $this->TableVar, TRUE);
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
} // End class
?>