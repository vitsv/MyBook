<?php

/**
 * This is the model class for table "Author".
 *
 * The followings are the available columns in table 'Author':
 * @property integer $author_id
 * @property string $author_first_name
 * @property string $author_last_name
 * @property string $author_birth_date
 * @property string $author_death_date
 * @property string $author_description
 * @property string $author_email
 * @property string $author_url
 *
 * The followings are the available model relations:
 * @property Book[] $books
 */
class Author extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Author the static model class
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
		return 'Author';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_first_name', 'required'),
			array('author_first_name, author_last_name', 'length', 'max'=>50),
			array('author_email, author_url', 'length', 'max'=>120),
			array('author_birth_date, author_death_date, author_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('author_id, author_first_name, author_last_name, author_birth_date, author_death_date, author_description, author_email, author_url', 'safe', 'on'=>'search'),
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
			'books' => array(self::HAS_MANY, 'Book', 'book_author'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'author_id' => 'Author',
			'author_first_name' => 'Author First Name',
			'author_last_name' => 'Author Last Name',
			'author_birth_date' => 'Author Birth Date',
			'author_death_date' => 'Author Death Date',
			'author_description' => 'Author Description',
			'author_email' => 'Author Email',
			'author_url' => 'Author Url',
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

		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('author_first_name',$this->author_first_name,true);
		$criteria->compare('author_last_name',$this->author_last_name,true);
		$criteria->compare('author_birth_date',$this->author_birth_date,true);
		$criteria->compare('author_death_date',$this->author_death_date,true);
		$criteria->compare('author_description',$this->author_description,true);
		$criteria->compare('author_email',$this->author_email,true);
		$criteria->compare('author_url',$this->author_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getAuthorList(){
           $autors_data = $this->findAll();
           $autor_view = array();
           foreach ($autors_data as $author){
               $autor_view[$author->author_id] = $author->author_first_name . " " . $author->author_last_name;
           }
           return $autor_view;
        }
}