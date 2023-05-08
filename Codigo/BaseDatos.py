import time
import mysql.connector
import csv
from pytrends.request import TrendReq
#conexion con el servidor
conexion = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
)

#creación del cursor
cursor = conexion.cursor()

#eliminación de la base de datos si existe y creación de la base de datos
cursor.execute("DROP DATABASE xacometer;")
cursor.execute("CREATE DATABASE xacometer;")

#creación de tablas
cursor.execute("USE xacometer;")
cursor.execute("CREATE TABLE monumentos" 
    "(id INT NOT NULL AUTO_INCREMENT,"
    "BICs VARCHAR (150) NOT NULL,"
    "PRIMARY KEY (id));")
cursor.execute("CREATE TABLE tendencias" 
    "(fecha date NOT NULL,"
    "id INT NOT NULL,"
    "porcentaje INT NOT NULL,"
    "FOREIGN KEY (id) REFERENCES monumentos(id));")

with open('palabras_clave.txt', 'r') as f:
    reader = csv.reader(f)
    kw_list = next(reader)
#inserción de datos
sql = "INSERT INTO monumentos (BICs) VALUES (%s)"
for kw in kw_list:
    val = (kw,)
    cursor.execute(sql, val)
conexion.commit()

sql = "INSERT INTO tendencias (fecha, id, porcentaje) VALUES (%s, %s, %s)"
pytrend = TrendReq(hl='es-ES', tz=360, retries=10)
for kw in kw_list:
    pytrend.build_payload([kw], timeframe='2009-01-01 2021-01-01')
    time.sleep(2)
    trend_data = pytrend.interest_over_time()
    for index, row in trend_data.iterrows():
        val = (index, kw_list.index(kw)+1, row[kw])
        cursor.execute(sql, val)
conexion.commit()