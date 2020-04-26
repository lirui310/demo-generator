<?php

$closure = function ($name) {
    return "hello " . $name;
};

echo $closure('phper');


$res1 = array_map(function ($value) {
    return $value + 1;
}, [1, 2, 3]);

var_dump($res1);


function doMap($value)
{
    return $value + 2;
}

$res2 = array_map('doMap', [1, 2, 3]);
var_dump($res2);