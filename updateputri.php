<?php
    include "koneksi.php";
    session_start();
      if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Pengecekan apakah pengguna memiliki role "pangeran"
    if ($_SESSION['role'] !== 'pangeran') {
        echo "Akses tidak diizinkan.";
        exit();
    }
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>updateputri</title>
</head>
<body>
	<div class="sidebar">
		<div class="pp">
			<img src="img/pangeran_pp.png" alt="PP Pangeran">
		</div>
		<a href="listputri.php">
		    List Putri
		</a><br>
		<a href="inputsayembara.php">
		    Tambah Sayembara
		</a ><br>
        <a href="viewsayembara.php">
		    View Sayembara
		</a ><br>
<!-- ini blm ada redirect logutnya -->
		<a href="logout.php">
			<img src="img/logout.png" width="100vw">
		</a>
	</div>
	<div class="contentpangeran">
<!-- kasih fungsitampil nama user -->
		<h2><u>Update Putri</u></h2>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<h3>id_putri &nbsp : &nbsp
			<input type="text" name="id_putri" id="id"  value="<?php echo $row['id_putri']; ?>" readonly>
			</h3>
			<h3>nama &nbsp : &nbsp
			<input type="text" name="nama_putri" id="nama" value="<?php echo $row['nama_putri']; ?>">
			</h3>
			<h3>sayembara &nbsp : &nbsp
			<select name="sayembara" id="sayembara">
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
			</h3><br>
			<div class="tb1">
				<button type="submit" name="submit">Update</button>
			</div>
		</form>
	</div>






</body>
</html>
<?php
	}
?>