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
    <title>Login</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username : </label><br>
        <input type="text" name="username" id="username" placeholder="Masukkan username"><br><br>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password" placeholder="Masukkan password"><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>