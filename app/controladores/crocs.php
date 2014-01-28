<?php

namespace controladores;

class crocs extends \core\Controlador {

    public function index(array $datos = array()) {

        $datos["filas"] = \modelos\Modelo_SQL::table("crocs")->select();

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_anexar(array $datos = array()) {

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_borrar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        $clausulas['where'] = "id = ".$id;
        $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
        $datos["values"] = $fila[0];

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_borrar_validar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        $clausulas['where'] = "id = ".$id;
        $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
        $datos["values"] = $fila[0];
        \modelos\Datos_SQL::delete($datos["values"], 'crocs');
        
        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("crocs/index"));
        \core\HTTP_Respuesta::enviar();
                
    }

}
