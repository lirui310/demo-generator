<?php

// 定义一个生成器
function readeFile($file)
{
    $handle = fopen($file, 'r');// 只读打开文件得到文件资源
    if ($handle == false) { // 打开失败抛出异常
        throw new Exception();
    }

    while (feof($handle) === false) {// 判断是否到文件最后
        yield fgets($handle); // 读取一行
    }
    fclose($handle);// 关闭文件资源文件
}

$file = 'text.txt';

// 逐行读取
foreach (readeFile($file) as $row) {
    print_r($row);
}