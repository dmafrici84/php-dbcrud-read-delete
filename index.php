<!--
  seleziona tutto dalla tabella pagamenti e stampa il risultato in una lista ordinata
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
    SELECT *
    FROM pagamenti
  ";

  $result = $conn->query($sql);
  var_dump($result);
  echo "<br>";

  if ($result && $result->num_rows > 0) {

    echo "num_rows: " . $result->num_rows . "<br>";

    echo "<ol>";
    while($row = $result->fetch_assoc()) {

      // var_dump($row);
      // echo "<br>";
      echo "<li style='margin-bottom:10px;'>";
      echo "id: " . $row['id']
           . " - " . "status: " . $row['status']
           . " - " . "price: " . $row['price']
           . " - " . "prenotazione_id: " . $row['prenotazione_id']
           . " - " . "pagante_id: " . $row['pagante_id']
           . " - " . "created_at: " . $row['created_at']
           . " - " . "updated_at: " . $row['updated_at'];
      echo "</li>";
    }
    echo "</ol>";

  } elseif ($result) {

    echo "0 results";

  } else {

    echo "query error";

  }

  $conn->close();

 ?>
