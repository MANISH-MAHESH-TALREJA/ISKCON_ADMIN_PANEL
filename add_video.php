<?php $page_title="Add Video";

include("includes/header.php");
require("includes/function.php");
require("language/language.php");
	 
	if(isset($_POST['submit']))
	{
		    if ($_POST['video_type']=='youtube')
        {

              $video_url=$_POST['video_url'];
              $youtube_video_url = addslashes($_POST['video_url']);
              parse_str( parse_url( $youtube_video_url, PHP_URL_QUERY ), $array_of_vars );
              $video_id=  $array_of_vars['v'];

              $video_thumbnail='';     

        }         
				
        if ($_POST['video_type']=='server_url')
        {
              $video_url=$_POST['video_url'];

              $video_thumbnail=rand(0,99999)."_".$_FILES['video_thumbnail']['name'];
       
              //Main Image
              $tpath1='images/'.$video_thumbnail;        
              $pic1=compress_image($_FILES["video_thumbnail"]["tmp_name"], $tpath1, 80);
         
              //Thumb Image 
              $thumbpath='images/thumbs/'.$video_thumbnail;   
              $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   

              $video_id='';

        } 

        if ($_POST['video_type']=='local')
        {

              $path = "uploads/"; //set your folder path
              
              $video_url=$path.$_POST['video_file_name'];

              $video_thumbnail=rand(0,99999)."_".$_FILES['video_thumbnail']['name'];
       
              //Main Image
              $tpath1='images/'.$video_thumbnail;        
              $pic1=compress_image($_FILES["video_thumbnail"]["tmp_name"], $tpath1, 80);
         
              //Thumb Image 
              $thumbpath='images/thumbs/'.$video_thumbnail;   
              $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   

              $video_id='';
        } 

        $data = array( 			    
         'video_type'  =>  $_POST['video_type'],
         'video_title'  =>  cleanInput($_POST['video_title']),
         'video_url'  =>  $video_url,
         'video_id'  =>  $video_id,
         'video_thumbnail'  =>  $video_thumbnail
       );		

		$qry = Insert('tbl_video',$data);	
 	    
		$_SESSION['msg']="10";
		header( "Location:manage_videos.php");
		exit;	
}
	
	  
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
<script>
    $(function () {
        $('#btn').click(function () {
            $('.myprogress').css('width', '0');
            $('.msg').text('');
            var video_local = $('#video_local').val();
            if (video_local == '') {
                alert('Please enter file name and select file');
                return;
            }
            var formData = new FormData();
            formData.append('video_local', $('#video_local')[0].files[0]);
            $('#btn').attr('disabled', 'disabled');
             $('.msg').text('Uploading in progress...');
            $.ajax({
                url: 'uploadscript.php',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                // this part is progress bar
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('.myprogress').text(percentComplete + '%');
                            $('.myprogress').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                 
                    $('#video_file_name').val(data);
                    $('.msg').text("File uploaded successfully!!");
                    $('#btn').removeAttr('disabled');
                }
            });
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function(e) {
   $("#video_type").change(function(){
  
   var type=$("#video_type").val();
      
      if(type=="youtube")
      { 
        //alert(type);
        $("#video_url_display").show();
        $("#video_local_display").hide();
        $("#thumbnail").hide();
      } 
      else if(type=="server_url")
      {
         
         $("#video_url_display").show();
         $("#thumbnail").show();
         $("#video_local_display").hide();
      }
      else
      {   
             
        $("#video_url_display").hide();               
        $("#video_local_display").show();
        $("#thumbnail").show();

      }    
      
 });
});
</script>
<div class="row">
      <div class="col-md-12">
      	<?php
	      if(isset($_GET['redirect'])){
	            echo '<a href="'.$_GET['redirect'].'" class="btn_back"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
	          }
	          else{
	            echo '<a href="manage_videos.php" class="btn_back"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
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
            <form action="" name="add_form" method="post" class="form form-horizontal" enctype="multipart/form-data">
              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Video Title :-</label>
                    <div class="col-md-6">
                      <input type="text" name="video_title" id="video_title" value="" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Video Type :-</label>
                    <div class="col-md-6">                       
                      <select name="video_type" id="video_type" style="width:280px; height:25px;" class="select2" required>
                            <option value="">--Select Type--</option>
                            <option value="youtube">Youtube</option>                            
                            <option value="server_url">From Server</option>
                            <option value="local">From Local</option>
                      </select>
                    </div>
                  </div>
                  <div id="video_url_display" class="form-group">
                    <label class="col-md-3 control-label">Video URL :-</label>
                    <div class="col-md-6">
                      <input type="text" name="video_url" id="video_url" value="" class="form-control">
                    </div>
                  </div>
                  <div id="video_local_display" class="form-group" style="display:none;">
                    <label class="col-md-3 control-label">Video Upload :-</label>
                    <div class="col-md-6">
                    <input type="hidden" name="video_file_name" id="video_file_name" value="" class="form-control">
                      <input type="file" name="video_local" id="video_local" value="" class="form-control" accept="video/*" >
                      <div class="progress">
                            <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                        </div>
                        <div class="msg"></div>
                     <input type="button" id="btn" class="btn-success" value="Upload" />
                    </div>
                  </div><br>
                  <div id="thumbnail" class="form-group" style="display:none;">
                    <label class="col-md-3 control-label">Thumbnail Image:-
                      <p class="control-label-help">(Recommended resolution: 800x400)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="video_thumbnail" value="" id="fileupload">
                       <div class="fileupload_img"><img type="image" src="assets/images/square-img.jpg" alt="image" style="width: 140px;height: 90px;" required="required"/></div>
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

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $("input[name='video_thumbnail']").next(".fileupload_img").find("img").attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("input[name='video_thumbnail']").change(function() { 
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
  $("input[name='video_local']").on("change",function() { 
    var file=$(this);

    if(file[0].files.length != 0){
      var ext = getExtension($(this).val());
      if(ext=='mpg' || ext=='mpeg' ||ext=='wmv' ||ext=='mov' ||ext=='rm' ||ext=='ram' ||ext=='swf' || ext=='flv' ||ext=='ogg' ||ext=='webm' ||ext=='mp4'){

      }else{
        $(this).val('');
        $('.notifyjs-corner').empty();
        $.notify(
          'Only video files are allowed!',
          { position:"top center",className: 'error'}
          );
      }
    }
   }
  );
</script> 