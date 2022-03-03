<?php
	//$langid = "es";
	
	if (($_POST['langid'] != "") and ($_POST['texto'] != "")){
			$langid = $_POST['langid'];
			
			$dbconn = pg_connect("host=localhost dbname=bdsismed911 user=sismed911 password=sismed911") //12345
				or die('No se ha podido conectar: ' . pg_last_error());
		
		if ($_GET['tipo'] == 'incidente') {
		
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
		
		}elseif ($_GET['tipo'] == 'telefono') {
			// Realizando una consulta SQL

			$query = "SELECT Count(*) AS cant, t.llamada_fallida 
FROM preh_maestro AS m INNER JOIN tipo_llamada AS t ON m.llamada_fallida = t.id_llamda_f WHERE m.telefono = '".$_POST['texto']."' GROUP BY m.llamada_fallida, t.llamada_fallida;";
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			// Imprimiendo los resultados en HTML
			echo "<h4>Teléfono: ".$_POST['texto']." </h4>
				<table class=\"table\">\n
				<thead class=\"thead-dark\">\n";
			echo "<tr><td>Cant</td><td>Tipo</td></tr>";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
				echo "\t<tr>\n";
				foreach ($line as $col_value) {
					echo "\t\t<td>$col_value</td>\n";
				}
				echo "\t</tr>\n";
			}
			echo "</table>\n";			
		
		
		}

		// Liberando el conjunto de resultados
		pg_free_result($result);

		// Cerrando la conexión
		pg_close($dbconn);
	}
