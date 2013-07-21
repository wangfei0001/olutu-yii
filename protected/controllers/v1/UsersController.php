<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 4/07/13
 * Time: 3:05 PM
 * To change this template use File | Settings | File Templates.
 */
class UsersController extends ApiController
{

    public function actionList()
    {

    }

    public function actionView()
    {
    }


    /***
     * curl -d 'email=wangfei001@hotmail.com&username=wangfei0001&password=616682' http://olutu-yii/api/v1/users
     */
    public function actionCreate()
    {
        $user = new User;

        $user->email = $this->getParam('email');
        $user->username = $this->getParam('username');
        $user->lname = $this->getParam('lname');
        $user->fname = $this->getParam('fname');
        $user->password = $this->getParam('password');


        if($user->save()){
            $this->_sendResponse(
                array(
                    'status'    =>      true,
                    'data'      =>      $user->attributes,
                    'message'   =>      'Create account success'
                )
            );

        }else{
            $this->_sendResponse(
                array(
                    'status'    =>      false,
                    'message'   =>      'Could not create account'
                )
            );
        }
    }

    public function actionUpdate()
    {
    }

    public function actionDelete()
    {
    }
}
