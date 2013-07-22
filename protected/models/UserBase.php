<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id_user
 * @property string $username
 * @property integer $gender
 * @property string $password
 * @property string $secret_access_key
 * @property string $access_key_id
 * @property string $email
 * @property string $lname
 * @property string $fname
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class UserBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, secret_access_key, access_key_id, email, status, created_at, updated_at', 'required'),
			array('gender', 'numerical', 'integerOnly'=>true),
			array('username, email', 'length', 'max'=>255),
			array('password, lname, fname', 'length', 'max'=>128),
			array('secret_access_key, access_key_id', 'length', 'max'=>64),
			array('status', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, username, gender, password, secret_access_key, access_key_id, email, lname, fname, status, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'username' => 'Username',
			'gender' => 'Gender',
			'password' => 'Password',
			'secret_access_key' => 'Secret Access Key',
			'access_key_id' => 'Access Key',
			'email' => 'Email',
			'lname' => 'Lname',
			'fname' => 'Fname',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user,true);

		$criteria->compare('username',$this->username,true);

		$criteria->compare('gender',$this->gender);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('secret_access_key',$this->secret_access_key,true);

		$criteria->compare('access_key_id',$this->access_key_id,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('lname',$this->lname,true);

		$criteria->compare('fname',$this->fname,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('UserBase', array(
			'criteria'=>$criteria,
		));
	}
}