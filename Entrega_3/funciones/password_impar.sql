CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
pwassword_impar ()

-- declaramos lo que retorna
RETURNS ovid AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
tupla RECORD;
random integer;

-- definimos nuestra función
BEGIN

    FOR tupla IN (SELECT * FROM usuarios  AS f(id int, nombre varchar, mail varchar, password varchar, 
    username varchar)) LOOP
        random := SELECT FLOOR(RAND()*100000000+1000); -- numero random entre 4 y 8 digitos
        UPDATE usuarios SET password = random WHERE id = tupla.id; -- actualizar la contraseña
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql