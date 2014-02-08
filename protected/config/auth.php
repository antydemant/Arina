<?php
/**
 * Config list roles
 *
 */
return array(

    /**
     *
     */
    'student'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Student',
        'bizRule' => null,
        'data' => null,
    ),

    /**
     *
     */
    'teacher'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Teacher',
        'bizRule' => null,
        'data' => null,
    ),

    /**
     *
     */
    'prefect' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Prefect',
        'bizRule' => null,
        'data' => null
    ),

    /**
     *
     */
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),

    /**
     *
     */
    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'bizRule' => null,
        'data' => null
    ),

    /**
     *
     */
    'root' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Root',
        'bizRule' => null,
        'data' => null
    ),
);