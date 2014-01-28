<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo \core\Idioma::text("Title","plantilla_libros"); ?></title>
        <meta name="Description" content="Página en la que se muestran el listado de libros" /> 
        <meta name="Keywords" content="libros, biblioteca" /> 
        <meta name="Author" content="Marina Soler Molpeceres" /> 
        <meta name="Locality" content="Madrid, España" /> 
        <meta name="Lang" content="es" /> 
        <meta name="Viewport" content="maximum-scale=10.0" /> 
        <meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
        <meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 

        <link href="<?php echo URL_ROOT; ?>recursos/imagenes/libros/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo URL_ROOT; ?>recursos/imagenes/libros/favicon.ico" rel="icon" type="image/x-icon" /> 

        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/libros/principal.css" />

    </head>

    <body>

        <div id="encabezado" style="background-image: URL('<?php echo URL_ROOT; ?>recursos/imagenes/libros/libros.png')">
            <h1 id="titulo"><?php echo \core\Idioma::text("Libros Leídos", "plantilla_libros"); ?></h1>
        </div>

        <hr width="100%" color="#732615" size="5"/>

        <div id="div_menu" >
                <ul id="menu" class="menu">
                    <a href="<?php echo \core\URL::generar_con_idioma("inicio/index");?>" title="Inicio"><li class="item"><?php echo \core\Idioma::text("Volver", "plantilla_libros"); ?></li></a>
                </ul>
        </div>

        <hr width="100%" color="#732615" size="5"/>

        </br></br>

        <div id="cuerpo">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/libros/leer.png" />
            <?php echo $datos['view_content']; ?>
        </div>

        <hr width="100%" color="#732615" size="5"/>

        <div id="pie" align="center">
            <h2><?php echo \core\Idioma::text("Creado por", "plantilla_principal"); ?> Marina Soler ---- <?php echo \core\Idioma::text("Contacto", "plantilla_principal"); ?>: <a href="mailto:msolermolpeceres@gmail.com">msolermolpeceres@gmail.com</a></h2>
            <h3><?php echo \core\Idioma::text("Creación", "plantilla_principal"); ?>: 29<?php echo \core\Idioma::text("Octubre", "plantilla_principal"); ?>2013.</h3>
            <h3><?php echo \core\Idioma::text("Última Actualización", "plantilla_principal"); ?>: 16<?php echo \core\Idioma::text("Diciembre", "plantilla_principal"); ?>2013.</h3>
        </div>

    </body>

</html>