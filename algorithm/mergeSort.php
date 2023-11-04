<?php
function mergeSort($array) {
    if(count($array) <= 1){
        return $array;
    }

    $middle = count($array) / 2;
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = array();
    $leftIndex = 0;
    $rightIndex = 0;

    while($leftIndex < count($left) && $rightIndex < count($right)) {
        if($left[$leftIndex]['name'] < $right[$rightIndex]['name']) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    while($leftIndex < count($left)) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }

    while($rightIndex < count($right)) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }

    return $result;
}