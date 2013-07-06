<?php

/**
 * This is the model class for table "trips".
 *
 * The followings are the available columns in table 'trips':
 * @property string $id_trip
 * @property string $name
 * @property string $fk_user
 * @property integer $is_group
 * @property string $created_at
 * @property string $updated_at
 */
class TripBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TripBase the static model class
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
		return 'trips';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_user, created_at', 'required'),
			array('is_group', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('fk_user', 'length', 'max'=>20),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_trip, name, fk_user, is_group, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_trip' => 'Id Trip',
			'name' => 'Name',
			'fk_user' => 'Fk User',
			'is_group' => 'Is Group',
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

		$criteria->compare('id_trip',$this->id_trip,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('fk_user',$this->fk_user,true);

		$criteria->compare('is_group',$this->is_group);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('TripBase', array(
			'criteria'=>$criteria,
		));
	}
}