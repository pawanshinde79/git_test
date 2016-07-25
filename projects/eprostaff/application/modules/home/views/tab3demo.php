<?php include "header.php";?>


<div class="container-fluid countspace" id="work">
	<div class="container">
	<div class="row">
    <div class="col-md-12 title">
   <h3> Epro can be the best choice for your organization HR all in one software.</h3>
    <h4>Request a demo to see how Epro can help you.</h4>    </div>

        <form name="frm_submitquote" id="frm_submitquote" method="GET">
            <div class="col-md-12 countbg">
                <div class="col-xs-12 col-sm-3 col-md-1"></div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="counter-item">
                        <input type="text" name="txt_firstName" id="txt_firstName" class="form-control isAlpha" placeholder="Firstname" required/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="counter-item">
                        <input type="text" name="txt_lastName" id="txt_lastName" class="form-control isAlpha" placeholder="Lastname" required />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="counter-item">
                        <input type="email" name="txt_email" id="txt_email" class="form-control" placeholder="Email" required />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="counter-item">
                        <input type="text" name="txt_cmpName" id="txt_cmpName" class="form-control isAlphaNumber" placeholder="Company Name" required />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="counter-item">
                        <input type="text" name="txt_phoneNo" id="txt_phoneNo" class="form-control isNumber" maxlength="12" placeholder="Phone" required  />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-1"></div>
                <div class="col-md-2 col-md-offset-5 text-box">
                    <button type="submit" name="btn_submitSchedule" id="btn_submitSchedule" value="sendEmail" class="form-control btn-primary" style="margin-top:42px;margin-bottom:30px;">View Demo</button>
                </div>
            </div>
        </form>
	</div>
</div>
</div>
		
<?php include 'footer.php';?>
