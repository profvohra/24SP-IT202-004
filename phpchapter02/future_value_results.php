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
    $error_message = 'Investement must be a valid number.';
  }

  // TODO include additional error cases

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
?>