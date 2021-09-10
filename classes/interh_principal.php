<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for interh_principal
 */
class interh_principal extends DbTable
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
	public $fechahorainterh;
	public $hospitalorigen;
	public $accioninterh;
	public $cierreinterh;
	public $hospitaldestino;
	public $sede;
	public $nombre_prioridad;
	public $nombre_motivo_es;
	public $nombre_tiposervicion_es;
	public $fecha;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'interh_principal';
		$this->TableName = 'interh_principal';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "\"interh_principal\"";
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
		$this->cod_casointerh = new DbField('interh_principal', 'interh_principal', 'x_cod_casointerh', 'cod_casointerh', '"cod_casointerh"', 'CAST("cod_casointerh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_casointerh->Sortable = TRUE; // Allow sort
		$this->cod_casointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casointerh'] = &$this->cod_casointerh;

		// fechahorainterh
		$this->fechahorainterh = new DbField('interh_principal', 'interh_principal', 'x_fechahorainterh', 'fechahorainterh', '"fechahorainterh"', CastDateFieldForLike("\"fechahorainterh\"", 0, "DB"), 135, 8, 0, FALSE, '"fechahorainterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fechahorainterh->Sortable = TRUE; // Allow sort
		$this->fechahorainterh->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fechahorainterh'] = &$this->fechahorainterh;

		// hospitalorigen
		$this->hospitalorigen = new DbField('interh_principal', 'interh_principal', 'x_hospitalorigen', 'hospitalorigen', '"hospitalorigen"', '"hospitalorigen"', 200, 100, -1, FALSE, '"hospitalorigen"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospitalorigen->Sortable = TRUE; // Allow sort
		$this->fields['hospitalorigen'] = &$this->hospitalorigen;

		// accioninterh
		$this->accioninterh = new DbField('interh_principal', 'interh_principal', 'x_accioninterh', 'accioninterh', '"accioninterh"', 'CAST("accioninterh" AS varchar(255))', 2, 2, -1, FALSE, '"accioninterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->accioninterh->Sortable = TRUE; // Allow sort
		$this->accioninterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['accioninterh'] = &$this->accioninterh;

		// cierreinterh
		$this->cierreinterh = new DbField('interh_principal', 'interh_principal', 'x_cierreinterh', 'cierreinterh', '"cierreinterh"', 'CAST("cierreinterh" AS varchar(255))', 2, 2, -1, FALSE, '"cierreinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cierreinterh->Sortable = TRUE; // Allow sort
		$this->cierreinterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cierreinterh'] = &$this->cierreinterh;

		// hospitaldestino
		$this->hospitaldestino = new DbField('interh_principal', 'interh_principal', 'x_hospitaldestino', 'hospitaldestino', '"hospitaldestino"', '"hospitaldestino"', 200, 100, -1, FALSE, '"hospitaldestino"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospitaldestino->Sortable = TRUE; // Allow sort
		$this->fields['hospitaldestino'] = &$this->hospitaldestino;

		// sede
		$this->sede = new DbField('interh_principal', 'interh_principal', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sede'] = &$this->sede;

		// nombre_prioridad
		$this->nombre_prioridad = new DbField('interh_principal', 'interh_principal', 'x_nombre_prioridad', 'nombre_prioridad', '"nombre_prioridad"', '"nombre_prioridad"', 200, 80, -1, FALSE, '"nombre_prioridad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_prioridad->Sortable = TRUE; // Allow sort
		$this->fields['nombre_prioridad'] = &$this->nombre_prioridad;

		// nombre_motivo_es
		$this->nombre_motivo_es = new DbField('interh_principal', 'interh_principal', 'x_nombre_motivo_es', 'nombre_motivo_es', '"nombre_motivo_es"', '"nombre_motivo_es"', 200, 60, -1, FALSE, '"nombre_motivo_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_motivo_es->Sortable = TRUE; // Allow sort
		$this->fields['nombre_motivo_es'] = &$this->nombre_motivo_es;

		// nombre_tiposervicion_es
		$this->nombre_tiposervicion_es = new DbField('interh_principal', 'interh_principal', 'x_nombre_tiposervicion_es', 'nombre_tiposervicion_es', '"nombre_tiposervicion_es"', '"nombre_tiposervicion_es"', 200, 80, -1, FALSE, '"nombre_tiposervicion_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_tiposervicion_es->Sortable = TRUE; // Allow sort
		$this->fields['nombre_tiposervicion_es'] = &$this->nombre_tiposervicion_es;

		// fecha
		$this->fecha = new DbField('interh_principal', 'interh_principal', 'x_fecha', 'fecha', '"fecha"', CastDateFieldForLike("\"fecha\"", 0, "DB"), 133, 4, 0, FALSE, '"fecha"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha->Sortable = TRUE; // Allow sort
		$this->fecha->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha'] = &$this->fecha;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"interh_principal\"";
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
		$this->fechahorainterh->DbValue = $row['fechahorainterh'];
		$this->hospitalorigen->DbValue = $row['hospitalorigen'];
		$this->accioninterh->DbValue = $row['accioninterh'];
		$this->cierreinterh->DbValue = $row['cierreinterh'];
		$this->hospitaldestino->DbValue = $row['hospitaldestino'];
		$this->sede->DbValue = $row['sede'];
		$this->nombre_prioridad->DbValue = $row['nombre_prioridad'];
		$this->nombre_motivo_es->DbValue = $row['nombre_motivo_es'];
		$this->nombre_tiposervicion_es->DbValue = $row['nombre_tiposervicion_es'];
		$this->fecha->DbValue = $row['fecha'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
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
			return "interh_principallist.php";
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
		if ($pageName == "interh_principalview.php")
			return $Language->phrase("View");
		elseif ($pageName == "interh_principaledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "interh_principaladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "interh_principallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("interh_principalview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("interh_principalview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "interh_principaladd.php?" . $this->getUrlParm($parm);
		else
			$url = "interh_principaladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("interh_principaledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("interh_principaladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("interh_principaldelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
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
		$this->fechahorainterh->setDbValue($rs->fields('fechahorainterh'));
		$this->hospitalorigen->setDbValue($rs->fields('hospitalorigen'));
		$this->accioninterh->setDbValue($rs->fields('accioninterh'));
		$this->cierreinterh->setDbValue($rs->fields('cierreinterh'));
		$this->hospitaldestino->setDbValue($rs->fields('hospitaldestino'));
		$this->sede->setDbValue($rs->fields('sede'));
		$this->nombre_prioridad->setDbValue($rs->fields('nombre_prioridad'));
		$this->nombre_motivo_es->setDbValue($rs->fields('nombre_motivo_es'));
		$this->nombre_tiposervicion_es->setDbValue($rs->fields('nombre_tiposervicion_es'));
		$this->fecha->setDbValue($rs->fields('fecha'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// cod_casointerh
		// fechahorainterh
		// hospitalorigen
		// accioninterh
		// cierreinterh
		// hospitaldestino
		// sede
		// nombre_prioridad
		// nombre_motivo_es
		// nombre_tiposervicion_es
		// fecha
		// cod_casointerh

		$this->cod_casointerh->ViewValue = $this->cod_casointerh->CurrentValue;
		$this->cod_casointerh->ViewValue = FormatNumber($this->cod_casointerh->ViewValue, 0, -2, -2, -2);
		$this->cod_casointerh->ViewCustomAttributes = "";

		// fechahorainterh
		$this->fechahorainterh->ViewValue = $this->fechahorainterh->CurrentValue;
		$this->fechahorainterh->ViewValue = FormatDateTime($this->fechahorainterh->ViewValue, 0);
		$this->fechahorainterh->ViewCustomAttributes = "";

		// hospitalorigen
		$this->hospitalorigen->ViewValue = $this->hospitalorigen->CurrentValue;
		$this->hospitalorigen->ViewCustomAttributes = "";

		// accioninterh
		$this->accioninterh->ViewValue = $this->accioninterh->CurrentValue;
		$this->accioninterh->ViewValue = FormatNumber($this->accioninterh->ViewValue, 0, -2, -2, -2);
		$this->accioninterh->ViewCustomAttributes = "";

		// cierreinterh
		$this->cierreinterh->ViewValue = $this->cierreinterh->CurrentValue;
		$this->cierreinterh->ViewValue = FormatNumber($this->cierreinterh->ViewValue, 0, -2, -2, -2);
		$this->cierreinterh->ViewCustomAttributes = "";

		// hospitaldestino
		$this->hospitaldestino->ViewValue = $this->hospitaldestino->CurrentValue;
		$this->hospitaldestino->ViewCustomAttributes = "";

		// sede
		$this->sede->ViewValue = $this->sede->CurrentValue;
		$this->sede->ViewValue = FormatNumber($this->sede->ViewValue, 0, -2, -2, -2);
		$this->sede->ViewCustomAttributes = "";

		// nombre_prioridad
		$this->nombre_prioridad->ViewValue = $this->nombre_prioridad->CurrentValue;
		$this->nombre_prioridad->ViewCustomAttributes = "";

		// nombre_motivo_es
		$this->nombre_motivo_es->ViewValue = $this->nombre_motivo_es->CurrentValue;
		$this->nombre_motivo_es->ViewCustomAttributes = "";

		// nombre_tiposervicion_es
		$this->nombre_tiposervicion_es->ViewValue = $this->nombre_tiposervicion_es->CurrentValue;
		$this->nombre_tiposervicion_es->ViewCustomAttributes = "";

		// fecha
		$this->fecha->ViewValue = $this->fecha->CurrentValue;
		$this->fecha->ViewValue = FormatDateTime($this->fecha->ViewValue, 0);
		$this->fecha->ViewCustomAttributes = "";

		// cod_casointerh
		$this->cod_casointerh->LinkCustomAttributes = "";
		$this->cod_casointerh->HrefValue = "";
		$this->cod_casointerh->TooltipValue = "";

		// fechahorainterh
		$this->fechahorainterh->LinkCustomAttributes = "";
		$this->fechahorainterh->HrefValue = "";
		$this->fechahorainterh->TooltipValue = "";

		// hospitalorigen
		$this->hospitalorigen->LinkCustomAttributes = "";
		$this->hospitalorigen->HrefValue = "";
		$this->hospitalorigen->TooltipValue = "";

		// accioninterh
		$this->accioninterh->LinkCustomAttributes = "";
		$this->accioninterh->HrefValue = "";
		$this->accioninterh->TooltipValue = "";

		// cierreinterh
		$this->cierreinterh->LinkCustomAttributes = "";
		$this->cierreinterh->HrefValue = "";
		$this->cierreinterh->TooltipValue = "";

		// hospitaldestino
		$this->hospitaldestino->LinkCustomAttributes = "";
		$this->hospitaldestino->HrefValue = "";
		$this->hospitaldestino->TooltipValue = "";

		// sede
		$this->sede->LinkCustomAttributes = "";
		$this->sede->HrefValue = "";
		$this->sede->TooltipValue = "";

		// nombre_prioridad
		$this->nombre_prioridad->LinkCustomAttributes = "";
		$this->nombre_prioridad->HrefValue = "";
		$this->nombre_prioridad->TooltipValue = "";

		// nombre_motivo_es
		$this->nombre_motivo_es->LinkCustomAttributes = "";
		$this->nombre_motivo_es->HrefValue = "";
		$this->nombre_motivo_es->TooltipValue = "";

		// nombre_tiposervicion_es
		$this->nombre_tiposervicion_es->LinkCustomAttributes = "";
		$this->nombre_tiposervicion_es->HrefValue = "";
		$this->nombre_tiposervicion_es->TooltipValue = "";

		// fecha
		$this->fecha->LinkCustomAttributes = "";
		$this->fecha->HrefValue = "";
		$this->fecha->TooltipValue = "";

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

		// fechahorainterh
		$this->fechahorainterh->EditAttrs["class"] = "form-control";
		$this->fechahorainterh->EditCustomAttributes = "";
		$this->fechahorainterh->EditValue = FormatDateTime($this->fechahorainterh->CurrentValue, 8);
		$this->fechahorainterh->PlaceHolder = RemoveHtml($this->fechahorainterh->caption());

		// hospitalorigen
		$this->hospitalorigen->EditAttrs["class"] = "form-control";
		$this->hospitalorigen->EditCustomAttributes = "";
		if (!$this->hospitalorigen->Raw)
			$this->hospitalorigen->CurrentValue = HtmlDecode($this->hospitalorigen->CurrentValue);
		$this->hospitalorigen->EditValue = $this->hospitalorigen->CurrentValue;
		$this->hospitalorigen->PlaceHolder = RemoveHtml($this->hospitalorigen->caption());

		// accioninterh
		$this->accioninterh->EditAttrs["class"] = "form-control";
		$this->accioninterh->EditCustomAttributes = "";
		$this->accioninterh->EditValue = $this->accioninterh->CurrentValue;
		$this->accioninterh->PlaceHolder = RemoveHtml($this->accioninterh->caption());

		// cierreinterh
		$this->cierreinterh->EditAttrs["class"] = "form-control";
		$this->cierreinterh->EditCustomAttributes = "";
		$this->cierreinterh->EditValue = $this->cierreinterh->CurrentValue;
		$this->cierreinterh->PlaceHolder = RemoveHtml($this->cierreinterh->caption());

		// hospitaldestino
		$this->hospitaldestino->EditAttrs["class"] = "form-control";
		$this->hospitaldestino->EditCustomAttributes = "";
		if (!$this->hospitaldestino->Raw)
			$this->hospitaldestino->CurrentValue = HtmlDecode($this->hospitaldestino->CurrentValue);
		$this->hospitaldestino->EditValue = $this->hospitaldestino->CurrentValue;
		$this->hospitaldestino->PlaceHolder = RemoveHtml($this->hospitaldestino->caption());

		// sede
		$this->sede->EditAttrs["class"] = "form-control";
		$this->sede->EditCustomAttributes = "";
		$this->sede->EditValue = $this->sede->CurrentValue;
		$this->sede->PlaceHolder = RemoveHtml($this->sede->caption());

		// nombre_prioridad
		$this->nombre_prioridad->EditAttrs["class"] = "form-control";
		$this->nombre_prioridad->EditCustomAttributes = "";
		if (!$this->nombre_prioridad->Raw)
			$this->nombre_prioridad->CurrentValue = HtmlDecode($this->nombre_prioridad->CurrentValue);
		$this->nombre_prioridad->EditValue = $this->nombre_prioridad->CurrentValue;
		$this->nombre_prioridad->PlaceHolder = RemoveHtml($this->nombre_prioridad->caption());

		// nombre_motivo_es
		$this->nombre_motivo_es->EditAttrs["class"] = "form-control";
		$this->nombre_motivo_es->EditCustomAttributes = "";
		if (!$this->nombre_motivo_es->Raw)
			$this->nombre_motivo_es->CurrentValue = HtmlDecode($this->nombre_motivo_es->CurrentValue);
		$this->nombre_motivo_es->EditValue = $this->nombre_motivo_es->CurrentValue;
		$this->nombre_motivo_es->PlaceHolder = RemoveHtml($this->nombre_motivo_es->caption());

		// nombre_tiposervicion_es
		$this->nombre_tiposervicion_es->EditAttrs["class"] = "form-control";
		$this->nombre_tiposervicion_es->EditCustomAttributes = "";
		if (!$this->nombre_tiposervicion_es->Raw)
			$this->nombre_tiposervicion_es->CurrentValue = HtmlDecode($this->nombre_tiposervicion_es->CurrentValue);
		$this->nombre_tiposervicion_es->EditValue = $this->nombre_tiposervicion_es->CurrentValue;
		$this->nombre_tiposervicion_es->PlaceHolder = RemoveHtml($this->nombre_tiposervicion_es->caption());

		// fecha
		$this->fecha->EditAttrs["class"] = "form-control";
		$this->fecha->EditCustomAttributes = "";
		$this->fecha->EditValue = FormatDateTime($this->fecha->CurrentValue, 8);
		$this->fecha->PlaceHolder = RemoveHtml($this->fecha->caption());

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
					$doc->exportCaption($this->fechahorainterh);
					$doc->exportCaption($this->hospitalorigen);
					$doc->exportCaption($this->accioninterh);
					$doc->exportCaption($this->cierreinterh);
					$doc->exportCaption($this->hospitaldestino);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->nombre_prioridad);
					$doc->exportCaption($this->nombre_motivo_es);
					$doc->exportCaption($this->nombre_tiposervicion_es);
					$doc->exportCaption($this->fecha);
				} else {
					$doc->exportCaption($this->cod_casointerh);
					$doc->exportCaption($this->fechahorainterh);
					$doc->exportCaption($this->hospitalorigen);
					$doc->exportCaption($this->accioninterh);
					$doc->exportCaption($this->cierreinterh);
					$doc->exportCaption($this->hospitaldestino);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->nombre_prioridad);
					$doc->exportCaption($this->nombre_motivo_es);
					$doc->exportCaption($this->nombre_tiposervicion_es);
					$doc->exportCaption($this->fecha);
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
						$doc->exportField($this->fechahorainterh);
						$doc->exportField($this->hospitalorigen);
						$doc->exportField($this->accioninterh);
						$doc->exportField($this->cierreinterh);
						$doc->exportField($this->hospitaldestino);
						$doc->exportField($this->sede);
						$doc->exportField($this->nombre_prioridad);
						$doc->exportField($this->nombre_motivo_es);
						$doc->exportField($this->nombre_tiposervicion_es);
						$doc->exportField($this->fecha);
					} else {
						$doc->exportField($this->cod_casointerh);
						$doc->exportField($this->fechahorainterh);
						$doc->exportField($this->hospitalorigen);
						$doc->exportField($this->accioninterh);
						$doc->exportField($this->cierreinterh);
						$doc->exportField($this->hospitaldestino);
						$doc->exportField($this->sede);
						$doc->exportField($this->nombre_prioridad);
						$doc->exportField($this->nombre_motivo_es);
						$doc->exportField($this->nombre_tiposervicion_es);
						$doc->exportField($this->fecha);
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