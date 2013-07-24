<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-23
 * Time: PM11:00
 * To change this template use File | Settings | File Templates.
 */
class PlanTypeController extends ApiController
{

    /***
     * curl  http://olutu-yii/api/v1/planType
     */
    public function Index()
    {
        $trips = PlanTypeBase::model()->findAll(array('order'=>'odr'));
        $result = array();
        foreach($trips as $key => $val){
            $result[] = $val->attributes;
        }

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $result,
                'message'   =>      'Get the Plan Type successfully!'
            )
        );
    }
}
