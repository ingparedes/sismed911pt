$(function () {
  var dataSelect,
    language = {
      language: localStorage.getItem("language"),
      select: localStorage.getItem("language_select"),
    };
  var tableAdmission = $("#tableAdmission").DataTable({
    select: "single",
    pageLength: 5,
    language: {
      url: "lang/" + language["language"] + ".json",
    },
    ajax: {
      url: "bd/admission.php",
      method: "POST",
      data: { option: "selectAdmission" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "fecha_admision" },
      { data: "expendiente" },
      { defaultContent: "" },      
      { defaultContent: "" },
      { data: "cod911" },
      { data: "genero" },
      { data: "acompañante" },
    ],
    columnDefs: [
      {
        render: function (data, type, row) {
          var patient = row.nombre1 ? row.nombre1 : "";
          patient += row.nombre2 ? " " + row.nombre2 : "";
          patient += row.apellido1 ? " " + row.apellido1 : "";
          patient += row.apellido2 ? " " + row.apellido2 : "";
          return patient;
        },
        targets: 2,
      },
      {
        render: function (data, type, row) {
          var name = row.nombre_ingreso;
          switch (language["language"]) {
            case "en":
              name = row.nombre_ingreso_en;
              break;
            case "pt":
              name = row.nombre_ingreso_pt;
              break;
            case "fr":
              name = row.nombre_ingreso_fr;
              break;
          }
          return name;
        },
        targets: 3,
      },
      {
        render: function (data, type, row) {
          return row.genero == 1 ? "M" : "F";
        },
        targets: 5,
      },
    ],
    dom: "Bfrtip",
  });

  tableAdmission.on("select", function (e, dt, type, indexes) {
    $("#collapseOne").collapse("show");
    dataSelect = tableAdmission.rows(indexes).data()[0];

    //Se actualiza el formulario
    $("#form_admission").trigger("reset");
    $("select option").attr("selected", false);
    $("#attention option[value=" + dataSelect.id_motivoatencion + "]").attr(
      "selected",
      true
    );
    switch (dataSelect.id_motivoatencion) {
      case "1":
        $(
          "#locationTrauma option[value=" +
            dataSelect.id_localizaciontrauma +
            "]"
        ).attr("selected", true);
        $("#causeTrauma option[value=" + dataSelect.id_causatrauma + "]").attr(
          "selected",
          true
        );
        break;
      case "2":
        $("#system option[value=" + dataSelect.id_sistema + "]").attr(
          "selected",
          true
        );
        break;
    }
    $("#attention").trigger("change");
    $("#glasgow").val(dataSelect.glasgow_admision);
    $("#pas").val(dataSelect.pas_admision);
    $("#pad").val(dataSelect.pad_admision);
    $("#fc").val(dataSelect.fc_admision);
    $("#so2").val(dataSelect.so2_admision);
    $("#fr").val(dataSelect.fr_admision);
    $("#temp").val(dataSelect.temp_admision);
    if (dataSelect.clasificacion_admision)
      $(
        "#classification option[value=" +
          dataSelect.clasificacion_admision +
          "]"
      ).attr("selected", true);
    $("#classification").trigger("change");
    if (dataSelect.dolor)
      $("#dolor option[value=" + dataSelect.dolor + "]").attr("selected", true);
    switch (language["language"]) {
      case "es":
        $("#signal").val(dataSelect.sintomas_signos);
        break;
      case "en":
        $("#signal").val(dataSelect.sintomas_signos_en);
        break;
      case "pt":
        $("#signal").val(dataSelect.sintomas_signos_pt);
        break;
      case "fr":
        $("#signal").val(dataSelect.sintomas_signos_fr);
        break;
    }
    $("#id_signal").val(dataSelect.id_signos);
    $("#motivation").html(dataSelect.motivo_consulta);
    $("#signalDescription").html(dataSelect.signos_sintomas);
  });

  $.ajax({
    url: "bd/admission.php",
    method: "POST",
    data: {
      option: "loadSelectAdmission",
    },
    dataType: "json",
  })
    .done(function (data) {
      $("#attention").empty();
      $("#attention").append(
        $("<option value='0'>" + language["select"] + "</option>")
      );

      $("#locationTrauma").empty();
      $("#locationTrauma").append(
        $("<option value='0'>" + language["select"] + "</option>")
      );

      $("#causeTrauma").empty();
      $("#causeTrauma").append(
        $("<option value='0'>" + language["select"] + "</option>")
      );

      $("#system").empty();
      $("#system").append(
        $("<option value='0'>" + language["select"] + "</option>")
      );

      $.each(data["attention"], function (index, value) {
        $("#attention").append(
          $(
            "<option value=" +
              value.id_motivoatencion +
              ">" +
              value.nombre_motivoatencion +
              "</option>"
          )
        );
      });

      $.each(data["locationTrauma"], function (index, value) {
        var name = value.nombre_localizaciontrauma;
        switch (language["language"]) {
          case "en":
            name = value.nombre_localizaciontrauma_en;
            break;
          case "pt":
            name = value.nombre_localizaciontrauma_pt;
            break;
          case "fr":
            name = value.nombre_localizaciontrauma_fr;
            break;
        }
        $("#locationTrauma").append(
          $(
            "<option value=" +
              value.id_localizaciontrauma +
              ">" +
              name +
              "</option>"
          )
        );
      });

      $.each(data["causeTrauma"], function (index, value) {
        var name = value.nombre_causaTrauma;
        switch (language["language"]) {
          case "en":
            name = value.nombre_causaTrauma_en;
            break;
          case "pt":
            name = value.nombre_causaTrauma_pt;
            break;
          case "fr":
            name = value.nombre_causaTrauma_fr;
            break;
        }
        $("#causeTrauma").append(
          $("<option value=" + value.id_salaCausa + ">" + name + "</option>")
        );
      });

      $.each(data["system"], function (index, value) {
        var name = value.nombre_sistema;
        switch (language["language"]) {
          case "en":
            name = value.nombre_sistema;
            break;
          case "pt":
            name = value.nombre_sistema_pt;
            break;
          case "fr":
            name = value.nombre_sistema_fr;
            break;
        }
        $("#system").append(
          $("<option value=" + value.id_sistema + ">" + name + "</option>")
        );
      });
    })
    .fail(function () {
      console.log("error");
    });

  $("#attention").on("change", function () {
    switch ($("#attention option:selected").val()) {
      case "0":
        $("#parentLocationTrauma").prop("hidden", true);
        $("#parentCauseTrauma").prop("hidden", true);
        $("#parentSystem").prop("hidden", true);
        $(".signal_search").prop("disabled", true);
        break;
      case "1":
        $("#parentLocationTrauma").prop("hidden", false);
        $("#parentCauseTrauma").prop("hidden", false);
        $("#parentSystem").prop("hidden", true);
        $(".signal_search").prop("disabled", false);
        break;
      case "2":
        $("#parentLocationTrauma").prop("hidden", true);
        $("#parentCauseTrauma").prop("hidden", true);
        $("#parentSystem").prop("hidden", false);
        $(".signal_search").prop("disabled", false);
        break;
    }
  });

  $("#classification").on("change", function () {
    switch ($("#classification option:selected").val()) {
      case "Rojo":
        $("#classification").css("color", "red");
        break;
      case "Naranja":
        $("#classification").css("color", "orange");
        break;
      case "Amarillo":
        $("#classification").css("color", "yellow");
        break;
      case "Azul":
        $("#classification").css("color", "blue");
        break;
      case "Verde":
        $("#classification").css("color", "green");
        break;
      default:
        $("#classification").css("color", "initial");
        break;
    }
  });

  function createDataTable() {
    return $("#tableSignal").DataTable({
      select: "single",
      language: {
        url: "lang/" + language["language"] + ".json",
      },
      ajax: {
        url: "bd/admission.php",
        method: "POST",
        data: {
          option: "selectSignal",
          reason:
            $("#attention option:selected").val() != 0
              ? $("#attention option:selected").val()
              : 1,
        },
        dataSrc: "",
      },
      deferRender: true,
      columns: [{ defaultContent: "" }],
      columnDefs: [
        {
          render: function (data, type, row) {
            var name = row.sintomas_signos;
            switch (language["language"]) {
              case "en":
                name = row.sintomas_signos_en;
                break;
              case "pt":
                name = row.sintomas_signos_pt;
                break;
              case "fr":
                name = row.sintomas_signos_fr;
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

  var tableSignal = createDataTable();

  $("#modalSignal").on("show.bs.modal", function () {
    tableSignal.destroy();
    tableSignal = createDataTable();
    $(".btnSignal").prop("disabled", true);
  });

  tableSignal.on("select", function () {
    $(".btnSignal").prop("disabled", false);
  });

  tableSignal.on("deselect", function () {
    $(".btnSignal").prop("disabled", true);
  });

  $(".btnSignal").on("click", function () {
    var dataSelectCIE10 = tableSignal.rows(".selected").data();
    $("#signal").val(dataSelectCIE10[0].sintomas_signos);
    $("#id_signal").val(dataSelectCIE10[0].id_signos);
  });

  $("#btnSaveTriage").on("click", function (e) {
    e.preventDefault();
    var dataAdmission = {
      id_admission: dataSelect.id_admision,
      id_attention: $("#attention option:selected").val(),
      id_locationTrauma: "null",
      id_causeTrauma: "null",
      id_system: "null",
      glasgow:
        $("#glasgow").val() == "" ? "null" : "'" + $("#glasgow").val() + "'",
      pas: $("#pas").val() == "" ? "null" : "'" + $("#pas").val() + "'",
      pad: $("#pad").val() == "" ? "null" : "'" + $("#pad").val() + "'",
      fc: $("#fc").val() == "" ? "null" : "'" + $("#fc").val() + "'",
      so2: $("#so2").val() == "" ? "null" : "'" + $("#so2").val() + "'",
      fr: $("#fr").val() == "" ? "null" : "'" + $("#fr").val() + "'",
      temp: $("#temp").val() == "" ? "null" : "'" + $("#temp").val() + "'",
      classification: "'" + $("#classification option:selected").val() + "'",
      dolor: $("#dolor option:selected").val(),
      id_signal: $("#id_signal").val(),
      motivation:
        $("#motivation").val() == ""
          ? "null"
          : "'" + $("#motivation").val() + "'",
      signalDescription:
        $("#signalDescription").val() == ""
          ? "null"
          : "'" + $("#signalDescription").val() + "'",
      old_classification: dataSelect.clasificacion_admision,
    };
    if ($("#attention option:selected").val() == 1) {
      dataAdmission.id_locationTrauma = $(
        "#locationTrauma option:selected"
      ).val();
      dataAdmission.id_causeTrauma = $("#causeTrauma option:selected").val();
    } else if ($("#attention option:selected").val() == 2) {
      dataAdmission.id_system = $("#system option:selected").val();
    }
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      data: {
        option: "updateAdmission",
        data: dataAdmission,
      },
    })
      .done(function () {
        tableAdmission.ajax.reload();
        $("#collapseOne").collapse("hide");
      })
      .fail(function () {
        console.log("error");
      });
  });
});
