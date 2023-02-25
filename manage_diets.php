<?php 
$page_title="Manage Diet";

include("includes/header.php");

require("includes/function.php");
require("language/language.php");


$tableName="tbl_diets";   
$targetpage = "manage_diets.php"; 
$limit = 12; 

if(isset($_GET['filter'])){
	if($_GET['filter']=='enable'){
		$status="tbl_diets.`status`='1'";
	}else if($_GET['filter']=='disable'){
		$status="tbl_diets.`status`='0'";
	}
} 

if(isset($_GET['cat_id'])){

	$cat_id = filter_var($_GET['cat_id'], FILTER_SANITIZE_STRING);

	if(isset($_GET['filter'])){

		$query ="SELECT COUNT(*) as num FROM tbl_diets 
		LEFT JOIN tbl_category ON tbl_diets.`cat_id`=tbl_category.`cid`
		WHERE $status AND ".$_GET['filter']."";

		$targetpage = "manage_diets.php?cat_id=$cat_id&filter=".$_GET['filter'];
	}
	else{
		$query = "SELECT COUNT(*) as num FROM $tableName WHERE `cat_id`='$cat_id'";

		$targetpage = "manage_diets.php?cat_id=".$cat_id; 
	}


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

	$quotes_qry="SELECT tbl_category.`category_name`,tbl_diets.* FROM tbl_diets
	LEFT JOIN tbl_category ON tbl_diets.`cat_id`= tbl_category.`cid` 
	WHERE tbl_diets.`cat_id`='$cat_id'
	ORDER BY tbl_diets.`id` DESC LIMIT $start, $limit";

	$result=mysqli_query($mysqli,$quotes_qry);

	if(isset($_GET['filter'])){

		$status='';

		if($_GET['filter']=='enable'){
			$status="tbl_diets.`status`='1'";
		}else if($_GET['filter']=='disable'){
			$status="tbl_diets.`status`='0'";

		}
		$quotes_qry="SELECT tbl_category.`category_name`,tbl_diets.* FROM tbl_diets
		LEFT JOIN tbl_category ON tbl_diets.`cat_id`=tbl_category.`cid`
		WHERE $status AND tbl_diets.`cat_id`='$cat_id'
		ORDER BY tbl_diets.`id` DESC LIMIT $start, $limit";

		$result=mysqli_query($mysqli,$quotes_qry);
	}

}
else if(isset($_GET['filter'])){


	$targetpage = "manage_diets.php?filter=".$_GET['filter'];
	$status='';

	if($_GET['filter']=='enable'){
		$status="tbl_diets.`status`='1'";
	}else if($_GET['filter']=='disable'){
		$status="tbl_diets.`status`='0'";

	}

	$query ="SELECT COUNT(*) as num FROM tbl_diets 
	LEFT JOIN tbl_category ON tbl_diets.`cat_id`=tbl_category.`cid`
	WHERE $status";
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


	$quotes_qry="SELECT tbl_category.`category_name`,tbl_diets.* FROM tbl_diets
	LEFT JOIN tbl_category ON tbl_diets.`cat_id`=tbl_category.`cid`
	WHERE $status
	ORDER BY tbl_diets.`id` DESC LIMIT $start, $limit";

	$result=mysqli_query($mysqli,$quotes_qry);

}

else if(isset($_POST['data_search'])){


	$keyword = addslashes(trim($_POST['search_value']));

	$sql_query="SELECT tbl_diets.*,tbl_category.`category_name` FROM tbl_diets,tbl_category WHERE tbl_diets.`cat_id` = tbl_category.`cid` AND  tbl_diets.`diet_title` LIKE '%$keyword%' ORDER BY tbl_diets.`diet_title` DESC";  

	$result = mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));


}
else
{
	$tableName="tbl_diets";   
	$targetpage = "manage_diets.php";   
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

	$sql_query="SELECT tbl_diets.*,tbl_category.`category_name` FROM tbl_diets
	LEFT JOIN tbl_category ON tbl_diets.`cat_id` = tbl_category.`cid` 
	ORDER BY tbl_diets.`id` DESC LIMIT $start, $limit";

	$result = mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));

}

?>

