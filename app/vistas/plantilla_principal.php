<!DOCTYPE HTML>
<html lang='<?php echo \core\Idioma::get(); ?>'>
    <head>
        <title><?php echo \core\Idioma::text("Title", "plantilla_principal"); ?></title>
        <meta name="Description" content="Página principal del sitio" /> 
        <meta name="Keywords" content="biblioteca, desarrollo, tutorial, android, libro" />  
        <meta name="Author" content="Marina Soler Molpeceres" /> 
        <meta name="Locality" content="Madrid, España" /> 
        <meta name="Lang" content="<?php echo \core\Idioma::get(); ?>" /> 
        <meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 
        <meta http-equiv="Content-Language" content="<?php echo \core\Idioma::get(); ?>"/>

        <link href="<?php echo URL_ROOT; ?>recursos/imagenes/inicio/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo URL_ROOT; ?>recursos/imagenes/inicio/favicon.ico" rel="icon" type="image/x-icon" /> 

        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/inicio/principal.css" />

        <script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/f_cookies_v06.js"></script>
	<script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/idiomas.js"></script>
    </head>

    <body>
        <div id="encabezado">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/inicio/logo.jpg" alt="logo" title="Logo"/>
            <h1 id="titulo"><?php echo \core\Idioma::text("Titulo", "plantilla_principal"); ?></h1>
        </div>
        
        <div id='idiomas'>
			<a  onclick='set_lang("es", "<?php echo \core\URL::generar_sin_idioma("inicio/index"); ?>");' ><img src='<?php echo \core\URL::generar_sin_idioma("recursos/imagenes/idiomas"); ?>flag_es.jpg' height='25px' /><?php echo \core\Idioma::text("Español", "plantilla_principal"); ?></a>
			<a  onclick='set_lang("en", "<?php echo \core\URL::generar_sin_idioma("en/inicio/index"); ?>");'><img src='<?php echo \core\URL::generar_sin_idioma("recursos/imagenes/idiomas"); ?>flag_en.jpg' height='25px' /><?php echo \core\Idioma::text("Inglés", "plantilla_principal"); ?></a>
                        <a  onclick='set_lang("fr", "<?php echo \core\URL::generar_sin_idioma("Fr/inicio/index"); ?>");'><img src='<?php echo \core\URL::generar_sin_idioma("recursos/imagenes/idiomas"); ?>flag_fr.jpg' height='25px' /><?php echo \core\Idioma::text("Francés", "plantilla_principal"); ?></a>
                        <a  onclick='set_lang("it", "<?php echo \core\URL::generar_sin_idioma("it/inicio/index"); ?>");'><img src='<?php echo \core\URL::generar_sin_idioma("recursos/imagenes/idiomas"); ?>flag_it.jpg' height='25px' /><?php echo \core\Idioma::text("Italiano", "plantilla_principal"); ?></a>
	</div>

        <hr width="100%" color="#3e779d" size="5"/>

        <div id="cuerpo" align="center">
            <a href="<?php echo \core\URL::generar_con_idioma("libros/index"); ?>" title="Libros"><button id="biblioteca"><?php echo \core\Idioma::text("Biblioteca", "plantilla_principal"); ?><br><img src="<?php echo URL_ROOT; ?>recursos/imagenes/libros/leer.png" width="27%"/></button></a>
            <a href="<?php echo \core\URL::generar_con_idioma("crocs/index"); ?>" title="Crocs"><button id="crocs">Crocs<br><img src="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/logo.jpg" width="35%"/></button></a>
        </div>

        <hr width="100%" color="#3e779d" size="5"/>

        <div id="pie" align="center">
            <h2><?php echo \core\Idioma::text("Creado por", "plantilla_principal"); ?> Marina Soler ---- <?php echo \core\Idioma::text("Contacto", "plantilla_principal"); ?>: <a href="mailto:msolermolpeceres@gmail.com">msolermolpeceres@gmail.com</a></h2>
            <h3><?php echo \core\Idioma::text("Creación", "plantilla_principal"); ?>: 29<?php echo \core\Idioma::text("Octubre", "plantilla_principal"); ?>2013.</h3>
            <h3><?php echo \core\Idioma::text("Última Actualización", "plantilla_principal"); ?>: 16<?php echo \core\Idioma::text("Diciembre", "plantilla_principal"); ?>2013.</h3>
        </div>

    </body>

</html>
