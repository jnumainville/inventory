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
      echo ("<table><tr><th>Number</th>"
      . "<th>Title</th><th>Description</th><th>Time Due</th>"
      . "<th>Completed</th></tr>");
      while($row = $result->fetch_assoc()) {
        echo ("<tr><td>" . $row['id'] . "</td><td>" . $row['title']
        . "</td><td>" . $row['description']  . "</td><td>" . $row['due']
        . " " . $row['dueTime']  . "</td><td>" . $row['completed']
        . "</td></tr>");
      }
      echo "</table>";
    }
    else {
      echo "<p>Your search returned no results.</p>";
    }
    $result->free();
    $stmt->close();
    $conn->close();
    ?>
     <!--Below checks if the user would like to search for another task?-->
     <p>Would you like to search again?</p>
     <form action="./searchform.html">
       <input type="submit" value="Yes"><br>
     </form>
     <form action="../main.html">
       <input type="submit" value="No"><br>
     </form>
  </body>
</html>
