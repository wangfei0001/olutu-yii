<?php

/**
 * This is the model class for table "info_flights".
 *
 * The followings are the available columns in table 'info_flights':
 * @property string $id_info_flight
 * @property string $name
 * @property string $description
 * @property string $fk_city_src
 * @property string $fk_city_dst
 * @property string $fk_airport_src
 * @property string $fk_airport_dst
 * @property string $valid_from
 * @property string $valid_to
 * @property string $departure_time
 * @property string $arrivial_time
 * @property integer $is_time_change
 * @property string $image
 * @property string $fk_merchant
 * @property double $price
 * @property double $market_price
 * @property string $created_at
 * @property string $updated_at
 */
class FlightBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FlightBase the static model class
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
		return 'info_flights';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, fk_merchant, price, created_at, updated_at', 'required'),
			array('is_time_change', 'numerical', 'integerOnly'=>true),
			array('price, market_price', 'numerical'),
			array('name, image', 'length', 'max'=>255),
			array('description', 'length', 'max'=>1024),
			array('fk_city_src, fk_city_dst, fk_airport_src, fk_airport_dst, fk_merchant', 'length', 'max'=>20),
			array('valid_from, valid_to, departure_time, arrivial_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_info_flight, name, description, fk_city_src, fk_city_dst, fk_airport_src, fk_airport_dst, valid_from, valid_to, departure_time, arrivial_time, is_time_change, image, fk_merchant, price, market_price, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_info_flight' => 'Id Info Flight',
			'name' => 'Name',
			'description' => 'Description',
			'fk_city_src' => 'Fk City Src',
			'fk_city_dst' => 'Fk City Dst',
			'fk_airport_src' => 'Fk Airport Src',
			'fk_airport_dst' => 'Fk Airport Dst',
			'valid_from' => 'Valid From',
			'valid_to' => 'Valid To',
			'departure_time' => 'Departure Time',
			'arrivial_time' => 'Arrivial Time',
			'is_time_change' => 'Is Time Change',
			'image' => 'Image',
			'fk_merchant' => 'Fk Merchant',
			'price' => 'Price',
			'market_price' => 'Market Price',
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

		$criteria->compare('id_info_flight',$this->id_info_flight,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('fk_city_src',$this->fk_city_src,true);

		$criteria->compare('fk_city_dst',$this->fk_city_dst,true);

		$criteria->compare('fk_airport_src',$this->fk_airport_src,true);

		$criteria->compare('fk_airport_dst',$this->fk_airport_dst,true);

		$criteria->compare('valid_from',$this->valid_from,true);

		$criteria->compare('valid_to',$this->valid_to,true);

		$criteria->compare('departure_time',$this->departure_time,true);

		$criteria->compare('arrivial_time',$this->arrivial_time,true);

		$criteria->compare('is_time_change',$this->is_time_change);

		$criteria->compare('image',$this->image,true);

		$criteria->compare('fk_merchant',$this->fk_merchant,true);

		$criteria->compare('price',$this->price);

		$criteria->compare('market_price',$this->market_price);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('FlightBase', array(
			'criteria'=>$criteria,
		));
	}
}