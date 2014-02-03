<h2>Modifique los datos de las Crocs</h2>
<form id='form_modificar' method='post' action='<?php echo \core\URL::generar_con_idioma("crocs/form_modificar_validar/{$datos['values']['id']}");?>'>
        Nombre: <input type='text' id='nombre' name='nombre' maxsize='50' value="<?php echo $datos['values']['nombre']?>"/><?php echo \core\HTML_Tag::span_error("nombre", $datos)?><br /> 
        Color: <input type='text' id='color' name='color' maxsize='50' value="<?php echo $datos['values']['color']?>"/><?php echo \core\HTML_Tag::span_error("color", $datos)?><br />
        Talla: <input type='number'  id='talla' name='talla' maxsize='50' value="<?php echo $datos['values']['talla']?>"/><?php echo \core\HTML_Tag::span_error("talla", $datos)?><br />        
        Precio: <input type='text'  id='precio' name='precio' maxsize='50' value="<?php echo \core\Conversiones::decimal_punto_a_coma($datos['values']['precio']);?>"/><?php echo \core\HTML_Tag::span_error("precio", $datos)?><br />        
        Temporada (dd/mm/aaaa): <input type='date' id='temporada' name='temporada' maxsize='50' value="<?php echo $datos['values']['temporada']?>"/><?php echo \core\HTML_Tag::span_error("temporada", $datos)?><br />        
        <input class="boton" type='submit' value='<?php echo \core\Idioma::text("Enviar", "plantilla_libros"); ?>' />
        <input class="boton" type='button' value='<?php echo \core\Idioma::text("Cancelar", "plantilla_libros"); ?>' onclick='window.location.assign("<?php echo \core\URL::generar_con_idioma("crocs/index");?>");'/>
</form>