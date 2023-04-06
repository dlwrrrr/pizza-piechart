<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PIZZA PIE input</title>
    <style>
      label, input[type="number"] {
        display: block;
      }

    </style>
  </head>
  <body>
    <h1>PIZZA PIE:-D</h1>
    <form method="post">
      <label for="치즈">치즈:</label>
      <input type="number" id="치즈" name="치즈" required><br>

      <label for="파인애플">파인애플:</label>
      <input type="number" id="파인애플" name="파인애플" required><br>

      <label for="페퍼로니">페퍼로니</label>
      <input type="number" id="페퍼로니" name="페퍼로니" required><br>

      <label for="고구마">고구마:</label>
      <input type="number" id="고구마" name="고구마" required><br>

      <label for="포테이토">포테이토:</label>
      <input type="number" id="포테이토" name="포테이토" required><br>

      <input type="submit" value="저장">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "pizza";

      $치즈 = $_POST["치즈"];
      $파인애플 = $_POST["파인애플"];
      $페퍼로니 = $_POST["페퍼로니"];
      $고구마 = $_POST["고구마"];
      $포테이토 = $_POST["포테이토"];

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "DELETE FROM pizza";
      $conn->query($sql);

      $sql = "INSERT INTO pizza (치즈, 파인애플, 페퍼로니, 고구마, 포테이토)
      VALUES ('$치즈', '$파인애플', '$페퍼로니', '$고구마', '$포테이토')";

      if ($conn->query($sql) === TRUE) {
        echo "토핑 저장 완료";
        } else {
        echo "토핑 저장 실패 " . $sql . "<br>" . $conn->error;
        } 
        $conn->close();
    }
    ?>
      </body>
    </html>
