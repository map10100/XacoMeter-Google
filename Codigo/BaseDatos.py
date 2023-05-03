import mysql.connector
import csv
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
    "FOREIGN KEY (id) REFERENCES monumentos(id),"
    "PRIMARY KEY (fecha));")
