<?php
date_default_timezone_set('America/Santo_Domingo');

include_once 'connection.php';

$connection = new connection();
$connect = $connection->connect();

$id_maestro = (isset($_POST['idM'])) ? $_POST['idM'] : '';
$id_patient = (isset($_POST['idP'])) ? $_POST['idP'] : '';
$id_evalC = (isset($_POST['idEC'])) ? $_POST['idEC'] : '';
$cod_ambulance = (isset($_POST['codA'])) ? $_POST['codA'] : '';
$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$field = (isset($_POST['field'])) ? $_POST['field'] : '';
$setField = (isset($_POST['setField'])) ? $_POST['setField'] : '';
$reason = (isset($_POST['reason'])) ? $_POST['reason'] : '';

switch ($option) {
    case 'selectPrehMaestro':
        $sql = "SELECT *, preh_maestro.cod_casopreh as cod_casopreh, preh_maestro.direccion as direccion_maestro, preh_maestro.telefono as telefono_maestro, preh_maestro.observacion as observacion_maestro, pacientegeneral.direccion as direccion_paciente, pacientegeneral.telefono as telefono_paciente, pacientegeneral.observacion as observacion_paciente, cie10.diagnostico as cie10_diagnostico, cie10.diagnostico_en as cie10_diagnostico_en, cie10.diagnostico_pr as cie10_diagnostico_pr, cie10.diagnostico_fr as cie10_diagnostico_fr
        FROM preh_maestro
        INNER JOIN pacientegeneral ON preh_maestro.cod_casopreh = pacientegeneral.cod_casointerh
        INNER JOIN preh_evaluacionclinica ON preh_maestro.cod_casopreh = preh_evaluacionclinica.cod_casopreh
        LEFT JOIN hospitalesgeneral ON preh_maestro.hospital_destino = hospitalesgeneral.id_hospital
        LEFT JOIN incidentes ON preh_maestro.incidente = incidentes.id_incidente
        LEFT JOIN tipo_paciente ON preh_evaluacionclinica.tipo_paciente = tipo_paciente.id_tipopaciente
        LEFT JOIN tipo_id ON pacientegeneral.tipo_doc = tipo_id.id_tipo
        LEFT JOIN tipo_edad ON pacientegeneral.cod_edad = tipo_edad.id_edad
        LEFT JOIN cie10 ON preh_evaluacionclinica.cod_diag_cie = cie10.codigo_cie
        LEFT JOIN triage ON preh_evaluacionclinica.triage = triage.id_triage
        WHERE pacientegeneral.prehospitalario = '1' AND preh_maestro.estado != 0
        ORDER BY preh_maestro.cod_casopreh";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectInterhMaestro':
        $sql = "SELECT *, interh_maestro.cod_casointerh as cod_casointerh, pacientegeneral.direccion as direccion_paciente, pacientegeneral.telefono as telefono_paciente, pacientegeneral.observacion as observacion_paciente, cie10.diagnostico as cie10_diagnostico, cie10.diagnostico_en as cie10_diagnostico_en, cie10.diagnostico_pr as cie10_diagnostico_pr, cie10.diagnostico_fr as cie10_diagnostico_fr, servicio_ambulancia.observaciones as observacion_ambulancia
            FROM interh_maestro
            INNER JOIN pacientegeneral ON interh_maestro.cod_casointerh = pacientegeneral.cod_casointerh
            INNER JOIN interh_evaluacionclinica ON interh_maestro.cod_casointerh = interh_evaluacionclinica.cod_casointerh
            LEFT JOIN interh_tiposervicio ON interh_maestro.tipo_serviciointerh = interh_tiposervicio.id_tiposervicion
            LEFT JOIN hospitalesgeneral ON interh_maestro.hospital_origneinterh = hospitalesgeneral.id_hospital
            LEFT JOIN interh_accion ON interh_maestro.accioninterh = interh_accion.id_accion
            LEFT JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.cod_casointerh
            LEFT JOIN tipo_id ON pacientegeneral.tipo_doc = tipo_id.id_tipo
            LEFT JOIN tipo_edad ON pacientegeneral.cod_edad = tipo_edad.id_edad
            LEFT JOIN tipo_paciente ON interh_evaluacionclinica.tipo_paciente = tipo_paciente.id_tipopaciente
            LEFT JOIN cie10 ON interh_evaluacionclinica.cod_diag_cie = cie10.codigo_cie
            LEFT JOIN triage ON interh_evaluacionclinica.triage = triage.id_triage
            LEFT JOIN ambulancias ON servicio_ambulancia.cod_ambulancia = ambulancias.cod_ambulancias
            WHERE pacientegeneral.prehospitalario = '0' AND interh_maestro.estadointerh!=0
            ORDER BY interh_maestro.cod_casointerh";
        $data = pg_fetch_all($connection->execute($connect, $sql));
        if ($data) {
            foreach ($data as &$valor) {
                $sql = "SELECT nombre_hospital FROM hospitalesgeneral WHERE id_hospital='" . $valor['hospital_destinointerh'] . "'";
                $res = $connection->execute($connect, $sql);
                if (is_array(pg_fetch_all($res))) {
                    $dat = pg_fetch_array($res, 0, PGSQL_NUM);
                    $valor['nombre_hospital_destino'] = $dat[0];
                } else {
                    $valor['nombre_hospital_destino'] = '';
                }
            }
        }
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    case 'selectPrehServiceAmbulance':
        $sql = "SELECT *, preh_maestro.cod_casopreh AS casopreh, preh_servicio_ambulancia.observaciones as observacion_ambulancia
        FROM preh_maestro
        INNER JOIN pacientegeneral ON preh_maestro.cod_casopreh = pacientegeneral.cod_casointerh
        INNER JOIN preh_evaluacionclinica ON preh_maestro.cod_casopreh = preh_evaluacionclinica.cod_casopreh
        LEFT JOIN preh_servicio_ambulancia ON preh_maestro.cod_casopreh = preh_servicio_ambulancia.cod_casopreh
        LEFT JOIN ambulancias ON preh_servicio_ambulancia.cod_ambulancia = ambulancias.cod_ambulancias
        WHERE preh_maestro.accion = 2 AND preh_maestro.estado != 0 AND pacientegeneral.prehospitalario = '1'
        ORDER BY preh_maestro.cod_casopreh";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectCIE10':
        $sql = "SELECT * FROM cie10 ORDER BY codigo_cie";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectCIE10DX':
        $sql = "SELECT * FROM cie10dx ORDER BY codcie10";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectHosp':
        $sql = "SELECT * FROM hospitalesgeneral ORDER BY id_hospital";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectCierre':
        $sql = "SELECT * FROM tipo_cierrecaso ORDER BY id_tranlado_fallido";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectSeguimPreh':
        $sql = "SELECT * FROM preh_seguimiento WHERE cod_casopreh=" . $id_maestro;
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectAmbulance':
        $sql = "SELECT * FROM ambulancias WHERE estado=0 ORDER BY id_ambulancias";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'loadSelect':
        $sql = "SELECT * FROM tipo_id";
        $data['ide'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM tipo_edad";
        $data['age'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM triage ORDER BY id_triage";
        $data['triage'] = pg_fetch_all($connection->execute($connect, $sql));

        $sql = "SELECT * FROM tipo_paciente ORDER BY id_tipopaciente";
        $data['type'] = pg_fetch_all($connection->execute($connect, $sql));

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    case 'insertPrehSA':
    case 'insertInterhSA':
        $option == 'insertPrehSA' ? $sql = "INSERT INTO preh_servicio_ambulancia (cod_casopreh, cod_ambulancia) VALUES (" . $id_maestro . ", '" . $setField . "');" : $sql = "INSERT INTO servicio_ambulancia (cod_casointerh, cod_ambulancia) VALUES (" . $id_maestro . ", '" . $setField . "');";
        $result = $connection->execute($connect, $sql);

        $sql = "UPDATE ambulancias SET estado=1 WHERE cod_ambulancias='" . $setField . "'";
        $result = $connection->execute($connect, $sql);

        echo $result;
        break;
    case 'updatePrehM':
        $sql = "UPDATE preh_maestro SET " . $field . "='" . $setField . "' WHERE cod_casopreh=" . $id_maestro;
        $res = $connection->execute($connect, $sql);
        if ($field === 'accion') {
            $sql = "INSERT INTO preh_servicio_ambulancia (cod_casopreh) values ($id_maestro)";
            $res = $connection->execute($connect, $sql);
        }
        echo $res;
        break;
    case 'updateInterhM':
        $sql = "UPDATE interh_maestro SET " . $field . "='" . $setField . "' WHERE cod_casointerh=" . $id_maestro;
        echo $connection->execute($connect, $sql);
        break;
    case 'updateP':
        $sql = "UPDATE pacientegeneral SET " . $field . "='" . $setField . "' WHERE id_paciente=" . $id_patient;
        echo $connection->execute($connect, $sql);
        break;
    case 'updatePatient':
        $user = json_decode($_POST['user']);
        $sql = "UPDATE pacientegeneral SET
                nombre1='$user->name1',
                nombre2='$user->name2',
                apellido1='$user->lastname1',
                apellido2='$user->lastname2',
                genero='$user->gender',
                nacionalidad='$user->nationality',
                fecha_nacido='$user->date',
                edad='$user->age',
                cod_edad='$user->typeage',
                edad='$user->age',
                cod_edad=$user->typeage
            WHERE id_paciente=$id_patient";
        echo $connection->execute($connect, $sql);
        break;
    case 'updatePrehEC':
        $sql = "UPDATE preh_evaluacionclinica SET $field='$setField' WHERE id_evaluacionclinica=$id_evalC";
        echo $connection->execute($connect, $sql);
        break;
    case 'updateInterhEC':
        $sql = "UPDATE interh_evaluacionclinica SET $field='$setField' WHERE id_evaluacionclinica=$id_evalC";
        echo $connection->execute($connect, $sql);
        break;
    case 'updatePrehSeguim':
    case 'updateInterhSeguim':
        $option == 'updatePrehSeguim' ? $sql = "SELECT id_seguimiento FROM preh_seguimiento WHERE cod_casopreh=" . $id_maestro : $sql = "SELECT id_seguimiento FROM interh_seguimiento WHERE cod_casointerh=" . $id_maestro;
        $data = pg_fetch_all($connection->execute($connect, $sql));
        if ($option == 'updatePrehSeguim') {
            !$data ? $sql = "INSERT INTO preh_seguimiento (cod_casopreh, seguimento, fecha_seguimento) VALUES (" . $id_maestro . ", '" . $setField . "', '" . date("Y-m-d H:i:s") . "');" : $sql = "UPDATE preh_seguimiento SET " . $field . "='" . $setField . "' WHERE cod_casopreh=" . $id_maestro;
        } else {
            !$data ? $sql = "INSERT INTO interh_seguimiento (cod_casointerh, seguimento, fecha_seguimento) VALUES (" . $id_maestro . ", '" . $setField . "', '" . date("Y-m-d H:i:s") . "');" : $sql = "UPDATE interh_seguimiento SET " . $field . "='" . $setField . "' WHERE cod_casointerh=" . $id_maestro;
        }
        echo $connection->execute($connect, $sql);
        break;
    case 'updatePrehSA':
    case 'updateInterhSA':
        $option == 'updatePrehSA' ? $sql = "UPDATE preh_servicio_ambulancia SET " . $field . "='" . $setField . "' WHERE cod_casopreh=" . $id_maestro : $sql = "UPDATE servicio_ambulancia SET " . $field . "='" . $setField . "' WHERE cod_casointerh=" . $id_maestro;
        $result = $connection->execute($connect, $sql);
        if ($field == "cod_ambulancia") {
            $sql = "UPDATE ambulancias SET estado=0 WHERE cod_ambulancias='" . $cod_ambulance . "'";
            $result = $connection->execute($connect, $sql);

            $sql = "UPDATE ambulancias SET estado=1 WHERE cod_ambulancias='" . $setField . "'";
            $result = $connection->execute($connect, $sql);
        }
        echo $result;
        break;
    case 'cerrarPrehCaso':
        $sql = "UPDATE preh_maestro SET estado=0, cierre=" . $setField . " WHERE cod_casopreh=" . $id_maestro;
        $connection->execute($connect, $sql);
        $sql = "INSERT INTO preh_cierre (nombrecierre, cod_casopreh, nota) VALUES (" . $setField . ", " . $id_maestro . ", '" . $reason . "')";
        echo $connection->execute($connect, $sql);
        break;
    case 'cerrarInterhCaso':
        $sql = "UPDATE interh_maestro SET estadointerh=0, cierreinterh=" . $setField . " WHERE cod_casointerh=" . $id_maestro;
        $connection->execute($connect, $sql);
        $sql = "INSERT INTO interh_cierre (nombrecierre, cod_casointerh, nota) VALUES (" . $setField . ", " . $id_maestro . ", '" . $reason . "')";
        echo $connection->execute($connect, $sql);
        break;
}

$connection = null;
