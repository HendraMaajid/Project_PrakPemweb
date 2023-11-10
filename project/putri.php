<?php
    session_start();
    include "koneksi.php";
    if(isset($_POST['submit'])){
        $size = $_POST['size'];
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM putri WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $id_putri = $row['id_putri'];

        $sql_check = "SELECT * FROM sepatu WHERE id_putri = '$id_putri'";
        $query_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($query_check) > 0) {
            ?>
            <script>
                alert("Anda sudah menginputkan ukuran sepatu sebelumnya. Hanya boleh satu kali.");
            </script>
            <?php
        }else{

            $sql = "INSERT INTO sepatu (size, id_putri) VALUES ('$size', '$id_putri')";
            $query = mysqli_query($conn, $sql);
            if($query){
                ?>
                <script>
                    alert("Anda berhasil memasukkan data");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Anda gagal memasukkan data");
                </script>
                <?php
            }
        }
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input sepatu</title>
</head>
<body>
    <h1>Selamat datang <?php echo $_SESSION['username'];?></h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <!--ini bisa dibikin validasi biar cuma bisa nginputin angka sama titik aja soalnya tipe data di databasenya float-->
        <label for="size">Size : </label>
        <input type="text" name="size" id="size" placeholder="Masukkan size"><br><br>
        <button type="submit" name="submit">Daftar</button>
    </form>
     <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>