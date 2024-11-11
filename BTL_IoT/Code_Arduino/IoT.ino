// mosquitto_sub -h 192.168.1.164 -p 1993 -t esp32/control
// mosquitto_sub -h 192.168.1.164 -p 1993 -t device/status
#include <DHT.h>
#include <Wire.h>
#include <Adafruit_BMP085_U.h>
#include <BH1750.h>
#include <Adafruit_GFX.h>
#include <Adafruit_ST7735.h>
#include <WiFi.h>
#include <NTPClient.h>
#include <WiFiUdp.h>
#include <time.h>
#include <PubSubClient.h>
#include "weather_model.h"
#include "rain_model.h"

#define DHT_PIN 16 

#define TFT_CS 5
#define TFT_RST 15
#define TFT_DC 32

#define LED1_PIN 13
#define LED2_PIN 14
#define LED3_PIN 27
#define LED4_PIN 26
#define LED5_PIN 25

#define BUZZER_PIN 17

#define HALL_PIN 4

#define WIND_SPEED 0.5

const char* mqtt_server = "192.168.1.164";
const int mqtt_port = 1883;
const char* ssid = "Mumshop";
const char* password = "quytin6789";
unsigned long lastDataSentTime = 0;
const int dataSendInterval = 3000;

int autoMode = 1;
int buzzerState = 0;
int led1State = 0, led2State = 0, led3State = 0, led4State = 0, led5State = 0;
const uint8_t degreeSymbol[5] = {
  0x04,  // 00100
  0x0A,  // 01010
  0x0A,  // 01010
  0x04,  // 00100
  0x00   // 00000
};

DHT dht(DHT_PIN, DHT11);
Adafruit_BMP085_Unified bmp;
BH1750 bh;
Adafruit_ST7735 tft = Adafruit_ST7735(TFT_CS, TFT_DC, TFT_RST);

WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "pool.ntp.org", 7 * 3600, 60000);  // Thay đổi timezone nếu cần

WiFiClient espClient;
PubSubClient client(espClient);

Eloquent::ML::Port::RandomForest weather_model;
Eloquent::ML::Port::RandomForestRegressor rain_model;

void setupSensor() {
  dht.begin();
  bmp.begin();
  bh.begin();
}

float getPressure() {
  sensors_event_t event;
  bmp.getEvent(&event);
  return event.pressure;
}

const char* getWeatherDescription(int weather) {
  switch (weather) {
    case 0:
      return "Storm, Heavy rain";
    case 1:
      return "Cold, No rain";
    case 2:
      return "Cold, Drizzle";
    case 3:
      return "Cold, Heavy rain";
    case 4:
      return "Cool, No rain";
    case 5:
      return "Cool, Drizzle";
    case 6:
      return "Cool, Heavy rain";
    case 7:
      return "Sunny, No rain";
    case 8:
      return "Sunny, Drizzle";
    case 9:
      return "Sunny, Heavy rain";
    default:
      return "Null";
  }
}

// void autoModeControl(int weather, float rain) {
//   digitalWrite(LED1_PIN, LOW);
//   digitalWrite(LED2_PIN, LOW);
//   digitalWrite(LED3_PIN, LOW);
//   digitalWrite(LED4_PIN, LOW);
//   digitalWrite(LED5_PIN, LOW);
//   digitalWrite(BUZZER_PIN, LOW);
//   led1State = 0;
//   led2State = 0;
//   led3State = 0;
//   led4State = 0;
//   led5State = 0;
//   buzzerState = 0;
//   // for (int i = 0; i < 5; i++) {
//   //   digitalWrite(ledPins[i], LOW);
//   // }
//   if (weather == 0) {
//     digitalWrite(LED1_PIN, HIGH);
//     led1State = 1;
//     // digitalWrite(BUZZER_PIN, HIGH);
//     // buzzerState = 1;
//   } else if (weather >= 1 && weather <= 3) {
//     digitalWrite(LED2_PIN, HIGH);
//     led2State = 1;
//   } else if (weather >= 4 && weather <= 6) {
//     digitalWrite(LED3_PIN, HIGH);
//     led3State = 1;
//   } else if (weather >= 7 && weather <= 9) {
//     digitalWrite(LED4_PIN, HIGH);
//     led4State = 1;
//   }
//   if (rain >= 50) {
//     digitalWrite(LED5_PIN, HIGH);
//     led5State = 1;
//   }
// }

