<?php
/**
 * Des : 插入排序
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/9/13
 * Time: 17:42
 */

$initData = require_once("./weedData.php");
include_once ("./helpers.php");

function insert(&$data)
{
    $length = count($data);

    if ($length < 2) {
        return false;
    }

    for ($i = 1; $i < $length; $i++) {
        // 取基准数
        $base = $data[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            // 插入比较
            if ($base < $data[$j]) { // 依次往后移动
                swap($data[$j], $data[$j + 1]);
                continue;
            }
            break;
        }

    }
}

echo "源数据：" . PHP_EOL;

print_r($initData);

insert($initData);

echo "排序后数据：" . PHP_EOL;

print_r($initData);