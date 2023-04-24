# Importar las bibliotecas necesarias
from pytrends.request import TrendReq
import pandas as pd
import time
import csv

# Establecer el intervalo de tiempo de búsqueda
start_date = '2009-01-01'
end_date = pd.Timestamp.today().strftime('%Y-%m-%d')

# Configurar la API de Google Trends
pytrend = TrendReq(hl='es-ES', tz=360, retries=10)

# Leer las palabras clave desde el archivo CSV
with open('palabras_clave.txt', 'r') as f:
    reader = csv.reader(f)
    kw_list = next(reader) 
    groups = [kw_list[i:i+5] for i in range(0, len(kw_list), 5)] # divide las palabras clave en grupos de 5

# Extraer los datos de tendencia para cada grupo de palabras clave
trend_data = pd.DataFrame()
for group in groups:
    pytrend.build_payload(group, timeframe=f'{start_date} {end_date}')
    time.sleep(1) # parada de un segundo entre solicitudes
    group_data = pytrend.interest_over_time()
    if not group_data.empty:
        group_data = group_data.drop('isPartial', axis=1) 
        trend_data = pd.concat([trend_data, group_data], axis=1)

# Mostrar los datos de tendencia en la consola
print(trend_data)

# Guardar los datos en un archivo CSV
trend_data.to_csv('tendencias.csv', index=True, header=True)