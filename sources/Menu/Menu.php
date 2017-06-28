<?php

/**
 * @brief       Menu Node
 * @author      -storm_author-
 * @copyright   -storm_copyright-
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       -storm_since_version-
 * @version     -storm_version-
 */

namespace IPS\storm;

if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] :
            'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Menu extends \IPS\Node\Model 
{
    /**
     * @brief    [ActiveRecord] Multiton Store
     */
    protected static $multitons;

    /**
     * @brief    [ActiveRecord] Default Values
     */
    protected static $defaultValues = null;

    /**
     * @brief    [ActiveRecord] Database Table
     */
    public static $databaseTable = 'storm_menu';

    /**
     * @brief    [ActiveRecord] Database Prefix
     */
    public static $databasePrefix = 'menu_';

    /**
     * @brief    [ActiveRecord] ID Database Column
     */
    public static $databaseColumnId = 'id';

    /**
     * @brief    [ActiveRecord] Database ID Fields
     */
    protected static $databaseIdFields = [ 'menu_id' ];

    /**
     * @brief    [Node] Order Database Column
     */
    public static $databaseColumnOrder = 'order';

    /**
     * @brief    [Node] Parent ID Database Column
     */
    public static $databaseColumnParent = 'parent';

    /**
     * @brief   [Node] Parent ID Root Value
     * @note    This normally doesn't need changing though some legacy areas use -1 to indicate a root node
     */
    public static $databaseColumnParentRootValue = 0;

    /**
     * @brief    [Node] Enabled/Disabled Column
     */
    public static $databaseColumnEnabledDisabled = null;

    /**
     * @brief    [Node] Show forms modally?
     */
    public static $modalForms = false;

    /**
     * @brief    [Node] Node Title
     */
    public static $nodeTitle = 'Menu';

    /**
     * @brief    [Node] ACP Restrictions
     * @code
    array(
     * 'app'        => 'core',                // The application key which holds the restrictrions
     * 'module'    => 'foo',                // The module key which holds the restrictions
     * 'map'        => array(                // [Optional] The key for each restriction - can alternatively use "prefix"
     * 'add'            => 'foo_add',
     * 'edit'            => 'foo_edit',
     * 'permissions'    => 'foo_perms',
     * 'delete'        => 'foo_delete'
     * ),
     * 'all'        => 'foo_manage',        // [Optional] The key to use for any restriction not provided in the map (only needed if not providing all 4)
     * 'prefix'    => 'foo_',                // [Optional] Rather than specifying each  key in the map, you can specify a prefix, and it will automatically look for restrictions with the key "[prefix]_add/edit/permissions/delete"
     * @encode
     */
    protected static $restrictions = array(
        'app' => 'storm',
        'module' => 'menu',
        'prefix' => 'menu_'
    );

    /**
     * @brief    [Node] App for permission index
     */
    public static $permApp = 'storm';

    /**
     * @brief    [Node] Type for permission index
     */
    public static $permType = 'menu';

    /**
     * @brief    The map of permission columns
     */
    public static $permissionMap = array(
        'view' => 'view'
    );

    /**
     * @brief    Bitwise values for members_bitoptions field
     */
    public static $bitOptions = array(
        'bitoptions' => array(
            'bitoptions' => array()
        )
    );

    /**
     * @brief    Cached URL
     */
    protected $_url = null;

    /**
     * get title
     */
    public function get__title(){
        return $this->name;
    }

    /**
     * [Node] Add/Edit Form
     *
     * @param    \IPS\Helpers\Form $form The form
     * @return    void
     */
    public function form( &$form )
    {
        $form = \IPS\storm\Forms::i($this->elements(), $this,null, $form);
    }

    public function elements(){

        $el['prefix'] = 'storm_menu_';
        $el[] = [
            'name' => 'name',
            'required' => true
        ];

        $el[] = [
            'name' => 'parent',
            'class' => 'node',
            'default' => \IPS\Request::i()->parent ?: $this->parent,
            'options' => [
                'class' => 'IPS\storm\Menu'
            ]
        ];

        $el[] = [
            'name' => 'type',
            'class' => 'Select',
            'required' => true,
            'options' => [
                'options' => [
                    0 => 'Select a Type',
                    'int' => 'Internal',
                    'ext' => 'External'
                ],
                'toggles' => [
                    'int' => ['internal'],
                    'ext' => ['external']
                ]
            ]
        ];


        $el[] = [
            'name' => 'internal',
            'required' => true,
            'def' => $this->url
        ];

        $el[] = [
            'name' => 'external',
            'class' => 'url',
            'required' => true,
            'def' => $this->url
        ];

        return $el;
    }

    /**
     * [Node] Format form values from add/edit form for save
     *
     * @param    array $values Values from the form
     * @return    array
     */
    public function formatFormValues( $values )
    {
        $new = [];

        foreach( $values as $key => $val ){
            $key = str_replace( 'storm_menu_', '', $key );
            $new[$key] = $val;
        }

//        echo "<pre>";
//        print_r($new);exit;

        if( $new['parent'] instanceof \IPS\storm\Menu ){
            $new['parent'] = $new['parent']->id;
        }
        else{
            $new['parent'] = 0;
        }

        if(  $new['type'] == 'int' ){
            $new['url'] = $new['internal'];
        }
        else{
            $new['url'] = $new['external'];
        }

        unset( $new['internal'] );
        unset( $new['external'] );

        return $new;
    }

    /**
     * [Node] Save Add/Edit Form
     *
     * @param    array $values Values from the form
     * @return    void
     */
    public function saveForm( $values )
    {
        parent::saveForm( $values );
    }

    protected function returnData(){
        return $this->_data;
    }

    public static function kerching(){
        $sql = \IPS\Db::i()->select( '*', 'storm_menu' );
        $menus = new \IPS\Patterns\ActiveRecordIterator( $sql, 'IPS\storm\Menu');
        $store = [];
        foreach( $menus as $menu ){
            $store[ $menu->parent ][] = $menu->returnData();
        }
        unset( \IPS\Data\Store::i()->storm_menu );
        \IPS\Data\Store::i()->storm_menu = $store;
    }

    public function save(){
        parent::save();
        static::kerching();
    }
}