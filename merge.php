<?php
/**
 * Des : 归并排序算法实现
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/10/10
 * Time: 10:03
 * 参考: http://blog.csdn.net/baidu_30000217/article/details/53363795
 */

$initData = require_once("./weedData.php");
include_once("./helpers.php");

function MergeSort(&$data)
{
    $start = 0;
    $end = count($data) - 1;
    MSort($data, $start, $end);
}

function MSort(array &$arr, $start, $end)
{
    //当子序列长度为1时，$start == $end，不用再分组
    if ($start < $end) {
        $mid = floor(($start + $end) / 2);      //将 $arr 平分为 $arr[$start - $mid] 和 $arr[$mid+1 - $end]
        MSort($arr, $start, $mid);              //将 $arr[$start - $mid] 归并为有序的$arr[$start - $mid]
        MSort($arr, $mid + 1, $end);            //将 $arr[$mid+1 - $end] 归并为有序的 $arr[$mid+1 - $end]
        Merge($arr, $start, $mid, $end);        //将$arr[$start - $mid]部分和$arr[$mid+1 - $end]部分合并起来成为有序的$arr[$start - $end]
    }
}

//归并操作
function Merge(array &$arr, $start, $mid, $end)
{
    $i = $start;
    $j = $mid + 1;
    $k = $start;
    $temparr = array();

    while ($i != $mid + 1 && $j != $end + 1) {
        if ($arr[$i] >= $arr[$j]) {
            $temparr[$k++] = $arr[$j++];
        } else {
            $temparr[$k++] = $arr[$i++];
        }
    }

    //将第一个子序列的剩余部分添加到已经排好序的 $temparr 数组中
    while ($i != $mid + 1) {
        $temparr[$k++] = $arr[$i++];
    }
    //将第二个子序列的剩余部分添加到已经排好序的 $temparr 数组中
    while ($j != $end + 1) {
        $temparr[$k++] = $arr[$j++];
    }
    for ($i = $start; $i <= $end; $i++) {
        $arr[$i] = $temparr[$i];
    }
//    print_r($temparr);
}

echo "源数据：" . PHP_EOL;

print_r($initData);

MergeSort($initData);

echo "排序后数据：" . PHP_EOL;

print_r($initData);