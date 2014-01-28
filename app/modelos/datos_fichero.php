<?php

namespace modelos;

/*
 * Interfaz que define los métodos que van a ser comunes en las clases de escritura, 
 * lectura y gestion de los datos (modelos - libros, musica y peliculas)
 */
interface Datos_fichero{
    
    public static function anexar(array $elementos);
    public static function borrar($id);
    public static function modificar(array $elementos);
    
}

?>
