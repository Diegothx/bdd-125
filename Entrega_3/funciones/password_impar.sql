CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
password_impar ()

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla RECORD;
random RECORD;

-- definimos nuestra función
BEGIN

    FOR tupla IN (SELECT * FROM usuario) -- AS f(id int, nombre varchar, mail varchar, passwords varchar, username varchar)) 
    LOOP
        SELECT INTO random FLOOR(RANDOM()*100000000+1000) AS rnd; -- numero random entre 4 y 8 digitos
        UPDATE usuario SET password = random.rnd WHERE id = tupla.id; -- actualizar la contraseña
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql