<?php
for ($a = 0; $a <= 9; $a++){
    for ($b = 0; $b <= 8; $b++){
        print $a.$b . ","  ;
    }
    print $a.$b;
    if (($a % 2 == 1) &&($b==9)){
        print "<br>";
    }
    // print ";
}
?>