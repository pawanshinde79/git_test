<div class="content-wrapper">
         <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i> Users</a></li><i class="fa fa-arrow-right" style="font-size:12px;"></i>
            <li class="active">Profile</li>
          </ol>
        
        </section>
<div class="clearfix"></div>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/images/user.ico" alt="User profile picture">
                  <h3 class="profile-username text-center">My Name</h3>
                  <p class="text-muted text-center">My Post</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Mobile</b> <a class="pull-right">+91 - 9988776655</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right">admin@gmail.com</a>
                    </li>
                    
                  </ul>
				</div><!-- /.box-body -->
              </div><!-- /.box -->
			</div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#personal" data-toggle="tab">Personal Info</a></li>
                  <li><a href="#educational" data-toggle="tab">Educational Info</a></li>
                  <li><a href="#change_pass" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="personal">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="first_name" name="first_name" placeholder="First Name" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" readonly="readonly" placeholder="Email" />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" class="btn btn-success" value="Submit" name="submit" id="submit" />
                        </div>
                      </div>
                    </form>
                    </div><!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="educational">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="hsc" class="col-sm-2 control-label">HSC</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="hsc" name="hsc" placeholder="HSC Marks" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ssc" class="col-sm-2 control-label">SSC</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="ssc" name="ssc" placeholder="SSC Marks" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="graduation" class="col-sm-2 control-label">Graduation</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="graduation"  name="graduation" placeholder="Graduation"  />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="graduation" class="col-sm-2 control-label">Post Graduation</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="post_graduation"  name="post_graduation" placeholder="Post Graduation"  />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="other" class="col-sm-2 control-label">Other</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="other" name="other" placeholder="Other" />
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" class="btn btn-success" value="Submit" name="submit" id="submit" />
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="change_pass">
                    <form class="form-horizontal">
                       <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" readonly="readonly" placeholder="Email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="new_password" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="re_password" class="col-sm-2 control-label">Repeat Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Repeat Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" class="btn btn-success" value="Submit" name="submit" id="submit" />
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                  
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div>
      