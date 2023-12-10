<!DOCTYPE html>
<html>

<!-- Mirrored from techzeero.com/html-templates/login-forms/impressive-login-form/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Nov 2023 07:53:47 GMT -->

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?= base_url() ?>signin/css-login/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>signin/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="<?= base_url() ?>signin/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="<?= base_url() ?>signin/code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>landingpage/img/archivezLogo1.png">

</head>

<body>
	<div class="container-fluid">
		<div class="row ">
			<!-- IMAGE CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<a href="/"><img src="<?= base_url() ?>signin/archivez3.png" width="150px"></a>
					</div>
					<div class="text-center mb-4">
						<h4>Log in to your Account</h4>
					</div>
					<!-- Form -->
					<form action="/loginauth" method="post" class="px-3">
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email" tabindex="10" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="row mb-3">
							<!-- Remember Checkbox -->

						</div>
						<!-- Login Button -->
						<div class="mb-3">
							<button type="submit" class="btn btn-block">Login</button>
						</div>
						<div class="text-right ">
						</div>
						<div class="text-center mb-2">
							<div class="text-center mb-5 text-grey">Don't have an account?
								<a class="register-link" href="/signupview">Register</a><br>
								<a class="register-link" href="/">Back to Home</a>

							</div>
					</form>
				</div>
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
</body>

<!-- Mirrored from techzeero.com/html-templates/login-forms/impressive-login-form/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Nov 2023 07:53:51 GMT -->

</html>