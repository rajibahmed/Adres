<?php

    Router::parseExtensions('xml','json');
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */

    #Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

    Router::connect('/register', array('controller' => 'user', 'action' => 'register'));

    Router::connect('/login', array('controller' => 'users', 'action' => 'login'));

    Router::connect('/', array('controller' => 'users', 'action' => 'register' ));



/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
    #Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>
