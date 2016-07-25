<?php include "header.php"; ?>
    <style>
        body{
          background-image:url(<?=base_url();?>assets/images/bg.jpg);background-position: top center;
          background-repeat: no-repeat;
          background-size: cover;
        }
    </style>


    <div class="col-md-12 backg" >
      <p class="intro">The Complete Business Process Management</p>
      <div class="col-md-4 col-md-offset-1 inner col-xs-10  col-sm-6 ">
        <div class="text-box">
          <h3>Schedule a Demo</h3>
          <form name="frm_submitquote" id="frm_submitquote" method="GET" >
            <input type="text" name="txt_firstName" id="txt_firstName" placeholder="Firstname" class="form-control isAlpha" required />
            <input type="text" name="txt_lastName" id="txt_lastName" placeholder="Lastname" class="form-control isAlpha" required />
            <input type="text" name="txt_email" id="txt_email" placeholder="Email" class="form-control" required />
            <input type="text" name="txt_cmpName" id="txt_cmpName" placeholder="Company Name" class="form-control isAlphaNumber" />
            <input type="text" name="txt_phoneNo" id="txt_phoneNo" placeholder="Phone" class="form-control isNumber" maxlength="12" required />
            <input type="text" name="txt_comment" id="txt_comment" placeholder="Comments" class="form-control isAlphaNumber" required />
            <button type="submit" name="btn_submitSchedule" id="btn_submitSchedule" value="sendEmail" class="form-control btn-primary" >Get Started </button>
          </form>
        </div>
      </div>
      <div class="col-md-8"></div>


    </div>

    <!--Time Tracking  start-->
    <div class="col-md-12 mainpgtab1"  >
          <div class="col-md-10 col-md-offset-1" style="padding-left:0px;">
            <div id="toggleText">

        <ul class="nav nav-tabs " >

        <li class="mene1" ><a data-toggle="tab" href="#home" style="color:#000" >Time Tracking</a></li>
        <li class="mene2"><a data-toggle="tab" href="#menu1" style="color:#000" >Accounting</a></li>
        <li class="mene3"><a data-toggle="tab" href="#menu2" style="color:#000">Professional Services Automation Module (PSAM)</a></li>
        <li class="mene4"><a data-toggle="tab" href="#menu3" style="color:#000">Talent HR Management</a></li>

      </ul>

      <div class="tab-content margin20bottom">
        <div id="home" class="tab-pane fade in active homa" style="background:white;color:black;">
         <div class="imgdiv"><img src="<?=base_url();?>assets/images/1.png" class="img-responsive"  /></div>
          <div><h3>Time Tracking</h3>
          <p>With Epro Time tracking, organizations can reduce labor costs, minimize compliance risks, and increase worker productivity. We automate the process where managers, administrators, employees can access anytime, anywhere.</p></div>
        </div>
        <div id="menu1" class="tab-pane fade in acc">
         <div class="imgdiv"><img src="<?=base_url();?>assets/images/2.png" class="img-responsive"  /></div>
          <div><h3>Accounting</h3>
          <p>Easy, Accurate, Flexible for HR Administrators to work on payroll solutions, invoices,W2, Tax elections and many more financial operations ensuring all the user privileges , security needs and perfect snapshot with one click of a button.</p>
    </div>    </div>
        <div id="menu2" class="tab-pane fade in ps">
         <div class="imgdiv"><img src="<?=base_url();?>assets/images/3.png" class="img-responsive"  /></div>
          <h3>Professional Services Automation Module</h3>
          <p>This Module will facilitate Paperless Onboarding, Immigration & Legal compliance and documentation portal. Gaining real time insight into overall performance.</p>
        </div>
        <div id="menu3" class="tab-pane fade in hrr">
         <div class="imgdiv"><img src="<?=base_url();?>assets/images/4.png" class="img-responsive"  /></div>
          <h3 >Talent HR Management</h3>
          <p style="padding: 6px 30px 39px 0px;">This module will be easy and organized for Hiring, recruiting, marketing, on-boarding, performance review, feedbacks.</p>
        </div>


    </div>
    </div></div><div class="col-md-1"></div>
    </div>
    <!--Time Trackind ends-->

<?php include "footer.php"; ?>
