<?php
    session_start();
    include "koneksi.php";
      if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Pengecekan apakah pengguna memiliki role "putri"
    if ($_SESSION['role'] !== 'putri') {
        echo "Akses tidak diizinkan.";
        exit();
    }
    if(isset($_POST['submit'])){
        $size = $_POST['size'];
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM putri WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $id_putri = $row['id_putri'];

        $sql_check = "SELECT * FROM sepatu WHERE id_putri = '$id_putri'";
        $query_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($query_check) > 0) {
            ?>
            <script>
                alert("Anda sudah menginputkan ukuran sepatu sebelumnya. Hanya boleh satu kali.");
            </script>
            <?php
        }else{

            $sql = "INSERT INTO sepatu (size, id_putri) VALUES ('$size', '$id_putri')";
            $query = mysqli_query($conn, $sql);
            if($query){
                ?>
                <script>
                    alert("Anda berhasil memasukkan data");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Anda gagal memasukkan data");
                </script>
                <?php
            }
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
  <title>Putri</title>
</head>
<body>
	<div class="sidebar">
		<div class="pp">
			<img src="img/putri_pp.png" alt="PP Putri">
		</div>
		Input size <br>
<!-- ini blm ada redirect logutnya -->
		<a href="logout.php">
			<img src="img/logout.png" width="100vw">
		</a>
	</div>
	<div class="contentputri">
<!-- kasih fungsitampil nama user -->
		<h2>Selamat datang, <?php echo $_SESSION['username'];?> </h2>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                  <h2>masukkan size :
                  <input type="number" step="any" name="size" id="size" title="Hanya boleh diisi angka"><br><br></h2>
                    <div class="tb3">
                      <button type="submit" name="submit" onclick="checkAndShowPopup()">Daftar</button>
                    </div>
                    
                    
                    
              <!-- Pop-up dan overlay -->
              <div class="popup-container" id="popup">
                <img src="" class="popup-image" id="popupImage">
              </div>
              <div id="overlay" onclick="hidePopup()"></div>

              <!-- Javascript popup -->
              <!-- blm daftar diarahin ke inputputri.php-->
              <!-- value=terpilih muncul validasi_menang.jpg -->
              <!-- value=tidakterpilih muncul validasi_kalah.jpg -->
              <script>
                function checkAndShowPopup() {
                  var sizeFromDatabase = 37.85;

                  if (isNaN(sizeFromDatabase)) {
                    alert("Data input telah tersimpan.");

                  } else {
                    var popup = document.getElementById("popup");
                    var overlay = document.getElementById("overlay");
                    var popupImage = document.getElementById("popupImage");

                    if (sizeFromDatabase === 37.85) {
                      popupImage.src = "img/validasi_menang.png";

                    } else {
                      popupImage.src = "img/validasi_kalah.png";
                    }

                    popup.style.display = "block";
                    overlay.style.display = "block";
                  }
                }

                function hidePopup() {
                  var popup = document.getElementById("popup");
                  var overlay = document.getElementById("overlay");

                  popup.style.display = "none";
                  overlay.style.display = "none";
                }
            </script>
		</form>
	</div>
</body>
</html>
