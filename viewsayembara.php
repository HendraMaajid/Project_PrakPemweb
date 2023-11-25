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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>viewsayembara</title>
</head>
<body>
	<div class="sidebar">
		<div class="pp">
			<img src="img/pangeran_pp.png" alt="PP Pangeran">
		</div>
		<a href="viewputri.php">
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
		<h2><u>View Sayembara</u></h2>
		<table>
		    <thead>
		        <tr>
		            <th>id_sayembara</th>
		            <th>Daerah</th>
		            <th>Status</th>
		            <th>Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
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
		    </tbody>
		</table>
		<br><br>
		<form action="tambahsayembara.php" method="post">
		    <div class="tb1">
				<button type="submit">Tambah</button>
			</div>
		</form>
	</div>






</body>
</html>
