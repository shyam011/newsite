<?php
include_once 'entrypoint.php';
checklogin('admin');
ini_set('display_errors',1);
error_reporting(E_ALL);
$data = json_decode(usersClass::getUser());

include 'include/head.php';
include 'include/header.php';
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Users</h3>
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
                    <h2>All Users List</small></h2>
                    <a href="<?php echo SITE_URL_ADMIN?>edituser.php" class="btn btn-sm btn-primary pull-right">Add User</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Gander</th>
                          <th>Status</th>
                          <th>User Type</th>
                          <th>Created On</th>
                          <th>Updated On</th>
                          <th>Tools</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach($data->data as $r): ?>
                        <tr>
                          <td><?php echo $r->fname.' '.$r->lname?></td>
                          <td><?php echo $r->email;?></td>
                          <td><?php echo $r->gender;?></td>
                          <td><?php echo $r->status;?></td>
                          <td><?php echo $r->user_type;?></td>
                          <td><?php echo $r->created_at;?></td>
                          <td><?php echo $r->updated_at;?></td>
                          <td><a href="<?php echo SITE_URL_ADMIN;?>edituser.php?id=<?php echo $r->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
                        </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->
    <?php include 'include/footer.php';?>
