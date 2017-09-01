<?php
/**
 * Des : 堆排序（最大堆排序）
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/8/31
 * Time: 18:09
 */

$initData = require_once("./weedData.php");


/**
 * 使用异或交换2个值，原理：一个值经过同一个值的2次异或后，原值不变
 * @param int $a
 * @param int $b
 */
function swap(&$a, &$b)
{
    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;
}

/**
 * 调整最大堆
 *
 * @param $data 待排序数组
 * @param $pos  当前需要建堆的节点位置
 * @param $last 待排序数组的结束位置
 */
function adjustNode(&$data, $pos, $last)
{
    // 获取左儿子位置
    $left = ($pos << 1) + 1;
    // 获取右儿子位置
    $right = ($pos << 1) + 2;
    // 没有儿子就结束遍历
    if (!isset($data[$left]) || $left > $last) {
        return;
    }
    // 如果右儿子比左儿子大，就交换双亲节点和右节点
    if ($right <= $last && $data[$right] > $data[$left]) {
        $left = $right;
    }
    if ($data[$left] > $data[$pos]) {
        swap($data[$left], $data[$pos]);
        // 遍历儿子节点，使符合最大堆
        adjustNode($data, $left, $last);
    }
}

/**
 * 最大堆排序
 *
 * @param $data
 * @return mixed
 */
function heapSort($data)
{
    $last = count($data);
    while (true) {
        // 获得开始建堆的节点位置
        $start = $last >> 1;
        // 建最大堆
        for ($i = $start - 1; $i >= 0; $i--) {
            adjustNode($data, $i, $last - 1);
        }
        // 建堆完成，取出根节点，和数组最后一个元素交换
        swap($data[$last - 1], $data[0]);
        // 下一个遍历$data[0] - $data[$last - 1]
        $last--;
        if ($last == 1) {
            break;
        }
    }
    return $data;
}

echo "源数据：" . PHP_EOL;

print_r($initData);

$sortData = heapSort($initData);

echo "排序后数据：" . PHP_EOL;

print_r($sortData);