<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'book_id'); ?>
		<?php echo $form->textField($model,'book_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_title'); ?>
		<?php echo $form->textField($model,'book_title',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_tags'); ?>
		<?php echo $form->textArea($model,'book_tags',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_status'); ?>
		<?php echo $form->textField($model,'book_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_create_time'); ?>
		<?php echo $form->textField($model,'book_create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_update_time'); ?>
		<?php echo $form->textField($model,'book_update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_id'); ?>
		<?php echo $form->textField($model,'owner_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->