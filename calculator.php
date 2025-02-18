<?php
// Store the result variable
$calculationResult = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get numbers from the form
    $firstNumber = $_POST['num1'];
    $secondNumber = $_POST['num2'];
    $mathOperation = $_POST['operation'];
    
    // Do the calculation based on the operation
    if ($mathOperation == '+') {
        $calculationResult = $firstNumber + $secondNumber;
    }
    elseif ($mathOperation == '-') {
        $calculationResult = $firstNumber - $secondNumber;
    }
    elseif ($mathOperation == '*') {
        $calculationResult = $firstNumber * $secondNumber;
    }
    elseif ($mathOperation == '/') {
        // Check if trying to divide by zero
        if ($secondNumber == 0) {
            $calculationResult = "Cannot divide by zero!";
        } else {
            $calculationResult = $firstNumber / $secondNumber;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>Simple Calculator</h1>
        <!-- Calculator Form -->
        <form method="post">
            <input type="number" name="num1" placeholder="Enter first number" required step="any">
            
            <select name="operation" required>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">×</option>
                <option value="/">÷</option>
            </select>
            
            <input type="number" name="num2" placeholder="Enter second number" required step="any">
            
            <button type="submit">Calculate</button>
        </form>
        
        <!-- Show result if exists -->
        <?php 
        if($calculationResult !== '') {
            echo '<div class="result">';
            echo 'Result: ' . $calculationResult;
            echo '</div>';
        }
        ?>
    </div>
</body>
</html> 