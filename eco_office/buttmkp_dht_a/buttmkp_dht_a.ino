#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <DHT_U.h>

#define DHTPIN 4
#define DHTTYPE DHT22

DHT_Unified dht(DHTPIN, DHTTYPE);

const char *ssid = "EduFarm buttmkp"; // masukan Nama Wifi nya
const char *password = "buttmkp#1";   // isi password dari wifi

String dataTemp;
String dataHumi;
String postTemp;
String postHumi;

float tempValue;
float humiValue;

sensors_event_t event;

void readTemp()
{
    dht.temperature().getEvent(&event);
    tempValue = event.temperature;
}
void readHumi()
{
    dht.humidity().getEvent(&event);
    humiValue = event.relative_humidity;
}

void setup()
{
    Serial.begin(9600);

    WiFi.begin(ssid, password); //--> menghubungkan ke router wifi
    Serial.println("");
    Serial.print("Connecting");
    while (WiFi.status() != WL_CONNECTED)
    {
        Serial.print(".");
        delay(500);
    }

    Serial.print("name SSID = ");
    Serial.println(ssid);
    Serial.print("IP Address = ");
    Serial.println(WiFi.localIP());
    dht.begin();
}

void loop()
{
    readHumi();
    readTemp();

    dataTemp = String(tempValue);
    dataHumi = String(humiValue);

    WiFiClient client;
    HTTPClient http;

    postTemp = "temp=" + dataTemp;
    postHumi = "humi=" + dataHumi;

    http.begin(client, "http://e-farmingcorpora.com/buttmkp/eco_office/getdata_temp.php");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    Serial.print("temp = ");
    Serial.println(tempValue);
    int httpCode = http.POST(postTemp);

    http.begin(client, "http://e-farmingcorpora.com/buttmkp/eco_office/getdata_humi.php");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    Serial.print("humi = ");
    Serial.println(humiValue);
    int httpCode2 = http.POST(postHumi);

    http.end();
    Serial.println("Uploaded");
    delay(500);
}