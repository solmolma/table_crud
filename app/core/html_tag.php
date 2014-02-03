<?php

namespace core;

/**
 * Esta clase genera etiquetas html.
 * Cada etiqueta se definine en un método específico.
 *
 * @author Jesús María de Quevedo Tomé <jequeto@gmail.com>
 * @since 20130130
 */
class HTML_Tag extends \core\Clase_Base {

    protected static $depuracion = false;
    
    private static $use_post_request_form = false;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Genera el script html para una etiqueta <span>
     * 
     * @param string $input_id
     * @param array $datos
     * @return string Script html con una etiqueta <span>
     */
    public static function span_error($input_id, array $datos) {

        return "<span id='error_$input_id' class='input_error' style='color: red;'>" . (isset($datos['errores'][$input_id]) ? $datos['errores'][$input_id] : '') . "</span>";
    }

    /**
     * Método pensados para evitar que se envíe por get el id de algunas peticiones como
     * form_modificar o form_borrar. 
     * La query string debe tener máximo tres argumentos, siendo el tercero el valor para el id
     * 
     * @param string $clases Ejemplo: "clase1 clase2 clase3 ..."
     * @param array $query_string Ejemplo: array("controlador", "metodo", id) array("usuarios", "form_modificar", 5)
     * @param string $texto Ejemplo: "Modificar"
     * @param array $otros_argumentos Ejemplo: array("target"=>"_blank", ...)
     * @return string
     */
    public static function a_boton_onclick($clases, array $query_string = array("inicio", "index"), $texto, array $otros_argumentos = array()) {

        self::$use_post_request_form = true;

        $link = "";
        $controlador = isset($query_string[0]) ? $query_string[0] : "inicio";
        $metodo = isset($query_string[1]) ? $query_string[1] : "index";

//		if ( ! \core\Usuario::tiene_permiso($controlador, $metodo)) {
//			return $link;
//		};

        if (isset($query_string[2])) {
            $id = $query_string[2];
            unset($query_string[2]);
        } else {
            $id = 0;
        }
        $argumentos = "";
        foreach ($otros_argumentos as $key => $value) {
            $argumentos .= " $key ='$value' ";
        }
        $uri = \core\URL::http_generar($query_string);
        $link = "<a class='$clases' onclick='submit_post_request_form(\"$uri\", \"$id\");' $argumentos >$texto</a>";
        return $link;
    }
    
    /**
	 * Se utiliza en la plantilla para incluir un formulario vacío que se utilizará
	 * para enviar requerimientos por post.
	 * 
	 * @return string Con un formulario vacío que se rellena con una fución javascript
	 */
	public static function post_request_form() {

		if ( ! self::$use_post_request_form)
			return "";
	?>	
		<div>	
			<!-- Form que se utiliza para enviar post los requerimientos y que el id no se vea
				en la barra de direcciones -->
			<form id="post_request_form"
				action=""  
				method="post"
				style="display: none;"
			>
				<input name="id" id="id" type="hidden" />

			</form>

			<script type="text/javascript" />
				/**
				* Envía una petición por post para ocultar parámetros a usuario y evitar que juegue con
				* ellos modificando la URI mostrada .
				* 
				* @param string action
				* @param strin id
				* @returns {undefined}
				*/
				function submit_post_request_form(action, id) {
					$("#post_request_form").attr("action",action);
					$("#id").attr("value", id);
					$("#post_request_form").submit();
					// alert("post_request_form.submit("+$("#post_request_form").attr("action")+" , "+$("#id").val()+")");
				}
			</script>
		</div>
	<?php

	}

}

// Fin de la clase