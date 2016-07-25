<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 11/7/16
 * Time: 1:26 PM
 */ ?>
<?php include "header.php"; ?>
<div class="col-md-12 backglogin">
    <div class="col-md-4 col-md-offset-4 inner col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
        <div class="text">
            <h2>Change Password</h2>
            <form name="frm_chnagePass" id="frm_chnagePass" method="post">
                <input type="password" name="txtNewpass" id="txtNewpass" placeholder="New Password" class="form-control" required ><br>
                <input type="password" name="txtConfirPass" id="txtConfirPass" placeholder="Confirmed password" class="form-control" required><br>
                <button class="form-control btn-primary" style="margin-top:10px;" type="submit" name="btnChangePass" value="changePass" >Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

