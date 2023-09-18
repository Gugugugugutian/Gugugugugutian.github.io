<?php
    $servername = "localhost";
    $username = "root";
    $password = "HIDEPASSWORD";
    $dbname = "english";
    session_start();
    // Check if the form has been submitted
    if (isset($_POST['login'])) {
      $conn = mysqli_connect($servername,$username,$password,$dbname);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
      // Get the username and password from the form
      $id = mysqli_real_escape_string($conn, $_POST['account']);
      $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    
      // Query the database for the user
      $sql = "SELECT * FROM users WHERE id = '$id' AND password = '$pass'";

      $result = mysqli_query($conn, $sql);

      $_SESSION['id'] = $id;
      if($row = mysqli_fetch_assoc($result))
        $_SESSION['username'] = $row["username"];
    
      echo "Are you serious to log in?";
      // Check if the query returned a result
      if (mysqli_num_rows($result) == 1) {
        echo 'correct pass';
        // Set the session variables
        header('Location: home.php');
        exit();
      } else {
        // Invalid login credentials, display an error message
        $error_message = "Invalid username or password.";
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
      }
    
      // Close the database connection
      mysqli_close($conn);
      header('Location: index.php');
    }
    
    ?>