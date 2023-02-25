<?php
$page_title="Manage Video";

include("includes/header.php");
require("includes/function.php");
require("language/language.php");

$qry="SELECT * FROM tbl_settings WHERE `id`='1'";
$result=mysqli_query($mysqli,$qry);
$settings_row=mysqli_fetch_assoc($result);


if(isset($_GET['keyword']))
{

	$keyword = addslashes(trim($_GET['keyword']));

	$sql_query="SELECT tbl_video.* FROM tbl_video WHERE tbl_video.`video_title` LIKE '%$keyword%' 
	ORDER BY tbl_video.`video_title`";  

	$result = mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));


}
else
{
	$tableName="tbl_video";   
	$targetpage = "manage_videos.php";   
	$limit = 12; 

	$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
	$total_pages = $total_pages['num'];

	$stages = 3;
	$page=0;
	if(isset($_GET['page'])){
		$page = mysqli_real_escape_string($mysqli,$_GET['page']);
	}
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0; 
	} 

	$sql_query="SELECT tbl_video.* FROM tbl_video ORDER BY tbl_video.`id` DESC LIMIT $start, $limit";

	$result = mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));

}

?>


<div class="row">
	<div class="col-xs-12">
		<?php
		if(isset($_SERVER['HTTP_REFERER']))
		{
			echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
		}?>
		<div class="card mrg_bottom">
			<div class="page_title_block">
				<div class="col-md-5 col-xs-12">
					<div class="page_title"><?=$page_title?></div>
				</div>
				<div class="col-md-7 col-xs-12">
					<div class="search_list">
						<div class="search_block">
							<form  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<input class="form-control input-sm" placeholder="Search here..." aria-controls="DataTables_Table_0" type="search" name="keyword" value="<?php if (isset($_GET['keyword'])) { echo $_GET['keyword']; } ?>" required="required">
								<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
							</form>  
						</div>
						<div class="add_btn_primary"> <a href="add_video.php">Add Video</a> </div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row">
						<label class="col-md-4 control-label" style="font-weight:600;color:#777;">Enable/Disable Video:-</label>
						<div class="row toggle_btn">
							<input type="checkbox" id="enable_disable_check_<?=$i?>" data-id="<?=$settings_row['id']?>" data-table="tbl_settings" data-column="video_status" class="cbx hidden enable_disable" <?php if($settings_row['video_status']==1){ echo 'checked';} ?>>
							<label for="enable_disable_check_<?=$i?>" class="lbl"></label>
						</div>
					</div>
				</div>  
				<div class="col-md-4 col-xs-12 text-right" style="float: right;">
					<div class="checkbox" style="width: 95px;margin-top: 5px;margin-left: 10px;right: 100px;position: absolute;">
						<input type="checkbox" id="checkall_input">
						<label for="checkall_input">Select All</label>
					</div>
					<div class="dropdown" style="float:right">
						<button class="btn btn-primary dropdown-toggle btn_cust" type="button" data-toggle="dropdown">Action
							<span class="caret"></span></button>
							<ul class="dropdown-menu" style="right:0;left:auto;">
								<li><a href="javascript:void(0)" class="actions" data-action="enable" data-table="tbl_video">Enable</a></li>
								<li><a href="javascript:void(0)" class="actions" data-action="disable" data-table="tbl_video">Disable</a></li>
								<li><a href="javascript:void(0)" class="actions" data-action="delete" data-table="tbl_video">Delete !</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="clearfix"></div>

				<div class="col-md-12 mrg-top">
					<div class="row">
						<?php 
						$i=0;
						while($row=mysqli_fetch_array($result))
							{ ?>
								<div class="col-lg-4 col-sm-6 col-xs-12">
									<div class="block_wallpaper">
										<div class="wall_category_block">
											<div class="checkbox" style="float: right">
												<input type="checkbox" name="post_ids[]" id="checkbox<?php echo $i;?>" value="<?php echo $row['id']; ?>" class="post_ids" style="margin: 0px;">
												<label for="checkbox<?php echo $i;?>"></label>
											</div>
										</div>
										<div class="wall_image_title">
											<p><?php echo $row['video_title'];?></p>
											<ul>

												<li><a href="edit_video.php?video_id=<?php echo $row['id'];?>&redirect=<?=$redirectUrl?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
												<li>                
													<a href="javascript:void(0)" class="btn_delete" data-table="tbl_video" data-id="<?php echo $row['id'];?>"  data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a>                  
												</li>
												<li>
													<div class="row toggle_btn">
														<input type="checkbox" id="enable_disable_check_<?=$i?>" data-id="<?=$row['id']?>" data-table="tbl_video" data-column="status" class="cbx hidden enable_disable" <?php if($row['status']==1){ echo 'checked';} ?>>
														<label for="enable_disable_check_<?=$i?>" class="lbl"></label>
													</div>
												</li>	
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
								<?php $i++; } ?>     
							</div>
						</div>
						<div class="col-md-12 col-xs-12">
							<div class="pagination_item_block">
								<nav>
									<?php include("pagination.php");?>
								</nav>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<?php include("includes/footer.php");?>       

			<script type="text/javascript">
				$(".filter").on("change", function(e) {
					$("#filterForm *").filter(":input").each(function() {
						if ($(this).val() == '')
							$(this).prop("disabled", true);
					});
					$("#filterForm").submit();
				});
			</script>