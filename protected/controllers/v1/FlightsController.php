<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-26
 * Time: PM11:41
 * To change this template use File | Settings | File Templates.
 */
class FlightsController extends ApiController
{


    /***
     * curl  http://olutu-yii/api/v1/flights
     */
    public function Index()
    {
        $criteria = new CDbCriteria;
        $criteria->select = array('name,price');

        $flights = FlightBase::model()->findAll($criteria);

        $result = array();

        foreach($flights as $flight){
            $result[] = array(
                'name'  =>  $flight->name,
                'price' =>  $flight->price,
                'image' => 'http://olutu-yii/uploads/covers/AU.1.120X90.jpg'
            );
        }

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $result,
                'message'   =>      'Get the splash images successfully!'
            )
        );
    }

}
