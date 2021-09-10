<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for asigna_ambulancia
 */
class asigna_ambulancia extends DbTable
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
	public $id_ambulancias;
	public $cod_ambulancias;
	public $placas;
	public $chasis;
	public $marca;
	public $modelo;
	public $tipo_translado;
	public $tipo_conbustible;
	public $modalidad;
	public $estado;
	public $ubicacion;
	public $disponible;
	public $fecha_iniseguro;
	public $fecha_finseguro;
	public $entidad;
	public $observacion;
	public $asiganda;
	public $config_manteni;
	public $fecha_creacion;
	public $longitudambulancia;
	public $latituambulancia;
	public $especial;
	public $id_tipotransport;
	public $tipo_amb_es;
	public $tipo_amb_en;
	public $tipo_amb_pr;
	public $tipo_amb_fr;
	public $codigo;
	public $id_especialambulancia;
	public $especial_es;
	public $especial_en;
	public $especial_pr;
	public $especial_fr;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'asigna_ambulancia';
		$this->TableName = 'asigna_ambulancia';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "\"asigna_ambulancia\"";
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

		// id_ambulancias
		$this->id_ambulancias = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_id_ambulancias', 'id_ambulancias', '"id_ambulancias"', 'CAST("id_ambulancias" AS varchar(255))', 2, 2, -1, FALSE, '"id_ambulancias"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_ambulancias->IsPrimaryKey = TRUE; // Primary key field
		$this->id_ambulancias->Sortable = TRUE; // Allow sort
		$this->id_ambulancias->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_ambulancias'] = &$this->id_ambulancias;

		// cod_ambulancias
		$this->cod_ambulancias = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_cod_ambulancias', 'cod_ambulancias', '"cod_ambulancias"', '"cod_ambulancias"', 200, 16, -1, FALSE, '"cod_ambulancias"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_ambulancias->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_ambulancias->Sortable = TRUE; // Allow sort
		$this->fields['cod_ambulancias'] = &$this->cod_ambulancias;

		// placas
		$this->placas = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_placas', 'placas', '"placas"', '"placas"', 200, 30, -1, FALSE, '"placas"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->placas->Sortable = TRUE; // Allow sort
		$this->fields['placas'] = &$this->placas;

		// chasis
		$this->chasis = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_chasis', 'chasis', '"chasis"', '"chasis"', 200, 100, -1, FALSE, '"chasis"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->chasis->Sortable = TRUE; // Allow sort
		$this->fields['chasis'] = &$this->chasis;

		// marca
		$this->marca = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_marca', 'marca', '"marca"', '"marca"', 200, 50, -1, FALSE, '"marca"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->marca->Sortable = TRUE; // Allow sort
		$this->fields['marca'] = &$this->marca;

		// modelo
		$this->modelo = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_modelo', 'modelo', '"modelo"', '"modelo"', 200, 32, -1, FALSE, '"modelo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modelo->Sortable = TRUE; // Allow sort
		$this->fields['modelo'] = &$this->modelo;

		// tipo_translado
		$this->tipo_translado = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_tipo_translado', 'tipo_translado', '"tipo_translado"', 'CAST("tipo_translado" AS varchar(255))', 2, 2, -1, FALSE, '"tipo_translado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_translado->Sortable = TRUE; // Allow sort
		$this->tipo_translado->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tipo_translado'] = &$this->tipo_translado;

		// tipo_conbustible
		$this->tipo_conbustible = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_tipo_conbustible', 'tipo_conbustible', '"tipo_conbustible"', '"tipo_conbustible"', 200, 30, -1, FALSE, '"tipo_conbustible"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_conbustible->Sortable = TRUE; // Allow sort
		$this->fields['tipo_conbustible'] = &$this->tipo_conbustible;

		// modalidad
		$this->modalidad = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_modalidad', 'modalidad', '"modalidad"', 'CAST("modalidad" AS varchar(255))', 2, 2, -1, FALSE, '"modalidad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modalidad->Sortable = TRUE; // Allow sort
		$this->modalidad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modalidad'] = &$this->modalidad;

		// estado
		$this->estado = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_estado', 'estado', '"estado"', 'CAST("estado" AS varchar(255))', 2, 2, -1, FALSE, '"estado"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado->Sortable = TRUE; // Allow sort
		$this->estado->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['estado'] = &$this->estado;

		// ubicacion
		$this->ubicacion = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_ubicacion', 'ubicacion', '"ubicacion"', '"ubicacion"', 200, 100, -1, FALSE, '"ubicacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ubicacion->Sortable = TRUE; // Allow sort
		$this->fields['ubicacion'] = &$this->ubicacion;

		// disponible
		$this->disponible = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_disponible', 'disponible', '"disponible"', '"disponible"', 200, 2, -1, FALSE, '"disponible"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->disponible->Sortable = TRUE; // Allow sort
		$this->fields['disponible'] = &$this->disponible;

		// fecha_iniseguro
		$this->fecha_iniseguro = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_fecha_iniseguro', 'fecha_iniseguro', '"fecha_iniseguro"', CastDateFieldForLike("\"fecha_iniseguro\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_iniseguro"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_iniseguro->Sortable = TRUE; // Allow sort
		$this->fecha_iniseguro->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_iniseguro'] = &$this->fecha_iniseguro;

		// fecha_finseguro
		$this->fecha_finseguro = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_fecha_finseguro', 'fecha_finseguro', '"fecha_finseguro"', CastDateFieldForLike("\"fecha_finseguro\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_finseguro"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_finseguro->Sortable = TRUE; // Allow sort
		$this->fecha_finseguro->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_finseguro'] = &$this->fecha_finseguro;

		// entidad
		$this->entidad = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_entidad', 'entidad', '"entidad"', '"entidad"', 200, 30, -1, FALSE, '"entidad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->entidad->Sortable = TRUE; // Allow sort
		$this->fields['entidad'] = &$this->entidad;

		// observacion
		$this->observacion = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_observacion', 'observacion', '"observacion"', '"observacion"', 200, 100, -1, FALSE, '"observacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->observacion->Sortable = TRUE; // Allow sort
		$this->fields['observacion'] = &$this->observacion;

		// asiganda
		$this->asiganda = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_asiganda', 'asiganda', '"asiganda"', '"asiganda"', 200, 100, -1, FALSE, '"asiganda"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asiganda->Sortable = TRUE; // Allow sort
		$this->fields['asiganda'] = &$this->asiganda;

		// config_manteni
		$this->config_manteni = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_config_manteni', 'config_manteni', '"config_manteni"', '"config_manteni"', 200, 10, -1, FALSE, '"config_manteni"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->config_manteni->Sortable = TRUE; // Allow sort
		$this->fields['config_manteni'] = &$this->config_manteni;

		// fecha_creacion
		$this->fecha_creacion = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_fecha_creacion', 'fecha_creacion', '"fecha_creacion"', CastDateFieldForLike("\"fecha_creacion\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_creacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_creacion->Sortable = TRUE; // Allow sort
		$this->fecha_creacion->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_creacion'] = &$this->fecha_creacion;

		// longitudambulancia
		$this->longitudambulancia = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_longitudambulancia', 'longitudambulancia', '"longitudambulancia"', '"longitudambulancia"', 200, 30, -1, FALSE, '"longitudambulancia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->longitudambulancia->Sortable = TRUE; // Allow sort
		$this->fields['longitudambulancia'] = &$this->longitudambulancia;

		// latituambulancia
		$this->latituambulancia = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_latituambulancia', 'latituambulancia', '"latituambulancia"', '"latituambulancia"', 200, 30, -1, FALSE, '"latituambulancia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->latituambulancia->Sortable = TRUE; // Allow sort
		$this->fields['latituambulancia'] = &$this->latituambulancia;

		// especial
		$this->especial = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_especial', 'especial', '"especial"', 'CAST("especial" AS varchar(255))', 2, 2, -1, FALSE, '"especial"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->especial->Sortable = TRUE; // Allow sort
		$this->especial->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['especial'] = &$this->especial;

		// id_tipotransport
		$this->id_tipotransport = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_id_tipotransport', 'id_tipotransport', '"id_tipotransport"', 'CAST("id_tipotransport" AS varchar(255))', 2, 2, -1, FALSE, '"id_tipotransport"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_tipotransport->Sortable = TRUE; // Allow sort
		$this->id_tipotransport->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_tipotransport'] = &$this->id_tipotransport;

		// tipo_amb_es
		$this->tipo_amb_es = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_tipo_amb_es', 'tipo_amb_es', '"tipo_amb_es"', '"tipo_amb_es"', 200, 60, -1, FALSE, '"tipo_amb_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_amb_es->Sortable = TRUE; // Allow sort
		$this->fields['tipo_amb_es'] = &$this->tipo_amb_es;

		// tipo_amb_en
		$this->tipo_amb_en = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_tipo_amb_en', 'tipo_amb_en', '"tipo_amb_en"', '"tipo_amb_en"', 200, 60, -1, FALSE, '"tipo_amb_en"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_amb_en->Sortable = TRUE; // Allow sort
		$this->fields['tipo_amb_en'] = &$this->tipo_amb_en;

		// tipo_amb_pr
		$this->tipo_amb_pr = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_tipo_amb_pr', 'tipo_amb_pr', '"tipo_amb_pr"', '"tipo_amb_pr"', 200, 60, -1, FALSE, '"tipo_amb_pr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_amb_pr->Sortable = TRUE; // Allow sort
		$this->fields['tipo_amb_pr'] = &$this->tipo_amb_pr;

		// tipo_amb_fr
		$this->tipo_amb_fr = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_tipo_amb_fr', 'tipo_amb_fr', '"tipo_amb_fr"', '"tipo_amb_fr"', 200, 60, -1, FALSE, '"tipo_amb_fr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_amb_fr->Sortable = TRUE; // Allow sort
		$this->fields['tipo_amb_fr'] = &$this->tipo_amb_fr;

		// codigo
		$this->codigo = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_codigo', 'codigo', '"codigo"', '"codigo"', 200, 60, -1, FALSE, '"codigo"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->codigo->Sortable = TRUE; // Allow sort
		$this->fields['codigo'] = &$this->codigo;

		// id_especialambulancia
		$this->id_especialambulancia = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_id_especialambulancia', 'id_especialambulancia', '"id_especialambulancia"', 'CAST("id_especialambulancia" AS varchar(255))', 2, 2, -1, FALSE, '"id_especialambulancia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_especialambulancia->Sortable = TRUE; // Allow sort
		$this->id_especialambulancia->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_especialambulancia'] = &$this->id_especialambulancia;

		// especial_es
		$this->especial_es = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_especial_es', 'especial_es', '"especial_es"', '"especial_es"', 200, 60, -1, FALSE, '"especial_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->especial_es->Sortable = TRUE; // Allow sort
		$this->fields['especial_es'] = &$this->especial_es;

		// especial_en
		$this->especial_en = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_especial_en', 'especial_en', '"especial_en"', '"especial_en"', 200, 60, -1, FALSE, '"especial_en"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->especial_en->Sortable = TRUE; // Allow sort
		$this->fields['especial_en'] = &$this->especial_en;

		// especial_pr
		$this->especial_pr = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_especial_pr', 'especial_pr', '"especial_pr"', '"especial_pr"', 200, 60, -1, FALSE, '"especial_pr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->especial_pr->Sortable = TRUE; // Allow sort
		$this->fields['especial_pr'] = &$this->especial_pr;

		// especial_fr
		$this->especial_fr = new DbField('asigna_ambulancia', 'asigna_ambulancia', 'x_especial_fr', 'especial_fr', '"especial_fr"', '"especial_fr"', 200, 60, -1, FALSE, '"especial_fr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->especial_fr->Sortable = TRUE; // Allow sort
		$this->fields['especial_fr'] = &$this->especial_fr;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"asigna_ambulancia\"";
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
			if (array_key_exists('id_ambulancias', $rs))
				AddFilter($where, QuotedName('id_ambulancias', $this->Dbid) . '=' . QuotedValue($rs['id_ambulancias'], $this->id_ambulancias->DataType, $this->Dbid));
			if (array_key_exists('cod_ambulancias', $rs))
				AddFilter($where, QuotedName('cod_ambulancias', $this->Dbid) . '=' . QuotedValue($rs['cod_ambulancias'], $this->cod_ambulancias->DataType, $this->Dbid));
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
		$this->id_ambulancias->DbValue = $row['id_ambulancias'];
		$this->cod_ambulancias->DbValue = $row['cod_ambulancias'];
		$this->placas->DbValue = $row['placas'];
		$this->chasis->DbValue = $row['chasis'];
		$this->marca->DbValue = $row['marca'];
		$this->modelo->DbValue = $row['modelo'];
		$this->tipo_translado->DbValue = $row['tipo_translado'];
		$this->tipo_conbustible->DbValue = $row['tipo_conbustible'];
		$this->modalidad->DbValue = $row['modalidad'];
		$this->estado->DbValue = $row['estado'];
		$this->ubicacion->DbValue = $row['ubicacion'];
		$this->disponible->DbValue = $row['disponible'];
		$this->fecha_iniseguro->DbValue = $row['fecha_iniseguro'];
		$this->fecha_finseguro->DbValue = $row['fecha_finseguro'];
		$this->entidad->DbValue = $row['entidad'];
		$this->observacion->DbValue = $row['observacion'];
		$this->asiganda->DbValue = $row['asiganda'];
		$this->config_manteni->DbValue = $row['config_manteni'];
		$this->fecha_creacion->DbValue = $row['fecha_creacion'];
		$this->longitudambulancia->DbValue = $row['longitudambulancia'];
		$this->latituambulancia->DbValue = $row['latituambulancia'];
		$this->especial->DbValue = $row['especial'];
		$this->id_tipotransport->DbValue = $row['id_tipotransport'];
		$this->tipo_amb_es->DbValue = $row['tipo_amb_es'];
		$this->tipo_amb_en->DbValue = $row['tipo_amb_en'];
		$this->tipo_amb_pr->DbValue = $row['tipo_amb_pr'];
		$this->tipo_amb_fr->DbValue = $row['tipo_amb_fr'];
		$this->codigo->DbValue = $row['codigo'];
		$this->id_especialambulancia->DbValue = $row['id_especialambulancia'];
		$this->especial_es->DbValue = $row['especial_es'];
		$this->especial_en->DbValue = $row['especial_en'];
		$this->especial_pr->DbValue = $row['especial_pr'];
		$this->especial_fr->DbValue = $row['especial_fr'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_ambulancias\" = @id_ambulancias@ AND \"cod_ambulancias\" = '@cod_ambulancias@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_ambulancias', $row) ? $row['id_ambulancias'] : NULL;
		else
			$val = $this->id_ambulancias->OldValue !== NULL ? $this->id_ambulancias->OldValue : $this->id_ambulancias->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_ambulancias@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		if (is_array($row))
			$val = array_key_exists('cod_ambulancias', $row) ? $row['cod_ambulancias'] : NULL;
		else
			$val = $this->cod_ambulancias->OldValue !== NULL ? $this->cod_ambulancias->OldValue : $this->cod_ambulancias->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@cod_ambulancias@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "asigna_ambulancialist.php";
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
		if ($pageName == "asigna_ambulanciaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "asigna_ambulanciaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "asigna_ambulanciaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "asigna_ambulancialist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("asigna_ambulanciaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("asigna_ambulanciaview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "asigna_ambulanciaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "asigna_ambulanciaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("asigna_ambulanciaedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("asigna_ambulanciaadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("asigna_ambulanciadelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_ambulancias:" . JsonEncode($this->id_ambulancias->CurrentValue, "number");
		$json .= ",cod_ambulancias:" . JsonEncode($this->cod_ambulancias->CurrentValue, "string");
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
		if ($this->id_ambulancias->CurrentValue != NULL) {
			$url .= "id_ambulancias=" . urlencode($this->id_ambulancias->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->cod_ambulancias->CurrentValue != NULL) {
			$url .= "&cod_ambulancias=" . urlencode($this->cod_ambulancias->CurrentValue);
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
			if (Param("id_ambulancias") !== NULL)
				$arKey[] = Param("id_ambulancias");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("cod_ambulancias") !== NULL)
				$arKey[] = Param("cod_ambulancias");
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
				if (!is_numeric($key[0])) // id_ambulancias
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
				$this->id_ambulancias->CurrentValue = $key[0];
			else
				$this->id_ambulancias->OldValue = $key[0];
			if ($setCurrent)
				$this->cod_ambulancias->CurrentValue = $key[1];
			else
				$this->cod_ambulancias->OldValue = $key[1];
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
		$this->id_ambulancias->setDbValue($rs->fields('id_ambulancias'));
		$this->cod_ambulancias->setDbValue($rs->fields('cod_ambulancias'));
		$this->placas->setDbValue($rs->fields('placas'));
		$this->chasis->setDbValue($rs->fields('chasis'));
		$this->marca->setDbValue($rs->fields('marca'));
		$this->modelo->setDbValue($rs->fields('modelo'));
		$this->tipo_translado->setDbValue($rs->fields('tipo_translado'));
		$this->tipo_conbustible->setDbValue($rs->fields('tipo_conbustible'));
		$this->modalidad->setDbValue($rs->fields('modalidad'));
		$this->estado->setDbValue($rs->fields('estado'));
		$this->ubicacion->setDbValue($rs->fields('ubicacion'));
		$this->disponible->setDbValue($rs->fields('disponible'));
		$this->fecha_iniseguro->setDbValue($rs->fields('fecha_iniseguro'));
		$this->fecha_finseguro->setDbValue($rs->fields('fecha_finseguro'));
		$this->entidad->setDbValue($rs->fields('entidad'));
		$this->observacion->setDbValue($rs->fields('observacion'));
		$this->asiganda->setDbValue($rs->fields('asiganda'));
		$this->config_manteni->setDbValue($rs->fields('config_manteni'));
		$this->fecha_creacion->setDbValue($rs->fields('fecha_creacion'));
		$this->longitudambulancia->setDbValue($rs->fields('longitudambulancia'));
		$this->latituambulancia->setDbValue($rs->fields('latituambulancia'));
		$this->especial->setDbValue($rs->fields('especial'));
		$this->id_tipotransport->setDbValue($rs->fields('id_tipotransport'));
		$this->tipo_amb_es->setDbValue($rs->fields('tipo_amb_es'));
		$this->tipo_amb_en->setDbValue($rs->fields('tipo_amb_en'));
		$this->tipo_amb_pr->setDbValue($rs->fields('tipo_amb_pr'));
		$this->tipo_amb_fr->setDbValue($rs->fields('tipo_amb_fr'));
		$this->codigo->setDbValue($rs->fields('codigo'));
		$this->id_especialambulancia->setDbValue($rs->fields('id_especialambulancia'));
		$this->especial_es->setDbValue($rs->fields('especial_es'));
		$this->especial_en->setDbValue($rs->fields('especial_en'));
		$this->especial_pr->setDbValue($rs->fields('especial_pr'));
		$this->especial_fr->setDbValue($rs->fields('especial_fr'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_ambulancias
		// cod_ambulancias
		// placas
		// chasis
		// marca
		// modelo
		// tipo_translado
		// tipo_conbustible
		// modalidad
		// estado
		// ubicacion
		// disponible
		// fecha_iniseguro
		// fecha_finseguro
		// entidad
		// observacion
		// asiganda
		// config_manteni
		// fecha_creacion
		// longitudambulancia
		// latituambulancia
		// especial
		// id_tipotransport
		// tipo_amb_es
		// tipo_amb_en
		// tipo_amb_pr
		// tipo_amb_fr
		// codigo
		// id_especialambulancia
		// especial_es
		// especial_en
		// especial_pr
		// especial_fr
		// id_ambulancias

		$this->id_ambulancias->ViewValue = $this->id_ambulancias->CurrentValue;
		$this->id_ambulancias->ViewValue = FormatNumber($this->id_ambulancias->ViewValue, 0, -2, -2, -2);
		$this->id_ambulancias->ViewCustomAttributes = "";

		// cod_ambulancias
		$this->cod_ambulancias->ViewValue = $this->cod_ambulancias->CurrentValue;
		$this->cod_ambulancias->ViewCustomAttributes = "";

		// placas
		$this->placas->ViewValue = $this->placas->CurrentValue;
		$this->placas->ViewCustomAttributes = "";

		// chasis
		$this->chasis->ViewValue = $this->chasis->CurrentValue;
		$this->chasis->ViewCustomAttributes = "";

		// marca
		$this->marca->ViewValue = $this->marca->CurrentValue;
		$this->marca->ViewCustomAttributes = "";

		// modelo
		$this->modelo->ViewValue = $this->modelo->CurrentValue;
		$this->modelo->ViewCustomAttributes = "";

		// tipo_translado
		$this->tipo_translado->ViewValue = $this->tipo_translado->CurrentValue;
		$this->tipo_translado->ViewValue = FormatNumber($this->tipo_translado->ViewValue, 0, -2, -2, -2);
		$this->tipo_translado->ViewCustomAttributes = "";

		// tipo_conbustible
		$this->tipo_conbustible->ViewValue = $this->tipo_conbustible->CurrentValue;
		$this->tipo_conbustible->ViewCustomAttributes = "";

		// modalidad
		$this->modalidad->ViewValue = $this->modalidad->CurrentValue;
		$this->modalidad->ViewValue = FormatNumber($this->modalidad->ViewValue, 0, -2, -2, -2);
		$this->modalidad->ViewCustomAttributes = "";

		// estado
		$this->estado->ViewValue = $this->estado->CurrentValue;
		$this->estado->ViewValue = FormatNumber($this->estado->ViewValue, 0, -2, -2, -2);
		$this->estado->ViewCustomAttributes = "";

		// ubicacion
		$this->ubicacion->ViewValue = $this->ubicacion->CurrentValue;
		$this->ubicacion->ViewCustomAttributes = "";

		// disponible
		$this->disponible->ViewValue = $this->disponible->CurrentValue;
		$this->disponible->ViewCustomAttributes = "";

		// fecha_iniseguro
		$this->fecha_iniseguro->ViewValue = $this->fecha_iniseguro->CurrentValue;
		$this->fecha_iniseguro->ViewValue = FormatDateTime($this->fecha_iniseguro->ViewValue, 0);
		$this->fecha_iniseguro->ViewCustomAttributes = "";

		// fecha_finseguro
		$this->fecha_finseguro->ViewValue = $this->fecha_finseguro->CurrentValue;
		$this->fecha_finseguro->ViewValue = FormatDateTime($this->fecha_finseguro->ViewValue, 0);
		$this->fecha_finseguro->ViewCustomAttributes = "";

		// entidad
		$this->entidad->ViewValue = $this->entidad->CurrentValue;
		$this->entidad->ViewCustomAttributes = "";

		// observacion
		$this->observacion->ViewValue = $this->observacion->CurrentValue;
		$this->observacion->ViewCustomAttributes = "";

		// asiganda
		$this->asiganda->ViewValue = $this->asiganda->CurrentValue;
		$this->asiganda->ViewCustomAttributes = "";

		// config_manteni
		$this->config_manteni->ViewValue = $this->config_manteni->CurrentValue;
		$this->config_manteni->ViewCustomAttributes = "";

		// fecha_creacion
		$this->fecha_creacion->ViewValue = $this->fecha_creacion->CurrentValue;
		$this->fecha_creacion->ViewValue = FormatDateTime($this->fecha_creacion->ViewValue, 0);
		$this->fecha_creacion->ViewCustomAttributes = "";

		// longitudambulancia
		$this->longitudambulancia->ViewValue = $this->longitudambulancia->CurrentValue;
		$this->longitudambulancia->ViewCustomAttributes = "";

		// latituambulancia
		$this->latituambulancia->ViewValue = $this->latituambulancia->CurrentValue;
		$this->latituambulancia->ViewCustomAttributes = "";

		// especial
		$this->especial->ViewValue = $this->especial->CurrentValue;
		$this->especial->ViewValue = FormatNumber($this->especial->ViewValue, 0, -2, -2, -2);
		$this->especial->ViewCustomAttributes = "";

		// id_tipotransport
		$this->id_tipotransport->ViewValue = $this->id_tipotransport->CurrentValue;
		$this->id_tipotransport->ViewValue = FormatNumber($this->id_tipotransport->ViewValue, 0, -2, -2, -2);
		$this->id_tipotransport->ViewCustomAttributes = "";

		// tipo_amb_es
		$this->tipo_amb_es->ViewValue = $this->tipo_amb_es->CurrentValue;
		$this->tipo_amb_es->ViewCustomAttributes = "";

		// tipo_amb_en
		$this->tipo_amb_en->ViewValue = $this->tipo_amb_en->CurrentValue;
		$this->tipo_amb_en->ViewCustomAttributes = "";

		// tipo_amb_pr
		$this->tipo_amb_pr->ViewValue = $this->tipo_amb_pr->CurrentValue;
		$this->tipo_amb_pr->ViewCustomAttributes = "";

		// tipo_amb_fr
		$this->tipo_amb_fr->ViewValue = $this->tipo_amb_fr->CurrentValue;
		$this->tipo_amb_fr->ViewCustomAttributes = "";

		// codigo
		$this->codigo->ViewValue = $this->codigo->CurrentValue;
		$this->codigo->ViewCustomAttributes = "";

		// id_especialambulancia
		$this->id_especialambulancia->ViewValue = $this->id_especialambulancia->CurrentValue;
		$this->id_especialambulancia->ViewValue = FormatNumber($this->id_especialambulancia->ViewValue, 0, -2, -2, -2);
		$this->id_especialambulancia->ViewCustomAttributes = "";

		// especial_es
		$this->especial_es->ViewValue = $this->especial_es->CurrentValue;
		$this->especial_es->ViewCustomAttributes = "";

		// especial_en
		$this->especial_en->ViewValue = $this->especial_en->CurrentValue;
		$this->especial_en->ViewCustomAttributes = "";

		// especial_pr
		$this->especial_pr->ViewValue = $this->especial_pr->CurrentValue;
		$this->especial_pr->ViewCustomAttributes = "";

		// especial_fr
		$this->especial_fr->ViewValue = $this->especial_fr->CurrentValue;
		$this->especial_fr->ViewCustomAttributes = "";

		// id_ambulancias
		$this->id_ambulancias->LinkCustomAttributes = "";
		$this->id_ambulancias->HrefValue = "";
		$this->id_ambulancias->TooltipValue = "";

		// cod_ambulancias
		$this->cod_ambulancias->LinkCustomAttributes = "";
		$this->cod_ambulancias->HrefValue = "";
		$this->cod_ambulancias->TooltipValue = "";

		// placas
		$this->placas->LinkCustomAttributes = "";
		$this->placas->HrefValue = "";
		$this->placas->TooltipValue = "";

		// chasis
		$this->chasis->LinkCustomAttributes = "";
		$this->chasis->HrefValue = "";
		$this->chasis->TooltipValue = "";

		// marca
		$this->marca->LinkCustomAttributes = "";
		$this->marca->HrefValue = "";
		$this->marca->TooltipValue = "";

		// modelo
		$this->modelo->LinkCustomAttributes = "";
		$this->modelo->HrefValue = "";
		$this->modelo->TooltipValue = "";

		// tipo_translado
		$this->tipo_translado->LinkCustomAttributes = "";
		$this->tipo_translado->HrefValue = "";
		$this->tipo_translado->TooltipValue = "";

		// tipo_conbustible
		$this->tipo_conbustible->LinkCustomAttributes = "";
		$this->tipo_conbustible->HrefValue = "";
		$this->tipo_conbustible->TooltipValue = "";

		// modalidad
		$this->modalidad->LinkCustomAttributes = "";
		$this->modalidad->HrefValue = "";
		$this->modalidad->TooltipValue = "";

		// estado
		$this->estado->LinkCustomAttributes = "";
		$this->estado->HrefValue = "";
		$this->estado->TooltipValue = "";

		// ubicacion
		$this->ubicacion->LinkCustomAttributes = "";
		$this->ubicacion->HrefValue = "";
		$this->ubicacion->TooltipValue = "";

		// disponible
		$this->disponible->LinkCustomAttributes = "";
		$this->disponible->HrefValue = "";
		$this->disponible->TooltipValue = "";

		// fecha_iniseguro
		$this->fecha_iniseguro->LinkCustomAttributes = "";
		$this->fecha_iniseguro->HrefValue = "";
		$this->fecha_iniseguro->TooltipValue = "";

		// fecha_finseguro
		$this->fecha_finseguro->LinkCustomAttributes = "";
		$this->fecha_finseguro->HrefValue = "";
		$this->fecha_finseguro->TooltipValue = "";

		// entidad
		$this->entidad->LinkCustomAttributes = "";
		$this->entidad->HrefValue = "";
		$this->entidad->TooltipValue = "";

		// observacion
		$this->observacion->LinkCustomAttributes = "";
		$this->observacion->HrefValue = "";
		$this->observacion->TooltipValue = "";

		// asiganda
		$this->asiganda->LinkCustomAttributes = "";
		$this->asiganda->HrefValue = "";
		$this->asiganda->TooltipValue = "";

		// config_manteni
		$this->config_manteni->LinkCustomAttributes = "";
		$this->config_manteni->HrefValue = "";
		$this->config_manteni->TooltipValue = "";

		// fecha_creacion
		$this->fecha_creacion->LinkCustomAttributes = "";
		$this->fecha_creacion->HrefValue = "";
		$this->fecha_creacion->TooltipValue = "";

		// longitudambulancia
		$this->longitudambulancia->LinkCustomAttributes = "";
		$this->longitudambulancia->HrefValue = "";
		$this->longitudambulancia->TooltipValue = "";

		// latituambulancia
		$this->latituambulancia->LinkCustomAttributes = "";
		$this->latituambulancia->HrefValue = "";
		$this->latituambulancia->TooltipValue = "";

		// especial
		$this->especial->LinkCustomAttributes = "";
		$this->especial->HrefValue = "";
		$this->especial->TooltipValue = "";

		// id_tipotransport
		$this->id_tipotransport->LinkCustomAttributes = "";
		$this->id_tipotransport->HrefValue = "";
		$this->id_tipotransport->TooltipValue = "";

		// tipo_amb_es
		$this->tipo_amb_es->LinkCustomAttributes = "";
		$this->tipo_amb_es->HrefValue = "";
		$this->tipo_amb_es->TooltipValue = "";

		// tipo_amb_en
		$this->tipo_amb_en->LinkCustomAttributes = "";
		$this->tipo_amb_en->HrefValue = "";
		$this->tipo_amb_en->TooltipValue = "";

		// tipo_amb_pr
		$this->tipo_amb_pr->LinkCustomAttributes = "";
		$this->tipo_amb_pr->HrefValue = "";
		$this->tipo_amb_pr->TooltipValue = "";

		// tipo_amb_fr
		$this->tipo_amb_fr->LinkCustomAttributes = "";
		$this->tipo_amb_fr->HrefValue = "";
		$this->tipo_amb_fr->TooltipValue = "";

		// codigo
		$this->codigo->LinkCustomAttributes = "";
		$this->codigo->HrefValue = "";
		$this->codigo->TooltipValue = "";

		// id_especialambulancia
		$this->id_especialambulancia->LinkCustomAttributes = "";
		$this->id_especialambulancia->HrefValue = "";
		$this->id_especialambulancia->TooltipValue = "";

		// especial_es
		$this->especial_es->LinkCustomAttributes = "";
		$this->especial_es->HrefValue = "";
		$this->especial_es->TooltipValue = "";

		// especial_en
		$this->especial_en->LinkCustomAttributes = "";
		$this->especial_en->HrefValue = "";
		$this->especial_en->TooltipValue = "";

		// especial_pr
		$this->especial_pr->LinkCustomAttributes = "";
		$this->especial_pr->HrefValue = "";
		$this->especial_pr->TooltipValue = "";

		// especial_fr
		$this->especial_fr->LinkCustomAttributes = "";
		$this->especial_fr->HrefValue = "";
		$this->especial_fr->TooltipValue = "";

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

		// id_ambulancias
		$this->id_ambulancias->EditAttrs["class"] = "form-control";
		$this->id_ambulancias->EditCustomAttributes = "";
		$this->id_ambulancias->EditValue = $this->id_ambulancias->CurrentValue;
		$this->id_ambulancias->PlaceHolder = RemoveHtml($this->id_ambulancias->caption());

		// cod_ambulancias
		$this->cod_ambulancias->EditAttrs["class"] = "form-control";
		$this->cod_ambulancias->EditCustomAttributes = "";
		if (!$this->cod_ambulancias->Raw)
			$this->cod_ambulancias->CurrentValue = HtmlDecode($this->cod_ambulancias->CurrentValue);
		$this->cod_ambulancias->EditValue = $this->cod_ambulancias->CurrentValue;
		$this->cod_ambulancias->PlaceHolder = RemoveHtml($this->cod_ambulancias->caption());

		// placas
		$this->placas->EditAttrs["class"] = "form-control";
		$this->placas->EditCustomAttributes = "";
		if (!$this->placas->Raw)
			$this->placas->CurrentValue = HtmlDecode($this->placas->CurrentValue);
		$this->placas->EditValue = $this->placas->CurrentValue;
		$this->placas->PlaceHolder = RemoveHtml($this->placas->caption());

		// chasis
		$this->chasis->EditAttrs["class"] = "form-control";
		$this->chasis->EditCustomAttributes = "";
		if (!$this->chasis->Raw)
			$this->chasis->CurrentValue = HtmlDecode($this->chasis->CurrentValue);
		$this->chasis->EditValue = $this->chasis->CurrentValue;
		$this->chasis->PlaceHolder = RemoveHtml($this->chasis->caption());

		// marca
		$this->marca->EditAttrs["class"] = "form-control";
		$this->marca->EditCustomAttributes = "";
		if (!$this->marca->Raw)
			$this->marca->CurrentValue = HtmlDecode($this->marca->CurrentValue);
		$this->marca->EditValue = $this->marca->CurrentValue;
		$this->marca->PlaceHolder = RemoveHtml($this->marca->caption());

		// modelo
		$this->modelo->EditAttrs["class"] = "form-control";
		$this->modelo->EditCustomAttributes = "";
		if (!$this->modelo->Raw)
			$this->modelo->CurrentValue = HtmlDecode($this->modelo->CurrentValue);
		$this->modelo->EditValue = $this->modelo->CurrentValue;
		$this->modelo->PlaceHolder = RemoveHtml($this->modelo->caption());

		// tipo_translado
		$this->tipo_translado->EditAttrs["class"] = "form-control";
		$this->tipo_translado->EditCustomAttributes = "";
		$this->tipo_translado->EditValue = $this->tipo_translado->CurrentValue;
		$this->tipo_translado->PlaceHolder = RemoveHtml($this->tipo_translado->caption());

		// tipo_conbustible
		$this->tipo_conbustible->EditAttrs["class"] = "form-control";
		$this->tipo_conbustible->EditCustomAttributes = "";
		if (!$this->tipo_conbustible->Raw)
			$this->tipo_conbustible->CurrentValue = HtmlDecode($this->tipo_conbustible->CurrentValue);
		$this->tipo_conbustible->EditValue = $this->tipo_conbustible->CurrentValue;
		$this->tipo_conbustible->PlaceHolder = RemoveHtml($this->tipo_conbustible->caption());

		// modalidad
		$this->modalidad->EditAttrs["class"] = "form-control";
		$this->modalidad->EditCustomAttributes = "";
		$this->modalidad->EditValue = $this->modalidad->CurrentValue;
		$this->modalidad->PlaceHolder = RemoveHtml($this->modalidad->caption());

		// estado
		$this->estado->EditAttrs["class"] = "form-control";
		$this->estado->EditCustomAttributes = "";
		$this->estado->EditValue = $this->estado->CurrentValue;
		$this->estado->PlaceHolder = RemoveHtml($this->estado->caption());

		// ubicacion
		$this->ubicacion->EditAttrs["class"] = "form-control";
		$this->ubicacion->EditCustomAttributes = "";
		if (!$this->ubicacion->Raw)
			$this->ubicacion->CurrentValue = HtmlDecode($this->ubicacion->CurrentValue);
		$this->ubicacion->EditValue = $this->ubicacion->CurrentValue;
		$this->ubicacion->PlaceHolder = RemoveHtml($this->ubicacion->caption());

		// disponible
		$this->disponible->EditAttrs["class"] = "form-control";
		$this->disponible->EditCustomAttributes = "";
		if (!$this->disponible->Raw)
			$this->disponible->CurrentValue = HtmlDecode($this->disponible->CurrentValue);
		$this->disponible->EditValue = $this->disponible->CurrentValue;
		$this->disponible->PlaceHolder = RemoveHtml($this->disponible->caption());

		// fecha_iniseguro
		$this->fecha_iniseguro->EditAttrs["class"] = "form-control";
		$this->fecha_iniseguro->EditCustomAttributes = "";
		$this->fecha_iniseguro->EditValue = FormatDateTime($this->fecha_iniseguro->CurrentValue, 8);
		$this->fecha_iniseguro->PlaceHolder = RemoveHtml($this->fecha_iniseguro->caption());

		// fecha_finseguro
		$this->fecha_finseguro->EditAttrs["class"] = "form-control";
		$this->fecha_finseguro->EditCustomAttributes = "";
		$this->fecha_finseguro->EditValue = FormatDateTime($this->fecha_finseguro->CurrentValue, 8);
		$this->fecha_finseguro->PlaceHolder = RemoveHtml($this->fecha_finseguro->caption());

		// entidad
		$this->entidad->EditAttrs["class"] = "form-control";
		$this->entidad->EditCustomAttributes = "";
		if (!$this->entidad->Raw)
			$this->entidad->CurrentValue = HtmlDecode($this->entidad->CurrentValue);
		$this->entidad->EditValue = $this->entidad->CurrentValue;
		$this->entidad->PlaceHolder = RemoveHtml($this->entidad->caption());

		// observacion
		$this->observacion->EditAttrs["class"] = "form-control";
		$this->observacion->EditCustomAttributes = "";
		if (!$this->observacion->Raw)
			$this->observacion->CurrentValue = HtmlDecode($this->observacion->CurrentValue);
		$this->observacion->EditValue = $this->observacion->CurrentValue;
		$this->observacion->PlaceHolder = RemoveHtml($this->observacion->caption());

		// asiganda
		$this->asiganda->EditAttrs["class"] = "form-control";
		$this->asiganda->EditCustomAttributes = "";
		if (!$this->asiganda->Raw)
			$this->asiganda->CurrentValue = HtmlDecode($this->asiganda->CurrentValue);
		$this->asiganda->EditValue = $this->asiganda->CurrentValue;
		$this->asiganda->PlaceHolder = RemoveHtml($this->asiganda->caption());

		// config_manteni
		$this->config_manteni->EditAttrs["class"] = "form-control";
		$this->config_manteni->EditCustomAttributes = "";
		if (!$this->config_manteni->Raw)
			$this->config_manteni->CurrentValue = HtmlDecode($this->config_manteni->CurrentValue);
		$this->config_manteni->EditValue = $this->config_manteni->CurrentValue;
		$this->config_manteni->PlaceHolder = RemoveHtml($this->config_manteni->caption());

		// fecha_creacion
		$this->fecha_creacion->EditAttrs["class"] = "form-control";
		$this->fecha_creacion->EditCustomAttributes = "";
		$this->fecha_creacion->EditValue = FormatDateTime($this->fecha_creacion->CurrentValue, 8);
		$this->fecha_creacion->PlaceHolder = RemoveHtml($this->fecha_creacion->caption());

		// longitudambulancia
		$this->longitudambulancia->EditAttrs["class"] = "form-control";
		$this->longitudambulancia->EditCustomAttributes = "";
		if (!$this->longitudambulancia->Raw)
			$this->longitudambulancia->CurrentValue = HtmlDecode($this->longitudambulancia->CurrentValue);
		$this->longitudambulancia->EditValue = $this->longitudambulancia->CurrentValue;
		$this->longitudambulancia->PlaceHolder = RemoveHtml($this->longitudambulancia->caption());

		// latituambulancia
		$this->latituambulancia->EditAttrs["class"] = "form-control";
		$this->latituambulancia->EditCustomAttributes = "";
		if (!$this->latituambulancia->Raw)
			$this->latituambulancia->CurrentValue = HtmlDecode($this->latituambulancia->CurrentValue);
		$this->latituambulancia->EditValue = $this->latituambulancia->CurrentValue;
		$this->latituambulancia->PlaceHolder = RemoveHtml($this->latituambulancia->caption());

		// especial
		$this->especial->EditAttrs["class"] = "form-control";
		$this->especial->EditCustomAttributes = "";
		$this->especial->EditValue = $this->especial->CurrentValue;
		$this->especial->PlaceHolder = RemoveHtml($this->especial->caption());

		// id_tipotransport
		$this->id_tipotransport->EditAttrs["class"] = "form-control";
		$this->id_tipotransport->EditCustomAttributes = "";
		$this->id_tipotransport->EditValue = $this->id_tipotransport->CurrentValue;
		$this->id_tipotransport->PlaceHolder = RemoveHtml($this->id_tipotransport->caption());

		// tipo_amb_es
		$this->tipo_amb_es->EditAttrs["class"] = "form-control";
		$this->tipo_amb_es->EditCustomAttributes = "";
		if (!$this->tipo_amb_es->Raw)
			$this->tipo_amb_es->CurrentValue = HtmlDecode($this->tipo_amb_es->CurrentValue);
		$this->tipo_amb_es->EditValue = $this->tipo_amb_es->CurrentValue;
		$this->tipo_amb_es->PlaceHolder = RemoveHtml($this->tipo_amb_es->caption());

		// tipo_amb_en
		$this->tipo_amb_en->EditAttrs["class"] = "form-control";
		$this->tipo_amb_en->EditCustomAttributes = "";
		if (!$this->tipo_amb_en->Raw)
			$this->tipo_amb_en->CurrentValue = HtmlDecode($this->tipo_amb_en->CurrentValue);
		$this->tipo_amb_en->EditValue = $this->tipo_amb_en->CurrentValue;
		$this->tipo_amb_en->PlaceHolder = RemoveHtml($this->tipo_amb_en->caption());

		// tipo_amb_pr
		$this->tipo_amb_pr->EditAttrs["class"] = "form-control";
		$this->tipo_amb_pr->EditCustomAttributes = "";
		if (!$this->tipo_amb_pr->Raw)
			$this->tipo_amb_pr->CurrentValue = HtmlDecode($this->tipo_amb_pr->CurrentValue);
		$this->tipo_amb_pr->EditValue = $this->tipo_amb_pr->CurrentValue;
		$this->tipo_amb_pr->PlaceHolder = RemoveHtml($this->tipo_amb_pr->caption());

		// tipo_amb_fr
		$this->tipo_amb_fr->EditAttrs["class"] = "form-control";
		$this->tipo_amb_fr->EditCustomAttributes = "";
		if (!$this->tipo_amb_fr->Raw)
			$this->tipo_amb_fr->CurrentValue = HtmlDecode($this->tipo_amb_fr->CurrentValue);
		$this->tipo_amb_fr->EditValue = $this->tipo_amb_fr->CurrentValue;
		$this->tipo_amb_fr->PlaceHolder = RemoveHtml($this->tipo_amb_fr->caption());

		// codigo
		$this->codigo->EditAttrs["class"] = "form-control";
		$this->codigo->EditCustomAttributes = "";
		if (!$this->codigo->Raw)
			$this->codigo->CurrentValue = HtmlDecode($this->codigo->CurrentValue);
		$this->codigo->EditValue = $this->codigo->CurrentValue;
		$this->codigo->PlaceHolder = RemoveHtml($this->codigo->caption());

		// id_especialambulancia
		$this->id_especialambulancia->EditAttrs["class"] = "form-control";
		$this->id_especialambulancia->EditCustomAttributes = "";
		$this->id_especialambulancia->EditValue = $this->id_especialambulancia->CurrentValue;
		$this->id_especialambulancia->PlaceHolder = RemoveHtml($this->id_especialambulancia->caption());

		// especial_es
		$this->especial_es->EditAttrs["class"] = "form-control";
		$this->especial_es->EditCustomAttributes = "";
		if (!$this->especial_es->Raw)
			$this->especial_es->CurrentValue = HtmlDecode($this->especial_es->CurrentValue);
		$this->especial_es->EditValue = $this->especial_es->CurrentValue;
		$this->especial_es->PlaceHolder = RemoveHtml($this->especial_es->caption());

		// especial_en
		$this->especial_en->EditAttrs["class"] = "form-control";
		$this->especial_en->EditCustomAttributes = "";
		if (!$this->especial_en->Raw)
			$this->especial_en->CurrentValue = HtmlDecode($this->especial_en->CurrentValue);
		$this->especial_en->EditValue = $this->especial_en->CurrentValue;
		$this->especial_en->PlaceHolder = RemoveHtml($this->especial_en->caption());

		// especial_pr
		$this->especial_pr->EditAttrs["class"] = "form-control";
		$this->especial_pr->EditCustomAttributes = "";
		if (!$this->especial_pr->Raw)
			$this->especial_pr->CurrentValue = HtmlDecode($this->especial_pr->CurrentValue);
		$this->especial_pr->EditValue = $this->especial_pr->CurrentValue;
		$this->especial_pr->PlaceHolder = RemoveHtml($this->especial_pr->caption());

		// especial_fr
		$this->especial_fr->EditAttrs["class"] = "form-control";
		$this->especial_fr->EditCustomAttributes = "";
		if (!$this->especial_fr->Raw)
			$this->especial_fr->CurrentValue = HtmlDecode($this->especial_fr->CurrentValue);
		$this->especial_fr->EditValue = $this->especial_fr->CurrentValue;
		$this->especial_fr->PlaceHolder = RemoveHtml($this->especial_fr->caption());

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
					$doc->exportCaption($this->id_ambulancias);
					$doc->exportCaption($this->cod_ambulancias);
					$doc->exportCaption($this->placas);
					$doc->exportCaption($this->chasis);
					$doc->exportCaption($this->marca);
					$doc->exportCaption($this->modelo);
					$doc->exportCaption($this->tipo_translado);
					$doc->exportCaption($this->tipo_conbustible);
					$doc->exportCaption($this->modalidad);
					$doc->exportCaption($this->estado);
					$doc->exportCaption($this->ubicacion);
					$doc->exportCaption($this->disponible);
					$doc->exportCaption($this->fecha_iniseguro);
					$doc->exportCaption($this->fecha_finseguro);
					$doc->exportCaption($this->entidad);
					$doc->exportCaption($this->observacion);
					$doc->exportCaption($this->asiganda);
					$doc->exportCaption($this->config_manteni);
					$doc->exportCaption($this->fecha_creacion);
					$doc->exportCaption($this->longitudambulancia);
					$doc->exportCaption($this->latituambulancia);
					$doc->exportCaption($this->especial);
					$doc->exportCaption($this->id_tipotransport);
					$doc->exportCaption($this->tipo_amb_es);
					$doc->exportCaption($this->tipo_amb_en);
					$doc->exportCaption($this->tipo_amb_pr);
					$doc->exportCaption($this->tipo_amb_fr);
					$doc->exportCaption($this->codigo);
					$doc->exportCaption($this->id_especialambulancia);
					$doc->exportCaption($this->especial_es);
					$doc->exportCaption($this->especial_en);
					$doc->exportCaption($this->especial_pr);
					$doc->exportCaption($this->especial_fr);
				} else {
					$doc->exportCaption($this->id_ambulancias);
					$doc->exportCaption($this->cod_ambulancias);
					$doc->exportCaption($this->placas);
					$doc->exportCaption($this->chasis);
					$doc->exportCaption($this->marca);
					$doc->exportCaption($this->modelo);
					$doc->exportCaption($this->tipo_translado);
					$doc->exportCaption($this->tipo_conbustible);
					$doc->exportCaption($this->modalidad);
					$doc->exportCaption($this->estado);
					$doc->exportCaption($this->ubicacion);
					$doc->exportCaption($this->disponible);
					$doc->exportCaption($this->fecha_iniseguro);
					$doc->exportCaption($this->fecha_finseguro);
					$doc->exportCaption($this->entidad);
					$doc->exportCaption($this->observacion);
					$doc->exportCaption($this->asiganda);
					$doc->exportCaption($this->config_manteni);
					$doc->exportCaption($this->fecha_creacion);
					$doc->exportCaption($this->longitudambulancia);
					$doc->exportCaption($this->latituambulancia);
					$doc->exportCaption($this->especial);
					$doc->exportCaption($this->id_tipotransport);
					$doc->exportCaption($this->tipo_amb_es);
					$doc->exportCaption($this->tipo_amb_en);
					$doc->exportCaption($this->tipo_amb_pr);
					$doc->exportCaption($this->tipo_amb_fr);
					$doc->exportCaption($this->codigo);
					$doc->exportCaption($this->id_especialambulancia);
					$doc->exportCaption($this->especial_es);
					$doc->exportCaption($this->especial_en);
					$doc->exportCaption($this->especial_pr);
					$doc->exportCaption($this->especial_fr);
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
						$doc->exportField($this->id_ambulancias);
						$doc->exportField($this->cod_ambulancias);
						$doc->exportField($this->placas);
						$doc->exportField($this->chasis);
						$doc->exportField($this->marca);
						$doc->exportField($this->modelo);
						$doc->exportField($this->tipo_translado);
						$doc->exportField($this->tipo_conbustible);
						$doc->exportField($this->modalidad);
						$doc->exportField($this->estado);
						$doc->exportField($this->ubicacion);
						$doc->exportField($this->disponible);
						$doc->exportField($this->fecha_iniseguro);
						$doc->exportField($this->fecha_finseguro);
						$doc->exportField($this->entidad);
						$doc->exportField($this->observacion);
						$doc->exportField($this->asiganda);
						$doc->exportField($this->config_manteni);
						$doc->exportField($this->fecha_creacion);
						$doc->exportField($this->longitudambulancia);
						$doc->exportField($this->latituambulancia);
						$doc->exportField($this->especial);
						$doc->exportField($this->id_tipotransport);
						$doc->exportField($this->tipo_amb_es);
						$doc->exportField($this->tipo_amb_en);
						$doc->exportField($this->tipo_amb_pr);
						$doc->exportField($this->tipo_amb_fr);
						$doc->exportField($this->codigo);
						$doc->exportField($this->id_especialambulancia);
						$doc->exportField($this->especial_es);
						$doc->exportField($this->especial_en);
						$doc->exportField($this->especial_pr);
						$doc->exportField($this->especial_fr);
					} else {
						$doc->exportField($this->id_ambulancias);
						$doc->exportField($this->cod_ambulancias);
						$doc->exportField($this->placas);
						$doc->exportField($this->chasis);
						$doc->exportField($this->marca);
						$doc->exportField($this->modelo);
						$doc->exportField($this->tipo_translado);
						$doc->exportField($this->tipo_conbustible);
						$doc->exportField($this->modalidad);
						$doc->exportField($this->estado);
						$doc->exportField($this->ubicacion);
						$doc->exportField($this->disponible);
						$doc->exportField($this->fecha_iniseguro);
						$doc->exportField($this->fecha_finseguro);
						$doc->exportField($this->entidad);
						$doc->exportField($this->observacion);
						$doc->exportField($this->asiganda);
						$doc->exportField($this->config_manteni);
						$doc->exportField($this->fecha_creacion);
						$doc->exportField($this->longitudambulancia);
						$doc->exportField($this->latituambulancia);
						$doc->exportField($this->especial);
						$doc->exportField($this->id_tipotransport);
						$doc->exportField($this->tipo_amb_es);
						$doc->exportField($this->tipo_amb_en);
						$doc->exportField($this->tipo_amb_pr);
						$doc->exportField($this->tipo_amb_fr);
						$doc->exportField($this->codigo);
						$doc->exportField($this->id_especialambulancia);
						$doc->exportField($this->especial_es);
						$doc->exportField($this->especial_en);
						$doc->exportField($this->especial_pr);
						$doc->exportField($this->especial_fr);
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
			AddFilter($filter, "estado ='1'");
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