<h2>Borrar Crocs</h2>
<form id='form_borrar' method='post' action='<?php echo \core\URL::generar_con_idioma("crocs/form_borrar_validar/{$datos['values']['id']}");?>'>
    <p>¿Seguro que quiere borrar estas Crocs?</p>
        Nombre: <?php echo $datos['values']['nombre']?><br /> 
        Color: <?php echo $datos['values']['color']?><br />
        Talla: <?php echo $datos['values']['talla']?><br />        
        Precio: <?php echo $datos['values']['precio']?><br />        
        Temporada: <?php echo $datos['values']['temporada']?><br />        
        <input class="boton" type='submit' value='<?php echo \core\Idioma::text("Borrar", "plantilla_libros"); ?>' />
        <input class="boton" type='button' value='<?php echo \core\Idioma::text("Cancelar", "plantilla_libros"); ?>' onclick='window.location.assign("<?php echo \core\URL::generar_con_idioma("crocs/index");?>");'/>
</form>
