<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        .result {
            border: 1px solid #111;
            width: fit-content;
            min-height: 10px;
            border-radius: 5px;
            padding: 5px;
            margin-top: 20px;
        }
        .result h5 {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <h5>Simple Calculator Operations</h5>
    <form method="POST">
        First number <input type="number" name="num1" required> <br><br>
        Second number <input type="number" name="num2" required><br><br>
        <button type="submit" name="operation" value="add">+</button>
        <button type="submit" name="operation" value="subtract">-</button>
        <button type="submit" name="operation" value="multiplication">*</button>
        <button type="submit" name="operation" value="division">/</button><br><br>


    </form>
    <div class="result">
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = 0;
        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                echo "<h5>$num1 + $num2 = $result</h5>";
                break;

            case "subtract":
                $result = $num1 - $num2;
                echo "<h5>$num1 - $num2 = $result</h5> ";
                break;

            case "multiplication":
                $result = $num1 * $num2;
                echo " <h5>$num1 * $num2 = $result</h5> ";
                break;

            case "division":
                if ($num2 == 0) {
                    echo " <h5 style='color: red; font-weight: bold;'>Division by zero returns an error!</h5> ";
                } else {
                    $result = $num1 / $num2;
                    echo " <h5>$num1 / $num2 = $result</h5>";
                }
                break;
        }
    }
    ?>
    </div>
    
</body>

</html>