$(function () {
  window.jsPDF = window.jspdf.jsPDF;
  var dataSelect, idMedical, idMA, focus_value, name_hospital;
  var tableEmergency = $("#tableEmergency").DataTable({
    select: "single",
    pageLength: 5,
    order: [[0, "desc"]],
    language: {
      select: {
        rows: {
          _: "",
          0: "",
          1: "",
        },
      },
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando _START_ al _END_ de _TOTAL_",
      sInfoEmpty: "Mostrando 0 al 0 de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
    },
    ajax: {
      url: "bd/admission.php",
      method: "POST",
      data: { option: "selectEmergency" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "clasificacion_admision" },
      { defaultContent: "" },
      { data: "fecha_clasificacion" },
      { data: "expendiente" },
      { defaultContent: "" },
      { data: "nombre_motivoatencion" },
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
            case "Rojo":
              fond = "text-white bg-red";
              break;
            case "Naranja":
              fond = "text-white bg-orange";
              break;
            case "Amarillo":
              fond = "bg-yellow";
              break;
          }
          return (
            "<div class='card card-classification mb-0 " +
            fond +
            "'><div class='card-body'>" +
            row.clasificacion_admision +
            "</div></div>"
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
          var patient = row.nombre1 ? row.nombre1 : "";
          patient += row.nombre2 ? " " + row.nombre2 : "";
          patient += row.apellido1 ? " " + row.apellido1 : "";
          patient += row.apellido2 ? " " + row.apellido2 : "";
          return patient;
        },
        targets: 4,
      },
    ],
    dom: "Bfrtip",
    initComplete: function () {
      $("#tableEmergency tr").each(function (index, value) {
        if (index > 0) {
          var date = new Date();
          var date_classification = new Date(
            tableEmergency.rows(index - 1).data()[0].fecha_clasificacion
          );
          var diff = Math.abs(date - date_classification);
          var minutes = Math.floor(diff / 1000 / 60);          
          switch ($(this).find("td .card-classification").text()) {
            case "Amarillo":
              var _this = this;
              var min_yellow = 9 - minutes;
              var seg_yellow = 60 - date_classification.getSeconds();
              setInterval(function () {
                if (min_yellow >= 0) {
                  $(_this)
                    .find(".countdown .min")
                    .html(
                      min_yellow > 0 && min_yellow < 10
                        ? "0" + min_yellow
                        : min_yellow
                    );
                  seg_yellow--;
                  if (seg_yellow == 0) {
                    seg_yellow = min_yellow == 0 ? 0 : 60;
                    min_yellow--;
                  }
                  $(_this)
                    .find(".countdown .sec")
                    .html(
                      seg_yellow > 0 && seg_yellow < 10
                        ? "0" + seg_yellow
                        : seg_yellow
                    );
                }
              }, 1000);
              break;
            case "Naranja":
              var _this = this;
              var min_orange = 14 - minutes;
              var seg_orange = 60 - date_classification.getSeconds();
              setInterval(function () {
                if (min_orange >= 0) {
                  $(_this)
                    .find(".countdown .min")
                    .html(
                      min_orange > 0 && min_orange < 10
                        ? "0" + min_orange
                        : min_orange
                    );
                  seg_orange--;
                  if (seg_orange == 0) {
                    seg_orange = min_orange == 0 ? 0 : 60;
                    min_orange--;
                  }
                  $(_this)
                    .find(".countdown .sec")
                    .html(
                      seg_orange > 0 && seg_orange < 10
                        ? "0" + seg_orange
                        : seg_orange
                    );
                }
              }, 1000);
              break;
          }
        }
      });
    },
  });

  tableEmergency.on("select", function (e, dt, type, indexes) {
    dataSelect = tableEmergency.rows(indexes).data()[0];
    idMA = dataSelect.id_atencionmedica;

    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "selectAttentionMedical",
        idMA: idMA,
      },
    })
      .done(function (data) {
        $("#tableMedical>tbody").empty();
        appendTableMedical(data);
        data
          ? $("#print-medical").prop("disabled", false)
          : $("#print-medical").prop("disabled", true);
      })
      .fail(function () {
        console.log("error");
      });

    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "selectAttentionExamen",
        idMA: idMA,
      },
    })
      .done(function (data) {
        $("#tableExamen>tbody").empty();
        appendTableExamen(data);
        data
          ? $("#print-examen").prop("disabled", false)
          : $("#print-examen").prop("disabled", true);
      })
      .fail(function () {
        console.log("error");
      });

    $("#collapseOne").collapse("show");
    /* Se actualiza el fromulario */
    $("#form_emergency").trigger("reset");
    $("select option").attr("selected", false);
    $("#general option[value=" + dataSelect.id_general + "]").attr(
      "selected",
      true
    );
    $("#cabeza option[value=" + dataSelect.id_cabeza + "]").attr(
      "selected",
      true
    );
    $("#ojo option[value=" + dataSelect.id_ojo + "]").attr("selected", true);
    $("#otorrino option[value=" + dataSelect.id_otorrino + "]").attr(
      "selected",
      true
    );
    $("#boca option[value=" + dataSelect.id_boca + "]").attr("selected", true);
    $("#cuello option[value=" + dataSelect.id_cuello + "]").attr(
      "selected",
      true
    );
    $("#torax option[value=" + dataSelect.id_torax + "]").attr(
      "selected",
      true
    );
    $("#corazon option[value=" + dataSelect.id_corazon + "]").attr(
      "selected",
      true
    );
    $("#pulmon option[value=" + dataSelect.id_pulmon + "]").attr(
      "selected",
      true
    );
    $("#abdomen option[value=" + dataSelect.id_abdomen + "]").attr(
      "selected",
      true
    );
    $("#pelvis option[value=" + dataSelect.id_pelvis + "]").attr(
      "selected",
      true
    );
    $("#rectal option[value=" + dataSelect.id_rectal + "]").attr(
      "selected",
      true
    );
    $("#genital option[value=" + dataSelect.id_genital + "]").attr(
      "selected",
      true
    );
    $("#extremidad option[value=" + dataSelect.id_extremidad + "]").attr(
      "selected",
      true
    );
    $("#neuro option[value=" + dataSelect.id_neuro + "]").attr(
      "selected",
      true
    );
    $("#piel option[value=" + dataSelect.id_piel + "]").attr("selected", true);
    dataSelect.cod_cie10
      ? $("#ec_cie10").val(dataSelect.cod_cie10 + " " + dataSelect.diagnostico)
      : $("#ec_cie10").val("");
    $("#sign").html(dataSelect.sintomas);
    $("#description").html(dataSelect.descripcion_diagnostico);
    $("#other").html(dataSelect.otros);
  });

  function crud_ajax(field, val, option) {
    if (focus_value != val) {
      $.ajax({
        url: "bd/admission.php",
        method: "POST",
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
          console.log("error");
        });
    }
  }

  function appendTableMedical(data) {
    if (data)
      $.each(data, function (index, value) {
        $("#tableMedical>tbody").append(
          "<tr id='" +
            value.id_atencionmedica_medicamentos +
            "'><td class='name'>" +
            value.producto +
            "</td><td class='dosis'>" +
            value.dosis +
            "</td><td><button type='button' class='btn btn-danger delete-medical'><i class='fa fa-trash'></i> Eliminar</button></td></tr>"
        );
      });
  }

  function appendTableExamen(data) {
    if (data)
      $.each(data, function (index, value) {
        $("#tableExamen>tbody").append(
          "<tr id='" +
            value.id_atencionmedica_examen +
            "'><td class='name'>" +
            value.nombre_examen +
            "</td><td><button type='button' class='btn btn-danger delete-examen'><i class='fa fa-trash'></i> Eliminar</button></td></tr>"
        );
      });
  }

  function createDataTableMedical() {
    return $("#table-medical").DataTable({
      select: "single",
      //pageLength: 5,
      language: {
        select: {
          rows: {
            _: "",
            0: "",
            1: "",
          },
        },
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando _START_ al _END_ de _TOTAL_",
        sInfoEmpty: "Mostrando 0 al 0 de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sSearch: "Buscar:",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
      },
      ajax: {
        url: "bd/admission.php",
        method: "POST",
        data: { option: "selectMedical", idMA: idMA },
        dataSrc: "",
      },
      deferRender: true,
      columns: [{ data: "producto" }],
      //dom: 'Bfrtip'
    });
  }

  function createDataTableExamen() {
    return $("#table-examen").DataTable({
      select: "multiple",
      //pageLength: 5,
      language: {
        select: {
          rows: {
            _: "",
            0: "",
            1: "",
          },
        },
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando _START_ al _END_ de _TOTAL_",
        sInfoEmpty: "Mostrando 0 al 0 de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sSearch: "Buscar:",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
      },
      ajax: {
        url: "bd/admission.php",
        method: "POST",
        data: { option: "selectExamen", idMA: idMA },
        dataSrc: "",
      },
      deferRender: true,
      columns: [{ data: "nombre_examen" }],
      //dom: 'Bfrtip'
    });
  }

  $.ajax({
    url: "bd/admission.php",
    method: "POST",
    dataType: "json",
    data: {
      option: "loadSelectMedicalAttention",
      idH: $("#data-user").data("hospital"),
    },
  })
    .done(function (data) {
      if (data["name_hospital"])
        name_hospital = data["name_hospital"][0].nombre_hospital;
      $("#general").empty();
      $("#general").append($("<option>-- Seleccione una opción --</option>"));

      $("#cabeza").empty();
      $("#cabeza").append($("<option>-- Seleccione una opción --</option>"));

      $("#ojo").empty();
      $("#ojo").append($("<option>-- Seleccione una opción --</option>"));

      $("#otorrino").empty();
      $("#otorrino").append($("<option>-- Seleccione una opción --</option>"));

      $("#boca").empty();
      $("#boca").append($("<option>-- Seleccione una opción --</option>"));

      $("#cuello").empty();
      $("#cuello").append($("<option>-- Seleccione una opción --</option>"));

      $("#torax").empty();
      $("#torax").append($("<option>-- Seleccione una opción --</option>"));

      $("#corazon").empty();
      $("#corazon").append($("<option>-- Seleccione una opción --</option>"));

      $("#pulmon").empty();
      $("#pulmon").append($("<option>-- Seleccione una opción --</option>"));

      $("#abdomen").empty();
      $("#abdomen").append($("<option>-- Seleccione una opción --</option>"));

      $("#pelvis").empty();
      $("#pelvis").append($("<option>-- Seleccione una opción --</option>"));

      $("#rectal").empty();
      $("#rectal").append($("<option>-- Seleccione una opción --</option>"));

      $("#genital").empty();
      $("#genital").append($("<option>-- Seleccione una opción --</option>"));

      $("#extremidad").empty();
      $("#extremidad").append(
        $("<option>-- Seleccione una opción --</option>")
      );

      $("#neuro").empty();
      $("#neuro").append($("<option>-- Seleccione una opción --</option>"));

      $("#piel").empty();
      $("#piel").append($("<option>-- Seleccione una opción --</option>"));

      $("#disposal").empty();
      $("#disposal").append($("<option>-- Seleccione una opción --</option>"));

      $.each(data["general"], function (index, value) {
        $("#general").append(
          $(
            "<option value=" +
              value.id_general +
              ">" +
              value.nombre_general +
              "</option>"
          )
        );
      });

      $.each(data["cabeza"], function (index, value) {
        $("#cabeza").append(
          $(
            "<option value=" +
              value.id_cabeza +
              ">" +
              value.nombre_cabeza +
              "</option>"
          )
        );
      });

      $.each(data["ojo"], function (index, value) {
        $("#ojo").append(
          $(
            "<option value=" +
              value.id_ojo +
              ">" +
              value.nombre_ojo +
              "</option>"
          )
        );
      });

      $.each(data["otorrino"], function (index, value) {
        $("#otorrino").append(
          $(
            "<option value=" +
              value.id_otorrino +
              ">" +
              value.nombre_otorrino +
              "</option>"
          )
        );
      });

      $.each(data["boca"], function (index, value) {
        $("#boca").append(
          $(
            "<option value=" +
              value.id_boca +
              ">" +
              value.nombre_boca +
              "</option>"
          )
        );
      });

      $.each(data["cuello"], function (index, value) {
        $("#cuello").append(
          $(
            "<option value=" +
              value.id_cuello +
              ">" +
              value.nombre_cuello +
              "</option>"
          )
        );
      });

      $.each(data["torax"], function (index, value) {
        $("#torax").append(
          $(
            "<option value=" +
              value.id_torax +
              ">" +
              value.nombre_torax +
              "</option>"
          )
        );
      });

      $.each(data["corazon"], function (index, value) {
        $("#corazon").append(
          $(
            "<option value=" +
              value.id_corazon +
              ">" +
              value.nombre_corazon +
              "</option>"
          )
        );
      });

      $.each(data["pulmon"], function (index, value) {
        $("#pulmon").append(
          $(
            "<option value=" +
              value.id_pulmon +
              ">" +
              value.nombre_pulmon +
              "</option>"
          )
        );
      });

      $.each(data["abdomen"], function (index, value) {
        $("#abdomen").append(
          $(
            "<option value=" +
              value.id_abdomen +
              ">" +
              value.nombre_abdomen +
              "</option>"
          )
        );
      });

      $.each(data["pelvis"], function (index, value) {
        $("#pelvis").append(
          $(
            "<option value=" +
              value.id_pelvis +
              ">" +
              value.nombre_pelvis +
              "</option>"
          )
        );
      });

      $.each(data["rectal"], function (index, value) {
        $("#rectal").append(
          $(
            "<option value=" +
              value.id_rectal +
              ">" +
              value.nombre_rectal +
              "</option>"
          )
        );
      });

      $.each(data["genital"], function (index, value) {
        $("#genital").append(
          $(
            "<option value=" +
              value.id_genital +
              ">" +
              value.nombre_genital +
              "</option>"
          )
        );
      });

      $.each(data["extremidad"], function (index, value) {
        $("#extremidad").append(
          $(
            "<option value=" +
              value.id_extremidad +
              ">" +
              value.nombre_extremidad +
              "</option>"
          )
        );
      });

      $.each(data["neuro"], function (index, value) {
        $("#neuro").append(
          $(
            "<option value=" +
              value.id_neuro +
              ">" +
              value.nombre_neuro +
              "</option>"
          )
        );
      });

      $.each(data["piel"], function (index, value) {
        $("#piel").append(
          $(
            "<option value=" +
              value.id_piel +
              ">" +
              value.nombre_piel +
              "</option>"
          )
        );
      });

      $.each(data["disposal"], function (index, value) {
        $("#disposal").append(
          $(
            "<option value=" +
              value.id_estadoalta +
              ">" +
              value.estado_alta +
              "</option>"
          )
        );
      });
    })
    .fail(function () {
      console.log("error");
    });

  $("select").on("change", function (e) {
    if (e.target.value != 0 && e.target.id != "disposal") {
      crud_ajax("id_" + e.target.id, e.target.value, "updateMedicalAttention");
    }
  });

  $("#modal-egress").on("show.bs.modal", function () {
    $("#disposal option").attr("selected", false);
    $("#disposal option[value='0']").attr("selected", true);
  });

  $("#disposal").on("change", function (e) {
    e.target.value == 0
      ? $(".btn-egress").prop("disabled", true)
      : $(".btn-egress").prop("disabled", false);
  });

  $(".btn-egress").on("click", function () {
    crud_ajax(
      "id_estadoalta",
      $("#disposal option:selected").val(),
      "updateMedicalAttention"
    );
  });

  $("#sign").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#description").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#other").on("focus", function () {
    focus_value = $(this).val();
  });

  $("#sign").on("focusout", function () {
    crud_ajax("sintomas", $(this).val(), "updateMedicalAttention");
  });

  $("#description").on("focusout", function () {
    crud_ajax(
      "descripcion_diagnostico",
      $(this).val(),
      "updateMedicalAttention"
    );
  });

  $("#other").on("focusout", function () {
    crud_ajax("otros", $(this).val(), "updateMedicalAttention");
  });

  var tableCIE10 = $("#tableCIE10").DataTable({
    select: "single",
    //pageLength: 5,
    language: {
      select: {
        rows: {
          _: "",
          0: "",
          1: "",
        },
      },
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando _START_ al _END_ de _TOTAL_",
      sInfoEmpty: "Mostrando 0 al 0 de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
    },
    ajax: {
      url: "bd/admission.php",
      method: "POST",
      data: { option: "selectCIE10" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [{ data: "codigo_cie" }, { data: "diagnostico" }],
    //dom: 'Bfrtip'
  });

  $("#CIE10").on("show.bs.modal", function () {
    //tableCIE10.ajax.reload();
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
    crud_ajax(
      "cod_cie10",
      dataSelectCIE10[0].codigo_cie,
      "updateMedicalAttention"
    );
  });

  var tableMedical = createDataTableMedical();

  tableMedical.on("select", function (e, dt, type, indexes) {
    $(".btn-medical-search").prop("disabled", false);
  });

  tableMedical.on("deselect", function (e, dt, type, indexes) {
    $(".btn-medical-search").prop("disabled", true);
  });

  $(".btn-medical").on("click", function () {
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "insertMedical",
        idMA: idMA,
        idMAM: idMedical,
        dosis: $("#dosis").val(),
      },
    })
      .done(function (data) {
        appendTableMedical([
          {
            id_atencionmedica_medicamentos:
              data[0].id_atencionmedica_medicamentos,
            producto: $("#input-medical").val(),
            dosis: $("#dosis").val(),
          },
        ]);
      })
      .fail(function () {
        console.log("error");
      });
  });

  $("#print-medical").on("click", function () {
    var doc = new jsPDF();
    doc.setFontSize(18);
    doc.text("Orden de medicamentos", 14, 22);
    doc.setFontSize(11);
    doc.setTextColor(100);

    var date = new Date();
    var dateNow =
      (date.getDate() < 10 ? "0" + date.getDate() : date.getDate()) +
      "/" +
      (date.getMonth() + 1 < 10
        ? "0" + (date.getMonth() + 1)
        : date.getMonth() + 1) +
      "/" +
      date.getFullYear() +
      " " +
      date.getHours() +
      ":" +
      date.getMinutes() +
      ":" +
      date.getSeconds();

    doc.autoTable({
      head: [["Nombre hospital", "Fecha expedición"]],
      body: [[name_hospital, dateNow]],
      startY: 30,
    });

    var name = dataSelect.nombre1;
    if (dataSelect.nombre2) name += " " + dataSelect.nombre2;
    if (dataSelect.apellido1) name += " " + dataSelect.apellido1;
    if (dataSelect.apellido2) name += " " + dataSelect.apellido2;
    var age = dataSelect.edad + " " + dataSelect.nombre_edad;

    doc.autoTable({
      head: [
        ["Nombre paciente", "Identificacion", "Edad", "Código Diagnóstico"],
      ],
      body: [[name, dataSelect.num_doc, age, dataSelect.cod_cie10]],
    });

    var body = [];
    $("#tableMedical tr").each(function (index, value) {
      if (index > 0) {
        body.push([
          $(this).find("td.name").text(),
          $(this).find("td.dosis").text(),
        ]);
      }
    });

    doc.autoTable({
      head: [["Medicamentos", "Dosis"]],
      body: body,
    });

    doc.autoTable({
      head: [["Prescribe (médico)"]],
      body: [[$("#data-user").data("user")]],
    });

    doc.save("orden_medicamentos.pdf");
  });

  $("#modal-medical").on("show.bs.modal", function () {
    tableMedical.destroy();
    tableMedical = createDataTableMedical();
    $("#input-medical").val("");
    $("#dosis").val("");
    $(".btn-medical").prop("disabled", true);
  });

  $("#modal-medical-search").on("show.bs.modal", function () {
    tableMedical.ajax.reload();
    $(".btn-medical-search").prop("disabled", true);
  });

  $("#dosis").on("keyup", function (e) {
    $.trim($(this).val()) != "" && $("#input-medical").val() != 0
      ? $(".btn-medical").prop("disabled", false)
      : $(".btn-medical").prop("disabled", true);
  });

  $(document).on("click", ".delete-medical", function (e) {
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      data: {
        option: "deleteAttentionMedical",
        idMAM: e.target.parentElement.parentElement.id,
      },
    })
      .done(function (data) {
        $(e.target.parentElement.parentElement).remove();
      })
      .fail(function () {
        console.log("error");
      });
  });

  $(".btn-medical-search").on("click", function () {
    idMedical = tableMedical.rows(".selected").data()[0].id_medicamento;
    $("#input-medical").val(tableMedical.rows(".selected").data()[0].producto);
    if ($.trim($("#dosis").val()) != "")
      $(".btn-medical").prop("disabled", false);
  });

  var tableExamen = createDataTableExamen();

  $("#modal-examen").on("show.bs.modal", function () {
    tableExamen.destroy();
    tableExamen = createDataTableExamen();
  });

  tableExamen.on("select", function (e, dt, type, indexes) {
    $(".btn-examen").prop("disabled", false);
  });

  tableExamen.on("deselect", function (e, dt, type, indexes) {
    if (tableExamen.rows(".selected").data().length == 0)
      $(".btn-examen").prop("disabled", true);
  });

  $(document).on("click", ".delete-examen", function (e) {
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      data: {
        option: "deleteAttentionExamen",
        idMAE: e.target.parentElement.parentElement.id,
      },
    })
      .done(function (data) {
        $(e.target.parentElement.parentElement).remove();
      })
      .fail(function () {
        console.log("error");
      });
  });

  $(".btn-examen").on("click", function () {
    var dataSelectExamen = [];
    $.each(tableExamen.rows(".selected").data(), function (index, value) {
      dataSelectExamen.push(value.id_examen);
    });

    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "insertExamen",
        idMA: idMA,
        dataExamen: dataSelectExamen,
      },
    })
      .done(function (data) {
        var array = [];
        $.each(tableExamen.rows(".selected").data(), function (index, value) {
          array.push({
            id_atencionmedica_examen: data[index].id_atencionmedica_examen,
            nombre_examen: value.nombre_examen,
          });
        });
        appendTableExamen(array);
      })
      .fail(function () {
        console.log("error");
      });
  });

  $("#print-examen").on("click", function () {
    //console.log(dataSelect);
    var doc = new jsPDF();
    doc.setFontSize(18);
    doc.text("Orden de exámenes", 14, 22);
    doc.setFontSize(11);
    doc.setTextColor(100);

    var date = new Date();
    var dateNow =
      (date.getDate() < 10 ? "0" + date.getDate() : date.getDate()) +
      "/" +
      (date.getMonth() + 1 < 10
        ? "0" + (date.getMonth() + 1)
        : date.getMonth() + 1) +
      "/" +
      date.getFullYear() +
      " " +
      date.getHours() +
      ":" +
      date.getMinutes() +
      ":" +
      date.getSeconds();

    doc.autoTable({
      head: [["Nombre hospital", "Fecha expedición"]],
      body: [[name_hospital, dateNow]],
      startY: 30,
    });

    var name = dataSelect.nombre1;
    if (dataSelect.nombre2) name += " " + dataSelect.nombre2;
    if (dataSelect.apellido1) name += " " + dataSelect.apellido1;
    if (dataSelect.apellido2) name += " " + dataSelect.apellido2;
    var age = dataSelect.edad + " " + dataSelect.nombre_edad;

    doc.autoTable({
      head: [
        ["Nombre paciente", "Identificacion", "Edad", "Código Diagnóstico"],
      ],
      body: [[name, dataSelect.num_doc, age, dataSelect.cod_cie10]],
    });

    var body = [];
    $("#tableExamen tr").each(function (index, value) {
      if (index > 0) {
        body.push([$(this).find("td.name").text()]);
      }
    });

    doc.autoTable({
      head: [["Exámenes"]],
      body: body,
    });

    doc.autoTable({
      head: [["Prescribe (médico)"]],
      body: [[$("#data-user").data("user")]],
    });

    doc.save("orden_examenes.pdf");
  });
});
