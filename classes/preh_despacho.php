<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for preh_despacho
 */
class preh_despacho extends DbTable
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
	public $cod_casopreh;
	public $fecha;
	public $prioridad;
	public $nombre_es;
	public $tiempo;
	public $cod_ambulancia;
	public $hora_asigna;
	public $hora_llegada;
	public $hora_inicio;
	public $hora_destino;
	public $hora_preposicion;
	public $base;
	public $sede;
	public $cierre;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'preh_despacho';
		$this->TableName = 'preh_despacho';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "\"preh_despacho\"";
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
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// cod_casopreh
		$this->cod_casopreh = new DbField('preh_despacho', 'preh_despacho', 'x_cod_casopreh', 'cod_casopreh', '"cod_casopreh"', 'CAST("cod_casopreh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casopreh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_casopreh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casopreh->Sortable = TRUE; // Allow sort
		$this->cod_casopreh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casopreh'] = &$this->cod_casopreh;

		// fecha
		$this->fecha = new DbField('preh_despacho', 'preh_despacho', 'x_fecha', 'fecha', '"fecha"', CastDateFieldForLike("\"fecha\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha->Sortable = TRUE; // Allow sort
		$this->fecha->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha'] = &$this->fecha;

		// prioridad
		$this->prioridad = new DbField('preh_despacho', 'preh_despacho', 'x_prioridad', 'prioridad', '"prioridad"', 'CAST("prioridad" AS varchar(255))', 2, 2, -1, FALSE, '"prioridad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->prioridad->Sortable = TRUE; // Allow sort
		$this->prioridad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['prioridad'] = &$this->prioridad;

		// nombre_es
		$this->nombre_es = new DbField('preh_despacho', 'preh_despacho', 'x_nombre_es', 'nombre_es', '"nombre_es"', '"nombre_es"', 200, 80, -1, FALSE, '"nombre_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_es->Sortable = TRUE; // Allow sort
		$this->fields['nombre_es'] = &$this->nombre_es;

		// tiempo
		$this->tiempo = new DbField('preh_despacho', 'preh_despacho', 'x_tiempo', 'tiempo', 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60)', 'CAST(ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60) AS varchar(255))', 5, 8, 4, FALSE, 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60)', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tiempo->IsCustom = TRUE; // Custom field
		$this->tiempo->Sortable = TRUE; // Allow sort
		$this->tiempo->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['tiempo'] = &$this->tiempo;

		// cod_ambulancia
		$this->cod_ambulancia = new DbField('preh_despacho', 'preh_despacho', 'x_cod_ambulancia', 'cod_ambulancia', '"cod_ambulancia"', '"cod_ambulancia"', 200, 16, -1, FALSE, '"cod_ambulancia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_ambulancia->Sortable = TRUE; // Allow sort
		$this->fields['cod_ambulancia'] = &$this->cod_ambulancia;

		// hora_asigna
		$this->hora_asigna = new DbField('preh_despacho', 'preh_despacho', 'x_hora_asigna', 'hora_asigna', '"hora_asigna"', CastDateFieldForLike("\"hora_asigna\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_asigna"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_asigna->Sortable = TRUE; // Allow sort
		$this->hora_asigna->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_asigna'] = &$this->hora_asigna;

		// hora_llegada
		$this->hora_llegada = new DbField('preh_despacho', 'preh_despacho', 'x_hora_llegada', 'hora_llegada', '"hora_llegada"', CastDateFieldForLike("\"hora_llegada\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_llegada"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_llegada->Sortable = TRUE; // Allow sort
		$this->hora_llegada->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_llegada'] = &$this->hora_llegada;

		// hora_inicio
		$this->hora_inicio = new DbField('preh_despacho', 'preh_despacho', 'x_hora_inicio', 'hora_inicio', '"hora_inicio"', CastDateFieldForLike("\"hora_inicio\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_inicio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_inicio->Sortable = TRUE; // Allow sort
		$this->hora_inicio->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_inicio'] = &$this->hora_inicio;

		// hora_destino
		$this->hora_destino = new DbField('preh_despacho', 'preh_despacho', 'x_hora_destino', 'hora_destino', '"hora_destino"', CastDateFieldForLike("\"hora_destino\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_destino"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_destino->Sortable = TRUE; // Allow sort
		$this->hora_destino->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_destino'] = &$this->hora_destino;

		// hora_preposicion
		$this->hora_preposicion = new DbField('preh_despacho', 'preh_despacho', 'x_hora_preposicion', 'hora_preposicion', '"hora_preposicion"', CastDateFieldForLike("\"hora_preposicion\"", 0, "DB"), 135, 8, 0, FALSE, '"hora_preposicion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_preposicion->Sortable = TRUE; // Allow sort
		$this->hora_preposicion->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['hora_preposicion'] = &$this->hora_preposicion;

		// base
		$this->base = new DbField('preh_despacho', 'preh_despacho', 'x_base', 'base', '"base"', '"base"', 200, 20, -1, FALSE, '"base"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->base->Sortable = TRUE; // Allow sort
		$this->fields['base'] = &$this->base;

		// sede
		$this->sede = new DbField('preh_despacho', 'preh_despacho', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sede'] = &$this->sede;

		// cierre
		$this->cierre = new DbField('preh_despacho', 'preh_despacho', 'x_cierre', 'cierre', '"cierre"', 'CAST("cierre" AS varchar(255))', 2, 2, -1, FALSE, '"cierre"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cierre->Sortable = TRUE; // Allow sort
		$this->cierre->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cierre'] = &$this->cierre;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"preh_despacho\"";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fecha::timestamp)::interval))/60) AS \"tiempo\" FROM " . $this->getSqlFrom();
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
			if (array_key_exists('cod_casopreh', $rs))
				AddFilter($where, QuotedName('cod_casopreh', $this->Dbid) . '=' . QuotedValue($rs['cod_casopreh'], $this->cod_casopreh->DataType, $this->Dbid));
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
		$this->cod_casopreh->DbValue = $row['cod_casopreh'];
		$this->fecha->DbValue = $row['fecha'];
		$this->prioridad->DbValue = $row['prioridad'];
		$this->nombre_es->DbValue = $row['nombre_es'];
		$this->tiempo->DbValue = $row['tiempo'];
		$this->cod_ambulancia->DbValue = $row['cod_ambulancia'];
		$this->hora_asigna->DbValue = $row['hora_asigna'];
		$this->hora_llegada->DbValue = $row['hora_llegada'];
		$this->hora_inicio->DbValue = $row['hora_inicio'];
		$this->hora_destino->DbValue = $row['hora_destino'];
		$this->hora_preposicion->DbValue = $row['hora_preposicion'];
		$this->base->DbValue = $row['base'];
		$this->sede->DbValue = $row['sede'];
		$this->cierre->DbValue = $row['cierre'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"cod_casopreh\" = @cod_casopreh@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('cod_casopreh', $row) ? $row['cod_casopreh'] : NULL;
		else
			$val = $this->cod_casopreh->OldValue !== NULL ? $this->cod_casopreh->OldValue : $this->cod_casopreh->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_casopreh@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "preh_despacholist.php";
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
		if ($pageName == "preh_despachoview.php")
			return $Language->phrase("View");
		elseif ($pageName == "preh_despachoedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "preh_despachoadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "preh_despacholist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("preh_despachoview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("preh_despachoview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "preh_despachoadd.php?" . $this->getUrlParm($parm);
		else
			$url = "preh_despachoadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("preh_despachoedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("preh_despachoadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("preh_despachodelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "cod_casopreh:" . JsonEncode($this->cod_casopreh->CurrentValue, "number");
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
		if ($this->cod_casopreh->CurrentValue != NULL) {
			$url .= "cod_casopreh=" . urlencode($this->cod_casopreh->CurrentValue);
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
			if (Param("cod_casopreh") !== NULL)
				$arKeys[] = Param("cod_casopreh");
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
				$this->cod_casopreh->CurrentValue = $key;
			else
				$this->cod_casopreh->OldValue = $key;
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
		$this->cod_casopreh->setDbValue($rs->fields('cod_casopreh'));
		$this->fecha->setDbValue($rs->fields('fecha'));
		$this->prioridad->setDbValue($rs->fields('prioridad'));
		$this->nombre_es->setDbValue($rs->fields('nombre_es'));
		$this->tiempo->setDbValue($rs->fields('tiempo'));
		$this->cod_ambulancia->setDbValue($rs->fields('cod_ambulancia'));
		$this->hora_asigna->setDbValue($rs->fields('hora_asigna'));
		$this->hora_llegada->setDbValue($rs->fields('hora_llegada'));
		$this->hora_inicio->setDbValue($rs->fields('hora_inicio'));
		$this->hora_destino->setDbValue($rs->fields('hora_destino'));
		$this->hora_preposicion->setDbValue($rs->fields('hora_preposicion'));
		$this->base->setDbValue($rs->fields('base'));
		$this->sede->setDbValue($rs->fields('sede'));
		$this->cierre->setDbValue($rs->fields('cierre'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// cod_casopreh
		// fecha
		// prioridad
		// nombre_es
		// tiempo
		// cod_ambulancia
		// hora_asigna
		// hora_llegada
		// hora_inicio
		// hora_destino
		// hora_preposicion
		// base
		// sede
		// cierre
		// cod_casopreh

		$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
		$this->cod_casopreh->ViewValue = FormatNumber($this->cod_casopreh->ViewValue, 0, -2, -2, -2);
		$this->cod_casopreh->CssClass = "font-weight-bold";
		$this->cod_casopreh->CellCssStyle .= "text-align: center;";
		$this->cod_casopreh->ViewCustomAttributes = "";

		// fecha
		$this->fecha->ViewValue = $this->fecha->CurrentValue;
		$this->fecha->ViewValue = FormatDateTime($this->fecha->ViewValue, 0);
		$this->fecha->ViewCustomAttributes = "";

		// prioridad
		$this->prioridad->ViewValue = $this->prioridad->CurrentValue;
		$this->prioridad->ViewValue = FormatNumber($this->prioridad->ViewValue, 0, -2, -2, -2);
		$this->prioridad->ViewCustomAttributes = "";

		// nombre_es
		$this->nombre_es->ViewValue = $this->nombre_es->CurrentValue;
		$this->nombre_es->ViewCustomAttributes = "";

		// tiempo
		$this->tiempo->ViewValue = $this->tiempo->CurrentValue;
		$this->tiempo->ViewValue = FormatNumber($this->tiempo->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
		$this->tiempo->ViewCustomAttributes = "";

		// cod_ambulancia
		$this->cod_ambulancia->ViewValue = $this->cod_ambulancia->CurrentValue;
		$this->cod_ambulancia->CellCssStyle .= "text-align: center;";
		$this->cod_ambulancia->ViewCustomAttributes = "";

		// hora_asigna
		$this->hora_asigna->ViewValue = $this->hora_asigna->CurrentValue;
		$this->hora_asigna->ViewValue = FormatDateTime($this->hora_asigna->ViewValue, 0);
		$this->hora_asigna->CellCssStyle .= "text-align: center;";
		$this->hora_asigna->ViewCustomAttributes = "";

		// hora_llegada
		$this->hora_llegada->ViewValue = $this->hora_llegada->CurrentValue;
		$this->hora_llegada->ViewValue = FormatDateTime($this->hora_llegada->ViewValue, 0);
		$this->hora_llegada->ViewCustomAttributes = "";

		// hora_inicio
		$this->hora_inicio->ViewValue = $this->hora_inicio->CurrentValue;
		$this->hora_inicio->ViewValue = FormatDateTime($this->hora_inicio->ViewValue, 0);
		$this->hora_inicio->ViewCustomAttributes = "";

		// hora_destino
		$this->hora_destino->ViewValue = $this->hora_destino->CurrentValue;
		$this->hora_destino->ViewValue = FormatDateTime($this->hora_destino->ViewValue, 0);
		$this->hora_destino->ViewCustomAttributes = "";

		// hora_preposicion
		$this->hora_preposicion->ViewValue = $this->hora_preposicion->CurrentValue;
		$this->hora_preposicion->ViewValue = FormatDateTime($this->hora_preposicion->ViewValue, 0);
		$this->hora_preposicion->ViewCustomAttributes = "";

		// base
		$this->base->ViewValue = $this->base->CurrentValue;
		$this->base->ViewCustomAttributes = "";

		// sede
		$this->sede->ViewValue = $this->sede->CurrentValue;
		$this->sede->ViewValue = FormatNumber($this->sede->ViewValue, 0, -2, -2, -2);
		$this->sede->ViewCustomAttributes = "";

		// cierre
		$this->cierre->ViewValue = $this->cierre->CurrentValue;
		$this->cierre->ViewValue = FormatNumber($this->cierre->ViewValue, 0, -2, -2, -2);
		$this->cierre->ViewCustomAttributes = "";

		// cod_casopreh
		$this->cod_casopreh->LinkCustomAttributes = "";
		$this->cod_casopreh->HrefValue = "";
		$this->cod_casopreh->TooltipValue = "";

		// fecha
		$this->fecha->LinkCustomAttributes = "";
		$this->fecha->HrefValue = "";
		$this->fecha->TooltipValue = "";

		// prioridad
		$this->prioridad->LinkCustomAttributes = "";
		$this->prioridad->HrefValue = "";
		$this->prioridad->TooltipValue = "";

		// nombre_es
		$this->nombre_es->LinkCustomAttributes = "";
		$this->nombre_es->HrefValue = "";
		$this->nombre_es->TooltipValue = "";

		// tiempo
		$this->tiempo->LinkCustomAttributes = "";
		$this->tiempo->HrefValue = "";
		$this->tiempo->TooltipValue = "";

		// cod_ambulancia
		$this->cod_ambulancia->LinkCustomAttributes = "";
		$this->cod_ambulancia->HrefValue = "";
		$this->cod_ambulancia->TooltipValue = "";

		// hora_asigna
		$this->hora_asigna->LinkCustomAttributes = "";
		$this->hora_asigna->HrefValue = "";
		$this->hora_asigna->TooltipValue = "";

		// hora_llegada
		$this->hora_llegada->LinkCustomAttributes = "";
		$this->hora_llegada->HrefValue = "";
		$this->hora_llegada->TooltipValue = "";

		// hora_inicio
		$this->hora_inicio->LinkCustomAttributes = "";
		$this->hora_inicio->HrefValue = "";
		$this->hora_inicio->TooltipValue = "";

		// hora_destino
		$this->hora_destino->LinkCustomAttributes = "";
		$this->hora_destino->HrefValue = "";
		$this->hora_destino->TooltipValue = "";

		// hora_preposicion
		$this->hora_preposicion->LinkCustomAttributes = "";
		$this->hora_preposicion->HrefValue = "";
		$this->hora_preposicion->TooltipValue = "";

		// base
		$this->base->LinkCustomAttributes = "";
		$this->base->HrefValue = "";
		$this->base->TooltipValue = "";

		// sede
		$this->sede->LinkCustomAttributes = "";
		$this->sede->HrefValue = "";
		$this->sede->TooltipValue = "";

		// cierre
		$this->cierre->LinkCustomAttributes = "";
		$this->cierre->HrefValue = "";
		$this->cierre->TooltipValue = "";

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

		// cod_casopreh
		$this->cod_casopreh->EditAttrs["class"] = "form-control";
		$this->cod_casopreh->EditCustomAttributes = "";
		$this->cod_casopreh->EditValue = $this->cod_casopreh->CurrentValue;
		$this->cod_casopreh->PlaceHolder = RemoveHtml($this->cod_casopreh->caption());

		// fecha
		$this->fecha->EditAttrs["class"] = "form-control";
		$this->fecha->EditCustomAttributes = "";
		$this->fecha->EditValue = FormatDateTime($this->fecha->CurrentValue, 8);
		$this->fecha->PlaceHolder = RemoveHtml($this->fecha->caption());

		// prioridad
		$this->prioridad->EditAttrs["class"] = "form-control";
		$this->prioridad->EditCustomAttributes = "";
		$this->prioridad->EditValue = $this->prioridad->CurrentValue;
		$this->prioridad->PlaceHolder = RemoveHtml($this->prioridad->caption());

		// nombre_es
		$this->nombre_es->EditAttrs["class"] = "form-control";
		$this->nombre_es->EditCustomAttributes = "";
		if (!$this->nombre_es->Raw)
			$this->nombre_es->CurrentValue = HtmlDecode($this->nombre_es->CurrentValue);
		$this->nombre_es->EditValue = $this->nombre_es->CurrentValue;
		$this->nombre_es->PlaceHolder = RemoveHtml($this->nombre_es->caption());

		// tiempo
		$this->tiempo->EditAttrs["class"] = "form-control";
		$this->tiempo->EditCustomAttributes = "";
		$this->tiempo->EditValue = $this->tiempo->CurrentValue;
		$this->tiempo->PlaceHolder = RemoveHtml($this->tiempo->caption());
		if (strval($this->tiempo->EditValue) != "" && is_numeric($this->tiempo->EditValue))
			$this->tiempo->EditValue = FormatNumber($this->tiempo->EditValue, -2, -1, -2, 0);
		

		// cod_ambulancia
		$this->cod_ambulancia->EditAttrs["class"] = "form-control";
		$this->cod_ambulancia->EditCustomAttributes = "";
		if (!$this->cod_ambulancia->Raw)
			$this->cod_ambulancia->CurrentValue = HtmlDecode($this->cod_ambulancia->CurrentValue);
		$this->cod_ambulancia->EditValue = $this->cod_ambulancia->CurrentValue;
		$this->cod_ambulancia->PlaceHolder = RemoveHtml($this->cod_ambulancia->caption());

		// hora_asigna
		$this->hora_asigna->EditAttrs["class"] = "form-control";
		$this->hora_asigna->EditCustomAttributes = "";
		$this->hora_asigna->EditValue = FormatDateTime($this->hora_asigna->CurrentValue, 8);
		$this->hora_asigna->PlaceHolder = RemoveHtml($this->hora_asigna->caption());

		// hora_llegada
		$this->hora_llegada->EditAttrs["class"] = "form-control";
		$this->hora_llegada->EditCustomAttributes = "";
		$this->hora_llegada->EditValue = FormatDateTime($this->hora_llegada->CurrentValue, 8);
		$this->hora_llegada->PlaceHolder = RemoveHtml($this->hora_llegada->caption());

		// hora_inicio
		$this->hora_inicio->EditAttrs["class"] = "form-control";
		$this->hora_inicio->EditCustomAttributes = "";
		$this->hora_inicio->EditValue = FormatDateTime($this->hora_inicio->CurrentValue, 8);
		$this->hora_inicio->PlaceHolder = RemoveHtml($this->hora_inicio->caption());

		// hora_destino
		$this->hora_destino->EditAttrs["class"] = "form-control";
		$this->hora_destino->EditCustomAttributes = "";
		$this->hora_destino->EditValue = FormatDateTime($this->hora_destino->CurrentValue, 8);
		$this->hora_destino->PlaceHolder = RemoveHtml($this->hora_destino->caption());

		// hora_preposicion
		$this->hora_preposicion->EditAttrs["class"] = "form-control";
		$this->hora_preposicion->EditCustomAttributes = "";
		$this->hora_preposicion->EditValue = FormatDateTime($this->hora_preposicion->CurrentValue, 8);
		$this->hora_preposicion->PlaceHolder = RemoveHtml($this->hora_preposicion->caption());

		// base
		$this->base->EditAttrs["class"] = "form-control";
		$this->base->EditCustomAttributes = "";
		if (!$this->base->Raw)
			$this->base->CurrentValue = HtmlDecode($this->base->CurrentValue);
		$this->base->EditValue = $this->base->CurrentValue;
		$this->base->PlaceHolder = RemoveHtml($this->base->caption());

		// sede
		$this->sede->EditAttrs["class"] = "form-control";
		$this->sede->EditCustomAttributes = "";
		$this->sede->EditValue = $this->sede->CurrentValue;
		$this->sede->PlaceHolder = RemoveHtml($this->sede->caption());

		// cierre
		$this->cierre->EditAttrs["class"] = "form-control";
		$this->cierre->EditCustomAttributes = "";
		$this->cierre->EditValue = $this->cierre->CurrentValue;
		$this->cierre->PlaceHolder = RemoveHtml($this->cierre->caption());

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
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->fecha);
					$doc->exportCaption($this->prioridad);
					$doc->exportCaption($this->nombre_es);
					$doc->exportCaption($this->tiempo);
					$doc->exportCaption($this->cod_ambulancia);
					$doc->exportCaption($this->hora_asigna);
					$doc->exportCaption($this->hora_llegada);
					$doc->exportCaption($this->hora_inicio);
					$doc->exportCaption($this->hora_destino);
					$doc->exportCaption($this->hora_preposicion);
					$doc->exportCaption($this->base);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->cierre);
				} else {
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->fecha);
					$doc->exportCaption($this->prioridad);
					$doc->exportCaption($this->nombre_es);
					$doc->exportCaption($this->tiempo);
					$doc->exportCaption($this->cod_ambulancia);
					$doc->exportCaption($this->hora_asigna);
					$doc->exportCaption($this->hora_llegada);
					$doc->exportCaption($this->hora_inicio);
					$doc->exportCaption($this->hora_destino);
					$doc->exportCaption($this->hora_preposicion);
					$doc->exportCaption($this->base);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->cierre);
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
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->fecha);
						$doc->exportField($this->prioridad);
						$doc->exportField($this->nombre_es);
						$doc->exportField($this->tiempo);
						$doc->exportField($this->cod_ambulancia);
						$doc->exportField($this->hora_asigna);
						$doc->exportField($this->hora_llegada);
						$doc->exportField($this->hora_inicio);
						$doc->exportField($this->hora_destino);
						$doc->exportField($this->hora_preposicion);
						$doc->exportField($this->base);
						$doc->exportField($this->sede);
						$doc->exportField($this->cierre);
					} else {
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->fecha);
						$doc->exportField($this->prioridad);
						$doc->exportField($this->nombre_es);
						$doc->exportField($this->tiempo);
						$doc->exportField($this->cod_ambulancia);
						$doc->exportField($this->hora_asigna);
						$doc->exportField($this->hora_llegada);
						$doc->exportField($this->hora_inicio);
						$doc->exportField($this->hora_destino);
						$doc->exportField($this->hora_preposicion);
						$doc->exportField($this->base);
						$doc->exportField($this->sede);
						$doc->exportField($this->cierre);
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
			$sede = CurrentUserInfo("sede");
		if ($sede != '0') {
			AddFilter($filter, "sede = '".$sede."' and cierre ='0'");
		}
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

			 	  $this->hora_asigna->ViewAttrs["class"] = "badge bg-primary";
			 	  $this->hora_inicio->ViewAttrs["class"] = "badge bg-primary";
			 	  $this->hora_llegada->ViewAttrs["class"] = "badge bg-primary";
			 	  $this->hora_destino->ViewAttrs["class"] = "badge bg-primary";
			 	  $this->hora_preposicion->ViewAttrs["class"] = "badge bg-primary";
			 	  if( $this->tiempo->CurrentValue <= 15)      
		  	$this->tiempo->ViewAttrs["class"] = "badge bg-success";
		elseif( $this->tiempo->CurrentValue > 15 and $this->tiempo->CurrentValue < 30)
			$this->tiempo->ViewAttrs["class"] = "badge bg-warning";
		else
			 $this->tiempo->ViewAttrs["class"] = "badge bg-danger";
	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>