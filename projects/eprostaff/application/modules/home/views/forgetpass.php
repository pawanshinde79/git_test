<?php include 'header.php'; ?>

<div class="col-md-12 backglogin">
	<div class="col-md-4 col-md-offset-4 inner col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
		<div class="text">
               <h3>Forgot your password ? </h3>
               <h6><p>Please enter the email address registered on your account.</p></h6>
                <form name="resetPassForm" id="resetPassForm" method="post">
                 	<input type="email" name="txtEmail" id="txtEmail" placeholder="Email" class="form-control" required ><br>
                    <button name="btnSubmit" value="resetPassword" class="form-control btn-primary" style="margin-top:10px;" >Reset password</button>
                </form>
		</div>
  	</div>
</div>

<?php include 'footer.php'; ?>