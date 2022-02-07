<?php
include_once 'connection.php';

$connection = new connection();
$connect = $connection->connect();

$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$reason = (isset($_POST['reason'])) ? $_POST['reason'] : '';
$field = (isset($_POST['field'])) ? $_POST['field'] : '';
$setField = (isset($_POST['setField'])) ? $_POST['setField'] : '';
$id_patient = (isset($_POST['idP'])) ? $_POST['idP'] : '';
$patient = (isset($_POST['patient'])) ? $_POST['patient'] : '';
$id_ingress = (isset($_POST['ingress'])) ? $_POST['ingress'] : '';
$companion = (isset($_POST['companion'])) ? $_POST['companion'] : null;
$phone_companion = (isset($_POST['phone_companion'])) ? $_POST['phone_companion'] : null;
$cod911 = (isset($_POST['cod911'])) ? $_POST['cod911'] : null;
$dataAdmission = (isset($_POST['data'])) ? $_POST['data'] : null;
$id_medicalAttention = (isset($_POST['idMA'])) ? $_POST['idMA'] : null;
$dataExamen = (isset($_POST['dataExamen'])) ? $_POST['dataExamen'] : null;
$id_medicalAttentionExamen = (isset($_POST['idMAE'])) ? $_POST['idMAE'] : null;
$id_medicalAttentionMedical = (isset($_POST['idMAM'])) ? $_POST['idMAM'] : null;
$dosis = (isset($_POST['dosis'])) ? $_POST['dosis'] : null;
$id_hospital = (isset($_POST['idH'])) ? $_POST['idH'] : null;
$id_casePreh = (isset($_POST['id_casePreh'])) ? $_POST['id_casePreh'] : null;

