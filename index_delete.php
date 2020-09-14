<!--
  elimina dalla tabella pagamenti la riga con id 8 
 -->

<?php

  $servername = "localhost:3306";
  $username = "root";
  $password = "root";
  $dbname = "dbhotel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    return;
  }

  echo "ok" . "<br>";

  $sql = "
    DELETE FROM pagamenti
    WHERE id = 8
  ";

  $result = $conn->query($sql);
  var_dump($result);
  echo "<br>";

  if ($result) {

    echo "0 results";

  } else {

    echo "query error";

  }

  $conn->close();

 ?>
