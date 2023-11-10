<?php
    include "koneksi.php";
    $id_sayembara = $_GET['id_update'];
    $sql = "SELECT * FROM sayembara WHERE id_sayembara = '$id_sayembara'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    if(isset($_POST['submit'])){
        $daerah = $_POST['daerah'];
        $status = $_POST['status'];
        $sql = "UPDATE sayembara SET daerah = '$daerah', status = '$status' WHERE id_sayembara = '$id_sayembara'";
        $query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Anda berhasil mengupdate data");
                document.location='viewsayembara.php';
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
    <title>update sayembara</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table border=0>
            <tr>
                <td>id_sayembara</td>
                <td><input type="text" name="id_sayembara" value="<?php echo $data['id_sayembara']; ?>" readonly></td>
            </tr>
            <tr>
                <td>daerah</td>
                <td><input type="text" name="daerah" value="<?php echo $data['daerah']; ?>"></td>
            </tr>
            <tr>
                <td>status</td>
                <td>
                    <select name="status">
                        <?php
                            if($data['status']=="on going"){
                                echo "<option value='on going' selected>on going</option>";
                                echo "<option value='end'>end</option>";
                            }else{
                                echo "<option value='on going'>on going</option>";
                                echo "<option value='end' selected>end</option>";
                            }
                        ?>
                    </select>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Update"></td>
            </tr>
        </table>
</body>
</html>