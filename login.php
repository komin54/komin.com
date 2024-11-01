<?php
  include "servis/database.php";
  session_start();

  $login_message = "";

  if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
  }
 
  if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash("sha256", $password);

    $sql = "SELECT * FROM users WHERE username='$username' AND 
    password='$hash_password'
    ";
    $result = $db->query($sql); 

    if ($result->num_rows > 0) {
      echo "datanya ada";
      $data = $result->fetch_assoc();
      $_SESSION["username"] = $data["username"];
      $_SESSION["is_login"] = true ;
      
      header("location: dashboard.php");
  }else{
    $login_message = "akun tidak di temukan";
  }
  $db->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layout/header.html" ?>
    <h3> MASUK AKUN </h3>

    <i><?=  $login_message ?></i>

    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username" required/>
        <input type="password" placeholder="password" name="password" required/>
        <button type="submit" name="Login"> masuk sekrang </button>
    </form>

    <?php include "layout/footer.html"?>
</body>
</html>