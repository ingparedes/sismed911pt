<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for sala_rac
 */
class sala_rac extends DbTable
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
	public $id_registro;
	public $fecha_hora;
	public $id_admision;
	public $acompanante;
	public $tel_acompanante;
	public $tipo_urgencia;
	public $clasificacion;
	public $motivo_consulta;
	public $signos_vitales;
	public $so2;
	public $fr;
	public $_t;
	public $fc;
	public $pas;
	public $pad;
	public $local_trauma;
	public $sistema;
	public $nivel_conciencia;
	public $dolor;
	public $signos_sintomas;
	public $factores_riesgos;
	public $estado_final;
	public $tipo_ingreso;
	public $hora_clasificacion;
	public $descripcion_signos;
	public $hospital;
	public $motivo_trauma;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'sala_rac';
		$this->TableName = 'sala_rac';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"sala_rac\"";
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

		// id_registro
		$this->id_registro = new DbField('sala_rac', 'sala_rac', 'x_id_registro', 'id_registro', '"id_registro"', 'CAST("id_registro" AS varchar(255))', 3, 4, -1, FALSE, '"id_registro"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_registro->IsPrimaryKey = TRUE; // Primary key field
		$this->id_registro->Nullable = FALSE; // NOT NULL field
		$this->id_registro->Required = TRUE; // Required field
		$this->id_registro->Sortable = TRUE; // Allow sort
		$this->id_registro->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_registro'] = &$this->id_registro;

		// fecha_hora
		$this->fecha_hora = new DbField('sala_rac', 'sala_rac', 'x_fecha_hora', 'fecha_hora', '"fecha_hora"', CastDateFieldForLike("\"fecha_hora\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_hora"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_hora->Sortable = TRUE; // Allow sort
		$this->fecha_hora->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_hora'] = &$this->fecha_hora;

		// id_admision
		$this->id_admision = new DbField('sala_rac', 'sala_rac', 'x_id_admision', 'id_admision', '"id_admision"', '"id_admision"', 200, 40, -1, FALSE, '"id_admision"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_admision->Sortable = TRUE; // Allow sort
		$this->fields['id_admision'] = &$this->id_admision;

		// acompañante
		$this->acompanante = new DbField('sala_rac', 'sala_rac', 'x_acompanante', 'acompañante', '"acompañante"', '"acompañante"', 200, 100, -1, FALSE, '"acompañante"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->acompanante->Sortable = TRUE; // Allow sort
		$this->fields['acompañante'] = &$this->acompanante;

		// tel_acompañante
		$this->tel_acompanante = new DbField('sala_rac', 'sala_rac', 'x_tel_acompanante', 'tel_acompañante', '"tel_acompañante"', '"tel_acompañante"', 200, 20, -1, FALSE, '"tel_acompañante"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tel_acompanante->Sortable = TRUE; // Allow sort
		$this->fields['tel_acompañante'] = &$this->tel_acompanante;

		// tipo_urgencia
		$this->tipo_urgencia = new DbField('sala_rac', 'sala_rac', 'x_tipo_urgencia', 'tipo_urgencia', '"tipo_urgencia"', '"tipo_urgencia"', 200, 2, -1, FALSE, '"tipo_urgencia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_urgencia->Sortable = TRUE; // Allow sort
		$this->fields['tipo_urgencia'] = &$this->tipo_urgencia;

		// clasificacion
		$this->clasificacion = new DbField('sala_rac', 'sala_rac', 'x_clasificacion', 'clasificacion', '"clasificacion"', '"clasificacion"', 200, 10, -1, FALSE, '"clasificacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->clasificacion->Sortable = TRUE; // Allow sort
		$this->fields['clasificacion'] = &$this->clasificacion;

		// motivo_consulta
		$this->motivo_consulta = new DbField('sala_rac', 'sala_rac', 'x_motivo_consulta', 'motivo_consulta', '"motivo_consulta"', '"motivo_consulta"', 201, 0, -1, FALSE, '"motivo_consulta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->motivo_consulta->Sortable = TRUE; // Allow sort
		$this->fields['motivo_consulta'] = &$this->motivo_consulta;

		// signos_vitales
		$this->signos_vitales = new DbField('sala_rac', 'sala_rac', 'x_signos_vitales', 'signos_vitales', '"signos_vitales"', '"signos_vitales"', 201, 0, -1, FALSE, '"signos_vitales"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->signos_vitales->Sortable = TRUE; // Allow sort
		$this->fields['signos_vitales'] = &$this->signos_vitales;

		// so2
		$this->so2 = new DbField('sala_rac', 'sala_rac', 'x_so2', 'so2', '"so2"', '"so2"', 200, 10, -1, FALSE, '"so2"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->so2->Sortable = TRUE; // Allow sort
		$this->fields['so2'] = &$this->so2;

		// fr
		$this->fr = new DbField('sala_rac', 'sala_rac', 'x_fr', 'fr', '"fr"', '"fr"', 200, 10, -1, FALSE, '"fr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fr->Sortable = TRUE; // Allow sort
		$this->fields['fr'] = &$this->fr;

		// t
		$this->_t = new DbField('sala_rac', 'sala_rac', 'x__t', 't', '"t"', '"t"', 200, 10, -1, FALSE, '"t"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_t->Sortable = TRUE; // Allow sort
		$this->fields['t'] = &$this->_t;

		// fc
		$this->fc = new DbField('sala_rac', 'sala_rac', 'x_fc', 'fc', '"fc"', '"fc"', 200, 10, -1, FALSE, '"fc"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fc->Sortable = TRUE; // Allow sort
		$this->fields['fc'] = &$this->fc;

		// pas
		$this->pas = new DbField('sala_rac', 'sala_rac', 'x_pas', 'pas', '"pas"', '"pas"', 200, 10, -1, FALSE, '"pas"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pas->Sortable = TRUE; // Allow sort
		$this->fields['pas'] = &$this->pas;

		// pad
		$this->pad = new DbField('sala_rac', 'sala_rac', 'x_pad', 'pad', '"pad"', '"pad"', 200, 10, -1, FALSE, '"pad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pad->Sortable = TRUE; // Allow sort
		$this->fields['pad'] = &$this->pad;

		// local_trauma
		$this->local_trauma = new DbField('sala_rac', 'sala_rac', 'x_local_trauma', 'local_trauma', '"local_trauma"', '"local_trauma"', 200, 40, -1, FALSE, '"local_trauma"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->local_trauma->Sortable = TRUE; // Allow sort
		$this->fields['local_trauma'] = &$this->local_trauma;

		// sistema
		$this->sistema = new DbField('sala_rac', 'sala_rac', 'x_sistema', 'sistema', '"sistema"', '"sistema"', 200, 40, -1, FALSE, '"sistema"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sistema->Sortable = TRUE; // Allow sort
		$this->fields['sistema'] = &$this->sistema;

		// nivel_conciencia
		$this->nivel_conciencia = new DbField('sala_rac', 'sala_rac', 'x_nivel_conciencia', 'nivel_conciencia', '"nivel_conciencia"', '"nivel_conciencia"', 200, 10, -1, FALSE, '"nivel_conciencia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nivel_conciencia->Sortable = TRUE; // Allow sort
		$this->fields['nivel_conciencia'] = &$this->nivel_conciencia;

		// dolor
		$this->dolor = new DbField('sala_rac', 'sala_rac', 'x_dolor', 'dolor', '"dolor"', '"dolor"', 200, 10, -1, FALSE, '"dolor"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dolor->Sortable = TRUE; // Allow sort
		$this->fields['dolor'] = &$this->dolor;

		// signos_sintomas
		$this->signos_sintomas = new DbField('sala_rac', 'sala_rac', 'x_signos_sintomas', 'signos_sintomas', '"signos_sintomas"', '"signos_sintomas"', 200, 100, -1, FALSE, '"signos_sintomas"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signos_sintomas->Sortable = TRUE; // Allow sort
		$this->fields['signos_sintomas'] = &$this->signos_sintomas;

		// factores_riesgos
		$this->factores_riesgos = new DbField('sala_rac', 'sala_rac', 'x_factores_riesgos', 'factores_riesgos', '"factores_riesgos"', '"factores_riesgos"', 200, 10, -1, FALSE, '"factores_riesgos"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->factores_riesgos->Sortable = TRUE; // Allow sort
		$this->fields['factores_riesgos'] = &$this->factores_riesgos;

		// estado_final
		$this->estado_final = new DbField('sala_rac', 'sala_rac', 'x_estado_final', 'estado_final', '"estado_final"', '"estado_final"', 200, 10, -1, FALSE, '"estado_final"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado_final->Sortable = TRUE; // Allow sort
		$this->fields['estado_final'] = &$this->estado_final;

		// tipo_ingreso
		$this->tipo_ingreso = new DbField('sala_rac', 'sala_rac', 'x_tipo_ingreso', 'tipo_ingreso', '"tipo_ingreso"', '"tipo_ingreso"', 200, 80, -1, FALSE, '"tipo_ingreso"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_ingreso->Sortable = TRUE; // Allow sort
		$this->fields['tipo_ingreso'] = &$this->tipo_ingreso;

		// hora_clasificacion
		$this->hora_clasificacion = new DbField('sala_rac', 'sala_rac', 'x_hora_clasificacion', 'hora_clasificacion', '"hora_clasificacion"', CastDateFieldForLike("\"hora_clasificacion\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_clasificacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_clasificacion->Sortable = TRUE; // Allow sort
		$this->hora_clasificacion->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_clasificacion'] = &$this->hora_clasificacion;

		// descripcion_signos
		$this->descripcion_signos = new DbField('sala_rac', 'sala_rac', 'x_descripcion_signos', 'descripcion_signos', '"descripcion_signos"', '"descripcion_signos"', 201, 0, -1, FALSE, '"descripcion_signos"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->descripcion_signos->Sortable = TRUE; // Allow sort
		$this->fields['descripcion_signos'] = &$this->descripcion_signos;

		// hospital
		$this->hospital = new DbField('sala_rac', 'sala_rac', 'x_hospital', 'hospital', '"hospital"', '"hospital"', 200, 255, -1, FALSE, '"hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospital->Nullable = FALSE; // NOT NULL field
		$this->hospital->Required = TRUE; // Required field
		$this->hospital->Sortable = TRUE; // Allow sort
		$this->fields['hospital'] = &$this->hospital;

		// motivo_trauma
		$this->motivo_trauma = new DbField('sala_rac', 'sala_rac', 'x_motivo_trauma', 'motivo_trauma', '"motivo_trauma"', '"motivo_trauma"', 200, 80, -1, FALSE, '"motivo_trauma"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->motivo_trauma->Sortable = TRUE; // Allow sort
		$this->fields['motivo_trauma'] = &$this->motivo_trauma;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"sala_rac\"";
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
			if (array_key_exists('id_registro', $rs))
				AddFilter($where, QuotedName('id_registro', $this->Dbid) . '=' . QuotedValue($rs['id_registro'], $this->id_registro->DataType, $this->Dbid));
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
		$this->id_registro->DbValue = $row['id_registro'];
		$this->fecha_hora->DbValue = $row['fecha_hora'];
		$this->id_admision->DbValue = $row['id_admision'];
		$this->acompanante->DbValue = $row['acompañante'];
		$this->tel_acompanante->DbValue = $row['tel_acompañante'];
		$this->tipo_urgencia->DbValue = $row['tipo_urgencia'];
		$this->clasificacion->DbValue = $row['clasificacion'];
		$this->motivo_consulta->DbValue = $row['motivo_consulta'];
		$this->signos_vitales->DbValue = $row['signos_vitales'];
		$this->so2->DbValue = $row['so2'];
		$this->fr->DbValue = $row['fr'];
		$this->_t->DbValue = $row['t'];
		$this->fc->DbValue = $row['fc'];
		$this->pas->DbValue = $row['pas'];
		$this->pad->DbValue = $row['pad'];
		$this->local_trauma->DbValue = $row['local_trauma'];
		$this->sistema->DbValue = $row['sistema'];
		$this->nivel_conciencia->DbValue = $row['nivel_conciencia'];
		$this->dolor->DbValue = $row['dolor'];
		$this->signos_sintomas->DbValue = $row['signos_sintomas'];
		$this->factores_riesgos->DbValue = $row['factores_riesgos'];
		$this->estado_final->DbValue = $row['estado_final'];
		$this->tipo_ingreso->DbValue = $row['tipo_ingreso'];
		$this->hora_clasificacion->DbValue = $row['hora_clasificacion'];
		$this->descripcion_signos->DbValue = $row['descripcion_signos'];
		$this->hospital->DbValue = $row['hospital'];
		$this->motivo_trauma->DbValue = $row['motivo_trauma'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_registro\" = @id_registro@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_registro', $row) ? $row['id_registro'] : NULL;
		else
			$val = $this->id_registro->OldValue !== NULL ? $this->id_registro->OldValue : $this->id_registro->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_registro@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "sala_raclist.php";
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
		if ($pageName == "sala_racview.php")
			return $Language->phrase("View");
		elseif ($pageName == "sala_racedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "sala_racadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "sala_raclist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("sala_racview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("sala_racview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "sala_racadd.php?" . $this->getUrlParm($parm);
		else
			$url = "sala_racadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("sala_racedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("sala_racadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("sala_racdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_registro:" . JsonEncode($this->id_registro->CurrentValue, "number");
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
		if ($this->id_registro->CurrentValue != NULL) {
			$url .= "id_registro=" . urlencode($this->id_registro->CurrentValue);
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
			if (Param("id_registro") !== NULL)
				$arKeys[] = Param("id_registro");
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
				$this->id_registro->CurrentValue = $key;
			else
				$this->id_registro->OldValue = $key;
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
		$this->id_registro->setDbValue($rs->fields('id_registro'));
		$this->fecha_hora->setDbValue($rs->fields('fecha_hora'));
		$this->id_admision->setDbValue($rs->fields('id_admision'));
		$this->acompanante->setDbValue($rs->fields('acompañante'));
		$this->tel_acompanante->setDbValue($rs->fields('tel_acompañante'));
		$this->tipo_urgencia->setDbValue($rs->fields('tipo_urgencia'));
		$this->clasificacion->setDbValue($rs->fields('clasificacion'));
		$this->motivo_consulta->setDbValue($rs->fields('motivo_consulta'));
		$this->signos_vitales->setDbValue($rs->fields('signos_vitales'));
		$this->so2->setDbValue($rs->fields('so2'));
		$this->fr->setDbValue($rs->fields('fr'));
		$this->_t->setDbValue($rs->fields('t'));
		$this->fc->setDbValue($rs->fields('fc'));
		$this->pas->setDbValue($rs->fields('pas'));
		$this->pad->setDbValue($rs->fields('pad'));
		$this->local_trauma->setDbValue($rs->fields('local_trauma'));
		$this->sistema->setDbValue($rs->fields('sistema'));
		$this->nivel_conciencia->setDbValue($rs->fields('nivel_conciencia'));
		$this->dolor->setDbValue($rs->fields('dolor'));
		$this->signos_sintomas->setDbValue($rs->fields('signos_sintomas'));
		$this->factores_riesgos->setDbValue($rs->fields('factores_riesgos'));
		$this->estado_final->setDbValue($rs->fields('estado_final'));
		$this->tipo_ingreso->setDbValue($rs->fields('tipo_ingreso'));
		$this->hora_clasificacion->setDbValue($rs->fields('hora_clasificacion'));
		$this->descripcion_signos->setDbValue($rs->fields('descripcion_signos'));
		$this->hospital->setDbValue($rs->fields('hospital'));
		$this->motivo_trauma->setDbValue($rs->fields('motivo_trauma'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// id_registro
		$this->id_registro->EditAttrs["class"] = "form-control";
		$this->id_registro->EditCustomAttributes = "";
		$this->id_registro->EditValue = $this->id_registro->CurrentValue;
		$this->id_registro->PlaceHolder = RemoveHtml($this->id_registro->caption());

		// fecha_hora
		$this->fecha_hora->EditAttrs["class"] = "form-control";
		$this->fecha_hora->EditCustomAttributes = "";
		$this->fecha_hora->EditValue = FormatDateTime($this->fecha_hora->CurrentValue, 8);
		$this->fecha_hora->PlaceHolder = RemoveHtml($this->fecha_hora->caption());

		// id_admision
		$this->id_admision->EditAttrs["class"] = "form-control";
		$this->id_admision->EditCustomAttributes = "";
		if (!$this->id_admision->Raw)
			$this->id_admision->CurrentValue = HtmlDecode($this->id_admision->CurrentValue);
		$this->id_admision->EditValue = $this->id_admision->CurrentValue;
		$this->id_admision->PlaceHolder = RemoveHtml($this->id_admision->caption());

		// acompañante
		$this->acompanante->EditAttrs["class"] = "form-control";
		$this->acompanante->EditCustomAttributes = "";
		if (!$this->acompanante->Raw)
			$this->acompanante->CurrentValue = HtmlDecode($this->acompanante->CurrentValue);
		$this->acompanante->EditValue = $this->acompanante->CurrentValue;
		$this->acompanante->PlaceHolder = RemoveHtml($this->acompanante->caption());

		// tel_acompañante
		$this->tel_acompanante->EditAttrs["class"] = "form-control";
		$this->tel_acompanante->EditCustomAttributes = "";
		if (!$this->tel_acompanante->Raw)
			$this->tel_acompanante->CurrentValue = HtmlDecode($this->tel_acompanante->CurrentValue);
		$this->tel_acompanante->EditValue = $this->tel_acompanante->CurrentValue;
		$this->tel_acompanante->PlaceHolder = RemoveHtml($this->tel_acompanante->caption());

		// tipo_urgencia
		$this->tipo_urgencia->EditAttrs["class"] = "form-control";
		$this->tipo_urgencia->EditCustomAttributes = "";
		if (!$this->tipo_urgencia->Raw)
			$this->tipo_urgencia->CurrentValue = HtmlDecode($this->tipo_urgencia->CurrentValue);
		$this->tipo_urgencia->EditValue = $this->tipo_urgencia->CurrentValue;
		$this->tipo_urgencia->PlaceHolder = RemoveHtml($this->tipo_urgencia->caption());

		// clasificacion
		$this->clasificacion->EditAttrs["class"] = "form-control";
		$this->clasificacion->EditCustomAttributes = "";
		if (!$this->clasificacion->Raw)
			$this->clasificacion->CurrentValue = HtmlDecode($this->clasificacion->CurrentValue);
		$this->clasificacion->EditValue = $this->clasificacion->CurrentValue;
		$this->clasificacion->PlaceHolder = RemoveHtml($this->clasificacion->caption());

		// motivo_consulta
		$this->motivo_consulta->EditAttrs["class"] = "form-control";
		$this->motivo_consulta->EditCustomAttributes = "";
		$this->motivo_consulta->EditValue = $this->motivo_consulta->CurrentValue;
		$this->motivo_consulta->PlaceHolder = RemoveHtml($this->motivo_consulta->caption());

		// signos_vitales
		$this->signos_vitales->EditAttrs["class"] = "form-control";
		$this->signos_vitales->EditCustomAttributes = "";
		$this->signos_vitales->EditValue = $this->signos_vitales->CurrentValue;
		$this->signos_vitales->PlaceHolder = RemoveHtml($this->signos_vitales->caption());

		// so2
		$this->so2->EditAttrs["class"] = "form-control";
		$this->so2->EditCustomAttributes = "";
		if (!$this->so2->Raw)
			$this->so2->CurrentValue = HtmlDecode($this->so2->CurrentValue);
		$this->so2->EditValue = $this->so2->CurrentValue;
		$this->so2->PlaceHolder = RemoveHtml($this->so2->caption());

		// fr
		$this->fr->EditAttrs["class"] = "form-control";
		$this->fr->EditCustomAttributes = "";
		if (!$this->fr->Raw)
			$this->fr->CurrentValue = HtmlDecode($this->fr->CurrentValue);
		$this->fr->EditValue = $this->fr->CurrentValue;
		$this->fr->PlaceHolder = RemoveHtml($this->fr->caption());

		// t
		$this->_t->EditAttrs["class"] = "form-control";
		$this->_t->EditCustomAttributes = "";
		if (!$this->_t->Raw)
			$this->_t->CurrentValue = HtmlDecode($this->_t->CurrentValue);
		$this->_t->EditValue = $this->_t->CurrentValue;
		$this->_t->PlaceHolder = RemoveHtml($this->_t->caption());

		// fc
		$this->fc->EditAttrs["class"] = "form-control";
		$this->fc->EditCustomAttributes = "";
		if (!$this->fc->Raw)
			$this->fc->CurrentValue = HtmlDecode($this->fc->CurrentValue);
		$this->fc->EditValue = $this->fc->CurrentValue;
		$this->fc->PlaceHolder = RemoveHtml($this->fc->caption());

		// pas
		$this->pas->EditAttrs["class"] = "form-control";
		$this->pas->EditCustomAttributes = "";
		if (!$this->pas->Raw)
			$this->pas->CurrentValue = HtmlDecode($this->pas->CurrentValue);
		$this->pas->EditValue = $this->pas->CurrentValue;
		$this->pas->PlaceHolder = RemoveHtml($this->pas->caption());

		// pad
		$this->pad->EditAttrs["class"] = "form-control";
		$this->pad->EditCustomAttributes = "";
		if (!$this->pad->Raw)
			$this->pad->CurrentValue = HtmlDecode($this->pad->CurrentValue);
		$this->pad->EditValue = $this->pad->CurrentValue;
		$this->pad->PlaceHolder = RemoveHtml($this->pad->caption());

		// local_trauma
		$this->local_trauma->EditAttrs["class"] = "form-control";
		$this->local_trauma->EditCustomAttributes = "";
		if (!$this->local_trauma->Raw)
			$this->local_trauma->CurrentValue = HtmlDecode($this->local_trauma->CurrentValue);
		$this->local_trauma->EditValue = $this->local_trauma->CurrentValue;
		$this->local_trauma->PlaceHolder = RemoveHtml($this->local_trauma->caption());

		// sistema
		$this->sistema->EditAttrs["class"] = "form-control";
		$this->sistema->EditCustomAttributes = "";
		if (!$this->sistema->Raw)
			$this->sistema->CurrentValue = HtmlDecode($this->sistema->CurrentValue);
		$this->sistema->EditValue = $this->sistema->CurrentValue;
		$this->sistema->PlaceHolder = RemoveHtml($this->sistema->caption());

		// nivel_conciencia
		$this->nivel_conciencia->EditAttrs["class"] = "form-control";
		$this->nivel_conciencia->EditCustomAttributes = "";
		if (!$this->nivel_conciencia->Raw)
			$this->nivel_conciencia->CurrentValue = HtmlDecode($this->nivel_conciencia->CurrentValue);
		$this->nivel_conciencia->EditValue = $this->nivel_conciencia->CurrentValue;
		$this->nivel_conciencia->PlaceHolder = RemoveHtml($this->nivel_conciencia->caption());

		// dolor
		$this->dolor->EditAttrs["class"] = "form-control";
		$this->dolor->EditCustomAttributes = "";
		if (!$this->dolor->Raw)
			$this->dolor->CurrentValue = HtmlDecode($this->dolor->CurrentValue);
		$this->dolor->EditValue = $this->dolor->CurrentValue;
		$this->dolor->PlaceHolder = RemoveHtml($this->dolor->caption());

		// signos_sintomas
		$this->signos_sintomas->EditAttrs["class"] = "form-control";
		$this->signos_sintomas->EditCustomAttributes = "";
		if (!$this->signos_sintomas->Raw)
			$this->signos_sintomas->CurrentValue = HtmlDecode($this->signos_sintomas->CurrentValue);
		$this->signos_sintomas->EditValue = $this->signos_sintomas->CurrentValue;
		$this->signos_sintomas->PlaceHolder = RemoveHtml($this->signos_sintomas->caption());

		// factores_riesgos
		$this->factores_riesgos->EditAttrs["class"] = "form-control";
		$this->factores_riesgos->EditCustomAttributes = "";
		if (!$this->factores_riesgos->Raw)
			$this->factores_riesgos->CurrentValue = HtmlDecode($this->factores_riesgos->CurrentValue);
		$this->factores_riesgos->EditValue = $this->factores_riesgos->CurrentValue;
		$this->factores_riesgos->PlaceHolder = RemoveHtml($this->factores_riesgos->caption());

		// estado_final
		$this->estado_final->EditAttrs["class"] = "form-control";
		$this->estado_final->EditCustomAttributes = "";
		if (!$this->estado_final->Raw)
			$this->estado_final->CurrentValue = HtmlDecode($this->estado_final->CurrentValue);
		$this->estado_final->EditValue = $this->estado_final->CurrentValue;
		$this->estado_final->PlaceHolder = RemoveHtml($this->estado_final->caption());

		// tipo_ingreso
		$this->tipo_ingreso->EditAttrs["class"] = "form-control";
		$this->tipo_ingreso->EditCustomAttributes = "";
		if (!$this->tipo_ingreso->Raw)
			$this->tipo_ingreso->CurrentValue = HtmlDecode($this->tipo_ingreso->CurrentValue);
		$this->tipo_ingreso->EditValue = $this->tipo_ingreso->CurrentValue;
		$this->tipo_ingreso->PlaceHolder = RemoveHtml($this->tipo_ingreso->caption());

		// hora_clasificacion
		$this->hora_clasificacion->EditAttrs["class"] = "form-control";
		$this->hora_clasificacion->EditCustomAttributes = "";
		$this->hora_clasificacion->EditValue = FormatDateTime($this->hora_clasificacion->CurrentValue, 8);
		$this->hora_clasificacion->PlaceHolder = RemoveHtml($this->hora_clasificacion->caption());

		// descripcion_signos
		$this->descripcion_signos->EditAttrs["class"] = "form-control";
		$this->descripcion_signos->EditCustomAttributes = "";
		$this->descripcion_signos->EditValue = $this->descripcion_signos->CurrentValue;
		$this->descripcion_signos->PlaceHolder = RemoveHtml($this->descripcion_signos->caption());

		// hospital
		$this->hospital->EditAttrs["class"] = "form-control";
		$this->hospital->EditCustomAttributes = "";
		if (!$this->hospital->Raw)
			$this->hospital->CurrentValue = HtmlDecode($this->hospital->CurrentValue);
		$this->hospital->EditValue = $this->hospital->CurrentValue;
		$this->hospital->PlaceHolder = RemoveHtml($this->hospital->caption());

		// motivo_trauma
		$this->motivo_trauma->EditAttrs["class"] = "form-control";
		$this->motivo_trauma->EditCustomAttributes = "";
		if (!$this->motivo_trauma->Raw)
			$this->motivo_trauma->CurrentValue = HtmlDecode($this->motivo_trauma->CurrentValue);
		$this->motivo_trauma->EditValue = $this->motivo_trauma->CurrentValue;
		$this->motivo_trauma->PlaceHolder = RemoveHtml($this->motivo_trauma->caption());

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
					$doc->exportCaption($this->id_registro);
					$doc->exportCaption($this->fecha_hora);
					$doc->exportCaption($this->id_admision);
					$doc->exportCaption($this->acompanante);
					$doc->exportCaption($this->tel_acompanante);
					$doc->exportCaption($this->tipo_urgencia);
					$doc->exportCaption($this->clasificacion);
					$doc->exportCaption($this->motivo_consulta);
					$doc->exportCaption($this->signos_vitales);
					$doc->exportCaption($this->so2);
					$doc->exportCaption($this->fr);
					$doc->exportCaption($this->_t);
					$doc->exportCaption($this->fc);
					$doc->exportCaption($this->pas);
					$doc->exportCaption($this->pad);
					$doc->exportCaption($this->local_trauma);
					$doc->exportCaption($this->sistema);
					$doc->exportCaption($this->nivel_conciencia);
					$doc->exportCaption($this->dolor);
					$doc->exportCaption($this->signos_sintomas);
					$doc->exportCaption($this->factores_riesgos);
					$doc->exportCaption($this->estado_final);
					$doc->exportCaption($this->tipo_ingreso);
					$doc->exportCaption($this->hora_clasificacion);
					$doc->exportCaption($this->descripcion_signos);
					$doc->exportCaption($this->hospital);
					$doc->exportCaption($this->motivo_trauma);
				} else {
					$doc->exportCaption($this->id_registro);
					$doc->exportCaption($this->fecha_hora);
					$doc->exportCaption($this->id_admision);
					$doc->exportCaption($this->acompanante);
					$doc->exportCaption($this->tel_acompanante);
					$doc->exportCaption($this->tipo_urgencia);
					$doc->exportCaption($this->clasificacion);
					$doc->exportCaption($this->so2);
					$doc->exportCaption($this->fr);
					$doc->exportCaption($this->_t);
					$doc->exportCaption($this->fc);
					$doc->exportCaption($this->pas);
					$doc->exportCaption($this->pad);
					$doc->exportCaption($this->local_trauma);
					$doc->exportCaption($this->sistema);
					$doc->exportCaption($this->nivel_conciencia);
					$doc->exportCaption($this->dolor);
					$doc->exportCaption($this->signos_sintomas);
					$doc->exportCaption($this->factores_riesgos);
					$doc->exportCaption($this->estado_final);
					$doc->exportCaption($this->tipo_ingreso);
					$doc->exportCaption($this->hora_clasificacion);
					$doc->exportCaption($this->hospital);
					$doc->exportCaption($this->motivo_trauma);
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
						$doc->exportField($this->id_registro);
						$doc->exportField($this->fecha_hora);
						$doc->exportField($this->id_admision);
						$doc->exportField($this->acompanante);
						$doc->exportField($this->tel_acompanante);
						$doc->exportField($this->tipo_urgencia);
						$doc->exportField($this->clasificacion);
						$doc->exportField($this->motivo_consulta);
						$doc->exportField($this->signos_vitales);
						$doc->exportField($this->so2);
						$doc->exportField($this->fr);
						$doc->exportField($this->_t);
						$doc->exportField($this->fc);
						$doc->exportField($this->pas);
						$doc->exportField($this->pad);
						$doc->exportField($this->local_trauma);
						$doc->exportField($this->sistema);
						$doc->exportField($this->nivel_conciencia);
						$doc->exportField($this->dolor);
						$doc->exportField($this->signos_sintomas);
						$doc->exportField($this->factores_riesgos);
						$doc->exportField($this->estado_final);
						$doc->exportField($this->tipo_ingreso);
						$doc->exportField($this->hora_clasificacion);
						$doc->exportField($this->descripcion_signos);
						$doc->exportField($this->hospital);
						$doc->exportField($this->motivo_trauma);
					} else {
						$doc->exportField($this->id_registro);
						$doc->exportField($this->fecha_hora);
						$doc->exportField($this->id_admision);
						$doc->exportField($this->acompanante);
						$doc->exportField($this->tel_acompanante);
						$doc->exportField($this->tipo_urgencia);
						$doc->exportField($this->clasificacion);
						$doc->exportField($this->so2);
						$doc->exportField($this->fr);
						$doc->exportField($this->_t);
						$doc->exportField($this->fc);
						$doc->exportField($this->pas);
						$doc->exportField($this->pad);
						$doc->exportField($this->local_trauma);
						$doc->exportField($this->sistema);
						$doc->exportField($this->nivel_conciencia);
						$doc->exportField($this->dolor);
						$doc->exportField($this->signos_sintomas);
						$doc->exportField($this->factores_riesgos);
						$doc->exportField($this->estado_final);
						$doc->exportField($this->tipo_ingreso);
						$doc->exportField($this->hora_clasificacion);
						$doc->exportField($this->hospital);
						$doc->exportField($this->motivo_trauma);
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