<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-21
 * Time: PM3:41
 * To change this template use File | Settings | File Templates.
 */
class LoginController extends ApiController
{

    /***
     * curl -v -d "" -H "Authorization: wangfei0001:616682" http://olutu-yii/api/v1/login
     *
     * @param null $id
     */
    public function Create()
    {

        $response = array(
            'status'    =>      false,
        );

        //We will return a user id with token
        if(!$this->id_user){
            $response['message']    =       '用户不存在';
        }else{
            $user = User::model('User')->findByPk($this->id_user);

            $response['status'] = true;
            //generate token and send to client
            //$user->generateToken();
            $response['data'] = $user->attributes;
            $response['message'] = '登录成功';

        }

        $this->_sendResponse($response);
    }


    /***
     * curl -v -H "Authorization: wangfei0001:616682" -X DELETE http://olutu-yii/api/v1/login
     */
    public function Delete()
    {
        $id = $this->getParam('id');

        $response = array(
            'status'    =>      false,
        );

        if($this->id_user == $id){

            $user = User::model('User')->findByPk($id);

            if(!$user){
                $response['message'] = '用户不存在';
            }else{
                $response['status'] = true;
                $response['message'] = '退出成功';
            }
        }else{
            throw new Exception('没有操作权限');
        }
        $this->_sendResponse($response);
    }



}
