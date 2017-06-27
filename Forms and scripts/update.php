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

    //below are the prepared statements to be executed
    $stmtTitle = $conn->prepare("UPDATE Tasks SET title = ? WHERE id = ?");
    $stmtTitle->bind_param("si", $title, $id);
    $stmtDes = $conn->prepare("UPDATE Tasks SET description = ? WHERE id = ?");
    $stmtDes->bind_param("si", $description, $id);
    $stmtDue = $conn->prepare("UPDATE Tasks SET due = ? WHERE id = ?");
    $stmtDue->bind_param("si", $due, $id);
    $stmtDueT = $conn->prepare("UPDATE Tasks SET dueTime = ? WHERE id = ?");
    $stmtDueT->bind_param("si", $dueTime, $id);
    $stmtComp = $conn->prepare("UPDATE Tasks SET completed = ? WHERE id = ?");
    $stmtComp->bind_param("si", $completed, $id);

    //below are the variables that atore possible changes
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due = $_POST['due'];
    $dueTime = $_POST['dueTime'];
    $completed = $_POST['completed'];

    //below checks and exectues the prepared statements if they need to be executed
    if ($title != "") {
      $stmtTitle->execute();
      $stmtTitle->close();
      echo "Title changed successfully.<br>";
    }
    else {
      echo "Title was not changed.<br>";
    }

    if ($description != "") {
      $stmtDes->execute();
      $stmtDes->close();
      echo "Description changed successfully.<br>";
    }
    else {
      echo "Description was not changed.<br>";
    }

    if ($due != "") {
      $stmtDue->execute();
      $stmtDue->close();
      echo "Date changed successfully.<br>";
    }
    else {
      echo "Date was not changed.<br>";
    }

    if ($dueTime != "") {
      $stmtDueT->execute();
      $stmtDueT->close();
      echo "Time changed successfully.<br>";
    }
    else {
      echo "Time was not changed.<br>";
    }

    if ($completed != "") {
      $stmtComp->execute();
      $stmtComp->close();
      echo "Completed status changed successfully.<br>";
    }
    else {
      echo "Completed status was not changed.<br>";
    }

    $conn->close();
    ?>
    <!--Below checks if the user would like to update another task-->
    <p>Would you like to update another task?</p>
    <form action="./updateform.html">
      <input class = "button" type="submit" value="Yes"><br>
    </form>
    <form action="../main.html">
      <input class = "button" type="submit" value="No"><br>
    </form>
  </body>
</html>
