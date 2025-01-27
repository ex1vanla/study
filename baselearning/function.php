<?php

$comment = 'thit cho';

function getComment($haha){
    echo  $haha;
}

getComment($comment);

echo '<br>';

function getComment_2(){
    return 'thit lon';
}

$getcmd = getComment_2();
echo $getcmd;
echo '<br>';

function sum($int1, $int2){
    $int3= $int1 + $int2;
    return $int3;
}

$total = sum(3,2);
echo $total;

?>