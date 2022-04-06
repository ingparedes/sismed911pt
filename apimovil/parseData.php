<?php

include_once 'gdata.php';

class SismedApi
{    
    function getAmbulancias()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getAmbulancias();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Ambulancias'));
        }
    }
    function getCasosAsignados()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getCasosAsignados();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Casos Asignados'));
        }
    }
    function getUsuarios()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getUsuarios();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Usuarios'));
        }
    }
    function getAseguradoras()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getAseguradoras();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Aseguradoras'));
        }
    }
    function getInsumos()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getInsumos();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Insumos'));
        }
    }
    function getMedicamentos()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getMedicamentos();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Medicamentos'));
        }
    }
    function getDiagnosticos()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getDiagnosticos();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Diagnosticos'));
        }
    }
    function getExploFisica()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getExploFisica();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Elementos para Exploración Fisica'));
        }
    }
    function getProcedimientos()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getProcedimientos();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Procedimientos'));
        }
    }
    function getDepartamento()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getDepartamento();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Departamentos'));
        }
    }
    function getProvincia()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getProvincia();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Provincias'));
        }
    }
    function getDistrito($Departamento, $Provincia)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getDistrito();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Distritos'));
        }
    }
    function getDNI()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getTipoDNI();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay DNI'));
        }
    }
    function getGenero()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getGenero();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Genero'));
        }
    }
    function getTrauma()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getTraumas();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Traumas'));
        }
    }
    function getExploGen()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getExploGen();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Elementos para Exploración General'));
        }
    }
    function getTriage()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getTriage();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Triage'));
        }
    }
    function getCierres()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getCierres();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Cierres'));
        }
    }
    function getHospitales()
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getHospitales();

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Hospital'));
        }
    }
    function getCasosCerrados($lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getCasosCerrados($lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Casos Cerrados'));
        }
    }
    function getCasoPDF($id_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getCasosPDF($id_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No existe hay registros de ese caso'));
        }
    }
    function getCasoTrauma($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getTraumasCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Traumas Relacionados con el Caso'));
        }
    }
    function getCasoExpG($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getExpGCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Exploración General Relacionada con el Caso'));
        }
    }
    function getCasoExpF($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getExpFCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Exploración Fisica Relacionada con el Caso'));
        }
    }
    function getCasoMedicamento($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getMedicamentoCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Medicamentos Relacionados con el Caso'));
        }
    }
    function getCasoInsumo($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getInsumoCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Insumos Relacionados con el Caso'));
        }
    }
    function getCasoProcedimiento($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getProcCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Procedimientos Relacionados con el Caso'));
        }
    }
    function getCasoDiagnostico($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getDiagnosticoCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Diagnosticos Relacionados con el Caso'));
        }
    }
    function getCasoObstetrico($cod_caso,$lang)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getObstCaso($cod_caso,$lang);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Obstetrico Relacionado con el Caso'));
        }
    }
    function getMedicaso($cod_caso)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new getData();
        $res = $datos->getMedicaso($cod_caso);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }

            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'No hay Obstetrico Relacionado con el Caso'));
        }
    }
}
