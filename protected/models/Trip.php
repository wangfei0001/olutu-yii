<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-6
 * Time: PM10:20
 * To change this template use File | Settings | File Templates.
 */
class Trip extends TripBase
{

    public function behaviors(){
        return array( 'CAdvancedArFindBehavior' => array(
            'class' => 'application.extensions.CAdvancedArFindBehavior'));
    }
}
