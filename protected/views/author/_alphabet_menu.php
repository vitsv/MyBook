<div id="alphabet_menu">
<?php

$alphabet = array('A', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'Ń', 'O', 'P', 'R', 'S', 'Ś', 'T', 'U', 'W', 'Y', 'Z', 'Ź', 'Ż');
foreach ($alphabet as $letter)
    echo CHtml::link(CHtml::encode($letter . " "), array('index', 'l' => strtolower($letter)));

?>
</div>