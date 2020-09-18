<?php
session_start();
$ran = $_POST["ran"];
$rannum = array();

//生成不重複數字的亂數
for ($i = 0; $i < 4; $i++) {
    $rannum[$i] = rand(0, 9);
    for ($j = 0; $j < $i; $j++) {
        while ($rannum[$j] == $rannum[$i]) {
            $j = 0;
            $rannum[$i] = rand(0, 9);

        }
    }
}

$_SESSION["rannum"] = $rannum;

foreach ($rannum as $value) {
    echo $value;
}
return;
