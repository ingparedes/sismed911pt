$(function () {
  var id_maestro,
    id_patient,
    id_evalC,
    focus_value,
    dataSelect,
    cod_ambulance,
    language = {
      language: localStorage.getItem('language'),
      new_case: localStorage.getItem('language_new_case'),
      map: localStorage.getItem('language_map'),
      select: localStorage.getItem('language_select'),
    };

  var tableMaestro = $('#tableMaestro').DataTable({
    select: 'single',
    pageLength: 5,
    language: {
      url: 'lang/' + language['language'] + '.json',
    },
    ajax: {
      url: 'bd/crud.php',
      method: 'POST',
      data: { option: 'selectInterhMaestro' },
      dataSrc: '',
    },
    deferRender: true,
    columns: [
      { data: 'cod_casointerh' },
      { data: 'fechahorainterh' },
      { defaultContent: '' },
      { defaultContent: '' },
      { data: 'nombre_hospital' },
      { data: 'nombre_hospital_destino' },
      { data: 'prioridadinterh' },
      { data: 'nombre_accion_es' },
      {
        defaultContent:
          '<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalR"><i class="fa fa-times-circle" aria-hidden="true"></i></button>',
      },
    ],
    columnDefs: [
      {
        render: function (data, type, row) {
          var diff = Math.abs(new Date() - new Date(row.fechahorainterh));
          var minutes = Math.floor(diff / 1000 / 60);
          return (
            '<i class="fa fa-clock-o" aria-hidden="true"></i> ' +
            minutes +
            ' MIN'
          );
        },
        targets: 2,
      },
      {
        render: function (data, type, row) {
          return row.nombre1
            ? row.nombre1
            : '' + ' ' + row.nombre2
            ? row.nombre2
            : '' + ' ' + row.apellido1
            ? row.apellido1
            : '' + ' ' + row.apellido2
            ? row.apellido2
            : '';
        },
        targets: 3,
      },
    ],
    //rowId: 'extn',
    dom: 'Bfrtip',
    initComplete: function () {
      $('#tableMaestro_wrapper').prepend(
        "<div class='btn-dataTable d-flex'><a class='btn btn-secondary mr-3 new-case' href='inteh_maestroadd.php' role='button'><i class='fa fa-clinic-medical'> " +
          language['new_case'] +
          "</i></a><a class='btn btn-secondary map' href='http://144.126.134.106:8082/' role='button'><i class='fa fa-map-marked-alt'> " +
          language['map'] +
          '</i></a></div>'
      );
      $('#tableMaestro_wrapper .btn.new-case').on('click', function () {
        return ew.modalDialogShow({
          lnk: this,
          btn: 'AddBtn',
          url: 'interh_maestroadd.php',
        });
      });
    },
  });

  tableMaestro.on('draw', function () {
    $('.fa-clock-o').parent().css('color', 'red');
  });

  tableMaestro.on('select', function (e, dt, type, indexes) {
    $('.form-control').removeClass('is-invalid');
    if (type === 'row') {
      dataSelect = tableMaestro.rows(indexes).data()[0];
      id_maestro = dataSelect.cod_casointerh;
      id_patient = dataSelect.id_paciente;
      id_evalC = dataSelect.id_evaluacionclinica;
      cod_ambulance = dataSelect.cod_ambulancia;

      $('span.case').text(' - Caso: ' + id_maestro);

      $.ajax({
        url: './bd/crud.php',
        method: 'POST',
        dataType: 'json',
        data: {
          option: 'loadSelect',
        },
      })
        .done(function (data) {
          var name = '';
          $('#p_ide').empty();
          $('#p_ide').append(
            $("<option value='0'>" + language['select'] + '</option>')
          );
          $.each(data['ide'], function (index, value) {
            switch (language['language']) {
              case 'es':
                name = value.descripcion;
                break;
              case 'en':
                name = value.descripcion_en;
                break;
              case 'pt':
                name = value.descripcion_pr;
                break;
              case 'fr':
                name = value.descripcion_fr;
                break;
            }
            $('#p_ide').append(
              $("<option value='" + value.id_tipo + "'>" + name + '</option>')
            );
            if (dataSelect.tipo_doc == value.id_tipo) {
              $('#p_ide option[value=' + value.id_tipo + ']').attr(
                'selected',
                true
              );
              changeIDE(false);
            }
          });

          $('#p_typeage').empty();
          $('#p_typeage').append(
            $("<option value='0'>" + language['select'] + '</option>')
          );
          $.each(data['age'], function (index, value) {
            switch (language['language']) {
              case 'es':
                name = value.nombre_edad;
                break;
              case 'en':
                name = value.nombre_edad_en;
                break;
              case 'pt':
                name = value.nombre_edad_pr;
                break;
              case 'fr':
                name = value.nombre_edad_fr;
                break;
            }
            $('#p_typeage').append(
              $("<option value='" + value.id_edad + "'>" + name + '</option>')
            );
            if (dataSelect.cod_edad == value.id_edad) {
              $('#p_typeage option[value=' + value.id_edad + ']').attr(
                'selected',
                true
              );
            }
          });

          $('#ec_triage').empty();
          $('#ec_triage').append(
            $(
              "<option value='0' style='color: initial'>" +
                language['select'] +
                '</option>'
            )
          );
          var color = '';
          $.each(data['triage'], function (index, value) {
            switch (language['language']) {
              case 'es':
                name = value.nombre_triage_es;
                break;
              case 'en':
                name = value.nombre_triage_en;
                break;
              case 'pr':
                name = value.nombre_triage_pr;
                break;
              case 'fr':
                name = value.nombre_triage_fr;
                break;
            }
            switch (value.nombre_triage_es) {
              case 'Crítico':
                color = 'red';
                break;
              case 'Severo':
                color = 'orange';
                break;
              case 'Moderado':
                color = 'yellow';
                break;
              case 'Leve':
                color = 'green';
                break;
            }
            $('#ec_triage').append(
              $(
                "<option value='" +
                  value.id_triage +
                  "'class='fa' style='color: " +
                  color +
                  "'>&#xf0c8; " +
                  name +
                  '</option>'
              )
            );
            if (dataSelect.triage == value.id_triage)
              $('#ec_triage option[value=' + value.id_triage + ']').attr(
                'selected',
                true
              );
            paintSelect();

            $('#ec_type').empty();
            $('#ec_type').append(
              $("<option value='0'>" + language['select'] + '</option>')
            );
            $.each(data['type'], function (index, value) {
              switch (language['language']) {
                case 'es':
                  name = value.nombre_tipopaciente;
                  break;
                case 'en':
                  name = value.nombre_tipopaciente_en;
                  break;
                case 'pt':
                  name = value.nombre_tipopaciente_pr;
                  break;
                case 'fr':
                  name = value.nombre_tipopaciente_fr;
                  break;
              }
              $('#ec_type').append(
                $(
                  "<option value='" +
                    value.id_tipopaciente +
                    "'>" +
                    name +
                    '</option>'
                )
              );
              if (dataSelect.id_tipopaciente == value.id_tipopaciente) {
                $('#ec_type option[value=' + value.id_tipopaciente + ']').attr(
                  'selected',
                  true
                );
              }
            });
          });
        })
        .fail(function () {
          console.log('error');
        });

      //Se actualiza formulario paciente
      $('#form_paciente').trigger('reset');
      $('#p_number').val(dataSelect.num_doc);
      $('#p_exp').val(dataSelect.expendiente);
      $('#p_date').val(dataSelect.fecha_nacido);
      $('#p_age').val(dataSelect.edad);
      $('#p_name1').val(dataSelect.nombre1);
      $('#p_name2').val(dataSelect.nombre2);
      $('#p_lastname1').val(dataSelect.apellido1);
      $('#p_lastname2').val(dataSelect.apellido2);
      switch (dataSelect.genero) {
        case '1':
          $('#p_genM').prop('checked', true);
          break;
        case '2':
          $('#p_genF').prop('checked', true);
          break;
        case '3':
          $('#p_genO').prop('checked', true);
          break;
      }
      $('#p_nickname').val(dataSelect.apodo);
      $('#p_nationality').val(dataSelect.nacionalidad);
      $('#p_phone').val(dataSelect.telefono_paciente);
      $('#p_segS').val(dataSelect.aseguradro);
      $('#p_address').val(dataSelect.direccion_paciente);
      $('#p_obs').html(dataSelect.observacion_paciente);

      //Se actualiza formulario evaluación clínica
      $('#form_evalClinic').trigger('reset');
      $('#ec_ta').val(dataSelect.sv_tx);
      $('#ec_fc').val(dataSelect.sv_fc);
      $('#ec_fr').val(dataSelect.sv_fr);
      $('#ec_temp').val(dataSelect.sv_temp);
      $('#ec_gl').val(dataSelect.sv_gl);
      $('#ec_sato2').val(dataSelect.sv_sato2);
      $('#ec_gli').val(dataSelect.sv_gli);
      $('#ec_talla').val(dataSelect.talla);
      $('#ec_peso').val(dataSelect.peso);
      if (dataSelect.cod_diag_cie) {
        var name = dataSelect.cie10_diagnostico;
        switch (language['language']) {
          case 'en':
            name = dataSelect.cie10_diagnostico_en;
            break;
          case 'pt':
            name = dataSelect.cie10_diagnostico_pr;
            break;
          case 'fr':
            name = dataSelect.cie10_diagnostico_fr;
            break;
        }
        $('#ec_cie10').val(dataSelect.cod_diag_cie + ' ' + name);
      }
      $('#ec_cuadro').html(dataSelect.c_clinico);
      $('#ec_examen').html(dataSelect.examen_fisico);
      $('#ec_antec').html(dataSelect.antecedentes);
      $('#ec_parac').html(dataSelect.paraclinicos);
      $('#ec_tratam').html(dataSelect.tratamiento);
      $('#ec_inform').html(dataSelect.diagnos_txt);

      //Se actualiza formulario hospital
      $('#form_hospital').trigger('reset');
      if (dataSelect.hospital_destinointerh)
        $('#hosp_dest').val(
          dataSelect.hospital_destinointerh +
            ' ' +
            dataSelect.nombre_hospital_destino
        );
      $('#hosp_nomMed').val(dataSelect.nombre_recibe);
      $('#hosp_telMed').val(dataSelect.telefonointerh);

      //Se actualiza formulario ambulancia
      $('#form_ambulance').trigger('reset');
      if (dataSelect.hora_asigna)
        $('#date_asig').val(dataSelect.hora_asigna.replace(' ', 'T'));
      if (dataSelect.hora_llegada)
        $('#date_lleg').val(dataSelect.hora_llegada.replace(' ', 'T'));
      if (dataSelect.hora_inicio)
        $('#date_ini').val(dataSelect.hora_inicio.replace(' ', 'T'));
      if (dataSelect.hora_destino)
        $('#date_dest').val(dataSelect.hora_destino.replace(' ', 'T'));
      if (dataSelect.hora_preposicion)
        $('#date_base').val(dataSelect.hora_preposicion.replace(' ', 'T'));
      $('#conductor').val(dataSelect.conductor);
      $('#medico').val(dataSelect.medico);
      $('#paramedico').val(dataSelect.paramedico);
      $('#obs').html(dataSelect.observacion_ambulancia);
      if (dataSelect.cod_ambulancia) {
        $('#serviceAmbulance').val(
          dataSelect.cod_ambulancias + ' - ' + dataSelect.placas
        );
        $('.change').prop('disabled', false);
      } else {
        $('.change').prop('disabled', true);
      }

      $('#collapseOne').collapse('show');
    }
  });

  function crud_ajax(field, val, option) {
    if (focus_value != val) {
      $.ajax({
        url: 'bd/crud.php',
        method: 'POST',
        data: {
          option: option,
          idM: id_maestro,
          idP: id_patient,
          idEC: id_evalC,
          codA: cod_ambulance,
          setField: val,
          field: field,
        },
      })
        .done(function () {
          tableMaestro.ajax.reload();
        })
        .fail(function () {
          console.log('error');
        });
    }
  }

  function paintSelect() {
    switch ($('#ec_triage option:selected').text().split(' ')[1]) {
      case 'Crítico':
        $('#ec_triage').css('color', 'red');
        break;
      case 'Severo':
        $('#ec_triage').css('color', 'orange');
        break;
      case 'Moderado':
        $('#ec_triage').css('color', 'yellow');
        break;
      case 'Leve':
        $('#ec_triage').css('color', 'green');
        break;
      default:
        $('#ec_triage').css('color', 'initial');
        break;
    }
  }

  function changeIDE(crud) {
    if ($('#p_ide option:selected').val() != 0) {
      if ($('#p_ide option:selected').val() == 1) {
        if (number_validate($('#p_number').val())) {
          $('.search_data_user').removeClass('d-none').addClass('d-flex');
          if (crud)
            crud_ajax('tipo_doc', $('#p_ide option:selected').val(), 'updateP');
        }
      } else {
        $('.search_data_user').removeClass('d-flex').addClass('d-none');
        $('.form-control#p_number').removeClass('is-invalid');
        if (crud) {
          crud_ajax('tipo_doc', $('#p_ide option:selected').val(), 'updateP');
          crud_ajax('num_doc', $('#p_number').val(), 'updateP');
        }
      }
    } else {
      $('.search_data_user').removeClass('d-flex').addClass('d-none');
      $('.form-control#p_number').removeClass('is-invalid');
    }
  }

  function edad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad, tipo;

    //Calculamos años
    var anno = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
      anno--;
    }

    // calculamos los meses
    var meses = 0;
    if (hoy.getMonth() > cumpleanos.getMonth()) {
      meses = hoy.getMonth() - cumpleanos.getMonth();
    } else if (hoy.getMonth() < cumpleanos.getMonth()) {
      meses = 12 - (cumpleanos.getMonth() - hoy.getMonth());
    } else if (
      hoy.getMonth() == cumpleanos.getMonth() &&
      hoy.getDate() > cumpleanos.getDate()
    ) {
      if (hoy.getMonth() - cumpleanos.getMonth() == 0) {
        meses = 0;
      } else {
        meses = 11;
      }
    }

    // Obtener días: día actual - día de cumpleaños
    let dias = hoy.getDate() - cumpleanos.getDate();
    if (dias < 0) {
      // Si días es negativo, día actual es mayor al de cumpleaños,
      // hay que restar 1 mes, si resulta menor que cero, poner en 11
      meses = meses - 1 < 0 ? 11 : meses - 1;
      // Y obtener días faltantes
      dias = 30 + dias;
    }

    if (anno > 0) {
      edad = anno;
      tipo = 1;
      console.log(`Tu edad es de ${anno} años`);
    } else if (meses > 0) {
      edad = meses;
      tipo = 2;
      console.log(`Tu edad es de ${meses} meses`);
    } else {
      edad = dias;
      tipo = 3;
      console.log(`Tu edad es de ${dias} días`);
    }
    $('#p_age').val(edad);
    $('#p_typeage').val(tipo);
    console.log(`Tu edad es de ${anno} años, ${meses} meses, ${dias} días`);
  }

  function load_token() {
    var key = 'd2eb62eb-5d9f-4c3f-95d2-47d5d9df934b';
    var token = null;
    $.ajax({
      type: 'POST',
      url: 'bd/getDataUser.php',
      data: {
        option: 'gettoken',
        key: key,
      },
      dataType: 'html',
      async: false,
    })
      .done(function (response) {
        token = response;
      })
      .fail(function (error) {
        console.log(error);
      });
    return token;
  }

  function load_datos() {
    var token = load_token();
    if (token) {
      $.ajax({
        type: 'POST',
        url: 'bd/getDataUser.php',
        data: {
          option: 'getdatos',
          cd: $('#p_number').val(),
          token: token,
        },
        dataType: 'JSON',
      })
        .done(function (response) {
          if (response) {
            var names = response.nombres.split(' ');
            $('#p_name1').val(names[0]);
            if (names.length > 1) $('#p_name2').val(names[1]);
            $('#p_lastname1').val(response.apellido1);
            $('#p_lastname2').val(response.apellido2);
            if (response.sexo == 'M') {
              $('#p_genM').prop('checked', true);
            } else if (sexo == 'F') {
              $('#p_genF').prop('checked', true);
            }
            $('#p_nationality').val(response.nacionalidad);
            $('#p_date').val(response.fecha_nacimiento);
            edad(response.fecha_nacimiento);
            $.ajax({
              url: 'bd/crud.php',
              method: 'POST',
              data: {
                option: 'updatePatient',
                idP: id_patient,
                user: JSON.stringify({
                  name1: $('#p_name1').val(),
                  name2: $('#p_name2').val(),
                  lastname1: $('#p_lastname1').val(),
                  lastname2: $('#p_lastname2').val(),
                  gender: $('input:checked').val(),
                  nationality: $('#p_nationality').val(),
                  date: $('#p_date').val(),
                  age: $('#p_age').val(),
                  typeage: $('#p_typeage').val(),
                }),
              },
            })
              .done(function (response) {
                console.log(response);
              })
              .fail(function (error) {
                console.log(error);
              });
          } else {
            console.log('error');
          }
        })
        .fail(function (error) {
          console.log(error);
        });
    }
  }

  //formulario paciente
  $('#p_number').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_exp').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_date').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_age').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_name1').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_name2').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_lastname1').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_lastname2').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_nickname').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_nationality').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_phone').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_segS').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_address').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_obs').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#p_ide').on('change', function () {
    changeIDE(true);
  });

  /* Validación de número de cédula dominicana */
  $('#p_number').on('keyup', function () {
    if ($('#p_ide option:selected').val() == 1) {
      if (number_validate($(this).val())) {
        $('.search_data_user').removeClass('d-none').addClass('d-flex');
        crud_ajax('num_doc', $(this).val(), 'updateP');
        crud_ajax('tipo_doc', $('#p_ide option:selected').val(), 'updateP');
      } else {
        $('.search_data_user').removeClass('d-flex').addClass('d-none');
      }
    } else {
      $('.search_data_user').removeClass('d-flex').addClass('d-none');
      crud_ajax('num_doc', $(this).val(), 'updateP');
    }
  });
  /* fin validación */

  $('.search_data_user').on('click', function () {
    load_datos();
  });

  $('#p_exp').on('focusout', function () {
    crud_ajax('expendiente', $(this).val(), 'updateP');
  });

  $('#p_date').on('focusout', function () {
    crud_ajax('fecha_nacido', $(this).val(), 'updateP');
    edad($(this).val());
    $('#p_age').trigger('focusout');
    $('#p_typeage').trigger('change');
  });

  $('#p_age').on('focusout', function () {
    crud_ajax('edad', $(this).val(), 'updateP');
  });

  $('#p_typeage').on('change', function () {
    if ($('#p_typeage option:selected').val() != 0)
      crud_ajax('cod_edad', $('#p_typeage option:selected').val(), 'updateP');
  });

  $('#p_name1').on('focusout', function () {
    crud_ajax('nombre1', $(this).val(), 'updateP');
  });

  $('#p_name2').on('focusout', function () {
    crud_ajax('nombre2', $(this).val(), 'updateP');
  });

  $('#p_lastname1').on('focusout', function () {
    crud_ajax('apellido1', $(this).val(), 'updateP');
  });

  $('#p_lastname2').on('focusout', function () {
    crud_ajax('apellido2', $(this).val(), 'updateP');
  });

  $('.gender').on('click', function () {
    if (
      !dataSelect.genero ||
      (dataSelect.genero == 1 &&
        ($('input:checked').val() == 2 || $('input:checked').val() == 3)) ||
      (dataSelect.genero == 2 &&
        ($('input:checked').val() == 1 || $('input:checked').val() == 3)) ||
      (dataSelect.genero == 3 &&
        ($('input:checked').val() == 1 || $('input:checked').val() == 2))
    )
      crud_ajax('genero', $('input:checked').val(), 'updateP');
  });

  $('#p_nickname').on('focusout', function () {
    crud_ajax('apodo', $(this).val(), 'updateP');
  });

  $('#p_nationality').on('focusout', function () {
    crud_ajax('nacionalidad', $(this).val(), 'updateP');
  });

  $('#p_phone').on('focusout', function () {
    crud_ajax('telefono', $(this).val(), 'updateP');
  });

  $('#p_segS').on('focusout', function () {
    crud_ajax('aseguradro', $(this).val(), 'updateP');
  });

  $('#p_address').on('focusout', function () {
    crud_ajax('direccion', $(this).val(), 'updateP');
  });

  $('#p_obs').on('focusout', function () {
    crud_ajax('observacion', $(this).val(), 'updateP');
  });
  //end formulario paciente

  //formulario evaluación clínica
  $('#ec_ta').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_fc').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_fr').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_temp').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_gl').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_sato2').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_gli').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_talla').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_peso').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_cuadro').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_examen').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_antec').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_parac').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_tratam').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_inform').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#ec_ta').on('focusout', function () {
    crud_ajax('sv_tx', $(this).val(), 'updateInterhEC');
  });

  $('#ec_fc').on('focusout', function () {
    crud_ajax('sv_fc', $(this).val(), 'updateInterhEC');
  });

  $('#ec_fr').on('focusout', function () {
    crud_ajax('sv_fr', $(this).val(), 'updateInterhEC');
  });

  $('#ec_temp').on('focusout', function () {
    crud_ajax('sv_temp', $(this).val(), 'updateInterhEC');
  });

  $('#ec_gl').on('focusout', function () {
    crud_ajax('sv_gl', $(this).val(), 'updateInterhEC');
  });

  $('#ec_sato2').on('focusout', function () {
    crud_ajax('sv_sato2', $(this).val(), 'updateInterhEC');
  });

  $('#ec_gli').on('focusout', function () {
    crud_ajax('sv_gli', $(this).val(), 'updateInterhEC');
  });

  $('#ec_talla').on('focusout', function () {
    crud_ajax('talla', $(this).val(), 'updateInterhEC');
  });

  $('#ec_peso').on('focusout', function () {
    crud_ajax('peso', $(this).val(), 'updateInterhEC');
  });

  $('#ec_triage').on('change', function () {
    paintSelect();
    if (updateEC && $('#ec_triage option:selected').val() != 0)
      crud_ajax(
        'triage',
        $('#ec_triage option:selected').val(),
        'updateInterhEC'
      );
    updateEC = true;
  });

  $('#ec_type').on('change', function () {
    if ($('#ec_type option:selected').val() != 0)
      crud_ajax(
        'tipo_paciente',
        $('#ec_type option:selected').val(),
        'updateInterhEC'
      );
  });

  $('#ec_cuadro').on('focusout', function () {
    crud_ajax('c_clinico', $(this).val(), 'updateInterhEC');
  });

  $('#ec_examen').on('focusout', function () {
    crud_ajax('examen_fisico', $(this).val(), 'updateInterhEC');
  });

  $('#ec_antec').on('focusout', function () {
    crud_ajax('antecedentes', $(this).val(), 'updateInterhEC');
  });

  $('#ec_parac').on('focusout', function () {
    crud_ajax('paraclinicos', $(this).val(), 'updateInterhEC');
  });

  $('#ec_tratam').on('focusout', function () {
    crud_ajax('tratamiento', $(this).val(), 'updateInterhEC');
  });

  $('#ec_inform').on('focusout', function () {
    crud_ajax('diagnos_txt', $(this).val(), 'updateInterhEC');
  });
  //end formulario evaluación clínica

  //formulario hospital
  $('#hosp_nomMed').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#hosp_telMed').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#hosp_nomMed').on('focusout', function () {
    crud_ajax('nombre_recibe', $(this).val(), 'updateInterhM');
  });

  $('#hosp_telMed').on('focusout', function () {
    crud_ajax('telefonointerh', $(this).val(), 'updateInterhM');
  });
  //end formulario hospital

  //Formulario ambulancia
  $('#date_asig').on('focus', function () {
    focus_value = $(this).val().replace('T', ' ');
  });

  $('#date_lleg').on('focus', function () {
    focus_value = $(this).val().replace('T', ' ');
  });

  $('#date_ini').on('focus', function () {
    focus_value = $(this).val().replace('T', ' ');
  });

  $('#date_dest').on('focus', function () {
    focus_value = $(this).val().replace('T', ' ');
  });

  $('#date_base').on('focus', function () {
    focus_value = $(this).val().replace('T', ' ');
  });

  $('#conductor').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#medico').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#paramedico').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#obs').on('focus', function () {
    focus_value = $(this).val();
  });

  $('#date_asig').on('focusout', function () {
    crud_ajax('hora_asigna', $(this).val().replace('T', ' '), 'updateInterhSA');
  });

  $('#date_lleg').on('focusout', function () {
    crud_ajax(
      'hora_llegada',
      $(this).val().replace('T', ' '),
      'updateInterhSA'
    );
  });

  $('#date_ini').on('focusout', function () {
    crud_ajax('hora_inicio', $(this).val().replace('T', ' '), 'updateInterhSA');
  });

  $('#date_dest').on('focusout', function () {
    crud_ajax(
      'hora_destino',
      $(this).val().replace('T', ' '),
      'updateInterhSA'
    );
  });

  $('#date_base').on('focusout', function () {
    crud_ajax(
      'hora_preposicion',
      $(this).val().replace('T', ' '),
      'updateInterhSA'
    );
  });

  $('#conductor').on('focusout', function () {
    crud_ajax('conductor', $(this).val(), 'updateInterhSA');
  });

  $('#medico').on('focusout', function () {
    crud_ajax('medico', $(this).val(), 'updateInterhSA');
  });

  $('#paramedico').on('focusout', function () {
    crud_ajax('paramedico', $(this).val(), 'updateInterhSA');
  });

  $('#obs').on('focusout', function () {
    crud_ajax('observaciones', $(this).val(), 'updateInterhSA');
  });
  //end formulario ambulancia

  var tableCIE10 = $('#tableCIE10').DataTable({
    select: 'single',
    language: {
      url: 'lang/' + language['language'] + '.json',
    },
    ajax: {
      url: 'bd/crud.php',
      method: 'POST',
      data: { option: 'selectCIE10' },
      dataSrc: '',
    },
    deferRender: true,
    columns: [{ data: 'codigo_cie' }, { defaultContent: '' }],
    columnDefs: [
      {
        render: function (data, type, row) {
          var diag = row.diagnostico;
          switch (language['language']) {
            case 'en':
              diag = row.diagnostico_en;
              break;
            case 'pt':
              diag = row.diagnostico_pr;
              break;
            case 'fr':
              diag = row.diagnostico_fr;
              break;
          }
          return diag;
        },
        targets: 1,
      },
    ],
    //dom: 'Bfrtip'
  });

  $('#CIE10').on('show.bs.modal', function () {
    tableCIE10.ajax.reload();
  });

  tableCIE10.on('select', function (e, dt, type, indexes) {
    $('.btnCIE10').prop('disabled', false);
  });

  tableCIE10.on('deselect', function (e, dt, type, indexes) {
    $('.btnCIE10').prop('disabled', true);
  });

  $('.btnCIE10').on('click', function () {
    var dataSelectCIE10 = tableCIE10.rows('.selected').data();
    $('#ec_cie10').val(
      dataSelectCIE10[0].codigo_cie + ' ' + dataSelectCIE10[0].diagnostico
    );
    crud_ajax('cod_diag_cie', dataSelectCIE10[0].codigo_cie, 'updateInterhEC');
  });

  var tableHosp = $('#tableHosp').DataTable({
    select: 'single',
    language: {
      url: 'lang/' + language['language'] + '.json',
    },
    ajax: {
      url: 'bd/crud.php',
      method: 'POST',
      data: { option: 'selectHosp' },
      dataSrc: '',
    },
    deferRender: true,
    columns: [{ data: 'id_hospital' }, { data: 'nombre_hospital' }],
    //dom: 'Bfrtip'
  });

  $('#hosp').on('show.bs.modal', function () {
    tableHosp.ajax.reload();
  });

  tableHosp.on('select', function (e, dt, type, indexes) {
    $('.btnHosp').prop('disabled', false);
  });

  tableHosp.on('deselect', function (e, dt, type, indexes) {
    $('.btnHosp').prop('disabled', true);
  });

  $('.btnHosp').on('click', function () {
    var dataSelectHosp = tableHosp.rows('.selected').data();
    $('#hosp_dest').val(
      dataSelectHosp[0].id_hospital + ' ' + dataSelectHosp[0].nombre_hospital
    );
    crud_ajax(
      'hospital_destinointerh',
      dataSelectHosp[0].id_hospital,
      'updateInterhM'
    );
  });

  $('#modalR').on('show.bs.modal', function () {
    $('#razon').html('');
    $.ajax({
      url: './bd/crud.php',
      method: 'POST',
      dataType: 'json',
      data: {
        option: 'selectCierre',
      },
    })
      .done(function (data) {
        $('#selectRazon').empty();
        $('#selectRazon').append(
          $("<option value='0'>" + language['select'] + '</option>')
        );
        $.each(data, function (index, value) {
          $('#selectRazon').append(
            $(
              "<option value='" +
                value.id_tranlado_fallido +
                "'>" +
                value.tipo_cierrecaso_es +
                '</option>'
            )
          );
        });
      })
      .fail(function () {
        console.log('error');
      });
  });

  $('#razon').keyup(function () {
    $(this).val().length > 0 && $('#selectRazon').val() != 0
      ? $('.btnRazon').prop('disabled', false)
      : $('.btnRazon').prop('disabled', true);
  });

  $('#selectRazon').on('change', function () {
    $('#razon').val().length > 0 && $(this).val() != 0
      ? $('.btnRazon').prop('disabled', false)
      : $('.btnRazon').prop('disabled', true);
  });

  $('.btnRazon').on('click', function () {
    $.ajax({
      url: 'bd/crud.php',
      method: 'POST',
      data: {
        option: 'cerrarInterhCaso',
        idM: id_maestro,
        setField: $('#selectRazon').val(),
        reason: $('#razon').val(),
      },
    })
      .done(function () {
        tableMaestro.ajax.reload();
      })
      .fail(function () {
        console.log('error');
      });
  });

  var tableAmbulance = $('#tableAmbulance').DataTable({
    select: 'single',
    language: {
      url: 'lang/' + language['language'] + '.json',
    },
    ajax: {
      url: 'bd/crud.php',
      method: 'POST',
      data: { option: 'selectAmbulance' },
      dataSrc: '',
    },
    deferRender: true,
    columns: [{ data: 'cod_ambulancias' }, { data: 'placas' }],
    //dom: 'Bfrtip'
  });

  $('#modalAmbulance').on('show.bs.modal', function () {
    tableAmbulance.ajax.reload();
  });

  tableAmbulance.on('select', function (e, dt, type, indexes) {
    $('.btnAmbulance').prop('disabled', false);
  });

  tableAmbulance.on('deselect', function (e, dt, type, indexes) {
    $('.btnAmbulance').prop('disabled', true);
  });

  $('.btnAmbulance').on('click', function () {
    var dataSelectAmbulance = tableAmbulance.rows('.selected').data();
    var option = dataSelect.cod_ambulancia
      ? 'updateInterhSA'
      : 'insertInterhSA';
    $('#serviceAmbulance').val(
      dataSelectAmbulance[0].cod_ambulancias +
        ' - ' +
        dataSelectAmbulance[0].placas
    );
    crud_ajax('cod_ambulancia', dataSelectAmbulance[0].cod_ambulancias, option);
    $('.change').prop('disabled', false);
  });

  /* Validación de número de cédula dominicana
   * con longitud de 11 caracteres numéricos o 13 caracteres incluyendo los dos guiones de presentación
   * ejemplo sin guiones 00116454281, ejemplo con guiones 001-1645428-1
   * el retorno es 1 para el caso de cédula válida y 0 para la no válida
   */
  function number_validate(num) {
    var c = num.replace(/-/g, '');
    var number = c.substr(0, c.length - 1);
    var verificador = c.substr(c.length - 1, 1);
    var suma = 0;
    var numberValidate = false;
    if (num.length < 11) {
      $('.form-control#p_number').addClass('is-invalid');
      return false;
    }
    for (i = 0; i < number.length; i++) {
      var mod = 2;
      if (i % 2 == 0) mod = 1;
      var res = number.substr(i, 1) * mod;
      if (res > 9) {
        res = res.toString();
        var uno = res.substr(0, 1);
        var dos = res.substr(1, 1);
        res = eval(uno) + eval(dos);
      }
      suma += eval(res);
    }
    var el_numero = (10 - (suma % 10)) % 10;
    if (el_numero == verificador && number.substr(0, 3) != '000') {
      numberValidate = true;
    }
    numberValidate
      ? $('.form-control#p_number').removeClass('is-invalid')
      : $('.form-control#p_number').addClass('is-invalid');

    return numberValidate;
  }

  $('#p_phone').mask('(999) 999-9999');
  $('#hosp_telMed').mask('(999) 999-9999');

  setInterval(function () {
    tableMaestro.ajax.reload();
  }, 30000);
});
