<?php
# A php file
# by zhangzhi @2014-11-10 21:41:28 
# Copyright 2014 NONE rights reserved.

// @descriptions
// ...
// @more details
// ...
App::uses('Multibyte', 'I18n');

class IzhuomiTime {
    public static function countDayDiff($beginDay, $endDay) {
        $end = new DateTime($endDay);
        $begin = new DateTime($beginDay);
        return $end->diff($begin)->d; 
    }
}
