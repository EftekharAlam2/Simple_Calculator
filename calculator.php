<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['expression'])) {
        $expression = $_POST['expression'];
        try {
            $result = eval("return $expression;");
            echo json_encode(['result' => $result]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Error']);
        }
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Simple Calculator</title>
  </head>
  <body>
    <div class="calculator">
      <input type="text" id="display" readonly />
      <div class="buttons">
        <button onclick="appendToDisplay('7')">7</button>
        <button onclick="appendToDisplay('8')">8</button>
        <button onclick="appendToDisplay('9')">9</button>
        <button onclick="appendToDisplay('+')">+</button>
        <button onclick="appendToDisplay('4')">4</button>
        <button onclick="appendToDisplay('5')">5</button>
        <button onclick="appendToDisplay('6')">6</button>
        <button onclick="appendToDisplay('*')">*</button>
        <button onclick="appendToDisplay('1')">1</button>
        <button onclick="appendToDisplay('2')">2</button>
        <button onclick="appendToDisplay('3')">3</button>
        <button onclick="appendToDisplay('/')">/</button>
        <button onclick="appendToDisplay('0')">0</button>
        <button onclick="appendToDisplay('.')">.</button>
        <button onclick="appendToDisplay('-')">-</button>
        <button onclick="calculate()">=</button>
        <button onclick="clearDisplay()">C</button>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
    <script>
    function calculate() {
        const expression = $('#display').val();
        $.ajax({
            url: 'calculator.php',
            method: 'POST',
            data: { expression: expression },
            dataType: 'json',
            success: function (response) {
                if (response.error) {
                    $('#display').val('Error');
                } else {
                    $('#display').val(response.result);
                }
            },
            error: function () {
                $('#display').val('Error');
            }
        });
    }
</script>
  </body>
</html>
