<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-5
 * Time: PM9:58
 * To change this template use File | Settings | File Templates.
 */
class SplashController extends ApiController
{
    public function actionList()
    {
        $rows = Splash::model('Splash')->findColumn('url,image_type,duration');

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $rows,
                'message'   =>      'Get the splash images successfully!'
            )
        );
    }
}
