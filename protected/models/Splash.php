<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-5
 * Time: PM10:01
 * To change this template use File | Settings | File Templates.
 */
class Splash extends SplashBase
{
    public function behaviors(){
        return array( 'CAdvancedArFindBehavior' => array(
            'class' => 'application.extensions.CAdvancedArFindBehavior'));
    }



//    static public function getAll($columns)
//    {
//        $criteria = $this->owner->getCommandBuilder()->createCriteria($condition,$params);
//        $tableSchema = Model::model()->getTableSchema();
//        $command = Model::model()->getCommandBuilder()->createFindCommand($tableSchema, $criteria);
//        $data = $command->queryAll(); //we get array of arrays
//    }
}
