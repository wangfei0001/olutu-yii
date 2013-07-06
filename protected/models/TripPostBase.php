<?php

/**
 * This is the model class for table "trip_post".
 *
 * The followings are the available columns in table 'trip_post':
 * @property string $id_trip_post
 * @property string $fk_trip
 * @property string $fk_user
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class TripPostBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TripPostBase the static model class
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
		return 'trip_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_trip, fk_user, created_at', 'required'),
			array('fk_trip, fk_user', 'length', 'max'=>20),
			array('content', 'length', 'max'=>1024),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_trip_post, fk_trip, fk_user, content, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_trip_post' => 'Id Trip Post',
			'fk_trip' => 'Fk Trip',
			'fk_user' => 'Fk User',
			'content' => 'Content',
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

		$criteria->compare('id_trip_post',$this->id_trip_post,true);

		$criteria->compare('fk_trip',$this->fk_trip,true);

		$criteria->compare('fk_user',$this->fk_user,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('TripPostBase', array(
			'criteria'=>$criteria,
		));
	}
}