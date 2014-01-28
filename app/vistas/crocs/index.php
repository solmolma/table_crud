<div id='crocs'>
    <h1><?php echo \core\Idioma::text("Ultimos", "plantilla_crocs"); ?></h1>
    <table align="center"   border='1px'>
        <thead>
            <tr>
                <th><?php echo \core\Idioma::text("Referencia", "plantilla_crocs"); ?></th>
                <th><?php echo \core\Idioma::text("Nombre", "plantilla_crocs"); ?></th>
                <th>Color</th>
                <th>Talla</th>
                <th><?php echo \core\Idioma::text("Precio", "plantilla_crocs"); ?></th>
                <th>Temporada</th>
                <th><?php echo \core\Idioma::text("Acciones", "plantilla_crocs"); ?></th>
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
                                                <td><a href='" . (\core\URL::generar_con_idioma("crocs/form_modificar/{$crocs['id']}")) . "'><button>" . (\core\Idioma::text("Modificar", "plantilla_crocs")) . "</button></a>
                                                    <a href='" . (\core\URL::generar_con_idioma("crocs/form_borrar/{$crocs['id']}")) . "'><button>" . (\core\Idioma::text("Borrar", "plantilla_crocs")) . "</button></td></a>
                                        </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"><button style="float: right; width: 100px; margin-right: 20px" onclick='window.location.assign("<?php echo \core\URL::generar_con_idioma("crocs/form_anexar") ?>");'><?php echo \core\Idioma::text("Anexar", "plantilla_libros"); ?></button></td>
            </tr>
        </tfoot>

    </table>
</div>