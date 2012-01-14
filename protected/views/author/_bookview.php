<div class="view">
    <table>
        <tr>
            <td>
                <h3><?php echo CHtml::link(CHtml::encode($data->book_title), array('book/view','id'=>$data->book_id)); ?></h3>
                <p>
                    <?php echo CHtml::encode($data->book_short_description); ?>
                </p>
                <span style="font-weight: bold; font-size: 130%; float: right;"><?php echo CHtml::link("More...", array('book/view','id'=>$data->book_id)) ; ?></span>
            </td>
        </tr>
    </table>
</div>