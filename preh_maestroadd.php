<?php

namespace PHPMaker2020\sismed911;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();

// Write header
WriteHeader(FALSE);

// Create page object
$preh_maestro_add = new preh_maestro_add();

// Run the page
$preh_maestro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_maestro_add->Page_Render();

include_once "header.php";

?>

<script>
	var fpreh_maestroadd, currentPageID;
	loadjs.ready("head", function() {

		// Form object
		currentPageID = ew.PAGE_ID = "add";
		fpreh_maestroadd = currentForm = new ew.Form("fpreh_maestroadd", "add");

		// Validate form
		fpreh_maestroadd.validate = function() {
			if (!this.validateRequired)
				return true; // Ignore validation
			var $ = jQuery,
				fobj = this.getForm(),
				$fobj = $(fobj);
			if ($fobj.find("#confirm").val() == "confirm")
				return true;
			var elm, felm, uelm, addcnt = 0;
			var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
			var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
			var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
			var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
			for (var i = startcnt; i <= rowcnt; i++) {
				var infix = ($k[0]) ? String(i) : "";
				$fobj.data("rowindex", infix);
				<?php if ($preh_maestro_add->fecha->Required) { ?>
					elm = this.getElements("x" + infix + "_fecha");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->fecha->caption(), $preh_maestro_add->fecha->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->tiempo->Required) { ?>
					elm = this.getElements("x" + infix + "_tiempo");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->tiempo->caption(), $preh_maestro_add->tiempo->RequiredErrorMessage)) ?>");
				<?php } ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->tiempo->errorMessage()) ?>");
				<?php if ($preh_maestro_add->llamada_fallida->Required) { ?>
					elm = this.getElements("x" + infix + "_llamada_fallida");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->llamada_fallida->caption(), $preh_maestro_add->llamada_fallida->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->longitud->Required) { ?>
					elm = this.getElements("x" + infix + "_longitud");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->longitud->caption(), $preh_maestro_add->longitud->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->latitud->Required) { ?>
					elm = this.getElements("x" + infix + "_latitud");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->latitud->caption(), $preh_maestro_add->latitud->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->quepasa->Required) { ?>
					elm = this.getElements("x" + infix + "_quepasa");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->quepasa->caption(), $preh_maestro_add->quepasa->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->direccion->Required) { ?>
					elm = this.getElements("x" + infix + "_direccion");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->direccion->caption(), $preh_maestro_add->direccion->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->estado_llamada->Required) { ?>
					elm = this.getElements("x" + infix + "_estado_llamada");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->estado_llamada->caption(), $preh_maestro_add->estado_llamada->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->incidente->Required) { ?>
					elm = this.getElements("x" + infix + "_incidente");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->incidente->caption(), $preh_maestro_add->incidente->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->prioridad->Required) { ?>
					elm = this.getElements("x" + infix + "_prioridad");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->prioridad->caption(), $preh_maestro_add->prioridad->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->accion->Required) { ?>
					elm = this.getElements("x" + infix + "_accion");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->accion->caption(), $preh_maestro_add->accion->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->estado->Required) { ?>
					elm = this.getElements("x" + infix + "_estado");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->estado->caption(), $preh_maestro_add->estado->RequiredErrorMessage)) ?>");
				<?php } ?>
				elm = this.getElements("x" + infix + "_estado");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->estado->errorMessage()) ?>");
				<?php if ($preh_maestro_add->cierre->Required) { ?>
					elm = this.getElements("x" + infix + "_cierre");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->cierre->caption(), $preh_maestro_add->cierre->RequiredErrorMessage)) ?>");
				<?php } ?>
				elm = this.getElements("x" + infix + "_cierre");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->cierre->errorMessage()) ?>");
				<?php if ($preh_maestro_add->caso_multiple->Required) { ?>
					elm = this.getElements("x" + infix + "_caso_multiple");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->caso_multiple->caption(), $preh_maestro_add->caso_multiple->RequiredErrorMessage)) ?>");
				<?php } ?>
				elm = this.getElements("x" + infix + "_caso_multiple");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->caso_multiple->errorMessage()) ?>");
				<?php if ($preh_maestro_add->paciente->Required) { ?>
					elm = this.getElements("x" + infix + "_paciente");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->paciente->caption(), $preh_maestro_add->paciente->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->evaluacion->Required) { ?>
					elm = this.getElements("x" + infix + "_evaluacion");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->evaluacion->caption(), $preh_maestro_add->evaluacion->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->sede->Required) { ?>
					elm = this.getElements("x" + infix + "_sede");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->sede->caption(), $preh_maestro_add->sede->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->hospital_destino->Required) { ?>
					elm = this.getElements("x" + infix + "_hospital_destino");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->hospital_destino->caption(), $preh_maestro_add->hospital_destino->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->nombre_medico->Required) { ?>
					elm = this.getElements("x" + infix + "_nombre_medico");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->nombre_medico->caption(), $preh_maestro_add->nombre_medico->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->nombre_confirma->Required) { ?>
					elm = this.getElements("x" + infix + "_nombre_confirma");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->nombre_confirma->caption(), $preh_maestro_add->nombre_confirma->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->telefono_confirma->Required) { ?>
					elm = this.getElements("x" + infix + "_telefono_confirma");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->telefono_confirma->caption(), $preh_maestro_add->telefono_confirma->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->telefono->Required) { ?>
					elm = this.getElements("x" + infix + "_telefono");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->telefono->caption(), $preh_maestro_add->telefono->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->nombre_reporta->Required) { ?>
					elm = this.getElements("x" + infix + "_nombre_reporta");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->nombre_reporta->caption(), $preh_maestro_add->nombre_reporta->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->distrito->Required) { ?>
					elm = this.getElements("x" + infix + "_distrito");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->distrito->caption(), $preh_maestro_add->distrito->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->descripcion->Required) { ?>
					elm = this.getElements("x" + infix + "_descripcion");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->descripcion->caption(), $preh_maestro_add->descripcion->RequiredErrorMessage)) ?>");
				<?php } ?>
				<?php if ($preh_maestro_add->observacion->Required) { ?>
					elm = this.getElements("x" + infix + "_observacion");
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->observacion->caption(), $preh_maestro_add->observacion->RequiredErrorMessage)) ?>");
				<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			}

			// Process detail forms
			var dfs = $fobj.find("input[name='detailpage']").get();
			for (var i = 0; i < dfs.length; i++) {
				var df = dfs[i],
					val = df.value;
				if (val && ew.forms[val])
					if (!ew.forms[val].validate())
						return false;
			}
			return true;
		}

		// Form_CustomValidate
		fpreh_maestroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

			// Your custom validation code here, return false if invalid.
			return true;
		}

		// Use JavaScript validation or not
		fpreh_maestroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

		// Dynamic selection lists
		fpreh_maestroadd.lists["x_llamada_fallida"] = <?php echo $preh_maestro_add->llamada_fallida->Lookup->toClientList($preh_maestro_add) ?>;
		fpreh_maestroadd.lists["x_llamada_fallida"].options = <?php echo JsonEncode($preh_maestro_add->llamada_fallida->lookupOptions()) ?>;
		fpreh_maestroadd.lists["x_incidente"] = <?php echo $preh_maestro_add->incidente->Lookup->toClientList($preh_maestro_add) ?>;
		fpreh_maestroadd.lists["x_incidente"].options = <?php echo JsonEncode($preh_maestro_add->incidente->lookupOptions()) ?>;
		fpreh_maestroadd.lists["x_prioridad"] = <?php echo $preh_maestro_add->prioridad->Lookup->toClientList($preh_maestro_add) ?>;
		fpreh_maestroadd.lists["x_prioridad"].options = <?php echo JsonEncode($preh_maestro_add->prioridad->lookupOptions()) ?>;
		fpreh_maestroadd.lists["x_accion"] = <?php echo $preh_maestro_add->accion->Lookup->toClientList($preh_maestro_add) ?>;
		fpreh_maestroadd.lists["x_accion"].options = <?php echo JsonEncode($preh_maestro_add->accion->lookupOptions()) ?>;
		fpreh_maestroadd.lists["x_hospital_destino"] = <?php echo $preh_maestro_add->hospital_destino->Lookup->toClientList($preh_maestro_add) ?>;
		fpreh_maestroadd.lists["x_hospital_destino"].options = <?php echo JsonEncode($preh_maestro_add->hospital_destino->lookupOptions()) ?>;
		loadjs.done("fpreh_maestroadd");
	});
