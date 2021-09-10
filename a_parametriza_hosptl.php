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
$a_parametriza_hosptl = new a_parametriza_hosptl();

// Run the page
$a_parametriza_hosptl->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="container">
	Section name:
	<form name="add_bloque" id="add_bloque">
		<input type="text" name="add_b" placeholder="Create Block" class="form-control name_list" required />
	</form>
   <br><br>
   <div class="row"> 

		<div class="col-sm-4"> <?php
			echo $hosp ?>
			<!-- DESDE AQUI -->
			
			<div class="container">
			<br />
				<div class="form-group">
					<form name="add_hosptlz" id="add_hosptlz">
						<div class="table-responsive">
							<table class="table table-bordered" id="dynamic_field_h">
								<tr>
									<td><input type="text" name="hosptlz[]" placeholder="" class="form-control name_list"  /></td>
									<td><button type="button" name="add_h" id="add_h" class="btn btn-success">+</button></td>
								</tr>
							</table>
							
						</div>
					</form>
				</div>
			</div>
			
			<!-- HASTA AQUI -->
		</div>
	
		<div class="col-sm-4">
			<?php echo $uci ?>
			<!-- DESDE AQUI -->
			
			<div class="container">
			<br />
				<div class="form-group">
					<form name="add_uci" id="add_uci">
						<div class="table-responsive">
							<table class="table table-bordered" id="dynamic_field_u">
								<tr>
									<td><input type="text" name="uci[]" placeholder="" class="form-control name_list"  /></td>
									<td><button type="button" name="add_u" id="add_u" class="btn btn-success">+</button></td>
								</tr>
							</table>
							
						</div>
					</form>
				</div>
			</div>
			
			<!-- HASTA AQUI -->
		</div>
	
		<div class="col-sm-4">
			<?php echo $pediatria ?>
			<!-- DESDE AQUI -->
			
			<div class="container">
			<br />
				<div class="form-group">
					<form name="add_pedtria" id="add_pedtria">
						<div class="table-responsive">
							<table class="table table-bordered" id="dynamic_field_p">
								<tr>
									<td><input type="text" name="pedtria[]" placeholder="" class="form-control name_list" /></td>
									<td><button type="button" name="add_p" id="add_p" class="btn btn-success">+</button></td>
								</tr>
							</table>
							
						</div>
					</form>
				</div>
			</div>
			
			<!-- HASTA AQUI -->
		</div>
  </div>
	<input type="button" name="submit" id="btnEnviar" class="btn btn-info" value="Add" />
</div>

<script>
//funcion para enviar varios formularios con un solo boton
/*
$(function() {
  $("#btnEnviar").click(function(event) {
	//Evita que se recargue la página
	event.preventDefault();
	// Serializamos en una sola variable ambos formularios
	var allData = $("#add_hosptlz, #add_uci, #add_pedtria").serialize();
	
	console.log(allData);
	//Podemos usar allData para enviarlo por Ajax o lo que sea
  });
});
*/

$(document).ready(function(){
	var i=1;
	$('#add_h').click(function(){
		i++;
		$('#dynamic_field_h').append('<tr id="row'+i+'"><td><input type="text" name="hosptlz[]" placeholder="Agregar Hospitalización" class="form-control name_list" /></td><td><button type="button" name="remove_h" id="'+i+'" class="btn btn-danger btn_remove_h">X</button></td></tr>');
	});
	var i=1;
	$('#add_u').click(function(){
		i++;
		$('#dynamic_field_u').append('<tr id="row'+i+'"><td><input type="text" name="uci[]" placeholder="Agregar U.C.I." class="form-control name_list" /></td><td><button type="button" name="remove_u" id="'+i+'" class="btn btn-danger btn_remove_u">X</button></td></tr>');
	});
	var i=1;
	$('#add_p').click(function(){
		i++;
		$('#dynamic_field_p').append('<tr id="row'+i+'"><td><input type="text" name="pedtria[]" placeholder="Agregar Pediatría" class="form-control name_list" /></td><td><button type="button" name="remove_p" id="'+i+'" class="btn btn-danger btn_remove_p">X</button></td></tr>');
	});
	$(document).on('click', '.btn_remove_h', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	$(document).on('click', '.btn_remove_u', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	$(document).on('click', '.btn_remove_p', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#btnEnviar').click(function(){		
		$.ajax({
			url:"valida_pge.php?tipo=camas",
			method:"POST",
			data:$("#add_hosptlz, #add_uci, #add_pedtria, #add_bloque").serialize(),
			success:function(data)
			{
				alert(data);
				//$('#add_hosptlz')[0].reset();
			}
		});
	});
	
});
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$a_parametriza_hosptl->terminate();
?>