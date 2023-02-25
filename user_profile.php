<?php $page_title="Users Profile";
	
	include('includes/header.php'); 
	include('includes/function.php');
	include('language/language.php');

	error_reporting(0);
    
	$user_id=strip_tags(addslashes(trim($_GET['user_id'])));

	if(!isset($_GET['user_id']) OR $user_id==''){
		header("Location: manage_users.php");
	}

    $user_qry="SELECT * FROM tbl_users WHERE id='$user_id'";
    $user_result=mysqli_query($mysqli,$user_qry);

    if(mysqli_num_rows($user_result)==0){
    	header("Location: manage_users.php");
    }

    $user_row=mysqli_fetch_assoc($user_result);

    $user_img='';

	if($user_row['user_image']!='' && file_exists('images/'.$user_row['user_image'])){
		$user_img='images/'.$user_row['user_image'];
	}
	else{
		$user_img='assets/images/user-icons.jpg';
	}


    if(isset($_POST['btn_submit']))
    {

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $_SESSION['class']="warn";
            $_SESSION['msg']="invalid_email_format";
        }
        else{

            $email=cleanInput($_POST['email']);

            $sql="SELECT * FROM tbl_users WHERE `email` = '$email' AND `id` <> '".$user_id."'";

            $res=mysqli_query($mysqli, $sql);

            if(mysqli_num_rows($res) == 0){
                $data = array(
                    'name'  =>  cleanInput($_POST['name']),
                    'email'  =>  cleanInput($_POST['email']),
                    'phone'  =>  cleanInput($_POST['phone'])
                );

                if($_POST['password']!="")
                {

                    $password=md5($_POST['password']);

                    $data = array_merge($data, array("password"=>$password));
                }


                  if($_FILES['user_image']['name']!="")
               		 {

                    if($user_row['user_image']!="" OR !file_exists('images/'.$user_row['user_image']))
                    {
                        unlink('images/'.$user_row['user_image']);
                    }

                    $ext = pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION);

                    $user_image=rand(0,99999).'_'.date('dmYhis')."_user.".$ext;

                    //Main Image
                    $tpath1='images/'.$user_image;   

                    if($ext!='png')  {
                      $pic1=compress_image($_FILES["user_image"]["tmp_name"], $tpath1, 80);
                    }
                    else{
                      $tmp = $_FILES['user_image']['tmp_name'];
                      move_uploaded_file($tmp, $tpath1);
                    }

                    $data = array_merge($data, array("user_image" => $user_image));

                }

                $user_edit=Update('tbl_users', $data, "WHERE id = '".$user_id."'");

                $_SESSION['class']="success";
                $_SESSION['msg']="11";
            }
            else{
                $_SESSION['class']="warn";
                $_SESSION['msg']="email_exist";
            }
        }

        header("Location:user_profile.php?user_id=".$user_id);
        exit;
    }

  
 
 function get_cat_info($cat_id,$field_name) 
    {
      global $mysqli;

      $qry_cat="SELECT * FROM tbl_category WHERE cid='".$cat_id."'";
      $query1=mysqli_query($mysqli,$qry_cat);
      $row_cat = mysqli_fetch_array($query1);

      $num_rows1 = mysqli_num_rows($query1);

      if ($num_rows1 > 0)
      {     
        return $row_cat[$field_name];
      }
      else
      {
        return "";
      }
    } 

    function getLastActiveLog($user_id){
    	global $mysqli;

    	$sql="SELECT * FROM tbl_active_log WHERE `user_id`='$user_id'";
        $res=mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($res) == 0){
        	echo 'no available';
        }
        else{

        	$row=mysqli_fetch_assoc($res);
			return calculate_time_span($row['date_time'],true);	
        }
    }
   
?>

<link rel="stylesheet" type="text/css" href="assets/css/stylish-tooltip.css">
<style>
#applied_user .dataTables_wrapper .top{
	position: relative;
	width: 100%;
}	
</style>
  
