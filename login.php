<?php
    include "koneksi.php";
    session_start();
    function verifyPassword($enteredPassword, $hashedPassword) {
        return password_verify($enteredPassword, $hashedPassword);
    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM pengguna WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if($count == 1){
            $row = mysqli_fetch_array($query);
            $hashedPassword = $row['password'];
            if (verifyPassword($password, $hashedPassword)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                if ($row['role'] == "putri") {
                    header("Location: putri.php");
                } else {
                    header("Location: viewputri.php");
                }
            } else {
                ?>
                <script>
                    alert("password salah");
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Username tidak terdaftar");
            </script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>Login</title>
</head>
<body>
<div class="loginbg">
    <div class="loginform">
      <h2><u>Login</u></h2>
      <br><br>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="text" name="username" id="username" placeholder="Username">
          <br><br>
          <input type="password" name="password" id="password" placeholder="Password">
          <br>
          <a href="registration.php"><i>Belum punya akun?</i></a>
          <br><br><br>
          <button type="submit" name="login" width="100%">Login</button>
      </form>
    </div>
</div>
</body>
</html>
