<?php //$site=get_app_setting(); ?>
<div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url()?>admin/"><img src="<?php echo base_url()?>assets/images/spiTech_logo.png" alt="Persistent Solution LLC" /></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <h4 class="login-box-msg">Retrieve Your Password</h4>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Get Password</button>
            </div><!-- /.col -->
             <div class="col-xs-5 col-sm-5 pull-right">
              <a href="<?php echo base_url(); ?>admin_login/" class="btn btn-default btn-block btn-flat">Back to Login</a>
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