<script type="text/javascript">
    $(document).ready(function(){                          
        $('.vote').click(function(){                  
            $.post('<?= Yii::app()->createAbsoluteUrl('ajax/vote'); ?>', {'vote': this.id, 'id': '<?= $model->book_id ?>'}, 
            function(data) {
                if(data == 'voted')
                    alert('Głos już oddany!');
                else if (data == 'error') alert('Bląd!');
                else {
                    alert('Dziękujemy! Wasz głos został przyjęty');
                    $('#vote_counter').html(data);
                }
            }    
        );                                     
        })
    });
</script>

<?php
$this->breadcrumbs = array(
    'Books' => array('index'),
    $model->book_id,
);

if (!Yii::app()->user->isGuest) {
    $this->menu = array(
        array('label' => 'List Book', 'url' => array('index')),
        array('label' => 'Create Book', 'url' => array('create')),
        array('label' => 'Update Book', 'url' => array('update', 'id' => $model->book_id)),
        array('label' => 'Delete Book', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->book_id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Manage Book', 'url' => array('admin')),
    );
}
?>

<h1><?php echo $model->book_title; ?></h1>
<div id="vote_box" style="float: right;position: relative; top: -30px;">
    <a href="#" id="up" class="vote"><img src="images/vote_up.gif" style="margin: -5px;" /></a>
    <span style="font-size: 150%;font-weight: bold;margin: 5px;color:<?= ($model->vote >= 0)? "#33CC66" : "#FF0000" ?>" id="vote_counter" ><?= CHtml::encode($model->vote) ?></span>
    <a href="#" id="down" class="vote"><img src="images/vote_down.gif" style="margin: -5px;" /></a>
</div>

<p>
    <?php echo CHtml::encode($model->book_short_description); ?>
</p>
<br />
<span style="font-size: 120%; float: right;"> <?php echo CHtml::link("Read", array('book/read', 'id' => $model->book_id)); ?></span>