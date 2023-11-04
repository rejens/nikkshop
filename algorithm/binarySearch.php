<?php
function binarySearch($array, $target) {
    $left = 0;
    $right = count($array) - 1;

    while($left <= $right) {
        $middle = floor(($left + $right) / 2);

        if($array[$middle]['name'] == $target) {
            return $middle;
        }

        if($array[$middle]['name'] < $target) {
            $left = $middle + 1;
        } else {
            $right = $middle - 1;
        }
    }

    return -1;
}