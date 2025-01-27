<?php
// $date_time = date('H');

// echo $date_time;



// $comment = [
//     // 'good', 'exilent'
// ];

// // if(!empty($comment)){
// //     echo 'There are no comment';
// // }

// // echo !empty($comment) ? 'There are no comment thit cho':
// //                         'No comment';
// // $first_comment = !empty($comment)
// //                 ? $comment[1]: 'no comment';


// $first_comment = $comment[0] ?? 'No con men';
// echo $first_comment;


// $favorite_meat = 'thit lon';
// switch($favorite_meat){
//     case 'thit lon' :
//         echo 'day la thit lon';
//         break;
//     case 'thit cho':
//         echo 'day la thit cho';
//         break;
//     default:
//         echo 'Day khong phai la thit tao can';
// }
// echo '<br>';


$meats = [
    'Thit' => 'cho',
    'gia' => '170',
    'loai' => 'dui'
];
foreach ($meats as $meat => $value) {
    echo "$meat => $value";
    echo '<br>';
}

//for thường được dùng khi có con số giới hạn lặp
// for($i = 0; $i<5; $i++){
//  echo $i;
// }

//continue, break
// for($i = 0; $i<5; $i++){
//     if($i ===2){
//         break;
//         continue;
//     }
//     echo $i;
//    }


//while thường lặp khi không có giới hạn 
$j = 0;
while ($j <5){
    echo $j;
    $j++;
}



