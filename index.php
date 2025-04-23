<?php
	session_start();
	if (!isset($_SESSION['login-admin']))
	{
		header('location: login.php');
	}

	require_once 'config.php';

	$alert = '';
	if (isset($_POST['short']))
	{
		$endLink = $_POST['endLink'];
		$customLink = url . $_POST['customLink'];

		$sqlCheck = "SELECT * FROM links WHERE custom_link = '$customLink'"; 
		$result = $conn->query($sqlCheck);

		if ($result->num_rows > 0) {
			$alert = "<div class='alert alert-danger'>این لینک قبلا توسط شخص دیگری ثبت شده است.</div>";
		} 
		else {
			$sqlInsert = "INSERT INTO links(custom_link, end_link) VALUES ('$customLink', '$endLink')";
			$result = $conn->query($sqlInsert);
			$alert = "
				<div class='alert alert-success'>
					<div class='d-flex justify-content-between text-center'>
						<div>لینک با موفقیت ساخته شد.</div>
						<div style='cursor: pointer;' id='clipboard'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clipboard-check' viewBox='0 0 16 16'>
  								<path fill-rule='evenodd' d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0'/>
  								<path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z'/>
 								 <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z'/>
							</svg>
						</div>
					</div>
					<a href=$customLink id='customLinkCreated'>$customLink</a>
				</div>
			";
		}
	}

	if (!empty($_GET['url'])) {
		$customLink = url . $_GET['url'];
		$sqlFindEndUrl = "SELECT * FROM links WHERE custom_link = '$customLink'";
		$result = $conn->query($sqlFindEndUrl);
		$result = $result->fetch_assoc();
		$endLink = $result['end_link'];
		header("location: $endLink");
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
		<h1 class="text-center mb-2">کوتاه کننده لینک</h1>
		<form action="" method="post">
				<div class="badge bg-primary-subtle py-2 px-3 mb-1 border border-primary-subtle text-primary-emphasis">آدرس اصلی</div>
			<div class="form-floating mb-3">
				<input autofocus required type="url" class="form-control" name="endLink" id="endLink" placeholder="yasinrabiee.ir">
				<label for="username">آدرسی را که میخواهید کوتاه شود، وارد کنید</label>
			</div>
			<div class="mb-3">
				<div class="badge bg-primary-subtle py-2 px-3 mb-1 border border-primary-subtle text-primary-emphasis">آدرس دلخواه</div>
				<div class="input-group mb">
					<input type="text" dir="ltr" class="form-control" name="customLink" id="customLink" aria-describedby="basic-addon3 basic-addon4">
					<span class="input-group-text" id="basic-addon3" dir="ltr"><?= url ?></span>
				</div>
			</div>
			<div class="text-center">
				<div id="res"><?= $alert ?></div>
				<button type="submit" name="short" id="short" class="btn btn-primary">کوتاه کردن</button>
			</div>
		</form>
	</div>
</body>
</html>
