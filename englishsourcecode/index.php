<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="english.css">
    <meta charset="utf-8">
    <title>English Study Daily Check In</title>
    <style>
        .marquee-container {
            position: fixed;
            top: 0;
            text-align: left;
            padding: 0%;
            margin: 0%;
            width: 100%; /* 将容器的宽度设置为固定值 */
            overflow: hidden; /* 隐藏超出容器范围的内容 */
            background-color: red;
        }
        .marquee {
            padding: 0%;
            margin: 0%;
            display: inline-block;
            white-space: nowrap;
            animation: marquee 10s linear infinite;
            color: yellow;
            background-color: red;
        }
        @keyframes marquee {
        0% {
            transform: translateX(200%);
        }
        100% {
            transform: translateX(-100%);
        }
        }
        h3 {
            margin-top: 0;
            margin-bottom: 0;
        }
  </style>
</head>

<body>
    <div class="marquee-container">
        <div class="marquee">
            <h3>热烈庆祝英语学习签到打卡平台正式开通。</h3>
        </div>
    </div>

    <h1>
        <br>英语学习签到
    </h1>

    <h2 id="datetime">Welcome to the website!</h2>
    <script>
        window.onload = setInterval(function() {
        var now = new Date();
        var datenow = now.getFullYear() + "/" + (now.getMonth()+1) + "/" + now.getDate();
        var hours = now.getHours().toString().padStart(2, "0");
        var minutes = now.getMinutes().toString().padStart(2, "0");
        var seconds = now.getSeconds().toString().padStart(2, "0");
        var datetime = datenow + "   " + hours + ":" + minutes + ":" + seconds;
        document.getElementById("datetime").innerHTML = "现在的时间是：" + datetime;
        }, 1000);
    </script>

        <p>
            请不要和其他任何账号共用密码<br>
            前端？什么东西？没听说过<br>
            真的不想加班改代码
        </p>
    
    <div>
        <form method="POST" id="log" action="login.php">
            账号/Account<br><input type="text" name="account" maxlength="9"><br><br>
            密码/Password<br><input type="password" name="pass" maxlength="24"><br>
            <input type="submit" name="login" value="点击登录"><br>
        </form>
        
        <button id="register" onclick="showRegister()">账号注册</button><br>
    </div>

    <dialog id="register_dialog">
        <h3>账号注册</h3>
        <p>目前暂不开放账号注册，敬请谅解。<br>
        如您有使用需求，请联系邮箱529131196@qq.com。<br>
        如果您是交过保护费的尊贵用户，您的账号为宿舍门牌号，初始密码为123。无需注册。
        </p>
        <button onclick="closeRegister()">关闭</button>
    </dialog>

    <script>
        function showRegister(){
            const dialog = document.getElementById("register_dialog");
            dialog.showModal();
        }
        function closeRegister(){
            const dialog = document.getElementById("register_dialog");
            dialog.close();
        }
    </script>

<div>
    <h2>最近打卡</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "HIDEPASSWORD";
    $dbname = "english";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Retrieve the most recent 5 check-ins from the daily_check table
    $sql = "SELECT * FROM daily_check ORDER BY id DESC LIMIT 15";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output the data for each row
        $count = 1;
        echo "<table><tr><td>NAME</td><td>TIME</td><td>CATEGORY</td><td>NOTE</td></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            $id0 =  $row["userid"];
            $sql = "SELECT * FROM users WHERE id = '$id0'";
            $result0 = mysqli_query($conn, $sql);
            if($row0 = mysqli_fetch_assoc($result0))
                $name = $row0["username"];
            
            echo "<td>" . $name . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>" . $row["category"] . "</td>";
            echo "<td>" . $row["note"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<p>登录后可查看更多结果</p>";
    } else {
        echo "No results found.";
    } ?>
</div>

</body>