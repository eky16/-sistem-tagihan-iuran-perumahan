<!DOCTYPE html>
<html>
<head>
<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
    </head>

    <body>
    <div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<div class="wrap">
							<h5 class="text-center mb-4">Login Now</h5>
							<div class="login p-5 bg-dark mx-auto mw-100">
								<form action="ceklogin.php" method="post">
									<div class="form-group">
										<label class="mb-2">Email address</label>
										<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
									<div class="form-group">
										<label class="mb-2">Password</label>
										<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
									</div>
									<div class="form-check mb-2">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">Check me out</label>
									</div>
									<button type="submit" name="login" class="btn btn-primary submit mb-4"> Sign In</button>
									<button type="submit" name="login" class="btn btn-primary submit mb-4"> Register</button>
								</form>
							</div>
							
						</div>
					</div>
