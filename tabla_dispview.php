<?php
namespace PHPMaker2020\sismed911;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$tabla_disp_view = new tabla_disp_view();

// Run the page
$tabla_disp_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tabla_disp_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tabla_disp_view->isExport()) { ?>
<script>
var ftabla_dispview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftabla_dispview = currentForm = new ew.Form("ftabla_dispview", "view");
	loadjs.done("ftabla_dispview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tabla_disp_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tabla_disp_view->ExportOptions->render("body") ?>
<?php $tabla_disp_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tabla_disp_view->showPageHeader(); ?>
<?php
$tabla_disp_view->showMessage();
?>
<form name="ftabla_dispview" id="ftabla_dispview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tabla_disp">
<input type="hidden" name="modal" value="<?php echo (int)$tabla_disp_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($tabla_disp_view->fechaactualizada->Visible) { // fechaactualizada ?>
	<tr id="r_fechaactualizada">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_fechaactualizada"><script id="tpc_tabla_disp_fechaactualizada" type="text/html"><?php echo $tabla_disp_view->fechaactualizada->caption() ?></script></span></td>
		<td data-name="fechaactualizada" <?php echo $tabla_disp_view->fechaactualizada->cellAttributes() ?>>
<script id="tpx_tabla_disp_fechaactualizada" type="text/html"><span id="el_tabla_disp_fechaactualizada">
<span<?php echo $tabla_disp_view->fechaactualizada->viewAttributes() ?>><?php echo $tabla_disp_view->fechaactualizada->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->id_hospital->Visible) { // id_hospital ?>
	<tr id="r_id_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_id_hospital"><script id="tpc_tabla_disp_id_hospital" type="text/html"><?php echo $tabla_disp_view->id_hospital->caption() ?></script></span></td>
		<td data-name="id_hospital" <?php echo $tabla_disp_view->id_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_id_hospital" type="text/html"><span id="el_tabla_disp_id_hospital">
<span<?php echo $tabla_disp_view->id_hospital->viewAttributes() ?>><?php echo $tabla_disp_view->id_hospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->depto_hospital->Visible) { // depto_hospital ?>
	<tr id="r_depto_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_depto_hospital"><script id="tpc_tabla_disp_depto_hospital" type="text/html"><?php echo $tabla_disp_view->depto_hospital->caption() ?></script></span></td>
		<td data-name="depto_hospital" <?php echo $tabla_disp_view->depto_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_depto_hospital" type="text/html"><span id="el_tabla_disp_depto_hospital">
<span<?php echo $tabla_disp_view->depto_hospital->viewAttributes() ?>><?php echo $tabla_disp_view->depto_hospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->provincia_hospital->Visible) { // provincia_hospital ?>
	<tr id="r_provincia_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_provincia_hospital"><script id="tpc_tabla_disp_provincia_hospital" type="text/html"><?php echo $tabla_disp_view->provincia_hospital->caption() ?></script></span></td>
		<td data-name="provincia_hospital" <?php echo $tabla_disp_view->provincia_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_provincia_hospital" type="text/html"><span id="el_tabla_disp_provincia_hospital">
<span<?php echo $tabla_disp_view->provincia_hospital->viewAttributes() ?>><?php echo $tabla_disp_view->provincia_hospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->municipio_hospital->Visible) { // municipio_hospital ?>
	<tr id="r_municipio_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_municipio_hospital"><script id="tpc_tabla_disp_municipio_hospital" type="text/html"><?php echo $tabla_disp_view->municipio_hospital->caption() ?></script></span></td>
		<td data-name="municipio_hospital" <?php echo $tabla_disp_view->municipio_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_municipio_hospital" type="text/html"><span id="el_tabla_disp_municipio_hospital">
<span<?php echo $tabla_disp_view->municipio_hospital->viewAttributes() ?>><?php echo $tabla_disp_view->municipio_hospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->nombre_hospital->Visible) { // nombre_hospital ?>
	<tr id="r_nombre_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_nombre_hospital"><script id="tpc_tabla_disp_nombre_hospital" type="text/html"><?php echo $tabla_disp_view->nombre_hospital->caption() ?></script></span></td>
		<td data-name="nombre_hospital" <?php echo $tabla_disp_view->nombre_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_nombre_hospital" type="text/html"><span id="el_tabla_disp_nombre_hospital">
<span<?php echo $tabla_disp_view->nombre_hospital->viewAttributes() ?>><?php echo $tabla_disp_view->nombre_hospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->nivel_hospital->Visible) { // nivel_hospital ?>
	<tr id="r_nivel_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_nivel_hospital"><script id="tpc_tabla_disp_nivel_hospital" type="text/html"><?php echo $tabla_disp_view->nivel_hospital->caption() ?></script></span></td>
		<td data-name="nivel_hospital" <?php echo $tabla_disp_view->nivel_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_nivel_hospital" type="text/html"><span id="el_tabla_disp_nivel_hospital">
<span<?php echo $tabla_disp_view->nivel_hospital->viewAttributes() ?>><?php echo $tabla_disp_view->nivel_hospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->camas_hospital->Visible) { // camas_hospital ?>
	<tr id="r_camas_hospital">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_camas_hospital"><script id="tpc_tabla_disp_camas_hospital" type="text/html"><?php echo $tabla_disp_view->camas_hospital->caption() ?></script></span></td>
		<td data-name="camas_hospital" <?php echo $tabla_disp_view->camas_hospital->cellAttributes() ?>>
<script id="tpx_tabla_disp_camas_hospital" class="tabla_dispview" type="text/html">
<?php
$sql = "SELECT cantidad_camas FROM disponibilidad_hospitalaria WHERE servicio_disponibilidad = '3'  AND cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."'";
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '3' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?>
</script>
<script id="tpx_tabla_disp_camas_hospital" type="text/html"><span id="el_tabla_disp_camas_hospital">
<span<?php echo $tabla_disp_view->camas_hospital->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_tabla_disp_camas_hospital")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->camas_uci->Visible) { // camas_uci ?>
	<tr id="r_camas_uci">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_camas_uci"><script id="tpc_tabla_disp_camas_uci" type="text/html"><?php echo $tabla_disp_view->camas_uci->caption() ?></script></span></td>
		<td data-name="camas_uci" <?php echo $tabla_disp_view->camas_uci->cellAttributes() ?>>
<script id="tpx_tabla_disp_camas_uci" class="tabla_dispview" type="text/html">
<?php

//$sql = "SELECT cantidad_camas FROM disponibilidad_hospitalaria WHERE servicio_disponibilidad = '4'  AND cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."'";
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '4' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?>
</script>
<script id="tpx_tabla_disp_camas_uci" type="text/html"><span id="el_tabla_disp_camas_uci">
<span<?php echo $tabla_disp_view->camas_uci->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_tabla_disp_camas_uci")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->camas_ucin->Visible) { // camas_ucin ?>
	<tr id="r_camas_ucin">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_camas_ucin"><script id="tpc_tabla_disp_camas_ucin" type="text/html"><?php echo $tabla_disp_view->camas_ucin->caption() ?></script></span></td>
		<td data-name="camas_ucin" <?php echo $tabla_disp_view->camas_ucin->cellAttributes() ?>>
<script id="tpx_tabla_disp_camas_ucin" class="tabla_dispview" type="text/html">
<?php

//$sql = "SELECT cantidad_camas FROM disponibilidad_hospitalaria WHERE servicio_disponibilidad = '2'  AND cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."'";
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '2' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?>
</script>
<script id="tpx_tabla_disp_camas_ucin" type="text/html"><span id="el_tabla_disp_camas_ucin">
<span<?php echo $tabla_disp_view->camas_ucin->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_tabla_disp_camas_ucin")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($tabla_disp_view->camas_covid->Visible) { // camas_covid ?>
	<tr id="r_camas_covid">
		<td class="<?php echo $tabla_disp_view->TableLeftColumnClass ?>"><span id="elh_tabla_disp_camas_covid"><script id="tpc_tabla_disp_camas_covid" type="text/html"><?php echo $tabla_disp_view->camas_covid->caption() ?></script></span></td>
		<td data-name="camas_covid" <?php echo $tabla_disp_view->camas_covid->cellAttributes() ?>>
<script id="tpx_tabla_disp_camas_covid" class="tabla_dispview" type="text/html">
<?php
$sql2="SELECT cantidad_camas FROM disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' and servicio_disponibilidad = '5' AND fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital = '".CurrentPage()->id_hospital->CurrentValue."' GROUP BY servicio_disponibilidad)";

//echo $sql;
$h = ExecuteScalar($sql2);
if ( $h == '' )
	echo  "<span class='badge badge-danger btn-block'><h4>&nbsp;0</h4></span>";
elseif  ( $h < 5  and $h > 0)
	echo  "<span class='badge badge-warning btn-block'><h4>&nbsp;".$h."</h4></span> ";
else
	echo  "<span class='badge badge-success btn-block'><h4>&nbsp;".$h."</h4></span> ";
?>
</script>
<script id="tpx_tabla_disp_camas_covid" type="text/html"><span id="el_tabla_disp_camas_covid">
<span<?php echo $tabla_disp_view->camas_covid->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_tabla_disp_camas_covid")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_tabla_dispview" class="ew-custom-template"></div>
<script id="tpm_tabla_dispview" type="text/html">
<div id="ct_tabla_disp_view"><table class="ew-table">
	<tbody>
<tr>
	<td>
		<div class="ew-row">
		</div>
	</td>
</tr>
  </tbody>
</table>
<?php
$cod_hospital = Get("id_hospital");
	  $query = "
	  SELECT
fecha_disponibilidad,
estado_disponibilidad,
servicio_disponibilidad.nombre_serv_es,
cantidad_camas
FROM
disponibilidad_hospitalaria
INNER JOIN servicio_disponibilidad on servicio_disponibilidad.servicio_disponabilidad = disponibilidad_hospitalaria.servicio_disponibilidad
WHERE disponibilidad_hospitalaria.cod_hospital ='$cod_hospital' and fecha_disponibilidad in (SELECT MAX(fecha_disponibilidad) AS fecha_disp FROM disponibilidad_hospitalaria WHERE cod_hospital ='$cod_hospital' GROUP BY servicio_disponibilidad)";
	  $result = pg_query($query);
		  ?>
<table >
			  <thead>
			   <h3>Hospital name</h3>
			  <h3>{{include tmpl=~getTemplate("#tpx_tabla_disp_nombre_hospital")/}}</h3>
			  </hr>
			  <tr>
				  <th></th>
			  </tr>
			<tr>
			  </thead>
			  <tbody>
			  <?php
			  while ($row = pg_fetch_array($result)) {
			  ?>
				<tr>
				  <td>
			<div class="col-md-14">
			<?php if($row[1] == 'Inactivo' or $row[1] == 'Lleno' ) { ?>
			<div class="info-box mb-3 bg-danger">
			<?php }  else { ?> 
			<div class="info-box mb-3 bg-success">
			<?php } ?>
			 <span class="info-box-icon"><i class="icofont-patient-bed"></i></span>
			 <div class="info-box-content">
			 <div class="inner"> <h3> Services:  <strong><?php echo "$row[2]"; ?> </strong></h3>  </div>
			  Fecha Actualización: <span class="info-box-box-text"><strong> <?php echo "$row[0]"; ?>  </strong></span>
			 <span class="info-box-number">
			 Estado: <strong><?php echo "$row[1]"; ?> </br> Beds: <strong><?php echo "$row[3]"; ?></strong> </span>
				</div>
			  <!-- /.info-box-content -->
			 </div>
			 </div>
			 </td>
				</tr>
			  <?php
			  }
			  ?>
			  </tbody>
		  </table>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($tabla_disp->Rows) ?> };
	ew.applyTemplate("tpd_tabla_dispview", "tpm_tabla_dispview", "tabla_dispview", "<?php echo $tabla_disp->CustomExport ?>", ew.templateData.rows[0]);
	$("script.tabla_dispview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$tabla_disp_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tabla_disp_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$tabla_disp_view->terminate();
?>