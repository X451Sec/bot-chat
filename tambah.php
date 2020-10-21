<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "xxx", "bot") or die("Database Error");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pertanyaan & Jawaban</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<div class="container" style="margin-top:20px">
		<h2>Tambah Pertanyaan & Jawaban</h2>
		<hr><br>
		
		<?php
		if(isset($_POST['submit'])){
			$nim			= $_POST['nim'];
			$nama			= $_POST['nama'];
			
			$cek = mysqli_query($conn, "SELECT * FROM chatbot WHERE replies='$nim'") or die(mysqli_error($conn));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($conn, "INSERT INTO chatbot(queries, replies) VALUES('$nim', '$nama')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
				}else{
					echo '<script>alert("Gagal melakukan proses tambah data.");</script>';
				}
			}else{
				echo '<script>alert("Gagal, sudah terdaftar.");</script>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pertanyaan</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" placeholder="Pertanyaan Nya" required>
				</div>
			</div><br>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jawaban</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" placeholder="Jawabannya" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" value="SIMPAN">
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>
