<?php
    include "koneksi.php";
    $id_putri = $_GET['id_update'];
    $read ="SELECT * FROM putri WHERE id_putri = '$id_putri'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    if(isset($_POST['submit'])){
        $id_putri = $_POST['id_putri'];
        $nama_putri = $_POST['nama_putri'];
        $sayembara = $_POST['sayembara'];
        $sql = "UPDATE putri SET id_putri='$id_putri', nama_putri='$nama_putri', id_sayembara='$sayembara' WHERE id_putri='$id_putri'";
        $query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Anda berhasil mengupdate data");
                document.location='viewputri.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Anda gagal mengupdate data");
                document.location='viewputri.php';
            </script>
            <?php
        }
    }
    if($row['id_putri']!="") {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table border=0>
            <tr>
                <td>id_putri</td>
                <td><input type="text" name="id_putri" value="<?php echo $row['id_putri']; ?>" readonly></td>
            </tr>
            <tr>
                <td>nama_putri</td>
                <td><input type="text" name="nama_putri" value="<?php echo $row['nama_putri']; ?>"></td>
            </tr>
            <tr>
                <td>sayembara</td>
                <td>
                    <select name="sayembara">
                        <?php
                            $sql = "SELECT * FROM sayembara";
                            $query = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($query)){
                                if($data['id_sayembara']==$row['id_sayembara']){
                                    echo "<option value='$data[id_sayembara]' selected>$data[daerah]</option>";
                                }else{
                                    echo "<option value='$data[id_sayembara]'>$data[daerah]</option>";
                                 }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    }
?>