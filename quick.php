<?php
/**
 * Des : 快速排序
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/9/4
 * Time: 14:40
 */

$initData = require_once("./weedData.php");
include_once ("./helpers.php");

function quick(&$data, $left, $right)
{
    if ($left > $right) {
        return true;
    }
    $i = $left;
    $j = $right;
    // 轴点
    $pivot = $left;
    while ($i < $j) {
        // 从右边开始移动
        while ($j > $pivot) {
            if ($data[$j] < $data[$pivot]) {
                swap($data[$j], $data[$pivot]);
                // 交换轴点
                $pivot = $j;
                break;
            }
            $j--;
        }
        // 从左边开始移动
        while ($i < $pivot) {
            if ($data[$i] > $data[$pivot]) {
                swap($data[$i], $data[$pivot]);
                // 交换轴点
                $pivot = $i;
                break;
            }
            $i++;
        }
    }
    // 递归
    quick($data, $left, $pivot - 1);
    quick($data, $pivot + 1, $right);
}


echo "源数据：" . PHP_EOL;

print_r($initData);

$left = 0;
$right = count($initData) - 1;
quick($initData, $left, $right);

echo "排序后数据：" . PHP_EOL;

print_r($initData);