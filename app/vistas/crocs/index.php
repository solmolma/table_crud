<div id='crocs'>
    <h1>-- Listado de Crocs --</h1>
    <table align="center"   border='1px'>
        <thead>
            <tr>
                <th>Referencia</th>
                <th>Nombre</th>
                <th>Color</th>
                <th>Talla</th>
                <th>Precio</th>
                <th>Temporada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos['filas'] as $indice => $crocs) {
                echo "<tr>
                                                <td>{$crocs['id']}</td>
                                                <td>{$crocs['nombre']}</td>
                                                <td>{$crocs['color']}</td>
                                                <td>{$crocs['talla']}</td>
                                                <td>{$crocs['precio']}</td>
                                                <td>{$crocs['temporada']}</td>
                                                <td>".\core\HTML_Tag::a_boton_onclick("button",array ("crocs","form_modificar",$crocs['id']),"Modificar")." ".\core\HTML_Tag::a_boton_onclick("button",array ("crocs","form_borrar",$crocs['id']),"Borrar")."</td>
                                        </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"><button class="button" style="float: right; width: 100px; margin-right: 20px" onclick='window.location.assign("<?php echo \core\URL::generar("crocs/form_anexar") ?>");'>Anexar</button></td>
            </tr>
        </tfoot>

    </table>
</div>