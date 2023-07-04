import time
import mysql.connector
import csv
from pytrends.request import TrendReq

# Conexión con el servidor MySQL
conexion = mysql.connector.connect(
    host="us-cdbr-east-06.cleardb.net",
    user="bf3e0dec361658",
    password="57467eec",
    charset="utf8"
)

# Creación del cursor
cursor = conexion.cursor()

# Eliminación de la base de datos si existe y creación de la base de datos
cursor.execute("DROP DATABASE IF EXISTS xacometer;")
cursor.execute("CREATE DATABASE xacometer CHARACTER SET utf8 COLLATE utf8_general_ci;")
cursor.execute("USE xacometer;")

# Creación de tablas
cursor.execute("CREATE TABLE IF NOT EXISTS bics ("
               "id INT NOT NULL AUTO_INCREMENT,"
               "nombre VARCHAR(150) NOT NULL,"
               "PRIMARY KEY (id)"
               ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;")

cursor.execute("CREATE TABLE IF NOT EXISTS tendencias ("
               "fecha DATE NOT NULL,"
               "id INT NOT NULL,"
               "tendencia INT NOT NULL,"
               "FOREIGN KEY (id) REFERENCES bics(id)"
               ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;")

cursor.execute("CREATE TABLE IF NOT EXISTS usuarios ("
               "nombre VARCHAR(150) NOT NULL,"
               "apellido VARCHAR(150) NOT NULL,"
               "email VARCHAR(150) NOT NULL,"
               "username VARCHAR(150) NOT NULL,"
               "contrasena VARCHAR(150) NOT NULL,"
               "PRIMARY KEY (username)"
               ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;")

with open('palabras_clave.txt', 'r', encoding='utf8') as f:
    reader = csv.reader(f)
    kw_list = next(reader)

# Inserción de datos en la tabla bics
sql = "INSERT INTO bics (nombre) VALUES (%s)"
for kw in kw_list:
    val = (kw,)
    cursor.execute(sql, val)

conexion.commit()

# Inserción de datos en la tabla tendencias
sql = "INSERT INTO tendencias (fecha, id, tendencia) VALUES (%s, %s, %s)"
pytrend = TrendReq(hl='es-ES', tz=360, retries=10)
for kw in kw_list:
    pytrend.build_payload([kw], timeframe='2009-01-01 2021-01-01')
    time.sleep(2)
    trend_data = pytrend.interest_over_time()
    for index, row in trend_data.iterrows():
        val = (index, kw_list.index(kw) + 1, row[kw])
        cursor.execute(sql, val)

conexion.commit()
