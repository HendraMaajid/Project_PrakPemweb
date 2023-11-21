<?php
    include "koneksi.php";
    session_start();

    function encryptPassword($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashedPassword;
    }

    if(isset($_POST['submit'])){
        $role = "putri";
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        $checkUsernameQuery = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");
        if (mysqli_num_rows($checkUsernameQuery) > 0) {
            ?>
            <script>
                alert("Username sudah ada. Silakan pilih username lain.");
            </script>
            <?php
        } else {
            if ($password == $confirmpassword) {
                $hashpassword = encryptPassword($password);
                $sql = "INSERT INTO pengguna (username, nama, password, role) VALUES ('$username', '$nama', '$hashpassword', '$role')";
                $query = mysqli_query($conn, $sql);
                $sql2 = "INSERT INTO putri (nama_putri, username, id_sayembara) VALUES ('$nama','$username', '$_SESSION[id_sayembara]')";
                $query = mysqli_query($conn, $sql2);
                if($query){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['role'] = $role;
                    ?>
                    <script>
                        alert("Anda berhasil registrasi");
                        document.location = "putri.php";
                    </script>
                    <?php
                    
                }
                }else{
                    ?>
                    <script>
                        alert("Anda gagal registrasi");
                    </script>
                    <?php
            }
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
  <title>Registration</title>
</head>
<body>
<div class="loginbg">
    <div class="loginform">
      <h2><u>Sign Up</u></h2>
      <br>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" id="nama" name="nama" placeholder="Nama">
        <br>
        <input type="text" id="username" name="username" placeholder="Username">
        <br>
        <input type="password" id="password" name="password" placeholder="Password">
        <br>
        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Konfirmasi Password">
        <br><br>
        <button type="submit" name="submit" width="100%">Sign Up</button>
  </form>
</div>
</div>

</body>
</html>
