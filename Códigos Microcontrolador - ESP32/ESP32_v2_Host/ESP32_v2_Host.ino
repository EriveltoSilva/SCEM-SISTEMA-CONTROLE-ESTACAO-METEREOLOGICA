/**************************************************
   AUTHOR: ERIVELTO CLÉNIO DA COSTA E SILVA
   FOR: Nathan Zacarias
   SISTEMA DE CONTROL DE ESTAÇÃO METEREOLÓGICA
   CREATED AT: 03-06-2023
   Objectivo: Controlar os Dados Colhidos por uma Estação Metereologica


  Principais Componentes usados:
 *** 1-ESP32 (1)
 *** 2-SENSOR DE CHUVA (1)
 *** 3-SENSOR DE TEMPERATURA e HUMIDADE DO AR DHT11 (1)
 *** 4-SENDOR DE HUMIDADE DE SOLO (1)
 *************************************************/

////////////////// Labraries Used  ////////////////
#include "DHT.h"                              /////
#include <WiFi.h>                             /////
#include <ESPmDNS.h>                          /////
///////////////////////////////////////////////////

////////////////  PIN CONFIGURATIONS //////////////
#define DHTTYPE DHT11                         /////
#define LED 2                                 /////
#define DHTPIN 15                             /////
#define SENSOR_SOLO 34                        /////
#define SENSOR_CHUVA 35                       /////
#define VAZIO "---"                           /////
///////////////////////////////////////////////////

/////////////  NETWORK CONFIGURATIONS /////////////
#define SSID "ESTACAO"                        /////
#define PASSWORD "123456789"                  /////
#define ENDERECO_PC  "192.168.47.148"         /////
#define PORTA_PC 80                           /////
///////////////////////////////////////////////////

//////////////  GENERAL VARIABLES//////////////////
const int tempoBackup = 10000;                /////
unsigned long int tempoDelay = 0;             /////
unsigned long int tempoDelayBD = 0;           /////
///////////////////////////////////////////////////

///////////////////// Variaveis ///////////////////
String sensorChuva = VAZIO;                   /////
String sensorSolo = VAZIO;                    /////
String sensorReservatorio = VAZIO;            /////
String nivelSolo = VAZIO;                     /////
String nivelChuva = VAZIO;                    /////
String nivelTemperatura = VAZIO;              /////
String sensorTemperatura = VAZIO;             /////
String nivelHumidade = VAZIO;                 /////
String sensorHumidade = VAZIO;                /////
///////////////////////////////////////////////////

/////////////  OBJECTS CONFIGURATIONS /////////////
DHT dht(DHTPIN, DHTTYPE);                     /////
WiFiClient wifiClient;                        /////
///////////////////////////////////////////////////

/////////////  FUNCTIONS PROTOTIPES   /////////////
void initConfig();                            /////
void setupWIFI();                             /////
void lerSensores();                           /////
void enviarDadosServidor();                   /////
///////////////////////////////////////////////////

//////////////////////////////////////////////////
void setup()
{
  initConfig();
  setupWIFI();
}

///////////////////////////////////////////////////
void loop()
{
  if (millis() - tempoDelay > 1800)
  {
    tempoDelay = millis();
    lerSensores();
    enviarDadosServidor();
    digitalWrite(LED, !digitalRead(LED));
  }
  setupWIFI();
  delay(5);
}

///////////////////////////////////////////////////
void initConfig()
{
  pinMode(LED, OUTPUT);
  digitalWrite(LED, LOW);
  Serial.begin(115200);
  delay(500);
  dht.begin();
  delay(500);
  Serial.println("CONFIGURAÇÕES INICIAS SETADAS!");
}

//////////////////////////////////////////////////
void setupWIFI() {
  if (WiFi.status() == WL_CONNECTED) return;
  Serial.println();
  Serial.print("CONECTANDO A WIFI:");
  Serial.println(SSID);
  Serial.print("PROCURANDO");
  WiFi.mode(WIFI_STA);
  WiFi.begin(SSID, PASSWORD);
  for (int i = 0; WiFi.status() != WL_CONNECTED; i++) {
    digitalWrite(LED, !digitalRead(LED));
    delay(150); Serial.print(".");
    if (i == 100)
      ESP.restart();
  }
  // Print ESP Local IP Address
  Serial.print("\nCONECTADO AO WIFI NO IP:");
  Serial.println(WiFi.localIP());
}

