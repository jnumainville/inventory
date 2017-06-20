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
      $dbname = "inv";
      $port = 3306;

      //Creates a new connection to the server utilizing variables above.
      $conn = new mysqli($servername, $username, $password, $dbname, $port);

      /* Below checks to ensure a connection to the server is made. If failed,
      the error message is given and the user is instructed to retry. */
      if ($conn->connect_error) {
        die("Connection failed for the following reason: " .
        $conn->connect_error . ". Please try again.");
      }
      else {
        echo "Connection established.";
      }

      /* Below is the sql to create the table for the inventory management
      system with the specified columns */
      $createTab = "";


      /* Below ensures that the creation of the table is successful. If not, it
      instructs the user to try again. */
      if ($conn->query($createTab) === TRUE) {
        echo "Table created successfully."
      }
      else {
        echo "Errorcreating table: " . $conn->error . " Please try again.";
      }

      $conn->close();
    ?>
  </body>
</html>
