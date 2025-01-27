<?php
$contactfile = '.contact.dat';

// $getfiledata = file_get_contents($contactfile);

// echo $getfiledata;

// de het noi dung
// file_put_contents($contactfile, "test");
// $enter = "test3" . "\n";

// //
// file_put_contents($contactfile, $enter, FILE_APPEND);


// echo $getfiledata;


// tach chuoi trong 1 file csv
// $alldata = file($contactfile);

// foreach ($alldata as $linedata){
//     $lines = explode(',', $linedata);
//     echo $lines[0] . '<br>';
//     echo $lines[1] . '<br>';
//     echo $lines[2] . '<br>';
// }



$contents = fopen($contactfile, 'a+');

$add_text = "add new line" . "\n";

fwrite($contents, $add_text);

fclose($contents);
?>