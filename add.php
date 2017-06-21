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
      $dbname = "List";
      $port = 3306;

      //Creates a new connection to the server utilizing variables above.
      $conn = new mysqli($servername, $username, $password, $dbname, $port);

      /* Below checks to ensure a connection to the server is made. If failed,
      the error message is given. */
      if ($conn->connect_error) {
        die("Connection failed for the following reason: " .
        $conn->connect_error);
      }
      else {
        echo "Connection established.";
      }

      $newEntry = "INSERT INTO Tasks (title, description, due, dueTime, completed)
      VALUES ('Finish this', 'Finish soon', '2017-06-21', '8:00:37', 'N')";

      //Below inserts $newEntry into the table and retutns an error if failed
      if ($conn->query($newEntry) === TRUE) {
        echo "The task has been added to your list.";
      }
      else {
        echo "Error when attempting to add your task: " . $conn->error;
      }

      $conn->close();
    ?>
  </body>
</html>