void autoModeControl(int weather, float rain) {
  digitalWrite(LED1_PIN, LOW);
  digitalWrite(LED2_PIN, LOW);
  digitalWrite(LED3_PIN, LOW);
  digitalWrite(LED4_PIN, LOW);
  digitalWrite(LED5_PIN, LOW);
  digitalWrite(BUZZER_PIN, LOW);
  led1State = 0;
  led2State = 0;
  led3State = 0;
  led4State = 0;
  led5State = 0;
  buzzerState = 0;
  if (weather == 0) {
    digitalWrite(LED1_PIN, HIGH);
    led1State = 1;
  } else if (weather >= 1 && weather <= 3) {
    digitalWrite(LED2_PIN, HIGH);
    led2State = 1;
  } else if (weather >= 4 && weather <= 6) {
    digitalWrite(LED3_PIN, HIGH);
    led3State = 1;
  } else if (weather >= 7 && weather <= 9) {
    digitalWrite(LED4_PIN, HIGH);
    led4State = 1;
  }
  if (rain >= 50) {
    digitalWrite(LED5_PIN, HIGH);
    led5State = 1;
  }
}

void setupWiFi() {
  delay(5);
  Serial.print("Connecting to WiFi");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.print("Connected to WiFi with IP address: ");
  Serial.println(WiFi.localIP());
}

void reconnect() {
  while (!client.connected()) {
    Serial.println("Attempting MQTT connection...");
    String clientId = "ESP32Client";

    if (client.connect(clientId.c_str())) {
      Serial.println("MQTT connected");
      client.subscribe("esp32/control");
      Serial.println("----------------------------------");
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(5000);
    }
  }
}

void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message arrived on topic: ");
  Serial.print(topic);
  Serial.print(". Message: ");
  String message;
  for (int i = 0; i < length; i++) {
    message += (char)payload[i];
  }
  Serial.println(message);

  if (String(topic) == "esp32/control") {
    String led1Temp, led2Temp, led3Temp, led4Temp, led5Temp, buzzerTemp, mode;
    led1Temp = message[0];
    led2Temp = message[2];
    led3Temp = message[4];
    led4Temp = message[6];
    led5Temp = message[8];
    buzzerTemp = message[10];
    mode = message[12];

    // Cập nhật trạng thái LED1
    if (led1Temp == "1") {
      digitalWrite(LED1_PIN, HIGH);
      led1State = 1;
    } else {
      digitalWrite(LED1_PIN, LOW);
      led1State = 0;
    }
    // Cập nhật trạng thái LED2
    if (led2Temp == "1") {
      digitalWrite(LED2_PIN, HIGH);
      led2State = 1;
    } else {
      digitalWrite(LED2_PIN, LOW);
      led2State = 0;
    }

    // Cập nhật trạng thái LED3
    if (led3Temp == "1") {
      digitalWrite(LED3_PIN, HIGH);
      led3State = 1;
    } else {
      digitalWrite(LED3_PIN, LOW);
      led3State = 0;
    }

    // Cập nhật trạng thái LED4
    if (led4Temp == "1") {
      digitalWrite(LED4_PIN, HIGH);
      led4State = 1;
    } else {
      digitalWrite(LED4_PIN, LOW);
      led4State = 0;
    }

    // Cập nhật trạng thái LED5
    if (led5Temp == "1") {
      digitalWrite(LED5_PIN, HIGH);
      led5State = 1;
    } else {
      digitalWrite(LED5_PIN, LOW);
      led5State = 0;
    }

    // Cập nhật trạng thái Buzzer
    if (buzzerTemp == "1") {
      digitalWrite(BUZZER_PIN, HIGH);
      buzzerState = 1;
    } else {
      digitalWrite(BUZZER_PIN, LOW);
      buzzerState = 0;
    }
    // Cập nhật chế độ tự động
    if (mode == "1") {
      autoMode = 1;
    } else {
      autoMode = 0;
    }
  } else {
    Serial.println("Error: Invalid format in the received message");
  }
  String payload2 = String(led1State) + "," + String(led2State) + "," + String(led3State) + ","
                    + String(led4State) + "," + String(led5State) + ","
                    + String(buzzerState) + "," + String(autoMode);

  client.publish("device/status", (char*)payload2.c_str());
  Serial.println("Sent status : " + payload2);
}

