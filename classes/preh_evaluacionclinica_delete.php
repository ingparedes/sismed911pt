<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_evaluacionclinica_delete extends preh_evaluacionclinica
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_evaluacionclinica';

	// Page object name
	public $PageObjName = "preh_evaluacionclinica_delete";

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

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $TotalRecords = 0;
	public $RecordCount;
	public $RecKeys = [];
	public $StartRowCount = 1;
	public $RowCount = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canDelete()) {
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
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("preh_evaluacionclinicalist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
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
		$this->setupLookupOptions($this->cod_diag_cie);
		$this->setupLookupOptions($this->triage);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_evaluacionclinicalist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("preh_evaluacionclinicalist.php"); // Prevent SQL injection, return to list
			return;
		}

		// Set up filter (WHERE Clause)
		$this->CurrentFilter = $filter;

		// Get action
		if (IsApi()) {
			$this->CurrentAction = "delete"; // Delete record directly
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action");
		} elseif (Get("action") == "1") {
			$this->CurrentAction = "delete"; // Delete record directly
		} else {
			$this->CurrentAction = "show"; // Display record
		}
		if ($this->isDelete()) {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->deleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
				if (IsApi()) {
					$this->terminate(TRUE);
					return;
				} else {
					$this->terminate($this->getReturnUrl()); // Return to caller
				}
			} else { // Delete failed
				if (IsApi()) {
					$this->terminate();
					return;
				}
				$this->CurrentAction = "show"; // Display record
			}
		}
		if ($this->isShow()) { // Load records for display
			if ($this->Recordset = $this->loadRecordset())
				$this->TotalRecords = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecords <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("preh_evaluacionclinicalist.php"); // Return to list
			}
		}
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

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
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

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		$conn->beginTrans();

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id_evaluacionclinica'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}
		if ($deleteRows) {
			$conn->commitTrans(); // Commit the changes
		} else {
			$conn->rollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_evaluacionclinicalist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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