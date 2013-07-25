<?php

/**
 * This is the model class for table "airport_code".
 *
 * The followings are the available columns in table 'airport_code':
 * @property string $id_airport_code
 * @property string $name
 * @property string $country_name
 * @property string $fk_country
 * @property string $fk_state
 * @property string $fk_city
 * @property string $code
 */
class AirportCodeBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AirportCodeBase the static model class
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
		return 'airport_code';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, country_name, code', 'required'),
			array('name', 'length', 'max'=>128),
			array('country_name, fk_country, fk_state, fk_city', 'length', 'max'=>20),
			array('code', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_airport_code, name, country_name, fk_country, fk_state, fk_city, code', 'safe', 'on'=>'search'),
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
			'id_airport_code' => 'Id Airport Code',
			'name' => 'Name',
			'country_name' => 'Country Name',
			'fk_country' => 'Fk Country',
			'fk_state' => 'Fk State',
			'fk_city' => 'Fk City',
			'code' => 'Code',
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

		$criteria->compare('id_airport_code',$this->id_airport_code,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('country_name',$this->country_name,true);

		$criteria->compare('fk_country',$this->fk_country,true);

		$criteria->compare('fk_state',$this->fk_state,true);

		$criteria->compare('fk_city',$this->fk_city,true);

		$criteria->compare('code',$this->code,true);

		return new CActiveDataProvider('AirportCodeBase', array(
			'criteria'=>$criteria,
		));
	}
}