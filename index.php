<?php

$array = [
    "foo" => "bar",
    "bar" => "foo",
   ];
   
   $ary = array("1"=>'One','Two',"3"=>3);
   $a = '0'; $b = count($ary);
   while ($a <= $b) {
    $pr = $ary[$a];
    print "$pr<br>";
    $a++;
   } 