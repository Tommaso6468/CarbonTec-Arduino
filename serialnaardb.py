import serial
import requests
ser = serial.Serial('COM6')
ser.flushInput()

while True:
    try:
        ser_bytes = ser.readline()
        decoded_bytes = list(map(float, ser_bytes[0:len(ser_bytes)-2].decode("utf-8").split(",")))
        waarde = decoded_bytes[0]
        serienummer = int(decoded_bytes[1])
        pload = {'id':serienummer,'waarde':waarde}
        r = requests.get('http://192.168.178.48/insert_co2arduino.php',params = pload)
        print(r.text)
        
    except:
        print("Keyboard Interrupt")
        break