//////////////////////////////////////////////////////////
void enviarDadosServidor()
{
  Serial.print("CONECTANDO AO SERVIDOR LOCAL:");
  Serial.println(ENDERECO_PC);
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  if (!client.connect(ENDERECO_PC, PORTA_PC)) {
    Serial.println("FALHA AO SE CONECTAR AO SERVIDOR LOCAL");
  }
  else {
    client.print(String("GET http://") + ENDERECO_PC +
                 String("/estacao/paginas/armazenarDadosESP.php?") +
                 String("&nivelChuva=") + nivelChuva +
                 String("&sensorChuva=") + sensorChuva +
                 String("&nivelSolo=") + nivelSolo +
                 String("&sensorSolo=") + sensorSolo +
                 String("&nivelTemperatura=") + nivelTemperatura +
                 String("&sensorTemperatura=") + sensorTemperatura +
                 String("&nivelHumidade=") + nivelHumidade +
                 String("&sensorHumidade=") + sensorHumidade +
                 String("&salvar=") + ((possoGuardar()) ? "1" : "0") +
                 " HTTP/1.1\r\n" +
                 "Host: " + ENDERECO_PC + "\r\n" + "Connection: close\r\n\r\n");


    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 1000) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }
    // Read all the lines of the reply from server and print them to Serial
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    Serial.println();
    Serial.println("DADOS ENVIADOS AO SERVER LOCAL\nFECHANDO A CONEXÃO");
  }
}

/////////////////////////////////////////////////////////////////////////
boolean possoGuardar()
{
  if (millis() - tempoDelayBD > tempoBackup)
  {
    tempoDelayBD = millis();
    return true;
  }
  return false;
}

/////////////////////////////////////////////////////////////////////////
void lerSensores() {
  byte valorChuva = map(analogRead(SENSOR_CHUVA), 0, 4095, 100, 0);
  byte valorSolo = map(analogRead(SENSOR_SOLO), 0, 4095, 0, 100);
  float humidade = dht.readHumidity();
  float temperatura = dht.readTemperature();

  if (isnan(humidade) || isnan(temperatura)) {
    Serial.println(F("FALHA AO LER O SENSOR DHT11!"));
    sensorTemperatura = nivelTemperatura = sensorHumidade = nivelHumidade = "---";
  }

  sensorTemperatura = "~" + String(temperatura) + "ºC";
  if (temperatura > 40)  nivelTemperatura = "ALTISSIMO";
  else if (temperatura > 30)nivelTemperatura = "ALTA";
  else if (temperatura > 20)nivelTemperatura = "AMENA";
  else if (temperatura > 10)nivelTemperatura = "ESFRIANDO";
  else if (temperatura > 0)nivelTemperatura = "BAIXA";
  else nivelTemperatura = "NEGATIVA";

  sensorHumidade = "~" + String(humidade) + "%";
  if (humidade > 90)  nivelHumidade = "ALTISSIMA";
  else if (humidade > 70)nivelHumidade = "ALTA";
  else if (humidade > 50)nivelHumidade = "AMENA";
  else if (humidade > 30)nivelHumidade = "BAIXA";
  else nivelHumidade = "SEM_HUMIDADE";


  sensorChuva = "~" + String(valorChuva) + "%";
  if (valorChuva > 75)
    nivelChuva = "INTENSA";
  else if (valorChuva > 50)
    nivelChuva = "MODERADA";
  else if (valorChuva > 25)
    nivelChuva = "FRACA";
  else if (valorChuva > 10)
    nivelChuva = "SERENO";
  else
    nivelChuva = "SEM_CHUVA";


  sensorSolo = "~" + String(valorSolo) + "%";
  if (valorSolo > 95)
    nivelSolo = "ALAGADO";
  else if (valorSolo > 80)
    nivelSolo = "MOLHADO";
  else if (valorSolo > 45)
    nivelSolo = "HUMIDO";
  else if (valorSolo > 10)
    nivelSolo = "PINGADO";
  else if (valorSolo > 10)
    nivelSolo = "SALPICADO";
  else
    nivelSolo = "SECO";

  Serial.println("=============== DADOS ENVIADOS ==========================");
  Serial.print("Niv.Chuva:");       Serial.println(nivelChuva);
  Serial.print("Sen.Chuva:");       Serial.println(sensorChuva);
  Serial.print("Niv.Solo:");        Serial.println(nivelSolo);
  Serial.print("Sen.Solo:");        Serial.println(sensorSolo);
  Serial.print("Niv.Temperatura:"); Serial.println(nivelTemperatura);
  Serial.print("Sen.Temperatura:"); Serial.println(sensorTemperatura);
  Serial.print("Niv.Humidade:");    Serial.println(nivelHumidade);
  Serial.print("Sen.Humidade:");    Serial.println(sensorHumidade);
  Serial.println("=========================================================");
}
