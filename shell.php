<?php
/**
 * Des : 希尔排序算法实现
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/9/21
 * Time: 14:27
 */

$initData = require_once("./weedData.php");
include_once("./helpers.php");

/**
 * 希尔排序
 *
 * 基于分组的插入排序算法
 *
 * 按照指定的步数将数据分组后对分组进行插入排序
 *
 * 当指定步数为1的时候就是一个常规的插入排序
 *
 * 初始的步数为：floor(count($initData) / 2)
 *
 * @param $data
 * @param $increment
 */
function shell(&$data, $increment)
{
    if ($increment < 1) {
        return;
    }

    $length = count($data);

    for ($i = 0; $i < $increment; $i++) {

        for ($j = $i; $j < $length; $j += $increment) {

            // 分组插入排序
            $base = $data[$j];
            for ($k = $j - $increment; $k >= 0; $k -= $increment) {
                if ($base < $data[$k]) { // 依次往后移动
                    swap($data[$k + $increment], $data[$k]);
                    continue;
                }
                break;
            }

        }
    }
    shell($data, floor($increment / 2));
}


echo "=======希尔排序算法实现=======" . PHP_EOL;

echo "源数据：" . PHP_EOL;

print_r($initData);

shell($initData, floor(count($initData) / 2));

echo "排序后数据：" . PHP_EOL;

print_r($initData);

echo "=======希尔排序算法实现=======" . PHP_EOL;