<?php
$this->breadcrumbs=array(
	'Authors'=>array('index'),
	$model->author_id=>array('view','id'=>$model->author_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Author', 'url'=>array('index')),
	array('label'=>'Create Author', 'url'=>array('create')),
	array('label'=>'View Author', 'url'=>array('view', 'id'=>$model->author_id)),
	array('label'=>'Manage Author', 'url'=>array('admin')),
);
?>

<h1>Update Author <?php echo $model->author_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>