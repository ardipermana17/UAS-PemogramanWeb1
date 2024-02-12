<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Login</title>
	<link href="css/styles.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
	<style>
		body {
			background-image: url("assets/img/bg-login.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}

		.link {
			color: blue;
			text-decoration: none;
			font-size: 10pt;
			text-align: right;
		}

		.alert {
			background: #e44e4e;
			color: white;
			padding: 10px;
			text-align: center;
			border: 1px solid #b32929;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<div class='alert'>Username dan Password Salah !</div>";
		}
	}
	?>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card shadow-lg mt-5 bg-body-secondary">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 text-center">Form Login</h1>
							<form method="POST" action="cek_login.php" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3 mt-3">
									<label class="mb-2 text-muted" for="user">Username:</label>
									<input id="user" type="text" class="form-control" name="username" value="" placeholder="Username..." required="required" autofocus>
								</div>

								<div class="mb-3 mt-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password:</label>
										<input id="password" type="password" class="form-control" name="password" placeholder="password..." required="required">
									</div>
									<div class="mt-3 w-100" style="text-align: center;">
										<button type="submit" class="btn btn-primary ms-auto bg-success container-fluid">
											Masuk
										</button>
									</div>
									<div class="mt-3" style="text-align: right;">
										<a class="link" href="register.php">Register</a>
									</div>
								</div>

							</form>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						<h6 style="color:antiquewhite">Copyright &copy; Ardi Permana (18111406) TIF RM 221MA</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>