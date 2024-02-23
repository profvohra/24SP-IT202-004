<html>
  <head>
    <title>Read Cookie Example</title>
  </head>
  <body>
    <?php
      // Slide 6 and 7
      $cookie_name = "userid";
      $user_id = filter_input(INPUT_COOKIE, $cookie_name, FILTER_VALIDATE_INT);

      if (isset($user_id)) {
        echo "Cookie named $cookie_name is set!";
        echo "<br>";
        echo "value of cookie is $user_id";
      } else {
        echo "Cookie named $cookie_name is not set!";
      }
    ?>
  </body>
</html>