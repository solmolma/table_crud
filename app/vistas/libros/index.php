<div id='libros'>
        <h1><?php echo \core\Idioma::text("Ultimos", "plantilla_libros"); ?></h1>
        <table align="center"   border='1px'>
                <thead>
                        <tr>
                                <th><?php echo \core\Idioma::text("Título", "plantilla_libros"); ?></th>
                                <th><?php echo \core\Idioma::text("Autor", "plantilla_libros"); ?></th>
                                <th><?php echo \core\Idioma::text("Comentario", "plantilla_libros"); ?></th>
                                <th><?php echo \core\Idioma::text("Acciones", "plantilla_libros"); ?></th>
                        </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($datos['libros'] as $indice => $libro) {
                                echo "<tr>
                                                <td>{$libro['titulo']}</td>
                                                <td>{$libro['autor']}</td>
                                                <td>{$libro['comentario']}</td>
                                                <td><a href='".(\core\URL::generar_con_idioma("libros/form_modificar/$indice"))."'><button>".(\core\Idioma::text("Modificar", "plantilla_libros"))."</button></a>
                                                    <a href='".(\core\URL::generar_con_idioma("libros/form_borrar/$indice"))."'><button>".(\core\Idioma::text("Borrar", "plantilla_libros"))."</button></td></a>
                                        </tr>";
                        }
                        ?>
                </tbody>
                <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                             <td><button onclick='window.location.assign("<?php echo \core\URL::generar_con_idioma("libros/form_anexar")?>");'><?php echo \core\Idioma::text("Anexar", "plantilla_libros"); ?></button></td>
                        </tr>
                </tfoot>
                
        </table>
</div>