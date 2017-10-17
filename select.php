<?php
/**
 * Des : 简单的选择算法
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/10/17
 * Time: 10:33
 */

$initData = require_once("./weedData.php");
include_once("./helpers.php");

function select(&$data)
{
    if (count($data) <= 0) {
        return true;
    }

    for ($i = 0; $i < count($data); $i++) {
        // 获取基准数
        $min = $i;
        // 判断选择最小值
        for ($j = $i + 1; $j < count($data); $j++) {
            if ($data[$j] < $data[$min]) {
                $min = $j;
            }
        }
        // 交换
        if ($i != $min) {
            swap($data[$i], $data[$min]);
        }
    }
}

echo "源数据：" . PHP_EOL;

print_r($initData);

select($initData);

echo "排序后数据：" . PHP_EOL;

print_r($initData);