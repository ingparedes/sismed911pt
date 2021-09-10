<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for censo_camas
 */
class censo_camas extends DbTable
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
	public $id_cama;
	public $id_hospital;
	public $fecha_reporte;
	public $nombre_reporta;
	public $tele_reporta;
	public $id_bloque;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'censo_camas';
		$this->TableName = 'censo_camas';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"censo_camas\"";
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

		// id_cama
		$this->id_cama = new DbField('censo_camas', 'censo_camas', 'x_id_cama', 'id_cama', '"id_cama"', 'CAST("id_cama" AS varchar(255))', 2, 2, -1, FALSE, '"id_cama"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_cama->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_cama->IsPrimaryKey = TRUE; // Primary key field
		$this->id_cama->Nullable = FALSE; // NOT NULL field
		$this->id_cama->Sortable = TRUE; // Allow sort
		$this->id_cama->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_cama'] = &$this->id_cama;

		// id_hospital
		$this->id_hospital = new DbField('censo_camas', 'censo_camas', 'x_id_hospital', 'id_hospital', '"id_hospital"', '"id_hospital"', 200, 16, -1, FALSE, '"EV__id_hospital"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->id_hospital->Sortable = TRUE; // Allow sort
		$this->id_hospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->id_hospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->id_hospital->Lookup = new Lookup('id_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->id_hospital->Lookup = new Lookup('id_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->id_hospital->Lookup = new Lookup('id_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->id_hospital->Lookup = new Lookup('id_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->id_hospital->Lookup = new Lookup('id_hospital', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['id_hospital'] = &$this->id_hospital;

		// fecha_reporte
		$this->fecha_reporte = new DbField('censo_camas', 'censo_camas', 'x_fecha_reporte', 'fecha_reporte', '"fecha_reporte"', CastDateFieldForLike("\"fecha_reporte\"", 9, "DB"), 135, 8, 9, FALSE, '"fecha_reporte"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_reporte->Sortable = TRUE; // Allow sort
		$this->fields['fecha_reporte'] = &$this->fecha_reporte;

		// nombre_reporta
		$this->nombre_reporta = new DbField('censo_camas', 'censo_camas', 'x_nombre_reporta', 'nombre_reporta', '"nombre_reporta"', '"nombre_reporta"', 200, 60, -1, FALSE, '"nombre_reporta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_reporta->Sortable = TRUE; // Allow sort
		$this->fields['nombre_reporta'] = &$this->nombre_reporta;

		// tele_reporta
		$this->tele_reporta = new DbField('censo_camas', 'censo_camas', 'x_tele_reporta', 'tele_reporta', '"tele_reporta"', '"tele_reporta"', 200, 30, -1, FALSE, '"tele_reporta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tele_reporta->Sortable = TRUE; // Allow sort
		$this->fields['tele_reporta'] = &$this->tele_reporta;

		// id_bloque
		$this->id_bloque = new DbField('censo_camas', 'censo_camas', 'x_id_bloque', 'id_bloque', '"id_bloque"', 'CAST("id_bloque" AS varchar(255))', 2, 2, -1, FALSE, '"id_bloque"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->id_bloque->Sortable = TRUE; // Allow sort
		$this->id_bloque->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_bloque'] = &$this->id_bloque;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"censo_camas\"";
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
					"SELECT *, (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"censo_camas\".\"id_hospital\" LIMIT 1) AS \"EV__id_hospital\" FROM \"censo_camas\"" .
					") \"TMP_TABLE\"";
				break;
			case "fr":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"censo_camas\".\"id_hospital\" LIMIT 1) AS \"EV__id_hospital\" FROM \"censo_camas\"" .
					") \"TMP_TABLE\"";
				break;
			case "pt":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"censo_camas\".\"id_hospital\" LIMIT 1) AS \"EV__id_hospital\" FROM \"censo_camas\"" .
					") \"TMP_TABLE\"";
				break;
			case "es":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"censo_camas\".\"id_hospital\" LIMIT 1) AS \"EV__id_hospital\" FROM \"censo_camas\"" .
					") \"TMP_TABLE\"";
				break;
			default:
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"nombre_hospital\" FROM \"hospitalesgeneral\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_hospital\" = \"censo_camas\".\"id_hospital\" LIMIT 1) AS \"EV__id_hospital\" FROM \"censo_camas\"" .
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
		if ($this->id_hospital->AdvancedSearch->SearchValue != "" ||
			$this->id_hospital->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->id_hospital->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->id_hospital->VirtualExpression . " "))
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
			$this->id_cama->setDbValue($conn->getOne("SELECT currval('senso_camas_id_cama_seq'::regclass)"));
			$rs['id_cama'] = $this->id_cama->DbValue;
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
			if (array_key_exists('id_cama', $rs))
				AddFilter($where, QuotedName('id_cama', $this->Dbid) . '=' . QuotedValue($rs['id_cama'], $this->id_cama->DataType, $this->Dbid));
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
		$this->id_cama->DbValue = $row['id_cama'];
		$this->id_hospital->DbValue = $row['id_hospital'];
		$this->fecha_reporte->DbValue = $row['fecha_reporte'];
		$this->nombre_reporta->DbValue = $row['nombre_reporta'];
		$this->tele_reporta->DbValue = $row['tele_reporta'];
		$this->id_bloque->DbValue = $row['id_bloque'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_cama\" = @id_cama@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_cama', $row) ? $row['id_cama'] : NULL;
		else
			$val = $this->id_cama->OldValue !== NULL ? $this->id_cama->OldValue : $this->id_cama->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_cama@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "censo_camaslist.php";
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
		if ($pageName == "censo_camasview.php")
			return $Language->phrase("View");
		elseif ($pageName == "censo_camasedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "censo_camasadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "censo_camaslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("censo_camasview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("censo_camasview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "censo_camasadd.php?" . $this->getUrlParm($parm);
		else
			$url = "censo_camasadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("censo_camasedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("censo_camasadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("censo_camasdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_cama:" . JsonEncode($this->id_cama->CurrentValue, "number");
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
		if ($this->id_cama->CurrentValue != NULL) {
			$url .= "id_cama=" . urlencode($this->id_cama->CurrentValue);
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
			if (Param("id_cama") !== NULL)
				$arKeys[] = Param("id_cama");
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
				$this->id_cama->CurrentValue = $key;
			else
				$this->id_cama->OldValue = $key;
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
		$this->id_cama->setDbValue($rs->fields('id_cama'));
		$this->id_hospital->setDbValue($rs->fields('id_hospital'));
		$this->fecha_reporte->setDbValue($rs->fields('fecha_reporte'));
		$this->nombre_reporta->setDbValue($rs->fields('nombre_reporta'));
		$this->tele_reporta->setDbValue($rs->fields('tele_reporta'));
		$this->id_bloque->setDbValue($rs->fields('id_bloque'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_cama
		// id_hospital
		// fecha_reporte
		// nombre_reporta
		// tele_reporta
		// id_bloque
		// id_cama

		$this->id_cama->ViewValue = $this->id_cama->CurrentValue;
		$this->id_cama->ViewCustomAttributes = "";

		// id_hospital
		if ($this->id_hospital->VirtualValue != "") {
			$this->id_hospital->ViewValue = $this->id_hospital->VirtualValue;
		} else {
			$curVal = strval($this->id_hospital->CurrentValue);
			if ($curVal != "") {
				$this->id_hospital->ViewValue = $this->id_hospital->lookupCacheOption($curVal);
				if ($this->id_hospital->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"id_hospital\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->id_hospital->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->id_hospital->ViewValue = $this->id_hospital->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->id_hospital->ViewValue = $this->id_hospital->CurrentValue;
					}
				}
			} else {
				$this->id_hospital->ViewValue = NULL;
			}
		}
		$this->id_hospital->ViewCustomAttributes = "";

		// fecha_reporte
		$this->fecha_reporte->ViewValue = $this->fecha_reporte->CurrentValue;
		$this->fecha_reporte->ViewValue = FormatDateTime($this->fecha_reporte->ViewValue, 9);
		$this->fecha_reporte->ViewCustomAttributes = "";

		// nombre_reporta
		$this->nombre_reporta->ViewValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->ViewCustomAttributes = "";

		// tele_reporta
		$this->tele_reporta->ViewValue = $this->tele_reporta->CurrentValue;
		$this->tele_reporta->ViewCustomAttributes = "";

		// id_bloque
		$this->id_bloque->ViewValue = $this->id_bloque->CurrentValue;
		$this->id_bloque->ViewValue = FormatNumber($this->id_bloque->ViewValue, 0, -2, -2, -2);
		$this->id_bloque->ViewCustomAttributes = "";

		// id_cama
		$this->id_cama->LinkCustomAttributes = "";
		$this->id_cama->HrefValue = "";
		$this->id_cama->TooltipValue = "";

		// id_hospital
		$this->id_hospital->LinkCustomAttributes = "";
		$this->id_hospital->HrefValue = "";
		$this->id_hospital->TooltipValue = "";

		// fecha_reporte
		$this->fecha_reporte->LinkCustomAttributes = "";
		$this->fecha_reporte->HrefValue = "";
		$this->fecha_reporte->TooltipValue = "";

		// nombre_reporta
		$this->nombre_reporta->LinkCustomAttributes = "";
		$this->nombre_reporta->HrefValue = "";
		$this->nombre_reporta->TooltipValue = "";

		// tele_reporta
		$this->tele_reporta->LinkCustomAttributes = "";
		$this->tele_reporta->HrefValue = "";
		$this->tele_reporta->TooltipValue = "";

		// id_bloque
		$this->id_bloque->LinkCustomAttributes = "";
		$this->id_bloque->HrefValue = "";
		$this->id_bloque->TooltipValue = "";

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

		// id_cama
		$this->id_cama->EditAttrs["class"] = "form-control";
		$this->id_cama->EditCustomAttributes = "";
		$this->id_cama->EditValue = $this->id_cama->CurrentValue;
		$this->id_cama->ViewCustomAttributes = "";

		// id_hospital
		$this->id_hospital->EditAttrs["class"] = "form-control";
		$this->id_hospital->EditCustomAttributes = "";

		// fecha_reporte
		// nombre_reporta

		$this->nombre_reporta->EditAttrs["class"] = "form-control";
		$this->nombre_reporta->EditCustomAttributes = "";
		if (!$this->nombre_reporta->Raw)
			$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
		$this->nombre_reporta->EditValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

		// tele_reporta
		$this->tele_reporta->EditAttrs["class"] = "form-control";
		$this->tele_reporta->EditCustomAttributes = "";
		if (!$this->tele_reporta->Raw)
			$this->tele_reporta->CurrentValue = HtmlDecode($this->tele_reporta->CurrentValue);
		$this->tele_reporta->EditValue = $this->tele_reporta->CurrentValue;
		$this->tele_reporta->PlaceHolder = RemoveHtml($this->tele_reporta->caption());

		// id_bloque
		$this->id_bloque->EditAttrs["class"] = "form-control";
		$this->id_bloque->EditCustomAttributes = "";

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
					$doc->exportCaption($this->id_cama);
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->fecha_reporte);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->tele_reporta);
					$doc->exportCaption($this->id_bloque);
				} else {
					$doc->exportCaption($this->id_cama);
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->fecha_reporte);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->tele_reporta);
					$doc->exportCaption($this->id_bloque);
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
						$doc->exportField($this->id_cama);
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->fecha_reporte);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->tele_reporta);
						$doc->exportField($this->id_bloque);
					} else {
						$doc->exportField($this->id_cama);
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->fecha_reporte);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->tele_reporta);
						$doc->exportField($this->id_bloque);
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