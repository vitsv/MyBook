<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'author-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'author_first_name'); ?>
		<?php echo $form->textField($model,'author_first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'author_first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_last_name'); ?>
		<?php echo $form->textField($model,'author_last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'author_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_birth_date'); ?>
		<?php echo $form->textField($model,'author_birth_date'); ?>
		<?php echo $form->error($model,'author_birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_death_date'); ?>
		<?php echo $form->textField($model,'author_death_date'); ?>
		<?php echo $form->error($model,'author_death_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_description'); ?>
		<?php echo $form->textArea($model,'author_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'author_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_email'); ?>
		<?php echo $form->textField($model,'author_email',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'author_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_url'); ?>
		<?php echo $form->textField($model,'author_url',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'author_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->