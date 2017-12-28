<?php
include_once 'entrypoint.php';
checklogin('admin');


if( isset($_POST) && $_POST['update_user'] ){
	$fld = array(
				'email'		=> $_POST['email'],
				'gender'	=> $_POST['gender'],
				'status1'	=> $_POST['status'],
				'fname'		=> $_POST['fname'],
				'lname'		=> $_POST['lname'],
				'user_type'	=> $_POST['user_type'],
				'updated_at'=> date('Y-m-d H:i:s'),
				);

	$up = json_decode( users::setUser($fld, $_GET['id']) );
	
	if($up->success === true){
	}else{
		$msg = showMessage($up->msg,'danger');
	}
}


if( isset($_GET['id']) && is_numeric($_GET['id']) ){
	$record = $_GET['id'];
	$uData = json_decode(users::getUser($record));

	if($uData->success === true){

		if( sizeof($uData->data) > 0 ){
			$data = $uData->data[0];
		}else{
			$msg = showMessage("Record not found.",'danger');
			echo '<meta http-equiv="refresh" content="1; url='.SITE_URL_ADMIN.'dashboard.php">';
		}
	}else{
		$msg = showMessage($uData->msg,'danger');
		echo '<meta http-equiv="refresh" content="1; url='.SITE_URL_ADMIN.'dashboard.php">';
	}
}

echo "<pre>";print_r($_POST);echo "</pre>";
//$a = new users();
//echo $a->setUser(array('fname'=>'SH"YAM'),1);

include 'include/head.php';
include 'include/header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit User</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="user_form" method="post" data-parsley-validate class="form-horizontal form-label-left">
	<?php echo @$msg;?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fname" name="fname" required="required" value="<?php echo @$data->fname?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="lname" name="lname" required="required" value="<?php echo @$data->lname?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" required="required" value="<?php echo @$data->email?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="status" name="status" class="form-control col-md-7 col-xs-12" required>
                            <option value="">Choose..</option>
                            <option value="Active" <?php echo (@$data->status == 'Active')?'SELECTED':''?>>Active</option>
                            <option value="Pending" <?php echo (@$data->status == 'Pending')?'SELECTED':''?>>Pending</option>
                            <option value="Inactive" <?php echo (@$data->status == 'Inactive')?'SELECTED':''?>>Inactive</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_type" class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="user_type" name="user_type" class="form-control col-md-7 col-xs-12" required>
                            <option value="">Choose..</option>
                            <option value="Admin" <?php echo (@$data->user_type == 'Admin')?'SELECTED':''?>>Admin</option>
                            <option value="Member" <?php echo (@$data->user_type == 'Member')?'SELECTED':''?>>Member</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="radio">
                            <label>
                              <input type="radio" class="flat" value="Male" <?php echo (@$data->gender == 'Male' || @$data->gender == '')?'checked':''?> name="gender"> Male
                            </label>
<!--                           </div>
                          <div class="radio">
 -->                            <label>
                              <input type="radio" class="flat" value="Female" <?php echo (@$data->gender == 'Female')?'checked':''?>  name="gender"> Female
                          <input type="text" name="update" value="Submit">
                            </label>
                          </div>

                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <!--<button class="btn btn-primary" type="reset">Reset</button>-->
                          <input type="Submit" name="update_user" class="btn btn-success" value="Submit" />
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
    <?php include 'include/footer.php';?>