<div class="row">
	<div class="col-lg-12">
		<?php
			if(isset($_GET['redirect'])){
	          echo '<a href="'.$_GET['redirect'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
	        }
	        else{
	         	echo '<a href="manage_users.php"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
	        }
		?>
		<div class="page_title_block user_dashboard_item" style="background-color: #333;border-radius:6px;0 1px 4px 0 rgba(0, 0, 0, 0.14);border-bottom:0">
			<div class="user_dashboard_item">
			  <div class="col-md-12 col-xs-12"> <br>
				<span class="badge badge-success badge-icon">
				  <div class="user_profile_img">
				  	<?php 
		                if($user_row['user_type']=='Google'){
		                  echo '<img src="assets/images/google-logo.png" style="width: 16px;height: 16px;position: absolute;top: 24px;z-index: 1;left: 62px;">';
		                }
		                else if($user_row['user_type']=='Facebook'){
		                  echo '<img src="assets/images/facebook-icon.png" style="width: 16px;height: 16px;position: absolute;top: 24px;z-index: 1;left: 62px;">';
		                }
		              ?>
					<img type="image" src="<?php echo $user_img;?>" alt="image" style=""/>
				  </div>
				  <span style="font-size: 14px;"><?php echo $user_row['name'];?>				
				  </span>
				</span>  
				<span class="badge badge-success badge-icon">
					<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
					<span style="font-size: 14px;text-transform: lowercase;"><?php echo $user_row['email'];?></span>
				</span> 
				<span class="badge badge-success badge-icon">
				  <strong style="font-size: 14px;">Registered At:</strong>
				  <span style="font-size: 14px;"><?php echo (date('d-m-Y',$user_row['created_at']));?></span>
				</span>
				<span class="badge badge-success badge-icon">
				  <strong style="font-size: 14px;">Last Activity On:</strong>
				  <span style="font-size: 14px;text-transform: lowercase;"><?php echo getLastActiveLog($user_id)?></span>
				</span>
				<br><br/>
			  </div>
			</div>
		</div>

		  <div class="card card-tab">
			<div class="card-header" style="overflow-x: auto;overflow-y: hidden;">
				<ul class="nav nav-tabs" role="tablist">
		            <li role="dashboard" class="active"><a href="#edit_profile" aria-controls="edit_profile" role="tab" data-toggle="tab">Edit Profile</a></li>
		            <li role="favourite_diets"><a href="#favourite_diets" aria-controls="favourite_diets" role="tab" data-toggle="tab">Favourite Diets</a></li>
		            <li role="favourite_video"><a href="#favourite_video" aria-controls="favourite_video" role="tab" data-toggle="tab">Favourite Video</a></li>
		            <li role="diets_recent"><a href="#diets_recent" aria-controls="diets_recent" role="tab" data-toggle="tab">Recent Diets</a></li>
		            <li role="recent_video"><a href="#recent_video" aria-controls="recent_video" role="tab" data-toggle="tab">Recent Video</a></li>
		            <li role="bmi_score"><a href="#bmi_score" aria-controls="bmi_score" role="tab" data-toggle="tab">BMI Score</a></li>

		        </ul>
			</div>
			<div class="card-body no-padding tab-content">
				<div role="tabpanel" class="tab-pane active" id="edit_profile">
					<div class="row">
						<div class="col-md-12">
							<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
					          <div class="section">
					            <div class="section-body">
					              <div class="form-group">
					                <label class="col-md-3 control-label">Name :-</label>
					                <div class="col-md-6">
					                  <input type="text" name="name" id="name" value="<?=$user_row['name']?>" class="form-control" required>
					                </div>
					              </div>
					              <?php if (!isset($_GET['user_id']) OR ($user_row['user_type']) == 'Normal') { ?>
					                  <div class="form-group"> 
					                    <label class="col-md-3 control-label">Email :-</label>
					                    <div class="col-md-6">
					                      <input type="email" name="email" id="email" value="<?php if(isset($_GET['user_id'])){echo $user_row['email'];}?>" class="form-control" required>
					                    </div>
					                  </div>
					                  <?php }else{?>
					                  	<div class="form-group">
					                    <label class="col-md-3 control-label">Email :-</label>
					                    <div class="col-md-6">
					                      <input type="email" name="email" id="email" readonly="" value="<?php if(isset($_GET['user_id'])){echo $user_row['email'];}?>" class="form-control" required>
					                    </div>
					                  </div>
					                  	<?php }?>
					                  <?php if (!isset($_GET['user_id']) OR ($user_row['user_type']) == 'Normal') { ?>
					                  <div class="form-group">
					                    <label class="col-md-3 control-label">Password :-</label>
					                    <div class="col-md-6">
					                      <input type="password" name="password" id="password" value="" class="form-control" <?php if(!isset($_GET['user_id'])){?>required<?php }?>>
					                    </div>
					                  </div>
					                 <?php }?>
					              <div class="form-group">
					                <label class="col-md-3 control-label">Contact No :-</label>
					                <div class="col-md-6">
					                  <input type="text" name="phone" id="phone" value="<?=$user_row['phone']?>" class="form-control">
					                </div>
					              </div>
				               		<div class="form-group">
					                <label class="col-md-3 control-label">Profile Image :-
					                <p class="control-label-help">(Recommended resolution: 100x100, 200x200) OR Squre image</p>
					                </label>
					                <div class="col-md-6">
					                  <div class="fileupload_block">
					                    <input type="file" name="user_image" value="fileupload" <?php echo (!isset($_GET['user_id'])) ? 'required="require"' : '' ?> id="fileupload" onchange="readURL(this);">
					                    <div class="fileupload_img">
					                    <?php 
					                      $img_src="";
					                      if(!isset($_GET['user_id']) || $user_row['user_image']==''){
					                          $img_src='assets/images/landscape.jpg';
					                      }else{
					                          $img_src='images/'.$user_row['user_image'];
					                      }
					                    ?>
					                    <img type="image" id="user_image" src="<?=$img_src?>" alt="image" id="ImdID" style="width: 100px;height: 100px;box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);border-radius: 6px;object-fit: cover;" />
					                    </div>   
					                  </div>
					                </div>
					              </div>
					     			<div class="form-group">
					                <div class="col-md-9 col-md-offset-3">
					                  <button type="submit" name="btn_submit" class="btn btn-primary">Save</button>
					                </div>
					              </div>
					            </div>
					          </div>
					        </form>
						</div>
					  </div>
					</div>

					<div role="tabpanel" class="tab-pane" id="diets_recent">
						<div class="row">
							<?php
							  $user_id=$_GET['user_id'];

							  //Favourite list    
							  $tableName="tbl_diets";   
							  $targetpage = "user_profile.php";   
							  $limit = 12; 
							  
							  $query = "SELECT COUNT(*) as num FROM tbl_recent WHERE tbl_recent.`user_id` = '".$user_id."'";
							  $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
							  $total_pages = $total_pages['num'];
							  
							  $stages = 1;
							  $page=0;
							  if(isset($_GET['page'])){
							  $page = mysqli_real_escape_string($mysqli,$_GET['page']);
							  }
							  if($page){
								$start = ($page - 1) * $limit; 
							  }else{
								$start = 0; 
							  }

							 $users_qry="SELECT * FROM tbl_recent
											 LEFT JOIN tbl_users ON tbl_recent.`user_id`= tbl_users.`id`
											 LEFT JOIN tbl_diets ON tbl_recent.`post_id`= tbl_diets.`id`
											 WHERE tbl_recent.`user_id` = '$user_id' AND tbl_recent.`recent_type` = 'diet'
											 ORDER BY tbl_recent.`re_id` DESC LIMIT $start, $limit";

							$user_result = mysqli_query($mysqli,$users_qry)or die(mysqli_error($mysqli));

							$i=0;
							while ($row=mysqli_fetch_assoc($user_result)){
							 ?>
							 <div class="col-lg-4 col-sm-6 col-xs-12">
								<div class="block_wallpaper" style="box-shadow:2px 3px 5px #333;">
								  <div class="wall_category_block">
								     <h2><?=ucwords(get_cat_info($row['cat_id'],'category_name'))?></h2>  
								   </div>   
									<div class="wall_image_title">
									<p><?php  if (strlen($row['diet_title']) > 40) {
										echo substr(stripslashes($row['diet_title']), 0, 40) . '...';
									} else {
										echo $row['diet_title'];
									}
									?></p>
									<ul>
										<li><a href="edit_diets.php?diet_id=<?php echo $row['id'];?>&redirect=<?=$redirectUrl?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
								    </ul> 
								</div>
							<span><img src="images/<?php echo $row['diet_image'];?>" /></span>
								</div>
							  </div>
							  <?php
								$i++;
								}
							  ?>
						</div>
					</div>	
					 <div role="tabpanel" class="tab-pane" id="bmi_score">
					<div class="row">
						<div class="col-md-12">
							<table class="datatable table table-striped table-bordered table-hover">
					          <thead>
					            <tr>
				                  <th>Gender</th>						 
								  <th>Bmi Score</th>
								  <th>Bmi Status</th>
								  <th>Date & Time</th>
								  <th>Action</th>
					            </tr>
					          </thead>
					          <tbody>
						      	<?php
					      		$sql="SELECT * FROM tbl_bmi WHERE tbl_bmi.`user_id`='$user_id'
									  ORDER BY tbl_bmi.`date_time` DESC";

					      		$res=mysqli_query($mysqli, $sql);
					      		$i=1;
					      		while ($bmi_row=mysqli_fetch_assoc($res)) {
					      			?>
					      			<tr>
							           <td><?php echo $bmi_row['gender'];?></td>
							           <td><?php echo $bmi_row['bmi_score'];?></td>   
							           <td><?php echo $bmi_row['bmi_status'];?></td>
		           					   <td><?php echo $bmi_row['date_time'];?></td>
		           					   <td> 
								        <a href="javascript:void(0)" data-id="<?php echo $bmi_row['id'];?>" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a> 
									        </td>
					      			</tr>
					      			<?php $i++; }?>
						      </tbody>
						  	</table>
						</div>
					</div>
				</div>
					<div role="tabpanel" class="tab-pane" id="recent_video">
						<div class="row">
							<?php
							  $user_id=$_GET['user_id'];

							  //Favourite list    
							  $tableName="tbl_diets";   
							  $targetpage = "user_profile.php";   
							  $limit = 12; 
							  
							  $query = "SELECT COUNT(*) as num FROM tbl_recent WHERE tbl_recent.`user_id` = '".$user_id."'";
							  $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
							  $total_pages = $total_pages['num'];
							  
							  $stages = 1;
							  $page=0;
							  if(isset($_GET['page'])){
							  $page = mysqli_real_escape_string($mysqli,$_GET['page']);
							  }
							  if($page){
								$start = ($page - 1) * $limit; 
							  }else{
								$start = 0; 
							  }

							 $users_qry1="SELECT * FROM tbl_recent
											 LEFT JOIN tbl_users ON tbl_recent.`user_id`= tbl_users.`id`
											 LEFT JOIN tbl_video ON tbl_recent.`post_id`= tbl_video.`id`
											 WHERE tbl_recent.`user_id` = '$user_id' AND tbl_recent.`recent_type` = 'video'
											 ORDER BY tbl_recent.`re_id` DESC LIMIT $start, $limit";

							$user_result1 = mysqli_query($mysqli,$users_qry1)or die(mysqli_error($mysqli));

							$i=0;
							while ($row=mysqli_fetch_assoc($user_result1)){
							 ?>
							 <div class="col-lg-4 col-sm-6 col-xs-12">
								<div class="block_wallpaper" style="box-shadow:2px 3px 5px #333;">
									<div class="wall_image_title">
									<p><?php  if (strlen($row['video_title']) > 40) {
										echo substr(stripslashes($row['video_title']), 0, 40) . '...';
									} else {
										echo $row['video_title'];
									}
									?></p>
									<ul>
										<li><a href="edit_video.php?video_id=<?php echo $row['id'];?>&redirect=<?=$redirectUrl?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
									</ul>
								</div>
							 <span>
			                    <?php if($row['video_thumbnail']!=''){?>
			                    <img src="images/<?php echo $row['video_thumbnail'];?>" />
			                    <?php }else{?>
			                      <img src="images/default_img.png" />
			                   <?php }?> 
			                  </span>
								</div>
							  </div>
							  <?php
								$i++;
								}
							  ?>
						</div>
					</div>	

					<div role="tabpanel" class="tab-pane" id="favourite_diets">
						<div class="row">
							<?php
							  $user_id=$_GET['user_id'];

							  //Favourite list    
							  $tableName="tbl_diets";   
							  $targetpage = "user_profile.php";   
							  $limit = 12; 
							  
							  $query = "SELECT COUNT(*) as num FROM tbl_favourite WHERE tbl_favourite.`user_id` = '".$user_id."'";
							  $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
							  $total_pages = $total_pages['num'];
							  
							  $stages = 1;
							  $page=0;
							  if(isset($_GET['page'])){
							  $page = mysqli_real_escape_string($mysqli,$_GET['page']);
							  }
							  if($page){
								$start = ($page - 1) * $limit; 
							  }else{
								$start = 0; 
							  }

							 $users_qry="SELECT * FROM tbl_favourite
										 LEFT JOIN tbl_users ON tbl_favourite.`user_id`= tbl_users.`id`
										 LEFT JOIN tbl_diets ON tbl_favourite.`post_id`= tbl_diets.`id`
										 WHERE tbl_favourite.`user_id` = '$user_id'AND  tbl_favourite.`type` = 'diet'
										 ORDER BY tbl_favourite.`fa_id` DESC LIMIT $start, $limit";

							$user_result = mysqli_query($mysqli,$users_qry)or die(mysqli_error($mysqli));

							$i=0;
							while ($row=mysqli_fetch_assoc($user_result)){
							 ?>
							 <div class="col-lg-4 col-sm-6 col-xs-12">
								<div class="block_wallpaper" style="box-shadow:2px 3px 5px #333;">
								  <div class="wall_category_block">
								     <h2><?=ucwords(get_cat_info($row['cat_id'],'category_name'))?></h2>  
								   </div>   
									<div class="wall_image_title">
									<p><?php  if (strlen($row['diet_title']) > 40) {
										echo substr(stripslashes($row['diet_title']), 0, 40) . '...';
									} else {
										echo $row['diet_title'];
									}
									?></p>
									<ul>
										<li><a href="edit_diets.php?diet_id=<?php echo $row['id'];?>&redirect=<?=$redirectUrl?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>															
									</ul>
								</div>
							<span><img src="images/<?php echo $row['diet_image'];?>" /></span>
								</div>
							  </div>
							  <?php
								$i++;
								}
							  ?>
						</div>
					</div>	
					<div role="tabpanel" class="tab-pane" id="favourite_video">
						<div class="row">
							<?php
							  $user_id=$_GET['user_id'];

							  //Favourite list    
							  $tableName="tbl_video";   
							  $targetpage = "user_profile.php";   
							  $limit = 12; 
							  
							  $query = "SELECT COUNT(*) as num FROM tbl_favourite WHERE tbl_favourite.`user_id` = '".$user_id."'";
							  $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
							  $total_pages = $total_pages['num'];
							  
							  $stages = 1;
							  $page=0;
							  if(isset($_GET['page'])){
							  $page = mysqli_real_escape_string($mysqli,$_GET['page']);
							  }
							  if($page){
								$start = ($page - 1) * $limit; 
							  }else{
								$start = 0; 
							  }

							 $users_qry="SELECT * FROM tbl_favourite
										 LEFT JOIN tbl_users ON tbl_favourite.`user_id`= tbl_users.`id`
										 LEFT JOIN tbl_video ON tbl_favourite.`post_id`= tbl_video.`id`
										 WHERE tbl_favourite.`user_id` = '$user_id'AND  tbl_favourite.`type` = 'video'
										 ORDER BY tbl_favourite.`fa_id` DESC LIMIT $start, $limit";

							$user_result = mysqli_query($mysqli,$users_qry)or die(mysqli_error($mysqli));

							$i=0;
							while ($row=mysqli_fetch_assoc($user_result)){
							 ?>
							 <div class="col-lg-4 col-sm-6 col-xs-12">
								<div class="block_wallpaper" style="box-shadow:2px 3px 5px #333;">
									<div class="wall_image_title">
									<p><?php  if (strlen($row['video_title']) > 40) {
										echo substr(stripslashes($row['video_title']), 0, 40) . '...';
									} else {
										echo $row['video_title'];
									}
									?></p>
									<ul>
										<li><a href="edit_video.php?video_id=<?php echo $row['id'];?>&redirect=<?=$redirectUrl?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>															
									</ul>
								</div>
								<span><?php if($row['video_thumbnail']!=''){?>
			                    <img src="images/<?php echo $row['video_thumbnail'];?>" />
			                    <?php }else{?>
			                      <img src="images/default_img.png" />
			                   <?php }?> </span>
								</div>
							  </div>
							  <?php
								$i++;
								}
							  ?>
						</div>
					</div>									 
				</div>
			</div>
		</div>
	</div>

<?php include('includes/footer.php');?>

<script type="text/javascript">

 $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
    document.title = $(this).text()+" | <?=APP_NAME?>";
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#user_image').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

   $(".btn_delete").click(function(e){
		e.preventDefault();
		var _ids=$(this).data("id");
		swal({
          title: "Are you sure to delete?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger btn_edit",
          cancelButtonClass: "btn-warning btn_edit",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },

        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{ids:_ids,'action':'removebmiscore'},
              success:function(res){
                  console.log(res);
                  if(res.status=='1'){
                    swal({
					  title: "Successfully", 
					  text: "Bmi Score has been deleted...", 
					  type: "success"
					},function() {
					  location.reload();
					});
                  }
                  else{
                  	swal("Something went to wrong !");
                  }
                }
            });
          }
          else{
            swal.close();
          }

        });

	});
</script>


