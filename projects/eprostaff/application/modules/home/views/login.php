<?php include "header.php"; ?>

<div class="col-md-12 backglogin">
	<div class="col-md-4 col-md-offset-4 inner col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
		<div class="text">
			<h2>Log In</h2>

			<form name="loginForm" id="loginForm" method="POST">
				<input type="email" name="txtEmail" id="txtEmail" placeholder="Email" class="form-control" required ><br>
				<input type="password" name="txtPassword" id="txtPassword" placeholder="Password" class="form-control"  required ><br>
				<button type="submit" name="btnSubmit" id="btnSubmit" value="loginBtn" class="form-control btn-primary" style="margin-top:10px;" >Login</button>
				<div class="login-help">
					<a href="<?=base_url();?>home/user_manager_ci/forgetpass" style="float:left" >Forgot Password</a>
					<a href="<?=base_url();?>home/user_manager_ci/register" style="float:right">Sign Up </a>
				  </div>
			</form>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>
        
