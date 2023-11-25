<?php
    include "koneksi.php";
    $id_sayembara = $_GET['id_delete'];
    $sql = "DELETE FROM sayembara WHERE id_sayembara = '$id_sayembara'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Anda berhasil menghapus data");
            document.location='viewsayembara.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Masih ada putri yang terdata di sayembara ini");
            document.location='viewsayembara.php';
        </script>
        <?php
    }
?>