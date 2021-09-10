<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for censo_total
 */
class censo_total extends DbTable
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
	public $cod_servicio;
	public $cod_division;
	public $camas_ocupadas;
	public $camas_libres;
	public $camas_fueraservicio;
	public $nombre_reporta;
	public $telefono_reporta;
	public $fecha_reporte;
	public $id_censo;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'censo_total';
		$this->TableName = 'censo_total';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"censo_total\"";
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

		// id_hospital
		$this->id_hospital = new DbField('censo_total', 'censo_total', 'x_id_hospital', 'id_hospital', '"id_hospital"', 'CAST("id_hospital" AS varchar(255))', 2, 2, -1, FALSE, '"id_hospital"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_hospital->Sortable = TRUE; // Allow sort
		$this->id_hospital->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_hospital'] = &$this->id_hospital;

		// cod_servicio
		$this->cod_servicio = new DbField('censo_total', 'censo_total', 'x_cod_servicio', 'cod_servicio', '"cod_servicio"', 'CAST("cod_servicio" AS varchar(255))', 2, 2, -1, FALSE, '"cod_servicio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_servicio->Sortable = TRUE; // Allow sort
		$this->cod_servicio->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_servicio'] = &$this->cod_servicio;

		// cod_division
		$this->cod_division = new DbField('censo_total', 'censo_total', 'x_cod_division', 'cod_division', '"cod_division"', 'CAST("cod_division" AS varchar(255))', 2, 2, -1, FALSE, '"cod_division"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_division->Sortable = TRUE; // Allow sort
		$this->cod_division->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_division'] = &$this->cod_division;

		// camas_ocupadas
		$this->camas_ocupadas = new DbField('censo_total', 'censo_total', 'x_camas_ocupadas', 'camas_ocupadas', '"camas_ocupadas"', 'CAST("camas_ocupadas" AS varchar(255))', 2, 2, -1, FALSE, '"camas_ocupadas"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->camas_ocupadas->Sortable = TRUE; // Allow sort
		$this->camas_ocupadas->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['camas_ocupadas'] = &$this->camas_ocupadas;

		// camas_libres
		$this->camas_libres = new DbField('censo_total', 'censo_total', 'x_camas_libres', 'camas_libres', '"camas_libres"', 'CAST("camas_libres" AS varchar(255))', 2, 2, -1, FALSE, '"camas_libres"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->camas_libres->Sortable = TRUE; // Allow sort
		$this->camas_libres->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['camas_libres'] = &$this->camas_libres;

		// camas_fueraservicio
		$this->camas_fueraservicio = new DbField('censo_total', 'censo_total', 'x_camas_fueraservicio', 'camas_fueraservicio', '"camas_fueraservicio"', 'CAST("camas_fueraservicio" AS varchar(255))', 2, 2, -1, FALSE, '"camas_fueraservicio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->camas_fueraservicio->Sortable = TRUE; // Allow sort
		$this->camas_fueraservicio->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['camas_fueraservicio'] = &$this->camas_fueraservicio;

		// nombre_reporta
		$this->nombre_reporta = new DbField('censo_total', 'censo_total', 'x_nombre_reporta', 'nombre_reporta', '"nombre_reporta"', '"nombre_reporta"', 200, 100, -1, FALSE, '"nombre_reporta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_reporta->Sortable = TRUE; // Allow sort
		$this->fields['nombre_reporta'] = &$this->nombre_reporta;

		// telefono_reporta
		$this->telefono_reporta = new DbField('censo_total', 'censo_total', 'x_telefono_reporta', 'telefono_reporta', '"telefono_reporta"', '"telefono_reporta"', 200, 20, -1, FALSE, '"telefono_reporta"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono_reporta->Sortable = TRUE; // Allow sort
		$this->fields['telefono_reporta'] = &$this->telefono_reporta;

		// fecha_reporte
		$this->fecha_reporte = new DbField('censo_total', 'censo_total', 'x_fecha_reporte', 'fecha_reporte', '"fecha_reporte"', CastDateFieldForLike("\"fecha_reporte\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_reporte"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_reporte->Sortable = TRUE; // Allow sort
		$this->fecha_reporte->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_reporte'] = &$this->fecha_reporte;

		// id_censo
		$this->id_censo = new DbField('censo_total', 'censo_total', 'x_id_censo', 'id_censo', '"id_censo"', 'CAST("id_censo" AS varchar(255))', 2, 2, -1, FALSE, '"id_censo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_censo->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_censo->IsPrimaryKey = TRUE; // Primary key field
		$this->id_censo->Nullable = FALSE; // NOT NULL field
		$this->id_censo->Sortable = TRUE; // Allow sort
		$this->id_censo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_censo'] = &$this->id_censo;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"censo_total\"";
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
			$this->id_censo->setDbValue($conn->getOne("SELECT currval('censo_total_id_censo_seq'::regclass)"));
			$rs['id_censo'] = $this->id_censo->DbValue;
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
			if (array_key_exists('id_censo', $rs))
				AddFilter($where, QuotedName('id_censo', $this->Dbid) . '=' . QuotedValue($rs['id_censo'], $this->id_censo->DataType, $this->Dbid));
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
		$this->id_hospital->DbValue = $row['id_hospital'];
		$this->cod_servicio->DbValue = $row['cod_servicio'];
		$this->cod_division->DbValue = $row['cod_division'];
		$this->camas_ocupadas->DbValue = $row['camas_ocupadas'];
		$this->camas_libres->DbValue = $row['camas_libres'];
		$this->camas_fueraservicio->DbValue = $row['camas_fueraservicio'];
		$this->nombre_reporta->DbValue = $row['nombre_reporta'];
		$this->telefono_reporta->DbValue = $row['telefono_reporta'];
		$this->fecha_reporte->DbValue = $row['fecha_reporte'];
		$this->id_censo->DbValue = $row['id_censo'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_censo\" = @id_censo@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_censo', $row) ? $row['id_censo'] : NULL;
		else
			$val = $this->id_censo->OldValue !== NULL ? $this->id_censo->OldValue : $this->id_censo->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_censo@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "censo_totallist.php";
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
		if ($pageName == "censo_totalview.php")
			return $Language->phrase("View");
		elseif ($pageName == "censo_totaledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "censo_totaladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "censo_totallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("censo_totalview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("censo_totalview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "censo_totaladd.php?" . $this->getUrlParm($parm);
		else
			$url = "censo_totaladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("censo_totaledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("censo_totaladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("censo_totaldelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_censo:" . JsonEncode($this->id_censo->CurrentValue, "number");
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
		if ($this->id_censo->CurrentValue != NULL) {
			$url .= "id_censo=" . urlencode($this->id_censo->CurrentValue);
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
			if (Param("id_censo") !== NULL)
				$arKeys[] = Param("id_censo");
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
				$this->id_censo->CurrentValue = $key;
			else
				$this->id_censo->OldValue = $key;
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
		$this->cod_servicio->setDbValue($rs->fields('cod_servicio'));
		$this->cod_division->setDbValue($rs->fields('cod_division'));
		$this->camas_ocupadas->setDbValue($rs->fields('camas_ocupadas'));
		$this->camas_libres->setDbValue($rs->fields('camas_libres'));
		$this->camas_fueraservicio->setDbValue($rs->fields('camas_fueraservicio'));
		$this->nombre_reporta->setDbValue($rs->fields('nombre_reporta'));
		$this->telefono_reporta->setDbValue($rs->fields('telefono_reporta'));
		$this->fecha_reporte->setDbValue($rs->fields('fecha_reporte'));
		$this->id_censo->setDbValue($rs->fields('id_censo'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_hospital
		// cod_servicio
		// cod_division
		// camas_ocupadas
		// camas_libres
		// camas_fueraservicio
		// nombre_reporta
		// telefono_reporta
		// fecha_reporte
		// id_censo
		// id_hospital

		$this->id_hospital->ViewValue = $this->id_hospital->CurrentValue;
		$this->id_hospital->ViewValue = FormatNumber($this->id_hospital->ViewValue, 0, -2, -2, -2);
		$this->id_hospital->ViewCustomAttributes = "";

		// cod_servicio
		$this->cod_servicio->ViewValue = $this->cod_servicio->CurrentValue;
		$this->cod_servicio->ViewValue = FormatNumber($this->cod_servicio->ViewValue, 0, -2, -2, -2);
		$this->cod_servicio->ViewCustomAttributes = "";

		// cod_division
		$this->cod_division->ViewValue = $this->cod_division->CurrentValue;
		$this->cod_division->ViewValue = FormatNumber($this->cod_division->ViewValue, 0, -2, -2, -2);
		$this->cod_division->ViewCustomAttributes = "";

		// camas_ocupadas
		$this->camas_ocupadas->ViewValue = $this->camas_ocupadas->CurrentValue;
		$this->camas_ocupadas->ViewValue = FormatNumber($this->camas_ocupadas->ViewValue, 0, -2, -2, -2);
		$this->camas_ocupadas->ViewCustomAttributes = "";

		// camas_libres
		$this->camas_libres->ViewValue = $this->camas_libres->CurrentValue;
		$this->camas_libres->ViewValue = FormatNumber($this->camas_libres->ViewValue, 0, -2, -2, -2);
		$this->camas_libres->ViewCustomAttributes = "";

		// camas_fueraservicio
		$this->camas_fueraservicio->ViewValue = $this->camas_fueraservicio->CurrentValue;
		$this->camas_fueraservicio->ViewValue = FormatNumber($this->camas_fueraservicio->ViewValue, 0, -2, -2, -2);
		$this->camas_fueraservicio->ViewCustomAttributes = "";

		// nombre_reporta
		$this->nombre_reporta->ViewValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->ViewCustomAttributes = "";

		// telefono_reporta
		$this->telefono_reporta->ViewValue = $this->telefono_reporta->CurrentValue;
		$this->telefono_reporta->ViewCustomAttributes = "";

		// fecha_reporte
		$this->fecha_reporte->ViewValue = $this->fecha_reporte->CurrentValue;
		$this->fecha_reporte->ViewValue = FormatDateTime($this->fecha_reporte->ViewValue, 0);
		$this->fecha_reporte->ViewCustomAttributes = "";

		// id_censo
		$this->id_censo->ViewValue = $this->id_censo->CurrentValue;
		$this->id_censo->ViewCustomAttributes = "";

		// id_hospital
		$this->id_hospital->LinkCustomAttributes = "";
		$this->id_hospital->HrefValue = "";
		$this->id_hospital->TooltipValue = "";

		// cod_servicio
		$this->cod_servicio->LinkCustomAttributes = "";
		$this->cod_servicio->HrefValue = "";
		$this->cod_servicio->TooltipValue = "";

		// cod_division
		$this->cod_division->LinkCustomAttributes = "";
		$this->cod_division->HrefValue = "";
		$this->cod_division->TooltipValue = "";

		// camas_ocupadas
		$this->camas_ocupadas->LinkCustomAttributes = "";
		$this->camas_ocupadas->HrefValue = "";
		$this->camas_ocupadas->TooltipValue = "";

		// camas_libres
		$this->camas_libres->LinkCustomAttributes = "";
		$this->camas_libres->HrefValue = "";
		$this->camas_libres->TooltipValue = "";

		// camas_fueraservicio
		$this->camas_fueraservicio->LinkCustomAttributes = "";
		$this->camas_fueraservicio->HrefValue = "";
		$this->camas_fueraservicio->TooltipValue = "";

		// nombre_reporta
		$this->nombre_reporta->LinkCustomAttributes = "";
		$this->nombre_reporta->HrefValue = "";
		$this->nombre_reporta->TooltipValue = "";

		// telefono_reporta
		$this->telefono_reporta->LinkCustomAttributes = "";
		$this->telefono_reporta->HrefValue = "";
		$this->telefono_reporta->TooltipValue = "";

		// fecha_reporte
		$this->fecha_reporte->LinkCustomAttributes = "";
		$this->fecha_reporte->HrefValue = "";
		$this->fecha_reporte->TooltipValue = "";

		// id_censo
		$this->id_censo->LinkCustomAttributes = "";
		$this->id_censo->HrefValue = "";
		$this->id_censo->TooltipValue = "";

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
		$this->id_hospital->EditValue = $this->id_hospital->CurrentValue;
		$this->id_hospital->PlaceHolder = RemoveHtml($this->id_hospital->caption());

		// cod_servicio
		$this->cod_servicio->EditAttrs["class"] = "form-control";
		$this->cod_servicio->EditCustomAttributes = "";
		$this->cod_servicio->EditValue = $this->cod_servicio->CurrentValue;
		$this->cod_servicio->PlaceHolder = RemoveHtml($this->cod_servicio->caption());

		// cod_division
		$this->cod_division->EditAttrs["class"] = "form-control";
		$this->cod_division->EditCustomAttributes = "";
		$this->cod_division->EditValue = $this->cod_division->CurrentValue;
		$this->cod_division->PlaceHolder = RemoveHtml($this->cod_division->caption());

		// camas_ocupadas
		$this->camas_ocupadas->EditAttrs["class"] = "form-control";
		$this->camas_ocupadas->EditCustomAttributes = "";
		$this->camas_ocupadas->EditValue = $this->camas_ocupadas->CurrentValue;
		$this->camas_ocupadas->PlaceHolder = RemoveHtml($this->camas_ocupadas->caption());

		// camas_libres
		$this->camas_libres->EditAttrs["class"] = "form-control";
		$this->camas_libres->EditCustomAttributes = "";
		$this->camas_libres->EditValue = $this->camas_libres->CurrentValue;
		$this->camas_libres->PlaceHolder = RemoveHtml($this->camas_libres->caption());

		// camas_fueraservicio
		$this->camas_fueraservicio->EditAttrs["class"] = "form-control";
		$this->camas_fueraservicio->EditCustomAttributes = "";
		$this->camas_fueraservicio->EditValue = $this->camas_fueraservicio->CurrentValue;
		$this->camas_fueraservicio->PlaceHolder = RemoveHtml($this->camas_fueraservicio->caption());

		// nombre_reporta
		$this->nombre_reporta->EditAttrs["class"] = "form-control";
		$this->nombre_reporta->EditCustomAttributes = "";
		if (!$this->nombre_reporta->Raw)
			$this->nombre_reporta->CurrentValue = HtmlDecode($this->nombre_reporta->CurrentValue);
		$this->nombre_reporta->EditValue = $this->nombre_reporta->CurrentValue;
		$this->nombre_reporta->PlaceHolder = RemoveHtml($this->nombre_reporta->caption());

		// telefono_reporta
		$this->telefono_reporta->EditAttrs["class"] = "form-control";
		$this->telefono_reporta->EditCustomAttributes = "";
		if (!$this->telefono_reporta->Raw)
			$this->telefono_reporta->CurrentValue = HtmlDecode($this->telefono_reporta->CurrentValue);
		$this->telefono_reporta->EditValue = $this->telefono_reporta->CurrentValue;
		$this->telefono_reporta->PlaceHolder = RemoveHtml($this->telefono_reporta->caption());

		// fecha_reporte
		$this->fecha_reporte->EditAttrs["class"] = "form-control";
		$this->fecha_reporte->EditCustomAttributes = "";
		$this->fecha_reporte->EditValue = FormatDateTime($this->fecha_reporte->CurrentValue, 8);
		$this->fecha_reporte->PlaceHolder = RemoveHtml($this->fecha_reporte->caption());

		// id_censo
		$this->id_censo->EditAttrs["class"] = "form-control";
		$this->id_censo->EditCustomAttributes = "";
		$this->id_censo->EditValue = $this->id_censo->CurrentValue;
		$this->id_censo->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->cod_servicio);
					$doc->exportCaption($this->cod_division);
					$doc->exportCaption($this->camas_ocupadas);
					$doc->exportCaption($this->camas_libres);
					$doc->exportCaption($this->camas_fueraservicio);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->telefono_reporta);
					$doc->exportCaption($this->fecha_reporte);
					$doc->exportCaption($this->id_censo);
				} else {
					$doc->exportCaption($this->id_hospital);
					$doc->exportCaption($this->cod_servicio);
					$doc->exportCaption($this->cod_division);
					$doc->exportCaption($this->camas_ocupadas);
					$doc->exportCaption($this->camas_libres);
					$doc->exportCaption($this->camas_fueraservicio);
					$doc->exportCaption($this->nombre_reporta);
					$doc->exportCaption($this->telefono_reporta);
					$doc->exportCaption($this->fecha_reporte);
					$doc->exportCaption($this->id_censo);
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
						$doc->exportField($this->cod_servicio);
						$doc->exportField($this->cod_division);
						$doc->exportField($this->camas_ocupadas);
						$doc->exportField($this->camas_libres);
						$doc->exportField($this->camas_fueraservicio);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->telefono_reporta);
						$doc->exportField($this->fecha_reporte);
						$doc->exportField($this->id_censo);
					} else {
						$doc->exportField($this->id_hospital);
						$doc->exportField($this->cod_servicio);
						$doc->exportField($this->cod_division);
						$doc->exportField($this->camas_ocupadas);
						$doc->exportField($this->camas_libres);
						$doc->exportField($this->camas_fueraservicio);
						$doc->exportField($this->nombre_reporta);
						$doc->exportField($this->telefono_reporta);
						$doc->exportField($this->fecha_reporte);
						$doc->exportField($this->id_censo);
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