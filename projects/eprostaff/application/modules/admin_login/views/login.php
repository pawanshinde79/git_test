<?php //$site=get_app_setting(); ?>
<div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url()?>admin_login/"><img src="<?php echo base_url()?>assets/images/psol_logo.png" alt="Persistent Solution LLC" /></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <h4 class="login-box-msg">Administrator Login</h4>
        <form method="post">
        <p class="error"><?php echo $this->session->userdata('msg') ?></p>
         <div class="form-group has-feedback">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <a href="<?php echo base_url() ?>admin_login/forgot_password">Forgot Password</a><br>
            </div><!-- /.col -->
            <div class="col-xs-4">
             
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" name="submit" id="submit" />
            </div><!-- /.col -->
          </div>
        </form>
	</div>
    </div>
    <?php put_js(); ?>
    <script type="text/javascript">
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>