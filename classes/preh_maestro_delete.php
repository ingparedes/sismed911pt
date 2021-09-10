<?php
namespace PHPMaker2020\sismed911;

/**
 * Page class
 */
class preh_maestro_delete extends preh_maestro
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

	// Table name
	public $TableName = 'preh_maestro';

	// Page object name
	public $PageObjName = "preh_maestro_delete";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
					$this->terminate(GetUrl("preh_maestrolist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->cod_casopreh->setVisibility();
		$this->fecha->setVisibility();
		$this->tiempo->setVisibility();
		$this->llamada_fallida->Visible = FALSE;
		$this->longitud->Visible = FALSE;
		$this->latitud->Visible = FALSE;
		$this->quepasa->Visible = FALSE;
		$this->direccion->setVisibility();
		$this->estado_llamada->Visible = FALSE;
		$this->incidente->setVisibility();
		$this->prioridad->setVisibility();
		$this->accion->Visible = FALSE;
		$this->estado->setVisibility();
		$this->cierre->Visible = FALSE;
		$this->caso_multiple->setVisibility();
		$this->paciente->setVisibility();
		$this->evaluacion->Visible = FALSE;
		$this->sede->Visible = FALSE;
		$this->fecha_llamada->Visible = FALSE;
		$this->hospital_destino->setVisibility();
		$this->nombre_medico->setVisibility();
		$this->nombre_confirma->Visible = FALSE;
		$this->telefono_confirma->Visible = FALSE;
		$this->telefono->setVisibility();
		$this->nombre_reporta->setVisibility();
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
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("preh_maestrolist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("preh_maestrolist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("preh_maestrolist.php"); // Return to list
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

			// cod_casopreh
			$this->cod_casopreh->LinkCustomAttributes = "";
			$this->cod_casopreh->HrefValue = "";
			if (!$this->isExport()) {
				$this->cod_casopreh->TooltipValue = strval($this->paciente->CurrentValue);
				if ($this->cod_casopreh->HrefValue == "")
					$this->cod_casopreh->HrefValue = "javascript:void(0);";
				$this->cod_casopreh->LinkAttrs->appendClass("ew-tooltip-link");
				$this->cod_casopreh->LinkAttrs["data-tooltip-id"] = "tt_preh_maestro_x_cod_casopreh";
				$this->cod_casopreh->LinkAttrs["data-tooltip-width"] = $this->cod_casopreh->TooltipWidth;
				$this->cod_casopreh->LinkAttrs["data-placement"] = Config("CSS_FLIP") ? "left" : "right";
			}

			// fecha
			$this->fecha->LinkCustomAttributes = "";
			$this->fecha->HrefValue = "";
			$this->fecha->TooltipValue = "";

			// tiempo
			$this->tiempo->LinkCustomAttributes = "";
			$this->tiempo->HrefValue = "";
			$this->tiempo->TooltipValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";
			$this->direccion->TooltipValue = "";

			// incidente
			$this->incidente->LinkCustomAttributes = "";
			$this->incidente->HrefValue = "";
			$this->incidente->TooltipValue = "";

			// prioridad
			$this->prioridad->LinkCustomAttributes = "";
			$this->prioridad->HrefValue = "";
			$this->prioridad->TooltipValue = "";

			// estado
			$this->estado->LinkCustomAttributes = "";
			$this->estado->HrefValue = "";
			$this->estado->TooltipValue = "";

			// caso_multiple
			$this->caso_multiple->LinkCustomAttributes = "";
			$this->caso_multiple->HrefValue = "";
			$this->caso_multiple->TooltipValue = "";

			// paciente
			$this->paciente->LinkCustomAttributes = "";
			$this->paciente->HrefValue = "";
			$this->paciente->TooltipValue = "";

			// hospital_destino
			$this->hospital_destino->LinkCustomAttributes = "";
			$this->hospital_destino->HrefValue = "";
			$this->hospital_destino->TooltipValue = "";

			// nombre_medico
			$this->nombre_medico->LinkCustomAttributes = "";
			$this->nombre_medico->HrefValue = "";
			$this->nombre_medico->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";

			// nombre_reporta
			$this->nombre_reporta->LinkCustomAttributes = "";
			$this->nombre_reporta->HrefValue = "";
			$this->nombre_reporta->TooltipValue = "";
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
				$thisKey .= $row['cod_casopreh'];
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("preh_maestrolist.php"), "", $this->TableVar, TRUE);
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