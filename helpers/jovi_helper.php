<?php 
/*
    * &get_instance();
*/

function enc($str) {
    return $str;
}
function dec($str){
    return $str;
}

function ht($dat1,$dat2){
    $date1 = @date_create($dat1);
    $date2 = @date_create($dat2);
    $df    = @date_diff($date1,$date2);
    return $df->days;
}