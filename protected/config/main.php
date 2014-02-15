<?php
/**
 *
 */
return CMap::mergeArray(
    array(
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'ХПК АСУ',
        'theme' => 'booster',
        // preloading 'log' component
        'preload' => array(
            //'log',
            'booster',
        ),
        'language' => 'uk',
        //
        'aliases' => array(
            'bootstrap' => 'ext.yiibooster',
        ),
        // autoloading model and component classes
        'import' => array(
            'application.models.*',
            'application.components.*',
            'application.extensions.*',
            'application.extensions.yiibooster.components.*'
        ),

        'modules' => array(
            'studyPlan'
        ),


        // application components
        'components' => array(
            'user' => array(
                // enable cookie-based authentication
                'class' => 'WebUser',
                'allowAutoLogin' => true,
                'loginUrl' => '/user/login',
            ),

            /*     'authManager' => array(
                     'class' => 'PhpAuthManager',
                     'defaultRoles' => array('guest'),
                 ),*/

            'bootstrap' => array(
                'class' => 'ext.yiibooster.components.Bootstrap',
                'responsiveCss' => true,
                'coreCss' => false,
            ),
            // uncomment the following to enable URLs in path-format

            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'caseSensitive' => true,
                'rules' => array(
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    '<module:\w+>/<controller:w+>/<action:\w+>/<id:d+>' => '<module:\w+>/<controller>/<action>',
                ),
            ),
            'errorHandler' => array(
                // use 'site/error' action to display errors
                'errorAction' => 'site/error',
            ),
            /*'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                    // uncomment the following to show log messages on web pages

                    array(
                        'class'=>'CWebLogRoute',
                    ),

                ),
            ),*/
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params' => array( // this is used in contact page
        ),
    ),
    require(__DIR__ . '/env/dev.php')
);
?>