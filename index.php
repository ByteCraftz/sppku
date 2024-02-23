<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Aplikasi SPP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #afc;
	background-image: url(logo/background.jpg);
	}

	.form-signin {
	max-width: 330px;
	padding: 15px;
	margin: 0 auto;
	color: #000;
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
	margin-bottom: 10px;
	text-align: center;
	}
	.form-signin .checkbox {
	  font-weight: normal;
	}
	.form-signin .form-control {
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
		 -moz-box-sizing: border-box;
			  box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 2;
	  border-bottom-left-radius: 2;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 2;
	  border-top-right-radius: 2;
	}
	</style>
	
</head>

<body>

<div class="container" border="1">
	<?php
	include "koneksi.php";

	if( isset( $_REQUEST['submit'] ) ){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

		// Use mysqli_query instead of mysql_query
		$sql = "SELECT iduser,username,admin,fullname FROM user WHERE username='$username' AND password=md5('$password')";
		$result = mysqli_query($connection, $sql);

		if( mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_array($result);
			
			//session_start();
			$_SESSION['iduser'] = $row['iduser'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['admin'] = $row['admin'];
			$_SESSION['fullname'] = $row['fullname'];
			
			header("Location: ./admin.php");
			die();
		} else {
			//$err = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
			//header('Location: ./?err='.urlencode($err));
			
			$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
			header('Location: ./');
			die();
		}
	} else {
	?>
      <form class="form-signin" method="post" action="" role="form" border="1">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>
	  
    </div> <!-- /container -->
<?php } ?> <!-- Penutup tag PHP -->

</body>
</html>
