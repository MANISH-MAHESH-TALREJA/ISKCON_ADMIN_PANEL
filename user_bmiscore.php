<?php 
	
	$page_title="User's Liked Quotes";
	include('includes/header_profile.php'); 
	include('includes/header_profile.php'); 
?>

<div class="card-body no-padding tab-content">
	<div role="tabpanel" class="tab-pane active">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion">
			  <div class="panel panel-default">
			  	<a data-toggle="collapse" data-parent="#accordion" href="#liked_text" style="color: rgba(0,0,0, 0.87);text-decoration: none">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        Text Quotes
				      </h4>
				    </div>
				</a>
			    <div id="liked_text" class="panel-collapse collapse in">
			      <div class="panel-body">
			      	<table class="datatable table table-striped table-bordered table-hover">
			          <thead>
			            <tr>
			              <th>Sr.</th>
			              <th>Text Quote</th>
			              <th>Date</th>
			            </tr>
			          </thead>
			          <tbody>
				      	<?php

			      		$sql="SELECT tbl_quotes.`id`,tbl_quotes.`quote`, tbl_like.`id` AS like_id, tbl_like.`created_at` AS like_date FROM tbl_quotes
			      			LEFT JOIN tbl_like ON tbl_quotes.`id`=tbl_like.`quotes_id`
			      			WHERE tbl_like.`device_id`='$user_id' ORDER BY tbl_like.`id` DESC";

			      		$res=mysqli_query($mysqli, $sql);
			      		$no=1;
			      		while ($row=mysqli_fetch_assoc($res)) {
			      			?>
			      			<tr>
			      				<td><?=$no;?></td>
			      				<td title="<?=$row['quote']?>">
			      					<?php 
					                  if(strlen($row['quote']) > 300){
					                    echo nl2br(substr(stripslashes($row['quote']), 0, 300)).'...';  
					                  }else{
					                    echo nl2br($row['quote']);
					                  }
					                ?>
			      				</td>
			      				<td><?=calculate_time_span($row['like_date'],true);?></td>
			      			</tr>
			      			<?php
			      			$no++;
			      		}
			      		mysqli_free_result($res);

				      	?>
				      </tbody>
				  	</table>
			      </div>
			    </div>
			  </div>
			  <div class="panel panel-default">
			  	<a data-toggle="collapse" data-parent="#accordion" href="#liked_image" style="color: rgba(0,0,0, 0.87);text-decoration: none">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        Image Quotes
				      </h4>
				    </div>
			    </a>
			    <div id="liked_image" class="panel-collapse collapse">
			      <div class="panel-body">
			      	<table class="datatable table table-striped table-bordered table-hover">
			          <thead>
			            <tr>
			              <th>Sr.</th>
			              <th>Image</th>
			              <th>Date</th>
			            </tr>
			          </thead>
			          <tbody>
				      	<?php

			      		$sql="SELECT tbl_img_quotes.`id`,tbl_img_quotes.`quote_image`, tbl_img_like.`id` AS like_id, tbl_img_like.`created_at` AS like_date FROM tbl_img_quotes
			      			LEFT JOIN tbl_img_like ON tbl_img_quotes.`id`=tbl_img_like.`quotes_id`
			      			WHERE tbl_img_like.`device_id`='$user_id' ORDER BY tbl_img_like.`id` DESC";

			      		$res=mysqli_query($mysqli, $sql);
			      		$no=1;
			      		while ($row=mysqli_fetch_assoc($res)) {
			      			?>
			      			<tr>
			      				<td><?=$no;?></td>
			      				<td nowrap="">
					                <?php 
					                  if(file_exists('images/'.$row['quote_image'])){
					                ?>
					                <span class="mytooltip tooltip-effect-3">
					                  <span class="tooltip-item">
					                    <img src="images/<?php echo $row['quote_image'];?>" alt="no image" style="width: 60px;height: auto;border-radius: 5px">
					                  </span> 
					                  <span class="tooltip-content clearfix">
					                    <a href="images/<?php echo $row['quote_image'];?>" target="_blank"><img src="images/<?php echo $row['quote_image'];?>" alt="no image" /></a>
					                  </span>
					                </span>
					                <?php }else{
					                  ?>
					                  <img src="" alt="no image" style="width: 60px;height: 60px;border-radius: 5px">
					                  <?php
					                } ?>
					            </td>
			      				<td><?=calculate_time_span($row['like_date'],true);?></td>
			      			</tr>
			      			<?php
			      			$no++;
			      		}
			      		mysqli_free_result($res);

				      	?>
				      </tbody>
				  	</table>
			      </div>
			    </div>
			  </div>
			</div>
			</div>
		</div>
	</div>
</div>

<!-- End profile header div -->
</div>
</div>
</div>

<?php 
	include('includes/footer.php');
?>