<!--
  seleziona dalla tabella pagamenti le colonne id, status e price di tutti
  i pagamenti con price superiore a 600, stampa il risultato in
   una lista non ordinata
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
    SELECT id, status, price
    FROM pagamenti
    WHERE price > 600
  ";

  $result = $conn->query($sql);
  var_dump($result);
  echo "<br>";

  if ($result && $result->num_rows > 0) {

    echo "num_rows: " . $result->num_rows . "<br>";

    echo "<ul>";
    while($row = $result->fetch_assoc()) {

      // var_dump($row);
      // echo "<br>";
      echo "<li style='margin-bottom:10px;'>";
      echo "id: " . $row['id'] . " - " . "status: " . $row['status']
           . " - " . "price: " . $row['price'];
      echo "</li>";
    }
    echo "</ul>";

  } elseif ($result) {

    echo "0 results";

  } else {

    echo "query error";

  }

  $conn->close();

 ?>
