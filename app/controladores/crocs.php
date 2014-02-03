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

        $datos['values'] = array('nombre' => '', 'color' => '', 'talla' => '', 'precio' => '', 'temporada' => '');

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_anexar_validar(array $datos = array()) {

        $validaciones = array(
            "nombre" => "errores_requerido && errores_texto"
            , "color" => "errores_requerido && errores_texto"
            , "talla" => "errores_requerido && errores_numero_entero_positivo"
            , "precio" => "errores_requerido && errores_precio"
            , "temporada" => "errores_requerido && errores_fecha_hora"
        );
        if (!$validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos))
            $datos["errores"]["errores_validacion"] = "Corrige los errores.";
        else {
            $datos['values']['precio'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['precio']);
            if (!$validacion = \modelos\Modelo_SQL::table("crocs")->insert($datos['values'])) /* insert($datos["values"], 'crocs')) */ // Devuelve true o false
                $datos["errores"]["errores_validacion"] = "No se han podido grabar los datos en la bd.";
        }
        if (!$validacion) { //Devolvemos el formulario para que lo intente corregir de nuevo
            \core\Distribuidor::cargar_controlador('crocs', 'form_anexar', $datos);
        } else {
            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("crocs/index"));
            \core\HTTP_Respuesta::enviar();
        }
    }

    public function form_modificar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        $clausulas['where'] = "id = " . $id;
        $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
        $datos["values"] = $fila[0];
        $datos["values"]['id'] = $id;

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }
    
    public function form_modificar_validar(array $datos = array()) {
        if (!isset($datos["errores"])) { // Si no es un reenvío desde una validación fallida
            $validaciones = array(
                "nombre" => "errores_requerido && errores_texto"
                , "color" => "errores_requerido && errores_texto"
                , "talla" => "errores_requerido && errores_numero_entero_positivo"
                , "precio" => "errores_requerido && errores_precio"
                , "temporada" => "errores_requerido && errores_fecha_hora"
            );
            if (!$validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos)) {
                $datos['mensaje'] = 'Datos erróneos para identificar el artículo a modificar';
                \core\Distribuidor::cargar_controlador('errores', 'index', $datos);
                return;
            } else {
                $id = \core\HTTP_Requerimiento::request('id');
                $clausulas['where'] = " id = ".$id;
                $datos['values']['precio'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['precio']);
                \modelos\Datos_SQL::table("crocs")->update($datos['values'],"crocs",$clausulas['where']);
                
            }
        }
        
        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("crocs/index"));
        \core\HTTP_Respuesta::enviar();
        
    }
    

    public function form_borrar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        $clausulas['where'] = "id = " . $id;
        $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
        $datos["values"] = $fila[0];

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    public function form_borrar_validar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        $clausulas['where'] = "id = " . $id;
        $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
        $datos["values"] = $fila[0];
        \modelos\Datos_SQL::delete($datos["values"], 'crocs');

        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("crocs/index"));
        \core\HTTP_Respuesta::enviar();
    }

}
