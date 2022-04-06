<?php

include_once 'sdata.php';

class SismedApi
{
    function setTurno($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setTurno($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setPaciente($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setPaciente($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setCausa($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setCausa($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setTrauma($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setTrauma($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function delTrauma($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->delTrauma($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setObstetrico($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setObstetrico($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setExpGeneral($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setExpG($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function delExpGeneral($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->delExpG($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setDiagnostico($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setDiagnostico($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setProc($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setProc($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function delProc($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->delProc($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setMedicamentos($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setMedicamentos($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function delMedicamentos($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->delMedicamentos($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setInsumo($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setInsumo($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function delInsumo($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->delInsumo($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setOthers($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setOthers($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setFirma($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setFirma($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setTraumaFisico($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setTraumaFisico($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function delTraumaFisico($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->delTraumaFisico($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setHoraI($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setHoraI($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setHoraE($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setHoraE($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setHoraH($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setHoraH($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function setHoraB($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->setHoraB($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
    function SynchLocal($JsonParam)
    {
        $dataset = array();
        $dataset["items"] = array();
        $datos = new setData();
        $res = $datos->SynchLocal($JsonParam);

        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                array_push($dataset['items'], $row);
            }
            echo json_encode($dataset);
        } else {
            echo json_encode(array('mensaje' => 'Ocurrio un error'));
        }
    }
}
