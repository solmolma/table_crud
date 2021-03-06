<?php

namespace modelos;

/**
 * Clase que contiene el nombre de la tabla y las respectivas operaciones de la
 * gestion de la misma.
 * @author Marina Soler Molpeceres <msolermolpeceres@gmail.com>
 */
class crocs extends \core\sgbd\bd {

    public static $tabla = 'crocs';

    public static function create_table() {

        $consulta = "
			create table " . self::$tabla . "
			( `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                            `nombre` varchar(200) NOT NULL,
                            `color` varchar(50) NOT NULL,
                            `talla` int(10) unsigned NOT NULL,
                            `precio` decimal(5,2) unsigned NOT NULL,
                            `temporada` date NOT NULL,
                            PRIMARY KEY (`id`)
			)
			engine = innodb;	
		";

        return self::execute($consulta);
    }

    /**
     * El parámetro fila es un array que trae detro en otro array asociado al índice 'values' los valores de las columnas a insertar.
     * Si hay errores en el mismos array se devuelven dentro del índice 'errores'.
     * @param array &$fila = array('values' =>array('col1' => valo1, ), 'errores' => array('col1' => 'error1', ))
     * @return boolean
     */
    public static function insertar(array &$fila) {


        $validacion = true;
        if (!isset($fila['values']['crocs']) or !is_string($fila['values']['crocs'])) {
            $validacion = false;
            $fila['errores']['crocs'] = "Esta columna no puede esta vacía y debe ser un string.";
        }
        if (!isset($fila['values']['descripcion'])) {
            $fila['values']['crocs'] = null;
        } elseif (!is_string($fila['values']['descripcion'])) {
            $validacion = false;
            $fila['errores']['descripcon'] = "Esta columna debe ser un string.";
        }

        if ($validacion) {

            return self::insertar_fila($fila['values'], self::$tabla);
        } else {
            return false;
        }
    }

    public static function borrar(array &$fila) {


        $validacion = true;
        if (!isset($fila['values']['id'])) {
            $validacion = false;
            throw new \Exception(".....");
        }


        if ($validacion) {

            $consulta = "
				delete from " . self::$tabla . "
					where categoria = '{$fila['values']['categoria']}' or id = {$fila['values']['id']}
				;		
			";

            return self::ejecutar_consulta($consulta);
        } else {
            return false;
        }
    }

}

?>
