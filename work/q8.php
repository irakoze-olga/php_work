
<?php
for ($r = 1; $r <= 7; $r++){
    for( $c = 1; $c <= 5; $c++){
        if ($r == 4){
            echo "*";
        }
        else if( $c == 1 || $c == 5){
            echo "*";
        }
        else {
            echo "&nbsp";
        }

    }
    echo "<br>";
}
?>