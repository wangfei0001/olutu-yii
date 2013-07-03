<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 3/07/13
 * Time: 5:15 PM
 * To change this template use File | Settings | File Templates.
 */
//http://www.yiiframework.com/wiki/175/how-to-create-a-rest-api/
class ApiController extends CController
{
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers
     */
    Const APPLICATION_ID = 'ASCCPE';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

    // Actions
    public function actionList()
    {
    }

    public function actionView()
    {
    }

    public function actionCreate()
    {
    }

    public function actionUpdate()
    {
    }

    public function actionDelete()
    {
    }
}
