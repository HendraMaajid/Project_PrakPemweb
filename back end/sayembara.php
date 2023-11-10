<?php
    include "koneksi.php";
    if(isset($_POST['submit'])){
        $id_sayembara = $_POST['id_sayembara'];
        $daerah = $_POST['daerah'];
        $status = $_POST['status'];
        $sql = "INSERT INTO sayembara (id_sayembara, daerah, status) VALUES ('$id_sayembara', '$daerah', '$status')";
        $query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Anda berhasil menginput data");
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
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <title>insert sayembara</title>
</head>
<body>
    <h1>insert sayembara</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table border=0>
            <tr>
                <td>id_sayembara</td>
                <td><input type="text" name="id_sayembara"></td>
            </tr>
            <tr>
                <td>daerah</td>
                <td><input type="text" name="daerah"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="on going">on going</option>
                        <option value="end">end</option>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="insert"></td>
            </tr>
        </table>
</body>
</html>