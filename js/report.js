$(function () {
  let dataSelect,
    colors = [];
  language = {
    language: localStorage.getItem("language"),
    select: localStorage.getItem("language_select"),
  };

  const tableAmbulance = $("#tableAmbulance").DataTable({
    select: "single",
    pageLength: 5,
    language: {
      url: "lang/" + language["language"] + ".json",
    },
    ajax: {
      url: "bd/report.php",
      method: "POST",
      data: { option: "selectAmbulance" },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "cod_ambulancias" },
      { data: "placas" },
      { data: "marca" },
      { defaultContent: "" },
    ],
    columnDefs: [
      {
        render: function (data, type, row) {
          return row.estado == "1"
            ? "<div style='color:green'>Disponible</div>"
            : "<div style='color:red'>No disponible</div>";
        },
        targets: 3,
      },
    ],
    dom: "Bfrtip",
  });

  const getRandomColor = () => {
    var num = (Math.floor(Math.random() * 4) * 4).toString(16);
    var letters = ["0", "F", num];
    var color = "#";
    for (var i = 0; i < 3; i++) {
      let pos = Math.floor(Math.random() * letters.length);
      color += letters[pos];
      letters.splice(pos, 1);
    }
    //para evitar que se repitan colores
    if (colors.includes(color)) return getRandomColor();
    else colors.push(color);
    return color;
  };

  $.ajax({
    url: "./bd/report.php",
    method: "POST",
    dataType: "json",
    data: {
      option: "selectAmbulanceReport",
    },
  }).done(function (response) {
    colors = [];
    response.map(function () {
      getRandomColor();
    });
    console.log(colors);
    const config = {
      type: "bar",
      data: {
        labels: response.map(function (item) {
          return item.x;
        }),
        datasets: [
          {
            data: response.map(function (item) {
              return parseInt(item.y);
            }),
            backgroundColor: colors,
            barPercentage: 0.5,
          },
        ],
      },
      options: {
        legend: { display: false },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
    };
    const myChart = new Chart(document.getElementById("myChart"), config);
  });
});
