<?php
  //  DEBUGGING ONLY
  // print_r($_POST);

  // Slide 65
  // get the data from the form
  $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
  $interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
  $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

  // Slide 66
  $error_message = '';
  // validate investment
  if ($investment === FALSE) {
    $error_message .= 'Investment must be a valid number.<br>';
  }
  // TODO include additional error cases from Slide 65 and 66
  // TESTING!!!
  // 1. Success (input 3 valid values)
  // 2. investment is empty/invalid
  // 3. investment is negative
  // 4. interest rate is empty/invalid
  // 5. interest rate is negative
  // 6. years is empty/invalid
  // 7. years is negative
  // 8. years is over 30

  // Slide 67
  if($error_message != '') {
    include('future_value_form.php');
    exit();
  }

  // calculate the future value
  $future_value = $investment;
  for($index = 1; $index <= $years; $index++) {
    $future_value += $future_value * $interest_rate * 0.01;
  }

  // apply formatting
  $investment_f = '$' . number_format($investment, 2);
  $yearly_rate_f = $interest_rate . '%';
  $future_value_f = '$' . number_format($future_value, 2);
?>
<!-- Slide 68 -->
<html>
  <head>
    <title>Future Value Calculator</title>
  </head>
  <body>
    <h1>Future Value Calculator</h1>
    <label>Investment Amount:</label>
    <span><?php echo $investment_f; ?></span>
    <br>
    <label>Yearly Interest Rate:</label>
    <span><?php echo $yearly_rate_f; ?></span>
    <br>
    <label>Number of Years:</label>
    <span><?php echo $years; ?></span>
    <br>
    <label>Future Value:</label>
    <span><?php echo $future_value_f; ?></span>
  </body>
</html>