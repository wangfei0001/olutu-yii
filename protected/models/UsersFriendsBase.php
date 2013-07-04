<?php

/**
 * This is the model class for table "usersfriends".
 *
 * The followings are the available columns in table 'usersfriends':
 * @property string $id_usersfriends
 * @property string $fk_ufrom
 * @property string $fk_uto
 * @property string $status
 * @property string $updated_at
 * @property string $created_at
 */
class UsersFriendsBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UsersfriendsBase the static model class
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
		return 'usersfriends';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_ufrom, fk_uto, status, updated_at, created_at', 'required'),
			array('fk_ufrom, fk_uto', 'length', 'max'=>20),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usersfriends, fk_ufrom, fk_uto, status, updated_at, created_at', 'safe', 'on'=>'search'),
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
			'id_usersfriends' => 'Id Usersfriends',
			'fk_ufrom' => 'Fk Ufrom',
			'fk_uto' => 'Fk Uto',
			'status' => 'Status',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
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

		$criteria->compare('id_usersfriends',$this->id_usersfriends,true);

		$criteria->compare('fk_ufrom',$this->fk_ufrom,true);

		$criteria->compare('fk_uto',$this->fk_uto,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider('UsersfriendsBase', array(
			'criteria'=>$criteria,
		));
	}
}