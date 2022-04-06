<?php
include_once 'responseData.php';

$api = new SismedApi();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    if ($data['Token'] === 'MAgJKq3LaKxL3pae') {
        switch ($data['Servicio']) {
            case 'setTurno':
                $api->setTurno($data['JsonParam']);
                break;
            case 'setPaciente':
                $api->setPaciente($data['JsonParam']);
                break;
            case 'setCausa':
                $api->setCausa($data['JsonParam']);
                break;
            case 'setTrauma':
                $api->setTrauma($data['JsonParam']);
                break;
            case 'delTrauma':
                $api->delTrauma($data['JsonParam']);
                break;
            case 'setObstetrico':
                $api->setObstetrico($data['JsonParam']);
                break;
            case 'setExpGeneral':
                $api->setExpGeneral($data['JsonParam']);
                break;
            case 'delExpGeneral':
                $api->delExpGeneral($data['JsonParam']);
                break;
            case 'setDiagnostico':
                $api->setDiagnostico($data['JsonParam']);
                break;
            case 'setProc':
                $api->setProc($data['JsonParam']);
                break;
            case 'delProc':
                $api->delProc($data['JsonParam']);
                break;
            case 'setMedicamentos':
                $api->setMedicamentos($data['JsonParam']);
                break;
            case 'delMedicamentos':
                $api->delMedicamentos($data['JsonParam']);
                break;
            case 'setInsumo':
                $api->setInsumo($data['JsonParam']);
                break;
            case 'delInsumo':
                $api->delInsumo($data['JsonParam']);
                break;
            case 'setOthers':
                $api->setOthers($data['JsonParam']);
                break;
            case 'setFirma':
                $api->setFirma($data['JsonParam']);
                break;
            case 'setTraumaFisico':
                $api->setTraumaFisico($data['JsonParam']);
                break;
            case 'delTraumaFisico':
                $api->delTraumaFisico($data['JsonParam']);
                break;
            case 'setHoraI':
                $api->setHoraI($data['JsonParam']);
                break;
            case 'setHoraE':
                $api->setHoraE($data['JsonParam']);
                break;
            case 'setHoraH':
                $api->setHoraH($data['JsonParam']);
                break;
            case 'setHoraB':
                $api->setHoraB($data['JsonParam']);
                break;
            case 'SynchLocal':
                $api->SynchLocal($data['JsonParam']);
                break;
            default:
                # code...
                break;
        }
    }
}
