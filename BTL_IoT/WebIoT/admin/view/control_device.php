<!-- Bố cục Bootstrap -->
<div class="container">
  <div class="row" style="margin-top: 100px;">
    <div class="col-md-10">
      <div class="row ms-2 mb-5">
        <div class="col-md-3 me-5">
          <div class="row data-block1">
            <div class="col-md-3"><i class="bi bi-thermometer-sun" style="font-size: 45px; color: red;"></i></div>
            <div class="col-md-9 text-center">
              <p id="temperature" style="font-size: 30px;"></p>
              <p>Temperature</p>
               <!-- <p>Nhiệt độ</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3 me-5">
          <div class="row data-block1">
            <div class="col-md-3"><i class="bi bi-droplet-half" style="font-size: 40px; color: #1DA1F2;"></i></div>
            <div class="col-md-9 text-center">
              <p id="humidity" style="font-size: 25px;"></p>
              <p>Humidity</p>
               <!-- <p> Độ ẩm </p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row data-block1">
            <div class="col-md-3"><i class="bi bi-tornado" style="font-size: 40px; color: #63696c;"></i></div>
            <div class="col-md-9 text-center">
              <p id="wind_speed" style="font-size: 25px;"></p>
              <p>Wind Speed</p>
               <!-- <p>Tốc độ gió</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row ms-2" style="margin-bottom: 60px;">
        <div class="col-md-3 me-5">
          <div class="row data-block1">
            <div class="col-md-3"><i class="bi bi-speedometer" style="font-size: 40px; color: #9ea51c;"></i></div>
            <div class="col-md-9 text-center">
              <p id="pressure" style="font-size: 23px;"></p>
              <p>Pressure</p>
               <!-- <p>Áp suất</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3 me-5">
          <div class="row data-block1">
            <div class="col-md-3"><i class="bi bi-cloud-sun-fill" style="font-size: 40px; color: #e87b0f;"></i></div>
            <div class="col-md-9 text-center">
              <p id="light_intensity" style="font-size: 25px;"></p>
              <p>Light Intensity</p>
               <!-- <p>Ánh sáng</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row data-block1">
            <div class="col-md-3"><i class="bi bi-cloud-rain-fill" style="font-size: 40px; color: #0f5aaf;"></i></div>
            <div class="col-md-9 text-center">
              <p id="percent_rain" style="font-size: 25px;"></p>
              <p>Percent Rain</p>
               <!-- <p>Khả năng mưa</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="button-control-container" class="col-md-2">
      <div class="data-block1 text-center" style="padding-top: 35px; border: 1px solid rgb(221, 221, 221); border-radius: 5px; width: 273.323px; transform: translate(-107.333px, 0px); height: 340.157px;" data-metatip="true" data-selected="true" data-label-id="0"> <!-- Gói nội dung vào một ô -->
        <div>
          <p style="font-size: 30px;">Control Device</p>
          <!-- <p style="font-size: 25px;">Điều khiển thiết bị</p> -->
        </div>
        <!-- Toggle switches for LEDs and Buzzer with labels before switch -->
        <div class="mt-3 text-start ms-4">
          <label class="form-switch">
            LED1
            <input class="ms-2" type="checkbox" id="LED1" onchange="toggleDevice('LED1')" <?= isset($_SESSION['led1']) && $_SESSION['led1'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
        <div class="mt-2 text-start ms-4">
          <label class="form-switch">
            LED2
            <input class="ms-2" type="checkbox" id="LED2" onchange="toggleDevice('LED2')" <?= isset($_SESSION['led2']) && $_SESSION['led2'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
        <div class="mt-2 text-start ms-4">
          <label class="form-switch">
            LED3
            <input class="ms-2" type="checkbox" id="LED3" onchange="toggleDevice('LED3')" <?= isset($_SESSION['led3']) && $_SESSION['led3'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
        <div class="mt-2 text-start ms-4">
          <label class="form-switch">
            LED4
            <input class="ms-2" type="checkbox" id="LED4" onchange="toggleDevice('LED4')" <?= isset($_SESSION['led4']) && $_SESSION['led4'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
        <div class="mt-2 text-start ms-4">
          <label class="form-switch">
            LED5
            <input class="ms-2" type="checkbox" id="LED5" onchange="toggleDevice('LED5')" <?= isset($_SESSION['led5']) && $_SESSION['led5'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
        <div class="mt-2 text-start ms-4">
          <label class="form-switch" style="text-align: left; padding-left: 35px;">
            Buzzer
            <input type="checkbox" id="buzzer" onchange="toggleDevice('buzzer')" <?= isset($_SESSION['buzzer']) && $_SESSION['buzzer'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
        <div class="mt-2 text-start ms-4">
          <label class="form-switch">
            Auto
            <input class="ms-2" type="checkbox" id="auto" onchange="toggleDevice('auto')" <?= isset($_SESSION['auto']) && $_SESSION['auto'] == '1' ? 'checked' : '' ?>>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    function loadData() {
      fetch('../controller/home.php')
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json(); // Chuyển đổi thành JSON
        })
        .then(data => {
          console.log(data);

          // Cập nhật các phần tử bằng dữ liệu nhận được
          $('#temperature').text(data.latest_data.temperature + ' °C');
          $('#humidity').text(data.latest_data.humidity + ' %');
          $('#wind_speed').text(data.latest_data.wind_speed + ' km/h');
          $('#pressure').text(data.latest_data.pressure + ' hPa');
          $('#light_intensity').text(data.latest_data.light_intensity + ' lux');
          $('#percent_rain').text(data.latest_data.percent_rain + ' %');
          // let weather_type = data.latest_data.weather_type;
          // let weather = "";
          // if (weather_type == 0) {
          //   weather = "Mưa to, Giông lốc";
          // } else if (weather_type == 1) {
          //   weather = "Trời lạnh, Không mưa";
          // } else if (weather_type == 2) {
          //   weather = "Trời lạnh, Mưa nhỏ";
          // } else if (weather_type == 3) {
          //   weather = "Trời lạnh, Mưa to";
          // } else if (weather_type == 4) {
          //   weather = "Mát mẻ, Không mưa";
          // } else if (weather_type == 5) {
          //   weather = "Mát mẻ, Mưa nhỏ";
          // } else if (weather_type == 6) {
          //   weather = "Mát mẻ, Mưa to";
          // } else if (weather_type == 7) {
          //   weather = "Trời nóng, Không mưa";
          // } else if (weather_type == 8) {
          //   weather = "Trời nóng, Mưa nhỏ";
          // } else if (weather_type == 9) {
          //   weather = "Trời nóng, Mưa to";
          // }

          // $('#weather').text(weather);
        })
        .catch(error => {
          console.error('Error loading data: ', error);
        });
    }

    setInterval(loadData, 500);

    loadData();
  });
  
  // Kiểm tra trạng thái auto trước khi thực hiện chọn các thiết bị khác
  function checkAutoMode(device) {
    const autoChecked = document.getElementById('auto').checked;
    const deviceElement = document.getElementById(device);
    if (autoChecked && device !== 'auto' && !deviceElement.disabled) {
      alert("Currently in Auto mode. Please turn off this mode to perform control.");
      // Đặt lại trạng thái về trạng thái ban đầu của thiết bị
      deviceElement.checked = !deviceElement.checked;
      return false;
    }
    return true;
  }

  let autoInterval = null;

  async function toggleDevice(device) {

    // Kiểm tra trạng thái auto trước khi thay đổi thiết bị
    if (!checkAutoMode(device)) return;

    // Lấy trạng thái của các checkbox
    const led1State = document.getElementById('LED1').checked ? '1' : '0';
    const led2State = document.getElementById('LED2').checked ? '1' : '0';
    const led3State = document.getElementById('LED3').checked ? '1' : '0';
    const led4State = document.getElementById('LED4').checked ? '1' : '0';
    const led5State = document.getElementById('LED5').checked ? '1' : '0';
    const buzzerState = document.getElementById('buzzer').checked ? '1' : '0';
    const autoState = document.getElementById('auto').checked ? '1' : '0';

    // Gửi trạng thái của các thiết bị qua POST
    try {
      const response = await fetch("../admin/controller/mqtt_control.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `LED1=${led1State}&LED2=${led2State}&LED3=${led3State}&LED4=${led4State}&LED5=${led5State}&buzzer=${buzzerState}&auto=${autoState}` // Dữ liệu POST
      });

      // Kiểm tra nếu phản hồi từ server là thành công
      if (response.ok) {
        const responseText = await response.text(); // Đọc nội dung phản hồi
        console.log("Server Response:", responseText); // In ra phản hồi từ server
        handleAutoInterval(autoState);
      } else {
        console.error("Failed to connect to server, status:", response.status);
      }
    } catch (error) {
      console.error("Error occurred:", error); // Nếu có lỗi khi gọi fetch
    }
  }
  // Function to start or stop the auto-refresh interval
  function handleAutoInterval(autoState) {
    if (autoState === '1' && !autoInterval) {
      autoInterval = setInterval(refreshToggleContent, 1000);
    } else if (autoState === '0' && autoInterval) {
      clearInterval(autoInterval);
      autoInterval = null;
    }
  }
  // Initial check to start auto mode if enabled at page load
  document.addEventListener("DOMContentLoaded", function() {
    const autoState = document.getElementById('auto').checked ? '1' : '0';
    handleAutoInterval(autoState);
  });
  // Hàm AJAX để tải lại nội dung bên trong div chứa các toggle switch
  function refreshToggleContent() {
    fetch(window.location.href)
      .then(response => response.text())
      .then(html => {
        // Tạo một DOM tạm để xử lý HTML
        const tempDocument = new DOMParser().parseFromString(html, 'text/html');

        // Lấy phần tử div chứa các toggle switch từ nội dung mới tải
        const newContent = tempDocument.getElementById('button-control-container');

        // Cập nhật nội dung của div hiện tại với nội dung mới
        if (newContent) {
          document.getElementById('button-control-container').innerHTML = newContent.innerHTML;
        }
      })
      .catch(error => console.error("Error refreshing content:", error));
  }
</script>