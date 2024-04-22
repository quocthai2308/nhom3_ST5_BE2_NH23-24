<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sign in/up Form</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
	<!-- <link rel="stylesheet" href="./style.css"> -->
	<link rel="stylesheet" href="<?php echo e(asset('app\css\style.css')); ?>">
</head>

<body>
	<?php if(session('success')): ?>
	<div class="alert alert-success">
		<?php echo e(session('success')); ?>

	</div>
	<?php endif; ?>


	<!-- partial:index.partial.html -->
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<!-- Form đăng ký -->
			<form action="<?php echo e(route('register')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="text" placeholder="Name" name="name" />
				<input type="email" placeholder="Email" name="email" />
				<input type="password" placeholder="Password" name="password" />
				<input type="password" placeholder="Confirm Password" name="password_confirmation" />
				<button type="submit">Sign Up Dang Ky</button>

			</form>

		</div>
		<div class="form-container sign-in-container">
			<!-- Form đăng nhập -->
			<form action="<?php echo e(route('login')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="email" placeholder="Email" name="email" />
				<input type="password" placeholder="Password" name="password" />
				<button type="submit">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<!-- partial -->
	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");

		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>

</body>

</html><?php /**PATH D:\Thuận HK4\BE2\LamNhom\nhom3_ST5_BE2_NH23-24\resources\views/auth/login.blade.php ENDPATH**/ ?>