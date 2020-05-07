import time
import Adafruit_DHT
import RPi.GPIO as GPIO
import urllib.parse
import urllib.request
GPIO_PIN = 4

def fetch_thing(url, params, method):
 params = urllib.parse.urlencode(params)
 if method=='POST':
    f = urllib.request.urlopen(url, params)
 else:
    f = urllib.request.urlopen(url+'?'+params)
 return (f.read(), f.code)

try:
  print('按下 Ctrl-C 可停止程式')
  while True:
      hum, temp = Adafruit_DHT.read_retry(Adafruit_DHT.DHT22, GPIO_PIN)
      if hum is not None and temp is not None:
          print('溫度={0:0.1f}度C 濕度={1:0.1f}%'.format(temp, hum))
      else:
          print('讀取失敗，重新讀取。')

      content , response_code = fetch_thing('http://127.0.0.1/settemp.php',
                           {'temp': temp, 'hum': hum},
                           'GET')

      time.sleep(60)
except KeyboardInterrupt:
  print('關閉程式')

