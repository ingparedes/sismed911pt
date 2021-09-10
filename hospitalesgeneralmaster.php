<?php
namespace PHPMaker2020\sismed911;
?>
<?php if ($hospitalesgeneral->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_hospitalesgeneralmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($hospitalesgeneral->nombre_hospital->Visible) { // nombre_hospital ?>
		<tr id="r_nombre_hospital">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->nombre_hospital->caption() ?></td>
			<td <?php echo $hospitalesgeneral->nombre_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_hospital">
<span<?php echo $hospitalesgeneral->nombre_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral->nombre_hospital->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->depto_hospital->Visible) { // depto_hospital ?>
		<tr id="r_depto_hospital">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->depto_hospital->caption() ?></td>
			<td <?php echo $hospitalesgeneral->depto_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_depto_hospital">
<span<?php echo $hospitalesgeneral->depto_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral->depto_hospital->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->provincia_hospital->Visible) { // provincia_hospital ?>
		<tr id="r_provincia_hospital">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->provincia_hospital->caption() ?></td>
			<td <?php echo $hospitalesgeneral->provincia_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_provincia_hospital">
<span<?php echo $hospitalesgeneral->provincia_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral->provincia_hospital->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->municipio_hospital->Visible) { // municipio_hospital ?>
		<tr id="r_municipio_hospital">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->municipio_hospital->caption() ?></td>
			<td <?php echo $hospitalesgeneral->municipio_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_municipio_hospital">
<span<?php echo $hospitalesgeneral->municipio_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral->municipio_hospital->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->nivel_hospital->Visible) { // nivel_hospital ?>
		<tr id="r_nivel_hospital">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->nivel_hospital->caption() ?></td>
			<td <?php echo $hospitalesgeneral->nivel_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nivel_hospital">
<span<?php echo $hospitalesgeneral->nivel_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral->nivel_hospital->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->tipo_hospital->Visible) { // tipo_hospital ?>
		<tr id="r_tipo_hospital">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->tipo_hospital->caption() ?></td>
			<td <?php echo $hospitalesgeneral->tipo_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_tipo_hospital">
<span<?php echo $hospitalesgeneral->tipo_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral->tipo_hospital->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->especialidad->Visible) { // especialidad ?>
		<tr id="r_especialidad">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->especialidad->caption() ?></td>
			<td <?php echo $hospitalesgeneral->especialidad->cellAttributes() ?>>
<span id="el_hospitalesgeneral_especialidad">
<span<?php echo $hospitalesgeneral->especialidad->viewAttributes() ?>><?php echo $hospitalesgeneral->especialidad->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->codpolitico->Visible) { // codpolitico ?>
		<tr id="r_codpolitico">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->codpolitico->caption() ?></td>
			<td <?php echo $hospitalesgeneral->codpolitico->cellAttributes() ?>>
<span id="el_hospitalesgeneral_codpolitico">
<span<?php echo $hospitalesgeneral->codpolitico->viewAttributes() ?>><?php echo $hospitalesgeneral->codpolitico->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->telefono->Visible) { // telefono ?>
		<tr id="r_telefono">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->telefono->caption() ?></td>
			<td <?php echo $hospitalesgeneral->telefono->cellAttributes() ?>>
<span id="el_hospitalesgeneral_telefono">
<span<?php echo $hospitalesgeneral->telefono->viewAttributes() ?>><?php echo $hospitalesgeneral->telefono->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($hospitalesgeneral->nombre_responsable->Visible) { // nombre_responsable ?>
		<tr id="r_nombre_responsable">
			<td class="<?php echo $hospitalesgeneral->TableLeftColumnClass ?>"><?php echo $hospitalesgeneral->nombre_responsable->caption() ?></td>
			<td <?php echo $hospitalesgeneral->nombre_responsable->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_responsable">
<span<?php echo $hospitalesgeneral->nombre_responsable->viewAttributes() ?>><?php echo $hospitalesgeneral->nombre_responsable->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>