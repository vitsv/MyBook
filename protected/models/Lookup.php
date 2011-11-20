<?php

/**
 * This is the model class for table "lookup".
 *
 * The followings are the available columns in table 'lookup':
 * @property integer $lookup_id
 * @property string $lookup_name
 * @property integer $lookup_code
 * @property string $lookup_type
 * @property integer $lookup_position
 */
class Lookup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lookup the static model class
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
		return 'lookup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lookup_code, lookup_position', 'required'),
			array('lookup_code, lookup_position', 'numerical', 'integerOnly'=>true),
			array('lookup_name, lookup_type', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lookup_id, lookup_name, lookup_code, lookup_type, lookup_position', 'safe', 'on'=>'search'),
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
			'lookup_id' => 'Lookup',
			'lookup_name' => 'Lookup Name',
			'lookup_code' => 'Lookup Code',
			'lookup_type' => 'Lookup Type',
			'lookup_position' => 'Lookup Position',
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

		$criteria->compare('lookup_id',$this->lookup_id);
		$criteria->compare('lookup_name',$this->lookup_name,true);
		$criteria->compare('lookup_code',$this->lookup_code);
		$criteria->compare('lookup_type',$this->lookup_type,true);
		$criteria->compare('lookup_position',$this->lookup_position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}