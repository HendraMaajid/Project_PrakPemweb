<?php
    include "koneksi.php";
    session_start();
    $read = mysqli_query($conn, "SELECT * FROM sayembara");
    if (isset($_POST['submit'])) {
        $id_sayembara = $_POST['id_sayembara'];
        $_SESSION['id_sayembara'] = $id_sayembara;
        header("Location: registration.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>homepage</h1>
    <?php
        while ($row = mysqli_fetch_array($read)) {
            echo "<h2>$row[daerah]</h2>";
            if ($row['status'] == "on going") {
                echo "<form action='index.php' method='post'>
                        <input type='hidden' name='id_sayembara' value='$row[id_sayembara]'>
                        <input type='submit' name='submit' value='daftar'>
                    </form>";
            } else {
                echo "<p>Status: $row[status]</p>";
                echo "<p>Sayembara telah berakhir.</p>";
            }
        }
    ?>
</body>
</html>