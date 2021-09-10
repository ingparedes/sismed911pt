<?php
namespace PHPMaker2020\sismed911;
?>
<?php if ($ambulancias->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ambulanciasmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($ambulancias->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<tr id="r_cod_ambulancias">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->cod_ambulancias->caption() ?></td>
			<td <?php echo $ambulancias->cod_ambulancias->cellAttributes() ?>>
<span id="el_ambulancias_cod_ambulancias">
<span<?php echo $ambulancias->cod_ambulancias->viewAttributes() ?>><?php echo $ambulancias->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->placas->Visible) { // placas ?>
		<tr id="r_placas">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->placas->caption() ?></td>
			<td <?php echo $ambulancias->placas->cellAttributes() ?>>
<span id="el_ambulancias_placas">
<span<?php echo $ambulancias->placas->viewAttributes() ?>><?php echo $ambulancias->placas->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->chasis->Visible) { // chasis ?>
		<tr id="r_chasis">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->chasis->caption() ?></td>
			<td <?php echo $ambulancias->chasis->cellAttributes() ?>>
<span id="el_ambulancias_chasis">
<span<?php echo $ambulancias->chasis->viewAttributes() ?>><?php echo $ambulancias->chasis->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->marca->Visible) { // marca ?>
		<tr id="r_marca">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->marca->caption() ?></td>
			<td <?php echo $ambulancias->marca->cellAttributes() ?>>
<span id="el_ambulancias_marca">
<span<?php echo $ambulancias->marca->viewAttributes() ?>><?php echo $ambulancias->marca->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->modelo->Visible) { // modelo ?>
		<tr id="r_modelo">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->modelo->caption() ?></td>
			<td <?php echo $ambulancias->modelo->cellAttributes() ?>>
<span id="el_ambulancias_modelo">
<span<?php echo $ambulancias->modelo->viewAttributes() ?>><?php echo $ambulancias->modelo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->tipo_translado->Visible) { // tipo_translado ?>
		<tr id="r_tipo_translado">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->tipo_translado->caption() ?></td>
			<td <?php echo $ambulancias->tipo_translado->cellAttributes() ?>>
<span id="el_ambulancias_tipo_translado">
<span<?php echo $ambulancias->tipo_translado->viewAttributes() ?>><?php echo $ambulancias->tipo_translado->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->estado->Visible) { // estado ?>
		<tr id="r_estado">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->estado->caption() ?></td>
			<td <?php echo $ambulancias->estado->cellAttributes() ?>>
<span id="el_ambulancias_estado">
<span<?php echo $ambulancias->estado->viewAttributes() ?>><?php echo $ambulancias->estado->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->ubicacion->Visible) { // ubicacion ?>
		<tr id="r_ubicacion">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->ubicacion->caption() ?></td>
			<td <?php echo $ambulancias->ubicacion->cellAttributes() ?>>
<span id="el_ambulancias_ubicacion">
<span<?php echo $ambulancias->ubicacion->viewAttributes() ?>><?php echo $ambulancias->ubicacion->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($ambulancias->especial->Visible) { // especial ?>
		<tr id="r_especial">
			<td class="<?php echo $ambulancias->TableLeftColumnClass ?>"><?php echo $ambulancias->especial->caption() ?></td>
			<td <?php echo $ambulancias->especial->cellAttributes() ?>>
<span id="el_ambulancias_especial">
<span<?php echo $ambulancias->especial->viewAttributes() ?>><?php echo $ambulancias->especial->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>