void sendSensorData(float temperature, float humidity, float wind, float pressure, float lightIntensity, float rain, int weather_type) {
  String payload = String(temperature) + "," + String(humidity) + ","
                   + String(wind) + "," + String(pressure) + ","
                   + String(lightIntensity) + "," + String(rain) + "," + String(weather_type);
  client.publish("topic/sensor", payload.c_str());
  Serial.println("Sent data to topic/sensor: " + payload);
}

// Hàm mqttTask
void mqttTask(void* pvParameters) {
  for (;;) {
    if (!client.connected()) {
      reconnect();
    }
    client.loop();  // Thực hiện vòng lặp MQTT
    delay(10);      // Cho phép các task khác chạy
  }
}

void drawDegreeSymbol(int x, int y) {
  for (int i = 0; i < 5; i++) {
    for (int j = 0; j < 5; j++) {
      if (degreeSymbol[i] & (1 << (4 - j))) {    // Kiểm tra bit trong hàng
        tft.drawPixel(x + j, y + i, ST7735_WHITE);  // Màu trắng cho pixel sáng
      } else {
        tft.drawPixel(x + j, y + i, ST7735_BLACK);  // Màu đen cho pixel tắt
      }
    }
  }
}

void setup() {
  Serial.begin(115200);
  setupWiFi();
  setupSensor();
  client.setServer(mqtt_server, mqtt_port);
  client.setCallback(callback);
  // Tạo một task cho MQTT
  xTaskCreate(mqttTask, "MQTT Task", 10000, NULL, 1, NULL);  // Chạy mqttTask với mức độ ưu tiên 1

  timeClient.begin();

  tft.initR(INITR_BLACKTAB);  // Khởi tạo TFT
  tft.setRotation(3);         // Đặt hướng màn hình
  tft.fillScreen(ST7735_BLACK);
  tft.setTextColor(ST7735_WHITE);
  tft.setTextSize(1);

  pinMode(LED1_PIN, OUTPUT);
  pinMode(LED2_PIN, OUTPUT);
  pinMode(LED3_PIN, OUTPUT);
  pinMode(LED4_PIN, OUTPUT);
  pinMode(LED5_PIN, OUTPUT);
  pinMode(BUZZER_PIN, OUTPUT);
}

