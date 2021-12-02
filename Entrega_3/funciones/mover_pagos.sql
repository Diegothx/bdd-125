CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
mover_pagos()

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla RECORD;

-- definimos nuestra función
BEGIN
    FOR tupla IN (SELECT * FROM dblink('dbname=grupo94e3 user=grupo94 password=192sonanbulos322 port=5432',
    'SELECT * FROM poke2') AS f(id2 int, name2 varchar, type_2 varchar, total2 int, hp2 int, attack2 int, defense2 int, sp_atk2 int, sp_def2 int, speed2 int, legendary2 bool)) LOOP
        --hacer cosas
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql