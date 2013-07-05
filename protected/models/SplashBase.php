<?php

/**
 * This is the model class for table "splash".
 *
 * The followings are the available columns in table 'splash':
 * @property string $id_splash
 * @property string $image_type
 * @property string $url
 * @property double $duration
 * @property string $start_at
 * @property string $end_at
 * @property string $created_at
 * @property string $updated_at
 */
class SplashBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SplashBase the static model class
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
		return 'splash';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, updated_at', 'required'),
			array('duration', 'numerical'),
			array('image_type', 'length', 'max'=>4),
			array('url', 'length', 'max'=>255),
			array('start_at, end_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_splash, image_type, url, duration, start_at, end_at, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_splash' => 'Id Splash',
			'image_type' => 'Image Type',
			'url' => 'Url',
			'duration' => 'Duration',
			'start_at' => 'Start At',
			'end_at' => 'End At',
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

		$criteria->compare('id_splash',$this->id_splash,true);

		$criteria->compare('image_type',$this->image_type,true);

		$criteria->compare('url',$this->url,true);

		$criteria->compare('duration',$this->duration);

		$criteria->compare('start_at',$this->start_at,true);

		$criteria->compare('end_at',$this->end_at,true);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('SplashBase', array(
			'criteria'=>$criteria,
		));
	}
}