$(function () {
  var id_maestro, cod_ambulance, focus_value, dataSelect;

  var tableServiceAmbulance = $("#tableServiceAmbulance").DataTable({
    select: "single",
    pageLength: 5,
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
      url: "bd/crud.php",
      method: "POST",
      data: { option: "selectPrehServiceAmbulance" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "cod_casopreh" },
      { data: "fecha" },
      { data: "incidente" },
      { defaultContent: "" },
      { data: "cod_ambulancia" },
      { data: "hora_asigna" },
      { data: "hora_llegada" },
      { data: "hora_inicio" },
      { data: "hora_destino" },
      { data: "hora_preposicion" },
      { data: "preposicion" },
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
        targets: 3,
      },
    ],
    //rowId: 'extn',
    dom: "Bfrtip",
  });

  tableServiceAmbulance.on("draw", function () {
    $(".fa-clock-o").parent().css("color", "red");
  });

  tableServiceAmbulance.on("select", function (e, dt, type, indexes) {
    if (type === "row") {
      dataSelect = tableServiceAmbulance.rows(indexes).data()[0];
      id_maestro = dataSelect.cod_casopreh;
      cod_ambulance = dataSelect.cod_ambulancia;

      $("span.case").text(" - Caso: " + id_maestro);

      //Se actualiza formulario ambulancia
      $("#form_ambulance").trigger("reset");
      if (dataSelect.hora_asigna)
        $("#date_asig").val(dataSelect.hora_asigna.replace(" ", "T"));
      if (dataSelect.hora_llegada)
        $("#date_lleg").val(dataSelect.hora_llegada.replace(" ", "T"));
      if (dataSelect.hora_inicio)
        $("#date_ini").val(dataSelect.hora_inicio.replace(" ", "T"));
      if (dataSelect.hora_destino)
        $("#date_dest").val(dataSelect.hora_destino.replace(" ", "T"));
      if (dataSelect.hora_preposicion)
        $("#date_base").val(dataSelect.hora_preposicion.replace(" ", "T"));
      $("#conductor").val(dataSelect.conductor);
      $("#medico").val(dataSelect.medico);
      $("#paramedico").val(dataSelect.paramedico);
      $("#obs").html(dataSelect.observacion_ambulancia);
      if (dataSelect.cod_ambulancia) {
        $("#serviceAmbulance").val(
          dataSelect.cod_ambulancias + " - " + dataSelect.placas
        );
        $(".change").prop("disabled", false);
      } else {
        $(".change").prop("disabled", true);
      }

      $("#collapseOne").collapse("show");
    }
  });

  function crud_ajax(field, val, option) {
    if (focus_value != val) {
      $.ajax({
        url: "bd/crud.php",
        method: "POST",
        data: {
          option: option,
          idM: id_maestro,
          codA: cod_ambulance,
          setField: val,
          field: field,
        },
      })
        .done(function () {
          tableServiceAmbulance.ajax.reload();
        })
        .fail(function () {
          console.log("error");
        });
    }
  }

  //Formulario ambulancia
  $("#date_asig").focus(function () {
    focus_value = $(this).val().replace("T", " ");
  });

  $("#date_lleg").focus(function () {
    focus_value = $(this).val().replace("T", " ");
  });

  $("#date_ini").focus(function () {
    focus_value = $(this).val().replace("T", " ");
  });

  $("#date_dest").focus(function () {
    focus_value = $(this).val().replace("T", " ");
  });

  $("#date_base").focus(function () {
    focus_value = $(this).val().replace("T", " ");
  });

  $("#conductor").focus(function () {
    focus_value = $(this).val();
  });

  $("#medico").focus(function () {
    focus_value = $(this).val();
  });

  $("#paramedico").focus(function () {
    focus_value = $(this).val();
  });

  $("#obs").focus(function () {
    focus_value = $(this).val();
  });

  $("#date_asig").focusout(function () {
    crud_ajax("hora_asigna", $(this).val().replace("T", " "), "updatePrehSA");
  });

  $("#date_lleg").focusout(function () {
    crud_ajax("hora_llegada", $(this).val().replace("T", " "), "updatePrehSA");
  });

  $("#date_ini").focusout(function () {
    crud_ajax("hora_inicio", $(this).val().replace("T", " "), "updatePrehSA");
  });

  $("#date_dest").focusout(function () {
    crud_ajax("hora_destino", $(this).val().replace("T", " "), "updatePrehSA");
  });

  $("#date_base").focusout(function () {
    crud_ajax(
      "hora_preposicion",
      $(this).val().replace("T", " "),
      "updatePrehSA"
    );
  });

  $("#conductor").focusout(function () {
    crud_ajax("conductor", $(this).val(), "updatePrehSA");
  });

  $("#medico").focusout(function () {
    crud_ajax("medico", $(this).val(), "updatePrehSA");
  });

  $("#paramedico").focusout(function () {
    crud_ajax("paramedico", $(this).val(), "updatePrehSA");
  });

  $("#obs").focusout(function () {
    crud_ajax("observaciones", $(this).val(), "updatePrehSA");
  });
  //end formulario ambulancia

  var tableAmbulance = $("#tableAmbulance").DataTable({
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
      url: "bd/crud.php",
      method: "POST",
      data: { option: "selectAmbulance" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [{ data: "cod_ambulancias" }, { data: "placas" }],
    //dom: 'Bfrtip'
  });

  $("#modalAmbulance").on("show.bs.modal", function () {
    tableAmbulance.ajax.reload();
  });

  tableAmbulance.on("select", function (e, dt, type, indexes) {
    $(".btnAmbulance").prop("disabled", false);
  });

  tableAmbulance.on("deselect", function (e, dt, type, indexes) {
    $(".btnAmbulance").prop("disabled", true);
  });

  $(".btnAmbulance").on("click", function () {
    var dataSelectAmbulance = tableAmbulance.rows(".selected").data()[0];
    var option = dataSelect.cod_ambulancia ? "updatePrehSA" : "insertPrehSA";
    $("#serviceAmbulance").val(
      dataSelectAmbulance.cod_ambulancias + " - " + dataSelectAmbulance.placas
    );
    crud_ajax("cod_ambulancia", dataSelectAmbulance.cod_ambulancias, option);
    $(".change").prop("disabled", false);
  });

  setInterval(function () {
    tableServiceAmbulance.ajax.reload();
  }, 30000);
});
