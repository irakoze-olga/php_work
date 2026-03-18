<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple multiplication table</title>
    <style>
        table{
            border-collapse: collapse;
            width : 270px;
            height: 270px;
        }
        td {
   
            border: 1px solid black;
            width: 30px;
            height: 30px;
        }

    </style>
</head>
<body>
   <table>
    <?php
    $mult;
    for ( $a = 1; $a <= 10; $a++){
        print "<tr>";
        for ( $b = 1; $b <= 10; $b++){
            $mult = $a * $b;
            print "<td>$mult</td>";
            if ( $b == 10){
                print "<br>";
            }
        }
        print "</tr>";
    }

    ?>
   </table> 
</body>
</html>