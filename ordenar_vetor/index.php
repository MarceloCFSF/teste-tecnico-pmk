<?php

function merge(array $left, array $right) {
  $leftSize = count($left);
  $rightSize = count($right);
  $l = $r = 0;
  $aux = [];

  while ($l < $leftSize && $r < $rightSize) { 
    if ($left[$l] < $right[$r]) {
      $aux []= $left[$l];
      $l++;
    } else {
      $aux []= $right[$r];
      $r++;
    }
  }

  while ($r < $rightSize) {
    $aux []= $right[$r];
    $r++;
  }
  
  while ($l < $leftSize) {
    $aux []= $left[$l];
    $l++;
  }

  return $aux;
}

function mergeSort(array $array) {
  $len = count($array);

  if ($len <= 1) return $array;

  $middle = $len / 2;
  $left = [];
  $right = [];

  for ($i=0; $i < $len; $i++) { 
    if ($i < $middle) $left []= $array[$i];
    else $right []= $array[$i];
  }

  $left = mergeSort($left);
  $right = mergeSort($right);

  $array = merge($left, $right);

  return $array;
}

$array = [50, 1, 5, 65, 35, 22, 100, 300, 250];

$sortedArray = mergeSort($array);

for ($i=0; $i < count($sortedArray); $i++) {
  if ($i > 0) echo " ";
  echo $sortedArray[$i];
}