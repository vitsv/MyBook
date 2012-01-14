<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_first_name'); ?>
		<?php echo $form->textField($model,'author_first_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_last_name'); ?>
		<?php echo $form->textField($model,'author_last_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_birth_date'); ?>
		<?php echo $form->textField($model,'author_birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_death_date'); ?>
		<?php echo $form->textField($model,'author_death_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_description'); ?>
		<?php echo $form->textArea($model,'author_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_email'); ?>
		<?php echo $form->textField($model,'author_email',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_url'); ?>
		<?php echo $form->textField($model,'author_url',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->