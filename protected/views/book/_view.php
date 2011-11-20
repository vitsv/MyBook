<div class="view">


	<h2><?php echo CHtml::encode($data->book_title); ?></h2>
	<br />

	<p>
	<?php echo CHtml::encode($data->book_short_description); ?>
	<p/>
        <b>Added:</b>
	<?php echo date("Y-m-d",$data->book_create_time); ?>
	<br />
        	<b>Tags:</b>
	<?php echo CHtml::encode($data->book_tags); ?>
	<br />

</div>