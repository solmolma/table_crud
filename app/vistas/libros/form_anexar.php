<h2><?php echo \core\Idioma::text("Anexar Libro", "plantilla_libros"); ?></h2>
<form id='form_anexar' method='post' action='<?php echo \core\URL::generar_con_idioma("libros/form_anexar_validar");?>'>
        <?php echo \core\Idioma::text("Título", "plantilla_libros"); ?>: <input type='text' id='titulo' name='titulo' maxsize='50' value="<?php echo $datos['values']['titulo']?>"/><?php echo \core\HTML_Tag::span_error("titulo", $datos)?><br />
        <?php echo \core\Idioma::text("Autor", "plantilla_libros"); ?>: <input type='text' id='autor' name='autor' maxsize='50' value="<?php echo $datos['values']['autor']?>"/><?php echo \core\HTML_Tag::span_error("autor", $datos)?><br />
        <?php echo \core\Idioma::text("Comentario", "plantilla_libros"); ?>: <input type='text'  id='comentario' name='comentario' maxsize='50' value="<?php echo $datos['values']['comentario']?>"/><?php echo \core\HTML_Tag::span_error("comentario", $datos)?><br />        
        <input class="boton" type='submit' value='<?php echo \core\Idioma::text("Enviar", "plantilla_libros"); ?>' />
        <input class="boton" type='button' value='<?php echo \core\Idioma::text("Cancelar", "plantilla_libros"); ?>' onclick='window.location.assign("<?php echo \core\URL::generar_con_idioma("libros/index");?>");'/>
</form>
