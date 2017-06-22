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
        echo "Connection established. ";
      }


      // Below is the sql to create the table for the task management
      // system with the specified columns
      $createTab = "CREATE TABLE Tasks (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT(65535) NOT NULL,
        assigned TIMESTAMP,
        due DATE NOT NULL,
        dueTime TIME NOT NULL,
        completed ENUM('N','Y') NOT NULL
      )";

      // Below ensures that the creation of the table is successful. If not, it
      // instructs the user to try again.
      if ($conn->query($createTab) === TRUE) {
        echo "Table created successfully";
      } else {
        echo "Error creating table for the following reason: " . $conn->error;
      }
      $conn->close();
    ?>
  </body>
</html>
