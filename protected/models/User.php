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
            array('username, email, lname, fname', 'required'),
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
//    public function save()
//    {
//        $oldUser = self::model()->find('email=:email', array(':email'=>$this->email));
//        if(!empty($oldUser)){
//            return false;
//        }
//        return parent::save();
//    }
}
