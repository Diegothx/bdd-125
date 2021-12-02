CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
password_par ()

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla RECORD;
horas RECORD; 
random RECORD;
nueva_contraseña RECORD;

-- definimos nuestra función
BEGIN
    -- Se itera en cada tupla de la otra base de datos
    FOR tupla IN (SELECT * FROM dblink('dbname=grupo94e3 user=grupo94 password=192sonanbulos322 port=5432',
    'SELECT * FROM usuarios') AS f(id int, nombre varchar, mail varchar, contraseña varchar, username varchar)) LOOP
        -- Revisar si el usuario existe en la base de datos
        IF NOT EXISTS(SELECT * FROM usuario WHERE id =  tupla.id) THEN
            -- Se obtienen las horas de juego total por usuario
            SELECT SUM(horas_juego) AS hora INTO horas FROM dblink('dbname=grupo94e3 user=grupo94 password=192sonanbulos322 port=5432',
            'SELECT * FROM juegos_usuario') AS f(videojuego_id int, usuario_id int, horas_juego float) WHERE usuario_id = tupla.id; 
            -- Se crea un numero random en base a las horas de juego
            SELECT INTO random FLOOR(RANDOM()*horas.hora) AS rnd; 
            -- Se crea la nueva contraseña uniendo el nombre con el número random
            SELECT INTO nueva_contraseña CONCAT(tupla.nombre, random.rnd) AS n_contraseña; 
            -- Se define un nuevo id para no repetir
            INSERT INTO usuario VALUES (tupla.id, tupla.nombre, tupla.mail, nueva_contraseña.n_contraseña, tupla.username);
        END IF;
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql