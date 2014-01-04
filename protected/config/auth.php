<?php
/**
 * Config list roles
 *
 * @category  common
 * @package   common.config
 * @author Vadim Poplavskiy <im@demetrodon.com>
 * @copyright 2013 WAO Group
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'private-person' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Private person',
        'bizRule' => null,
        'data' => null
    ),
    'dealer' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Dealer',
        'bizRule' => null,
        'data' => null
    ),
    'specialist' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Specialist',
        'bizRule' => null,
        'data' => null
    ),
    'manager' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',
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