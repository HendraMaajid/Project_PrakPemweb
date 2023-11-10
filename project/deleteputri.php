<?php
    include "koneksi.php";
    session_start();
    $id_putri = $_GET['id_delete'];
    $sql = "DELETE FROM putri WHERE id_putri = '$id_putri'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Anda berhasil menghapus data");
            document.location='viewputri.php';
        </script>
        <?php
    }
?>