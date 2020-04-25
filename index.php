<?php

    //memulai session
    session_start();

    //jika ada session, maka akan diarahkan ke halaman dashboard admin
    if(isset($_SESSION['id_user'])){

        //mengarahkan ke halaman dashboard admin
        header("Location: ./admin.php");
        die();
    }

    //mengincludekan koneksi database
    include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>

    <div class="form-wrapper">
	<?php

    //apabila tombol login di klik akan menjalankan skript dibawah ini
	if( isset( $_REQUEST['login'] ) ){

        //mendeklarasikan data yang akan dimasukkan ke dalam database
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

        //skript query ke insert data ke dalam database
		$sql = mysqli_query($koneksi, "SELECT id_user, username, nama, level FROM user WHERE username='$username' AND password=MD5('$password')");

        //jika skript query benar maka akan membuat session
		if( $sql){
			list($id_user, $username, $nama, $level) = mysqli_fetch_array($sql);

            //membuat session
            $_SESSION['id_user'] = $id_user;
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $nama;
			$_SESSION['level'] = $level;

			header("Location: ./admin.php");
			die();
		} else {

			$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
			header('Location: ./');
			die();
		}

	} else {
	?>
      <form class="form-signin" method="post" action="" role="form">
		<?php
		if(isset($_SESSION['err'])){
			$err = $_SESSION['err'];
			echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
            unset($_SESSION['err']);
		}
		?>
        <h2 class="form-signin-heading">Login Admin / Kasir</h2>
        <div class="form-item">
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="form-item">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
        <div class="form-group">
          <label for="sebagai">Login Sebagai :</label>
          <select name="sebagai" class="form-control">
            <option value="1">Admin</option>
            <option value="2">Kasir</option>
          </select>
          <div class="button-panel">
        <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
      </div>
      </form>
	<?php
	}
	?>
    </div> <!-- /container -->

	<!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(".alert-message").alert().delay(3000).slideUp('slow');
	</script>
  <div class="reminder">
    <p>Tidak memiliki Akun Admin / Kasir? </p>
      <p><a href="buatakun.php">Buat Akun</a></p>
  </div>
  </body>
</html>
