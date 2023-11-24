<?php
    session_start();
    include "koneksi.php";


      if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Pengecekan apakah pengguna memiliki role "pangeran"
    if ($_SESSION['role'] !== 'pangeran') {
        echo "Akses tidak diizinkan.";
        exit();
    }
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>inputsayembara</title>
</head>
<body>
	<div class="sidebar">
		<div class="pp">
			<img src="img/pangeran_pp.png" alt="PP Pangeran">
		</div>
		<a href="viewputri.php">
		    List Putri
		</a> <br>
		<a href="inputsayembara.php">
		    Tambah Sayembara
		</a ><br>

		<a href="logout.php">
			<img src="img/logout.png" width="100vw">
		</a>
	</div>
	<div class="contentpangeran">

		<h2>Inputan sayembara</h2>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<h2>id_sayembara :
		<input type="text" name="id_sayembara" id="id">
		</h2><br>
		<h2>daerah :
		<input type="text" name="daerah" id="daerah">
		</h2><br>
		<h2>status :
		<select name="status" id="status">
		    <option value="On going">On Going</option>
		    <option value="End">End</option>
		</select>
		</h2><br><br>
		<div class="tb1">
			<button type="submit" name="submit">Tambah</button>
		</div>
	</form>
	</div>






</body>
</html>
