<h2>Borrar Crocs</h2>
<form id='form_borrar' method='post' action='<?php echo \core\URL::generar("crocs/form_borrar_validar"); ?>'>
    <p>¿Seguro que quiere borrar estas Crocs?</p>
    <input type='hidden' id='id' name='id' value="<?php echo $datos['values']['id'] ?>"/>
    Nombre: <?php echo $datos['values']['nombre'] ?><br /> 
    Color: <?php echo $datos['values']['color'] ?><br />
    Talla: <?php echo $datos['values']['talla'] ?><br />        
    Precio: <?php echo $datos['values']['precio'] ?><br />        
    Temporada: <?php echo $datos['values']['temporada'] ?><br />        
    <input class="boton" type='submit' value='Borrar' />
    <input class="boton" type='button' value='Cancelar' onclick='window.location.assign("<?php echo \core\URL::generar("crocs/index"); ?>");'/>
</form>
