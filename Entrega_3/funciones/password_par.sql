CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
función (argumentos)

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla RECORD; 
nueva_contraseña varchar;
horas integer; 
random integer;

-- definimos nuestra función
BEGIN

    FOR tupla IN (SELECT * FROM dblink('dbname=grupo94e3 user=grupo94 password=192sonanbulos322 port=5432',
    'SELECT * FROM usuarios') AS f(id int, nombre varchar, mail varchar, contraseña varchar, username varchar)) LOOP
        -- Se obtienen las horas de juego total por usuario
        horas := SELECT SUM(horas_juego) FROM dblink('dbname=grupo94e3 user=grupo94 password=192sonanbulos322 port=5432',
    'SELECT * FROM juegos_usuario') WHERE usuario_id = tupla.id; 
        -- Se crea un numero random en base a las horas de juego
        random := SELECT FLOOR(RAND()*horas); 
        -- Se crea la nueva contraseña uniendo el nombre con el número random
        nueva_contraseña := SELECT CONCAT(tupla.nombre, random); 
        -- Insertarlo en la tabla
        INSERT INTO usuarios VALUES (tupla.id, tupla.nombre, tupla.mail, nueva_contraseña, tupla.username);
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql