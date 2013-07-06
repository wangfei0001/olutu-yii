<?php

/**
 * This is the model class for table "trip_image".
 *
 * The followings are the available columns in table 'trip_image':
 * @property string $id_trip_image
 * @property double $lat
 * @property double $lng
 * @property string $image_type
 * @property string $path
 * @property integer $width
 * @property integer $height
 * @property string $filename
 * @property integer $thumb_width
 * @property integer $thumb_height
 */
class TripImageBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TripImageBase the static model class
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
		return 'trip_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('width, height, thumb_width, thumb_height', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'numerical'),
			array('image_type', 'length', 'max'=>4),
			array('path', 'length', 'max'=>1024),
			array('filename', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_trip_image, lat, lng, image_type, path, width, height, filename, thumb_width, thumb_height', 'safe', 'on'=>'search'),
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
			'id_trip_image' => 'Id Trip Image',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'image_type' => 'Image Type',
			'path' => 'Path',
			'width' => 'Width',
			'height' => 'Height',
			'filename' => 'Filename',
			'thumb_width' => 'Thumb Width',
			'thumb_height' => 'Thumb Height',
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

		$criteria->compare('id_trip_image',$this->id_trip_image,true);

		$criteria->compare('lat',$this->lat);

		$criteria->compare('lng',$this->lng);

		$criteria->compare('image_type',$this->image_type,true);

		$criteria->compare('path',$this->path,true);

		$criteria->compare('width',$this->width);

		$criteria->compare('height',$this->height);

		$criteria->compare('filename',$this->filename,true);

		$criteria->compare('thumb_width',$this->thumb_width);

		$criteria->compare('thumb_height',$this->thumb_height);

		return new CActiveDataProvider('TripImageBase', array(
			'criteria'=>$criteria,
		));
	}
}