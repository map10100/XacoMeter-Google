import time
import mysql.connector

#conexion con el servidor
conexion = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
)

#creación del cursor
cursor = conexion.cursor()

#eliminación de la base de datos si existe y creación de la base de datos
cursor.execute("DROP DATABASE if exists usuarios;")
cursor.execute("CREATE DATABASE usuarios;")

#creación de tablas
cursor.execute("USE usuarios;")
cursor.execute("CREATE TABLE usuarios" 
    "(nombre VARCHAR (150) NOT NULL,"
    "apellido VARCHAR (150) NOT NULL,"
    "email VARCHAR (150) NOT NULL,"
    "username VARCHAR (150) NOT NULL,"
    "contrasena VARCHAR (150) NOT NULL,"
    "PRIMARY KEY (username));")
conexion.commit()