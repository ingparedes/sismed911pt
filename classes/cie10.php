<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for cie10
 */
class cie10 extends DbTable
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
	public $codigo_cie;
	public $diagnostico;
	public $nivel;
	public $grupo;
	public $sexo;
	public $clasificacion;
	public $cod;
	public $notifica;
	public $soat;
	public $diagnostico_en;
	public $diagnostico_pr;
	public $diagnostico_fr;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'cie10';
		$this->TableName = 'cie10';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"cie10\"";
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

		// codigo_cie
		$this->codigo_cie = new DbField('cie10', 'cie10', 'x_codigo_cie', 'codigo_cie', '"codigo_cie"', '"codigo_cie"', 200, 6, -1, FALSE, '"codigo_cie"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->codigo_cie->IsPrimaryKey = TRUE; // Primary key field
		$this->codigo_cie->Nullable = FALSE; // NOT NULL field
		$this->codigo_cie->Required = TRUE; // Required field
		$this->codigo_cie->Sortable = TRUE; // Allow sort
		$this->fields['codigo_cie'] = &$this->codigo_cie;

		// diagnostico
		$this->diagnostico = new DbField('cie10', 'cie10', 'x_diagnostico', 'diagnostico', '"diagnostico"', '"diagnostico"', 201, 0, -1, FALSE, '"diagnostico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->diagnostico->Sortable = TRUE; // Allow sort
		$this->fields['diagnostico'] = &$this->diagnostico;

		// nivel
		$this->nivel = new DbField('cie10', 'cie10', 'x_nivel', 'nivel', '"nivel"', '"nivel"', 200, 25, -1, FALSE, '"nivel"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nivel->Sortable = TRUE; // Allow sort
		$this->fields['nivel'] = &$this->nivel;

		// grupo
		$this->grupo = new DbField('cie10', 'cie10', 'x_grupo', 'grupo', '"grupo"', '"grupo"', 200, 25, -1, FALSE, '"grupo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grupo->Sortable = TRUE; // Allow sort
		$this->fields['grupo'] = &$this->grupo;

		// sexo
		$this->sexo = new DbField('cie10', 'cie10', 'x_sexo', 'sexo', '"sexo"', '"sexo"', 200, 1, -1, FALSE, '"sexo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sexo->Sortable = TRUE; // Allow sort
		$this->fields['sexo'] = &$this->sexo;

		// clasificacion
		$this->clasificacion = new DbField('cie10', 'cie10', 'x_clasificacion', 'clasificacion', '"clasificacion"', 'CAST("clasificacion" AS varchar(255))', 2, 2, -1, FALSE, '"clasificacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->clasificacion->Sortable = TRUE; // Allow sort
		$this->clasificacion->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['clasificacion'] = &$this->clasificacion;

		// cod
		$this->cod = new DbField('cie10', 'cie10', 'x_cod', 'cod', '"cod"', '"cod"', 200, 3, -1, FALSE, '"cod"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod->Sortable = TRUE; // Allow sort
		$this->fields['cod'] = &$this->cod;

		// notifica
		$this->notifica = new DbField('cie10', 'cie10', 'x_notifica', 'notifica', '"notifica"', 'CAST("notifica" AS varchar(255))', 2, 2, -1, FALSE, '"notifica"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->notifica->Sortable = TRUE; // Allow sort
		$this->notifica->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['notifica'] = &$this->notifica;

		// soat
		$this->soat = new DbField('cie10', 'cie10', 'x_soat', 'soat', '"soat"', '"soat"', 200, 2, -1, FALSE, '"soat"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->soat->Sortable = TRUE; // Allow sort
		$this->fields['soat'] = &$this->soat;

		// diagnostico_en
		$this->diagnostico_en = new DbField('cie10', 'cie10', 'x_diagnostico_en', 'diagnostico_en', '"diagnostico_en"', '"diagnostico_en"', 201, 0, -1, FALSE, '"diagnostico_en"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->diagnostico_en->Sortable = TRUE; // Allow sort
		$this->fields['diagnostico_en'] = &$this->diagnostico_en;

		// diagnostico_pr
		$this->diagnostico_pr = new DbField('cie10', 'cie10', 'x_diagnostico_pr', 'diagnostico_pr', '"diagnostico_pr"', '"diagnostico_pr"', 201, 0, -1, FALSE, '"diagnostico_pr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->diagnostico_pr->Sortable = TRUE; // Allow sort
		$this->fields['diagnostico_pr'] = &$this->diagnostico_pr;

		// diagnostico_fr
		$this->diagnostico_fr = new DbField('cie10', 'cie10', 'x_diagnostico_fr', 'diagnostico_fr', '"diagnostico_fr"', '"diagnostico_fr"', 201, 0, -1, FALSE, '"diagnostico_fr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->diagnostico_fr->Sortable = TRUE; // Allow sort
		$this->fields['diagnostico_fr'] = &$this->diagnostico_fr;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"cie10\"";
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
			if (array_key_exists('codigo_cie', $rs))
				AddFilter($where, QuotedName('codigo_cie', $this->Dbid) . '=' . QuotedValue($rs['codigo_cie'], $this->codigo_cie->DataType, $this->Dbid));
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
		$this->codigo_cie->DbValue = $row['codigo_cie'];
		$this->diagnostico->DbValue = $row['diagnostico'];
		$this->nivel->DbValue = $row['nivel'];
		$this->grupo->DbValue = $row['grupo'];
		$this->sexo->DbValue = $row['sexo'];
		$this->clasificacion->DbValue = $row['clasificacion'];
		$this->cod->DbValue = $row['cod'];
		$this->notifica->DbValue = $row['notifica'];
		$this->soat->DbValue = $row['soat'];
		$this->diagnostico_en->DbValue = $row['diagnostico_en'];
		$this->diagnostico_pr->DbValue = $row['diagnostico_pr'];
		$this->diagnostico_fr->DbValue = $row['diagnostico_fr'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"codigo_cie\" = '@codigo_cie@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('codigo_cie', $row) ? $row['codigo_cie'] : NULL;
		else
			$val = $this->codigo_cie->OldValue !== NULL ? $this->codigo_cie->OldValue : $this->codigo_cie->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@codigo_cie@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "cie10list.php";
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
		if ($pageName == "cie10view.php")
			return $Language->phrase("View");
		elseif ($pageName == "cie10edit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "cie10add.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "cie10list.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("cie10view.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("cie10view.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "cie10add.php?" . $this->getUrlParm($parm);
		else
			$url = "cie10add.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("cie10edit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("cie10add.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("cie10delete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "codigo_cie:" . JsonEncode($this->codigo_cie->CurrentValue, "string");
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
		if ($this->codigo_cie->CurrentValue != NULL) {
			$url .= "codigo_cie=" . urlencode($this->codigo_cie->CurrentValue);
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
			if (Param("codigo_cie") !== NULL)
				$arKeys[] = Param("codigo_cie");
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
				$this->codigo_cie->CurrentValue = $key;
			else
				$this->codigo_cie->OldValue = $key;
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
		$this->codigo_cie->setDbValue($rs->fields('codigo_cie'));
		$this->diagnostico->setDbValue($rs->fields('diagnostico'));
		$this->nivel->setDbValue($rs->fields('nivel'));
		$this->grupo->setDbValue($rs->fields('grupo'));
		$this->sexo->setDbValue($rs->fields('sexo'));
		$this->clasificacion->setDbValue($rs->fields('clasificacion'));
		$this->cod->setDbValue($rs->fields('cod'));
		$this->notifica->setDbValue($rs->fields('notifica'));
		$this->soat->setDbValue($rs->fields('soat'));
		$this->diagnostico_en->setDbValue($rs->fields('diagnostico_en'));
		$this->diagnostico_pr->setDbValue($rs->fields('diagnostico_pr'));
		$this->diagnostico_fr->setDbValue($rs->fields('diagnostico_fr'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// codigo_cie
		// diagnostico
		// nivel
		// grupo
		// sexo
		// clasificacion
		// cod
		// notifica
		// soat
		// diagnostico_en
		// diagnostico_pr
		// diagnostico_fr
		// codigo_cie

		$this->codigo_cie->ViewValue = $this->codigo_cie->CurrentValue;
		$this->codigo_cie->ViewCustomAttributes = "";

		// diagnostico
		$this->diagnostico->ViewValue = $this->diagnostico->CurrentValue;
		$this->diagnostico->ViewCustomAttributes = "";

		// nivel
		$this->nivel->ViewValue = $this->nivel->CurrentValue;
		$this->nivel->ViewCustomAttributes = "";

		// grupo
		$this->grupo->ViewValue = $this->grupo->CurrentValue;
		$this->grupo->ViewCustomAttributes = "";

		// sexo
		$this->sexo->ViewValue = $this->sexo->CurrentValue;
		$this->sexo->ViewCustomAttributes = "";

		// clasificacion
		$this->clasificacion->ViewValue = $this->clasificacion->CurrentValue;
		$this->clasificacion->ViewValue = FormatNumber($this->clasificacion->ViewValue, 0, -2, -2, -2);
		$this->clasificacion->ViewCustomAttributes = "";

		// cod
		$this->cod->ViewValue = $this->cod->CurrentValue;
		$this->cod->ViewCustomAttributes = "";

		// notifica
		$this->notifica->ViewValue = $this->notifica->CurrentValue;
		$this->notifica->ViewValue = FormatNumber($this->notifica->ViewValue, 0, -2, -2, -2);
		$this->notifica->ViewCustomAttributes = "";

		// soat
		$this->soat->ViewValue = $this->soat->CurrentValue;
		$this->soat->ViewCustomAttributes = "";

		// diagnostico_en
		$this->diagnostico_en->ViewValue = $this->diagnostico_en->CurrentValue;
		$this->diagnostico_en->ViewCustomAttributes = "";

		// diagnostico_pr
		$this->diagnostico_pr->ViewValue = $this->diagnostico_pr->CurrentValue;
		$this->diagnostico_pr->ViewCustomAttributes = "";

		// diagnostico_fr
		$this->diagnostico_fr->ViewValue = $this->diagnostico_fr->CurrentValue;
		$this->diagnostico_fr->ViewCustomAttributes = "";

		// codigo_cie
		$this->codigo_cie->LinkCustomAttributes = "";
		$this->codigo_cie->HrefValue = "";
		$this->codigo_cie->TooltipValue = "";

		// diagnostico
		$this->diagnostico->LinkCustomAttributes = "";
		$this->diagnostico->HrefValue = "";
		$this->diagnostico->TooltipValue = "";

		// nivel
		$this->nivel->LinkCustomAttributes = "";
		$this->nivel->HrefValue = "";
		$this->nivel->TooltipValue = "";

		// grupo
		$this->grupo->LinkCustomAttributes = "";
		$this->grupo->HrefValue = "";
		$this->grupo->TooltipValue = "";

		// sexo
		$this->sexo->LinkCustomAttributes = "";
		$this->sexo->HrefValue = "";
		$this->sexo->TooltipValue = "";

		// clasificacion
		$this->clasificacion->LinkCustomAttributes = "";
		$this->clasificacion->HrefValue = "";
		$this->clasificacion->TooltipValue = "";

		// cod
		$this->cod->LinkCustomAttributes = "";
		$this->cod->HrefValue = "";
		$this->cod->TooltipValue = "";

		// notifica
		$this->notifica->LinkCustomAttributes = "";
		$this->notifica->HrefValue = "";
		$this->notifica->TooltipValue = "";

		// soat
		$this->soat->LinkCustomAttributes = "";
		$this->soat->HrefValue = "";
		$this->soat->TooltipValue = "";

		// diagnostico_en
		$this->diagnostico_en->LinkCustomAttributes = "";
		$this->diagnostico_en->HrefValue = "";
		$this->diagnostico_en->TooltipValue = "";

		// diagnostico_pr
		$this->diagnostico_pr->LinkCustomAttributes = "";
		$this->diagnostico_pr->HrefValue = "";
		$this->diagnostico_pr->TooltipValue = "";

		// diagnostico_fr
		$this->diagnostico_fr->LinkCustomAttributes = "";
		$this->diagnostico_fr->HrefValue = "";
		$this->diagnostico_fr->TooltipValue = "";

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

		// codigo_cie
		$this->codigo_cie->EditAttrs["class"] = "form-control";
		$this->codigo_cie->EditCustomAttributes = "";
		if (!$this->codigo_cie->Raw)
			$this->codigo_cie->CurrentValue = HtmlDecode($this->codigo_cie->CurrentValue);
		$this->codigo_cie->EditValue = $this->codigo_cie->CurrentValue;
		$this->codigo_cie->PlaceHolder = RemoveHtml($this->codigo_cie->caption());

		// diagnostico
		$this->diagnostico->EditAttrs["class"] = "form-control";
		$this->diagnostico->EditCustomAttributes = "";
		if (!$this->diagnostico->Raw)
			$this->diagnostico->CurrentValue = HtmlDecode($this->diagnostico->CurrentValue);
		$this->diagnostico->EditValue = $this->diagnostico->CurrentValue;
		$this->diagnostico->PlaceHolder = RemoveHtml($this->diagnostico->caption());

		// nivel
		$this->nivel->EditAttrs["class"] = "form-control";
		$this->nivel->EditCustomAttributes = "";
		if (!$this->nivel->Raw)
			$this->nivel->CurrentValue = HtmlDecode($this->nivel->CurrentValue);
		$this->nivel->EditValue = $this->nivel->CurrentValue;
		$this->nivel->PlaceHolder = RemoveHtml($this->nivel->caption());

		// grupo
		$this->grupo->EditAttrs["class"] = "form-control";
		$this->grupo->EditCustomAttributes = "";
		if (!$this->grupo->Raw)
			$this->grupo->CurrentValue = HtmlDecode($this->grupo->CurrentValue);
		$this->grupo->EditValue = $this->grupo->CurrentValue;
		$this->grupo->PlaceHolder = RemoveHtml($this->grupo->caption());

		// sexo
		$this->sexo->EditAttrs["class"] = "form-control";
		$this->sexo->EditCustomAttributes = "";
		if (!$this->sexo->Raw)
			$this->sexo->CurrentValue = HtmlDecode($this->sexo->CurrentValue);
		$this->sexo->EditValue = $this->sexo->CurrentValue;
		$this->sexo->PlaceHolder = RemoveHtml($this->sexo->caption());

		// clasificacion
		$this->clasificacion->EditAttrs["class"] = "form-control";
		$this->clasificacion->EditCustomAttributes = "";
		$this->clasificacion->EditValue = $this->clasificacion->CurrentValue;
		$this->clasificacion->PlaceHolder = RemoveHtml($this->clasificacion->caption());

		// cod
		$this->cod->EditAttrs["class"] = "form-control";
		$this->cod->EditCustomAttributes = "";
		if (!$this->cod->Raw)
			$this->cod->CurrentValue = HtmlDecode($this->cod->CurrentValue);
		$this->cod->EditValue = $this->cod->CurrentValue;
		$this->cod->PlaceHolder = RemoveHtml($this->cod->caption());

		// notifica
		$this->notifica->EditAttrs["class"] = "form-control";
		$this->notifica->EditCustomAttributes = "";
		$this->notifica->EditValue = $this->notifica->CurrentValue;
		$this->notifica->PlaceHolder = RemoveHtml($this->notifica->caption());

		// soat
		$this->soat->EditAttrs["class"] = "form-control";
		$this->soat->EditCustomAttributes = "";
		if (!$this->soat->Raw)
			$this->soat->CurrentValue = HtmlDecode($this->soat->CurrentValue);
		$this->soat->EditValue = $this->soat->CurrentValue;
		$this->soat->PlaceHolder = RemoveHtml($this->soat->caption());

		// diagnostico_en
		$this->diagnostico_en->EditAttrs["class"] = "form-control";
		$this->diagnostico_en->EditCustomAttributes = "";
		$this->diagnostico_en->EditValue = $this->diagnostico_en->CurrentValue;
		$this->diagnostico_en->PlaceHolder = RemoveHtml($this->diagnostico_en->caption());

		// diagnostico_pr
		$this->diagnostico_pr->EditAttrs["class"] = "form-control";
		$this->diagnostico_pr->EditCustomAttributes = "";
		$this->diagnostico_pr->EditValue = $this->diagnostico_pr->CurrentValue;
		$this->diagnostico_pr->PlaceHolder = RemoveHtml($this->diagnostico_pr->caption());

		// diagnostico_fr
		$this->diagnostico_fr->EditAttrs["class"] = "form-control";
		$this->diagnostico_fr->EditCustomAttributes = "";
		$this->diagnostico_fr->EditValue = $this->diagnostico_fr->CurrentValue;
		$this->diagnostico_fr->PlaceHolder = RemoveHtml($this->diagnostico_fr->caption());

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
					$doc->exportCaption($this->codigo_cie);
					$doc->exportCaption($this->diagnostico);
					$doc->exportCaption($this->nivel);
					$doc->exportCaption($this->grupo);
					$doc->exportCaption($this->sexo);
					$doc->exportCaption($this->clasificacion);
					$doc->exportCaption($this->cod);
					$doc->exportCaption($this->notifica);
					$doc->exportCaption($this->soat);
					$doc->exportCaption($this->diagnostico_en);
					$doc->exportCaption($this->diagnostico_pr);
					$doc->exportCaption($this->diagnostico_fr);
				} else {
					$doc->exportCaption($this->codigo_cie);
					$doc->exportCaption($this->diagnostico);
					$doc->exportCaption($this->nivel);
					$doc->exportCaption($this->grupo);
					$doc->exportCaption($this->sexo);
					$doc->exportCaption($this->clasificacion);
					$doc->exportCaption($this->cod);
					$doc->exportCaption($this->notifica);
					$doc->exportCaption($this->soat);
					$doc->exportCaption($this->diagnostico_en);
					$doc->exportCaption($this->diagnostico_pr);
					$doc->exportCaption($this->diagnostico_fr);
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
						$doc->exportField($this->codigo_cie);
						$doc->exportField($this->diagnostico);
						$doc->exportField($this->nivel);
						$doc->exportField($this->grupo);
						$doc->exportField($this->sexo);
						$doc->exportField($this->clasificacion);
						$doc->exportField($this->cod);
						$doc->exportField($this->notifica);
						$doc->exportField($this->soat);
						$doc->exportField($this->diagnostico_en);
						$doc->exportField($this->diagnostico_pr);
						$doc->exportField($this->diagnostico_fr);
					} else {
						$doc->exportField($this->codigo_cie);
						$doc->exportField($this->diagnostico);
						$doc->exportField($this->nivel);
						$doc->exportField($this->grupo);
						$doc->exportField($this->sexo);
						$doc->exportField($this->clasificacion);
						$doc->exportField($this->cod);
						$doc->exportField($this->notifica);
						$doc->exportField($this->soat);
						$doc->exportField($this->diagnostico_en);
						$doc->exportField($this->diagnostico_pr);
						$doc->exportField($this->diagnostico_fr);
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