from typing import Union
import numpy as np;
import pandas as pd 

#usuarios = pd.read_csv("Entrega_2\\data_original\\usuarios.csv") #Ya esta limpio

#limpieza multimedia:
multimedia = pd.read_csv("Entrega_2\\data_original\\multimedia.csv") 
""" Creacion tabla peliculas
peliculas = multimedia.loc[pd.notna(multimedia['pid']),["pid","titulo","duracion","clasificacion","puntuacion","año"]]
peliculas.columns = ["id","titulo","duracion","clasificacion","puntuacion","año"] 
peliculas[['id']]=peliculas[['id']].astype(int)
peliculas.drop_duplicates().sort_values(by=["id"]).to_csv("Entrega_2\\data_limpia\\peliculas.csv", index = False)
"""
""" Creacion tabla series """
peliculas = multimedia.loc[pd.notna(multimedia['sid']),["sid","clasificacion","puntuacion","serie"]]
peliculas.columns = ["id","clasificacion","puntuacion","nombre"] 
peliculas[['id']]=peliculas[['id']].astype(int)
peliculas.drop_duplicates().sort_values(by=["id"]).to_csv("Entrega_2\\data_limpia\\series.csv", index = False)
""" Creacion tabla capitulos """

#series.to_csv("Entrega_2\\data_limpia\\series.csv")
#genero_subgenero = pd.read_csv("Entrega_2\\data_original\\genero_subgenero.csv")
#pagos = pd.read_csv("Entrega_2\\data_original\\pagos_v2.csv")
#visualizaciones = pd.read_csv("Entrega_2\\data_original\\visualizaciones.csv")
#subscripciones = pd.read_csv("Entrega_2\\data_original\\subscripciones.csv")
#proveedores = pd.read_csv("Entrega_2\\data_original\\subscripciones.csv")