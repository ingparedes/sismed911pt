<!-- Modal CIE10-->
<div class="modal fade" id="CIE10" tabindex="-1" aria-labelledby="CIE" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CIE"><?php echo $Language->Phrase('m_cie10title'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableCIE10" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_cie10code'); ?></th>
                            <th><?php echo $Language->Phrase('m_cie10diag'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnCIE10" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
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
                <h5 class="modal-title" id="hospit"><?php echo $Language->Phrase('m_hosptitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableHosp" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_hospid'); ?></th>
                            <th><?php echo $Language->Phrase('m_hospname'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnHosp" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal Hospital -->

<!-- Modal ambulance -->
<div class="modal fade" id="modalAmbulance" tabindex="-1" aria-labelledby="ambulancia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $Language->Phrase('m_ambulancetitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableAmbulance" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_cie10code'); ?></th>
                            <th><?php echo $Language->Phrase('m_ambulanceplaca'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnAmbulance" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal ambulance -->

<!-- Modal Seguimiento -->
<div class="modal fade" id="modalSeg" tabindex="-1" aria-labelledby="seguim" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seguim"><?php echo $Language->Phrase('m_segtitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="noteInput"><?php echo $Language->Phrase('m_seglabel1'); ?>:</label>
                    <textarea class="form-control" id="noteInput" rows="3" placeholder="<?php echo $Language->Phrase('m_segtextarea'); ?>"></textarea>
                </div>
                <label><?php echo $Language->Phrase('m_seglabel2'); ?>:</label>
                <ul id="segNote"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnNote" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
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
                <h5 class="modal-title" id="razonM"><?php echo $Language->Phrase('dt_close'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectRazon"><?php echo $Language->Phrase('m_closelabel1'); ?>:</label>
                    <select class="form-control mb-3" id="selectRazon">
                        <option><?php echo $Language->Phrase('fp_select'); ?></option>
                    </select>
                </div>
                <label for="razon"><?php echo $Language->Phrase('m_closelabel2'); ?>:</label>
                <textarea class="form-control" id="razon" rows="5" placeholder="<?php echo $Language->Phrase('m_closetextarea'); ?>"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnRazon" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal Cerrar Caso -->

<!-- Modal despacho-->
<div class="modal fade" id="modal-dispatch" tabindex="-1" aria-labelledby="dispatch" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dispatch"><?php echo $Language->Phrase('m_desptitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $Language->Phrase('m_desptext'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $Language->Phrase('cancelbtn'); ?></button>
                <button type="button" class="btn btn-primary not-allowed btn-dispatch" data-dismiss="modal">
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal despacho -->

<!-- Modal Paciente -->
<div class="modal fade" id="patient" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $Language->Phrase('m_patienttitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tablePatient" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_hospid'); ?></th>
                            <th><?php echo $Language->Phrase('m_patientname'); ?></th>
                            <th><?php echo $Language->Phrase('m_patientlastname'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnPatient" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
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
                <h5 class="modal-title"><?php echo $Language->Phrase('m_signaltitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableSignal" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_signal'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnSignal" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
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
                <h5 class="modal-title" id="medic"><?php echo $Language->Phrase('m_medicaltitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body accordionForms">
                <div class="form-row">
                    <div class="form-group col-lg-9">
                        <label for="input-medical"><?php echo $Language->Phrase('m_medicallabel1'); ?>:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="input-medical" placeholder="<?php echo $Language->Phrase('m_medicallabel1'); ?>" disabled />
                            <div class="input-group-append">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary medical-search" data-toggle="modal" data-target="#modal-medical-search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="dosis"><?php echo $Language->Phrase('m_medicallabel2'); ?>:</label>
                        <input class="form-control" id="dosis" placeholder="<?php echo $Language->Phrase('m_medicallabel2'); ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-medical" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal medicamento -->

<!-- Modal buscar medicamento-->
<div class="modal fade" id="modal-medical-search" tabindex="-1" aria-labelledby="medic-search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medic-search">
                    <?php echo $Language->Phrase('m_medicalsearchtitle'); ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-medical" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_medicalsearch'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-medical-search" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal buscar medicamento -->

<!-- Modal examen-->
<div class="modal fade" id="modal-examen" tabindex="-1" aria-labelledby="exam" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exam"><?php echo $Language->Phrase('m_testtitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-examen" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?php echo $Language->Phrase('m_test'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-examen" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal examen -->

<!-- Modal egreso-->
<div class="modal fade" id="modal-egress" tabindex="-1" aria-labelledby="egress" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="egress"><?php echo $Language->Phrase('m_agresstitle'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-auto">
                        <label for="disposal"><?php echo $Language->Phrase('m_agresslabel'); ?>:</label>
                        <select class="form-control" id="disposal">
                            <option><?php echo $Language->Phrase('fp_select'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btn-egress" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal egreso -->

<!-- Modal ayudaDX-->
<div class="modal fade" id="ayudaDX" tabindex="-1" aria-labelledby="ayuda" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ayuda">Por favor, seleccione el tipo de estudio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableAyudaDX" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Tipo de estudio</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnayuda" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal ayudaDX-->

<!-- Modal barrio-->
<div class="modal fade" id="modal-barrio" tabindex="-1" aria-labelledby="bar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bar">Por favor, seleccione el barrio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableBarrio" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barrio</th>
                            <th>Centro</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary not-allowed btnbarrio" data-dismiss="modal" disabled>
                    <?php echo $Language->Phrase('accept'); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal barrio-->

<!-- Modal info incidente-->
<div class="modal fade" id="modal-info-incidente" tabindex="-1" aria-labelledby="info" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="info">Incidente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal info incidente-->
