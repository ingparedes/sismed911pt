<?php
$dbconn = pg_connect("host=localhost dbname=sismed911 user=postgres password=12345")
			or die('No se ha podido conectar: ' . pg_last_error());
	//$langid = "es";
//if (($_POST['langid'] != "") and ($_POST['texto'] != "")){
	
	if ($_GET['tipo'] == "incidente") {
		
		$langid = $_POST['langid'];
		
		

		// Realizando una consulta SQL

		$query = "select incidente_".$langid." from incidentes where id_incidente = '".$_POST['texto']."';";
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

		// Imprimiendo los resultados en HTML
		echo "<table>\n";
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($line as $col_value) {
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";

		// Liberando el conjunto de resultados
		pg_free_result($result);

		// Cerrando la conexión
		pg_close($dbconn);
	
	}elseif ($_GET['tipo'] == "camas") {
		//echo "entra al if";		
		
		if (isset($_POST['add_b']) and ($_POST['add_b']<>"")){
			//echo "Entra al if 2";
			$bloque = $_POST['add_b']; 
			$sql = "INSERT INTO bloques_div (\"bloque\") VALUES ('".$bloque."');";	
			//echo $sql;
			$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
			$sql_bk = "SELECT id FROM bloques_div WHERE fecha_creacion in (select max(t.fecha_creacion) from bloques_div t);"; // Obtener el ID del último registro ingresado
			$result_bk = pg_query($sql_bk) or die('La consulta fallo: ' . pg_last_error());
			$line_bk = pg_fetch_array($result_bk);
			$bloque = $line_bk[0];
			//echo "bloque: ".$bloque;

		}

		if (!empty($_POST['hosptlz']) and ($_POST['hosptlz']<>"") and (is_array($_POST["hosptlz"])) ) {
			$serv = 1;
			//echo "Entra al if h <br>";
			foreach($_POST['hosptlz'] as $valor){
				
				$serv = 1;
				$sql = "INSERT INTO division_hosp(\"descripcion\",\"id_servicio\",\"bloque\") VALUES ('".$valor."','".$serv."','".$bloque."');";
				$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
			}
		}
		if (!empty($_POST['uci']) and ($_POST['uci']<>"")){
			foreach($_POST['uci'] as $valor){
				//echo "Entra al if u <br>";
				$serv = 2;
				$sql = "INSERT INTO division_hosp(\"descripcion\",\"id_servicio\",\"bloque\") VALUES ('".$valor."','".$serv."','".$bloque."');";			
				$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
			}
		}
		if (!empty($_POST['pedtria']) and ($_POST['pedtria']<>"")){
			foreach($_POST['pedtria'] as $valor){
			//	echo "Entra al if p <br>";
				$serv = 3;
				$sql = "INSERT INTO division_hosp(\"descripcion\",\"id_servicio\",\"bloque\") VALUES ('".$valor."','".$serv."','".$bloque."');";			
				$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
			}
		}
		//$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		
	}elseif ($_GET['tipo'] == "del_bloque") {
				//echo "entra al if".$_POST['bloque'];
		if (isset($_POST['bloque']) and ($_POST['bloque']<>"")){
			
			$bloque = $_POST['bloque'];
			$sql1 = "DELETE FROM bloques_div WHERE id = '".$bloque."';";
			$sql2 = "DELETE FROM division_hosp d WHERE d.bloque = '".$bloque."';";			
			
			$result1 = pg_query($sql1) or die('La consulta fallo: ' . pg_last_error());
			//echo $sql1;
			if ($result1) {
				$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
				echo "Se eliminó el Bloque ".$bloque;
			}

		}		
	}elseif ($_GET['tipo'] == "activa") {

		if (isset($_POST['bloque']) and ($_POST['bloque']<>"")){
			
			$bloque = $_POST['bloque'];
			$sql = "UPDATE bloques_div SET activo = 'f';";			
			$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

			$sql1 = "UPDATE bloques_div SET activo = 't' WHERE id ='".$bloque."';";			
			$result1 = pg_query($sql1) or die('La consulta fallo: ' . pg_last_error());
			//echo $sql1;
			if ($result1) {
				$sql2 = "SELECT bloque from bloques_div where id ='".$bloque."';";
				$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
				$row = pg_fetch_array($result2);	
				echo "Se activó correctamente la Sección: ".$row[0];
			}

		}
		
	}elseif ($_GET['tipo'] == "censo") {
		//CAMBIAR INPUT CANTIDADES QUE RECIBE DE CENSO// alamacenar en cada tabla...
		if ((!empty($_POST['x_id_hospital'])) and (!empty($_POST['x_nombre_reporta'])) and (!empty($_POST['x_tele_reporta']))) {

			$censo_sql = "INSERT INTO censo_camas (id_hospital,fecha_reporte,nombre_reporta,tele_reporta,id_bloque) VALUES (".$_POST['x_id_hospital'].",'".$_POST['fecha_reporte']."','".$_POST['x_nombre_reporta']."','".$_POST['x_tele_reporta']."',".$_POST['x_id_bloque'].") RETURNING id_cama;";

			$result_censo = pg_query($censo_sql) or die('La consulta fallo: ' . pg_last_error());
			$row = pg_fetch_row($result_censo); 
			$id_camas = $row['0'];			

			if ($result_censo){

				if (!empty($_POST['txt_hospital_oc']) and ($_POST['txt_hospital_lb']<>"") and (is_array($_POST["txt_hospital_fs"])) ) {
					$serv = 1;
					//echo "Entra al if h <br>";	
					for ($i=0; $i < count($_POST['txt_hospital_oc']) ; $i++) { 
						$sql = "INSERT INTO camas_hosptlz(ocupadas, sin_servicio, libres, id_camas) VALUES (".$_POST['txt_hospital_oc'][$i].",".$_POST['txt_hospital_fs'][$i].",".$_POST['txt_hospital_lb'][$i].",".$id_camas.");";
						$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
						if ($result){
							$hosp = true;
						}
					}
					
				}
				if (!empty($_POST['txt_uci_oc']) and ($_POST['txt_uci_lb']<>"") and (is_array($_POST["txt_uci_fs"])) ) {
					$serv = 1;
					//echo "Entra al if h <br>";	
					for ($i=0; $i < count($_POST['txt_uci_oc']) ; $i++) { 
						$sql = "INSERT INTO camas_uci(ocupadas, sin_servicio, libres, id_camas) VALUES (".$_POST['txt_uci_oc'][$i].",".$_POST['txt_uci_fs'][$i].",".$_POST['txt_uci_lb'][$i].",".$id_camas.");";
						$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
						if ($result){
							$uci = true;
						}
					}
					
				}
				if (!empty($_POST['txt_pediatria_oc']) and ($_POST['txt_pediatria_lb']<>"") and (is_array($_POST["txt_pediatria_fs"])) ) {
					$serv = 1;
					//echo "Entra al if h <br>";	
					for ($i=0; $i < count($_POST['txt_pediatria_oc']) ; $i++) { 
						$sql = "INSERT INTO camas_pedtria(ocupadas, sin_servicio, libres, id_camas) VALUES (".$_POST['txt_pediatria_oc'][$i].",".$_POST['txt_pediatria_fs'][$i].",".$_POST['txt_pediatria_lb'][$i].",".$id_camas.");";
						$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
						if ($result){
							$pedtria = true;
						}
					}
					
				}
			} //consulta			
		}
		if ($hosp or $uci or $pedtria) {
			echo "Data added successfully";
		}		
	}
//}
	
?>