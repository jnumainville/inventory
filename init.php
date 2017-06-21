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

      //Creates a new connection to the server utilizing variables above.
      $conn = new mysqli($servername, $username, $password);

      /* Below checks to ensure a connection to the server is made. If failed,
      the error message is given. */
      if ($conn->connect_error) {
        die("Connection failed for the following reason: " .
        $conn->connect_error);
      }
      else {
        echo "Connection established. ";
      }

      //Below creates the database itself. If failed, an error is given.
      $createDB = "CREATE DATABASE inv";
      if ($conn->query($createDB) === TRUE) {
        echo "Database created successfully. ";
      }
      else {
        echo "Error creating database: " . $conn->error;
      }

      $conn->close();
    ?>
  </body>
</html>
