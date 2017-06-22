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
    $stmt = $conn->prepare("SELECT * FROM Tasks WHERE id = ?");
    $stmt->bind_param("i", $id);

    //variable assignments for search from viewform.html
    $id = $_POST['id'];

    //executes the search given parameters and statement above
    $stmt->execute();
    $stmt->bind_result($id, $title);

    // output data of each row
    while($stmt->fetch()) {
        echo "id: " . $id . "title: " . $title;
    }

    $stmt->close();

    $conn->close();
     ?>
  </body>
</html>
