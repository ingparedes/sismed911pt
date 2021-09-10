<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for servicio_ambulancia
 */
class servicio_ambulancia extends DbTable
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
	public $id_servcioambulacia;
	public $cod_casointerh;
	public $cod_ambulancia;
	public $hora_asigna;
	public $hora_llegada;
	public $hora_inicio;
	public $hora_destino;
	public $hora_preposicion;
	public $observaciones;
	public $tipo_traslado;
	public $traslado_fallido;
	public $estado_paciente;
	public $k_final;
	public $k_inical;
	public $tipo_serviciosistema;
	public $preposicion;
	public $conductor;
	public $medico;
	public $paramedico;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'servicio_ambulancia';
		$this->TableName = 'servicio_ambulancia';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"servicio_ambulancia\"";
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

		// id_servcioambulacia
		$this->id_servcioambulacia = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_id_servcioambulacia', 'id_servcioambulacia', '"id_servcioambulacia"', 'CAST("id_servcioambulacia" AS varchar(255))', 3, 4, -1, FALSE, '"id_servcioambulacia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_servcioambulacia->Nullable = FALSE; // NOT NULL field
		$this->id_servcioambulacia->Required = TRUE; // Required field
		$this->id_servcioambulacia->Sortable = TRUE; // Allow sort
		$this->id_servcioambulacia->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_servcioambulacia'] = &$this->id_servcioambulacia;

		// cod_casointerh
		$this->cod_casointerh = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_cod_casointerh', 'cod_casointerh', '"cod_casointerh"', 'CAST("cod_casointerh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->cod_casointerh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casointerh->Nullable = FALSE; // NOT NULL field
		$this->cod_casointerh->Sortable = TRUE; // Allow sort
		$this->cod_casointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casointerh'] = &$this->cod_casointerh;

		// cod_ambulancia
		$this->cod_ambulancia = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_cod_ambulancia', 'cod_ambulancia', '"cod_ambulancia"', '"cod_ambulancia"', 200, 16, -1, FALSE, '"cod_ambulancia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->cod_ambulancia->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_ambulancia->Nullable = FALSE; // NOT NULL field
		$this->cod_ambulancia->Sortable = TRUE; // Allow sort
		$this->fields['cod_ambulancia'] = &$this->cod_ambulancia;

		// hora_asigna
		$this->hora_asigna = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_hora_asigna', 'hora_asigna', '"hora_asigna"', CastDateFieldForLike("\"hora_asigna\"", 11, "DB"), 135, 8, 11, FALSE, '"hora_asigna"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_asigna->Sortable = TRUE; // Allow sort
		$this->hora_asigna->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['hora_asigna'] = &$this->hora_asigna;

		// hora_llegada
		$this->hora_llegada = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_hora_llegada', 'hora_llegada', '"hora_llegada"', CastDateFieldForLike("\"hora_llegada\"", 11, "DB"), 135, 8, 11, FALSE, '"hora_llegada"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_llegada->Sortable = TRUE; // Allow sort
		$this->hora_llegada->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['hora_llegada'] = &$this->hora_llegada;

		// hora_inicio
		$this->hora_inicio = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_hora_inicio', 'hora_inicio', '"hora_inicio"', CastDateFieldForLike("\"hora_inicio\"", 11, "DB"), 135, 8, 11, FALSE, '"hora_inicio"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_inicio->Sortable = TRUE; // Allow sort
		$this->fields['hora_inicio'] = &$this->hora_inicio;

		// hora_destino
		$this->hora_destino = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_hora_destino', 'hora_destino', '"hora_destino"', CastDateFieldForLike("\"hora_destino\"", 11, "DB"), 135, 8, 11, FALSE, '"hora_destino"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_destino->Sortable = TRUE; // Allow sort
		$this->fields['hora_destino'] = &$this->hora_destino;

		// hora_preposicion
		$this->hora_preposicion = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_hora_preposicion', 'hora_preposicion', '"hora_preposicion"', CastDateFieldForLike("\"hora_preposicion\"", 11, "DB"), 135, 8, 11, FALSE, '"hora_preposicion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hora_preposicion->Sortable = TRUE; // Allow sort
		$this->fields['hora_preposicion'] = &$this->hora_preposicion;

		// observaciones
		$this->observaciones = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_observaciones', 'observaciones', '"observaciones"', '"observaciones"', 201, 0, -1, FALSE, '"observaciones"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->observaciones->Sortable = TRUE; // Allow sort
		$this->fields['observaciones'] = &$this->observaciones;

		// tipo_traslado
		$this->tipo_traslado = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_tipo_traslado', 'tipo_traslado', '"tipo_traslado"', '"tipo_traslado"', 200, 4, -1, FALSE, '"tipo_traslado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_traslado->Sortable = TRUE; // Allow sort
		$this->fields['tipo_traslado'] = &$this->tipo_traslado;

		// traslado_fallido
		$this->traslado_fallido = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_traslado_fallido', 'traslado_fallido', '"traslado_fallido"', 'CAST("traslado_fallido" AS varchar(255))', 2, 2, -1, FALSE, '"traslado_fallido"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->traslado_fallido->Sortable = TRUE; // Allow sort
		$this->traslado_fallido->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->traslado_fallido->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_en","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->traslado_fallido->Lookup = new Lookup('traslado_fallido', 'tipo_cierrecaso', FALSE, 'id_tranlado_fallido', ["tipo_cierrecaso_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->traslado_fallido->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['traslado_fallido'] = &$this->traslado_fallido;

		// estado_paciente
		$this->estado_paciente = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_estado_paciente', 'estado_paciente', '"estado_paciente"', '"estado_paciente"', 200, 2, -1, FALSE, '"estado_paciente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado_paciente->Sortable = TRUE; // Allow sort
		$this->fields['estado_paciente'] = &$this->estado_paciente;

		// k_final
		$this->k_final = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_k_final', 'k_final', '"k_final"', '"k_final"', 200, 10, -1, FALSE, '"k_final"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->k_final->Sortable = TRUE; // Allow sort
		$this->fields['k_final'] = &$this->k_final;

		// k_inical
		$this->k_inical = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_k_inical', 'k_inical', '"k_inical"', '"k_inical"', 200, 10, -1, FALSE, '"k_inical"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->k_inical->Sortable = TRUE; // Allow sort
		$this->fields['k_inical'] = &$this->k_inical;

		// tipo_serviciosistema
		$this->tipo_serviciosistema = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_tipo_serviciosistema', 'tipo_serviciosistema', '"tipo_serviciosistema"', '"tipo_serviciosistema"', 200, 2, -1, FALSE, '"tipo_serviciosistema"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_serviciosistema->Sortable = TRUE; // Allow sort
		$this->fields['tipo_serviciosistema'] = &$this->tipo_serviciosistema;

		// preposicion
		$this->preposicion = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_preposicion', 'preposicion', '"preposicion"', '"preposicion"', 200, 20, -1, FALSE, '"preposicion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->preposicion->Sortable = TRUE; // Allow sort
		$this->fields['preposicion'] = &$this->preposicion;

		// conductor
		$this->conductor = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_conductor', 'conductor', '"conductor"', '"conductor"', 200, 80, -1, FALSE, '"conductor"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->conductor->Sortable = TRUE; // Allow sort
		$this->fields['conductor'] = &$this->conductor;

		// medico
		$this->medico = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_medico', 'medico', '"medico"', '"medico"', 200, 80, -1, FALSE, '"medico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->medico->Sortable = TRUE; // Allow sort
		$this->fields['medico'] = &$this->medico;

		// paramedico
		$this->paramedico = new DbField('servicio_ambulancia', 'servicio_ambulancia', 'x_paramedico', 'paramedico', '"paramedico"', '"paramedico"', 200, 80, -1, FALSE, '"paramedico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->paramedico->Sortable = TRUE; // Allow sort
		$this->fields['paramedico'] = &$this->paramedico;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"servicio_ambulancia\"";
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
			if (array_key_exists('cod_casointerh', $rs))
				AddFilter($where, QuotedName('cod_casointerh', $this->Dbid) . '=' . QuotedValue($rs['cod_casointerh'], $this->cod_casointerh->DataType, $this->Dbid));
			if (array_key_exists('cod_ambulancia', $rs))
				AddFilter($where, QuotedName('cod_ambulancia', $this->Dbid) . '=' . QuotedValue($rs['cod_ambulancia'], $this->cod_ambulancia->DataType, $this->Dbid));
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
		$this->id_servcioambulacia->DbValue = $row['id_servcioambulacia'];
		$this->cod_casointerh->DbValue = $row['cod_casointerh'];
		$this->cod_ambulancia->DbValue = $row['cod_ambulancia'];
		$this->hora_asigna->DbValue = $row['hora_asigna'];
		$this->hora_llegada->DbValue = $row['hora_llegada'];
		$this->hora_inicio->DbValue = $row['hora_inicio'];
		$this->hora_destino->DbValue = $row['hora_destino'];
		$this->hora_preposicion->DbValue = $row['hora_preposicion'];
		$this->observaciones->DbValue = $row['observaciones'];
		$this->tipo_traslado->DbValue = $row['tipo_traslado'];
		$this->traslado_fallido->DbValue = $row['traslado_fallido'];
		$this->estado_paciente->DbValue = $row['estado_paciente'];
		$this->k_final->DbValue = $row['k_final'];
		$this->k_inical->DbValue = $row['k_inical'];
		$this->tipo_serviciosistema->DbValue = $row['tipo_serviciosistema'];
		$this->preposicion->DbValue = $row['preposicion'];
		$this->conductor->DbValue = $row['conductor'];
		$this->medico->DbValue = $row['medico'];
		$this->paramedico->DbValue = $row['paramedico'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"cod_casointerh\" = @cod_casointerh@ AND \"cod_ambulancia\" = '@cod_ambulancia@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('cod_casointerh', $row) ? $row['cod_casointerh'] : NULL;
		else
			$val = $this->cod_casointerh->OldValue !== NULL ? $this->cod_casointerh->OldValue : $this->cod_casointerh->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_casointerh@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		if (is_array($row))
			$val = array_key_exists('cod_ambulancia', $row) ? $row['cod_ambulancia'] : NULL;
		else
			$val = $this->cod_ambulancia->OldValue !== NULL ? $this->cod_ambulancia->OldValue : $this->cod_ambulancia->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_ambulancia@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "servicio_ambulancialist.php";
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
		if ($pageName == "servicio_ambulanciaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "servicio_ambulanciaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "servicio_ambulanciaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "servicio_ambulancialist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("servicio_ambulanciaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("servicio_ambulanciaview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "servicio_ambulanciaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "servicio_ambulanciaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("servicio_ambulanciaedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("servicio_ambulanciaadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("servicio_ambulanciadelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "cod_casointerh:" . JsonEncode($this->cod_casointerh->CurrentValue, "number");
		$json .= ",cod_ambulancia:" . JsonEncode($this->cod_ambulancia->CurrentValue, "string");
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
		if ($this->cod_casointerh->CurrentValue != NULL) {
			$url .= "cod_casointerh=" . urlencode($this->cod_casointerh->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->cod_ambulancia->CurrentValue != NULL) {
			$url .= "&cod_ambulancia=" . urlencode($this->cod_ambulancia->CurrentValue);
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
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
		} else {
			if (Param("cod_casointerh") !== NULL)
				$arKey[] = Param("cod_casointerh");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("cod_ambulancia") !== NULL)
				$arKey[] = Param("cod_ambulancia");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) != 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // cod_casointerh
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
				$this->cod_casointerh->CurrentValue = $key[0];
			else
				$this->cod_casointerh->OldValue = $key[0];
			if ($setCurrent)
				$this->cod_ambulancia->CurrentValue = $key[1];
			else
				$this->cod_ambulancia->OldValue = $key[1];
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
		$this->id_servcioambulacia->setDbValue($rs->fields('id_servcioambulacia'));
		$this->cod_casointerh->setDbValue($rs->fields('cod_casointerh'));
		$this->cod_ambulancia->setDbValue($rs->fields('cod_ambulancia'));
		$this->hora_asigna->setDbValue($rs->fields('hora_asigna'));
		$this->hora_llegada->setDbValue($rs->fields('hora_llegada'));
		$this->hora_inicio->setDbValue($rs->fields('hora_inicio'));
		$this->hora_destino->setDbValue($rs->fields('hora_destino'));
		$this->hora_preposicion->setDbValue($rs->fields('hora_preposicion'));
		$this->observaciones->setDbValue($rs->fields('observaciones'));
		$this->tipo_traslado->setDbValue($rs->fields('tipo_traslado'));
		$this->traslado_fallido->setDbValue($rs->fields('traslado_fallido'));
		$this->estado_paciente->setDbValue($rs->fields('estado_paciente'));
		$this->k_final->setDbValue($rs->fields('k_final'));
		$this->k_inical->setDbValue($rs->fields('k_inical'));
		$this->tipo_serviciosistema->setDbValue($rs->fields('tipo_serviciosistema'));
		$this->preposicion->setDbValue($rs->fields('preposicion'));
		$this->conductor->setDbValue($rs->fields('conductor'));
		$this->medico->setDbValue($rs->fields('medico'));
		$this->paramedico->setDbValue($rs->fields('paramedico'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_servcioambulacia
		// cod_casointerh
		// cod_ambulancia
		// hora_asigna
		// hora_llegada
		// hora_inicio
		// hora_destino
		// hora_preposicion
		// observaciones
		// tipo_traslado
		// traslado_fallido
		// estado_paciente
		// k_final
		// k_inical
		// tipo_serviciosistema
		// preposicion
		// conductor
		// medico
		// paramedico
		// id_servcioambulacia

		$this->id_servcioambulacia->ViewValue = $this->id_servcioambulacia->CurrentValue;
		$this->id_servcioambulacia->ViewCustomAttributes = "";

		// cod_casointerh
		$this->cod_casointerh->ViewValue = $this->cod_casointerh->CurrentValue;
		$this->cod_casointerh->ViewValue = FormatNumber($this->cod_casointerh->ViewValue, 0, -2, -2, -2);
		$this->cod_casointerh->ViewCustomAttributes = "";

		// cod_ambulancia
		$this->cod_ambulancia->ViewValue = $this->cod_ambulancia->CurrentValue;
		$this->cod_ambulancia->ViewCustomAttributes = "";

		// hora_asigna
		$this->hora_asigna->ViewValue = $this->hora_asigna->CurrentValue;
		$this->hora_asigna->ViewValue = FormatDateTime($this->hora_asigna->ViewValue, 11);
		$this->hora_asigna->ViewCustomAttributes = "";

		// hora_llegada
		$this->hora_llegada->ViewValue = $this->hora_llegada->CurrentValue;
		$this->hora_llegada->ViewValue = FormatDateTime($this->hora_llegada->ViewValue, 11);
		$this->hora_llegada->ViewCustomAttributes = "";

		// hora_inicio
		$this->hora_inicio->ViewValue = $this->hora_inicio->CurrentValue;
		$this->hora_inicio->ViewValue = FormatDateTime($this->hora_inicio->ViewValue, 11);
		$this->hora_inicio->ViewCustomAttributes = "";

		// hora_destino
		$this->hora_destino->ViewValue = $this->hora_destino->CurrentValue;
		$this->hora_destino->ViewValue = FormatDateTime($this->hora_destino->ViewValue, 11);
		$this->hora_destino->ViewCustomAttributes = "";

		// hora_preposicion
		$this->hora_preposicion->ViewValue = $this->hora_preposicion->CurrentValue;
		$this->hora_preposicion->ViewValue = FormatDateTime($this->hora_preposicion->ViewValue, 11);
		$this->hora_preposicion->ViewCustomAttributes = "";

		// observaciones
		$this->observaciones->ViewValue = $this->observaciones->CurrentValue;
		$this->observaciones->ViewCustomAttributes = "";

		// tipo_traslado
		$this->tipo_traslado->ViewValue = $this->tipo_traslado->CurrentValue;
		$this->tipo_traslado->ViewCustomAttributes = "";

		// traslado_fallido
		$curVal = strval($this->traslado_fallido->CurrentValue);
		if ($curVal != "") {
			$this->traslado_fallido->ViewValue = $this->traslado_fallido->lookupCacheOption($curVal);
			if ($this->traslado_fallido->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"id_tranlado_fallido\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->traslado_fallido->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->traslado_fallido->ViewValue = $this->traslado_fallido->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->traslado_fallido->ViewValue = $this->traslado_fallido->CurrentValue;
				}
			}
		} else {
			$this->traslado_fallido->ViewValue = NULL;
		}
		$this->traslado_fallido->ViewCustomAttributes = "";

		// estado_paciente
		$this->estado_paciente->ViewValue = $this->estado_paciente->CurrentValue;
		$this->estado_paciente->ViewCustomAttributes = "";

		// k_final
		$this->k_final->ViewValue = $this->k_final->CurrentValue;
		$this->k_final->ViewCustomAttributes = "";

		// k_inical
		$this->k_inical->ViewValue = $this->k_inical->CurrentValue;
		$this->k_inical->ViewCustomAttributes = "";

		// tipo_serviciosistema
		$this->tipo_serviciosistema->ViewValue = $this->tipo_serviciosistema->CurrentValue;
		$this->tipo_serviciosistema->ViewCustomAttributes = "";

		// preposicion
		$this->preposicion->ViewValue = $this->preposicion->CurrentValue;
		$this->preposicion->ViewCustomAttributes = "";

		// conductor
		$this->conductor->ViewValue = $this->conductor->CurrentValue;
		$this->conductor->ViewCustomAttributes = "";

		// medico
		$this->medico->ViewValue = $this->medico->CurrentValue;
		$this->medico->ViewCustomAttributes = "";

		// paramedico
		$this->paramedico->ViewValue = $this->paramedico->CurrentValue;
		$this->paramedico->ViewCustomAttributes = "";

		// id_servcioambulacia
		$this->id_servcioambulacia->LinkCustomAttributes = "";
		$this->id_servcioambulacia->HrefValue = "";
		$this->id_servcioambulacia->TooltipValue = "";

		// cod_casointerh
		$this->cod_casointerh->LinkCustomAttributes = "";
		$this->cod_casointerh->HrefValue = "";
		$this->cod_casointerh->TooltipValue = "";

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

		// observaciones
		$this->observaciones->LinkCustomAttributes = "";
		$this->observaciones->HrefValue = "";
		$this->observaciones->TooltipValue = "";

		// tipo_traslado
		$this->tipo_traslado->LinkCustomAttributes = "";
		$this->tipo_traslado->HrefValue = "";
		$this->tipo_traslado->TooltipValue = "";

		// traslado_fallido
		$this->traslado_fallido->LinkCustomAttributes = "";
		$this->traslado_fallido->HrefValue = "";
		$this->traslado_fallido->TooltipValue = "";

		// estado_paciente
		$this->estado_paciente->LinkCustomAttributes = "";
		$this->estado_paciente->HrefValue = "";
		$this->estado_paciente->TooltipValue = "";

		// k_final
		$this->k_final->LinkCustomAttributes = "";
		$this->k_final->HrefValue = "";
		$this->k_final->TooltipValue = "";

		// k_inical
		$this->k_inical->LinkCustomAttributes = "";
		$this->k_inical->HrefValue = "";
		$this->k_inical->TooltipValue = "";

		// tipo_serviciosistema
		$this->tipo_serviciosistema->LinkCustomAttributes = "";
		$this->tipo_serviciosistema->HrefValue = "";
		$this->tipo_serviciosistema->TooltipValue = "";

		// preposicion
		$this->preposicion->LinkCustomAttributes = "";
		$this->preposicion->HrefValue = "";
		$this->preposicion->TooltipValue = "";

		// conductor
		$this->conductor->LinkCustomAttributes = "";
		$this->conductor->HrefValue = "";
		$this->conductor->TooltipValue = "";

		// medico
		$this->medico->LinkCustomAttributes = "";
		$this->medico->HrefValue = "";
		$this->medico->TooltipValue = "";

		// paramedico
		$this->paramedico->LinkCustomAttributes = "";
		$this->paramedico->HrefValue = "";
		$this->paramedico->TooltipValue = "";

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

		// id_servcioambulacia
		$this->id_servcioambulacia->EditAttrs["class"] = "form-control";
		$this->id_servcioambulacia->EditCustomAttributes = "";
		$this->id_servcioambulacia->EditValue = $this->id_servcioambulacia->CurrentValue;
		$this->id_servcioambulacia->PlaceHolder = RemoveHtml($this->id_servcioambulacia->caption());

		// cod_casointerh
		$this->cod_casointerh->EditAttrs["class"] = "form-control";
		$this->cod_casointerh->EditCustomAttributes = "hidden";

		// cod_ambulancia
		$this->cod_ambulancia->EditAttrs["class"] = "form-control";
		$this->cod_ambulancia->EditCustomAttributes = "hidden";

		// hora_asigna
		$this->hora_asigna->EditAttrs["class"] = "form-control";
		$this->hora_asigna->EditCustomAttributes = "";
		$this->hora_asigna->EditValue = FormatDateTime($this->hora_asigna->CurrentValue, 11);
		$this->hora_asigna->PlaceHolder = RemoveHtml($this->hora_asigna->caption());

		// hora_llegada
		$this->hora_llegada->EditAttrs["class"] = "form-control";
		$this->hora_llegada->EditCustomAttributes = "";
		$this->hora_llegada->EditValue = FormatDateTime($this->hora_llegada->CurrentValue, 11);
		$this->hora_llegada->PlaceHolder = RemoveHtml($this->hora_llegada->caption());

		// hora_inicio
		$this->hora_inicio->EditAttrs["class"] = "form-control";
		$this->hora_inicio->EditCustomAttributes = "";
		$this->hora_inicio->EditValue = FormatDateTime($this->hora_inicio->CurrentValue, 11);
		$this->hora_inicio->PlaceHolder = RemoveHtml($this->hora_inicio->caption());

		// hora_destino
		$this->hora_destino->EditAttrs["class"] = "form-control";
		$this->hora_destino->EditCustomAttributes = "";
		$this->hora_destino->EditValue = FormatDateTime($this->hora_destino->CurrentValue, 11);
		$this->hora_destino->PlaceHolder = RemoveHtml($this->hora_destino->caption());

		// hora_preposicion
		$this->hora_preposicion->EditAttrs["class"] = "form-control";
		$this->hora_preposicion->EditCustomAttributes = "";
		$this->hora_preposicion->EditValue = FormatDateTime($this->hora_preposicion->CurrentValue, 11);
		$this->hora_preposicion->PlaceHolder = RemoveHtml($this->hora_preposicion->caption());

		// observaciones
		$this->observaciones->EditAttrs["class"] = "form-control";
		$this->observaciones->EditCustomAttributes = "";
		$this->observaciones->EditValue = $this->observaciones->CurrentValue;
		$this->observaciones->PlaceHolder = RemoveHtml($this->observaciones->caption());

		// tipo_traslado
		$this->tipo_traslado->EditAttrs["class"] = "form-control";
		$this->tipo_traslado->EditCustomAttributes = "";
		if (!$this->tipo_traslado->Raw)
			$this->tipo_traslado->CurrentValue = HtmlDecode($this->tipo_traslado->CurrentValue);
		$this->tipo_traslado->EditValue = $this->tipo_traslado->CurrentValue;
		$this->tipo_traslado->PlaceHolder = RemoveHtml($this->tipo_traslado->caption());

		// traslado_fallido
		$this->traslado_fallido->EditAttrs["class"] = "form-control";
		$this->traslado_fallido->EditCustomAttributes = "";

		// estado_paciente
		$this->estado_paciente->EditAttrs["class"] = "form-control";
		$this->estado_paciente->EditCustomAttributes = "";
		if (!$this->estado_paciente->Raw)
			$this->estado_paciente->CurrentValue = HtmlDecode($this->estado_paciente->CurrentValue);
		$this->estado_paciente->EditValue = $this->estado_paciente->CurrentValue;
		$this->estado_paciente->PlaceHolder = RemoveHtml($this->estado_paciente->caption());

		// k_final
		$this->k_final->EditAttrs["class"] = "form-control";
		$this->k_final->EditCustomAttributes = "";
		if (!$this->k_final->Raw)
			$this->k_final->CurrentValue = HtmlDecode($this->k_final->CurrentValue);
		$this->k_final->EditValue = $this->k_final->CurrentValue;
		$this->k_final->PlaceHolder = RemoveHtml($this->k_final->caption());

		// k_inical
		$this->k_inical->EditAttrs["class"] = "form-control";
		$this->k_inical->EditCustomAttributes = "";
		if (!$this->k_inical->Raw)
			$this->k_inical->CurrentValue = HtmlDecode($this->k_inical->CurrentValue);
		$this->k_inical->EditValue = $this->k_inical->CurrentValue;
		$this->k_inical->PlaceHolder = RemoveHtml($this->k_inical->caption());

		// tipo_serviciosistema
		$this->tipo_serviciosistema->EditAttrs["class"] = "form-control";
		$this->tipo_serviciosistema->EditCustomAttributes = "";
		if (!$this->tipo_serviciosistema->Raw)
			$this->tipo_serviciosistema->CurrentValue = HtmlDecode($this->tipo_serviciosistema->CurrentValue);
		$this->tipo_serviciosistema->EditValue = $this->tipo_serviciosistema->CurrentValue;
		$this->tipo_serviciosistema->PlaceHolder = RemoveHtml($this->tipo_serviciosistema->caption());

		// preposicion
		$this->preposicion->EditAttrs["class"] = "form-control";
		$this->preposicion->EditCustomAttributes = "";
		if (!$this->preposicion->Raw)
			$this->preposicion->CurrentValue = HtmlDecode($this->preposicion->CurrentValue);
		$this->preposicion->EditValue = $this->preposicion->CurrentValue;
		$this->preposicion->PlaceHolder = RemoveHtml($this->preposicion->caption());

		// conductor
		$this->conductor->EditAttrs["class"] = "form-control";
		$this->conductor->EditCustomAttributes = "";
		if (!$this->conductor->Raw)
			$this->conductor->CurrentValue = HtmlDecode($this->conductor->CurrentValue);
		$this->conductor->EditValue = $this->conductor->CurrentValue;
		$this->conductor->PlaceHolder = RemoveHtml($this->conductor->caption());

		// medico
		$this->medico->EditAttrs["class"] = "form-control";
		$this->medico->EditCustomAttributes = "";
		if (!$this->medico->Raw)
			$this->medico->CurrentValue = HtmlDecode($this->medico->CurrentValue);
		$this->medico->EditValue = $this->medico->CurrentValue;
		$this->medico->PlaceHolder = RemoveHtml($this->medico->caption());

		// paramedico
		$this->paramedico->EditAttrs["class"] = "form-control";
		$this->paramedico->EditCustomAttributes = "";
		if (!$this->paramedico->Raw)
			$this->paramedico->CurrentValue = HtmlDecode($this->paramedico->CurrentValue);
		$this->paramedico->EditValue = $this->paramedico->CurrentValue;
		$this->paramedico->PlaceHolder = RemoveHtml($this->paramedico->caption());

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
					$doc->exportCaption($this->id_servcioambulacia);
					$doc->exportCaption($this->cod_casointerh);
					$doc->exportCaption($this->cod_ambulancia);
					$doc->exportCaption($this->hora_asigna);
					$doc->exportCaption($this->hora_llegada);
					$doc->exportCaption($this->hora_inicio);
					$doc->exportCaption($this->hora_destino);
					$doc->exportCaption($this->hora_preposicion);
					$doc->exportCaption($this->observaciones);
					$doc->exportCaption($this->tipo_traslado);
					$doc->exportCaption($this->traslado_fallido);
					$doc->exportCaption($this->estado_paciente);
					$doc->exportCaption($this->k_final);
					$doc->exportCaption($this->k_inical);
					$doc->exportCaption($this->tipo_serviciosistema);
					$doc->exportCaption($this->preposicion);
					$doc->exportCaption($this->conductor);
					$doc->exportCaption($this->medico);
					$doc->exportCaption($this->paramedico);
				} else {
					$doc->exportCaption($this->id_servcioambulacia);
					$doc->exportCaption($this->cod_casointerh);
					$doc->exportCaption($this->cod_ambulancia);
					$doc->exportCaption($this->hora_asigna);
					$doc->exportCaption($this->hora_llegada);
					$doc->exportCaption($this->hora_inicio);
					$doc->exportCaption($this->hora_destino);
					$doc->exportCaption($this->hora_preposicion);
					$doc->exportCaption($this->tipo_traslado);
					$doc->exportCaption($this->traslado_fallido);
					$doc->exportCaption($this->estado_paciente);
					$doc->exportCaption($this->k_final);
					$doc->exportCaption($this->k_inical);
					$doc->exportCaption($this->tipo_serviciosistema);
					$doc->exportCaption($this->preposicion);
					$doc->exportCaption($this->conductor);
					$doc->exportCaption($this->medico);
					$doc->exportCaption($this->paramedico);
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
						$doc->exportField($this->id_servcioambulacia);
						$doc->exportField($this->cod_casointerh);
						$doc->exportField($this->cod_ambulancia);
						$doc->exportField($this->hora_asigna);
						$doc->exportField($this->hora_llegada);
						$doc->exportField($this->hora_inicio);
						$doc->exportField($this->hora_destino);
						$doc->exportField($this->hora_preposicion);
						$doc->exportField($this->observaciones);
						$doc->exportField($this->tipo_traslado);
						$doc->exportField($this->traslado_fallido);
						$doc->exportField($this->estado_paciente);
						$doc->exportField($this->k_final);
						$doc->exportField($this->k_inical);
						$doc->exportField($this->tipo_serviciosistema);
						$doc->exportField($this->preposicion);
						$doc->exportField($this->conductor);
						$doc->exportField($this->medico);
						$doc->exportField($this->paramedico);
					} else {
						$doc->exportField($this->id_servcioambulacia);
						$doc->exportField($this->cod_casointerh);
						$doc->exportField($this->cod_ambulancia);
						$doc->exportField($this->hora_asigna);
						$doc->exportField($this->hora_llegada);
						$doc->exportField($this->hora_inicio);
						$doc->exportField($this->hora_destino);
						$doc->exportField($this->hora_preposicion);
						$doc->exportField($this->tipo_traslado);
						$doc->exportField($this->traslado_fallido);
						$doc->exportField($this->estado_paciente);
						$doc->exportField($this->k_final);
						$doc->exportField($this->k_inical);
						$doc->exportField($this->tipo_serviciosistema);
						$doc->exportField($this->preposicion);
						$doc->exportField($this->conductor);
						$doc->exportField($this->medico);
						$doc->exportField($this->paramedico);
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