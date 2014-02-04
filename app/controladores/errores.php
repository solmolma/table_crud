<?php
namespace controladores;

/**
 * Clase controladora de la página que muestra todo lo referente a errores.
 * Se encarga de ejecutar una vista según el mensaje o error encontrado.
 * @package controladores
 * @author Marina Soler Molpeceres <msolermolpeceres@gmail.com>
 */
class errores extends \core\Controlador {
	
	
	/**
         * Método que prepara el mensaje segun los datos aportados.
         * @param array $datos
         */
	public function index(array $datos = array()) {
		
		$this->mensaje($datos);
		
	}


	
	/**
         * Método que carga la plantilla de errores para el error 404 de contenido
         * no encontrado.
         * @param array $datos
         */
	public function error_404(array $datos = array()) {
		
		$contenido = \core\Vista_Plantilla::generar("plantilla_errores", $datos);
		\core\HTTP_Respuesta::set_http_header_status("404");
		\core\HTTP_Respuesta::enviar($contenido);
				
	}
	
	/**
         * Método que carga la plantilla de errores para mostrar el mensaje correspondiente
         * guardado en los datos.
         * @param array $datos
         */
	public function mensaje(array $datos = array()) {
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_errores', $datos);
		\core\HTTP_Respuesta::set_http_header_status("404");
		\core\HTTP_Respuesta::enviar($http_body);
		
		
	}
	
	
} // Fin de la clase