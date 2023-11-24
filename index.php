<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit'])) {
        $id_sayembara = $_POST['id_sayembara'];
        $_SESSION['id_sayembara'] = $id_sayembara;
        header("Location: registration.php");
}

$read ="SELECT * FROM sayembara";
$query = mysqli_query($conn, $read);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="styles.css">
  <title>Homepage</title>
</head>


<body>
<div class="home">
<table>
	<tr style="background-color: #004792">
		 <td style="text-align:left; color:#fff; font-size:20px;">
			<h1>&nbsp Cinderella Seeker</h1>
		</td>
	<!-- <th style="align:right"><h3><a href="#">Home</a></h3></th>
		 <th style="align:right"><h3><a href="#about">About</a></h3></th>
	--> <td>
			<form action="login.php" method"post">
				<div class="tb2">
					<button type="submit" name="submit">L O G I N</button>
				</div>
			</form>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<img class="home_bg" src="img/home_bg_1.png">
		</td>
	</tr>
	<tr>
		<td colspan="2">
	<!--	<img class="home_bg" src="home_bg_2.png"> -->
			<div class="contenthome">
				<h2>Cinderella Seeker  
					<span class="news">NEWS!</span>
				<h2>
				<p>Diberitahukan kepada seluruh penduduk! Barangsiapa yang memiliki sepatu kaca yang tertinggal saat pesta kami mengadakan suatu sayembara yaitu barangsiapa yang ukuran kakinya cocok dengan sepatu kaca tersebut maka, sesuai janji pangeran akan menikahi gadis tersebut dan menjadikan putri di kerajaan pangeran.</p>
			 <table>
				<thead>
						<th>Daerah</th>
						<th>Status</th>
						<th></th>
				</thead>
				<tbody>
				<?php
					while ($row = mysqli_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $row['daerah']; ?></td>
							<td><?php echo $row['status']; ?></td>
							<td>
								<?php if ($row['status'] == 'On going') { ?>
									<form action="index.php" method="post">
										<input type='hidden' name='id_sayembara' value="<?php echo $row['id_sayembara']; ?>">
										<div class="tb1">
											<button type="submit" name="submit">
												Daftar
											</button>
										</div>
									</form>
								<?php } ?>
							</td>
						</tr>
						<?php
					}
				?>
				</tbody>
			</table>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="about">
				<h3><u>about</u></h3>
				<p>Di sebuah kerajaan yang jauh, hiduplah seorang gadis muda bernama Cinderella. Setelah ibunya meninggal, ayah Cinderella menikah lagi dengan seorang wanita jahat yang memiliki dua anak perempuan, Anastasia dan Drizella. Mereka semua tinggal bersama dalam istana yang megah. Cinderella adalah anak tiri yang baik hati, tetapi dia sering diperlakukan dengan tidak adil oleh ibu tiri dan kedua saudara tirinya. Dia dipaksa untuk melakukan pekerjaan rumah tangga dan tidur di ruang atas, sementara saudara-saudaranya menikmati kemewahan istana.</p>
				<p>Suatu hari, kabar datang bahwa pangeran akan mengadakan pesta dansa di istana untuk mencari pasangan hidup. Cinderella bermimpi untuk menghadiri pesta tersebut, tetapi ibu tiri dan saudara-saudaranya tidak mengizinkannya. Namun, dengan bantuan peri baik hati, Cinderella diberi gaun indah dan sepatu kaca yang cantik. Di pesta, Cinderella menawan hati pangeran dengan kecantikannya dan kebaikannya. Mereka berdua menghabiskan waktu bersama, tetapi Cinderella harus kembali sebelum tengah malam, seperti yang diperintahkan oleh peri. Saat melarikan diri, Cinderella kehilangan salah satu sepatu kacanya.</p>
				<p>Pangeran yang terpesona berusaha mencari pemilik sepatu kaca itu. Cinderella, yang telah kembali menjadi gadis sederhana, ditemukan oleh pangeran. Sepatu kaca itu cocok dengan kakinya, dan mereka hidup bahagia selamanya. Dengan kebaikan hati dan keberanian, Cinderella membuktikan bahwa cinta sejati tidak tergantung pada kekayaan atau penampilan fisik. Cerita Cinderella mengajarkan kita tentang kebaikan hati, keadilan, dan bahwa akhir baik bisa datang bagi mereka yang bertahan dan tetap setia pada nilai-nilai mereka.</p>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="cp">
				<h3>Contact Pangeran: 085746982134</h3>
			</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>


