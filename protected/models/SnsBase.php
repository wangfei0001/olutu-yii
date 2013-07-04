<?php

/**
 * This is the model class for table "sns".
 *
 * The followings are the available columns in table 'sns':
 * @property integer $id_sns
 * @property string $fk_user
 * @property string $type
 * @property string $account
 * @property string $created_at
 */
class SnsBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SnsBase the static model class
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
		return 'sns';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sns, type, account, created_at', 'required'),
			array('id_sns', 'numerical', 'integerOnly'=>true),
			array('fk_user', 'length', 'max'=>20),
			array('type', 'length', 'max'=>8),
			array('account', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sns, fk_user, type, account, created_at', 'safe', 'on'=>'search'),
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
			'id_sns' => 'Id Sns',
			'fk_user' => 'Fk User',
			'type' => 'Type',
			'account' => 'Account',
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

		$criteria->compare('id_sns',$this->id_sns);

		$criteria->compare('fk_user',$this->fk_user,true);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('account',$this->account,true);

		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider('SnsBase', array(
			'criteria'=>$criteria,
		));
	}
}