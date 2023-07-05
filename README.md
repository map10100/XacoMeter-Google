# XacoMeterII-Google Trends
Xacometer es una aplicación creada como parte del Trabajo de Final de Grado de la Universidad de Burgos cuyo objetivo es visualizar los datos extraídos sobre una serie de Bienes de Interés Cultural a través de Google Trends.
Comienza conectándose a Google Trends y enviandole una serie de palabras clave que se tratan de los Bienes de Interes Cultural. Google Trends devuelve la información que ha sido obtenida de realizar estas búsquedas y se almacenará en una Base de Datos.
Una vez obtenida la información, se podrá vsualizar en la aplicación web creada, mediante unos gráficos creados utilizando la información almacenada en la Base de Datos. 
Antes de visualizar dicha información, hay que seguir una serie de pasos:
- Registrarse en la aplicacióon web o iniciar sesión en caso de estar ya registrados.
- Elegir si queremos realizar la búsqueda de un monumento en en rango de fechas o por el contrario que se visualicen todos los monumentos en una fecha determinada.
- Seleccionar los datos en los desplegables del formulario y realizar la búsqueda.
  
Estas son las funcionalidades básicas, pero la web cuenta con unas funciones adicionales para mejorar la experiencia del usuario como pueden ser:
- Descargar toda la información de los bienes de interés cultural en un archivo CSV pulsando el botón correspondiente en la ventana de los gráficos.
- Cambiar el idioma de la web pudiendo elegir entre el inglés y el español.
- Cerrar la sesión que se ha iniciado.
- Redimensionar la web en un ordenador.

## Aplicación desplegada
La aplicación ha sido desplegada en Heroku, esto nos va a permitir acceder a la página web a través de un enlace sin la necesidad de hacer instalaciones. El enlace a la web del proyecto es el siguiente: https://googlexacometer2-f814f4b44bb3.herokuapp.com/

## Instalación en local
La web esta pensada para ser abierta desde el enlace de Heroku del apartado anterior, pero también es posible ejecutara en local. Para ello habrá que tener una serie de componentes:
- Python
- PyTrends
- PHP
- MySQL
- XAMPP
- Pandas
- Visual Studio Code
  
Para ejecutar las librerias de pyhon habrá que ejecutar el siguiente comando:
 
` $ pip install [librería] `

Una vez descargadas/instaladas las aplicaciones y librerías, debemos guardar el proyecto en la carpeta htdocs de XAMPP e inicializar en XAMPP Apache y MySQL.
En los archivos de codigo habra que cambiar las llamadas a la Base de datos poniendo que sea en local y cambiando el usuario y contraseña correspondiente.
Ejecutamos el archivo de extracción de información y la Base de datos.

` $ Python Extraccion_informacion.py`

` $ Python BaseDatos.py`

Por ultimo abrimos el archivo en el navegador con la ruta localhost donde se encuentra la web apuntando primero al archivo ` inicio.php` y ya tendremos la web desplegada.

## Uso de la aplicación
Se ha realizado un video explicativo sobre el funcionamiento de la web, haciendo en él una demostración de como se usa y cuales son todas sus funcionalidades. El enlace es el siguiente: https://www.youtube.com/watch?v=oI_IJIYf_RM
