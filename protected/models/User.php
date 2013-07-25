<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 4/07/13
 * Time: 5:00 PM
 * To change this template use File | Settings | File Templates.
 */
class User extends UserBase
{
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, email, password, secret_access_key, access_key_id', 'required'),
            array('username, email', 'length', 'max'=>255),
            array('lname, fname', 'length', 'max'=>128),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_user, username, email, lname, fname, created_at, updated_at', 'safe', 'on'=>'search'),
        );
    }

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created_at',
                'updateAttribute' => 'updated_at',
            )
        );
    }



    /***
     * @return bool
     */
    public function save($runValidation = true, $attributes = NULL)
    {
        if($this->isNewRecord){ //generate the access key
            $this->access_key_id = 'key_id';        //should be changed.
            $this->secret_access_key = 'access_key';
        }

        $oldUser = self::model()->find('email=:email', array(':email'=>$this->email));
        if(!empty($oldUser)){
            return false;
        }
        return parent::save();
    }


    /***
     * Validate the user
     *
     * @param $uid
     * @param null $ownerid
     * @throws Exception
     */
    public static function validateUser($uid, $ownerid = null)
    {
        $user = self::model('User')->find('id_user = :id_user', array('id_user'=>$uid));
        if(!$user){
            throw new Exception('User [' .$uid .'] can not be found!');
        }
        if($ownerid){
            if($uid != $ownerid){
                throw new Exception('No permission!');
            }
        }
    }
}
