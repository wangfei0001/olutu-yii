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
        $rows = Trip::model('Trip')->findColumn('name,fk_user,is_group,created_at,fk_default_image');

        foreach($rows as &$row){
            if($row['fk_default_image'] != 0){
                $image = TripImage::model()->find('id_trip_image = :id_trip_image', array(':id_trip_image' => $row['fk_default_image']));
                $row['image'] = $image->path;
                $row['height'] = $image->thumb_height;
            }

        }

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $rows,
                'message'   =>      'Get the trips successfully!'
            )
        );
    }
}
