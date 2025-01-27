<?php
$globalVariable = 'global';

function checkscope($haha){
    // global $globalVariable;
    $localVariable = 'local';
    echo $haha;
    // echo $localVariable;
    // echo '</br>';
    // echo $globalVariable;
}

checkscope($globalVariable);

?>