<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Register</title>
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
	</style>
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card shadow-lg mt-5 bg-body-secondary">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 text-center">Form Register</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3 mt-3">
									<label class="mb-2 text-muted" for="nama">Nama Lengkap:</label>
									<input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Lengkap..." required autofocus>
								</div>

								<div class="mb-3 mt-3">
									<label class="mb-2 text-muted" for="username">Username:</label>
									<input id="username" type="text" class="form-control" name="username" placeholder="Username..." required>
								</div>

								<div class="mb-3 mt-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password:</label>
										<input id="password" type="password" class="form-control" name="password" placeholder="Pasword..." required>
									</div>
									<div class="mb-3 mt-3">
										<label class="mb-2 text-muted" for="level">Level:</label>
										<select id="level" name="level" class="form-control" required>
											<option value="admin">admin</option>
											<option value="user">user</option>
										</select>
									</div><br>
									<div class="mt-4 w-100">
										<button type="submit" name="tambahmultiuser" class="btn btn-primary ms-auto bg-success" style="float:left">
											Daftar
										</button>
										<button type="button" class="btn btn-primary ms-auto bg-danger" style="float:right">
											<a href="index.php" style="color: white; text-decoration: none;">Kembali</a>
										</button>
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