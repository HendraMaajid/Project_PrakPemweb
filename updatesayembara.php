<?php
    include "koneksi.php";
    session_start();
 /*   if (isset($_SESSION['role']) && $_SESSION['role'] != "pangeran") {
        header("Location: login.php");
        exit(); // Ensure that the script stops executing after redirection.
    }
*/
    $id_sayembara = $_GET['id_update'];
    $sql = "SELECT * FROM sayembara WHERE id_sayembara = '$id_sayembara'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    if(isset($_POST['submit'])){
        $daerah = $_POST['daerah'];
        $status = $_POST['status'];
        $sql = "UPDATE sayembara SET daerah = '$daerah', status = '$status' WHERE id_sayembara = '$id_sayembara'";
        $query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Anda berhasil mengupdate data");
                document.location='viewsayembara.php';
            </script>
            <?php
        }
    }
	if($data['id_sayembara']!="") {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>updatesayembara</title>
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
		<h2><u>Update sayembara</u></h2>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<h3>id_sayembara &nbsp : &nbsp
			<input type="text" name="id_sayembara" id="id" value="<?php echo $data['id_sayembara']; ?>" readonly>
			</h3>
			<h3>daerah &nbsp : &nbsp
			<input type="text" name="daerah" id="daerah" value="<?php echo $data['daerah']; ?>">
			</h3>
			<h3>status &nbsp : &nbsp
			<select name="status" id="status">
				 <?php
                    if($data['status']=="on going"){
                        echo "<option value='On going' selected>On going</option>";
                        echo "<option value='End'>End</option>";
                    }else{
                        echo "<option value='On going'>On going</option>";
                        echo "<option value='End' selected>End</option>";
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