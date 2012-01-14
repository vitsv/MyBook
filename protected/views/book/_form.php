<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'book_title'); ?>
		<?php echo $form->textField($model,'book_title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'book_title'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'book_status'); ?>
		<?php echo $form->dropDownList($model,'book_status',Book::getStatusList()); ?>
		<?php echo $form->error($model,'book_status'); ?>
	</div>
        
        	<div class="row">
		<?php echo $form->labelEx($model,'book_author'); ?>
		<?php echo $form->dropDownList($model,'book_author',$author_list); ?>
		<?php echo $form->error($model,'book_author'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'book_short_description'); ?>
		<?php echo $form->textArea($model,'book_short_description',array('rows'=>6, 'cols'=>40)); ?>
		<?php echo $form->error($model,'book_short_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'book_tags'); ?>
		<?php echo $form->textArea($model,'book_tags',array('rows'=>3, 'cols'=>40)); ?>
		<?php echo $form->error($model,'book_tags'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'book_file_name'); ?>
		<?php echo $form->fileField($model,'book_file_name'); ?>
		<?php echo $form->error($model,'book_file_name'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->