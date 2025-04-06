/******GRAFICO DE LA isquierda********* */
$.ajax({
    url: "reporte_c/List_Cumplimiento",
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    method: "GET",
    success: function (datos_campanna) {
      var label_medico_nombre = [];
      var pronostico = [];
      var cumplimiento = [];
      var porciento_Cumplimiento = [];
    
      var color = ['rgba(54, 235, 84, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)', 'rgba(255, 159, 64, 0.05)'];
      var bordercolor = ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
  
  
      for (var i in datos_campanna) {
        
          label_medico_nombre.push(datos_campanna[i].medico);
          pronostico.push(datos_campanna[i].Pronostico);
          cumplimiento.push(datos_campanna[i].Cumplimiento);
          porciento_Cumplimiento.push(datos_campanna[i].Porciento_Cumplimiento);
       
      }
  
  
  
      var chartcampanna_frio = {
        labels: label_medico_nombre,
        datasets: [{
          label: "Pronóstico (U)",
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 0.5)',
          borderWidth: 2,
          hoverBackgroundColor: 'rgba(54, 162, 235, 0.5)',
          hoverBorderColor: 'rgba(54, 162, 235, 1)',
          data: pronostico
        },
        {
            label: "Cumplimiento (U)",
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 0.5)',
            borderWidth: 2,
            hoverBackgroundColor: 'rgba(255, 99, 132, 0.5)',
            hoverBorderColor: 'rgba(255,99,132,1)',
            data: cumplimiento
          },
          {
            label: "Porciento de Cumplimiento (%)",
            backgroundColor: 'rgba(54, 235, 84, 0.5)',
            borderColor: 'rgba(54, 235, 84, 0.5)',
            borderWidth: 2,
            hoverBackgroundColor: 'rgba(54, 235, 84, 0.5)',
            hoverBorderColor: 'rgba(54, 235, 84, 1)',
            data: porciento_Cumplimiento
          }
    ]
      };
  
      var mostrarcampanna_frio = $("#grafico");
  
      var grafico_frio = new Chart(mostrarcampanna_frio, {
        type: 'bar',//bar/doughnut/pie
        data: chartcampanna_frio,
        options: {
          responsive: true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
        }
      });
    },
    error: function (datos_campanna) {
      console.log(datos_campanna);
    }
  
  
  
});
  
  
  
  
/******GRAFICO DE LA DERECHA********* */
  
$.ajax({
    url: "Grafo_Neto_Campanna",
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    method: "GET",
    success: function (datos_campanna) {
      var label_campanna_frio = [];
      var neto_campanna_frio = [];
      var label_campanna_primavera = [];
      var neto_campanna_primavera = [];
      var color = ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)', 'rgba(255, 159, 64, 0.05)'];
      var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
  
  
  
      for (var i in datos_campanna) {
        if (datos_campanna[i].Estacion == "PRIMAVERA") {
          let str = datos_campanna[i].Anno;
          label_campanna_primavera.push(str.slice(0, 4));
          neto_campanna_primavera.push(datos_campanna[i].Neto);
        }
      }
  
      var chartcampanna_primavera = {
        labels: label_campanna_primavera,
        datasets: [{
          label: label_campanna_primavera,
          backgroundColor: color,
          borderColor: color,
          borderWidth: 2,
          hoverBackgroundColor: color,
          hoverBorderColor: bordercolor,
          data: neto_campanna_primavera
        }]
      };
  
      var mostrarcampanna_primavera = $("#grafico2");
      var grafico_primavera = new Chart(mostrarcampanna_primavera, {
        type: 'doughnut',//bar/doughnut/pie
        data: chartcampanna_primavera,
        options: {
          responsive: true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
        }
      });
    },
    error: function (datos_campanna) {
      console.log(datos_campanna);
    }
  
  });