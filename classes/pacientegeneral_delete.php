<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class pacientegeneral_delete extends pacientegeneral
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'pacientegeneral';

	// Page object name
	public $PageObjName = "pacientegeneral_delete";

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

		// Table object (usuarios)
		if (!isset($GLOBALS['usuarios']))
			$GLOBALS['usuarios'] = new usuarios();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
					$this->terminate(GetUrl("pacientegenerallist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
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
		$this->setupLookupOptions($this->tipo_doc);
		$this->setupLookupOptions($this->genero);
		$this->setupLookupOptions($this->cod_edad);
		$this->setupLookupOptions($this->aseguradro);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pacientegenerallist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("pacientegenerallist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("pacientegenerallist.php"); // Return to list
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
		$row = [];
		$row['cod_casointerh'] = NULL;
		$row['id_paciente'] = NULL;
		$row['expendiente'] = NULL;
		$row['tipo_doc'] = NULL;
		$row['num_doc'] = NULL;
		$row['nombre1'] = NULL;
		$row['nombre2'] = NULL;
		$row['apellido1'] = NULL;
		$row['apellido2'] = NULL;
		$row['genero'] = NULL;
		$row['edad'] = NULL;
		$row['fecha_nacido'] = NULL;
		$row['cod_edad'] = NULL;
		$row['telefono'] = NULL;
		$row['celular'] = NULL;
		$row['direccion'] = NULL;
		$row['email'] = NULL;
		$row['aseguradro'] = NULL;
		$row['observacion'] = NULL;
		$row['nss'] = NULL;
		$row['usu_sede'] = NULL;
		$row['prehospitalario'] = NULL;
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
				$thisKey .= $row['cod_casointerh'];
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
			$table = 'pacientegeneral';
			$subject = $table . " " . $Language->phrase("RecordDeleted");
			$action = $Language->phrase("ActionDeleted");
			$email = new Email();
			$email->load(Config("EMAIL_NOTIFY_TEMPLATE"));
			$email->replaceSender(Config("SENDER_EMAIL")); // Replace Sender
			$email->replaceRecipient(Config("RECIPIENT_EMAIL")); // Replace Recipient
			$email->replaceSubject($subject); // Replace Subject
			$email->replaceContent("<!--table-->", $table);
			$email->replaceContent("<!--key-->", $key);
			$email->replaceContent("<!--action-->", $action);
			$args = [];
			$args["rs"] = &$rsold;
			$emailSent = FALSE;
			if ($this->Email_Sending($email, $args))
				$emailSent = $email->send();
			if (!$emailSent)
				$this->setFailureMessage($email->SendErrDescription);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pacientegenerallist.php"), "", $this->TableVar, TRUE);
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