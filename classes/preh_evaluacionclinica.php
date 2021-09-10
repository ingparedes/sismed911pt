<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for preh_evaluacionclinica
 */
class preh_evaluacionclinica extends DbTable
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
	public $id_evaluacionclinica;
	public $cod_casopreh;
	public $fecha_horaevaluacion;
	public $cod_paciente;
	public $cod_diag_cie;
	public $diagnos_txt;
	public $triage;
	public $c_clinico;
	public $examen_fisico;
	public $tratamiento;
	public $antecedentes;
	public $paraclinicos;
	public $sv_tx;
	public $sv_fc;
	public $sv_fr;
	public $sv_temp;
	public $sv_gl;
	public $peso;
	public $talla;
	public $sv_fcf;
	public $sv_satO2;
	public $sv_apgar;
	public $sv_gli;
	public $tipo_paciente;
	public $usu_sede;
	public $tiempo_enfermedad;
	public $tipo_enfermedad;
	public $ap_med_paciente;
	public $ap_diabetes;
	public $ap_cardiop;
	public $ap_convul;
	public $ap_asma;
	public $ap_acv;
	public $ap_has;
	public $ap_alergia;
	public $ap_otros;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'preh_evaluacionclinica';
		$this->TableName = 'preh_evaluacionclinica';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "\"preh_evaluacionclinica\"";
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

		// id_evaluacionclinica
		$this->id_evaluacionclinica = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_id_evaluacionclinica', 'id_evaluacionclinica', '"id_evaluacionclinica"', 'CAST("id_evaluacionclinica" AS varchar(255))', 3, 4, -1, FALSE, '"id_evaluacionclinica"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_evaluacionclinica->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_evaluacionclinica->IsPrimaryKey = TRUE; // Primary key field
		$this->id_evaluacionclinica->Nullable = FALSE; // NOT NULL field
		$this->id_evaluacionclinica->Sortable = TRUE; // Allow sort
		$this->id_evaluacionclinica->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_evaluacionclinica'] = &$this->id_evaluacionclinica;

		// cod_casopreh
		$this->cod_casopreh = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_cod_casopreh', 'cod_casopreh', '"cod_casopreh"', 'CAST("cod_casopreh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casopreh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'HIDDEN');
		$this->cod_casopreh->Nullable = FALSE; // NOT NULL field
		$this->cod_casopreh->Sortable = TRUE; // Allow sort
		$this->cod_casopreh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cod_casopreh'] = &$this->cod_casopreh;

		// fecha_horaevaluacion
		$this->fecha_horaevaluacion = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_fecha_horaevaluacion', 'fecha_horaevaluacion', '"fecha_horaevaluacion"', CastDateFieldForLike("\"fecha_horaevaluacion\"", 0, "DB"), 135, 8, 0, FALSE, '"fecha_horaevaluacion"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fecha_horaevaluacion->Sortable = TRUE; // Allow sort
		$this->fecha_horaevaluacion->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['fecha_horaevaluacion'] = &$this->fecha_horaevaluacion;

		// cod_paciente
		$this->cod_paciente = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_cod_paciente', 'cod_paciente', '"cod_paciente"', '"cod_paciente"', 200, 32, -1, FALSE, '"cod_paciente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_paciente->Sortable = TRUE; // Allow sort
		$this->fields['cod_paciente'] = &$this->cod_paciente;

		// cod_diag_cie
		$this->cod_diag_cie = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_cod_diag_cie', 'cod_diag_cie', '"cod_diag_cie"', '"cod_diag_cie"', 200, 20, -1, FALSE, '"EV__cod_diag_cie"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->cod_diag_cie->Sortable = TRUE; // Allow sort
		$this->cod_diag_cie->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->cod_diag_cie->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->cod_diag_cie->Lookup = new Lookup('cod_diag_cie', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico_en","",""], [], [], [], [], [], [], '', '<span class="text-info">{{:df1}}</span> <small class="text-muted">({{:df2}})</small>');
				break;
			case "fr":
				$this->cod_diag_cie->Lookup = new Lookup('cod_diag_cie', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico_fr","",""], [], [], [], [], [], [], '', '<span class="text-info">{{:df1}}</span> <small class="text-muted">({{:df2}})</small>');
				break;
			case "pt":
				$this->cod_diag_cie->Lookup = new Lookup('cod_diag_cie', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico_pr","",""], [], [], [], [], [], [], '', '<span class="text-info">{{:df1}}</span> <small class="text-muted">({{:df2}})</small>');
				break;
			case "es":
				$this->cod_diag_cie->Lookup = new Lookup('cod_diag_cie', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '<span class="text-info">{{:df1}}</span> <small class="text-muted">({{:df2}})</small>');
				break;
			default:
				$this->cod_diag_cie->Lookup = new Lookup('cod_diag_cie', 'cie10', FALSE, 'codigo_cie', ["codigo_cie","diagnostico","",""], [], [], [], [], [], [], '', '<span class="text-info">{{:df1}}</span> <small class="text-muted">({{:df2}})</small>');
				break;
		}
		$this->fields['cod_diag_cie'] = &$this->cod_diag_cie;

		// diagnos_txt
		$this->diagnos_txt = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_diagnos_txt', 'diagnos_txt', '"diagnos_txt"', '"diagnos_txt"', 201, 0, -1, FALSE, '"diagnos_txt"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->diagnos_txt->Sortable = TRUE; // Allow sort
		$this->fields['diagnos_txt'] = &$this->diagnos_txt;

		// triage
		$this->triage = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_triage', 'triage', '"triage"', '"triage"', 200, 16, -1, FALSE, '"triage"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->triage->Sortable = TRUE; // Allow sort
		$this->triage->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->triage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->triage->Lookup = new Lookup('triage', 'triage', FALSE, 'id_triage', ["nombre_triage_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->triage->Lookup = new Lookup('triage', 'triage', FALSE, 'id_triage', ["nombre_triage_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->triage->Lookup = new Lookup('triage', 'triage', FALSE, 'id_triage', ["nombre_triage_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->triage->Lookup = new Lookup('triage', 'triage', FALSE, 'id_triage', ["nombre_triage_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->triage->Lookup = new Lookup('triage', 'triage', FALSE, 'id_triage', ["nombre_triage_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->fields['triage'] = &$this->triage;

		// c_clinico
		$this->c_clinico = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_c_clinico', 'c_clinico', '"c_clinico"', '"c_clinico"', 201, 0, -1, FALSE, '"c_clinico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->c_clinico->Sortable = TRUE; // Allow sort
		$this->fields['c_clinico'] = &$this->c_clinico;

		// examen_fisico
		$this->examen_fisico = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_examen_fisico', 'examen_fisico', '"examen_fisico"', '"examen_fisico"', 201, 0, -1, FALSE, '"examen_fisico"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->examen_fisico->Sortable = TRUE; // Allow sort
		$this->fields['examen_fisico'] = &$this->examen_fisico;

		// tratamiento
		$this->tratamiento = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_tratamiento', 'tratamiento', '"tratamiento"', '"tratamiento"', 201, 0, -1, FALSE, '"tratamiento"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->tratamiento->Sortable = TRUE; // Allow sort
		$this->fields['tratamiento'] = &$this->tratamiento;

		// antecedentes
		$this->antecedentes = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_antecedentes', 'antecedentes', '"antecedentes"', '"antecedentes"', 201, 0, -1, FALSE, '"antecedentes"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->antecedentes->Sortable = TRUE; // Allow sort
		$this->fields['antecedentes'] = &$this->antecedentes;

		// paraclinicos
		$this->paraclinicos = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_paraclinicos', 'paraclinicos', '"paraclinicos"', '"paraclinicos"', 201, 0, -1, FALSE, '"paraclinicos"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->paraclinicos->Sortable = TRUE; // Allow sort
		$this->fields['paraclinicos'] = &$this->paraclinicos;

		// sv_tx
		$this->sv_tx = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_tx', 'sv_tx', '"sv_tx"', '"sv_tx"', 200, 10, -1, FALSE, '"sv_tx"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_tx->Sortable = TRUE; // Allow sort
		$this->fields['sv_tx'] = &$this->sv_tx;

		// sv_fc
		$this->sv_fc = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_fc', 'sv_fc', '"sv_fc"', '"sv_fc"', 200, 10, -1, FALSE, '"sv_fc"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_fc->Sortable = TRUE; // Allow sort
		$this->fields['sv_fc'] = &$this->sv_fc;

		// sv_fr
		$this->sv_fr = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_fr', 'sv_fr', '"sv_fr"', '"sv_fr"', 200, 10, -1, FALSE, '"sv_fr"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_fr->Sortable = TRUE; // Allow sort
		$this->fields['sv_fr'] = &$this->sv_fr;

		// sv_temp
		$this->sv_temp = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_temp', 'sv_temp', '"sv_temp"', '"sv_temp"', 200, 10, -1, FALSE, '"sv_temp"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_temp->Sortable = TRUE; // Allow sort
		$this->fields['sv_temp'] = &$this->sv_temp;

		// sv_gl
		$this->sv_gl = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_gl', 'sv_gl', '"sv_gl"', '"sv_gl"', 200, 10, -1, FALSE, '"sv_gl"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_gl->Sortable = TRUE; // Allow sort
		$this->fields['sv_gl'] = &$this->sv_gl;

		// peso
		$this->peso = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_peso', 'peso', '"peso"', '"peso"', 200, 10, -1, FALSE, '"peso"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->peso->Sortable = TRUE; // Allow sort
		$this->fields['peso'] = &$this->peso;

		// talla
		$this->talla = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_talla', 'talla', '"talla"', '"talla"', 200, 10, -1, FALSE, '"talla"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->talla->Sortable = TRUE; // Allow sort
		$this->fields['talla'] = &$this->talla;

		// sv_fcf
		$this->sv_fcf = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_fcf', 'sv_fcf', '"sv_fcf"', '"sv_fcf"', 200, 10, -1, FALSE, '"sv_fcf"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_fcf->Sortable = TRUE; // Allow sort
		$this->fields['sv_fcf'] = &$this->sv_fcf;

		// sv_satO2
		$this->sv_satO2 = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_satO2', 'sv_satO2', '"sv_satO2"', '"sv_satO2"', 200, 10, -1, FALSE, '"sv_satO2"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_satO2->Sortable = TRUE; // Allow sort
		$this->fields['sv_satO2'] = &$this->sv_satO2;

		// sv_apgar
		$this->sv_apgar = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_apgar', 'sv_apgar', '"sv_apgar"', '"sv_apgar"', 200, 10, -1, FALSE, '"sv_apgar"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_apgar->Sortable = TRUE; // Allow sort
		$this->fields['sv_apgar'] = &$this->sv_apgar;

		// sv_gli
		$this->sv_gli = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_sv_gli', 'sv_gli', '"sv_gli"', '"sv_gli"', 200, 10, -1, FALSE, '"sv_gli"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sv_gli->Sortable = TRUE; // Allow sort
		$this->fields['sv_gli'] = &$this->sv_gli;

		// tipo_paciente
		$this->tipo_paciente = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_tipo_paciente', 'tipo_paciente', '"tipo_paciente"', '"tipo_paciente"', 200, 20, -1, FALSE, '"tipo_paciente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_paciente->Sortable = TRUE; // Allow sort
		$this->fields['tipo_paciente'] = &$this->tipo_paciente;

		// usu_sede
		$this->usu_sede = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_usu_sede', 'usu_sede', '"usu_sede"', '"usu_sede"', 200, 2, -1, FALSE, '"usu_sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usu_sede->Sortable = TRUE; // Allow sort
		$this->fields['usu_sede'] = &$this->usu_sede;

		// tiempo_enfermedad
		$this->tiempo_enfermedad = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_tiempo_enfermedad', 'tiempo_enfermedad', '"tiempo_enfermedad"', '"tiempo_enfermedad"', 200, 20, -1, FALSE, '"tiempo_enfermedad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tiempo_enfermedad->Sortable = TRUE; // Allow sort
		$this->fields['tiempo_enfermedad'] = &$this->tiempo_enfermedad;

		// tipo_enfermedad
		$this->tipo_enfermedad = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_tipo_enfermedad', 'tipo_enfermedad', '"tipo_enfermedad"', 'CAST("tipo_enfermedad" AS varchar(255))', 2, 2, -1, FALSE, '"tipo_enfermedad"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tipo_enfermedad->Sortable = TRUE; // Allow sort
		$this->tipo_enfermedad->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tipo_enfermedad'] = &$this->tipo_enfermedad;

		// ap_med_paciente
		$this->ap_med_paciente = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_med_paciente', 'ap_med_paciente', '"ap_med_paciente"', '"ap_med_paciente"', 201, 0, -1, FALSE, '"ap_med_paciente"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ap_med_paciente->Sortable = TRUE; // Allow sort
		$this->fields['ap_med_paciente'] = &$this->ap_med_paciente;

		// ap_diabetes
		$this->ap_diabetes = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_diabetes', 'ap_diabetes', '"ap_diabetes"', '"ap_diabetes"', 200, 2, -1, FALSE, '"ap_diabetes"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_diabetes->Sortable = TRUE; // Allow sort
		$this->fields['ap_diabetes'] = &$this->ap_diabetes;

		// ap_cardiop
		$this->ap_cardiop = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_cardiop', 'ap_cardiop', '"ap_cardiop"', '"ap_cardiop"', 200, 2, -1, FALSE, '"ap_cardiop"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_cardiop->Sortable = TRUE; // Allow sort
		$this->fields['ap_cardiop'] = &$this->ap_cardiop;

		// ap_convul
		$this->ap_convul = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_convul', 'ap_convul', '"ap_convul"', '"ap_convul"', 200, 2, -1, FALSE, '"ap_convul"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_convul->Sortable = TRUE; // Allow sort
		$this->fields['ap_convul'] = &$this->ap_convul;

		// ap_asma
		$this->ap_asma = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_asma', 'ap_asma', '"ap_asma"', '"ap_asma"', 200, 2, -1, FALSE, '"ap_asma"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_asma->Sortable = TRUE; // Allow sort
		$this->fields['ap_asma'] = &$this->ap_asma;

		// ap_acv
		$this->ap_acv = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_acv', 'ap_acv', '"ap_acv"', '"ap_acv"', 200, 2, -1, FALSE, '"ap_acv"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_acv->Sortable = TRUE; // Allow sort
		$this->fields['ap_acv'] = &$this->ap_acv;

		// ap_has
		$this->ap_has = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_has', 'ap_has', '"ap_has"', '"ap_has"', 200, 2, -1, FALSE, '"ap_has"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_has->Sortable = TRUE; // Allow sort
		$this->fields['ap_has'] = &$this->ap_has;

		// ap_alergia
		$this->ap_alergia = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_alergia', 'ap_alergia', '"ap_alergia"', '"ap_alergia"', 200, 2, -1, FALSE, '"ap_alergia"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ap_alergia->Sortable = TRUE; // Allow sort
		$this->fields['ap_alergia'] = &$this->ap_alergia;

		// ap_otros
		$this->ap_otros = new DbField('preh_evaluacionclinica', 'preh_evaluacionclinica', 'x_ap_otros', 'ap_otros', '"ap_otros"', '"ap_otros"', 201, 0, -1, FALSE, '"ap_otros"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ap_otros->Sortable = TRUE; // Allow sort
		$this->fields['ap_otros'] = &$this->ap_otros;
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
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"preh_evaluacionclinica\"";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		global $CurrentLanguage;
		switch ($CurrentLanguage) {
			case "en":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"codigo_cie\" || '" . ValueSeparator(1, $this->cod_diag_cie) . "' || \"diagnostico_en\" FROM \"cie10\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"codigo_cie\" = \"preh_evaluacionclinica\".\"cod_diag_cie\" LIMIT 1) AS \"EV__cod_diag_cie\" FROM \"preh_evaluacionclinica\"" .
					") \"TMP_TABLE\"";
				break;
			case "fr":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"codigo_cie\" || '" . ValueSeparator(1, $this->cod_diag_cie) . "' || \"diagnostico_fr\" FROM \"cie10\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"codigo_cie\" = \"preh_evaluacionclinica\".\"cod_diag_cie\" LIMIT 1) AS \"EV__cod_diag_cie\" FROM \"preh_evaluacionclinica\"" .
					") \"TMP_TABLE\"";
				break;
			case "pt":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"codigo_cie\" || '" . ValueSeparator(1, $this->cod_diag_cie) . "' || \"diagnostico_pr\" FROM \"cie10\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"codigo_cie\" = \"preh_evaluacionclinica\".\"cod_diag_cie\" LIMIT 1) AS \"EV__cod_diag_cie\" FROM \"preh_evaluacionclinica\"" .
					") \"TMP_TABLE\"";
				break;
			case "es":
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"codigo_cie\" || '" . ValueSeparator(1, $this->cod_diag_cie) . "' || \"diagnostico\" FROM \"cie10\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"codigo_cie\" = \"preh_evaluacionclinica\".\"cod_diag_cie\" LIMIT 1) AS \"EV__cod_diag_cie\" FROM \"preh_evaluacionclinica\"" .
					") \"TMP_TABLE\"";
				break;
			default:
				$select = "SELECT * FROM (" .
					"SELECT *, (SELECT \"codigo_cie\" || '" . ValueSeparator(1, $this->cod_diag_cie) . "' || \"diagnostico_en\" FROM \"cie10\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"codigo_cie\" = \"preh_evaluacionclinica\".\"cod_diag_cie\" LIMIT 1) AS \"EV__cod_diag_cie\" FROM \"preh_evaluacionclinica\"" .
					") \"TMP_TABLE\"";
				break;
		}
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() != "")
			return TRUE;
		if ($this->cod_diag_cie->AdvancedSearch->SearchValue != "" ||
			$this->cod_diag_cie->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->cod_diag_cie->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->cod_diag_cie->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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
			$this->id_evaluacionclinica->setDbValue($conn->getOne("SELECT currval('interh_evaluacionclinica_id_evaluacionclinica_seq'::regclass)"));
			$rs['id_evaluacionclinica'] = $this->id_evaluacionclinica->DbValue;
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
			if (array_key_exists('id_evaluacionclinica', $rs))
				AddFilter($where, QuotedName('id_evaluacionclinica', $this->Dbid) . '=' . QuotedValue($rs['id_evaluacionclinica'], $this->id_evaluacionclinica->DataType, $this->Dbid));
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
		$this->id_evaluacionclinica->DbValue = $row['id_evaluacionclinica'];
		$this->cod_casopreh->DbValue = $row['cod_casopreh'];
		$this->fecha_horaevaluacion->DbValue = $row['fecha_horaevaluacion'];
		$this->cod_paciente->DbValue = $row['cod_paciente'];
		$this->cod_diag_cie->DbValue = $row['cod_diag_cie'];
		$this->diagnos_txt->DbValue = $row['diagnos_txt'];
		$this->triage->DbValue = $row['triage'];
		$this->c_clinico->DbValue = $row['c_clinico'];
		$this->examen_fisico->DbValue = $row['examen_fisico'];
		$this->tratamiento->DbValue = $row['tratamiento'];
		$this->antecedentes->DbValue = $row['antecedentes'];
		$this->paraclinicos->DbValue = $row['paraclinicos'];
		$this->sv_tx->DbValue = $row['sv_tx'];
		$this->sv_fc->DbValue = $row['sv_fc'];
		$this->sv_fr->DbValue = $row['sv_fr'];
		$this->sv_temp->DbValue = $row['sv_temp'];
		$this->sv_gl->DbValue = $row['sv_gl'];
		$this->peso->DbValue = $row['peso'];
		$this->talla->DbValue = $row['talla'];
		$this->sv_fcf->DbValue = $row['sv_fcf'];
		$this->sv_satO2->DbValue = $row['sv_satO2'];
		$this->sv_apgar->DbValue = $row['sv_apgar'];
		$this->sv_gli->DbValue = $row['sv_gli'];
		$this->tipo_paciente->DbValue = $row['tipo_paciente'];
		$this->usu_sede->DbValue = $row['usu_sede'];
		$this->tiempo_enfermedad->DbValue = $row['tiempo_enfermedad'];
		$this->tipo_enfermedad->DbValue = $row['tipo_enfermedad'];
		$this->ap_med_paciente->DbValue = $row['ap_med_paciente'];
		$this->ap_diabetes->DbValue = $row['ap_diabetes'];
		$this->ap_cardiop->DbValue = $row['ap_cardiop'];
		$this->ap_convul->DbValue = $row['ap_convul'];
		$this->ap_asma->DbValue = $row['ap_asma'];
		$this->ap_acv->DbValue = $row['ap_acv'];
		$this->ap_has->DbValue = $row['ap_has'];
		$this->ap_alergia->DbValue = $row['ap_alergia'];
		$this->ap_otros->DbValue = $row['ap_otros'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"id_evaluacionclinica\" = @id_evaluacionclinica@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id_evaluacionclinica', $row) ? $row['id_evaluacionclinica'] : NULL;
		else
			$val = $this->id_evaluacionclinica->OldValue !== NULL ? $this->id_evaluacionclinica->OldValue : $this->id_evaluacionclinica->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_evaluacionclinica@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "preh_evaluacionclinicalist.php";
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
		if ($pageName == "preh_evaluacionclinicaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "preh_evaluacionclinicaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "preh_evaluacionclinicaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "preh_evaluacionclinicalist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("preh_evaluacionclinicaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("preh_evaluacionclinicaview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "preh_evaluacionclinicaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "preh_evaluacionclinicaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("preh_evaluacionclinicaedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("preh_evaluacionclinicaadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("preh_evaluacionclinicadelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_evaluacionclinica:" . JsonEncode($this->id_evaluacionclinica->CurrentValue, "number");
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
		if ($this->id_evaluacionclinica->CurrentValue != NULL) {
			$url .= "id_evaluacionclinica=" . urlencode($this->id_evaluacionclinica->CurrentValue);
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
			if (Param("id_evaluacionclinica") !== NULL)
				$arKeys[] = Param("id_evaluacionclinica");
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
				$this->id_evaluacionclinica->CurrentValue = $key;
			else
				$this->id_evaluacionclinica->OldValue = $key;
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
		$this->id_evaluacionclinica->setDbValue($rs->fields('id_evaluacionclinica'));
		$this->cod_casopreh->setDbValue($rs->fields('cod_casopreh'));
		$this->fecha_horaevaluacion->setDbValue($rs->fields('fecha_horaevaluacion'));
		$this->cod_paciente->setDbValue($rs->fields('cod_paciente'));
		$this->cod_diag_cie->setDbValue($rs->fields('cod_diag_cie'));
		$this->diagnos_txt->setDbValue($rs->fields('diagnos_txt'));
		$this->triage->setDbValue($rs->fields('triage'));
		$this->c_clinico->setDbValue($rs->fields('c_clinico'));
		$this->examen_fisico->setDbValue($rs->fields('examen_fisico'));
		$this->tratamiento->setDbValue($rs->fields('tratamiento'));
		$this->antecedentes->setDbValue($rs->fields('antecedentes'));
		$this->paraclinicos->setDbValue($rs->fields('paraclinicos'));
		$this->sv_tx->setDbValue($rs->fields('sv_tx'));
		$this->sv_fc->setDbValue($rs->fields('sv_fc'));
		$this->sv_fr->setDbValue($rs->fields('sv_fr'));
		$this->sv_temp->setDbValue($rs->fields('sv_temp'));
		$this->sv_gl->setDbValue($rs->fields('sv_gl'));
		$this->peso->setDbValue($rs->fields('peso'));
		$this->talla->setDbValue($rs->fields('talla'));
		$this->sv_fcf->setDbValue($rs->fields('sv_fcf'));
		$this->sv_satO2->setDbValue($rs->fields('sv_satO2'));
		$this->sv_apgar->setDbValue($rs->fields('sv_apgar'));
		$this->sv_gli->setDbValue($rs->fields('sv_gli'));
		$this->tipo_paciente->setDbValue($rs->fields('tipo_paciente'));
		$this->usu_sede->setDbValue($rs->fields('usu_sede'));
		$this->tiempo_enfermedad->setDbValue($rs->fields('tiempo_enfermedad'));
		$this->tipo_enfermedad->setDbValue($rs->fields('tipo_enfermedad'));
		$this->ap_med_paciente->setDbValue($rs->fields('ap_med_paciente'));
		$this->ap_diabetes->setDbValue($rs->fields('ap_diabetes'));
		$this->ap_cardiop->setDbValue($rs->fields('ap_cardiop'));
		$this->ap_convul->setDbValue($rs->fields('ap_convul'));
		$this->ap_asma->setDbValue($rs->fields('ap_asma'));
		$this->ap_acv->setDbValue($rs->fields('ap_acv'));
		$this->ap_has->setDbValue($rs->fields('ap_has'));
		$this->ap_alergia->setDbValue($rs->fields('ap_alergia'));
		$this->ap_otros->setDbValue($rs->fields('ap_otros'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_evaluacionclinica
		// cod_casopreh
		// fecha_horaevaluacion
		// cod_paciente
		// cod_diag_cie
		// diagnos_txt
		// triage
		// c_clinico
		// examen_fisico
		// tratamiento
		// antecedentes
		// paraclinicos
		// sv_tx
		// sv_fc
		// sv_fr
		// sv_temp
		// sv_gl
		// peso
		// talla
		// sv_fcf
		// sv_satO2
		// sv_apgar
		// sv_gli
		// tipo_paciente
		// usu_sede
		// tiempo_enfermedad
		// tipo_enfermedad
		// ap_med_paciente
		// ap_diabetes
		// ap_cardiop
		// ap_convul
		// ap_asma
		// ap_acv
		// ap_has
		// ap_alergia
		// ap_otros
		// id_evaluacionclinica

		$this->id_evaluacionclinica->ViewValue = $this->id_evaluacionclinica->CurrentValue;
		$this->id_evaluacionclinica->ViewCustomAttributes = "";

		// cod_casopreh
		$this->cod_casopreh->ViewValue = $this->cod_casopreh->CurrentValue;
		$this->cod_casopreh->ViewValue = FormatNumber($this->cod_casopreh->ViewValue, 0, -2, -2, -2);
		$this->cod_casopreh->ViewCustomAttributes = "";

		// fecha_horaevaluacion
		$this->fecha_horaevaluacion->ViewValue = $this->fecha_horaevaluacion->CurrentValue;
		$this->fecha_horaevaluacion->ViewValue = FormatDateTime($this->fecha_horaevaluacion->ViewValue, 0);
		$this->fecha_horaevaluacion->ViewCustomAttributes = "";

		// cod_paciente
		$this->cod_paciente->ViewValue = $this->cod_paciente->CurrentValue;
		$this->cod_paciente->ViewCustomAttributes = "";

		// cod_diag_cie
		if ($this->cod_diag_cie->VirtualValue != "") {
			$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->VirtualValue;
		} else {
			$curVal = strval($this->cod_diag_cie->CurrentValue);
			if ($curVal != "") {
				$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->lookupCacheOption($curVal);
				if ($this->cod_diag_cie->ViewValue === NULL) { // Lookup from database
					$filterWrk = "\"codigo_cie\"" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->cod_diag_cie->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->cod_diag_cie->ViewValue = $this->cod_diag_cie->CurrentValue;
					}
				}
			} else {
				$this->cod_diag_cie->ViewValue = NULL;
			}
		}
		$this->cod_diag_cie->ViewCustomAttributes = "";

		// diagnos_txt
		$this->diagnos_txt->ViewValue = $this->diagnos_txt->CurrentValue;
		$this->diagnos_txt->ViewCustomAttributes = "";

		// triage
		$curVal = strval($this->triage->CurrentValue);
		if ($curVal != "") {
			$this->triage->ViewValue = $this->triage->lookupCacheOption($curVal);
			if ($this->triage->ViewValue === NULL) { // Lookup from database
				$filterWrk = "\"id_triage\"" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->triage->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->triage->ViewValue = $this->triage->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->triage->ViewValue = $this->triage->CurrentValue;
				}
			}
		} else {
			$this->triage->ViewValue = NULL;
		}
		$this->triage->ViewCustomAttributes = "";

		// c_clinico
		$this->c_clinico->ViewValue = $this->c_clinico->CurrentValue;
		$this->c_clinico->ViewCustomAttributes = "";

		// examen_fisico
		$this->examen_fisico->ViewValue = $this->examen_fisico->CurrentValue;
		$this->examen_fisico->ViewCustomAttributes = "";

		// tratamiento
		$this->tratamiento->ViewValue = $this->tratamiento->CurrentValue;
		$this->tratamiento->ViewCustomAttributes = "";

		// antecedentes
		$this->antecedentes->ViewValue = $this->antecedentes->CurrentValue;
		$this->antecedentes->ViewCustomAttributes = "";

		// paraclinicos
		$this->paraclinicos->ViewValue = $this->paraclinicos->CurrentValue;
		$this->paraclinicos->ViewCustomAttributes = "";

		// sv_tx
		$this->sv_tx->ViewValue = $this->sv_tx->CurrentValue;
		$this->sv_tx->ViewCustomAttributes = "";

		// sv_fc
		$this->sv_fc->ViewValue = $this->sv_fc->CurrentValue;
		$this->sv_fc->ViewCustomAttributes = "";

		// sv_fr
		$this->sv_fr->ViewValue = $this->sv_fr->CurrentValue;
		$this->sv_fr->ViewCustomAttributes = "";

		// sv_temp
		$this->sv_temp->ViewValue = $this->sv_temp->CurrentValue;
		$this->sv_temp->ViewCustomAttributes = "";

		// sv_gl
		$this->sv_gl->ViewValue = $this->sv_gl->CurrentValue;
		$this->sv_gl->ViewCustomAttributes = "";

		// peso
		$this->peso->ViewValue = $this->peso->CurrentValue;
		$this->peso->ViewCustomAttributes = "";

		// talla
		$this->talla->ViewValue = $this->talla->CurrentValue;
		$this->talla->ViewCustomAttributes = "";

		// sv_fcf
		$this->sv_fcf->ViewValue = $this->sv_fcf->CurrentValue;
		$this->sv_fcf->ViewCustomAttributes = "";

		// sv_satO2
		$this->sv_satO2->ViewValue = $this->sv_satO2->CurrentValue;
		$this->sv_satO2->ViewCustomAttributes = "";

		// sv_apgar
		$this->sv_apgar->ViewValue = $this->sv_apgar->CurrentValue;
		$this->sv_apgar->ViewCustomAttributes = "";

		// sv_gli
		$this->sv_gli->ViewValue = $this->sv_gli->CurrentValue;
		$this->sv_gli->ViewCustomAttributes = "";

		// tipo_paciente
		$this->tipo_paciente->ViewValue = $this->tipo_paciente->CurrentValue;
		$this->tipo_paciente->ViewCustomAttributes = "";

		// usu_sede
		$this->usu_sede->ViewValue = $this->usu_sede->CurrentValue;
		$this->usu_sede->ViewCustomAttributes = "";

		// tiempo_enfermedad
		$this->tiempo_enfermedad->ViewValue = $this->tiempo_enfermedad->CurrentValue;
		$this->tiempo_enfermedad->ViewCustomAttributes = "";

		// tipo_enfermedad
		$this->tipo_enfermedad->ViewValue = $this->tipo_enfermedad->CurrentValue;
		$this->tipo_enfermedad->ViewValue = FormatNumber($this->tipo_enfermedad->ViewValue, 0, -2, -2, -2);
		$this->tipo_enfermedad->ViewCustomAttributes = "";

		// ap_med_paciente
		$this->ap_med_paciente->ViewValue = $this->ap_med_paciente->CurrentValue;
		$this->ap_med_paciente->ViewCustomAttributes = "";

		// ap_diabetes
		$this->ap_diabetes->ViewValue = $this->ap_diabetes->CurrentValue;
		$this->ap_diabetes->ViewCustomAttributes = "";

		// ap_cardiop
		$this->ap_cardiop->ViewValue = $this->ap_cardiop->CurrentValue;
		$this->ap_cardiop->ViewCustomAttributes = "";

		// ap_convul
		$this->ap_convul->ViewValue = $this->ap_convul->CurrentValue;
		$this->ap_convul->ViewCustomAttributes = "";

		// ap_asma
		$this->ap_asma->ViewValue = $this->ap_asma->CurrentValue;
		$this->ap_asma->ViewCustomAttributes = "";

		// ap_acv
		$this->ap_acv->ViewValue = $this->ap_acv->CurrentValue;
		$this->ap_acv->ViewCustomAttributes = "";

		// ap_has
		$this->ap_has->ViewValue = $this->ap_has->CurrentValue;
		$this->ap_has->ViewCustomAttributes = "";

		// ap_alergia
		$this->ap_alergia->ViewValue = $this->ap_alergia->CurrentValue;
		$this->ap_alergia->ViewCustomAttributes = "";

		// ap_otros
		$this->ap_otros->ViewValue = $this->ap_otros->CurrentValue;
		$this->ap_otros->ViewCustomAttributes = "";

		// id_evaluacionclinica
		$this->id_evaluacionclinica->LinkCustomAttributes = "";
		$this->id_evaluacionclinica->HrefValue = "";
		$this->id_evaluacionclinica->TooltipValue = "";

		// cod_casopreh
		$this->cod_casopreh->LinkCustomAttributes = "";
		$this->cod_casopreh->HrefValue = "";
		$this->cod_casopreh->TooltipValue = "";

		// fecha_horaevaluacion
		$this->fecha_horaevaluacion->LinkCustomAttributes = "";
		$this->fecha_horaevaluacion->HrefValue = "";
		$this->fecha_horaevaluacion->TooltipValue = "";

		// cod_paciente
		$this->cod_paciente->LinkCustomAttributes = "";
		$this->cod_paciente->HrefValue = "";
		$this->cod_paciente->TooltipValue = "";

		// cod_diag_cie
		$this->cod_diag_cie->LinkCustomAttributes = "";
		$this->cod_diag_cie->HrefValue = "";
		$this->cod_diag_cie->TooltipValue = "";

		// diagnos_txt
		$this->diagnos_txt->LinkCustomAttributes = "";
		$this->diagnos_txt->HrefValue = "";
		$this->diagnos_txt->TooltipValue = "";

		// triage
		$this->triage->LinkCustomAttributes = "";
		$this->triage->HrefValue = "";
		$this->triage->TooltipValue = "";

		// c_clinico
		$this->c_clinico->LinkCustomAttributes = "";
		$this->c_clinico->HrefValue = "";
		$this->c_clinico->TooltipValue = "";

		// examen_fisico
		$this->examen_fisico->LinkCustomAttributes = "";
		$this->examen_fisico->HrefValue = "";
		$this->examen_fisico->TooltipValue = "";

		// tratamiento
		$this->tratamiento->LinkCustomAttributes = "";
		$this->tratamiento->HrefValue = "";
		$this->tratamiento->TooltipValue = "";

		// antecedentes
		$this->antecedentes->LinkCustomAttributes = "";
		$this->antecedentes->HrefValue = "";
		$this->antecedentes->TooltipValue = "";

		// paraclinicos
		$this->paraclinicos->LinkCustomAttributes = "";
		$this->paraclinicos->HrefValue = "";
		$this->paraclinicos->TooltipValue = "";

		// sv_tx
		$this->sv_tx->LinkCustomAttributes = "";
		$this->sv_tx->HrefValue = "";
		$this->sv_tx->TooltipValue = "";

		// sv_fc
		$this->sv_fc->LinkCustomAttributes = "";
		$this->sv_fc->HrefValue = "";
		$this->sv_fc->TooltipValue = "";

		// sv_fr
		$this->sv_fr->LinkCustomAttributes = "";
		$this->sv_fr->HrefValue = "";
		$this->sv_fr->TooltipValue = "";

		// sv_temp
		$this->sv_temp->LinkCustomAttributes = "";
		$this->sv_temp->HrefValue = "";
		$this->sv_temp->TooltipValue = "";

		// sv_gl
		$this->sv_gl->LinkCustomAttributes = "";
		$this->sv_gl->HrefValue = "";
		$this->sv_gl->TooltipValue = "";

		// peso
		$this->peso->LinkCustomAttributes = "";
		$this->peso->HrefValue = "";
		$this->peso->TooltipValue = "";

		// talla
		$this->talla->LinkCustomAttributes = "";
		$this->talla->HrefValue = "";
		$this->talla->TooltipValue = "";

		// sv_fcf
		$this->sv_fcf->LinkCustomAttributes = "";
		$this->sv_fcf->HrefValue = "";
		$this->sv_fcf->TooltipValue = "";

		// sv_satO2
		$this->sv_satO2->LinkCustomAttributes = "";
		$this->sv_satO2->HrefValue = "";
		$this->sv_satO2->TooltipValue = "";

		// sv_apgar
		$this->sv_apgar->LinkCustomAttributes = "";
		$this->sv_apgar->HrefValue = "";
		$this->sv_apgar->TooltipValue = "";

		// sv_gli
		$this->sv_gli->LinkCustomAttributes = "";
		$this->sv_gli->HrefValue = "";
		$this->sv_gli->TooltipValue = "";

		// tipo_paciente
		$this->tipo_paciente->LinkCustomAttributes = "";
		$this->tipo_paciente->HrefValue = "";
		$this->tipo_paciente->TooltipValue = "";

		// usu_sede
		$this->usu_sede->LinkCustomAttributes = "";
		$this->usu_sede->HrefValue = "";
		$this->usu_sede->TooltipValue = "";

		// tiempo_enfermedad
		$this->tiempo_enfermedad->LinkCustomAttributes = "";
		$this->tiempo_enfermedad->HrefValue = "";
		$this->tiempo_enfermedad->TooltipValue = "";

		// tipo_enfermedad
		$this->tipo_enfermedad->LinkCustomAttributes = "";
		$this->tipo_enfermedad->HrefValue = "";
		$this->tipo_enfermedad->TooltipValue = "";

		// ap_med_paciente
		$this->ap_med_paciente->LinkCustomAttributes = "";
		$this->ap_med_paciente->HrefValue = "";
		$this->ap_med_paciente->TooltipValue = "";

		// ap_diabetes
		$this->ap_diabetes->LinkCustomAttributes = "";
		$this->ap_diabetes->HrefValue = "";
		$this->ap_diabetes->TooltipValue = "";

		// ap_cardiop
		$this->ap_cardiop->LinkCustomAttributes = "";
		$this->ap_cardiop->HrefValue = "";
		$this->ap_cardiop->TooltipValue = "";

		// ap_convul
		$this->ap_convul->LinkCustomAttributes = "";
		$this->ap_convul->HrefValue = "";
		$this->ap_convul->TooltipValue = "";

		// ap_asma
		$this->ap_asma->LinkCustomAttributes = "";
		$this->ap_asma->HrefValue = "";
		$this->ap_asma->TooltipValue = "";

		// ap_acv
		$this->ap_acv->LinkCustomAttributes = "";
		$this->ap_acv->HrefValue = "";
		$this->ap_acv->TooltipValue = "";

		// ap_has
		$this->ap_has->LinkCustomAttributes = "";
		$this->ap_has->HrefValue = "";
		$this->ap_has->TooltipValue = "";

		// ap_alergia
		$this->ap_alergia->LinkCustomAttributes = "";
		$this->ap_alergia->HrefValue = "";
		$this->ap_alergia->TooltipValue = "";

		// ap_otros
		$this->ap_otros->LinkCustomAttributes = "";
		$this->ap_otros->HrefValue = "";
		$this->ap_otros->TooltipValue = "";

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

		// id_evaluacionclinica
		$this->id_evaluacionclinica->EditAttrs["class"] = "form-control";
		$this->id_evaluacionclinica->EditCustomAttributes = "";
		$this->id_evaluacionclinica->EditValue = $this->id_evaluacionclinica->CurrentValue;
		$this->id_evaluacionclinica->ViewCustomAttributes = "";

		// cod_casopreh
		$this->cod_casopreh->EditAttrs["class"] = "form-control";
		$this->cod_casopreh->EditCustomAttributes = "HIDDEN";

		// fecha_horaevaluacion
		// cod_paciente

		$this->cod_paciente->EditAttrs["class"] = "form-control";
		$this->cod_paciente->EditCustomAttributes = "";
		if (!$this->cod_paciente->Raw)
			$this->cod_paciente->CurrentValue = HtmlDecode($this->cod_paciente->CurrentValue);
		$this->cod_paciente->EditValue = $this->cod_paciente->CurrentValue;
		$this->cod_paciente->PlaceHolder = RemoveHtml($this->cod_paciente->caption());

		// cod_diag_cie
		$this->cod_diag_cie->EditCustomAttributes = "";

		// diagnos_txt
		$this->diagnos_txt->EditAttrs["class"] = "form-control";
		$this->diagnos_txt->EditCustomAttributes = "";
		$this->diagnos_txt->EditValue = $this->diagnos_txt->CurrentValue;
		$this->diagnos_txt->PlaceHolder = RemoveHtml($this->diagnos_txt->caption());

		// triage
		$this->triage->EditAttrs["class"] = "form-control";
		$this->triage->EditCustomAttributes = "";

		// c_clinico
		$this->c_clinico->EditAttrs["class"] = "form-control";
		$this->c_clinico->EditCustomAttributes = "";
		$this->c_clinico->EditValue = $this->c_clinico->CurrentValue;
		$this->c_clinico->PlaceHolder = RemoveHtml($this->c_clinico->caption());

		// examen_fisico
		$this->examen_fisico->EditAttrs["class"] = "form-control";
		$this->examen_fisico->EditCustomAttributes = "";
		$this->examen_fisico->EditValue = $this->examen_fisico->CurrentValue;
		$this->examen_fisico->PlaceHolder = RemoveHtml($this->examen_fisico->caption());

		// tratamiento
		$this->tratamiento->EditAttrs["class"] = "form-control";
		$this->tratamiento->EditCustomAttributes = "";
		$this->tratamiento->EditValue = $this->tratamiento->CurrentValue;
		$this->tratamiento->PlaceHolder = RemoveHtml($this->tratamiento->caption());

		// antecedentes
		$this->antecedentes->EditAttrs["class"] = "form-control";
		$this->antecedentes->EditCustomAttributes = "";
		$this->antecedentes->EditValue = $this->antecedentes->CurrentValue;
		$this->antecedentes->PlaceHolder = RemoveHtml($this->antecedentes->caption());

		// paraclinicos
		$this->paraclinicos->EditAttrs["class"] = "form-control";
		$this->paraclinicos->EditCustomAttributes = "";
		$this->paraclinicos->EditValue = $this->paraclinicos->CurrentValue;
		$this->paraclinicos->PlaceHolder = RemoveHtml($this->paraclinicos->caption());

		// sv_tx
		$this->sv_tx->EditAttrs["class"] = "form-control";
		$this->sv_tx->EditCustomAttributes = "";
		if (!$this->sv_tx->Raw)
			$this->sv_tx->CurrentValue = HtmlDecode($this->sv_tx->CurrentValue);
		$this->sv_tx->EditValue = $this->sv_tx->CurrentValue;
		$this->sv_tx->PlaceHolder = RemoveHtml($this->sv_tx->caption());

		// sv_fc
		$this->sv_fc->EditAttrs["class"] = "form-control";
		$this->sv_fc->EditCustomAttributes = "";
		if (!$this->sv_fc->Raw)
			$this->sv_fc->CurrentValue = HtmlDecode($this->sv_fc->CurrentValue);
		$this->sv_fc->EditValue = $this->sv_fc->CurrentValue;
		$this->sv_fc->PlaceHolder = RemoveHtml($this->sv_fc->caption());

		// sv_fr
		$this->sv_fr->EditAttrs["class"] = "form-control";
		$this->sv_fr->EditCustomAttributes = "";
		if (!$this->sv_fr->Raw)
			$this->sv_fr->CurrentValue = HtmlDecode($this->sv_fr->CurrentValue);
		$this->sv_fr->EditValue = $this->sv_fr->CurrentValue;
		$this->sv_fr->PlaceHolder = RemoveHtml($this->sv_fr->caption());

		// sv_temp
		$this->sv_temp->EditAttrs["class"] = "form-control";
		$this->sv_temp->EditCustomAttributes = "";
		if (!$this->sv_temp->Raw)
			$this->sv_temp->CurrentValue = HtmlDecode($this->sv_temp->CurrentValue);
		$this->sv_temp->EditValue = $this->sv_temp->CurrentValue;
		$this->sv_temp->PlaceHolder = RemoveHtml($this->sv_temp->caption());

		// sv_gl
		$this->sv_gl->EditAttrs["class"] = "form-control";
		$this->sv_gl->EditCustomAttributes = "";
		if (!$this->sv_gl->Raw)
			$this->sv_gl->CurrentValue = HtmlDecode($this->sv_gl->CurrentValue);
		$this->sv_gl->EditValue = $this->sv_gl->CurrentValue;
		$this->sv_gl->PlaceHolder = RemoveHtml($this->sv_gl->caption());

		// peso
		$this->peso->EditAttrs["class"] = "form-control";
		$this->peso->EditCustomAttributes = "";
		if (!$this->peso->Raw)
			$this->peso->CurrentValue = HtmlDecode($this->peso->CurrentValue);
		$this->peso->EditValue = $this->peso->CurrentValue;
		$this->peso->PlaceHolder = RemoveHtml($this->peso->caption());

		// talla
		$this->talla->EditAttrs["class"] = "form-control";
		$this->talla->EditCustomAttributes = "";
		if (!$this->talla->Raw)
			$this->talla->CurrentValue = HtmlDecode($this->talla->CurrentValue);
		$this->talla->EditValue = $this->talla->CurrentValue;
		$this->talla->PlaceHolder = RemoveHtml($this->talla->caption());

		// sv_fcf
		$this->sv_fcf->EditAttrs["class"] = "form-control";
		$this->sv_fcf->EditCustomAttributes = "";
		if (!$this->sv_fcf->Raw)
			$this->sv_fcf->CurrentValue = HtmlDecode($this->sv_fcf->CurrentValue);
		$this->sv_fcf->EditValue = $this->sv_fcf->CurrentValue;
		$this->sv_fcf->PlaceHolder = RemoveHtml($this->sv_fcf->caption());

		// sv_satO2
		$this->sv_satO2->EditAttrs["class"] = "form-control";
		$this->sv_satO2->EditCustomAttributes = "";
		if (!$this->sv_satO2->Raw)
			$this->sv_satO2->CurrentValue = HtmlDecode($this->sv_satO2->CurrentValue);
		$this->sv_satO2->EditValue = $this->sv_satO2->CurrentValue;
		$this->sv_satO2->PlaceHolder = RemoveHtml($this->sv_satO2->caption());

		// sv_apgar
		$this->sv_apgar->EditAttrs["class"] = "form-control";
		$this->sv_apgar->EditCustomAttributes = "";
		if (!$this->sv_apgar->Raw)
			$this->sv_apgar->CurrentValue = HtmlDecode($this->sv_apgar->CurrentValue);
		$this->sv_apgar->EditValue = $this->sv_apgar->CurrentValue;
		$this->sv_apgar->PlaceHolder = RemoveHtml($this->sv_apgar->caption());

		// sv_gli
		$this->sv_gli->EditAttrs["class"] = "form-control";
		$this->sv_gli->EditCustomAttributes = "";
		if (!$this->sv_gli->Raw)
			$this->sv_gli->CurrentValue = HtmlDecode($this->sv_gli->CurrentValue);
		$this->sv_gli->EditValue = $this->sv_gli->CurrentValue;
		$this->sv_gli->PlaceHolder = RemoveHtml($this->sv_gli->caption());

		// tipo_paciente
		$this->tipo_paciente->EditAttrs["class"] = "form-control";
		$this->tipo_paciente->EditCustomAttributes = "";
		if (!$this->tipo_paciente->Raw)
			$this->tipo_paciente->CurrentValue = HtmlDecode($this->tipo_paciente->CurrentValue);
		$this->tipo_paciente->EditValue = $this->tipo_paciente->CurrentValue;
		$this->tipo_paciente->PlaceHolder = RemoveHtml($this->tipo_paciente->caption());

		// usu_sede
		$this->usu_sede->EditAttrs["class"] = "form-control";
		$this->usu_sede->EditCustomAttributes = "";
		if (!$this->usu_sede->Raw)
			$this->usu_sede->CurrentValue = HtmlDecode($this->usu_sede->CurrentValue);
		$this->usu_sede->EditValue = $this->usu_sede->CurrentValue;
		$this->usu_sede->PlaceHolder = RemoveHtml($this->usu_sede->caption());

		// tiempo_enfermedad
		$this->tiempo_enfermedad->EditAttrs["class"] = "form-control";
		$this->tiempo_enfermedad->EditCustomAttributes = "";
		if (!$this->tiempo_enfermedad->Raw)
			$this->tiempo_enfermedad->CurrentValue = HtmlDecode($this->tiempo_enfermedad->CurrentValue);
		$this->tiempo_enfermedad->EditValue = $this->tiempo_enfermedad->CurrentValue;
		$this->tiempo_enfermedad->PlaceHolder = RemoveHtml($this->tiempo_enfermedad->caption());

		// tipo_enfermedad
		$this->tipo_enfermedad->EditAttrs["class"] = "form-control";
		$this->tipo_enfermedad->EditCustomAttributes = "";
		$this->tipo_enfermedad->EditValue = $this->tipo_enfermedad->CurrentValue;
		$this->tipo_enfermedad->PlaceHolder = RemoveHtml($this->tipo_enfermedad->caption());

		// ap_med_paciente
		$this->ap_med_paciente->EditAttrs["class"] = "form-control";
		$this->ap_med_paciente->EditCustomAttributes = "";
		$this->ap_med_paciente->EditValue = $this->ap_med_paciente->CurrentValue;
		$this->ap_med_paciente->PlaceHolder = RemoveHtml($this->ap_med_paciente->caption());

		// ap_diabetes
		$this->ap_diabetes->EditAttrs["class"] = "form-control";
		$this->ap_diabetes->EditCustomAttributes = "";
		if (!$this->ap_diabetes->Raw)
			$this->ap_diabetes->CurrentValue = HtmlDecode($this->ap_diabetes->CurrentValue);
		$this->ap_diabetes->EditValue = $this->ap_diabetes->CurrentValue;
		$this->ap_diabetes->PlaceHolder = RemoveHtml($this->ap_diabetes->caption());

		// ap_cardiop
		$this->ap_cardiop->EditAttrs["class"] = "form-control";
		$this->ap_cardiop->EditCustomAttributes = "";
		if (!$this->ap_cardiop->Raw)
			$this->ap_cardiop->CurrentValue = HtmlDecode($this->ap_cardiop->CurrentValue);
		$this->ap_cardiop->EditValue = $this->ap_cardiop->CurrentValue;
		$this->ap_cardiop->PlaceHolder = RemoveHtml($this->ap_cardiop->caption());

		// ap_convul
		$this->ap_convul->EditAttrs["class"] = "form-control";
		$this->ap_convul->EditCustomAttributes = "";
		if (!$this->ap_convul->Raw)
			$this->ap_convul->CurrentValue = HtmlDecode($this->ap_convul->CurrentValue);
		$this->ap_convul->EditValue = $this->ap_convul->CurrentValue;
		$this->ap_convul->PlaceHolder = RemoveHtml($this->ap_convul->caption());

		// ap_asma
		$this->ap_asma->EditAttrs["class"] = "form-control";
		$this->ap_asma->EditCustomAttributes = "";
		if (!$this->ap_asma->Raw)
			$this->ap_asma->CurrentValue = HtmlDecode($this->ap_asma->CurrentValue);
		$this->ap_asma->EditValue = $this->ap_asma->CurrentValue;
		$this->ap_asma->PlaceHolder = RemoveHtml($this->ap_asma->caption());

		// ap_acv
		$this->ap_acv->EditAttrs["class"] = "form-control";
		$this->ap_acv->EditCustomAttributes = "";
		if (!$this->ap_acv->Raw)
			$this->ap_acv->CurrentValue = HtmlDecode($this->ap_acv->CurrentValue);
		$this->ap_acv->EditValue = $this->ap_acv->CurrentValue;
		$this->ap_acv->PlaceHolder = RemoveHtml($this->ap_acv->caption());

		// ap_has
		$this->ap_has->EditAttrs["class"] = "form-control";
		$this->ap_has->EditCustomAttributes = "";
		if (!$this->ap_has->Raw)
			$this->ap_has->CurrentValue = HtmlDecode($this->ap_has->CurrentValue);
		$this->ap_has->EditValue = $this->ap_has->CurrentValue;
		$this->ap_has->PlaceHolder = RemoveHtml($this->ap_has->caption());

		// ap_alergia
		$this->ap_alergia->EditAttrs["class"] = "form-control";
		$this->ap_alergia->EditCustomAttributes = "";
		if (!$this->ap_alergia->Raw)
			$this->ap_alergia->CurrentValue = HtmlDecode($this->ap_alergia->CurrentValue);
		$this->ap_alergia->EditValue = $this->ap_alergia->CurrentValue;
		$this->ap_alergia->PlaceHolder = RemoveHtml($this->ap_alergia->caption());

		// ap_otros
		$this->ap_otros->EditAttrs["class"] = "form-control";
		$this->ap_otros->EditCustomAttributes = "";
		$this->ap_otros->EditValue = $this->ap_otros->CurrentValue;
		$this->ap_otros->PlaceHolder = RemoveHtml($this->ap_otros->caption());

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
					$doc->exportCaption($this->id_evaluacionclinica);
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->fecha_horaevaluacion);
					$doc->exportCaption($this->cod_paciente);
					$doc->exportCaption($this->cod_diag_cie);
					$doc->exportCaption($this->diagnos_txt);
					$doc->exportCaption($this->triage);
					$doc->exportCaption($this->c_clinico);
					$doc->exportCaption($this->examen_fisico);
					$doc->exportCaption($this->tratamiento);
					$doc->exportCaption($this->antecedentes);
					$doc->exportCaption($this->paraclinicos);
					$doc->exportCaption($this->sv_tx);
					$doc->exportCaption($this->sv_fc);
					$doc->exportCaption($this->sv_fr);
					$doc->exportCaption($this->sv_temp);
					$doc->exportCaption($this->sv_gl);
					$doc->exportCaption($this->peso);
					$doc->exportCaption($this->talla);
					$doc->exportCaption($this->sv_fcf);
					$doc->exportCaption($this->sv_satO2);
					$doc->exportCaption($this->sv_apgar);
					$doc->exportCaption($this->sv_gli);
					$doc->exportCaption($this->tipo_paciente);
					$doc->exportCaption($this->usu_sede);
					$doc->exportCaption($this->tiempo_enfermedad);
					$doc->exportCaption($this->tipo_enfermedad);
					$doc->exportCaption($this->ap_med_paciente);
					$doc->exportCaption($this->ap_diabetes);
					$doc->exportCaption($this->ap_cardiop);
					$doc->exportCaption($this->ap_convul);
					$doc->exportCaption($this->ap_asma);
					$doc->exportCaption($this->ap_acv);
					$doc->exportCaption($this->ap_has);
					$doc->exportCaption($this->ap_alergia);
					$doc->exportCaption($this->ap_otros);
				} else {
					$doc->exportCaption($this->id_evaluacionclinica);
					$doc->exportCaption($this->cod_casopreh);
					$doc->exportCaption($this->fecha_horaevaluacion);
					$doc->exportCaption($this->cod_paciente);
					$doc->exportCaption($this->cod_diag_cie);
					$doc->exportCaption($this->triage);
					$doc->exportCaption($this->sv_tx);
					$doc->exportCaption($this->sv_fc);
					$doc->exportCaption($this->sv_fr);
					$doc->exportCaption($this->sv_temp);
					$doc->exportCaption($this->sv_gl);
					$doc->exportCaption($this->peso);
					$doc->exportCaption($this->talla);
					$doc->exportCaption($this->sv_fcf);
					$doc->exportCaption($this->sv_satO2);
					$doc->exportCaption($this->sv_apgar);
					$doc->exportCaption($this->sv_gli);
					$doc->exportCaption($this->tipo_paciente);
					$doc->exportCaption($this->usu_sede);
					$doc->exportCaption($this->tiempo_enfermedad);
					$doc->exportCaption($this->tipo_enfermedad);
					$doc->exportCaption($this->ap_diabetes);
					$doc->exportCaption($this->ap_cardiop);
					$doc->exportCaption($this->ap_convul);
					$doc->exportCaption($this->ap_asma);
					$doc->exportCaption($this->ap_acv);
					$doc->exportCaption($this->ap_has);
					$doc->exportCaption($this->ap_alergia);
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
						$doc->exportField($this->id_evaluacionclinica);
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->fecha_horaevaluacion);
						$doc->exportField($this->cod_paciente);
						$doc->exportField($this->cod_diag_cie);
						$doc->exportField($this->diagnos_txt);
						$doc->exportField($this->triage);
						$doc->exportField($this->c_clinico);
						$doc->exportField($this->examen_fisico);
						$doc->exportField($this->tratamiento);
						$doc->exportField($this->antecedentes);
						$doc->exportField($this->paraclinicos);
						$doc->exportField($this->sv_tx);
						$doc->exportField($this->sv_fc);
						$doc->exportField($this->sv_fr);
						$doc->exportField($this->sv_temp);
						$doc->exportField($this->sv_gl);
						$doc->exportField($this->peso);
						$doc->exportField($this->talla);
						$doc->exportField($this->sv_fcf);
						$doc->exportField($this->sv_satO2);
						$doc->exportField($this->sv_apgar);
						$doc->exportField($this->sv_gli);
						$doc->exportField($this->tipo_paciente);
						$doc->exportField($this->usu_sede);
						$doc->exportField($this->tiempo_enfermedad);
						$doc->exportField($this->tipo_enfermedad);
						$doc->exportField($this->ap_med_paciente);
						$doc->exportField($this->ap_diabetes);
						$doc->exportField($this->ap_cardiop);
						$doc->exportField($this->ap_convul);
						$doc->exportField($this->ap_asma);
						$doc->exportField($this->ap_acv);
						$doc->exportField($this->ap_has);
						$doc->exportField($this->ap_alergia);
						$doc->exportField($this->ap_otros);
					} else {
						$doc->exportField($this->id_evaluacionclinica);
						$doc->exportField($this->cod_casopreh);
						$doc->exportField($this->fecha_horaevaluacion);
						$doc->exportField($this->cod_paciente);
						$doc->exportField($this->cod_diag_cie);
						$doc->exportField($this->triage);
						$doc->exportField($this->sv_tx);
						$doc->exportField($this->sv_fc);
						$doc->exportField($this->sv_fr);
						$doc->exportField($this->sv_temp);
						$doc->exportField($this->sv_gl);
						$doc->exportField($this->peso);
						$doc->exportField($this->talla);
						$doc->exportField($this->sv_fcf);
						$doc->exportField($this->sv_satO2);
						$doc->exportField($this->sv_apgar);
						$doc->exportField($this->sv_gli);
						$doc->exportField($this->tipo_paciente);
						$doc->exportField($this->usu_sede);
						$doc->exportField($this->tiempo_enfermedad);
						$doc->exportField($this->tipo_enfermedad);
						$doc->exportField($this->ap_diabetes);
						$doc->exportField($this->ap_cardiop);
						$doc->exportField($this->ap_convul);
						$doc->exportField($this->ap_asma);
						$doc->exportField($this->ap_acv);
						$doc->exportField($this->ap_has);
						$doc->exportField($this->ap_alergia);
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