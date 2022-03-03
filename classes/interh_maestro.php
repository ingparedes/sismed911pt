<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for interh_maestro
 */
class interh_maestro extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $cod_casointerh;
	public $fechahorainterh;
	public $tiempo;
	public $cod_expendeinteinteh;
	public $tipo_serviciointerh;
	public $hospital_origneinterh;
	public $nombrereportainterh;
	public $telefonointerh;
	public $motivo_atencioninteh;
	public $accioninterh;
	public $longitudinterh;
	public $latitudinterh;
	public $prioridadinterh;
	public $estadointerh;
	public $cierreinterh;
	public $hospital_destinointerh;
	public $nombre_recibe;
	public $ambulancia;
	public $paciente;
	public $evaluacion;
	public $sede;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'interh_maestro';
		$this->TableName = 'interh_maestro';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"interh_maestro\"";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// cod_casointerh
		$this->cod_casointerh = new DbField('interh_maestro', 'interh_maestro', 'x_cod_casointerh', 'cod_casointerh', '"cod_casointerh"', 'CAST("cod_casointerh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->cod_casointerh->IsAutoIncrement = TRUE; // Autoincrement field
		$this->cod_casointerh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casointerh->Nullable = FALSE; // NOT NULL field
		$this->cod_casointerh->Sortable = TRUE; // Allow sort
		$this->cod_casointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casointerh'] = &$this->cod_casointerh;

		// fechahorainterh
		$this->fechahorainterh = new DbField('interh_maestro', 'interh_maestro', 'x_fechahorainterh', 'fechahorainterh', '"fechahorainterh"', CastDateFieldForLike("\"fechahorainterh\"", 9, "DB"), 135, 8, 9, FALSE, '"fechahorainterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fechahorainterh->Sortable = TRUE; // Allow sort
		$this->fechahorainterh->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateYMD"));
		$this->fields['fechahorainterh'] = &$this->fechahorainterh;

		// tiempo
		$this->tiempo = new DbField('interh_maestro', 'interh_maestro', 'x_tiempo', 'tiempo', 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60)', 'CAST(ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS varchar(255))', 5, 8, -1, FALSE, 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60)', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tiempo->IsCustom = TRUE; // Custom field
		$this->tiempo->Sortable = TRUE; // Allow sort
		$this->tiempo->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['tiempo'] = &$this->tiempo;

		// cod_expendeinteinteh
		$this->cod_expendeinteinteh = new DbField('interh_maestro', 'interh_maestro', 'x_cod_expendeinteinteh', 'cod_expendeinteinteh', '"cod_expendeinteinteh"', '"cod_expendeinteinteh"', 200, 12, -1, FALSE, '"cod_expendeinteinteh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_expendeinteinteh->Sortable = FALSE; // Allow sort
		$this->fields['cod_expendeinteinteh'] = &$this->cod_expendeinteinteh;

		// tipo_serviciointerh
		$this->tipo_serviciointerh = new DbField('interh_maestro', 'interh_maestro', 'x_tipo_serviciointerh', 'tipo_serviciointerh', '"tipo_serviciointerh"', 'CAST("tipo_serviciointerh" AS varchar(255))', 2, 2, -1, FALSE, '"tipo_serviciointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tipo_serviciointerh->Sortable = TRUE; // Allow sort
		$this->tipo_serviciointerh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tipo_serviciointerh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->tipo_serviciointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tipo_serviciointerh'] = &$this->tipo_serviciointerh;

		// hospital_origneinterh
		$this->hospital_origneinterh = new DbField('interh_maestro', 'interh_maestro', 'x_hospital_origneinterh', 'hospital_origneinterh', '"hospital_origneinterh"', '"hospital_origneinterh"', 200, 16, -1, FALSE, '"EV__hospital_origneinterh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->hospital_origneinterh->Sortable = TRUE; // Allow sort
		$this->hospital_origneinterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->hospital_origneinterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['hospital_origneinterh'] = &$this->hospital_origneinterh;

		// nombrereportainterh
		$this->nombrereportainterh = new DbField('interh_maestro', 'interh_maestro', 'x_nombrereportainterh', 'nombrereportainterh', '"nombrereportainterh"', '"nombrereportainterh"', 200, 80, -1, FALSE, '"nombrereportainterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombrereportainterh->Sortable = TRUE; // Allow sort
		$this->fields['nombrereportainterh'] = &$this->nombrereportainterh;

		// telefonointerh
		$this->telefonointerh = new DbField('interh_maestro', 'interh_maestro', 'x_telefonointerh', 'telefonointerh', '"telefonointerh"', '"telefonointerh"', 200, 80, -1, FALSE, '"telefonointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefonointerh->Sortable = TRUE; // Allow sort
		$this->fields['telefonointerh'] = &$this->telefonointerh;

		// motivo_atencioninteh
		$this->motivo_atencioninteh = new DbField('interh_maestro', 'interh_maestro', 'x_motivo_atencioninteh', 'motivo_atencioninteh', '"motivo_atencioninteh"', 'CAST("motivo_atencioninteh" AS varchar(255))', 2, 2, -1, FALSE, '"EV__motivo_atencioninteh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'RADIO');
		$this->motivo_atencioninteh->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->motivo_atencioninteh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['motivo_atencioninteh'] = &$this->motivo_atencioninteh;

		// accioninterh
		$this->accioninterh = new DbField('interh_maestro', 'interh_maestro', 'x_accioninterh', 'accioninterh', '"accioninterh"', 'CAST("accioninterh" AS varchar(255))', 2, 2, -1, FALSE, '"EV__accioninterh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->accioninterh->Sortable = TRUE; // Allow sort
		$this->accioninterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->accioninterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->accioninterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['accioninterh'] = &$this->accioninterh;

		// longitudinterh
		$this->longitudinterh = new DbField('interh_maestro', 'interh_maestro', 'x_longitudinterh', 'longitudinterh', '"longitudinterh"', '"longitudinterh"', 200, 30, -1, FALSE, '"longitudinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->longitudinterh->Sortable = TRUE; // Allow sort
		$this->fields['longitudinterh'] = &$this->longitudinterh;

		// latitudinterh
		$this->latitudinterh = new DbField('interh_maestro', 'interh_maestro', 'x_latitudinterh', 'latitudinterh', '"latitudinterh"', '"latitudinterh"', 200, 30, -1, FALSE, '"latitudinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->latitudinterh->Sortable = TRUE; // Allow sort
		$this->latitudinterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->latitudinterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->fields['latitudinterh'] = &$this->latitudinterh;

		// prioridadinterh
		$this->prioridadinterh = new DbField('interh_maestro', 'interh_maestro', 'x_prioridadinterh', 'prioridadinterh', '"prioridadinterh"', 'CAST("prioridadinterh" AS varchar(255))', 2, 2, -1, FALSE, '"prioridadinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->prioridadinterh->Sortable = TRUE; // Allow sort
		$this->prioridadinterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->prioridadinterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->prioridadinterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['prioridadinterh'] = &$this->prioridadinterh;

		// estadointerh
		$this->estadointerh = new DbField('interh_maestro', 'interh_maestro', 'x_estadointerh', 'estadointerh', '"estadointerh"', 'CAST("estadointerh" AS varchar(255))', 2, 2, -1, FALSE, '"estadointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estadointerh->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->estadointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['estadointerh'] = &$this->estadointerh;

		// cierreinterh
		$this->cierreinterh = new DbField('interh_maestro', 'interh_maestro', 'x_cierreinterh', 'cierreinterh', '"cierreinterh"', 'CAST("cierreinterh" AS varchar(255))', 2, 2, -1, FALSE, '"cierreinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cierreinterh->Sortable = TRUE; // Allow sort
		$this->cierreinterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cierreinterh'] = &$this->cierreinterh;

		// hospital_destinointerh
		$this->hospital_destinointerh = new DbField('interh_maestro', 'interh_maestro', 'x_hospital_destinointerh', 'hospital_destinointerh', '"hospital_destinointerh"', '"hospital_destinointerh"', 200, 16, -1, FALSE, '"EV__hospital_destinointerh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->hospital_destinointerh->Sortable = TRUE; // Allow sort
		$this->hospital_destinointerh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->hospital_destinointerh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['hospital_destinointerh'] = &$this->hospital_destinointerh;

		// nombre_recibe
		$this->nombre_recibe = new DbField('interh_maestro', 'interh_maestro', 'x_nombre_recibe', 'nombre_recibe', '"nombre_recibe"', '"nombre_recibe"', 200, 80, -1, FALSE, '"nombre_recibe"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_recibe->Sortable = TRUE; // Allow sort
		$this->fields['nombre_recibe'] = &$this->nombre_recibe;

		// ambulancia
		$this->ambulancia = new DbField('interh_maestro', 'interh_maestro', 'x_ambulancia', 'ambulancia', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ambulancia->IsCustom = TRUE; // Custom field
		$this->ambulancia->Sortable = TRUE; // Allow sort
		$this->fields['ambulancia'] = &$this->ambulancia;

		// paciente
		$this->paciente = new DbField('interh_maestro', 'interh_maestro', 'x_paciente', 'paciente', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->paciente->IsCustom = TRUE; // Custom field
		$this->paciente->Sortable = TRUE; // Allow sort
		$this->fields['paciente'] = &$this->paciente;

		// evaluacion
		$this->evaluacion = new DbField('interh_maestro', 'interh_maestro', 'x_evaluacion', 'evaluacion', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->evaluacion->IsCustom = TRUE; // Custom field
		$this->evaluacion->Sortable = TRUE; // Allow sort
		$this->fields['evaluacion'] = &$this->evaluacion;

		// sede
		$this->sede = new DbField('interh_maestro', 'interh_maestro', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sede'] = &$this->sede;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"interh_maestro\"";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\" FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		global $CurrentLanguage;
		switch ($CurrentLanguage) {
			case "en":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"interh_maestro\".\"hospital_origneinterh\" LIMIT 1) AS \"EV__hospital_origneinterh\", (SELECT \"nombre_motivo_en\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"interh_maestro\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\", (SELECT \"nombre_accion_en\" FROM \"interh_accion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_accion\" = \"interh_maestro\".\"accioninterh\" LIMIT 1) AS \"EV__accioninterh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			case "fr":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"interh_maestro\".\"hospital_origneinterh\" LIMIT 1) AS \"EV__hospital_origneinterh\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"interh_maestro\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\", (SELECT \"nombre_accion_fr\" FROM \"interh_accion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_accion\" = \"interh_maestro\".\"accioninterh\" LIMIT 1) AS \"EV__accioninterh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			case "pt":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"interh_maestro\".\"hospital_origneinterh\" LIMIT 1) AS \"EV__hospital_origneinterh\", (SELECT \"nombre_motivo_pr\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"interh_maestro\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\", (SELECT \"nombre_accion_pr\" FROM \"interh_accion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_accion\" = \"interh_maestro\".\"accioninterh\" LIMIT 1) AS \"EV__accioninterh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			case "es":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"interh_maestro\".\"hospital_origneinterh\" LIMIT 1) AS \"EV__hospital_origneinterh\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"interh_maestro\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\", (SELECT \"nombre_accion_es\" FROM \"interh_accion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_accion\" = \"interh_maestro\".\"accioninterh\" LIMIT 1) AS \"EV__accioninterh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			default:
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"interh_maestro\".\"hospital_origneinterh\" LIMIT 1) AS \"EV__hospital_origneinterh\", (SELECT \"nombre_motivo_en\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"interh_maestro\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\", (SELECT \"nombre_accion_en\" FROM \"interh_accion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_accion\" = \"interh_maestro\".\"accioninterh\" LIMIT 1) AS \"EV__accioninterh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
		}
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter, $id = "")
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() != "")
			return TRUE;
		if ($this->hospital_origneinterh->AdvancedSearch->SearchValue != "" ||
			$this->hospital_origneinterh->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->hospital_origneinterh->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->hospital_origneinterh->VirtualExpression . " "))
			return TRUE;
		if ($this->motivo_atencioninteh->AdvancedSearch->SearchValue != "" ||
			$this->motivo_atencioninteh->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->motivo_atencioninteh->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->motivo_atencioninteh->VirtualExpression . " "))
			return TRUE;
		if ($this->accioninterh->AdvancedSearch->SearchValue != "" ||
			$this->accioninterh->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->accioninterh->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->accioninterh->VirtualExpression . " "))
			return TRUE;
		if ($this->hospital_destinointerh->AdvancedSearch->SearchValue != "" ||
			$this->hospital_destinointerh->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->hospital_destinointerh->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->hospital_destinointerh->VirtualExpression . " "))
			return TRUE;
		return FALSE;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
			$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->cod_casointerh->setDbValue($conn->getOne("SELECT currval('interh_maestro_cod_casointerh_seq2'::regclass)"));
			$rs['cod_casointerh'] = $this->cod_casointerh->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('cod_casointerh', $rs))
				AddFilter($where, QuotedName('cod_casointerh', $this->Dbid) . '=' . QuotedValue($rs['cod_casointerh'], $this->cod_casointerh->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->cod_casointerh->DbValue = $row['cod_casointerh'];
		$this->fechahorainterh->DbValue = $row['fechahorainterh'];
		$this->tiempo->DbValue = $row['tiempo'];
		$this->cod_expendeinteinteh->DbValue = $row['cod_expendeinteinteh'];
		$this->tipo_serviciointerh->DbValue = $row['tipo_serviciointerh'];
		$this->hospital_origneinterh->DbValue = $row['hospital_origneinterh'];
		$this->nombrereportainterh->DbValue = $row['nombrereportainterh'];
		$this->telefonointerh->DbValue = $row['telefonointerh'];
		$this->motivo_atencioninteh->DbValue = $row['motivo_atencioninteh'];
		$this->accioninterh->DbValue = $row['accioninterh'];
		$this->longitudinterh->DbValue = $row['longitudinterh'];
		$this->latitudinterh->DbValue = $row['latitudinterh'];
		$this->prioridadinterh->DbValue = $row['prioridadinterh'];
		$this->estadointerh->DbValue = $row['estadointerh'];
		$this->cierreinterh->DbValue = $row['cierreinterh'];
		$this->hospital_destinointerh->DbValue = $row['hospital_destinointerh'];
		$this->nombre_recibe->DbValue = $row['nombre_recibe'];
		$this->ambulancia->DbValue = $row['ambulancia'];
		$this->paciente->DbValue = $row['paciente'];
		$this->evaluacion->DbValue = $row['evaluacion'];
		$this->sede->DbValue = $row['sede'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"cod_casointerh\" = @cod_casointerh@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('cod_casointerh', $row) ? $row['cod_casointerh'] : NULL;
		else
			$val = $this->cod_casointerh->OldValue !== NULL ? $this->cod_casointerh->OldValue : $this->cod_casointerh->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_casointerh@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "interh_maestrolist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "interh_maestroview.php")
			return $Language->phrase("View");
		elseif ($pageName == "interh_maestroedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "interh_maestroadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "interh_maestrolist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("interh_maestroview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("interh_maestroview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "interh_maestroadd.php?" . $this->getUrlParm($parm);
		else
			$url = "interh_maestroadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("interh_maestroedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("interh_maestroadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("interh_maestrodelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "cod_casointerh:" . JsonEncode($this->cod_casointerh->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->cod_casointerh->CurrentValue != NULL) {
			$url .= "cod_casointerh=" . urlencode($this->cod_casointerh->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("cod_casointerh") !== NULL)
				$arKeys[] = Param("cod_casointerh");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->cod_casointerh->CurrentValue = $key;
			else
				$this->cod_casointerh->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->cod_casointerh->setDbValue($rs->fields('cod_casointerh'));
		$this->fechahorainterh->setDbValue($rs->fields('fechahorainterh'));
		$this->tiempo->setDbValue($rs->fields('tiempo'));
		$this->cod_expendeinteinteh->setDbValue($rs->fields('cod_expendeinteinteh'));
		$this->tipo_serviciointerh->setDbValue($rs->fields('tipo_serviciointerh'));
		$this->hospital_origneinterh->setDbValue($rs->fields('hospital_origneinterh'));
		$this->nombrereportainterh->setDbValue($rs->fields('nombrereportainterh'));
		$this->telefonointerh->setDbValue($rs->fields('telefonointerh'));
		$this->motivo_atencioninteh->setDbValue($rs->fields('motivo_atencioninteh'));
		$this->accioninterh->setDbValue($rs->fields('accioninterh'));
		$this->longitudinterh->setDbValue($rs->fields('longitudinterh'));
		$this->latitudinterh->setDbValue($rs->fields('latitudinterh'));
		$this->prioridadinterh->setDbValue($rs->fields('prioridadinterh'));
		$this->estadointerh->setDbValue($rs->fields('estadointerh'));
		$this->cierreinterh->setDbValue($rs->fields('cierreinterh'));
		$this->hospital_destinointerh->setDbValue($rs->fields('hospital_destinointerh'));
		$this->nombre_recibe->setDbValue($rs->fields('nombre_recibe'));
		$this->ambulancia->setDbValue($rs->fields('ambulancia'));
		$this->paciente->setDbValue($rs->fields('paciente'));
		$this->evaluacion->setDbValue($rs->fields('evaluacion'));
		$this->sede->setDbValue($rs->fields('sede'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// cod_casointerh
		// fechahorainterh
		// tiempo
		// cod_expendeinteinteh

		$this->cod_expendeinteinteh->CellCssStyle = "white-space: nowrap;";

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

		$this->cierreinterh->CellCssStyle = "white-space: nowrap;";

		// hospital_destinointerh
		// nombre_recibe
		// ambulancia
		// paciente
		// evaluacion
		// sede
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

		// cod_expendeinteinteh
		$this->cod_expendeinteinteh->ViewValue = $this->cod_expendeinteinteh->CurrentValue;
		$this->cod_expendeinteinteh->ViewCustomAttributes = "";

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

		// paciente
		$this->paciente->ViewValue = $this->paciente->CurrentValue;
		$this->paciente->CellCssStyle .= "text-align: center;";
		$this->paciente->ViewCustomAttributes = "";

		// evaluacion
		$this->evaluacion->ViewValue = $this->evaluacion->CurrentValue;
		$this->evaluacion->CellCssStyle .= "text-align: center;";
		$this->evaluacion->ViewCustomAttributes = "";

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
			$this->tiempo->LinkAttrs["data-tooltip-id"] = "tt_interh_maestro_x" . (($this->RowType != ROWTYPE_MASTER) ? @$this->RowCount : "") . "_tiempo";
			$this->tiempo->LinkAttrs["data-tooltip-width"] = $this->tiempo->TooltipWidth;
			$this->tiempo->LinkAttrs["data-placement"] = Config("CSS_FLIP") ? "left" : "right";
		}

		// cod_expendeinteinteh
		$this->cod_expendeinteinteh->LinkCustomAttributes = "";
		$this->cod_expendeinteinteh->HrefValue = "";
		$this->cod_expendeinteinteh->TooltipValue = "";

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

		// longitudinterh
		$this->longitudinterh->LinkCustomAttributes = "";
		$this->longitudinterh->HrefValue = "";
		$this->longitudinterh->TooltipValue = "";

		// latitudinterh
		$this->latitudinterh->LinkCustomAttributes = "";
		$this->latitudinterh->HrefValue = "";
		$this->latitudinterh->TooltipValue = "";

		// prioridadinterh
		$this->prioridadinterh->LinkCustomAttributes = "";
		$this->prioridadinterh->HrefValue = "";
		$this->prioridadinterh->TooltipValue = "";

		// estadointerh
		$this->estadointerh->LinkCustomAttributes = "";
		$this->estadointerh->HrefValue = "";
		$this->estadointerh->TooltipValue = "";

		// cierreinterh
		$this->cierreinterh->LinkCustomAttributes = "";
		$this->cierreinterh->HrefValue = "";
		$this->cierreinterh->TooltipValue = "";

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

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// cod_casointerh
		$this->cod_casointerh->EditAttrs["class"] = "form-control";
		$this->cod_casointerh->EditCustomAttributes = "";
		$this->cod_casointerh->EditValue = $this->cod_casointerh->CurrentValue;
		$this->cod_casointerh->CssClass = "font-weight-bold";
		$this->cod_casointerh->CellCssStyle .= "text-align: center;";
		$this->cod_casointerh->ViewCustomAttributes = "";

		// fechahorainterh
		// tiempo

		$this->tiempo->EditAttrs["class"] = "form-control";
		$this->tiempo->EditCustomAttributes = "";
		$this->tiempo->EditValue = $this->tiempo->CurrentValue;
		$this->tiempo->PlaceHolder = RemoveHtml($this->tiempo->caption());
		if (strval($this->tiempo->EditValue) != "" && is_numeric($this->tiempo->EditValue))
			$this->tiempo->EditValue = FormatNumber($this->tiempo->EditValue, -2, -2, -2, -2);
		

		// cod_expendeinteinteh
		$this->cod_expendeinteinteh->EditAttrs["class"] = "form-control";
		$this->cod_expendeinteinteh->EditCustomAttributes = "";
		if (!$this->cod_expendeinteinteh->Raw)
			$this->cod_expendeinteinteh->CurrentValue = HtmlDecode($this->cod_expendeinteinteh->CurrentValue);
		$this->cod_expendeinteinteh->EditValue = $this->cod_expendeinteinteh->CurrentValue;
		$this->cod_expendeinteinteh->PlaceHolder = RemoveHtml($this->cod_expendeinteinteh->caption());

		// tipo_serviciointerh
		$this->tipo_serviciointerh->EditAttrs["class"] = "form-control";
		$this->tipo_serviciointerh->EditCustomAttributes = "";

		// hospital_origneinterh
		$this->hospital_origneinterh->EditAttrs["class"] = "form-control";
		$this->hospital_origneinterh->EditCustomAttributes = "";

		// nombrereportainterh
		$this->nombrereportainterh->EditAttrs["class"] = "form-control";
		$this->nombrereportainterh->EditCustomAttributes = "";
		if (!$this->nombrereportainterh->Raw)
			$this->nombrereportainterh->CurrentValue = HtmlDecode($this->nombrereportainterh->CurrentValue);
		$this->nombrereportainterh->EditValue = $this->nombrereportainterh->CurrentValue;
		$this->nombrereportainterh->PlaceHolder = RemoveHtml($this->nombrereportainterh->caption());

		// telefonointerh
		$this->telefonointerh->EditAttrs["class"] = "form-control";
		$this->telefonointerh->EditCustomAttributes = "";
		if (!$this->telefonointerh->Raw)
			$this->telefonointerh->CurrentValue = HtmlDecode($this->telefonointerh->CurrentValue);
		$this->telefonointerh->EditValue = $this->telefonointerh->CurrentValue;
		$this->telefonointerh->PlaceHolder = RemoveHtml($this->telefonointerh->caption());

		// motivo_atencioninteh
		$this->motivo_atencioninteh->EditCustomAttributes = "";

		// accioninterh
		$this->accioninterh->EditAttrs["class"] = "form-control";
		$this->accioninterh->EditCustomAttributes = "";

		// longitudinterh
		$this->longitudinterh->EditAttrs["class"] = "form-control";
		$this->longitudinterh->EditCustomAttributes = "";
		if (!$this->longitudinterh->Raw)
			$this->longitudinterh->CurrentValue = HtmlDecode($this->longitudinterh->CurrentValue);
		$this->longitudinterh->EditValue = $this->longitudinterh->CurrentValue;
		$this->longitudinterh->PlaceHolder = RemoveHtml($this->longitudinterh->caption());

		// latitudinterh
		$this->latitudinterh->EditAttrs["class"] = "form-control";
		$this->latitudinterh->EditCustomAttributes = "";

		// prioridadinterh
		$this->prioridadinterh->EditAttrs["class"] = "form-control";
		$this->prioridadinterh->EditCustomAttributes = "";

		// estadointerh
		// cierreinterh

		$this->cierreinterh->EditAttrs["class"] = "form-control";
		$this->cierreinterh->EditCustomAttributes = "";
		$this->cierreinterh->EditValue = $this->cierreinterh->CurrentValue;
		$this->cierreinterh->PlaceHolder = RemoveHtml($this->cierreinterh->caption());

		// hospital_destinointerh
		$this->hospital_destinointerh->EditAttrs["class"] = "form-control";
		$this->hospital_destinointerh->EditCustomAttributes = "";

		// nombre_recibe
		$this->nombre_recibe->EditAttrs["class"] = "form-control";
		$this->nombre_recibe->EditCustomAttributes = "";
		if (!$this->nombre_recibe->Raw)
			$this->nombre_recibe->CurrentValue = HtmlDecode($this->nombre_recibe->CurrentValue);
		$this->nombre_recibe->EditValue = $this->nombre_recibe->CurrentValue;
		$this->nombre_recibe->PlaceHolder = RemoveHtml($this->nombre_recibe->caption());

		// ambulancia
		$this->ambulancia->EditAttrs["class"] = "form-control";
		$this->ambulancia->EditCustomAttributes = "";
		$this->ambulancia->EditValue = $this->ambulancia->CurrentValue;
		$this->ambulancia->PlaceHolder = RemoveHtml($this->ambulancia->caption());

		// paciente
		$this->paciente->EditAttrs["class"] = "form-control";
		$this->paciente->EditCustomAttributes = "";
		$this->paciente->EditValue = $this->paciente->CurrentValue;
		$this->paciente->PlaceHolder = RemoveHtml($this->paciente->caption());

		// evaluacion
		$this->evaluacion->EditAttrs["class"] = "form-control";
		$this->evaluacion->EditCustomAttributes = "";
		$this->evaluacion->EditValue = $this->evaluacion->CurrentValue;
		$this->evaluacion->PlaceHolder = RemoveHtml($this->evaluacion->caption());

		// sede
		$this->sede->EditAttrs["class"] = "form-control";
		$this->sede->EditCustomAttributes = "";
		$this->sede->EditValue = $this->sede->CurrentValue;
		$this->sede->PlaceHolder = RemoveHtml($this->sede->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->cod_casointerh);
					$doc->exportCaption($this->fechahorainterh);
					$doc->exportCaption($this->tiempo);
					$doc->exportCaption($this->tipo_serviciointerh);
					$doc->exportCaption($this->hospital_origneinterh);
					$doc->exportCaption($this->nombrereportainterh);
					$doc->exportCaption($this->telefonointerh);
					$doc->exportCaption($this->motivo_atencioninteh);
					$doc->exportCaption($this->accioninterh);
					$doc->exportCaption($this->prioridadinterh);
					$doc->exportCaption($this->estadointerh);
					$doc->exportCaption($this->hospital_destinointerh);
					$doc->exportCaption($this->nombre_recibe);
					$doc->exportCaption($this->ambulancia);
				} else {
					$doc->exportCaption($this->cod_casointerh);
					$doc->exportCaption($this->fechahorainterh);
					$doc->exportCaption($this->tiempo);
					$doc->exportCaption($this->tipo_serviciointerh);
					$doc->exportCaption($this->hospital_origneinterh);
					$doc->exportCaption($this->nombrereportainterh);
					$doc->exportCaption($this->telefonointerh);
					$doc->exportCaption($this->motivo_atencioninteh);
					$doc->exportCaption($this->accioninterh);
					$doc->exportCaption($this->longitudinterh);
					$doc->exportCaption($this->latitudinterh);
					$doc->exportCaption($this->prioridadinterh);
					$doc->exportCaption($this->estadointerh);
					$doc->exportCaption($this->cierreinterh);
					$doc->exportCaption($this->hospital_destinointerh);
					$doc->exportCaption($this->nombre_recibe);
					$doc->exportCaption($this->sede);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->cod_casointerh);
						$doc->exportField($this->fechahorainterh);
						$doc->exportField($this->tiempo);
						$doc->exportField($this->tipo_serviciointerh);
						$doc->exportField($this->hospital_origneinterh);
						$doc->exportField($this->nombrereportainterh);
						$doc->exportField($this->telefonointerh);
						$doc->exportField($this->motivo_atencioninteh);
						$doc->exportField($this->accioninterh);
						$doc->exportField($this->prioridadinterh);
						$doc->exportField($this->estadointerh);
						$doc->exportField($this->hospital_destinointerh);
						$doc->exportField($this->nombre_recibe);
						$doc->exportField($this->ambulancia);
					} else {
						$doc->exportField($this->cod_casointerh);
						$doc->exportField($this->fechahorainterh);
						$doc->exportField($this->tiempo);
						$doc->exportField($this->tipo_serviciointerh);
						$doc->exportField($this->hospital_origneinterh);
						$doc->exportField($this->nombrereportainterh);
						$doc->exportField($this->telefonointerh);
						$doc->exportField($this->motivo_atencioninteh);
						$doc->exportField($this->accioninterh);
						$doc->exportField($this->longitudinterh);
						$doc->exportField($this->latitudinterh);
						$doc->exportField($this->prioridadinterh);
						$doc->exportField($this->estadointerh);
						$doc->exportField($this->cierreinterh);
						$doc->exportField($this->hospital_destinointerh);
						$doc->exportField($this->nombre_recibe);
						$doc->exportField($this->sede);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
		AddFilter($filter, "cierreinterh = 0");
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE
	//	Execute("INSERT INTO pacientegeneral (cod_casointerh) values (".$rsnew['cod_casointerh'].")");
	//	Execute("INSERT INTO interh_evaluacionclinica (cod_maestrointerh) values (".$rsnew['cod_casointerh'].");");
	//	Execute("INSERT INTO servicio_ambulancia (id_maestrointerh) values (".$rsnew['cod_casointerh'].");");
	//	Execute("INSERT INTO destino (cod_maestrointerh) values (".$rsnew['cod_casointerh'].");");
	//	Execute("INSERT INTO interh_seguimiento (cod_maestrointerh) values (".$rsnew['cod_casointerh'].");");

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
		//	Execute("INSERT INTO pacientegeneral (cod_casointerh) values (".$rsnew['cod_casointerh'].");");

		$paciente = Execute("INSERT INTO pacientegeneral (cod_casointerh) values (".$rsnew['cod_casointerh'].") RETURNING id_paciente");
		$id_paciente = pg_fetch_all($paciente)[0];
		Execute("INSERT INTO interh_evaluacionclinica (cod_casointerh, cod_paciente) values (".$rsnew['cod_casointerh'].", '$id_paciente')");
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

		 if( $this->tiempo->CurrentValue <= 15)      
		  	$this->tiempo->ViewAttrs["class"] = "badge bg-success";
		elseif( $this->tiempo->CurrentValue > 15 and $this->tiempo->CurrentValue < 30)
			$this->tiempo->ViewAttrs["class"] = "badge bg-warning";
		else
			 $this->tiempo->ViewAttrs["class"] = "badge bg-danger";
		  if( $this->tiempo->CurrentValue <= 15)      
		  	$this->tiempo->ViewAttrs["class"] = "badge bg-success";
		elseif( $this->tiempo->CurrentValue > 15 and $this->tiempo->CurrentValue < 30)
			$this->tiempo->ViewAttrs["class"] = "badge bg-warning";
		else
			 $this->tiempo->ViewAttrs["class"] = "badge bg-danger";
			if( $this->prioridadinterh->CurrentValue == 3)      
			  	$this->prioridadinterh->ViewAttrs["class"] = "badge bg-success";
			elseif( $this->prioridadinterh->CurrentValue == 2)
				$this->prioridadinterh->ViewAttrs["class"] = "badge bg-warning";
			else
				 $this->prioridadinterh->ViewAttrs["class"] = "badge bg-danger";
		   if( $this->paciente->CurrentValue == '')
		   		$this->paciente->ViewAttrs["class"] = "badge bg-success";
		 	   if( $this->evaluacion->CurrentValue == '')
		   		$this->evaluacion->ViewAttrs["class"] = "badge bg-success";
	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>