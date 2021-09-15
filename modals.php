<!-- Modal CIE10-->
<div class="modal fade" id="CIE10" tabindex="-1" aria-labelledby="CIE" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CIE">Seleccione el CIE10</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableCIE10" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Diagnóstico</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnCIE10" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal CIE10-->

<!-- Modal Hospital -->
<div class="modal fade" id="hosp" tabindex="-1" aria-labelledby="hospit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hospit">Seleccione el hospital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableHosp" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnHosp" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal Hospital -->

<!-- Modal Seguimiento -->
<div class="modal fade" id="modalSeg" tabindex="-1" aria-labelledby="seguim" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seguim">Seguimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="noteInput">Por favor, escriba la nota:</label>
                <input type="text" class="form-control" id="noteInput" placeholder="Nota" />
                <br />
                <label>Notas:</label>
                <ul id="segNote"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnNote" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal Seguimiento -->

<!-- Modal Cerrar Caso -->
<div class="modal fade" id="modalR" tabindex="-1" aria-labelledby="razonM" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="razonM">Cerrar el caso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="selectRazon">Seleccione el tipo de cierre</label>
                <select class="form-control mb-3" id="selectRazon">
                    <option>Seleccione...</option>
                </select>
                <label for="razon">Por favor, escriba la razón por la cual cierra el caso:</label>
                <textarea class="form-control" id="razon" rows="5" placeholder="Razón"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnRazon" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal Cerrar Caso -->

<!-- Modal ambulance -->
<div class="modal fade" id="modalAmbulance" tabindex="-1" aria-labelledby="ambulancia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccione la ambulancia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableAmbulance" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Placa</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnAmbulance" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal ambulance -->

<!-- Modal Paciente -->
<div class="modal fade" id="patient" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccione el paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tablePatient" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnPatient" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal paciente-->

<!-- Modal signal-->
<div class="modal fade" id="modalSignal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccione un signo y síntoma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableSignal" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nivel</th>
                            <th>Signos y síntomas</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnSignal" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal signal-->

<!-- Modal medicamento-->
<div class="modal fade" id="modal-medical" tabindex="-1" aria-labelledby="medic" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medic">Seleccione el medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body accordionForms">
                <div class="form-row">
                    <div class="form-group col-lg-9">
                        <label for="input-medical">Medicamento:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="input-medical" placeholder="Medicamento" disabled />
                            <div class="input-group-append">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary medical-search" data-toggle="modal" data-target="#modal-medical-search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="dosis">Dosis:</label>
                        <input class="form-control" id="dosis" placeholder="Dosis" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-medical" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal medicamento -->

<!-- Modal examen-->
<div class="modal fade" id="modal-examen" tabindex="-1" aria-labelledby="exam" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exam">Seleccione el examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-examen" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Examen</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-examen" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal examen -->

<!-- Modal buscar medicamento-->
<div class="modal fade" id="modal-medical-search" tabindex="-1" aria-labelledby="medic-search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medic-search">
                    Seleccione el medicamento
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-medical" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Medicamentos</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-medical-search" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal buscar medicamento -->

<!-- Modal egreso-->
<div class="modal fade" id="modal-egress" tabindex="-1" aria-labelledby="egress" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="egress">Egreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-auto">
                        <label for="disposal">Disposición:</label>
                        <select class="form-control" id="disposal">
                            <option>-- Seleccione una opción --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-egress" data-dismiss="modal" disabled>
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal egreso -->

<!-- Modal despacho-->
<div class="modal fade" id="modal-dispatch" tabindex="-1" aria-labelledby="dispatch" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dispatch">Despacho</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea enviar a despacho de ambulancia?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary not-allowed btn-dispatch" data-dismiss="modal">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal despacho -->