<?php
	session_start();
	require_once 'config.php';

	$alert = '';
	if (isset($_POST['login'])) {
		if ($_POST['username'] == adminUsername && $_POST['password'] == adminPass) {
			$_SESSION['login-admin'] = adminUsername . ':' . adminPass;
			$alert = '<div class="alert alert-success">در حال وارد شدن به سیستم هستید...</div>';
			header ('refresh:1; url=./');
		}
		else {
			$alert = '<div class="alert alert-danger">نام کاربری یا گذرواژه اشتباه است...</div>';
		}
	}
?>	

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>URl Shortner | کوتاه کننده لینک</title>
	<link rel="stylesheet" href="themes/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="themes/css/style.css">
	<script src="themes/js/jquery.min.js"></script>
	<script src="themes/js/script.js" defer></script>
</head>
<body class='p-3'>
	<div class="m-auto w-100 mt-2 rounded-4 p-3" id="form_shortner">
		<form action="" method="post" class="form-signin m-auto">
			<div class="form-floating">
				<input type="text" class="form-control" name="username"
				id="username" placeholder="example.com" autofocus>
				<label for="username">نام کاربری</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" dir="ltr"
				name="password" id="password" placeholder="Password">
				<label for="password">رمز عبور</label>
			</div>

			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox"
				id="remember">
				<label class="form-check-label" for="remember">
				مرا به خاطر بسپار</label>
			</div>

			<div><?php echo $alert; ?></div>
			<button class="btn btn-primary w-100 py-2" type="submit" name="login">ورود به سیستم</button>
		</form>
	</div>
</body>
</html>