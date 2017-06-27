<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../style.css">
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

    //below creates and executes the command to get all task info
    $getall = "SELECT * FROM Tasks";
    $query = $conn->query($getall);

    echo "<h2>All tasks:</h2>";

    //below checks to ensure their are results and lists them in an html table
    if ($query->num_rows > 0) {
      //headers of table in format: Number Title Description Time Due Completed
      echo ("<table><tr><th>Number</th>"
      . "<th>Title</th><th>Description</th><th>Time Due</th>"
      . "<th>Completed</th></tr>");
      while($row = $query->fetch_assoc()) {
        echo ("<tr><td>" . $row['id'] . "</td><td>" . $row['title'] . "</td><td>"
        . $row['description'] . "</td><td>" . $row['due'] . " " . $row['dueTime']
        . "</td><td>" . $row['completed'] . "</td></tr>");
      }
      echo "</table>";
    }
    else {
      echo "Your task list is empty.";
    }

    $conn->close();
    ?>

    <!--below is the html to navigate back to the home page-->
    <br>
    <div class = "navigation">
    <div>Other options:</div>
    <form action = "../main.html">
      <input class = "button" type="submit" value="Back to Home">
    </form>
    <form action = "searchform.html">
      <input class = "button" type="submit" value="Search for a task">
    </form>
    <form action = "updateform.html">
      <input class = "button" type="submit" value="Update a task">
    </form>
    <form action = "addform.html">
      <input class = "button" type="submit" value="Add a task">
    </form>
    <form action = "deleteform.html">
      <input class = "button" type="submit" value="Delete a task">
    </form>
  </div>
  </body>
</html>
