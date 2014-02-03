<!DOCTYPE HTML>
<html>
    <head>
        <title>Desarrollo de Aplicaciones</title>
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

        <script src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/f_cookies_v06.js"></script>
        <script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/idiomas.js"></script>
        <script type="text/javascript" src="<?php echo \core\URL::generar_sin_idioma(); ?>recursos/js/general.js"></script>
    </head>

    <body>
        
        <div id="encabezado">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/inicio/logo.jpg" alt="logo" title="Logo"/>
            <h1 id="titulo">MVC - Marina Soler Molpeceres</h1>
        </div>

        <hr width="100%" color="#3e779d" size="5"/>

        <div id="cuerpo" align="center">
            <a href="<?php echo \core\URL::generar("crocs/index"); ?>" title="Crocs"><button id="crocs">Crocs<br><img src="<?php echo URL_ROOT; ?>recursos/imagenes/crocs/logo.jpg" width="70%"/></button></a>
        </div>

        <hr width="100%" color="#3e779d" size="5"/>

        <div style="width: 65%; text-align: left; margin-left: 15px;" align="center">
            
            <h2><b>Introducción</b></h2>
            <p>
                De la lectura de http://en.wikipedia.org/wiki/Create,_read,_update_and_delete<br>
                <i>In Database applications, the acronym CRUD refers to all of the major functions that are
                implemented in relational database applications. Each letter in the acronym can map to a
                standard SQL statement and HTTP method:</i><br>
            <table border="1">
                <thead>
                    <tr>
                        <th>Operation</th>
                        <th>SQL</th>
                        <th>HTTP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Create</td>
                        <td>INSERT</td>
                        <td>PUT / POST</td>
                    </tr>
                    <tr>
                        <td>Read (Retrieve)</td>
                        <td>SELECT</td>
                        <td>GET</td>
                    </tr>
                    <tr>
                        <td>Update (Modif.)</td>
                        <td>UPDATE</td>
                        <td>PUT / PATCH</td>
                    </tr>
                    <tr>
                        <td>Delete (Destroy)</td>
                        <td>DELETE</td>
                        <td>DELETE</td>
                    </tr>
                </tbody>
            </table><br>
                Hasta ahora ya somos capaces de manejar todos los comandos SQL y también de enviar peticiones
                HTTP al servidor utilizando comandos POST y GET.
            </p>
            <h2><b>Objetivo</b></h2>
            <p>
                Hacer el mantenimiento (altas, bajas, consultas y modificaciones de filas) de una tabla de datos
                alojada en mysql con ayuda de una aplicación web escrita en php siguiendo el modelo vista
                controlador.
            </p>
        </div>

        <hr width="100%" color="#3e779d" size="5"/>

        <div id="pie" align="center">
            <h2>Creado por: Marina Soler ---- Contacto: <a href="mailto:msolermolpeceres@gmail.com">msolermolpeceres@gmail.com</a></h2>
            <h3>Creación: 29 de Octubre de 2013.</h3>
            <h3>Última Actualización: 03 de Febrero de 2013.</h3>
        </div>

    </body>

</html>