switch ($option) {
    case 'selectPatient':
        $sql = "SELECT *, pacientegeneral.direccion as direccion_paciente, pacientegeneral.telefono as telefono_paciente, pacientegeneral.observacion as observacion_paciente
                FROM pacientegeneral
                INNER JOIN preh_maestro ON pacientegeneral.cod_casointerh=preh_maestro.cod_casopreh
                LEFT JOIN tipo_id ON pacientegeneral.tipo_doc = tipo_id.id_tipo
                LEFT JOIN tipo_edad ON pacientegeneral.cod_edad = tipo_edad.id_edad
                WHERE preh_maestro.hospital_destino='" . $id_hospital . "'";
        $data = pg_fetch_all($connection->execute($connect, $sql));
        if (!$data) $data = [];
        $sql = "SELECT * FROM pacientegeneral
                INNER JOIN interh_maestro ON pacientegeneral.cod_casointerh=interh_maestro.cod_casointerh
                LEFT JOIN tipo_id ON pacientegeneral.tipo_doc = tipo_id.id_tipo
                LEFT JOIN tipo_edad ON pacientegeneral.cod_edad = tipo_edad.id_edad
                WHERE interh_maestro.hospital_destinointerh='" . $id_hospital . "'";
        $interH = pg_fetch_all($connection->execute($connect, $sql));
        if ($interH)
            foreach ($interH as $valor) {
                array_push($data, $valor);
            }
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    case 'selectIngress':
        $sql = "SELECT * FROM tipo_ingreso";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectIDE':
        $sql = "SELECT * FROM tipo_id ORDER BY id_tipo";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectTypeAge':
        $sql = "SELECT * FROM tipo_edad ORDER BY id_edad";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectAdmission':
        $sql = "SELECT *,sala_admission.id_admision FROM sala_admission
                INNER JOIN pacientegeneral ON sala_admission.id_paciente=pacientegeneral.id_paciente
                INNER JOIN tipo_ingreso ON sala_admission.id_ingreso=tipo_ingreso.id_ingreso
                LEFT JOIN sala_signos ON sala_admission.id_signos=sala_signos.id_signos
                LEFT JOIN sala_atencionmedica ON sala_admission.id_admision=sala_atencionmedica.id_admision
                WHERE sala_atencionmedica.id_estadoalta IS NULL
                ORDER BY sala_admission.id_admision";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectSignal':
        $sql = "SELECT * FROM sala_signos WHERE tipo_urgencias='" . $reason . "'";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectUrgency':
    case 'selectEmergency':
        $sql = "SELECT * FROM sala_admission
                INNER JOIN pacientegeneral ON sala_admission.id_paciente=pacientegeneral.id_paciente
                INNER JOIN sala_motivoatencion ON sala_admission.id_motivoatencion=sala_motivoatencion.id_motivoatencion
                LEFT JOIN sala_atencionmedica ON sala_admission.id_admision=sala_atencionmedica.id_admision
                LEFT JOIN cuerpo_general ON sala_atencionmedica.id_general=cuerpo_general.id_general
                LEFT JOIN cuerpo_cabeza ON sala_atencionmedica.id_cabeza=cuerpo_cabeza.id_cabeza
                LEFT JOIN cuerpo_ojo ON sala_atencionmedica.id_ojo=cuerpo_ojo.id_ojo
                LEFT JOIN cuerpo_otorrino ON sala_atencionmedica.id_otorrino=cuerpo_otorrino.id_otorrino
                LEFT JOIN cuerpo_boca ON sala_atencionmedica.id_boca=cuerpo_boca.id_boca
                LEFT JOIN cuerpo_cuello ON sala_atencionmedica.id_cuello=cuerpo_cuello.id_cuello
                LEFT JOIN cuerpo_torax ON sala_atencionmedica.id_torax=cuerpo_torax.id_torax
                LEFT JOIN cuerpo_corazon ON sala_atencionmedica.id_corazon=cuerpo_corazon.id_corazon
                LEFT JOIN cuerpo_pulmon ON sala_atencionmedica.id_pulmon=cuerpo_pulmon.id_pulmon
                LEFT JOIN cuerpo_abdomen ON sala_atencionmedica.id_abdomen=cuerpo_abdomen.id_abdomen
                LEFT JOIN cuerpo_pelvis ON sala_atencionmedica.id_pelvis=cuerpo_pelvis.id_pelvis
                LEFT JOIN cuerpo_rectal ON sala_atencionmedica.id_rectal=cuerpo_rectal.id_rectal
                LEFT JOIN cuerpo_genital ON sala_atencionmedica.id_genital=cuerpo_genital.id_genital
                LEFT JOIN cuerpo_extremidad ON sala_atencionmedica.id_extremidad=cuerpo_extremidad.id_extremidad
                LEFT JOIN cuerpo_neuro ON sala_atencionmedica.id_neuro=cuerpo_neuro.id_neuro
                LEFT JOIN cuerpo_piel ON sala_atencionmedica.id_piel=cuerpo_piel.id_piel
                LEFT JOIN cie10 ON sala_atencionmedica.cod_cie10=cie10.codigo_cie
                LEFT JOIN tipo_edad ON pacientegeneral.cod_edad=tipo_edad.id_edad";
        $sql .= $option == 'selectUrgency'
            ? " WHERE sala_atencionmedica.id_estadoalta IS NULL AND (sala_admission.clasificacion_admision='Verde' OR sala_admission.clasificacion_admision='Azul')"
            : " WHERE sala_atencionmedica.id_estadoalta IS NULL AND (sala_admission.clasificacion_admision='Rojo' OR sala_admission.clasificacion_admision='Naranja' OR sala_admission.clasificacion_admision='Amarillo')";
        $sql .= " ORDER BY sala_admission.clasificacion_admision DESC";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectCIE10':
        $sql = "SELECT * FROM cie10 ORDER BY codigo_cie";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectMedical':
        $sql = "SELECT * FROM sala_medicamentos ORDER BY producto";
        $data = pg_fetch_all($connection->execute($connect, $sql));
        $medical = $data;
        if ($id_medicalAttention) {
            $medical = [];
            $sql = "SELECT sala_medicamentos.id_medicamento, sala_medicamentos.producto, sala_medicamentos.costo
                    FROM sala_atencionmedica_medicamentos
                    INNER JOIN sala_medicamentos ON sala_atencionmedica_medicamentos.id_medicamentos=sala_medicamentos.id_medicamento
                    WHERE sala_atencionmedica_medicamentos.id_atencionmedica=" . $id_medicalAttention;
            $id = pg_fetch_all($connection->execute($connect, $sql));
            foreach ($data as $valor) {
                if ($id) {
                    if (!in_array($valor, $id)) array_push($medical, $valor);
                } else {
                    array_push($medical, $valor);
                }
            }
        }
        print json_encode($medical, JSON_UNESCAPED_UNICODE);
        break;
    case 'selectExamen':
        $sql = "SELECT * FROM sala_examen ORDER BY nombre_examen";
        $data = pg_fetch_all($connection->execute($connect, $sql));
        $examen = $data;
        if ($id_medicalAttention) {
            $examen = [];
            $sql = "SELECT sala_examen.id_examen, sala_examen.nombre_examen FROM sala_atencionmedica_examen
                        INNER JOIN sala_examen ON sala_atencionmedica_examen.id_examen=sala_examen.id_examen
                        WHERE sala_atencionmedica_examen.id_atencionmedica=" . $id_medicalAttention;
            $id = pg_fetch_all($connection->execute($connect, $sql));
            foreach ($data as $valor) {
                if ($id) {
                    if (!in_array($valor, $id)) array_push($examen, $valor);
                } else {
                    array_push($examen, $valor);
                }
            }
        }
        print json_encode($examen, JSON_UNESCAPED_UNICODE);
        break;
    case 'selectAttentionExamen':
        $sql = "SELECT sala_atencionmedica_examen.id_atencionmedica_examen, sala_examen.id_examen, sala_examen.nombre_examen FROM sala_atencionmedica
                INNER JOIN sala_atencionmedica_examen ON sala_atencionmedica.id_atencionmedica=sala_atencionmedica_examen.id_atencionmedica
                INNER JOIN sala_examen ON sala_atencionmedica_examen.id_examen=sala_examen.id_examen
                WHERE sala_atencionmedica.id_atencionmedica=" . $id_medicalAttention . " ORDER BY sala_examen.nombre_examen";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectAttentionMedical':
        $sql = "SELECT * FROM sala_atencionmedica
                INNER JOIN sala_atencionmedica_medicamentos ON sala_atencionmedica.id_atencionmedica=sala_atencionmedica_medicamentos.id_atencionmedica
                INNER JOIN sala_medicamentos ON sala_atencionmedica_medicamentos.id_medicamentos=sala_medicamentos.id_medicamento
                WHERE sala_atencionmedica.id_atencionmedica=" . $id_medicalAttention;
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'loadSelectAdmission':
        $sql = "SELECT * FROM sala_motivoatencion";
        $data['attention'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM sala_localizaciontrauma";
        $data['locationTrauma'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM sala_causatrauma";
        $data['causeTrauma'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM sala_sistema";
        $data['system'] = pg_fetch_all($connection->execute($connect, $sql));;
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    case 'loadSelectMedicalAttention':
        $sql = "SELECT nombre_hospital FROM hospitalesgeneral WHERE id_hospital='" . $id_hospital . "'";
        $data['name_hospital'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_general";
        $data['general'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_cabeza";
        $data['cabeza'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_ojo";
        $data['ojo'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_otorrino";
        $data['otorrino'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_boca";
        $data['boca'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_cuello";
        $data['cuello'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_torax";
        $data['torax'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_corazon";
        $data['corazon'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_pulmon";
        $data['pulmon'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_abdomen";
        $data['abdomen'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_pelvis";
        $data['pelvis'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_rectal";
        $data['rectal'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_genital";
        $data['genital'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_extremidad";
        $data['extremidad'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_neuro";
        $data['neuro'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM cuerpo_piel";
        $data['piel'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM sala_estadoalta";
        $data['disposal'] = pg_fetch_all($connection->execute($connect, $sql));

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    case 'insertAdmission':
        $sql = "INSERT INTO sala_admission
                    (id_ingreso,id_paciente," . ($companion ? 'acompañante,' : '') . ($phone_companion ? 'telefono_acompañante,' : '') . ($cod911 ? 'cod911,' : '') . "fecha_admision)
                VALUES
                    ($id_ingress,$id_patient," . ($companion ? "'$companion'," : '') . ($phone_companion ? "'$phone_companion'," : '') . ($cod911 ? "$cod911," : '') . "'" . date('d-m-Y H:i:s') . "')";
        echo $connection->execute($connect, $sql);
        break;
    case 'insertPatient':
        $sql = "INSERT INTO pacientegeneral (cod_casointerh, expendiente, num_doc, tipo_doc, nombre1, nombre2, apellido1, apellido2, genero, edad, fecha_nacido, cod_edad, telefono, direccion, aseguradro, observacion)
                VALUES (0, '" . $patient['expendiente'] . "', '" . $patient['num_doc'] . "', '" . $patient['tipo_doc'] . "', '" . $patient['nombre1'] . "', '" . $patient['nombre2'] . "', '" . $patient['apellido1'] . "', '" . $patient['apellido2'] . "', '" . $patient['genero'] . "', '" . $patient['edad'] . "', '" . $patient['fecha_nacido'] . "', '" . $patient['cod_edad'] . "', '" . $patient['telefono'] . "', '" . $patient['direccion'] . "', '" . $patient['aseguradro'] . "', '" . $patient['observacion'] . "')
                RETURNING id_paciente";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'insertExamen':
        $data = [];
        foreach ($dataExamen as &$valor) {
            $sql = "INSERT INTO sala_atencionmedica_examen (id_atencionmedica, id_examen)
                    VALUES (" . $id_medicalAttention . "," . $valor . ")
                    RETURNING id_atencionmedica_examen";
            array_push($data, pg_fetch_all($connection->execute($connect, $sql))[0]);
        }
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    case 'insertMedical':
        $sql = "INSERT INTO sala_atencionmedica_medicamentos (id_atencionmedica, id_medicamentos, dosis)
                VALUES (" . $id_medicalAttention . "," . $id_medicalAttentionMedical . "," . $dosis . ")
                RETURNING id_atencionmedica_medicamentos";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'updateP':
        $sql = "UPDATE pacientegeneral SET " . $field . "='" . $setField . "' WHERE id_paciente=" . $id_patient;
        echo $connection->execute($connect, $sql);
        break;
    case 'updateAdmission':
        $sql = "UPDATE sala_admission SET id_motivoatencion=" . $dataAdmission['id_attention']
            . ",id_localizaciontrauma=" . $dataAdmission['id_locationTrauma']
            . ",id_causatrauma=" . $dataAdmission['id_causeTrauma']
            . ",id_sistema=" . $dataAdmission['id_system']
            . ",glasgow_admision=" . $dataAdmission['glasgow']
            . ",pas_admision=" . $dataAdmission['pas']
            . ",pad_admision=" . $dataAdmission['pad']
            . ",fc_admision=" . $dataAdmission['fc']
            . ",so2_admision=" . $dataAdmission['so2']
            . ",fr_admision=" . $dataAdmission['fr']
            . ",temp_admision=" . $dataAdmission['temp']
            . ",clasificacion_admision=" . $dataAdmission['classification']
            . ",dolor=" . $dataAdmission['dolor']
            . ",id_signos=" . $dataAdmission['id_signal']
            . ",motivo_consulta=" . $dataAdmission['motivation']
            . ",signos_sintomas=" . $dataAdmission['signalDescription']
            . ",fecha_clasificacion='" . date('d-m-Y H:i:s') . "'"
            . " WHERE id_admision=" . $dataAdmission['id_admission'];
        $result = $connection->execute($connect, $sql);
        if (!$dataAdmission['old_classification']) {
            $sql = "INSERT INTO sala_atencionmedica (id_admision) VALUES (" . $dataAdmission['id_admission'] . ")";
            $result = $connection->execute($connect, $sql);
        }
        echo $result;
        break;
    case 'updateMedicalAttention':
        $sql = "UPDATE sala_atencionmedica SET " . $field . "='" . $setField . "' WHERE id_atencionmedica=" . $id_medicalAttention;
        echo $connection->execute($connect, $sql);
        break;
    case 'deleteAttentionExamen':
        $sql = "DELETE FROM sala_atencionmedica_examen WHERE id_atencionmedica_examen=" . $id_medicalAttentionExamen;
        echo $connection->execute($connect, $sql);
        break;
    case 'deleteAttentionMedical':
        $sql = "DELETE FROM sala_atencionmedica_medicamentos WHERE id_atencionmedica_medicamentos=" . $id_medicalAttentionMedical;
        echo $connection->execute($connect, $sql);
        break;
    case 'printInformation':
        $sql = "SELECT
                    phm.cod_alfa AS cod_alfa,
                    phm.cod_casopreh AS Caso,
                    phm.fecha AS Fecha,
                    phm.hospital_destino AS Hospital_Id,
                    hg.nombre_hospital AS Hospital_Nombre,
                    pha.cod_ambulancia AS Ambulancia,
                    amb.id_ambulancias AS id_Ambulancia,
                    CONCAT ( pg.nombre1, ' ', pg.nombre2, ' ', pg.apellido1, ' ', pg.apellido2 ) AS Paciente,
                    pg.num_doc AS Paciente_DNI,
                    td.descripcion AS Paciente_DNI_tipo,
                    tg.nombre_genero AS Genero,
                    REPLACE ( pg.fecha_nacido, '/', '-' ) AS Fecha_Nacimiento,
                    pg.edad AS Edad,
                    te.nombre_edad AS Edad_Tipo,
                    pg.telefono AS Paciente_Telefono,
                    pg.celular AS Paciente_Celular,
                    pg.direccion AS Paciente_Direccion,
                    SUBSTRING ( CAST ( pha.hora_asigna AS VARCHAR ( 20 ) ), 0, 17 ) AS Hora_Asignacion,
                    SUBSTRING ( CAST ( pha.hora_llegada AS VARCHAR ( 20 ) ), 0, 17 ) AS Hora_Evento,
                    SUBSTRING ( CAST ( pha.hora_preposicion AS VARCHAR ( 20 ) ), 0, 17 ) AS hora_base,
                    SUBSTRING ( CAST ( pha.hora_inicio AS VARCHAR ( 20 ) ), 0, 17 ) AS Hora_Inicio,
                    SUBSTRING ( CAST ( pha.hora_destino AS VARCHAR ( 20 ) ), 0, 17 ) AS Hora_Hospital,
                    c_e.nom_causa AS Causa,
                    SUBSTRING ( CAST ( phec.fecha_horaevaluacion AS VARCHAR ( 20 ) ), 0, 17 ) AS Hora_Evaluacion,
                    phec.sv_fr AS Frecuencia_Respiratoria,
                    phec.sv_tx AS Presion_Arterial,
                    phec.sv_fc AS Frecuencia_Cardiaca,
                    phec.sv_sato2 AS Saturacion_o2,
                    phec.sv_temp AS Temperatura,
                    phec.sv_gl AS Glasgow,
                    phec.ap_diabetes AS a_Diabetes,
                    phec.ap_cardiop AS a_Cardiopatia,
                    phec.ap_convul AS a_Convul,
                    phec.ap_asma AS a_Asma,
                    phec.ap_acv AS a_Acv,
                    phec.ap_has AS a_Has,
                    phec.ap_alergia AS a_Alergia,
                    phec.ap_med_paciente AS a_Medicamentos,
                    phec.ap_otros AS a_Otros,
                    tt.nombre_triage_es AS Triage,
                    phm.observacion AS Observaciones,
                    phm.descripcion AS Descrip_pertenencias,
                    phm.nombre_confirma AS Nombre_p_recibe,
                    phm.telefono_confirma AS Telefono_p_recibe,
                    phm.nombre_medico AS Medico_recibe,
                    pha.k_final AS Km_final,
                    pha.k_inical AS Km_inicial,
                    tcc.tipo_cierrecaso_es AS cierre,
                    fr.posx AS pos_firma_x,
                    fr.posy AS pos_firma_y,
                    fr.ancho AS ancho_firma,
                    phm.prioridad,
                    phm.direccion AS direcevento,
                    inc.nombre_es AS incidente,
                    pha.medico AS atmedico,
                    pha.paramedico AS atenfermero,
                    pha.cuando_murio AS fallecidoen
                FROM
                    preh_maestro AS phm
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
                    LEFT JOIN triage AS tt ON CAST ( phec.triage AS SMALLINT ) = tt.id_triage
                    LEFT JOIN tipo_edad AS te ON pg.cod_edad = te.id_edad
                    LEFT JOIN hospitalesgeneral AS hg ON phm.hospital_destino = hg.id_hospital
                    LEFT JOIN causa_externa AS c_e ON c_r.id_causa = c_e.id_causa
                WHERE
                    phm.cod_casopreh = $id_casePreh AND phm.cierre <> '0';";
        $data['data'] = pg_fetch_all($connection->execute($connect, $sql))[0];

        $sql = "SELECT
                    egc.descripcion AS explo_general_cat_desc,
                    ega.descripcion AS explo_general_afec_desc
                FROM
                    explo_general_registro AS egr
                    LEFT JOIN explo_general_afeccion AS ega ON ega.id = egr.explo_general_afeccion
                    LEFT JOIN explo_general_cat AS egc ON egc.id = ega.explo_general_cat
                WHERE egr.cod_casopreh = $id_casePreh";
        $data['general'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT 
                    pt.nombre_procedimeto AS procedimiento
                FROM procedimiento_registro AS pr
                    LEFT JOIN procedimiento_tipos AS pt ON pt.id = pr.procedimiento_tipo_id
                WHERE pr.cod_casopreh = $id_casePreh";
        $data['process'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT
                    ef.nombre AS physical_name,
                    efr.pos AS physical_pos,
                    efr.posx AS physical_posx,
                    efr.posy AS physical_posy
                FROM explo_fisica_registro AS efr
                    LEFT JOIN explo_fisica AS ef ON ef.id = efr.id_trauma_fisico
                WHERE efr.cod_casopreh = $id_casePreh ORDER BY efr.pos ASC";
        $data['physical'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT cod_diag_cie, '1' AS existe FROM preh_evaluacionclinica WHERE cod_casopreh = $id_casePreh";
        $query = $connection->execute($connect, $sql);
        if (pg_num_rows($query)) {
            while ($row = pg_fetch_assoc($query)) {
                $codigo_diag = $row['cod_diag_cie'];
                $codigo_diag = str_replace(", ", "','", $codigo_diag);
                $codigo_diag = "'" . $codigo_diag . "'";
            }
        }
        $sql = "SELECT codigo_cie, diagnostico FROM cie10 WHERE codigo_cie IN ($codigo_diag)";
        $data['cie'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT
                    med.nombre_medicamento, mr.cantidad AS cant_medical
                FROM medicamentos_registros AS mr
                    LEFT JOIN medicamentos AS med ON med.id_medicamento = mr.medicamentos_id
                WHERE mr.cod_casopreh = $id_casePreh";
        $data['medical'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT
                    ins.nombre_insumo, inr.cantidad AS cant_insumo
                FROM insumos_registros AS inr
                    LEFT JOIN insumos AS ins ON ins.id_insumo = inr.insumos_id
                WHERE inr.cod_casopreh = $id_casePreh";
        $data['supplies'] = pg_fetch_all($connection->execute($connect, $sql));

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
}

$connection = null;
