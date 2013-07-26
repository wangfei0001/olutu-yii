<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-26
 * Time: PM9:56
 * To change this template use File | Settings | File Templates.
 */
class MyTripController extends ApiController
{
    /***
     *
     */
    public function init()
    {
        parent::init();

        /***
         * Validate the user and the owner
         */
        User::validateUser($this->id, $this->id_user);
    }



    /***
     * curl -G -d "is_plan=1" http://olutu-yii/api/v1/users/18/myTrip
     */
    public function Index()
    {
        $is_plan = $this->getParam('is_plan');

        if($is_plan != 1) $is_plan = 0;

        $criteria = new CDbCriteria;
        $criteria->addCondition('is_plan = ' .$is_plan);
        $criteria->addCondition('fk_user = ' .$this->id);


        $trips = Trip::model('Trip')->findAll($criteria);

        $return = array();
        foreach($trips as $trip){
            $return[] = array(
                'title' => $trip->name,
                'image' => 'http://olutu-yii/uploads/covers/AU.1.120X90.jpg'
            );
        }


        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $return,
                'message'   =>      'Get the plan successfully!'
            )
        );
    }
}
