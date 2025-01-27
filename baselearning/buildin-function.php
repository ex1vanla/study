<?php
$text = 'abc';
echo strlen($text);

echo str_replace('b','a',$text);

echo '<br>';

// 配列に分割
$str_2 = 'thit cho, thit meo';
var_dump(explode(', ', $str_2));


// implode

//正規表現
$str_3 = 'vanla@haaha.com  ';

echo preg_match('/@/', $str_3); 


// Kiem tra input dau vao theo dieu kien bieu thuc chinh quy
$input = 3.14; // Chuỗi cần kiểm tra

if (preg_match('/^\d+$/', $input)) {
    echo "$input là chu.";
} else {
    echo "$input không phải là chu.";
}


// substr xoa ki tu
$str_4 = 'dsfasdfasf';

echo substr($str_4, 2, -1);
?>