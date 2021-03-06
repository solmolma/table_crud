<?php
namespace core;

class SESSION {
	
	public static function iniciar() {
		
		session_start();
		
	}
	
	
	
	public static function destruir() {
		
		// Borramos el cookie de sesion.
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			\core\HTTP_Respuesta::ºsetcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		
		session_destroy();
		
	}
	
	
	
	public static function regenerar_id() {
		
		session_regenerate_id(true);
		
	}
	
}