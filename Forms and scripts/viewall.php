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

    //below creates and executes the command to get all task info
    $getall = "SELECT * FROM Tasks";
    $query = $conn->query($getall);

    echo "<h2>All tasks:</h2>";

    //below checks to ensure their are results and lists them
    if ($query->num_rows > 0) {
      while($row = $query->fetch_assoc()) {
        echo "Number: " . $row['id'] .  " " . "|" . " Title: " . $row['title']
        . " " . "|" . " Description: " . $row['description'] . " " . "|"
        . " Time due: " . $row['due'] . " " . $row['dueTime'] . " " . "|"
        . " Completed: " . $row['completed'] . "<br>";
      }
    }
    else {
      echo "Your task list is empty.";
    }

    $conn->close();
    ?>

    <!--below is the html to navigate back to the home page-->
    <br>
    <div>Other options:</div>
    <form action = "../main.html">
      <input type="submit" value="Back to Home">
    </form>
    <form action = "searchform.html">
      <input type="submit" value="Search for a task">
    </form>
    <form action = "updateform.html">
      <input type="submit" value="Update a task">
    </form>
    <form action = "addform.html">
      <input type="submit" value="Add a task">
    </form>
    <form action = "deleteform.html">
      <input type="submit" value="Delete a task">
    </form>
  </body>
</html>
