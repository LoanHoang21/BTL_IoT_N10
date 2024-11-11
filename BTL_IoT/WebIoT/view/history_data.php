<form action="" method="post">
  <div class="container text-align-center">
    <h1 class="text-center" style="margin-top: 100px">List of received data</h1>
    <div class="progress bg-danger mx-auto mb-4" style="height: 3px; width: 40%;"></div>
    <!-- <div class="">
      <div class="d-flex" style="margin-left: 60px; margin-right: 50px; margin-top: 50px; width: 841.489px;">
        <div class="col-ms-8 d-flex justify-content-start align-content-start" style="width: 322px;">
          <div class="col-sm-5 pt-2" style="width: 140px; transform: translate(-30.6667px, 0px);">Tìm kiếm dữ liệu: </div>
          <div style="flex: 1 1 0%; display: flex; align-items: center; width: 202px;">
            <input type="text" class="form-control" id="search" name="search" style="border: 1px solid black; width: 192.021px; margin-right: 10px; transform: translate(-24.6667px, 0px);">
            <input type="submit" class="btn bg-danger text-light" id="search" name="search" value="Tìm kiếm" style="width: 116.635px; transform: translate(-26.6666px, 0px);">
          </div>
        </div>
        <div class="col-ms-4 d-flex justify-content-end align-items-end ms-auto">
            <a href="index.php?act=add_student" type="button" class="btn btn-danger" style="text-decoration: none;">Thêm sinh viên</a>
          </div> 
      </div>
    </div> -->
    <div class="d-flex justify-content-center align-items-center">
      <div class="table-responsive" style="max-height: 500px; width: 1500px; margin-top: 20px;">
        <table class="table table-hover table-bordered text-center align-text-bottom" style="border: 2px solid #555;">
          <thead class="sticky-top">
            <tr>
              <!-- <th scope="col">STT</th>
              <th scope="col">Thời gian</th>
              <th scope="col">Nhiệt độ (°C)</th>
              <th scope="col">Độ ẩm (%)</th>
              <th scope="col">Gió (km/h)</th>
              <th scope="col">Áp suất (hPa)</th>
              <th scope="col">Ánh sáng (lux)</th>
              <th scope="col">Khả năng mưa (%)</th>
              <th scope="col">Kiểu thời tiết</th> -->
              <th scope="col">No</th>
              <th scope="col">Time</th>
              <th scope="col">Temperature (°C)</th>
              <th scope="col">Humidity (%)</th>
              <th scope="col">Wind (km/h)</th>
              <th scope="col">Pressure (hPa)</th>
              <th scope="col">Light (lux)</th>
              <th scope="col">Rain (%)</th>
              <th scope="col">Weather Type</th>
            </tr>
          </thead>
          <tbody id="tableBody">
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <p><br><br></p>
</form>
<script>
  $(document).ready(function() {
    function loadData() {
      fetch('./controller/history_data.php')
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json();
        })
        .then(data => {
          let tableContent = '';

          // Duyệt qua dữ liệu và tạo các hàng <tr> cho bảng
          data.forEach((item, index) => {
            let weather = "";
            if (item.weather_type == 0) {
              weather = "Storm, Heavy rain";
            } else if (item.weather_type == 1) {
              weather = "Cold, No rain";
            } else if (item.weather_type == 2) {
              weather = "Cold, Drizzle";
            } else if (item.weather_type == 3) {
              weather = "Cold, Heavy rain";
            } else if (item.weather_type == 4) {
              weather = "Cool, No rain";
            } else if (item.weather_type == 5) {
              weather = "Cool, Drizzle";
            } else if (item.weather_type == 6) {
              weather = "Cool, Heavy rain";
            } else if (item.weather_type == 7) {
              weather = "Sunny, No rain";
            } else if (item.weather_type == 8) {
              weather = "Sunny, Drizzle";
            } else if (item.weather_type == 9) {
              weather = "Sunny, Heavy rain";
            }
            tableContent += `
              <tr>
                <td>${index + 1}</td>
                <td>${item.time}</td>
                <td>${item.temperature} °C</td>
                <td>${item.humidity} %</td>
                <td>${item.wind_speed} km/h</td>
                <td>${item.pressure} hPa</td>
                <td>${item.light_intensity} lux</td>
                <td>${item.percent_rain} %</td>
                <td>${weather}</td>
              </tr>
            `;
          });

          // Cập nhật nội dung của <tbody>
          $('#tableBody').html(tableContent);
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
    }

    // Gọi hàm loadData để tải dữ liệu và cập nhật bảng mỗi 5 giây
    setInterval(loadData, 0);
  });
</script>