<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for disponibilidad_hospitalaria
 */
class disponibilidad_hospitalaria extends DbTable
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
	public $id_disponibilida;
	public $fecha_disponibilidad;
	public $cod_hospital;
	public $servicio_disponibilidad;
	public $estado_disponibilidad;
	public $cantidad_camas;
	public $nombre_reporta;
	public $telefono;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'disponibilidad_hospitalaria';
		$this->TableName = 'disponibilidad_hospitalaria';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"disponibilidad_hospitalaria\"";
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

		// id_disponibilida
		$this->id_disponibilida = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_id_disponibilida', 'id_disponibilida', '"id_disponibilida"', 'CAST("id_disponibilida" AS varchar(255))', 3, 4, -1, FALSE, '"id_disponibilida"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_disponibilida->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_disponibilida->IsPrimaryKey = TRUE; // Primary key field
		$this->id_disponibilida->Nullable = FALSE; // NOT NULL field
		$this->id_disponibilida->Sortable = TRUE; // Allow sort
		$this->id_disponibilida->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_disponibilida'] = &$this->id_disponibilida;

		// fecha_disponibilidad
		$this->fecha_disponibilidad = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_fecha_disponibilidad', 'fecha_disponibilidad', '"fecha_disponibilidad"', CastDateFieldForLike("\"fecha_disponibilidad\"", 9, "DB"), 135, 8, 9, FALSE, '"fecha_disponibilidad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_disponibilidad->Sortable = TRUE; // Allow sort
		$this->fecha_disponibilidad->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateYMD"));
		$this->fields['fecha_disponibilidad'] = &$this->fecha_disponibilidad;

		// cod_hospital
		$this->cod_hospital = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_cod_hospital', 'cod_hospital', '"cod_hospital"', '"cod_hospital"', 200, 16, -1, FALSE, '"EV__cod_hospital"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->cod_hospital->Sortable = TRUE; // Allow sort
		$this->cod_hospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->cod_hospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->cod_hospital->Lookup = new Lookup('cod_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","depto_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->cod_hospital->Lookup = new Lookup('cod_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","depto_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->cod_hospital->Lookup = new Lookup('cod_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","depto_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->cod_hospital->Lookup = new Lookup('cod_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","depto_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->cod_hospital->Lookup = new Lookup('cod_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","depto_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['cod_hospital'] = &$this->cod_hospital;

		// servicio_disponibilidad
		$this->servicio_disponibilidad = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_servicio_disponibilidad', 'servicio_disponibilidad', '"servicio_disponibilidad"', 'CAST("servicio_disponibilidad" AS varchar(255))', 2, 2, -1, FALSE, '"EV__servicio_disponibilidad"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->servicio_disponibilidad->Sortable = TRUE; // Allow sort
		$this->servicio_disponibilidad->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->servicio_disponibilidad->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->servicio_disponibilidad->Lookup = new Lookup('servicio_disponibilidad', 'servicio_disponibilidad', FALSE, 'servicio_disponabilidad', ["nombre_serv_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->servicio_disponibilidad->Lookup = new Lookup('servicio_disponibilidad', 'servicio_disponibilidad', FALSE, 'servicio_disponabilidad', ["nombre_serv_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->servicio_disponibilidad->Lookup = new Lookup('servicio_disponibilidad', 'servicio_disponibilidad', FALSE, 'servicio_disponabilidad', ["nombre_serv_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->servicio_disponibilidad->Lookup = new Lookup('servicio_disponibilidad', 'servicio_disponibilidad', FALSE, 'servicio_disponabilidad', ["nombre_serv_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->servicio_disponibilidad->Lookup = new Lookup('servicio_disponibilidad', 'servicio_disponibilidad', FALSE, 'servicio_disponabilidad', ["nombre_serv_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->servicio_disponibilidad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['servicio_disponibilidad'] = &$this->servicio_disponibilidad;

		// estado_disponibilidad
		$this->estado_disponibilidad = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_estado_disponibilidad', 'estado_disponibilidad', '"estado_disponibilidad"', '"estado_disponibilidad"', 200, 10, -1, FALSE, '"estado_disponibilidad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->estado_disponibilidad->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->estado_disponibilidad->Lookup = new Lookup('estado_disponibilidad', 'disponibilidad_hospitalaria', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->estado_disponibilidad->Lookup = new Lookup('estado_disponibilidad', 'disponibilidad_hospitalaria', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->estado_disponibilidad->Lookup = new Lookup('estado_disponibilidad', 'disponibilidad_hospitalaria', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->estado_disponibilidad->Lookup = new Lookup('estado_disponibilidad', 'disponibilidad_hospitalaria', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->estado_disponibilidad->Lookup = new Lookup('estado_disponibilidad', 'disponibilidad_hospitalaria', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->estado_disponibilidad->OptionCount = 3;
		$this->fields['estado_disponibilidad'] = &$this->estado_disponibilidad;

		// cantidad_camas
		$this->cantidad_camas = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_cantidad_camas', 'cantidad_camas', '"cantidad_camas"', '"cantidad_camas"', 200, 10, -1, FALSE, '"cantidad_camas"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cantidad_camas->Sortable = TRUE; // Allow sort
		$this->fields['cantidad_camas'] = &$this->cantidad_camas;

		// nombre_reporta
		$this->nombre_reporta = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_nombre_reporta', 'nombre_reporta', '"nombre_reporta"', '"nombre_reporta"', 200, 80, -1, FALSE, '"nombre_reporta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_reporta->Sortable = TRUE; // Allow sort
		$this->fields['nombre_reporta'] = &$this->nombre_reporta;

		// telefono
		$this->telefono = new DbField('disponibilidad_hospitalaria', 'disponibilidad_hospitalaria', 'x_telefono', 'telefono', '"telefono"', '"telefono"', 200, 80, -1, FALSE, '"telefono"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono->Sortable = TRUE; // Allow sort
		$this->fields['telefono'] = &$this->telefono;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"disponibilidad_hospitalaria\"";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		global $CurrentLanguage;
		switch ($CurrentLanguage) {
			case "en":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" || '" . ValueSeparator(1, $this->cod_hospital) . "' || \"depto_hospital\" || '" . ValueSeparator(2, $this->cod_hospital) . "' || \"nivel_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"disponibilidad_hospitalaria\".\"cod_hospital\" LIMIT 1) AS \"EV__cod_hospital\", (SELECT \"nombre_serv_en\" FROM \"servicio_disponibilidad\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"servicio_disponabilidad\" = \"disponibilidad_hospitalaria\".\"servicio_disponibilidad\" LIMIT 1) AS \"EV__servicio_disponibilidad\" FROM \"disponibilidad_hospitalaria\"" .
					") \"TMP_TABLE\"";
				break;
			case "fr":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" || '" . ValueSeparator(1, $this->cod_hospital) . "' || \"depto_hospital\" || '" . ValueSeparator(2, $this->cod_hospital) . "' || \"nivel_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"disponibilidad_hospitalaria\".\"cod_hospital\" LIMIT 1) AS \"EV__cod_hospital\", (SELECT \"nombre_serv_fr\" FROM \"servicio_disponibilidad\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"servicio_disponabilidad\" = \"disponibilidad_hospitalaria\".\"servicio_disponibilidad\" LIMIT 1) AS \"EV__servicio_disponibilidad\" FROM \"disponibilidad_hospitalaria\"" .
					") \"TMP_TABLE\"";
				break;
			case "pt":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" || '" . ValueSeparator(1, $this->cod_hospital) . "' || \"depto_hospital\" || '" . ValueSeparator(2, $this->cod_hospital) . "' || \"nivel_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"disponibilidad_hospitalaria\".\"cod_hospital\" LIMIT 1) AS \"EV__cod_hospital\", (SELECT \"nombre_serv_pr\" FROM \"servicio_disponibilidad\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"servicio_disponabilidad\" = \"disponibilidad_hospitalaria\".\"servicio_disponibilidad\" LIMIT 1) AS \"EV__servicio_disponibilidad\" FROM \"disponibilidad_hospitalaria\"" .
					") \"TMP_TABLE\"";
				break;
			case "es":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" || '" . ValueSeparator(1, $this->cod_hospital) . "' || \"depto_hospital\" || '" . ValueSeparator(2, $this->cod_hospital) . "' || \"nivel_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"disponibilidad_hospitalaria\".\"cod_hospital\" LIMIT 1) AS \"EV__cod_hospital\", (SELECT \"nombre_serv_es\" FROM \"servicio_disponibilidad\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"servicio_disponabilidad\" = \"disponibilidad_hospitalaria\".\"servicio_disponibilidad\" LIMIT 1) AS \"EV__servicio_disponibilidad\" FROM \"disponibilidad_hospitalaria\"" .
					") \"TMP_TABLE\"";
				break;
			default:
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" || '" . ValueSeparator(1, $this->cod_hospital) . "' || \"depto_hospital\" || '" . ValueSeparator(2, $this->cod_hospital) . "' || \"nivel_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"disponibilidad_hospitalaria\".\"cod_hospital\" LIMIT 1) AS \"EV__cod_hospital\", (SELECT \"nombre_serv_en\" FROM \"servicio_disponibilidad\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"servicio_disponabilidad\" = \"disponibilidad_hospitalaria\".\"servicio_disponibilidad\" LIMIT 1) AS \"EV__servicio_disponibilidad\" FROM \"disponibilidad_hospitalaria\"" .
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
		if ($this->cod_hospital->AdvancedSearch->SearchValue != "" ||
			$this->cod_hospital->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->cod_hospital->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->cod_hospital->VirtualExpression . " "))
			return TRUE;
		if ($this->servicio_disponibilidad->AdvancedSearch->SearchValue != "" ||
			$this->servicio_disponibilidad->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->servicio_disponibilidad->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->servicio_disponibilidad->VirtualExpression . " "))
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
			$this->id_disponibilida->setDbValue($conn->getOne("SELECT currval('disponibilidad_hospitalaria_id_disponibilida_seq'::regclass)"));
			$rs['id_disponibilida'] = $this->id_disponibilida->DbValue;
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
			if (array_key_exists('id_disponibilida', $rs))
				AddFilter($where, QuotedName('id_disponibilida', $this->Dbid) . '=' . QuotedValue($rs['id_disponibilida'], $this->id_disponibilida->DataType, $this->Dbid));
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
		$this->id_disponibilida->DbValue = $row['id_disponibilida'];
		$this->fecha_disponibilidad->DbValue = $row['fecha_disponibilidad'];
		$this->cod_hospital->DbValue = $row['cod_hospital'];
		$this->servicio_disponibilidad->DbValue = $row['servicio_disponibilidad'];
		$this->estado_disponibilidad->DbValue = $row['estado_disponibilidad'];
		$this->cantidad_camas->DbValue = $row['cantidad_camas'];
		$this->nombre_reporta->DbValue = $row['nombre_reporta'];
		$this->telefono->DbValue = $row['telefono'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_disponibilida\" = @id_disponibilida@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_disponibilida', $row) ? $row['id_disponibilida'] : NULL;
		else
			$val = $this->id_disponibilida->OldValue !== NULL ? $this->id_disponibilida->OldValue : $this->id_disponibilida->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_disponibilida@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "disponibilidad_hospitalarialist.php";
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
		if ($pageName == "disponibilidad_hospitalariaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "disponibilidad_hospitalariaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "disponibilidad_hospitalariaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "disponibilidad_hospitalarialist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("disponibilidad_hospitalariaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("disponibilidad_hospitalariaview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "disponibilidad_hospitalariaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "disponibilidad_hospitalariaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("disponibilidad_hospitalariaedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("disponibilidad_hospitalariaadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("disponibilidad_hospitalariadelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_disponibilida:" . JsonEncode($this->id_disponibilida->CurrentValue, "number");
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
		if ($this->id_disponibilida->CurrentValue != NULL) {
			$url .= "id_disponibilida=" . urlencode($this->id_disponibilida->CurrentValue);
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
			if (Param("id_disponibilida") !== NULL)
				$arKeys[] = Param("id_disponibilida");
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
				$this->id_disponibilida->CurrentValue = $key;
			else
				$this->id_disponibilida->OldValue = $key;
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
		$this->id_disponibilida->setDbValue($rs->fields('id_disponibilida'));
		$this->fecha_disponibilidad->setDbValue($rs->fields('fecha_disponibilidad'));
		$this->cod_hospital->setDbValue($rs->fields('cod_hospital'));
		$this->servicio_disponibilidad->setDbValue($rs->fields('servicio_disponibilidad'));
		$this->estado_disponibilidad->setDbValue($rs->fields('estado_disponibilidad'));
		$this->cantidad_camas->setDbValue($rs->fields('cantidad_camas'));
		$this->nombre_reporta->setDbValue($rs->fields('nombre_reporta'));
		$this->telefono->setDbValue($rs->fields('telefono'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_disponibilida
		// fecha_disponibilidad
		// cod_hospital
		// servicio_disponibilidad
		// estado_disponibilidad
		// cantidad_camas
		// nombre_reporta
		// telefono
		// id_disponibilida

		$this->id_disponibilida->ViewValue = $this->id_disponibilida->CurrentValue;
		$this->id_disponibilida->ViewValue = FormatNumber($this->id_disponibilida->ViewValue, 0, -2, -2, -2);
		$this->id_disponibilida->ViewCustomAttributes = "";

		// fecha_disponibilidad
		$this->fecha_disponibilidad->ViewValue = $this->fecha_disponibilidad->CurrentValue;
		$this->fecha_disponibilidad->ViewValue = FormatDateTime($this->fecha_disponibilidad->ViewValue, 9);
		$this->fecha_disponibilidad->ViewCustomAttributes = "";

		// cod_hospital
		if ($this->cod_hospital->VirtualValue != "") {
			$this->cod_hospital->ViewValue = $this->cod_hospital->VirtualValue;
		} else {
			$curVal = strval($this->cod_hospital->CurrentValue);
			if ($curVal != "") {
				$this->cod_hospital->ViewValue = $this->cod_hospital->lookupCacheOption($curVal);
				if ($this->cod_hospital->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_hospital\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->cod_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->cod_hospital->ViewValue = $this->cod_hospital->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->cod_hospital->ViewValue = $this->cod_hospital->CurrentValue;
					}
				}
			} else {
				$this->cod_hospital->ViewValue = NULL;
			}
		}
		$this->cod_hospital->ViewCustomAttributes = "";

		// servicio_disponibilidad
		if ($this->servicio_disponibilidad->VirtualValue != "") {
			$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->VirtualValue;
		} else {
			$curVal = strval($this->servicio_disponibilidad->CurrentValue);
			if ($curVal != "") {
				$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->lookupCacheOption($curVal);
				if ($this->servicio_disponibilidad->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"servicio_disponabilidad\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->servicio_disponibilidad->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->servicio_disponibilidad->ViewValue = $this->servicio_disponibilidad->CurrentValue;
					}
				}
			} else {
				$this->servicio_disponibilidad->ViewValue = NULL;
			}
		}
		$this->servicio_disponibilidad->ViewCustomAttributes = "";

		// estado_disponibilidad
		if (strval($this->estado_disponibilidad->CurrentValue) != "") {
			$this->estado_disponibilidad->ViewValue = $this->estado_disponibilidad->optionCaption($this->estado_disponibilidad->CurrentValue);
		} else {
			$this->estado_disponibilidad->ViewValue = NULL;
		}
		$this->estado_disponibilidad->ViewCustomAttributes = "";

		// cantidad_camas
		$this->cantidad_camas->ViewValue = $this->cantidad_camas->CurrentValue;
		$this->cantidad_camas->ViewCustomAttributes = "";

		// nombre_reporta
		$this->nombre_reporta->ViewValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->ViewCustomAttributes = "";

		// telefono
		$this->telefono->ViewValue = $this->telefono->CurrentValue;
		$this->telefono->ViewCustomAttributes = "";

		// id_disponibilida
		$this->id_disponibilida->LinkCustomAttributes = "";
		$this->id_disponibilida->HrefValue = "";
		$this->id_disponibilida->TooltipValue = "";

		// fecha_disponibilidad
		$this->fecha_disponibilidad->LinkCustomAttributes = "";
		$this->fecha_disponibilidad->HrefValue = "";
		$this->fecha_disponibilidad->TooltipValue = "";

		// cod_hospital
		$this->cod_hospital->LinkCustomAttributes = "";
		$this->cod_hospital->HrefValue = "";
		$this->cod_hospital->TooltipValue = "";

		// servicio_disponibilidad
		$this->servicio_disponibilidad->LinkCustomAttributes = "";
		$this->servicio_disponibilidad->HrefValue = "";
		$this->servicio_disponibilidad->TooltipValue = "";

		// estado_disponibilidad
		$this->estado_disponibilidad->LinkCustomAttributes = "";
		$this->estado_disponibilidad->HrefValue = "";
		$this->estado_disponibilidad->TooltipValue = "";

		// cantidad_camas
		$this->cantidad_camas->LinkCustomAttributes = "";
		$this->cantidad_camas->HrefValue = "";
		$this->cantidad_camas->TooltipValue = "";

		// nombre_reporta
		$this->nombre_reporta->LinkCustomAttributes = "";
		$this->nombre_reporta->HrefValue = "";
		$this->nombre_reporta->TooltipValue = "";

		// telefono
		$this->telefono->LinkCustomAttributes = "";
		$this->telefono->HrefValue = "";
		$this->telefono->TooltipValue = "";

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

		// id_disponibilida
		$this->id_disponibilida->EditAttrs["class"] = "form-control";
		$this->id_disponibilida->EditCustomAttributes = "";
		$this->id_disponibilida->EditValue = $this->id_disponibilida->CurrentValue;
		$this->id_disponibilida->EditValue = FormatNumber($this->id_disponibilida->EditValue, 0, -2, -2, -2);
		$this->id_disponibilida->ViewCustomAttributes = "";

		// fecha_disponibilidad
		// cod_hospital

		$this->cod_hospital->EditAttrs["class"] = "form-control";
		$this->cod_hospital->EditCustomAttributes = "";

		// servicio_disponibilidad
		$this->servicio_disponibilidad->EditAttrs["class"] = "form-control";
		$this->servicio_disponibilidad->EditCustomAttributes = "";

		// estado_disponibilidad
		$this->estado_disponibilidad->EditCustomAttributes = "";
		$this->estado_disponibilidad->EditValue = $this->estado_disponibilidad->options(FALSE);

		// cantidad_camas
		$this->cantidad_camas->EditAttrs["class"] = "form-control";
		$this->cantidad_camas->EditCustomAttributes = "";
		if (!$this->cantidad_camas->Raw)
			$this->cantidad_camas->CurrentValue = HtmlDecode($this->cantidad_camas->CurrentValue);
		$this->cantidad_camas->EditValue = $this->cantidad_camas->CurrentValue;
		$this->cantidad_camas->PlaceHolder = RemoveHtml($this->cantidad_camas->caption());

		// nombre_reporta
		$this->nombre_reporta->EditAttrs["class"] = "form-control";
		$this->nombre_reporta->EditCustomAttributes = "";
		if (!$this->nombre_reporta->Raw)
			$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
		$this->nombre_reporta->EditValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

		// telefono
		$this->telefono->EditAttrs["class"] = "form-control";
		$this->telefono->EditCustomAttributes = "";
		if (!$this->telefono->Raw)
			$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
		$this->telefono->EditValue = $this->telefono->CurrentValue;
		$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

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
					$doc->exportCaption($this->id_disponibilida);
					$doc->exportCaption($this->fecha_disponibilidad);
					$doc->exportCaption($this->cod_hospital);
					$doc->exportCaption($this->servicio_disponibilidad);
					$doc->exportCaption($this->estado_disponibilidad);
					$doc->exportCaption($this->cantidad_camas);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->telefono);
				} else {
					$doc->exportCaption($this->id_disponibilida);
					$doc->exportCaption($this->fecha_disponibilidad);
					$doc->exportCaption($this->cod_hospital);
					$doc->exportCaption($this->servicio_disponibilidad);
					$doc->exportCaption($this->estado_disponibilidad);
					$doc->exportCaption($this->cantidad_camas);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->telefono);
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
						$doc->exportField($this->id_disponibilida);
						$doc->exportField($this->fecha_disponibilidad);
						$doc->exportField($this->cod_hospital);
						$doc->exportField($this->servicio_disponibilidad);
						$doc->exportField($this->estado_disponibilidad);
						$doc->exportField($this->cantidad_camas);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->telefono);
					} else {
						$doc->exportField($this->id_disponibilida);
						$doc->exportField($this->fecha_disponibilidad);
						$doc->exportField($this->cod_hospital);
						$doc->exportField($this->servicio_disponibilidad);
						$doc->exportField($this->estado_disponibilidad);
						$doc->exportField($this->cantidad_camas);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->telefono);
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