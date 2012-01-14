<?php

class AjaxController extends CController {

    function actionVote() {
        $output = "";

        if (isset($_POST['vote']))
            $vote = $_POST['vote'];
        if (isset($_POST['id']))
            $id = $_POST['id'];
        if (isset($vote) && isset($id)) {
            //sprawdam czy user juz glosował
            if (!(isset($_COOKIE['votemybook' . $id]) && $_COOKIE['votemybook' . $id] == $id)) {
                $book = Book::model()->findByPk($id);
                if ($book != null) {
                    if ($vote == "up") {
                        $book->vote = $book->vote + 1;
                    } else {
                        $book->vote = $book->vote - 1;
                    }
                    $book->save();
                    SetCookie("votemybook" . $id, $id, time() + 3600 * 24 * 30);
                    $output = $book->vote;
                } else {
                    $output = "error";
                }
            } else {
                $output = "voted";
            }
        } else {
            $output = "error";
        }

        echo CHtml::encode($output);

        Yii::app()->end();
    }

}

?>
