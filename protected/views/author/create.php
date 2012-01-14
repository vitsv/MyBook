<?php
$this->breadcrumbs=array(
	'Authors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Author', 'url'=>array('index')),
	array('label'=>'Manage Author', 'url'=>array('admin')),
);
?>

<h1>Create Author</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>