from pytrends.request import TrendReq
import pandas as pd
import time
import csv 

# Parametros de busqueda
pytrend = TrendReq(hl='es-ES', tz=360, retries=10)


# Extraer los términos de búsqueda 
with open('palabras_clave.txt', 'r') as f:
    reader = csv.reader(f)
    for row in reader:
        kw_list = row

# extraer los datos de tendencia
start_date = '2009-01-01'
end_date = pd.Timestamp.today().strftime('%Y-%m-%d')
pytrend.build_payload(kw_list, timeframe=f'{start_date} {end_date}')

# Parada de dos segundos entre solicitudes
time.sleep(2)

# Extraer los datos de tendencia
trend_data = pytrend.interest_over_time()

# Mostrar los datos de tendencia en la consola
print(trend_data)

# Convertir los datos en un DataFrame de pandas
df = pd.DataFrame(trend_data)

# Guardar los datos en un archivo CSV
df.to_csv('tendencias.csv', index=True, header=True)