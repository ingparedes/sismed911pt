<?php
namespace PHPMaker2020\sismed911;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
//  $sideMenu->addMenuItem(963, "mi_Controprehmaster", $MenuLanguage->MenuPhrase("963", "MenuText"), $MenuRelativePath . "Controprehmaster.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}Controprehmaster.php'), FALSE, FALSE, "", "", FALSE);
//$sideMenu->addMenuItem(964, "mi_Controlintemaster", $MenuLanguage->MenuPhrase("964", "MenuText"), $MenuRelativePath . "Controlintemaster.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}Controlintemaster.php'), FALSE, FALSE, "", "", FALSE);
//$sideMenu->addMenuItem(965, "mi_admisionhs", $MenuLanguage->MenuPhrase("965", "MenuText"), $MenuRelativePath . "admisionhs.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}admisionhs.php'), FALSE, FALSE, "", "", FALSE);
//$sideMenu->addMenuItem(966, "mi_clasificacionh", $MenuLanguage->MenuPhrase("966", "MenuText"), $MenuRelativePath . "clasificacionh.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}clasificacionh.php'), FALSE, FALSE, "", "", FALSE);
//$sideMenu->addMenuItem(967, "mi_urgencias", $MenuLanguage->MenuPhrase("967", "MenuText"), $MenuRelativePath . "urgencias.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}urgencias.php'), FALSE, FALSE, "", "", FALSE);
//$sideMenu->addMenuItem(968, "mi_emergencias", $MenuLanguage->MenuPhrase("968", "MenuText"), $MenuRelativePath . "emergencias.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}emergencias.php'), FALSE, FALSE, "", "", FALSE);
//$sideMenu->addMenuItem(969, "mi_despachoambpreh", $MenuLanguage->MenuPhrase("969", "MenuText"), $MenuRelativePath . "despachoambpreh.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}despachoambpreh.php'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(37, "mi_inicio", $MenuLanguage->MenuPhrase("37", "MenuText"), $MenuRelativePath . "inicio.php", -1, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}inicio.php'), FALSE, FALSE, "icofont-ui-home", "", FALSE);
$sideMenu->addMenuItem(119, "mci_Inter-Hospital", $MenuLanguage->MenuPhrase("119", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "icofont-medical-sign", "", FALSE);
$sideMenu->addMenuItem(177, "mi_Dashboard1", $MenuLanguage->MenuPhrase("177", "MenuText"), $MenuRelativePath . "Dashboard1dsb.php", 119, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}Dashboard1'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(3, "mi_interh_maestro", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "Controlintemaster.php", 119, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}interh_maestro'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(120, "mci_Pre-Hospital", $MenuLanguage->MenuPhrase("120", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "fas fa-star-of-life", "", FALSE);
$sideMenu->addMenuItem(529, "mi_Dashboard2", $MenuLanguage->MenuPhrase("529", "MenuText"), $MenuRelativePath . "Dashboard2dsb.php", 120, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}Dashboard2'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(29, "mi_Controprehmaster", $MenuLanguage->MenuPhrase("29", "MenuText"), $MenuRelativePath . "Controprehmaster.php", 120, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}preh_maestro'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(179, "mi_preh_despacho", $MenuLanguage->MenuPhrase("179", "MenuText"), $MenuRelativePath . "despachoambpreh.php", 120, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}preh_despacho'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(335, "mci_E-Camas", $MenuLanguage->MenuPhrase("335", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "icofont-external", "", FALSE);
$sideMenu->addMenuItem(17, "mi_hospitalesgeneral", $MenuLanguage->MenuPhrase("17", "MenuText"), $MenuRelativePath . "hospitalesgenerallist.php", 335, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}hospitalesgeneral'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(438, "mci_registro", $MenuLanguage->MenuPhrase("438", "MenuText"), $MenuRelativePath . "censo_camasadd.php", 335, "", TRUE, FALSE, TRUE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(804, "mci_reportes", $MenuLanguage->MenuPhrase("804", "MenuText"), "", 335, "", TRUE, FALSE, TRUE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(121, "mi_tabla_disp", $MenuLanguage->MenuPhrase("121", "MenuText"), $MenuRelativePath . "tabla_displist.php", 804, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}tabla_disp'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(126, "report", $MenuLanguage->MenuPhrase("804", "MenuText"), $MenuRelativePath . "report.php", 804, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}report'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(614, "mci_Configuración", $MenuLanguage->MenuPhrase("614", "MenuText"), "", 335, "", TRUE, FALSE, TRUE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(387, "mci_config", $MenuLanguage->MenuPhrase("387", "MenuText"), $MenuRelativePath . "alerta_censoadd.php", 614, "", TRUE, FALSE, TRUE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(530, "mi_muestra_bloques", $MenuLanguage->MenuPhrase("530", "MenuText"), $MenuRelativePath . "muestra_bloques.php", 614, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}muestra_bloques.php'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(531, "mi_a_parametriza_hosptl", $MenuLanguage->MenuPhrase("531", "MenuText"), $MenuRelativePath . "a_parametriza_hosptl.php", 614, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}a_parametriza_hosptl.php'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(962, "mci_Ambulancias", $MenuLanguage->MenuPhrase("962", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "icofont-tools", "", FALSE);
$sideMenu->addMenuItem(835, "mi_eventos_proximos", $MenuLanguage->MenuPhrase("835", "MenuText"), $MenuRelativePath . "eventos_proximoslist.php", 962, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}eventos_proximos'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(1, "mi_ambulancias", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "ambulanciaslist.php", 962, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}ambulancias'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(833, "mi_recordatorio_taller", $MenuLanguage->MenuPhrase("833", "MenuText"), $MenuRelativePath . "recordatorio_tallerlist.php", 962, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}recordatorio_taller'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(834, "mi_ambulancia_taller", $MenuLanguage->MenuPhrase("834", "MenuText"), $MenuRelativePath . "ambulancia_tallerlist.php", 962, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}ambulancia_taller'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(832, "mi_catalogo_serv_taller", $MenuLanguage->MenuPhrase("832", "MenuText"), $MenuRelativePath . "catalogo_serv_tallerlist.php", 962, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}catalogo_serv_taller'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(250, "mci_Hospital", $MenuLanguage->MenuPhrase("250", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "icofont-hospital", "", FALSE);
//$sideMenu->addMenuItem(187, "mi_sala_rac", $MenuLanguage->MenuPhrase("187", "MenuText"), $MenuRelativePath . "sala_raclist.php", 250, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}sala_rac'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(965, "mi_admisionhs", $MenuLanguage->MenuPhrase("965", "MenuText"), $MenuRelativePath . "admisionhs.php", 250, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}admisionhs.php'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(966, "mi_clasificacionh", $MenuLanguage->MenuPhrase("966", "MenuText"), $MenuRelativePath . "clasificacionh.php", 250, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}clasificacionh.php'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(967, "mi_urgencias", $MenuLanguage->MenuPhrase("967", "MenuText"), $MenuRelativePath . "urgencias.php", 250, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}urgencias.php'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(968, "mi_emergencias", $MenuLanguage->MenuPhrase("968", "MenuText"), $MenuRelativePath . "emergencias.php", 250, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}emergencias.php'), FALSE, FALSE, "icofont-play", "", FALSE);
//$sideMenu->addMenuItem(186, "mi_sala_admision", $MenuLanguage->MenuPhrase("186", "MenuText"), $MenuRelativePath . "sala_admisionlist.php", 250, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}sala_admision'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(167, "mci_Administración", $MenuLanguage->MenuPhrase("167", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "icofont-ui-settings", "", FALSE);
$sideMenu->addMenuItem(122, "mi_incidentes", $MenuLanguage->MenuPhrase("122", "MenuText"), $MenuRelativePath . "incidenteslist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}incidentes'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(123, "mi_tipo_ambulancia", $MenuLanguage->MenuPhrase("123", "MenuText"), $MenuRelativePath . "tipo_ambulancialist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}tipo_ambulancia'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(124, "mi_modalidad_ambulancia", $MenuLanguage->MenuPhrase("124", "MenuText"), $MenuRelativePath . "modalidad_ambulancialist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}modalidad_ambulancia'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(125, "mi_especial_ambulancia", $MenuLanguage->MenuPhrase("125", "MenuText"), $MenuRelativePath . "especial_ambulancialist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}especial_ambulancia'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(168, "mi_especialidad_hospital", $MenuLanguage->MenuPhrase("168", "MenuText"), $MenuRelativePath . "especialidad_hospitallist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}especialidad_hospital'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(178, "mi_usuarios", $MenuLanguage->MenuPhrase("178", "MenuText"), $MenuRelativePath . "usuarioslist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}usuarios'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(183, "mi_userlevels", $MenuLanguage->MenuPhrase("183", "MenuText"), $MenuRelativePath . "userlevelslist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}userlevels'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(184, "mi_code_planta", $MenuLanguage->MenuPhrase("184", "MenuText"), $MenuRelativePath . "code_plantalist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}code_planta'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(185, "mi_sede_sismed", $MenuLanguage->MenuPhrase("185", "MenuText"), $MenuRelativePath . "sede_sismedlist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}sede_sismed'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(257, "mi_base_ambulancia", $MenuLanguage->MenuPhrase("257", "MenuText"), $MenuRelativePath . "base_ambulancialist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}base_ambulancia'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(261, "mi_webservices", $MenuLanguage->MenuPhrase("261", "MenuText"), $MenuRelativePath . "webserviceslist.php", 167, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}webservices'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(753, "mci_Tablet", $MenuLanguage->MenuPhrase("753", "MenuText"), "", 167, "", TRUE, FALSE, TRUE, "icofont-patient-file", "", FALSE);
$sideMenu->addMenuItem(805, "mi_medicamentos", $MenuLanguage->MenuPhrase("805", "MenuText"), $MenuRelativePath . "medicamentoslist.php", 753, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}medicamentos'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(819, "mi_insumos", $MenuLanguage->MenuPhrase("819", "MenuText"), $MenuRelativePath . "insumoslist.php", 753, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}insumos'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(815, "mi_procedimiento_tipos", $MenuLanguage->MenuPhrase("815", "MenuText"), $MenuRelativePath . "procedimiento_tiposlist.php", 753, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}procedimiento_tipos'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(816, "mi_explo_general_afeccion", $MenuLanguage->MenuPhrase("816", "MenuText"), $MenuRelativePath . "explo_general_afeccionlist.php", 753, "", AllowListMenu('{17BEB368-DB80-46DC-8EC5-730EB11B94E5}explo_general_afeccion'), FALSE, FALSE, "icofont-play", "", FALSE);
$sideMenu->addMenuItem(72, "mci_Terminos_y_Condiciones", $MenuLanguage->MenuPhrase("72", "MenuText"), $MenuRelativePath . "terminosview.php?showdetail=&id_terminos=1", -1, "", TRUE, FALSE, TRUE, "fa-money-check", "", FALSE);
$sideMenu->addMenuItem(73, "mci_Acerca_de", $MenuLanguage->MenuPhrase("73", "MenuText"), $MenuRelativePath . "acercadeview.php?showdetail=&id_acerca=1", -1, "", TRUE, FALSE, TRUE, "icofont-info-square", "", FALSE);
echo $sideMenu->toScript();
?>