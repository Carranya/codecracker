<?php

$code1 = $_POST["answer[0]"];
$code2 = $_POST["answer[1]"];
$code3 = $_POST["answer[2]"];
$code4 = $_POST["answer[3]"];

$code = $code1;
$code .= $code2;
$code .= $code3;
$code .= $code4;

echo $code;

?>
