<h2><?php echo \core\Idioma::text("Borrar Libro", "plantilla_libros"); ?></h2>
<form id='form_borrar' method='post' action='<?php echo \core\URL::generar_con_idioma("libros/form_borrar_validar/{$datos['values']['id']}");?>'>
    <p><?php echo \core\Idioma::text("Borrar Pregunta", "plantilla_libros"); ?></p>
        <?php echo \core\Idioma::text("Título", "plantilla_libros"); ?>: <?php echo $datos['values']['titulo']?><br /> 
        <?php echo \core\Idioma::text("Autor", "plantilla_libros"); ?>: <?php echo $datos['values']['autor']?><br />
        <?php echo \core\Idioma::text("Comentario", "plantilla_libros"); ?>: <?php echo $datos['values']['comentario']?><br />        
        <input class="boton" type='submit' value='<?php echo \core\Idioma::text("Borrar", "plantilla_libros"); ?>' />
        <input class="boton" type='button' value='<?php echo \core\Idioma::text("Cancelar", "plantilla_libros"); ?>' onclick='window.location.assign("<?php echo \core\URL::generar_con_idioma("libros/index");?>");'/>
</form>
