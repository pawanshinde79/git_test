<?php
function CurrentMenu($menu,$SelectedMenu){
$class='';
if($SelectedMenu==$menu)
$class='active';					  
return $class;					
}	
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"> <img src="<?php echo base_url()?>assets/images/user.ico" class="img-circle" alt="User Image"> </div>
      <div class="pull-left info">
        <p>Admin Name</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php echo CurrentMenu("Dashboard",$SelectedMenu)?>"> <a href="<?php echo base_url();?>admin_dashboard/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>
      
      
           
      <li class="treeview <?php echo CurrentMenu("Users",$SelectedMenu)?>"> <a href="#"> <i class="fa fa-users"></i> <span>Users</span><i class="fa fa-angle-left pull-right"></i> </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url() ?>admin_users/">User List</a></li>
        <li><a href="<?php echo base_url() ?>admin_users/add/"> Add User</a></li>
        <li><a href="<?php echo base_url() ?>admin_log/">User Log</a></li>
      </ul>
      </li>
       <?php if($this->session->userdata('logged_in_role')=="super_admin"){?>
      <li class="treeview <?php echo CurrentMenu("Configuration",$SelectedMenu)?>"> <a href="#"> <i class="fa fa-users"></i> <span>Configuration</span><i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
        
          <li><a href="<?php echo base_url() ?>admin_modules/">Module Setting</a></li>
          <li><a href="<?php echo base_url() ?>admin_site_setting/">Site Setting</a></li>
          <li><a href="<?php echo base_url() ?>admin_category/">User Category Setting</a></li>
          
          
        </ul>
      </li>
      <?php } ?>          
    </ul>
  </section>
  <!-- /.sidebar --> 
</aside>
