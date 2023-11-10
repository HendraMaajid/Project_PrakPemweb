<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view sayembara</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>id_sayembara</th>
            <th>daerah</th>
            <td>status</td>
            <th>aksi</th>
        </tr>
        <?php
            $sql = "SELECT * FROM sayembara";
            $query = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $data['id_sayembara']; ?></td>
                    <td><?php echo $data['daerah']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td>
                        <a href="updatesayembara.php?id_update=<?php echo $data['id_sayembara']; ?>">Update</a>
                        <a href="deletesayembara.php?id_delete=<?php echo $data['id_sayembara']; ?>">Delete</a>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>