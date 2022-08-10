<!DOCTYPE html>
<html lang="en">
<head>
  <title>halaman login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Login</h2>
  <form action="" method="post">
    <div class="mb-3 mt-3">
      <label for="NamaPengguna">Nama Pengguna:</label>
      <input type="text" class="form-control" id="NamaPengguna" placeholder="Enter Nama kamu" name="NamaPengguna" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" autocomplete="off" required>
    </div>
	<button type="submit" class="btn btn-primary" name="Blogin">Login</button>
  </form>
</div>
</body>
</html>
<?php
 if (isset($_POST['Blogin'])) {
	 $kon=mysqli_connect("localhost","root","","ahp");
	 $NamaPengguna=filter_var($_POST['NamaPengguna'],FILTER_SANITIZE_STRING);
	 $Password=filter_var($_POST['pswd'],FILTER_SANITIZE_STRING);
	 $sql="select * from pengguna where NamaPengguna='".$NamaPengguna."' and Password='".$Password."'";
	 $q=mysqli_query($kon,$sql);
	 $r=mysqli_fetch_array($q);
	 if (!empty($r)) {
		 if (!isset($_SESSION)) session_start();
		 $sessionname='ahp'.date('Ymd');
		 $_SESSION[$sessionname]=date('YmDHis');
		 echo "<script>window.location.href='menuutama.php';</script>";
	 } else {
		 echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <center><strong>Gagal Login !</strong> Selamat anda kena prank !.
  <strong>Jangan begitu ya lain kali !</center>
</div>';
	 }	 
 }
?>
