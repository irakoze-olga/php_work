<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess board</title>
    <style>
        table{
            width: 270px;
            height: 270px;
            border-collapse: collapse;
            border: 1px solid #111;
        }
        td {
            width: 30px;
            height: 30px;
        }

    </style>

</head>
<body>
   
    <?php
    echo '<table>';
    for ($x = 1; $x <= 8; $x++){
            echo "<tr>";
        for ($y = 1; $y <= 8; $y++){
           
           if (( $x % 2 == 0)&& ($y % 2 == 0)){
            echo "<td style='background-color: #111;'></td>";
           }
           elseif(($x % 2 == 1) && ($y % 2 == 1)){
             echo "<td style='background-color: #111;'></td>";
           }
          else{
               echo "<td></td>";
          }
        }
        echo "</tr>";
    }
   echo  '</table>'
    ?>
</body>
</html>