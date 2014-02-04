<?php
namespace controladores;

/**
 * Clase controladora de la página que muestra la vista de la página principal.
 * @package controladores
 * @author Marina Soler Molpeceres <msolermolpeceres@gmail.com>
 */
class inicio extends \core\Controlador {
	
        /**
         * Método encargado de ejecutar la plantilla principal de la aplicación.
         * @param array $datos
         */
	public function index(array $datos = array()) {
		
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal');
		\core\HTTP_Respuesta::enviar($http_body);
	}
}