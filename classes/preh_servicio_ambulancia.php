<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for preh_servicio_ambulancia
 */
class preh_servicio_ambulancia extends DbTable
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
	public $id_servcioambulacia;
	public $cod_casopreh;
	public $cod_ambulancia;
	public $hora_confirma;
	public $hora_asigna;
	public $hora_llegada;
	public $hora_inicio;
	public $hora_destino;
	public $hora_preposicion;
	public $observaciones;
	public $tipo_traslado;
	public $traslado_fallido;
	public $estado_paciente;
	public $k_final;
	public $k_inical;
	public $tipo_serviciosistema;
	public $preposicion;
	public $conductor;
	public $medico;
	public $paramedico;
	public $dx_aph;
	public $dx_soat;
	public $estado_pacientefinal;
	public $cuando_murio;
	public $accidente_vehiculo;
	public $atropellado;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'preh_servicio_ambulancia';
		$this->TableName = 'preh_servicio_ambulancia';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"preh_servicio_ambulancia\"";
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

		// id_servcioambulacia
		$this->id_servcioambulacia = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_id_servcioambulacia', 'id_servcioambulacia', '"id_servcioambulacia"', 'CAST("id_servcioambulacia" AS varchar(255))', 3, 4, -1, FALSE, '"id_servcioambulacia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_servcioambulacia->Nullable = FALSE; // NOT NULL field
		$this->id_servcioambulacia->Sortable = TRUE; // Allow sort
		$this->id_servcioambulacia->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_servcioambulacia'] = &$this->id_servcioambulacia;

		// cod_casopreh
		$this->cod_casopreh = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_cod_casopreh', 'cod_casopreh', '"cod_casopreh"', 'CAST("cod_casopreh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casopreh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_casopreh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casopreh->Nullable = FALSE; // NOT NULL field
		$this->cod_casopreh->Required = TRUE; // Required field
		$this->cod_casopreh->Sortable = TRUE; // Allow sort
		$this->cod_casopreh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casopreh'] = &$this->cod_casopreh;

		// cod_ambulancia
		$this->cod_ambulancia = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_cod_ambulancia', 'cod_ambulancia', '"cod_ambulancia"', '"cod_ambulancia"', 200, 16, -1, FALSE, '"cod_ambulancia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_ambulancia->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_ambulancia->Nullable = FALSE; // NOT NULL field
		$this->cod_ambulancia->Required = TRUE; // Required field
		$this->cod_ambulancia->Sortable = TRUE; // Allow sort
		$this->fields['cod_ambulancia'] = &$this->cod_ambulancia;

		// hora_confirma
		$this->hora_confirma = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_hora_confirma', 'hora_confirma', '"hora_confirma"', CastDateFieldForLike("\"hora_confirma\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_confirma"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_confirma->Sortable = TRUE; // Allow sort
		$this->hora_confirma->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_confirma'] = &$this->hora_confirma;

		// hora_asigna
		$this->hora_asigna = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_hora_asigna', 'hora_asigna', '"hora_asigna"', CastDateFieldForLike("\"hora_asigna\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_asigna"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_asigna->Sortable = TRUE; // Allow sort
		$this->fields['hora_asigna'] = &$this->hora_asigna;

		// hora_llegada
		$this->hora_llegada = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_hora_llegada', 'hora_llegada', '"hora_llegada"', CastDateFieldForLike("\"hora_llegada\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_llegada"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_llegada->Sortable = TRUE; // Allow sort
		$this->fields['hora_llegada'] = &$this->hora_llegada;

		// hora_inicio
		$this->hora_inicio = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_hora_inicio', 'hora_inicio', '"hora_inicio"', CastDateFieldForLike("\"hora_inicio\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_inicio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_inicio->Sortable = TRUE; // Allow sort
		$this->fields['hora_inicio'] = &$this->hora_inicio;

		// hora_destino
		$this->hora_destino = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_hora_destino', 'hora_destino', '"hora_destino"', CastDateFieldForLike("\"hora_destino\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_destino"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_destino->Sortable = TRUE; // Allow sort
		$this->fields['hora_destino'] = &$this->hora_destino;

		// hora_preposicion
		$this->hora_preposicion = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_hora_preposicion', 'hora_preposicion', '"hora_preposicion"', CastDateFieldForLike("\"hora_preposicion\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_preposicion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_preposicion->Sortable = TRUE; // Allow sort
		$this->fields['hora_preposicion'] = &$this->hora_preposicion;

		// observaciones
		$this->observaciones = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_observaciones', 'observaciones', '"observaciones"', '"observaciones"', 201, 0, -1, FALSE, '"observaciones"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->observaciones->Sortable = TRUE; // Allow sort
		$this->fields['observaciones'] = &$this->observaciones;

		// tipo_traslado
		$this->tipo_traslado = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_tipo_traslado', 'tipo_traslado', '"tipo_traslado"', '"tipo_traslado"', 200, 4, -1, FALSE, '"tipo_traslado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_traslado->Sortable = TRUE; // Allow sort
		$this->fields['tipo_traslado'] = &$this->tipo_traslado;

		// traslado_fallido
		$this->traslado_fallido = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_traslado_fallido', 'traslado_fallido', '"traslado_fallido"', 'CAST("traslado_fallido" AS varchar(255))', 2, 2, -1, FALSE, '"traslado_fallido"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->traslado_fallido->Sortable = TRUE; // Allow sort
		$this->traslado_fallido->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->traslado_fallido->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->traslado_fallido->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['traslado_fallido'] = &$this->traslado_fallido;

		// estado_paciente
		$this->estado_paciente = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_estado_paciente', 'estado_paciente', '"estado_paciente"', '"estado_paciente"', 200, 2, -1, FALSE, '"estado_paciente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado_paciente->Sortable = TRUE; // Allow sort
		$this->fields['estado_paciente'] = &$this->estado_paciente;

		// k_final
		$this->k_final = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_k_final', 'k_final', '"k_final"', '"k_final"', 200, 10, -1, FALSE, '"k_final"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->k_final->Sortable = TRUE; // Allow sort
		$this->fields['k_final'] = &$this->k_final;

		// k_inical
		$this->k_inical = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_k_inical', 'k_inical', '"k_inical"', '"k_inical"', 200, 10, -1, FALSE, '"k_inical"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->k_inical->Sortable = TRUE; // Allow sort
		$this->fields['k_inical'] = &$this->k_inical;

		// tipo_serviciosistema
		$this->tipo_serviciosistema = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_tipo_serviciosistema', 'tipo_serviciosistema', '"tipo_serviciosistema"', '"tipo_serviciosistema"', 200, 2, -1, FALSE, '"tipo_serviciosistema"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_serviciosistema->Sortable = TRUE; // Allow sort
		$this->fields['tipo_serviciosistema'] = &$this->tipo_serviciosistema;

		// preposicion
		$this->preposicion = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_preposicion', 'preposicion', '"preposicion"', '"preposicion"', 200, 20, -1, FALSE, '"preposicion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->preposicion->Sortable = TRUE; // Allow sort
		$this->fields['preposicion'] = &$this->preposicion;

		// conductor
		$this->conductor = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_conductor', 'conductor', '"conductor"', '"conductor"', 200, 80, -1, FALSE, '"conductor"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->conductor->Sortable = TRUE; // Allow sort
		$this->fields['conductor'] = &$this->conductor;

		// medico
		$this->medico = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_medico', 'medico', '"medico"', '"medico"', 200, 80, -1, FALSE, '"medico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->medico->Sortable = TRUE; // Allow sort
		$this->fields['medico'] = &$this->medico;

		// paramedico
		$this->paramedico = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_paramedico', 'paramedico', '"paramedico"', '"paramedico"', 200, 80, -1, FALSE, '"paramedico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->paramedico->Sortable = TRUE; // Allow sort
		$this->fields['paramedico'] = &$this->paramedico;

		// dx_aph
		$this->dx_aph = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_dx_aph', 'dx_aph', '"dx_aph"', '"dx_aph"', 200, 60, -1, FALSE, '"dx_aph"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->dx_aph->Sortable = TRUE; // Allow sort
		$this->dx_aph->SelectMultiple = TRUE; // Multiple select
		switch ($CurrentLanguage) {
			case "en":
				$this->dx_aph->Lookup = new Lookup('dx_aph', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->dx_aph->Lookup = new Lookup('dx_aph', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->dx_aph->Lookup = new Lookup('dx_aph', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->dx_aph->Lookup = new Lookup('dx_aph', 'cie10', FALSE, 'codigo_cie', ["diagnostico","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->dx_aph->Lookup = new Lookup('dx_aph', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['dx_aph'] = &$this->dx_aph;

		// dx_soat
		$this->dx_soat = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_dx_soat', 'dx_soat', '"dx_soat"', '"dx_soat"', 200, 60, -1, FALSE, '"dx_soat"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->dx_soat->Sortable = TRUE; // Allow sort
		$this->dx_soat->SelectMultiple = TRUE; // Multiple select
		switch ($CurrentLanguage) {
			case "en":
				$this->dx_soat->Lookup = new Lookup('dx_soat', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->dx_soat->Lookup = new Lookup('dx_soat', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->dx_soat->Lookup = new Lookup('dx_soat', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->dx_soat->Lookup = new Lookup('dx_soat', 'cie10', FALSE, 'codigo_cie', ["diagnostico","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->dx_soat->Lookup = new Lookup('dx_soat', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['dx_soat'] = &$this->dx_soat;

		// estado_pacientefinal
		$this->estado_pacientefinal = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_estado_pacientefinal', 'estado_pacientefinal', '"estado_pacientefinal"', '"estado_pacientefinal"', 200, 10, -1, FALSE, '"estado_pacientefinal"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->estado_pacientefinal->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->estado_pacientefinal->Lookup = new Lookup('estado_pacientefinal', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->estado_pacientefinal->Lookup = new Lookup('estado_pacientefinal', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->estado_pacientefinal->Lookup = new Lookup('estado_pacientefinal', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->estado_pacientefinal->Lookup = new Lookup('estado_pacientefinal', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->estado_pacientefinal->Lookup = new Lookup('estado_pacientefinal', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->estado_pacientefinal->OptionCount = 1;
		$this->fields['estado_pacientefinal'] = &$this->estado_pacientefinal;

		// cuando_murio
		$this->cuando_murio = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_cuando_murio', 'cuando_murio', '"cuando_murio"', 'CAST("cuando_murio" AS varchar(255))', 2, 2, -1, FALSE, '"cuando_murio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cuando_murio->Sortable = TRUE; // Allow sort
		$this->cuando_murio->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cuando_murio'] = &$this->cuando_murio;

		// accidente_vehiculo
		$this->accidente_vehiculo = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_accidente_vehiculo', 'accidente_vehiculo', '"accidente_vehiculo"', '"accidente_vehiculo"', 200, 2, -1, FALSE, '"accidente_vehiculo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->accidente_vehiculo->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->accidente_vehiculo->Lookup = new Lookup('accidente_vehiculo', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->accidente_vehiculo->Lookup = new Lookup('accidente_vehiculo', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->accidente_vehiculo->Lookup = new Lookup('accidente_vehiculo', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->accidente_vehiculo->Lookup = new Lookup('accidente_vehiculo', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->accidente_vehiculo->Lookup = new Lookup('accidente_vehiculo', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->accidente_vehiculo->OptionCount = 1;
		$this->fields['accidente_vehiculo'] = &$this->accidente_vehiculo;

		// atropellado
		$this->atropellado = new DbField('preh_servicio_ambulancia', 'preh_servicio_ambulancia', 'x_atropellado', 'atropellado', '"atropellado"', '"atropellado"', 200, 2, -1, FALSE, '"atropellado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->atropellado->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->atropellado->Lookup = new Lookup('atropellado', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->atropellado->Lookup = new Lookup('atropellado', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->atropellado->Lookup = new Lookup('atropellado', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->atropellado->Lookup = new Lookup('atropellado', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->atropellado->Lookup = new Lookup('atropellado', 'preh_servicio_ambulancia', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->atropellado->OptionCount = 1;
		$this->fields['atropellado'] = &$this->atropellado;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"preh_servicio_ambulancia\"";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
			if (array_key_exists('cod_ambulancia', $rs))
				AddFilter($where, QuotedName('cod_ambulancia', $this->Dbid) . '=' . QuotedValue($rs['cod_ambulancia'], $this->cod_ambulancia->DataType, $this->Dbid));
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
		$this->id_servcioambulacia->DbValue = $row['id_servcioambulacia'];
		$this->cod_casopreh->DbValue = $row['cod_casopreh'];
		$this->cod_ambulancia->DbValue = $row['cod_ambulancia'];
		$this->hora_confirma->DbValue = $row['hora_confirma'];
		$this->hora_asigna->DbValue = $row['hora_asigna'];
		$this->hora_llegada->DbValue = $row['hora_llegada'];
		$this->hora_inicio->DbValue = $row['hora_inicio'];
		$this->hora_destino->DbValue = $row['hora_destino'];
		$this->hora_preposicion->DbValue = $row['hora_preposicion'];
		$this->observaciones->DbValue = $row['observaciones'];
		$this->tipo_traslado->DbValue = $row['tipo_traslado'];
		$this->traslado_fallido->DbValue = $row['traslado_fallido'];
		$this->estado_paciente->DbValue = $row['estado_paciente'];
		$this->k_final->DbValue = $row['k_final'];
		$this->k_inical->DbValue = $row['k_inical'];
		$this->tipo_serviciosistema->DbValue = $row['tipo_serviciosistema'];
		$this->preposicion->DbValue = $row['preposicion'];
		$this->conductor->DbValue = $row['conductor'];
		$this->medico->DbValue = $row['medico'];
		$this->paramedico->DbValue = $row['paramedico'];
		$this->dx_aph->DbValue = $row['dx_aph'];
		$this->dx_soat->DbValue = $row['dx_soat'];
		$this->estado_pacientefinal->DbValue = $row['estado_pacientefinal'];
		$this->cuando_murio->DbValue = $row['cuando_murio'];
		$this->accidente_vehiculo->DbValue = $row['accidente_vehiculo'];
		$this->atropellado->DbValue = $row['atropellado'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"cod_casopreh\" = @cod_casopreh@ AND \"cod_ambulancia\" = '@cod_ambulancia@'";
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
		if (is_array($row))
			$val = array_key_exists('cod_ambulancia', $row) ? $row['cod_ambulancia'] : NULL;
		else
			$val = $this->cod_ambulancia->OldValue !== NULL ? $this->cod_ambulancia->OldValue : $this->cod_ambulancia->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_ambulancia@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "preh_servicio_ambulancialist.php";
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
		if ($pageName == "preh_servicio_ambulanciaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "preh_servicio_ambulanciaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "preh_servicio_ambulanciaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "preh_servicio_ambulancialist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("preh_servicio_ambulanciaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("preh_servicio_ambulanciaview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "preh_servicio_ambulanciaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "preh_servicio_ambulanciaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("preh_servicio_ambulanciaedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("preh_servicio_ambulanciaadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("preh_servicio_ambulanciadelete.php", $this->getUrlParm());
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
		$json .= ",cod_ambulancia:" . JsonEncode($this->cod_ambulancia->CurrentValue, "string");
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
		if ($this->cod_ambulancia->CurrentValue != NULL) {
			$url .= "&cod_ambulancia=" . urlencode($this->cod_ambulancia->CurrentValue);
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
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
		} else {
			if (Param("cod_casopreh") !== NULL)
				$arKey[] = Param("cod_casopreh");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("cod_ambulancia") !== NULL)
				$arKey[] = Param("cod_ambulancia");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) != 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // cod_casopreh
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
				$this->cod_casopreh->CurrentValue = $key[0];
			else
				$this->cod_casopreh->OldValue = $key[0];
			if ($setCurrent)
				$this->cod_ambulancia->CurrentValue = $key[1];
			else
				$this->cod_ambulancia->OldValue = $key[1];
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
		$this->id_servcioambulacia->setDbValue($rs->fields('id_servcioambulacia'));
		$this->cod_casopreh->setDbValue($rs->fields('cod_casopreh'));
		$this->cod_ambulancia->setDbValue($rs->fields('cod_ambulancia'));
		$this->hora_confirma->setDbValue($rs->fields('hora_confirma'));
		$this->hora_asigna->setDbValue($rs->fields('hora_asigna'));
		$this->hora_llegada->setDbValue($rs->fields('hora_llegada'));
		$this->hora_inicio->setDbValue($rs->fields('hora_inicio'));
		$this->hora_destino->setDbValue($rs->fields('hora_destino'));
		$this->hora_preposicion->setDbValue($rs->fields('hora_preposicion'));
		$this->observaciones->setDbValue($rs->fields('observaciones'));
		$this->tipo_traslado->setDbValue($rs->fields('tipo_traslado'));
		$this->traslado_fallido->setDbValue($rs->fields('traslado_fallido'));
		$this->estado_paciente->setDbValue($rs->fields('estado_paciente'));
		$this->k_final->setDbValue($rs->fields('k_final'));
		$this->k_inical->setDbValue($rs->fields('k_inical'));
		$this->tipo_serviciosistema->setDbValue($rs->fields('tipo_serviciosistema'));
		$this->preposicion->setDbValue($rs->fields('preposicion'));
		$this->conductor->setDbValue($rs->fields('conductor'));
		$this->medico->setDbValue($rs->fields('medico'));
		$this->paramedico->setDbValue($rs->fields('paramedico'));
		$this->dx_aph->setDbValue($rs->fields('dx_aph'));
		$this->dx_soat->setDbValue($rs->fields('dx_soat'));
		$this->estado_pacientefinal->setDbValue($rs->fields('estado_pacientefinal'));
		$this->cuando_murio->setDbValue($rs->fields('cuando_murio'));
		$this->accidente_vehiculo->setDbValue($rs->fields('accidente_vehiculo'));
		$this->atropellado->setDbValue($rs->fields('atropellado'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// id_servcioambulacia
		$this->id_servcioambulacia->EditAttrs["class"] = "form-control";
		$this->id_servcioambulacia->EditCustomAttributes = "";
		$this->id_servcioambulacia->EditValue = $this->id_servcioambulacia->CurrentValue;
		$this->id_servcioambulacia->PlaceHolder = RemoveHtml($this->id_servcioambulacia->caption());

		// cod_casopreh
		$this->cod_casopreh->EditAttrs["class"] = "form-control";
		$this->cod_casopreh->EditCustomAttributes = "";
		$this->cod_casopreh->EditValue = $this->cod_casopreh->CurrentValue;
		$this->cod_casopreh->EditValue = FormatNumber($this->cod_casopreh->EditValue, 0, -2, -2, -2);
		$this->cod_casopreh->ViewCustomAttributes = "";

		// cod_ambulancia
		$this->cod_ambulancia->EditAttrs["class"] = "form-control";
		$this->cod_ambulancia->EditCustomAttributes = "";
		if (!$this->cod_ambulancia->Raw)
			$this->cod_ambulancia->CurrentValue = HtmlDecode($this->cod_ambulancia->CurrentValue);
		$this->cod_ambulancia->EditValue = $this->cod_ambulancia->CurrentValue;
		$this->cod_ambulancia->PlaceHolder = RemoveHtml($this->cod_ambulancia->caption());

		// hora_confirma
		$this->hora_confirma->EditAttrs["class"] = "form-control";
		$this->hora_confirma->EditCustomAttributes = "";
		$this->hora_confirma->EditValue = FormatDateTime($this->hora_confirma->CurrentValue, 8);
		$this->hora_confirma->PlaceHolder = RemoveHtml($this->hora_confirma->caption());

		// hora_asigna
		$this->hora_asigna->EditAttrs["class"] = "form-control";
		$this->hora_asigna->EditCustomAttributes = "";
		$this->hora_asigna->EditValue = FormatDateTime($this->hora_asigna->CurrentValue, 8);
		$this->hora_asigna->PlaceHolder = RemoveHtml($this->hora_asigna->caption());

		// hora_llegada
		$this->hora_llegada->EditAttrs["class"] = "form-control";
		$this->hora_llegada->EditCustomAttributes = "";
		$this->hora_llegada->EditValue = FormatDateTime($this->hora_llegada->CurrentValue, 8);
		$this->hora_llegada->PlaceHolder = RemoveHtml($this->hora_llegada->caption());

		// hora_inicio
		$this->hora_inicio->EditAttrs["class"] = "form-control";
		$this->hora_inicio->EditCustomAttributes = "";
		$this->hora_inicio->EditValue = FormatDateTime($this->hora_inicio->CurrentValue, 8);
		$this->hora_inicio->PlaceHolder = RemoveHtml($this->hora_inicio->caption());

		// hora_destino
		$this->hora_destino->EditAttrs["class"] = "form-control";
		$this->hora_destino->EditCustomAttributes = "";
		$this->hora_destino->EditValue = FormatDateTime($this->hora_destino->CurrentValue, 8);
		$this->hora_destino->PlaceHolder = RemoveHtml($this->hora_destino->caption());

		// hora_preposicion
		$this->hora_preposicion->EditAttrs["class"] = "form-control";
		$this->hora_preposicion->EditCustomAttributes = "";
		$this->hora_preposicion->EditValue = FormatDateTime($this->hora_preposicion->CurrentValue, 8);
		$this->hora_preposicion->PlaceHolder = RemoveHtml($this->hora_preposicion->caption());

		// observaciones
		$this->observaciones->EditAttrs["class"] = "form-control";
		$this->observaciones->EditCustomAttributes = "";
		$this->observaciones->EditValue = $this->observaciones->CurrentValue;
		$this->observaciones->PlaceHolder = RemoveHtml($this->observaciones->caption());

		// tipo_traslado
		$this->tipo_traslado->EditAttrs["class"] = "form-control";
		$this->tipo_traslado->EditCustomAttributes = "";
		if (!$this->tipo_traslado->Raw)
			$this->tipo_traslado->CurrentValue = HtmlDecode($this->tipo_traslado->CurrentValue);
		$this->tipo_traslado->EditValue = $this->tipo_traslado->CurrentValue;
		$this->tipo_traslado->PlaceHolder = RemoveHtml($this->tipo_traslado->caption());

		// traslado_fallido
		$this->traslado_fallido->EditAttrs["class"] = "form-control";
		$this->traslado_fallido->EditCustomAttributes = "";

		// estado_paciente
		$this->estado_paciente->EditAttrs["class"] = "form-control";
		$this->estado_paciente->EditCustomAttributes = "";
		if (!$this->estado_paciente->Raw)
			$this->estado_paciente->CurrentValue = HtmlDecode($this->estado_paciente->CurrentValue);
		$this->estado_paciente->EditValue = $this->estado_paciente->CurrentValue;
		$this->estado_paciente->PlaceHolder = RemoveHtml($this->estado_paciente->caption());

		// k_final
		$this->k_final->EditAttrs["class"] = "form-control";
		$this->k_final->EditCustomAttributes = "";

		// k_inical
		$this->k_inical->EditAttrs["class"] = "form-control";
		$this->k_inical->EditCustomAttributes = "";

		// tipo_serviciosistema
		$this->tipo_serviciosistema->EditAttrs["class"] = "form-control";
		$this->tipo_serviciosistema->EditCustomAttributes = "";
		if (!$this->tipo_serviciosistema->Raw)
			$this->tipo_serviciosistema->CurrentValue = HtmlDecode($this->tipo_serviciosistema->CurrentValue);
		$this->tipo_serviciosistema->EditValue = $this->tipo_serviciosistema->CurrentValue;
		$this->tipo_serviciosistema->PlaceHolder = RemoveHtml($this->tipo_serviciosistema->caption());

		// preposicion
		$this->preposicion->EditAttrs["class"] = "form-control";
		$this->preposicion->EditCustomAttributes = "";
		if (!$this->preposicion->Raw)
			$this->preposicion->CurrentValue = HtmlDecode($this->preposicion->CurrentValue);
		$this->preposicion->EditValue = $this->preposicion->CurrentValue;
		$this->preposicion->PlaceHolder = RemoveHtml($this->preposicion->caption());

		// conductor
		$this->conductor->EditAttrs["class"] = "form-control";
		$this->conductor->EditCustomAttributes = "";
		if (!$this->conductor->Raw)
			$this->conductor->CurrentValue = HtmlDecode($this->conductor->CurrentValue);
		$this->conductor->EditValue = $this->conductor->CurrentValue;
		$this->conductor->PlaceHolder = RemoveHtml($this->conductor->caption());

		// medico
		$this->medico->EditAttrs["class"] = "form-control";
		$this->medico->EditCustomAttributes = "";
		if (!$this->medico->Raw)
			$this->medico->CurrentValue = HtmlDecode($this->medico->CurrentValue);
		$this->medico->EditValue = $this->medico->CurrentValue;
		$this->medico->PlaceHolder = RemoveHtml($this->medico->caption());

		// paramedico
		$this->paramedico->EditAttrs["class"] = "form-control";
		$this->paramedico->EditCustomAttributes = "";
		if (!$this->paramedico->Raw)
			$this->paramedico->CurrentValue = HtmlDecode($this->paramedico->CurrentValue);
		$this->paramedico->EditValue = $this->paramedico->CurrentValue;
		$this->paramedico->PlaceHolder = RemoveHtml($this->paramedico->caption());

		// dx_aph
		$this->dx_aph->EditAttrs["class"] = "form-control";
		$this->dx_aph->EditCustomAttributes = "";

		// dx_soat
		$this->dx_soat->EditAttrs["class"] = "form-control";
		$this->dx_soat->EditCustomAttributes = "";

		// estado_pacientefinal
		$this->estado_pacientefinal->EditCustomAttributes = "";
		$this->estado_pacientefinal->EditValue = $this->estado_pacientefinal->options(FALSE);

		// cuando_murio
		$this->cuando_murio->EditAttrs["class"] = "form-control";
		$this->cuando_murio->EditCustomAttributes = "";
		$this->cuando_murio->EditValue = $this->cuando_murio->CurrentValue;
		$this->cuando_murio->PlaceHolder = RemoveHtml($this->cuando_murio->caption());

		// accidente_vehiculo
		$this->accidente_vehiculo->EditCustomAttributes = "";
		$this->accidente_vehiculo->EditValue = $this->accidente_vehiculo->options(FALSE);

		// atropellado
		$this->atropellado->EditCustomAttributes = "";
		$this->atropellado->EditValue = $this->atropellado->options(FALSE);

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
					$doc->exportCaption($this->id_servcioambulacia);
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->cod_ambulancia);
					$doc->exportCaption($this->hora_confirma);
					$doc->exportCaption($this->hora_asigna);
					$doc->exportCaption($this->hora_llegada);
					$doc->exportCaption($this->hora_inicio);
					$doc->exportCaption($this->hora_destino);
					$doc->exportCaption($this->hora_preposicion);
					$doc->exportCaption($this->observaciones);
					$doc->exportCaption($this->tipo_traslado);
					$doc->exportCaption($this->traslado_fallido);
					$doc->exportCaption($this->estado_paciente);
					$doc->exportCaption($this->k_final);
					$doc->exportCaption($this->k_inical);
					$doc->exportCaption($this->tipo_serviciosistema);
					$doc->exportCaption($this->preposicion);
					$doc->exportCaption($this->conductor);
					$doc->exportCaption($this->medico);
					$doc->exportCaption($this->paramedico);
					$doc->exportCaption($this->dx_aph);
					$doc->exportCaption($this->dx_soat);
					$doc->exportCaption($this->estado_pacientefinal);
					$doc->exportCaption($this->cuando_murio);
					$doc->exportCaption($this->accidente_vehiculo);
					$doc->exportCaption($this->atropellado);
				} else {
					$doc->exportCaption($this->id_servcioambulacia);
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->cod_ambulancia);
					$doc->exportCaption($this->hora_confirma);
					$doc->exportCaption($this->hora_asigna);
					$doc->exportCaption($this->hora_llegada);
					$doc->exportCaption($this->hora_inicio);
					$doc->exportCaption($this->hora_destino);
					$doc->exportCaption($this->hora_preposicion);
					$doc->exportCaption($this->tipo_traslado);
					$doc->exportCaption($this->traslado_fallido);
					$doc->exportCaption($this->estado_paciente);
					$doc->exportCaption($this->k_final);
					$doc->exportCaption($this->k_inical);
					$doc->exportCaption($this->tipo_serviciosistema);
					$doc->exportCaption($this->preposicion);
					$doc->exportCaption($this->conductor);
					$doc->exportCaption($this->medico);
					$doc->exportCaption($this->paramedico);
					$doc->exportCaption($this->dx_aph);
					$doc->exportCaption($this->dx_soat);
					$doc->exportCaption($this->estado_pacientefinal);
					$doc->exportCaption($this->cuando_murio);
					$doc->exportCaption($this->accidente_vehiculo);
					$doc->exportCaption($this->atropellado);
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
						$doc->exportField($this->id_servcioambulacia);
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->cod_ambulancia);
						$doc->exportField($this->hora_confirma);
						$doc->exportField($this->hora_asigna);
						$doc->exportField($this->hora_llegada);
						$doc->exportField($this->hora_inicio);
						$doc->exportField($this->hora_destino);
						$doc->exportField($this->hora_preposicion);
						$doc->exportField($this->observaciones);
						$doc->exportField($this->tipo_traslado);
						$doc->exportField($this->traslado_fallido);
						$doc->exportField($this->estado_paciente);
						$doc->exportField($this->k_final);
						$doc->exportField($this->k_inical);
						$doc->exportField($this->tipo_serviciosistema);
						$doc->exportField($this->preposicion);
						$doc->exportField($this->conductor);
						$doc->exportField($this->medico);
						$doc->exportField($this->paramedico);
						$doc->exportField($this->dx_aph);
						$doc->exportField($this->dx_soat);
						$doc->exportField($this->estado_pacientefinal);
						$doc->exportField($this->cuando_murio);
						$doc->exportField($this->accidente_vehiculo);
						$doc->exportField($this->atropellado);
					} else {
						$doc->exportField($this->id_servcioambulacia);
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->cod_ambulancia);
						$doc->exportField($this->hora_confirma);
						$doc->exportField($this->hora_asigna);
						$doc->exportField($this->hora_llegada);
						$doc->exportField($this->hora_inicio);
						$doc->exportField($this->hora_destino);
						$doc->exportField($this->hora_preposicion);
						$doc->exportField($this->tipo_traslado);
						$doc->exportField($this->traslado_fallido);
						$doc->exportField($this->estado_paciente);
						$doc->exportField($this->k_final);
						$doc->exportField($this->k_inical);
						$doc->exportField($this->tipo_serviciosistema);
						$doc->exportField($this->preposicion);
						$doc->exportField($this->conductor);
						$doc->exportField($this->medico);
						$doc->exportField($this->paramedico);
						$doc->exportField($this->dx_aph);
						$doc->exportField($this->dx_soat);
						$doc->exportField($this->estado_pacientefinal);
						$doc->exportField($this->cuando_murio);
						$doc->exportField($this->accidente_vehiculo);
						$doc->exportField($this->atropellado);
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
		if ($rsnew["traslado_fallido"]<> ""){
				Execute("UPDATE preh_maestro set cierre = '".$rsnew["traslado_fallido"]."' WHERE cod_casopreh = " . $rsnew["cod_casopreh"].";");
			}
	else {
	Execute("UPDATE ambulancias SET estado = '2' WHERE cod_ambulancias = '".$rsnew["cod_ambulancia"]."';");
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
		if ($rsnew["traslado_fallido"]<> ""){
			Execute("UPDATE preh_maestro set cierre = '".$rsnew["traslado_fallido"]."' WHERE cod_casopreh = " . $rsold["cod_casopreh"].";");
			Execute("UPDATE ambulancias set estado = '1' WHERE cod_ambulancias = '".$rsold["cod_ambulancia"]."';");
			}
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

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>