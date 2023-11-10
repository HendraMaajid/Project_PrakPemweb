<?php
    session_start();
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view tabel</title>
</head>
<body>
    <h1>selamat datang <?php echo $_SESSION['username'];?> <?php ?></h1>
    <table border="1">
        <tr>
            <th>id_putri</th>
            <th>nama_putri</th>
            <th>size_sepatu</th>
            <th>daerah</th>
            <th>aksi</th>

        </tr>
        <?php
            $sql = "SELECT * FROM sepatu JOIN putri ON sepatu.id_putri = putri.id_putri JOIN sayembara ON putri.id_sayembara = sayembara.id_sayembara;";
            $query = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $data['id_putri']; ?></td>
                    <td><?php echo $data['nama_putri']; ?></td>
                    <td><?php echo $data['size']; ?></td>
                    <td><?php echo $data['daerah']; ?></td>
                    <td>
                        <a href="updateputri.php?id_update=<?php echo $data['id_putri']; ?>">Update</a>
                        <a href="deleteputri.php?id_delete=<?php echo $data['id_putri']; ?>">Delete</a>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>