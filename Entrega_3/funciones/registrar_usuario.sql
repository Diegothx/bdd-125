CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
registrar_usuario (nombre, mail, username, contraseña)

-- declaramos lo que retorna
RETURNS void AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
id integer;


-- definimos nuestra función
BEGIN
    id := SELECT MAX(id) FROM usuario;
    id := id + 1;
    INSERT INTO usuario VALUES (id, nombre, mail, contraseña, username);


-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql