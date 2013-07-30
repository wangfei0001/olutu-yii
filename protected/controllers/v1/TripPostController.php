<?php
/**
 * Created by JetBrains PhpStorm.
 *
 * 某个行程的发布信息，数据在trip_post数据表中，为tripsController的子controller
 *
 * User: wangfei0001
 * Date: 13-7-27
 * Time: PM9:28
 * To change this template use File | Settings | File Templates.
 */
class TripPostController extends ApiController
{

    /***
     * curl  http://olutu-yii/api/v1/trips/1/tripPost
     */
    public function Index()
    {
        $id_trip = $this->id;

        $criteria = new CDbCriteria;

        $criteria->condition = 'fk_trip = ' .$id_trip;

        $posts = TripPostBase::model()->findAll($criteria);

        $result = array();
        foreach($posts as $post){
            $result[] = array(
                'content'   =>  $post['content'],
                'image'     =>  'http://photo.olutu.com/trips/details/1_small.jpg'
            );
        }

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $result,
                'message'   =>      'Get the Post successfully!'
            )
        );
    }


    /***
     * curl -v -H "Authorization: wangfei0001:616682" -d 'email=wangfei001@hotmail.com&username=wangfei0001&password=616682' http://olutu-yii/api/v1/trips/1/tripPost
     */
    public function Create()
    {
        $result = false;

        $model = new TripPost();

        $model->fk_trip = $this->id;

        $model->fk_user = $this->id_user;


        if(isset($_FILES['photo'])){
            $result = true;
        }

//        $model->makeAccess($model->getUploadPath());
//        die();

        $model->uploadFiles($_FILES);

        $this->_sendResponse(
            array(
                'status'    =>      true,
                'data'      =>      $_FILES,
                'message'   =>      'Create the Post successfully!'
            )
        );
    }
}
