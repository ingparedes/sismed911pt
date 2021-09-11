<?php
namespace PHPMaker2020\sismed911;

/**
 * Class for index
 */
class index
{

	// Project ID
	public $ProjectID = "{17BEB368-DB80-46DC-8EC5-730EB11B94E5}";

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

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Constructor
	public function __construct() {
		$this->CheckToken = Config("CHECK_TOKEN");
	}

	// Terminate page
	public function terminate($url = "")
	{

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Page Redirecting event
		$this->Page_Redirecting($url);

		// Go to URL if specified
		if ($url != "") {
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	//
	// Page run
	//

	public function run()
	{
		global $Language, $UserProfile, $Security, $Breadcrumb;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// User profile
		$UserProfile = new UserProfile();

		// Security object
		$Security = new AdvancedSecurity();
		if (!$Security->isLoggedIn())
			$Security->autoLogin();
		$Security->loadUserLevel(); // Load User Level

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Breadcrumb
		$Breadcrumb = new Breadcrumb();

		// If session expired, show session expired message
		if (Get("expired") == "1")
			$this->setFailureMessage($Language->phrase("SessionExpired"));
		if (!$Security->isLoggedIn())
			$Security->autoLogin();
		$Security->loadUserLevel(); // Load User Level
		if ($Security->allowList(CurrentProjectID() . 'inicio.php'))
			$this->terminate("inicio.php"); // Exit and go to default page
		if ($Security->allowList(CurrentProjectID() . 'a_parametriza_hosptl.php'))
			$this->terminate("a_parametriza_hosptl.php");
		if ($Security->allowList(CurrentProjectID() . 'acercade'))
			$this->terminate("acercadelist.php");
		if ($Security->allowList(CurrentProjectID() . 'alerta_censo'))
			$this->terminate("alerta_censolist.php");
		if ($Security->allowList(CurrentProjectID() . 'ambulancia_taller'))
			$this->terminate("ambulancia_tallerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ambulancias'))
			$this->terminate("ambulanciaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'antecedentes_registro'))
			$this->terminate("antecedentes_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'asigna_ambulancia'))
			$this->terminate("asigna_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'base_ambulancia'))
			$this->terminate("base_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'bloques_div'))
			$this->terminate("bloques_divlist.php");
		if ($Security->allowList(CurrentProjectID() . 'camas_hospital'))
			$this->terminate("camas_hospitallist.php");
		if ($Security->allowList(CurrentProjectID() . 'camas_hosptlz'))
			$this->terminate("camas_hosptlzlist.php");
		if ($Security->allowList(CurrentProjectID() . 'camas_pedtria'))
			$this->terminate("camas_pedtrialist.php");
		if ($Security->allowList(CurrentProjectID() . 'camas_uci'))
			$this->terminate("camas_ucilist.php");
		if ($Security->allowList(CurrentProjectID() . 'caso_mltple'))
			$this->terminate("caso_mltplelist.php");
		if ($Security->allowList(CurrentProjectID() . 'catalogo_serv_taller'))
			$this->terminate("catalogo_serv_tallerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'causa_externa'))
			$this->terminate("causa_externalist.php");
		if ($Security->allowList(CurrentProjectID() . 'causa_registro'))
			$this->terminate("causa_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'causa_trauma_categoria'))
			$this->terminate("causa_trauma_categorialist.php");
		if ($Security->allowList(CurrentProjectID() . 'causa_trauma_situacion'))
			$this->terminate("causa_trauma_situacionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'censo_camas'))
			$this->terminate("censo_camaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'censo_total'))
			$this->terminate("censo_totallist.php");
		if ($Security->allowList(CurrentProjectID() . 'cie10'))
			$this->terminate("cie10list.php");
		if ($Security->allowList(CurrentProjectID() . 'cie10dx'))
			$this->terminate("cie10dxlist.php");
		if ($Security->allowList(CurrentProjectID() . 'code_planta'))
			$this->terminate("code_plantalist.php");
		if ($Security->allowList(CurrentProjectID() . 'consulta_peru_camas'))
			$this->terminate("consulta_peru_camaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'Dashboard1'))
			$this->terminate("Dashboard1dsb.php");
		if ($Security->allowList(CurrentProjectID() . 'Dashboard2'))
			$this->terminate("Dashboard2dsb.php");
		if ($Security->allowList(CurrentProjectID() . 'departamento'))
			$this->terminate("departamentolist.php");
		if ($Security->allowList(CurrentProjectID() . 'depto_reniec'))
			$this->terminate("depto_renieclist.php");
		if ($Security->allowList(CurrentProjectID() . 'despacho_preh'))
			$this->terminate("despacho_prehlist.php");
		if ($Security->allowList(CurrentProjectID() . 'disponibilidad_hospitalaria'))
			$this->terminate("disponibilidad_hospitalarialist.php");
		if ($Security->allowList(CurrentProjectID() . 'distrito'))
			$this->terminate("distritolist.php");
		if ($Security->allowList(CurrentProjectID() . 'distrito_reniec'))
			$this->terminate("distrito_renieclist.php");
		if ($Security->allowList(CurrentProjectID() . 'division_hosp'))
			$this->terminate("division_hosplist.php");
		if ($Security->allowList(CurrentProjectID() . 'divisiones'))
			$this->terminate("divisioneslist.php");
		if ($Security->allowList(CurrentProjectID() . 'especial_ambulancia'))
			$this->terminate("especial_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'especialidad_hospital'))
			$this->terminate("especialidad_hospitallist.php");
		if ($Security->allowList(CurrentProjectID() . 'eventos_proximos'))
			$this->terminate("eventos_proximoslist.php");
		if ($Security->allowList(CurrentProjectID() . 'explo_fisica'))
			$this->terminate("explo_fisicalist.php");
		if ($Security->allowList(CurrentProjectID() . 'explo_fisica_registro'))
			$this->terminate("explo_fisica_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'explo_general_afeccion'))
			$this->terminate("explo_general_afeccionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'explo_general_cat'))
			$this->terminate("explo_general_catlist.php");
		if ($Security->allowList(CurrentProjectID() . 'explo_general_registro'))
			$this->terminate("explo_general_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'firmas_registro'))
			$this->terminate("firmas_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'hospitales_pripal.php'))
			$this->terminate("hospitales_pripal.php");
		if ($Security->allowList(CurrentProjectID() . 'hospitalesgeneral'))
			$this->terminate("hospitalesgenerallist.php");
		if ($Security->allowList(CurrentProjectID() . 'incidentes'))
			$this->terminate("incidenteslist.php");
		if ($Security->allowList(CurrentProjectID() . 'insumos'))
			$this->terminate("insumoslist.php");
		if ($Security->allowList(CurrentProjectID() . 'insumos_registros'))
			$this->terminate("insumos_registroslist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_cierre'))
			$this->terminate("interh_cierrelist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_evaluacionclinica'))
			$this->terminate("interh_evaluacionclinicalist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_hospitales'))
			$this->terminate("interh_hospitalessmry.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_maestro'))
			$this->terminate("interh_maestrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_map'))
			$this->terminate("interh_maplist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_principal'))
			$this->terminate("interh_principallist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_prioridad'))
			$this->terminate("interh_prioridadlist.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_reporte'))
			$this->terminate("interh_reportesmry.php");
		if ($Security->allowList(CurrentProjectID() . 'interh_seguimiento'))
			$this->terminate("interh_seguimientolist.php");
		if ($Security->allowList(CurrentProjectID() . 'mante_amb'))
			$this->terminate("mante_amblist.php");
		if ($Security->allowList(CurrentProjectID() . 'medicamentos'))
			$this->terminate("medicamentoslist.php");
		if ($Security->allowList(CurrentProjectID() . 'medicamentos_registros'))
			$this->terminate("medicamentos_registroslist.php");
		if ($Security->allowList(CurrentProjectID() . 'menu_caso.php'))
			$this->terminate("menu_caso.php");
		if ($Security->allowList(CurrentProjectID() . 'menu_caso_preh.php'))
			$this->terminate("menu_caso_preh.php");
		if ($Security->allowList(CurrentProjectID() . 'menu_despacho_preh.php'))
			$this->terminate("menu_despacho_preh.php");
		if ($Security->allowList(CurrentProjectID() . 'modalidad_ambulancia'))
			$this->terminate("modalidad_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'muestra_bloques.php'))
			$this->terminate("muestra_bloques.php");
		if ($Security->allowList(CurrentProjectID() . 'nivel_hospital'))
			$this->terminate("nivel_hospitallist.php");
		if ($Security->allowList(CurrentProjectID() . 'obstetrico_registro'))
			$this->terminate("obstetrico_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'pacientegeneral'))
			$this->terminate("pacientegenerallist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_cierre'))
			$this->terminate("preh_cierrelist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_despacho'))
			$this->terminate("preh_despacholist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_destino'))
			$this->terminate("preh_destinolist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_evaluacionclinica'))
			$this->terminate("preh_evaluacionclinicalist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_maestro'))
			$this->terminate("preh_maestrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_map'))
			$this->terminate("preh_maplist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_seguimiento'))
			$this->terminate("preh_seguimientolist.php");
		if ($Security->allowList(CurrentProjectID() . 'preh_servicio_ambulancia'))
			$this->terminate("preh_servicio_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'procedimiento_registro'))
			$this->terminate("procedimiento_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'procedimiento_tipos'))
			$this->terminate("procedimiento_tiposlist.php");
		if ($Security->allowList(CurrentProjectID() . 'provincias'))
			$this->terminate("provinciaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'provincias_reniec'))
			$this->terminate("provincias_renieclist.php");
		if ($Security->allowList(CurrentProjectID() . 'r1'))
			$this->terminate("r1smry.php");
		if ($Security->allowList(CurrentProjectID() . 'r2'))
			$this->terminate("r2smry.php");
		if ($Security->allowList(CurrentProjectID() . 'recordatorio_taller'))
			$this->terminate("recordatorio_tallerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'sala_admision'))
			$this->terminate("sala_admisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'sala_rac'))
			$this->terminate("sala_raclist.php");
		if ($Security->allowList(CurrentProjectID() . 'sector_hospital'))
			$this->terminate("sector_hospitallist.php");
		if ($Security->allowList(CurrentProjectID() . 'sede_sismed'))
			$this->terminate("sede_sismedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'servicio_ambulancia'))
			$this->terminate("servicio_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'servicio_disponibilidad'))
			$this->terminate("servicio_disponibilidadlist.php");
		if ($Security->allowList(CurrentProjectID() . 'servicios_division'))
			$this->terminate("servicios_divisionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'tabla_disp'))
			$this->terminate("tabla_displist.php");
		if ($Security->allowList(CurrentProjectID() . 'temp_camas'))
			$this->terminate("temp_camaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'terminos'))
			$this->terminate("terminoslist.php");
		if ($Security->allowList(CurrentProjectID() . 'tipo_ambulancia'))
			$this->terminate("tipo_ambulancialist.php");
		if ($Security->allowList(CurrentProjectID() . 'tipo_cierrecaso'))
			$this->terminate("tipo_cierrecasolist.php");
		if ($Security->allowList(CurrentProjectID() . 'tipo_id'))
			$this->terminate("tipo_idlist.php");
		if ($Security->allowList(CurrentProjectID() . 'tipo_llamada'))
			$this->terminate("tipo_llamadalist.php");
		if ($Security->allowList(CurrentProjectID() . 'trauma_registro'))
			$this->terminate("trauma_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'triage'))
			$this->terminate("triagelist.php");
		if ($Security->allowList(CurrentProjectID() . 'turno_registro'))
			$this->terminate("turno_registrolist.php");
		if ($Security->allowList(CurrentProjectID() . 'userlevelpermissions'))
			$this->terminate("userlevelpermissionslist.php");
		if ($Security->allowList(CurrentProjectID() . 'userlevels'))
			$this->terminate("userlevelslist.php");
		if ($Security->allowList(CurrentProjectID() . 'usuarios'))
			$this->terminate("usuarioslist.php");
		if ($Security->allowList(CurrentProjectID() . 'valida_pge.php'))
			$this->terminate("valida_pge.php");
		if ($Security->allowList(CurrentProjectID() . 'vista_cmultiple'))
			$this->terminate("vista_cmultiplelist.php");
		if ($Security->allowList(CurrentProjectID() . 'webservices'))
			$this->terminate("webserviceslist.php");
		if ($Security->allowList(CurrentProjectID() . 'Controprehmaster.php'))
			$this->terminate("Controprehmaster.php");
		if ($Security->allowList(CurrentProjectID() . 'Controlintemaster.php'))
			$this->terminate("Controlintemaster.php");
		if ($Security->allowList(CurrentProjectID() . 'admisionhs.php'))
			$this->terminate("admisionhs.php");
		if ($Security->allowList(CurrentProjectID() . 'clasificacionh.php'))
			$this->terminate("clasificacionh.php");
		if ($Security->allowList(CurrentProjectID() . 'urgencias.php'))
			$this->terminate("urgencias.php");
		if ($Security->allowList(CurrentProjectID() . 'emergencias.php'))
			$this->terminate("emergencias.php");
		if ($Security->allowList(CurrentProjectID() . 'despachoambpreh.php'))
			$this->terminate("despachoambpreh.php");
		if ($Security->isLoggedIn()) {
			$this->setFailureMessage(DeniedMessage() . "<br><br><a href=\"logout.php\">" . $Language->phrase("BackToLogin") . "</a>");
		} else {
			$this->terminate("login.php"); // Exit and go to login page
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
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		}
}
?>