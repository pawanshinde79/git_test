<div class="content-wrapper">
      <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i><?php echo form_label('Configuration');?> </a></li><i class="fa fa-arrow-right" style="font-size:12px;"></i>&nbsp;<li class="active"> <?php echo form_label('Module Settings');?> </li>
          </ol><a class="btn btn-primary btn-flat" href="<?php echo base_url()?>admin_modules/add/" ><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;Add New</a>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row" align="center">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">
        <?php echo message($this->session->userdata('msg'));?> 
        <div align="center">
          <div class="col-md-8 col-md-offset-2">
          <div class="row">
           <div  class="error"><?php echo validation_errors()?></div>
            <div class="clearfix"></div>
<!-----------------------------------Search Field------------------------------------------------------------------->  
<div align="center">
    <form class="form"  method="post" id="module_form" >
        <table class="table table-bordered table-condensed" style="padding:0px;margin:0px;">
          <thead>
              <tr>
              <th width="148" align="center" style="vertical-align:middle !important;"><label class="col-md-12 text-right">Search By Module Name</label></th>
              <th width="179" align="center" style="vertical-align:top !important;">
              <input type="text" class="form-control input-sm" name="module_name" style="margin:0px;"  placeholder="--Search By Module Name--" value="<?php echo $this->session->userdata('module_name')?>"/></th>              
             <th width="154">
              <input type="button" class="btn btn-primary btn-sm" name="clear" style="margin:0px !important;" 
              onclick="document.getElementById('module_form').submit();" value="Clear" />
              <input type="submit" class="btn btn-success btn-sm" name="search" style="margin:0px !important;"  value="Search" />
               <input type="button" class="btn btn-danger btn-sm" name="show_all" style="margin:0px !important;" 
               onclick="window.location='<?php echo  base_url()?>admin_modules/show_all/'"  value="Show All" /></th>
              </tr>
           </thead>
        </table>
        </form>
        </div>
 <!-----------------------------------Content Section------------------------------------------------------------------->    
  
          </div>
        </div>
      
<div class="clearfix"></div>
                  <table id="example1" style="width:100%" class="table table-condensed table-bordered table-striped">
                    <thead>
                      <tr class="info">
                      <th width="2%">#</th>
                      <th width="38%" style="text-align:left">MODULE NAME</th>
                      <th width="18%" style="text-align:left">MAX ROWS IN GRID</th>
                      <th width="17%" style="text-align:left">DATE FORMAT</th>
                      <th width="17%" style="text-align:left">DEFAULT TEMPLATE</th>
                      <th width="8%">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
       <?php
	   if(is_array($aGridContent) && !empty($aGridContent)){
		   $i=1;
		   foreach($aGridContent as $row){
		   ?>
			<tr>
			  <td><?php echo $i++ ?></td>
			  <td style="text-align:left"><?php echo $row->module_name;?> </td>
              <td style="text-align:left"><?php echo $row->max_rows;?> </td>
              <td style="text-align:left"><?php echo $row->date_display;?> </td>
              <td style="text-align:left"><?php echo $row->template_name;?> </td>
			  <td width="8%">			  
              <img src="<?php echo $this->config->item('edit_image');?>"  title="Edit" class="edit" onclick="window.location='<?php echo base_url()?>admin_modules/edit/<?php echo $row->module_setting_id?>'"/>
              
			  </td>
			</tr>
			 <?php
		   } } else if(is_array($aGridContent) && empty($aGridContent)){
			?>
            <tr><td colspan="7" align="center">No Records Found.</td></tr>
            <?
	   }
		?>
      </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
              
            </div><!-- /.col -->
          </div><!-- /.row -->
</div>
        </section><!-- /.content -->
      </div>
      