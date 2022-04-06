<?php
include_once "db.php";

class setData extends DB
{
    function setTurno($jsonParam)
    {
        $cod_ambu = $jsonParam['cod_ambu'];
        $km_actual = $jsonParam['km_actual'];
        $combustible_actual = $jsonParam['combustible_actual'];
        $cantidadtiket = $jsonParam['cantidadtiket'];
        $observacion = $jsonParam['observacion'];
        $usuario = $jsonParam['usuario'];
        $sql = "INSERT INTO public.turno_registro (cod_ambulancias, km_actual,combustible_actual,cantidadtiket,observacion,usuario) VALUES (?,?,?,?,?,?);";
        $query = $this->connect()->prepare($sql)->execute([$cod_ambu, $km_actual, $combustible_actual, $cantidadtiket, $observacion, $usuario]);
        $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        return $query;
    }
    function setPaciente($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $num_doc = $jsonParam['num_doc'];
        $tipo_doc = $jsonParam['tipo_doc'];
        $nombre1 = $jsonParam['nombre1'];
        $nombre2 = $jsonParam['nombre2'];
        $apellido1 = $jsonParam['apellido1'];
        $apellido2 = $jsonParam['apellido2'];
        $gen = $jsonParam['genero'];
        $edad = $jsonParam['edad'];
        $fecha_nacido = $jsonParam['fecha_nacido'];
        $cod_edad = $jsonParam['cod_edad'];
        $telefono = $jsonParam['telefono'];
        $celular = $jsonParam['celular'];
        $direccion = $jsonParam['direccion'];
        $asegurador = $jsonParam['asegurador'];
        $dpto = $jsonParam['dpto'];
        $prov = $jsonParam['prov'];
        $dist = $jsonParam['dist'];
        $k_inicial = $jsonParam['k_inicial'];
        $query = $this->connect()->query("SELECT * FROM public.pacientegeneral WHERE cod_pacienteinterh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.pacientegeneral (
                    /* BLOQUE */ cod_pacienteinterh,id_paciente,num_doc,tipo_doc, 
                    /* BLOQUE */ nombre1,nombre2,apellido1,apellido2, 
                    /* BLOQUE */ genero,edad,fecha_nacido,cod_edad, 
                    /* BLOQUE */ telefono,celular,direccion,aseguradro, 
                    /* BLOQUE */ prehospitalario,dpto_pte,provin_pte,distrito_pte ) VALUES (
                    /* BLOQUE */ ?, 1+COALESCE(( SELECT MAX (id_paciente) FROM pacientegeneral),0) ,?,?, 
                    /* BLOQUE */ ?,?,?,?, 
                    /* BLOQUE */ ?,?,?,?, 
                    /* BLOQUE */ ?,?,?,?, 
                    /* BLOQUE */ 1,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([
                $cod_caso, $num_doc, $tipo_doc,
                $nombre1, $nombre2, $apellido1, $apellido2,
                $gen, $edad, $fecha_nacido, $cod_edad,
                $telefono, $celular, $direccion, $asegurador,
                $dpto, $prov, $dist
            ]);
            $sql = "UPDATE public.preh_servicio_ambulancia SET k_inical = ? WHERE id_maestrointerh = ? ";
            $query = $this->connect()->prepare($sql)->execute([$k_inicial, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.pacientegeneral SET
            /* BLOQUE */ num_doc =  ?, tipo_doc =  ?, nombre1 =  ?, nombre2 =  ?,
            /* BLOQUE */ apellido1 =  ?, apellido2 =  ?, genero =  ?, edad =   ?,
            /* BLOQUE */ fecha_nacido =  ?, cod_edad =  ?, telefono =  ?, celular =   ?,
            /* BLOQUE */ direccion =  ?, aseguradro =  ?, dpto_pte =  ?, provin_pte =  ?, distrito_pte =  ? WHERE cod_pacienteinterh =  ?";
            $query = $this->connect()->prepare($sql)->execute([
                $num_doc, $tipo_doc, $nombre1, $nombre2,
                $apellido1, $apellido2, $gen, $edad,
                $fecha_nacido, $cod_edad, $telefono, $celular,
                $direccion, $asegurador, $dpto, $prov, $dist, $cod_caso
            ]);
            $sql = "UPDATE public.preh_servicio_ambulancia SET k_inical = ? WHERE id_maestrointerh = ? ";
            $query = $this->connect()->prepare($sql)->execute([$k_inicial, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setCausa($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $cod_causa = $jsonParam['cod_causa'];
        $query = $this->connect()->query("SELECT * FROM public.causa_registro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.causa_registro (cod_casopreh,id_causa) VALUES (?,?); ";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $cod_causa]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "DELETE FROM public.trauma_registro WHERE cod_casopreh= ? ;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso]);
            $sql = "DELETE FROM public.obstetrico_registro WHERE cod_casopreh= ? ;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso]);
            $sql = "UPDATE public.causa_registro SET id_causa = ?  WHERE cod_casopreh = ? ;";
            $query = $this->connect()->prepare($sql)->execute([$cod_causa, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");            
        }
        return $query;
    }
    function setTrauma($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $cod_trauma = $jsonParam['cod_trauma'];
        $query = $this->connect()->query("SELECT * FROM public.trauma_registro WHERE cod_casopreh = '" . $cod_caso . "' AND causa_trauma_registro ='" . $cod_trauma . "' ");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.trauma_registro (cod_casopreh,causa_trauma_registro) VALUES (?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $cod_trauma]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function delTrauma($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $cod_trauma = $jsonParam['cod_trauma'];
        $query = $this->connect()->query("SELECT * FROM public.trauma_registro WHERE cod_casopreh = '" . $cod_caso . "' AND causa_trauma_registro ='" . $cod_trauma . "' ");
        if ($query->rowCount() == 0) {
            $sql = "DELETE FROM public.trauma_registro WHERE cod_casopreh = ? AND causa_trauma_registro = ? ;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $cod_trauma]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "DELETE FROM public.trauma_registro WHERE cod_casopreh = ? AND causa_trauma_registro = ? ;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $cod_trauma]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setObstetrico($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $trabajoparto = $jsonParam['trabajoparto'];
        $sangradovaginal = $jsonParam['sangradovaginal'];
        $g = $jsonParam['g'];
        $p = $jsonParam['p'];
        $a = $jsonParam['a'];
        $n = $jsonParam['n'];
        $c = $jsonParam['c'];
        $fuente = $jsonParam['fuente'];
        $tiempo = $jsonParam['tiempo'];
        $query = $this->connect()->query("SELECT * FROM public.obstetrico_registro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.obstetrico_registro (cod_casopreh,trabajoparto,sangradovaginal,g,p,a,n,c,fuente,tiempo) VALUES (?, ?, ?, ?,?, ?, ?, ?,?, ?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $trabajoparto, $sangradovaginal, $g, $p, $a, $n, $c, $fuente, $tiempo]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.obstetrico_registro SET trabajoparto = ?, sangradovaginal = ?, g = ?, p = ?, a = ?, n = ?, c = ?, fuente = ?, tiempo = ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$trabajoparto, $sangradovaginal, $g, $p, $a, $n, $c, $fuente, $tiempo, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setExpG($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $cod_trauma = $jsonParam['cod_trauma'];
        $query = $this->connect()->query("SELECT * FROM public.explo_general_registro WHERE cod_casopreh = '" . $cod_caso . "' AND explo_general_afeccion = '" . $cod_trauma . "'");
        if ($query->rowCount() == 0) {            
            $sql = "INSERT INTO public.explo_general_registro (cod_casopreh,explo_general_afeccion) VALUES (?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso,$cod_trauma]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function delExpG($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $cod_trauma = $jsonParam['cod_trauma'];
        $query = $this->connect()->query("SELECT * FROM public.explo_general_registro WHERE cod_casopreh = '" . $cod_caso . "' AND explo_general_afeccion = '" . $cod_trauma . "'");
        if ($query->rowCount() == 0) {
            $sql = "DELETE FROM public.explo_general_registro WHERE cod_casopreh = ? AND explo_general_afeccion = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso,$cod_trauma]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {            
            $sql = "DELETE FROM public.explo_general_registro WHERE cod_casopreh = ? AND explo_general_afeccion = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso,$cod_trauma]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setDiagnostico($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $fecha_horaevaluacion = $jsonParam['fecha_horaevaluacion'];
        $triage = $jsonParam['triage'];
        $sv_tx = $jsonParam['sv_tx'];
        $sv_fc = $jsonParam['sv_fc'];
        $sv_fr = $jsonParam['sv_fr'];
        $sv_temp = $jsonParam['sv_temp'];
        $sv_satO2 = $jsonParam['sv_satO2'];
        $sv_gl = $jsonParam['sv_gl'];
        $cod_diag_cie = $jsonParam['cod_diag_cie'];
        $ap_diabetes = $jsonParam['ap_diabetes'];
        $ap_cardiop = $jsonParam['ap_cardiop'];
        $ap_convul = $jsonParam['ap_convul'];
        $ap_asma = $jsonParam['ap_asma'];
        $ap_acv = $jsonParam['ap_acv'];
        $ap_has = $jsonParam['ap_has'];
        $ap_alergia = $jsonParam['ap_alergia'];
        $ap_med_paciente = $jsonParam['ap_med_paciente'];
        $ap_otros = $jsonParam['ap_otros'];
        $query = $this->connect()->query("SELECT * FROM public.preh_evaluacionclinica WHERE cod_maestropreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {            
            $sql = "INSERT INTO public.preh_evaluacionclinica (cod_maestropreh,cod_paciente,triage,fecha_horaevaluacion, sv_tx, sv_fc, sv_fr, sv_temp, sv_satO2, sv_gl, cod_diag_cie, ap_diabetes, ap_cardiop, ap_convul, ap_asma, ap_acv, ap_has, ap_alergia, ap_med_paciente, ap_otros) VALUES (?,(select id_paciente from pacientegeneral where cod_pacienteinterh = ?),?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso,$cod_caso,$triage,$fecha_horaevaluacion,$sv_tx,$sv_fc,$sv_fr,$sv_temp,$sv_satO2,$sv_gl,$cod_diag_cie,$ap_diabetes,$ap_cardiop,$ap_convul,$ap_asma,$ap_acv,$ap_has,$ap_alergia,$ap_med_paciente,$ap_otros]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {            
            $sql = "UPDATE public.preh_evaluacionclinica SET fecha_horaevaluacion = ?, triage = ?, sv_tx = ?, sv_fc = ?, sv_fr = ?, sv_temp = ?, sv_satO2 = ?, sv_gl = ?,  cod_diag_cie = ?, ap_diabetes = ?, ap_cardiop = ?, ap_convul = ?, ap_asma = ?, ap_acv = ?, ap_has = ?, ap_alergia = ?, ap_med_paciente = ?, ap_otros = ? WHERE cod_maestropreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$fecha_horaevaluacion,$triage,$sv_tx,$sv_fc,$sv_fr,$sv_temp,$sv_satO2,$sv_gl,$cod_diag_cie,$ap_diabetes,$ap_cardiop,$ap_convul,$ap_asma,$ap_acv,$ap_has,$ap_alergia,$ap_med_paciente,$ap_otros,$cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setProc($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_proc = $jsonParam['id_proc'];
        $query = $this->connect()->query("SELECT * FROM public.procedimiento_registro WHERE cod_casopreh = '" . $cod_caso . "' AND procedimiento_tipo_id = '" . $id_proc . "'");
        if ($query->rowCount() == 0) {            
            $sql = "INSERT INTO public.procedimiento_registro (cod_casopreh,procedimiento_tipo_id) VALUES ( ?, ?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_proc]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function delProc($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_proc = $jsonParam['id_proc'];
        $query = $this->connect()->query("SELECT * FROM public.procedimiento_registro WHERE cod_casopreh = '" . $cod_caso . "' AND procedimiento_tipo_id = '" . $id_proc . "'");
        if ($query->rowCount() == 0) {
            $sql = "DELETE FROM public.procedimiento_registro WHERE cod_casopreh = ? AND procedimiento_tipo_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_proc]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "DELETE FROM public.procedimiento_registro WHERE cod_casopreh = ? AND procedimiento_tipo_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_proc]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setMedicamentos($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_med = $jsonParam['id_med'];
        $cant = $jsonParam['cant'];
        $query = $this->connect()->query("SELECT * FROM public.medicamentos_registros WHERE cod_casopreh = '" . $cod_caso . "' AND medicamentos_id = '" . $id_med . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.medicamentos_registros (cod_casopreh,medicamentos_id,cantidad) VALUES ( ?, ?, ?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_med, $cant,]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.medicamentos_registros SET cantidad = ? WHERE cod_casopreh = ? and medicamentos_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cant, $cod_caso, $id_med]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function delMedicamentos($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_med = $jsonParam['id_med'];
        $query = $this->connect()->query("SELECT * FROM public.medicamentos_registros WHERE cod_casopreh = '" . $cod_caso . "' AND medicamentos_id = '" . $id_med . "'");
        if ($query->rowCount() == 0) {
            $sql = "DELETE FROM public.medicamentos_registro WHERE cod_casopreh = ? AND medicamentos_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_med]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "DELETE FROM public.medicamentos_registro WHERE cod_casopreh = ? AND medicamentos_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_med]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setInsumo($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_insu = $jsonParam['id_insu'];
        $cant = $jsonParam['cant'];
        $query = $this->connect()->query("SELECT * FROM public.insumos_registros WHERE cod_casopreh = '" . $cod_caso . "' AND insumos_id = '" . $id_insu . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.insumos_registros (cod_casopreh,insumos_id,cantidad) VALUES (?,?,?)";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_insu, $cant]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.insumos_registros  SET cantidad = ? WHERE cod_casopreh = ? AND insumos_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cant, $cod_caso, $id_insu]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function delInsumo($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_insu = $jsonParam['id_insu'];
        $query = $this->connect()->query("SELECT * FROM public.insumos_registros WHERE cod_casopreh = '" . $cod_caso . "' AND insumos_id = '" . $id_insu . "'");
        if ($query->rowCount() == 0) {
            $sql = "DELETE FROM public.insumos_registros WHERE cod_casopreh = ? AND insumos_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_insu]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "DELETE FROM public.insumos_registros WHERE cod_casopreh = ? AND insumos_id = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_insu]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setOthers($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $desc = $jsonParam['desc'];
        $nombre_confirma = $jsonParam['nombre_confirma'];
        $telefono_confirma = $jsonParam['telefono_confirma'];
        $kfinal = $jsonParam['kfinal'];
        $hospital = $jsonParam['hospital'];
        $med = $jsonParam['med'];
        $obscaso = $jsonParam['obscaso'];
        $cierre = $jsonParam['cierre'];
        $query = $this->connect()->query("SELECT * FROM public.preh_maestro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.preh_servicio_ambulancia SET k_final = ? WHERE id_maestrointerh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$kfinal, $cod_caso]);
            $sql = "UPDATE public.preh_maestro SET descripcion = ?, nombre_confirma = ?, telefono_confirma = ?, hospital_destino = ?, nombre_medico = ?, observacion = ?, cierre = ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$desc, $nombre_confirma, $telefono_confirma, $hospital, $med, $obscaso, $cierre, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setFirma($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $posx = $jsonParam['posx'];
        $posy = $jsonParam['posy'];
        $ancho = $jsonParam['ancho'];
        $query = $this->connect()->query("SELECT * FROM public.firmas_registro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.firmas_registro (cod_casopreh,posx,posy,ancho) VALUES (?,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $posx, $posy, $ancho]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.firmas_registro SET posx = ?, posy = ?, ancho= ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$posx, $posy, $ancho, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setTraumaFisico($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $id_trauma_fisico = $jsonParam['id_trauma_fisico'];
        $posx = $jsonParam['posx'];
        $posy = $jsonParam['posy'];
        $pos = $jsonParam['pos'];
        $query = $this->connect()->query("SELECT * FROM public.explo_fisica_registro WHERE cod_casopreh = '" . $cod_caso . "' AND id_trauma_fisico = '" . $id_trauma_fisico . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.explo_fisica_registro (cod_casopreh,id_trauma_fisico,posx,posy,pos) VALUES (?,?,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_trauma_fisico, $posx, $posy, $pos]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.explo_fisica_registro SET posx = ?, posy = ?, pos = ? WHERE cod_casopreh = ? AND id_trauma_fisico = ?;";
            $query = $this->connect()->prepare($sql)->execute([$posx, $posy, $pos, $cod_caso, $id_trauma_fisico]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function delTraumaFisico($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $query = $this->connect()->query("SELECT * FROM public.explo_fisica_registro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "DELETE FROM public.explo_fisica_registro WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso]);
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $query = $this->connect()->query("");
            $sql = "DELETE FROM public.explo_fisica_registro WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setHoraI($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $hora = $jsonParam['hora'];
        $longitud = $jsonParam['longitud'];
        $latitud = $jsonParam['latitud'];
        $query = $this->connect()->query("SELECT * FROM public.preh_maestro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.preh_servicio_ambulancia SET hora_inicio = ? WHERE id_maestrointerh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$hora, $cod_caso]);
            $sql = "UPDATE public.preh_maestro SET longitud = ?, latitud = ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$longitud, $latitud, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setHoraE($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $hora = $jsonParam['hora'];
        $query = $this->connect()->query("SELECT * FROM public.preh_servicio_ambulancia WHERE id_maestrointerh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.preh_servicio_ambulancia SET hora_llegada = ? WHERE id_maestrointerh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$hora, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setHoraH($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $hora = $jsonParam['hora'];
        $query = $this->connect()->query("SELECT * FROM public.preh_servicio_ambulancia WHERE id_maestrointerh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.preh_servicio_ambulancia SET hora_destino = ? WHERE id_maestrointerh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$hora, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function setHoraB($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $hora = $jsonParam['hora'];
        $query = $this->connect()->query("SELECT * FROM public.preh_servicio_ambulancia WHERE id_maestrointerh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
            $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        } else {
            $sql = "UPDATE public.preh_servicio_ambulancia SET hora_base = ? WHERE id_maestrointerh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$hora, $cod_caso]);
            $query = $this->connect()->query("SELECT 'Actualizado Correctamente' as Respuesta;");
        }
        return $query;
    }
    function SynchLocal($jsonParam)
    {
        $cod_caso = $jsonParam['cod_caso'];
        $num_doc = $jsonParam['infobasica']['num_doc'];
        $tipo_doc = $jsonParam['infobasica']['tipo_doc'];
        $nombre1 = $jsonParam['infobasica']['nombre1'];
        $nombre2 = $jsonParam['infobasica']['nombre2'];
        $apellido1 = $jsonParam['infobasica']['apellido1'];
        $apellido2 = $jsonParam['infobasica']['apellido2'];
        $genero = $jsonParam['infobasica']['genero'];
        $edad = $jsonParam['infobasica']['edad'];
        $fecha_nacido = $jsonParam['infobasica']['fecha_nacido'];
        $cod_edad = $jsonParam['infobasica']['cod_edad'];
        $telefono = $jsonParam['infobasica']['telefono'];
        $celular = $jsonParam['infobasica']['celular'];
        $direccion = $jsonParam['infobasica']['direccion'];
        $asegurador = $jsonParam['infobasica']['asegurador'];
        $dpto = $jsonParam['infobasica']['dpto'];
        $prov = $jsonParam['infobasica']['prov'];
        $dist = $jsonParam['infobasica']['dist'];
        $query = $this->connect()->query("SELECT * FROM public.pacientegeneral WHERE cod_pacienteinterh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.pacientegeneral ( cod_pacienteinterh,id_paciente,num_doc,tipo_doc,nombre1,nombre2,apellido1,apellido2,genero,edad,fecha_nacido,cod_edad,telefono,celular,direccion,aseguradro,prehospitalario,dpto_pte,provin_pte,distrito_pte ) VALUES ( ?, COALESCE(( SELECT MAX (id_paciente) FROM pacientegeneral),0)+1 ,?,?, ?, ? ,?,?, ?, ? ,?,?,?, ? ,?,?,'1', ? ,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $num_doc, $tipo_doc, $nombre1, $nombre2, $apellido1, $apellido2, $genero, $edad, $fecha_nacido, $cod_edad, $telefono, $celular, $direccion, $asegurador, $dpto, $prov, $dist]);
        } else {
            $sql = "UPDATE public.pacientegeneral SET num_doc = ?, tipo_doc = ?, nombre1 = ?, nombre2 = ?, apellido1 = ?, apellido2 = ?, genero = ?, edad =  ?, fecha_nacido = ?, cod_edad = ?, telefono = ?, celular =  ?, direccion = ?, aseguradro = ?, dpto_pte = ?, provin_pte = ?,distrito_pte = ? WHERE cod_pacienteinterh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$num_doc, $tipo_doc, $nombre1, $nombre2, $apellido1, $apellido2, $genero, $edad, $fecha_nacido, $cod_edad, $telefono, $celular, $direccion, $asegurador, $dpto, $prov, $dist, $cod_caso]);
        }
        $causa = $jsonParam['causa'];
        $query = $this->connect()->query("SELECT * FROM public.causa_registro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.causa_registro (cod_casopreh,id_causa) VALUES (?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $causa]);
        } else {
            $sql = "UPDATE public.causa_registro SET id_causa = ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$causa, $cod_caso]);
            $sql = "DELETE FROM public.trauma_registro WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso]);
            $sql = "DELETE FROM public.obstetrico WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso]);
        }
        if ($causa == '3') {
            $subcausat = $jsonParam['subcausat'];
            foreach ($subcausat as $key => $element) {
                $idtrauma = $element['id'];
                $sql = "INSERT INTO public.trauma_registro (cod_casopreh,causa_trauma_registro) VALUES (?,?);";
                $query = $this->connect()->prepare($sql)->execute([$cod_caso, $idtrauma]);
            }
        } elseif ($causa == '4') {
            $trabajoparto = $jsonParam['subcausao']['trabajoparto'];
            $sangradovaginal = $jsonParam['subcausao']['sangradovaginal'];
            $g = $jsonParam['subcausao']['g'];
            $p = $jsonParam['subcausao']['p'];
            $a = $jsonParam['subcausao']['a'];
            $n = $jsonParam['subcausao']['n'];
            $c = $jsonParam['subcausao']['c'];
            $fuente = $jsonParam['subcausao']['fuente'];
            $tiempo = $jsonParam['subcausao']['tiempo'];
            $query = $this->connect()->query("SELECT * FROM public.obstetrico_registro WHERE cod_casopreh = '" . $cod_caso . "'");
            if ($query->rowCount() == 0) {
                $sql = "INSERT INTO public.obstetrico_registro (cod_casopreh,trabajoparto,sangradovaginal,g,p,a,n,c,fuente,tiempo) VALUES (?,?,?,?,?,?,?,?,?,?);";
                $query = $this->connect()->prepare($sql)->execute([$cod_caso, $trabajoparto, $sangradovaginal, $g, $p, $a, $n, $c, $fuente, $tiempo]);
            } else {
                $sql = "UPDATE public.obstetrico_registro SET trabajoparto = ?, sangradovaginal = ?, g = ?, p = ?, a = ?, n = ?, c = ?, fuente = ?, tiempo = ? WHERE cod_casopreh = ?;";
                $query = $this->connect()->prepare($sql)->execute([$trabajoparto, $sangradovaginal, $g, $p, $a, $n, $c, $fuente, $tiempo, $cod_caso]);
            }
        }
        $procedimientos = $jsonParam['procedimientos'];
        foreach ($procedimientos as $key => $element) {
            $id_proc = $element['id'];
            $sql = "INSERT INTO public.procedimiento_registro (cod_casopreh,procedimiento_tipo_id)  VALUES (?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_proc]);
        }
        $insumos = $jsonParam['insumos'];
        foreach ($insumos as $key => $element) {
            $id_insu = $element['id'];
            $cant = $element['cant'];
            $sql = "INSERT INTO public.insumos_registros (cod_casopreh,insumos_id,cantidad) VALUES (?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_insu, $cant]);
        }
        $medicamentos = $jsonParam['medicamentos'];
        foreach ($medicamentos as $key => $element) {
            $id_med = $element['id'];
            $cant = $element['cant'];
            $sql = "INSERT INTO public.medicamentos_registros (cod_casopreh,medicamentos_id,cantidad) VALUES (?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_med, $cant]);
        }
        $exploracion_fisica = $jsonParam['exploracion_fisica'];
        foreach ($exploracion_fisica as $key => $element) {
            $id_trauma_fisico = $element['id'];
            $posx = $element['posx'];
            $posy = $element['posy'];
            $pos = $element['pos'];
            $sql = "INSERT INTO public.explo_fisica_registro (cod_casopreh,id_trauma_fisico,posx,posy,pos) VALUES (?,?,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_trauma_fisico, $posx, $posy, $pos]);
        }
        $exploracion_general = $jsonParam['exploracion_general'];
        foreach ($exploracion_general as $key => $element) {
            $id_trauma = $element['id'];
            $sql = "INSERT INTO public.explo_general_registro (cod_casopreh,explo_general_afeccion) VALUES (?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $id_trauma]);
        }
        $fecha_horaevaluacion = $jsonParam['diagnostico']['fecha_horaevaluacion'];
        $triage = $jsonParam['diagnostico']['triage'];
        $sv_tx = $jsonParam['diagnostico']['sv_tx'];
        $sv_fc = $jsonParam['diagnostico']['sv_fc'];
        $sv_fr = $jsonParam['diagnostico']['sv_fr'];
        $sv_temp = $jsonParam['diagnostico']['sv_temp'];
        $sv_satO2 = $jsonParam['diagnostico']['sv_satO2'];
        $sv_gl = $jsonParam['diagnostico']['sv_gl'];
        $cod_diag_cie = $jsonParam['diagnostico']['cod_diag_cie'];
        $ap_diabetes = $jsonParam['diagnostico']['ap_diabetes'];
        $ap_cardiop = $jsonParam['diagnostico']['ap_cardiop'];
        $ap_convul = $jsonParam['diagnostico']['ap_convul'];
        $ap_asma = $jsonParam['diagnostico']['ap_asma'];
        $ap_acv = $jsonParam['diagnostico']['ap_acv'];
        $ap_has = $jsonParam['diagnostico']['ap_has'];
        $ap_alergia = $jsonParam['diagnostico']['ap_alergia'];
        $ap_med_paciente = $jsonParam['diagnostico']['ap_med_paciente'];
        $ap_otros = $jsonParam['diagnostico']['ap_otros'];
        $query = $this->connect()->query("SELECT * FROM public.preh_evaluacionclinica WHERE cod_maestropreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.preh_evaluacionclinica (cod_maestropreh,cod_paciente,triage,fecha_horaevaluacion, sv_tx, sv_fc, sv_fr, sv_temp, sv_satO2, sv_gl, cod_diag_cie, ap_diabetes, ap_cardiop, ap_convul, ap_asma, ap_acv, ap_has, ap_alergia, ap_med_paciente, ap_otros) VALUES (?,(select id_paciente from pacientegeneral where cod_pacienteinterh = ?),?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$cod_caso, $cod_caso, $triage, $fecha_horaevaluacion, $sv_tx, $sv_fc, $sv_fr, $sv_temp, $sv_satO2, $sv_gl, $cod_diag_cie, $ap_diabetes, $ap_cardiop, $ap_convul, $ap_asma, $ap_acv, $ap_has, $ap_alergia, $ap_med_paciente, $ap_otros]);
        } else {
            $sql = "UPDATE public.preh_evaluacionclinica SET fecha_horaevaluacion = ?, triage = ?, sv_tx = ?, sv_fc = ?, sv_fr = ?, sv_temp = ?, sv_satO2 = ?, sv_gl = ?, cod_diag_cie = ?, ap_diabetes = ?, ap_cardiop = ?, ap_convul = ?, ap_asma = ?, ap_acv = ?, ap_has = ?, ap_alergia = ?, ap_med_paciente = ?, ap_otros = ? WHERE cod_maestropreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$fecha_horaevaluacion, $triage, $sv_tx, $sv_fc, $sv_fr, $sv_temp, $sv_satO2, $sv_gl, $cod_diag_cie, $ap_diabetes, $ap_cardiop, $ap_convul, $ap_asma, $ap_acv, $ap_has, $ap_alergia, $ap_med_paciente, $ap_otros, $cod_caso]);
        }
        $desc = $jsonParam['otros']['desc'];
        $nombre_confirma = $jsonParam['otros']['nombre_confirma'];
        $telefono_confirma = $jsonParam['otros']['telefono_confirma'];
        $kinicial = $jsonParam['kinicial'];
        $kfinal = $jsonParam['otros']['kfinal'];
        $hospital = $jsonParam['otros']['hospital'];
        $med = $jsonParam['otros']['med'];
        $obscaso = $jsonParam['otros']['obscaso'];
        $cierre = $jsonParam['otros']['cierre'];
        $latitud = $jsonParam['latitud'];
        $longitud = $jsonParam['longitud'];
        $query = $this->connect()->query("SELECT * FROM public.preh_maestro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
        } else {
            $sql = "UPDATE public.preh_maestro SET descripcion = ?, nombre_confirma = ?, telefono_confirma = ?, hospital_destino = ?, nombre_medico = ?, observacion = ?, cierre = ?, longitud = ?, latitud = ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$desc, $nombre_confirma, $telefono_confirma, $hospital, $med, $obscaso, $cierre, $longitud, $latitud, $cod_caso]);
        }
        $hora_i = $jsonParam['hora_i'];
        $hora_e = $jsonParam['hora_e'];
        $hora_b = $jsonParam['hora_b'];
        $hora_h = $jsonParam['hora_h'];
        $query = $this->connect()->query("SELECT * FROM public.preh_servicio_ambulancia WHERE id_maestrointerh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $query = $this->connect()->query("");
        } else {
            $sql = "UPDATE public.preh_servicio_ambulancia SET k_final = ?, k_inical = ?, hora_inicio = ?, hora_llegada = ?, hora_base= ?, hora_destino= ? WHERE id_maestrointerh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$kfinal, $kinicial, $hora_i, $hora_e, $hora_b, $hora_h, $cod_caso]);
        }
        $posx = $jsonParam['firmas']['posx'];
        $posy = $jsonParam['firmas']['posy'];
        $ancho = $jsonParam['firmas']['ancho'];
        $query = $this->connect()->query("SELECT * FROM public.firmas_registro WHERE cod_casopreh = '" . $cod_caso . "'");
        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO public.firmas_registro (cod_casopreh,posx,posy,ancho) VALUES (?,?,?,?);";
            $query = $this->connect()->prepare($sql)->execute([$posx, $posy, $ancho, $cod_caso]);
        } else {
            $sql = "UPDATE public.firmas_registro SET posx = ?, posy = ?, ancho= ? WHERE cod_casopreh = ?;";
            $query = $this->connect()->prepare($sql)->execute([$posx, $posy, $ancho, $cod_caso]);
        }
        $query = $this->connect()->query("SELECT 'Guardado Correctamente' as Respuesta;");
        return $query;
    }
}
