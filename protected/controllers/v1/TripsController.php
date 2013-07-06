<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-6
 * Time: PM10:10
 * To change this template use File | Settings | File Templates.
 */
class TripsController extends ApiController
{
    public function actionList()
    {
        $rows = Trip::model('Trip')->findColumn('name,fk_user,is_group,created_at');

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $rows,
                'message'   =>      'Get the trips successfully!'
            )
        );
    }
}
