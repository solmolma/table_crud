<!DOCTYPE HTML>
<html>
    <head>
        <title>Crocs España</title>
        <meta name="Description" content="Página en la que se muestran el listado de crocs" /> 
        <meta name="Keywords" content="crocs, zapatos, comodo" /> 
        <meta name="Author" content="Marina Soler Molpeceres" /> 
        <meta name="Locality" content="Madrid, España" /> 
        <meta name="Lang" content="es" /> 
        <meta name="Viewport" content="maximum-scale=10.0" /> 
        <meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
        <meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 

        <link href="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/favicon.ico" rel="icon" type="image/x-icon" /> 

        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/crocs/principal.css" />

        <script src="<?php echo \core\URL::generar(); ?>recursos/js/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo \core\URL::generar(); ?>recursos/js/f_cookies_v06.js"></script>
	<script type="text/javascript" src="<?php echo \core\URL::generar(); ?>recursos/js/idiomas.js"></script>
        <script type="text/javascript" src="<?php echo \core\URL::generar(); ?>recursos/js/general.js"></script>
        
    </head>

    <body>

        <div id="encabezado">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/banner.jpg"/>
        </div>

        <hr width="100%" color="#57d966" size="5"/>

        <div id="div_menu" >
                <ul id="menu" class="menu">
                    <a href="<?php echo \core\URL::generar("inicio/index");?>" title="Inicio"><li class="item">Volver a la página principal</li></a>
                    <li><img src="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/zapatos.jpg"/></li>
                </ul>
        </div>

        <hr width="100%" color="#57d966" size="5"/>

        </br></br>

        <div id="cuerpo">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/mascota.jpg" />
            <?php echo $datos['view_content']; ?>
        </div>

        <hr width="100%" color="#57d966" size="5"/>

        <div id="pie" align="center">
            <h2>Creado por: Marina Soler ---- Contacto: <a href="mailto:msolermolpeceres@gmail.com">msolermolpeceres@gmail.com</a></h2>
            <h3>Creación: 27 de Enero de 2013.</h3>
            <h3>Última Actualización: 03 de Febrero de 2013.</h3>
        </div>

        
        <?php echo \core\HTML_Tag::post_request_form(); ?>
        
        
    </body>

</html>