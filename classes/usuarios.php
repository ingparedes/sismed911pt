<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for usuarios
 */
class usuarios extends DbTable
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
	public $id_user;
	public $fecha_creacion;
	public $nombres;
	public $apellidos;
	public $telefono;
	public $_login;
	public $pw;
	public $perfil;
	public $sede;
	public $acode;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'usuarios';
		$this->TableName = 'usuarios';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"usuarios\"";
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

		// id_user
		$this->id_user = new DbField('usuarios', 'usuarios', 'x_id_user', 'id_user', '"id_user"', 'CAST("id_user" AS varchar(255))', 3, 4, -1, FALSE, '"id_user"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_user->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_user->IsPrimaryKey = TRUE; // Primary key field
		$this->id_user->Nullable = FALSE; // NOT NULL field
		$this->id_user->Sortable = TRUE; // Allow sort
		$this->id_user->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_user'] = &$this->id_user;

		// fecha_creacion
		$this->fecha_creacion = new DbField('usuarios', 'usuarios', 'x_fecha_creacion', 'fecha_creacion', '"fecha_creacion"', CastDateFieldForLike("\"fecha_creacion\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_creacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_creacion->Sortable = TRUE; // Allow sort
		$this->fecha_creacion->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_creacion'] = &$this->fecha_creacion;

		// nombres
		$this->nombres = new DbField('usuarios', 'usuarios', 'x_nombres', 'nombres', '"nombres"', '"nombres"', 200, 80, -1, FALSE, '"nombres"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombres->Sortable = TRUE; // Allow sort
		$this->fields['nombres'] = &$this->nombres;

		// apellidos
		$this->apellidos = new DbField('usuarios', 'usuarios', 'x_apellidos', 'apellidos', '"apellidos"', '"apellidos"', 200, 80, -1, FALSE, '"apellidos"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->apellidos->Sortable = TRUE; // Allow sort
		$this->fields['apellidos'] = &$this->apellidos;

		// telefono
		$this->telefono = new DbField('usuarios', 'usuarios', 'x_telefono', 'telefono', '"telefono"', '"telefono"', 200, 30, -1, FALSE, '"telefono"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefono->Sortable = TRUE; // Allow sort
		$this->fields['telefono'] = &$this->telefono;

		// login
		$this->_login = new DbField('usuarios', 'usuarios', 'x__login', 'login', '"login"', '"login"', 200, 80, -1, FALSE, '"login"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_login->Required = TRUE; // Required field
		$this->_login->Sortable = TRUE; // Allow sort
		$this->fields['login'] = &$this->_login;

		// pw
		$this->pw = new DbField('usuarios', 'usuarios', 'x_pw', 'pw', '"pw"', '"pw"', 200, 100, -1, FALSE, '"pw"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'PASSWORD');
		$this->pw->Required = TRUE; // Required field
		$this->pw->Sortable = TRUE; // Allow sort
		$this->fields['pw'] = &$this->pw;

		// perfil
		$this->perfil = new DbField('usuarios', 'usuarios', 'x_perfil', 'perfil', '"perfil"', 'CAST("perfil" AS varchar(255))', 2, 2, -1, FALSE, '"perfil"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->perfil->Sortable = TRUE; // Allow sort
		$this->perfil->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->perfil->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->perfil->Lookup = new Lookup('perfil', 'userlevels', FALSE, 'userlevelid', ["userlevelname","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->perfil->Lookup = new Lookup('perfil', 'userlevels', FALSE, 'userlevelid', ["userlevelname","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->perfil->Lookup = new Lookup('perfil', 'userlevels', FALSE, 'userlevelid', ["userlevelname","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->perfil->Lookup = new Lookup('perfil', 'userlevels', FALSE, 'userlevelid', ["userlevelname","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->perfil->Lookup = new Lookup('perfil', 'userlevels', FALSE, 'userlevelid', ["userlevelname","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->perfil->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['perfil'] = &$this->perfil;

		// sede
		$this->sede = new DbField('usuarios', 'usuarios', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->sede->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->sede->Lookup = new Lookup('sede', 'sede_sismed', FALSE, 'id_sede', ["nombre_sede","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->sede->Lookup = new Lookup('sede', 'sede_sismed', FALSE, 'id_sede', ["nombre_sede","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->sede->Lookup = new Lookup('sede', 'sede_sismed', FALSE, 'id_sede', ["nombre_sede","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->sede->Lookup = new Lookup('sede', 'sede_sismed', FALSE, 'id_sede', ["nombre_sede","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->sede->Lookup = new Lookup('sede', 'sede_sismed', FALSE, 'id_sede', ["nombre_sede","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sede'] = &$this->sede;

		// acode
		$this->acode = new DbField('usuarios', 'usuarios', 'x_acode', 'acode', '"acode"', '"acode"', 200, 6, -1, FALSE, '"acode"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->acode->Sortable = TRUE; // Allow sort
		$this->acode->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->acode->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->acode->Lookup = new Lookup('acode', 'code_planta', FALSE, 'nombreacode', ["nombreacode","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->acode->Lookup = new Lookup('acode', 'code_planta', FALSE, 'nombreacode', ["nombreacode","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->acode->Lookup = new Lookup('acode', 'code_planta', FALSE, 'nombreacode', ["nombreacode","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->acode->Lookup = new Lookup('acode', 'code_planta', FALSE, 'nombreacode', ["nombreacode","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->acode->Lookup = new Lookup('acode', 'code_planta', FALSE, 'nombreacode', ["nombreacode","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['acode'] = &$this->acode;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"usuarios\"";
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
			if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME"))
				$value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
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
			$this->id_user->setDbValue($conn->getOne("SELECT currval('usuarios_id_user_seq'::regclass)"));
			$rs['id_user'] = $this->id_user->DbValue;
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
			if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
				if ($value == $this->fields[$name]->OldValue) // No need to update hashed password if not changed
					continue;
				$value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
			}
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
			if (array_key_exists('id_user', $rs))
				AddFilter($where, QuotedName('id_user', $this->Dbid) . '=' . QuotedValue($rs['id_user'], $this->id_user->DataType, $this->Dbid));
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
		$this->id_user->DbValue = $row['id_user'];
		$this->fecha_creacion->DbValue = $row['fecha_creacion'];
		$this->nombres->DbValue = $row['nombres'];
		$this->apellidos->DbValue = $row['apellidos'];
		$this->telefono->DbValue = $row['telefono'];
		$this->_login->DbValue = $row['login'];
		$this->pw->DbValue = $row['pw'];
		$this->perfil->DbValue = $row['perfil'];
		$this->sede->DbValue = $row['sede'];
		$this->acode->DbValue = $row['acode'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_user\" = @id_user@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_user', $row) ? $row['id_user'] : NULL;
		else
			$val = $this->id_user->OldValue !== NULL ? $this->id_user->OldValue : $this->id_user->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_user@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "usuarioslist.php";
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
		if ($pageName == "usuariosview.php")
			return $Language->phrase("View");
		elseif ($pageName == "usuariosedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "usuariosadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "usuarioslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("usuariosview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("usuariosview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "usuariosadd.php?" . $this->getUrlParm($parm);
		else
			$url = "usuariosadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("usuariosedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("usuariosadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("usuariosdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_user:" . JsonEncode($this->id_user->CurrentValue, "number");
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
		if ($this->id_user->CurrentValue != NULL) {
			$url .= "id_user=" . urlencode($this->id_user->CurrentValue);
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
			if (Param("id_user") !== NULL)
				$arKeys[] = Param("id_user");
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
				$this->id_user->CurrentValue = $key;
			else
				$this->id_user->OldValue = $key;
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
		$this->id_user->setDbValue($rs->fields('id_user'));
		$this->fecha_creacion->setDbValue($rs->fields('fecha_creacion'));
		$this->nombres->setDbValue($rs->fields('nombres'));
		$this->apellidos->setDbValue($rs->fields('apellidos'));
		$this->telefono->setDbValue($rs->fields('telefono'));
		$this->_login->setDbValue($rs->fields('login'));
		$this->pw->setDbValue($rs->fields('pw'));
		$this->perfil->setDbValue($rs->fields('perfil'));
		$this->sede->setDbValue($rs->fields('sede'));
		$this->acode->setDbValue($rs->fields('acode'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_user
		// fecha_creacion
		// nombres
		// apellidos
		// telefono
		// login
		// pw
		// perfil
		// sede
		// acode
		// id_user

		$this->id_user->ViewValue = $this->id_user->CurrentValue;
		$this->id_user->ViewCustomAttributes = "";

		// fecha_creacion
		$this->fecha_creacion->ViewValue = $this->fecha_creacion->CurrentValue;
		$this->fecha_creacion->ViewValue = FormatDateTime($this->fecha_creacion->ViewValue, 0);
		$this->fecha_creacion->ViewCustomAttributes = "";

		// nombres
		$this->nombres->ViewValue = $this->nombres->CurrentValue;
		$this->nombres->ViewCustomAttributes = "";

		// apellidos
		$this->apellidos->ViewValue = $this->apellidos->CurrentValue;
		$this->apellidos->ViewCustomAttributes = "";

		// telefono
		$this->telefono->ViewValue = $this->telefono->CurrentValue;
		$this->telefono->ViewCustomAttributes = "";

		// login
		$this->_login->ViewValue = $this->_login->CurrentValue;
		$this->_login->ViewCustomAttributes = "";

		// pw
		$this->pw->ViewValue = $Language->phrase("PasswordMask");
		$this->pw->ViewCustomAttributes = "";

		// perfil
		if ($Security->canAdmin()) { // System admin
			$curVal = strval($this->perfil->CurrentValue);
			if ($curVal != "") {
				$this->perfil->ViewValue = $this->perfil->lookupCacheOption($curVal);
				if ($this->perfil->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"userlevelid\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->perfil->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->perfil->ViewValue = $this->perfil->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->perfil->ViewValue = $this->perfil->CurrentValue;
					}
				}
			} else {
				$this->perfil->ViewValue = NULL;
			}
		} else {
			$this->perfil->ViewValue = $Language->phrase("PasswordMask");
		}
		$this->perfil->ViewCustomAttributes = "";

		// sede
		$curVal = strval($this->sede->CurrentValue);
		if ($curVal != "") {
			$this->sede->ViewValue = $this->sede->lookupCacheOption($curVal);
			if ($this->sede->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"id_sede\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->sede->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->sede->ViewValue = $this->sede->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->sede->ViewValue = $this->sede->CurrentValue;
				}
			}
		} else {
			$this->sede->ViewValue = NULL;
		}
		$this->sede->ViewCustomAttributes = "";

		// acode
		$curVal = strval($this->acode->CurrentValue);
		if ($curVal != "") {
			$this->acode->ViewValue = $this->acode->lookupCacheOption($curVal);
			if ($this->acode->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"nombreacode\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->acode->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->acode->ViewValue = $this->acode->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->acode->ViewValue = $this->acode->CurrentValue;
				}
			}
		} else {
			$this->acode->ViewValue = NULL;
		}
		$this->acode->ViewCustomAttributes = "";

		// id_user
		$this->id_user->LinkCustomAttributes = "";
		$this->id_user->HrefValue = "";
		$this->id_user->TooltipValue = "";

		// fecha_creacion
		$this->fecha_creacion->LinkCustomAttributes = "";
		$this->fecha_creacion->HrefValue = "";
		$this->fecha_creacion->TooltipValue = "";

		// nombres
		$this->nombres->LinkCustomAttributes = "";
		$this->nombres->HrefValue = "";
		$this->nombres->TooltipValue = "";

		// apellidos
		$this->apellidos->LinkCustomAttributes = "";
		$this->apellidos->HrefValue = "";
		$this->apellidos->TooltipValue = "";

		// telefono
		$this->telefono->LinkCustomAttributes = "";
		$this->telefono->HrefValue = "";
		$this->telefono->TooltipValue = "";

		// login
		$this->_login->LinkCustomAttributes = "";
		$this->_login->HrefValue = "";
		$this->_login->TooltipValue = "";

		// pw
		$this->pw->LinkCustomAttributes = "";
		$this->pw->HrefValue = "";
		$this->pw->TooltipValue = "";

		// perfil
		$this->perfil->LinkCustomAttributes = "";
		$this->perfil->HrefValue = "";
		$this->perfil->TooltipValue = "";

		// sede
		$this->sede->LinkCustomAttributes = "";
		$this->sede->HrefValue = "";
		$this->sede->TooltipValue = "";

		// acode
		$this->acode->LinkCustomAttributes = "";
		$this->acode->HrefValue = "";
		$this->acode->TooltipValue = "";

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

		// id_user
		$this->id_user->EditAttrs["class"] = "form-control";
		$this->id_user->EditCustomAttributes = "";
		$this->id_user->EditValue = $this->id_user->CurrentValue;
		$this->id_user->ViewCustomAttributes = "";

		// fecha_creacion
		// nombres

		$this->nombres->EditAttrs["class"] = "form-control";
		$this->nombres->EditCustomAttributes = "";
		if (!$this->nombres->Raw)
			$this->nombres->CurrentValue = HtmlDecode($this->nombres->CurrentValue);
		$this->nombres->EditValue = $this->nombres->CurrentValue;
		$this->nombres->PlaceHolder = RemoveHtml($this->nombres->caption());

		// apellidos
		$this->apellidos->EditAttrs["class"] = "form-control";
		$this->apellidos->EditCustomAttributes = "";
		if (!$this->apellidos->Raw)
			$this->apellidos->CurrentValue = HtmlDecode($this->apellidos->CurrentValue);
		$this->apellidos->EditValue = $this->apellidos->CurrentValue;
		$this->apellidos->PlaceHolder = RemoveHtml($this->apellidos->caption());

		// telefono
		$this->telefono->EditAttrs["class"] = "form-control";
		$this->telefono->EditCustomAttributes = "";
		if (!$this->telefono->Raw)
			$this->telefono->CurrentValue = HtmlDecode($this->telefono->CurrentValue);
		$this->telefono->EditValue = $this->telefono->CurrentValue;
		$this->telefono->PlaceHolder = RemoveHtml($this->telefono->caption());

		// login
		$this->_login->EditAttrs["class"] = "form-control";
		$this->_login->EditCustomAttributes = "";
		if (!$this->_login->Raw)
			$this->_login->CurrentValue = HtmlDecode($this->_login->CurrentValue);
		$this->_login->EditValue = $this->_login->CurrentValue;
		$this->_login->PlaceHolder = RemoveHtml($this->_login->caption());

		// pw
		$this->pw->EditAttrs["class"] = "form-control";
		$this->pw->EditCustomAttributes = "";
		$this->pw->EditValue = $this->pw->CurrentValue;
		$this->pw->PlaceHolder = RemoveHtml($this->pw->caption());

		// perfil
		$this->perfil->EditAttrs["class"] = "form-control";
		$this->perfil->EditCustomAttributes = "";
		if (!$Security->canAdmin()) { // System admin
			$this->perfil->EditValue = $Language->phrase("PasswordMask");
		} else {
		}

		// sede
		$this->sede->EditAttrs["class"] = "form-control";
		$this->sede->EditCustomAttributes = "";

		// acode
		$this->acode->EditAttrs["class"] = "form-control";
		$this->acode->EditCustomAttributes = "";

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
					$doc->exportCaption($this->id_user);
					$doc->exportCaption($this->fecha_creacion);
					$doc->exportCaption($this->nombres);
					$doc->exportCaption($this->apellidos);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->_login);
					$doc->exportCaption($this->pw);
					$doc->exportCaption($this->perfil);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->acode);
				} else {
					$doc->exportCaption($this->id_user);
					$doc->exportCaption($this->fecha_creacion);
					$doc->exportCaption($this->nombres);
					$doc->exportCaption($this->apellidos);
					$doc->exportCaption($this->telefono);
					$doc->exportCaption($this->_login);
					$doc->exportCaption($this->pw);
					$doc->exportCaption($this->perfil);
					$doc->exportCaption($this->sede);
					$doc->exportCaption($this->acode);
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
						$doc->exportField($this->id_user);
						$doc->exportField($this->fecha_creacion);
						$doc->exportField($this->nombres);
						$doc->exportField($this->apellidos);
						$doc->exportField($this->telefono);
						$doc->exportField($this->_login);
						$doc->exportField($this->pw);
						$doc->exportField($this->perfil);
						$doc->exportField($this->sede);
						$doc->exportField($this->acode);
					} else {
						$doc->exportField($this->id_user);
						$doc->exportField($this->fecha_creacion);
						$doc->exportField($this->nombres);
						$doc->exportField($this->apellidos);
						$doc->exportField($this->telefono);
						$doc->exportField($this->_login);
						$doc->exportField($this->pw);
						$doc->exportField($this->perfil);
						$doc->exportField($this->sede);
						$doc->exportField($this->acode);
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