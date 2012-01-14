<?php
$this->breadcrumbs = array(
    'Authors' => array('index'),
    $model->author_first_name . " " . $model->author_last_name,
);
if (!Yii::app()->user->isGuest) {
$this->menu = array(
    array('label' => 'List Author', 'url' => array('index')),
    array('label' => 'Create Author', 'url' => array('create')),
    array('label' => 'Update Author', 'url' => array('update', 'id' => $model->author_id)),
    array('label' => 'Delete Author', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->author_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Author', 'url' => array('admin')),
);
}
?>

<h1><?php echo CHtml::encode($model->author_first_name . " " . $model->author_last_name); ?></h1>
<b>
    <?php
    echo CHtml::encode($model->author_birth_date);
    if ($model->author_death_date)
     echo " - " . CHtml::encode($model->author_death_date);    
        ?>
</b><br /><br />
<p>
<?php echo CHtml::encode($model->author_description); ?>
</p>
<h2>Books</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$books,
	'itemView'=>'_bookview',
)); ?>
