<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
      /*$servername, $username, $password, and $port are used to connect to the
      mySQL server. change as necessary for your installation. 3306 is the
      default port used by WAMP. */
      $servername = "localhost";
      $username = "user";
      $password = "password";
      $port = 3306;

      //Creates a new connection to the server utilizing variables above.
      $conn = new mysqli($servername, $username, $password, "", port);

      /* Below checks to ensure a connection to the server is made. If failed,
      the error message is given and the user is instructed to retry. */
      if ($conn->connect_error) {
        die("Connection failed for the following reason: " .
        $conn->connect_error . ". Please try again");
      }
      else {
        echo "Connection established.";
      }

      $conn->close();
    ?>
  </body>
</html>
