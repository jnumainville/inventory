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

      //below is the prepared statement to delete an entry from the database
      $stmt = $conn->prepare("DELETE FROM Tasks WHERE id = ?");
      $stmt->bind_param("i", $id);

      //below stores the id number taken from the html form
      $id = $_POST['id'];

      //below checks to ensure that there is a task with that id, then executes
      $stmtSearch = $conn->prepare("SELECT * FROM Tasks WHERE id = ?");
      $stmtSearch->bind_param("i", $id);
      $stmtSearch->execute();
      $result = $stmtSearch->get_result();

      if ($result->num_rows == 0) {
        echo "That number was not found.";
      }
      else {
        $stmt->execute();
        echo "Task deleted successfully.";
      }

      $result->free();
      $stmtSearch->close();
      $stmt->close();
      $conn->close();
    ?>

    <!--Below checks if the user would like to delete another entry-->
    <p>Would you like to delete another task?</p>
    <form action="./deleteform.html">
      <input class = "button" type="submit" value="Yes"><br>
    </form>
    <form action="../main.html">
      <input class = "button" type="submit" value="No"><br>
    </form>
  </body>
</html>
