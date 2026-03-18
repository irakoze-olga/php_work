<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial of a number</title>
</head>
<body>
    <h5>Enter the number whose factorial is to be found</h5>
    <form method="POST">
        Number: <input type="number" name="num" required >
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     
  $num = $_POST['num'];
  $factorial = 1;

    for ($i = 1; $i <= $num; $i++){
      $factorial *= $i;
    }
print "<h5>The factorial of $num is $factorial</h5>";
    }   
    ?>
</body>
</html>