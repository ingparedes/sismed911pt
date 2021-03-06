<?php
include_once "db.php";

class getData extends DB
{
    function getUsuarios()
    {
        $query = $this->connect()->query("SELECT u.login , u.pw FROM  public.usuarios AS u");
        return $query;
    }
    function getAmbulancias()
    {
        $query = $this->connect()->query("SELECT id_ambulancias,cod_ambulancias,placas 
                                            FROM  public.ambulancias 
                                            ORDER BY cod_ambulancias");
        return $query;
    }
    function getAseguradoras()
    {
        $query = $this->connect()->query("SELECT id_asegurador, nombre_asegurador 
                                            FROM  public.aseguradores 
                                            ORDER BY nombre_asegurador");
        return $query;
    }
    function getDepartamento()
    {
        $query = $this->connect()->query("SELECT d.cod_dpto, d.nombre_dpto 
                                            FROM public.departamento AS d 
                                            ORDER BY d.nombre_dpto");
        return $query;
    }
    function getDiagnosticos()
    {
        $query = $this->connect()->query("SELECT codigo_cie AS id, CONCAT(diagnostico,' (',codigo_cie,')') AS nombre 
                                            FROM  public.cie10 
                                            ORDER BY id");
        return $query;
    }
    function getDistrito()
    {
        $query = $this->connect()->query("SELECT d.cod_distrito, d.nombre_distrito, d.cod_provincia,d.cod_dpto 
                                            FROM public.distrito AS d                                                
                                            ORDER BY d.nombre_distrito");
        return $query;
    }
    function getExploFisica()
    {
        $query = $this->connect()->query("SELECT id, nombre 
                                            FROM  public.explo_fisica 
                                            ORDER BY nombre");
        return $query;
    }
    function getExploGen()
    {
        $query = $this->connect()->query("SELECT id, explo_general_cat ,descripcion AS nombre 
                                            FROM  public.explo_general_afeccion                                             
                                            ORDER BY nombre");
        return $query;
    }
    function getGenero()
    {
        $query = $this->connect()->query("SELECT nombre_genero,id_genero 
                                            FROM  public.tipo_genero 
                                            ORDER BY id_genero");
        return $query;
    }
    function getHospitales()
    {
        $query = $this->connect()->query("SELECT H.id_hospital AS id, H.nombre_hospital AS nombre, DP.nombre_dpto AS dpto, P.nombre_provincia AS prov, D.nombre_distrito AS dist
                                            FROM  public.hospitalesgeneral   AS H                        
                                                LEFT JOIN public.provincias   AS P  ON H.provincia_hospital = P.cod_provincia
                                                LEFT JOIN public.departamento AS DP ON H.depto_hospital     = DP.cod_dpto
                                                LEFT JOIN public.distrito     AS D  ON H.municipio_hospital = D.cod_distrito
                                            WHERE DP.nombre_dpto is not null AND P.nombre_provincia is not null AND D.nombre_distrito is not null
                                            ORDER BY dpto");
        return $query;
    }
    function getInsumos()
    {
        $query = $this->connect()->query("SELECT id_insumo, nombre_insumo 
                                            FROM public.insumos 
                                            ORDER BY nombre_insumo");
        return $query;
    }
    function getIncidentes()
    {
        $query = $this->connect()->query("SELECT id_incidente, nombre_es 
                                            FROM public.incidentes 
                                            ORDER BY nombre_es");
        return $query;
    }
    function getMedicamentos()
    {
        $query = $this->connect()->query("SELECT id_medicamento, nombre_medicamento
                                            FROM  public.medicamentos
                                            ORDER BY nombre_medicamento");
        return $query;
    }
    function getProcedimientos()
    {
        $query = $this->connect()->query("SELECT id, nombre_procedimeto
                                            FROM  public.procedimiento_tipos 
                                            ORDER BY nombre_procedimeto");
        return $query;
    }
    function getProvincia()
    {
        $query = $this->connect()->query("SELECT pr.cod_provincia, pr.cod_departamento, pr.nombre_provincia FROM public.provincias AS pr                                                
                                            ORDER BY pr.nombre_provincia");
        return $query;
    }
    function getCierres()
    {
        $query = $this->connect()->query("SELECT id_tranlado_fallido AS id, tipo_cierrecaso_es AS nombre
                                            FROM  public.tipo_cierrecaso
                                            ORDER BY id");
        return $query;
    }
    function getTipoDNI()
    {
        $query = $this->connect()->query("SELECT id_tipo,descripcion
                                            FROM  public.tipo_id
                                            ORDER BY id_tipo");
        return $query;
    }
    function getTraumas()
    {
        $query = $this->connect()->query("SELECT id, causa_trauma_categoria, nombre
                                            FROM  public.causa_trauma_situacion                                                 
                                            ORDER BY nombre");
        return $query;
    }
    function getTriage()
    {
        $query = $this->connect()->query("SELECT id_triage AS id, nombre_triage_es AS nombre
                                            FROM  public.triage                     
                                            ORDER BY id");
        return $query;
    }
    function getCasosAsignados()
    {
        $query = $this->connect()->query("SELECT    pm.cod_casopreh AS cod_caso, pm.fecha AS fecha_incidente, pm.hospital_destino AS id_hospital,
                                                    hg.nombre_hospital, pha.cod_ambulancia, pha.hora_asigna, amb.id_ambulancias
                                                    FROM preh_maestro AS pm
                                                        LEFT JOIN hospitalesgeneral AS hg ON pm.hospital_destino = hg.id_hospital
                                                        LEFT JOIN preh_servicio_ambulancia AS pha ON pha.cod_casopreh = pm.cod_casopreh
                                                        LEFT JOIN ambulancias AS amb ON pha.cod_ambulancia = amb.cod_ambulancias
                                                    WHERE pm.cierre = '0'");
        return $query;
    }
    function getCasosCerrados()
    {
        $query = $this->connect()->query("SELECT 	pha.cod_ambulancia AS Ambulancia, phm.cod_casopreh AS Caso, CONCAT(pg.nombre1,' ',pg.nombre2,' ',pg.apellido1,' ',pg.apellido2) AS Paciente,
                                                    SUBSTRING(CAST(pha.hora_asigna as varchar(20)),0,17) AS Hora_Asignacion, 
                                                    SUBSTRING(CAST(pha.hora_llegada as varchar(20)),0,17) AS Hora_Evento, 
                                                    SUBSTRING(CAST(pha.hora_preposicion as varchar(20)),0,17) AS hora_base, 
                                                    SUBSTRING(CAST(pha.hora_inicio as varchar(20)),0,17) AS Hora_Inicio,
                                                    SUBSTRING(CAST(pha.hora_destino as varchar(20)),0,17) AS Hora_Hospital,                                                     
                                                    (CASE WHEN phm.cierre = 8 OR phm.cierre = 9 THEN '1' ELSE '0' END) AS funcion,
                                                    tcc.tipo_cierrecaso_es as Cierre
                                                FROM preh_maestro AS phm		
                                                    LEFT JOIN preh_servicio_ambulancia AS pha ON pha.cod_casopreh = phm.cod_casopreh                                                    													
                                                    LEFT JOIN pacientegeneral AS pg ON pg.cod_casointerh = phm.cod_casopreh
                                                    LEFT JOIN ambulancias AS amb ON pha.cod_ambulancia = amb.cod_ambulancias
                                                    LEFT JOIN causa_registro AS c_r ON c_r.cod_casopreh = phm.cod_casopreh
                                                    LEFT JOIN causa_externa AS c_e ON c_r.id_causa = c_e.id_causa			                                                    
                                                    LEFT JOIN tipo_cierrecaso AS tcc ON phm.cierre = tcc.id_tranlado_fallido                                                    
                                                WHERE phm.cierre <> '0'");
        return $query;
    }
    function getCasosPDF($id_caso)
    {
        $query = $this->connect()->query("SELECT 	phm.cod_alfa AS cod_alfa,phm.cod_casopreh AS Caso, phm.fecha AS Fecha, phm.hospital_destino AS Hospital_Id,
                                                    hg.nombre_hospital AS Hospital_Nombre, pha.cod_ambulancia AS Ambulancia,amb.id_ambulancias AS id_Ambulancia, CONCAT(pg.nombre1,' ',pg.nombre2,' ',pg.apellido1,' ',pg.apellido2) AS Paciente,
                                                    pg.num_doc AS Paciente_DNI, td.descripcion AS Paciente_DNI_tipo, tg.nombre_genero AS Genero,
                                                    replace(pg.fecha_nacido,'/','-') AS Fecha_Nacimiento, pg.edad AS Edad, te.nombre_edad AS Edad_Tipo,
                                                    pg.telefono AS Paciente_Telefono, pg.celular AS Paciente_Celular, pg.direccion AS Paciente_Direccion,
                                                    SUBSTRING(CAST(pha.hora_asigna as varchar(20)),0,17) AS Hora_Asignacion, SUBSTRING(CAST(pha.hora_llegada as varchar(20)),0,17) AS Hora_Evento, SUBSTRING(CAST(pha.hora_preposicion as varchar(20)),0,17) AS hora_base, SUBSTRING(CAST(pha.hora_inicio as varchar(20)),0,17) AS Hora_Inicio,
                                                    SUBSTRING(CAST(pha.hora_destino as varchar(20)),0,17) AS Hora_Hospital, c_e.nom_causa AS Causa, SUBSTRING(CAST(phec.fecha_horaevaluacion as varchar(20)),0,17) AS Hora_Evaluacion,
                                                    phec.sv_fr AS Frecuencia_Respiratoria, phec.sv_tx AS Presion_Arterial, phec.sv_fc AS Frecuencia_Cardiaca,
                                                    phec.sv_sato2 AS Saturacion_o2, phec.sv_temp AS Temperatura, phec.sv_gl AS Glasgow,
                                                    phec.ap_diabetes AS a_Diabetes, phec.ap_cardiop AS a_Cardiopatia, phec.ap_convul AS a_Convul,
                                                    phec.ap_asma AS a_Asma, phec.ap_acv AS a_Acv, phec.ap_has AS a_Has,
                                                    phec.ap_alergia AS a_Alergia, phec.ap_med_paciente AS a_Medicamentos, phec.ap_otros AS a_Otros,
                                                    phec.cod_diag_cie AS Diagnosticos, tt.nombre_triage_es as Triage, phm.observacion as Observaciones,
                                                    phm.descripcion AS Descrip_pertenencias, phm.nombre_confirma AS Nombre_p_recibe, phm.telefono_confirma AS Telefono_p_recibe,
                                                    phm.nombre_medico AS Medico_recibe, pha.k_final AS Km_final, pha.k_inical AS Km_inicial, tcc.tipo_cierrecaso_es AS cierre,
                                                    fr.posx AS pos_firma_x, fr.posy AS pos_firma_y, fr.ancho AS ancho_firma,
                                                    phm.prioridad, phm.direccion AS direcevento, inc.nombre_es AS incidente,
                                                    pha.medico AS atmedico, pha.paramedico AS atenfermero, pha.cuando_murio AS fallecidoen
                                                FROM preh_maestro AS phm		
                                                    LEFT JOIN incidentes AS inc ON inc.id_incidente = phm.incidente		
                                                    LEFT JOIN firmas_registro AS fr ON fr.cod_casopreh = phm.cod_casopreh		
                                                    LEFT JOIN preh_evaluacionclinica AS phec ON phec.cod_casopreh = phm.cod_casopreh		
                                                    LEFT JOIN pacientegeneral AS pg ON pg.cod_casointerh = phm.cod_casopreh
                                                    LEFT JOIN preh_servicio_ambulancia AS pha ON pha.cod_casopreh = phm.cod_casopreh
                                                    LEFT JOIN ambulancias AS amb ON pha.cod_ambulancia = amb.cod_ambulancias
                                                    LEFT JOIN causa_registro AS c_r ON c_r.cod_casopreh = phm.cod_casopreh
                                                    LEFT JOIN tipo_id AS td ON pg.tipo_doc = td.id_tipo
                                                    LEFT JOIN tipo_genero AS tg ON pg.genero = tg.id_genero
                                                    LEFT JOIN tipo_cierrecaso AS tcc ON phm.cierre = tcc.id_tranlado_fallido
                                                    LEFT JOIN triage AS tt ON CAST(phec.triage AS SMALLINT) = tt.id_triage
                                                    LEFT JOIN tipo_edad AS te ON pg.cod_edad = te.id_edad
                                                    LEFT JOIN hospitalesgeneral AS hg ON phm.hospital_destino = hg.id_hospital		
                                                    LEFT JOIN causa_externa AS c_e ON c_r.id_causa = c_e.id_causa				
                                                WHERE phm.cod_casopreh =  '" . $id_caso . "' and phm.cierre <> '0';");
        return $query;
    }
    function getTraumasCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT cts.id, ctc.id AS id_cat, ctc.causa_trauma, cts.nombre 
                                            FROM trauma_registro AS tr
                                                LEFT JOIN causa_trauma_situacion AS cts ON tr.causa_trauma_registro = cts.id
                                                LEFT JOIN causa_trauma_categoria AS ctc ON cts.causa_trauma_categoria = ctc.id
                                            WHERE tr.cod_casopreh = '" . $codigo_caso . "' ORDER BY id_cat asc;");
        return $query;
    }
    function getExpGCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT ega.id,ega.explo_general_cat AS id_categoria,egc.descripcion AS categoria,ega.descripcion AS nombre 
                                            FROM explo_general_registro AS egr
                                                LEFT JOIN explo_general_afeccion AS ega ON ega.id = egr.explo_general_afeccion
                                                LEFT JOIN explo_general_cat AS egc ON egc.id = ega.explo_general_cat
                                            WHERE egr.cod_casopreh = '" . $codigo_caso . "'");
        return $query;
    }
    function getProcCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT pt.id,pt.nombre_procedimeto 
                                            FROM procedimiento_registro AS pr
                                                LEFT JOIN procedimiento_tipos AS pt ON pt.id = pr.procedimiento_tipo_id
                                            WHERE pr.cod_casopreh = '" . $codigo_caso . "'");
        return $query;
    }
    function getMedicamentoCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT med.id_medicamento, med.nombre_medicamento, mr.cantidad 
                                            FROM medicamentos_registros AS mr
                                                LEFT JOIN medicamentos AS med ON med.id_medicamento = mr.medicamentos_id
                                            WHERE mr.cod_casopreh = '" . $codigo_caso . "'");
        return $query;
    }
    function getInsumoCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT ins.id_insumo, ins.nombre_insumo, inr.cantidad 
                                            FROM insumos_registros AS inr
                                                LEFT JOIN insumos AS ins ON ins.id_insumo = inr.insumos_id
                                            WHERE inr.cod_casopreh = '" . $codigo_caso . "';");
        return $query;
    }
    function getExpFCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT ef.id, ef.nombre, efr.pos, efr.posx, efr.posy 
                                            FROM explo_fisica_registro AS efr
                                                LEFT JOIN explo_fisica AS ef ON ef.id = efr.id_trauma_fisico
                                            WHERE efr.cod_casopreh = '" . $codigo_caso . "' ORDER BY efr.pos ASC;");
        return $query;
    }
    function getDiagnosticoCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT cod_diag_cie, '1' AS existe FROM preh_evaluacionclinica WHERE cod_casopreh  = '" . $codigo_caso . "';");
        if ($query->rowCount()) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $codigo_diag = $row['cod_diag_cie'];
                $codigo_diag = str_replace(", ", "','", $codigo_diag);
                $codigo_diag = "'" . $codigo_diag . "'";
            }
        }
        $query = $this->connect()->query("SELECT codigo_cie, diagnostico 
                                                    FROM cie10 
                                                    WHERE codigo_cie IN (" . $codigo_diag . ");");
        return $query;
    }
    function getObstCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT trabajoparto, sangradovaginal, g, p, a, n, c, fuente, tiempo 
                                            FROM obstetrico_registro
                                            WHERE cod_casopreh= '" . $codigo_caso . "';");
        return $query;
    }
    function getMedicaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT pm.hospital_destino AS cod_hospital, pm.nombre_medico AS medico, hg.nombre_hospital FROM preh_maestro AS pm
                                            LEFT JOIN hospitalesgeneral AS hg ON pm.hospital_destino = hg.id_hospital WHERE cod_casopreh= '" . $codigo_caso . "';");
        return $query;
    }
    function getPaciCaso($codigo_caso)
    {
        $query = $this->connect()->query("SELECT /* BLOQUE */ pg.num_doc, pg.tipo_doc, 
                                                 /* BLOQUE */ CONCAT(pg.nombre1,' ',pg.nombre2) AS nombres, CONCAT(pg.apellido1,' ',pg.apellido2) AS apellidos, 
                                                 /* BLOQUE */ pg.genero,pg.edad,pg.fecha_nacido AS fecha_nacido,pg.cod_edad, 
                                                 /* BLOQUE */ pg.telefono, pg.celular, pg.direccion, pg.aseguradro, 
                                                 /* BLOQUE */ pg.dpto_pte AS dpto, pg.provin_pte AS prov, pg.distrito_pte AS dist,
												 /* BLOQUE */ pm.direccion AS direcevento, pm.incidente, pm.prioridad  
                                                 FROM pacientegeneral AS pg
													 LEFT JOIN preh_maestro AS pm ON pg.cod_casointerh = pm.cod_casopreh
                                                 WHERE pg.cod_casointerh= '" . $codigo_caso . "';");
        return $query;
    }    
}
