$(function () {
  window.jsPDF = window.jspdf.jsPDF;
  var id_patient,
    focus_value,
    dataSelect,
    updatePatient = false;
  (id_hospital = $("#data-user").data("hospital")),
    (language = {
      language: localStorage.getItem("language"),
      information: localStorage.getItem("pdf_information"),
      date: localStorage.getItem("pdf_date"),
      hour: localStorage.getItem("pdf_hour"),
      priority: localStorage.getItem("pdf_priority"),
      incident: localStorage.getItem("pdf_incident"),
      ambulance: localStorage.getItem("pdf_ambulance"),
      place: localStorage.getItem("pdf_place"),
      kmStart: localStorage.getItem("pdf_kmstart"),
      kmEnd: localStorage.getItem("pdf_kmend"),
      patientName: localStorage.getItem("pdf_patientname"),
      gender: localStorage.getItem("pdf_gender"),
      dateBirth: localStorage.getItem("pdf_datebirth"),
      age: localStorage.getItem("pdf_age"),
      cause: localStorage.getItem("pdf_cause"),
      infoTime: localStorage.getItem("pdf_infotime"),
      hourStart: localStorage.getItem("pdf_hourstart"),
      hourPlace: localStorage.getItem("pdf_hourplace"),
      hourHospital: localStorage.getItem("pdf_hourhospital"),
      hourBase: localStorage.getItem("pdf_hourbase"),
      expGeneral: localStorage.getItem("pdf_expgeneral"),
      category: localStorage.getItem("pdf_category"),
      name: localStorage.getItem("pdf_name"),
      process: localStorage.getItem("pdf_process"),
      expPhysical: localStorage.getItem("pdf_expphysical"),
      position: localStorage.getItem("pdf_position"),
      trauma: localStorage.getItem("pdf_trauma"),
      signal: localStorage.getItem("pdf_signal"),
      fr: localStorage.getItem("pdf_fr"),
      ta: localStorage.getItem("pdf_ta"),
      fc: localStorage.getItem("pdf_fc"),
      sao2: localStorage.getItem("pdf_sao2"),
      temp: localStorage.getItem("pdf_temp"),
      glasgow: localStorage.getItem("pdf_glasgow"),
      past: localStorage.getItem("pdf_past"),
      diabetes: localStorage.getItem("pdf_diabetes"),
      heartDisease: localStorage.getItem("pdf_heartdisease"),
      seizures: localStorage.getItem("pdf_seizures"),
      asthma: localStorage.getItem("pdf_asthma"),
      acv: localStorage.getItem("pdf_acv"),
      has: localStorage.getItem("pdf_has"),
      allergy: localStorage.getItem("pdf_allergy"),
      other: localStorage.getItem("pdf_other"),
      medical: localStorage.getItem("pdf_medical"),
      diag: localStorage.getItem("pdf_diag"),
      cie10: localStorage.getItem("pdf_cie10"),
      cie10diag: localStorage.getItem("pdf_cie10diag"),
      complement: localStorage.getItem("pdf_complement"),
      supplies: localStorage.getItem("pdf_supplies"),
      cant: localStorage.getItem("pdf_cant"),
      triage: localStorage.getItem("pdf_triage"),
      obs: localStorage.getItem("pdf_obs"),
      belongings: localStorage.getItem("pdf_belongings"),
      desc: localStorage.getItem("pdf_desc"),
      nameReceives: localStorage.getItem("pdf_namereceives"),
      optionCloseCase: localStorage.getItem("pdf_optionclosecase"),
      responsible: localStorage.getItem("pdf_responsible"),
      doctor: localStorage.getItem("pdf_doctor"),
      nurse: localStorage.getItem("pdf_nurse"),
      destiny: localStorage.getItem("pdf_destiny"),
      hospital: localStorage.getItem("pdf_hospital"),
      doctorReceives: localStorage.getItem("pdf_doctorreceives"),
      doctorFirm: localStorage.getItem("pdf_doctorfirm"),
    });

  var tablePatient = $("#tablePatient").DataTable({
    select: "single",
    language: {
      url: "lang/" + language["language"] + ".json",
    },
    ajax: {
      url: "bd/admission.php",
      method: "POST",
      data: { option: "selectPatient", idH: id_hospital },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "id_paciente" },
      { defaultContent: "" },
      { defaultContent: "" },
    ],
    columnDefs: [
      {
        render: function (data, type, row) {
          return row.nombre1
            ? row.nombre1
            : "" + " " + row.nombre2
            ? row.nombre2
            : "";
        },
        targets: 1,
      },
      {
        render: function (data, type, row) {
          return row.apellido1
            ? row.apellido1
            : "" + " " + row.apellido2
            ? row.apellido2
            : "";
        },
        targets: 2,
      },
    ],
    //dom: 'Bfrtip'
  });

  function crud_ajax(field, val, option) {
    if (focus_value != val) {
      $.ajax({
        url: "bd/admission.php",
        method: "POST",
        data: {
          option: option,
          idP: id_patient,
          setField: val,
          field: field,
        },
      })
        .done(function () {
          tablePatient.ajax.reload();
        })
        .fail(function () {
          console.log("error");
        });
    }
  }

  function loadIde(update) {
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "selectIDE",
      },
    })
      .done(function (data) {
        $("#p_ide").empty();
        $("#p_ide").append($("<option value='0'>Seleccione...</option>"));
        $.each(data, function (index, value) {
          var description = value.descripcion;
          switch (language["language"]) {
            case "en":
              description = value.descripcion_en;
              break;
            case "pt":
              description = value.descripcion_pr;
              break;
            case "fr":
              description = value.descripcion_fr;
              break;
          }
          $("#p_ide").append(
            $(
              "<option value=" + value.id_tipo + ">" + description + "</option>"
            )
          );
          if (update) {
            if (dataSelect.tipo_doc == value.id_tipo) {
              $("#p_ide option[value=" + value.id_tipo + "]").attr(
                "selected",
                true
              );
            }
          }
        });
      })
      .fail(function () {
        console.log("error");
      });
  }

  function loadTypeAge(update) {
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      data: {
        option: "selectTypeAge",
      },
      dataType: "json",
    })
      .done(function (data) {
        $("#p_typeage").empty();
        $("#p_typeage").append($("<option value='0'>Seleccione...</option>"));
        $.each(data, function (index, value) {
          var name = value.nombre_edad;
          switch (language["language"]) {
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
            $("<option value=" + value.id_edad + ">" + name + "</option>")
          );
          if (update) {
            if (dataSelect.cod_edad == value.id_edad) {
              $("#p_typeage option[value=" + value.id_edad + "]").attr(
                "selected",
                true
              );
            }
          }
        });
      })
      .fail(function () {
        console.log("error");
      });
  }

  $.ajax({
    url: "bd/admission.php",
    method: "POST",
    data: {
      option: "selectIngress",
    },
    dataType: "json",
  })
    .done(function (data) {
      $("#ingress").empty();
      $("#ingress").append(
        $("<option value='0'>-- Seleccione una opción --</option>")
      );
      $.each(data, function (index, value) {
        var name = value.nombre_ingreso;
        switch (language["language"]) {
          case "en":
            name = value.nombre_ingreso_en;
            break;
          case "pt":
            name = value.nombre_ingreso_pt;
            break;
          case "fr":
            name = value.nombre_ingreso_fr;
            break;
        }
        $("#ingress").append(
          $("<option value=" + value.id_ingreso + ">" + name + "</option>")
        );
      });
    })
    .fail(function () {
      console.log("error");
    });

  $("#ingress").on("change", function (e) {
    $("#ingress option:selected").val() != 0 && $("#idP").val() != ""
      ? $("#btnSaveAdmission").prop("disabled", false)
      : $("#btnSaveAdmission").prop("disabled", true);
    if ($("#ingress option:selected").text() == "Ambulancia 911") {
      $.trim($("#code").val()) != ""
        ? $("#btnSaveAdmission").prop("disabled", false)
        : $("#btnSaveAdmission").prop("disabled", true);
      $("#labelCode").prop("hidden", false);
      $("#code").prop("hidden", false);
    } else {
      $("#labelCode").prop("hidden", true);
      $("#code").prop("hidden", true);
      $("#code").val("");
    }
  });

  $("#btnSaveAdmission").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      data: {
        option: "insertAdmission",
        ingress: $("#ingress option:selected").val(),
        cod911: $("#code").val() == "" ? "null" : $("#code").val(),
        idP: id_patient,
        companion:
          $("#companion").val() == ""
            ? "null"
            : "'" + $("#companion").val() + "'",
        phone_companion:
          $("#phone_companion").val() == ""
            ? "null"
            : "'" + $("#phone_companion").val() + "'",
      },
    })
      .done(function () {
        $("#form_admission").trigger("reset");
        $("#collapseOne").collapse("hide");
        $("#labelCode").prop("hidden", true);
        $("#code").prop("hidden", true);
        $("#btnSaveAdmission").prop("disabled", true);
      })
      .fail(function () {
        console.log("error");
      });
  });

  $(".showModal").on("click", function () {
    tablePatient.ajax.reload();
    $("#patient").modal();
  });

  $(".addPatient").on("click", function () {
    $("#form_paciente").trigger("reset");
    $("#p_obs").html("");
    loadIde(false);
    loadTypeAge(false);
    $("#idP").val("");
    $("#collapseOne").collapse("show");
    $("#btnAddPatient").prop("hidden", false);
    updatePatient = false;
    $("#btnSaveAdmission").prop("disabled", true);
    $("#print-admission").prop("disabled", true);
  });

  tablePatient.on("select", function (e, dt, type, indexes) {
    dataSelect = tablePatient.rows(indexes).data()[0];
    id_patient = dataSelect.id_paciente;
    $(".btnPatient").prop("disabled", false);
  });

  tablePatient.on("deselect", function (e, dt, type, indexes) {
    $(".btnPatient").prop("disabled", true);
  });

  $(".btnPatient").on("click", function () {
    var dataSelectPatient = tablePatient.rows(".selected").data()[0];
    $("#btnAddPatient").prop("hidden", true);
    updatePatient = true;
    $("#idP").val(
      dataSelectPatient.id_paciente +
        "-" +
        (dataSelectPatient.nombre1 ? dataSelectPatient.nombre1 : "") +
        " " +
        (dataSelectPatient.apellido1 ? dataSelectPatient.apellido1 : "")
    );
    //Se actualiza formulario paciente
    $("#form_paciente").trigger("reset");
    loadIde(true);
    $("#p_number").val(dataSelectPatient.num_doc);
    $("#p_exp").val(dataSelectPatient.expendiente);
    $("#p_date").val(dataSelectPatient.fecha_nacido);
    $("#p_age").val(dataSelectPatient.edad);
    loadTypeAge(true);
    if (dataSelectPatient.genero == 1) {
      $("#p_genM").prop("checked", true);
    } else if (dataSelectPatient.genero == 2) {
      $("#p_genF").prop("checked", true);
    }
    $("#p_phone").val(dataSelectPatient.telefono_paciente);
    $("#p_name1").val(dataSelectPatient.nombre1);
    $("#p_name2").val(dataSelectPatient.nombre2);
    $("#p_lastname1").val(dataSelectPatient.apellido1);
    $("#p_lastname2").val(dataSelectPatient.apellido2);
    $("#p_segS").val(dataSelectPatient.aseguradro);
    $("#p_address").val(dataSelect.direccion_paciente);
    $("#p_obs").html(dataSelect.observacion_paciente);
    $("#collapseOne").collapse("show");
    if ($("#ingress option:selected").text() == "Ambulancia 911") {
      $.trim($("#code").val()) != ""
        ? $("#btnSaveAdmission").prop("disabled", false)
        : $("#btnSaveAdmission").prop("disabled", true);
    } else if ($("#ingress option:selected").val() != 0) {
      $("#btnSaveAdmission").prop("disabled", false);
    } else {
      $("#btnSaveAdmission").prop("disabled", true);
    }
    $("#print-admission").prop("disabled", false);
  });

  $("#btnAddPatient").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      dataType: "json",
      data: {
        option: "insertPatient",
        patient: {
          expendiente: $("#p_exp").val(),
          num_doc: $("#p_number").val(),
          tipo_doc: $("#p_ide option:selected").val(),
          nombre1: $("#p_name1").val(),
          nombre2: $("#p_name2").val(),
          apellido1: $("#p_lastname1").val(),
          apellido2: $("#p_lastname2").val(),
          genero: $("input:checked").val() == "m" ? 1 : 2,
          edad: $("#p_age").val(),
          fecha_nacido: $("#p_date").val(),
          cod_edad: $("#p_typeage option:selected").val(),
          telefono: $("#p_phone").val(),
          //celular:
          direccion: $("#p_address").val(),
          //email:
          aseguradro: $("#p_segS").val(),
          observacion: $("#p_obs").val(),
          //nss:
          //usu_sede:
          //prehospitalario:
        },
      },
    })
      .done(function (data) {
        updatePatient = true;
        $("#btnAddPatient").prop("hidden", true);
        $("#idP").val(
          data[0].id_paciente +
            "-" +
            $("#p_name1").val() +
            " " +
            $("#p_lastname1").val()
        );
        if ($("#ingress option:selected").val() != 0)
          $("#btnSaveAdmission").prop("disabled", false);
      })
      .fail(function () {
        console.log("error");
      });
  });

  $("#code").on("keyup", function () {
    $.trim($(this).val()) != "" && $("#idP").val() != ""
      ? $("#btnSaveAdmission").prop("disabled", false)
      : $("#btnSaveAdmission").prop("disabled", true);
  });

  $("#print-admission").on("click", function () {
    $.ajax({
      url: "bd/admission.php",
      method: "POST",
      data: {
        option: "printInformation",
        id_casePreh: dataSelect.cod_casopreh,
      },
      dataType: "json",
    })
      .done(function (data) {
        console.log(data);
        var doc = new jsPDF();
        doc.setFontSize(18);
        var img = new Image();
        img.src = "images/SISMED911_logo.png";
        switch (language["language"]) {
          case "en":
            img.src = "images/SISMED911_logo_en.png";
            break;
          case "pt":
            break;
          case "fr":
            break;
        }
        doc.addImage(img, "png", 140, 10, 60, 20);
        doc.text(
          language["information"] + data["data"].caso,
          doc.internal.pageSize.getWidth() / 2,
          40,
          { align: "center" }
        );

        doc.autoTable({
          theme: "grid",
          startY: 45,
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              language["date"],
              language["hour"],
              language["priority"],
              language["incident"],
              language["ambulance"],
            ],
          ],
          body: [
            [
              data["data"].fecha.split(" ")[0],
              data["data"].fecha.split(" ")[1],
              data["data"].prioridad,
              data["data"].incidente,
              data["data"].ambulancia,
            ],
          ],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [[language["place"], language["kmStart"], language["kmEnd"]]],
          body: [
            [
              data["data"].direcevento,
              data["data"].km_inicial,
              data["data"].km_final,
            ],
          ],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              language["patientName"],
              language["gender"],
              language["dateBirth"],
              language["age"],
            ],
          ],
          body: [
            [
              data["data"].paciente,
              data["data"].genero,
              data["data"].fecha_nacimiento,
              data["data"].edad + " " + data["data"].edad_tipo,
            ],
          ],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: {
            halign: "center",
            fillColor: null,
            lineWidth: 0.3,
            textColor: 0,
          },
          bodyStyles: { textColor: 50 },
          head: [[language["cause"]]],
          body: [[data["data"].causa]],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["infoTime"],
                colSpan: 4,
                styles: { halign: "center" },
              },
            ],
            [
              language["hourStart"],
              language["hourPlace"],
              language["hourHospital"],
              language["hourBase"],
            ],
          ],
          body: [
            [
              data["data"].hora_inicio,
              data["data"].hora_evento,
              data["data"].hora_hospital,
              data["data"].hora_base,
            ],
          ],
        });

        var body = [];
        $.each(data["general"], function (index, value) {
          body.push([
            value.explo_general_cat_desc,
            value.explo_general_afec_desc,
          ]);
        });
        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["expGeneral"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
            [language["category"], language["name"]],
          ],
          body: body,
        });

        body = [];
        $.each(data["process"], function (index, value) {
          body.push([index + 1 + " - " + value.procedimiento]);
        });
        doc.autoTable({
          theme: "grid",
          headStyles: {
            halign: "center",
            fillColor: null,
            lineWidth: 0.3,
            textColor: 0,
          },
          bodyStyles: { textColor: 50 },
          head: [[language["process"]]],
          body: body,
        });

        doc.addPage();

        body = [];
        $.each(data["physical"], function (index, value) {
          body.push(["Punto " + value.physical_pos, value.physical_name]);
        });
        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["expPhysical"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
            [language["position"], language["trauma"]],
          ],
          body: body,
        });

        img = new Image();
        img.src = "images/body.png";
        doc.addImage(
          img,
          "png",
          doc.internal.pageSize.getWidth() / 2 - 20,
          doc.autoTable.previous.finalY + 5,
          50,
          100
        );

        doc.autoTable({
          startY: doc.autoTable.previous.finalY + 110,
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["signal"],
                colSpan: 7,
                styles: { halign: "center" },
              },
            ],
            [
              language["hour"],
              language["fr"],
              language["ta"],
              language["fc"],
              language["sao2"],
              language["temp"],
              language["glasgow"],
            ],
          ],
          body: [
            [
              data["data"].hora_evaluacion,
              data["data"].frecuencia_respiratoria,
              data["data"].presion_arterial,
              data["data"].frecuencia_cardiaca,
              data["data"].saturacion_o2,
              data["data"].temperatura,
              data["data"].glasgow,
            ],
          ],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["past"],
                colSpan: 4,
                styles: { halign: "center" },
              },
            ],
          ],
          body: [
            [
              language["diabetes"] +
                ": " +
                (data["data"].a_diabetes ? data["data"].a_diabetes : ""),
              language["heartDisease"] +
                ": " +
                (data["data"].a_cardiopatia ? data["data"].a_cardiopatia : ""),
              language["seizures"] +
                ": " +
                (data["data"].a_convul ? data["data"].a_convul : ""),
              language["asthma"] +
                ": " +
                (data["data"].a_asma ? data["data"].a_asma : ""),
            ],
            [
              language["acv"] +
                ": " +
                (data["data"].a_acv ? data["data"].a_acv : ""),
              language["has"] +
                ": " +
                (data["data"].a_has ? data["data"].a_has : ""),
              language["allergy"] +
                ": " +
                (data["data"].a_alergia ? data["data"].a_alergia : ""),
            ],
            [
              {
                content:
                  language["other"] +
                  ": " +
                  (data["data"].a_otros ? data["data"].a_otros : ""),
                colSpan: 2,
              },
              {
                content:
                  language["medical"] +
                  ": " +
                  (data["data"].a_medicamentos
                    ? data["data"].a_medicamentos
                    : ""),
                colSpan: 2,
              },
            ],
          ],
        });

        body = [];
        $.each(data["cie"], function (index, value) {
          body.push([value.codigo_cie, value.diagnostico]);
        });
        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["diag"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
            [language["cie10"], language["cie10diag"]],
          ],
          body: body,
        });

        body = [];
        $.each(data["medical"], function (index, value) {
          body.push([value.nombre_medicamento, value.cant_medical]);
        });
        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["complement"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
            [language["medical"], language["cant"]],
          ],
          body: body,
        });

        body = [];
        $.each(data["supplies"], function (index, value) {
          body.push([value.nombre_insumo, value.cant_insumo]);
        });
        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["complement"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
            [language["supplies"], language["cant"]],
          ],
          body: body,
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["other"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
          ],
          body: [
            [
              language["triage"] +
                ": " +
                (data["data"].triage ? data["data"].triage : ""),
              language["obs"] +
                ": " +
                (data["data"].observaciones ? data["data"].observaciones : ""),
            ],
          ],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["belongings"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
          ],
          body: [
            [
              language["desc"] +
                ": " +
                (data["data"].descrip_pertenencias
                  ? data["data"].descrip_pertenencias
                  : ""),
              language["nameReceives"] +
                ": " +
                (data["data"].nombre_p_recibe
                  ? data["data"].nombre_p_recibe
                  : ""),
            ],
          ],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: {
            halign: "center",
            fillColor: null,
            lineWidth: 0.3,
            textColor: 0,
          },
          bodyStyles: { textColor: 50 },
          head: [[language["optionCloseCase"]]],
          body: [[data["data"].cierre]],
        });

        doc.autoTable({
          theme: "grid",
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          head: [
            [
              {
                content: language["responsible"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
          ],
          body: [
            [
              language["doctor"] +
                ": " +
                (data["data"].atmedico ? data["data"].atmedico : ""),
              language["nurse"] +
                ": " +
                (data["data"].atenfermero ? data["data"].atenfermero : ""),
            ],
          ],
        });

        doc.setFontSize(20);
        doc.text(
          "X____________________      X____________________",
          14,
          doc.autoTable.previous.finalY + 10
        );

        doc.autoTable({
          theme: "grid",
          startY: doc.autoTable.previous.finalY + 20,
          headStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          bodyStyles: { textColor: 50 },
          footStyles: { fillColor: null, lineWidth: 0.3, textColor: 0 },
          head: [
            [
              {
                content: language["destiny"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
          ],
          body: [
            [
              language["hospital"] +
                ": " +
                (data["data"].hospital_nombre
                  ? data["data"].hospital_nombre
                  : ""),
              language["doctorReceives"] +
                ": " +
                (data["data"].medico_recibe ? data["data"].medico_recibe : ""),
            ],
          ],
          foot: [
            [
              {
                content: language["doctorFirm"],
                colSpan: 2,
                styles: { halign: "center" },
              },
            ],
          ],
        });

        doc.save("orden_admision.pdf");
      })
      .fail(function () {
        console.log("error");
      });
  });

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

  $("#p_phone").on("focus", function () {
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
    if (updatePatient && $("#p_ide option:selected").val() != 0)
      crud_ajax("tipo_doc", $("#p_ide option:selected").val(), "updateP");
  });

  /* Validación de número de cédula dominicana */
  $("#p_number").on("focusout", function () {
    if ($("#p_ide option:selected").val() == 1) {
      if (number_validate($(this).val())) {
        $(".form-control#p_number").removeClass("is-invalid");
        if (updatePatient) crud_ajax("num_doc", $(this).val(), "updateP");
      } else {
        $(".form-control#p_number").addClass("is-invalid");
      }
    } else {
      $(".form-control#p_number").removeClass("is-invalid");
      if (updatePatient) crud_ajax("num_doc", $(this).val(), "updateP");
    }
  });

  $("#p_exp").on("focusout", function () {
    if (updatePatient) crud_ajax("expendiente", $(this).val(), "updateP");
  });

  $("#p_date").on("focusout", function () {
    if (updatePatient) crud_ajax("fecha_nacido", $(this).val(), "updateP");
  });

  $("#p_age").on("focusout", function () {
    if (updatePatient) crud_ajax("edad", $(this).val(), "updateP");
  });

  $("#p_typeage").on("change", function () {
    if (updatePatient && $("#p_typeage option:selected").val() != 0)
      crud_ajax("cod_edad", $("#p_typeage option:selected").val(), "updateP");
  });

  $(".gender").on("click", function () {
    if (updatePatient) crud_ajax("genero", $("input:checked").val(), "updateP");
  });

  $("#p_phone").on("focusout", function () {
    if (updatePatient) crud_ajax("telefono", $(this).val(), "updateP");
  });

  $("#p_name1").on("focusout", function () {
    if (updatePatient) {
      crud_ajax("nombre1", $(this).val(), "updateP");
      $("#idP").val(
        id_patient + "-" + $(this).val() + " " + $("#p_lastname1").val()
      );
    }
  });

  $("#p_name2").on("focusout", function () {
    if (updatePatient) crud_ajax("nombre2", $(this).val(), "updateP");
  });

  $("#p_lastname1").on("focusout", function () {
    if (updatePatient) {
      crud_ajax("apellido1", $(this).val(), "updateP");
      $("#idP").val(
        id_patient + "-" + $("#p_name1").val() + " " + $(this).val()
      );
    }
  });

  $("#p_lastname2").on("focusout", function () {
    if (updatePatient) crud_ajax("apellido2", $(this).val(), "updateP");
  });

  $("#p_segS").on("focusout", function () {
    if (updatePatient) crud_ajax("aseguradro", $(this).val(), "updateP");
  });

  $("#p_address").on("focusout", function () {
    if (updatePatient) crud_ajax("direccion", $(this).val(), "updateP");
  });

  $("#p_obs").on("focusout", function () {
    if (updatePatient) crud_ajax("observacion", $(this).val(), "updateP");
  });
  //end formulario paciente

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
    return numberValidate;
  }

  $("#p_phone").mask("(999) 999-9999");
  $("#phone_companion").mask("(999) 999-9999");
});
