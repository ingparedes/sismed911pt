<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for recordatorio_taller
 */
class recordatorio_taller extends DbTable
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
	public $id;
	public $vehiculo;
	public $servicio;
	public $frecuencia_km;
	public $frecuencia_tiempo;
	public $anticipo_km;
	public $anticipo_tiempo;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'recordatorio_taller';
		$this->TableName = 'recordatorio_taller';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"recordatorio_taller\"";
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

		// id
		$this->id = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_id', 'id', '"id"', 'CAST("id" AS varchar(255))', 3, 4, -1, FALSE, '"id"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Nullable = FALSE; // NOT NULL field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// vehiculo
		$this->vehiculo = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_vehiculo', 'vehiculo', '"vehiculo"', '"vehiculo"', 200, 20, -1, FALSE, '"vehiculo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->vehiculo->Sortable = TRUE; // Allow sort
		$this->vehiculo->SelectMultiple = TRUE; // Multiple select
		switch ($CurrentLanguage) {
			case "en":
				$this->vehiculo->Lookup = new Lookup('vehiculo', 'ambulancias', FALSE, 'id_ambulancias', ["cod_ambulancias","marca","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->vehiculo->Lookup = new Lookup('vehiculo', 'ambulancias', FALSE, 'id_ambulancias', ["cod_ambulancias","marca","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->vehiculo->Lookup = new Lookup('vehiculo', 'ambulancias', FALSE, 'id_ambulancias', ["cod_ambulancias","marca","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->vehiculo->Lookup = new Lookup('vehiculo', 'ambulancias', FALSE, 'id_ambulancias', ["cod_ambulancias","marca","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->vehiculo->Lookup = new Lookup('vehiculo', 'ambulancias', FALSE, 'id_ambulancias', ["cod_ambulancias","marca","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['vehiculo'] = &$this->vehiculo;

		// servicio
		$this->servicio = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_servicio', 'servicio', '"servicio"', 'CAST("servicio" AS varchar(255))', 3, 4, -1, FALSE, '"servicio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->servicio->Sortable = TRUE; // Allow sort
		$this->servicio->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->servicio->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->servicio->Lookup = new Lookup('servicio', 'catalogo_serv_taller', FALSE, 'id_catalogo', ["servicio_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->servicio->Lookup = new Lookup('servicio', 'catalogo_serv_taller', FALSE, 'id_catalogo', ["servicio_fr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->servicio->Lookup = new Lookup('servicio', 'catalogo_serv_taller', FALSE, 'id_catalogo', ["servicio_pr","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->servicio->Lookup = new Lookup('servicio', 'catalogo_serv_taller', FALSE, 'id_catalogo', ["servicio_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->servicio->Lookup = new Lookup('servicio', 'catalogo_serv_taller', FALSE, 'id_catalogo', ["servicio_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->servicio->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['servicio'] = &$this->servicio;

		// frecuencia_km
		$this->frecuencia_km = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_frecuencia_km', 'frecuencia_km', '"frecuencia_km"', '"frecuencia_km"', 200, 10, -1, FALSE, '"frecuencia_km"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->frecuencia_km->Sortable = TRUE; // Allow sort
		$this->fields['frecuencia_km'] = &$this->frecuencia_km;

		// frecuencia_tiempo
		$this->frecuencia_tiempo = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_frecuencia_tiempo', 'frecuencia_tiempo', '"frecuencia_tiempo"', '"frecuencia_tiempo"', 200, 10, -1, FALSE, '"frecuencia_tiempo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->frecuencia_tiempo->Sortable = TRUE; // Allow sort
		$this->fields['frecuencia_tiempo'] = &$this->frecuencia_tiempo;

		// anticipo_km
		$this->anticipo_km = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_anticipo_km', 'anticipo_km', '"anticipo_km"', '"anticipo_km"', 200, 10, -1, FALSE, '"anticipo_km"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anticipo_km->Sortable = TRUE; // Allow sort
		$this->fields['anticipo_km'] = &$this->anticipo_km;

		// anticipo_tiempo
		$this->anticipo_tiempo = new DbField('recordatorio_taller', 'recordatorio_taller', 'x_anticipo_tiempo', 'anticipo_tiempo', '"anticipo_tiempo"', '"anticipo_tiempo"', 200, 10, -1, FALSE, '"anticipo_tiempo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anticipo_tiempo->Sortable = TRUE; // Allow sort
		$this->fields['anticipo_tiempo'] = &$this->anticipo_tiempo;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"recordatorio_taller\"";
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
			$this->id->setDbValue($conn->getOne("SELECT currval('recordatorio_taller_id_seq'::regclass)"));
			$rs['id'] = $this->id->DbValue;
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
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
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
		$this->id->DbValue = $row['id'];
		$this->vehiculo->DbValue = $row['vehiculo'];
		$this->servicio->DbValue = $row['servicio'];
		$this->frecuencia_km->DbValue = $row['frecuencia_km'];
		$this->frecuencia_tiempo->DbValue = $row['frecuencia_tiempo'];
		$this->anticipo_km->DbValue = $row['anticipo_km'];
		$this->anticipo_tiempo->DbValue = $row['anticipo_tiempo'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id\" = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "recordatorio_tallerlist.php";
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
		if ($pageName == "recordatorio_tallerview.php")
			return $Language->phrase("View");
		elseif ($pageName == "recordatorio_talleredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "recordatorio_talleradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "recordatorio_tallerlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("recordatorio_tallerview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("recordatorio_tallerview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "recordatorio_talleradd.php?" . $this->getUrlParm($parm);
		else
			$url = "recordatorio_talleradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("recordatorio_talleredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("recordatorio_talleradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("recordatorio_tallerdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
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
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
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
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
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
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->vehiculo->setDbValue($rs->fields('vehiculo'));
		$this->servicio->setDbValue($rs->fields('servicio'));
		$this->frecuencia_km->setDbValue($rs->fields('frecuencia_km'));
		$this->frecuencia_tiempo->setDbValue($rs->fields('frecuencia_tiempo'));
		$this->anticipo_km->setDbValue($rs->fields('anticipo_km'));
		$this->anticipo_tiempo->setDbValue($rs->fields('anticipo_tiempo'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// vehiculo
		// servicio
		// frecuencia_km
		// frecuencia_tiempo
		// anticipo_km
		// anticipo_tiempo
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// vehiculo
		$curVal = strval($this->vehiculo->CurrentValue);
		if ($curVal != "") {
			$this->vehiculo->ViewValue = $this->vehiculo->lookupCacheOption($curVal);
			if ($this->vehiculo->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "\"id_ambulancias\"" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->vehiculo->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->vehiculo->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->vehiculo->ViewValue->add($this->vehiculo->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->vehiculo->ViewValue = $this->vehiculo->CurrentValue;
				}
			}
		} else {
			$this->vehiculo->ViewValue = NULL;
		}
		$this->vehiculo->ViewCustomAttributes = "";

		// servicio
		$curVal = strval($this->servicio->CurrentValue);
		if ($curVal != "") {
			$this->servicio->ViewValue = $this->servicio->lookupCacheOption($curVal);
			if ($this->servicio->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"id_catalogo\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->servicio->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->servicio->ViewValue = $this->servicio->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->servicio->ViewValue = $this->servicio->CurrentValue;
				}
			}
		} else {
			$this->servicio->ViewValue = NULL;
		}
		$this->servicio->ViewCustomAttributes = "";

		// frecuencia_km
		$this->frecuencia_km->ViewValue = $this->frecuencia_km->CurrentValue;
		$this->frecuencia_km->ViewCustomAttributes = "";

		// frecuencia_tiempo
		$this->frecuencia_tiempo->ViewValue = $this->frecuencia_tiempo->CurrentValue;
		$this->frecuencia_tiempo->ViewCustomAttributes = "";

		// anticipo_km
		$this->anticipo_km->ViewValue = $this->anticipo_km->CurrentValue;
		$this->anticipo_km->ViewCustomAttributes = "";

		// anticipo_tiempo
		$this->anticipo_tiempo->ViewValue = $this->anticipo_tiempo->CurrentValue;
		$this->anticipo_tiempo->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// vehiculo
		$this->vehiculo->LinkCustomAttributes = "";
		$this->vehiculo->HrefValue = "";
		$this->vehiculo->TooltipValue = "";

		// servicio
		$this->servicio->LinkCustomAttributes = "";
		$this->servicio->HrefValue = "";
		$this->servicio->TooltipValue = "";

		// frecuencia_km
		$this->frecuencia_km->LinkCustomAttributes = "";
		$this->frecuencia_km->HrefValue = "";
		$this->frecuencia_km->TooltipValue = "";

		// frecuencia_tiempo
		$this->frecuencia_tiempo->LinkCustomAttributes = "";
		$this->frecuencia_tiempo->HrefValue = "";
		$this->frecuencia_tiempo->TooltipValue = "";

		// anticipo_km
		$this->anticipo_km->LinkCustomAttributes = "";
		$this->anticipo_km->HrefValue = "";
		$this->anticipo_km->TooltipValue = "";

		// anticipo_tiempo
		$this->anticipo_tiempo->LinkCustomAttributes = "";
		$this->anticipo_tiempo->HrefValue = "";
		$this->anticipo_tiempo->TooltipValue = "";

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

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// vehiculo
		$this->vehiculo->EditAttrs["class"] = "form-control";
		$this->vehiculo->EditCustomAttributes = "";

		// servicio
		$this->servicio->EditAttrs["class"] = "form-control";
		$this->servicio->EditCustomAttributes = "";

		// frecuencia_km
		$this->frecuencia_km->EditAttrs["class"] = "form-control";
		$this->frecuencia_km->EditCustomAttributes = "";
		if (!$this->frecuencia_km->Raw)
			$this->frecuencia_km->CurrentValue = HtmlDecode($this->frecuencia_km->CurrentValue);
		$this->frecuencia_km->EditValue = $this->frecuencia_km->CurrentValue;
		$this->frecuencia_km->PlaceHolder = RemoveHtml($this->frecuencia_km->caption());

		// frecuencia_tiempo
		$this->frecuencia_tiempo->EditAttrs["class"] = "form-control";
		$this->frecuencia_tiempo->EditCustomAttributes = "";
		if (!$this->frecuencia_tiempo->Raw)
			$this->frecuencia_tiempo->CurrentValue = HtmlDecode($this->frecuencia_tiempo->CurrentValue);
		$this->frecuencia_tiempo->EditValue = $this->frecuencia_tiempo->CurrentValue;
		$this->frecuencia_tiempo->PlaceHolder = RemoveHtml($this->frecuencia_tiempo->caption());

		// anticipo_km
		$this->anticipo_km->EditAttrs["class"] = "form-control";
		$this->anticipo_km->EditCustomAttributes = "";
		if (!$this->anticipo_km->Raw)
			$this->anticipo_km->CurrentValue = HtmlDecode($this->anticipo_km->CurrentValue);
		$this->anticipo_km->EditValue = $this->anticipo_km->CurrentValue;
		$this->anticipo_km->PlaceHolder = RemoveHtml($this->anticipo_km->caption());

		// anticipo_tiempo
		$this->anticipo_tiempo->EditAttrs["class"] = "form-control";
		$this->anticipo_tiempo->EditCustomAttributes = "";
		if (!$this->anticipo_tiempo->Raw)
			$this->anticipo_tiempo->CurrentValue = HtmlDecode($this->anticipo_tiempo->CurrentValue);
		$this->anticipo_tiempo->EditValue = $this->anticipo_tiempo->CurrentValue;
		$this->anticipo_tiempo->PlaceHolder = RemoveHtml($this->anticipo_tiempo->caption());

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
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->vehiculo);
					$doc->exportCaption($this->servicio);
					$doc->exportCaption($this->frecuencia_km);
					$doc->exportCaption($this->frecuencia_tiempo);
					$doc->exportCaption($this->anticipo_km);
					$doc->exportCaption($this->anticipo_tiempo);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->vehiculo);
					$doc->exportCaption($this->servicio);
					$doc->exportCaption($this->frecuencia_km);
					$doc->exportCaption($this->frecuencia_tiempo);
					$doc->exportCaption($this->anticipo_km);
					$doc->exportCaption($this->anticipo_tiempo);
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
						$doc->exportField($this->id);
						$doc->exportField($this->vehiculo);
						$doc->exportField($this->servicio);
						$doc->exportField($this->frecuencia_km);
						$doc->exportField($this->frecuencia_tiempo);
						$doc->exportField($this->anticipo_km);
						$doc->exportField($this->anticipo_tiempo);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->vehiculo);
						$doc->exportField($this->servicio);
						$doc->exportField($this->frecuencia_km);
						$doc->exportField($this->frecuencia_tiempo);
						$doc->exportField($this->anticipo_km);
						$doc->exportField($this->anticipo_tiempo);
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