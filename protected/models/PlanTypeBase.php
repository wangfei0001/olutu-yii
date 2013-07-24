<?php

/**
 * This is the model class for table "plan_type".
 *
 * The followings are the available columns in table 'plan_type':
 * @property string $id_plan_type
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $odr
 * @property string $created_at
 */
class PlanTypeBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PlanType the static model class
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
		return 'plan_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, image, created_at', 'required'),
			array('odr', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('description', 'length', 'max'=>128),
			array('image', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_plan_type, name, description, image, odr, created_at', 'safe', 'on'=>'search'),
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
			'id_plan_type' => 'Id Plan Type',
			'name' => 'Name',
			'description' => 'Description',
			'image' => 'Image',
			'odr' => 'Odr',
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

		$criteria->compare('id_plan_type',$this->id_plan_type,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('image',$this->image,true);

		$criteria->compare('odr',$this->odr);

		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider('PlanType', array(
			'criteria'=>$criteria,
		));
	}
}