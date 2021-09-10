<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for tabla_disp
 */
class tabla_disp extends DbTable
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
	public $fechaactualizada;
	public $id_hospital;
	public $depto_hospital;
	public $provincia_hospital;
	public $municipio_hospital;
	public $nombre_hospital;
	public $nivel_hospital;
	public $camas_hospital;
	public $camas_uci;
	public $camas_ucin;
	public $camas_covid;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tabla_disp';
		$this->TableName = 'tabla_disp';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "\"tabla_disp\"";
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

		// fechaactualizada
		$this->fechaactualizada = new DbField('tabla_disp', 'tabla_disp', 'x_fechaactualizada', 'fechaactualizada', '"fechaactualizada"', CastDateFieldForLike("\"fechaactualizada\"", 109, "DB"), 135, 8, 109, FALSE, '"fechaactualizada"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fechaactualizada->Sortable = TRUE; // Allow sort
		$this->fechaactualizada->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateYMD"));
		$this->fields['fechaactualizada'] = &$this->fechaactualizada;

		// id_hospital
		$this->id_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_id_hospital', 'id_hospital', '"id_hospital"', '"id_hospital"', 200, 16, -1, FALSE, '"id_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_hospital->IsPrimaryKey = TRUE; // Primary key field
		$this->id_hospital->Sortable = TRUE; // Allow sort
		$this->fields['id_hospital'] = &$this->id_hospital;

		// depto_hospital
		$this->depto_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_depto_hospital', 'depto_hospital', '"depto_hospital"', '"depto_hospital"', 200, 25, -1, FALSE, '"depto_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->depto_hospital->Sortable = TRUE; // Allow sort
		$this->depto_hospital->SelectMultiple = TRUE; // Multiple select
		switch ($CurrentLanguage) {
			case "en":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital[]","x_municipio_hospital"], [], [], [], [], '', '');
				break;
			case "fr":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital[]","x_municipio_hospital"], [], [], [], [], '', '');
				break;
			case "pt":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital[]","x_municipio_hospital"], [], [], [], [], '', '');
				break;
			case "es":
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital[]","x_municipio_hospital"], [], [], [], [], '', '');
				break;
			default:
				$this->depto_hospital->Lookup = new Lookup('depto_hospital', 'departamento', FALSE, 'cod_dpto', ["nombre_dpto","","",""], [], ["x_provincia_hospital[]","x_municipio_hospital"], [], [], [], [], '', '');
				break;
		}
		$this->fields['depto_hospital'] = &$this->depto_hospital;

		// provincia_hospital
		$this->provincia_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_provincia_hospital', 'provincia_hospital', '"provincia_hospital"', '"provincia_hospital"', 200, 100, -1, FALSE, '"provincia_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->provincia_hospital->Sortable = TRUE; // Allow sort
		$this->provincia_hospital->SelectMultiple = TRUE; // Multiple select
		switch ($CurrentLanguage) {
			case "en":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital[]"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			case "fr":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital[]"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			case "pt":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital[]"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			case "es":
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital[]"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
			default:
				$this->provincia_hospital->Lookup = new Lookup('provincia_hospital', 'provincias', FALSE, 'cod_provincia', ["nombre_provincia","","",""], ["x_depto_hospital[]"], ["x_municipio_hospital"], ["cod_departamento"], ["x_cod_departamento"], [], [], '', '');
				break;
		}
		$this->fields['provincia_hospital'] = &$this->provincia_hospital;

		// municipio_hospital
		$this->municipio_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_municipio_hospital', 'municipio_hospital', '"municipio_hospital"', '"municipio_hospital"', 200, 100, -1, FALSE, '"municipio_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->municipio_hospital->Sortable = TRUE; // Allow sort
		$this->municipio_hospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->municipio_hospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_depto_hospital[]","x_provincia_hospital[]"], [], ["cod_dpto","cod_provincia"], ["x_cod_dpto","x_cod_provincia"], [], [], '', '');
				break;
			case "fr":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_depto_hospital[]","x_provincia_hospital[]"], [], ["cod_dpto","cod_provincia"], ["x_cod_dpto","x_cod_provincia"], [], [], '', '');
				break;
			case "pt":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_depto_hospital[]","x_provincia_hospital[]"], [], ["cod_dpto","cod_provincia"], ["x_cod_dpto","x_cod_provincia"], [], [], '', '');
				break;
			case "es":
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_depto_hospital[]","x_provincia_hospital[]"], [], ["cod_dpto","cod_provincia"], ["x_cod_dpto","x_cod_provincia"], [], [], '', '');
				break;
			default:
				$this->municipio_hospital->Lookup = new Lookup('municipio_hospital', 'distrito', FALSE, 'cod_distrito', ["nombre_distrito","","",""], ["x_depto_hospital[]","x_provincia_hospital[]"], [], ["cod_dpto","cod_provincia"], ["x_cod_dpto","x_cod_provincia"], [], [], '', '');
				break;
		}
		$this->fields['municipio_hospital'] = &$this->municipio_hospital;

		// nombre_hospital
		$this->nombre_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_nombre_hospital', 'nombre_hospital', '"nombre_hospital"', '"nombre_hospital"', 200, 100, -1, FALSE, '"nombre_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_hospital->Sortable = TRUE; // Allow sort
		$this->fields['nombre_hospital'] = &$this->nombre_hospital;

		// nivel_hospital
		$this->nivel_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_nivel_hospital', 'nivel_hospital', '"nivel_hospital"', '"nivel_hospital"', 200, 100, -1, FALSE, '"nivel_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nivel_hospital->Sortable = TRUE; // Allow sort
		$this->fields['nivel_hospital'] = &$this->nivel_hospital;

		// camas_hospital
		$this->camas_hospital = new DbField('tabla_disp', 'tabla_disp', 'x_camas_hospital', 'camas_hospital', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->camas_hospital->IsCustom = TRUE; // Custom field
		$this->camas_hospital->Sortable = TRUE; // Allow sort
		$this->fields['camas_hospital'] = &$this->camas_hospital;

		// camas_uci
		$this->camas_uci = new DbField('tabla_disp', 'tabla_disp', 'x_camas_uci', 'camas_uci', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->camas_uci->IsCustom = TRUE; // Custom field
		$this->camas_uci->Sortable = TRUE; // Allow sort
		$this->fields['camas_uci'] = &$this->camas_uci;

		// camas_ucin
		$this->camas_ucin = new DbField('tabla_disp', 'tabla_disp', 'x_camas_ucin', 'camas_ucin', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->camas_ucin->IsCustom = TRUE; // Custom field
		$this->camas_ucin->Sortable = TRUE; // Allow sort
		$this->fields['camas_ucin'] = &$this->camas_ucin;

		// camas_covid
		$this->camas_covid = new DbField('tabla_disp', 'tabla_disp', 'x_camas_covid', 'camas_covid', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->camas_covid->IsCustom = TRUE; // Custom field
		$this->camas_covid->Sortable = TRUE; // Allow sort
		$this->fields['camas_covid'] = &$this->camas_covid;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"tabla_disp\"";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS \"camas_hospital\", '' AS \"camas_uci\", '' AS \"camas_ucin\", '' AS \"camas_covid\" FROM " . $this->getSqlFrom();
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
		$this->fechaactualizada->DbValue = $row['fechaactualizada'];
		$this->id_hospital->DbValue = $row['id_hospital'];
		$this->depto_hospital->DbValue = $row['depto_hospital'];
		$this->provincia_hospital->DbValue = $row['provincia_hospital'];
		$this->municipio_hospital->DbValue = $row['municipio_hospital'];
		$this->nombre_hospital->DbValue = $row['nombre_hospital'];
		$this->nivel_hospital->DbValue = $row['nivel_hospital'];
		$this->camas_hospital->DbValue = $row['camas_hospital'];
		$this->camas_uci->DbValue = $row['camas_uci'];
		$this->camas_ucin->DbValue = $row['camas_ucin'];
		$this->camas_covid->DbValue = $row['camas_covid'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
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
			return "tabla_displist.php";
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
		if ($pageName == "tabla_dispview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tabla_dispedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tabla_dispadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tabla_displist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("tabla_dispview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tabla_dispview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "tabla_dispadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tabla_dispadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tabla_dispedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tabla_dispadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tabla_dispdelete.php", $this->getUrlParm());
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
		$this->fechaactualizada->setDbValue($rs->fields('fechaactualizada'));
		$this->id_hospital->setDbValue($rs->fields('id_hospital'));
		$this->depto_hospital->setDbValue($rs->fields('depto_hospital'));
		$this->provincia_hospital->setDbValue($rs->fields('provincia_hospital'));
		$this->municipio_hospital->setDbValue($rs->fields('municipio_hospital'));
		$this->nombre_hospital->setDbValue($rs->fields('nombre_hospital'));
		$this->nivel_hospital->setDbValue($rs->fields('nivel_hospital'));
		$this->camas_hospital->setDbValue($rs->fields('camas_hospital'));
		$this->camas_uci->setDbValue($rs->fields('camas_uci'));
		$this->camas_ucin->setDbValue($rs->fields('camas_ucin'));
		$this->camas_covid->setDbValue($rs->fields('camas_covid'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// fechaactualizada
		// id_hospital
		// depto_hospital
		// provincia_hospital
		// municipio_hospital
		// nombre_hospital
		// nivel_hospital
		// camas_hospital
		// camas_uci
		// camas_ucin
		// camas_covid
		// fechaactualizada

		$this->fechaactualizada->ViewValue = $this->fechaactualizada->CurrentValue;
		$this->fechaactualizada->ViewValue = FormatDateTime($this->fechaactualizada->ViewValue, 109);
		$this->fechaactualizada->ViewCustomAttributes = "";

		// id_hospital
		$this->id_hospital->ViewValue = $this->id_hospital->CurrentValue;
		$this->id_hospital->ViewCustomAttributes = "";

		// depto_hospital
		$curVal = strval($this->depto_hospital->CurrentValue);
		if ($curVal != "") {
			$this->depto_hospital->ViewValue = $this->depto_hospital->lookupCacheOption($curVal);
			if ($this->depto_hospital->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "\"cod_dpto\"" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->depto_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->depto_hospital->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->depto_hospital->ViewValue->add($this->depto_hospital->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
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
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "\"cod_provincia\"" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->provincia_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->provincia_hospital->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->provincia_hospital->ViewValue->add($this->provincia_hospital->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
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

		// nombre_hospital
		$this->nombre_hospital->ViewValue = $this->nombre_hospital->CurrentValue;
		$this->nombre_hospital->CssClass = "font-weight-bold";
		$this->nombre_hospital->ViewCustomAttributes = "";

		// nivel_hospital
		$this->nivel_hospital->ViewValue = $this->nivel_hospital->CurrentValue;
		$this->nivel_hospital->ViewCustomAttributes = "";

		// camas_hospital
		$this->camas_hospital->ViewValue = $this->camas_hospital->CurrentValue;
		$this->camas_hospital->CssClass = "font-weight-bold";
		$this->camas_hospital->ViewCustomAttributes = "";

		// camas_uci
		$this->camas_uci->ViewValue = $this->camas_uci->CurrentValue;
		$this->camas_uci->ViewCustomAttributes = "";

		// camas_ucin
		$this->camas_ucin->ViewValue = $this->camas_ucin->CurrentValue;
		$this->camas_ucin->ViewCustomAttributes = "";

		// camas_covid
		$this->camas_covid->ViewValue = $this->camas_covid->CurrentValue;
		$this->camas_covid->ViewCustomAttributes = "";

		// fechaactualizada
		$this->fechaactualizada->LinkCustomAttributes = "";
		$this->fechaactualizada->HrefValue = "";
		$this->fechaactualizada->TooltipValue = "";

		// id_hospital
		$this->id_hospital->LinkCustomAttributes = "";
		$this->id_hospital->HrefValue = "";
		$this->id_hospital->TooltipValue = "";

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

		// nombre_hospital
		$this->nombre_hospital->LinkCustomAttributes = "";
		$this->nombre_hospital->HrefValue = "";
		$this->nombre_hospital->TooltipValue = "";

		// nivel_hospital
		$this->nivel_hospital->LinkCustomAttributes = "";
		$this->nivel_hospital->HrefValue = "";
		$this->nivel_hospital->TooltipValue = "";

		// camas_hospital
		$this->camas_hospital->LinkCustomAttributes = "";
		$this->camas_hospital->HrefValue = "";
		$this->camas_hospital->TooltipValue = "";

		// camas_uci
		$this->camas_uci->LinkCustomAttributes = "";
		$this->camas_uci->HrefValue = "";
		$this->camas_uci->TooltipValue = "";

		// camas_ucin
		$this->camas_ucin->LinkCustomAttributes = "";
		$this->camas_ucin->HrefValue = "";
		$this->camas_ucin->TooltipValue = "";

		// camas_covid
		$this->camas_covid->LinkCustomAttributes = "";
		$this->camas_covid->HrefValue = "";
		$this->camas_covid->TooltipValue = "";

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

		// fechaactualizada
		$this->fechaactualizada->EditAttrs["class"] = "form-control";
		$this->fechaactualizada->EditCustomAttributes = "";
		$this->fechaactualizada->EditValue = FormatDateTime($this->fechaactualizada->CurrentValue, 109);
		$this->fechaactualizada->PlaceHolder = RemoveHtml($this->fechaactualizada->caption());

		// id_hospital
		$this->id_hospital->EditAttrs["class"] = "form-control";
		$this->id_hospital->EditCustomAttributes = "";
		if (!$this->id_hospital->Raw)
			$this->id_hospital->CurrentValue = HtmlDecode($this->id_hospital->CurrentValue);
		$this->id_hospital->EditValue = $this->id_hospital->CurrentValue;
		$this->id_hospital->PlaceHolder = RemoveHtml($this->id_hospital->caption());

		// depto_hospital
		$this->depto_hospital->EditAttrs["class"] = "form-control";
		$this->depto_hospital->EditCustomAttributes = "";

		// provincia_hospital
		$this->provincia_hospital->EditAttrs["class"] = "form-control";
		$this->provincia_hospital->EditCustomAttributes = "";

		// municipio_hospital
		$this->municipio_hospital->EditAttrs["class"] = "form-control";
		$this->municipio_hospital->EditCustomAttributes = "";

		// nombre_hospital
		$this->nombre_hospital->EditAttrs["class"] = "form-control";
		$this->nombre_hospital->EditCustomAttributes = "";
		if (!$this->nombre_hospital->Raw)
			$this->nombre_hospital->CurrentValue = HtmlDecode($this->nombre_hospital->CurrentValue);
		$this->nombre_hospital->EditValue = $this->nombre_hospital->CurrentValue;
		$this->nombre_hospital->PlaceHolder = RemoveHtml($this->nombre_hospital->caption());

		// nivel_hospital
		$this->nivel_hospital->EditAttrs["class"] = "form-control";
		$this->nivel_hospital->EditCustomAttributes = "";
		if (!$this->nivel_hospital->Raw)
			$this->nivel_hospital->CurrentValue = HtmlDecode($this->nivel_hospital->CurrentValue);
		$this->nivel_hospital->EditValue = $this->nivel_hospital->CurrentValue;
		$this->nivel_hospital->PlaceHolder = RemoveHtml($this->nivel_hospital->caption());

		// camas_hospital
		$this->camas_hospital->EditAttrs["class"] = "form-control";
		$this->camas_hospital->EditCustomAttributes = "";
		$this->camas_hospital->EditValue = $this->camas_hospital->CurrentValue;
		$this->camas_hospital->PlaceHolder = RemoveHtml($this->camas_hospital->caption());

		// camas_uci
		$this->camas_uci->EditAttrs["class"] = "form-control";
		$this->camas_uci->EditCustomAttributes = "";
		$this->camas_uci->EditValue = $this->camas_uci->CurrentValue;
		$this->camas_uci->PlaceHolder = RemoveHtml($this->camas_uci->caption());

		// camas_ucin
		$this->camas_ucin->EditAttrs["class"] = "form-control";
		$this->camas_ucin->EditCustomAttributes = "";
		$this->camas_ucin->EditValue = $this->camas_ucin->CurrentValue;
		$this->camas_ucin->PlaceHolder = RemoveHtml($this->camas_ucin->caption());

		// camas_covid
		$this->camas_covid->EditAttrs["class"] = "form-control";
		$this->camas_covid->EditCustomAttributes = "";
		$this->camas_covid->EditValue = $this->camas_covid->CurrentValue;
		$this->camas_covid->PlaceHolder = RemoveHtml($this->camas_covid->caption());

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
					$doc->exportCaption($this->fechaactualizada);
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->depto_hospital);
					$doc->exportCaption($this->provincia_hospital);
					$doc->exportCaption($this->municipio_hospital);
					$doc->exportCaption($this->nombre_hospital);
					$doc->exportCaption($this->nivel_hospital);
					$doc->exportCaption($this->camas_hospital);
					$doc->exportCaption($this->camas_uci);
					$doc->exportCaption($this->camas_ucin);
					$doc->exportCaption($this->camas_covid);
				} else {
					$doc->exportCaption($this->fechaactualizada);
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->depto_hospital);
					$doc->exportCaption($this->provincia_hospital);
					$doc->exportCaption($this->municipio_hospital);
					$doc->exportCaption($this->nombre_hospital);
					$doc->exportCaption($this->nivel_hospital);
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
						$doc->exportField($this->fechaactualizada);
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->depto_hospital);
						$doc->exportField($this->provincia_hospital);
						$doc->exportField($this->municipio_hospital);
						$doc->exportField($this->nombre_hospital);
						$doc->exportField($this->nivel_hospital);
						$doc->exportField($this->camas_hospital);
						$doc->exportField($this->camas_uci);
						$doc->exportField($this->camas_ucin);
						$doc->exportField($this->camas_covid);
					} else {
						$doc->exportField($this->fechaactualizada);
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->depto_hospital);
						$doc->exportField($this->provincia_hospital);
						$doc->exportField($this->municipio_hospital);
						$doc->exportField($this->nombre_hospital);
						$doc->exportField($this->nivel_hospital);
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

		$segundos=strtotime($this->fechaactualizada->CurrentValue) - strtotime(CurrentDateTime());
		$diferencia_dias=intval($segundos/60/60/24);
	 if ($diferencia_dias < 0 )
			$this->fechaactualizada->ViewAttrs["class"] = "badge bg-danger";
		else
			$this->fechaactualizada->ViewAttrs["class"] = "badge bg-success";

		//if( $this->camas_hospital->CurrentValue == 2)
	//	$this->camas_hospital->ViewAttrs["class"] = "badge bg-success";
	//elseif ( $this->camas_hospital->CurrentValue > 1 and $this->camas_hospital->CurrentValue < 4 )
	//   $this->camas_hospital->ViewAttrs["class"] = "badge bg-warning";
	//else 
	 //  $this->camas_hospital->ViewAttrs["class"] = "badge bg-danger";

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>