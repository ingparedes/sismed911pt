$(function () {
  window.jsPDF = window.jspdf.jsPDF;
  var dataSelect,
    idMedical,
    idMA,
    focus_value,
    name_hospital,
    language = {
      language: localStorage.getItem('language'),
      MedicalOrden: localStorage.getItem('pdf_medicalorden'),
      testOrden: localStorage.getItem('pdf_testorden'),
      hospitalName: localStorage.getItem('pdf_hospitalname'),
      expireDate: localStorage.getItem('pdf_expiredate'),
      patientName: localStorage.getItem('pdf_patientname'),
      identity: localStorage.getItem('pdf_identity'),
      code: localStorage.getItem('pdf_code'),
      doctor: localStorage.getItem('pdf_doctor'),
      age: localStorage.getItem('fp_age'),
      medical: localStorage.getItem('m_medicalsearch'),
      dosis: localStorage.getItem('m_medicallabel2'),
      test: localStorage.getItem('m_test'),
    };
  var tableEmergency = $('#tableEmergency').DataTable({
    select: 'single',
    pageLength: 5,
    order: [[0, 'desc']],
    language: {
      url: 'lang/' + language['language'] + '.json',
    },
    ajax: {
      url: 'bd/admission.php',
      method: 'POST',
      data: { option: 'selectEmergency' },
      dataSrc: '',
    },
    deferRender: true,
    columns: [
      { data: 'clasificacion_admision' },
      { defaultContent: '' },
      { data: 'fecha_clasificacion' },
      { data: 'expendiente' },
      { defaultContent: '' },
      { defaultContent: '' },
      {
        defaultContent:
          '<button type="button" class="btn btn-secondary egress-btn" data-toggle="modal" data-target="#modal-egress">Egreso</button>',
      },
    ],
    columnDefs: [
      {
        render: function (data, type, row) {
          var fond;
          switch (row.clasificacion_admision) {
            case 'Rojo':
              fond = 'text-white bg-red';
              break;
            case 'Naranja':
              fond = 'text-white bg-orange';
              break;
            case 'Amarillo':
              fond = 'bg-yellow';
              break;
          }
          return (
            "<div class='card card-classification mb-0 " +
            fond +
            "'><div class='card-body'>" +
            row.clasificacion_admision +
            '</div></div>'
          );
        },
        targets: 0,
      },
      {
        render: function (data, type, row) {
          return (
            "<div class='timer_parent'><div class='row'><div class='col countdown-wrapper text-center'><div class='card mb-0 bg-light'><div class='card-block'><div class='countdown text-center d-flex justify-content-center'><span class='countdown-section'><span id='hour_" +
            row.id_admision +
            "' class='timer'>0</span><span class='countdown-period d-block'>Horas</span></span><span class='countdown-section'><span id='min_" +
            row.id_admision +
            "' class='timer min'>0</span><span class='countdown-period d-block'>Minutos</span></span><span class='countdown-section'><span id='sec_" +
            row.id_admision +
            "' class='timer sec'>0</span><span class='countdown-period d-block'>Segundos</span></span></div></div></div></div></div></div>"
          );
        },
        targets: 1,
      },
      {
        render: function (data, type, row) {
          var patient = row.nombre1 ? row.nombre1 : '';
          patient += row.nombre2 ? ' ' + row.nombre2 : '';
          patient += row.apellido1 ? ' ' + row.apellido1 : '';
          patient += row.apellido2 ? ' ' + row.apellido2 : '';
          return patient;
        },
        targets: 4,
      },
      {
        render: function (data, type, row) {
          var name = row.nombre_motivoatencion;
          switch (language['language']) {
            case 'en':
              name = row.nombre_motivoatencion_en;
              break;
            case 'pt':
              name = row.nombre_motivoatencion_pt;
              break;
            case 'fr':
              name = row.nombre_motivoatencion_fr;
              break;
          }
          return name;
        },
        targets: 5,
      },
    ],
    dom: 'Bfrtip',
    initComplete: function (setting, json) {
      let _this = this;
      if (json)
        json.map((val) => {
          let minutes = Number(
            moment().diff(moment(val.fecha_clasificacion), 'minutes')
          );
          let seconds =
            60 -
            Number(
              moment(moment().diff(moment(val.fecha_clasificacion)))
                .format('mm:ss')
                .split(':')[1]
            );
          switch (val.clasificacion_admision) {
            case 'Amarillo':
              let min_yellow = 9 - minutes;
              setInterval(function () {
                if (min_yellow >= 0) {
                  $(_this)
                    .find('.countdown #min_' + val.id_admision)
                    .html(
                      min_yellow > 0 && min_yellow < 10
                        ? '0' + min_yellow
                        : min_yellow
                    );
                  $(_this)
                    .find('.countdown #sec_' + val.id_admision)
                    .html(
                      seconds > 0 && seconds < 10 ? '0' + seconds : seconds
                    );
                  seconds--;
                  if (seconds == 0) {
                    seconds = min_yellow == 0 ? 0 : 59;
                    min_yellow--;
                  }
                } else {
                  $(_this)
                    .find('.countdown #sec_' + val.id_admision)
                    .html('0');
                }
              }, 1000);
              break;
            case 'Naranja':
              let min_orange = 14 - minutes;
              setInterval(function () {
                if (min_orange >= 0) {
                  $(_this)
                    .find('.countdown #min_' + val.id_admision)
                    .html(
                      min_orange > 0 && min_orange < 10
                        ? '0' + min_orange
                        : min_orange
                    );
                  $(_this)
                    .find('.countdown #sec_' + val.id_admision)
                    .html(
                      seconds > 0 && seconds < 10 ? '0' + seconds : seconds
                    );
                  seconds--;
                  if (seconds == 0) {
                    seconds = min_orange == 0 ? 0 : 59;
                    min_orange--;
                  }
                } else {
                  $(_this)
                    .find('.countdown #sec_' + val.id_admision)
                    .html('0');
                }
              }, 1000);
              break;
          }
        });
    },
  });

  tableEmergency.on('select', function (e, dt, type, indexes) {
    dataSelect = tableEmergency.rows(indexes).data()[0];
    idMA = dataSelect.id_atencionmedica;

    $.ajax({
      url: 'bd/admission.php',
      method: 'POST',
      dataType: 'json',
      data: {
        option: 'selectAttentionMedical',
        idMA: idMA,
      },
    })
      .done(function (data) {
        $('#tableMedical>tbody').empty();
        appendTableMedical(data);
        data
          ? $('#print-medical').prop('disabled', false)
          : $('#print-medical').prop('disabled', true);
      })
      .fail(function () {
        console.log('error');
      });

    $.ajax({
      url: 'bd/admission.php',
      method: 'POST',
      dataType: 'json',
      data: {
        option: 'selectAttentionExamen',
        idMA: idMA,
      },
    })
      .done(function (data) {
        $('#tableExamen>tbody').empty();
        appendTableExamen(data);
        data
          ? $('#print-examen').prop('disabled', false)
          : $('#print-examen').prop('disabled', true);
      })
      .fail(function () {
        console.log('error');
      });

    $('#collapseOne').collapse('show');
    /* Se actualiza el fromulario */
    $('#form_emergency').trigger('reset');
    $('select option').attr('selected', false);
    $('#general option[value=' + dataSelect.id_general + ']').attr(
      'selected',
      true
    );
    $('#cabeza option[value=' + dataSelect.id_cabeza + ']').attr(
      'selected',
      true
    );
    $('#ojo option[value=' + dataSelect.id_ojo + ']').attr('selected', true);
    $('#otorrino option[value=' + dataSelect.id_otorrino + ']').attr(
      'selected',
      true
    );
    $('#boca option[value=' + dataSelect.id_boca + ']').attr('selected', true);
    $('#cuello option[value=' + dataSelect.id_cuello + ']').attr(
      'selected',
      true
    );
    $('#torax option[value=' + dataSelect.id_torax + ']').attr(
      'selected',
      true
    );
    $('#corazon option[value=' + dataSelect.id_corazon + ']').attr(
      'selected',
      true
    );
    $('#pulmon option[value=' + dataSelect.id_pulmon + ']').attr(
      'selected',
      true
    );
    $('#abdomen option[value=' + dataSelect.id_abdomen + ']').attr(
      'selected',
      true
    );
    $('#pelvis option[value=' + dataSelect.id_pelvis + ']').attr(
      'selected',
      true
    );
    $('#rectal option[value=' + dataSelect.id_rectal + ']').attr(
      'selected',
      true
    );
    $('#genital option[value=' + dataSelect.id_genital + ']').attr(
      'selected',
      true
    );
    $('#extremidad option[value=' + dataSelect.id_extremidad + ']').attr(
      'selected',
      true
    );
    $('#neuro option[value=' + dataSelect.id_neuro + ']').attr(
      'selected',
      true
    );
    $('#piel option[value=' + dataSelect.id_piel + ']').attr('selected', true);
    if (dataSelect.cod_cie10) {
      var name = dataSelect.diagnostico;
      switch (language['language']) {
        case 'en':
          name = dataSelect.diagnostico_en;
          break;
        case 'pt':
          name = dataSelect.diagnostico_pt;
          break;
        case 'fr':
          name = dataSelect.diagnostico_fr;
          break;
      }
      $('#ec_cie10').val(dataSelect.cod_cie10 + ' ' + name);
    } else {
      $('#ec_cie10').val('');
    }
    $('#sign').html(dataSelect.sintomas);
    $('#description').html(dataSelect.descripcion_diagnostico);
    $('#other').html(dataSelect.otros);
  });

  function crud_ajax(field, val, option) {
    if (focus_value != val) {
      $.ajax({
        url: 'bd/admission.php',
        method: 'POST',
        data: {
          option: option,
          field: field,
          setField: val,
          idMA: idMA,
        },
      })
        .done(function () {
          tableEmergency.ajax.reload();
        })
        .fail(function () {
          console.log('error');
        });
    }
  }

  function appendTableMedical(data) {
    if (data) {
      $.each(data, function (index, value) {
        var name = value.producto;
        switch (language['language']) {
          case 'en':
            name = value.producto_en;
            break;
          case 'pt':
            name = value.producto_pt;
            break;
          case 'fr':
            name = value.producto_fr;
            break;
        }
        $('#tableMedical>tbody').append(
          "<tr id='" +
            value.id_atencionmedica_medicamentos +
            "'><td class='name'>" +
            name +
            "</td><td class='dosis'>" +
            value.dosis +
            "</td><td><button type='button' class='btn btn-danger delete-medical'><i class='fa fa-trash'></i> Eliminar</button></td></tr>"
        );
      });
      $('#print-medical').prop('disabled', false);
    }
  }

  function appendTableExamen(data) {
    if (data) {
      $.each(data, function (index, value) {
        var name = value.nombre_examen;
        switch (language['language']) {
          case 'en':
            name = value.nombre_examen_en;
            break;
          case 'pt':
            name = value.nombre_examen_pt;
            break;
          case 'fr':
            name = value.nombre_examen_fr;
            break;
        }
        $('#tableExamen>tbody').append(
          "<tr id='" +
            value.id_atencionmedica_examen +
            "'><td class='name'>" +
            name +
            "</td><td><button type='button' class='btn btn-danger delete-examen'><i class='fa fa-trash'></i> Eliminar</button></td></tr>"
        );
      });
      $('#print-examen').prop('disabled', false);
    }
  }

  function createDataTableMedical() {
    return $('#table-medical').DataTable({
      select: 'single',
      language: {
        url: 'lang/' + language['language'] + '.json',
      },
      ajax: {
        url: 'bd/admission.php',
        method: 'POST',
        data: { option: 'selectMedical', idMA: idMA },
        dataSrc: '',
      },
      deferRender: true,
      columns: [{ defaultContent: '' }],
      columnDefs: [
        {
          render: function (data, type, row) {
            var name = row.producto;
            switch (language['language']) {
              case 'en':
                name = row.producto_en;
                break;
              case 'pt':
                name = row.producto_pt;
                break;
              case 'fr':
                name = row.producto_fr;
                break;
            }
            return name;
          },
          targets: 0,
        },
      ],
      //dom: 'Bfrtip'
    });
  }

  function createDataTableExamen() {
    return $('#table-examen').DataTable({
      select: 'multiple',
      language: {
        url: 'lang/' + language['language'] + '.json',
      },
      ajax: {
        url: 'bd/admission.php',
        method: 'POST',
        data: { option: 'selectExamen', idMA: idMA },
        dataSrc: '',
      },
      deferRender: true,
      columns: [{ defaulContent: '' }],
      columnDefs: [
        {
          render: function (data, type, row) {
            var name = row.nombre_examen;
            switch (language['language']) {
              case 'en':
                name = row.nombre_examen_en;
                break;
              case 'pt':
                name = row.nombre_examen_pt;
                break;
              case 'fr':
                name = row.nombre_examen_fr;
                break;
            }
            return name;
          },
          targets: 0,
        },
      ],
      //dom: 'Bfrtip'
    });
  }

  $.ajax({
    url: 'bd/admission.php',
    method: 'POST',
    dataType: 'json',
    data: {
      option: 'loadSelectMedicalAttention',
      idH: $('#data-user').data('hospital'),
    },
  })
    .done(function (data) {
      if (data['name_hospital'])
        name_hospital = data['name_hospital'][0].nombre_hospital;
      $('#general').empty();
      $('#general').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#cabeza').empty();
      $('#cabeza').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#ojo').empty();
      $('#ojo').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#otorrino').empty();
      $('#otorrino').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#boca').empty();
      $('#boca').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#cuello').empty();
      $('#cuello').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#torax').empty();
      $('#torax').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#corazon').empty();
      $('#corazon').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#pulmon').empty();
      $('#pulmon').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#abdomen').empty();
      $('#abdomen').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#pelvis').empty();
      $('#pelvis').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#rectal').empty();
      $('#rectal').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#genital').empty();
      $('#genital').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#extremidad').empty();
      $('#extremidad').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#neuro').empty();
      $('#neuro').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#piel').empty();
      $('#piel').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      $('#disposal').empty();
      $('#disposal').append(
        $('<option value="0">-- Seleccione una opción --</option>')
      );

      var name = '';

      $.each(data['general'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_general;
            break;
          case 'en':
            name = value.nombre_general_en;
            break;
          case 'pt':
            name = value.nombre_general_pt;
            break;
          case 'fr':
            name = value.nombre_general_fr;
            break;
        }
        $('#general').append(
          $('<option value=' + value.id_general + '>' + name + '</option>')
        );
      });

      $.each(data['cabeza'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_cabeza;
            break;
          case 'en':
            name = value.nombre_cabeza_en;
            break;
          case 'pt':
            name = value.nombre_cabeza_pt;
            break;
          case 'fr':
            name = value.nombre_cabeza_fr;
            break;
        }
        $('#cabeza').append(
          $('<option value=' + value.id_cabeza + '>' + name + '</option>')
        );
      });

      $.each(data['ojo'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_ojo;
            break;
          case 'en':
            name = value.nombre_ojo_en;
            break;
          case 'pt':
            name = value.nombre_ojo_pt;
            break;
          case 'fr':
            name = value.nombre_ojo_fr;
            break;
        }
        $('#ojo').append(
          $('<option value=' + value.id_ojo + '>' + name + '</option>')
        );
      });

      $.each(data['otorrino'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_otorrino;
            break;
          case 'en':
            name = value.nombre_otorrino_en;
            break;
          case 'pt':
            name = value.nombre_otorrino_pt;
            break;
          case 'fr':
            name = value.nombre_otorrino_fr;
            break;
        }
        $('#otorrino').append(
          $('<option value=' + value.id_otorrino + '>' + name + '</option>')
        );
      });

      $.each(data['boca'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_boca;
            break;
          case 'en':
            name = value.nombre_boca_en;
            break;
          case 'pt':
            name = value.nombre_boca_pt;
            break;
          case 'fr':
            name = value.nombre_boca_fr;
            break;
        }
        $('#boca').append(
          $('<option value=' + value.id_boca + '>' + name + '</option>')
        );
      });

      $.each(data['cuello'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_cuello;
            break;
          case 'en':
            name = value.nombre_cuello_en;
            break;
          case 'pt':
            name = value.nombre_cuello_pt;
            break;
          case 'fr':
            name = value.nombre_cuello_fr;
            break;
        }
        $('#cuello').append(
          $('<option value=' + value.id_cuello + '>' + name + '</option>')
        );
      });

      $.each(data['torax'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_torax;
            break;
          case 'en':
            name = value.nombre_torax_en;
            break;
          case 'pt':
            name = value.nombre_torax_pt;
            break;
          case 'fr':
            name = value.nombre_torax_fr;
            break;
        }
        $('#torax').append(
          $('<option value=' + value.id_torax + '>' + name + '</option>')
        );
      });

      $.each(data['corazon'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_corazon;
            break;
          case 'en':
            name = value.nombre_corazon_en;
            break;
          case 'pt':
            name = value.nombre_corazon_pt;
            break;
          case 'fr':
            name = value.nombre_corazon_fr;
            break;
        }
        $('#corazon').append(
          $('<option value=' + value.id_corazon + '>' + name + '</option>')
        );
      });

      $.each(data['pulmon'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_pulmon;
            break;
          case 'en':
            name = value.nombre_pulmon_en;
            break;
          case 'pt':
            name = value.nombre_pulmon_pt;
            break;
          case 'fr':
            name = value.nombre_pulmon_fr;
            break;
        }
        $('#pulmon').append(
          $('<option value=' + value.id_pulmon + '>' + name + '</option>')
        );
      });

      $.each(data['abdomen'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_abdomen;
            break;
          case 'en':
            name = value.nombre_abdomen_en;
            break;
          case 'pt':
            name = value.nombre_abdomen_pt;
            break;
          case 'fr':
            name = value.nombre_abdomen_fr;
            break;
        }
        $('#abdomen').append(
          $('<option value=' + value.id_abdomen + '>' + name + '</option>')
        );
      });

      $.each(data['pelvis'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_pelvis;
            break;
          case 'en':
            name = value.nombre_pelvis_en;
            break;
          case 'pt':
            name = value.nombre_pelvis_pt;
            break;
          case 'fr':
            name = value.nombre_pelvis_fr;
            break;
        }
        $('#pelvis').append(
          $('<option value=' + value.id_pelvis + '>' + name + '</option>')
        );
      });

      $.each(data['rectal'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_rectal;
            break;
          case 'en':
            name = value.nombre_rectal_en;
            break;
          case 'pt':
            name = value.nombre_rectal_pt;
            break;
          case 'fr':
            name = value.nombre_rectal_fr;
            break;
        }
        $('#rectal').append(
          $('<option value=' + value.id_rectal + '>' + name + '</option>')
        );
      });

      $.each(data['genital'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_genital;
            break;
          case 'en':
            name = value.nombre_genital_en;
            break;
          case 'pt':
            name = value.nombre_genital_pt;
            break;
          case 'fr':
            name = value.nombre_genital_fr;
            break;
        }
        $('#genital').append(
          $('<option value=' + value.id_genital + '>' + name + '</option>')
        );
      });

      $.each(data['extremidad'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_extremidad;
            break;
          case 'en':
            name = value.nombre_extremidad_en;
            break;
          case 'pt':
            name = value.nombre_extremidad_pt;
            break;
          case 'fr':
            name = value.nombre_extremidad_fr;
            break;
        }
        $('#extremidad').append(
          $('<option value=' + value.id_extremidad + '>' + name + '</option>')
        );
      });

      $.each(data['neuro'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_neuro;
            break;
          case 'en':
            name = value.nombre_neuro_en;
            break;
          case 'pt':
            name = value.nombre_neuro_pt;
            break;
          case 'fr':
            name = value.nombre_neuro_fr;
            break;
        }
        $('#neuro').append(
          $('<option value=' + value.id_neuro + '>' + name + '</option>')
        );
      });

      $.each(data['piel'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.nombre_piel;
            break;
          case 'en':
            name = value.nombre_piel_en;
            break;
          case 'pt':
            name = value.nombre_piel_pt;
            break;
          case 'fr':
            name = value.nombre_piel_fr;
            break;
        }
        $('#piel').append(
          $('<option value=' + value.id_piel + '>' + name + '</option>')
        );
      });

      $.each(data['disposal'], function (index, value) {
        switch (language['language']) {
          case 'es':
            name = value.estado_alta;
            break;
          case 'en':
            name = value.estado_alta_en;
            break;
          case 'pt':
            name = value.estado_alta_pt;
            break;
          case 'fr':
            name = value.estado_alta_fr;
            break;
        }
        $('#disposal').append(
          $('<option value=' + value.id_estadoalta + '>' + name + '</option>')
        );
      });
    })
    .fail(function () {
      console.log('error');
    });

  $('select').on('change', function (e) {
    if (e.target.value != 0 && e.target.id != 'disposal') {
      crud_ajax('id_' + e.target.id, e.target.value, 'updateMedicalAttention');
    }
  });

  $('#modal-egress').on('hide.bs.modal', function () {
    $('#disposal').val(0);
  });

  $('#disposal').on('change', function (e) {
    e.target.value == 0
      ? $('.btn-egress').prop('disabled', true)
      : $('.btn-egress').prop('disabled', false);
  });

  $('.btn-egress').on('click', function () {
    crud_ajax(
      'id_estadoalta',
      $('#disposal option:selected').val(),
      'updateMedicalAttention'
    );
    $('#collapseOne').collapse('hide');
  });

  $('#sign').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#description').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#other').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#sign').on('focusout', function () {
    crud_ajax('sintomas', $(this).val(), 'updateMedicalAttention');
  });

  $('#description').on('focusout', function () {
    crud_ajax(
      'descripcion_diagnostico',
      $(this).val(),
      'updateMedicalAttention'
    );
  });

  $('#other').on('focusout', function () {
    crud_ajax('otros', $(this).val(), 'updateMedicalAttention');
  });

  var tableCIE10 = $('#tableCIE10').DataTable({
    select: 'single',
    language: {
      url: 'lang/' + language['language'] + '.json',
    },
    ajax: {
      url: 'bd/admission.php',
      method: 'POST',
      data: { option: 'selectCIE10' },
      dataSrc: '',
    },
    deferRender: true,
    columns: [{ data: 'codigo_cie' }, { defaultContent: '' }],
    columnDefs: [
      {
        render: function (data, type, row) {
          var name = row.diagnostico;
          switch (language['language']) {
            case 'en':
              name = row.diagnostico_en;
              break;
            case 'pt':
              name = row.diagnostico_pr;
              break;
            case 'fr':
              name = row.diagnostico_fr;
              break;
          }
          return name;
        },
        targets: 1,
      },
    ],
    //dom: 'Bfrtip'
  });

  $('#CIE10').on('show.bs.modal', function () {
    //tableCIE10.ajax.reload();
  });

  tableCIE10.on('select', function (e, dt, type, indexes) {
    $('.btnCIE10').prop('disabled', false);
  });

  tableCIE10.on('deselect', function (e, dt, type, indexes) {
    $('.btnCIE10').prop('disabled', true);
  });

  $('.btnCIE10').on('click', function () {
    var dataSelectCIE10 = tableCIE10.rows('.selected').data()[0];
    var name = dataSelectCIE10.diagnostico;
    switch (language['language']) {
      case 'en':
        name = dataSelectCIE10.diagnostico_en;
        break;
      case 'pt':
        name = dataSelectCIE10.diagnostico_pr;
        break;
      case 'fr':
        name = dataSelectCIE10.diagnostico_fr;
        break;
    }
    $('#ec_cie10').val(dataSelectCIE10.codigo_cie + ' ' + name);
    crud_ajax(
      'cod_cie10',
      dataSelectCIE10.codigo_cie,
      'updateMedicalAttention'
    );
  });

  var tableMedical = createDataTableMedical();

  tableMedical.on('select', function (e, dt, type, indexes) {
    $('.btn-medical-search').prop('disabled', false);
  });

  tableMedical.on('deselect', function (e, dt, type, indexes) {
    $('.btn-medical-search').prop('disabled', true);
  });

  $('.btn-medical').on('click', function () {
    $.ajax({
      url: 'bd/admission.php',
      method: 'POST',
      dataType: 'json',
      data: {
        option: 'insertMedical',
        idMA: idMA,
        idMAM: idMedical,
        dosis: $('#dosis').val(),
      },
    })
      .done(function (data) {
        appendTableMedical([
          {
            id_atencionmedica_medicamentos:
              data[0].id_atencionmedica_medicamentos,
            producto: $('#input-medical').val(),
            dosis: $('#dosis').val(),
          },
        ]);
      })
      .fail(function () {
        console.log('error');
      });
  });

  $('#print-medical').on('click', function () {
    var doc = new jsPDF();
    doc.setFontSize(18);
    doc.text(language['MedicalOrden'], 14, 22);
    doc.setFontSize(11);
    doc.setTextColor(100);

    var date = new Date();
    var dateNow =
      (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) +
      '/' +
      (date.getMonth() + 1 < 10
        ? '0' + (date.getMonth() + 1)
        : date.getMonth() + 1) +
      '/' +
      date.getFullYear() +
      ' ' +
      date.getHours() +
      ':' +
      date.getMinutes() +
      ':' +
      date.getSeconds();

    doc.autoTable({
      head: [[language['hospitalName'], language['expireDate']]],
      body: [[name_hospital, dateNow]],
      startY: 30,
    });

    var name = dataSelect.nombre1;
    if (dataSelect.nombre2) name += ' ' + dataSelect.nombre2;
    if (dataSelect.apellido1) name += ' ' + dataSelect.apellido1;
    if (dataSelect.apellido2) name += ' ' + dataSelect.apellido2;
    var age = dataSelect.edad + ' ' + dataSelect.nombre_edad;

    doc.autoTable({
      head: [
        [
          language['patientName'],
          language['identity'],
          language['age'],
          language['code'],
        ],
      ],
      body: [[name, dataSelect.num_doc, age, dataSelect.cod_cie10]],
    });

    var body = [];
    $('#tableMedical tr').each(function (index, value) {
      if (index > 0) {
        body.push([
          $(this).find('td.name').text(),
          $(this).find('td.dosis').text(),
        ]);
      }
    });

    doc.autoTable({
      head: [[language['medical'], language['dosis']]],
      body: body,
    });

    doc.autoTable({
      head: [[language['doctor']]],
      body: [[$('#data-user').data('user')]],
    });

    doc.save('orden_medicamentos.pdf');
  });

  $('#modal-medical').on('show.bs.modal', function () {
    tableMedical.destroy();
    tableMedical = createDataTableMedical();
    $('#input-medical').val('');
    $('#dosis').val('');
    $('.btn-medical').prop('disabled', true);
  });

  $('#modal-medical-search').on('show.bs.modal', function () {
    tableMedical.ajax.reload();
    $('.btn-medical-search').prop('disabled', true);
  });

  $('#dosis').on('keyup', function (e) {
    $.trim($(this).val()) != '' && $('#input-medical').val() != 0
      ? $('.btn-medical').prop('disabled', false)
      : $('.btn-medical').prop('disabled', true);
  });

  $(document).on('click', '.delete-medical', function (e) {
    $.ajax({
      url: 'bd/admission.php',
      method: 'POST',
      data: {
        option: 'deleteAttentionMedical',
        idMAM: e.target.parentElement.parentElement.id,
      },
    })
      .done(function (data) {
        $(e.target.parentElement.parentElement).remove();
        if ($('#tableMedical tbody tr').length == 0)
          $('#print-medical').prop('disabled', true);
      })
      .fail(function () {
        console.log('error');
      });
  });

  $('.btn-medical-search').on('click', function () {
    idMedical = tableMedical.rows('.selected').data()[0].id_medicamento;
    var name = tableMedical.rows('.selected').data()[0].producto;
    switch (language['language']) {
      case 'en':
        name = tableMedical.rows('.selected').data()[0].producto_en;
        break;
      case 'pt':
        name = tableMedical.rows('.selected').data()[0].producto_pt;
        break;
      case 'fr':
        name = tableMedical.rows('.selected').data()[0].producto_fr;
        break;
    }
    $('#input-medical').val(name);
    if ($.trim($('#dosis').val()) != '')
      $('.btn-medical').prop('disabled', false);
  });

  var tableExamen = createDataTableExamen();

  $('#modal-examen').on('show.bs.modal', function () {
    tableExamen.destroy();
    tableExamen = createDataTableExamen();
  });

  tableExamen.on('select', function (e, dt, type, indexes) {
    $('.btn-examen').prop('disabled', false);
  });

  tableExamen.on('deselect', function (e, dt, type, indexes) {
    if (tableExamen.rows('.selected').data().length == 0)
      $('.btn-examen').prop('disabled', true);
  });

  $(document).on('click', '.delete-examen', function (e) {
    $.ajax({
      url: 'bd/admission.php',
      method: 'POST',
      data: {
        option: 'deleteAttentionExamen',
        idMAE: e.target.parentElement.parentElement.id,
      },
    })
      .done(function (data) {
        $(e.target.parentElement.parentElement).remove();
        if ($('#tableExamen tbody tr').length == 0)
          $('#print-examen').prop('disabled', true);
      })
      .fail(function () {
        console.log('error');
      });
  });

  $('.btn-examen').on('click', function () {
    var dataSelectExamen = [];
    $.each(tableExamen.rows('.selected').data(), function (index, value) {
      dataSelectExamen.push(value.id_examen);
    });

    $.ajax({
      url: 'bd/admission.php',
      method: 'POST',
      dataType: 'json',
      data: {
        option: 'insertExamen',
        idMA: idMA,
        dataExamen: dataSelectExamen,
      },
    })
      .done(function (data) {
        var array = [];
        $.each(tableExamen.rows('.selected').data(), function (index, value) {
          var name = value.nombre_examen;
          switch (language['language']) {
            case 'en':
              name = value.nombre_examen_en;
              break;
            case 'pt':
              name = value.nombre_examen_pt;
              break;
            case 'fr':
              name = value.nombre_examen_fr;
              break;
          }
          array.push({
            id_atencionmedica_examen: data[index].id_atencionmedica_examen,
            nombre_examen: name,
          });
        });
        appendTableExamen(array);
      })
      .fail(function () {
        console.log('error');
      });
  });

  $('#print-examen').on('click', function () {
    var doc = new jsPDF();
    doc.setFontSize(18);
    doc.text(language['testOrden'], 14, 22);
    doc.setFontSize(11);
    doc.setTextColor(100);
    var date = new Date();
    var dateNow =
      (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) +
      '/' +
      (date.getMonth() + 1 < 10
        ? '0' + (date.getMonth() + 1)
        : date.getMonth() + 1) +
      '/' +
      date.getFullYear() +
      ' ' +
      date.getHours() +
      ':' +
      date.getMinutes() +
      ':' +
      date.getSeconds();
    /*doc.autoTable({
      head: [[language['hospitalName'], language['expireDate']]],
      body: [[name_hospital, dateNow]],
      startY: 30,
    });
    var name = dataSelect.nombre1;
    if (dataSelect.nombre2) name += ' ' + dataSelect.nombre2;
    if (dataSelect.apellido1) name += ' ' + dataSelect.apellido1;
    if (dataSelect.apellido2) name += ' ' + dataSelect.apellido2;
    var age = dataSelect.edad + ' ' + dataSelect.nombre_edad;
    doc.autoTable({
      head: [
        [
          language['patientName'],
          language['identity'],
          language['age'],
          language['code'],
        ],
      ],
      body: [[name, dataSelect.num_doc, age, dataSelect.cod_cie10]],
    });
    var body = [];
    $('#tableExamen tr').each(function (index, value) {
      if (index > 0) {
        body.push([$(this).find('td.name').text()]);
      }
    });
    doc.autoTable({
      head: [[language['test']]],
      body: body,
    });
    doc.autoTable({
      head: [[language['doctor']]],
      body: [[$('#data-user').data('user')]],
    });*/
    doc.save('orden_examenes.pdf');
  });
});
