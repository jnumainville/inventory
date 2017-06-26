<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../style.css">
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
    OR description = ? OR due = ? OR dueTime = ? OR completed = ?
    ORDER BY id DESC");
    $stmt->bind_param("isssss", $id, $title, $description, $due, $dueTime,
    $completed);

    //variable assignments for search from viewform.html
    //$id = $_POST['id'];
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due = $_POST['due'];
    $dueTime = $_POST['dueTime'];
    $completed = $_POST['completed'];

    //executes the search given parameters and statement above
    $stmt->execute();
    $result = $stmt->get_result();

    // output data of each row
    if ($result->num_rows > 0) {
      //headers of table in format: Number Title Description Time Due Completed
      /*echo ("<table><tr><th>Number</th>"
      . "<th>Title</th><th>Description</th><th>Time Due</th>
      . <th>Completed</th></tr>");
      while($row = $result->fetch_assoc()) {
        $id[] = $row['id'];
        $title[] = $row['title'];
        $description[] = $row['description'];
        $due[] = $row['due'];
        $dueTime[] = $row['dueTime'];
        $completed[] = $row['completed'];
      }
      for (int i = 0; i < count($id); i++) {
        echo ("<tr><td>" . $id[i] . "</td><td>" . $title[i]
        . "</td><td>" . $description[i] . "</td><td>" . $due[i]
        . " " . $dueTime[i] . "</td><td>" . $completed[i]
        . "</td></tr>");
      }
      echo "</table>"; */
    }
    else {
      echo "<p>Your search returned no results.</p>";
    }

    $stmt->close();

    $conn->close();
     ?>
  </body>
</html>
