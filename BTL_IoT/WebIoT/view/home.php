<!-- Bố cục Bootstrap -->
<div class="container">
  <div class="row" style="margin-top: 100px;">
    <div class="col-md-10">
      <div class="row ms-2 mb-3">
        <div class="col-md-3 me-5">
          <div class="row data-block">
            <div class="col-md-3"><i class="bi bi-thermometer-sun" style="font-size: 45px; color: red;"></i></div>
            <div class="col-md-9 text-center">
              <p id="temperature" style="font-size: 30px;"></p>
              <p>Temperature</p>
              <!-- <p>Nhiệt độ</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3 me-5">
          <div class="row data-block">
            <div class="col-md-3"><i class="bi bi-droplet-half" style="font-size: 40px; color: #1DA1F2;"></i></div>
            <div class="col-md-9 text-center">
              <p id="humidity" style="font-size: 25px;"></p>
              <p>Humidity</p>
              <!-- <p>Độ ẩm</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row data-block">
            <div class="col-md-3"><i class="bi bi-tornado" style="font-size: 40px; color: #63696c;"></i></div>
            <div class="col-md-9 text-center">
              <p id="wind_speed" style="font-size: 25px;"></p>
              <p>Wind Speed</p>
              <!-- <p>Tốc độ gió</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row ms-2 mb-3">
        <div class="col-md-3 me-5">
          <div class="row data-block">
            <div class="col-md-3"><i class="bi bi-speedometer" style="font-size: 40px; color: #9ea51c;"></i></div>
            <div class="col-md-9 text-center">
              <p id="pressure" style="font-size: 23px;"></p>
              <p>Pressure</p>
              <!-- <p>Áp suất</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3 me-5">
          <div class="row data-block">
            <div class="col-md-3"><i class="bi bi-cloud-sun-fill" style="font-size: 40px; color: #e87b0f;"></i></div>
            <div class="col-md-9 text-center">
              <p id="light_intensity" style="font-size: 25px;"><?= $kq1[0]['light_intensity'] ?> lux</p>
              <p>Light Intensity</p>
              <!-- <p>Ánh sáng</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row data-block">
            <div class="col-md-3"><i class="bi bi-cloud-rain-fill" style="font-size: 40px; color: #0f5aaf;"></i></div>
            <div class="col-md-9 text-center">
              <p id="percent_rain" style="font-size: 25px;"><?= $kq1[0]['percent_rain'] ?></p>
              <p>Percent Rain</p>
              <!-- <p>Khả năng mưa</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="data-block text-center" style="padding: 25px; border: 1px solid rgb(221, 221, 221); border-radius: 5px; width: 273.323px; transform: translate(-107.333px, 0px); height: 248.823px;" data-selected="true" data-label-id="0" data-metatip="true"> <!-- Gói nội dung vào một ô -->
        <p style="font-size: 30px;">Weather</p>
        <!-- <p style="font-size: 30px;">Thời Tiết</p> -->
        <!-- fas fa-cloud-sun-rain; fas fa-poo-storm; far fa-sun; fas fa-cloud-sun;  -->
        <p><i class="bi bi-brightness-low-fill" style="font-size: 70px; color: yellow;"></i></p>
        <p id="weather"></p>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-lg-6" style="margin-top: 40px">
      <!-- Biểu đồ đường nhiệt độ theo thời gian -->
      <div class="card">
        <div class="card-body">
          <!-- Biểu đồ ApexCharts -->
          <!-- <h4 class="card-title">Biểu đồ nhiệt độ theo thời gian</h4> -->
          <h4 class="card-title">Temperature over time chart</h4>
          <div id="myChart1"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top: 40px">
      <!-- Biểu đồ đường độ ẩm theo thời gian -->
      <div class="card">
        <div class="card-body">
          <!-- Biểu đồ ApexCharts -->
          <!-- <h4 class="card-title">Biểu đồ độ ẩm theo thời gian</h4> -->
          <h4 class="card-title">Humidity over time chart</h4>
          <div id="myChart2"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top: 60px">
      <!-- Biểu đồ đường tốc độ gió theo thời gian -->
      <div class="card">
        <div class="card-body">
          <!-- Biểu đồ ApexCharts -->
          <!-- <h4 class="card-title">Biểu đồ tốc độ gió theo thời gian</h4> -->
          <h4 class="card-title">Wind speed over time chart</h4>
          <div id="myChart3"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top: 60px">
      <!-- Biểu đồ đường áp suất theo thời gian -->
      <div class="card">
        <div class="card-body">
          <!-- <h4 class="card-title">Biểu đồ áp suất theo thời gian</h4> -->
          <h4 class="card-title">Pressure over time chart</h4>
          <div id="myChart4"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top: 60px; margin-bottom: 60px;">
      <!-- Biểu đồ đường cường độ ánh sáng theo thời gian -->
      <div class="card">
        <div class="card-body">
          <!-- Biểu đồ ApexCharts -->
          <!-- <h4 class="card-title">Biểu đồ cường độ ánh sáng theo thời gian</h4> -->
          <h4 class="card-title">Light intensity over time chart</h4>
          <div id="myChart5"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top: 60px; margin-bottom: 60px;">
      <!-- Biểu đồ đường mưa(dự đoán) theo thời gian -->
      <div class="card">
        <div class="card-body">
          <!-- Biểu đồ ApexCharts -->
          <!-- <h4 class="card-title">Biểu đồ mưa theo thời gian</h4> -->
          <h4 class="card-title">Percent of rain over time chart</h4>
          <div id="myChart6"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script để vẽ biểu đồ -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    function loadData() {
      fetch('./controller/home.php')
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json(); // Chuyển đổi thành JSON
        })
        .then(data => {
          // console.log(data);

          // Cập nhật các phần tử bằng dữ liệu nhận được
          $('#temperature').text(data.latest_data.temperature + ' °C');
          $('#humidity').text(data.latest_data.humidity + ' %');
          $('#wind_speed').text(data.latest_data.wind_speed + ' km/h');
          $('#pressure').text(data.latest_data.pressure + ' hPa');
          $('#light_intensity').text(data.latest_data.light_intensity + ' lux');
          $('#percent_rain').text(data.latest_data.percent_rain + ' %');
          let weather_type = data.latest_data.weather_type;
          let weather = "";
          if (weather_type == 0) {
            weather = "Storm, Heavy rain";
          } else if (weather_type == 1) {
            weather = "Cold, No rain";
          } else if (weather_type == 2) {
            weather = "Cold, Drizzle";
          } else if (weather_type == 3) {
            weather = "Cold, Heavy rain";
          } else if (weather_type == 4) {
            weather = "Cool, No rain";
          } else if (weather_type == 5) {
            weather = "Cool, Drizzle";
          } else if (weather_type == 6) {
            weather = "Cool, Heavy rain";
          } else if (weather_type == 7) {
            weather = "Sunny, No rain";
          } else if (weather_type == 8) {
            weather = "Sunny, Drizzle";
          } else if (weather_type == 9) {
            weather = "Sunny, Heavy rain";
          } else {
            weather = "Null";
          }

          $('#weather').text(weather);

          // Cập nhật biểu đồ nếu cần
          updateCharts(data.timeArray, data.temperatureArray, data.humidityArray, data.windArray, data.pressureArray, data.lightArray, data.rainArray); // Gọi hàm cập nhật biểu đồ
        })
        .catch(error => {
          console.error('Error loading data: ', error);
        });
    }

    setInterval(loadData, 0);

    loadData();

    var temperatureChart;
    var humidityChart;
    var windSpeedChart;
    var pressureChart;
    var lightIntensityChart;
    var rainProbabilityChart;

    function updateCharts(timeArray, temperatureArray, humidityArray, windArray, pressureArray, lightArray, rainArray) {
      // Cập nhật biểu đồ nhiệt độ
      if (!temperatureChart) {
        var temperatureOptions = {
          chart: {
            type: 'area',
            animations: {
              enabled: true,
              easing: 'easeinout',
              speed: 800,
            },
          },
          series: [{
            name: 'Temperature',
            // data: temperatureArray.map((temp, index) => ({
            //   x: timeArray[index],
            //   y: temp
            // })),
            data: temperatureArray.map((temp, index) => {
              // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
              let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
              let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
              return {
                x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
                y: temp
              };
            }),
          }],
          xaxis: {
            type: 'datetime',
            title: {
              text: 'Date',
              offsetY: 8,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            },
            // timezone: 'Asia/Ho_Chi_Minh', // Đặt múi giờ cho trục X
          },

          yaxis: {
            min: 0,
            max: 45,
            tickAmount: 9,
            forceNiceScale: true,
            labels: {
              formatter: val => Math.round(val),
            },
            title: {
              // text: 'Nhiệt độ (°C)',
              text: 'Temperature (°C)',
              offsetX: -7,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          }
        };

        temperatureChart = new ApexCharts(document.querySelector("#myChart1"), temperatureOptions);
        temperatureChart.render();
      } else {
        // Cập nhật dữ liệu biểu đồ hiện có
        temperatureChart.updateSeries([{
          name: 'Temperature',
          // data: temperatureArray.map((temp, index) => ({
          //   x: timeArray[index],
          //   y: temp
          // })),
          data: temperatureArray.map((temp, index) => {
            let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
            let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
            return {
              x: vnTime.getTime(),
              y: temp
            };
          }),
        }]);
      }

      // Cập nhật biểu đồ độ ẩm
      if (!humidityChart) {
        var humidityOptions = {
          chart: {
            type: 'area',
            animations: {
              enabled: true,
              easing: 'easeinout',
              speed: 800,
            },
          },
          series: [{
            name: 'Humidity',
            // data: humidityArray.map((humidity, index) => ({
            //   x: timeArray[index],
            //   y: humidity
            // })),
            data: humidityArray.map((humidity, index) => {
              // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
              let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
              let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
              return {
                x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
                y: humidity
              };
            }),
          }],
          xaxis: {
            type: 'datetime',
            title: {
              text: 'Date',
              offsetY: 8,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          },
          yaxis: {
            min: 0,
            max: 100,
            tickAmount: 10,
            forceNiceScale: true,
            labels: {
              formatter: function(val) {
                return Math.round(val);
              },
            },
            title: {
              // text: 'Độ ẩm (%)', 
              text: 'Humidity (%)',
              offsetX: -7,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          }
        };
        humidityChart = new ApexCharts(document.querySelector("#myChart2"), humidityOptions);
        humidityChart.render();
      } else {
        // Cập nhật dữ liệu biểu đồ hiện có
        humidityChart.updateSeries([{
          name: 'Humidity',
          // data: humidityArray.map((humidity, index) => ({
          //   x: timeArray[index],
          //   y: humidity
          // })),
          data: humidityArray.map((humidity, index) => {
            // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
            let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
            let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
            return {
              x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
              y: humidity
            };
          }),
        }]);
      }

      // Cập nhật biểu đồ tốc độ gió
      if (!windSpeedChart) {
        var windSpeedOptions = {
          chart: {
            type: 'area',
            animations: {
              enabled: true,
              easing: 'easeinout',
              speed: 800,
            },
          },
          series: [{
            name: 'Wind Speed',
            // data: windArray.map((speed, index) => ({
            //   x: timeArray[index],
            //   y: speed
            // })),
            data: windArray.map((speed, index) => {
              // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
              let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
              let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
              return {
                x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
                y: speed
              };
            }),
          }],
          xaxis: {
            type: 'datetime',
            title: {
              text: 'Date',
              offsetY: 8,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          },
          yaxis: {
            min: 0,
            max: 45,
            tickAmount: 8,
            forceNiceScale: true,
            labels: {
              formatter: function(val) {
                return Math.round(val);
              },
            },
            title: {
              // text: 'Tốc độ gió (km/h)', 
              text: 'Wind Speed (km/h)',
              offsetX: -7,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          }
        };
        windSpeedChart = new ApexCharts(document.querySelector("#myChart3"), windSpeedOptions);
        windSpeedChart.render();
      } else {
        // Cập nhật dữ liệu biểu đồ hiện có
        windSpeedChart.updateSeries([{
          name: 'Wind Speed',
          // data: windArray.map((speed, index) => ({
          //   x: timeArray[index],
          //   y: speed
          // })),
          data: windArray.map((speed, index) => {
            // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
            let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
            let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
            return {
              x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
              y: speed
            };
          }),
        }]);
      }

      // Cập nhật biểu đồ áp suất
      if (!pressureChart) {
        var pressureOptions = {
          chart: {
            type: 'area',
            animations: {
              enabled: true,
              easing: 'easeinout',
              speed: 800,
            },
          },
          series: [{
            name: 'Pressure',
            // data: pressureArray.map((pressure, index) => ({
            //   x: timeArray[index],
            //   y: pressure
            // })),
            data: pressureArray.map((pressure, index) => {
              // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
              let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
              let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
              return {
                x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
                y: pressure
              };
            }),
          }],
          xaxis: {
            type: 'datetime',
            title: {
              text: 'Date',
              offsetY: 8,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          },
          yaxis: {
            min: 950,
            max: 1050,
            tickAmount: 10,
            forceNiceScale: true,
            labels: {
              formatter: function(val) {
                return Math.round(val);
              },
            },
            title: {
              // text: 'Áp suất (hPa)', 
              text: 'Pressure (hPa)',
              offsetX: -7,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          }
        };
        pressureChart = new ApexCharts(document.querySelector("#myChart4"), pressureOptions);
        pressureChart.render();
      } else {
        // Cập nhật dữ liệu biểu đồ hiện có
        pressureChart.updateSeries([{
          name: 'Pressure',
          // data: pressureArray.map((pressure, index) => ({
          //   x: timeArray[index],
          //   y: pressure
          // })),
          data: pressureArray.map((pressure, index) => {
            // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
            let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
            let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
            return {
              x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
              y: pressure
            };
          }),
        }]);
      }

      // Cập nhật biểu đồ cường độ ánh sáng
      if (!lightIntensityChart) {
        var lightIntensityOptions = {
          chart: {
            type: 'area',
            animations: {
              enabled: true,
              easing: 'easeinout',
              speed: 800,
            },
          },
          series: [{
            name: 'Light Intensity',
            // data: lightArray.map((light, index) => ({
            //   x: timeArray[index],
            //   y: light
            // })),
            data: lightArray.map((light, index) => {
              // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
              let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
              let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
              return {
                x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
                y: light
              };
            }),
          }],
          xaxis: {
            type: 'datetime',
            title: {
              text: 'Date',
              offsetY: 8,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          },
          yaxis: {
            min: 0,
            max: 20000,
            tickAmount: 1000,
            forceNiceScale: true,
            labels: {
              formatter: function(val) {
                return Math.round(val);
              },
            },
            title: {
              // text: 'Cường độ ánh sáng (lux)', 
              text: 'Light Intensity (lux)',
              offsetX: -7,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          }
        };
        lightIntensityChart = new ApexCharts(document.querySelector("#myChart5"), lightIntensityOptions);
        lightIntensityChart.render();
      } else {
        // Cập nhật dữ liệu biểu đồ hiện có
        lightIntensityChart.updateSeries([{
          name: 'Light Intensity',
          // data: lightArray.map((light, index) => ({
          //   x: timeArray[index],
          //   y: light
          // })),
          data: lightArray.map((light, index) => {
            // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
            let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
            let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
            return {
              x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
              y: light
            };
          }),
        }]);
      }

      // Cập nhật biểu đồ khả năng mưa
      if (!rainProbabilityChart) {
        var rainProbabilityOptions = {
          chart: {
            type: 'area',
            animations: {
              enabled: true,
              easing: 'easeinout',
              speed: 800,
            },
          },
          series: [{
            name: 'Rain Probability',
            // data: rainArray.map((probability, index) => ({
            //   x: timeArray[index],
            //   y: probability
            // })),
            data: rainArray.map((probability, index) => {
              // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
              let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
              let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
              return {
                x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
                y: probability
              };
            }),
          }],
          xaxis: {
            type: 'datetime',
            title: {
              text: 'Date',
              offsetY: 8,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          },
          yaxis: {
            min: 0,
            max: 100,
            tickAmount: 10,
            forceNiceScale: true,
            labels: {
              formatter: function(val) {
                return Math.round(val);
              },
            },
            title: {
              // text: 'Khả năng mưa (%)', 
              text: 'Percent Rain (%)',
              offsetX: -7,
              style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
              }
            }
          }
        };
        rainProbabilityChart = new ApexCharts(document.querySelector("#myChart6"), rainProbabilityOptions);
        rainProbabilityChart.render();
      } else {
        // Cập nhật dữ liệu biểu đồ hiện có
        rainProbabilityChart.updateSeries([{
          name: 'Rain Probability',
          // data: rainArray.map((probability, index) => ({
          //   x: timeArray[index],
          //   y: probability
          // })),
          data: rainArray.map((probability, index) => {
            // Chuyển đổi thời gian từ UTC sang múi giờ VN (UTC + 7)
            let utcTime = new Date(timeArray[index]); // Giả sử timeArray là UTC
            let vnTime = new Date(utcTime.getTime() + 7 * 60 * 60 * 1000); // Cộng 7 giờ vào
            return {
              x: vnTime.getTime(), // Lấy timestamp của thời gian sau khi chuyển đổi
              y: probability
            };
          }),
        }]);
      }
    }
  });
</script>