<?php
if (date(m)>01){
    $a=date('Y');
    $b=$a+1;
    $c=$a.'-'.$b;
    echo $c;
}
else{
    $a=date('Y');
    $b=$a-1;
    $c=$b.'-'.$a;
    echo $c;
}
 ?>
