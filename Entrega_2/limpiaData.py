from typing import Union
import numpy as np;
import pandas as pd;

# limpieza usuarios (ready):

"""
usuarios = pd.read_csv("Entrega_2\\data_original\\usuarios.csv") 
usuarios.sort_values(by=["id"]).to_csv("Entrega_2\\data_limpia\\usuarios.csv", index = False)
"""


#limpieza multimedia:

#multimedia = pd.read_csv("Entrega_2\\data_original\\multimedia.csv") 

"""
#Creacion tabla peliculas
peliculas = multimedia.loc[pd.notna(multimedia['pid']),["pid","titulo","duracion","clasificacion","puntuacion","año"]]
peliculas.columns = ["id","titulo","duracion","clasificacion","puntuacion","año"] 
peliculas[['id']]=peliculas[['id']].astype(int)
peliculas.drop_duplicates().sort_values(by=["id"]).to_csv("Entrega_2\\data_limpia\\peliculas.csv", index = False)

#Creacion tabla series
series = multimedia.loc[pd.notna(multimedia['sid']),["sid","serie","clasificacion","puntuacion","año"]]
series.columns = ["id","nombre","clasificacion","puntuacion","año"] 
series[['id']]=series[['id']].astype(int)
series.drop_duplicates().sort_values(by=["id"]).to_csv("Entrega_2\\data_limpia\\series.csv", index = False)

#Creacion tabla capitulos
capitulos = multimedia.loc[pd.notna(multimedia['cid']),["cid","sid","titulo","duracion","numero"]]
capitulos[['cid',"sid","numero"]]=capitulos[['cid',"sid","numero"]].astype(int)
capitulos.drop_duplicates().sort_values(by=["cid"]).to_csv("Entrega_2\\data_limpia\\capitulos.csv", index = False)

#Creacion generos
"""

#limpieza proveedores (ready):

#proveedores = pd.read_csv("Entrega_2\\data_original\\proveedores.csv")

"""
#Creacion tabla proveedores
proveedoresLimpios = proveedores.loc[:,["id","nombre","costo"]]
proveedoresLimpios[['id']]=proveedoresLimpios[['id']].astype(int)
proveedoresLimpios.drop_duplicates().sort_values(by=["id"]).to_csv("Entrega_2\\data_limpia\\proveedores.csv", index = False)

#Creacion tabla pelicula_arriendo
pelicula_arriendo = proveedores.loc[pd.notna(proveedores['disponibilidad']),["id","pid","precio","disponibilidad"]]
pelicula_arriendo.columns = ["id_proveedor","id_pelicula","precio","duracion_arriendo"] 
pelicula_arriendo[['precio',"duracion_arriendo"]]=pelicula_arriendo[['precio',"duracion_arriendo"]].astype(int)
pelicula_arriendo.drop_duplicates().sort_values(by=["id_proveedor","id_pelicula"]).reset_index(drop=True).to_csv("Entrega_2\\data_limpia\\pelicula_arriendo.csv", index = False)

#Creacion tablas serie_proveedor y pelicula_proveedor
multimedia_proveedor = proveedores.loc[pd.isna(proveedores['disponibilidad']),["id","sid","pid"]]

serie_proveedor = multimedia_proveedor.loc[pd.notna(multimedia_proveedor['sid']),["id","sid"] ]
serie_proveedor.columns = ["id_proveedor","id_serie"] 
serie_proveedor[['id_serie']]=serie_proveedor[['id_serie']].astype(int)
serie_proveedor.drop_duplicates().sort_values(by=["id_proveedor","id_serie"]).to_csv("Entrega_2\\data_limpia\\serie_proveedor.csv", index = False)

pelicula_proveedor = multimedia_proveedor.loc[pd.notna(proveedores['pid']),["id","pid"] ]
pelicula_proveedor.columns = ["id_proveedor","id_pelicula"] 
pelicula_proveedor[['id_pelicula']]=pelicula_proveedor[['id_pelicula']].astype(int)
pelicula_proveedor.drop_duplicates().sort_values(by=["id_proveedor","id_pelicula"]).to_csv("Entrega_2\\data_limpia\\pelicula_proveedor.csv", index = False)
"""
#series.to_csv("Entrega_2\\data_limpia\\series.csv")
#genero_subgenero = pd.read_csv("Entrega_2\\data_original\\genero_subgenero.csv")
#pagos = pd.read_csv("Entrega_2\\data_original\\pagos_v2.csv")
#visualizaciones = pd.read_csv("Entrega_2\\data_original\\visualizaciones.csv")
#subscripciones = pd.read_csv("Entrega_2\\data_original\\subscripciones.csv")
#proveedores = pd.read_csv("Entrega_2\\data_original\\subscripciones.csv")