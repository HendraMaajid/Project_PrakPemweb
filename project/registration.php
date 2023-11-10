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
    <title>Registrasi</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username : </label><br>
        <input type="text" name="username" id="username" placeholder="Masukkan username"><br><br>
        <label for="nama">Nama : </label><br>
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama anda"><br><br>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password" placeholder="Masukkan password"><br><br>
        <label for="confirmpassword">Konfirmasi Password :</label> <br>
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm password"><br>
        <button type="submit" name="submit">Registrasi</button>
    </form>
</body>
</html>