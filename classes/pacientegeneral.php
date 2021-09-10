<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for pacientegeneral
 */
class pacientegeneral extends DbTable
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
	public $id_paciente;
	public $expendiente;
	public $tipo_doc;
	public $num_doc;
	public $nombre1;
	public $nombre2;
	public $apellido1;
	public $apellido2;
	public $genero;
	public $edad;
	public $fecha_nacido;
	public $cod_edad;
	public $telefono;
	public $celular;
	public $direccion;
	public $_email;
	public $aseguradro;
	public $observacion;
	public $nss;
	public $usu_sede;
	public $prehospitalario;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pacientegeneral';
		$this->TableName = 'pacientegeneral';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"pacientegeneral\"";
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
		$this->cod_casointerh = new DbField('pacientegeneral', 'pacientegeneral', 'x_cod_casointerh', 'cod_casointerh', '"cod_casointerh"', 'CAST("cod_casointerh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_casointerh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casointerh->Nullable = FALSE; // NOT NULL field
		$this->cod_casointerh->Required = TRUE; // Required field
		$this->cod_casointerh->Sortable = TRUE; // Allow sort
		$this->cod_casointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casointerh'] = &$this->cod_casointerh;

		// id_paciente
		$this->id_paciente = new DbField('pacientegeneral', 'pacientegeneral', 'x_id_paciente', 'id_paciente', '"id_paciente"', 'CAST("id_paciente" AS varchar(255))', 3, 4, -1, FALSE, '"id_paciente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_paciente->Nullable = FALSE; // NOT NULL field
		$this->id_paciente->Required = TRUE; // Required field
		$this->id_paciente->Sortable = TRUE; // Allow sort
		$this->id_paciente->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_paciente'] = &$this->id_paciente;

		// expendiente
		$this->expendiente = new DbField('pacientegeneral', 'pacientegeneral', 'x_expendiente', 'expendiente', '"expendiente"', '"expendiente"', 200, 20, -1, FALSE, '"expendiente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->expendiente->Sortable = TRUE; // Allow sort
		$this->fields['expendiente'] = &$this->expendiente;

		// tipo_doc
		$this->tipo_doc = new DbField('pacientegeneral', 'pacientegeneral', 'x_tipo_doc', 'tipo_doc', '"tipo_doc"', 'CAST("tipo_doc" AS varchar(255))', 2, 2, -1, FALSE, '"tipo_doc"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tipo_doc->Sortable = TRUE; // Allow sort
		$this->tipo_doc->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tipo_doc->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->tipo_doc->Lookup = new Lookup('tipo_doc', 'tipo_id', FALSE, 'id_tipo', ["descripcion_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->tipo_doc->Lookup = new Lookup('tipo_doc', 'tipo_id', FALSE, 'id_tipo', ["descripcion_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->tipo_doc->Lookup = new Lookup('tipo_doc', 'tipo_id', FALSE, 'id_tipo', ["descripcion_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->tipo_doc->Lookup = new Lookup('tipo_doc', 'tipo_id', FALSE, 'id_tipo', ["descripcion","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->tipo_doc->Lookup = new Lookup('tipo_doc', 'tipo_id', FALSE, 'id_tipo', ["descripcion","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->tipo_doc->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tipo_doc'] = &$this->tipo_doc;

		// num_doc
		$this->num_doc = new DbField('pacientegeneral', 'pacientegeneral', 'x_num_doc', 'num_doc', '"num_doc"', '"num_doc"', 200, 40, -1, FALSE, '"num_doc"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->num_doc->Sortable = TRUE; // Allow sort
		$this->fields['num_doc'] = &$this->num_doc;

		// nombre1
		$this->nombre1 = new DbField('pacientegeneral', 'pacientegeneral', 'x_nombre1', 'nombre1', '"nombre1"', '"nombre1"', 200, 50, 5, FALSE, '"nombre1"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre1->Sortable = TRUE; // Allow sort
		$this->fields['nombre1'] = &$this->nombre1;

		// nombre2
		$this->nombre2 = new DbField('pacientegeneral', 'pacientegeneral', 'x_nombre2', 'nombre2', '"nombre2"', '"nombre2"', 200, 50, -1, FALSE, '"nombre2"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre2->Sortable = TRUE; // Allow sort
		$this->fields['nombre2'] = &$this->nombre2;

		// apellido1
		$this->apellido1 = new DbField('pacientegeneral', 'pacientegeneral', 'x_apellido1', 'apellido1', '"apellido1"', '"apellido1"', 200, 50, -1, FALSE, '"apellido1"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->apellido1->Sortable = TRUE; // Allow sort
		$this->fields['apellido1'] = &$this->apellido1;

		// apellido2
		$this->apellido2 = new DbField('pacientegeneral', 'pacientegeneral', 'x_apellido2', 'apellido2', '"apellido2"', '"apellido2"', 200, 50, -1, FALSE, '"apellido2"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->apellido2->Sortable = TRUE; // Allow sort
		$this->fields['apellido2'] = &$this->apellido2;

		// genero
		$this->genero = new DbField('pacientegeneral', 'pacientegeneral', 'x_genero', 'genero', '"genero"', 'CAST("genero" AS varchar(255))', 2, 2, -1, FALSE, '"genero"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->genero->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->genero->Lookup = new Lookup('genero', 'tipo_genero', FALSE, 'id_genero', ["nombre_genero_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->genero->Lookup = new Lookup('genero', 'tipo_genero', FALSE, 'id_genero', ["nombre_genero_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->genero->Lookup = new Lookup('genero', 'tipo_genero', FALSE, 'id_genero', ["nombre_genero_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->genero->Lookup = new Lookup('genero', 'tipo_genero', FALSE, 'id_genero', ["nombre_genero","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->genero->Lookup = new Lookup('genero', 'tipo_genero', FALSE, 'id_genero', ["nombre_genero","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->genero->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['genero'] = &$this->genero;

		// edad
		$this->edad = new DbField('pacientegeneral', 'pacientegeneral', 'x_edad', 'edad', '"edad"', 'CAST("edad" AS varchar(255))', 2, 2, -1, FALSE, '"edad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->edad->Sortable = TRUE; // Allow sort
		$this->edad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['edad'] = &$this->edad;

		// fecha_nacido
		$this->fecha_nacido = new DbField('pacientegeneral', 'pacientegeneral', 'x_fecha_nacido', 'fecha_nacido', '"fecha_nacido"', '"fecha_nacido"', 200, 10, 5, FALSE, '"fecha_nacido"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_nacido->Sortable = TRUE; // Allow sort
		$this->fecha_nacido->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateYMD"));
		$this->fields['fecha_nacido'] = &$this->fecha_nacido;

		// cod_edad
		$this->cod_edad = new DbField('pacientegeneral', 'pacientegeneral', 'x_cod_edad', 'cod_edad', '"cod_edad"', 'CAST("cod_edad" AS varchar(255))', 2, 2, -1, FALSE, '"cod_edad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->cod_edad->Sortable = TRUE; // Allow sort
		$this->cod_edad->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->cod_edad->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->cod_edad->Lookup = new Lookup('cod_edad', 'tipo_edad', FALSE, 'id_edad', ["nombre_edad_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->cod_edad->Lookup = new Lookup('cod_edad', 'tipo_edad', FALSE, 'id_edad', ["nombre_edad_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->cod_edad->Lookup = new Lookup('cod_edad', 'tipo_edad', FALSE, 'id_edad', ["nombre_edad_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->cod_edad->Lookup = new Lookup('cod_edad', 'tipo_edad', FALSE, 'id_edad', ["nombre_edad","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->cod_edad->Lookup = new Lookup('cod_edad', 'tipo_edad', FALSE, 'id_edad', ["nombre_edad","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->cod_edad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_edad'] = &$this->cod_edad;

		// telefono
		$this->telefono = new DbField('pacientegeneral', 'pacientegeneral', 'x_telefono', 'telefono', '"telefono"', '"telefono"', 200, 30, -1, FALSE, '"telefono"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono->Sortable = TRUE; // Allow sort
		$this->fields['telefono'] = &$this->telefono;

		// celular
		$this->celular = new DbField('pacientegeneral', 'pacientegeneral', 'x_celular', 'celular', '"celular"', '"celular"', 200, 13, -1, FALSE, '"celular"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->celular->Sortable = TRUE; // Allow sort
		$this->fields['celular'] = &$this->celular;

		// direccion
		$this->direccion = new DbField('pacientegeneral', 'pacientegeneral', 'x_direccion', 'direccion', '"direccion"', '"direccion"', 200, 80, -1, FALSE, '"direccion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->direccion->Sortable = TRUE; // Allow sort
		$this->fields['direccion'] = &$this->direccion;

		// email
		$this->_email = new DbField('pacientegeneral', 'pacientegeneral', 'x__email', 'email', '"email"', '"email"', 200, 50, -1, FALSE, '"email"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_email->Sortable = FALSE; // Allow sort
		$this->fields['email'] = &$this->_email;

		// aseguradro
		$this->aseguradro = new DbField('pacientegeneral', 'pacientegeneral', 'x_aseguradro', 'aseguradro', '"aseguradro"', 'CAST("aseguradro" AS varchar(255))', 2, 2, -1, FALSE, '"aseguradro"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->aseguradro->Sortable = TRUE; // Allow sort
		$this->aseguradro->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->aseguradro->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->aseguradro->Lookup = new Lookup('aseguradro', 'aseguradores', FALSE, 'cod_habiliatacion', ["nombre_asegurador","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->aseguradro->Lookup = new Lookup('aseguradro', 'aseguradores', FALSE, 'cod_habiliatacion', ["nombre_asegurador","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->aseguradro->Lookup = new Lookup('aseguradro', 'aseguradores', FALSE, 'cod_habiliatacion', ["nombre_asegurador","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->aseguradro->Lookup = new Lookup('aseguradro', 'aseguradores', FALSE, 'cod_habiliatacion', ["nombre_asegurador","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->aseguradro->Lookup = new Lookup('aseguradro', 'aseguradores', FALSE, 'cod_habiliatacion', ["nombre_asegurador","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->aseguradro->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['aseguradro'] = &$this->aseguradro;

		// observacion
		$this->observacion = new DbField('pacientegeneral', 'pacientegeneral', 'x_observacion', 'observacion', '"observacion"', '"observacion"', 201, 0, -1, FALSE, '"observacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->observacion->Sortable = TRUE; // Allow sort
		$this->fields['observacion'] = &$this->observacion;

		// nss
		$this->nss = new DbField('pacientegeneral', 'pacientegeneral', 'x_nss', 'nss', '"nss"', '"nss"', 200, 20, -1, FALSE, '"nss"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nss->Sortable = TRUE; // Allow sort
		$this->fields['nss'] = &$this->nss;

		// usu_sede
		$this->usu_sede = new DbField('pacientegeneral', 'pacientegeneral', 'x_usu_sede', 'usu_sede', '"usu_sede"', '"usu_sede"', 200, 16, -1, FALSE, '"usu_sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usu_sede->Sortable = FALSE; // Allow sort
		$this->fields['usu_sede'] = &$this->usu_sede;

		// prehospitalario
		$this->prehospitalario = new DbField('pacientegeneral', 'pacientegeneral', 'x_prehospitalario', 'prehospitalario', '"prehospitalario"', '"prehospitalario"', 200, 1, -1, FALSE, '"prehospitalario"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->prehospitalario->Sortable = TRUE; // Allow sort
		$this->fields['prehospitalario'] = &$this->prehospitalario;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"pacientegeneral\"";
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
		$this->id_paciente->DbValue = $row['id_paciente'];
		$this->expendiente->DbValue = $row['expendiente'];
		$this->tipo_doc->DbValue = $row['tipo_doc'];
		$this->num_doc->DbValue = $row['num_doc'];
		$this->nombre1->DbValue = $row['nombre1'];
		$this->nombre2->DbValue = $row['nombre2'];
		$this->apellido1->DbValue = $row['apellido1'];
		$this->apellido2->DbValue = $row['apellido2'];
		$this->genero->DbValue = $row['genero'];
		$this->edad->DbValue = $row['edad'];
		$this->fecha_nacido->DbValue = $row['fecha_nacido'];
		$this->cod_edad->DbValue = $row['cod_edad'];
		$this->telefono->DbValue = $row['telefono'];
		$this->celular->DbValue = $row['celular'];
		$this->direccion->DbValue = $row['direccion'];
		$this->_email->DbValue = $row['email'];
		$this->aseguradro->DbValue = $row['aseguradro'];
		$this->observacion->DbValue = $row['observacion'];
		$this->nss->DbValue = $row['nss'];
		$this->usu_sede->DbValue = $row['usu_sede'];
		$this->prehospitalario->DbValue = $row['prehospitalario'];
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
			return "pacientegenerallist.php";
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
		if ($pageName == "pacientegeneralview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pacientegeneraledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pacientegeneraladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pacientegenerallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("pacientegeneralview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pacientegeneralview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "pacientegeneraladd.php?" . $this->getUrlParm($parm);
		else
			$url = "pacientegeneraladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pacientegeneraledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pacientegeneraladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pacientegeneraldelete.php", $this->getUrlParm());
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
		$this->id_paciente->setDbValue($rs->fields('id_paciente'));
		$this->expendiente->setDbValue($rs->fields('expendiente'));
		$this->tipo_doc->setDbValue($rs->fields('tipo_doc'));
		$this->num_doc->setDbValue($rs->fields('num_doc'));
		$this->nombre1->setDbValue($rs->fields('nombre1'));
		$this->nombre2->setDbValue($rs->fields('nombre2'));
		$this->apellido1->setDbValue($rs->fields('apellido1'));
		$this->apellido2->setDbValue($rs->fields('apellido2'));
		$this->genero->setDbValue($rs->fields('genero'));
		$this->edad->setDbValue($rs->fields('edad'));
		$this->fecha_nacido->setDbValue($rs->fields('fecha_nacido'));
		$this->cod_edad->setDbValue($rs->fields('cod_edad'));
		$this->telefono->setDbValue($rs->fields('telefono'));
		$this->celular->setDbValue($rs->fields('celular'));
		$this->direccion->setDbValue($rs->fields('direccion'));
		$this->_email->setDbValue($rs->fields('email'));
		$this->aseguradro->setDbValue($rs->fields('aseguradro'));
		$this->observacion->setDbValue($rs->fields('observacion'));
		$this->nss->setDbValue($rs->fields('nss'));
		$this->usu_sede->setDbValue($rs->fields('usu_sede'));
		$this->prehospitalario->setDbValue($rs->fields('prehospitalario'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// email
		$this->_email->ViewValue = $this->_email->CurrentValue;
		$this->_email->ViewCustomAttributes = "";

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

		// observacion
		$this->observacion->ViewValue = $this->observacion->CurrentValue;
		$this->observacion->ViewCustomAttributes = "";

		// nss
		$this->nss->ViewValue = $this->nss->CurrentValue;
		$this->nss->ViewCustomAttributes = "";

		// usu_sede
		$this->usu_sede->ViewValue = $this->usu_sede->CurrentValue;
		$this->usu_sede->ViewCustomAttributes = "";

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

		// email
		$this->_email->LinkCustomAttributes = "";
		$this->_email->HrefValue = "";
		$this->_email->TooltipValue = "";

		// aseguradro
		$this->aseguradro->LinkCustomAttributes = "";
		$this->aseguradro->HrefValue = "";
		$this->aseguradro->TooltipValue = "";

		// observacion
		$this->observacion->LinkCustomAttributes = "";
		$this->observacion->HrefValue = "";
		$this->observacion->TooltipValue = "";

		// nss
		$this->nss->LinkCustomAttributes = "";
		$this->nss->HrefValue = "";
		$this->nss->TooltipValue = "";

		// usu_sede
		$this->usu_sede->LinkCustomAttributes = "";
		$this->usu_sede->HrefValue = "";
		$this->usu_sede->TooltipValue = "";

		// prehospitalario
		$this->prehospitalario->LinkCustomAttributes = "";
		$this->prehospitalario->HrefValue = "";
		$this->prehospitalario->TooltipValue = "";

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
		$this->cod_casointerh->PlaceHolder = RemoveHtml($this->cod_casointerh->caption());

		// id_paciente
		$this->id_paciente->EditAttrs["class"] = "form-control";
		$this->id_paciente->EditCustomAttributes = "";
		$this->id_paciente->EditValue = $this->id_paciente->CurrentValue;
		$this->id_paciente->PlaceHolder = RemoveHtml($this->id_paciente->caption());

		// expendiente
		$this->expendiente->EditAttrs["class"] = "form-control";
		$this->expendiente->EditCustomAttributes = "";
		if (!$this->expendiente->Raw)
			$this->expendiente->CurrentValue = HtmlDecode($this->expendiente->CurrentValue);
		$this->expendiente->EditValue = $this->expendiente->CurrentValue;
		$this->expendiente->PlaceHolder = RemoveHtml($this->expendiente->caption());

		// tipo_doc
		$this->tipo_doc->EditAttrs["class"] = "form-control";
		$this->tipo_doc->EditCustomAttributes = "";

		// num_doc
		$this->num_doc->EditAttrs["class"] = "form-control";
		$this->num_doc->EditCustomAttributes = "";
		if (!$this->num_doc->Raw)
			$this->num_doc->CurrentValue = HtmlDecode($this->num_doc->CurrentValue);
		$this->num_doc->EditValue = $this->num_doc->CurrentValue;
		$this->num_doc->PlaceHolder = RemoveHtml($this->num_doc->caption());

		// nombre1
		$this->nombre1->EditAttrs["class"] = "form-control";
		$this->nombre1->EditCustomAttributes = "";
		if (!$this->nombre1->Raw)
			$this->nombre1->CurrentValue = HtmlDecode($this->nombre1->CurrentValue);
		$this->nombre1->EditValue = $this->nombre1->CurrentValue;
		$this->nombre1->PlaceHolder = RemoveHtml($this->nombre1->caption());

		// nombre2
		$this->nombre2->EditAttrs["class"] = "form-control";
		$this->nombre2->EditCustomAttributes = "";
		if (!$this->nombre2->Raw)
			$this->nombre2->CurrentValue = HtmlDecode($this->nombre2->CurrentValue);
		$this->nombre2->EditValue = $this->nombre2->CurrentValue;
		$this->nombre2->PlaceHolder = RemoveHtml($this->nombre2->caption());

		// apellido1
		$this->apellido1->EditAttrs["class"] = "form-control";
		$this->apellido1->EditCustomAttributes = "";
		if (!$this->apellido1->Raw)
			$this->apellido1->CurrentValue = HtmlDecode($this->apellido1->CurrentValue);
		$this->apellido1->EditValue = $this->apellido1->CurrentValue;
		$this->apellido1->PlaceHolder = RemoveHtml($this->apellido1->caption());

		// apellido2
		$this->apellido2->EditAttrs["class"] = "form-control";
		$this->apellido2->EditCustomAttributes = "";
		if (!$this->apellido2->Raw)
			$this->apellido2->CurrentValue = HtmlDecode($this->apellido2->CurrentValue);
		$this->apellido2->EditValue = $this->apellido2->CurrentValue;
		$this->apellido2->PlaceHolder = RemoveHtml($this->apellido2->caption());

		// genero
		$this->genero->EditCustomAttributes = "";

		// edad
		$this->edad->EditAttrs["class"] = "form-control";
		$this->edad->EditCustomAttributes = "";
		$this->edad->EditValue = $this->edad->CurrentValue;
		$this->edad->PlaceHolder = RemoveHtml($this->edad->caption());

		// fecha_nacido
		$this->fecha_nacido->EditAttrs["class"] = "form-control";
		$this->fecha_nacido->EditCustomAttributes = "";
		if (!$this->fecha_nacido->Raw)
			$this->fecha_nacido->CurrentValue = HtmlDecode($this->fecha_nacido->CurrentValue);
		$this->fecha_nacido->EditValue = $this->fecha_nacido->CurrentValue;
		$this->fecha_nacido->PlaceHolder = RemoveHtml($this->fecha_nacido->caption());

		// cod_edad
		$this->cod_edad->EditAttrs["class"] = "form-control";
		$this->cod_edad->EditCustomAttributes = "";

		// telefono
		$this->telefono->EditAttrs["class"] = "form-control";
		$this->telefono->EditCustomAttributes = "";
		if (!$this->telefono->Raw)
			$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
		$this->telefono->EditValue = $this->telefono->CurrentValue;
		$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

		// celular
		$this->celular->EditAttrs["class"] = "form-control";
		$this->celular->EditCustomAttributes = "";
		if (!$this->celular->Raw)
			$this->celular->CurrentValue = HtmlDecode($this->celular->CurrentValue);
		$this->celular->EditValue = $this->celular->CurrentValue;
		$this->celular->PlaceHolder = RemoveHtml($this->celular->caption());

		// direccion
		$this->direccion->EditAttrs["class"] = "form-control";
		$this->direccion->EditCustomAttributes = "";
		if (!$this->direccion->Raw)
			$this->direccion->CurrentValue = HtmlDecode($this->direccion->CurrentValue);
		$this->direccion->EditValue = $this->direccion->CurrentValue;
		$this->direccion->PlaceHolder = RemoveHtml($this->direccion->caption());

		// email
		$this->_email->EditAttrs["class"] = "form-control";
		$this->_email->EditCustomAttributes = "";
		$this->_email->EditValue = $this->_email->CurrentValue;
		$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

		// aseguradro
		$this->aseguradro->EditAttrs["class"] = "form-control";
		$this->aseguradro->EditCustomAttributes = "";

		// observacion
		$this->observacion->EditAttrs["class"] = "form-control";
		$this->observacion->EditCustomAttributes = "";
		$this->observacion->EditValue = $this->observacion->CurrentValue;
		$this->observacion->PlaceHolder = RemoveHtml($this->observacion->caption());

		// nss
		$this->nss->EditAttrs["class"] = "form-control";
		$this->nss->EditCustomAttributes = "";
		if (!$this->nss->Raw)
			$this->nss->CurrentValue = HtmlDecode($this->nss->CurrentValue);
		$this->nss->EditValue = $this->nss->CurrentValue;
		$this->nss->PlaceHolder = RemoveHtml($this->nss->caption());

		// usu_sede
		$this->usu_sede->EditAttrs["class"] = "form-control";
		$this->usu_sede->EditCustomAttributes = "";
		if (!$this->usu_sede->Raw)
			$this->usu_sede->CurrentValue = HtmlDecode($this->usu_sede->CurrentValue);
		$this->usu_sede->EditValue = $this->usu_sede->CurrentValue;
		$this->usu_sede->PlaceHolder = RemoveHtml($this->usu_sede->caption());

		// prehospitalario
		$this->prehospitalario->EditAttrs["class"] = "form-control";
		$this->prehospitalario->EditCustomAttributes = "";
		if (!$this->prehospitalario->Raw)
			$this->prehospitalario->CurrentValue = HtmlDecode($this->prehospitalario->CurrentValue);
		$this->prehospitalario->EditValue = $this->prehospitalario->CurrentValue;
		$this->prehospitalario->PlaceHolder = RemoveHtml($this->prehospitalario->caption());

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
					$doc->exportCaption($this->id_paciente);
					$doc->exportCaption($this->expendiente);
					$doc->exportCaption($this->tipo_doc);
					$doc->exportCaption($this->num_doc);
					$doc->exportCaption($this->nombre1);
					$doc->exportCaption($this->nombre2);
					$doc->exportCaption($this->apellido1);
					$doc->exportCaption($this->apellido2);
					$doc->exportCaption($this->genero);
					$doc->exportCaption($this->edad);
					$doc->exportCaption($this->fecha_nacido);
					$doc->exportCaption($this->cod_edad);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->celular);
					$doc->exportCaption($this->direccion);
					$doc->exportCaption($this->aseguradro);
					$doc->exportCaption($this->observacion);
					$doc->exportCaption($this->nss);
					$doc->exportCaption($this->prehospitalario);
				} else {
					$doc->exportCaption($this->cod_casointerh);
					$doc->exportCaption($this->id_paciente);
					$doc->exportCaption($this->expendiente);
					$doc->exportCaption($this->tipo_doc);
					$doc->exportCaption($this->num_doc);
					$doc->exportCaption($this->nombre1);
					$doc->exportCaption($this->nombre2);
					$doc->exportCaption($this->apellido1);
					$doc->exportCaption($this->apellido2);
					$doc->exportCaption($this->genero);
					$doc->exportCaption($this->edad);
					$doc->exportCaption($this->fecha_nacido);
					$doc->exportCaption($this->cod_edad);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->celular);
					$doc->exportCaption($this->direccion);
					$doc->exportCaption($this->aseguradro);
					$doc->exportCaption($this->nss);
					$doc->exportCaption($this->prehospitalario);
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
						$doc->exportField($this->id_paciente);
						$doc->exportField($this->expendiente);
						$doc->exportField($this->tipo_doc);
						$doc->exportField($this->num_doc);
						$doc->exportField($this->nombre1);
						$doc->exportField($this->nombre2);
						$doc->exportField($this->apellido1);
						$doc->exportField($this->apellido2);
						$doc->exportField($this->genero);
						$doc->exportField($this->edad);
						$doc->exportField($this->fecha_nacido);
						$doc->exportField($this->cod_edad);
						$doc->exportField($this->telefono);
						$doc->exportField($this->celular);
						$doc->exportField($this->direccion);
						$doc->exportField($this->aseguradro);
						$doc->exportField($this->observacion);
						$doc->exportField($this->nss);
						$doc->exportField($this->prehospitalario);
					} else {
						$doc->exportField($this->cod_casointerh);
						$doc->exportField($this->id_paciente);
						$doc->exportField($this->expendiente);
						$doc->exportField($this->tipo_doc);
						$doc->exportField($this->num_doc);
						$doc->exportField($this->nombre1);
						$doc->exportField($this->nombre2);
						$doc->exportField($this->apellido1);
						$doc->exportField($this->apellido2);
						$doc->exportField($this->genero);
						$doc->exportField($this->edad);
						$doc->exportField($this->fecha_nacido);
						$doc->exportField($this->cod_edad);
						$doc->exportField($this->telefono);
						$doc->exportField($this->celular);
						$doc->exportField($this->direccion);
						$doc->exportField($this->aseguradro);
						$doc->exportField($this->nss);
						$doc->exportField($this->prehospitalario);
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

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>