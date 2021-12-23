$(document).ready(function () {
  showGraph();
});

function showGraph() {
  {
    var name = [];
    var age = [];
    var total = [];
    var pieAge = [];

    for (var i in data) {
      name.push(data[i].student_name);
      age.push(data[i].age);
    }

    for (var i in data2) {
      total.push(data2[i].total);
      pieAge.push(data2[i].age);
    }

    var chartdata = {
      labels: name,
      datasets: [
        {
          label: "Age",
          backgroundColor: "#0b8f94",
          borderColor: "#46d5f1",
          hoverBackgroundColor: "#CCCCCC",
          hoverBorderColor: "#666666",
          data: age,
        },
      ],
    };

    var piedata = {
      labels: pieAge,
      datasets: [
        {
          label: "No of Students",
          backgroundColor: [
            "#49e2ff",
            "#0074D9",
            "#FF4136",
            "#2ECC40",
            "#FF851B",
            "#7FDBFF",
          ],
          borderColor: "#46d5f1",
          hoverBackgroundColor: "#CCCCCC",
          hoverBorderColor: "#666666",
          data: total,
        },
      ],
    };

    var graphTarget = $("#graphCanvas");
    var graphTarget2 = $("#graphCanvas2");

    new Chart(graphTarget, {
      type: "bar",
      data: chartdata,
    });
    new Chart(graphTarget2, {
      type: "pie",
      data: piedata,
    });
  }
}
