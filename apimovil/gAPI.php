<?php
include_once 'parseData.php';
$api = new SismedApi();
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    if ($data['Token'] === 'MAgJKq3LaKxL3pae') {
        switch ($data['Servicio']) {
            case 'Ambulancias':
                $api->getAmbulancias();
                break;
            case 'Casos Asignados':
                $api->getCasosAsignados($data['Cod_Ambu']);
                break;
            case 'Usuarios':
                $api->getUsuarios();
                break;
            case 'Aseguradoras':
                $api->getAseguradoras();
                break;
            case 'Insumos':
                $api->getInsumos();
                break;
            case 'Medicamentos':
                $api->getMedicamentos();
                break;
            case 'Explo Fisica':
                $api->getExploFisica();
                break;
            case 'Diagnosticos':
                $api->getDiagnosticos();
                break;
            case 'Procedimientos':
                $api->getProcedimientos();
                break;
            case 'Departamento':
                $api->getDepartamento();
                break;
            case 'Provincia':
                $api->getProvincia($data['Departamento']);
                break;
            case 'Distrito':
                $api->getDistrito($data['Departamento'], $data['Provincia']);
                break;
            case 'DNI':
                $api->getDNI();
                break;
            case 'Genero':
                $api->getGenero();
                break;
            case 'Trauma':
                $api->getTrauma($data['Categoria']);
                break;
            case 'Explo Gen':
                $api->getExploGen($data['Categoria']);
                break;
            case 'Triage':
                $api->getTriage();
                break;
            case 'Cierre Caso':
                $api->getCierres();
                break;
            case 'Hospitales':
                $api->getHospitales();
                break;
            case 'Casos Cerrados':
                $api->getCasosCerrados($data['Lang']);
                break;
            case 'Caso PDF':
                $api->getCasoPDF($data['Caso'],$data['Lang']);
                break;
            case 'Caso Trauma':
                $api->getCasoTrauma($data['Caso'],$data['Lang']);
                break;
            case 'Caso ExpG':
                $api->getCasoExpG($data['Caso'],$data['Lang']);
                break;
            case 'Caso ExpF':
                $api->getCasoExpF($data['Caso'],$data['Lang']);
                break;
            case 'Caso Medicamentos':
                $api->getCasoMedicamento($data['Caso'],$data['Lang']);
                break;
            case 'Caso Insumos':
                $api->getCasoInsumo($data['Caso'],$data['Lang']);
                break;
            case 'Caso Procedimientos':
                $api->getCasoProcedimiento($data['Caso'],$data['Lang']);
                break;
            case 'Caso Diagnosticos':
                $api->getCasoDiagnostico($data['Caso'],$data['Lang']);
                break;
            case 'Caso Obstetrico':
                $api->getCasoObstetrico($data['Caso'],$data['Lang']);
                break;
            case 'Medicaso':
                $api->getMedicaso($data['Caso']);
                break;
            default:
                # code...
                break;
        }
    }
}