</script>

<script>
	loadjs.ready("head", function() {

		// Client script
		function busqueda() {
			var e = {
				texto: document.getElementById("x_incidente").value,
				langid: "<?php echo CurrentLanguageID(); ?>"
			};
			$.ajax({
				data: e,
				url: "valida_pg.php?tipo=incidente",
				type: "POST",
				success: function(e) {
					$("#datos1").html(e)
				}
			})
		}
		$(document).ready(function() {
			$(".caso_multiple").hide()
		}), $("select[name='x_incidente']").change(function() {
			busqueda()
		});
	});
</script>

<?php
$preh_maestro_add->showPageHeader();
$preh_maestro_add->showMessage();

$incidentes = ExecuteRows('SELECT id_incidente, incidente_es, nombre_es FROM incidentes ORDER BY nombre_es');
?>

<div class="card-header mb-3">
	<h3> <?php echo $Language->Phrase("nuevo_caso"); ?></h3>
</div>
<form>
	<div class="form-row">
		<div class="form-group col-xs-12 col-sm-6 col-md-4">
			<label for="phone">Teléfono:</label>
			<div class="input-group mb-3 flex-nowrap">
				<input type="text" class="form-control" placeholder="Teléfono" id="phone">
				<div class="input-group-append">
					<span class="input-group-text" id="Teléfono"><i class="fas fa-phone-alt"></i></span>
				</div>
			</div>
		</div>

		<div class="form-group col-xs-12 col-sm-6 col-md-4">
			<div class="form-check pl-0">
				<label for="defaultCheck1">
					Llamada no pertinente:
				</label>
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" style="margin-left: 8px">
			</div>

			<div class="input-group">
				<select class="custom-select ew-custom-select" id="llamada" disabled>
					<option>-- Seleccione por favor --</option>
					<option>Perturbadora</option>
					<option>Silente</option>
					<option>Falsa</option>
					<option>Otro</option>
				</select>
			</div>
		</div>
	</div>

	<div class="form-row mb-2">
		<div class="form-group col-12">
			<label for="phone">Motivo:</label>
			<input type="text" class="form-control w-100" placeholder="Motivo de la llamada" id="motivo">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-12">
			<label for="phone">Tipo de solicitud:</label>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
				<label class="form-check-label" for="inlineRadio1">Interhospitalario</label>
			</div>

			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
				<label class="form-check-label" for="inlineRadio2">Prehospitalario</label>
			</div>
		</div>
	</div>

	<div class="card" id="interh" hidden>
		<div class="card-header" style="background-color: rgba(0,0,0,0.03)">
			Servicios interhospitalarios
		</div>

		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-xs-12 col-md-6">
					<label for="hosp_dest">Hospital solicitud:</label>
					<div class="input-group flex-nowrap">
						<input type="text" class="form-control w-100" id="hosp_dest" placeholder="Hospital solicitud" disabled />
						<div class="input-group-append">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-secondary hosp_search" data-toggle="modal" data-target="#hosp">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="form-group col-xs-12 col-md-6">
					<label for="servicio">Tipo de servicio:</label>
					<div class="input-group">
						<select class="custom-select ew-custom-select" id="servicio" disabled>
							<option value="0">-- Seleccione por favor --</option>
							<option value="1">Remisión</option>
							<option value="2">Contra remisión</option>
							<option value="3">Estudio</option>
							<option value="4">Programado</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-12">
					<div class="card" id="servicio1" hidden>
						<div class="card-header" style="background-color: rgba(0,0,0,0.03)">
							Remisión o contra remisión
						</div>

						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-12">
									<label for="phone">Ubicación del paciente:</label>
									<input type="text" class="form-control w-100" placeholder="Ubicación del paciente" id="ubicacion">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="phone">Prioridad:</label>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="prioridad" id="prio1" value="1">
										<label class="form-check-label" for="prio1">1</label>
									</div>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="prioridad" id="prio2" value="2">
										<label class="form-check-label" for="prio2">2</label>
									</div>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="prioridad" id="prio3" value="3">
										<label class="form-check-label" for="prio3">3</label>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="phone">Acción:</label>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="accion" id="accion1" value="1">
										<label class="form-check-label" for="accion1">Asesoría médica</label>
									</div>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="accion" id="accion2" value="2">
										<label class="form-check-label" for="accion2">Despacho de ambulancia</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card" id="servicio2" hidden>
						<div class="card-header d-flex justify-content-between" style="background-color: rgba(0,0,0,0.03)">
							<div>Estudio o programado</div>

							<div class="form-check pl-0">
								<label for="retorno">
									Retorno:
								</label>
								<input class="form-check-input" type="checkbox" value="" id="retorno" style="margin-left: 8px">
							</div>
						</div>

						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-xs-12 col-md-6">
									<label for="paciente">Paciente:</label>
									<div class="input-group flex-nowrap">
										<input type="text" class="form-control w-100" id="paciente" placeholder="-- Por favor, seleccione --" disabled />
										<div class="input-group-append">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-outline-secondary paci_search" disabled>
												<i class="fa fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>

								<div class="form-group col-xs-12 col-md-6">
									<label for="estudio">Tipo de estudio:</label>
									<div class="input-group flex-nowrap">
										<input type="text" class="form-control w-100" id="estudio" placeholder="-- Por favor, seleccione --" disabled />
										<div class="input-group-append">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-outline-secondary estudio_search" data-toggle="modal" data-target="#ayudaDX" disabled>
												<i class="fa fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-xs-3">
									<label for="programado">Programado:</label>
									<input type="datetime-local" class="form-control" id="programado" disabled />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action-interh" type="button">
				<?php echo $Language->phrase("AddBtn") ?>
			</button>

			<a class="btn btn-default ew-btn" href="<?php echo $preh_maestro_add->getReturnUrl() ?>" role="button">
				<?php echo $Language->phrase("CancelBtn") ?>
			</a>
		</div>
	</div>

	<div class="card" id="preh" hidden>
		<div class="card-header" style="background-color: rgba(0,0,0,0.03)">
			Servicios prehospitalarios
		</div>

		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-xs-12 col-md-6 mb-1">
					<label for="incidente">Incidente:</label>
					<div class="input-group">
						<select class="custom-select ew-custom-select mw-100" id="incidente">
							<option value="0">-- Seleccione por favor --</option>
							<?php foreach ($incidentes as $incidente) { ?>
								<option value="<?= $incidente['id_incidente'] ?>"><?= $incidente['nombre_es'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group col-xs-12 col-md-6 mb-1">
					<label for="nombre">Nombre quien reporta:</label>
					<div class="input-group mb-3 flex-nowrap">
						<input type="text" class="form-control w-100" id="nombre" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-12 mb-1">
					<label for="direccion">Dirección:</label>
					<div class="input-group mb-3 flex-nowrap">
						<input type="text" class="form-control w-100" id="direccion" />
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-xs-12 col-md-6">
					<label for="barrio">Barrio:</label>
					<div class="input-group flex-nowrap">
						<input type="text" class="form-control w-100" id="barrio" placeholder="-- Por favor, seleccione --" disabled />
						<div class="input-group-append">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-secondary barrio_search" data-toggle="modal" data-target="#modal-barrio">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-12 mb-2">
					<label for="phone">Prioridad:</label>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="prioridad2" id="prio4" value="1">
						<label class="form-check-label" for="prio4">1</label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="prioridad2" id="prio5" value="2">
						<label class="form-check-label" for="prio5">2</label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="prioridad2" id="prio6" value="3">
						<label class="form-check-label" for="prio6">3</label>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-12 mb-1">
					<label for="phone">Acción:</label>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="accion2" id="accion3" value="1">
						<label class="form-check-label" for="accion3">Asesoría médica</label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="accion2" id="accion4" value="2">
						<label class="form-check-label" for="accion4">Despacho de ambulancia</label>
					</div>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action-preh" type="button">
				<?php echo $Language->phrase("AddBtn") ?>
			</button>

			<a class="btn btn-default ew-btn" href="<?php echo $preh_maestro_add->getReturnUrl() ?>" role="button">
				<?php echo $Language->phrase("CancelBtn") ?>
			</a>
		</div>
	</div>
</form>

<?php include_once "modals.php"; ?>

<script>
	loadjs.ready(["jsrender", "makerjs"], function() {
		var $ = jQuery;
		ew.templateData = {
			rows: <?php echo JsonEncode($preh_maestro->Rows) ?>
		};
		ew.applyTemplate("tpd_preh_maestroadd", "tpm_preh_maestroadd", "preh_maestroadd", "<?php echo $preh_maestro->CustomExport ?>", ew.templateData.rows[0]);
		$("script.preh_maestroadd_js").each(function() {
			ew.addScript(this.text);
		});
	});
</script>

<?php
$preh_maestro_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>

<script>
	loadjs.ready("load", function() {
		// Startup script
		// Write your table-specific startup script here
		// console.log("page loaded");
		let id_hospital = null,
			tablePatient = null;

		$('#defaultCheck1').change(function() {
			$('#llamada').prop('disabled', !this.checked);
		});

		$('input[name=inlineRadioOptions]').change(function() {
			if (this.value == 1) {
				$('#interh').prop('hidden', false);
				$('#preh').prop('hidden', true);
			} else {
				$('#interh').prop('hidden', true);
				$('#preh').prop('hidden', false);
			}
		});

		const tableHosp = $('#tableHosp').DataTable({
			select: 'single',
			language: {
				url: 'lang/es.json',
			},
			ajax: {
				url: 'bd/crud.php',
				method: 'POST',
				data: {
					option: 'selectHosp'
				},
				dataSrc: '',
			},
			deferRender: true,
			columns: [{
				data: 'id_hospital'
			}, {
				data: 'nombre_hospital'
			}],
			//dom: 'Bfrtip'
		});

		$('#hosp').on('show.bs.modal', function() {
			tableHosp.ajax.reload();
		});

		tableHosp.on('select', function(e, dt, type, indexes) {
			$('.btnHosp').prop('disabled', false);
		});

		tableHosp.on('deselect', function(e, dt, type, indexes) {
			$('.btnHosp').prop('disabled', true);
		});

		$('.btnHosp').on('click', function() {
			const dataSelectHosp = tableHosp.rows('.selected').data()[0];
			$('#hosp_dest').val(
				dataSelectHosp.id_hospital + ' ' + dataSelectHosp.nombre_hospital
			);
			id_hospital = dataSelectHosp.id_hospital;
			$('#servicio').prop('disabled', false);
		});

		$('#servicio').change(function() {
			switch (this.value) {
				case '0':
					$('#servicio1').prop('hidden', true);
					$('#servicio2').prop('hidden', true);
					break;
				case '1':
				case '2':
					$('#servicio1').prop('hidden', false);
					$('#servicio2').prop('hidden', true);
					break;
				case '3':
					$('#servicio1').prop('hidden', true);
					$('#servicio2').prop('hidden', false);
					$('.estudio_search').prop('disabled', false);
					$('#programado').prop('disabled', true);
					break;
				case '4':
					$('#servicio1').prop('hidden', true);
					$('#servicio2').prop('hidden', false);
					$('.estudio_search').prop('disabled', false);
					$('#programado').prop('disabled', false);
					break;
			}
		});

		const createTablePaciente = () => {
			tablePatient = $('#tablePatient').DataTable({
				select: 'single',
				language: {
					url: 'lang/es.json',
				},
				ajax: {
					url: 'bd/admission.php',
					method: 'POST',
					data: {
						option: 'selectPatient',
						idH: id_hospital
					},
					dataSrc: '',
				},
				deferRender: true,
				columns: [{
						data: 'id_paciente'
					},
					{
						defaultContent: ''
					},
					{
						defaultContent: ''
					},
				],
				columnDefs: [{
						render: function(data, type, row) {
							return row.nombre1 ?
								row.nombre1 :
								'' + ' ' + row.nombre2 ?
								row.nombre2 :
								'';
						},
						targets: 1,
					},
					{
						render: function(data, type, row) {
							return row.apellido1 ?
								row.apellido1 :
								'' + ' ' + row.apellido2 ?
								row.apellido2 :
								'';
						},
						targets: 2,
					},
				],
			});
		};

		$('.paci_search').on('click', function() {
			if (tablePatient) tablePatient.destroy();
			createTablePaciente();
			$('#patient').modal();
		});

		const tableAyudaDX = $('#tableAyudaDX').DataTable({
			select: 'single',
			language: {
				url: 'lang/es.json',
			},
			ajax: {
				url: 'bd/crud.php',
				method: 'POST',
				data: {
					option: 'selectAyudaDX',
				},
				dataSrc: '',
			},
			deferRender: true,
			columns: [{
					data: 'id_ayudadx'
				},
				{
					data: 'nombre_ayudadx'
				},
			]
		});

		tableAyudaDX.on('select', function(e, dt, type, indexes) {
			$('.btnayuda').prop('disabled', false);
		});

		tableAyudaDX.on('deselect', function(e, dt, type, indexes) {
			$('.btnayuda').prop('disabled', true);
		});

		$('.btnayuda').on('click', function() {
			$('#estudio').val(tableAyudaDX.rows('.selected').data()[0].nombre_ayudadx);
		});

		$('#retorno').change(function() {
			$('.paci_search').prop('disabled', !this.checked);
		});

		const tableBarrio = $('#tableBarrio').DataTable({
			select: 'single',
			language: {
				url: 'lang/es.json',
			},
			ajax: {
				url: 'bd/crud.php',
				method: 'POST',
				data: {
					option: 'selectBarrio',
				},
				dataSrc: '',
			},
			deferRender: true,
			columns: [{
					data: 'id_barrio'
				},
				{
					data: 'barrio'
				},
				{
					data: 'centro'
				},
			]
		});

		tableBarrio.on('select', function(e, dt, type, indexes) {
			$('.btnbarrio').prop('disabled', false);
		});

		tableBarrio.on('deselect', function(e, dt, type, indexes) {
			$('.btnbarrio').prop('disabled', true);
		});

		$('.btnbarrio').on('click', function() {
			$('#barrio').val(tableBarrio.rows('.selected').data()[0].barrio);
		});

		$('#incidente').change(function() {
			$.ajax({
				url: 'bd/crud.php',
				method: 'POST',
				dataType: 'json',
				data: {
					option: 'selectIncidente',
					field: this.value
				},
			}).done((response) => {
				console.log(response);
				$('#modal-info-incidente .modal-body').html(response.incidente_es);
				$('#modal-info-incidente').modal();
			}).fail((error) => {
				console.log(error);
			});
		});
	});
</script>
<?php include_once "footer.php"; ?>
<?php
$preh_maestro_add->terminate();
?>
