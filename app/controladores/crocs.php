<?php

namespace controladores;

/**
 * Clase controladora de la página que muestra todo lo referente a las Crocs.
 * Se encarga de hacer todas las validaciones de adicion, modificacion o borrado
 * de datos.
 * @package controladores
 * @author Marina Soler Molpeceres <msolermolpeceres@gmail.com>
 */
class crocs extends \core\Controlador {

    /**
     * Gestiona la vista parcial donde se mostrará una tabla con los datos del resultado
     * de la consulta a la base de datos.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
    public function index(array $datos = array()) {

        $datos["filas"] = \modelos\Modelo_SQL::table("crocs")->select();

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    /**
     * Método que ejecuta la vista parcial que contiene el formulario de ingreso
     * de datos para anexar un nuevo registo a la base de datos.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
    public function form_anexar(array $datos = array()) {

        $datos['values'] = array('nombre' => '', 'color' => '', 'talla' => '', 'precio' => '', 'temporada' => '');

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    /**
     * Método que valida que los datos introducidos por el usuario en la vista parcial de
     * "form_anexar". Si los datos son válidos, ejecutará la sentencia INSERT para agregarlo
     * a la base de datos y en caso contrario, en el que uno o más de los datos no sean válidos,
     * se retornara al formulario de ingreso mostrando un mensaje de error.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
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
            $datos['view_content'] = \core\Vista::generar("form_anexar", $datos);
            $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
            \core\HTTP_Respuesta::enviar($http_body);
        } else {
            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("crocs/index"));
            \core\HTTP_Respuesta::enviar();
        }
    }

    /**
     * Método que recibe el identificador del elemento seleccionado y lo muestra en un formulario
     * para permitir modificar alguno de sus datos. La consulta se realiza a través de MySQL.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
    public function form_modificar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        if ($id) {
            $clausulas['where'] = "id = " . $id;
            $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
            $datos["values"] = $fila[0];
            $datos["values"]['id'] = $id;

            $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
            $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
            \core\HTTP_Respuesta::enviar($http_body);
        } else {
            $datos['mensaje'] = "URL Incorrecta. Por favor corrige la direccion";
            \core\HTTP_Respuesta::cargar_controlador("errores", "index", $datos);
        }
    }

    /**
     * Método que se encarga de validar los datos modificados por el usuario en el formulario de la
     * vista parcial "form_modificar". En el caso de que falte algun dato o no sea válido, se retornara
     * al formulario de modificación mostrando un mensaje de error.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
    public function form_modificar_validar(array $datos = array()) {
        if (!isset($datos["errores"])) { // Si no es un reenvío desde una validación fallida
            $validaciones = array(
                "nombre" => "errores_requerido && errores_texto"
                , "color" => "errores_requerido && errores_texto"
                , "talla" => "errores_requerido && errores_numero_entero_positivo"
                , "precio" => "errores_requerido && errores_precio"
                , "temporada" => "errores_requerido && errores_fecha_hora"
            );

            $id = \core\HTTP_Requerimiento::request('id');
            if ($id) {
                $clausulas['where'] = " id = " . $id;
                if (!$validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos)) {
                    $datos["errores"]["errores_validacion"] = "Corrige los errores.";
                } else {
                    $datos['values']['id'] = $id;
                    $datos['values']['precio'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['precio']);
                    \modelos\Datos_SQL::table("crocs")->update($datos['values'], "crocs", $clausulas['where']);
                }
                if (!$validacion) { //Devolvemos el formulario para que lo intente corregir de nuevo
                    $datos['values']['id'] = $id;
                    $datos['view_content'] = \core\Vista::generar("form_modificar", $datos);
                    $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
                    \core\HTTP_Respuesta::enviar($http_body);
                } else {
                    \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("crocs/index"));
                    \core\HTTP_Respuesta::enviar();
                }
            } else {
                $datos['mensaje'] = "URL Incorrecta. Por favor corrige la direccion";
                \core\HTTP_Respuesta::cargar_controlador("errores", "index", $datos);
            }
        }

//        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("crocs/index"));
//        \core\HTTP_Respuesta::enviar();
    }

    /**
     * Método que consulta los datos de un elemento a través de su identificador y lo muestra
     * en un texto a modo de información para confirmar el borrado.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
    public function form_borrar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        if ($id) {
            $clausulas['where'] = "id = " . $id;
            $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
            $datos["values"] = $fila[0];

            $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
            $http_body = \core\Vista_Plantilla::generar('plantilla_crocs', $datos);
            \core\HTTP_Respuesta::enviar($http_body);
        } else {
            $datos['mensaje'] = "URL Incorrecta. Por favor corrige la direccion";
            \core\HTTP_Respuesta::cargar_controlador("errores", "index", $datos);
        }
    }

    /**
     * Método que se ejecuta cuando el usuario confirma el borrado. Como los datos no se permite
     * que se modifiquen, no necesita validación, por lo tanto solo ejecuta la sentencia DELETE
     * para eliminar el registro de la base de datos.
     * @param array $datos
     * @author Marina Soler Molpeceres
     */
    public function form_borrar_validar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::request('id');
        if ($id) {
            $clausulas['where'] = "id = " . $id;
            $fila = \modelos\Modelo_SQL::table("crocs")->select($clausulas);
            $datos["values"] = $fila[0];
            \modelos\Datos_SQL::delete($datos["values"], 'crocs');

            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar_con_idioma("crocs/index"));
            \core\HTTP_Respuesta::enviar();
        } else {
            $datos['mensaje'] = "URL Incorrecta. Por favor corrige la direccion";
            \core\HTTP_Respuesta::cargar_controlador("errores", "index", $datos);
        }
    }

}
