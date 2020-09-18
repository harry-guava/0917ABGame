<?php
session_start();

$rannum = $_SESSION["rannum"];
$A = 0;
$B = 0;
//echo $_POST["N"];
$num = $_POST['num'];
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];

//玩家猜的數字
$clinum = [$num, $num1, $num2, $num3];

//判斷是不是數字
foreach ($clinum as $value) {
    if (is_numeric($value) == false) {
        echo "請輸入數字！";
        return;
    }
}
//判斷玩家輸入的數字是否重複
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < $i; $j++) {
        if ($clinum[$j] == $clinum[$i]) {
            $j = 0;
            $ans = "請勿輸入相同數字！";
            echo $ans;
            return;
        }
    }
}

//判斷幾A幾B 數值與位置
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        if ($clinum[$i] == $rannum[$j]) {
            if ($i == $j) {
                $A++;
            } elseif ($i != $j) {
                $B++;
            }
        }
    }
}

//計算玩家猜的次數
$count++;
$_SESSION["count"] += $count;
$shwcount = $_SESSION["count"];

//猜對清除數據
if ($A == 4) {
    $shwans = implode($rannum);
    $ans = "恭喜答對！答案是" . $shwans . "總共花了" . $_SESSION["count"] . "次";

    unset($_SESSION["count"]);

    $count = 0;
} else {
    $ans = $A . "A" . $B . "B --第" . $shwcount . "次";

}
echo $ans;
return;
