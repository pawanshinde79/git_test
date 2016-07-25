<?=include 'header.php';?>

<div class="container-fluid main" id="login">
	<div class="row">
		<div class="col-md-12 backglogin">
			<div class="col-md-4 col-md-offset-4 inner col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
				<div class="text">
                	<h2>Sign up</h2>
                    
                    <form name="frm_signUp" id="frm_signUp" method="GET">
                    	<input type="text" name="txtFirstName" id="txtFirstName" placeholder="Firstname " class="form-control isAlpha" maxlength="20" required ><br>
                        <input type="text" name="txtLastName" id="txtLastName" placeholder="Lastname " class="form-control isAlpha" maxlength="20" required ><br>
                        <!--<input type="text" name="txtCmpName" id="txtCmpName" placeholder="Company Name" class="form-control isAlphaNumber" maxlength="50" required ><br>-->
                        <select name="txtCmpName" id="txtCmpName" class="form-control" required >
                            <option value="">-- Choose Company --</option>
                            <option value="CSSdemoclient1">CSSdemoclient1</option>
                            <option value="CSSdemoclient2">CSSdemoclient2</option>
                            <option value="CSSdemoclient3">CSSdemoclient3</option>
                            <option value="CSSdemoclient4">CSSdemoclient4</option>
                            <option value="CSSdemoclient5">CSSdemoclient5</option>
                        </select>
                        <br>
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" class="form-control" required ><br>
                        <input type="text" name="txtPhone" id="txtPhone" placeholder="Phone" class="form-control isNumber" maxlength="12" required ><br>
                        <input type="text" name="txtAddress" id="txtAddress" placeholder="Address" class="form-control" required ><br>
                        <button type="submit" name="btn_signup" id="btn_signup" value="btnRegister" class="form-control btn-primary" style="margin-top:10px;" >Sign up</button>
                    </form>
				</div>
  			</div>
		</div>
     </div>
</div>        

<?=include 'footer.php';?>
