#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

HTTPClient http;

const char* ssid = "karl2.4ghz";
const char* password = "23456789";

const char* host = "http://radonjicled.000webhostapp.com/arduino.php";

const char outPins[9] = {16, 5, 4, 14, 12, 13, 0, 2, 15};

const byte fadeSpeed = 1;
const byte fadeDelay = 20;  //(fadeDelay/fadeSpeed) * 1.2 * (najveci prijelaz, npr. za 0%-100% ide *1, ili za 75%-25% ide *0.5) = duljina prijelaza u sekundama (za 0%-100%: (20/1)*1.2*1=24 sec)
const byte pageRefresh = 60;

byte webColors[12];
byte ledColors[12];
String webString;

unsigned long delayWeb = 0;
bool delayRunning = false;

void setup()
{
  for(int i=0;i<9;i++)
  {    
    pinMode(outPins[i], OUTPUT);
    analogWrite(outPins[i], 0);
  }

  delay(10);
  
  Serial.begin(115200);
    
  delay(10);
  
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    Serial.print(".");
    delay(500);
  }
  
  Serial.print("Connected to WiFi, IP address: ");
  Serial.println(WiFi.localIP());

  delay(10);
  
  getWebString();
}
  
void loop()
{
  if (delayRunning && ((millis() - delayWeb) >= (pageRefresh * 1000)))
  {
    delayRunning = false;
    getWebString();
  }
  for(int i=0;i<12;i++)
  {
    if (ledColors[i] != webColors[i])
      fadingColors();
  }
}

void fadingColors()
{
  Serial.print("LED: ");
  for(int i=0;i<12;i++)
  {
    Serial.print(ledColors[i]);
    if(i<11)
      Serial.print("\t");
    else
      Serial.println();
  }
  for(int i=0;i<12;i++)
  {
    delay(fadeDelay);
    if (abs(ledColors[i]-webColors[i]) < fadeSpeed)
      ledColors[i] = webColors[i];
    if((i%4) != 0)
    {
      if(i<4)
      {
        if (ledColors[i] > webColors[i])
          ledColors[i] -= fadeSpeed;
        else if (ledColors[i] < webColors[i])
          ledColors[i] += fadeSpeed;
        
        analogWrite(outPins[i-1], (ledColors[i] * ledColors[0] * 10) / 100);
      }
      else if (i<8 && i>3)
      {
        if (ledColors[i] > webColors[i])
          ledColors[i] -= fadeSpeed;
        else if (ledColors[i] < webColors[i])
          ledColors[i] += fadeSpeed;
        
        analogWrite(outPins[i-2], (ledColors[i] * ledColors[4] * 10) / 100);
      }
      else
      {
        if (ledColors[i] > webColors[i])
          ledColors[i] -= fadeSpeed;
        else if (ledColors[i] < webColors[i])
          ledColors[i] += fadeSpeed;
        
        analogWrite(outPins[i-3], (ledColors[i] * ledColors[8] * 10) / 100);
      }
    }
    else
    {
      if (ledColors[i] > webColors[i])
        ledColors[i] -= fadeSpeed;
      else if (ledColors[i] < webColors[i])
        ledColors[i] += fadeSpeed;
    }
  }
}

void getColorFromString()
{
  int delimiterIndex[13];
  int delIndex=0;
  for(int i=0;i<13;i++)
  {
    if(i==0 || i==12)
      delIndex = webString.indexOf('?',delIndex);
    else
      delIndex = webString.indexOf(',',delIndex+1);

    delimiterIndex[i] = delIndex;
  }
  for(int i=0;i<12;i++)
  {
    webColors[i] = (webString.substring(delimiterIndex[i]+1,delimiterIndex[i+1])).toInt();
  }
  Serial.print("WEB: ");
  for(int i=0;i<12;i++)
  {
    Serial.print(webColors[i]);
    if(i<11)
        Serial.print("\t");
    else
      Serial.println();
  }
}

void getWebString()
{
  http.begin(host);
  int httpCode = http.GET();
  if(httpCode > 0)
  {
    webString = http.getString();
    getColorFromString();
  }
  http.end();
  delayWeb = millis();
  delayRunning = true;
}
