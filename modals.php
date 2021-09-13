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