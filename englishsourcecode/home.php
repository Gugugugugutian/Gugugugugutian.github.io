<?php
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
    // Retrieve the user's ID and username from the session
    $userid = $_SESSION['id'];
    $usrname = $_SESSION['username'];

    $servername = "localhost";
    $username = "root";
    $password = "HIDEPASSWORD";
    $dbname = "english";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>谁是卷王？英语打卡</title>
</head>
<link rel="stylesheet" type="text/css" href="english.css">

<body>
    <h1>尊敬的卷王：<br><?php echo $usrname; ?><br><br>好久不见，来学习吧</h1>
    <h2 id="datetime">Welcome!</h2>
    <script>
        window.onload = setInterval(function() {
        var now = new Date();
        var datenow = now.getFullYear() + "/" + (now.getMonth()+1) + "/" + now.getDate();
        var hours = now.getHours().toString().padStart(2, "0");
        var minutes = now.getMinutes().toString().padStart(2, "0");
        var seconds = now.getSeconds().toString().padStart(2, "0");
        var datetime = datenow + "   " + hours + ":" + minutes + ":" + seconds;
        document.getElementById("datetime").innerHTML = "Now: " + datetime;
        }, 1000);
    </script>
    <p>账号：<?php echo $userid; ?>     <a href="/english">退出登录</a>。
        <?php if($userid == "626") echo "<br>求求你不要再试bug了" ?>
    </p>

    <div>
        <h3>请在此处完成打卡</h3>
        <form method="post">
          学习内容： 
            <input type="radio" name="cate" value="word">单词
            <input type="radio" name="cate" value="listening">听力
            <input type="radio" name="cate" value="reading">阅读
            <input type="radio" name="cate" value="writing">写作
            <input type="radio" name="cate" value="speaking">口语
            <input type="radio" name="cate" value="others">其他<br>
            <br>
            留言<br>
            <input type="text" name="note" maxlength="200"><br>
            <input type="submit" name="form1" value="提交打卡" id="check_submit"><br>
        </form>
    </div>

  <div>
      <h3>更多功能</h3>
      <p> <button onclick="showSetting()">用户设置</button>  
          <button onclick="showAfter()">补卡登记</button>  
          <button onclick="showEnquiry()">打卡查询</button>  </p>
  </div>
  <script>
      function showSetting(){
          const dialog = document.getElementById("setting");
          dialog.showModal();
      }
      function closeSetting(){
          const dialog = document.getElementById("setting");
          dialog.close();
      }
      function showAfter(){
          const dialog = document.getElementById("checkafter");
          dialog.showModal();
      }
      function closeAfter(){
          const dialog = document.getElementById("checkafter");
          dialog.close();
      }
      function showEnquiry(){
          const dialog = document.getElementById("enquiry");
          dialog.showModal();
      }
      function closeEnquiry(){
          const dialog = document.getElementById("enquiry");
          dialog.close();
      }
  </script>
  <dialog id="setting">
      <h4>用户设置</h4>
      <p>账号：<?php echo "'$userid'" ?></p>
      <form method="POST">
        新用户名/New Username：<input type="text" name="newname" maxlength="30"><br>
        新密码/New Password：<input type="text" name="newpass" maxlength="24"><br>

        <input type="submit" name="form2" value="确认修改" id="check_submit"><br>
      </form>
      <button onclick="closeSetting()">关闭</button>
  </dialog>
  <dialog id="checkafter">
      <h4>补卡登记</h4>
      <p>目前暂未开发完成，请联系管理员完成补卡登记。</p>
      <!-- <input type="submit" name="form3" value="确认" id="check_submit"><br> -->
      <button onclick="closeAfter()">关闭</button>
  </dialog>
  <dialog id="enquiry">
      <h4>打卡记录</h4>
      <form method="POST" action="enquire.php">
        查询账号：<input type="text" name="account" maxlength="9"><br>
        <input type="submit" name="form4" value="确认" id="check_submit"><br>
      </form>
      <p>您可查询任何账号的打卡记录。如需查询所有账号的记录，请输入“0”。</p>
      <button onclick="closeEnquiry()">关闭</button>
  </dialog>
</body>
</html>

<?php 
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['form1'])){
    $category = $_POST["cate"];
    $note = $_POST["note"];
    $current_time = date("Y-m-d H:i:s", strtotime("+8 hours"));
    // Prepare SQL statement and bind parameters
    // $stmt = $conn->prepare("INSERT INTO daily_check (userid, time, category, note) VALUES ('$id', '$current_time', '$category', '$note')");
    $stmt = $conn->prepare("INSERT INTO daily_check (userid, time, category, note) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $userid, $current_time, $category, $note);
    // Execute the statement
    if ($stmt->execute()) {
        echo "'$current_time', user '$userid' checked in successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
  }
    else if(isset($_POST['form2'])){
        $newname = $_POST['newname'];
        $newpassword = $_POST['newpass'];
    
        // Update user's name and password in the database
        if ($newname != null){
        $sql1 = "UPDATE users SET username = '$newname' WHERE id='$userid'";
        $result1 = mysqli_query($conn, $sql1);}
        
        if ($newpassword != null){
        $sql2 = "UPDATE users SET password = '$newpassword' WHERE id='$userid'";
        $result2 = mysqli_query($conn, $sql2);}
      } 
}


      mysqli_close($conn); 
?>

  
