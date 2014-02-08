<?php
/**
 * Config list roles
 *
 */
return array(

    // Студент
/*
    Має право перегладати:
    - дані про себе
    - розклад
    - навчальний план
    - пропуски (свої)
    - оцінки (свої)*/
    'student'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Student',
        'bizRule' => null,
        'data' => null,
    ),

    //Викладач
/*
     Має право перегладати:
    - дані про себе
    - розклад
    - оцінки (виставляти та переглядати)
     */
    'teacher'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Teacher',
        'bizRule' => null,
        'data' => null,
    ),
    //
/*
    Має право переглядати:
    - свою групу

     */
    'prefect' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Prefect',
        'bizRule' => null,
        'data' => null
    ),
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'bizRule' => null,
        'data' => null
    ),
    'root' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Root',
        'bizRule' => null,
        'data' => null
    ),
);