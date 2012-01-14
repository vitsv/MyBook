<?php

/**
 * This is the model class for table "book_content".
 *
 * The followings are the available columns in table 'book_content':
 * @property integer $book_id
 * @property string $book_text
 * @property integer $book_page_nr
 * @property integer $belong_to
 */
class BookContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BookContent the static model class
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
		return 'book_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('book_id, book_page_nr, belong_to', 'required'),
			array('book_id, book_page_nr, belong_to', 'numerical', 'integerOnly'=>true),
			array('book_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('book_id, book_text, book_page_nr, belong_to', 'safe', 'on'=>'search'),
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
			'book_id' => 'Book',
			'book_text' => 'Book Text',
			'book_page_nr' => 'Book Page Nr',
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

		$criteria->compare('book_id',$this->book_id);
		$criteria->compare('book_text',$this->book_text,true);
		$criteria->compare('book_page_nr',$this->book_page_nr);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}