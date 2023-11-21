<?php
    session_start();
    include "koneksi.php";

  /*   if (isset($_SESSION['role']) && $_SESSION['role'] != "pangeran") {
        header("Location: login.php");
        exit(); // Ensure that the script stops executing after redirection.
    }
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>viewputri</title>
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
<!-- ini blm ada redirect logutnya -->
		<a href="logout.php">
			<img src="img/logout.png" width="100vw">
		</a>
	</div>
	<div class="contentpangeran">
<!-- kasih fungsitampil nama user -->
		<h2>Selamat datang, <?php echo $_SESSION['username'];?></h2>
		<table>
		    <thead>
		        <tr>
		            <th>id_putri</th>
		            <th>Nama</th>
		            <th>Size Sepatu</th>
		            <th>Daerah</th>
		            <th>Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
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
		    </tbody>
		</table>
	</div>






</body>
</html>
