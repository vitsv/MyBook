<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property integer $book_id
 * @property string $book_title
 * @property string $book_tags
 * @property integer $book_status
 * @property integer $book_create_time
 * @property integer $book_update_time
 * @property integer $owner_id
 * @property string $book_short_description
 * @property integer $book_author
 * @property string $book_file_name
 * @property integer $vote
 *
 * The followings are the available model relations:
 * @property TblUsers $owner
 * @property Author $bookAuthor
 */
class Book extends CActiveRecord {
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 2;



    //public $book_file_name;

    /**
     * Returns the static model of the specified AR class.
     * @return Book the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'book';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('book_title, book_short_description, book_author', 'required'),
            array('book_title', 'length', 'max' => 128),
            //array('book_author', 'length', 'max' => 100),
            array('book_tags, book_short_description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('book_title, book_tags, book_short_description', 'safe', 'on' => 'search'),
            array('book_file_name', 'file', 'types' => 'txt', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 5),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'owner' => array(self::BELONGS_TO, 'TblUsers', 'owner_id'),
            'bookAuthor' => array(self::BELONGS_TO, 'Author', 'book_author'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'book_id' => 'Book',
            'book_title' => 'Book Title',
            'book_tags' => 'Book Tags',
            'book_status' => 'Book Status',
            'book_create_time' => 'Book Create Time',
            'book_update_time' => 'Book Update Time',
            'owner_id' => 'Owner',
            'book_short_description' => 'Book Short Description',
            'book_author' => 'Book Author',
            'book_file_name' => 'Please attach a books file (txt only)'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('book_id', $this->book_id);
        $criteria->compare('book_title', $this->book_title, true);
        $criteria->compare('book_tags', $this->book_tags, true);
        $criteria->compare('book_status', $this->book_status);
        $criteria->compare('book_create_time', $this->book_create_time);
        $criteria->compare('book_update_time', $this->book_update_time);
        $criteria->compare('owner_id', $this->owner_id);
        $criteria->compare('book_short_description', $this->book_short_description, true);
        $criteria->compare('book_author', $this->book_author);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->book_create_time = $this->book_update_time = time();
                $this->owner_id = Yii::app()->user->id;
            }
            else
                $this->book_update_time = time();
            return true;
        }
        else
            return false;
    }

    protected function afterSave() {
       
    }

    public function getUrl() {
        return Yii::app()->createUrl('book/view', array(
                    'id' => $this->book_id,
                    'title' => $this->book_title,
                ));
    }

    public static function getStatusList() {
        return array(self::STATUS_PUBLIC => 'Public',
            self::STATUS_PRIVATE => 'Private');
    }

}