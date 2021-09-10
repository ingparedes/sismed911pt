<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for interh_reporte
 */
class interh_reporte extends ReportTable
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
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;

	// Export
	public $ExportDoc;
	public $motivo_de_remision;

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
		$this->TableVar = 'interh_reporte';
		$this->TableName = 'interh_reporte';
		$this->TableType = 'REPORT';

		// Update Table
		$this->UpdateTable = "\"interh_principal\"";
		$this->ReportSourceTable = 'interh_principal'; // Report source table
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (report only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions

		// cod_casointerh
		$this->cod_casointerh = new ReportField('interh_reporte', 'interh_reporte', 'x_cod_casointerh', 'cod_casointerh', '"cod_casointerh"', 'CAST("cod_casointerh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_casointerh->Sortable = TRUE; // Allow sort
		$this->cod_casointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->cod_casointerh->SourceTableVar = 'interh_principal';
		$this->fields['cod_casointerh'] = &$this->cod_casointerh;

		// fechahorainterh
		$this->fechahorainterh = new ReportField('interh_reporte', 'interh_reporte', 'x_fechahorainterh', 'fechahorainterh', '"fechahorainterh"', CastDateFieldForLike("\"fechahorainterh\"", 0, "DB"), 135, 8, 0, FALSE, '"fechahorainterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fechahorainterh->Sortable = TRUE; // Allow sort
		$this->fechahorainterh->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fechahorainterh->SourceTableVar = 'interh_principal';
		$this->fields['fechahorainterh'] = &$this->fechahorainterh;

		// hospitalorigen
		$this->hospitalorigen = new ReportField('interh_reporte', 'interh_reporte', 'x_hospitalorigen', 'hospitalorigen', '"hospitalorigen"', '"hospitalorigen"', 200, 100, -1, FALSE, '"hospitalorigen"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospitalorigen->Sortable = TRUE; // Allow sort
		$this->hospitalorigen->SourceTableVar = 'interh_principal';
		$this->fields['hospitalorigen'] = &$this->hospitalorigen;

		// accioninterh
		$this->accioninterh = new ReportField('interh_reporte', 'interh_reporte', 'x_accioninterh', 'accioninterh', '"accioninterh"', 'CAST("accioninterh" AS varchar(255))', 2, 2, -1, FALSE, '"accioninterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->accioninterh->Sortable = TRUE; // Allow sort
		$this->accioninterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->accioninterh->SourceTableVar = 'interh_principal';
		$this->fields['accioninterh'] = &$this->accioninterh;

		// cierreinterh
		$this->cierreinterh = new ReportField('interh_reporte', 'interh_reporte', 'x_cierreinterh', 'cierreinterh', '"cierreinterh"', 'CAST("cierreinterh" AS varchar(255))', 2, 2, -1, FALSE, '"cierreinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cierreinterh->Sortable = TRUE; // Allow sort
		$this->cierreinterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->cierreinterh->SourceTableVar = 'interh_principal';
		$this->fields['cierreinterh'] = &$this->cierreinterh;

		// hospitaldestino
		$this->hospitaldestino = new ReportField('interh_reporte', 'interh_reporte', 'x_hospitaldestino', 'hospitaldestino', '"hospitaldestino"', '"hospitaldestino"', 200, 100, -1, FALSE, '"hospitaldestino"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospitaldestino->Sortable = TRUE; // Allow sort
		$this->hospitaldestino->SourceTableVar = 'interh_principal';
		$this->fields['hospitaldestino'] = &$this->hospitaldestino;

		// sede
		$this->sede = new ReportField('interh_reporte', 'interh_reporte', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->sede->SourceTableVar = 'interh_principal';
		$this->fields['sede'] = &$this->sede;

		// nombre_prioridad
		$this->nombre_prioridad = new ReportField('interh_reporte', 'interh_reporte', 'x_nombre_prioridad', 'nombre_prioridad', '"nombre_prioridad"', '"nombre_prioridad"', 200, 80, -1, FALSE, '"nombre_prioridad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_prioridad->Sortable = TRUE; // Allow sort
		$this->nombre_prioridad->SourceTableVar = 'interh_principal';
		$this->fields['nombre_prioridad'] = &$this->nombre_prioridad;

		// nombre_motivo_es
		$this->nombre_motivo_es = new ReportField('interh_reporte', 'interh_reporte', 'x_nombre_motivo_es', 'nombre_motivo_es', '"nombre_motivo_es"', '"nombre_motivo_es"', 200, 60, -1, FALSE, '"nombre_motivo_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_motivo_es->Sortable = TRUE; // Allow sort
		$this->nombre_motivo_es->SourceTableVar = 'interh_principal';
		$this->fields['nombre_motivo_es'] = &$this->nombre_motivo_es;

		// nombre_tiposervicion_es
		$this->nombre_tiposervicion_es = new ReportField('interh_reporte', 'interh_reporte', 'x_nombre_tiposervicion_es', 'nombre_tiposervicion_es', '"nombre_tiposervicion_es"', '"nombre_tiposervicion_es"', 200, 80, -1, FALSE, '"nombre_tiposervicion_es"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_tiposervicion_es->Sortable = TRUE; // Allow sort
		$this->nombre_tiposervicion_es->SourceTableVar = 'interh_principal';
		$this->fields['nombre_tiposervicion_es'] = &$this->nombre_tiposervicion_es;

		// fecha
		$this->fecha = new ReportField('interh_reporte', 'interh_reporte', 'x_fecha', 'fecha', '"fecha"', CastDateFieldForLike("\"fecha\"", 0, "DB"), 133, 4, 0, FALSE, '"fecha"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha->Sortable = TRUE; // Allow sort
		$this->fecha->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fecha->SourceTableVar = 'interh_principal';
		$this->fields['fecha'] = &$this->fecha;

		// motivo de remision
		$this->motivo_de_remision = new DbChart($this, 'motivo_de_remision', 'motivo de remision', 'nombre_motivo_es', 'cod_casointerh', 1006, '', 0, 'COUNT', 600, 500);
		$this->motivo_de_remision->SortType = 1;
		$this->motivo_de_remision->SortSequence = "";
		$this->motivo_de_remision->SqlSelect = "SELECT \"nombre_motivo_es\", '', COUNT(\"cod_casointerh\") FROM ";
		$this->motivo_de_remision->SqlGroupBy = "\"nombre_motivo_es\"";
		$this->motivo_de_remision->SqlOrderBy = "\"nombre_motivo_es\" ASC";
		$this->motivo_de_remision->SeriesDateType = "";
		$this->motivo_de_remision->ID = "interh_reporte_motivo_de_remision"; // Chart ID
		$this->motivo_de_remision->setParameters([
			["type", "1006"],
			["seriestype", "0"]
		]); // Chart type / Chart series type
		$this->motivo_de_remision->setParameters([
			["caption", $this->motivo_de_remision->caption()],
			["xaxisname", $this->motivo_de_remision->xAxisName()]
		]); // Chart caption / X axis name
		$this->motivo_de_remision->setParameter("yaxisname", $this->motivo_de_remision->yAxisName()); // Y axis name
		$this->motivo_de_remision->setParameters([
			["shownames", "1"],
			["showvalues", "1"],
			["showhovercap", "1"]
		]); // Show names / Show values / Show hover
		$this->motivo_de_remision->setParameter("alpha", "100"); // Chart alpha
		$this->motivo_de_remision->setParameter("colorpalette", "#5899DA,#E8743B,#19A979,#ED4A7B,#945ECF,#13A4B4,#525DF4,#BF399E,#6C8893,#EE6868,#2F6497"); // Chart color palette
		$this->motivo_de_remision->setParameters([["options.legend.display",true],["options.legend.fullWidth",false],["options.legend.reverse",false],["options.legend.labels.usePointStyle",false],["options.title.display",true],["options.tooltips.enabled",true],["options.tooltips.intersect",false],["options.tooltips.displayColors",false],["options.plugins.filler.propagate",false],["options.cutoutPercentage",0],["options.animation.animateRotate",false],["options.animation.animateScale",false],["dataset.showLine",false],["dataset.spanGaps",false],["dataset.steppedLine",false],["scale.gridLines.offsetGridLines",false]]);
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Single column sort
	protected function updateSort(&$fld)
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
			if ($fld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			if ($fld->GroupingFieldId == 0) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() != "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql != "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql != "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql != "") {
			if ($sortSql != "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate != "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix != "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix != "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount != "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
	}

	// Render for lookup
	public function renderLookup()
	{
		$this->fechahorainterh->ViewValue = FormatDateTime($this->fechahorainterh->CurrentValue, 0);
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
		if ($this->SqlSelect != "")
			return $this->SqlSelect;
		$select = "*";
		return "SELECT " . $select . " FROM " . $this->getSqlFrom();
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
			return "";
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
		if ($pageName == "")
			return $Language->phrase("View");
		elseif ($pageName == "")
			return $Language->phrase("Edit");
		elseif ($pageName == "")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "?" . $this->getUrlParm($parm);
		else
			$url = "";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("", $this->getUrlParm($parm));
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
		return $this->keyUrl("", $this->getUrlParm());
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
		global $DashboardReport;
		if ($this->CurrentAction || $this->isExport() ||
			$this->DrillDown || $DashboardReport ||
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

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
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