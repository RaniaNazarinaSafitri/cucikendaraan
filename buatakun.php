<?php
//after click
if(isset($_POST['login'])){
  //koneksi sql
  $koneksi = mysqli_connect('localhost','root','','cucimobil')
  or die (mysqli_connect_error());

  //tampung value
  $username = $_REQUEST['username'];
  $password = MD5($_REQUEST['password']);
  $nama = $_REQUEST['nama'];
  $alamat = $_REQUEST['alamat'];
  $hp = $_REQUEST['hp'];
  $level = $_REQUEST['level'];

  $sql = mysqli_query($koneksi, "INSERT INTO user(username, password, nama, alamat, hp, level) VALUES('$username', '$password', '$nama', '$alamat', '$hp', '$level')");
  if($sql == true){
    header('Location: ./admin.php?hlm=user');
    die();
  } else {
    echo 'ERROR! Periksa penulisan querynya.';
  }
} else {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Cuci Kendaraan</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>
<h2>Tambah User Baru</h2>
        <h4>Selamat datang di Pembuatan akun Jasa Cuci Kendaraan</h4>
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>

        </div>

    </div>
</div>

</body>
</html>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" id="username" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama User</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" required>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-6">
			<textarea class="form-control" name="alamat" rows="4" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="hp" class="col-sm-2 control-label">Nomor HP</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor HP" required>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-3">
			<select name="level" class="form-control" required>
				<option value="">--- Pilih Jenis User ---</option>
				<option value="2">User Biasa</option>
				<option value="1">Admin</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
      <div class="button-panel">
    <input type="submit" class="button" title="Log In" name="login" value="Login"></input>

	</div>
</form>
