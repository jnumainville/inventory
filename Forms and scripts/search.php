<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h2>Results:</h2>
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

    //below is the prepared statement for searching
    $stmt = $conn->prepare("SELECT * FROM Tasks WHERE id = ? OR title = ?
    OR description = ? OR due = ? OR dueTime = ?");
    $stmt->bind_param("issss", $id, $title, $description, $due, $dueTime);

    //variable assignments for search from viewform.html
    $id = $_POST['id'];
    $title = $_POST['title']
    $description = $_POST['description'];
    $due = $_POST['due'];
    $dueTime = $_POST['dueTime'];

    //executes the search given parameters and statement above
    $stmt->execute();
    $stmt->bind_result($id, $title, $description, $due, $dueTime);

    // output data of each row
    if ($query->num_rows > 0) {
      while($row = $query->fetch_assoc()) {
        echo "Number: " . $row['id'] .  " " . "|" . " Title: " . $row['title']
        . " " . "|" . " Description: " . $row['description'] . " " . "|"
        . " Time due: " . $row['due'] . " " . $row['dueTime'] . " " . "|"
        . " Completed: " . $row['completed'] . "<br>";
      }
    }
    else {
      echo "Your search returned no results.";
    }

    $stmt->close();

    $conn->close();
     ?>
  </body>
</html>
