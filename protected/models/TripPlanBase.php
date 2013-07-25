<?php

/**
 * This is the model class for table "trip_plan".
 *
 * The followings are the available columns in table 'trip_plan':
 * @property string $id_trip_plan
 * @property string $fk_country
 * @property string $fk_state
 * @property string $fk_city
 * @property string $date
 * @property string $title
 * @property string $fk_user
 * @property string $created_at
 * @property string $updated_at
 */
class TripPlanBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TripPlanBase the static model class
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
		return 'trip_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, fk_user, created_at, updated_at', 'required'),
			array('fk_country, fk_state, fk_city, fk_user', 'length', 'max'=>20),
			array('title', 'length', 'max'=>128),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_trip_plan, fk_country, fk_state, fk_city, date, title, fk_user, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_trip_plan' => 'Id Trip Plan',
			'fk_country' => 'Fk Country',
			'fk_state' => 'Fk State',
			'fk_city' => 'Fk City',
			'date' => 'Date',
			'title' => 'Title',
			'fk_user' => 'Fk User',
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

		$criteria->compare('id_trip_plan',$this->id_trip_plan,true);

		$criteria->compare('fk_country',$this->fk_country,true);

		$criteria->compare('fk_state',$this->fk_state,true);

		$criteria->compare('fk_city',$this->fk_city,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('fk_user',$this->fk_user,true);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('TripPlanBase', array(
			'criteria'=>$criteria,
		));
	}
}