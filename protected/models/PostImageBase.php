<?php

/**
 * This is the model class for table "post_image".
 *
 * The followings are the available columns in table 'post_image':
 * @property string $id_post_image
 * @property string $fk_post
 * @property string $fk_image
 * @property string $created_at
 * @property string $updated_at
 */
class PostImageBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PostImageBase the static model class
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
		return 'post_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_post, fk_image, created_at, updated_at', 'required'),
			array('fk_post, fk_image', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_post_image, fk_post, fk_image, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_post_image' => 'Id Post Image',
			'fk_post' => 'Fk Post',
			'fk_image' => 'Fk Image',
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

		$criteria->compare('id_post_image',$this->id_post_image,true);

		$criteria->compare('fk_post',$this->fk_post,true);

		$criteria->compare('fk_image',$this->fk_image,true);

		$criteria->compare('created_at',$this->created_at,true);

		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider('PostImageBase', array(
			'criteria'=>$criteria,
		));
	}
}