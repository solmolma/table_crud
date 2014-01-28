<?php

namespace modelos;

class Libros_en_Fichero implements Datos_fichero{
    
    /******************************************************/
    /**METODOS Y PROPIEDADES PROPIAS PRIVADAS DE LA CLASE**/
    /******************************************************/
    
    private static $libros = array(
            /* Este array es el equivalente a una línea del fichero de texto
              array(
              "titulo" => "cadena",
              "autor" => "cadena",
              "comentario" => "cadena"
              ),
             */
    );
    
    public static function get_libros() {

        self::leer_de_fichero();
        
        return self::$libros;
    }
    
    private static function get_nombre_fichero() {

        return PATH_APP . "modelos/libros.txt";
    }
    
    private static function leer_de_fichero() {

        $file_path = self::get_nombre_fichero();

        $lineas = file($file_path);
        
        foreach ($lineas as $numero => $linea) {
            
            $libro = explode(";", $linea);

            self::$libros[$numero]["titulo"] = $libro[0];
            self::$libros[$numero]["autor"] = $libro[1];
            self::$libros[$numero]["comentario"] = $libro[2];
        }
    }
    
    private static function escribir_en_fichero() {

        $file_path = self::get_nombre_fichero("libros");

        $file = fopen($file_path, "w");

        foreach (self::$libros as $libro) {
            $linea = implode(";", $libro);
            fwrite($file, $linea);
        }
        fclose($file);
    }
    
    /******************************************************/
    /****************METODOS IMPLEMENTADOS*****************/
    /******************************************************/
    
    public static function anexar(array $elementos) {
        $file_path = self::get_nombre_fichero("libros");
        $file = fopen($file_path, "a+");

        $linea = implode(";", $elementos) . "\n";
        fwrite($file, $linea);

        fclose($file);
    }

    public static function borrar($id) {
        self::leer_de_fichero();
        print_r(self::$libros[$id]);
        unset(self::$libros[$id]);

        self::escribir_en_fichero();
    }

    public static function modificar(array $elementos) {
        self::leer_de_fichero();
        
        self::$libros[$elementos['id']]["titulo"] = $elementos['titulo'];
        self::$libros[$elementos['id']]["autor"] = $elementos['autor'];
        self::$libros[$elementos['id']]["comentario"] = $elementos['comentario']."\n";

        self::escribir_en_fichero();
    }
    
}

?>
