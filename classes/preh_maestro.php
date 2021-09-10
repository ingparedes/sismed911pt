<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for preh_maestro
 */
class preh_maestro extends DbTable
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
	public $cod_casopreh;
	public $fecha;
	public $tiempo;
	public $llamada_fallida;
	public $longitud;
	public $latitud;
	public $quepasa;
	public $direccion;
	public $estado_llamada;
	public $incidente;
	public $prioridad;
	public $accion;
	public $estado;
	public $cierre;
	public $caso_multiple;
	public $paciente;
	public $evaluacion;
	public $sede;
	public $fecha_llamada;
	public $hospital_destino;
	public $nombre_medico;
	public $nombre_confirma;
	public $telefono_confirma;
	public $telefono;
	public $nombre_reporta;
	public $distrito;
	public $descripcion;
	public $observacion;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'preh_maestro';
		$this->TableName = 'preh_maestro';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"preh_maestro\"";
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

		// cod_casopreh
		$this->cod_casopreh = new DbField('preh_maestro', 'preh_maestro', 'x_cod_casopreh', 'cod_casopreh', '"cod_casopreh"', 'CAST("cod_casopreh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casopreh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->cod_casopreh->IsAutoIncrement = TRUE; // Autoincrement field
		$this->cod_casopreh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casopreh->Nullable = FALSE; // NOT NULL field
		$this->cod_casopreh->Sortable = TRUE; // Allow sort
		$this->cod_casopreh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casopreh'] = &$this->cod_casopreh;

		// fecha
		$this->fecha = new DbField('preh_maestro', 'preh_maestro', 'x_fecha', 'fecha', '"fecha"', CastDateFieldForLike("\"fecha\"", 109, "DB"), 135, 8, 109, FALSE, '"fecha"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha->Sortable = TRUE; // Allow sort
		$this->fecha->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateYMD"));
		$this->fields['fecha'] = &$this->fecha;

		// tiempo
		$this->tiempo = new DbField('preh_maestro', 'preh_maestro', 'x_tiempo', 'tiempo', 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60)', 'CAST(ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60) AS varchar(255))', 5, 8, -1, FALSE, 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60)', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tiempo->IsCustom = TRUE; // Custom field
		$this->tiempo->Sortable = TRUE; // Allow sort
		$this->tiempo->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['tiempo'] = &$this->tiempo;

		// llamada_fallida
		$this->llamada_fallida = new DbField('preh_maestro', 'preh_maestro', 'x_llamada_fallida', 'llamada_fallida', '"llamada_fallida"', 'CAST("llamada_fallida" AS varchar(255))', 2, 2, -1, FALSE, '"llamada_fallida"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->llamada_fallida->Sortable = TRUE; // Allow sort
		$this->llamada_fallida->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->llamada_fallida->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->llamada_fallida->Lookup = new Lookup('llamada_fallida', 'tipo_llamada', FALSE, 'id_llamda_f', ["llamada_fallida_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->llamada_fallida->Lookup = new Lookup('llamada_fallida', 'tipo_llamada', FALSE, 'id_llamda_f', ["llamada_fallida_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->llamada_fallida->Lookup = new Lookup('llamada_fallida', 'tipo_llamada', FALSE, 'id_llamda_f', ["llamada_fallida_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->llamada_fallida->Lookup = new Lookup('llamada_fallida', 'tipo_llamada', FALSE, 'id_llamda_f', ["llamada_fallida","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->llamada_fallida->Lookup = new Lookup('llamada_fallida', 'tipo_llamada', FALSE, 'id_llamda_f', ["llamada_fallida","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->llamada_fallida->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['llamada_fallida'] = &$this->llamada_fallida;

		// longitud
		$this->longitud = new DbField('preh_maestro', 'preh_maestro', 'x_longitud', 'longitud', '"longitud"', '"longitud"', 200, 30, -1, FALSE, '"longitud"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->longitud->Sortable = TRUE; // Allow sort
		$this->fields['longitud'] = &$this->longitud;

		// latitud
		$this->latitud = new DbField('preh_maestro', 'preh_maestro', 'x_latitud', 'latitud', '"latitud"', '"latitud"', 200, 30, -1, FALSE, '"latitud"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->latitud->Sortable = TRUE; // Allow sort
		$this->fields['latitud'] = &$this->latitud;

		// quepasa
		$this->quepasa = new DbField('preh_maestro', 'preh_maestro', 'x_quepasa', 'quepasa', '"quepasa"', '"quepasa"', 201, 0, -1, FALSE, '"quepasa"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->quepasa->Sortable = TRUE; // Allow sort
		$this->fields['quepasa'] = &$this->quepasa;

		// direccion
		$this->direccion = new DbField('preh_maestro', 'preh_maestro', 'x_direccion', 'direccion', '"direccion"', '"direccion"', 200, 60, -1, FALSE, '"direccion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->direccion->Sortable = TRUE; // Allow sort
		$this->fields['direccion'] = &$this->direccion;

		// estado_llamada
		$this->estado_llamada = new DbField('preh_maestro', 'preh_maestro', 'x_estado_llamada', 'estado_llamada', '"estado_llamada"', '"estado_llamada"', 200, 2, -1, FALSE, '"estado_llamada"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->estado_llamada->Sortable = TRUE; // Allow sort
		$this->estado_llamada->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->estado_llamada->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->fields['estado_llamada'] = &$this->estado_llamada;

		// incidente
		$this->incidente = new DbField('preh_maestro', 'preh_maestro', 'x_incidente', 'incidente', '"incidente"', 'CAST("incidente" AS varchar(255))', 2, 2, -1, FALSE, '"incidente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->incidente->Required = TRUE; // Required field
		$this->incidente->Sortable = TRUE; // Allow sort
		$this->incidente->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->incidente->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->incidente->Lookup = new Lookup('incidente', 'incidentes', FALSE, 'id_incidente', ["nombre_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->incidente->Lookup = new Lookup('incidente', 'incidentes', FALSE, 'id_incidente', ["nombre_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->incidente->Lookup = new Lookup('incidente', 'incidentes', FALSE, 'id_incidente', ["nombre_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->incidente->Lookup = new Lookup('incidente', 'incidentes', FALSE, 'id_incidente', ["nombre_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->incidente->Lookup = new Lookup('incidente', 'incidentes', FALSE, 'id_incidente', ["nombre_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->incidente->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['incidente'] = &$this->incidente;

		// prioridad
		$this->prioridad = new DbField('preh_maestro', 'preh_maestro', 'x_prioridad', 'prioridad', '"prioridad"', 'CAST("prioridad" AS varchar(255))', 2, 2, -1, FALSE, '"prioridad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->prioridad->Sortable = TRUE; // Allow sort
		$this->prioridad->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->prioridad->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->prioridad->Lookup = new Lookup('prioridad', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->prioridad->Lookup = new Lookup('prioridad', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->prioridad->Lookup = new Lookup('prioridad', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->prioridad->Lookup = new Lookup('prioridad', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->prioridad->Lookup = new Lookup('prioridad', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->prioridad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['prioridad'] = &$this->prioridad;

		// accion
		$this->accion = new DbField('preh_maestro', 'preh_maestro', 'x_accion', 'accion', '"accion"', 'CAST("accion" AS varchar(255))', 2, 2, -1, FALSE, '"accion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->accion->Sortable = TRUE; // Allow sort
		$this->accion->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->accion->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->accion->Lookup = new Lookup('accion', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->accion->Lookup = new Lookup('accion', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->accion->Lookup = new Lookup('accion', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->accion->Lookup = new Lookup('accion', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->accion->Lookup = new Lookup('accion', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->accion->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['accion'] = &$this->accion;

		// estado
		$this->estado = new DbField('preh_maestro', 'preh_maestro', 'x_estado', 'estado', '"estado"', 'CAST("estado" AS varchar(255))', 2, 2, -1, FALSE, '"estado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado->Sortable = TRUE; // Allow sort
		$this->estado->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['estado'] = &$this->estado;

		// cierre
		$this->cierre = new DbField('preh_maestro', 'preh_maestro', 'x_cierre', 'cierre', '"cierre"', 'CAST("cierre" AS varchar(255))', 2, 2, -1, FALSE, '"cierre"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cierre->Sortable = TRUE; // Allow sort
		$this->cierre->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cierre'] = &$this->cierre;

		// caso_multiple
		$this->caso_multiple = new DbField('preh_maestro', 'preh_maestro', 'x_caso_multiple', 'caso_multiple', '"caso_multiple"', 'CAST("caso_multiple" AS varchar(255))', 3, 4, -1, FALSE, '"caso_multiple"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->caso_multiple->Sortable = TRUE; // Allow sort
		$this->caso_multiple->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['caso_multiple'] = &$this->caso_multiple;

		// paciente
		$this->paciente = new DbField('preh_maestro', 'preh_maestro', 'x_paciente', 'paciente', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->paciente->IsCustom = TRUE; // Custom field
		$this->paciente->Sortable = TRUE; // Allow sort
		$this->fields['paciente'] = &$this->paciente;

		// evaluacion
		$this->evaluacion = new DbField('preh_maestro', 'preh_maestro', 'x_evaluacion', 'evaluacion', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->evaluacion->IsCustom = TRUE; // Custom field
		$this->evaluacion->Sortable = TRUE; // Allow sort
		$this->fields['evaluacion'] = &$this->evaluacion;

		// sede
		$this->sede = new DbField('preh_maestro', 'preh_maestro', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sede'] = &$this->sede;

		// fecha_llamada
		$this->fecha_llamada = new DbField('preh_maestro', 'preh_maestro', 'x_fecha_llamada', 'fecha_llamada', '"fecha_llamada"', CastDateFieldForLike("\"fecha_llamada\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_llamada"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_llamada->Sortable = TRUE; // Allow sort
		$this->fecha_llamada->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_llamada'] = &$this->fecha_llamada;

		// hospital_destino
		$this->hospital_destino = new DbField('preh_maestro', 'preh_maestro', 'x_hospital_destino', 'hospital_destino', '"hospital_destino"', '"hospital_destino"', 200, 16, -1, FALSE, '"hospital_destino"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->hospital_destino->Sortable = TRUE; // Allow sort
		$this->hospital_destino->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->hospital_destino->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->hospital_destino->Lookup = new Lookup('hospital_destino', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->hospital_destino->Lookup = new Lookup('hospital_destino', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->hospital_destino->Lookup = new Lookup('hospital_destino', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->hospital_destino->Lookup = new Lookup('hospital_destino', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->hospital_destino->Lookup = new Lookup('hospital_destino', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['hospital_destino'] = &$this->hospital_destino;

		// nombre_medico
		$this->nombre_medico = new DbField('preh_maestro', 'preh_maestro', 'x_nombre_medico', 'nombre_medico', '"nombre_medico"', '"nombre_medico"', 200, 150, -1, FALSE, '"nombre_medico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_medico->Sortable = TRUE; // Allow sort
		$this->fields['nombre_medico'] = &$this->nombre_medico;

		// nombre_confirma
		$this->nombre_confirma = new DbField('preh_maestro', 'preh_maestro', 'x_nombre_confirma', 'nombre_confirma', '"nombre_confirma"', '"nombre_confirma"', 200, 60, -1, FALSE, '"nombre_confirma"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_confirma->Sortable = TRUE; // Allow sort
		$this->fields['nombre_confirma'] = &$this->nombre_confirma;

		// telefono_confirma
		$this->telefono_confirma = new DbField('preh_maestro', 'preh_maestro', 'x_telefono_confirma', 'telefono_confirma', '"telefono_confirma"', '"telefono_confirma"', 200, 30, -1, FALSE, '"telefono_confirma"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono_confirma->Sortable = TRUE; // Allow sort
		$this->fields['telefono_confirma'] = &$this->telefono_confirma;

		// telefono
		$this->telefono = new DbField('preh_maestro', 'preh_maestro', 'x_telefono', 'telefono', '"telefono"', '"telefono"', 200, 20, -1, FALSE, '"telefono"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono->Sortable = TRUE; // Allow sort
		$this->fields['telefono'] = &$this->telefono;

		// nombre_reporta
		$this->nombre_reporta = new DbField('preh_maestro', 'preh_maestro', 'x_nombre_reporta', 'nombre_reporta', '"nombre_reporta"', '"nombre_reporta"', 200, 60, -1, FALSE, '"nombre_reporta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_reporta->Sortable = TRUE; // Allow sort
		$this->fields['nombre_reporta'] = &$this->nombre_reporta;

		// distrito
		$this->distrito = new DbField('preh_maestro', 'preh_maestro', 'x_distrito', 'distrito', '"distrito"', '"distrito"', 200, 6, -1, FALSE, '"distrito"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->distrito->Sortable = FALSE; // Allow sort
		$this->fields['distrito'] = &$this->distrito;

		// descripcion
		$this->descripcion = new DbField('preh_maestro', 'preh_maestro', 'x_descripcion', 'descripcion', '"descripcion"', '"descripcion"', 201, 0, -1, FALSE, '"descripcion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->descripcion->Sortable = FALSE; // Allow sort
		$this->fields['descripcion'] = &$this->descripcion;

		// observacion
		$this->observacion = new DbField('preh_maestro', 'preh_maestro', 'x_observacion', 'observacion', '"observacion"', '"observacion"', 201, 0, -1, FALSE, '"observacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->observacion->Sortable = FALSE; // Allow sort
		$this->fields['observacion'] = &$this->observacion;
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
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"preh_maestro\"";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60) AS \"tiempo\", '' AS \"paciente\", '' AS \"evaluacion\" FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "\"prioridad\" ASC,\"cod_casopreh\" DESC";
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
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
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
			$this->cod_casopreh->setDbValue($conn->getOne("SELECT currval('preh_maestro_cod_casopreh_seq'::regclass)"));
			$rs['cod_casopreh'] = $this->cod_casopreh->DbValue;
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
			if (array_key_exists('cod_casopreh', $rs))
				AddFilter($where, QuotedName('cod_casopreh', $this->Dbid) . '=' . QuotedValue($rs['cod_casopreh'], $this->cod_casopreh->DataType, $this->Dbid));
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
		$this->cod_casopreh->DbValue = $row['cod_casopreh'];
		$this->fecha->DbValue = $row['fecha'];
		$this->tiempo->DbValue = $row['tiempo'];
		$this->llamada_fallida->DbValue = $row['llamada_fallida'];
		$this->longitud->DbValue = $row['longitud'];
		$this->latitud->DbValue = $row['latitud'];
		$this->quepasa->DbValue = $row['quepasa'];
		$this->direccion->DbValue = $row['direccion'];
		$this->estado_llamada->DbValue = $row['estado_llamada'];
		$this->incidente->DbValue = $row['incidente'];
		$this->prioridad->DbValue = $row['prioridad'];
		$this->accion->DbValue = $row['accion'];
		$this->estado->DbValue = $row['estado'];
		$this->cierre->DbValue = $row['cierre'];
		$this->caso_multiple->DbValue = $row['caso_multiple'];
		$this->paciente->DbValue = $row['paciente'];
		$this->evaluacion->DbValue = $row['evaluacion'];
		$this->sede->DbValue = $row['sede'];
		$this->fecha_llamada->DbValue = $row['fecha_llamada'];
		$this->hospital_destino->DbValue = $row['hospital_destino'];
		$this->nombre_medico->DbValue = $row['nombre_medico'];
		$this->nombre_confirma->DbValue = $row['nombre_confirma'];
		$this->telefono_confirma->DbValue = $row['telefono_confirma'];
		$this->telefono->DbValue = $row['telefono'];
		$this->nombre_reporta->DbValue = $row['nombre_reporta'];
		$this->distrito->DbValue = $row['distrito'];
		$this->descripcion->DbValue = $row['descripcion'];
		$this->observacion->DbValue = $row['observacion'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"cod_casopreh\" = @cod_casopreh@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('cod_casopreh', $row) ? $row['cod_casopreh'] : NULL;
		else
			$val = $this->cod_casopreh->OldValue !== NULL ? $this->cod_casopreh->OldValue : $this->cod_casopreh->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_casopreh@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "preh_maestrolist.php";
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
		if ($pageName == "preh_maestroview.php")
			return $Language->phrase("View");
		elseif ($pageName == "preh_maestroedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "preh_maestroadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "preh_maestrolist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("preh_maestroview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("preh_maestroview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "preh_maestroadd.php?" . $this->getUrlParm($parm);
		else
			$url = "preh_maestroadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("preh_maestroedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("preh_maestroadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("preh_maestrodelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "cod_casopreh:" . JsonEncode($this->cod_casopreh->CurrentValue, "number");
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
		if ($this->cod_casopreh->CurrentValue != NULL) {
			$url .= "cod_casopreh=" . urlencode($this->cod_casopreh->CurrentValue);
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
			if (Param("cod_casopreh") !== NULL)
				$arKeys[] = Param("cod_casopreh");
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
				$this->cod_casopreh->CurrentValue = $key;
			else
				$this->cod_casopreh->OldValue = $key;
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
		$this->cod_casopreh->setDbValue($rs->fields('cod_casopreh'));
		$this->fecha->setDbValue($rs->fields('fecha'));
		$this->tiempo->setDbValue($rs->fields('tiempo'));
		$this->llamada_fallida->setDbValue($rs->fields('llamada_fallida'));
		$this->longitud->setDbValue($rs->fields('longitud'));
		$this->latitud->setDbValue($rs->fields('latitud'));
		$this->quepasa->setDbValue($rs->fields('quepasa'));
		$this->direccion->setDbValue($rs->fields('direccion'));
		$this->estado_llamada->setDbValue($rs->fields('estado_llamada'));
		$this->incidente->setDbValue($rs->fields('incidente'));
		$this->prioridad->setDbValue($rs->fields('prioridad'));
		$this->accion->setDbValue($rs->fields('accion'));
		$this->estado->setDbValue($rs->fields('estado'));
		$this->cierre->setDbValue($rs->fields('cierre'));
		$this->caso_multiple->setDbValue($rs->fields('caso_multiple'));
		$this->paciente->setDbValue($rs->fields('paciente'));
		$this->evaluacion->setDbValue($rs->fields('evaluacion'));
		$this->sede->setDbValue($rs->fields('sede'));
		$this->fecha_llamada->setDbValue($rs->fields('fecha_llamada'));
		$this->hospital_destino->setDbValue($rs->fields('hospital_destino'));
		$this->nombre_medico->setDbValue($rs->fields('nombre_medico'));
		$this->nombre_confirma->setDbValue($rs->fields('nombre_confirma'));
		$this->telefono_confirma->setDbValue($rs->fields('telefono_confirma'));
		$this->telefono->setDbValue($rs->fields('telefono'));
		$this->nombre_reporta->setDbValue($rs->fields('nombre_reporta'));
		$this->distrito->setDbValue($rs->fields('distrito'));
		$this->descripcion->setDbValue($rs->fields('descripcion'));
		$this->observacion->setDbValue($rs->fields('observacion'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// cod_casopreh
		$this->cod_casopreh->LinkCustomAttributes = "";
		$this->cod_casopreh->HrefValue = "";
		if (!$this->isExport()) {
			$this->cod_casopreh->TooltipValue = strval($this->paciente->CurrentValue);
			if ($this->cod_casopreh->HrefValue == "")
				$this->cod_casopreh->HrefValue = "javascript:void(0);";
			$this->cod_casopreh->LinkAttrs->appendClass("ew-tooltip-link");
			$this->cod_casopreh->LinkAttrs["data-tooltip-id"] = "tt_preh_maestro_x" . (($this->RowType != ROWTYPE_MASTER) ? @$this->RowCount : "") . "_cod_casopreh";
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

		// fecha_llamada
		$this->fecha_llamada->LinkCustomAttributes = "";
		$this->fecha_llamada->HrefValue = "";
		$this->fecha_llamada->TooltipValue = "";

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

		// cod_casopreh
		$this->cod_casopreh->EditAttrs["class"] = "form-control";
		$this->cod_casopreh->EditCustomAttributes = "";
		$this->cod_casopreh->EditValue = $this->cod_casopreh->CurrentValue;
		$this->cod_casopreh->CssClass = "font-weight-bold";
		$this->cod_casopreh->CellCssStyle .= "text-align: center;";
		$this->cod_casopreh->ViewCustomAttributes = "";

		// fecha
		// tiempo

		$this->tiempo->EditAttrs["class"] = "form-control";
		$this->tiempo->EditCustomAttributes = "";
		$this->tiempo->EditValue = $this->tiempo->CurrentValue;
		$this->tiempo->PlaceHolder = RemoveHtml($this->tiempo->caption());
		if (strval($this->tiempo->EditValue) != "" && is_numeric($this->tiempo->EditValue))
			$this->tiempo->EditValue = FormatNumber($this->tiempo->EditValue, -2, -2, -2, -2);
		

		// llamada_fallida
		$this->llamada_fallida->EditAttrs["class"] = "form-control";
		$this->llamada_fallida->EditCustomAttributes = "";

		// longitud
		$this->longitud->EditAttrs["class"] = "form-control";
		$this->longitud->EditCustomAttributes = "";
		if (!$this->longitud->Raw)
			$this->longitud->CurrentValue = HtmlDecode($this->longitud->CurrentValue);
		$this->longitud->EditValue = $this->longitud->CurrentValue;
		$this->longitud->PlaceHolder = RemoveHtml($this->longitud->caption());

		// latitud
		$this->latitud->EditAttrs["class"] = "form-control";
		$this->latitud->EditCustomAttributes = "";
		if (!$this->latitud->Raw)
			$this->latitud->CurrentValue = HtmlDecode($this->latitud->CurrentValue);
		$this->latitud->EditValue = $this->latitud->CurrentValue;
		$this->latitud->PlaceHolder = RemoveHtml($this->latitud->caption());

		// quepasa
		$this->quepasa->EditAttrs["class"] = "form-control";
		$this->quepasa->EditCustomAttributes = "";
		$this->quepasa->EditValue = $this->quepasa->CurrentValue;
		$this->quepasa->PlaceHolder = RemoveHtml($this->quepasa->caption());

		// direccion
		$this->direccion->EditAttrs["class"] = "form-control";
		$this->direccion->EditCustomAttributes = "";
		if (!$this->direccion->Raw)
			$this->direccion->CurrentValue = HtmlDecode($this->direccion->CurrentValue);
		$this->direccion->EditValue = $this->direccion->CurrentValue;
		$this->direccion->PlaceHolder = RemoveHtml($this->direccion->caption());

		// estado_llamada
		$this->estado_llamada->EditAttrs["class"] = "form-control";
		$this->estado_llamada->EditCustomAttributes = "";

		// incidente
		$this->incidente->EditAttrs["class"] = "form-control";
		$this->incidente->EditCustomAttributes = "";

		// prioridad
		$this->prioridad->EditAttrs["class"] = "form-control";
		$this->prioridad->EditCustomAttributes = "";

		// accion
		$this->accion->EditAttrs["class"] = "form-control";
		$this->accion->EditCustomAttributes = "";

		// estado
		$this->estado->EditAttrs["class"] = "form-control";
		$this->estado->EditCustomAttributes = "";
		$this->estado->EditValue = $this->estado->CurrentValue;
		$this->estado->PlaceHolder = RemoveHtml($this->estado->caption());

		// cierre
		$this->cierre->EditAttrs["class"] = "form-control";
		$this->cierre->EditCustomAttributes = "HIDDEN";
		$this->cierre->EditValue = $this->cierre->CurrentValue;
		$this->cierre->PlaceHolder = RemoveHtml($this->cierre->caption());

		// caso_multiple
		$this->caso_multiple->EditAttrs["class"] = "form-control";
		$this->caso_multiple->EditCustomAttributes = "";
		$this->caso_multiple->EditValue = $this->caso_multiple->CurrentValue;
		$this->caso_multiple->PlaceHolder = RemoveHtml($this->caso_multiple->caption());

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

		// fecha_llamada
		$this->fecha_llamada->EditAttrs["class"] = "form-control";
		$this->fecha_llamada->EditCustomAttributes = "";
		$this->fecha_llamada->EditValue = FormatDateTime($this->fecha_llamada->CurrentValue, 8);
		$this->fecha_llamada->PlaceHolder = RemoveHtml($this->fecha_llamada->caption());

		// hospital_destino
		$this->hospital_destino->EditAttrs["class"] = "form-control";
		$this->hospital_destino->EditCustomAttributes = "";

		// nombre_medico
		$this->nombre_medico->EditAttrs["class"] = "form-control";
		$this->nombre_medico->EditCustomAttributes = "";
		if (!$this->nombre_medico->Raw)
			$this->nombre_medico->CurrentValue = HtmlDecode($this->nombre_medico->CurrentValue);
		$this->nombre_medico->EditValue = $this->nombre_medico->CurrentValue;
		$this->nombre_medico->PlaceHolder = RemoveHtml($this->nombre_medico->caption());

		// nombre_confirma
		$this->nombre_confirma->EditAttrs["class"] = "form-control";
		$this->nombre_confirma->EditCustomAttributes = "";
		if (!$this->nombre_confirma->Raw)
			$this->nombre_confirma->CurrentValue = HtmlDecode($this->nombre_confirma->CurrentValue);
		$this->nombre_confirma->EditValue = $this->nombre_confirma->CurrentValue;
		$this->nombre_confirma->PlaceHolder = RemoveHtml($this->nombre_confirma->caption());

		// telefono_confirma
		$this->telefono_confirma->EditAttrs["class"] = "form-control";
		$this->telefono_confirma->EditCustomAttributes = "";
		if (!$this->telefono_confirma->Raw)
			$this->telefono_confirma->CurrentValue = HtmlDecode($this->telefono_confirma->CurrentValue);
		$this->telefono_confirma->EditValue = $this->telefono_confirma->CurrentValue;
		$this->telefono_confirma->PlaceHolder = RemoveHtml($this->telefono_confirma->caption());

		// telefono
		$this->telefono->EditAttrs["class"] = "form-control";
		$this->telefono->EditCustomAttributes = "";
		if (!$this->telefono->Raw)
			$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
		$this->telefono->EditValue = $this->telefono->CurrentValue;
		$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

		// nombre_reporta
		$this->nombre_reporta->EditAttrs["class"] = "form-control";
		$this->nombre_reporta->EditCustomAttributes = "";
		if (!$this->nombre_reporta->Raw)
			$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
		$this->nombre_reporta->EditValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

		// distrito
		$this->distrito->EditAttrs["class"] = "form-control";
		$this->distrito->EditCustomAttributes = "";
		if (!$this->distrito->Raw)
			$this->distrito->CurrentValue = HtmlDecode($this->distrito->CurrentValue);
		$this->distrito->EditValue = $this->distrito->CurrentValue;
		$this->distrito->PlaceHolder = RemoveHtml($this->distrito->caption());

		// descripcion
		$this->descripcion->EditAttrs["class"] = "form-control";
		$this->descripcion->EditCustomAttributes = "";
		$this->descripcion->EditValue = $this->descripcion->CurrentValue;
		$this->descripcion->PlaceHolder = RemoveHtml($this->descripcion->caption());

		// observacion
		$this->observacion->EditAttrs["class"] = "form-control";
		$this->observacion->EditCustomAttributes = "";
		$this->observacion->EditValue = $this->observacion->CurrentValue;
		$this->observacion->PlaceHolder = RemoveHtml($this->observacion->caption());

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
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->fecha);
					$doc->exportCaption($this->tiempo);
					$doc->exportCaption($this->quepasa);
					$doc->exportCaption($this->direccion);
					$doc->exportCaption($this->incidente);
					$doc->exportCaption($this->prioridad);
					$doc->exportCaption($this->accion);
					$doc->exportCaption($this->estado);
					$doc->exportCaption($this->paciente);
					$doc->exportCaption($this->evaluacion);
					$doc->exportCaption($this->hospital_destino);
					$doc->exportCaption($this->nombre_confirma);
					$doc->exportCaption($this->telefono_confirma);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->distrito);
				} else {
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->fecha);
					$doc->exportCaption($this->tiempo);
					$doc->exportCaption($this->llamada_fallida);
					$doc->exportCaption($this->longitud);
					$doc->exportCaption($this->latitud);
					$doc->exportCaption($this->direccion);
					$doc->exportCaption($this->estado_llamada);
					$doc->exportCaption($this->incidente);
					$doc->exportCaption($this->prioridad);
					$doc->exportCaption($this->accion);
					$doc->exportCaption($this->estado);
					$doc->exportCaption($this->cierre);
					$doc->exportCaption($this->caso_multiple);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->fecha_llamada);
					$doc->exportCaption($this->hospital_destino);
					$doc->exportCaption($this->nombre_medico);
					$doc->exportCaption($this->nombre_confirma);
					$doc->exportCaption($this->telefono_confirma);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->distrito);
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
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->fecha);
						$doc->exportField($this->tiempo);
						$doc->exportField($this->quepasa);
						$doc->exportField($this->direccion);
						$doc->exportField($this->incidente);
						$doc->exportField($this->prioridad);
						$doc->exportField($this->accion);
						$doc->exportField($this->estado);
						$doc->exportField($this->paciente);
						$doc->exportField($this->evaluacion);
						$doc->exportField($this->hospital_destino);
						$doc->exportField($this->nombre_confirma);
						$doc->exportField($this->telefono_confirma);
						$doc->exportField($this->telefono);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->distrito);
					} else {
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->fecha);
						$doc->exportField($this->tiempo);
						$doc->exportField($this->llamada_fallida);
						$doc->exportField($this->longitud);
						$doc->exportField($this->latitud);
						$doc->exportField($this->direccion);
						$doc->exportField($this->estado_llamada);
						$doc->exportField($this->incidente);
						$doc->exportField($this->prioridad);
						$doc->exportField($this->accion);
						$doc->exportField($this->estado);
						$doc->exportField($this->cierre);
						$doc->exportField($this->caso_multiple);
						$doc->exportField($this->sede);
						$doc->exportField($this->fecha_llamada);
						$doc->exportField($this->hospital_destino);
						$doc->exportField($this->nombre_medico);
						$doc->exportField($this->nombre_confirma);
						$doc->exportField($this->telefono_confirma);
						$doc->exportField($this->telefono);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->distrito);
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
		$sede = CurrentUserInfo("sede");
		if ($sede != '0') {
			AddFilter($filter, "cierre = '0' and sede = '".$sede."'");
		}else {
			AddFilter($filter, "cierre = '0'");
		}
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

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
		if($rsnew['accion'] =='1'){
		$depacho = ("UPDATE preh_maestro SET estado = '1' WHERE cod_casopreh =".$rsnew['cod_casopreh'].";");
		$dpt=Execute($depacho);
		}
			Execute("INSERT INTO pacientegeneral (cod_casointerh, prehospitalario) values (".$rsnew['cod_casopreh'].",1);");

	//	Execute("INSERT INTO preh_evaluacionclinica (cod_maestrointerh) values (".$rsnew['cod_casopreh'].");");
	//	Execute("INSERT INTO preh_servicio_ambulancia (id_maestrointerh) values (".$rsnew['cod_casopreh'].");");
	//	Execute("INSERT INTO preh_destino (cod_maestrointerh) values (".$rsnew['cod_casopreh'].");");
	//	Execute("INSERT INTO preh_seguimiento (cod_maestrointerh) values (".$rsnew['cod_casopreh'].");");	
	//	 WHERE `YourPrimaryField` = " . $rsnew["YourPrimaryField"]; 

	$sql = "SELECT caso_multiple FROM preh_maestro where cod_casopreh = '".$rsnew["cod_casopreh"]."';";
		$rs=Execute($sql);

		//$rs = ew_LoadRecordset($sql);
	//	$rows = $rs->GetRows();

		$caso_m = $rs->fields[0];
		Execute("UPDATE preh_maestro set sede = '".CurrentUserInfo('sede')."' WHERE cod_casopreh = " . $rsnew["cod_casopreh"].";");
		if ($caso_m == '999999' ){
			Execute("UPDATE preh_maestro set caso_multiple = '".$rsnew['cod_casopreh']."' WHERE cod_casopreh = " . $rsnew["cod_casopreh"].";");
			Execute ("INSERT INTO caso_mltple (caso_mltple, incidente) VALUES ('".$rsnew['cod_casopreh']."','".$rsnew['incidente']."');");
	}
	 if ($rsnew['llamada_fallida'] <> "") {
	 	Execute ("UPDATE preh_maestro set cierre = '1' WHERE cod_casopreh = '" . $rsnew["cod_casopreh"]."';");
	 	$llamada = ExecuteScalar("SELECT llamada_fallida FROM tipo_llamada t WHERE t.id_llamda_f = '".$rsnew["llamada_fallida"]."';");
	 	Execute ("INSERT INTO preh_cierre (cod_casopreh, nota) VALUES ('".$rsnew["cod_casopreh"]."','".$llamada."');");
	 }
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

		if( $this->prioridad->CurrentValue == 3)      
			  	$this->prioridad->ViewAttrs["class"] = "badge bg-success";
			elseif( $this->prioridad->CurrentValue == 2)
				$this->prioridad->ViewAttrs["class"] = "badge bg-warning";
			else
				 $this->prioridad->ViewAttrs["class"] = "badge bg-danger";
		   if( $this->paciente->CurrentValue == '')
		   		$this->paciente->ViewAttrs["class"] = "badge bg-success";
		 	   if( $this->evaluacion->CurrentValue == '')
		   		$this->evaluacion->ViewAttrs["class"] = "badge bg-success";
		   if( $this->tiempo->CurrentValue <= 15)      
		  	$this->tiempo->ViewAttrs["class"] = "badge bg-success";
		elseif( $this->tiempo->CurrentValue > 15 and $this->tiempo->CurrentValue < 30)
			$this->tiempo->ViewAttrs["class"] = "badge bg-warning";
		else
			 $this->tiempo->ViewAttrs["class"] = "badge bg-danger";
			 $this->fecha->ViewAttrs["class"] = "badge bg-light";
	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>