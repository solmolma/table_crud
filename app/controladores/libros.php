<?php

namespace controladores;

class libros extends \core\Controlador {

    public function index(array $datos = array()) {

        $datos['libros'] = \modelos\Libros_En_Fichero::get_libros();

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_anexar(array $datos = array()) {

        $datos['values'] = array('titulo' => '', 'autor' => '', 'comentario' => '');
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_anexar_validar(array $datos = array()) {

        $validaciones = array(
            "titulo" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "autor" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "comentario" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
        );

        $validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos);
        if (!$validacion) {
            $datos['view_content'] = \core\Vista::generar("form_anexar", $datos, true);
            $http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
            \core\HTTP_Respuesta::enviar($http_body);
        } else {
            $libro = $datos['values'];
            \modelos\Libros_En_Fichero::anexar($libro);
            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("libros/index"));
            \core\HTTP_Respuesta::enviar();
        }
        
    }
    
    public function form_modificar(array $datos = array()) {

        $libros = \modelos\Libros_En_Fichero::get_libros();
        
        $id = \core\HTTP_Requerimiento::request('id');
        $datos['values'] = $libros[$id];
        $datos['values']['id'] = $id;
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    public function form_modificar_validar(array $datos = array()) {

        $validaciones = array(
            "id" => "errores_requerido && errores_numero_entero_positivo",
            "titulo" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "autor" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "comentario" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
        );
        
        $validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos);
        
        if (!$validacion) {
            if (isset($datos['errores']['id'])) {
                $datos['errores']['validacion'] = "No es posible identificar el id del libro a modificar.<br />" . $datos['errores']['validacion'];
            }
            $datos['view_content'] = \core\Vista::generar("form_modificar", $datos, true);
            $http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
            \core\HTTP_Respuesta::enviar($http_body);
        } else {
            $libro = $datos['values']; 
            \modelos\Libros_En_Fichero::modificar($libro);
            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("libros/index"));
            \core\HTTP_Respuesta::enviar();
        }
        
    }
    
    public function form_borrar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        $libros = \modelos\Libros_En_Fichero::get_libros();
        $datos['values'] = $libros[$id];
        $datos['values']['id'] = $id;
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_libros', $datos, true);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    public function form_borrar_validar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        
        \modelos\Libros_En_Fichero::borrar($id);
        
        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("libros/index"));
        \core\HTTP_Respuesta::enviar();
        
    }

}