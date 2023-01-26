<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "tugasphp";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

if (isset($_POST['bsimpan'])) {
	if ($_GET['hal'] == "edit") {
		$edit = mysqli_query($koneksi, "UPDATE tmhs set
											 	nim = '$_POST[tnim]',
											 	nama = '$_POST[tnama]',
												alamat = '$_POST[talamat]',
											 	prodi = '$_POST[tprodi]'
											 WHERE id_mhs = '$_GET[id]'
										   ");
		if ($edit) {
			echo "<script>
						alert('Edit data sukses!');
						document.location='index.php';
				     </script>";
		} else {
			echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
		}
	} else {
		$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
										  VALUES ('$_POST[tnim]', 
										  		 '$_POST[tnama]', 
										  		 '$_POST[talamat]', 
										  		 '$_POST[tprodi]')
										 ");
		if ($simpan) {
			echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
		} else {
			echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
		}
	}
}


if (isset($_GET['hal'])) {
	if ($_GET['hal'] == "edit") {
		$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
		$data = mysqli_fetch_array($tampil);
		if ($data) {
			$vnim = $data['nim'];
			$vnama = $data['nama'];
			$valamat = $data['alamat'];
			$vprodi = $data['prodi'];
		}
	} else if ($_GET['hal'] == "hapus") {
		$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
		if ($hapus) {
			echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	<div class="container">

		<h1 class="text-center">CRUD Data Mahasiswa dan Dosen</h1>

		<div class="card mt-3">
			<div class="card-header bg-primary text-white">
				Form Input Data Mahasiswa
			</div>
			<div class="card-body">
				<form method="post" action="">
					<div class="form-group">
						<label>NIM</label>
						<input type="text" name="tnim" value="<?= @$vnim ?>" class="form-control" placeholder="Input Nim anda disini!" required>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="tnama" value="<?= @$vnama ?>" class="form-control" placeholder="Input Nama anda disini!" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="talamat" placeholder="Input Alamat anda disini!"><?= @$valamat ?></textarea>
					</div>
					<div class="form-group">
						<label>Program Studi</label>
						<select class="form-control" name="tprodi">
							<option value="<?= @$vprodi ?>"><?= @$vprodi ?></option>
							<option value="S1-SK">S1-SK</option>
							<option value="S1-SI">S1-SI</option>
							<option value="S1-TI">S1-TI</option>
						</select>
					</div>

					<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
					<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

				</form>
			</div>
		</div>



		<div class="card mt-3">
			<div class="card-header bg-success text-white">
				Daftar Mahasiswa
			</div>
			<div class="card-body">

				<table class="table table-bordered table-striped">
					<tr>
						<th>No.</th>
						<th>Nim</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Program Studi</th>
						<th>Aksi</th>
					</tr>
					<?php
					$no = 1;
					$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
					while ($data = mysqli_fetch_array($tampil)) :

					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['nim'] ?></td>
							<td><?= $data['nama'] ?></td>
							<td><?= $data['alamat'] ?></td>
							<td><?= $data['prodi'] ?></td>
							<td>
								<a href="index.php?hal=edit&id=<?= $data['id_mhs'] ?>" class="btn btn-warning"> Edit </a>
								<a href="index.php?hal=hapus&id=<?= $data['id_mhs'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>

			</div>
		</div>

	</div>

	<br>
	<div class="container">
		<button type="button" class="btn btn-danger"><a href="login.php">Logout</a></button>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>