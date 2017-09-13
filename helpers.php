<?php
/**
 * Des :
 * Created by PhpStorm.
 * User: lufeng501206@gmail.com
 * Date: 2017/9/13
 * Time: 18:20
 */

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