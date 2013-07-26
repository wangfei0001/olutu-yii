<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-25
 * Time: PM10:41
 * To change this template use File | Settings | File Templates.
 */
class TripPlanController extends ApiController
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
     * url  http://olutu-yii/api/v1/users/18/tripPlan
     */
    public function Index()
    {
        $plans = TripPlanBase::model()->findAll('fk_user = :fk_user', array('fk_user' => $this->id));

        $return = array();
        foreach($plans as $plan){
            $return[] = array(
                'title' => $plan->title,
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
