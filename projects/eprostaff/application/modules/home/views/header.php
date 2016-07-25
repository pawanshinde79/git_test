
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EPRO</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="<?=base_url();?>assets/styles/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?=base_url();?>assets/styles/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="<?=base_url();?>assets/styles/style.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url();?>assets/styles/alertMsg.css" type="text/css">
  <link href="<?=base_url();?>assets/styles/css/lightbox.css" rel="stylesheet">
   

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
   /* body{
      background-image:url(<?=base_url();?>assets/images/bg.jpg);background-position: top center;
      background-repeat: no-repeat;
      background-size: cover;
    }*/
  </style>
  <script src="<?=base_url();?>assets/scripts/js/jquery.min.js"></script>
  <script>
      $(document).ready(function(){
          function func1() {
        $('.mene1').addClass('active');
      }
      window.onload=func1;
        
          $("#time").click(function(){
               $('.mene1').addClass('active');
           $('.mene2').removeClass('active');  
           $('.mene3').removeClass('active');  
           $('.mene4').removeClass('active');
           $('.acc').removeClass('active');
           $('.ps').removeClass('active');  
          $('.hrr').removeClass('active');  
            
          $('.homa').addClass('active');
             
        });
        $("#account").click(function(){
          $('.mene2').addClass('active');
           $('.mene1').removeClass('active');
           $('.mene3').removeClass('active');
           $('.mene4').removeClass('active');
           $('.homa').removeClass('active');
           $('.ps').removeClass('active');  
          $('.hrr').removeClass('active');  
            
          $('.acc').addClass('active');
          
            
          });
        $("#psam").click(function(){
          $('.mene3').addClass('active');
          $('.mene1').removeClass('active');
          $('.mene2').removeClass('active');
          $('.mene4').removeClass('active');
              $('.homa').removeClass('active');
           $('.acc').removeClass('active'); 
          $('.hrr').removeClass('active');  
            
          $('.ps').addClass('active');
          });
        $("#hr").click(function(){
          $('.mene4').addClass('active');
          $('.mene1').removeClass('active');
          $('.mene2').removeClass('active');
          $('.mene3').removeClass('active');
              $('.homa').removeClass('active');
           $('.ps').removeClass('active');  
          $('.acc').removeClass('active');  
            
          $('.hrr').addClass('active');
          });
      });
</script> 
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var $_Tawk_API={},$_Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/578391edb33850ce08d83dd8/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<body>

<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ">
        <div class="navbar-header">
              <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
                  <span class="glyphicon glyphicon-align-justify"></span>
              </button>
                <a class="navbar-brand logo" href="<?=base_url();?>">EPRO Staff ERP System</a>
          </div>
      </div>
      <div class="col-md-8">
        <nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
          <ul class="nav navbar-nav navbar-right menu nav-pills">
            <li class="active">
                <div class="dropdown">
                    <a href="<?=base_url();?>">
                      <button class="dropbtn" type="button" name="btnEPRO">Why EPRO</button>
                    </a>
                    <div class="dropdown-content">
                        <a href="#home" id="time"> Time Tracking</a>
                        <a href="#menu1" id="account">Accounting</a>
                        <a href="#" id="psam">PSAM</a>
                        <a href="#" id="hr">Talent HR Management</a>
                    </div>
                </div>
            </li>
            <li><a href="<?=base_url();?>home/tab3demo">DEMO</a></li>
            <?php 
            $sessArray = $this->session->userdata('logged_in');
            if(!empty($sessArray['email'])) { ?>
                <li><a href="<?=base_url();?>home/user_manager_ci/logout_user" class="page-scroll">Logout</a></li>
            <?php }else { ?>
                <li><a href="<?=base_url();?>home/user_manager_ci/login" class="page-scroll ">Log In</a></li>
            <?php }?>

          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>