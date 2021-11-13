$(function () {
  var id_maestro,
    id_patient,
    id_evalC,
    focus_value,
    dataSelect,
    language = {
      language: localStorage.getItem("language"),
      new_case: localStorage.getItem("language_new_case"),
      map: localStorage.getItem("language_map"),
      select: localStorage.getItem("language_select"),
    };

  var tableMaestro = $("#tableMaestro").DataTable({
    select: "single",
    pageLength: 5,
    language: {
      url: "lang/" + language["language"] + ".json",
    },
    ajax: {
      url: "./bd/crud.php",
      method: "POST",
      data: { option: "selectPrehMaestro" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "cod_casopreh" },
      { data: "fecha" },
      { defaultContent: "" },
      { defaultContent: "" },
      { data: "direccion_maestro" },
      { defaultContent: "" },
      { data: "prioridad" },
      { data: "nombre_hospital" },
      { data: "nombre_medico" },
      { data: "telefono_maestro" },
      { data: "nombre_reporta" },
      {
        defaultContent:
          '<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalSeg"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></button>',
      },
      { defaultContent: "" },
      {
        defaultContent:
          '<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalR"><i class="fa fa-times-circle" aria-hidden="true"></i></button>',
      },
    ],
    columnDefs: [
      {
        render: function (data, type, row) {
          var diff = Math.abs(new Date() - new Date(row.fecha));
          var minutes = Math.floor(diff / 1000 / 60);
          return (
            '<i class="fa fa-clock-o" aria-hidden="true"></i> ' +
            minutes +
            " MIN"
          );
        },
        targets: 2,
      },
      {
        render: function (data, type, row) {
          return row.nombre1
            ? row.nombre1
            : "" + " " + row.nombre2
            ? row.nombre2
            : "" + " " + row.apellido1
            ? row.apellido1
            : "" + " " + row.apellido2
            ? row.apellido2
            : "";
        },
        targets: 3,
      },
      {
        render: function (data, type, row) {
          var name = row.nombre_es;
          switch (language["language"]) {
            case "en":
              name = row.nombre_en;
              break;
            case "pt":
              name = row.nombre_pt;
              break;
            case "fr":
              name = row.nombre_fr;
              break;
          }
          return name;
        },
        targets: 5,
      },
      {
        render: function (data, type, row) {
          return (
            "<button " +
            (row.accion == 2 ? "hidden" : "") +
            ' type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-dispatch"><i class="fa fa-ambulance" aria-hidden="true"></i></button>'
          );
        },
        targets: 13,
      },
    ],
    //rowId: 'extn',
    dom: "Bfrtip",
    initComplete: function () {
      $("#tableMaestro_wrapper").prepend(
        "<div class='btn-dataTable d-flex'><a class='btn btn-secondary mr-3' href='preh_maestroadd.php' role='button'><i class='fa fa-clinic-medical'> " +
          language["new_case"] +
          "</i></a><a class='btn btn-secondary map' href='http://144.126.134.106:8082/' role='button'><i class='fa fa-map-marked-alt'> " +
          language["map"] +
          "</i></a></div>"
      );
    },
  });

  tableMaestro.on("draw", function () {
    $(".fa-clock-o").parent().css("color", "red");
  });

  tableMaestro.on("select", function (e, dt, type, indexes) {
    $(".form-control").removeClass("is-invalid");
    if (type === "row") {
      dataSelect = tableMaestro.rows(indexes).data()[0];
      console.log(dataSelect);
      id_maestro = dataSelect.cod_casopreh;
      id_patient = dataSelect.id_paciente;
      id_evalC = dataSelect.id_evaluacionclinica;

      $("span.case").text(" - Caso: " + id_maestro);

      $.ajax({
        url: "./bd/crud.php",
        method: "POST",
        dataType: "json",
        data: {
          option: "loadSelect",
        },
      })
        .done(function (data) {
          var name = "";
          $("#p_ide").empty();
          $("#p_ide").append(
            $("<option value='0'>" + language["select"] + "</option>")
          );
          $.each(data["ide"], function (index, value) {
            switch (language["language"]) {
              case "es":
                name = value.descripcion;
                break;
              case "en":
                name = value.descripcion_en;
                break;
              case "pt":
                name = value.descripcion_pr;
                break;
              case "fr":
                name = value.descripcion_fr;
                break;
            }
            $("#p_ide").append(
              $("<option value='" + value.id_tipo + "'>" + name + "</option>")
            );
            if (dataSelect.tipo_doc == value.id_tipo) {
              $("#p_ide option[value=" + value.id_tipo + "]").attr(
                "selected",
                true
              );
            }
          });

          $("#p_typeage").empty();
          $("#p_typeage").append(
            $("<option value='0'>" + language["select"] + "</option>")
          );
          $.each(data["age"], function (index, value) {
            switch (language["language"]) {
              case "es":
                name = value.nombre_edad;
                break;
              case "en":
                name = value.nombre_edad_en;
                break;
              case "pt":
                name = value.nombre_edad_pr;
                break;
              case "fr":
                name = value.nombre_edad_fr;
                break;
            }
            $("#p_typeage").append(
              $("<option value='" + value.id_edad + "'>" + name + "</option>")
            );
            if (dataSelect.cod_edad == value.id_edad) {
              $("#p_typeage option[value=" + value.id_edad + "]").attr(
                "selected",
                true
              );
            }
          });

          $("#ec_triage").empty();
          $("#ec_triage").append(
            $(
              "<option value='0' style='color: initial'>" +
                language["select"] +
                "</option>"
            )
          );
          var color = "";
          $.each(data["triage"], function (index, value) {
            switch (language["language"]) {
              case "es":
                name = value.nombre_triage_es;
                break;
              case "en":
                name = value.nombre_triage_en;
                break;
              case "pr":
                name = value.nombre_triage_pr;
                break;
              case "fr":
                name = value.nombre_triage_fr;
                break;
            }
            switch (value.nombre_triage_es) {
              case "Crítico":
                color = "red";
                break;
              case "Severo":
                color = "orange";
                break;
              case "Moderado":
                color = "yellow";
                break;
              case "Leve":
                color = "green";
                break;
            }
            $("#ec_triage").append(
              $(
                "<option value='" +
                  value.id_triage +
                  "'class='fa' style='color: " +
                  color +
                  "'>&#xf0c8; " +
                  name +
                  "</option>"
              )
            );
            if (dataSelect.triage == value.id_triage)
              $("#ec_triage option[value=" + value.id_triage + "]").attr(
                "selected",
                true
              );
            paintSelect();

            $("#ec_type").empty();
            $("#ec_type").append(
              $("<option value='0'>" + language["select"] + "</option>")
            );
            $.each(data["type"], function (index, value) {
              switch (language["language"]) {
                case "es":
                  name = value.nombre_tipopaciente;
                  break;
                case "en":
                  name = value.nombre_tipopaciente_en;
                  break;
                case "pt":
                  name = value.nombre_tipopaciente_pr;
                  break;
                case "fr":
                  name = value.nombre_tipopaciente_fr;
                  break;
              }
              $("#ec_type").append(
                $(
                  "<option value='" +
                    value.id_tipopaciente +
                    "'>" +
                    name +
                    "</option>"
                )
              );
              if (dataSelect.id_tipopaciente == value.id_tipopaciente) {
                $("#ec_type option[value=" + value.id_tipopaciente + "]").attr(
                  "selected",
                  true
                );
              }
            });
          });
        })
        .fail(function () {
          console.log("error");
        });
      //Se actualiza formulario paciente
      $("#form_paciente").trigger("reset");
      $("#p_number").val(dataSelect.num_doc);
      $("#p_exp").val(dataSelect.expendiente);
      $("#p_date").val(dataSelect.fecha_nacido);
      $("#p_age").val(dataSelect.edad);
      $("#p_name1").val(dataSelect.nombre1);
      $("#p_name2").val(dataSelect.nombre2);
      $("#p_lastname1").val(dataSelect.apellido1);
      $("#p_lastname2").val(dataSelect.apellido2);
      switch (dataSelect.genero) {
        case "1":
          $("#p_genM").prop("checked", true);
          break;
        case "2":
          $("#p_genF").prop("checked", true);
          break;
        case "3":
          $("#p_genO").prop("checked", true);
          break;
      }
      $("#p_nickname").val(dataSelect.apodo);
      $("#p_nationality").val(dataSelect.nacionalidad);
      $("#p_phone").val(dataSelect.telefono_paciente);
      $("#p_segS").val(dataSelect.aseguradro);
      $("#p_address").val(dataSelect.direccion_paciente);
      $("#p_obs").html(dataSelect.observacion_paciente);

      //Se actualiza formulario evaluación clínica
      $("#form_evalClinic").trigger("reset");
      $("#ec_ta").val(dataSelect.sv_tx);
      $("#ec_fc").val(dataSelect.sv_fc);
      $("#ec_fr").val(dataSelect.sv_fr);
      $("#ec_temp").val(dataSelect.sv_temp);
      $("#ec_gl").val(dataSelect.sv_gl);
      $("#ec_sato2").val(dataSelect.sv_sato2);
      $("#ec_gli").val(dataSelect.sv_gli);
      $("#ec_talla").val(dataSelect.talla);
      $("#ec_peso").val(dataSelect.peso);
      if (dataSelect.cod_diag_cie) {
        var name = dataSelect.cie10_diagnostico;
        switch (language["language"]) {
          case "en":
            name = dataSelect.cie10_diagnostico_en;
            break;
          case "pt":
            name = dataSelect.cie10_diagnostico_pr;
            break;
          case "fr":
            name = dataSelect.cie10_diagnostico_fr;
            break;
        }
        $("#ec_cie10").val(dataSelect.cod_diag_cie + " " + name);
      }
      $("#ec_cuadro").html(dataSelect.c_clinico);
      $("#ec_examen").html(dataSelect.examen_fisico);
      $("#ec_antec").html(dataSelect.antecedentes);
      $("#ec_parac").html(dataSelect.paraclinicos);
      $("#ec_tratam").html(dataSelect.tratamiento);
      $("#ec_inform").html(dataSelect.diagnos_txt);

      //Se actualiza formulario hospital
      $("#form_hospital").trigger("reset");
      if (dataSelect.hospital_destino)
        $("#hosp_dest").val(
          dataSelect.hospital_destino + " " + dataSelect.nombre_hospital
        );
      $("#hosp_nomMed").val(dataSelect.nombre_medico);
      $("#hosp_telMed").val(dataSelect.telefono_maestro);

      $("#collapseOne").collapse("show");
    }
  });

  function crud_ajax(field, val, option) {
    if (focus_value != val) {
      $.ajax({
        url: "./bd/crud.php",
        method: "POST",
        data: {
          option: option,
          idM: id_maestro,
          idP: id_patient,
          idEC: id_evalC,
          setField: val,
          field: field,
          language: language["language"],
        },
      })
        .done(function () {
          tableMaestro.ajax.reload();
        })
        .fail(function () {
          console.log("error");
        });
    }
  }

  function paintSelect() {
    switch ($("#ec_triage option:selected").text().split(" ")[1]) {
      case "Crítico":
        $("#ec_triage").css("color", "red");
        break;
      case "Severo":
        $("#ec_triage").css("color", "orange");
        break;
      case "Moderado":
        $("#ec_triage").css("color", "yellow");
        break;
      case "Leve":
        $("#ec_triage").css("color", "green");
        break;
      default:
        $("#ec_triage").css("color", "initial");
        break;
    }
  }

  //formulario paciente
  $("#p_number").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_exp").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_date").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_age").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_name1").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_name2").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_lastname1").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_lastname2").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_nickname").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_nationality").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_phone").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_segS").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_address").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_obs").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#p_ide").on("change", function () {
    if ($("#p_ide option:selected").val() != 0) {
      if ($("#p_ide option:selected").val() == 1) {
        if (number_validate($("#p_number").val()))
          crud_ajax("tipo_doc", $("#p_ide option:selected").val(), "updateP");
      } else {
        $(".form-control#p_number").removeClass("is-invalid");
        crud_ajax("tipo_doc", $("#p_ide option:selected").val(), "updateP");
        crud_ajax("num_doc", $("#p_number").val(), "updateP");
      }
    } else {
      $(".form-control#p_number").removeClass("is-invalid");
    }
  });

  /* Validación de número de cédula dominicana */
  $("#p_number").on("keyup", function () {
    if ($("#p_ide option:selected").val() == 1) {
      if (number_validate($(this).val())) {
        crud_ajax("num_doc", $(this).val(), "updateP");
        crud_ajax("tipo_doc", $("#p_ide option:selected").val(), "updateP");
      }
    } else {
      crud_ajax("num_doc", $(this).val(), "updateP");
    }
  });

  $("#p_exp").on("focusout", function () {
    crud_ajax("expendiente", $(this).val(), "updateP");
  });

  $("#p_date").on("focusout", function () {
    crud_ajax("fecha_nacido", $(this).val(), "updateP");
  });

  $("#p_age").on("focusout", function () {
    crud_ajax("edad", $(this).val(), "updateP");
  });

  $("#p_typeage").on("change", function () {
    if ($("#p_typeage option:selected").val() != 0)
      crud_ajax("cod_edad", $("#p_typeage option:selected").val(), "updateP");
  });

  $("#p_name1").on("focusout", function () {
    crud_ajax("nombre1", $(this).val(), "updateP");
  });

  $("#p_name2").on("focusout", function () {
    crud_ajax("nombre2", $(this).val(), "updateP");
  });

  $("#p_lastname1").on("focusout", function () {
    crud_ajax("apellido1", $(this).val(), "updateP");
  });

  $("#p_lastname2").on("focusout", function () {
    crud_ajax("apellido2", $(this).val(), "updateP");
  });

  $(".gender").on("click", function () {
    if (
      !dataSelect.genero ||
      (dataSelect.genero == 1 &&
        ($("input:checked").val() == 2 || $("input:checked").val() == 3)) ||
      (dataSelect.genero == 2 &&
        ($("input:checked").val() == 1 || $("input:checked").val() == 3)) ||
      (dataSelect.genero == 3 &&
        ($("input:checked").val() == 1 || $("input:checked").val() == 2))
    )
      crud_ajax("genero", $("input:checked").val(), "updateP");
  });

  $("#p_nickname").on("focusout", function () {
    crud_ajax("apodo", $(this).val(), "updateP");
  });

  $("#p_nationality").on("focusout", function () {
    crud_ajax("nacionalidad", $(this).val(), "updateP");
  });

  $("#p_phone").on("focusout", function () {
    crud_ajax("telefono", $(this).val(), "updateP");
  });

  $("#p_segS").on("focusout", function () {
    crud_ajax("aseguradro", $(this).val(), "updateP");
  });

  $("#p_address").on("focusout", function () {
    crud_ajax("direccion", $(this).val(), "updateP");
  });

  $("#p_obs").on("focusout", function () {
    crud_ajax("observacion", $(this).val(), "updateP");
  });
  //end formulario paciente

  //formulario evaluación clínica
  $("#ec_ta").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_fc").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_fr").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_temp").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_gl").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_sato2").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_gli").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_talla").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_peso").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_cuadro").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_examen").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_antec").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_parac").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_tratam").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_inform").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#ec_ta").on("focusout", function () {
    crud_ajax("sv_tx", $(this).val(), "updatePrehEC");
  });

  $("#ec_fc").on("focusout", function () {
    crud_ajax("sv_fc", $(this).val(), "updatePrehEC");
  });

  $("#ec_fr").on("focusout", function () {
    crud_ajax("sv_fr", $(this).val(), "updatePrehEC");
  });

  $("#ec_temp").on("focusout", function () {
    crud_ajax("sv_temp", $(this).val(), "updatePrehEC");
  });

  $("#ec_gl").on("focusout", function () {
    crud_ajax("sv_gl", $(this).val(), "updatePrehEC");
  });

  $("#ec_sato2").on("focusout", function () {
    crud_ajax("sv_sato2", $(this).val(), "updatePrehEC");
  });

  $("#ec_gli").on("focusout", function () {
    crud_ajax("sv_gli", $(this).val(), "updatePrehEC");
  });

  $("#ec_talla").on("focusout", function () {
    crud_ajax("talla", $(this).val(), "updatePrehEC");
  });

  $("#ec_peso").on("focusout", function () {
    crud_ajax("peso", $(this).val(), "updatePrehEC");
  });

  $("#ec_triage").on("change", function () {
    paintSelect();
    if ($("#ec_triage option:selected").val() != 0)
      crud_ajax(
        "triage",
        $("#ec_triage option:selected").val(),
        "updatePrehEC"
      );
  });

  $("#ec_type").on("change", function () {
    if ($("#ec_type option:selected").val() != 0)
      crud_ajax(
        "tipo_paciente",
        $("#ec_type option:selected").val(),
        "updatePrehEC"
      );
  });

  $("#ec_cuadro").on("focusout", function () {
    crud_ajax("c_clinico", $(this).val(), "updatePrehEC");
  });

  $("#ec_examen").on("focusout", function () {
    crud_ajax("examen_fisico", $(this).val(), "updatePrehEC");
  });

  $("#ec_antec").on("focusout", function () {
    crud_ajax("antecedentes", $(this).val(), "updatePrehEC");
  });

  $("#ec_parac").on("focusout", function () {
    crud_ajax("paraclinicos", $(this).val(), "updatePrehEC");
  });

  $("#ec_tratam").on("focusout", function () {
    crud_ajax("tratamiento", $(this).val(), "updatePrehEC");
  });

  $("#ec_inform").on("focusout", function () {
    crud_ajax("diagnos_txt", $(this).val(), "updatePrehEC");
  });
  //end formulario evaluación clínica

  //formulario hospital
  $("#hosp_nomMed").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#hosp_telMed").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#hosp_nomMed").on("focusout", function () {
    crud_ajax("nombre_medico", $(this).val(), "updatePrehM");
  });

  $("#hosp_telMed").on("focusout", function () {
    crud_ajax("telefono", $(this).val(), "updatePrehM");
  });
  //end formulario hospital

  var tableCIE10 = $("#tableCIE10").DataTable({
    select: "single",
    language: {
      url: "lang/" + language["language"] + ".json",
    },
    ajax: {
      url: "./bd/crud.php",
      method: "POST",
      data: { option: "selectCIE10" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [{ data: "codigo_cie" }, { defaultContent: "" }],
    columnDefs: [
      {
        render: function (data, type, row) {
          var diag = row.diagnostico;
          switch (language["language"]) {
            case "en":
              diag = row.diagnostico_en;
              break;
            case "pt":
              diag = row.diagnostico_pr;
              break;
            case "fr":
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

  $("#CIE10").on("show.bs.modal", function () {
    tableCIE10.ajax.reload();
  });

  tableCIE10.on("select", function (e, dt, type, indexes) {
    $(".btnCIE10").prop("disabled", false);
  });

  tableCIE10.on("deselect", function (e, dt, type, indexes) {
    $(".btnCIE10").prop("disabled", true);
  });

  $(".btnCIE10").on("click", function () {
    var dataSelectCIE10 = tableCIE10.rows(".selected").data();
    $("#ec_cie10").val(
      dataSelectCIE10[0].codigo_cie + " " + dataSelectCIE10[0].diagnostico
    );
    crud_ajax("cod_diag_cie", dataSelectCIE10[0].codigo_cie, "updatePrehEC");
  });

  var tableHosp = $("#tableHosp").DataTable({
    select: "single",
    language: {
      url: "lang/" + language["language"] + ".json",
    },
    ajax: {
      url: "./bd/crud.php",
      method: "POST",
      data: { option: "selectHosp" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [{ data: "id_hospital" }, { data: "nombre_hospital" }],
    //dom: 'Bfrtip'
  });

  $("#hosp").on("show.bs.modal", function () {
    tableHosp.ajax.reload();
  });

  tableHosp.on("select", function (e, dt, type, indexes) {
    $(".btnHosp").prop("disabled", false);
  });

  tableHosp.on("deselect", function (e, dt, type, indexes) {
    $(".btnHosp").prop("disabled", true);
  });

  $(".btnHosp").on("click", function () {
    var dataSelectHosp = tableHosp.rows(".selected").data();
    $("#hosp_dest").val(
      dataSelectHosp[0].id_hospital + " " + dataSelectHosp[0].nombre_hospital
    );
    crud_ajax("hospital_destino", dataSelectHosp[0].id_hospital, "updatePrehM");
  });

  $("#modalSeg").on("show.bs.modal", function () {
    $("#noteInput").val("");
    $.ajax({
      url: "./bd/crud.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "selectSeguimPreh",
        idM: id_maestro,
      },
    })
      .done(function (data) {
        $("#segNote").empty();
        $.each(data, function (index, value) {
          $("#segNote").append("<li>" + value.seguimento + "</li>");
        });
      })
      .fail(function () {
        console.log("error");
      });
  });

  $("#noteInput").keyup(function () {
    $(this).val().length > 0
      ? $(".btnNote").prop("disabled", false)
      : $(".btnNote").prop("disabled", true);
  });

  $(".btnNote").on("click", function () {
    crud_ajax("seguimento", $("#noteInput").val(), "updatePrehSeguim");
  });

  $("#modalR").on("show.bs.modal", function () {
    $("#razon").html("");
    $.ajax({
      url: "./bd/crud.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "selectCierre",
      },
    })
      .done(function (data) {
        $("#selectRazon").empty();
        $("#selectRazon").append(
          $("<option value='0'>" + language["select"] + "</option>")
        );
        $.each(data, function (index, value) {
          $("#selectRazon").append(
            $(
              "<option value='" +
                value.id_tranlado_fallido +
                "'>" +
                value.tipo_cierrecaso_es +
                "</option>"
            )
          );
        });
      })
      .fail(function () {
        console.log("error");
      });
  });

  $("#razon").keyup(function () {
    $(this).val().length > 0 && $("#selectRazon").val() != 0
      ? $(".btnRazon").prop("disabled", false)
      : $(".btnRazon").prop("disabled", true);
  });

  $("#selectRazon").on("change", function () {
    $("#razon").val().length > 0 && $(this).val() != 0
      ? $(".btnRazon").prop("disabled", false)
      : $(".btnRazon").prop("disabled", true);
  });

  $(".btnRazon").on("click", function () {
    $.ajax({
      url: "./bd/crud.php",
      method: "POST",
      data: {
        option: "cerrarPrehCaso",
        idM: id_maestro,
        setField: $("#selectRazon").val(),
        reason: $("#razon").val(),
      },
    })
      .done(function () {
        tableMaestro.ajax.reload();
      })
      .fail(function () {
        console.log("error");
      });
  });

  /* Validación de número de cédula dominicana
   * con longitud de 11 caracteres numéricos o 13 caracteres incluyendo los dos guiones de presentación
   * ejemplo sin guiones 00116454281, ejemplo con guiones 001-1645428-1
   * el retorno es 1 para el caso de cédula válida y 0 para la no válida
   */
  function number_validate(num) {
    var c = num.replace(/-/g, "");
    var number = c.substr(0, c.length - 1);
    var verificador = c.substr(c.length - 1, 1);
    var suma = 0;
    var numberValidate = false;
    if (num.length < 11) {
      $(".form-control#p_number").addClass("is-invalid");
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
    if (el_numero == verificador && number.substr(0, 3) != "000") {
      numberValidate = true;
    }
    numberValidate
      ? $(".form-control#p_number").removeClass("is-invalid")
      : $(".form-control#p_number").addClass("is-invalid");

    return numberValidate;
  }

  $("#p_phone").mask("(999) 999-9999");
  $("#hosp_telMed").mask("(999) 999-9999");

  $(".btn-dispatch").on("click", function () {
    focus_value = 0;
    crud_ajax("accion", 2, "updatePrehM");
  });

  setInterval(function () {
    tableMaestro.ajax.reload();
  }, 30000);
});