void loop() {
  tft.fillScreen(ST7735_BLACK);  // Xóa toàn bộ màn hình
  // Cập nhật thời gian từ NTP
  timeClient.update();

  // Lấy thời gian hiện tại
  time_t now = timeClient.getEpochTime();  // Lấy thời gian epoch
  struct tm* timeinfo = localtime(&now);   // Chuyển đổi sang cấu trúc tm

  // Lấy năm, tháng, ngày và giờ
  int year = timeinfo->tm_year + 1900;  // Năm (1900 cộng với năm)
  int month = timeinfo->tm_mon + 1;     // Tháng (0-11, cần cộng thêm 1)
  int day = timeinfo->tm_mday;          // Ngày (1-31)
  int hour = timeinfo->tm_hour;         // Giờ (0-23)
  int minute = timeinfo->tm_min;        // Phút (0-59)
  int second = timeinfo->tm_sec;        // Giây (0-59)
  String time = String(hour) + ":" + String(minute) + ":" + String(second) + " " + String(day) + "/" + String(month) + "/" + String(year);
  Serial.println("Time: " + time);
  // Hiển thị thời gian lên màn hình TFT
  tft.setCursor(0, 5);
  tft.print("Time: ");
  tft.println(time);

  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();
  float wind = WIND_SPEED;
  float pressure = getPressure();
  float lightIntensity = bh.readLightLevel();

  Serial.print("Temperature: " + String(temperature) + " °C, ");
  tft.setCursor(0, 20);
  tft.print("Temperature: ");
  tft.print(temperature);
  // Vẽ ký tự °
  int xDegree = tft.getCursorX();      // Lấy vị trí hiện tại của con trỏ x
  int yDegree = tft.getCursorY() - 1;  // Điều chỉnh y để ° ở đúng vị trí (có thể cần tùy chỉnh)
  drawDegreeSymbol(xDegree, yDegree);  // Vẽ ký tự °
  tft.println(" C");

  Serial.print("Humidity: " + String(humidity) + " %, ");
  tft.setCursor(0, 35);  // Đặt lại con trỏ
  tft.print("Humidity: ");
  tft.print(humidity);
  tft.println(" %");

  Serial.print("Wind Speed: " + String(wind) + " km/h, ");
  tft.setCursor(0, 50);  // Đặt lại con trỏ
  tft.print("Wind Speed: ");
  tft.print(wind);
  tft.println(" km/h");

  Serial.print("Pressure: " + String(pressure) + " hPa, ");
  tft.setCursor(0, 65);  // Đặt lại con trỏ
  tft.print("Pressure: ");
  tft.print(pressure);
  tft.println(" hPa");

  Serial.print("Light Intensity: " + String(lightIntensity) + " lux, ");
  tft.setCursor(0, 80);  // Đặt lại con trỏ
  tft.print("Light: ");
  tft.print(lightIntensity);
  tft.println(" lux");

  if(isnan(temperature)){
    temperature = -1;
  }
  if(isnan(humidity)){
    humidity = -1;
  }
  if(isnan(pressure)){
    pressure = -1;
  }
  if(isnan(lightIntensity)){
    lightIntensity = -1;
  }
  // Kiểm tra lỗi khi đọc dữ liệu
  if (isnan(temperature) || isnan(humidity) || isnan(pressure) || isnan(lightIntensity)) {
    tft.setCursor(0, 95);  // Đặt lại con trỏ
    tft.print("Lỗi đọc dữ liệu!");
  }

  tft.setCursor(0, 84);  // Đặt lại con trỏ
  tft.println("__________________________");

  // Dữ liệu dự đoán thời tiết
  float features[9] = { year, month, day, hour, temperature, humidity, wind, pressure, lightIntensity };
  int weather_type = weather_model.predict(features);
  float percent_rain = rain_model.predict(features);
  Serial.print("Weather Type: " + String(weather_type) + " - " + getWeatherDescription(weather_type) + ", ");
  Serial.println("Percent Rain: " + String(percent_rain));

  // Hiển thị thông tin thời tiết
  tft.setCursor(0, 100);
  tft.print("Weather: ");
  tft.println(getWeatherDescription(weather_type));
  tft.setCursor(0, 115);
  tft.print("Percent Rain: ");
  tft.print(percent_rain);
  tft.println(" %");

  if (autoMode == 1) {
    autoModeControl(weather_type, percent_rain);
  }
  String payload2 = String(led1State) + "," + String(led2State) + "," + String(led3State) + ","
                    + String(led4State) + "," + String(led5State) + ","
                    + String(buzzerState) + "," + String(autoMode);
  client.publish("device/status", (char*)payload2.c_str());
  Serial.println("Sent data to device/status: " + payload2);
  unsigned long currentMillis = millis();
  if (currentMillis - lastDataSentTime >= 3000) {
    lastDataSentTime = currentMillis;
    sendSensorData(temperature, humidity, wind, pressure, lightIntensity, percent_rain, weather_type);
  }
  delay(5000);
}
