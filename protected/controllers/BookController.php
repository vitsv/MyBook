<?php

class BookController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';


    const PAGE_LENGHT = 8750;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Book;
        $author = new Author();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Book'])) {
            $model->attributes = $_POST['Book'];
            $model->book_file_name = CUploadedFile::getInstance($model, 'book_file_name');
            if ($model->save()) {
                if ($model->book_file_name->saveAs('uploads/books/' . $model->book_file_name->getName()))
                    $this->saveBookContent($model);
                $this->redirect(array('view', 'id' => $model->book_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'author_list' => $author->getAuthorList(),
        ));
    }

    protected function saveBookContent($model) {
        if ($model->book_file_name) {

            $filename = Yii::app()->params['uploadsDir'] . "\\" . $model->book_file_name;
            if (file_exists($filename)) {
                $f_handle = fopen($filename, 'r');
                $f_contents = mysql_real_escape_string(fread($f_handle, filesize($filename)));
                // $f_contents = iconv("CP1251", "utf-8//IGNORE",  $f_contents);
                fclose($f_handle);
                $from = 0;
                $lenght = self::PAGE_LENGHT;
                $book_lenhgt = strlen($f_contents);
                $page_nr = 1;
                do {
                    $book_page = new BookContent();
                    $book_page->book_page_nr = $page_nr;
                    $page_text = substr($f_contents, $from, $lenght);
                    $book_page->book_text = $page_text;
                    $book_page->belong_to = $model->book_id;
                    $book_page->save(false);
                    $page_nr++;
                    $from = $lenght - 1;
                    $lenght += self::PAGE_LENGHT;
                    if ($lenght > $book_lenhgt)
                        $lenght = $book_lenhgt;
                } while ($lenght != $book_lenhgt);
            }
        };
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $author = new Author();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Book'])) {
            $model->attributes = $_POST['Book'];
            $model->book_status = $_POST['Book']['book_status'];
            $model->book_author = $_POST['Book']['book_author'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->book_id));
        }

        $this->render('update', array(
            'model' => $model,
            'author_list' => $author->getAuthorList(),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria(array(
                    'condition' => 'book_status=' . Book::STATUS_PUBLIC,
                    'order' => 'vote DESC',
                ));
        //if (isset($_GET['tag']))
        //    $criteria->addSearchCondition('tags', $_GET['tag']);

        $dataProvider = new CActiveDataProvider('Book', array(
                    'pagination' => array(
                        'pageSize' => 5,
                    ),
                    'criteria' => $criteria,
                ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Book('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Book']))
            $model->attributes = $_GET['Book'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Book::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'book-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRead($id) {
        $model = $this->loadModel($id);
        $criteria = new CDbCriteria(array(
                    'condition' => 'belong_to=' . $id,
                    'order' => 'book_page_nr ASC',
                ));
        $model_content = new CActiveDataProvider('BookContent',
                        array('pagination' => array('pageSize' => 1,
                            ),
                            'criteria' => $criteria,
                ));
        $this->render('read', array(
            'model' => $model,
            'model_content' => $model_content,
        ));
    }
    


}
