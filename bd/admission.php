<?php
include_once 'connection.php';

$connection = new connection();
$connect = $connection->connect();

date_default_timezone_set('America/Asuncion');

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

switch ($option) {
    case 'selectPatient':
        $sql = "SELECT * FROM pacientegeneral
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
        $sql = "INSERT INTO sala_admission (id_ingreso, id_paciente, acompañante, telefono_acompañante, fecha_admision, cod911)
                VALUES (" . $id_ingress . ", " . $id_patient . ", " . $companion . ", " . $phone_companion . ", '" . date('d-m-Y H:i:s') . "'," . $cod911 . ")";
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
}

$connection = null;
