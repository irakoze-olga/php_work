<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple multiplication table</title>
    <style>
        table{
            border-collapse: collapse;
        }
        td {
            padding: 4px  4px;
            border: 1px solid black;
        }

    </style>
</head>
<body>
   <table>
    <?php
    $mult;
    for ( $a = 1; $a <= 6; $a++){
        print "<tr>";
        for ( $b = 1; $b <= 5; $b++){
            $mult = $a * $b;
            print "<td>$a * $b = $mult</td>";
            if ( $b == 5){
                print "<br>";
            }
        }
        print "</tr>";
    }

    ?>
   </table> 
</body>
</html>