<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="english.css">
</head>

<body>
    <h1>
        打卡结果查询页面
    </h1>
    <h2>
        <?php $account = $_POST['account'];; echo "'$account'"; ?>的打卡结果
    </h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "HIDEPASSWORD";
    $dbname = "english";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the query
    if ($account == 0)
        $sql = "SELECT * FROM daily_check";
    else
        $sql = "SELECT * FROM daily_check WHERE userid = '$account'";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output the data for each row
        echo "<table><tr><td>ACCOUNT</td><td>CHECK TIME</td><td>CHECK CATAGORY</td><td>NOTE</td></tr>";
        while($row = $result->fetch_assoc()) {
            $x0 = $row["userid"];
            $x1 = $row["time"];
            $x2 = $row["category"];
            $x3 = $row["note"];
            echo "<tr><td>'$x0'</td><td>'$x1'</td><td>'$x2'</td><td>'$x3'</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }

    // Close the connection
    $conn->close();

    ?>

</body>