<div class="row">
	<div class="col-xs-12">
		<?php
		    if(isset($_SERVER['HTTP_REFERER']))
		    {
		      echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
		    }
		?>
		<div class="card mrg_bottom">
			<div class="page_title_block">
				<div class="col-md-5 col-xs-12">
					<div class="page_title"><?= $page_title?></div>
				</div>
				<div class="col-md-7 col-xs-12">
					<div class="search_list">
						<div class="search_block">
							<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<input class="form-control input-sm" placeholder="Search here..." aria-controls="DataTables_Table_0" type="search" name="search_value" value="<?php if (isset($_POST['search_value'])) { echo $_POST['search_value']; } ?>" required="required">
								<button type="submit" name="data_search"  class="btn-search"><i class="fa fa-search"></i></button>
							</form>  
						</div>
						<div class="add_btn_primary"> <a href="add_diets.php?add=yes">Add Diet</a> </div>
					</div>
				</div>
				<form id="filterForm" accept="" method="GET" style="clear:both">
					<div class="col-md-3"> 
						<select name="filter" class="form-control select2 filter" required style="padding: 5px 30px;height: 40px;">
							<option value="">All</option>
							<option value="enable" <?php if(isset($_GET['filter']) && $_GET['filter']=='enable'){ echo 'selected';} ?>>Enable</option>
							<option value="disable" <?php if(isset($_GET['filter']) && $_GET['filter']=='disable'){ echo 'selected';} ?>>Disable</option>
						</select>
					</div>
					<div class="col-md-3"> 
						<select name="cat_id" class="form-control select2 filter" required style="padding: 5px 40px;height: 40px;">
							<option value="">All Category</option>
							<?php
							$cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
							$cat_result=mysqli_query($mysqli,$cat_qry);
							while($cat_row=mysqli_fetch_array($cat_result))
							{
								?>                       
								<option value="<?php echo $cat_row['cid'];?>" <?php if(isset($_GET['cat_id']) && $_GET['cat_id']==$cat_row['cid']){echo 'selected';} ?>><?php echo $cat_row['category_name'];?></option>                           
								<?php
							}
							?>
						</select>
					</div>
				</form>
				<div class="col-md-4 col-xs-12 text-right" style="float: right;">
					<div class="checkbox" style="width: 95px;margin-top: 5px;margin-left: 10px;right: 100px;position: absolute;">
						<input type="checkbox" id="checkall_input">
						<label for="checkall_input">
							Select All
						</label>
					</div>
					<div class="dropdown" style="float:right">
						<button class="btn btn-primary dropdown-toggle btn_cust" type="button" data-toggle="dropdown">Action
							<span class="caret"></span></button>
							<ul class="dropdown-menu" style="right:0;left:auto;">
								<li><a href="javascript:void(0)" class="actions" data-action="enable" data-table="tbl_diets" data-column="status">Enable</a></li>
								<li><a href="javascript:void(0)" class="actions" data-action="disable" data-table="tbl_diets" data-column="status">Disable</a></li>
								<li><a href="javascript:void(0)" class="actions" data-action="delete" data-table="tbl_diets" data-column="status">Delete !</a></li>
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
							{?>
								<div class="col-lg-4 col-sm-6 col-xs-12">
									<div class="block_wallpaper">
										<div class="wall_category_block">
											<h2>
												<?php
												if (strlen($row['category_name']) > 15) {
													echo substr(stripslashes($row['category_name']), 0, 15) . '...';
												} else {
													echo $row['category_name'];
												}
												?>
											</h2>

											<div class="checkbox" style="float: right">
												<input type="checkbox" name="post_ids[]" id="checkbox<?php echo $i;?>" value="<?php echo $row['id']; ?>" class="post_ids" style="margin: 0px;">
												<label for="checkbox<?php echo $i;?>"></label>
											</div>
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
												<li><a href="javascript:void(0)" class="btn_delete" data-table="tbl_diets" data-id="<?php echo $row['id'];?>"  data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a></li>
												<li>
													<div class="row toggle_btn">
														<input type="checkbox" id="enable_disable_check_<?=$i?>" data-id="<?=$row['id']?>" data-table="tbl_diets" data-column="status" class="cbx hidden enable_disable" <?php if($row['status']==1){ echo 'checked';} ?>>
														<label for="enable_disable_check_<?=$i?>" class="lbl"></label>
													</div>
												</li>

											</ul>
										</div>
										<span><img src="images/<?php echo $row['diet_image'];?>" /></span>
									</div>
								</div>
								<?php $i++; }?>     

					</div>
				</div>
				<div class="col-md-12 col-xs-12">
					<div class="pagination_item_block">
						<nav>
							<?php if(!isset($_POST["data_search"])){ include("pagination.php");}?>              
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