// Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


var ctx = document.getElementById("myBarChart");

axios.get('http://127.0.0.1:8000')  //default ip of server
  .then(function (response) {
    var myLineChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: response.data.map(function(val){
          return val.medium;
        }),
        datasets: [{
          label: "No of reported cases",
          backgroundColor: "rgba(106, 49, 94, 0.9)",
          borderColor: "rgba(2,117,216,1)",
          data: response.data.map(function(val){
            return val.count;  //count the ones retrieved from db (approved cases)
          }),
        }],
      },
      options: {
        scales: {
          xAxes: [{
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0
            },
            gridLines: {
              display: true
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });

  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

// -- Bar Chart Example
