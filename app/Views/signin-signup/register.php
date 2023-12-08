<!DOCTYPE html>
<html>


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
	<?php $page_session = \Config\Services::session(); ?>
	<div class="container-fluid">
		<div class="row ">
			<!-- IMAGE CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
			<!-- IMAGE CONTAINER END -->

			<?php
			if ($page_session->getTempdata('success')) :
			?>
				<div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>
			<?php endif; ?>
			<?php
			if ($page_session->getTempdata('error')) :
			?>
				<div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
			<?php endif; ?>

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<a href="/"><img src="<?= base_url() ?>signin/archivez3.png" width="150px"></a>
					</div>
					<div class="text-center mb-4">
						<h4>Register new account</h4>
					</div>
					<!-- Form -->
					<form action="/register" method="POST" class="px-3">
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" name="firstname" placeholder="First Name" tabindex="10" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" name="lastname" placeholder="Last Name" tabindex="10" required>
						</div>
						<div class="form-input">
							<select name="usertype" id="usertype" required>
								<option value="">User Type</option>
								<option value="student">Student</option>
								<option value="instructor">Instructor</option>
								<option value="admin">Admin</option>
							</select>
						</div><br>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email" tabindex="10" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Password" required>
						</div>

						<!-- Login Button -->
						<div class="mb-3">
							<button type="submit" name="signup" id="signup" class="btn btn-block form-submit">Register</button>
						</div>
						<div class="text-right ">
						</div>
						<div class="text-center mb-2">
							<div class="text-center mb-5 text-grey">Already have an account?
								<a class="register-link" href="/logins">Log in</a><br>
								<a class="register-link" href="/">Back to Home</a>

							</div>
					</form>
				</div>
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
</body>


</html>