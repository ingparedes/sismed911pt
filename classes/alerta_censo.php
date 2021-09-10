<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for alerta_censo
 */
class alerta_censo extends DbTable
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
	public $id_tiempocenso;
	public $hora1;
	public $hora2;
	public $hora3;
	public $hora4;
	public $t_recordatorio;
	public $texto_recordatorio;
	public $t_notificacion;
	public $texto_notificacion;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'alerta_censo';
		$this->TableName = 'alerta_censo';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"alerta_censo\"";
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

		// id_tiempocenso
		$this->id_tiempocenso = new DbField('alerta_censo', 'alerta_censo', 'x_id_tiempocenso', 'id_tiempocenso', '"id_tiempocenso"', 'CAST("id_tiempocenso" AS varchar(255))', 2, 2, -1, FALSE, '"id_tiempocenso"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_tiempocenso->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_tiempocenso->IsPrimaryKey = TRUE; // Primary key field
		$this->id_tiempocenso->Nullable = FALSE; // NOT NULL field
		$this->id_tiempocenso->Sortable = TRUE; // Allow sort
		$this->id_tiempocenso->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_tiempocenso'] = &$this->id_tiempocenso;

		// hora1
		$this->hora1 = new DbField('alerta_censo', 'alerta_censo', 'x_hora1', 'hora1', '"hora1"', CastDateFieldForLike("\"hora1\"", 0, "DB"), 134, 8, 0, FALSE, '"hora1"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora1->Sortable = TRUE; // Allow sort
		$this->fields['hora1'] = &$this->hora1;

		// hora2
		$this->hora2 = new DbField('alerta_censo', 'alerta_censo', 'x_hora2', 'hora2', '"hora2"', CastDateFieldForLike("\"hora2\"", 1, "DB"), 134, 8, 1, FALSE, '"hora2"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora2->Sortable = TRUE; // Allow sort
		$this->fields['hora2'] = &$this->hora2;

		// hora3
		$this->hora3 = new DbField('alerta_censo', 'alerta_censo', 'x_hora3', 'hora3', '"hora3"', CastDateFieldForLike("\"hora3\"", 1, "DB"), 134, 8, 1, FALSE, '"hora3"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora3->Sortable = TRUE; // Allow sort
		$this->fields['hora3'] = &$this->hora3;

		// hora4
		$this->hora4 = new DbField('alerta_censo', 'alerta_censo', 'x_hora4', 'hora4', '"hora4"', CastDateFieldForLike("\"hora4\"", 1, "DB"), 134, 8, 1, FALSE, '"hora4"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora4->Sortable = TRUE; // Allow sort
		$this->fields['hora4'] = &$this->hora4;

		// t_recordatorio
		$this->t_recordatorio = new DbField('alerta_censo', 'alerta_censo', 'x_t_recordatorio', 't_recordatorio', '"t_recordatorio"', CastDateFieldForLike("\"t_recordatorio\"", 4, "DB"), 134, 8, 4, FALSE, '"t_recordatorio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->t_recordatorio->Sortable = TRUE; // Allow sort
		$this->t_recordatorio->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->t_recordatorio->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->t_recordatorio->Lookup = new Lookup('t_recordatorio', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->t_recordatorio->Lookup = new Lookup('t_recordatorio', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->t_recordatorio->Lookup = new Lookup('t_recordatorio', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->t_recordatorio->Lookup = new Lookup('t_recordatorio', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->t_recordatorio->Lookup = new Lookup('t_recordatorio', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->t_recordatorio->OptionCount = 4;
		$this->t_recordatorio->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $Language->phrase("IncorrectTime"));
		$this->fields['t_recordatorio'] = &$this->t_recordatorio;

		// texto_recordatorio
		$this->texto_recordatorio = new DbField('alerta_censo', 'alerta_censo', 'x_texto_recordatorio', 'texto_recordatorio', '"texto_recordatorio"', '"texto_recordatorio"', 200, 70, 2, FALSE, '"texto_recordatorio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->texto_recordatorio->Sortable = TRUE; // Allow sort
		$this->texto_recordatorio->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $Language->phrase("IncorrectTime"));
		$this->fields['texto_recordatorio'] = &$this->texto_recordatorio;

		// t_notificacion
		$this->t_notificacion = new DbField('alerta_censo', 'alerta_censo', 'x_t_notificacion', 't_notificacion', '"t_notificacion"', CastDateFieldForLike("\"t_notificacion\"", 4, "DB"), 134, 8, 4, FALSE, '"t_notificacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->t_notificacion->Sortable = TRUE; // Allow sort
		$this->t_notificacion->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->t_notificacion->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->t_notificacion->Lookup = new Lookup('t_notificacion', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->t_notificacion->Lookup = new Lookup('t_notificacion', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->t_notificacion->Lookup = new Lookup('t_notificacion', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->t_notificacion->Lookup = new Lookup('t_notificacion', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->t_notificacion->Lookup = new Lookup('t_notificacion', 'alerta_censo', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->t_notificacion->OptionCount = 3;
		$this->t_notificacion->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $Language->phrase("IncorrectTime"));
		$this->fields['t_notificacion'] = &$this->t_notificacion;

		// texto_notificacion
		$this->texto_notificacion = new DbField('alerta_censo', 'alerta_censo', 'x_texto_notificacion', 'texto_notificacion', '"texto_notificacion"', '"texto_notificacion"', 200, 70, -1, FALSE, '"texto_notificacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->texto_notificacion->Sortable = TRUE; // Allow sort
		$this->fields['texto_notificacion'] = &$this->texto_notificacion;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"alerta_censo\"";
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

			// Get insert id if necessary
			$this->id_tiempocenso->setDbValue($conn->getOne("SELECT currval('alerta_censo_id_tiempocenso_seq'::regclass)"));
			$rs['id_tiempocenso'] = $this->id_tiempocenso->DbValue;
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
			if (array_key_exists('id_tiempocenso', $rs))
				AddFilter($where, QuotedName('id_tiempocenso', $this->Dbid) . '=' . QuotedValue($rs['id_tiempocenso'], $this->id_tiempocenso->DataType, $this->Dbid));
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
		$this->id_tiempocenso->DbValue = $row['id_tiempocenso'];
		$this->hora1->DbValue = $row['hora1'];
		$this->hora2->DbValue = $row['hora2'];
		$this->hora3->DbValue = $row['hora3'];
		$this->hora4->DbValue = $row['hora4'];
		$this->t_recordatorio->DbValue = $row['t_recordatorio'];
		$this->texto_recordatorio->DbValue = $row['texto_recordatorio'];
		$this->t_notificacion->DbValue = $row['t_notificacion'];
		$this->texto_notificacion->DbValue = $row['texto_notificacion'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_tiempocenso\" = @id_tiempocenso@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_tiempocenso', $row) ? $row['id_tiempocenso'] : NULL;
		else
			$val = $this->id_tiempocenso->OldValue !== NULL ? $this->id_tiempocenso->OldValue : $this->id_tiempocenso->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_tiempocenso@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "alerta_censolist.php";
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
		if ($pageName == "alerta_censoview.php")
			return $Language->phrase("View");
		elseif ($pageName == "alerta_censoedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "alerta_censoadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "alerta_censolist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("alerta_censoview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("alerta_censoview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "alerta_censoadd.php?" . $this->getUrlParm($parm);
		else
			$url = "alerta_censoadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("alerta_censoedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("alerta_censoadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("alerta_censodelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_tiempocenso:" . JsonEncode($this->id_tiempocenso->CurrentValue, "number");
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
		if ($this->id_tiempocenso->CurrentValue != NULL) {
			$url .= "id_tiempocenso=" . urlencode($this->id_tiempocenso->CurrentValue);
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
			if (Param("id_tiempocenso") !== NULL)
				$arKeys[] = Param("id_tiempocenso");
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
				$this->id_tiempocenso->CurrentValue = $key;
			else
				$this->id_tiempocenso->OldValue = $key;
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
		$this->id_tiempocenso->setDbValue($rs->fields('id_tiempocenso'));
		$this->hora1->setDbValue($rs->fields('hora1'));
		$this->hora2->setDbValue($rs->fields('hora2'));
		$this->hora3->setDbValue($rs->fields('hora3'));
		$this->hora4->setDbValue($rs->fields('hora4'));
		$this->t_recordatorio->setDbValue($rs->fields('t_recordatorio'));
		$this->texto_recordatorio->setDbValue($rs->fields('texto_recordatorio'));
		$this->t_notificacion->setDbValue($rs->fields('t_notificacion'));
		$this->texto_notificacion->setDbValue($rs->fields('texto_notificacion'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_tiempocenso
		// hora1
		// hora2
		// hora3
		// hora4
		// t_recordatorio
		// texto_recordatorio
		// t_notificacion
		// texto_notificacion
		// id_tiempocenso

		$this->id_tiempocenso->ViewValue = $this->id_tiempocenso->CurrentValue;
		$this->id_tiempocenso->ViewCustomAttributes = "";

		// hora1
		$this->hora1->ViewValue = $this->hora1->CurrentValue;
		$this->hora1->ViewValue = FormatDateTime($this->hora1->ViewValue, 0);
		$this->hora1->ViewCustomAttributes = "";

		// hora2
		$this->hora2->ViewValue = $this->hora2->CurrentValue;
		$this->hora2->ViewValue = FormatDateTime($this->hora2->ViewValue, 1);
		$this->hora2->ViewCustomAttributes = "";

		// hora3
		$this->hora3->ViewValue = $this->hora3->CurrentValue;
		$this->hora3->ViewValue = FormatDateTime($this->hora3->ViewValue, 1);
		$this->hora3->ViewCustomAttributes = "";

		// hora4
		$this->hora4->ViewValue = $this->hora4->CurrentValue;
		$this->hora4->ViewValue = FormatDateTime($this->hora4->ViewValue, 1);
		$this->hora4->ViewCustomAttributes = "";

		// t_recordatorio
		if (strval($this->t_recordatorio->CurrentValue) != "") {
			$this->t_recordatorio->ViewValue = $this->t_recordatorio->optionCaption($this->t_recordatorio->CurrentValue);
		} else {
			$this->t_recordatorio->ViewValue = NULL;
		}
		$this->t_recordatorio->ViewCustomAttributes = "";

		// texto_recordatorio
		$this->texto_recordatorio->ViewValue = $this->texto_recordatorio->CurrentValue;
		$this->texto_recordatorio->ViewCustomAttributes = "";

		// t_notificacion
		if (strval($this->t_notificacion->CurrentValue) != "") {
			$this->t_notificacion->ViewValue = $this->t_notificacion->optionCaption($this->t_notificacion->CurrentValue);
		} else {
			$this->t_notificacion->ViewValue = NULL;
		}
		$this->t_notificacion->ViewCustomAttributes = "";

		// texto_notificacion
		$this->texto_notificacion->ViewValue = $this->texto_notificacion->CurrentValue;
		$this->texto_notificacion->ViewCustomAttributes = "";

		// id_tiempocenso
		$this->id_tiempocenso->LinkCustomAttributes = "";
		$this->id_tiempocenso->HrefValue = "";
		$this->id_tiempocenso->TooltipValue = "";

		// hora1
		$this->hora1->LinkCustomAttributes = "";
		$this->hora1->HrefValue = "";
		$this->hora1->TooltipValue = "";

		// hora2
		$this->hora2->LinkCustomAttributes = "";
		$this->hora2->HrefValue = "";
		$this->hora2->TooltipValue = "";

		// hora3
		$this->hora3->LinkCustomAttributes = "";
		$this->hora3->HrefValue = "";
		$this->hora3->TooltipValue = "";

		// hora4
		$this->hora4->LinkCustomAttributes = "";
		$this->hora4->HrefValue = "";
		$this->hora4->TooltipValue = "";

		// t_recordatorio
		$this->t_recordatorio->LinkCustomAttributes = "";
		$this->t_recordatorio->HrefValue = "";
		$this->t_recordatorio->TooltipValue = "";

		// texto_recordatorio
		$this->texto_recordatorio->LinkCustomAttributes = "";
		$this->texto_recordatorio->HrefValue = "";
		$this->texto_recordatorio->TooltipValue = "";

		// t_notificacion
		$this->t_notificacion->LinkCustomAttributes = "";
		$this->t_notificacion->HrefValue = "";
		$this->t_notificacion->TooltipValue = "";

		// texto_notificacion
		$this->texto_notificacion->LinkCustomAttributes = "";
		$this->texto_notificacion->HrefValue = "";
		$this->texto_notificacion->TooltipValue = "";

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

		// id_tiempocenso
		$this->id_tiempocenso->EditAttrs["class"] = "form-control";
		$this->id_tiempocenso->EditCustomAttributes = "";
		$this->id_tiempocenso->EditValue = $this->id_tiempocenso->CurrentValue;
		$this->id_tiempocenso->ViewCustomAttributes = "";

		// hora1
		$this->hora1->EditAttrs["class"] = "form-control";
		$this->hora1->EditCustomAttributes = "";
		$this->hora1->EditValue = $this->hora1->CurrentValue;
		$this->hora1->PlaceHolder = RemoveHtml($this->hora1->caption());

		// hora2
		$this->hora2->EditAttrs["class"] = "form-control";
		$this->hora2->EditCustomAttributes = "";
		$this->hora2->EditValue = $this->hora2->CurrentValue;
		$this->hora2->PlaceHolder = RemoveHtml($this->hora2->caption());

		// hora3
		$this->hora3->EditAttrs["class"] = "form-control";
		$this->hora3->EditCustomAttributes = "";
		$this->hora3->EditValue = $this->hora3->CurrentValue;
		$this->hora3->PlaceHolder = RemoveHtml($this->hora3->caption());

		// hora4
		$this->hora4->EditAttrs["class"] = "form-control";
		$this->hora4->EditCustomAttributes = "";
		$this->hora4->EditValue = $this->hora4->CurrentValue;
		$this->hora4->PlaceHolder = RemoveHtml($this->hora4->caption());

		// t_recordatorio
		$this->t_recordatorio->EditAttrs["class"] = "form-control";
		$this->t_recordatorio->EditCustomAttributes = "";
		$this->t_recordatorio->EditValue = $this->t_recordatorio->options(TRUE);

		// texto_recordatorio
		$this->texto_recordatorio->EditAttrs["class"] = "form-control";
		$this->texto_recordatorio->EditCustomAttributes = "";
		if (!$this->texto_recordatorio->Raw)
			$this->texto_recordatorio->CurrentValue = HtmlDecode($this->texto_recordatorio->CurrentValue);
		$this->texto_recordatorio->EditValue = $this->texto_recordatorio->CurrentValue;
		$this->texto_recordatorio->PlaceHolder = RemoveHtml($this->texto_recordatorio->caption());

		// t_notificacion
		$this->t_notificacion->EditAttrs["class"] = "form-control";
		$this->t_notificacion->EditCustomAttributes = "";
		$this->t_notificacion->EditValue = $this->t_notificacion->options(TRUE);

		// texto_notificacion
		$this->texto_notificacion->EditAttrs["class"] = "form-control";
		$this->texto_notificacion->EditCustomAttributes = "";
		if (!$this->texto_notificacion->Raw)
			$this->texto_notificacion->CurrentValue = HtmlDecode($this->texto_notificacion->CurrentValue);
		$this->texto_notificacion->EditValue = $this->texto_notificacion->CurrentValue;
		$this->texto_notificacion->PlaceHolder = RemoveHtml($this->texto_notificacion->caption());

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
					$doc->exportCaption($this->id_tiempocenso);
					$doc->exportCaption($this->hora1);
					$doc->exportCaption($this->hora2);
					$doc->exportCaption($this->hora3);
					$doc->exportCaption($this->hora4);
					$doc->exportCaption($this->t_recordatorio);
					$doc->exportCaption($this->texto_recordatorio);
					$doc->exportCaption($this->t_notificacion);
					$doc->exportCaption($this->texto_notificacion);
				} else {
					$doc->exportCaption($this->id_tiempocenso);
					$doc->exportCaption($this->hora1);
					$doc->exportCaption($this->hora2);
					$doc->exportCaption($this->hora3);
					$doc->exportCaption($this->hora4);
					$doc->exportCaption($this->t_recordatorio);
					$doc->exportCaption($this->texto_recordatorio);
					$doc->exportCaption($this->t_notificacion);
					$doc->exportCaption($this->texto_notificacion);
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
						$doc->exportField($this->id_tiempocenso);
						$doc->exportField($this->hora1);
						$doc->exportField($this->hora2);
						$doc->exportField($this->hora3);
						$doc->exportField($this->hora4);
						$doc->exportField($this->t_recordatorio);
						$doc->exportField($this->texto_recordatorio);
						$doc->exportField($this->t_notificacion);
						$doc->exportField($this->texto_notificacion);
					} else {
						$doc->exportField($this->id_tiempocenso);
						$doc->exportField($this->hora1);
						$doc->exportField($this->hora2);
						$doc->exportField($this->hora3);
						$doc->exportField($this->hora4);
						$doc->exportField($this->t_recordatorio);
						$doc->exportField($this->texto_recordatorio);
						$doc->exportField($this->t_notificacion);
						$doc->exportField($this->texto_notificacion);
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