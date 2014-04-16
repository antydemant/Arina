<?php
/**
 * My local cofigurations
 */
return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=app',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
    ),
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'serhiyvinichuk@gmail.com',
    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'root',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => false,
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),

    ),
);
?>