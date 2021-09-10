<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for hospitalesgeneral
 */
class hospitalesgeneral extends DbTable
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
	public $id_hospital;
	public $nombre_hospital;
	public $depto_hospital;
	public $provincia_hospital;
	public $municipio_hospital;
	public $nivel_hospital;
	public $redservicions_hospital;
	public $sector_hospital;
	public $tipo_hospital;
	public $camashab_cali;
	public $especialidad;
	public $latitud_hospital;
	public $longitud_hospital;
	public $icon_hospital;
	public $codpolitico;
	public $direccion;
	public $telefono;
	public $nombre_responsable;
	public $estado;
	public $emt;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'hospitalesgeneral';
		$this->TableName = 'hospitalesgeneral';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"hospitalesgeneral\"";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id_hospital
		$this->id_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_id_hospital', 'id_hospital', '"id_hospital"', '"id_hospital"', 200, 16, -1, FALSE, '"id_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_hospital->IsPrimaryKey = TRUE; // Primary key field
		$this->id_hospital->IsForeignKey = TRUE; // Foreign key field
		$this->id_hospital->Nullable = FALSE; // NOT NULL field
		$this->id_hospital->Required = TRUE; // Required field
		$this->id_hospital->Sortable = TRUE; // Allow sort
		$this->fields['id_hospital'] = &$this->id_hospital;

		// nombre_hospital
		$this->nombre_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_nombre_hospital', 'nombre_hospital', '"nombre_hospital"', '"nombre_hospital"', 200, 100, -1, FALSE, '"nombre_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_hospital->Sortable = TRUE; // Allow sort
		$this->fields['nombre_hospital'] = &$this->nombre_hospital;

		// depto_hospital
		$this->depto_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_depto_hospital', 'depto_hospital', '"depto_hospital"', '"depto_hospital"', 200, 25, -1, FALSE, '"depto_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->depto_hospital->Sortable = TRUE; // Allow sort
		$this->depto_hospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->depto_hospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital"], [], [], [], [], '', '');
				break;
			case "fr":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital"], [], [], [], [], '', '');
				break;
			case "pt":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital"], [], [], [], [], '', '');
				break;
			case "es":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital"], [], [], [], [], '', '');
				break;
			default:
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital"], [], [], [], [], '', '');
				break;
		}
		$this->fields['depto_hospital'] = &$this->depto_hospital;

		// provincia_hospital
		$this->provincia_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_provincia_hospital', 'provincia_hospital', '"provincia_hospital"', '"provincia_hospital"', 200, 100, -1, FALSE, '"provincia_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->provincia_hospital->Sortable = TRUE; // Allow sort
		$this->provincia_hospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->provincia_hospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			case "fr":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			case "pt":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			case "es":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			default:
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
		}
		$this->fields['provincia_hospital'] = &$this->provincia_hospital;

		// municipio_hospital
		$this->municipio_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_municipio_hospital', 'municipio_hospital', '"municipio_hospital"', '"municipio_hospital"', 200, 100, -1, FALSE, '"municipio_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->municipio_hospital->Sortable = TRUE; // Allow sort
		$this->municipio_hospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->municipio_hospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_provincia_hospital"], [], ["cod_provincia"], ["x_cod_provincia"], [], [], '', '');
				break;
			case "fr":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_provincia_hospital"], [], ["cod_provincia"], ["x_cod_provincia"], [], [], '', '');
				break;
			case "pt":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_provincia_hospital"], [], ["cod_provincia"], ["x_cod_provincia"], [], [], '', '');
				break;
			case "es":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_provincia_hospital"], [], ["cod_provincia"], ["x_cod_provincia"], [], [], '', '');
				break;
			default:
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_provincia_hospital"], [], ["cod_provincia"], ["x_cod_provincia"], [], [], '', '');
				break;
		}
		$this->fields['municipio_hospital'] = &$this->municipio_hospital;

		// nivel_hospital
		$this->nivel_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_nivel_hospital', 'nivel_hospital', '"nivel_hospital"', '"nivel_hospital"', 200, 100, -1, FALSE, '"nivel_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nivel_hospital->Sortable = TRUE; // Allow sort
		$this->fields['nivel_hospital'] = &$this->nivel_hospital;

		// redservicions_hospital
		$this->redservicions_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_redservicions_hospital', 'redservicions_hospital', '"redservicions_hospital"', '"redservicions_hospital"', 200, 100, -1, FALSE, '"redservicions_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->redservicions_hospital->Sortable = TRUE; // Allow sort
		$this->fields['redservicions_hospital'] = &$this->redservicions_hospital;

		// sector_hospital
		$this->sector_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_sector_hospital', 'sector_hospital', '"sector_hospital"', '"sector_hospital"', 200, 100, -1, FALSE, '"sector_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sector_hospital->Sortable = TRUE; // Allow sort
		$this->fields['sector_hospital'] = &$this->sector_hospital;

		// tipo_hospital
		$this->tipo_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_tipo_hospital', 'tipo_hospital', '"tipo_hospital"', '"tipo_hospital"', 200, 100, -1, FALSE, '"tipo_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_hospital->Sortable = TRUE; // Allow sort
		$this->fields['tipo_hospital'] = &$this->tipo_hospital;

		// camashab_cali
		$this->camashab_cali = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_camashab_cali', 'camashab_cali', '"camashab_cali"', '"camashab_cali"', 200, 5, -1, FALSE, '"camashab_cali"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->camashab_cali->Sortable = TRUE; // Allow sort
		$this->fields['camashab_cali'] = &$this->camashab_cali;

		// especialidad
		$this->especialidad = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_especialidad', 'especialidad', '"especialidad"', 'CAST("especialidad" AS varchar(255))', 2, 2, -1, FALSE, '"especialidad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->especialidad->Sortable = TRUE; // Allow sort
		$this->especialidad->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->especialidad->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->especialidad->Lookup = new Lookup('especialidad', 'especialidad_hospital', FALSE, 'id_especialidad', ["especialidad_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->especialidad->Lookup = new Lookup('especialidad', 'especialidad_hospital', FALSE, 'id_especialidad', ["especialidad_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->especialidad->Lookup = new Lookup('especialidad', 'especialidad_hospital', FALSE, 'id_especialidad', ["especialidad_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->especialidad->Lookup = new Lookup('especialidad', 'especialidad_hospital', FALSE, 'id_especialidad', ["especialidad_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->especialidad->Lookup = new Lookup('especialidad', 'especialidad_hospital', FALSE, 'id_especialidad', ["especialidad_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->especialidad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['especialidad'] = &$this->especialidad;

		// latitud_hospital
		$this->latitud_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_latitud_hospital', 'latitud_hospital', '"latitud_hospital"', '"latitud_hospital"', 200, 30, -1, FALSE, '"latitud_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->latitud_hospital->Sortable = TRUE; // Allow sort
		$this->fields['latitud_hospital'] = &$this->latitud_hospital;

		// longitud_hospital
		$this->longitud_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_longitud_hospital', 'longitud_hospital', '"longitud_hospital"', '"longitud_hospital"', 200, 30, -1, FALSE, '"longitud_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->longitud_hospital->Sortable = TRUE; // Allow sort
		$this->fields['longitud_hospital'] = &$this->longitud_hospital;

		// icon_hospital
		$this->icon_hospital = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_icon_hospital', 'icon_hospital', '"icon_hospital"', '"icon_hospital"', 200, 20, -1, TRUE, '"icon_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->icon_hospital->Sortable = TRUE; // Allow sort
		$this->fields['icon_hospital'] = &$this->icon_hospital;

		// codpolitico
		$this->codpolitico = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_codpolitico', 'codpolitico', '"codpolitico"', '"codpolitico"', 200, 10, -1, FALSE, '"codpolitico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->codpolitico->Sortable = TRUE; // Allow sort
		$this->fields['codpolitico'] = &$this->codpolitico;

		// direccion
		$this->direccion = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_direccion', 'direccion', '"direccion"', '"direccion"', 201, 0, -1, FALSE, '"direccion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->direccion->Sortable = TRUE; // Allow sort
		$this->fields['direccion'] = &$this->direccion;

		// telefono
		$this->telefono = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_telefono', 'telefono', '"telefono"', '"telefono"', 200, 30, -1, FALSE, '"telefono"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono->Sortable = TRUE; // Allow sort
		$this->fields['telefono'] = &$this->telefono;

		// nombre_responsable
		$this->nombre_responsable = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_nombre_responsable', 'nombre_responsable', '"nombre_responsable"', '"nombre_responsable"', 200, 100, -1, FALSE, '"nombre_responsable"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_responsable->Sortable = TRUE; // Allow sort
		$this->fields['nombre_responsable'] = &$this->nombre_responsable;

		// estado
		$this->estado = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_estado', 'estado', '"estado"', 'CAST("estado" AS varchar(255))', 11, 1, -1, FALSE, '"estado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->estado->Sortable = TRUE; // Allow sort
		$this->estado->DataType = DATATYPE_BOOLEAN;
		switch ($CurrentLanguage) {
			case "en":
				$this->estado->Lookup = new Lookup('estado', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->estado->Lookup = new Lookup('estado', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->estado->Lookup = new Lookup('estado', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->estado->Lookup = new Lookup('estado', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->estado->Lookup = new Lookup('estado', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->estado->OptionCount = 2;
		$this->estado->DefaultErrorMessage = $Language->phrase("IncorrectField");
		$this->fields['estado'] = &$this->estado;

		// emt
		$this->emt = new DbField('hospitalesgeneral', 'hospitalesgeneral', 'x_emt', 'emt', '"emt"', 'CAST("emt" AS varchar(255))', 11, 1, -1, FALSE, '"emt"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->emt->Sortable = TRUE; // Allow sort
		$this->emt->DataType = DATATYPE_BOOLEAN;
		switch ($CurrentLanguage) {
			case "en":
				$this->emt->Lookup = new Lookup('emt', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->emt->Lookup = new Lookup('emt', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->emt->Lookup = new Lookup('emt', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->emt->Lookup = new Lookup('emt', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->emt->Lookup = new Lookup('emt', 'hospitalesgeneral', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->emt->OptionCount = 2;
		$this->emt->DefaultErrorMessage = $Language->phrase("IncorrectField");
		$this->fields['emt'] = &$this->emt;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "camas_hospital") {
			$detailUrl = $GLOBALS["camas_hospital"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id_hospital=" . urlencode($this->id_hospital->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "hospitalesgenerallist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"hospitalesgeneral\"";
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

		// Cascade Update detail table 'camas_hospital'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id_hospital']) && $rsold['id_hospital'] != $rs['id_hospital'])) { // Update detail field 'id_hospital'
			$cascadeUpdate = TRUE;
			$rscascade['id_hospital'] = $rs['id_hospital'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["camas_hospital"]))
				$GLOBALS["camas_hospital"] = new camas_hospital();
			$rswrk = $GLOBALS["camas_hospital"]->loadRs("\"id_hospital\" = " . QuotedValue($rsold['id_hospital'], DATATYPE_STRING, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id_hospital';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["camas_hospital"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["camas_hospital"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["camas_hospital"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
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
			if (array_key_exists('id_hospital', $rs))
				AddFilter($where, QuotedName('id_hospital', $this->Dbid) . '=' . QuotedValue($rs['id_hospital'], $this->id_hospital->DataType, $this->Dbid));
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

		// Cascade delete detail table 'camas_hospital'
		if (!isset($GLOBALS["camas_hospital"]))
			$GLOBALS["camas_hospital"] = new camas_hospital();
		$rscascade = $GLOBALS["camas_hospital"]->loadRs("\"id_hospital\" = " . QuotedValue($rs['id_hospital'], DATATYPE_STRING, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["camas_hospital"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["camas_hospital"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["camas_hospital"]->Row_Deleted($dtlrow);
		}
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
		$this->id_hospital->DbValue = $row['id_hospital'];
		$this->nombre_hospital->DbValue = $row['nombre_hospital'];
		$this->depto_hospital->DbValue = $row['depto_hospital'];
		$this->provincia_hospital->DbValue = $row['provincia_hospital'];
		$this->municipio_hospital->DbValue = $row['municipio_hospital'];
		$this->nivel_hospital->DbValue = $row['nivel_hospital'];
		$this->redservicions_hospital->DbValue = $row['redservicions_hospital'];
		$this->sector_hospital->DbValue = $row['sector_hospital'];
		$this->tipo_hospital->DbValue = $row['tipo_hospital'];
		$this->camashab_cali->DbValue = $row['camashab_cali'];
		$this->especialidad->DbValue = $row['especialidad'];
		$this->latitud_hospital->DbValue = $row['latitud_hospital'];
		$this->longitud_hospital->DbValue = $row['longitud_hospital'];
		$this->icon_hospital->Upload->DbValue = $row['icon_hospital'];
		$this->codpolitico->DbValue = $row['codpolitico'];
		$this->direccion->DbValue = $row['direccion'];
		$this->telefono->DbValue = $row['telefono'];
		$this->nombre_responsable->DbValue = $row['nombre_responsable'];
		$this->estado->DbValue = (ConvertToBool($row['estado']) ? "1" : "0");
		$this->emt->DbValue = (ConvertToBool($row['emt']) ? "1" : "0");
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['icon_hospital']) ? [] : [$row['icon_hospital']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->icon_hospital->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->icon_hospital->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_hospital\" = '@id_hospital@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_hospital', $row) ? $row['id_hospital'] : NULL;
		else
			$val = $this->id_hospital->OldValue !== NULL ? $this->id_hospital->OldValue : $this->id_hospital->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_hospital@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "hospitalesgenerallist.php";
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
		if ($pageName == "hospitalesgeneralview.php")
			return $Language->phrase("View");
		elseif ($pageName == "hospitalesgeneraledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "hospitalesgeneraladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "hospitalesgenerallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("hospitalesgeneralview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("hospitalesgeneralview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "hospitalesgeneraladd.php?" . $this->getUrlParm($parm);
		else
			$url = "hospitalesgeneraladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("hospitalesgeneraledit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("hospitalesgeneraledit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("hospitalesgeneraladd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("hospitalesgeneraladd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("hospitalesgeneraldelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_hospital:" . JsonEncode($this->id_hospital->CurrentValue, "string");
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
		if ($this->id_hospital->CurrentValue != NULL) {
			$url .= "id_hospital=" . urlencode($this->id_hospital->CurrentValue);
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
			if (Param("id_hospital") !== NULL)
				$arKeys[] = Param("id_hospital");
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
				$this->id_hospital->CurrentValue = $key;
			else
				$this->id_hospital->OldValue = $key;
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
		$this->id_hospital->setDbValue($rs->fields('id_hospital'));
		$this->nombre_hospital->setDbValue($rs->fields('nombre_hospital'));
		$this->depto_hospital->setDbValue($rs->fields('depto_hospital'));
		$this->provincia_hospital->setDbValue($rs->fields('provincia_hospital'));
		$this->municipio_hospital->setDbValue($rs->fields('municipio_hospital'));
		$this->nivel_hospital->setDbValue($rs->fields('nivel_hospital'));
		$this->redservicions_hospital->setDbValue($rs->fields('redservicions_hospital'));
		$this->sector_hospital->setDbValue($rs->fields('sector_hospital'));
		$this->tipo_hospital->setDbValue($rs->fields('tipo_hospital'));
		$this->camashab_cali->setDbValue($rs->fields('camashab_cali'));
		$this->especialidad->setDbValue($rs->fields('especialidad'));
		$this->latitud_hospital->setDbValue($rs->fields('latitud_hospital'));
		$this->longitud_hospital->setDbValue($rs->fields('longitud_hospital'));
		$this->icon_hospital->Upload->DbValue = $rs->fields('icon_hospital');
		$this->codpolitico->setDbValue($rs->fields('codpolitico'));
		$this->direccion->setDbValue($rs->fields('direccion'));
		$this->telefono->setDbValue($rs->fields('telefono'));
		$this->nombre_responsable->setDbValue($rs->fields('nombre_responsable'));
		$this->estado->setDbValue(ConvertToBool($rs->fields('estado')) ? "1" : "0");
		$this->emt->setDbValue(ConvertToBool($rs->fields('emt')) ? "1" : "0");
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_hospital
		// nombre_hospital
		// depto_hospital
		// provincia_hospital
		// municipio_hospital
		// nivel_hospital
		// redservicions_hospital
		// sector_hospital
		// tipo_hospital
		// camashab_cali
		// especialidad
		// latitud_hospital
		// longitud_hospital
		// icon_hospital
		// codpolitico
		// direccion
		// telefono
		// nombre_responsable
		// estado
		// emt
		// id_hospital

		$this->id_hospital->ViewValue = $this->id_hospital->CurrentValue;
		$this->id_hospital->ViewCustomAttributes = "";

		// nombre_hospital
		$this->nombre_hospital->ViewValue = $this->nombre_hospital->CurrentValue;
		$this->nombre_hospital->ViewCustomAttributes = "";

		// depto_hospital
		$curVal = strval($this->depto_hospital->CurrentValue);
		if ($curVal != "") {
			$this->depto_hospital->ViewValue = $this->depto_hospital->lookupCacheOption($curVal);
			if ($this->depto_hospital->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"cod_dpto\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->depto_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->depto_hospital->ViewValue = $this->depto_hospital->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->depto_hospital->ViewValue = $this->depto_hospital->CurrentValue;
				}
			}
		} else {
			$this->depto_hospital->ViewValue = NULL;
		}
		$this->depto_hospital->ViewCustomAttributes = "";

		// provincia_hospital
		$curVal = strval($this->provincia_hospital->CurrentValue);
		if ($curVal != "") {
			$this->provincia_hospital->ViewValue = $this->provincia_hospital->lookupCacheOption($curVal);
			if ($this->provincia_hospital->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"cod_provincia\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->provincia_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->provincia_hospital->ViewValue = $this->provincia_hospital->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->provincia_hospital->ViewValue = $this->provincia_hospital->CurrentValue;
				}
			}
		} else {
			$this->provincia_hospital->ViewValue = NULL;
		}
		$this->provincia_hospital->ViewCustomAttributes = "";

		// municipio_hospital
		$curVal = strval($this->municipio_hospital->CurrentValue);
		if ($curVal != "") {
			$this->municipio_hospital->ViewValue = $this->municipio_hospital->lookupCacheOption($curVal);
			if ($this->municipio_hospital->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"cod_distrito\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->municipio_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->municipio_hospital->ViewValue = $this->municipio_hospital->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->municipio_hospital->ViewValue = $this->municipio_hospital->CurrentValue;
				}
			}
		} else {
			$this->municipio_hospital->ViewValue = NULL;
		}
		$this->municipio_hospital->ViewCustomAttributes = "";

		// nivel_hospital
		$this->nivel_hospital->ViewValue = $this->nivel_hospital->CurrentValue;
		$this->nivel_hospital->ViewCustomAttributes = "";

		// redservicions_hospital
		$this->redservicions_hospital->ViewValue = $this->redservicions_hospital->CurrentValue;
		$this->redservicions_hospital->ViewCustomAttributes = "";

		// sector_hospital
		$this->sector_hospital->ViewValue = $this->sector_hospital->CurrentValue;
		$this->sector_hospital->ViewCustomAttributes = "";

		// tipo_hospital
		$this->tipo_hospital->ViewValue = $this->tipo_hospital->CurrentValue;
		$this->tipo_hospital->ViewCustomAttributes = "";

		// camashab_cali
		$this->camashab_cali->ViewValue = $this->camashab_cali->CurrentValue;
		$this->camashab_cali->ViewCustomAttributes = "";

		// especialidad
		$curVal = strval($this->especialidad->CurrentValue);
		if ($curVal != "") {
			$this->especialidad->ViewValue = $this->especialidad->lookupCacheOption($curVal);
			if ($this->especialidad->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"id_especialidad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->especialidad->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->especialidad->ViewValue = $this->especialidad->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->especialidad->ViewValue = $this->especialidad->CurrentValue;
				}
			}
		} else {
			$this->especialidad->ViewValue = NULL;
		}
		$this->especialidad->ViewCustomAttributes = "";

		// latitud_hospital
		$this->latitud_hospital->ViewValue = $this->latitud_hospital->CurrentValue;
		$this->latitud_hospital->ViewCustomAttributes = "";

		// longitud_hospital
		$this->longitud_hospital->ViewValue = $this->longitud_hospital->CurrentValue;
		$this->longitud_hospital->ViewCustomAttributes = "";

		// icon_hospital
		if (!EmptyValue($this->icon_hospital->Upload->DbValue)) {
			$this->icon_hospital->ViewValue = $this->icon_hospital->Upload->DbValue;
		} else {
			$this->icon_hospital->ViewValue = "";
		}
		$this->icon_hospital->ViewCustomAttributes = "";

		// codpolitico
		$this->codpolitico->ViewValue = $this->codpolitico->CurrentValue;
		$this->codpolitico->ViewCustomAttributes = "";

		// direccion
		$this->direccion->ViewValue = $this->direccion->CurrentValue;
		$this->direccion->ViewCustomAttributes = "";

		// telefono
		$this->telefono->ViewValue = $this->telefono->CurrentValue;
		$this->telefono->ViewCustomAttributes = "";

		// nombre_responsable
		$this->nombre_responsable->ViewValue = $this->nombre_responsable->CurrentValue;
		$this->nombre_responsable->ViewCustomAttributes = "";

		// estado
		if (ConvertToBool($this->estado->CurrentValue)) {
			$this->estado->ViewValue = $this->estado->tagCaption(1) != "" ? $this->estado->tagCaption(1) : "Yes";
		} else {
			$this->estado->ViewValue = $this->estado->tagCaption(2) != "" ? $this->estado->tagCaption(2) : "No";
		}
		$this->estado->ViewCustomAttributes = "";

		// emt
		if (ConvertToBool($this->emt->CurrentValue)) {
			$this->emt->ViewValue = $this->emt->tagCaption(1) != "" ? $this->emt->tagCaption(1) : "Yes";
		} else {
			$this->emt->ViewValue = $this->emt->tagCaption(2) != "" ? $this->emt->tagCaption(2) : "No";
		}
		$this->emt->ViewCustomAttributes = "";

		// id_hospital
		$this->id_hospital->LinkCustomAttributes = "";
		$this->id_hospital->HrefValue = "";
		$this->id_hospital->TooltipValue = "";

		// nombre_hospital
		$this->nombre_hospital->LinkCustomAttributes = "";
		$this->nombre_hospital->HrefValue = "";
		$this->nombre_hospital->TooltipValue = "";

		// depto_hospital
		$this->depto_hospital->LinkCustomAttributes = "";
		$this->depto_hospital->HrefValue = "";
		$this->depto_hospital->TooltipValue = "";

		// provincia_hospital
		$this->provincia_hospital->LinkCustomAttributes = "";
		$this->provincia_hospital->HrefValue = "";
		$this->provincia_hospital->TooltipValue = "";

		// municipio_hospital
		$this->municipio_hospital->LinkCustomAttributes = "";
		$this->municipio_hospital->HrefValue = "";
		$this->municipio_hospital->TooltipValue = "";

		// nivel_hospital
		$this->nivel_hospital->LinkCustomAttributes = "";
		$this->nivel_hospital->HrefValue = "";
		$this->nivel_hospital->TooltipValue = "";

		// redservicions_hospital
		$this->redservicions_hospital->LinkCustomAttributes = "";
		$this->redservicions_hospital->HrefValue = "";
		$this->redservicions_hospital->TooltipValue = "";

		// sector_hospital
		$this->sector_hospital->LinkCustomAttributes = "";
		$this->sector_hospital->HrefValue = "";
		$this->sector_hospital->TooltipValue = "";

		// tipo_hospital
		$this->tipo_hospital->LinkCustomAttributes = "";
		$this->tipo_hospital->HrefValue = "";
		$this->tipo_hospital->TooltipValue = "";

		// camashab_cali
		$this->camashab_cali->LinkCustomAttributes = "";
		$this->camashab_cali->HrefValue = "";
		$this->camashab_cali->TooltipValue = "";

		// especialidad
		$this->especialidad->LinkCustomAttributes = "";
		$this->especialidad->HrefValue = "";
		$this->especialidad->TooltipValue = "";

		// latitud_hospital
		$this->latitud_hospital->LinkCustomAttributes = "";
		$this->latitud_hospital->HrefValue = "";
		$this->latitud_hospital->TooltipValue = "";

		// longitud_hospital
		$this->longitud_hospital->LinkCustomAttributes = "";
		$this->longitud_hospital->HrefValue = "";
		$this->longitud_hospital->TooltipValue = "";

		// icon_hospital
		$this->icon_hospital->LinkCustomAttributes = "";
		$this->icon_hospital->HrefValue = "";
		$this->icon_hospital->ExportHrefValue = $this->icon_hospital->UploadPath . $this->icon_hospital->Upload->DbValue;
		$this->icon_hospital->TooltipValue = "";

		// codpolitico
		$this->codpolitico->LinkCustomAttributes = "";
		$this->codpolitico->HrefValue = "";
		$this->codpolitico->TooltipValue = "";

		// direccion
		$this->direccion->LinkCustomAttributes = "";
		$this->direccion->HrefValue = "";
		$this->direccion->TooltipValue = "";

		// telefono
		$this->telefono->LinkCustomAttributes = "";
		$this->telefono->HrefValue = "";
		$this->telefono->TooltipValue = "";

		// nombre_responsable
		$this->nombre_responsable->LinkCustomAttributes = "";
		$this->nombre_responsable->HrefValue = "";
		$this->nombre_responsable->TooltipValue = "";

		// estado
		$this->estado->LinkCustomAttributes = "";
		$this->estado->HrefValue = "";
		$this->estado->TooltipValue = "";

		// emt
		$this->emt->LinkCustomAttributes = "";
		$this->emt->HrefValue = "";
		$this->emt->TooltipValue = "";

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

		// id_hospital
		$this->id_hospital->EditAttrs["class"] = "form-control";
		$this->id_hospital->EditCustomAttributes = "";
		if (!$this->id_hospital->Raw)
			$this->id_hospital->CurrentValue = HtmlDecode($this->id_hospital->CurrentValue);
		$this->id_hospital->EditValue = $this->id_hospital->CurrentValue;
		$this->id_hospital->PlaceHolder = RemoveHtml($this->id_hospital->caption());

		// nombre_hospital
		$this->nombre_hospital->EditAttrs["class"] = "form-control";
		$this->nombre_hospital->EditCustomAttributes = "";
		if (!$this->nombre_hospital->Raw)
			$this->nombre_hospital->CurrentValue = HtmlDecode($this->nombre_hospital->CurrentValue);
		$this->nombre_hospital->EditValue = $this->nombre_hospital->CurrentValue;
		$this->nombre_hospital->PlaceHolder = RemoveHtml($this->nombre_hospital->caption());

		// depto_hospital
		$this->depto_hospital->EditAttrs["class"] = "form-control";
		$this->depto_hospital->EditCustomAttributes = "";

		// provincia_hospital
		$this->provincia_hospital->EditAttrs["class"] = "form-control";
		$this->provincia_hospital->EditCustomAttributes = "";

		// municipio_hospital
		$this->municipio_hospital->EditAttrs["class"] = "form-control";
		$this->municipio_hospital->EditCustomAttributes = "";

		// nivel_hospital
		$this->nivel_hospital->EditAttrs["class"] = "form-control";
		$this->nivel_hospital->EditCustomAttributes = "";
		if (!$this->nivel_hospital->Raw)
			$this->nivel_hospital->CurrentValue = HtmlDecode($this->nivel_hospital->CurrentValue);
		$this->nivel_hospital->EditValue = $this->nivel_hospital->CurrentValue;
		$this->nivel_hospital->PlaceHolder = RemoveHtml($this->nivel_hospital->caption());

		// redservicions_hospital
		$this->redservicions_hospital->EditAttrs["class"] = "form-control";
		$this->redservicions_hospital->EditCustomAttributes = "";
		if (!$this->redservicions_hospital->Raw)
			$this->redservicions_hospital->CurrentValue = HtmlDecode($this->redservicions_hospital->CurrentValue);
		$this->redservicions_hospital->EditValue = $this->redservicions_hospital->CurrentValue;
		$this->redservicions_hospital->PlaceHolder = RemoveHtml($this->redservicions_hospital->caption());

		// sector_hospital
		$this->sector_hospital->EditAttrs["class"] = "form-control";
		$this->sector_hospital->EditCustomAttributes = "";
		if (!$this->sector_hospital->Raw)
			$this->sector_hospital->CurrentValue = HtmlDecode($this->sector_hospital->CurrentValue);
		$this->sector_hospital->EditValue = $this->sector_hospital->CurrentValue;
		$this->sector_hospital->PlaceHolder = RemoveHtml($this->sector_hospital->caption());

		// tipo_hospital
		$this->tipo_hospital->EditAttrs["class"] = "form-control";
		$this->tipo_hospital->EditCustomAttributes = "";
		if (!$this->tipo_hospital->Raw)
			$this->tipo_hospital->CurrentValue = HtmlDecode($this->tipo_hospital->CurrentValue);
		$this->tipo_hospital->EditValue = $this->tipo_hospital->CurrentValue;
		$this->tipo_hospital->PlaceHolder = RemoveHtml($this->tipo_hospital->caption());

		// camashab_cali
		$this->camashab_cali->EditAttrs["class"] = "form-control";
		$this->camashab_cali->EditCustomAttributes = "";
		if (!$this->camashab_cali->Raw)
			$this->camashab_cali->CurrentValue = HtmlDecode($this->camashab_cali->CurrentValue);
		$this->camashab_cali->EditValue = $this->camashab_cali->CurrentValue;
		$this->camashab_cali->PlaceHolder = RemoveHtml($this->camashab_cali->caption());

		// especialidad
		$this->especialidad->EditAttrs["class"] = "form-control";
		$this->especialidad->EditCustomAttributes = "";

		// latitud_hospital
		$this->latitud_hospital->EditAttrs["class"] = "form-control";
		$this->latitud_hospital->EditCustomAttributes = "";
		if (!$this->latitud_hospital->Raw)
			$this->latitud_hospital->CurrentValue = HtmlDecode($this->latitud_hospital->CurrentValue);
		$this->latitud_hospital->EditValue = $this->latitud_hospital->CurrentValue;
		$this->latitud_hospital->PlaceHolder = RemoveHtml($this->latitud_hospital->caption());

		// longitud_hospital
		$this->longitud_hospital->EditAttrs["class"] = "form-control";
		$this->longitud_hospital->EditCustomAttributes = "";
		if (!$this->longitud_hospital->Raw)
			$this->longitud_hospital->CurrentValue = HtmlDecode($this->longitud_hospital->CurrentValue);
		$this->longitud_hospital->EditValue = $this->longitud_hospital->CurrentValue;
		$this->longitud_hospital->PlaceHolder = RemoveHtml($this->longitud_hospital->caption());

		// icon_hospital
		$this->icon_hospital->EditAttrs["class"] = "form-control";
		$this->icon_hospital->EditCustomAttributes = "";
		if (!EmptyValue($this->icon_hospital->Upload->DbValue)) {
			$this->icon_hospital->EditValue = $this->icon_hospital->Upload->DbValue;
		} else {
			$this->icon_hospital->EditValue = "";
		}
		if (!EmptyValue($this->icon_hospital->CurrentValue))
				$this->icon_hospital->Upload->FileName = $this->icon_hospital->CurrentValue;

		// codpolitico
		$this->codpolitico->EditAttrs["class"] = "form-control";
		$this->codpolitico->EditCustomAttributes = "";
		if (!$this->codpolitico->Raw)
			$this->codpolitico->CurrentValue = HtmlDecode($this->codpolitico->CurrentValue);
		$this->codpolitico->EditValue = $this->codpolitico->CurrentValue;
		$this->codpolitico->PlaceHolder = RemoveHtml($this->codpolitico->caption());

		// direccion
		$this->direccion->EditAttrs["class"] = "form-control";
		$this->direccion->EditCustomAttributes = "";
		$this->direccion->EditValue = $this->direccion->CurrentValue;
		$this->direccion->PlaceHolder = RemoveHtml($this->direccion->caption());

		// telefono
		$this->telefono->EditAttrs["class"] = "form-control";
		$this->telefono->EditCustomAttributes = "";
		if (!$this->telefono->Raw)
			$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
		$this->telefono->EditValue = $this->telefono->CurrentValue;
		$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

		// nombre_responsable
		$this->nombre_responsable->EditAttrs["class"] = "form-control";
		$this->nombre_responsable->EditCustomAttributes = "";
		if (!$this->nombre_responsable->Raw)
			$this->nombre_responsable->CurrentValue = HtmlDecode($this->nombre_responsable->CurrentValue);
		$this->nombre_responsable->EditValue = $this->nombre_responsable->CurrentValue;
		$this->nombre_responsable->PlaceHolder = RemoveHtml($this->nombre_responsable->caption());

		// estado
		$this->estado->EditCustomAttributes = "";
		$this->estado->EditValue = $this->estado->options(FALSE);

		// emt
		$this->emt->EditCustomAttributes = "";
		$this->emt->EditValue = $this->emt->options(FALSE);

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
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->nombre_hospital);
					$doc->exportCaption($this->depto_hospital);
					$doc->exportCaption($this->provincia_hospital);
					$doc->exportCaption($this->municipio_hospital);
					$doc->exportCaption($this->nivel_hospital);
					$doc->exportCaption($this->redservicions_hospital);
					$doc->exportCaption($this->sector_hospital);
					$doc->exportCaption($this->tipo_hospital);
					$doc->exportCaption($this->camashab_cali);
					$doc->exportCaption($this->especialidad);
					$doc->exportCaption($this->latitud_hospital);
					$doc->exportCaption($this->longitud_hospital);
					$doc->exportCaption($this->icon_hospital);
					$doc->exportCaption($this->codpolitico);
					$doc->exportCaption($this->direccion);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->nombre_responsable);
					$doc->exportCaption($this->estado);
					$doc->exportCaption($this->emt);
				} else {
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->nombre_hospital);
					$doc->exportCaption($this->depto_hospital);
					$doc->exportCaption($this->provincia_hospital);
					$doc->exportCaption($this->municipio_hospital);
					$doc->exportCaption($this->nivel_hospital);
					$doc->exportCaption($this->redservicions_hospital);
					$doc->exportCaption($this->sector_hospital);
					$doc->exportCaption($this->tipo_hospital);
					$doc->exportCaption($this->camashab_cali);
					$doc->exportCaption($this->especialidad);
					$doc->exportCaption($this->latitud_hospital);
					$doc->exportCaption($this->longitud_hospital);
					$doc->exportCaption($this->icon_hospital);
					$doc->exportCaption($this->codpolitico);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->nombre_responsable);
					$doc->exportCaption($this->estado);
					$doc->exportCaption($this->emt);
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
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->nombre_hospital);
						$doc->exportField($this->depto_hospital);
						$doc->exportField($this->provincia_hospital);
						$doc->exportField($this->municipio_hospital);
						$doc->exportField($this->nivel_hospital);
						$doc->exportField($this->redservicions_hospital);
						$doc->exportField($this->sector_hospital);
						$doc->exportField($this->tipo_hospital);
						$doc->exportField($this->camashab_cali);
						$doc->exportField($this->especialidad);
						$doc->exportField($this->latitud_hospital);
						$doc->exportField($this->longitud_hospital);
						$doc->exportField($this->icon_hospital);
						$doc->exportField($this->codpolitico);
						$doc->exportField($this->direccion);
						$doc->exportField($this->telefono);
						$doc->exportField($this->nombre_responsable);
						$doc->exportField($this->estado);
						$doc->exportField($this->emt);
					} else {
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->nombre_hospital);
						$doc->exportField($this->depto_hospital);
						$doc->exportField($this->provincia_hospital);
						$doc->exportField($this->municipio_hospital);
						$doc->exportField($this->nivel_hospital);
						$doc->exportField($this->redservicions_hospital);
						$doc->exportField($this->sector_hospital);
						$doc->exportField($this->tipo_hospital);
						$doc->exportField($this->camashab_cali);
						$doc->exportField($this->especialidad);
						$doc->exportField($this->latitud_hospital);
						$doc->exportField($this->longitud_hospital);
						$doc->exportField($this->icon_hospital);
						$doc->exportField($this->codpolitico);
						$doc->exportField($this->telefono);
						$doc->exportField($this->nombre_responsable);
						$doc->exportField($this->estado);
						$doc->exportField($this->emt);
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
		$width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
		$height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'icon_hospital') {
			$fldName = "icon_hospital";
			$fileNameFld = "icon_hospital";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($ar) == 1) {
			$this->id_hospital->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype != "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld != "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					$downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
					if ($fileNameFld != "" && !EmptyValue($rs->fields($fileNameFld))) {
						$fileName = $rs->fields($fileNameFld);
						$pathinfo = pathinfo($fileName);
						$ext = strtolower(@$pathinfo["extension"]);
						$isPdf = SameText($ext, "pdf");
						if ($downloadPdf || !$isPdf) // Skip header if not download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					} else {
						$ext = ContentExtension($val);
						$isPdf = SameText($ext, ".pdf");
						if ($isPdf && $downloadPdf) // Add header if download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					}

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear any debug message
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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