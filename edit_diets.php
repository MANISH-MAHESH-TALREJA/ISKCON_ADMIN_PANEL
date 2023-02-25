<?php $page_title="Edit Diet";

include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

  //All Category
  $cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
  $cat_result=mysqli_query($mysqli,$cat_qry);  

  if(isset($_GET['diet_id']))
  {

  	$qry="SELECT * FROM tbl_diets WHERE `id`='".$_GET['diet_id']."'";
  	$result=mysqli_query($mysqli,$qry);
  	$row=mysqli_fetch_assoc($result);

  }
  
  if(isset($_POST['submit']))
  {  

  	if($_FILES['diet_image']['name']!="")
  	{

  		$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_diets WHERE `id`='.$_GET['diet_id'].'');
  		$img_res_row=mysqli_fetch_assoc($img_res);

  		if($img_res_row['diet_image']!="")
  		{
  			unlink('images/thumbs/'.$img_res_row['diet_image']);
  			unlink('images/'.$img_res_row['diet_image']);
  		}	

  		$diet_image=rand(0,99999)."_".$_FILES['diet_image']['name'];

	   //Main Image
  		$tpath1='images/'.$diet_image; 			 
  		$pic1=compress_image($_FILES["diet_image"]["tmp_name"], $tpath1, 80);

		//Thumb Image 
  		$thumbpath='images/thumbs/'.$diet_image;		
  		$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   

  		$data = array( 
  			'cat_id'  =>  $_POST['cat_id'],
  			'diet_title'  =>  cleanInput($_POST['diet_title']),
  			'diet_info'  =>  addslashes($_POST['diet_info']),
  			'diet_image'  =>  $diet_image
  		);    
  	}
  	else
  	{
  		$data = array( 
  			'cat_id'  =>  $_POST['cat_id'],
  			'diet_title'  =>  cleanInput($_POST['diet_title']),
  			'diet_info'  =>  addslashes($_POST['diet_info'])
  		);
  	} 

  	$diets_edit=Update('tbl_diets', $data, "WHERE `id` = '".$_POST['diet_id']."'");

	  	$_SESSION['msg']="11";
	     if(isset($_GET['redirect'])){
	      header("Location:".$_GET['redirect']);
	    }
	    else{
		header( "Location:manage_diets.php");
	    }
	    exit; 
  }
  

?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script> 
<div class="row">
      <div class="col-md-12">
      	<?php
	      if(isset($_GET['redirect'])){
	            echo '<a href="'.$_GET['redirect'].'" class="btn_back"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
	          }
	          else{
	            echo '<a href="manage_diets.php" class="btn_back"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
	          }
		    ?>
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?=$page_title?></div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="card-body mrg_bottom"> 
            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
              <input  type="hidden" name="diet_id" value="<?php echo $_GET['diet_id'];?>" />
              <div class="section">
                <div class="section-body">
				  <div class="form-group">
                    <label class="col-md-3 control-label">Title :-</label>
                    <div class="col-md-6">
                      <input type="text" name="diet_title" id="diet_title" value="<?php echo stripslashes($row['diet_title']);?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Category :-</label>
                    <div class="col-md-6">
                      <select name="cat_id" id="cat_id" class="select2" required>
                        <option value="">--Select Category--</option>
                        <?php
                            while($cat_row=mysqli_fetch_array($cat_result))
                            {
                        ?>                       
                        <option value="<?php echo $cat_row['cid'];?>" <?php if($cat_row['cid']==$row['cat_id']){?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>                           
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Description :-</label>
                    <div class="col-md-6">
                      <textarea name="diet_info" id="diet_info" class="form-control"><?php echo $row['diet_info'];?></textarea>
                      <script>
                        var roxyFileman = '<?php echo $ck_file_path;?>fileman/index.html?integration=ckeditor';
                        $(function(){
                        CKEDITOR.replace( 'diet_info',{filebrowserBrowseUrl:roxyFileman, 
                          filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                          removeDialogTabs: 'link:upload;image:upload'});
                        });
                      </script>
                    </div>
                  </div>
                  <div class="form-group">&nbsp;</div>
                  <div id="thumbnail" class="form-group">
                    <label class="col-md-3 control-label">Featured Image:- <p class="control-label-help">(Recommended resolution: 700x350)</p></label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="diet_image" value="fileupload" onchange="readURL(this)" id="fileupload">
                        <?php if(isset($_GET['diet_id']) AND $row['diet_image']!="") {?>
                             
                          <div class="fileupload_img"><img id="diet_image" type="image" src="images/<?php echo $row['diet_image'];?>" alt="video thumbnail" style="width: 140px;height: 90px" /></div>
                          <?php } else {?>
                       
                       <div class="fileupload_img"><img id="diet_image" type="image" src="assets/images/portrait.jpg" alt="recipe image" style="width: 140px;height: 90px" /></div>
                       <?php }?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
        
<?php include("includes/footer.php");?>       

<script type="text/javascript">
$("input[name='diet_image']").change(function() { 
    var file=$(this);

    if(file[0].files.length != 0){
        if(isImage($(this).val())){
          render_upload_image(this,$(this).next('.fileupload_img').find("img"));
        }
        else
        {
          $(this).val('');
          $('.notifyjs-corner').empty();
          $.notify(
          'Only jpg/jpeg, png, gif files are allowed!',
          { position:"top center",className: 'error'}
          );
        }
    }
});

  $("#fileupload").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
      case 'jpeg': case 'jpg': case 'png':
           //alert("an image");
           break;
           default:
           $(this).val('');
            // error message here
            swal("Please upload file in these format only jpg, jpeg, png.");
            break;
          }
  });

</script> 