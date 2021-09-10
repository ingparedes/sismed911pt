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
$muestra_bloques = new muestra_bloques();

// Run the page
$muestra_bloques->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >


	<?php
	$db =& DbHelper();
	
	$sql_bloqs = "SELECT * from bloques_div b order by b.fecha_creacion DESC;";
	$res_bloqs = pg_query($sql_bloqs);  
	?>

	<br><br>
	<table id = "bloques" width="100%"> 
		<thead>
			<tr>					
				<th><h3>Classification by Sections </h3></th>
			</tr>			
		</thead>
		<tbody>
			<div class="custom-radio-button"><!-- PARA CONTROLAR LOS RADIO BUTTON -->
			<?php

			while ($row_bloqs = pg_fetch_array($res_bloqs,NULL, PGSQL_ASSOC)) { //WHILE PARA BLOQUES
			?>
			<tr>
				<td>
					<div class="row">
		  				 
			  				<div class="col-md-6">
								<div class="card card-widget">
									
				   					<div class="card-header  bg-warning">
					   			 		<h3 class="card-title">DIV:  <strong><?php echo $row_bloqs["bloque"]; ?>   </strong></h3>
						   				<div class="card-tools">
							  				
							  				<input type="radio" class="activa" id="opt_<?php echo $row_bloqs["id"]; ?>" name="color" value="color-red">
												
											<!-- 
							  				<button type="radio" class="btn btn-tool activa"  id="opt_<?php echo $row_bloqs["id"]; ?>">
						   						<i class="fas fa-check"></i>							 				
							 				</button>
											-->
							  				<button type="button" class="btn btn-tool borrar" id = "<?php echo $row_bloqs["id"]; ?>"> 
							   	 				<i class="fas fa-times"></i>
							  				</button>
													
										</div>
					  				</div>
					  				<div class="card-footer p-0">
										<ul class="nav flex-column">
						  				<li class="nav-item">
											<h5> <span class="nav-link info-box-text">
							 					Date : <?php echo substr($row_bloqs['fecha_creacion'],0,16); ?>
											</span></h5>
						  				</li>
						  				<li class="nav-item">
						   					<h5> <span class="nav-link">Hospitalization</span> </h5>
											<ul class="nav flex-column">						
												<?php
												$sql = "SELECT d.id_servicio, d.descripcion, s.nombre_servicio, d.bloque, b.bloque  FROM division_hosp d INNER JOIN servicios_division s on d.id_servicio= s.id_servicio INNER JOIN bloques_div b  on b.id = d.bloque WHERE b.id = '".$row_bloqs['id']."' and d.id_servicio = '1';";
													$result = pg_query($sql);										
													while ($row = pg_fetch_array($result)) { 							
														echo "<li class=\"list-group-item\">". $row['descripcion']."</li>";
													}
												?>
											</ul>
						  				</li>
										<li class="nav-item">
						   					<h5> <span class="nav-link">I.C.U.</span></h5>	
						  					<ul class="nav flex-column">		
							  					<?php
												$sql = "SELECT d.id_servicio, d.descripcion, s.nombre_servicio, d.bloque, b.bloque  FROM division_hosp d INNER JOIN servicios_division s on d.id_servicio= s.id_servicio INNER JOIN bloques_div b  on b.id = d.bloque WHERE b.id = '".$row_bloqs['id']."' and d.id_servicio = '2';";
													$result = pg_query($sql);							
													while ($row = pg_fetch_array($result)) { 						
														echo "<li class=\"list-group-item\">". $row['descripcion']."</li>";
													}
												?>
						  					</ul>  
						  				</li>
						  				<li class="nav-item">
						   					<h5> <span class="nav-link">Pediatrics</span> </h5>
											<ul class="nav flex-column">		
						  						<?php
												$sql = "SELECT d.id_servicio, d.descripcion, s.nombre_servicio, d.bloque, b.bloque  FROM division_hosp d INNER JOIN servicios_division s on d.id_servicio= s.id_servicio INNER JOIN bloques_div b  on b.id = d.bloque WHERE b.id = '".$row_bloqs['id']."' and d.id_servicio = '3';";
													$result = pg_query($sql);										
													while ($row = pg_fetch_array($result)) { 							
														echo "<li class=\"list-group-item\">". $row['descripcion']."</li>";
													}
												?>
					  						</ul>
						  				</li>	
						  				</ul>	<!--FLEX COLUMN -->		 
					  				</div>
									<div class="card-footer p-0">				
							 			<ul class="nav flex-column">
							  				<li class="nav-item">					
												<div class="info-box-content">
													<br>							
												</div>
											</li>
										</ul>
									</div>
								</div>
							
							</div>
							
					</div>
				</td>
			</tr>

	<?php } // WHILE BLOQUES ?> 	
	</div>  <!-- PARA CONTROLAR LOS RADIO BUTTON -->	
 		</tbody>	
	</table> 



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
		 

<script>
	$(function () {
	$(document).on('click', '.borrar', function (event) {
		event.preventDefault();
		var conf = confirm("¿Are you sure you want to delete the record?");
  		if (conf){
  			var bloque = $(this).attr("id");
			$(this).closest('tr').remove();
			
			console.log(bloque);
			$.ajax({
				type: "POST",
				url: "valida_pge.php?tipo=del_bloque",
				data: {"bloque" : bloque},
				success: function(response) {			
					$('.alert-success').empty();
					$('.alert-success').append(response).fadeIn("slow");
					//$('#'+parent).fadeOut("slow");
					alert(response);
				}
			});

		}
	});
	});
</script>

<script>
	$(function () {
	$(document).on('click', '.activa', function (event) {
		//event.preventDefault();
		var conf = confirm("¿Está seguro que desea activar la sección?");
  	    if (conf){
	  	    var bloque = $(this).attr("id");
	  	    var bloque = bloque.substr(4);
			
	  	    console.log(bloque);   	
  	    	$.ajax({
				type: "POST",
				url: "valida_pge.php?tipo=activa",
				data: {"bloque" : bloque},
				success: function(response) {			
					$(this).prop("checked", true);		
					//$('.alert-success').empty();
					//$('.alert-success').append(response).fadeIn("slow");
					//$('#parent').fadeOut("slow");
					alert(response);
				}
			});		
  	    }
		
	});
	});

</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$muestra_bloques->terminate();
?>