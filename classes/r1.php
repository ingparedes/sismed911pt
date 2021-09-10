<?php namespace PHPMaker2020\sismed911; ?>
<?php

/**
 * Table class for r1
 */
class r1 extends ReportTable
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
	public $r1;

	// Fields
	public $cod_casointerh;
	public $fechahorainterh;
	public $tiempo;
	public $cod_expendeinteinteh;
	public $tipo_serviciointerh;
	public $hospital_origneinterh;
	public $nombrereportainterh;
	public $telefonointerh;
	public $motivo_atencioninteh;
	public $accioninterh;
	public $longitudinterh;
	public $latitudinterh;
	public $prioridadinterh;
	public $estadointerh;
	public $cierreinterh;
	public $hospital_destinointerh;
	public $nombre_recibe;
	public $ambulancia;
	public $paciente;
	public $evaluacion;
	public $sede;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'r1';
		$this->TableName = 'r1';
		$this->TableType = 'REPORT';

		// Update Table
		$this->UpdateTable = "\"interh_maestro\"";
		$this->ReportSourceTable = 'interh_maestro'; // Report source table
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
		$this->cod_casointerh = new ReportField('r1', 'r1', 'x_cod_casointerh', 'cod_casointerh', '"cod_casointerh"', 'CAST("cod_casointerh" AS varchar(255))', 3, 4, -1, FALSE, '"cod_casointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->cod_casointerh->IsAutoIncrement = TRUE; // Autoincrement field
		$this->cod_casointerh->IsPrimaryKey = TRUE; // Primary key field
		$this->cod_casointerh->Nullable = FALSE; // NOT NULL field
		$this->cod_casointerh->Sortable = TRUE; // Allow sort
		$this->cod_casointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->cod_casointerh->SourceTableVar = 'interh_maestro';
		$this->fields['cod_casointerh'] = &$this->cod_casointerh;

		// fechahorainterh
		$this->fechahorainterh = new ReportField('r1', 'r1', 'x_fechahorainterh', 'fechahorainterh', '"fechahorainterh"', CastDateFieldForLike("\"fechahorainterh\"", 9, "DB"), 135, 8, 9, FALSE, '"fechahorainterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fechahorainterh->Sortable = TRUE; // Allow sort
		$this->fechahorainterh->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateYMD"));
		$this->fechahorainterh->SourceTableVar = 'interh_maestro';
		$this->fields['fechahorainterh'] = &$this->fechahorainterh;

		// tiempo
		$this->tiempo = new ReportField('r1', 'r1', 'x_tiempo', 'tiempo', 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60)', 'CAST(ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS varchar(255))', 5, 8, -1, FALSE, 'ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60)', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tiempo->IsCustom = TRUE; // Custom field
		$this->tiempo->Sortable = TRUE; // Allow sort
		$this->tiempo->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->tiempo->SourceTableVar = 'interh_maestro';
		$this->fields['tiempo'] = &$this->tiempo;

		// cod_expendeinteinteh
		$this->cod_expendeinteinteh = new ReportField('r1', 'r1', 'x_cod_expendeinteinteh', 'cod_expendeinteinteh', '"cod_expendeinteinteh"', '"cod_expendeinteinteh"', 200, 12, -1, FALSE, '"cod_expendeinteinteh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cod_expendeinteinteh->Sortable = FALSE; // Allow sort
		$this->cod_expendeinteinteh->SourceTableVar = 'interh_maestro';
		$this->fields['cod_expendeinteinteh'] = &$this->cod_expendeinteinteh;

		// tipo_serviciointerh
		$this->tipo_serviciointerh = new ReportField('r1', 'r1', 'x_tipo_serviciointerh', 'tipo_serviciointerh', '"tipo_serviciointerh"', 'CAST("tipo_serviciointerh" AS varchar(255))', 2, 2, -1, FALSE, '"tipo_serviciointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tipo_serviciointerh->Sortable = TRUE; // Allow sort
		$this->tipo_serviciointerh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tipo_serviciointerh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->tipo_serviciointerh->Lookup = new Lookup('tipo_serviciointerh', 'interh_tiposervicio', FALSE, 'id_tiposervicion', ["nombre_tiposervicion_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->tipo_serviciointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->tipo_serviciointerh->SourceTableVar = 'interh_maestro';
		$this->fields['tipo_serviciointerh'] = &$this->tipo_serviciointerh;

		// hospital_origneinterh
		$this->hospital_origneinterh = new ReportField('r1', 'r1', 'x_hospital_origneinterh', 'hospital_origneinterh', '"hospital_origneinterh"', '"hospital_origneinterh"', 200, 16, -1, FALSE, '"EV__hospital_origneinterh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->hospital_origneinterh->Sortable = TRUE; // Allow sort
		$this->hospital_origneinterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->hospital_origneinterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->hospital_origneinterh->Lookup = new Lookup('hospital_origneinterh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->hospital_origneinterh->SourceTableVar = 'interh_maestro';
		$this->fields['hospital_origneinterh'] = &$this->hospital_origneinterh;

		// nombrereportainterh
		$this->nombrereportainterh = new ReportField('r1', 'r1', 'x_nombrereportainterh', 'nombrereportainterh', '"nombrereportainterh"', '"nombrereportainterh"', 200, 80, -1, FALSE, '"nombrereportainterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombrereportainterh->Sortable = TRUE; // Allow sort
		$this->nombrereportainterh->SourceTableVar = 'interh_maestro';
		$this->fields['nombrereportainterh'] = &$this->nombrereportainterh;

		// telefonointerh
		$this->telefonointerh = new ReportField('r1', 'r1', 'x_telefonointerh', 'telefonointerh', '"telefonointerh"', '"telefonointerh"', 200, 80, -1, FALSE, '"telefonointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefonointerh->Sortable = TRUE; // Allow sort
		$this->telefonointerh->SourceTableVar = 'interh_maestro';
		$this->fields['telefonointerh'] = &$this->telefonointerh;

		// motivo_atencioninteh
		$this->motivo_atencioninteh = new ReportField('r1', 'r1', 'x_motivo_atencioninteh', 'motivo_atencioninteh', '"motivo_atencioninteh"', 'CAST("motivo_atencioninteh" AS varchar(255))', 2, 2, -1, FALSE, '"EV__motivo_atencioninteh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'RADIO');
		$this->motivo_atencioninteh->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->motivo_atencioninteh->Lookup = new Lookup('motivo_atencioninteh', 'interh_motivoatencion', FALSE, 'id_motivoatencion', ["nombre_motivo_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->motivo_atencioninteh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->motivo_atencioninteh->SourceTableVar = 'interh_maestro';
		$this->fields['motivo_atencioninteh'] = &$this->motivo_atencioninteh;

		// accioninterh
		$this->accioninterh = new ReportField('r1', 'r1', 'x_accioninterh', 'accioninterh', '"accioninterh"', 'CAST("accioninterh" AS varchar(255))', 2, 2, -1, FALSE, '"EV__accioninterh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->accioninterh->Sortable = TRUE; // Allow sort
		$this->accioninterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->accioninterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->accioninterh->Lookup = new Lookup('accioninterh', 'interh_accion', FALSE, 'id_accion', ["nombre_accion_es","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->accioninterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->accioninterh->SourceTableVar = 'interh_maestro';
		$this->fields['accioninterh'] = &$this->accioninterh;

		// longitudinterh
		$this->longitudinterh = new ReportField('r1', 'r1', 'x_longitudinterh', 'longitudinterh', '"longitudinterh"', '"longitudinterh"', 200, 30, -1, FALSE, '"longitudinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->longitudinterh->Sortable = TRUE; // Allow sort
		$this->longitudinterh->SourceTableVar = 'interh_maestro';
		$this->fields['longitudinterh'] = &$this->longitudinterh;

		// latitudinterh
		$this->latitudinterh = new ReportField('r1', 'r1', 'x_latitudinterh', 'latitudinterh', '"latitudinterh"', '"latitudinterh"', 200, 30, -1, FALSE, '"latitudinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->latitudinterh->Sortable = TRUE; // Allow sort
		$this->latitudinterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->latitudinterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->latitudinterh->SourceTableVar = 'interh_maestro';
		$this->fields['latitudinterh'] = &$this->latitudinterh;

		// prioridadinterh
		$this->prioridadinterh = new ReportField('r1', 'r1', 'x_prioridadinterh', 'prioridadinterh', '"prioridadinterh"', 'CAST("prioridadinterh" AS varchar(255))', 2, 2, -1, FALSE, '"prioridadinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->prioridadinterh->Sortable = TRUE; // Allow sort
		$this->prioridadinterh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->prioridadinterh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->prioridadinterh->Lookup = new Lookup('prioridadinterh', 'interh_prioridad', FALSE, 'id_prioridad', ["nombre_prioridad","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->prioridadinterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->prioridadinterh->SourceTableVar = 'interh_maestro';
		$this->fields['prioridadinterh'] = &$this->prioridadinterh;

		// estadointerh
		$this->estadointerh = new ReportField('r1', 'r1', 'x_estadointerh', 'estadointerh', '"estadointerh"', 'CAST("estadointerh" AS varchar(255))', 2, 2, -1, FALSE, '"estadointerh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estadointerh->Sortable = TRUE; // Allow sort
		switch ($CurrentLanguage) {
			case "en":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->estadointerh->Lookup = new Lookup('estadointerh', 'interh_estado', FALSE, 'id_estadointeh', ["nombre_estadointer","","",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->estadointerh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->estadointerh->SourceTableVar = 'interh_maestro';
		$this->fields['estadointerh'] = &$this->estadointerh;

		// cierreinterh
		$this->cierreinterh = new ReportField('r1', 'r1', 'x_cierreinterh', 'cierreinterh', '"cierreinterh"', 'CAST("cierreinterh" AS varchar(255))', 2, 2, -1, FALSE, '"cierreinterh"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cierreinterh->Sortable = TRUE; // Allow sort
		$this->cierreinterh->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->cierreinterh->SourceTableVar = 'interh_maestro';
		$this->fields['cierreinterh'] = &$this->cierreinterh;

		// hospital_destinointerh
		$this->hospital_destinointerh = new ReportField('r1', 'r1', 'x_hospital_destinointerh', 'hospital_destinointerh', '"hospital_destinointerh"', '"hospital_destinointerh"', 200, 16, -1, FALSE, '"EV__hospital_destinointerh"', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->hospital_destinointerh->Sortable = TRUE; // Allow sort
		$this->hospital_destinointerh->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->hospital_destinointerh->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		switch ($CurrentLanguage) {
			case "en":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "fr":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "pt":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			case "es":
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
			default:
				$this->hospital_destinointerh->Lookup = new Lookup('hospital_destinointerh', 'hospitalesgeneral', FALSE, 'id_hospital', ["nombre_hospital","municipio_hospital","nivel_hospital",""], [], [], [], [], [], [], '', '');
				break;
		}
		$this->hospital_destinointerh->SourceTableVar = 'interh_maestro';
		$this->fields['hospital_destinointerh'] = &$this->hospital_destinointerh;

		// nombre_recibe
		$this->nombre_recibe = new ReportField('r1', 'r1', 'x_nombre_recibe', 'nombre_recibe', '"nombre_recibe"', '"nombre_recibe"', 200, 80, -1, FALSE, '"nombre_recibe"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nombre_recibe->Sortable = TRUE; // Allow sort
		$this->nombre_recibe->SourceTableVar = 'interh_maestro';
		$this->fields['nombre_recibe'] = &$this->nombre_recibe;

		// ambulancia
		$this->ambulancia = new ReportField('r1', 'r1', 'x_ambulancia', 'ambulancia', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ambulancia->IsCustom = TRUE; // Custom field
		$this->ambulancia->Sortable = TRUE; // Allow sort
		$this->ambulancia->SourceTableVar = 'interh_maestro';
		$this->fields['ambulancia'] = &$this->ambulancia;

		// paciente
		$this->paciente = new ReportField('r1', 'r1', 'x_paciente', 'paciente', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->paciente->IsCustom = TRUE; // Custom field
		$this->paciente->Sortable = TRUE; // Allow sort
		$this->paciente->SourceTableVar = 'interh_maestro';
		$this->fields['paciente'] = &$this->paciente;

		// evaluacion
		$this->evaluacion = new ReportField('r1', 'r1', 'x_evaluacion', 'evaluacion', '\'\'', '\'\'', 201, 0, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->evaluacion->IsCustom = TRUE; // Custom field
		$this->evaluacion->Sortable = TRUE; // Allow sort
		$this->evaluacion->SourceTableVar = 'interh_maestro';
		$this->fields['evaluacion'] = &$this->evaluacion;

		// sede
		$this->sede = new ReportField('r1', 'r1', 'x_sede', 'sede', '"sede"', 'CAST("sede" AS varchar(255))', 2, 2, -1, FALSE, '"sede"', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sede->Sortable = TRUE; // Allow sort
		$this->sede->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->sede->SourceTableVar = 'interh_maestro';
		$this->fields['sede'] = &$this->sede;

		// r1
		$this->r1 = new DbChart($this, 'r1', 'r1', 'tipo_serviciointerh', 'cod_casointerh', 1006, '', 0, 'COUNT', 600, 500);
		$this->r1->SortType = 0;
		$this->r1->SortSequence = "";
		$this->r1->SqlSelect = "SELECT \"tipo_serviciointerh\", '', COUNT(\"cod_casointerh\") FROM ";
		$this->r1->SqlGroupBy = "\"tipo_serviciointerh\"";
		$this->r1->SqlOrderBy = "";
		$this->r1->SeriesDateType = "";
		$this->r1->ID = "r1_r1"; // Chart ID
		$this->r1->setParameters([
			["type", "1006"],
			["seriestype", "0"]
		]); // Chart type / Chart series type
		$this->r1->setParameters([
			["caption", $this->r1->caption()],
			["xaxisname", $this->r1->xAxisName()]
		]); // Chart caption / X axis name
		$this->r1->setParameter("yaxisname", $this->r1->yAxisName()); // Y axis name
		$this->r1->setParameters([
			["shownames", "1"],
			["showvalues", "1"],
			["showhovercap", "1"]
		]); // Show names / Show values / Show hover
		$this->r1->setParameter("alpha", "50"); // Chart alpha
		$this->r1->setParameter("colorpalette", "#5899DA,#E8743B,#19A979,#ED4A7B,#945ECF,#13A4B4,#525DF4,#BF399E,#6C8893,#EE6868,#2F6497"); // Chart color palette
		$this->r1->setParameters([["options.legend.display",true],["options.legend.fullWidth",false],["options.legend.reverse",false],["options.legend.labels.usePointStyle",false],["options.title.display",true],["options.tooltips.enabled",true],["options.tooltips.intersect",false],["options.tooltips.displayColors",false],["options.plugins.filler.propagate",false],["options.animation.animateRotate",false],["options.animation.animateScale",false],["dataset.showLine",false],["dataset.spanGaps",false],["dataset.steppedLine",false],["scale.gridLines.offsetGridLines",false]]);
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
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "\"interh_maestro\"";
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
		$select = "*, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\"";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		global $CurrentLanguage;
		switch ($CurrentLanguage) {
			case "en":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"r1\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			case "fr":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"r1\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			case "pt":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"r1\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			case "es":
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"r1\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\" FROM \"interh_maestro\"" .
					") \"TMP_TABLE\"";
				break;
			default:
				$select = "SELECT * FROM (" .
					"SELECT *, ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", ROUND((SELECT EXTRACT(EPOCH FROM(CURRENT_TIMESTAMP::timestamp - fechahorainterh::timestamp)::interval))/60) AS \"tiempo\", '' AS \"ambulancia\", '' AS \"paciente\", '' AS \"evaluacion\", (SELECT \"nombre_motivo_es\" FROM \"interh_motivoatencion\" \"TMP_LOOKUPTABLE\" WHERE \"TMP_LOOKUPTABLE\".\"id_motivoatencion\" = \"r1\".\"motivo_atencioninteh\" LIMIT 1) AS \"EV__motivo_atencioninteh\" FROM \"interh_maestro\"" .
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

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "\"cod_casointerh\" = @cod_casointerh@";
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
		$json .= "cod_casointerh:" . JsonEncode($this->cod_casointerh->CurrentValue, "number");
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
			if (Param("cod_casointerh") !== NULL)
				$arKeys[] = Param("cod_casointerh");
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
				$this->cod_casointerh->CurrentValue = $key;
			else
				$this->cod_casointerh->OldValue = $key;
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