<div class="view">
    <table>
        <tr>
            <td>
                <h3><?php echo CHtml::link(CHtml::encode($data->book_title), array('book/view', 'id' => $data->book_id)); ?></h3>
                <div id="vote_box" style="float: right;position: relative; top: -30px;">

                    <span style="font-size: 150%;font-weight: bold;margin: 5px;color:<?= ($data->vote >= 0) ? "#33CC66" : "#FF0000" ?>" id="vote_counter" ><?= CHtml::encode($data->vote) ?></span>

                </div>
                <span style="font-size: 120%;font-style: italic;"><?php echo $data->bookAuthor->author_first_name . " " . $data->bookAuthor->author_last_name; ?></span>
            </td>
        </tr>
    </table>
</div>